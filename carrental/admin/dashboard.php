<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	?>

<?php 
$sql ="SELECT id from tblusers ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$regusers=$query->rowCount();
?>

<?php 
$sql1 ="SELECT id from tblvehicles ";
$query1 = $dbh -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalvehicle=$query1->rowCount();
?>

<?php 
$sql2 ="SELECT id from tblbooking ";
$query2= $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$bookings=$query2->rowCount();
?>

<?php 
$sql4 ="SELECT id from tblsubscribers ";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$subscribers=$query4->rowCount();
?>

<?php 
$sql5 ="SELECT id from tbltestimonial ";
$query5= $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$testimonials=$query5->rowCount();
?>

<?php 
$sql6 ="SELECT id from tblcontactusquery ";
$query6 = $dbh -> prepare($sql6);;
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$query=$query6->rowCount();
?>

<!-- barchart1 -->
<?php
 $totalUsers = $regusers + $totalvehicle + $bookings + $subscribers + $testimonials;



 $dataPoints = array( 
	 array("y" =>  ($regusers / $totalUsers) * 100, "label" => "Total Users" ),
	 array("y" => ($totalvehicle / $totalUsers) * 100, "label" => "TotalVehicle" ),
	 array("y" => ($bookings / $totalUsers) * 100, "label" => "TotalBooking" ),
	 array("y" => ($subscribers / $totalUsers) * 100, "label" => "TotalSubscribers" ),
	 array("y" => ($testimonials / $totalUsers) * 100, "label" => "Testimonials" )
 );
  
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
	
	<title>MK Travels | Admin Dashboard</title>

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

	<!-- barchart2 -->
	<script>
 window.onload = function() {
  
 var chart = new CanvasJS.Chart("chartContainer", {
	 animationEnabled: true,
	 theme: "light2",
	 title:{
		 text: "MK Travels Summary in Pie chart"
	 },
	 axisY: {
		 title: "Total Count (in Number)"
	 },
	 data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	 }]
 });
 chart.render();
  
 }
 </script>


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
						<div class="col-md-6">
						<h3 class="page-title" >MK Travels Over All Summary</h3>
						</div>
				
						<div class="col-md-3">
									<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
											<a href="report.php" style="color:#325E9F" class="block-anchor panel-footer text-center"> Booking Report &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>	
									</div>
							</div>
							<div class="col-md-3">
									<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
											<a href="vehicle-report.php" style="color:#325E9F" class="block-anchor panel-footer text-center">Vehicle Report &nbsp; <i class="fa fa-arrow-right"></i></a>
											</div>	
									</div>
							</div>
						</div>

						<!-- chart03 -->
							<div class="row">
								<div class="column" >
										<div id="chartContainer" style="height: 340px; width: 100%;  "></div>
								</div>
							</div>


						<div class="row">
							<div class="col-md-12">
								<div class="row">
								
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php echo htmlentities($totalvehicle);?></div>
													<div class="stat-panel-title text-uppercase">Total Listed Vehicles</div>
												</div>
											</div>
											<a href="manage-vehicles.php" style="color:#325E9F" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
													<div class="stat-panel-number h1 "><?php echo htmlentities($bookings);?></div>
													<div class="stat-panel-title text-uppercase">Total Bookings</div>
												</div>
											</div>
											<a href="manage-bookings.php" style="color:#325E9F" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">


													<div class="stat-panel-number h1 "><?php echo htmlentities($testimonials);?></div>
													<div class="stat-panel-title text-uppercase">Testimonials</div>
												</div>
											</div>
											<a href="testimonials.php" style="color:#325E9F" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">


													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Get Queries</div>
												</div>
											</div>
											<a href="manage-conactusquery.php" style="color:#325E9F" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>



			<!-- <div class="row">
								<div class="col-md-12">

									
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-3">
													<div class="panel panel-default">
														<div class="panel-body bk-primary text-light">
															<div class="stat-panel text-center">
																<div class="stat-panel-number h1 "><echo htmlentities($subscribers);?></div>
																<div class="stat-panel-title text-uppercase">Subscibers</div>
															</div>
														</div>
														<a href="manage-subscribers.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
													</div>
												</div>
												<div class="col-md-3">
													<div class="panel panel-default">
														<div class="panel-body bk-success text-light">
															<div class="stat-panel text-center">

																<div class="stat-panel-number h1 "><echo htmlentities($query);?></div>
																<div class="stat-panel-title text-uppercase">Queries</div>
															</div>
														</div>
														<a href="manage-conactusquery.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
													</div>
												</div>
												<div class="col-md-3">
													<div class="panel panel-default">
														<div class="panel-body bk-info text-light">
															<div class="stat-panel text-center">


																<div class="stat-panel-number h1 ">< echo htmlentities($testimonials);?></div>
																<div class="stat-panel-title text-uppercase">Testimonials</div>
															</div>
														</div>
														<a href="testimonials.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
													</div>
												</div>
											
											</div>
										</div>
									</div>
								</div>
							</div> -->



		</div>
	</div>
</div>


    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
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