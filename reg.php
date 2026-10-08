<?php
  session_start();
?>
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

    include ("config.php");
    function test_input($data)
             {
                 $data=trim($data);
                 $data=stripcslashes($data);
                 $data=htmlspecialchars($data);
                 return $data;
             }
             //variable set empty values
// $nameErr=$emailErr=$passwordErr=$addressErr=$mobileErr=$gender1Err=" ";
// $name=$email=$password=$address=$mobile=$gender1=" ";
 
    if (isset($_REQUEST['submit'])) 
    {  

     if(empty($_POST['name']))
      {
        $nameErr="name is required";
      }
      else if(!preg_match("/^[A-z]*$/",$_POST["name"]))
       {
        $nameErr="enter only text";
       }
      else
      {
        $name=test_input($_POST["name"]);
      }


    if(isset($_POST['gender1']))
      {
        $gender1=test_input($_POST["gender1"]);

      }
      else
      {
        $gender1Err="please any one select";
      }
      

      $email=$_POST['email'];
      $gender1=@$_POST['gender1'];
      $sql="SELECT * FROM tbl_user where user_email='$email' And user_type='$gender1' ";
      $result=mysqli_query($con,$sql)or die('query error');
      $cnt_row = mysqli_num_rows($result);
      
      if (empty($_POST["email"])) 
      {
        $emailErr="email must be required";
      }
      else if(!preg_match("/^[A-z0-9_\-]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z.]{2,4}$/",$_POST["email"]))
      {
        $emailErr="enter valide email id";
      }
      else if($cnt_row==true){
        $emailErr="already registered with this email";
      }
      else{
        $email=test_input($_POST["email"]);
      }

      if(empty($_POST['pwd']))
      {
        $passwordErr="password is required";
      }
      else{
          $password=test_input($_POST["pwd"]);
      }
      if(empty($_POST['confirm_pwd']))
      {
        $passwordErr="confirm password is required";
      }
      else{
          $password=test_input($_POST["confirm_pwd"]);
      }
      if(empty($_POST['mobile']))
      {
        $mobileErr="mobile is required";
      }
      // else if(!preg_match("/^\d{10}$/",$_POST["mobile"]))
      // {
      //   $mobileErr="enter valide mobile no";
      // }
      else
      {
          $mobile=test_input($_POST["mobile"]);
      }

      if(empty($_POST['address']))
      {
        $addressErr="address is required";
      }
      else{
          $address=test_input($_POST["address"]);
      }
      

      if(empty($nameErr) && empty($emailErr) && empty($mobileErr)&& empty($passwordErr) && empty($confPwdErr) && empty($addressErr) && empty($gender1Err) ){
     
            //$user_id=$_REQUEST['uid'];
            $user_name=$_REQUEST['name'];
            $email=$_REQUEST['email'];
            $phone=$_REQUEST['mobile'];
            $password=$_REQUEST['pwd'];
            $address=$_REQUEST['address'];
            $gender1=$_REQUEST['gender1'];
            if($password==$_REQUEST['confirm_pwd'])
            {
              $sql="INSERT INTO tbl_user (user_name,user_email,user_mobile,user_password,user_address,user_type) VALUES ('$user_name','$email','$phone','$password','$address','$gender1')";
                mysqli_query($con,$sql);
                header("location:login.php");
            }
            else
            {
              $confPwdErr = "password and confirm password is does not match";
            }
            
            }
           
    }
?>
<?php include("header.php"); ?>

        
        <!-- #page-title end -->

        <!-- #Add Property
============================================= -->
        <section id="add-property" class="add-property" style="padding-top: 1px;
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
                        <form class="mb-0" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-box1" >
                               <div class="page-title bg-overlay bg-overlay-dark2">
                               <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h1 class="form--title">Registration form</h1>
                                    </div>
                                    <!-- .col-md-12 end -->
                            
                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
    
                                            <input type="text" class="form-control" name="name" id="name" placeholder="User Name" value="<?php echo @$_REQUEST['name']; ?>">
                                            <span class="error"><?php echo @$nameErr;?></span>

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            
                                            <input type="text" class="form-control" name="email" id="email" placeholder="Email Id" value="<?php echo @$_REQUEST['email']; ?>">
                                            <span class="error"><?php echo @$emailErr;?></span>
                                          </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                             <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" value="<?php echo @$_REQUEST['password']; ?>">
                                            <span class="error"><?php echo @$passwordErr;?></span>
                                        </div>
                                    </div>

                                     <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                          
                                          <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm password" required="" value="<?php echo @$_REQUEST['confirm_pwd']; ?>">
                                          <span class="error"><?php echo @$confPwdErr;?></span>
                                        </div>
                                    </div>
                                    
                                
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <input type="textarea" class="form-control" name="address" id="address" placeholder="Address" value="<?php echo @$_REQUEST['address']; ?>">
                                            <span class="error"><?php echo @$addressErr;?></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <input type="text" class="form-control" name="mobile" id="mobile" placeholder="phone no." value="<?php echo @$_REQUEST['mobile']; ?>">
                                            <span class="error"><?php echo @$mobileErr;?></span><!-- pattern="[1-9]{1}[0-9]{9}" -->
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-6 col-sm-6 col-md-12">
                                        <div class="form-group">
                                        <div style="width: 50%">
                                           <input type="radio" name="gender1" id="gender1" value="1">&nbsp;&nbsp;<label1 for="owner" >Owner</label1>
                                        </div>
                                        <div style="width: 50%">
                                          <input type="radio" name="gender1" id="gender1" value="0">&nbsp;&nbsp;<label1 for="user" >User</label1>
                                        </div>
                                        <span class="error"><?php echo @$gender1Err;?></span> 
                                    </div>
                                    </div>
                                    
                            <!-- .form-box end -->
                            <input type="submit" value="submit" name="submit" id="submit" class="btn btn--primary">
                          </div>
                        </form>
                    </div>
                    
                  </h1>
                </div>
                    <!-- .col-md-12 end -->
                <div class="col-md-3">
                      
                    </div>
                </div>
                <!-- .row end -->
            </div>
          </h1>
        
        </div>
        </section>
      
        <!-- #social-profile  end -->

        
    <?php include("footer.php"); ?>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <!-- <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/dropzone.html"></script>
    <script src="assets/js/functions.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
    <script src="assets/js/jquery.mask.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script> -->
    <script>
        $('#googleMap').gMap({
            address: "121 King St,Melbourne, Australia",
            zoom: 12,
            maptype: 'ROADMAP',
            markers: [{
                address: "Melbourne, Australia",
                maptype: 'ROADMAP',
                icon: {
                    image: "assets/images/gmap/marker1.png",
                    iconsize: [52, 75],
                    iconanchor: [52, 75]
                }
            }]
        });
         $(document).ready(function() {
            $('input[name="mobile"]').mask('00000-00000');
          });
    </script>
    <script src="assets/js/map-custom.js"></script>
</body>


<!-- Mirrored from demo.zytheme.com/lalan/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jan 2025 12:57:37 GMT -->
</html>
