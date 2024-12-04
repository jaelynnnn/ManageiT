<!-- config.php -->
<?php
$host = 'localhost';
$db = 'manageit';
$user = 'jaelyn'; // my sql username
$pass = '8150'; // my password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>
<!-- config page is for connecting to the database
and so that we dont have to rewrite this on every php page -->