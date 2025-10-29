<?php
session_start();
if ($_SESSION['role'] != "owner") {
    header("Location: login.php");
    exit;
}
$conn = mysqli_connect("localhost", "root", "", "formdb");

// fetch employees for dropdown
$employees = mysqli_query($conn, "SELECT * FROM employee");

$menus = [
    "Attendance",
    "Total Fund Collection",
    "Total Register Volunteer",
    "Upcoming Camp",
    "All Enquiry",
    "Gallery",
    "Contact Us"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Assign Menu</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background: #f4f6f9;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .form-container {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      width: 420px;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 8px;
      color: #444;
    }

    select {
      width: 100%;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 14px;
      transition: border-color 0.3s;
    }

    select:focus {
      border-color: #1d2671;
      outline: none;
    }

    .checkbox-group {
      background: #fafafa;
      padding: 12px;
      border-radius: 8px;
      border: 1px solid #ddd;
      max-height: 200px;
      overflow-y: auto;
    }

    .checkbox-group input {
      margin-right: 8px;
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
      margin-top: 15px;
    }

    button:hover {
      background: #0f1545;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Assign Menu to Employee</h2>
    <form method="post" action="assign_menu_code.php">
      <div class="form-group">
        <label>Select Employee:</label>
        <select name="emp_id" required>
          <option value="">--Select--</option>
          <?php while($emp = mysqli_fetch_assoc($employees)) { ?>
            <option value="<?php echo $emp['id']; ?>"><?php echo $emp['name']; ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group">
        <label>Select Menus:</label>
        <div class="checkbox-group">
          <?php foreach ($menus as $m) { ?>
            <label><input type="checkbox" name="menus[]" value="<?php echo $m; ?>"> <?php echo $m; ?></label><br>
          <?php } ?>
        </div>
      </div>

      <button type="submit" name="btn">Assign Menus</button>
    </form>
  </div>
</body>
</html>
