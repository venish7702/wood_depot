<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
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
    // $firstname = $_SESSION["fname"];
    // $lastname = $_SESSION["lname"];  
    $status = 'success';
    $currency = "INR";

    // $strp= "SELECT tt.*, od.*, p.*
    // FROM tbl_transaction tt
    // JOIN tbl_order_detail od ON tt.order_id = od.order_id
    // JOIN tbl_product p ON od.product_id = p.product_id
    // WHERE tt.order_id = ".$_SESSION["OrderID"];
    
    // $rsp = mysqli_query($conn, $strp) or die(mysqli_error($conn));
    // while ($resp = mysqli_fetch_array($rsp)) {

    // }




    
        $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
             <p>amount: {$total}</p>
             <p>email: {$email}</p>
             <p>firstname: {$firstname}</p>
             <p>lastname: {$lastname}</p>
             <p>status: {$status}</p>
             <p>status: {$currency}</p>";
             ?>



    <body>
      <!-- <table class="table table-success table-striped table-responsive" align="center">
                
                        <h1>your payment was successful</h1>
                        <tr>
                    <td><h3>Payment ID:</h3></td>
                    <td><?php //echo $_POST['razorpay_payment_id']; ?></td>
                </tr>
                   
                <tr>
                    <td><h3>AMOUNT:</h3></td>
                    <td><?php //echo $total; ?></td>
                </tr>  
                <tr>
                    <td><h3>EMAIL:</h3></td>
                    <td><?php //echo $email; ?></td>
                </tr>
                <tr>
                    <td><h3>FIRSTNAME:</h3></td>
                    <td><?php //echo $firstname; ?></td>
                </tr>
                <tr>
                    <td><h3>LASTNAME:</h3></td>
                    <td><?php //echo $lastname; ?></td>
                </tr>
                <tr>
                    <td><h3>STATUS:</h3></td>
                    <td><?php //echo $status; ?></td>
                </tr>
                <tr>
                    <td><h3>CURRENCY:</h3></td>  
                    <td><?php //echo $currency; ?></td>  
                </tr>


            </table> -->
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
      const printBtn = document.querySelector("button");
      printBtn.addEventListener("click", () => window.print());
    }
  </script>
    </body>

</html>