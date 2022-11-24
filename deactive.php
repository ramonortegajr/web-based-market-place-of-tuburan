<?php
require 'config.php';
$id = $_GET['id'];
$query = "UPDATE user_account SET status = 'Deactive' WHERE id = '$id'";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location: dashboard_admin.php");
    exit();
} else {
    echo "<script type='text/javascript'>alert('Error please try again!')</script>";
}
?>