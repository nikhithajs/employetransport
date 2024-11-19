<?php
session_start();
error_reporting(0);
require_once('include/config.php');
if(strlen( $_SESSION["adminid"])==0)
    {   
header('location:logout.php');
}

else{
if(isset($_POST['submit'])){
$vehregno = $_POST['vehregno'];
$drivername = $_POST['drivername'];
$drivercontnum = $_POST['drivercontnum'];
$vehicletype = $_POST['vehicletype'];
$timeslots = $_POST['timeslots'];
$source = $_POST['source'];
$destination = $_POST['destination'];
$routenumber = $_POST['routenumber'];
$ret="select VehicleRegNum,DriverContactNum from tblvehicle where VehicleRegNum=:vehregno";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':vehregno', $vehregno, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="INSERT INTO tblvehicle(VehicleRegNum,DriverName,DriverContactNum,VehicleType,TimeSlots,Source,Destination,RouteNumber) Values(:vehregno,:drivername,:drivercontnum,:vehicletype,:timeslots,:source,:destination,:routenumber)";
$query = $dbh -> prepare($sql);
$query->bindParam(':vehregno',$vehregno,PDO::PARAM_STR);
$query->bindParam(':drivername',$drivername,PDO::PARAM_STR);
$query->bindParam(':drivercontnum',$drivercontnum,PDO::PARAM_STR);
$query->bindParam(':vehicletype',$vehicletype,PDO::PARAM_STR);
$query->bindParam(':timeslots',$timeslots,PDO::PARAM_STR);
$query->bindParam(':source',$source,PDO::PARAM_STR);
$query->bindParam(':destination',$destination,PDO::PARAM_STR);
$query->bindParam(':routenumber',$routenumber,PDO::PARAM_STR);
$query -> execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId>0)
{

echo "<script>alert('Vehicle Details Added Successfully');</script>";
 }
else {


echo "<script>alert('Data not insert successfully.');</script>";

 }
}
else
{

echo "<script>alert('Vehicle regsitration number already exist. Please try again');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a">
   <title>Employee Transport System || Add Vehicle</title>
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
        
        <div class="col-md-8">
     
          <div class="tile">
                  <h2 align="center"> Add Vehicle</h2>
              <hr />
      

           
            <div class="tile-body">
              <form  method="post">
                <div class="form-group col-md-12">
                  <label class="control-label"> Vehicle Registration Number</label>
                  <input class="form-control" name="vehregno" id="vehregno" type="text" placeholder="Enter Vehicle Registration Number" required="true">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label"> Driver Name</label>
                  <input class="form-control" name="drivername" id="drivername" type="text" placeholder="Enter Driver Name" required="true">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label"> Driver Contact Number</label>
                  <input class="form-control" name="drivercontnum" id="drivercontnum" type="text" placeholder="Enter Driver Contact Number" maxlength="10" pattern="[0-9]+" required="true">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label"> Vehicle Type</label>
                  <select class="form-control" name="vehicletype" required="true">
                    <option value="">Choose Vehcle Type</option>
                    <option value="Car">Car</option>
                    <option value="Van">Van</option>
                    <option value="Bus">Bus</option>
                  </select>
                 
                </div>
                   <div class="form-group col-md-12">
                  <label class="control-label"> Time Slots</label>
                  <input class="form-control" name="timeslots" id="timeslots" type="text" placeholder="Enter Time Duration example(10 am to 11 am)" required="true">
                </div>
                 <div class="form-group col-md-12">
                  <label class="control-label"> Source</label>
                  <input class="form-control" name="source" id="source" type="text" placeholder="Enter Source" required="true">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label"> Destination</label>
                  <input class="form-control" name="destination" id="destination" type="text" placeholder="Enter Destination" required="true">
                </div>
                 <div class="form-group col-md-12">
                  <label class="control-label"> Route Number</label>
                  <input class="form-control" name="routenumber" id="routenumber" type="text" placeholder="Enter Route Number" required="true">
                </div>
                <div class="form-group col-md-4 align-self-end">
                
                  <input type="submit" name="submit" id="submit" class="btn btn-primary" value=" Submit">
                </div>
              </form>
              
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
    <script type="text/javascript" src="j../s/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  
  </body>
</html><?php } ?>