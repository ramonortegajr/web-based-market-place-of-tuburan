<?php
include('config.php');
session_start();
$Id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Project Log | Online Market Place for Tuburan Skills Person</title>
</head>
<body style="background-color:beige;">
<div class="container-xl px-4 mt-4">
    <nav aria-label="breadcrumb" class="main-breadcrumb" style="width:100% ;">
            <ol class="breadcrumb"  style="background-color:white;">
              <li class="breadcrumb-item"><a href="dashboard_user.php">Back</a></li>
              <li class="breadcrumb-item active" aria-current="page">Completed Projects</li>
            </ol>
    </nav>
    <!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>

<table id="customers">
  <tr>
    <th>Project Title</th>
    <th>Date Started</th>
    <th>Date Completed</th>
    <th>Handled By</th>
    <th>Status</th>
  </tr>
  <tr>
  <?php
    include('config.php');
    $sql = "SELECT t.project_title, t.project_date, t.id_professional, t.project_status, t.date_completed, u.username FROM tbl_projects AS t INNER JOIN user_account AS u ON t.id_professional = u.id WHERE t.project_status = 'Completed' AND t.id_user = '$Id'";
    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
    while( $record = mysqli_fetch_assoc($resultset) ) {
	?>
    <td><?php echo $record['project_title'];?></td>
    <td><?php echo $record['project_date'];?></td>
    <td><?php echo $record['date_completed'];?></td>
    <td><?php echo $record['username'];?></td>
    <td><?php echo $record['project_status'];?></td>
    <?php }?>
  </tr>
</table>
</body>
</html>