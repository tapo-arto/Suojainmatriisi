<?php

/**
 * CSRF Token Protection
 */

/**
 * Generate CSRF token
 */
function sf_csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 */
function sf_verify_csrf_token($token) {
    if (!isset($_SESSION['csrf_token'])) {
        return false;
    }
    return hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Get CSRF token for HTML forms
 */
function sf_csrf_input() {
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars(sf_csrf_token()) . '">';
}
