
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
</head>
<body>
<div class="container">
    <div class="main-body">
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb"  style="background-color:white;">
              <li class="breadcrumb-item"><a href="dashboard_admin.php">Back</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
                      <h4><?php echo $row['firstname'];?></h4>
                      <p class="text-secondary mb-1"><?php echo $row['position'];?></p>
                      <p class="text-muted font-size-sm"><?php echo $row['address'];?></p>
                      <a href="#"><button class="btn btn-outline-primary">Message</button></a>
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
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['firstname'];?> <?php echo $row['lastname'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['email'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['mobile'];?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['address'];?>
                    </div>
                  </div>
                </div>
              </div>
              <?php
                  include('config.php');
                  // SQL QUERY
                  if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "SELECT COUNT(*) AS ongoing FROM tbl_projects WHERE id_professional = $id AND project_status = 'Ongoing'";
                    // FETCHING DATA FROM DATABASE
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                  }
                  $conn->close();
                  ?>
              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Ongoing Project</h6>
                      <h1><?php echo $row['ongoing'];?><h1>
                    </div>
                  </div>
                </div>
                <?php
                  include('config.php');
                  // SQL QUERY
                  if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "SELECT COUNT(*) AS completed FROM tbl_projects WHERE id_professional = $id AND project_status = 'Completed'";
                    // FETCHING DATA FROM DATABASE
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                  }
                  $conn->close();
                  ?>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Project Completed</h6>
                      <h1><?php echo $row['completed'];?><h1>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Total Gigs Posted</h6>
                      <?php
                        include('config.php');
                        // SQL QUERY
                        if(isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $query = "SELECT COUNT(*) AS tot_gig FROM gig_post WHERE id_post = $id";
                            // FETCHING DATA FROM DATABASE
                            $result = mysqli_query($conn, $query);
                            $row = mysqli_fetch_assoc($result);
                        }
                        $conn->close();
                        ?>
                      <h1><?php echo $row['tot_gig'];?></h1> 
                    </div>
                  </div>
                </div>
                <?php
                  include('config.php');
                  // SQL QUERY
                  if(isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $query = "SELECT COUNT(*) AS completed FROM tbl_projects WHERE id_professional = $id AND project_status = 'Completed'";
                    // FETCHING DATA FROM DATABASE
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                  }
                  $conn->close();
                  ?>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2"></i>Hired Times</h6>
                      <h1><?php echo $row['completed'];?></h1>
                    </div>
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