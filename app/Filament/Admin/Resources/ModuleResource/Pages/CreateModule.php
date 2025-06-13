<?php

namespace App\Filament\Admin\Resources\ModuleResource\Pages;

use App\Filament\Admin\Resources\ModuleResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateModule extends CreateRecord
{
    protected static string $resource = ModuleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Handle file upload with original name preservation
        if (isset($data['file_path']) && $data['file_path']) {
            $filePath = $data['file_path'];
            
            // Get the temporary file info
            if (Storage::disk('public')->exists($filePath)) {
                // Ensure file_name is preserved from form
                if (isset($data['file_name']) && !empty($data['file_name'])) {
                    // Keep the original name that was set in the form
                    // Don't override it
                } else {
                    // Fallback to basename if somehow not set
                    $data['file_name'] = basename($filePath);
                }
                
                // Set file size
                $data['file_size'] = Storage::disk('public')->size($filePath);
            }
        }

        return $data;
    }

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        // Create the record first
        $record = static::getModel()::create($data);

        // If there's a file upload, rename the physical file to include original name
        if (isset($data['file_path']) && $data['file_path'] && isset($data['file_name'])) {
            $oldPath = $data['file_path'];
            $originalName = $data['file_name'];
            
            if (Storage::disk('public')->exists($oldPath)) {
                // Create new filename with timestamp + original name
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $nameWithoutExt = pathinfo($originalName, PATHINFO_FILENAME);
                $safeFileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', $nameWithoutExt) . '.' . $extension;
                
                $newPath = 'modules/' . $safeFileName;
                
                // Move file to new location with better name
                if (Storage::disk('public')->move($oldPath, $newPath)) {
                    // Update record with new path but keep original name
                    $record->update([
                        'file_path' => $newPath,
                        'file_name' => $originalName // Keep original name for display
                    ]);
                }
            }
        }

        return $record;
    }
}
