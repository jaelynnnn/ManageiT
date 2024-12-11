<!-- code for creating projects -->
<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectTitle = $_POST['project_title'];
    $projectOwner = $_POST['project_owner'];
    $projectStart = $_POST['project_start'];
    $projectEnd = $_POST['project_end'];

    try {
        $sql = "INSERT INTO projects (project_title, project_owner, project_start, project_end)
                VALUES (:title, :owner, :start, :end)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $projectTitle);
        $stmt->bindParam(':owner', $projectOwner);
        $stmt->bindParam(':start', $projectStart);
        $stmt->bindParam(':end', $projectEnd);

        if ($stmt->execute()) {
            header("Location: project_list.php");
                exit();
        } else {
            echo "Error: Could not create project.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
