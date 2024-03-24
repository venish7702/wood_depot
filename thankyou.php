<html>

<head>

    <?php
    include_once 'link.php';
    ?>



</head>

<?php
extract($_REQUEST);
require 'config.php';

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;


require 'razorpay-php/Razorpay.php';
$success = true;
$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($keyId, $keySecret);

    try {
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
} else {
    $success = false;
    $error = 'Razorpay Error : Payment details are missing.';
}

if ($success === true) {
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $email = $_SESSION["iemail"];
    $total = $_SESSION["txn_amount"];
    $firstname = $_SESSION["ifname"];
    $lastname = $_SESSION["ilname"];
    $status = 'success';
    $currency = "INR";

    $html = "<p>Your payment was successful</p>
            <p>Payment ID: {$razorpay_payment_id}</p>         
            <p>amount: {$total}</p>
            <p>email: {$email}</p>
            <p>firstname: {$firstname}</p>
            <p>lastname: {$lastname}</p>
            <p>status: {$status}</p>
            <p>currency: {$currency}</p>";


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

        $url = "./Interiordesigner/index.php";
        echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
    }
} else {
    $html = "<p>Your payment failed</p>
            <p>{$error}</p>";
}

echo $html;

?>


<body>
    <!-- scroll header and scroll rocket and loader  start------------------ -->
    <div class="scroll_top">
        <i class="fa-solid fa-shuttle-space"></i>
    </div>

    <!-- <div class="center-body">

        <div class="loader-square"></div>

    </div> -->
    <!-- scroll header and scroll rocket and loader  end------------------ -->


    <!-- header start-------------------- -->
    <?php
    include_once './header.php';
    ?>
    <!-- header end-------------------- -->


    <!-- thankyou start----------------------------------- -->
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <!-- <div class="thanlyou_content flex-column  justify-content-center align-items-center"> -->
                <img src="./imgae/thankyou_bg_01.jpeg" class="w-100 thankyou_pos" alt="">
                <div class="thankyou_mainbox d-flex  flex-column  align-items-center  justify-content-center   ">
                    <img src="./imgae/success-unscreen_1.gif" alt="">
                    <h4>Thank You For Purchase Package </h4> <br>
                    <p>This is your official conformation. Thanks for joining our company</p>
                    <p class="mb-5">Do not forgot to click OK Button</p>
                    <form action="thankyou.php">

                        <input type="submit" name="btnOk" class="back_to_home" value="ok" />
                    </form>

                </div>

            </div>/
        </div>

    </div>
    </div>
    <!-- thankyou end----------------------------------- -->
    <!-- ---------------------Footer Part Start--------------- -->
    <!-- <div class="spacer_y"> -->
    <?php
    include_once 'footer.php';

    ?>
    <!-- ---------------------Footer Part End--------------- -->






    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/kursor.js"></script>
    <script src="js/multi-animated-counter.js"></script>
    <script src="js/veldation.js"></script>
    <script src="js/cursor_custom.js"></script>





</body>

</html>