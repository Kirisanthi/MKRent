<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
?><!DOCTYPE HTML>
<html lang="en">
<head>

<title>MK Travels - My Booking</title>
<!--Bootstrap -->
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
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  

<script src="https://www.paypal.com/sdk/js?client-id=AZICfPuNWtxY0Xd89pS4zDFp6Q2_CIX3gB01vfeaBjC_aLlXv0FKIAf5C0ifFncSEheFGz42LwenFVdq"></script>

</head>
<body>

        
<!--Header-->
<?php include('includes/header.php');?>
<!--Page Header-->
<!-- /Header --> 

<!--Page Header-->
      <section class="page-header profile_page">
        <div class="container">
          <div class="page-header_wrap">
            <div class="page-heading">
              <h1>My Booking</h1>
            </div>
            <ul class="coustom-breadcrumb">
              <li><a href="#">Home</a></li>
              <li>My Booking</li>
            </ul>
          </div>
        </div>
        <!-- Dark Overlay-->
        <div class="dark-overlay"></div>
      </section>
<!-- /Page Header--> 


      <section class="user_profile inner_pages">
          <div class="container">
            <div class="row">
              <div style= "margin-left:15%; margin-right:15%">
                <div class="profile_wrap">
                        <h5 class="uppercase underline">My Booikngs</h5>
                    <div class="my_vehicles_list">
                        <form class="paypal" action="request.php" method="post" id="paypal_form" onsubmit="event.preventDefault(); payWithPaypal();">

                        <!-- <form class="paypal" action="paypal.html" method="post" id="paypal_form"> -->
                          <ul class="vehicle_listing">
                                <?php 
                                $useremail=$_SESSION['login'];
                                $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status,tblvehicles.PricePerDay,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totaldays,tblbooking.BookingNumber  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail order by tblbooking.id desc";
                                $query = $dbh -> prepare($sql);
                                $query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                foreach($results as $result)
                                {  ?>
 <h5 style="color:blue">Invoice</h5>
                                <li>
                                    <h4 style="color:#26A7D9">Booking No #<?php echo htmlentities($result->BookingNumber);?></h4>
                                    <div class="vehicle_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>">
                                    <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
                                    <div class="vehicle_title">

                                          <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"> <?php echo htmlentities($result->BrandName);?> ,
                                          <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
                                      <p><b>From </b> <?php echo htmlentities($result->FromDate);?> <b>To </b> <?php echo htmlentities($result->ToDate);?></p>
                                      <div style="float: left"><p><b>Message:</b> <?php echo htmlentities($result->message);?> </p></div>
                                    </div>
                
                    
                               

                              
                              
                                    <table>
                                   
                                          <tr>
                                            <th>Car Name</th>
                                            <th>From Date</th>
                                            <th>To Date</th>
                                            <th>Total Days</th>
                                            <th>Rent / Day</th>
                                          </tr>
                                          <tr>
                                            <td><?php echo htmlentities($result->VehiclesTitle);?>, <?php echo htmlentities($result->BrandName);?></td>
                                            <td><?php echo htmlentities($result->FromDate);?></td>
                                              <td> <?php echo htmlentities($result->ToDate);?></td>
                                              <td><?php echo htmlentities($tds=$result->totaldays);?></td>
                                                <td> <?php echo htmlentities($ppd=$result->PricePerDay);?></td>
                                          </tr>
                                          <tr>
                                            <th colspan="4" style="text-align:center;"> Grand Total</th>
                                            <th><?php echo htmlentities($tds*$ppd);?></th>
                                          </tr>
                                    </table>
                            

                            <h5 style="color:blue">You Can Pay Now!</h5>
                            <div id="paypal-button-container-<?php echo $cnt; ?>"></div>
                           
                           
                            <script src="https://www.paypal.com/sdk/js?client-id=AZICfPuNWtxY0Xd89pS4zDFp6Q2_CIX3gB01vfeaBjC_aLlXv0FKIAf5C0ifFncSEheFGz42LwenFVdq&currency=GBP"></script>
                            <script>
                                  // Render the PayPal button for each booking
                                  paypal.Buttons({
                                      createOrder: function(data, actions) {
                                          return actions.order.create({
                                              purchase_units: [{
                                                  amount: {
                                                      currency: '£', // Set the currency to GBP
                                                      value: '<?php echo $result->totaldays * $result->PricePerDay; ?>' // Use the total amount for each booking
                                                  }
                                              }]
                                          });
                                      },
                                      onApprove: function(data, actions) {
                                          return actions.order.capture().then(function(details) {
                                              alert('Transaction completed by ' + details.payer.name.given_name);
                                          });
                                      }
                                  }).render('#paypal-button-container-<?php echo $cnt; ?>');
                              </script>


                                                    
                                             </li>
                                             <?php
                                    $cnt++;
                                }
                            } else {
                            ?>
                                <h5 align="center" style="color:red">No booking yet</h5>
                            <?php } ?>
                        </ul>
                        <hr />
                    </form>


                </div>
              </div>
            </div>
          </div>
      </section>
<!--/my-vehicles--> 
<?php include('includes/footer.php');?>

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
</body>
</html>
<?php } ?>