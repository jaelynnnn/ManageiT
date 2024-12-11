<!-- delete_task.php / for deleting tasks -->
<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tasksId = $_POST['tasks_id'];

    try {
        $sql = "DELETE FROM tasks WHERE tasks_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $tasksId);

        if ($stmt->execute()) {
            header("Location: tasks_list.php");
            exit();
        } else {
            echo "Error: Could not delete tasks.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
