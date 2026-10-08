  <footer id="footer" class="footer footer-1 bg-white">

    
            <!-- Widget Section
	============================================= -->
    <?php 
        if(isset($_POST['submitn']))
        {
            include("config.php");
            
            $email=$_REQUEST['newsletter-email'];
            $message='Add me in Newsletter Group';
            $date = date('Y-m-d H:i:s');
            $sql="INSERT INTO tbl_contact (contact_email,contact_message,contact_date) VALUES ('$email','$message','$date')";
            $result=mysqli_query($con,$sql);
            $result_cnt=mysqli_affected_rows($con);
            
            if($result_cnt>0){
            echo "<script>alert('you subscribed us successfully..!!we updated you on this email.');</script>";}
        }
     ?>
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 widget--about">
                            <div class="widget--content">
                                <div class="footer--logo">
                                    <img src="assets/images/logo/logo-dark2.png" alt="logo">
                                </div>
                                <p>B-13, PropertyHub Real Estate, Demo Street, Surat</p>
                                <div class="footer--contact">
                                    <ul class="list-unstyled mb-0">
                                        <li>+91 90000-90003</li>
                                        <li>propertyhub@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-3 col-md-2 col-md-offset-1 widget--links">
                            <div class="widget--title">
                                <h5>Company</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="properties-list.php">Properties</a></li>
                                    <li><a href="page-contact.php">Contact</a></li>
									<li><a href="page-about.php">About Us</a></li>
                                </ul>
                            </div><br>
							<div class="widget--title">
                                <h5>Follw us</h5>
                            </div>
							<div class="widget--content">
							<div class="social-links">
                                <a href="#"><i class="fa fa-facebook">	 </i></a> 							
								<a href="#"><i class="fa fa-twitter"> 	</i></a>                                 
                                <a href="#"><i class="fa fa-linkedin"></i></a>        
                            </div>
							</div>
                        </div>
                        <!-- .col-md-2 end -->
						
						
                       
                        <div class="col-xs-12 col-sm-3 col-md-2 widget--links">
                           
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-12 col-md-4 widget--newsletter">
                            <div class="widget--title">
                                <h5>newsletter</h5>
                            </div>
                            <div class="widget--content">
                                <form class="newsletter--form mb-40" method="post">
                                    <input type="email" class="form-control" name="newsletter-email" id="newsletter-email" placeholder="Email Address" required="">
                                    <button type="submit" name="submitn"><i class="fa fa-arrow-right"></i></button>
                                </form>
                               
                            </div>
                        </div>
                        <!-- .col-md-4 end -->

                    </div>
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-widget end -->

            <!-- Copyrights
	============================================= -->
            <div class="footer--copyright text-center">
                <div class="container">
                    <div class="row footer--bar">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <span> © 2025 Property Hub. All Rights Reserved.</span>
                        </div>

                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-copyright end -->
        </footer>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts