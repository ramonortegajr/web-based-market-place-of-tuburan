<?php
session_start();
include('config.php');

$Id = $_SESSION['id'];
$user_name = $_SESSION['username'];
$pass_word = $_SESSION['password'];
$type = $_SESSION['type'];

$isavail_status = '0';

if(!$_SESSION['id'] && !$_SESSION['username'] && !$_SESSION['password'])  
{  
    header("Location: login.php");//redirect to the login page to secure the welcome page without login access.  
}  
?>

<!----Post Gig Code----->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ompls";


$prim = "1";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
      if (isset($_POST['submit']) && !empty($_FILES["file"]["name"])) {

        $id_post = $Id;
        $category = $_POST['category'];
        $content = $_POST['content'];
        $current_date = date("Y-m-d H:i:s");
        $postedby = $user_name;
        $primary = $prim;
        
     //   $image = $image;
        $isavail = $isavail_status;

        
      // File upload to gigs
      $targetDir = "gigs/";
      $fileName = basename($_FILES["file"]["name"]);
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        // Allow certain file formats
      $allowTypes = array('jpg','png','jpeg','gif','pdf');
      if(in_array($fileType, $allowTypes)){
      // Upload file to server
      if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {

      $sql = "INSERT INTO gig_post (id_post, category, content, date, posted_by, isavail, image, prim)
      VALUES ('$id_post', '$category', '$content', '$current_date', '$postedby', '$isavail', '".$fileName."', '$primary')";

      if (mysqli_query($conn, $sql)) {
         // Now let's move the uploaded image into the folder: image
        echo '<script type="text/javascript">alert("New gig posted on newsfeed!") </script>';
      } else {
        echo '<script type="text/javascript">alert("Error in posting please try again!") </script>';
      }
      mysqli_close($conn);
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard | Online Market Place for Local Skills </title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
	  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   </head>
<body>

  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">TSM</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dashboard_freelancer.php" class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
     
        <li>
          <a href="project_freelancer.php">
            <i class='bx bx-coin-stack' ></i>
            <span class="links_name">Projects</span>
          </a>
        </li>

        <li>
          <a href="service_reports.php">
            <i class='bx bx-circle' ></i>
            <span class="links_name">Service Reports</span>
          </a>
        </li>
        <li>
          <a href="hired_reports.php">
            <i class='bx bx-rectangle' ></i>
            <span class="links_name">Hired Reports</span>
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
      <a class="media-left" href="#" style="margin-left:10px ;"><img class="img-circle img-sm" alt="Profile Picture" src="<?php echo $imageURL;?>"></a>
     <?php }?>
        <span  name="username" class="admin_name">Welcome | <?php echo $user_name;?></span>
        <span type="hidden" name="id" class="admin_name">ID:<?php echo $Id;?></span>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Projects</div>
            <?php
              include('config.php');
              $sql = "SELECT COUNT(*) AS total FROM tbl_projects WHERE id_professional = '$Id' AND project_status = 'Ongoing'";
              $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
              while( $record = mysqli_fetch_assoc($resultset) ) {
			        ?>
            <div class="number"><?php echo $record['total'];?></div>
            <?php }?>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Total Projects</span>
            </div>
          </div>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Project Request</div>
            <?php
              include('config.php');
              $sql = "SELECT COUNT(*) AS total FROM tbl_projects WHERE id_professional = '$Id' AND project_status = 'Pending'";
              $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
              while( $record = mysqli_fetch_assoc($resultset) ) {
			        ?>
            <div class="number"><?php echo $record['total'];?></div>
            <?php }?>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Total Request</span>
            </div>
          </div>
    
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Completed</div>
            <?php
              include('config.php');
              $sql = "SELECT COUNT(*) AS total FROM tbl_projects WHERE project_status = 'Completed' AND id_professional = '$Id'";
              $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
              while( $record = mysqli_fetch_assoc($resultset) ) {
			        ?>
            <div class="number"><?php echo $record['total'];?></div>
            <?php }?>
            <div class="indicator">
            <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Projects Completed</span>
            </div>
          </div>
     
        </div>
        
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Gigs</div>
            <?php
            include('config.php');
            $sql = "SELECT COUNT(*) AS total_gigs FROM gig_post WHERE id_post = '$Id'";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
            while( $record = mysqli_fetch_assoc($resultset) ) {
			        ?>
            <div class="number"><?php echo $record['total_gigs'];?></div>
            <?php }?>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt up'></i>
              <span class="text">Total Gigs</span>
            </div>
          </div>
        </div>
      </div>
<!-------------POST SECTION----------------->
<form method="POST" enctype="multipart/form-data">
<div class="container bootstrap snippets bootdey">
    <div class="row">
        <div class="col-md-offset-3 col-md-6 col-xs-12">
            <div class="well well-sm well-social-post">
            <ul class="list-inline" id='list_PostActions'>
                <li class='active'><a href='#'>Category:</a></li>
                <input type="text" name="category" id="category" style="width:70%; text-transform:capitalize;" placeholder="ex. Computer Services">
            </ul>
            <textarea name="content" class="form-control" placeholder="Post your gigs and sell your skills!" required></textarea>
            <ul class='list-inline post-actions'>
                <li><a href="#"><span class="glyphicon glyphicon-camera"></span></a></li>
                <li><a href="#" class='glyphicon glyphicon-user'></a></li>
                <li><a href="#" class='glyphicon glyphicon-map-marker'></a></li>
                <button type="submit" name="submit" style="margin-left:88%; border: 0px;"><a class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-up"></span> Post Gig</button></a>
                <input type="file" name="file"><li><a href=''>Add Photos</a></li> 
            </ul>
      </div>
     </div>
    </div>  
</div>
</form>     

<h3 style="margin-left:30px; color:grey;">Gig Feeds</h3>
<hr style="width:70% ; margin-left:30px;">
<!------------END OF POST SECTION----------------->

<div class="newsfeed">
<?php
include('config.php');
      $sql = "SELECT g.id, g.category, g.posted_by, g.content, g.date, g.isavail, u.image AS umage, g.image AS gmage FROM gig_post AS g INNER JOIN user_account AS u ON g.id_post = u.id WHERE g.id_post = '$Id' ORDER BY date DESC";
      $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
      while( $record = mysqli_fetch_assoc($resultset) ) {
      $imageURL2 = 'gigs/'.$record["gmage"];
      $imageURL1 = 'upload/'.$record["umage"];
			        ?>
<div class="cardpost">
    <!-- Newsfeed Content -->
    <!--===================================================-->
    <div class="media-block pad-all">
      <br>
      <a class="media-left" href="#" style="margin-left:10px ;"><img class="img-circle img-sm" alt="Profile Picture" src="<?php echo $imageURL1;?>"></a>
      <div class="media-body">
        <div class="mar-btm">
          <a href="#" class="btn-link text-semibold media-heading box-inline"><?php echo $record['posted_by'];?></a>
          <p class="text-muted text-sm"></i> Category: <b style="text-transform:capitalize;"><?php echo $record['category'];?></p></b>
          <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> Posted on: <?php echo $record['date'];?></p>
        </div>
        <p><?php echo $record['content'];?></p>
        <img class="img-responsive thumbnail" src="<?php echo $imageURL2;?>" alt="Image" style="width:400px ; height:150px;">
        <p style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; margin-top: -15px;">Avail Times: <?php echo $record['isavail'];?></p>

      <a href="delete.php?id=<?php echo $record['id']; ?>" onclick="DeleteConfirm()" href="delete.php?id=<?php echo $record['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a> 
    </div>
    <!--===================================================-->
    <!-- End Newsfeed Content -->
</div>
</div>
<br>
<?php }?>
</section>

<footer>
  <h5 style="text-align:center; color:#929292;"><br><br><br></h5>
</footer>
<script>
    function DeleteConfirm() {
    confirm("Are you sure to delete this record?");
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
