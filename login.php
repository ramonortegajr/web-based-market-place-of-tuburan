<!----Login Code----->
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ompls";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
  if (isset($_POST['login'])) {
  
      $isVerified = '1';
      extract($_POST);
      $sql = mysqli_query($conn,"SELECT * FROM user_account WHERE username = '$username' AND password='$password' AND type = '$type' AND isVerified = '$isVerified'");
      $row  = mysqli_fetch_array($sql);
      if(is_array($row) && $row['type'] == 'Admin' && $row['isVerified'] == $isVerified)
      {
        $_SESSION['id'] = $row['id'];
        $_SESSION["username"] =  $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['type'] = $row['type'];
        $_SESSION['isVerified'] = $row['isVerified'];
        header("Location: dashboard_admin.php"); 
      }

      else if(is_array($row) && $row['type'] == 'Professional' && $row['isVerified'] == $isVerified)
      {
        $_SESSION['id'] = $row['id'];
        $_SESSION["username"] =  $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['type'] = $row['type'];
        $_SESSION['isVerified'] = $row['isVerified'];
        header("Location: dashboard_freelancer.php"); 
       
      }

      else if(is_array($row) && $row['type'] != 'Admin' || $row['type'] != 'Professional')
      {
        extract($_POST);
        $sql = mysqli_query($conn,"SELECT * FROM tbl_user WHERE username = '$username' AND password='$password' AND type = '$type'");
        $row  = mysqli_fetch_array($sql);

        
        $_SESSION['id'] = $row['id'];
        $_SESSION["username"] =  $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['type'] = $row['type'];
        header("Location: index_feeds.php"); 
       
      }

      else {
        echo "<script type'text/javascript'>alert('Invalid credentials please try again!')</script>";
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
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" style="width: 35%;">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><a href="index.php">×</button></a>
          <h1 class="text-center" style="color:#47A447;">Login </h1>
      </div>
      <div class="modal-body">
          <form method="POST" class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" name="username" class="form-control input-lg" placeholder="Username">
            </div>

            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Password">
            </div>

            <div class="form-group">
              <select name="type" id="type" class="form-control input-lg">
              <b><option value="Select">-Select-</option></b>
                <option value="Admin">Admin</option>
                <option value="Professional">Professional</option>
                <option value="Client">Client</option>
              </select>
            </div>

            <div class="form-group">
              <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" style="background-color:#47A447; border:0px;">Sign In</button>
              <span class="pull-right"><a href="select.php" style="color:#47A447 ;">Register</a></span><span><a href="reset_password.php" style="color:#47A447 ;">Forgot password?</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-1accordion2">
          <button class="btn" data-dismiss="modal" aria-hidden="true"><a href="index.php" style="color:#47A447;">Cancel</a></button>
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