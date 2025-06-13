<?php

// Script to create .env file from production config
echo "Creating .env file for production...\n";

// Load production configuration
$config = require 'config.production.php';

// Create .env content
$envContent = '';
foreach ($config as $key => $value) {
    // Handle special cases for values that need quotes or special formatting
    if ($value === 'null') {
        $envContent .= "{$key}=null\n";
    } elseif (strpos($value, ' ') !== false || strpos($value, '$') !== false) {
        $envContent .= "{$key}=\"{$value}\"\n";
    } else {
        $envContent .= "{$key}={$value}\n";
    }
}

// Write to .env file
file_put_contents('.env', $envContent);

echo ".env file created successfully!\n";
echo "Content preview:\n";
echo substr($envContent, 0, 500) . "...\n";
?>