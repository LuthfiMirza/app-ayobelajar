<?php

// Production Configuration for Azure
// This file will be used to create .env file during deployment

return [
    'APP_NAME' => 'AyoBelajar',
    'APP_ENV' => 'production',
    'APP_KEY' => 'base64:GoKiFl+Vtuok72+7V5rV3Wqk2kJtEfTE9HBZ8ZrNWRI=',
    'APP_DEBUG' => 'false',
    'APP_TIMEZONE' => 'UTC',
    'APP_URL' => 'https://ayobelajar-free-app.azurewebsites.net',
    
    'APP_LOCALE' => 'en',
    'APP_FALLBACK_LOCALE' => 'en',
    'APP_FAKER_LOCALE' => 'en_US',
    
    'APP_MAINTENANCE_DRIVER' => 'file',
    'APP_MAINTENANCE_STORE' => 'database',
    
    'BCRYPT_ROUNDS' => '12',
    
    'LOG_CHANNEL' => 'single',
    'LOG_STACK' => 'single',
    'LOG_DEPRECATIONS_CHANNEL' => 'null',
    'LOG_LEVEL' => 'error',
    
    'DB_CONNECTION' => 'mysql',
    'DB_HOST' => 'ayobelajar-mysql-free.mysql.database.azure.com',
    'DB_PORT' => '3306',
    'DB_DATABASE' => 'ayobelajar_db',
    'DB_USERNAME' => 'ayobelajar',
    'DB_PASSWORD' => 'AyoBelajar2024!',
    
    'SESSION_DRIVER' => 'database',
    'SESSION_LIFETIME' => '120',
    'SESSION_ENCRYPT' => 'false',
    'SESSION_PATH' => '/',
    'SESSION_DOMAIN' => 'null',
    
    'BROADCAST_CONNECTION' => 'log',
    'FILESYSTEM_DISK' => 'local',
    'QUEUE_CONNECTION' => 'database',
    
    'CACHE_STORE' => 'database',
    'CACHE_PREFIX' => '',
    
    'MEMCACHED_HOST' => '127.0.0.1',
    
    'REDIS_CLIENT' => 'phpredis',
    'REDIS_HOST' => '127.0.0.1',
    'REDIS_PASSWORD' => 'null',
    'REDIS_PORT' => '6379',
    
    'MAIL_MAILER' => 'log',
    'MAIL_HOST' => '127.0.0.1',
    'MAIL_PORT' => '2525',
    'MAIL_USERNAME' => 'null',
    'MAIL_PASSWORD' => 'null',
    'MAIL_ENCRYPTION' => 'null',
    'MAIL_FROM_ADDRESS' => 'hello@example.com',
    'MAIL_FROM_NAME' => '${APP_NAME}',
    
    'AWS_ACCESS_KEY_ID' => '',
    'AWS_SECRET_ACCESS_KEY' => '',
    'AWS_DEFAULT_REGION' => 'us-east-1',
    'AWS_BUCKET' => '',
    'AWS_USE_PATH_STYLE_ENDPOINT' => 'false',
    
    'VITE_APP_NAME' => '${APP_NAME}',
    
    // Translation API Configuration
    'AZURE_TRANSLATOR_KEY' => '6b91e175e99f498a8dd4b8208e84a87c',
    'AZURE_TRANSLATOR_ENDPOINT' => 'https://api.cognitive.microsofttranslator.com',
    'AZURE_TRANSLATOR_REGION' => 'southeastasia',
    
    'GOOGLE_TRANSLATE_API_KEY' => 'your_google_translate_api_key_here',
];