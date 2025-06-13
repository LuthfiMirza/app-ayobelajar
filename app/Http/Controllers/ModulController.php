<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Services\AzureStorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModulController extends Controller
{
    protected $azureStorage;

    public function __construct(AzureStorageService $azureStorage)
    {
        $this->azureStorage = $azureStorage;
    }
    public function index()
    {
        $modules = Module::where('is_active', true)
                        ->orderBy('level')
                        ->orderBy('subject')
                        ->get();
        
        return view('modul', compact('modules'));
    }

    public function download(Module $module)
    {
        if (!$module->is_active) {
            return redirect()->back()->with('error', 'Modul tidak tersedia!');
        }

        // Check if file exists in Azure Storage or local storage
        $disk = config('filesystems.default') === 'azure' ? 'azure' : 'public';
        
        if (!$module->file_path || !Storage::disk($disk)->exists($module->file_path)) {
            return redirect()->back()->with('error', 'File tidak ditemukan!');
        }

        // Track download if user is authenticated
        if (auth()->check()) {
            $fileSize = null;
            try {
                $fileSize = Storage::disk($disk)->size($module->file_path);
            } catch (\Exception $e) {
                // If size cannot be determined, continue without it
            }
            
            \App\Models\DownloadHistory::create([
                'user_id' => auth()->id(),
                'module_id' => $module->id,
                'module_title' => $module->title,
                'module_subject' => $module->subject,
                'module_level' => $module->level,
                'file_name' => $module->file_name,
                'file_size' => $fileSize,
                'downloaded_at' => now(),
            ]);
        }

        // Set longer execution time for large files
        set_time_limit(300); // 5 minutes
        
        // For Azure Storage, redirect to the direct URL
        if ($disk === 'azure') {
            $url = Storage::disk('azure')->url($module->file_path);
            return redirect($url);
        }
        
        // For local storage, use traditional download
        return Storage::disk('public')->download($module->file_path, $module->file_name);
    }

    public function preview(Module $module)
    {
        if (!$module->is_active) {
            return redirect()->back()->with('error', 'Modul tidak tersedia!');
        }

        if (!$module->file_path || !Storage::disk('public')->exists($module->file_path)) {
            return redirect()->back()->with('error', 'File tidak ditemukan!');
        }

        // Get file extension to determine preview type
        $fileExtension = strtolower(pathinfo($module->file_path, PATHINFO_EXTENSION));
        $filePath = Storage::disk('public')->path($module->file_path);
        
        // Handle different file types
        switch ($fileExtension) {
            case 'pdf':
                return response()->file($filePath, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="' . $module->file_name . '"'
                ]);
                
            case 'txt':
                return response()->file($filePath, [
                    'Content-Type' => 'text/plain; charset=utf-8',
                    'Content-Disposition' => 'inline; filename="' . $module->file_name . '"'
                ]);
                
            case 'doc':
            case 'docx':
                // For Word documents, we'll redirect to download since browsers can't preview them directly
                // In a production environment, you might want to convert these to PDF or use a document viewer service
                return redirect()->back()->with('info', 'File Word tidak dapat di-preview. Silakan unduh untuk membuka.');
                
            default:
                // For unsupported file types, redirect to download
                return redirect()->back()->with('info', 'Tipe file ini tidak dapat di-preview. Silakan unduh untuk membuka.');
        }
    }

    public function detail(Module $module)
    {
        if (!$module->is_active) {
            return redirect()->back()->with('error', 'Modul tidak tersedia!');
        }

        return view('modul-detail', compact('module'));
    }

    /**
     * Upload module to Azure Storage
     */
    public function uploadModule(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'subject' => 'required|string|max:100',
                'level' => 'required|string|max:50',
                'description' => 'nullable|string',
                'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:51200' // 50MB max
            ]);

            $file = $request->file('file');
            
            // Upload to Azure Storage
            $uploadResult = $this->azureStorage->uploadModule($file, [
                'title' => $request->title,
                'subject' => $request->subject,
                'level' => $request->level,
                'description' => $request->description,
                'uploaded_by' => auth()->id(),
                'uploaded_at' => now()
            ]);

            if ($uploadResult['success']) {
                // Save to database
                $module = Module::create([
                    'title' => $request->title,
                    'subject' => $request->subject,
                    'level' => $request->level,
                    'description' => $request->description,
                    'file_path' => $uploadResult['path'],
                    'file_name' => $uploadResult['original_name'],
                    'file_size' => $uploadResult['size'],
                    'file_type' => $uploadResult['mime_type'],
                    'azure_url' => $uploadResult['url'],
                    'is_active' => true,
                    'uploaded_by' => auth()->id()
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Module uploaded successfully to Azure Storage',
                    'data' => [
                        'module_id' => $module->id,
                        'azure_url' => $uploadResult['url'],
                        'file_path' => $uploadResult['path']
                    ]
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => $uploadResult['error']
            ], 500);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get Azure Storage statistics
     */
    public function getStorageStats()
    {
        try {
            $stats = $this->azureStorage->getStorageStats();
            
            return response()->json([
                'success' => true,
                'data' => $stats
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to get storage stats: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show upload form
     */
    public function showUploadForm()
    {
        return view('admin.upload-module');
    }
}