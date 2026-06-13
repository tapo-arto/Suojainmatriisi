<?php

/**
 * Application Configuration
 */

$config = [
    'app_name' => 'Suojainmatriisi',
    'base_url' => getenv('BASE_URL') ?: 'http://localhost/suojainmatriisi',
    'debug' => (bool)(getenv('DEBUG') ?: false),
    'default_language' => getenv('DEFAULT_LANGUAGE') ?: 'fi',
    
    'session' => [
        'name' => getenv('SESSION_NAME') ?: 'SM',
        'timeout' => (int)(getenv('SESSION_TIMEOUT') ?: 1800),
        'cookie_secure' => false,
        'cookie_httponly' => true,
        'cookie_samesite' => 'Lax',
    ],
    
    'languages' => ['fi', 'sv', 'en', 'it', 'el'],
    
    'uploads' => [
        'directory' => __DIR__ . '/../uploads',
        'max_size' => 10 * 1024 * 1024,
    ],
];

return $config;
