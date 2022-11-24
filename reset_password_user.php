<?php
require 'config.php';

if (isset($_POST['reset'])) {
$newpassword = $_POST['newpassword'];
$username = $_POST['username'];
$query = "UPDATE tbl_user SET password = '$newpassword' WHERE username = '$username'";
$result = mysqli_query($conn, $query);
if ($result) {
    mysqli_close($conn);
    echo "<script type='text/javascript'>alert('Password reset successly!')</script>";
} else {
    echo "<script type='text/javascript'>alert('Error please try again!')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login | Online Market Place for Local Skills</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="headertext" style="margin-left:40%;">
    <h2 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Reset Password</h2>
    <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-left:-28px;">Enter your username to reset your password</p>
    </div>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top:100px;">
  <div class="modal-dialog" style="width: 35%;">
  <div class="modal-content">
      <div class="modal-header">
        <br>
      </div>
      <div class="modal-body">
          <form method="POST" class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" name="username" class="form-control input-lg" placeholder="Username">
            </div>

            <div class="form-group">
              <input type="text" name="newpassword" class="form-control input-lg" placeholder="New Password">
            </div>

            <div class="form-group">
              <button type="submit" name="reset" class="btn btn-primary btn-lg btn-block" style="background-color:#47A447; border:0px;">Reset Password</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-1accordion2">
          <button class="btn" data-dismiss="modal" aria-hidden="true"><a href="login.php" style="color:#47A447;">Cancel</a></button>
    	  </div>	
      </div>
  </div>
  </div>
</div>

<style type="text/css">
                
body{margin-top:20px;}              
.modal-footer {   border-top: 0px; }
</style>

<script type="text/javascript">

</script>
</body>
</html>