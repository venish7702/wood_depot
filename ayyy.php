<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    include_once 'link.php';
    ?>



</head>
<?php
require 'config.php';
extract($_REQUEST);
include_once 'connection.php';

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
            $orderid = $_SESSION["PackageID"];
            $email = $_SESSION["iemail"];
            $total = $_SESSION["txn_amount"];
            $firstname = $_SESSION["ifname"];
            $lastname = $_SESSION["ilname"];
            // $email = $_SESSION['email'];
            // $price = $_SESSION['price'];
            // $total = $_SESSION["total"];
            // $firstname = $_SESSION["fname"];
            // $lastname = $_SESSION["lname"];
            $status = 'success';
            $currency = "INR";





            $html = "<p>Your payment was successful</p>
         <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
         <p>amount: {$total}</p>
         <p>email: {$email}</p>
         <p>firstname: {$firstname}</p>
         <p>lastname: {$lastname}</p>
         <p>status: {$status}</p>
         <p>status: {$currency}</p>";

            $sql = "INSERT INTO `tbl_transaction` (`pay_id`, `total_amount`, `txnid`, `order_id`,`package_id`, `payer_email`, `currency`, `payment_date`, `status`) VALUES (null,'$total','$razorpay_payment_id',null," . $_SESSION["PackageID"] . ",'$email','$currency',now(),'$status')";
            mysqli_query($conn, $sql) or die(mysqli_error($conn));

            $TranID = mysqli_insert_id($conn);

            $x = "select * from tbl_package where package_id=" . $_SESSION["PackageID"];
            $xx = mysqli_query($conn, $x) or die(mysqli_error($conn));
            $xsx = mysqli_fetch_array($xx);
            $pac = $xsx["duration"];
            $date = date('Y-m-d', strtotime('+' . $pac . 'month'));

            if (isset($_SESSION["InteriorDesignerID"])) {
                $strSel = "select * from tbl_si_package where interior_designer_id=" . $_SESSION["InteriorDesignerID"];
                $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
                if (mysqli_num_rows($rsSel) > 0) {
                    $Up = "update tbl_si_package set package_id=" . $_SESSION["PackageID"] . ",StartDate=now(),EndDate='$date',IsPaid=1,Transaction_id=$TranID where interior_designer_id=" . $_SESSION["InteriorDesignerID"];
                    mysqli_query($conn, $Up) or die(mysqli_error($conn));
                } else {
                    $Ins = "insert into tbl_si_package values(null," . $_SESSION["PackageID"] . "," . $_SESSION["InteriorDesignerID"] . ",now(),'$date',1,$TranID)";
                    mysqli_query($conn, $Ins) or die(mysqli_error($conn));
                }
                // header("Location:InteriorDesigner/Index.php");
                $url = "./InteriorDesigner/index.php";
                echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
            }
        }
    } else {
        $html = "<p>Your payment failed</p>
                <p>{$error}</p>";
        // echo '<script>alert("your payment failed:'.$error.'")</script>';
    }
   


?>




</html>