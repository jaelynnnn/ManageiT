<!-- dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <style>
         body { 
		font-family: poppins; 
		background-color: #ADD8E6; 
		color: white; 
		text-align:center;
		}
		
        .container { 
		display: flex; flex-direction: column; 
		align-items: center; 
		height: 100vh; 
		justify-content: center; 
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
        <h1>ManageiT</h1>
        <div class="links">
            <a href="company_register.php">Company Register</a><br></br>
            <a href="company_login.php">Company Login</a><br></br>
            <a href="employee_login.php">Staff login</a>
	    <a href="login_form.php">Login</a>
	    <a href="register_form.php">Register</a>
        </div>
    </div>
</body>
</html>
