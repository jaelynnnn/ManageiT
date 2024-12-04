<!-- staff_registration.html / this page is for registering staff-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Staff</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <style>
      .container {
        display: flex;
        height: 100vh;
      }

      .sidebar {
        width: 20%;
        background-color: pink;
        color: white;
        padding: 20px;
      }

      .menu {
        margin-bottom: 20px;
        font-weight:
          bold;
        cursor: pointer;
      }

      .menu:hover {
        opacity: 0.8;
        #
      }

      .main-content {
        width: 80%;
        background-color: #ADD8E6;
        padding: 20px;
        color: white;
      }

      .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
      }

      .add-project-btn {
        background-color: pink;
        color: white;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
      }

      .add-project-btn:hover {
        opacity: 0.9;
      }

      body {
        background-color: #ADD8E6;
        font-family: poppins;
      }

      h2 {
        color: white;
        text-align: center;
        text-decoration: underline;
        text-decoration-color: white;
      }

      p {
        font-size: 20px;
      }

      #main {
        margin-left: auto;
        margin-right: auto;
        width: 500px;
        margin-top: 2%;
        background-color: pink;
        border: 2px solid white;
        color: white;
        font-size: 20px;
        text-align: center;
        padding: 20px;
        border-radius: 10px;
      }

      input[type="text"],
      input[type="password"] {
        background-color: transparent;
        border: none;
        border-bottom: 2px solid white;
        color: white;
        padding: 8px 0;
        width: 100%;
        margin-bottom: 15px;
      }

      h1 {
        text-align: left;
        color: white;
      }

      p,
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
      <div class="container">
        <div class="sidebar">
          <h2>ManageiT</h2>
          <div class="sidebar">
            <div class="menu">
              <a href="dashboard.php" style="color: white; text-decoration: none;">Dashboard</a>
            </div>
            <div class="menu">
              <a href="project_list.php" style="color: white; text-decoration: none;">Projects</a>
            </div>
            <div class="menu">
              <a href="staff_register.php" style="color: white; text-decoration: none;">Register Staff</a>
            </div>
            <div class="menu">
              <a href="create_task.php" style="color: white; text-decoration: none;">Create Tasks</a>
            </div>
          </div>
        </div>
        <div id="main">
          <h2>Register Employee</h2>
          <form action="staff_registration.php" method="POST">
            <label>Staff Name</label>
            <input type="text" name="staff_name" required>
            <br></br>
            <label>Staff Email</label>
            <input type="text" name="staff_email" required>
            <br></br>
            <label>Company key</label>
            <input type="password" name="company key" required>
          </form>
        </div>
      </div>
    </body>
</html>