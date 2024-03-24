<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="website icon" type="png" href="./image/bus-pav.jpg">
<style type="text/css">
  @media print {
    #downloadBtn {
      display: none;
    }
  }
</style>
<?php
include_once 'link.php';
require 'config.php';
// include_once 'connection.php';

SessionCheck();

require 'razorpay-php/Razorpay.php';

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
  $api = new Api($keyId, $keySecret);

  try {
    // Please note that the razorpay order ID must
    // come from a trusted source (session here, but
    // could be database or something else)
    $attributes = array(
      'razorpay_order_id' => $_SESSION['razorpay_order_id'],
      'razorpay_payment_id' => $_POST['razorpay_payment_id'],
      'razorpay_signature' => $_POST['razorpay_signature'],
    );

    $api->utility->verifyPaymentSignature($attributes);
  } catch (SignatureVerificationError $e) {
    $success = false;
    $error = 'Razorpay Error : ' . $e->getMessage();
  }
}

if ($success === true) {
  if (isset($_POST['razorpay_payment_id'])) {
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $email = $_SESSION['email'];
    // $price = $_SESSION['price'];
    $total = $_SESSION["total"];
    $firstname = $_SESSION["fname"];
    $lastname = $_SESSION["lname"];
    $status = 'success';
    $currency = "INR";







    // $html = "<p>Your payment was successful</p>
    //      <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
    //      <p>amount: {$total}</p>
    //      <p>email: {$email}</p>
    //      <p>firstname: {$firstname}</p>
    //      <p>lastname: {$lastname}</p>
    //      <p>status: {$status}</p>
    //      <p>status: {$currency}</p>";
?>



    <body>
      <!-- <table class="table table-success table-striped table-responsive" align="center"> -->



      <div class="container">
        <div class="container mt-5" id="receipt">
          <div class="row">
            <div class="col-md-12 ">
              <div class="mx-auto">
                <img src="./imgae/D Rose.png" alt="Logo" class="img-fluid" style="max-width:100px;">
                <span style="font-size: 30px;margin-top:12rem;"><b style="padding: 17px 20px; ">WOOD DEPOT</b></span>
              </div>
              <p>
              <h3 class="text-center">Payment Receipt</h3>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-bordered table-striped">
                <thead class="bg-dark text-white">
                  <tr>
                    <th>Title</th>
                    <th>Discription</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Payment Id</td>
                    <td><?php echo $_POST['razorpay_payment_id']; ?></td>
                  </tr>
                  <tr>
                    <td>Name</td>
                    <td><?php echo $firstname . $lastname; ?></td>
                  </tr>

                  <tr>
                    <td>Email</td>
                    <td><?php echo $email; ?></td>
                  </tr>
                  <tr>
                    <td>Payment Status</td>
                    <td><?php echo $status; ?></td>
                  </tr>
                  <tr>
                    <td>Currency</td>
                    <td><?php echo $currency; ?></td>
                  </tr>
                  <?php
                  $strSel = "select op.*,p.product_name,pi.*,od.*,od.product_id as pid,o.GrandTotal from tbl_order o,tbl_order_detail od,tbl_product p,tbl_product_image pi,tbl_order_payment op where p.product_id=pi.product_id and pi.IsDefault=1 and p.product_id=od.product_id and o.order_id=od.order_id and o.order_id=op.order_id and op.IsPaid=1 and o.user_id='" . $_SESSION["UserID"] . "' order by o.order_id desc";

                  $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
                  if (mysqli_num_rows($rsSel) > 0) {
                    $count = mysqli_num_rows($rsSel);
                    while ($resSel = mysqli_fetch_array($rsSel)) {

                    $pname=$resSel["product_name"];
                    $qty=$resSel["quantity"];
                    $amount=$resSel["total_amount"];
                  ?>
                    <tr>
                      <td>product name</td>
                      <td><?php echo $pname; ?></td>
                    </tr>
                    <tr>
                      <td>Qty</td>
                      <td><?php echo $qty; ?></td>
                    </tr>
                    <tr>
                      <td>amount</td>
                      <td>₹<?php echo $amount; ?></td>
                    </tr>
                  <?php
                    }
                  } 
                  ?>

                </tbody>

              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <p class="text-right"><strong>Total Price:</strong>₹<?php echo $total; ?></p>
            </div>
            <div class="col-md-12">
              <p class="text-center">Thank you for choosing our service!</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p class="text-center"><img src="./imgae/D Rose.png" height="100px"></p>
            </div>
          </div>
        </div>
      </div>
      <!-- download button -->
      <div class="row mt-4 mb-4">
        <div class="col-md-12 text-center">
          <?php
          if ($status == 'success') {

          ?>
            <script>
              swal("Congrats!", ", your payment is successfully", "success");
            </script>
            <button id="downloadBtn" class="btn btn-success">Download Receipt</button>
            <a href="yourorder.php"><button class="btn btn-primary">check your order</button></a>


          <?php
          }
          ?>
        </div>
      </div>















  <?php
    $sql = "INSERT INTO `tbl_transaction` (`pay_id`, `total_amount`, `txnid`, `order_id`,`package_id`, `payer_email`, `currency`, `payment_date`, `status`) VALUES (null,'$total','$razorpay_payment_id'," . $_SESSION["OrderID"] . ",null,'$email','$currency',now(),'$status')";
    // $str = "INSERT INTO `tbl_transaction`(`pay_id`, `total_amount`, `txnid`, `order_id`, `payer_email`, `currency`, `payment_date`, `status`) VALUES (null,$amount,$txnid,$orderid,$email,$currency,$payment_date,$status)";
    mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $payid = mysqli_insert_id($conn);

    $strPay = "insert into tbl_order_payment values(null," . $_SESSION["OrderID"] . ",1,$payid)";
    mysqli_query($conn, $strPay) or die(mysqli_error($conn));
  }
} else {
  $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}
// echo $html;
  ?>


  <script type="text/javascript">
    window.onload = function() {
      document.getElementById("downloadBtn").addEventListener("click", () => {
        const invoice = this.document.getElementById("receipt");
        console.log(invoice);
        console.log(window);
        var opt = {
          margin: 1,
          filename: 'invoice.pdf',
          image: {
            type: 'jpeg',
            quality: 0.98
          },
          html2canvas: {
            scale: 2
          },
          jsPDF: {
            unit: 'in',
            format: 'letter',
            orientation: 'portrait'
          }
        };
        html2pdf().from(invoice).set(opt).save();
      })
    }
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    </body>

</html>