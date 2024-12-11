<!-- this is the dashboarf page, links users to the create projects, manage projects and staff registration pages -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <style>
        body { 
		font-family: poppins; 
		background-color: #ADD8E6; 
		color: white; 
		}
		
        .container { 
		display: flex; flex-direction: column; 
		align-items: center; 
		height: 100vh; justify-content: center; 
		}
		
        .links a { 
		color: white; text-decoration: 
		none; font-size: 1.2em; 
		margin: 10px; 
		background-color: pink; 
		padding: 10px 20px; 
		border-radius: 5px; 
		}
		
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Project Dashboard</h1>
        <div class="links">
            <a href="cproject.html">Create Project</a>
            <a href="project_list.php">View Projects</a>
            <a href="staff_register.php">Register Staff</a>
            <a href="create_tasks.html">Create Tasks</a>
            <a href="tasks_list.php">Tasks list</a>
        </div>
    </div>
</body>
</html>
