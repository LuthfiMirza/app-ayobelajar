<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxFileSize implements ValidationRule
{
    protected $maxSizeInMB;

    public function __construct($maxSizeInMB = 100)
    {
        $this->maxSizeInMB = $maxSizeInMB;
    }

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$value) {
            return; // Allow null/empty values
        }

        // Handle different types of file inputs
        $fileSize = 0;
        
        if (is_string($value)) {
            // File path string - get size from storage
            if (\Storage::disk('public')->exists($value)) {
                $fileSize = \Storage::disk('public')->size($value);
            }
        } elseif (is_object($value) && method_exists($value, 'getSize')) {
            // Uploaded file object
            $fileSize = $value->getSize();
        } elseif (is_array($value) && isset($value['size'])) {
            // Array with size info
            $fileSize = $value['size'];
        }

        $maxSizeInBytes = $this->maxSizeInMB * 1024 * 1024; // Convert MB to bytes

        if ($fileSize > $maxSizeInBytes) {
            $fail("File tidak boleh lebih besar dari {$this->maxSizeInMB}MB. Ukuran file saat ini: " . round($fileSize / (1024 * 1024), 2) . "MB");
        }
    }
}