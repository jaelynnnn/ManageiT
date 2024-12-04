<?php
require 'config.php';

$message = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = $_POST['company_name'];
    $companyPass = $_POST['password']; 
    $confirmPassword = $_POST['confirm_password']; 
    $companyEmail = $_POST['email']; 
    $companyKey = $_POST['company_key']; 
    $confirmKey = $_POST['confirm_key']; 

    // making sure passwords and keys match
    if ($companyPass !== $confirmPassword) {
        $message = "Passwords do not match.";
    } elseif ($companyKey !== $confirmKey) {
        $message = "Company keys do not match.";
    } else {
		// hashimng the password for secuirty
        $companyPass = password_hash($companyPass, PASSWORD_DEFAULT); 

        try {
            $sql = "INSERT INTO company (company_name, company_pass, company_email, company_key) VALUES (:name, :pass, :email, :key)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $companyName);
            $stmt->bindParam(':pass', $companyPass);
            $stmt->bindParam(':email', $companyEmail);
            $stmt->bindParam(':key', $companyKey);

            if ($stmt->execute()) {
                // will redirect to the company login
                header("Location: company_login.php");
                exit(); 
            } else {
                $message = "Error: Could not register company.";
            }
        } catch (PDOException $e) {
            $message = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Registration</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <style>
        body {
            background-color: #ADD8E6;
            font-family: poppins;
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
        input[type="text"], input[type="password"], input[type="email"] {
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
        <p><a href="company_login.php">Company login</a> | <a href="employee_login.php">Employee login</a></p>
    </div>
    <div id="main">
        <h2>Company Registration</h2>
        <?php if ($message): ?>
            <div id="main"><?php echo $message; ?></div>
        <?php endif; ?>
        <form action="company_register.php" method="POST">
            <label for="company_name">Company Name</label>
            <input type="text" name="company_name" id="company_name" required>
            <br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <br>
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
            <br>
            <label for="company_key">Company Key</label>
            <input type="text" name="company_key" id="company_key" required>
            <br>
            <label for="confirm_key">Confirm Key</label>
            <input type="text" name="confirm_key" id="confirm_key" required>
            <br>
            <input type="submit" value="Register">
        </form>
		</div>
    </div>
</body>
</html>
