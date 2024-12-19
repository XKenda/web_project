<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $conn = new PDO("mysql:host=localhost", "root", "");
    echo "Connected successfully to MySQL server!";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Try to create database if it doesn't exist
try {
    $conn->exec("CREATE DATABASE IF NOT EXISTS coffee_shop");
    echo "<br>Database coffee_shop created or already exists.";
    
    $conn->exec("USE coffee_shop");
    
    // Create users table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    $conn->exec($sql);
    echo "<br>Table 'users' created or already exists.";
    
} catch(PDOException $e) {
    echo "<br>Error: " . $e->getMessage();
    die();
}
?> 