<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from brandsdetails  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Page data updated  successfully";

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$selectedDate = $_POST["selectedDate"];
	$databaseDateFormat = date("y/m/d", strtotime($selectedDate));

	$sql = "SELECT * FROM vehiclesdetails WHERE RegDate > '$databaseDateFormat'";
	$query = $dbh->prepare($sql);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
}

 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>MK Travels |Admin Manage testimonials   </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
					


					<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-8">
							<h2 class="page-title">New Vehicle Adding Summary </h2>
							</div>
							
						</div>
						<div class="row">
							<div style="margin-bottom:20px; float:right;margin-right:100px">
							<form method="post" action="vehicle-report.php">
									<label for="selectedDate">Select A Date:</label>
									<input type="date" id="selectedDate" name="selectedDate" required value="<?php echo isset($_POST['selectedDate']) ? htmlentities($_POST['selectedDate']) : ''; ?>">									<button style="background-color:#26A7D9"type="submit">Generate Report</button>
							</form>
							</div>
							
						</div>

						
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">View New Vehicle  Details after selectedDate booking </div>
							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>No</th>
											<th> Vehicles Title</th>
											<th>Vehicles Brand </th>
											<th>Location</th>
										<th>Price Per Day</th>
										<th>Fuel Type</th>
										<th>ModelYear</th>
										<th>Seat Capacity</th>
                                        <th>Register Date</th>
										</tr>
									</thead>
									<tbody>

									<?php
									if ($_SERVER["REQUEST_METHOD"] == "POST") {
										$selectedDate = $_POST["selectedDate"];
										$databaseDateFormat = date("y/m/d", strtotime($selectedDate));
										

										$sql = "SELECT * FROM vehiclesdetails WHERE RegDate > '$databaseDateFormat'";

										$query = $dbh -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
										foreach($results as $result)
										{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->VehiclesTitle);?></td>
											<td><?php echo htmlentities($result->VehiclesBrand);?></td>
											<td><?php echo htmlentities($result->Location);?></td>
	<!-- <td><php echo htmlentities($result->dob);?></td>
											<td><php echo htmlentities($result->Address);?></td>
											<td><php echo htmlentities($result->City);?></td>
											<td><php echo htmlentities($result->Country);?></td> -->
											<td><?php echo htmlentities($result->PricePerDay);?></td>
											<td><?php echo htmlentities($result->FuelType);?></td>
											<td><?php echo htmlentities($result->ModelYear);?></td>
                                            <td><?php echo htmlentities($result->SeatingCapacity);?></td>
											<td><?php echo htmlentities($result->RegDate);?></td>
										</tr>
										
										<?php $cnt=$cnt+1; }}
										else {
											echo "No results found.";
										}
									} ?>
										
									</tbody>
								</table>

						

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
<?php } ?>
