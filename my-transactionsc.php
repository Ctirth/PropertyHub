<?php
session_start();
if (@$_SESSION['email']) {
    include("config.php");
    include("header.php");
?>

<!-- Main content -->
<section class="content" style="padding-top: 1px;padding-bottom: 10px;">
  <div style="padding-top: 100px;">
    <div class="bg-section">
      <img src="assets/images/page-titles/3.jpg" height='450px' width='1550px' alt="Background"/>
    </div>
    <div class="page-title bg-overlay bg-overlay-dark2">
      <div class="container">
        <div class="card">
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Buyer Name</th>
                  <th>Property Title</th>
                  <th>Transaction Id</th>
                  <th>Amount</th>
                  <th>Transaction Date</th>
                  <th>Purchase Type</th> <!-- New Field -->
                </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_SESSION['email'])) {
                  $email = $_SESSION['email'];
                  $qry = "SELECT * FROM tbl_user WHERE user_email = '$email'";
                  $n = 1;
                  $row1 = mysqli_query($con, $qry);
                  $result1 = mysqli_fetch_assoc($row1);
                  $u_id = $result1['user_id'];
                }

                // Fetch payments for the owner's properties
                $q = "SELECT * FROM tbl_payment WHERE property_id IN (SELECT property_id FROM tbl_property WHERE user_id = $u_id)";
                $row = mysqli_query($con, $q);

                while ($result = @mysqli_fetch_assoc($row)) {
                ?>
                  <tr>
                    <th><?php echo $n; $n++; ?></th>
                    <td><?php echo $result["first_name"] . " " . $result["last_name"]; ?></td>
                    <?php
                    $sql = "SELECT * FROM tbl_property WHERE property_id = '{$result['property_id']}'";
                    $res = mysqli_query($con, $sql);
                    while ($result1 = mysqli_fetch_assoc($res)) {
                    ?>
                      <td><?php echo $result1["property_name"]; ?></td>
                      <td><?php echo $result["transaction_id"]; ?></td>
                      <td><?php echo $result["amount"]; ?></td>
                      <td><?php echo $result["created_at"]; ?></td>
                      <td>
                        <?php
                        if ($result1["live_status"] == 2) {
                          echo "Sold";
                        } elseif ($result1["live_status"] == 3) {
                          echo "Rented";
                        } else {
                          echo "N/A";
                        }
                        ?>
                      </td>
                    <?php } ?>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content -->
</div>

<!-- /.content-wrapper -->

<?php include('footer.php'); ?>
<?php } else header("location:index.php"); ?>

<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery-2.2.4.min.js"></script>
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