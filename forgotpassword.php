 <?php
 include('config.php');
 include('header.php');

 $msg="";

 if (isset($_SESSION['user_id'])) {
 	header("Location:index.php");
 }

 if (isset($_POST['send'])) 
 {
 	$email=trim($_POST['email_id']);


 	$u="SELECT * FROM `tbl_user` WHERE user_email='{$email}' ";
 	
    $res = mysqli_query($con,$u);
    $cnt_row_email = mysqli_num_rows($res);
 	if ($cnt_row_email == 1)
 	{
 	//  	$token = uniqid();
 	 	$row =  mysqli_fetch_assoc($res);
		// $id = $uData['user_id'];

		// $data['forgot_pass_token']= $token;
		// $data['updated_at']= date('Y-m-d h:i:s');
		// $where['user_id'] = $id;
		// $result=$obj->myUpdate('tbl_user', $data, $where);
		
		// Go to google accout manage > security > Less secure app access > on
		// To configure XAMPP for send mail 
		// change below with php.ini file
			// SMTP=smtp.gmail.com
			// smtp_port=587
			// sendmail_from = email-id
			// sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
		// change below with C:\xampp\sendmail and open sendmail.ini file
			// smtp_server=smtp.gmail.com
			// smtp_port=587
			// error_logfile=error.log
			// debug_logfile=debug.log
			// auth_username=email-id
			// auth_password=password
			// force_sender=email-id


		// Send email to user with the token in a link they can click on
	    $password = $row['user_password'];
	    $to = $email;
	    $subject = "Reset your password";
	    $txt = "\r\n" ."Your password is : ".$password;
	    $headers = "From: password@studentstutorial.com" . "\r\n" .
               		"CC: somebodyelse@example.com";
               
        mail($to,$subject,$txt,$headers);
        $msg="Success..! Please check your inbox.";
 	} 
 	else
 	{
 		$msg="Please Enter Valid email-id.";
 	}	
 }
 ?>

<!-- Titlebar
	================================================== -->
	

<!-- Contact
	================================================== -->

	<!-- Container -->
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
                  <div class="page-title bg-overlay bg-overlay-dark">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <h1 class="form--title">Forgot Password</h1>
                        </div>
                        <!-- .col-md-12 end -->
                       
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
									<label1 for="email">Email Id:
										<i class="im im-icon-Email"></i>
										<input type="email" class="form-control" name="email_id" id="email_id" value="<?php echo @$_POST['email']; ?>" required="" placeholder="Enter valid email-id" />
									</label1>
									
								<span class="error"><?php echo $error = (isset($msg)) ? $msg : "" ; ?></span>
							</div>
						
								<input type="submit" class="btn btn--primary"  name="send" value="Send" />	
								</h1></div>
					</div>
                      
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

    

<!-- Container / End -->
