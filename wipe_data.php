<?php
require 'config.php';
$query = "DELETE * FROM tbl_user, user_account, gig_post, tbl_projects";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('Data Wiped successfully!')</script>";
}
?>