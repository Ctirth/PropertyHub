<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    
      <style>
    .error{
          color: red !important;
        }
      </style>
  
</head>
<?php
session_start();
include('config.php');
if(@$_SESSION['email'] != "")
{
  header( "Location: index.php" );
}
 function test_input($data)
 {
     $data=trim($data);
     $data=stripcslashes($data);
     $data=htmlspecialchars($data);
     return $data;
 }

if(isset($_REQUEST['login']))
{
 
  if(isset($_POST['gender1']))
  {
    $gender1=test_input($_POST["gender1"]);
    
  }
  else
  {
    $gender1Err="please any one select";
  }

  if(empty($gender1Err) )
  {
    $email=$_REQUEST['email'];
    $password=$_REQUEST['pwd'];
    $gender1=$_REQUEST['gender1'];   
    
    $queryEmail="SELECT * from tbl_user where user_email='$email'";
    $resultEmail=mysqli_query($con,$queryEmail) or die('query error');
    $cnt_row_email = mysqli_num_rows($resultEmail);
    
    if($cnt_row_email==true)
    {
      $queryPwd="SELECT * from tbl_user where user_password='$password'";
      $resultPwd=mysqli_query($con,$queryPwd) or die('query error');
      $cnt_row_pwd = mysqli_num_rows($resultPwd);
      if($cnt_row_pwd==true)
      {
        $sql="SELECT * from tbl_user where user_email='$email' and user_password='$password' and user_type='$gender1'";
        $result=mysqli_query($con,$sql) or die('query error');
        $cnt_row = mysqli_num_rows($result);
        if($cnt_row==true)
        {
          $_SESSION['email']=$email;
          $_SESSION['user_type']=$gender1;

          header("location:index.php");
        }
        else
        {
          $gender1Err = "please select correct type.";
        }
      }
      else
      {
        $pwdMsg = "please enter correct password.";
      }
    }
    else
    {
      $emailMsg = "please enter your correct email.";
    }
  }
}
?>
<?php include("header.php"); ?>


        
        <!-- #page-title end -->

        <!-- #Add Property
============================================= -->
<section id="add-property" class="add-property"style="padding-top: 1px;
padding-bottom: 10px;">
  <div  style="padding-top: 100px;">
              <div class="bg-section">
                <img src="assets/images/page-titles/3.jpg" alt="Background" />
            </div>
  <div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="col-md-12">
            <form class="mb-0" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="form-box1">
                  <div class="page-title bg-overlay bg-overlay-dark2">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h1 class="form--title">login form</h1>
                        </div>
                        <!-- .col-md-12 end -->
                       
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <!--<i class="fa fa-envelope-square"></i>-->
                                <input type="email" class="form-control" name="email" id="email"
                                value="<?php echo @$_REQUEST['email']; ?>"  placeholder="Email Id" required>
                                <span class="error"><?php echo @$emailMsg;?></span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="password" required>
                                <span class="error"><?php echo @$pwdMsg;?></span>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12">
                            <div class="form-group">
                            <div style="width: 50%">
                               <input type="radio" name="gender1" id="owner" value="1">&nbsp;&nbsp;<label1 for="owner" >Owner</label1>
                            </div>
                            <div style="width: 50%">
                              <input type="radio" name="gender1" id="user" value="0">&nbsp;&nbsp;<label1 for="user" >User</label1>
                            </div>

                             <span class="error"><?php echo @$gender1Err;?></span>
                               
                        </div>
                        </div>
                        </div>
                                                
                        <input type="submit" class="btn btn--primary btn--block" value="Sign In" name="login" id="login"></br></br>
                         
                        <a href="forgotpassword.php" class="forget-password">Forget your password?</a></br>
                         <a href="reg.php" class="forget-password">create new user?</a>
                       </div></form>
                        </h1></div>
                      
                <!-- .form-box end -->
                
        </div>
        <!-- .col-md-12 end -->
    </div>
    <!-- .row end -->
  </div>
</div>
</section>


<?php include("footer.php"); ?>
</div>
<!-- <script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/plugins.js"></script>

<script src="assets/js/functions.js"></script> -->
 <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script>
        $('#googleMap').gMap({
            address: "121 King St,Melbourne, India",
            zoom: 12,
            maptype: 'ROADMAP',
            markers: [{
                address: "Melbourne, India",
                maptype: 'ROADMAP',
                icon: {
                    image: "assets/images/gmap/marker1.png",
                    iconsize: [52, 75],
                    iconanchor: [52, 75]
                }
            }]
        });

    </script>
    <script src="assets/js/map-custom.js"></script>

    
