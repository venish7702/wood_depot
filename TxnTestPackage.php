<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages | Ruper</title>
    <!-- link -->
    <?php
    include_once 'connection.php';
    extract($_REQUEST);
    if (isset($PackID)) {
        $_SESSION["PackageID"] = $PackID;
    }

    $str = "select * from tbl_package where package_id=" . $_SESSION["PackageID"];
    $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
    while ($res = mysqli_fetch_array($rs)) {
        $_SESSION["txn_amount"] = $res["price"];
    }

    ?>





    <style>
        .razorpay-payment-button {
            padding: 4px;
            background-color: #5A9E6F;
            color: #fff;
            border: 0;
        }
    </style>
    <?php

    require 'config.php';
    require 'razorpay-php/Razorpay.php';


    // Create the Razorpay Order

    use Razorpay\Api\Api;

    $api = new Api($keyId, $keySecret);

    //
    // We create an razorpay order using orders api
    // Docs: https://docs.razorpay.com/docs/orders
    //

    $str = "select * from tbl_interior_designer where interior_designer_id=" . $_SESSION["InteriorDesignerID"];
    $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
    while ($res = mysqli_fetch_array($rs)) {
        $_SESSION["ifname"] = $res["first_name"];
        $_SESSION["ilname"] = $res["last_name"];
        $_SESSION["icno"] = $res["contact_no"];
        $_SESSION["iemail"] = $res["email_id"];
        $_SESSION["idisc"] = $res["description"];
    }



    $orderid = $_SESSION["PackageID"];
    $firstname = $_SESSION["ifname"];
    $lastname = $_SESSION["ilname"];
    $email = $_SESSION["iemail"];
    $contact = $_SESSION["icno"];
    // $address=$_SESSION['address'];
    $total = $_SESSION["txn_amount"];
    $title = $_SESSION["idisc"];

    $webtitle = 'wood depot';
    $displayCurrency = "INR";
    $imageurl = './imgae/D Rose.png';



    // $price = $_POST['price'];
    // $customer = $_POST['customername'];
    // $email = $_POST['email'];/
    // $contact = $_POST['phone'];

    // $_SESSION['email'] = $email;
    // $_SESSION['price'] = $price;

    $orderData = [
        'receipt' => 3456,
        'amount' => $total * 100, // 2000 rupees in paise
        'currency' => 'INR',
        'payment_capture' => 1, // auto capture
    ];

    $razorpayOrder = $api->order->create($orderData);

    $razorpayOrderId = $razorpayOrder['id'];

    $_SESSION['razorpay_order_id'] = $razorpayOrderId;

    $displayAmount = $amount = $orderData['amount'];

    if ($displayCurrency !== 'INR') {
        $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
        $exchange = json_decode(file_get_contents($url), true);

        $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
    }

    $data = [
        "key" => $keyId,
        "amount" => $total,
        "name" => "$webtitle",
        "description" => $title,
        "image" => "$imageurl",
        "prefill" => [
            "name" => $firstname . '  ' . $lastname,
            "email" => $email,
            "contact" => $contact,
        ],
        "notes" => [
            "address" => "narayan nagar",
            "merchant_order_id" => "12312321",
        ],
        "theme" => [
            "color" => "#F37254",
        ],
        "order_id" => $razorpayOrderId,
    ];

    if ($displayCurrency !== 'INR') {
        $data['display_currency'] = $displayCurrency;
        $data['display_amount'] = $displayAmount;
    }

    $json = json_encode($data);

    ?>
</head>

<body>

    <!-- scroll header and scroll rocket and loader  start------------------ -->
    <div class="scroll_top">
        <i class="fa-solid fa-shuttle-space"></i>
    </div>
    <!-- 
    <div class="center-body">

        <div class="loader-square"></div>

    </div> -->
    <!-- scroll header and scroll rocket and loader  end------------------ -->

    <!-- header start-------------------- -->
    <?php
    include_once './header.php';
    ?>
    <!-- header end-------------------- -->

    <!-- ---------------blog Hade section  start------------------- -->

    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img  responsive">
        <div class="about_content_parent">
            <div class="about_cotent">
                <h1>Package</h1>
                <p class="text-center">Pricing / <a href="#">Package</a></p>
            </div>
        </div>
    </div>



    <!-- ---------------blog Hade section  End------------------- -->

    <!-- --------------------- package start ------------------------ -->

    <div class="spacer_y">
        <div class="container">
            <div class="row g-0">
                <div class="col-sm-12 col-md-6">
                    <div class="label_content">
                        <img src="./imgae//package.jpg" alt="" class="responsive">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">

                    <div class="label_form">
                        <form class="edit_form">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" class="form-control" name="ORDER_ID" id="ORDER_ID" placeholder="Package ID" readonly value=<?php echo  $_SESSION["PackageID"]; ?>>
                                </div>
                                <?php
                                if (isset($_SESSION["InteriorDesignerID"])) {
                                ?>
                                    <div class="col-sm-12 col-md-6">
                                        <input id="CUST_ID" name="CUST_ID" type="text" class="form-control" placeholder="Interior ID" readonly value="<?php echo $_SESSION["InteriorDesignerID"]; ?>">

                                    </div>
                                <?php
                                }
                                ?>
                                <!-- <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Industry Type ID">

                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Channel">

                                </div> -->

                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="Amount" name="TXN_AMOUNT" readonly value="<?php echo $_SESSION["txn_amount"]; ?>">

                                </div>

                                <div class="col-12">
                                    <!-- <a href="thankyou.html">thankyou_mainbox</a> -->
                                    <div class="form_btn">
                                        <!-- <a href="paypackage.php"><input type="button" class="edit_form_btn" name="Check Out" value="CHECK OUT"></a> -->

                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="thankyou.php" method="POST">

                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo $data['key'] ?>" data-amount="<?php echo $data['amount'] ?>" data-currency="INR" data-name="<?php echo $data['name'] ?>" data-image="<?php echo $data['image'] ?>" data-description="<?php echo $data['description'] ?>" data-prefill.name="<?php echo $data['prefill']['name'] ?>" data-prefill.email="<?php echo $data['prefill']['email'] ?>" data-prefill.contact="<?php echo $data['prefill']['contact'] ?>" data-notes.shopping_order_id="<?php echo $orderid ?>" data-order_id="<?php echo $data['order_id'] ?>" <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount'] ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency'] ?>" <?php } ?>>
                            </script>
                            <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                            <input type="hidden" name="shopping_order_id" value="<?php echo $orderid ?>">

                        </form>

                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
                        </script>
                        <!-- <script>
                            $(window).on('load', function() {
                                jQuery('.razorpay-payment-button').click();
                            });
                        </script> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- --------------------- package end ------------------------ -->


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