<?php
session_start();
if ($_SESSION['role'] != "owner") {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "formdb");

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $designation = $_POST['designation'];

    $ins = "INSERT INTO employee (name, email, password, designation) 
            VALUES ('$name', '$email', '$password', '$designation')";

    if (mysqli_query($conn, $ins)) {
        echo " Employee Added Successfully!<br>";
        echo "<a href='owner_dashboard.php'>Back to Dashboard</a>";
    } else {
        echo " Error: " . mysqli_error($conn);
    }
}
?>
