<?php
require 'config.php';
$id = $_GET['id'];
$query = "DELETE FROM gig_post WHERE id = '$id';";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location: dashboard_freelancer.php");
    exit();
} else {
    echo "<script type='text/javascript'>alert('Error in declining data please try again!')</script>";
}
?>