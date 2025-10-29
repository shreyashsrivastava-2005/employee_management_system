<?php
session_start();
if ($_SESSION['role'] != "owner") {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "formdb");

if (isset($_POST['btn'])) {
    $emp_id = $_POST['emp_id'];
    $menus = $_POST['menus'];

    mysqli_query($conn, "DELETE FROM employee_menu WHERE emp_id=$emp_id");

    foreach ($menus as $m) {
        $ins = "INSERT INTO employee_menu (emp_id, menu_name) VALUES ('$emp_id', '$m')";
        mysqli_query($conn, $ins);
    }

    echo "Menus Assigned Successfully!<br>";
    echo "<a href='owner_dashboard.php'>Back to Dashboard</a>";
}
?>
