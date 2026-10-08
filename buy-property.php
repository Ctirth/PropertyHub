<?php
  include('config.php');
  session_start();

    $property_id=$_GET['id'];
    $qry = "SELECT * FROM tbl_property Where property_id='$property_id'";
      $row1 = mysqli_query($con,$qry);
      $result1 = mysqli_fetch_assoc($row1);
      $amount = $result1['property_price'];
      

  if (isset($_SESSION['email'])) {
    if (isset($_POST['paynow'])) 
    { 
      
      $email=$_SESSION['email'];
      $qry = "SELECT * FROM tbl_user Where user_email = '$email'";// AND user_type=0";
      $row1 = mysqli_query($con,$qry);
      $result1 = mysqli_fetch_assoc($row1);
      $user_id = $result1['user_id'];
    
      
      $transaction_id=uniqid();
      $first_name = ucfirst(trim($_POST['first_name']));
      $last_name = ucfirst(trim($_POST['last_name']));
      $card_name = trim($_POST['card_name']);
      $card_number = $_POST['card_number'];
      $exp_month = $_POST['exp_month'];
      $exp_year = $_POST['exp_year'];
      $cvv = $_POST['cvv'];
      $created_at = date("Y-m-d H:i:s");  ;
      
    
      $u_id=$user_id;
      $sql="INSERT INTO tbl_payment( `transaction_id`, `first_name`, `last_name`, `card_name`, `card_number`, `exp_month`, `exp_year`, `cvv`, `amount`, `user_id`, `property_id`, `created_at`) VALUES ('$transaction_id','$first_name','$last_name','$card_name','$card_number','$exp_month','$exp_year','$cvv','$amount','$u_id','$property_id','$created_at')";
    
      $res=mysqli_query($con,$sql);
      $result_cnt=mysqli_affected_rows($con);
      $sql1 = "UPDATE tbl_property SET live_status=2 , buyer_id='$user_id' where property_id = '$property_id'";
      
      $res1=mysqli_query($con,$sql1);

      if($result_cnt>0){
        echo "<script>alert('your payment successful..!! your transaction id is:$transaction_id');window.location.href = 'index.php';</script>";
        
      }
      else{
           echo "<script>alert('your payment not updated..!!');window.location.href = 'buy-property.php?id=$property_id';</script>";
      }
    }
  }
  else
  {
    header('Location:login.php');
  }
    
include('header.php');
 ?>

        
        <!-- #page-title end -->


<section id="add-property" class="add-property" style="padding-top: 1px;padding-bottom: 10px;">
    <div  style="padding-top: 100px;">
              <div class="bg-section">
                <img src="assets/images/page-titles/3.jpg" alt="Background" />
              </div>
            <div class="container">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-md-9">
                  <form class="mb-0" method="post">
                    <div class="page-title bg-overlay bg-overlay-dark2" >
                      <div class="form-box1" >
                         <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4 class="form--title">Payment Details:</h4>
                            </div>
                            <?php 
                             if (isset($error)) {
                                ?>
                                <b><p style="color: red;"><?php echo $error; ?></p></b>
                                <?php
                              } 
                            ?>
                            <!-- .col-md-6 end -->

                           <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                  <label1><i class="fa fa-user"></i> First Name</label1>
                                  <div>
                                    <input name="first_name" type="text" id="first_name" placeholder="First Name" required="required" class="form-control" />
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                  <label1><i class="fa fa-user"></i> Last Name</label1>
                                  <div>
                                    <input name="last_name" type="text" id="last_name" placeholder="Last Name" required="required" class="form-control"  />
                                  </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label1 for="cname">Name of Card</label1>
                                <div>
                                  <input type="text" id="card_name" name="card_name" placeholder="Visa Mastercard" required="" class="form-control">
                                </div>       
                              </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <div class="form-group">
                                <label1 for="ccnum">Credit card number</label1>
                                <div>
                                  <input type="text" id="card_number" name="card_number" placeholder="1111-2222-3333-4444" required="" class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label1 for="expmonth">Exp Month</label1>
                              <div>
                                <select name='exp_month' id='exp_month' required="">
                                    <option value='01'>January</option>
                                    <option value='02'>February</option>
                                    <option value='03'>March</option>
                                    <option value='04'>April</option>
                                    <option value='05'>May</option>
                                    <option value='06'>June</option>
                                    <option value='07'>July</option>
                                    <option value='08'>August</option>
                                    <option value='09'>September</option>
                                    <option value='10'>October</option>
                                    <option value='11'>November</option>
                                    <option value='12'>December</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label1 for="expyear">Exp Year</label1>
                              <div>
                                <input type="text" id="exp_year" name="exp_year" placeholder="2025" required="" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label1 for="cvv">CVV</label1>
                              <div>
                                <input type="text" id="cvv" name="cvv" placeholder="352" required="" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label1 for="amount">Amount</label1>
                              <div>
                                <input type="text" id="amount" name="amount" value="Rs. <?php echo $amount; ?>" readonly class="form-control">
                              </div>
                            </div>
                    <!-- .form-box end -->
                            <div style="padding-left: 15px;">
                            <input type="submit"class="btn btn--primary" id="paynow" name="paynow" value="Pay Now" style="margin-top: 30px;" />
                            </div>
                          </div>
                        </div>
                      </div>
                  </form>
                </div>
                </div>
              </div>
                <!-- .row end -->
            </div>
    </div>
</section>
      
        <!-- #social-profile  end -->

        
    <?php include("footer.php"); ?>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
   <!--  <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
    <script src="assets/js/jquery.mask.js"></script>
    <script src="assets/js/dropzone.html"></script>
    <script src="assets/js/functions.js"></script>
    <script src="https://maps.google.com/maps/api/js?sensor=true&amp;key=AIzaSyCiRALrXFl5vovX0hAkccXXBFh7zP8AOW8"></script>
    <script src="assets/js/plugins/jquery.gmap.min.js"></script>
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
    <script src="assets/js/map-custom.js"></script>
    <script>
  $(document).ready(function() {
    $('input[name="exp_month"]').mask('00');
    $('input[name="exp_year"]').mask('0000');
    $('input[name="cvv"]').mask('000');
    $('input[name="card_number"]').mask('0000-0000-0000-0000');
  });
  
</script>
    
