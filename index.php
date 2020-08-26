<?php
include_once 'cronejobscript.php';
include_once 'db.php';



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://hpb.health.gov.lk/api/get-current-statistical",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$response = json_decode($response, true); //because of true, it's in an array
//because of true, it's in an array

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Covid | Lanka</title>

  <!-- Font Awesome Icons -->

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    h4{
      font-family: Arial;
    }
    .navbar-light .navbar-toggler-icon{
      display: none;
    }
    .navbar-light .navbar-toggler {
      display: none;
    }
  </style>
    <link rel="stylesheet" href="./style.css">
<style type="text/css">
  
  #tooltip {
    color: #a1a1a1;
  background: white;
  border: 0px solid #919090;
  border-radius: 5px;
  padding: 5px;
  box-shadow: 0 15px 20px rgba(0, 0, 0, 0.3);
}
</style>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container" style="width: 100%;text-align: center;">
      
      <a href="./" class="navbar-brand" style="text-align: center; width: 100%">
       <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">-->
        <span class="brand-text font-weight-light" style="text-align: center;"><b class="text-info " style="margin-bottom: 0px" >COVID</b> <b style="margin-bottom: 0px">LANKA</b><br ><small  class="text-gray" style="font-size: 50%;margin-top: 0px">C O R O N A    &nbsp&nbspO U T B R E A K&nbsp&nbsp S T A T I S T I C S</small></span>
      </a>
      
     

     

    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
           <!-- <h1 class="m-0 text-dark"> COVID19 <small class="text-gray"> STATISTICS</small></h1>-->
          </div><!-- /.col -->
         <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">

<h5 class="mb-2 mt-4 brand-text font-weight-light"><b class="text-info">SRI LANKA</b> <small class="text-gray">Statistics</small></h5>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4 class="text-light counter"><?php echo $response['data']['local_total_cases']; ?></h4>

                <p>Total Cases</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a  class="small-box-footer">
                 <i class="fas  fa-angle-double-left"></i> <i class="fas  fa-users"></i>  <i class="fas  fa-angle-double-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning ">
              <div class="inner">
               <h4 class="text-light counter"><?php echo $response['data']['local_new_cases']; ?></h4>

                <p class="text-light">New Cases</p>
              </div>
              <div class="icon">
                <i class="fas fa-arrow-up"></i>
              </div>
              <a class="small-box-footer">
                 <i class="fas  fa-angle-double-left text-light"></i> <i class="fas fa-arrow-up text-light"></i>  <i class="fas  fa-angle-double-right text-light"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-gray">
              <div class="inner">
               <h4 class="text-light counter"><?php echo $response['data']['local_total_number_of_individuals_in_hospitals']; ?></h4>

                <p>Hospitalized</p>
              </div>
              <div class="icon">
                <i class="fa fa-bed"></i>
              </div>
              <a  class="small-box-footer">
               <i class="fas  fa-angle-double-left"></i> <i class="fa fa-bed"></i>  <i class="fas  fa-angle-double-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4 class="text-light counter"><?php echo $response['data']['local_recovered']; ?></h4>

                <p>Recovered</p>
              </div>
              <div class="icon">
                <i class="fas  fa-thumbs-up"></i>
              </div>
              <a  class="small-box-footer">
               <i class="fas  fa-angle-double-left"></i> <i class="fas  fa-thumbs-up"></i>  <i class="fas  fa-angle-double-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-red">
              <div class="inner">
               <h4 class="text-light counter"><?php echo $response['data']['local_deaths']; ?></h4>

                <p>Deaths</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-times"></i>
              </div>
              <a  class="small-box-footer">
                <i class="fas  fa-angle-double-left"></i> <i class="fas fa-user-times"></i>  <i class="fas  fa-angle-double-right"></i>
              </a>
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-orange">
              <div class="inner">
              <h4 class="text-light counter"><?php echo $response['data']['local_new_deaths']; ?></h4>

                <p class="text-light">New Deaths</p>
              </div>
              <div class="icon">
                <i class="fas fa-thumbs-down"></i>
              </div>
              <a  class="small-box-footer">
               <i class="fas  fa-angle-double-left text-light"></i> <i class="fas fa-thumbs-down text-light"></i>  <i class="fas  fa-angle-double-right text-light"></i>
              </a>
            </div>
          </div>



          <!-- ./col -->
        </div>

        <?php
       
        ?>

         <div class="row">
          <div class="col-md-6">
            <h5 class="mb-2 mt-4 brand-text font-weight-light"><b class="text-info">INCREASE OF PATIENTS</b> <small class="text-gray">Curve</small></h5>
                <div class="card card-info overflow-auto">
             
              <div class="card-body " id="linewidth" style="min-width:500px">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
 <div class="col-md-6">
  <h5 class="mb-2 mt-4 brand-text font-weight-light"><b class="text-info">PATIENTS PER DAY</b> <small class="text-gray">Chart</small></h5>
             <div class="card card-success overflow-auto">
              
              <div class="card-body" style="min-width:500px">
                <div class="chart">
                  <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div></div>

        </div>



        <h5 class="mb-2 mt-4 brand-text font-weight-light"><b class="text-info">GLOBAL</b> <small class="text-gray">Statistics</small></h5>
           <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h4 class="text-light counter" ><?php echo number_format($response['data']['global_total_cases']); ?></h4>

                <p>Total Cases</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a  class="small-box-footer">
                 <i class="fas  fa-angle-double-left"></i> <i class="fas  fa-users"></i>  <i class="fas  fa-angle-double-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
               <h4 class="text-light counter"><?php echo number_format($response['data']['global_new_cases']); ?></h4>

                <p class="text-light">New Cases</p>
              </div>
              <div class="icon">
                <i class="fas fa-arrow-up"></i>
              </div>
              <a class="small-box-footer">
                 <i class="fas  fa-angle-double-left text-light"></i> <i class="fas fa-arrow-up text-light"></i>  <i class="fas  fa-angle-double-right text-light"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4 class="text-light counter"><?php echo number_format($response['data']['global_recovered']); ?></h4>

                <p>Recovered</p>
              </div>
              <div class="icon">
                <i class="fas  fa-thumbs-up"></i>
              </div>
              <a  class="small-box-footer">
               <i class="fas  fa-angle-double-left"></i> <i class="fas  fa-thumbs-up"></i>  <i class="fas  fa-angle-double-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-red">
              <div class="inner">
               <h4 class="text-light counter"> <?php echo number_format($response['data']['global_deaths']); ?></h4>

                <p>Deaths</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-times"></i>
              </div>
              <a  class="small-box-footer">
                <i class="fas  fa-angle-double-left"></i> <i class="fas fa-user-times"></i>  <i class="fas  fa-angle-double-right"></i>
              </a>
            </div>
          </div>

           <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-orange">
              <div class="inner">
              <h4 class="text-light counter" ><?php echo number_format($response['data']['global_new_deaths']); ?></h4>

                <p class="text-light">New Deaths</p>
              </div>
              <div class="icon">
                <i class="fas fa-thumbs-down"></i>
              </div>
              <a  class="small-box-footer">
               <i class="fas  fa-angle-double-left text-light"></i> <i class="fas fa-thumbs-down text-light"></i>  <i class="fas  fa-angle-double-right text-light"></i>
              </a>
            </div>
          </div>

          <!-- ./col -->
        </div>

<div class="row"><div class="col-sm-12 col-xs-12 col-md-12" style="text-align: center;">
  <h5 class="mb-2 mt-4 brand-text font-weight-light" style="text-align: left;"><b class="text-info">HOSPITALS</b> <small class="text-gray">STATISTICS</small></h5>
         <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed ">
                  <thead>
                      <tr>
                      
                      <th style="width: 55%" class="text-info">Hospital</th>
                      <th style="width: 15%" class="text-info">Local</th>
                      <th  style="width: 15%" class="text-info">Foreign</th>
                      <th style="width: 15%" class="text-info">Total</th>
                    </tr>
                  </thead>
                  <tbody class="text-gray">
                         <?php
          $hoscount = count($response['data']['hospital_data']);
          

                for($i=0;$i<$hoscount;$i++){echo "<tr>";
                  echo "<td>".$response['data']['hospital_data'][$i]['hospital']['name']."</td>";
                  echo "<td class='counter'>".$response['data']['hospital_data'][$i]['treatment_local']."</td>";
                  echo "<td class='counter'>".$response['data']['hospital_data'][$i]['treatment_foreign']."</td>";
                  echo "<td class='counter'>".$response['data']['hospital_data'][$i]['treatment_total']."</td>";
                  echo "</tr>";
                }
                

                
         // $i=0;

          
          ?>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div> 
          
         
          </div>
        </div>

         


               
                <div class="alert alert-light alert-dismissible">
                 
                  <p brand-text font-weight-light text-info><i class="icon fas fa-check text-info"></i> Last Update ! &nbsp&nbsp&nbsp<small class="text-info" ><?php echo $response['data']['update_date_time']; ?></small></hp>
                 
                </div>
              
        <!-- /.row -->

        <!-- Small Box (Stat card) -->
   
       
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline ">
      CODE DISCRETE
    </div>
    <!-- Default to the left -->
    <strong class="brand-text font-weight-light">Copyright &copy; <?php echo Date('Y'); ?> Lahiru Danushka. All rights reserved.</strong> 
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script>
  $(function () {
     var areaChartData = {
      labels  : [
      <?php
 $sql = "SELECT `date` FROM daycount";
$result = $conn->query($sql);
$x=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "'".date('d-M',strtotime($row['date']))."'"; 
        
        echo ",";
    }
} else {
    echo "0 results";
}
          

          ?>
          ],
      datasets: [
        {
          label               : 'Patients',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : true,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [

          <?php

          $sql = "SELECT count FROM daycount";
$result = $conn->query($sql);
$x=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        echo $row['count']+$x; 
        $x=$x+$row['count'];
       
        echo ",";
    }
   
} else {
    echo "0 results";
}

          ?>

          ]
        },
        {
          
        },
      ]
    }
    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */


    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
    var lineChartData = jQuery.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    //lineChartData.datasets[1].fill = false;
    lineChartOptions.datasetFill = false

    var lineChart = new Chart(lineChartCanvas, { 
      type: 'line',
      data: lineChartData, 
      options: lineChartOptions
    })



     var areaChartData2 = {
      labels  : [
      <?php
 $sql = "SELECT `date` FROM daycount";
$result = $conn->query($sql);
$x=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "'".date('d-M',strtotime($row['date']))."'"; 
        
        echo ",";
    }
} else {
    echo "0 results";
}
          

          ?>
          ],
      datasets: [
        {
          label               : 'Patients Per Day',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : true,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [

          <?php

          $sql = "SELECT count FROM daycount";
$result = $conn->query($sql);
$s=1;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        echo $row['count']; 
        //$x=$x+$row['count'];
       $s++;
        echo ",";
    }

} else {
    echo "0 results";
}

          ?>

          ]
        },
       
      ]
    }


  var barChartData = jQuery.extend(true, {}, areaChartData2)


    var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
    var stackedBarChartData = jQuery.extend(true, {}, barChartData)

    var stackedBarChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      scales: {
        xAxes: [{
          stacked: true,
        }],
        yAxes: [{
          stacked: true
        }]
      }
    }

    var stackedBarChart = new Chart(stackedBarChartCanvas, {
      type: 'bar', 
      data: stackedBarChartData,
      options: stackedBarChartOptions
    })
  })
</script>
</script><script  src="./script.js"></script>
 <script type="text/javascript"> function showTooltip(evt, text) {
  let tooltip = document.getElementById("tooltip");
  tooltip.innerHTML = text;
  tooltip.style.display = "block";
  tooltip.style.left = evt.pageX + 10 + 'px';
  tooltip.style.top = evt.pageY + 10 + 'px';
}



function hideTooltip() {
  var tooltip = document.getElementById("tooltip");
  tooltip.style.display = "none";
}</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="jquery.countup.min.js"></script>
<script type="text/javascript">
  $('.counter').countUp({
  'time': 500,
  'delay': 10
});
</script>

</body>
</html>
