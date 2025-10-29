<?php
session_start();
if ($_SESSION['role'] != "owner") {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Owner Dashboard</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #1d2671, #c33764);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .dashboard {
      background: #fff;
      padding: 40px 50px;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
      text-align: center;
      width: 400px;
    }

    .dashboard h1 {
      color: #333;
      margin-bottom: 30px;
      font-size: 26px;
    }

    .dashboard a {
      display: block;
      margin: 12px 0;
      padding: 12px;
      background: #1d2671;
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      font-size: 16px;
      transition: background 0.3s, transform 0.2s;
    }

    .dashboard a:hover {
      background: #c33764;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <div class="dashboard">
    <h1>Welcome Owner</h1>
    <a href="add_employee.php">➕ Add Employee</a>
    <a href="show_employee.php">👥 Show Employees</a>
    <a href="assign_menu.php">📋 Assign Menu to Employee</a>
  </div>
</body>
</html>
