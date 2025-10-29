<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != "owner") {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "formdb");

if (isset($_GET['id'])) {
    $emp_id = $_GET['id'];

    // delete employee
    $del = "DELETE FROM employee WHERE id = '$emp_id'";
    if (mysqli_query($conn, $del)) {
        echo "<script> alert('Employee deleted successfully!');
        window.locstion.href='show_employee.php'</script>";
    } else {
        echo "Error deleting employee: " . mysqli_error($conn);
    }
} else {
    header("Location: show_employee.php");
}
?>
