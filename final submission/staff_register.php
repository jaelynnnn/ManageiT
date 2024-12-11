<?php
require 'config.php'; // Database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $staffName = htmlspecialchars($_POST['staff_name']);
    $staffEmail = htmlspecialchars($_POST['staff_email']);
    $staffKey = htmlspecialchars($_POST['staff_key']);

    try {
        // Insert staff details into the database
        $sql = "INSERT INTO staff (staff_name, staff_email, staff_key) VALUES (:staff_name, :staff_email, :staff_key)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':staff_name', $staffName);
        $stmt->bindParam(':staff_email', $staffEmail);
        $stmt->bindParam(':staff_key', $staffKey);
        $stmt->execute();

        echo "<p style='color: green; text-align: center;'>Staff successfully registered!</p>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Duplicate entry error
            echo "<p style='color: red; text-align: center;'>Email or staff key already exists. Please use different values.</p>";
        } else {
            echo "<p style='color: red; text-align: center;'>Database error: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Staff</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <style>
      .container {
        display: flex;
        height: 100vh;
      }

      .sidebar {
        width: 20%;
        background-color: pink;
        color: white;
        padding: 20px;
      }

      .menu {
        margin-bottom: 20px;
        font-weight: bold;
        cursor: pointer;
      }

      .menu:hover {
        opacity: 0.8;
      }

      .main-content {
        width: 80%;
        background-color: #ADD8E6;
        padding: 20px;
        color: white;
      }

      body {
        background-color: #ADD8E6;
        font-family: Poppins, sans-serif;
      }

      h2 {
        color: white;
        text-align: center;
        text-decoration: underline;
        text-decoration-color: white;
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

      input[type="text"],
      input[type="password"] {
        background-color: transparent;
        border: none;
        border-bottom: 2px solid white;
        color: white;
        padding: 8px 0;
        width: 100%;
        margin-bottom: 15px;
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
    <div class="container">
      <div class="sidebar">
      <div class="menu">
				<a href="dashboard.php" style="color: white; text-decoration: none;">Dashboard</a>
			</div>
            <div class="menu">
				<a href="project_list.php" style="color: white; text-decoration: none;">Projects</a>
			</div>
            <div class="menu">
				<a href="staff_register.php" style="color: white; text-decoration: none;">Register Staff</a>
			</div>
            <div class="menu">
              <a href="tasks_list.php" style="color: white; text-decoration: none;">Create Tasks</a>
            </div>
      </div>
      <div id="main">
        <h2>Register Employee</h2>
        <form action="staff_register.php" method="POST">
          <label>Staff Name</label>
          <input type="text" name="staff_name" required>
          <br>
          <label>Staff Email</label>
          <input type="text" name="staff_email" required>
          <br>
          <label>Company Key</label>
          <input type="password" name="staff_key" required>
          <br>
          <input type="submit" value="Register">
        </form>
      </div>
    </div>
  </body>
</html>