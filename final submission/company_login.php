<?php
require 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = $_POST['company_name'];
    $companyPass = $_POST['company_pass'];

    try {
        $sql = "SELECT * FROM company WHERE company_name = :name";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $companyName);
        $stmt->execute();
        $company = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($company && password_verify($companyPass, $company['company_pass'])) {
            $_SESSION['company_id'] = $company['company_id'];
            $_SESSION['company_name'] = $company['company_name'];
            header("Location: dashboard.php"); //redirects to the dashboard
            exit();
        } else {
            echo "Invalid company name or password.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <style>
        body {
            background-color: #ADD8E6;
            font-family: "Poppins", sans-serif;
        }
        h2 {
            color: white;
            text-align: center;
            text-decoration: underline;
            text-decoration-color: white;
        }
        p {
            font-size: 20px;
        }
        #main {
            margin-left: auto;
            margin-right: auto;
            width: 500px;
            margin-top: 2%;
            background-color: pink;
            border: 2px solid white;
            color: white;
            font-size: 20px;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
        }
        input[type="text"], input[type="password"] {
            background-color: transparent;
            border: none;
            border-bottom: 2px solid white;
            color: white;
            padding: 8px 0;
            width: 100%;
            margin-bottom: 15px;
        }
        h1 {
            text-align: left;
            color: white;
        }
        #header {
            border-bottom: white solid 2px;
            padding: 10px;
        }
        p, a {
            font-size: 20px;
            color: white;
            text-decoration: none;
        }
        input[type="submit"] {
            background-color: white;
            color: pink;
            border: 2px solid pink;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="header">
        <h1>ManageiT</h1>
        <p><a href="company_register.php">Register</a> | <a href="employee_login.php">Employee login</a></p>
    </div>
    <div id="main">
        <h2>Company Login</h2>
        <form action="company_login.php" method="POST">
            <label>Company Name</label>
            <input type="text" name="company_name" required>
            <br><br>
            <label>Password</label>
            <input type="password" name="company_pass" required>
            <br><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
