<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Module extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'level',
        'subject',
        'file_path',
        'file_name',
        'file_size',
        'file_type',
        'azure_url',
        'is_active',
        'uploaded_by'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getFileSizeFormattedAttribute()
    {
        if (!$this->file_size) {
            return null;
        }
        
        $bytes = floatval($this->file_size);
        $units = ['B', 'KB', 'MB', 'GB'];
        
        for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
            $bytes /= 1024;
        }
        
        return round($bytes, 1) . $units[$i];
    }

    public function getIsPreviewableAttribute()
    {
        if (!$this->file_path) {
            return false;
        }
        
        $extension = strtolower(pathinfo($this->file_path, PATHINFO_EXTENSION));
        $previewableExtensions = ['pdf', 'txt', 'doc', 'docx'];
        
        return in_array($extension, $previewableExtensions);
    }

    public function getFileExtensionAttribute()
    {
        if (!$this->file_path) {
            return null;
        }
        
        return strtolower(pathinfo($this->file_path, PATHINFO_EXTENSION));
    }

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($module) {
            // Handle file upload
            if ($module->isDirty('file_path') && $module->file_path) {
                $filePath = $module->file_path;
                if (Storage::disk('public')->exists($filePath)) {
                    // Always ensure file_size is set
                    $module->file_size = Storage::disk('public')->size($filePath);
                    
                    // If file_name is empty, set it to the basename of the file path
                    // This is a fallback, but ideally file_name should be set to the original name during upload
                    if (empty($module->file_name)) {
                        $module->file_name = basename($filePath);
                        \Log::warning('Module file_name was empty during update. Using basename as fallback.', [
                            'module_id' => $module->id,
                            'file_path' => $filePath,
                            'basename' => basename($filePath)
                        ]);
                    }
                } else {
                    \Log::error('File does not exist in storage during module update', [
                        'module_id' => $module->id,
                        'file_path' => $filePath
                    ]);
                }
            }
        });

        static::creating(function ($module) {
            // Handle file upload for new records
            if ($module->file_path) {
                $filePath = $module->file_path;
                if (Storage::disk('public')->exists($filePath)) {
                    // Always ensure file_size is set
                    $module->file_size = Storage::disk('public')->size($filePath);
                    
                    // If file_name is empty, set it to the basename of the file path
                    // This is a fallback, but ideally file_name should be set to the original name during upload
                    if (empty($module->file_name)) {
                        $module->file_name = basename($filePath);
                        \Log::warning('Module file_name was empty during creation. Using basename as fallback.', [
                            'file_path' => $filePath,
                            'basename' => basename($filePath)
                        ]);
                    }
                } else {
                    \Log::error('File does not exist in storage during module creation', [
                        'file_path' => $filePath
                    ]);
                }
            }
        });

        static::deleting(function ($module) {
            // Delete file when module is deleted
            if ($module->file_path && Storage::disk('public')->exists($module->file_path)) {
                Storage::disk('public')->delete($module->file_path);
            }
        });
    }
}
