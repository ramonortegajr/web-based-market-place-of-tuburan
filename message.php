
<?php
session_start();
$ID = $_SESSION['id'];
$date = date("d-m-Y");
include('config.php');
  // SQL QUERY
  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM user_account WHERE id = $id";
    // FETCHING DATA FROM DATABASE
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $imageURL2 = 'upload/'.$row["image"];
  }
   $conn->close();
?>
<!----Register Code----->
<?php
include('config.php');

if (isset($_POST['send'])) {

        $id_receiver = $_POST['id_receiver'];
        $id_sender = $_POST['id_sender'];
        $message = $_POST['message'];
        $date_send = $date;
       
        $sql = "INSERT INTO chat (id_receiver, id_sender, message, date)
          VALUES ('$id_receiver', '$id_sender', '$message', '$date_send')";
        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript">alert("Messsage sent") </script>';
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
    <title>Chat |Tuburan Skills Market</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<div class="container bootstrap snippets bootdey">
    <br>
    <br>
         <!-- Breadcrumb -->
         <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb"  style="background-color:white;">
              <li class="breadcrumb-item"><a href="dashboard_admin.php">Back</a></li>
              <li class="breadcrumb-item active" aria-current="page">Chat</li>
            </ol>
      </nav>
          <!-- /Breadcrumb -->
    <div class="tile tile-alt" id="messages-main">
        
        <div class="ms-menu">
            <div class="p-15">
                <div class="dropdown">
                    <a class="btn btn-primary btn-block" href="" data-toggle="dropdown">Messages <i class="caret m-l-5"></i></a>
                </div>
            </div>
            <div class="list-group lg-alt">
                <a class="list-group-item media" href="">
                    <div class="pull-left">
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="img-avatar">
                    </div>
                    <div class="media-body">
                        <small class="list-group-item-heading">Davil Parnell</small>
                        <small class="list-group-item-text c-gray">Fierent fastidii recteque ad pro</small>
                    </div>
                </a>
                
                <a class="list-group-item media" href="">
                    <div class="pull-left">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="img-avatar">
                    </div>
                    <div class="media-body">
                        <div class="list-group-item-heading">Ann Watkinson</div>
                        <small class="list-group-item-text c-gray">Cum sociis natoque penatibus </small>
                    </div>
                </a>
                
                <a class="list-group-item media" href="">
                    <div class="pull-left">
                        <img src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="" class="img-avatar">
                    </div>
                    <div class="media-body">
                        <div class="list-group-item-heading">Marse Walter</div>
                        <small class="list-group-item-text c-gray">Suspendisse sapien ligula</small>
                    </div>
                </a>
                
                <a class="list-group-item media" href="">
                    <div class="lv-avatar pull-left">
                        <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="" class="img-avatar">
                    </div>
                    <div class="media-body">
                        <div class="list-group-item-heading">Jeremy Robbins</div>
                        <small class="list-group-item-text c-gray">Phasellus porttitor tellus nec</small>
                    </div>
                </a>
                
                <a class="list-group-item media" href="">
                    <div class="lv-avatar pull-left">
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" class="img-avatar">
                    </div>
                    <div class="media-body">
                        <div class="list-group-item-heading">Reginald Horace</div>
                        <small class="list-group-item-text c-gray">Quisque consequat arcu eget</small>
                    </div>
                </a>
                
                <a class="list-group-item media" href="">
                    <div class="pull-left">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" class="img-avatar">
                    </div>
                    <div class="media-body">
                        <div class="list-group-item-heading">Shark Henry</div>
                        <small class="list-group-item-text c-gray">Nam lobortis odio et leo maximu</small>
                    </div>
                </a>
                
                <a class="list-group-item media" href="">
                    <div class="pull-left">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="img-avatar">
                    </div>
                    <div class="media-body">
                        <div class="list-group-item-heading">Paul Van Dack</div>
                        <small class="list-group-item-text c-gray">Nam posuere purus sed velit auctor sodales</small>
                    </div>
                </a>
                
                <a class="list-group-item media" href="">
                    <div class="lv-avatar pull-left">
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="" class="img-avatar">
                    </div>
                    <div class="media-body">
                        <div class="list-group-item-heading">James Anderson</div>
                        <small class="list-group-item-text c-gray">Vivamus imperdiet sagittis quam</small>
                    </div>
                </a>
                
                <a class="list-group-item media" href="">
                    <div class="lv-avatar pull-left">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="img-avatar">
                    </div>
                    <div class="media-body">
                        <div class="list-group-item-heading">Kane Williams</div>
                        <small class="list-group-item-text c-gray">Suspendisse justo nulla luctus nec</small>
                    </div>
                </a>
            </div>
    
            
        </div>
        
        <div class="ms-body" style="height:700px; overflow:scroll;">
            <div class="action-header clearfix">
                <div class="visible-xs" id="ms-menu-trigger">
                    <i class="fa fa-bars"></i>
                </div>
                
                <div class="pull-left hidden-xs">
                    <img src="<?php echo $imageURL2;?>" alt="" class="img-avatar m-r-10">
                    <div class="lv-avatar pull-left">
                        
                    </div>
                    <span><?php echo $row['firstname'];?> <?php echo $row['lastname'];?> | ID : <?php echo $row['id'];?></span>
                </div>
                 
                <ul class="ah-actions actions">
                    <li>
                        <a href="">
                            <i class="fa fa-trash"></i>
                        </a>
                    </li>
                           
                    <li class="dropdown">
                        <a href="" data-toggle="dropdown" aria-expanded="true">
                            <i class="fa fa-bars"></i>
                        </a>
            
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="">Refresh</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <?php 
             include('config.php');
            //query code to pullout info
            $sql = "SELECT u.firstname, u.lastname, c.message AS msg, c.date as date FROM chat AS c INNER JOIN user_account AS u ON c.id_sender = u.id WHERE c.id_sender = '$ID' OR c.id_receiver = '$id'";
            $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
            while( $record = mysqli_fetch_assoc($resultset) ) {
            ?>
            <div class="message-feed media">
                <div class="pull-left">
                    <b><h5><?php echo $record['firstname'];?> <?php echo $record['lastname'];?></h5></b>
                </div>
                <div class="media-body">
                    <div class="mf-content">
                       <?php echo $record['msg'];?>
                    </div>
                    <small class="mf-date"><i class="fa fa-clock-o"></i> <?php echo $record['date'];?></small>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
    <form action="" method="post">
            <div class="msb-reply" style="width:78%; float:right;">
                <textarea placeholder="Enter your message here" name="message"></textarea>
                <input type="hidden" name="id_receiver" value="<?php echo $row['id'];?>">
                <input type="hidden" name="id_sender" value="<?php echo $ID;?>">
                <button type="submit" name="send"><i class="fa fa-paper-plane-o"></i></button>
            </div>
   </form>
</div>
<br>
            <br>
            <br>

<style type="text/css">
body {
    font-family: Roboto,sans-serif;
    font-size: 13px;
    line-height: 1.42857143;
    color: #767676;
    background-color: #edecec;
}

#messages-main {
    position: relative;
    margin: 0 auto;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
#messages-main:after, #messages-main:before {
    content: " ";
    display: table;
}
#messages-main .ms-menu {
    position: absolute;
    left: 0;
    top: 0;
    border-right: 1px solid #eee;
    padding-bottom: 50px;
    height: 100%;
    width: 240px;
    background: #fff;
}
@media (min-width:768px) {
    #messages-main .ms-body {
    padding-left: 240px;
}
}@media (max-width:767px) {
    #messages-main .ms-menu {
    height: calc(100% - 58px);
    display: none;
    z-index: 1;
    top: 58px;
}
#messages-main .ms-menu.toggled {
    display: block;
}
#messages-main .ms-body {
    overflow: hidden;
}
}
#messages-main .ms-user {
    padding: 15px;
    background: #f8f8f8;
}
#messages-main .ms-user>div {
    overflow: hidden;
    padding: 3px 5px 0 15px;
    font-size: 11px;
}
#messages-main #ms-compose {
    position: fixed;
    bottom: 120px;
    z-index: 1;
    right: 30px;
    box-shadow: 0 0 4px rgba(0, 0, 0, .14), 0 4px 8px rgba(0, 0, 0, .28);
}
#ms-menu-trigger {
    user-select: none;
    position: absolute;
    left: 0;
    top: 0;
    width: 50px;
    height: 100%;
    padding-right: 10px;
    padding-top: 19px;
}
#ms-menu-trigger i {
    font-size: 21px;
}
#ms-menu-trigger.toggled i:before {
    content: '\f2ea'
}
.fc-toolbar:before, .login-content:after {
    content: ""
}
.message-feed {
    padding: 20px;
}
#footer, .fc-toolbar .ui-button, .fileinput .thumbnail, .four-zero, .four-zero footer>a, .ie-warning, .login-content, .login-navigation, .pt-inner, .pt-inner .pti-footer>a {
    text-align: center;
}
.message-feed.right>.pull-right {
    margin-left: 15px;
}
.message-feed:not(.right) .mf-content {
    background: #03a9f4;
    color: #fff;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
}
.message-feed.right .mf-content {
    background: #eee;
}
.mf-content {
    padding: 12px 17px 13px;
    border-radius: 2px;
    display: inline-block;
    max-width: 80%
}
.mf-date {
    display: block;
    color: #B3B3B3;
    margin-top: 7px;
}
.mf-date>i {
    font-size: 14px;
    line-height: 100%;
    position: relative;
    top: 1px;
}
.msb-reply {
    box-shadow: 0 -20px 20px -5px #fff;
    position: relative;
    margin-top: 30px;
    border-top: 1px solid #eee;
    background: #f8f8f8;
}
.four-zero, .lc-block {
    box-shadow: 0 1px 11px rgba(0, 0, 0, .27);
}
.msb-reply textarea {
    width: 100%;
    font-size: 13px;
    border: 0;
    padding: 10px 15px;
    resize: none;
    height: 60px;
    background: 0 0;
}
.msb-reply button {
    position: absolute;
    top: 0;
    right: 0;
    border: 0;
    height: 100%;
    width: 60px;
    font-size: 25px;
    color: #2196f3;
    background: 0 0;
}
.msb-reply button:hover {
    background: #f2f2f2;
}
.img-avatar {
    height: 37px;
    border-radius: 2px;
    width: 37px;
}
.list-group.lg-alt .list-group-item {
    border: 0;
}
.p-15 {
    padding: 15px!important;
}
.btn:not(.btn-alt) {
    border: 0;
}
.action-header {
    position: relative;
    background: #f8f8f8;
    padding: 15px 13px 15px 17px;
}
.ah-actions {
    z-index: 3;
    float: right;
    margin-top: 7px;
    position: relative;
}
.actions {
    list-style: none;
    padding: 0;
    margin: 0;
}
.actions>li {
    display: inline-block;
}

.actions:not(.a-alt)>li>a>i {
    color: #939393;
}
.actions>li>a>i {
    font-size: 20px;
}
.actions>li>a {
    display: block;
    padding: 0 10px;
}
.ms-body{
    background:#fff;    
}
#ms-menu-trigger {
    user-select: none;
    position: absolute;
    left: 0;
    top: 0;
    width: 50px;
    height: 100%;
    padding-right: 10px;
    padding-top: 19px;
    cursor:pointer;
}
#ms-menu-trigger, .message-feed.right {
    text-align: right;
}
#ms-menu-trigger, .toggle-switch {
    -webkit-user-select: none;
    -moz-user-select: none;
}
</style>

<script type="text/javascript">
$(function(){
   if ($('#ms-menu-trigger')[0]) {
        $('body').on('click', '#ms-menu-trigger', function() {
            $('.ms-menu').toggleClass('toggled'); 
        });
    }
});



</script>
</body>
</html>