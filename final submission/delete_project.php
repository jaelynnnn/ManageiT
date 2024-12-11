<!-- delete_project.php / for deleting projects-->
<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectId = $_POST['project_id'];

    try {
        $sql = "DELETE FROM projects WHERE project_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $projectId);

        if ($stmt->execute()) {
            header("Location: project_list.php");
                exit();
        } else {
            echo "Error: Could not delete project.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
