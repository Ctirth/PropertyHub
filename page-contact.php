<?php 
// background: #e94646;
include("config.php");
 if (isset($_REQUEST['submit'])) 
    {  
        $name=$_REQUEST['contact_name'];
        $email=$_REQUEST['contact_email'];
        $phone=$_REQUEST['phone_number'];
        $message=$_REQUEST['message'];
        $date = date('Y-m-d H:i:s');

        $sql="select * from tbl_contact where contact_email='$email'";
        $result=mysqli_query($con,$sql) or die('query error');
        $cnt_row = mysqli_num_rows($result);

        if($cnt_row==false){
           $sql="INSERT INTO tbl_contact (contact_name,contact_email,contact_phone,contact_message,contact_date) VALUES ('$name','$email','$phone','$message','$date')";
            $result=mysqli_query($con,$sql);
       
            $result_cnt=mysqli_affected_rows($con);
            
            if($result_cnt>0){
                echo "<script>alert('Thank you For Contact Us..!!');window.location.href = 'page-contact.php';</script>";
            } 
        }else{
                echo "<script>alert('Your Email Already Registered..!!');window.location.href = 'page-contact.php';</script>";
        }
    }
    include("header.php");   
?>
      
        <!-- #page-title end -->

        <!-- Contact #1
============================================= -->
        <section id="contact" class="contact contact-1" style="padding-top: 1px;
padding-bottom: 10px;">
            <div  style="padding-top: 100px;">
              <div class="bg-section">
                <img src="assets/images/page-titles/3.jpg" alt="Background" />
            </div>
            <!-- <div class="page-title bg-overlay bg-overlay-dark2" > --> 
            <div class="container">
            
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <div class="heading heading-2 mb-55">
                            <h2 class="heading--title" style="color: #f9f9f9;">Get In Touch</h2>
                        </div>
                        <div class="contact-panel">
                            <h3>Address</h3>
                            <p>B-13, PropertyHub Real Estate, Demo Street, Surat</p>
                        </div>
                        <!-- .contact-panel -->
                        <div class="contact-panel">
                            <h3>Phone:</h3>
                            <p>(+91) 900 0090 003</p>
                            <p>(+91) 900 9000 003</p>
                        </div>
                        <!-- .contact-panel -->
                        <div class="contact-panel">
                            <h3>Email:</h3>
                            <p><a href="https://propertyhub.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8cefe3e2f8edeff8cce0ede2e8a2efe3e1">[propertyhub@gmail.com]</a></p>
                        </div>
                        <!-- .contact-panel -->
                    </div>
                    <!-- .col-md-3 end -->

                    <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-1 bg-white p-30 bg-white">

                        <div id="googleMap"> <img src="assets/images/page-titles/55.jpg" alt="Background" style="width:100%;height:370px;"></div>
                    </div>
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row end -->
            </div>
        
        
       <!--  </section> -->
        <!-- #contact  end -->

        <!-- Contact #2
============================================= -->
        <!-- <section id="contact2">  -->
        <!-- <div class="bg-section">
                <img src="assets/images/page-titles/3.jpg" alt="Background" />
            </div> -->
            <div class="container">
            <div class="form-box1">
                <div class="page-title bg-overlay bg-overlay-dark2" >
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="heading heading-2 mb-50">
                            <h2 class="form--title">Contact Us</h2>
                        </div>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->

                <div class="row">
                     
                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <form class="mb-0" method="post">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label1 for="contact_name">Your Name*</label1>
                                        <input type="text" class="form-control" name="contact_name" id="contact_name" required>
                                    </div>
                                </div>
                                <!-- .col-md-4 end -->
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label1 for="contact_email">Email Address*</label1>
                                        <input type="email" class="form-control" name="contact_email" id="contact_email" required>
                                    </div>
                                </div>
                                <!-- .col-md-4 end -->
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label1 for="phone_number">Phone Number</label1>
                                        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="(optional)">
                                    </div>
                                </div>
                                <!-- .col-md-4 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label1 for="message">Message*</label1>
                                        <textarea class="form-control" name="message" id="message" rows="2" required></textarea>
                                    </div>
                                </div>
                                <!-- .col-md-12 end -->
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <input type="submit" value="Send Message" name="submit" class="btn btn--primary">
                                </div>
                                <!-- .col-md-12 -->
                            </div>
                        </form>
                    </div>
                    <!-- .col-md-12 end -->
                </div>
            </div>
                <!-- .row end -->
            
        </div>    
        </div>
        </section>
        <!-- #contact2  end -->

        <!-- cta #1
============================================= -->
       
        <!-- #cta1 end -->


        <!-- Footer #1
============================================= -->
        <?php include("footer.php"); ?>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
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
</body>

