<?php
require 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $staffEmail = $_POST['staff_email'];
    $companyKey = $_POST['company_key'];

    try {
        $sql = "SELECT * FROM staff WHERE staff_email = :email AND company_key = :key";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $staffEmail);
        $stmt->bindParam(':key', $companyKey);
        $stmt->execute();

        $staff = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($staff) {
            $_SESSION['staff_id'] = $staff['staff_id'];
            $_SESSION['staff_name'] = $staff['staff_name'];
            $_SESSION['company_key'] = $staff['company_key'];

            $loginTime = date("Y-m-d H:i:s");
            $logSql = "INSERT INTO login_logs (staff_id, login_time) VALUES (:staff_id, :login_time)";
            $logStmt = $pdo->prepare($logSql);
            $logStmt->bindParam(':staff_id', $staff['staff_id']);
            $logStmt->bindParam(':login_time', $loginTime);
            $logStmt->execute();

            header("Location: dashboard.php");
            exit();
        } else {
            echo "<p style='color: red; text-align: center;'>Invalid email or company key.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color: red; text-align: center;'>Database error: " . $e->getMessage() . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <style>
        body {
            background-color: #ADD8E6;
            font-family: Poppins;
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
        <p><a href="company_register.php">Register</a> | <a href="company_login.php">Company login</a></p>
    </div>
    <div id="main">
        <h2>Employee Login</h2>
        <form action="employee_login.php" method="POST">
            <label>Employee Email:</label><br>
            <input type="text" name="staff_email" required><br>
            <label>Company Key:</label><br>
            <input type="password" name="company_key" required><br>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
