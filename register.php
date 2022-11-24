<!----Register Code----->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ompls";

//variable
$isVerified = '0';
$isHired = '0';
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
      if (isset($_POST['register'])  && !empty($_FILES["file"]["name"])) {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $position = $_POST['position'];
        $email = $_POST['email'];
        $facebook = $_POST['facebook'];
        $datejoin = $_POST['date'];
        $type = $_POST['type'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $skills = $_POST['skills'];
     
      
      // File upload path
        $targetDir = "upload/";
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

          // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
       
          $sql = "INSERT INTO user_account (firstname, lastname, address, mobile, position, email, facebook, datejoin, type, username, password, isVerified, image, hiredtimes, skills)
          VALUES ('$firstname', '$lastname', '$address', '$mobile', '$position', '$email', '$facebook', '$datejoin', '$type', '$username', '$password', '$isVerified', '".$fileName."', '$isHired', '$skills')";
        if (mysqli_query($conn, $sql)) {
            header('Location: success.php');
        } else {
          echo '<script type="text/javascript">alert("Error please try again!") </script>';
        }
        mysqli_close($conn);
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <title>Register Form | Online Market Place for Skills Person</title>
</head>
<body>
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary" style="color:#47A447;">Register Form |</h1><p style="color:grey ;">Fill up your information to proceed once submitted it will be pending and waiting for approval.</p>
    <hr>
	<div class="row">
  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="../Online Market Place for Local Skills/img/default.png" id="output" class="avatar img-circle img-thumbnail" alt="avatar">
          <h6>Upload a different photo...</h6>
          <input type="file" name="file" class="form-control" onchange="loadFile(event)">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="firstname" type="text" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="lastname" type="text" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <input class="form-control" name="address" type="text" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Contact:</label>
            <div class="col-lg-8">
              <input class="form-control" name="mobile" type="text" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Position:</label>
            <div class="col-lg-8">
              <input class="form-control" name="position" type="text" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="email" placeholder="ex: jessabelcastro@gmail.com" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Facebook:</label>
            <div class="col-lg-8">
              <input class="form-control" name="facebook" type="text" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Date Join:</label>
            <div class="col-lg-8">
              <input class="form-control" type="date" name="date" type="text" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Type:</label>
            <div class="col-lg-8">
              <div class="ui-select">
                <select name="type" class="form-control">
                  <option value="Professional">Professional</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-lg-8">
              <input class="form-control" name="username" type="text" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input class="form-control" name="password" type="password" required>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Skills/Service Offer:</label>
            <div class="col-lg-8">
              <textarea class="form-control" name="skills" id="" cols="30" rows="10" required></textarea>
            </div>
          </div>

          <br>
          <div class="btn-all">
            <button type="submit" name="register" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Register</type=></button> <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-home"></span>Back Homepage</a>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>

<style type="text/css">
.btn-all {
    margin-left: 63%;
}

body{margin-top:20px;}
.avatar{
width:200px;
height:200px;
}				              
</style>

<script type="text/javascript">
//preview image before upload
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
</body>
</html>