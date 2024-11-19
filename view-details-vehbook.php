<?php 
error_reporting(0);
include  'include/config.php';
$vehbookid=$_GET['vehbookid'];
if(isset($_POST['submit'])){
$vehbookid=$_GET['vehbookid'];
$status = $_POST['status'];
$remarks = $_POST['remarks'];

$sql="update tblvehbook set AdminStatus=:status,AdminRemarks=:remarks where ID=:vehbookid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vehbookid',$vehbookid,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':remarks',$remarks,PDO::PARAM_STR);
$query -> execute();
echo "<script>alert('Vehicle Booking status updated Successfully');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a">
   <title>Employee Transport System</title>
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
            <div class="tile-body">
               <?php
                  $vehbookid=$_GET['vehbookid'];
                $sql="SELECT tblvehbook.ID, tblvehbook.EmpID, tblvehbook.VehID,tblvehbook.FromDate,tblvehbook.Todate,tblvehbook.ArrivalTime, tblvehbook.Pickuppoint,tblvehbook.Remark,tblvehbook.BookingDate,tblvehbook.AdminStatus as adminstatus,tblvehbook.AdminRemarks,tblvehbook.UpdationDate,tblemployee.EmpId,tblemployee.EmpId,tblemployee.fname,tblemployee.lname,tblemployee.department_name,tblemployee.email,tblemployee.mobile,tblemployee.country,tblemployee.state,tblemployee.city,tblemployee.address,tblemployee.photo,tblemployee.dob,tblemployee.date_of_joining,tblemployee.create_date,tblvehicle.VehicleRegNum,tblvehicle.DriverName,tblvehicle.DriverContactNum,tblvehicle.VehicleType,tblvehicle.TimeSlots,tblvehicle.Source,tblvehicle.Destination,tblvehicle.RouteNumber,tbldepartment.DepartmentName FROM tblvehbook
join tblemployee on tblemployee.EmpID=tblvehbook.EmpID join tblvehicle on tblvehicle.ID=tblvehbook.VehID join tbldepartment on tblemployee.department_name=tbldepartment.id
where tblvehbook.ID=:vehbookid";
                $query= $dbh->prepare($sql);
                $query->bindParam(':vehbookid',$vehbookid, PDO::PARAM_STR);
                $query-> execute();
                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query -> rowCount() > 0)
                {
                foreach($results as $result)
                {
                ?>
              <table class="table table-hover table-bordered">
                <tbody>
<tr>
  <th colspan="4" style="font-size:20px; color:blue;">Employee Information</th>
</tr>


<tr>
<th>EmpId</th> <td><?php echo $result->EmpID;?></td>
<th>Photo</th> <td><img src="<?php echo $result->photo;?>"width=150px; height="130px;"></td>
</tr>

<tr>
<th>First Name</th> <td><?php echo $result->fname;?></td>
<th>Last Name</th> <td><?php echo $result->lname;?></td>
</tr>
<tr>
<th>Department</th><td><?php echo $result->DepartmentName;?></td>
<th>Email</th><td><?php echo $result->email;?></td>
</tr>

<tr>
<th>Dob</th>
<td><?php echo $result->dob;?></td>
<th>Date Of Joining</th>
<td><?php echo $result->date_of_joining;?></td>
</tr>


<tr>
<th>Address</th>
<td><?php echo $result->address;?></td>
  <th>City</th>
<td><?php echo $result->city;?></td>
</tr>
<tr>

<th>State</th>
<td><?php echo $result->state;?></td>
<th>country</th>
<td><?php echo $result->country;?></td>
</tr>


<tr>
<th>Mobile</th> <td><?php echo $result->mobile;?></td>

</tr>


<tr>
  <th colspan="4" style="font-size:20px; color:blue;">Vehicle Related Info</th>
</tr>


<tr>
  <th>Vehicle Registrations Number</th>
  <td><?php echo $result->VehicleRegNum;?></td>
  <th>Driver Name</th>
  <td><?php echo $result->DriverName;?></td>
</tr>
<tr>
<th>Driver Contact Number</th>
<td><?php echo $result->DriverContactNum;?></td>
<th>Vehicle Type</th>
<td><?php echo $result->VehicleType;?></td>
</tr>
<tr>
<th>Time Slots</th>
<td><?php echo $result->TimeSlots;?></td>
<th>Source</th>
<td><?php echo $result->Source;?></td>
</tr>
<tr>
<th>Destination</th>
<td><?php echo $result->Destination;?></td>
<th>Route Number</th>
<td><?php echo $result->RouteNumber;?></td>
</tr>
<tr>
  <th colspan="4" style="font-size:20px; color:blue;">Vehicle Booking Information</th>
</tr>
<tr>
  <th>Booking Date</th>
<td colspan="3"><?php echo $result->FromDate;?> to <?php echo $result->Todate;?></td>
</tr>
<tr>
  <th>Arrival Time</th>
<td colspan="3"><?php echo $result->ArrivalTime;?></td>
</tr>
<tr>
  <th>Pick up Point</th>
<td colspan="3"><?php echo $result->Pickuppoint;?></td>
</tr>
<tr>
  <th>User Remark</th>
<td colspan="3"><?php echo $result->Remark;?></td>
</tr>
<tr>
  <th>Booking Date</th>
<td colspan="3"><?php echo $result->BookingDate;?></td>
</tr>
<tr>
  <th>Admin Remark</th>
<td  colspan="3"><?php $remark=$result->AdminRemarks;
if($remark==""){
echo htmlentities("Not Updated yet");    
} else {
echo htmlentities("$remark");        
}
?></td>
</tr>
<tr>
  <th>Admin Status</th>
<td  colspan="3"><?php $status=$result->adminstatus;
if($status==""){
echo htmlentities("Not Updated yet");    
} else {
echo htmlentities("$status");        
}
?></td>
</tr>
</tbody>
</table>
<?php 
$statuss=$result->AdminStatus;
if ($status==""):?>
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Take Action</button>
<?php endif;?>

            </div>

             <!--   here i am creating a modal popup code......... -->

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                    </div>
                    <div class="modal-body">
                     <div class="row">
        
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Admin Remark</h3>
                         
            <div class="tile-body">
              <form class="row" method="post">
              
                <div class="form-group col-md-12">
                  <label class="control-label">Booking Status</label>
                  <select name="status" class="form-control">
                    <option value="">--select--</option>
                    <option value="Approved">Approved</option>
                    <option value="Reject">Reject</option>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Description</label>
               <textarea name="remarks" id="remarks" class="form-control"></textarea>
                </div>
                
                 
                <div class="form-group col-md-4 align-self-end">
                  <input type="Submit" name="submit" id="submit" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><?php  $cnt=$cnt+1; } } ?>
                </div>
            </div>
        </div>

     <!--    // end modal popup code........ -->
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
  
  </body>
</html>