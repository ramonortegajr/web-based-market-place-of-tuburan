<?php
require 'config.php';
$id = $_GET['id'];
$date = date("Y/m/d");
$query = "UPDATE tbl_projects SET project_status = 'Completed', date_completed = '$date' WHERE id = '$id';";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location: project_freelancer.php");
    exit();
} else {
    echo "<script type='text/javascript'>alert('Error data please try again!')</script>";
}
?>