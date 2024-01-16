<?php
if(isset($_POST['emailsubscibe']))
{
$subscriberemail=$_POST['subscriberemail'];
$sql ="SELECT SubscriberEmail FROM subscribersdetails WHERE SubscriberEmail=:subscriberemail";
$query= $dbh -> prepare($sql);
$query-> bindParam(':subscriberemail', $subscriberemail, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<script>alert('Already Subscribed.');</script>";
}
else{
$sql="INSERT INTO  subscribersdetails(SubscriberEmail) VALUES(:subscriberemail)";
$query = $dbh->prepare($sql);
$query->bindParam(':subscriberemail',$subscriberemail,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Subscribed successfully.');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}
?>

<footer>
  <div class="footer-top">
    <div style="margin-left:7%">
      <div class="row">
      
        <div class="col-md-3">
       
          <h3 style="color:white;margin-top:15%;">We Are For You! </h3><h4 style="margin-left:15%;color:white"> Come Fast to join Us..</h4> 
          <img src="assets/images/MK.jpg" alt="Avatar" style="width:100px;margin-left:15%">
        </div>
  
        <div class="col-md-2">
          <h6>About Us</h6>
          <ul>

          <li><a href="page.php?type=aboutus">About Us</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
            <li><a href="car-listing.php">Cars list</a></li>
            <li><a href="page.php?type=privacy">Privacy Policy</a></li>
          <li><a href="page.php?type=terms">Terms And Conditions</a></li>
               <li><a href="admin/">Admin Login</a></li>
          </ul>
        </div>



        
        <div class="col-md-3" style="padding:2%">
          <h6>Subscribe Newsletter</h6>
          <div class="newsletter-form">
            <form method="post">
              <div class="form-group">
                <input type="email" name="subscriberemail" class="form-control newsletter-input" required placeholder="Enter Email Address" />
              </div>
              <button type="submit" name="emailsubscibe" class="btn btn-block">Subscribe <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </form>
          </div>
        </div>

        
        <div class="col-md-4">
        <?php 
$pagetype=$_GET['type'];
$sql = "SELECT Address,EmailId,ContactNo from contactusdetails";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
          <h6>Connect with Us</h6>
          <ul>
          <li>
              <div class="icon_wrap"><i class="fa fa-phone" aria-hidden="true"></i></div>
              <div class="contact_info_m"><a href="mailto:contact@exampleurl.com"><?php   echo htmlentities($result->ContactNo); ?></a></div>

            </li>
            <li>
              <div class="icon_wrap"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
              <div class="contact_info_m"><a href="tel:61-1234-567-90"><?php   echo htmlentities($result->EmailId); ?></a></div>

            </li>
          <li>
              <div class="icon_wrap"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
              <div class="contact_info_m"><?php   echo htmlentities($result->Address); ?></div>
            </li>
            <iframe style="height: 150px; width: 200px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2480.2542775826905!2d-0.37962082414082193!3d51.56357190659921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876132cce667c1f%3A0x25c9da0fa03fc491!2s49%20Leamington%20Cres%2C%20Harrow%20HA2%209HH!5e0!3m2!1sen!2suk!4v1703677622005!5m2!1sen!2suk" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
          </ul>
          <?php }} ?>
        </div>


      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-6 text-right">
          <div class="footer_widget">
            <p>Connect with Us:</p>
            <ul>
              <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-md-pull-6">
          <p class="copy-right">Copyright &copy; 2024 MK Travels. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </div>
</footer>