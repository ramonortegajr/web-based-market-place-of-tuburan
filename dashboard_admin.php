<?php
session_start();
include('config.php');
$Id = $_SESSION['id'];
$user_name = $_SESSION['username'];
$pass_word = $_SESSION['password'];
$type = $_SESSION['type'];

$isVerified = '0';
$Verified = '1';

if(!$_SESSION['id'] && !$_SESSION['username'] && !$_SESSION['password'])  
{  
    header("Location: ../login.php");//redirect to the login page to secure the welcome page without login access.  
}  
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard-Admin | Online Market Place for Local Skills </title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/dashboard_admin.css">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
	  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
     <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
     
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
   </head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">TSM</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard_admin.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>

        <li>
          <a href="project_admin.php">
            <i class='bx bx-book-alt' ></i>
            <span class="links_name">Projects</span>
          </a>
        </li>

        <li>
          <a href="request_admin.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Request</span>
          </a>
        </li>

        <li>
          <a href="gig_admin.php">
            <i class='bx bx-file' ></i>
            <span class="links_name">Gig</span>
          </a>
        </li>

        <li>
          <a href="reports.php">
            <i class='bx bx-chart' ></i>
            <span class="links_name">Reports</span>
          </a>
        </li>

        <li>
          <a href="settings.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Dashboard</span>
      </div>
      <!-------------PICTURE IN TOP--------------->
      <?php
      include('config.php');
      $sql = "SELECT * FROM user_account WHERE id = '$Id'";
      $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
      while( $record = mysqli_fetch_assoc($resultset) ) {
      $imageURL = 'upload/'.$record["image"];
			        ?>
      <div class="profile-details">
      <a class="media-left" href="#" style="margin-left:10px ;"><img class="img-circle img-sm" alt="Picture" src="<?php echo $imageURL;?>"></a>
     <?php }?>
        <span  name="username" class="admin_name">Welcome | <?php echo $user_name;?></span>
        <span type="hidden" name="id" class="admin_name">ID:<?php echo $Id;?></span>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Professional</div>

            <?php
            include('config.php');
            $sql = "SELECT COUNT(*) AS total_freelancer FROM user_account WHERE type = 'Professional' AND isVerified = '1'";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
            while( $record = mysqli_fetch_assoc($resultset) ) {
			        ?>
            <div class="number"><?php echo $record['total_freelancer'];?></div>
            <?php }?>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Total Freelancers</span>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Request</div>

            <?php
            include('config.php');
            $sql = "SELECT COUNT(*) AS total_request FROM user_account WHERE isVerified = '0'";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
            while( $record = mysqli_fetch_assoc($resultset) ) {
			        ?>
            <div class="number"><?php echo $record['total_request'];?></div>
            <?php }?>

            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Not Verified</span>
            </div>
          </div>
    
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">User</div>

            <?php
            include('config.php');
            $sql = "SELECT COUNT(*) AS total_user FROM tbl_user WHERE type = 'User'";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
            while( $record = mysqli_fetch_assoc($resultset) ) {
			        ?>
            <div class="number"><?php echo $record['total_user'];?></div>
            <?php }?>
            <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Total Users</span>
            </div>
          </div>
     
        </div>
        
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Gigs</div>
            <?php
            include('config.php');
            $sql = "SELECT COUNT(id_post) AS total_gig FROM gig_post";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
            while( $record = mysqli_fetch_assoc($resultset) ) {
			        ?>
            <div class="number"><?php echo $record['total_gig'];?></div>
            <?php }?>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt up'></i>
              <span class="text">Total Gigs</span>
            </div>
          </div>
        </div>
      </div>   


<!-------------------------------PENDING ACCOUNTS SECTION--------------------------->
<h3 style="margin-left:17px;">Pending Request</h3>
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>User</span></th>
                                <th><span>Created</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span>Email</span></th>
                                <th><span>Type</span></th>
                                <th><span>Action</span></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                include('config.php');
                                $sql = "SELECT * FROM user_account WHERE isVerified = '$isVerified'";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
                                while( $record = mysqli_fetch_assoc($resultset) ) {
                                $imageURL = 'upload/'.$record["image"];
			                 ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo $imageURL;?>" alt="picture" style="width:50px; height:50px;">
                                        <a href="#" class="user-link"><?php echo $record['firstname'];?> <?php echo $record['lastname'];?></a>
                                        <span class=""><?php echo $record['position'];?></span>
                                    </td>
                                    <td><?php echo $record['datejoin'];?></td>
                    
                                    <td class="text-center">
                                        <span class="label label-default">Pending</span>
                                    </td>

                                    <td>
                                        <a href="#"><?php echo $record['email'];?></a>
                                    </td>
                                    <td>
                                        <a href="#"><?php echo $record['type'];?></a>
                                    </td>
                                    <td style="width: 20%;">
                                        <a href="verified_request.php?id=<?php echo $record['id'];?>" class="table-link text-info">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-check fa-stack-1x fa-inverse" title="Verify" onclick="VerifiedConfirm()"></i>
                                            </span>
                                        </a>
                                        <a href="delete_request.php?id=<?php echo $record['id']; ?>" class="table-link danger">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse" title="Decline" onclick="DeleteConfirm()"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------END PENDING ACCOUNTS SECTION--------------------------->

<!-------------------------------ACTIVE ACCOUNTS SECTION--------------------------->
<h3 style="margin-left:17px;">Active Professionals</h3>
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box no-header clearfix">
                <div class="main-box-body clearfix">
                    <div class="table-responsive">
                        <table class="table user-list">
                            <thead>
                                <tr>
                                <th><span>User</span></th>
                                <th><span>Member Since</span></th>
                                <th><span>Place</span></th>
                                <th class="text-center"><span>Status</span></th>
                                <th><span>Email</span></th>
                                <th><span>Type</span></th>
                                <th><span>Action</span></th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                include('config.php');
                                $sql = "SELECT * FROM user_account WHERE isVerified = '$Verified' AND type = 'Professional'";
                                $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
                                while( $record = mysqli_fetch_assoc($resultset) ) {
                                $imageURL = 'upload/'.$record["image"];
			                 ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo $imageURL;?>" alt="picture" style="width:50px; height:50px;">
                                        <a href="#" class="user-link"><?php echo $record['firstname'];?> <?php echo $record['lastname'];?></a>
                                        <span class=""><?php echo $record['position'];?></span>
                                    </td>
                                    
                                    <td><?php echo $record['datejoin'];?></td>
                                    <td><?php echo $record['address'];?></td>
                    
                                    <td class="text-center">
                                        <span class="label label-default" style="background-color:limegreen;">Active</span>
                                    </td>

                                    <td>
                                        <a href="#"><?php echo $record['email'];?></a>
                                    </td>
                                    <td>
                                        <a href="#"><?php echo $record['type'];?></a>
                                    </td>

                                    
                                    <td style="width: 20%;">
                                        <a href="profile.php?id=<?php echo $record['id'];?>" class="table-link text-info">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-eye fa-stack-1x fa-inverse" title="Visit Profile"></i>
                                            </span>
                                            View
                                        </a>
                              
                                        <a href="delete_request.php?id=<?php echo $record['id']; ?>" class="table-link danger">
                                            <span class="fa-stack">
                                                <i class="fa fa-square fa-stack-2x"></i>
                                                <i class="fa fa-trash-o fa-stack-1x fa-inverse" title="Delete" onclick="DeleteConfirm()"></i>
                                            </span>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-------------------------------END PENDING ACCOUNTS SECTION--------------------------->
</section>

<footer>
  <h5 style="text-align:center; color:#929292;"><br><br><br></h5>
</footer>
<script>
    function DeleteConfirm() {
    confirm("Are you sure you want to decline this record?");
                  }

    function VerifiedConfirm() {
    confirm("Are you sure you want to verified this record?");
                  }
   // function delete_msg()
   // {
    //  alert("Data successfully deleted!");
    //}
</script>

<style type="text/css">
body{margin-top:0px; background-color: #eeeeee;}

.well-social-post {
    border-radius: 0;
    background-color: #ffffff;
    border: 1px solid #ddd;
    padding:0;
    margin-left: -52%;
    margin-right: 5%;
}

.my-element {
    position: relative;
    width: 50px;
    height: 50px;
    border-radius: 4px;
}
.my-element::before {
    content: attr(notif);
    position: absolute;
    top: -0.75em;
    right: -0.75em;
    width: 1.5em;
    height: 1.5em;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background-color: red;
    color: white;
}

.well-social-post .glyphicon,
.well-social-post .fa,
.well-social-post [class^='icon-'],
.well-social-post [class*='icon-'] {
    font-weight: bold;
    color: #999999;
}

.well-social-post a,
.well-social-post a:hover,
.well-social-post a:active,
.well-social-post a:focus {
    text-decoration: none;
}

.well-social-post .list-inline {
    border-bottom: 1px solid #ddd;
    padding-bottom: 10px;
}

.well-social-post .list-inline li {
    position: relative;
}

.well-social-post .list-inline li.active::after {
    position: absolute;
    display: block;
    width: 0;
    height: 0;
    content: "";
    top: 30px;
    left: 50%;
    left: -webkit-calc(50% - 5px);
    left: -moz-calc(50%-5px);
    left: calc(50% - 5px);
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid #dddddd;
}

.well-social-post .list-inline li.active a {
    color: #222222;
    font-weight: bold;
}

.well-social-post .form-control {
    width: 100%;
    min-height: 100px;
    border: none;
    border-radius: 0;
    box-shadow: none;
}

.well-social-post .list-inline {
    padding: 10px;
}

.well-social-post .list-inline li + li {
    margin-left: 10px;
}

.well-social-post .post-actions {
    margin: 0;
    background-color: #f6f7f8;
    border-top-color: #e9eaed;
}                                                            
</style>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>


<script type="text/javascript">

$(function(){
    var postActions   = $( '#list_PostActions' );
    var currentAction = $( '#list_PostActions li.active' );
    if ( currentAction.length === 0 ) {
        postActions.find( 'li:first' ).addClass( 'active' );
    }
    postActions.find( 'li' ).on( 'click', function( e ) {
        e.preventDefault();
        var self = $( this );
        if ( self === currentAction ) {return;}
        // else
        currentAction.removeClass( 'active' );
        self.addClass( 'active' );
        currentAction = self;
    });
});
</script>

<style type="text/css">
.img-sm {
    width: 46px;
    height: 46px;
}

.panel {
    box-shadow: 0 2px 0 rgba(0,0,0,0.075);
    border-radius: 0;
    border: 0;
    margin-bottom: 15px;
}

.panel .panel-footer, .panel>:last-child {
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
}

.panel .panel-heading, .panel>:first-child {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}

.panel-body {
    padding: 25px 20px;
}


.media-block .media-left {
    display: block;
    float: left
}

.media-block .media-right {
    float: right
}

.media-block .media-body {
    display: block;
    overflow: hidden;
    width: auto
}
.newsfeed {
  background-color:#F5F5F5;
  width: 72%;
  margin-left: 1.5%;
  box-shadow: 2px #acacac;
  height: 400px;
  overflow: scroll;
}

.cardpost {
  background-color:#fff;
  width: 769px;
  margin-left: 1.5%;
  box-shadow: 2px #acacac;
  height: 400px;
}

.middle .media-left,
.middle .media-right,
.middle .media-body {
    vertical-align: middle
}

.thumbnail {
    border-radius: 0;
    border-color: #e9e9e9;
    height: 200px;
    width: 400px;
}

.tag.tag-sm, .btn-group-sm>.tag {
    padding: 5px 10px;
}

.tag:not(.label) {
    background-color: #fff;
    padding: 6px 12px;
    border-radius: 2px;
    border: 1px solid #cdd6e1;
    font-size: 12px;
    line-height: 1.42857;
    vertical-align: middle;
    -webkit-transition: all .15s;
    transition: all .15s;
}
.text-muted, a.text-muted:hover, a.text-muted:focus {
    color: #acacac;
}
.text-sm {
    font-size: 0.9em;
}
.text-5x, .text-4x, .text-5x, .text-2x, .text-lg, .text-sm, .text-xs {
    line-height: 1.25;
}

.btn-trans {
    background-color: transparent;
    border-color: transparent;
    color: #929292;
}

.btn-icon {
    padding-left: 9px;
    padding-right: 9px;
}

.btn-sm, .btn-group-sm>.btn, .btn-icon.btn-sm {
    padding: 5px 10px !important;
}

.mar-top {
    margin-top: 15px;
}
</style>
</body>
</html>
