<!-- task.php -->
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
    <title>Task </title>
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
		
		a {
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
		
        tr:hover { 
			background-color: #f5f5f5; 
		}
    </style>
</head>
<body>
    <div class="table-container">
        <h2>Task | <a href="staff.html">Return to dashboard</a></h2>
        <table>
            <tr>
                <th>Task Name</th>
                <th>Member</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?php echo htmlspecialchars($task['tasks_name']); ?></td>
                <td><?php echo htmlspecialchars($task['tasks_member']); ?></td>
                <td><?php echo htmlspecialchars($task['tasks_start']); ?></td>
                <td><?php echo htmlspecialchars($task['tasks_end']); ?></td>
                <td>
                    <form action="delete_task.php" method="POST" style="display:inline;">
                        <input type="hidden" name="tasks_id" value="<?php echo $task['tasks_id']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>