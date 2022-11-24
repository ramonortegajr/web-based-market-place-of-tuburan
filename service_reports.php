<?php
session_start();
$Id = $_SESSION['id'];
$con  = mysqli_connect("localhost","root","","ompls");
 if (!$con) {
    echo "Problem in database connection! Contact administrator!";
 }else{
         $sql ="SELECT * FROM gig_post WHERE id_post = '$Id'";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $service[]  = $row['category']  ;
            $avail[] = $row['isavail'];
        }
 } 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
        <title>Reports | Online Market Place for Tuburan Skills Person</title> 
    </head>
    <body style="background-color:lightgrey;">
         <!-- Breadcrumb -->
         <br>
         <br>
         <nav aria-label="breadcrumb" class="main-breadcrumb" style="width:90%;margin-left:5%;">
            <ol class="breadcrumb"  style="background-color:white;">
              <li class="breadcrumb-item"><a href="dashboard_freelancer.php">Back</a></li>
              <li class="breadcrumb-item active" aria-current="page">Reports</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          <h2 class="page-header" style="text-align:center;color:white;color:black;">Graphical Reports of Top Availed Services </h2>
          <div style="text-align:center;color:white; color:black;">Gigs/Services</div>
          <div class="card mt-3" style="width:90%; margin-left:5%;">
          <div style="margin-left:5%; width:50%;text-align:center; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; align-items:center;" >
          <br>
          <br>
            <canvas id="chartjs_bar"></canvas> 
        </div>
        </div> 
        <p style="text-align:center;color:darkgrey;">This data is based on the information pull out from database to check the reports of most avail services.</p>
          
    </body>
    
    <style>
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
    padding: 7rem;
}
    </style>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels:<?php echo json_encode($service); ?>,
                        datasets: [{
                            label: 'Hired Times',
                            data: <?php echo json_encode($avail);?>,
                        }]
                    },
                    options: {
                        
                        legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
                }
                });
    </script>
</html>  