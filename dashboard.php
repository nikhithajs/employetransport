<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["adminid"])==0)
    {   
header('location:logout.php');
}

else{
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Employee Transport System || Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
      <?php include 'include/header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <?php include 'include/sidebar.php'; ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
  <?php
$query=$dbh->prepare("SELECT id FROM tblemployee");
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$regemp=$query -> rowCount();
?>

        <div class="col-md-6 col-lg-4">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info"><a href="manage-employee.php" target="blank">
              <h4>Registered Employees</h4>
              <p><b><?php echo $regemp;?></b></p></a>
            </div>
          </div>
        </div>



<?php
$ret=$dbh->prepare("SELECT id FROM tbldepartment");
$ret-> execute();
$resultss = $ret -> fetchAll(PDO::FETCH_OBJ);
$listeddept=$ret -> rowCount();
?>
        <div class="col-md-6 col-lg-4">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <a href="manage-department.php" target="blank">
              <h4>Listed Departments</h4>
              <p><b><?php echo $listeddept;?></b></p>
            </a>
            </div>
          </div>
        </div>


<?php
$sql=$dbh->prepare("SELECT ID FROM tblvehicle");
$sql-> execute();
$result = $sql -> fetchAll(PDO::FETCH_OBJ);
$listedvehicle=$sql -> rowCount();
?>
        <div class="col-md-6 col-lg-4">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">  <a href="manage-vehicle.php" target="blank">
              <h4>Listed Vehicle</h4>
              <p><b><?php echo $listedvehicle;?></b></p>
            </a>
            </div>
          </div>
        </div>
      </div>
<!-------------------------------->
<hr />
<h3 align="center">Vehicle Booking Details </h3>
<hr />
      <div class="row">
  <?php
$query=$dbh->prepare("SELECT ID FROM tblvehbook");
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$totalbook=$query -> rowCount();
?>
        <div class="col-md-6 col-lg-6">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info"><a href="vehbook-history.php" target="blank">
              <h4>Total Booking</h4>
              <p><b><?php echo $totalbook;?></b></p>
            </a>
            </div>
          </div>
        </div>



<?php
$ret=$dbh->prepare("SELECT ID FROM tblvehbook where AdminStatus is null");
$ret-> execute();
$resultss = $ret -> fetchAll(PDO::FETCH_OBJ);
$newbooking=$ret -> rowCount();
?>
        <div class="col-md-6 col-lg-6">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-file fa-3x"></i>
            <div class="info"> <a href="new-vehbook-request.php" target="blank">
              <h4>New Booking Requests</h4>
              <p><b><?php echo $newbooking;?></b></p>
            </a>
            </div>
          </div>
        </div>


<?php
$sql=$dbh->prepare("SELECT ID FROM tblvehbook where AdminStatus='Reject'");
$sql-> execute();
$result = $sql -> fetchAll(PDO::FETCH_OBJ);
$rejectedbooking=$sql -> rowCount();
?>
        <div class="col-md-6 col-lg-6">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-file fa-3x"></i>
            <div class="info"><a href="reject-vehbook-request.php" target="blank">
              <h4>Rejected Booking Requests</h4>
              <p><b><?php echo $rejectedbooking;?></b></p>
            </a>
            </div>
          </div>
        </div>

 <?php
$sql=$dbh->prepare("SELECT ID FROM tblvehbook where AdminStatus='Approved'");
$sql-> execute();
$result = $sql -> fetchAll(PDO::FETCH_OBJ);
$approvedbooking=$sql -> rowCount();
?>       
      <div class="col-md-6 col-lg-6">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-file fa-3x"></i>
            <div class="info"><a href="approved-vehbook-request.php" target="blank">
              <h4>Approved Booking Requests</h4>
              <p><b><?php echo $approvedbooking;?></b></p>
            </a>
            </div>
          </div>
        </div>


      </div>



    </main>
    <!-- Essential javascripts for application to work-->
     <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script type="text/javascript" src="../js/plugins/chart.js"></script>

  </body>
</html><?php } ?>