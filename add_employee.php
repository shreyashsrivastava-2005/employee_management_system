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
  <title>Add Employee</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background: #f4f6f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      width: 400px;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 6px;
      color: #555;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
      transition: border-color 0.3s;
    }

    .form-group input:focus {
      border-color: #1d2671;
      outline: none;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: #1d2671;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #0f1545;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Add Employee</h2>
    <form method="post" action="employee_code.php">
      <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" required>
      </div>

      <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" required>
      </div>

      <div class="form-group">
        <label>Password:</label>
        <input type="password" name="password" required>
      </div>

      <div class="form-group">
        <label>Designation:</label>
        <input type="text" name="designation" required>
      </div>

      <button name="btn">Save Employee</button>
    </form>
  </div>
</body>
</html>
