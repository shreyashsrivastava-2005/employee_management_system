<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "formdb");
if (!$conn) {
    die("DB Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['btn'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $q1 = "SELECT * FROM owner WHERE email='$email'";
    $res1 = mysqli_query($conn, $q1);
    if ($row1 = mysqli_fetch_assoc($res1)) {
        if ($row1['password'] === $pass) {   
            $_SESSION['role'] = "owner";
            $_SESSION['owner_id'] = $row1['id'];
            header("Location: owner_dashboard.php");
            exit;
        }
    }


    $q2 = "SELECT * FROM employee WHERE email='$email'";
    $res2 = mysqli_query($conn, $q2);
    if ($row2 = mysqli_fetch_assoc($res2)) {
        if ($row2['password'] === $pass) {
            $_SESSION['role'] = "employee";
            $_SESSION['emp_id'] = $row2['id'];
            header("Location: employee_dashboard.php");
            exit;
        }
    }

    echo " Invalid login";
}else{
    header("location:login.php");
}
?>
