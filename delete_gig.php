<?php
require 'config.php';
$id = $_GET['id'];
$query = "DELETE FROM gig_post WHERE id = '$id';";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location: gig_admin.php");
    exit();
} else {
    echo "<script type='text/javascript'>alert('Error in deleting data please try again!')</script>";
}
?>