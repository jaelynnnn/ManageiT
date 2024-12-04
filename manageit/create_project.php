<?php
// Include the database configuration
require 'config.php'; // Ensure this file includes the $pdo connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $projectTitle = $_POST['project_title'];
    $projectOwner = $_POST['project_owner'];
    $projectStart = $_POST['project_start'];
    $projectEnd = $_POST['project_end'];

    // Validate dates
    if (!preg_match("/\d{4}-\d{2}-\d{2}/", $projectStart) || !preg_match("/\d{4}-\d{2}-\d{2}/", $projectEnd)) {
        echo "Invalid date format. Use YYYY-MM-DD.";
        exit();
    }

    try {
        // Prepare the SQL query to insert the new project
        $sql = "INSERT INTO projects (project_title, project_owner, project_start, project_end)
                VALUES (:title, :owner, :start, :end)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':title', $projectTitle);
        $stmt->bindParam(':owner', $projectOwner);
        $stmt->bindParam(':start', $projectStart);
        $stmt->bindParam(':end', $projectEnd);

        // Execute and check success
        if ($stmt->execute()) {
            echo "Project created successfully!";
            // Optionally, redirect to dashboard or project list page
            // header("Location: dashboard.php");
            exit();
        } else {
            echo "Error: Could not create project.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
