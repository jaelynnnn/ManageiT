<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tasksName = $_POST['tasks_name'];
    $tasksMember = $_POST['tasks_member'];
    $tasksStart = $_POST['tasks_start'];
    $tasksEnd = $_POST['tasks_end'];

    try {
        $sql = "INSERT INTO tasks (tasks_name, tasks_member, tasks_start, tasks_end)
                VALUES (:name, :member, :start, :end)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $tasksName);
        $stmt->bindParam(':member', $tasksMember);
        $stmt->bindParam(':start', $tasksStart);
        $stmt->bindParam(':end', $tasksEnd);

        if ($stmt->execute()) {
            header("Location: tasks_list.php");
            exit();
        } else {
            echo "Error: Could not create tasks.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . htmlspecialchars($e->getMessage());
    }
}
?>
