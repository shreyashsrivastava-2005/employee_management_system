<?php
session_start();
if ($_SESSION['role'] != "owner") {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "formdb");
$res = mysqli_query($conn, "SELECT * FROM employee");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employees</title>
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 30px;
    }

    table {
      width: 90%;
      margin: 0 auto;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 14px 18px;
      text-align: left;
    }

    th {
      background: #1d2671;
      color: #fff;
      font-size: 16px;
    }

    tr:nth-child(even) {
      background: #f9f9f9;
    }

    tr:hover {
      background: #f1f1f1;
    }

    td a {
      text-decoration: none;
      color: #fff;
      padding: 8px 12px;
      border-radius: 6px;
      font-size: 14px;
      transition: background 0.3s;
    }

    td a:first-child {
      background: #28a745; /* Green for Edit */
    }

    td a:first-child:hover {
      background: #218838;
    }

    td a:last-child {
      background: #dc3545; /* Red for Delete */
      margin-left: 8px;
    }

    td a:last-child:hover {
      background: #c82333;
    }
  </style>
</head>
<body>
  <h2>Employee List</h2>
  <form action="delete_multiple.php" method="post">
    <table>
      <tr>
        <th><button name='del'>Delete</button></th>
        <th>Name</th>
        <th>Email</th>
        <th>Designation</th>
        <th>Actions</th>
      </tr>
      <?php while ($row = mysqli_fetch_assoc($res)) { ?>
        <tr>
          <td><input type="checkbox" name="del_emp[]" value="<?php echo $row['id']; ?>"></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['designation']; ?></td>
          <td>
            <a href="edit_employee.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a href="delete_employee.php?id=<?php echo $row['id']; ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>
    </table>
  </form>
</body>
</html>
