<?php
// Configuration for the database
$host = 'localhost';
$database = 'manageit';
$user = 'jaelyn';
$pass = '8150';

try {
    // Data Source Name (DSN) specifying the MySQL database
    $dsn = "mysql:host=$host;dbname=$database;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass);

    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
