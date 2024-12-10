<!-- task_list.php -->
<?php
require 'config.php';

try {
    $sql = "SELECT * FROM tasks";
    $stmt = $pdo->query($sql);
    $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <style>
        body { 
		font-family: "Poppins", sans-serif; 
		background-color: #ADD8E6; 
		color: white; 
		}
        .table-container { 
			width: 80%; 
		margin: 50px auto; 
		}
		
        table { 
			width: 100%; 
			border-collapse: collapse; 
		}
		
        th, td { 
			padding: 10px; 
			text-align: left; 
			border-bottom: 1px solid #ddd; 
		}
        th { 
			background-color: pink; 
		}
		
        tr:hover { 
			background-color: #f5f5f5; 
		}
    </style>
</head>
<body>
    <div class="table-container">
        <h2>Task List</h2>
        <table>
            <tr>
                <th>Task Title</th>
                <th>Name of 1st person assigned to task</th>
				<th>Name of 2nd person assigned to task</th>
				<th>Name of 3rd person assigned to task</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Delete Task</th>
            </tr>
            <?php foreach ($task as $task): ?>
            <tr>
                <td><?php echo htmlspecialchars($task['task_title']); ?></td>
                <td><?php echo htmlspecialchars($task['first_assignee']); ?></td>
				<td><?php echo htmlspecialchars($task['second_assignee']); ?></td>
				<td><?php echo htmlspecialchars($task['third_assignee']); ?></td>
                <td><?php echo htmlspecialchars($task['task_start']); ?></td>
                <td><?php echo htmlspecialchars($task['task_end']); ?></td>
                <td>
                    <form action="delete_task.php" method="POST" style="display:inline;">
                        <input type="hidden" name="task_id" value="<?php echo task['task_id']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>