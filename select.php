<?php
include('config.php');

if(isset($_POST['submit'])) 
{
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //create insert query
    $query = "INSERT INTO tbl_user (fullname, address, contact, email, type, username, password) VALUES ('$name', '$address', '$contact', '$email', '$type', '$username', '$password')";
    //save to database
    if(mysqli_query($conn, $query))
    {
        echo "<script type='text/javascript'>alert('Data successfully added!')</script>";
        header('location: success.php');
    }
    else
     {
        echo "<script type='text/javascript'>alert('Error in inserting data please try again!')</script>";
     }
}
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Type | Online Market Place for Tuburan Skills Person</title>
</head>
<body>
    <h3 class="title">---Select Type---</h3>
<a href="register.php">
<div class="card">
  <img src="../Online Market Place for Local Skills/upload/prof.png" alt="Avatar" style="width:100%">
  <div class="container">
    <h4 style="font-family:Arial, Helvetica, sans-serif;"><b>Professional</b></h4> 
  </div>
</div>
</a>

<a data-toggle="modal" data-target="#myModal">
<div class="card1">
  <img src="../Online Market Place for Local Skills/upload/prof.png" alt="Avatar" style="width:100%">
  <div class="container1">
    <h4 style="font-family:Arial, Helvetica, sans-serif; text-align:center;" ><b>Client</b></h4> 
  </div>
</div>
</a>
<br>
<a href="login.php"><button style="padding:5px; width:10%; margin-left:45%;">Back</button></a>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">

        <div class="login-container animated fadeInDown bootstrap snippets bootdeys">
            <div class="loginbox bg-white">
                <div class="loginbox-title">Client Form</div>
                <div class="loginbox-social">
                    <div class="social-title ">Please fill out this form to proceed</div>
                </div>
                <div class="loginbox-or">
                    <div class="or-line"></div>
                </div>
                <form action="" method="POST">
                <div class="loginbox-textbox">
                    <input type="text" class="form-control" name="name" placeholder="Fullname">
                </div>
                <div class="loginbox-textbox">
                    <input type="text" class="form-control" name="address" placeholder="Address">
                </div>
            
                <div class="loginbox-textbox">
                    <input type="text" class="form-control" name="contact" placeholder="Contact">
                </div>
            
                
                <div class="loginbox-textbox">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>

                <div class="loginbox-textbox">
                    <input type="text" class="form-control" name="type" value="Client" readonly>
                </div>

                <div class="loginbox-textbox">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>

                <div class="loginbox-textbox">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="loginbox-submit">
                   <button class="btn btn-primary btn-block" type="submit" name="submit"> Save</button>
                </div>
                </form>

                <div class="loginbox-signup">
                    <a href="login.php" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

<style>
h3{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: darkgray;
        text-align: center;
        margin-top: 20px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 10%;
  height: 20%;
  margin-left: 40%;
}

.card1 {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 10%;
  height: 20%;
  margin-left: 52%;
  margin-top: -13.2%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}

.card1:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container1 {
  padding: 2px 16px;
}

.login-container {
    position: relative;
    margin: 10% auto;
    max-width: 340px;
}

.login-container .loginbox {
    position: relative;
    width: 340px !important;
    height: auto !important;
    padding: 0 0 20px 0;
    -webkit-box-shadow: 0 0 14px rgba(0,0,0,.1);
    -moz-box-shadow: 0 0 14px rgba(0,0,0,.1);
    box-shadow: 0 0 14px rgba(0,0,0,.1);
}

.bg-white {
    background-color: #fff !important;
}

.login-container .loginbox .loginbox-title {
    position: relative;
    text-align: center;
    width: 100%;
    height: 35px;
    padding-top: 10px;
    font-family: 'Lucida Sans','trebuchet MS',Arial,Helvetica;
    font-size: 20px;
    font-weight: normal;
    color: #444;
}

.login-container .loginbox .loginbox-social {
    padding: 0 10px 10px;
    text-align: center;
}

.login-container .loginbox .loginbox-social .social-title {
    font-size: 14px;
    font-weight: 500;
    color: #a9a9a9;
    margin-top: 10px;
}

.login-container .loginbox .loginbox-social .social-buttons {
    height: 80px;
    padding: 15px 35px;
    text-align: center;
}

.login-container .loginbox .loginbox-social .social-buttons .button-facebook {
    float: left;
    border: 2px solid #3b5998;
    color: #3b5998;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    margin-right: 30px;
    background-color: #fff;
}

.login-container .loginbox .loginbox-social .social-buttons .button-twitter {
    float: left;
    border: 2px solid #29c1f6;
    color: #29c1f6;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    margin-right: 30px;
    background-color: #fff;
}

.login-container .loginbox .loginbox-social .social-buttons .button-google  {
    float: left;
    border: 2px solid #ef4f1d;
    color: #ef4f1d;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    margin-right: 30px;
    background-color: #fff;
}

.login-container .loginbox .loginbox-social .social-buttons .button-facebook i {
    font-size: 26px;
    line-height: 50px;
}

.login-container .loginbox .loginbox-social .social-buttons .button-twitter i {
    font-size: 26px;
    line-height: 50px;
}

.login-container .loginbox .loginbox-social .social-buttons .button-google i {
    font-size: 26px;
    line-height: 50px;
}

.login-container .loginbox .loginbox-or {
    position: relative;
    text-align: center;
    height: 20px;
}

.login-container .loginbox .loginbox-or .or-line {
    position: absolute;
    height: 1px;
    top: 10px;
    left: 40px;
    right: 40px;
    background-color: #ccc;
}

.login-container .loginbox .loginbox-or .or {
    position: absolute;
    top: 0;
    -lh-property: 0;
    left: -webkit-calc(50% - 25px);
    left: -moz-calc(50% - 25px);
    left: calc(50% - 25px);
    width: 50px;
    height: 20px;
    background-color: #fff;
    color: #999;
    margin: 0 auto;
}

.login-container .loginbox .loginbox-textbox {
    padding: 10px 40px;
}

.login-container .loginbox .loginbox-textbox .form-control {
    -webkit-border-radius: 3px !important;
    -webkit-background-clip: padding-box !important;
    -moz-border-radius: 3px !important;
    -moz-background-clip: padding !important;
    border-radius: 3px !important;
    background-clip: padding-box !important;
}

.login-container .loginbox .loginbox-forgot {
    padding-left: 40px;
}

.login-container .loginbox .loginbox-forgot a {
    font-size: 11px;
    color: #666;
}

.login-container .loginbox .loginbox-submit {
    padding: 10px 40px;
}

.login-container .loginbox .loginbox-signup {
    text-align: center;
    padding-top: 10px;
}

.login-container .loginbox .loginbox-signup a {
    font-size: 13px;
    color: #666;
}

.login-container .logobox {
    width: 340px !important;
    height: 50px !important;
    padding: 5px;
    margin-top: 15px;
    -webkit-box-shadow: 0 0 14px rgba(0,0,0,.1);
    -moz-box-shadow: 0 0 14px rgba(0,0,0,.1);
    box-shadow: 0 0 14px rgba(0,0,0,.1);
    background-color: #fff;
    text-align: left;
}
</style>
</body>
</html>