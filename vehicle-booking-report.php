<?php
session_start();
error_reporting(0);
include('include/config.php');
if(strlen($_SESSION['adminid'])==0)
{   
header('location:logout.php');
}
else{    

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a">
   <title>Employee Transport System||Booking Report</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
   <?php include 'include/header.php'; ?>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php include 'include/sidebar.php'; ?>
    <main class="app-content">
     

    <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
             <!---Success Message--->  
          
          <!---Error Message--->
                      <h3 class="tile-title">Booking B/w Dates Report</h3>
            <div class="tile-body">
              <form class="row" method="post">
               <div class="form-group col-md-6">
                  <label class="control-label">From Date</label>
                  <input class="form-control" type="date" name="fdate" id="fdate" placeholder="Enter From Date">
                </div>

                 <div class="form-group col-md-6">
                  <label class="control-label">To Date</label>
                  <input class="form-control" type="date" name="todate" id="todate" placeholder="Enter To Date">
                </div>
                <div class="form-group col-md-4 align-self-end">
                  <input type="Submit" name="Submit" id="Submit" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
      <?php 
if(Isset($_POST['Submit'])){?>
<?php
 $fdate=$_POST['fdate'];
 $tdate=$_POST['todate'];
?>
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <h2 align="center">Vehicle Booking Report from <?php echo date("d-m-Y", strtotime($fdate)); ?> To  <?php echo date("d-m-Y", strtotime($tdate)); ?></h2>
              <hr />
                 <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Sr.No</th>
                    <th>Booking Number</th>
                    <th>Emp ID</th>
                    <th>Vehicle Registration Number</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Booking Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                  <tbody>
                   <?php
                  $sql="SELECT tblvehbook.BookingID,tblvehbook.ID, tblvehbook.EmpID, tblvehbook.VehID,tblvehbook.FromDate,tblvehbook.Todate,tblvehbook.ArrivalTime, tblvehbook.Pickuppoint,tblvehbook.Remark,tblvehbook.BookingDate,tblvehbook.AdminStatus as adminstatus,tblemployee.EmpId,tblvehicle.VehicleRegNum FROM tblvehbook
join tblemployee on tblemployee.EmpID=tblvehbook.EmpID join tblvehicle on tblvehicle.ID=tblvehbook.VehID
where date(tblvehbook.BookingDate) between '$fdate' and '$tdate'";
                  $query= $dbh->prepare($sql);                  
                  $query-> execute();
                  $results = $query -> fetchAll(PDO::FETCH_OBJ);
                  $cnt=1;
                  if($query -> rowCount() > 0)
                  {
                  foreach($results as $result)
                  {
                  ?>

            
                  <tr>
                    <td><?php echo($cnt);?></td>
                    <td><?php echo htmlentities($result->BookingID);?></td>
                    <td><?php echo htmlentities($result->EmpID);?></td>
                    <td><?php echo htmlentities($result->VehicleRegNum);?></td>
                  <td><?php echo htmlentities($result->FromDate);?></td>
                  <td><?php echo htmlentities($result->Todate);?></td>
                 <td><?php echo htmlentities($result->BookingDate);?></td>
                  
                 
                 <td><?php $status=$result->adminstatus;
if($status==""){
echo htmlentities("Not Updated yet");    
} else {
echo htmlentities("$status");        
}
?></td>
                 <td><a href="view-details-vehbook.php?vehbookid=<?php echo htmlentities($result->ID);?>" class="waves-effect waves-light btn btn-primary m-b-xs"> View Details</a></td>
                </tr>
                 <?php  $cnt=$cnt+1; } } ?>
                      </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
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
  
  </body>
</html><?php } ?>