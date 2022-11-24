<?php
require 'config.php';
$verified = '1';
$id = $_GET['id'];
$query = "UPDATE user_account SET isVerified = '$verified' WHERE id = '$id';";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location: dashboard_admin.php");
    exit();
} else {
    echo "<script type='text/javascript'>alert('Error in verifying data please try again!')</script>";
}
?>