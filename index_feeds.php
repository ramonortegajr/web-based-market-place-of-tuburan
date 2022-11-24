<?php
session_start();
include('config.php');

$Id = $_SESSION['id'];
$user_name = $_SESSION['username'];
$pass_word = $_SESSION['password'];
$type = $_SESSION['type'];

if(!$_SESSION['id'] && !$_SESSION['username'] && !$_SESSION['password'])  
{  
    header("Location: login.php");//redirect to the login page to secure the welcome page without login access.  
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile | Online Market Place for Tuburan Skills Person</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
<div class="container">
    <div class="main-body">
      <!-- Breadcrumb -->
   <nav aria-label="breadcrumb" class="main-breadcrumb" style="width:100% ;">
            <ol class="breadcrumb"  style="background-color:white;">
              <li class="breadcrumb-item"><a href="index_feeds.php" style="text-decoration:underline;">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page" ><a href="user_landing.php">Professional List</a></li>
              <li class="breadcrumb-item" aria-current="page"><a href="services_user_side.php">Services Offer</a></li>
              <li class="breadcrumb-item" aria-current="page"><a href="logout.php">Logout</a></li>

              <li class="breadcrumb-item" aria-current="page"><a href="dashboard_user.php">Dashboard</a></li>
            </ol>
    </nav>
    <!-- End Breadcrumb -->
            <?php 
            include('config.php');
            //query code to pullout info
                $sql = "SELECT * FROM tbl_user WHERE id = '$Id'";
                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
            $row = mysqli_fetch_assoc($resultset);
            ?>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                    <small>Recently Joined</small>
                    <hr>
                    <?php
                                include('config.php');
                                $sql = "SELECT * FROM user_account WHERE type = 'Professional' ORDER BY datejoin DESC LIMIT 3";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
                                while( $record = mysqli_fetch_assoc($resultset) ) {
                                 $imageURL = 'upload/'.$record["image"];
			         ?>
                      <a href="profile_user.php?id=<?php echo $record['id'];?>">
                    <div class="card card-body" style="margin-bottom:4px;">
                          <img src="<?php echo $imageURL;?>" alt="picture" style="border-radius:50%; float:left; margin-left:-10px; width:30px; height:30px;"> <small style="font-size:12px; margin-left:30%; margin-top:-20px;"><?php echo $record['firstname'];?> <?php echo $record['lastname'];?> | <?php echo $record['position'];?></small>
                     </div>
                      </a>
                     <?php }?>
                </div>
              </div>
            </div>
          </div>

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <small>Top Avail Gigs</small>
                    <hr>
                    <?php
                                include('config.php');
                                $sql = "SELECT * FROM gig_post ORDER BY isavail DESC LIMIT 5";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
                                while( $record = mysqli_fetch_assoc($resultset) ) {
                                 $imageURL = 'gigs/'.$record["image"];
			         ?>
                    <a href="avail_user_side.php?id=<?php echo $record['id'];?>">
                    <div class="card card-body" style="margin-bottom:4px;">
                          <img src="<?php echo $imageURL;?>" alt="picture" style="float:left; margin-left:-8px; width:50px; height:50px;"> <small style="font-size:12px; margin-left:30%; margin-top:-20px;"><?php echo $record['category'];?> | Posted Date: <?php echo $record['date'];?> | Avail Times: <?php echo $record['isavail'];?></small>
                     </div>
                      </a>
                     <?php }?>
                </div>
              </div>
            </div>
          </div>
            
            <div class="col-sm-7 mb-3" style="overflow:hidden; margin-left:32%;margin-top:-50%; height:640px; width: 585px;">
                  <div class="card h-100">
                    <div class="card-body" style="overflow-y:scroll;">
                       <small>Gig Feeds</small>
                     <hr>
                     <?php
                        include('config.php');
                            $sql = "SELECT u.id AS uidd, g.id, u.firstname, u.lastname, g.id, g.category, g.posted_by, g.content, g.date, g.isavail, u.image AS umage, g.image AS gmage FROM gig_post AS g INNER JOIN user_account AS u ON g.id_post = u.id  ORDER BY date DESC";
                            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
                            while( $record = mysqli_fetch_assoc($resultset) ) {
                            $imageURL2 = 'gigs/'.$record["gmage"];
                            $imageURL1 = 'upload/'.$record["umage"];
			        ?>
                       <div class="card" style="padding:20px;">
                        <div class="image">
                            <img src="<?php echo $imageURL1;?>" alt="picture" style="border-radius:50%; width:30px; height:30px;">
                            <b><small><a href="profile_user.php?id=<?php echo $record['uidd'];?>"><?php echo $record['firstname'];?> <?php echo $record['lastname'];?></a> | Posted On:<?php echo $record['date'];?></small></b>
                        </div>
                        <div class="body-post">
                          <a href="#"><small><?php echo $record['category'];?></small></a>
                          <br>
                          <small><?php echo $record['content'];?></small>
                         <br>
                          <img src="<?php echo $imageURL2;?>" alt="pic" style="width:200px; height:150px; align-items:center; margin:none;">
                          <br>
                          <br>
                          <a href="avail_user_side.php?id=<?php echo $record['id'];?>" class="btn btn-success" style="width:40%;"><span class="glyphicon glyphicon-shopping-cart"></span> Avail</a>
                        </div>
                       </div>
                       <br>
                       <?php }?>
                       </div>
                    </div>
                  </div>
            </div>

                <div class="col-sm-2 mb-3" style="overflow:hidden; margin-left:83%;margin-top:-60%; ">
                  <div class="card h-100">
                    <div class="card-body">
                    <small>Rankings</small>
                     <hr>
                     <?php
                                include('config.php');
                                $sql = "SELECT * FROM user_account WHERE type = 'Professional' ORDER BY hiredtimes DESC LIMIT 10";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
                                while( $record = mysqli_fetch_assoc($resultset) ) {
                                 $imageURL = 'upload/'.$record["image"];
			         ?>
                       <a href="profile_user.php?id=<?php echo $record['id'];?>">
                        <div class="card card-body" style="margin-bottom:4px;">
                          <img src="<?php echo $imageURL;?>" alt="picture" style="border-radius:50%; float:left; margin-left:-10px; width:30px; height:30px;"> <small style="font-size:10px; margin-left:30%; margin-top:-20px;"><?php echo $record['firstname'];?> <?php echo $record['lastname'];?></small>
                        </div>
                        <?php }?>
                    </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>

<style type="text/css">
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

</style>

<script type="text/javascript">

</script>
</body>
</html>