
<?php
  include('config.php');
  // SQL QUERY
  session_start();
  $Id = $_SESSION['id'];
  
  if(isset($_GET['id'])) {
    $id_prof = $_GET['id'];
    $query = "SELECT * FROM user_account WHERE id = $id_prof";
    // FETCHING DATA FROM DATABASE
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $imageURL = 'upload/'.$row["image"];
  }
   $conn->close();
  ?>

<?php
  include('config.php');
  
  if(isset($_POST['submit'])) {
    
    $id_professional = $id_prof;

    $query = "UPDATE user_account SET hiredtimes = hiredtimes + 1 WHERE id = '$id_professional'";
    mysqli_query($conn, $query);
  }
    mysqli_close($conn);
  ?>

<?php
  include('config.php');
  
  if(isset($_POST['submit'])) {
    
    $title = $_POST['project'];
    $id_professional = $id_prof;
    $id_user = $_POST['id_user'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $datestarted = $_POST['date'];
    $sug = $_POST['suggestion'];
    $pro_stat = 'Pending';

    $query = "INSERT INTO tbl_projects(project_title,id_professional, id_user, project_fullname, project_address, project_contact, project_date, project_sug, project_status)
    VALUES('$title','$id_professional', '$id_user', '$fullname', '$address', '$contact', '$datestarted', '$sug', '$pro_stat')";
    if (mysqli_query($conn, $query)) {
        echo '<script type="text/javascript">alert("request submitted successfully") </script>';
     } else {
       echo '<script type="text/javascript">alert("Error please try again!") </script>';
     }
    }
  mysqli_close($conn);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hire | Online Market Place for Tuburan Skill Person</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container-xl px-4 mt-4">
    <nav aria-label="breadcrumb" class="main-breadcrumb" style="width:100% ;">
            <ol class="breadcrumb"  style="background-color:white;">
              <li class="breadcrumb-item"><a href="user_landing.php">Back</a></li>
              <li class="breadcrumb-item active" aria-current="page">Hire</li>
            </ol>
    </nav>
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Professional Information</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="<?php echo $imageURL;?>" alt="" style="width:100px; height:100px;">
                    <!-- Profile picture help block-->
                    <h4><?php echo $row['firstname'];?> <?php echo $row['lastname'];?></h4>
                    <hr>
                    <div class="small font-italic text-muted mb-4"><?php echo $row['position'];?>
                    
                    <p><?php echo $row['address'];?></p>
                    </div>
                    <!-- Profile picture upload button-->
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Project Details</div>
                <div class="card-body">
                    <form method="POST">
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Project Title</label>
                            <input class="form-control" type="text" name="project" placeholder="Enter Project Title"> 
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">ID</label>
                                <input class="form-control" name="id_user" type="text" value="<?php echo $_SESSION['id'];?>" readonly>
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Fullname</label>
                                <input class="form-control" name="fullname" type="text" placeholder="Enter fullname">
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (organization name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputOrgName">Address</label>
                                <input class="form-control" name="address" type="text" placeholder="Enter your address">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Contact</label>
                                <input class="form-control" name="contact" type="text" placeholder="Enter your contact">
                            </div>
                        </div>
    
                        <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Date Started</label>
                                <input class="form-control" name="date" type="date">
                        </div>

                        <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Suggestions</label>
                                <textarea name="suggestion" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
body{margin-top:20px;
background-color:#f2f6fc;
color:#69707a;
}
.img-account-profile {
    height: 10rem;
}
.rounded-circle {
    border-radius: 50% !important;
}
.card {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
}
.card .card-header {
    font-weight: 500;
}
.card-header:first-child {
    border-radius: 0.35rem 0.35rem 0 0;
}
.card-header {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
}
.form-control, .dataTable-input {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.nav-borders .nav-link.active {
    color: #0061f2;
    border-bottom-color: #0061f2;
}
.nav-borders .nav-link {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
}
</style>
</body>
</html>