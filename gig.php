<?php
include('config.php');

if(isset($_POST['request']))
 {
  $id = $_POST['code'];
  $qry = "UPDATE gig_post SET isavail = + 1 WHERE id ='$id'";
  $result = mysqli_query($conn,$qry);
 }
 mysqli_close($conn);
?>

<?php
session_start();
$id = $_SESSION['id'];
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
      if (isset($_POST['request'])) {

        $user = $_SESSION['id'];
        $code = $_POST['code'];
        $date= $_POST['date'];
        $status = 'Ongoing';
        $comment = $_POST['comment'];
       
        $sql = "INSERT INTO tbl_projects (id_user, id_code, project_start, project_status, project_comment)
          VALUES ('$user', '$code', '$date', '$status', '$comment')";
        if (mysqli_query($conn, $sql)) {
           echo '<script type="text/javascript">alert("Request successfully submitted!") </script>';
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
    <title>GIGS | Online Market Place for Local Skills Person</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">




<div class="container">
   <!-- Breadcrumb -->
   <nav aria-label="breadcrumb" class="main-breadcrumb" style="width:100% ;">
            <ol class="breadcrumb"  style="background-color:white;">
              <li class="breadcrumb-item"><a href="dashboard_user.php">Back</a></li>
              <li class="breadcrumb-item active" aria-current="page">Gigs Post</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
<hr style="color:#676a6c;">

<div class="mydiv" id="myDiv">
<div class="row">
<!-------------PHP CODE------------------------>

<?php 
include('config.php');
  //query code to pullout info
    $sql = "SELECT * FROM gig_post ORDER BY isavail DESC";
    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
    while( $record = mysqli_fetch_assoc($resultset) ) {
    $imageURL2 = 'gigs/'.$record["image"];
?>
    <div class="col-md-3">
        <div class="ibox">
            <div class="ibox-content product-box" style="margin-top:1px; height:400px;">
                <img src="<?php echo $imageURL2;?>" alt="" style="width:200px; height:130px;">
                <div class="product-desc">
                <span class="product-price">
                    Avail Times: <?php echo $record['isavail'];?>
                    </span>
                    <a href="#"><small class="text-muted"><b>Posted By: <?php echo $record['posted_by'];?></small></b></a>
                    <br>
                    <small class="text-muted">Posted On: <?php echo $record['date'];?></small>
                    <h4 style="text-transform:capitalize;"><?php echo $record['category'];?></h4>
                    <div class="small m-t-xs">
                        <!---slice text into 32 characters--->
                       <?php echo substr_replace($record['content'], "..", 32);?>
                       <a href="index.php" style="text-decoration:underline;"><p style="font-size:small;">See more...</p></a>
                    </div>
                    <div class="m-t text-righ">
                    <br>
                   <a href="avail.php?id=<?php echo $record['id'];?>" class="btn btn-success" style="border:none; width:100%; margin-top:-10%;"><span class="glyphicon glyphicon-cog"></span> Avail Service</a>
                   <b><p style="font-size:100%; margin-left:30%;" name="id_content">Code:<?php echo $record['id'];?></p></b>
                  </div>
                </div>
             
            </div>
        
        </div>
   
    </div>
    <?php } ?>
    <!-------------------------END OF PHP CODE------------------------------->
</div>
</div>
</div>

<button type="reset" style="margin-left:100px; width:10%; border:none;"><a href="gig.php" class="btn btn-primary" >Load More   <span class="glyphicon glyphicon-arrow-right"></span></a></button>
<footer>
    <br>
    <br>
    <br>
    <hr>
   <h4 style="color:grey ; text-align:center;">-----------END OF PAGE--------------</h4>
</footer>
<style type="text/css">
body{margin-top:20px;
    background:#eee;
}

.search-container{
    margin-left:77%;
    margin-top: -30px;
}
/* E-commerce */
.product-box {
  padding: 0;
  border: 1px solid #e7eaec;
}
.product-box:hover,
.product-box.active {
  border: 1px solid transparent;
  -webkit-box-shadow: 0 3px 7px 0 #a8a8a8;
  -moz-box-shadow: 0 3px 7px 0 #a8a8a8;
  box-shadow: 0 3px 7px 0 #a8a8a8;
}
.product-imitation {
  text-align: center;
  padding: 90px 0;
  background-color: #f8f8f9;
  color: #bebec3;
  font-weight: 600;
}
.cart-product-imitation {
  text-align: center;
  padding-top: 30px;
  height: 50px;
  width: 80px;
  background-color: #f8f8f9;
}
.product-imitation.xl {
  padding: 120px 0;
}
.product-desc {
  padding: 20px;
  position: relative;
}
.ecommerce .tag-list {
  padding: 0;
}
.ecommerce .fa-star {
  color: #d1dade;
}
.ecommerce .fa-star.active {
  color: #f8ac59;
}
.ecommerce .note-editor {
  border: 1px solid #e7eaec;
}
table.shoping-cart-table {
  margin-bottom: 0;
}
table.shoping-cart-table tr td {
  border: none;
  text-align: right;
}
table.shoping-cart-table tr td.desc,
table.shoping-cart-table tr td:first-child {
  text-align: left;
}
table.shoping-cart-table tr td:last-child {
  width: 80px;
}
.product-name {
  font-size: 16px;
  font-weight: 600;
  color: #676a6c;
  display: block;
  margin: 2px 0 5px 0;
}
.product-name:hover,
.product-name:focus {
  color: #1ab394;
}
.product-price {
  font-size: 14px;
  font-weight: 600;
  color: #ffffff;
  background-color: #1ab394;
  padding: 6px 12px;
  position: absolute;
  top: -32px;
  right: 0;
}
.product-detail .ibox-content {
  padding: 30px 30px 50px 30px;
}
.image-imitation {
  background-color: #f8f8f9;
  text-align: center;
  padding: 200px 0;
}
.product-main-price small {
text-overflow: ellipsis;
  font-size: 10px;
}
.product-images {
  margin: 0 20px;
}

.ibox {
  clear: both;
  margin-bottom: 25px;
  margin-top: 0;
  padding: 0;
}
.ibox.collapsed .ibox-content {
  display: none;
}
.ibox.collapsed .fa.fa-chevron-up:before {
  content: "\f078";
}
.ibox.collapsed .fa.fa-chevron-down:before {
  content: "\f077";
}
.ibox:after,
.ibox:before {
  display: table;
}
.ibox-title {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: #ffffff;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 3px 0 0;
  color: inherit;
  margin-bottom: 0;
  padding: 14px 15px 7px;
  min-height: 48px;
}
.ibox-content {
  background-color: #ffffff;
  color: inherit;
  padding: 15px 20px 20px 20px;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 1px 0;
}
.ibox-footer {
  color: inherit;
  border-top: 1px solid #e7eaec;
  font-size: 90%;
  background: #ffffff;
  padding: 10px 15px;
}




/* MODAL */
.contact-title{
    margin-bottom: 15px !important; 
}
.icons-container ul li {
    display: inline-block;
    width: 4.2em;
    height: 4.2em;
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 50%;
    margin: 0.25em;
    line-height: 3.5em;
    color: #999;
    transition: 1s 0s linear;
    text-decoration: none;
}

.icon-list{
    padding:0px;
}

#facebook-circle{
    border:1px solid #3B5998;
}
#facebook-icon{
    color:#3B5998;
}
#twitter-circle{
    border:1px solid #42ACC4;
}
#twitter-icon{
    color:#42ACC4;
}

#youtube-circle{
    border:1px solid #E62117;
}
#youtube-icon{
    color:#E62117;
}
#btn-send-message{
    width: 100%;
}

.line-separator{
    border-bottom:1px solid #CDC1C5;
}
.box-separator{
    margin-top: 20px;
    padding-bottom: 20px;
}

.icon-separator{
    border-bottom: 2px solid orange;
}
</style>

<script type="text/javascript">
  $(document).on("click", ".exampleModal", function () {
     var myCode = $(this).data('id');
     $(".exampleModal #code").val( myCode );
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
     // $('#addBookDialog').modal('show');
});
</script>
</body>
</html>