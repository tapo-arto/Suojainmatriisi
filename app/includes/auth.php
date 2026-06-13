<?php

/**
 * Authentication & Session Management
 */

session_start();

require_once __DIR__ . '/../../config/config.php';

/**
 * Check if user is logged in
 */
function is_logged_in() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Get current user
 */
function get_current_user() {
    if (!is_logged_in()) {
        return null;
    }
    return $_SESSION['user'] ?? null;
}

/**
 * Get current user ID
 */
function get_current_user_id() {
    return $_SESSION['user_id'] ?? null;
}

/**
 * Get current user role
 */
function get_current_user_role() {
    return $_SESSION['user']['role'] ?? null;
}

/**
 * Check if user has permission
 */
function has_permission($permission) {
    $user = get_current_user();
    if (!$user) return false;
    
    $roles = require_once __DIR__ . '/../../config/roles.php';
    $role = $roles[$user['role']] ?? null;
    
    return $role && in_array($permission, $role['permissions'] ?? []);
}

/**
 * Require login
 */
function require_login() {
    if (!is_logged_in()) {
        header('Location: ?page=login');
        exit;
    }
}

/**
 * Require permission
 */
function require_permission($permission) {
    if (!has_permission($permission)) {
        http_response_code(403);
        die('Access Denied');
    }
}

/**
 * Login user
 */
function login_user($user_id, $user_data) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user'] = $user_data;
}

/**
 * Logout user
 */
function logout_user() {
    session_destroy();
    header('Location: ?page=login');
    exit;
}
