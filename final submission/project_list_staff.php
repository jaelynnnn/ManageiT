<!-- project_list.php -->
<?php
require 'config.php';

try {
    $sql = "SELECT * FROM projects";
    $stmt = $pdo->query($sql);
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project List</title>
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
    </style>
</head>
<body>
    <div class="table-container">
        <h2>Project List | <a href="staff.html">Return to dashboard</a></h2>
        <table>
            <tr>
                <th>Project Title</th>
                <th>Project Owner</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($projects as $project): ?>
            <tr>
                <td><?php echo htmlspecialchars($project['project_title']); ?></td>
                <td><?php echo htmlspecialchars($project['project_owner']); ?></td>
                <td><?php echo htmlspecialchars($project['project_start']); ?></td>
                <td><?php echo htmlspecialchars($project['project_end']); ?></td>
                <td>
                    <form action="delete_project.php" method="POST" style="display:inline;">
                        <input type="hidden" name="project_id" value="<?php echo $project['project_id']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
