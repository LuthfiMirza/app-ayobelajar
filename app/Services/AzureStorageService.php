<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class AzureStorageService
{
    protected $disk;

    public function __construct()
    {
        // Use local storage if Azure credentials are not configured
        $azureConfigured = config('filesystems.disks.azure.name') && config('filesystems.disks.azure.key');
        $this->disk = $azureConfigured ? Storage::disk('azure') : Storage::disk('public');
    }

    /**
     * Upload file to Azure Storage
     */
    public function uploadFile(UploadedFile $file, string $directory = 'modules'): array
    {
        try {
            // Generate unique filename
            $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $path = $directory . '/' . $filename;

            // Upload to Azure Storage
            $uploaded = $this->disk->putFileAs($directory, $file, $filename);

            if ($uploaded) {
                return [
                    'success' => true,
                    'path' => $path,
                    'url' => $this->getFileUrl($path),
                    'filename' => $filename,
                    'original_name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mime_type' => $file->getMimeType()
                ];
            }

            return [
                'success' => false,
                'error' => 'Failed to upload file to Azure Storage'
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => 'Upload failed: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Get file URL from Azure Storage
     */
    public function getFileUrl(string $path): string
    {
        return $this->disk->url($path);
    }

    /**
     * Delete file from Azure Storage
     */
    public function deleteFile(string $path): bool
    {
        try {
            return $this->disk->delete($path);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Check if file exists in Azure Storage
     */
    public function fileExists(string $path): bool
    {
        try {
            return $this->disk->exists($path);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get file contents from Azure Storage
     */
    public function getFileContents(string $path): ?string
    {
        try {
            if ($this->fileExists($path)) {
                return $this->disk->get($path);
            }
            return null;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * List files in directory
     */
    public function listFiles(string $directory = 'modules'): array
    {
        try {
            $files = $this->disk->files($directory);
            $result = [];

            foreach ($files as $file) {
                $result[] = [
                    'path' => $file,
                    'url' => $this->getFileUrl($file),
                    'size' => $this->disk->size($file),
                    'last_modified' => $this->disk->lastModified($file)
                ];
            }

            return $result;
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Upload module file with metadata
     */
    public function uploadModule(UploadedFile $file, array $metadata): array
    {
        $uploadResult = $this->uploadFile($file, 'modules');

        if ($uploadResult['success']) {
            // Add metadata
            $uploadResult['metadata'] = $metadata;
            
            // Store metadata in database if needed
            // You can create a Module model to store this information
            
            return $uploadResult;
        }

        return $uploadResult;
    }

    /**
     * Get storage statistics
     */
    public function getStorageStats(): array
    {
        try {
            $files = $this->listFiles();
            $totalSize = 0;
            $fileCount = count($files);

            foreach ($files as $file) {
                $totalSize += $file['size'];
            }

            return [
                'total_files' => $fileCount,
                'total_size' => $totalSize,
                'total_size_mb' => round($totalSize / 1024 / 1024, 2),
                'storage_url' => config('filesystems.disks.azure.url')
            ];
        } catch (\Exception $e) {
            return [
                'total_files' => 0,
                'total_size' => 0,
                'total_size_mb' => 0,
                'error' => $e->getMessage()
            ];
        }
    }
}