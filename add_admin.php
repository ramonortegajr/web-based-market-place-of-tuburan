
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ompls";

//variable
$isVerified = '1';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
      if (isset($_POST['submit'])) {

        $firstname = "NULL";
        $lastname = "NULL";
        $address = "NULL";
        $mobile = "NULL";
        $position ="NULL";
        $email = "NULL";
        $facebook = "NULL";
        $twitter = "NULL";
        $datejoin = "NULL";
        $type = $_POST['type'];
        $username = $_POST['username'];
        $password = $_POST['password'];
     
        $sql = "INSERT INTO user_account (firstname, lastname, address, mobile, position, email, facebook, twitter, datejoin, type, username, password, isVerified)
        VALUES ('$firstname', '$lastname', '$address', '$mobile', '$position', '$email', '$facebook', '$twitter', '$datejoin', '$type', '$username', '$password', '$isVerified')";
        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript">alert("New admin added successfully!") </script>';
        } else {
          echo '<script type="text/javascript">alert("Error please try again!") </script>';
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Admin | Tuburan Skills Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-th"></span>
                      Add New Administrator
                    </h3>
                    
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 separator social-login-box"> <br>
                           <img alt="" class="img-thumbnail" src="../Online Market Place for Local Skills/img/admin.png">                        
                        </div>
                        <form action="" method="post">
                        <div style="margin-top:80px;" class="col-xs-6 col-sm-6 col-md-6 login-box">
                         <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></div>
                              <input class="form-control" type="text" name="username" placeholder="Username">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><span class="glyphicon glyphicon-log-in"></span></div>
                              <input class="form-control" type="text" name="password" placeholder="Password">
                            </div>
                          </div>
                              <input class="form-control" type="hidden" name="type" value="Admin">
                          </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6"></div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <button class="btn icon-btn-save btn-success" type="submit" name="submit">
                            <span class="btn-save-label"><i class="glyphicon glyphicon-floppy-disk"></i></span>save</button>
                            <button class="btn icon-btn-save btn-success">
                            <a href="settings.php" style="text-decoration:none; color:white;"><span class="btn-save-label"><i class="glyphicon glyphicon-arrow-right"></i></span>back</button></a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
body{
background:#eee;
}
.separator {
    border-right: 1px solid #dfdfe0; 
}
.icon-btn-save {
    padding-top: 0;
    padding-bottom: 0;
}
.input-group {
    margin-bottom:10px; 
}
.btn-save-label {
    position: relative;
    left: -12px;
    display: inline-block;
    padding: 6px 12px;
    background: rgba(0,0,0,0.15);
    border-radius: 3px 0 0 3px;
}
</style>

<script type="text/javascript">

</script>
</body>
</html>