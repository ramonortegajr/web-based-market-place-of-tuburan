<?php
require 'config.php';
$id = $_GET['id'];
$query = "DELETE FROM tbl_projects WHERE id = '$id'";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    header("location: project_freelancer.php");
    exit();
} else {
    echo mysqli_error($conn);
}
?>

