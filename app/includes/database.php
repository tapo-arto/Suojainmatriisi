<?php

/**
 * Database Connection & Helper Functions
 */

global $pdo;

if (!isset($pdo)) {
    $pdo = require_once __DIR__ . '/../../config/database.php';
}

/**
 * Execute a query with parameters
 */
function db_query($sql, $params = []) {
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}

/**
 * Fetch one row
 */
function db_fetch_one($sql, $params = []) {
    return db_query($sql, $params)->fetch();
}

/**
 * Fetch all rows
 */
function db_fetch_all($sql, $params = []) {
    return db_query($sql, $params)->fetchAll();
}

/**
 * Insert and return last insert ID
 */
function db_insert($table, $data) {
    global $pdo;
    
    $columns = array_keys($data);
    $placeholders = array_fill(0, count($columns), '?');
    
    $sql = sprintf(
        'INSERT INTO %s (%s) VALUES (%s)',
        $table,
        implode(',', $columns),
        implode(',', $placeholders)
    );
    
    db_query($sql, array_values($data));
    return $pdo->lastInsertId();
}

/**
 * Update rows
 */
function db_update($table, $data, $where, $where_params = []) {
    $set = [];
    foreach (array_keys($data) as $col) {
        $set[] = "$col = ?";
    }
    
    $sql = sprintf(
        'UPDATE %s SET %s WHERE %s',
        $table,
        implode(',', $set),
        $where
    );
    
    $params = array_merge(array_values($data), $where_params);
    return db_query($sql, $params);
}

/**
 * Delete rows
 */
function db_delete($table, $where, $where_params = []) {
    $sql = "DELETE FROM $table WHERE $where";
    return db_query($sql, $where_params);
}
