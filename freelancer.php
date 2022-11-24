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
              <li class="breadcrumb-item active" aria-current="page">Professional List</li>
            </ol>
          </nav>
          <!---SEARCH----->
<div class="search-container" style="float:right; margin-top:1px; margin-bottom:8px;" >
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
      <input class="search" type="text" placeholder="Search by name.." name="search" value="" style="text-transform:capitalize;">
      <button type="submit" name="sub"><i class="fa fa-search"></i></button>
    </form>
  </div>
<!-----END OF SEARCH-------->

<div class="container">
<hr style="color:#676a6c;">

<div class="mydiv" id="myDiv">
<div class="row">
<!-------------PHP CODE------------------------>
<?php 
include('config.php');
$name = "";
$isVerified = "1";
//this is code for search freelancer
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['search'];
    if (empty($name)) {
        $isVerified;
    } 
    else {
        $name = $_POST['search'];
        $isVerified = "";
    }
  }
  //end  of code for search

  //query code to pullout info
    $sql = "SELECT * FROM user_account WHERE firstname = '$name' OR username = '$name' OR isVerified = '$isVerified' ORDER BY hiredtimes DESC";
    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
    while( $record = mysqli_fetch_assoc($resultset) ) {
    $imageURL = 'upload/'.$record["image"];
?>
    <div class="col-md-3">
        <div class="ibox">
            <div class="ibox-content product-box" style="margin-top:1px; height:450px;">
                <img src="<?php echo $imageURL;?>" alt="" style="width:180px; height:180px;">
                <div class="product-desc">
                    <span class="product-price">
                    <?php echo $record['position'];?>
                    </span>
                    <a href="#"><b><small class="text-muted"><?php echo $record['address'];?></small></b></a>
                    <br>
                    <small class="text-muted">Member Since: <?php echo $record['datejoin'];?></small>
                    <br>
                    <small class="text-muted" style="background-color:#676a6c; color:white; padding:3px;"><b>Hired Times: <?php echo $record['hiredtimes'];?></b></small>
                    <h4 ><?php echo $record['firstname'];?> <?php echo $record['lastname'];?></h4>
                    <div class="username" style="margin-top:-15px;">
                    <small class="text-muted" style="margin-top: -10px;">@<?php echo $record['username'];?></small>
                    </div>
                    <div class="small m-t-xs">
                       <?php echo $record['mobile'];?>
                    </div>
                    <div class="m-t text-righ">
                    <br>
                    <div class="btn-tool" style="margin-right:70%;">
                    <a href="hire.php?id=<?php echo $record['id'];?>" class="btn btn-primary" style="margin-left:60%; margin-top:-28%; width:190%;"><span class="glyphicon glyphicon-briefcase"></span>    Hire Now</a>
                    </div>

                    <div class="icon-logo">
                    <i class="fa fa-facebook-official" aria-hidden="true" title="facebook"></i> 
                    <i class="fa fa-envelope" aria-hidden="true" title="gmail"></i> 
                    <i class="fa fa-phone-square" aria-hidden="true" title="contact"></i> 
                    <i class="fa fa-map-marker" aria-hidden="true" title="locate place"></i>
                    </div>

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

.icon-logo {
   margin-left: 50px;
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
</style>

<script type="text/javascript">
</script>
</body>
</html>