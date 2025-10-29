<?php
session_start();
if(isset($_POST['del'])){
    $ids = $_POST['del_emp'];
    $extract_id = implode(",",$ids);

    $conn = mysqli_connect("localhost", "root", "", "formdb");
    $del = "DELETE FROM employee WHERE id IN($extract_id)";

    if(mysqli_query($conn, $del)){
        echo "<script>alert('Data deleted');
        window.location.href='show_employee.php'</script>";
    }else{
        echo "<script>alert('Data not deleted');
        window.location.href='show_employee.php'</script>";
    }
}else{
    header("location:show_employee.php");
    exit();
}
?>