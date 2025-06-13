<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Module;
use Illuminate\Support\Facades\Storage;

class LargeFileUpload extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $level;
    public $subject;
    public $icon;
    public $file;
    public $is_active = true;
    public $uploading = false;
    public $uploadProgress = 0;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'level' => 'required|string',
        'subject' => 'required|string',
        'icon' => 'required|string',
        'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:102400', // 100MB
        'is_active' => 'boolean',
    ];
    
    protected $messages = [
        'title.required' => 'Judul modul harus diisi',
        'title.max' => 'Judul modul maksimal 255 karakter',
        'description.required' => 'Deskripsi modul harus diisi',
        'level.required' => 'Level pendidikan harus dipilih',
        'subject.required' => 'Mata pelajaran harus dipilih',
        'icon.required' => 'Icon harus dipilih',
        'file.file' => 'File harus berupa dokumen yang valid',
        'file.mimes' => 'Format file harus PDF, DOC, DOCX, PPT, atau PPTX',
        'file.max' => 'Ukuran file maksimal 100MB. Silakan kompres file Anda jika terlalu besar.',
    ];

    public function save()
    {
        // Set longer execution time for large file uploads
        set_time_limit(600); // 10 minutes
        ini_set('memory_limit', '512M');
        
        try {
            $this->validate();
            $this->uploading = true;

            // Check if file exists when required
            if (!$this->file) {
                session()->flash('warning', 'Tidak ada file yang dipilih. Modul akan disimpan tanpa file.');
            }

            $module = new Module();
            $module->title = $this->title;
            $module->description = $this->description;
            $module->level = $this->level;
            $module->subject = $this->subject;
            $module->icon = $this->icon;
            $module->is_active = $this->is_active;

            // Handle file upload
            if ($this->file) {
                try {
                    // Get original file name and sanitize it
                    $originalName = $this->file->getClientOriginalName();
                    $extension = $this->file->getClientOriginalExtension();
                    $nameWithoutExt = pathinfo($originalName, PATHINFO_FILENAME);
                    
                    // Create safe filename with timestamp to avoid conflicts but keep readable name
                    $safeFileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._\s-]/', '_', $nameWithoutExt) . '.' . $extension;
                    
                    // Store file with safe name
                    $filePath = $this->file->storeAs('modules', $safeFileName, 'public');
                    
                    if (!$filePath || !Storage::disk('public')->exists($filePath)) {
                        throw new \Exception("Gagal menyimpan file ke storage. Periksa izin direktori.");
                    }
                    
                    $module->file_path = $filePath;
                    $module->file_name = $originalName; // Always keep original name for display
                    $module->file_size = $this->file->getSize();
                    
                    // Debug log
                    \Log::info('File uploaded successfully:', [
                        'original_name' => $originalName,
                        'safe_filename' => $safeFileName,
                        'stored_path' => $filePath,
                        'file_size' => $this->file->getSize(),
                        'mime_type' => $this->file->getMimeType()
                    ]);
                } catch (\Exception $fileError) {
                    \Log::error('File upload error:', [
                        'error' => $fileError->getMessage(),
                        'file' => $this->file ? $this->file->getClientOriginalName() : 'No file'
                    ]);
                    throw new \Exception("Gagal mengupload file: " . $fileError->getMessage());
                }
            }

            $module->save();

            session()->flash('success', 'Modul berhasil ditambahkan!');
            
            // Reset form
            $this->reset();
            
            return redirect()->route('filament.admin.resources.modules.index');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            $this->uploading = false;
            // ValidationException is already handled by Livewire
            throw $e;
        } catch (\Exception $e) {
            $this->uploading = false;
            \Log::error('Module upload error:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            // Provide more user-friendly error messages
            $errorMessage = $e->getMessage();
            if (strpos($errorMessage, 'disk space') !== false || strpos($errorMessage, 'space') !== false) {
                $errorMessage = 'Ruang penyimpanan server tidak cukup. Silakan hubungi administrator.';
            } elseif (strpos($errorMessage, 'permission') !== false) {
                $errorMessage = 'Server tidak memiliki izin untuk menyimpan file. Silakan hubungi administrator.';
            } elseif (strpos($errorMessage, 'timeout') !== false || strpos($errorMessage, 'time') !== false) {
                $errorMessage = 'Waktu upload habis. File mungkin terlalu besar atau koneksi terlalu lambat.';
            }
            
            session()->flash('error', 'Error: ' . $errorMessage);
        }
    }

    public function render()
    {
        return view('livewire.admin.large-file-upload');
    }
}