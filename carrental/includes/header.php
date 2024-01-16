
<header>
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div style="margin: 15px;">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
<div class="header_wrap">
<div class="user_login">
  <ul>
  <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-user-circle" aria-hidden="true"></i> 

    <?php 
$email = $_SESSION['login'];
$sql = "SELECT FullName, Roles FROM usersdetails WHERE EmailId=:email";
$query = $dbh->prepare($sql);
$query->bindParam(':email', $email, PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

if ($query->rowCount() > 0) {
    foreach ($results as $result) {
        echo htmlentities($result->FullName);
    }
}
?>
<i class="fa fa-angle-down" aria-hidden="true"></i></a>
<ul class="dropdown-menu">
    <?php if ($_SESSION['login']) { ?>
        <li><a href="profile.php">Profile Settings</a></li>
        <li><a href="update-password.php">Update Password</a></li>
        <?php if ($result->Roles == "owner") { ?>
            <li><a href="my-booking.php">My Received Booking</a></li>
        <?php } ?>
        <?php if ($result->Roles == "driver") { ?>
            <li><a href="my-booking.php">My Booking</a></li>
        <?php } ?>
        <li><a href="post-testimonial.php">Post a Feedback</a></li>
        <li><a href="my-testimonials.php">My Feedbacks</a></li>
        <li><a href="logout.php">Sign Out</a></li>
    <?php } ?>
</ul>



       </ul>
      </li>
      </ul>
  </div>
        <div class="header_search">
        <div class="header_info">
            <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>

          </div>
          <!-- <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="search.php" method="post" id="header-search-form">
            <input type="text" placeholder="Search..." name="searchdata" class="form-control" required="true">
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form> -->
        </div>
      </div>

<div class="logo">
    <img src="assets/images/MK.jpg" alt="Avatar" style="width:50px; border-radius: 50%; margin-right:15px">
</div>

<div class="collapse navbar-collapse" id="navigation">
    <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="page.php?type=aboutus">About Us</a></li>
        <li><a href="car-listing.php">Car Listing</a></li>
        <li><a href="contact-us.php">Contact Us</a></li>
        <?php if ($result->Roles == "owner") { ?>
            <li><a href="post-vehicle-owner.php">Add Car</a></li>
            <li><a href="owner-payment.php">Payment</a></li>
        <?php } ?>
    </ul>
</div>


    </div>
  </nav>



  <!-- Navigation end --> 
  
</header>