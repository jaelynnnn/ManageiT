<!-- delete_task.php-->
<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskId = $_POST['task_id'];

    try {
        $sql = "DELETE FROM task WHERE task_id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $taskId);

        if ($stmt->execute()) {
            echo "Task deleted successfully!";
        } else {
            echo "Error: Could not delete this task.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
