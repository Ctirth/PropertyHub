
<?php
session_start();
if(@$_SESSION['user_type']==1 && @$_SESSION['email']|| @$_SESSION['user_type']==0 && @$_SESSION['email'])
{
include ("config.php");
if(isset($_POST['submit']))
{


    if(isset($_SESSION['email'])){
      $email=$_SESSION['email'];
      $qry = "SELECT * FROM tbl_user Where user_email = '$email' AND user_type=1";


      $row1 = mysqli_query($con,$qry);
      $result1 = mysqli_fetch_assoc($row1);
      $u_id = $result1['user_id'];
      $old =$result1['user_password'];
  }
       $pass=$_REQUEST['old_password'];
       $pass1=$_REQUEST['password'];
       $new_pass = $_REQUEST['confirm_password'];
       if($pass == $old){
        if($pass1 == $new_pass){
            $sql = "UPDATE tbl_user SET user_password='$new_pass' where user_id = '$u_id'";

            $res=mysqli_query($con,$sql);
            $result_cnt=mysqli_affected_rows($con);
            if($result_cnt>0){
                echo "<script>alert('your password Changed..!!');window.location.href = 'index.php';</script>";
                }
                else{
                   echo "<script>alert('your Password is not updated..!!');window.location.href = 'change-password.php';</script>";
                }
        }else{
            echo "<script>alert('your password and confirm password doesn't match..!!');window.location.href = 'change-password.php';</script>";
        }
       }else{
            echo "<script>alert('your current Password is not correct..!! Please Enter Correct Password..!!');window.location.href = 'change-password.php';</script>";
       }
}
include("header.php");
?>

        
        <!-- #page-title end -->

        <!-- #user-profile
============================================= -->
        <section id="user-profile" class="user-profile" style="padding-top: 1px;
padding-bottom: 10px;">
            <div  style="padding-top: 100px;">
              <div class="bg-section">
                <img src="assets/images/page-titles/3.jpg" alt="Background" />
            </div>
        
              
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="edit--profile-area">
                            <ul class="edit--profile-links list-unstyled mb-0">
                                 <?php if(@$_SESSION['user_type']==1 && @$_SESSION['email']){?>

                                <li><a href="user-profile-owner.php">Edit Profile</a></li>
                                <!-- <li><a href="social-profile.html">Social Profiles</a></li> -->
                                <li><a href="my-properties.php">My Properties</a></li>
                                <!-- <li><a href="favourite-properties.html">Favorite Properties</a></li> -->
                                <li><a href="add-property.php">Add Property</a></li>
                                <li><a href="change-password.php" class="active">Change Password</a></li><?php }?>
                                <?php if(@$_SESSION['user_type']==0 && @$_SESSION['email']){?>
                                     <li><a href="user-profile-user.php">Edit Profile</a></li>
                                     <li><a href="properties-list.php">Properties list</a></li>
                                <!-- <li><a href="social-profile.html">Social Profiles</a></li> -->
                                <li><a href="my-properties-user.php">Purchased Properties</a></li>
                                <!-- <li><a href="favourite-properties.html">Favorite Properties</a></li> -->
                                
                                <li><a href="change-password.php" class="active">Change Password</a></li><?php }?>
                            </ul>
                        </div>
                    </div>
                    <!-- .col-md-4 -->
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <form class="mb-0" method="post">
                           
                           
                            <!-- .form-box end -->
                                <div class="page-title bg-overlay bg-overlay-dark2" > 

                            <div class="form-box1">
                                <h4 class="form--title">Change Password</h4>
                                <div class="form-group">
                                    <label1 for="password">Current password</label1>
                                    <input type="password" class="form-control" name="old_password" id="old_password">
                                </div>
                                <div class="form-group">
                                    <label1 for="password">password</label1>
                                    <input type="password" class="form-control" name="password" id="password" required="">
                                </div>
                                <!-- .form-group end -->
                                <div class="form-group">
                                    <label1 for="confirm-password">confirm password</label1>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" required="">
                                </div>
                                <!-- .form-group end -->
                                <input type="submit" value="Save edits" name="submit" class="btn btn--primary">
                            </div>
                            <!-- .form-box end -->
                            
                        </form>
                    </div>
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row end -->
            </div>
        </div>
        </section>
        <!-- #user-profile  end -->

        <!-- cta #1
============================================= -->
       
        <!-- #cta1 end -->


        <!-- Footer #1
============================================= -->
        <?php include("footer.php"); ?>
    </div>
    <!-- #wrapper end -->
    <?php } else header("location:index.php");?>

    <!-- Footer Scripts
============================================= -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
