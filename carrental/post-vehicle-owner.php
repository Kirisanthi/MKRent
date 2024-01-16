<?php
session_start();
error_reporting(0);
include('includes/config.php');
// if(strlen($_SESSION['alogin'])==0 || strlen($_SESSION['alogin'])==1)
// 	{	
// header('location:index.php');
// }
// else{ 

$email = $_SESSION['login'];
$sql = "SELECT EmailId FROM usersdetails WHERE EmailId=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
$ownerEmail = $result['EmailId'];


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
					

		if(isset($_POST['submit']))
		{
					$vehicletitle=$_POST['vehicletitle'];
					$brand=$_POST['brandname'];
					$location=$_POST['location'];
					$vehicleoverview=$_POST['vehicalorcview'];
					$priceperday=$_POST['priceperday'];
					$fueltype=$_POST['fueltype'];
					$modelyear=$_POST['modelyear'];
					$seatingcapacity=$_POST['seatingcapacity'];
					$vimage1=$_FILES["img1"]["name"];
					$vimage2=$_FILES["img2"]["name"];
					$vimage3=$_FILES["img3"]["name"];
					$vimage4=$_FILES["img4"]["name"];
					move_uploaded_file($_FILES["img1"]["tmp_name"],"img/vehicleimages/".$_FILES["img1"]["name"]);
					move_uploaded_file($_FILES["img2"]["tmp_name"],"img/vehicleimages/".$_FILES["img2"]["name"]);
					move_uploaded_file($_FILES["img3"]["tmp_name"],"img/vehicleimages/".$_FILES["img3"]["name"]);
					move_uploaded_file($_FILES["img4"]["tmp_name"],"img/vehicleimages/".$_FILES["img4"]["name"]);

					// $sql="INSERT INTO vehiclesdetails(VehiclesTitle,VehiclesBrand,Location,VehiclesOverview,PricePerDay,FuelType,ModelYear,SeatingCapacity,Vimage1,Vimage2,Vimage3,Vimage4) VALUES(:vehicletitle,:brand,:location,:vehicleoverview,:priceperday,:fueltype,:modelyear,:seatingcapacity,:vimage1,:vimage2,:vimage3,:vimage4)";
					$sql="INSERT INTO vehiclesdetails(VehiclesTitle, VehiclesBrand, Location, VehiclesOverview, PricePerDay, FuelType, ModelYear, SeatingCapacity, Vimage1, Vimage2, Vimage3, Vimage4, ownerEmail) VALUES (:vehicletitle, :brand, :location, :vehicleoverview, :priceperday, :fueltype, :modelyear, :seatingcapacity, :vimage1, :vimage2, :vimage3, :vimage4, :owneremail)";
					$query = $dbh->prepare($sql);
					$query->bindParam(':vehicletitle',$vehicletitle,PDO::PARAM_STR);
					$query->bindParam(':brand',$brand,PDO::PARAM_STR);
					$query->bindParam(':location',$location,PDO::PARAM_STR);
					$query->bindParam(':vehicleoverview',$vehicleoverview,PDO::PARAM_STR);
					$query->bindParam(':priceperday',$priceperday,PDO::PARAM_STR);
					$query->bindParam(':fueltype',$fueltype,PDO::PARAM_STR);
					$query->bindParam(':modelyear',$modelyear,PDO::PARAM_STR);
					$query->bindParam(':seatingcapacity',$seatingcapacity,PDO::PARAM_STR);
					$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
					$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
					$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
					$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
					$query->bindParam(':owneremail', $ownerEmail, PDO::PARAM_STR);
					$query->execute();
					$lastInsertId = $dbh->lastInsertId();
					if($lastInsertId)
					{
					$msg="Vehicle posted successfully";




					
					require 'phpmailer/src/Exception.php';
					require 'phpmailer/src/PHPMailer.php';
					require 'phpmailer/src/SMTP.php';
					$mail = new PHPMailer(true); 
					try {
									$mail->isSMTP();                                           
											$mail->Host       = 'smtp.gmail.com';                     
											$mail->SMTPAuth   = true;                                   
											$mail->Username   = 'kirumaju2@gmail.com';               
											$mail->Password   = 'lhea wcla vqte gmkf';                  
											$mail->SMTPSecure = 'tls';                                
											$mail->Port       = 587;                                  

											//Recipients
											$mail->setFrom('from@example.com', 'Mailer');
											$mail->addAddress('kirumaju2@gmail.com', 'Kirumaju');   

											// Content
											$mail->isHTML(true);                                        
											$mail->Subject = 'New Vehicle Posted';
											$mail->Body    = "A new vehicle has been posted with the following Details.<br>" .
											"VehicleTitle: '$vehicletitle'<br>" .
											"Location: '$location'<br>" .
											"Brand: '$brand'<br>" .
											"PricePerDay: '$priceperday'<br>";

											$mail->send();
											$msg = 'Vehicle posted successfully .... ';
						} catch (Exception $e) {
							$error = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
						}
					}
					else 
					{
					$error="Something went wrong. Please try again";
					}



					
		}


	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/MK.jpg">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
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
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
		<div class="ts-main-content">
				<div class="content-wrapper">
					<div class="container-fluid">

						<div class="row">
							<div class="col-md-12">
							<h5 class="panel-heading">Post A New Vehicle</h5>
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">Vehicle Basic Information</div>
													<?php if($error){?><div class="errorWrap" style="color:red"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
													else if($msg){?><div class="succWrap" style="color:green"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

												<div class="panel-body">
														<form method="post" class="form-horizontal" enctype="multipart/form-data">
																<div class="form-group">
																	<label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
																	<div class="col-sm-4">
																		<input type="text" name="vehicletitle" class="form-control" required>
																	</div>
																	<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
																	<div class="col-sm-4">
																		<select class="selectpicker" name="brandname" required>
																		<option value=""> Select </option>
																			<?php $ret="select id,BrandName from brandsdetails";
																			$query= $dbh -> prepare($ret);
																			//$query->bindParam(':id',$id, PDO::PARAM_STR);
																			$query-> execute();
																			$results = $query -> fetchAll(PDO::FETCH_OBJ);
																			if($query -> rowCount() > 0)
																			{
																			foreach($results as $result)
																			{
																			?>
																			<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
																			<?php }} ?>

																		</select>
																	</div>
																</div>




																<div class="form-group">
																	<label class="col-sm-2 control-label">Vehicle Pick-up location<span style="color:red">*</span></label>
																		<div class="col-sm-4">
																		<input type="text" name="location" class="form-control" required>
																		</div>
																</div>
																<div class="hr-dashed"></div>
																								


																<div class="form-group">
																	<label class="col-sm-2 control-label">Price Per Day(in £)<span style="color:red">*</span></label>
																			<div class="col-sm-4">
																			<input type="text" name="priceperday" class="form-control" required>
																			</div>
																	<label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
																	<div class="col-sm-4">
																			<select class="selectpicker" name="fueltype" required>
																			<option value=""> Select </option>

																			<option value="Petrol">Petrol</option>
																			<option value="Diesel">Diesel</option>
																			<option value="CNG">CNG</option>
																			</select>
																	</div>
																</div>


																	<div class="form-group">
																		<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
																			<div class="col-sm-4">
																			<input type="text" name="modelyear" class="form-control" required>
																			</div>
																		<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
																			<div class="col-sm-4">
																			<input type="text" name="seatingcapacity" class="form-control" required>
																			</div>
																	</div>

																		<div class="hr-dashed"></div>
																			<div class="form-group">
																			<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
																			<div class="col-sm-10">
																			<textarea class="form-control" name="vehicalorcview" rows="3" required></textarea>
																			</div>
																		</div>

																	<div class="hr-dashed"></div>


																	<div class="form-group">
																			<div class="col-sm-12">
																			<h4><b>Upload Images</b></h4>
																			</div>
																	</div>


																	<div class="form-group">
																			<div class="col-sm-3">
																			Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
																			</div>
																			<div class="col-sm-3">
																			Image 2<span style="color:red">*</span><input type="file" name="img2" required>
																			</div>
																			<div class="col-sm-3">
																			Image 3<span style="color:red">*</span><input type="file" name="img3" required>
																			</div>
																			<div class="col-sm-3">
																			Image 4<span style="color:red">*</span><input type="file" name="img4" required>
																			</div>
																	</div>


																	<div class="hr-dashed"></div>									
																</div>

																				
																<div class="form-group">
																	<div style="float:right">
																		<button style="padding:10px;background-color: #bb2124; color:white"  type="reset">Cancel</button>
																		<button style="margin-right:15px; margin-bottom:5px" class="btn btn-primary" name="submit" type="submit">Save changes</button>
																	</div>
																</div>
														</form>
												</div>
											</div>
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
