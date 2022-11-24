<?php
require 'config.php';
$id = $_GET['id'];
$query = "UPDATE tbl_projects SET project_status = 'Ongoing' WHERE id = '$id';";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location: project_freelancer.php");
    exit();
} else {
    echo "<script type='text/javascript'>alert('Error data please try again!')</script>";
}
?>