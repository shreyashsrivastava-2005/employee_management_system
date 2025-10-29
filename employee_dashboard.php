<?php
session_start();
if ($_SESSION['role'] != "employee") {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "formdb");
$emp_id = $_SESSION['emp_id'];

$res = mysqli_query($conn, "SELECT * FROM employee_menu WHERE emp_id=$emp_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee Dashboard</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .dashboard-container {
      background: #fff;
      margin-top: 50px;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      width: 500px;
      text-align: center;
    }

    h2 {
      color: #1d2671;
      margin-bottom: 10px;
    }

    h3 {
      color: #444;
      margin-bottom: 20px;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    ul li {
      background: #f9f9f9;
      margin: 10px 0;
      padding: 12px;
      border-radius: 8px;
      font-size: 16px;
      color: #333;
      text-align: left;
      transition: transform 0.2s, box-shadow 0.2s;
      border-left: 5px solid #1d2671;
    }

    ul li:hover {
      transform: translateX(5px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.08);
    }

    .logout-btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 18px;
      background: #1d2671;
      color: white;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-size: 14px;
      transition: background 0.3s;
    }

    .logout-btn:hover {
      background: #0f1545;
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <h2>Welcome Employee</h2>
    <h3>Your Assigned Menus:</h3>
    <ul>
      <?php while($row = mysqli_fetch_assoc($res)) { ?>
        <li><?php echo $row['menu_name']; ?></li>
      <?php } ?>
    </ul>
    <a href="logout.php" class="logout-btn">Logout</a>
  </div>
</body>
</html>
