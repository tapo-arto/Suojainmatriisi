<?php

/**
 * Internationalization & Translation System
 */

require_once __DIR__ . '/../../config/config.php';

global $translations;

$current_lang = $_SESSION['language'] ?? $config['default_language'] ?? 'fi';

if (!in_array($current_lang, $config['languages'])) {
    $current_lang = 'fi';
}

/**
 * Get translation term
 */
function __($key, $lang = null) {
    global $current_lang, $config;
    
    if (!$lang) {
        $lang = $_SESSION['language'] ?? $current_lang;
    }
    
    if (!in_array($lang, $config['languages'])) {
        $lang = 'fi';
    }
    
    $file = __DIR__ . "/../../config/translations/{$lang}.php";
    
    if (!file_exists($file)) {
        return $key;
    }
    
    $translations = require_once $file;
    
    return $translations[$key] ?? $key;
}

/**
 * Get current language
 */
function get_current_language() {
    global $current_lang;
    return $_SESSION['language'] ?? $current_lang;
}

/**
 * Set language
 */
function set_language($lang) {
    global $config, $current_lang;
    
    if (in_array($lang, $config['languages'])) {
        $_SESSION['language'] = $lang;
        $current_lang = $lang;
    }
}
