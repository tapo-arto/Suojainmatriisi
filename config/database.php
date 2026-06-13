<?php

/**
 * Database Configuration
 * 
 * Load environment variables or use defaults
 */

$config = [
    'host' => getenv('DB_HOST') ?: 'localhost',
    'name' => getenv('DB_NAME') ?: 'suojainmatriisi',
    'user' => getenv('DB_USER') ?: 'root',
    'password' => getenv('DB_PASSWORD') ?: '',
    'port' => getenv('DB_PORT') ?: 3306,
    'charset' => 'utf8mb4',
];

try {
    $dsn = sprintf(
        'mysql:host=%s;port=%d;dbname=%s;charset=%s',
        $config['host'],
        $config['port'],
        $config['name'],
        $config['charset']
    );
    
    $pdo = new PDO(
        $dsn,
        $config['user'],
        $config['password'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
    
    $pdo->exec("SET NAMES utf8mb4");
    
} catch (PDOException $e) {
    die('Tietokantayhteys epäonnistui: ' . $e->getMessage());
}

return $pdo;
