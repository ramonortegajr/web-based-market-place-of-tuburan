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

<?php
  include('config.php');
  // SQL QUERY
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user_account WHERE id = $id";
    // FETCHING DATA FROM DATABASE
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $imageURL = 'upload/'.$row["image"];
  }
   $conn->close();
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
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb"  style="background-color:white;">
              <li class="breadcrumb-item"><a href="index_feeds.php">Back</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
              <li class="breadcrumb-item" aria-current="page"><a href="logout.php">Logout</a></li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php echo $imageURL;?>" alt="Admin" class="rounded-circle" width="150" height="150">
                    <div class="mt-3">
                      <h4><?php echo $row['firstname'];?> <?php echo $row['lastname'];?></h4>
                      <p class="text-secondary mb-1"><?php echo $row['position'];?></p>
                      <p class="text-muted font-size-sm"><?php echo $row['address'];?></p>
                      <a href="hire_user_side.php?id=<?php echo $row['id'];?>"><button class="btn btn-outline-success">Hire Me</button></a> <a href="#"><button class="btn btn-outline-primary">Message</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                    <span class="text-secondary"> <?php echo $row['email'];?></span>
                  </li>
                 
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary"> <?php echo $row['facebook'];?></span>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Mobile</h6>
                    <span class="text-secondary"> <?php echo $row['mobile'];?></span>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Hired Times</h6>
                    <span class="text-secondary"> <?php echo $row['hiredtimes'];?></span>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Skills</h6>
                    <span class="text-secondary"> <?php echo $row['skills'];?></span>
                  </li>

                </ul>
              </div>
            </div>
            
                <div class="col-sm-6 mb-3" style="overflow:hidden;">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Gig Feeds</h6>
                     <hr>
                      <?php
                                include('config.php');
                                $sql = "SELECT * FROM gig_post WHERE id_post = '$id'";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
                                while( $record = mysqli_fetch_assoc($resultset) ) {
                             
			                 ?>
                      <div class="card card-body" style="width:100%; height:10%;padding:5px; margin-bottom:5px;">
                      <small><b><?php echo $record['category'];?></b></small>
                      <small><?php echo $record['content'];?></small>  <a href="avail_user_side.php?id=<?php echo $record['id'];?>" class="btn btn-xs btn-success" style="width:15%; margin-left:85%; margin-top:-30px;"><span class="glyphicon glyphicon-link"></span> Avail</a>
                      </div>
                      <?php }?>
                    </div>
                  </div>
                </div>

                <div class="col-sm-2 mb-3" style="overflow:hidden;">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Rankings</h6>
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