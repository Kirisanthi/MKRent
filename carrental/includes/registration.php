<?php
//error_reporting(0);
if (isset($_POST['signup'])) {
    $fname = $_POST['fullname'];
    $email = $_POST['emailid'];
    $mobile = $_POST['mobileno'];
    $roles = $_POST['roles'];
    $password = md5($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);

    if ($password === $confirmpassword) {
        $sql = "INSERT INTO  tblusers(FullName,EmailId,ContactNo,Roles,Password) VALUES(:fname,:email,:mobile,:roles,:password)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':fname', $fname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
        $query->bindParam(':roles', $roles, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();

        if ($lastInsertId) {
          echo "<script>
          var alertBox = document.createElement('div');
          alertBox.className = 'custom-alert';
          alertBox.innerHTML = '<p> <strong style=\"color: green;\">Success:</strong> Registration successful. Now you can login.</p>';
          document.body.appendChild(alertBox);
    
          setTimeout(function() {
              document.body.removeChild(alertBox);
          }, 4000); // Remove the alert after 4 seconds
        </script>";
            // echo "<script>alert('Registration successful. Now you can login');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    } else {
      echo "<script>
      var alertBox = document.createElement('div');
      alertBox.className = 'custom-alert';
      alertBox.innerHTML = '<p><strong style=\"color: red;\">Error:</strong> Password and Confirm Password do not match. Try again to register.</p>';
      document.body.appendChild(alertBox);

      setTimeout(function() {
          document.body.removeChild(alertBox);
      }, 4000); // Remove the alert after 4 seconds
    </script>";
    
        // echo "<script>alert('Password and Confirm Password do not match Try again ');</script>";
    }
}
?>

<style>
    .custom-alert {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #26A7D9; /* Red background color */
        color: white;
        padding: 15px;
        border-radius: 5px;
        z-index: 9999;
        text-align: center;
    }
</style>

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" onSubmit="return valid();">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
                </div>
                      <div class="form-group">
                      <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" pattern="\d{10}" title="Please enter a valid 10-digit mobile number" required="required">

                  <!-- <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" required="required"> -->
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
                </div>

                <div class="form-group">
                <div class="row">
                    <div class="column" style="margin-left: 30px;" >
                    <h6>Role</h6>
                    </div>
                    <div class="column" style="margin-left: 30px;">
                         <input style="margin-left: 30px;" type="radio" id="driver" name="roles" value="driver">
                         <label class="radio_align" for="driver">Driver</label>

                         <input  style="margin-left: 30px;" type="radio" id="owner" name="roles" value="owner">
                         <label for="owner">Owner</label><br>
                    </div>
                  </div>
                  </div>

                <div class="form-group checkbox" style="margin-left: 30px;">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>