<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>

<div class="sidebar">
    <h2 style="text-align:center;">Dashboard</h2>
    <a href="pages/cproject.html">+ Add New Project</a>
    <a href="register_employee.php">+ Register Employee</a>
    <a href="pages/clogin.html">Company Login</a>
    <a href="pages/elogin.html">Employee Login</a>
    <a href="pages/rcompany.html">Register Company</a>
</div>

<div id="main" style="margin-left:220px;">
    <h2>Welcome to Your Dashboard</h2>
    
    <!-- List of projects, for demonstration, this is static; you can replace with dynamic content -->
    <div class="project-card">
        <h3>Project 1</h3>
        <p>Deadline: 2024-12-31</p>
    </div>
    
    <div class="project-card">
        <h3>Project 2</h3>
        <p>Deadline: 2025-01-15</p>
    </div>
</div>

</body>
</html>
