<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;port=3307", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create DB
    $pdo->exec("CREATE DATABASE IF NOT EXISTS fittrack");
    echo "<h3>Database 'fittrack' created successfully or already exists.</h3>";
    
    // Use the database
    $pdo->exec("USE fittrack");
    
    // Create Users Table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    echo "<h3>Table 'users' created successfully.</h3>";
    
    // Create Workouts Table
    $sql = "CREATE TABLE IF NOT EXISTS workouts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        activity VARCHAR(255) NOT NULL,
        duration INT NOT NULL,
        calories_burned INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    )";
    $pdo->exec($sql);
    echo "<h3>Table 'workouts' created successfully.</h3>";

    // Create Messages Table
    $sql = "CREATE TABLE IF NOT EXISTS messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
    echo "<h3>Table 'messages' created successfully.</h3>";

    echo "<h2 style='color: green;'>Database Setup Complete! You can now use the entire system.</h2>";
    echo "<a href='index.php'>Go to Home Page</a>";
} catch (PDOException $e) {
    die("<h3 style='color: red;'>DB ERROR: " . $e->getMessage() . "</h3><p>Make sure MySQL is running in your XAMPP Control Panel!</p>");
}
?>
