<!DOCTYPE html>
<html lang="en">
<?php
include_once "connection.php";
SessionCheck();
extract($_REQUEST);
if (isset($order)) {
    $UserID = $_SESSION["UserID"];
    $GrandTotal = $_SESSION["total"];


    $strIns = "INSERT INTO tbl_order (order_id,user_id,GrandTotal,first_name,last_name,contact_no,address,CreatedOn) VALUES (null,$UserID,$GrandTotal,'$fname','$lname',$phone,'$address',now())";
    $rsIns = mysqli_query($conn, $strIns) or die(mysqli_error($conn));

    $OrderID = mysqli_insert_id($conn);
    $_SESSION["OrderID"] = $OrderID;

    $strDis = "select * from tbl_order where order_id=" . $OrderID;
    $rsDis = mysqli_query($conn, $strDis) or die(mysqli_error($conn));
    $resDis = mysqli_fetch_array($rsDis);
    $_SESSION["FinalAmount"] = $resDis["GrandTotal"];
    $_SESSION["fname"] = $resDis["first_name"];
    $_SESSION["lname"] = $resDis["last_name"];
    $_SESSION["contact"] = $resDis["contact_no"];

    $_SESSION["address"] = $resDis["address"];

    $strSelCart = "select * from tbl_cart where user_id=" . $_SESSION["UserID"];
    $rsSelCart = mysqli_query($conn, $strSelCart) or die(mysqli_error($conn));
    while ($resSelCart = mysqli_fetch_array($rsSelCart)) {
        $sql = "insert into tbl_order_detail values(null,$OrderID," . $resSelCart["product_id"] . "," . $resSelCart["product_variance_id"] . "," . $resSelCart["price"] . "," . $resSelCart["quantity"] . "," . $resSelCart["total_amount"] . ",'Not Proceeded',now())";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
    // $strDel = "delete from tbl_cart where user_id=" . $_SESSION["UserID"];
    // mysqli_query($conn, $strDel) or die(mysqli_error($conn));
    // header("location:pay.php");
    $url = "pay.php";
    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
}


//     echo '<script>alert("Order placed successfully!")</script>';
// }


?>

<head>

    <?php

    include_once 'link.php';

    ?>
</head>

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
    <?php include_once 'header.php' ?>

    <!-- header end-------------------- -->
    <!-- ---------------Designer section  start------------------- -->

    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img ">
        <div class="about_content_parent">
            <div class="about_cotent">
                <h1>Check Out </h1>
                <p class="text-center">Shop / <a href="#">Check Out</a></p>
            </div>
        </div>
    </div>


    <!-- ---------------Designer section  End------------------- -->

    <!-- ---------billing start------------------------ -->
    <div class="spacer_y">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mt-5 col-md-12 col-sm-12">
                    <div class="content_bill">
                        <div class="bill_head">
                            <h3>Billing details </h3>

                        </div>

                        <form class="edit_c_form " id="check_out_form" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 ">
                                    <input type="text" class="form-control check_fname" name="fname" placeholder="First Name" value="<?php echo $_SESSION["FirstName"]; ?>">
                                    <span class="err"> Plese Enter First Name</span>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 ">
                                    <input type="text" class="form-control check_lname" name="lname" placeholder="Last Name" value="<?php echo $_SESSION["LastName"]; ?>">
                                    <span class="err"> Plese Enter Last Name</span>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 ">
                                    <input type="text" class="form-control check_phno " name="phone" placeholder="Phone" value="<?php echo $_SESSION["contactno"]; ?>">
                                    <span class="err"> Plese Enter Mobile Number</span>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 ">
                                    <input type="text" class="form-control check_mail" placeholder="Email" value="<?php echo $_SESSION["email"]; ?>">
                                    <span class="err"> Plese Enter Email</span>

                                </div>

                                <div class="col-12 ">
                                    <input type="text" name="address" class="form-control chk_address" placeholder="House number and street name">
                                    <span class="err"> Plese Enter Address</span>


                                </div>




                            </div>

                    </div>
                </div>
                <div class="col-lg-4 mt-5 col-md-12 col-sm-12">
                    <div class="product_checkout">
                        <div class="product_check_content">
                            <h3>Product</h3>
                        </div>
                        <?php
                        $no = 1;
                        $total = 0;
                        $strBody = "select c.*,p.*,pi.* from tbl_cart c,tbl_product p,tbl_product_image pi where p.product_id=pi.product_id and pi.IsDefault=1 and p.product_id=c.product_id and c.user_id=" . $_SESSION["UserID"];
                        $rsBody = mysqli_query($conn, $strBody) or die(mysqli_error($conn));
                        if (mysqli_num_rows($rsBody) > 0) {
                            while ($resBody = mysqli_fetch_array($rsBody)) {
                        ?>
                                <div class="card_check_item">
                                    <div class="info_product">
                                        <div class="product-thumbnail">
                                            <?php
                                            $imgName = $resBody["image_url"];
                                            // if(!file_exists("Uploadfile/$imgName"))
                                            // {
                                            // 	$imgName="no-image.png";
                                            // }
                                            ?>
                                            <!-- <img width="600" height="600" src="imgae/8.jpg" alt=""> -->
                                            <img src="<?php echo $imgName; ?>" style="height:600;width:600;">
                                        </div>
                                        <div class="product_c_name">
                                            <?php $_SESSION['description'] = $resBody["description"]; ?>
                                            <?php $_SESSION["product_id"] = $resBody["product_id"];  ?>

                                            <?php echo $resBody["product_name"]; ?>
                                            <strong class="product-quantity">QTY : <?php echo $resBody["quantity"]; ?></strong>
                                        </div>
                                    </div>
                                    <div class="product-c-total">
                                        <span><?php echo "&#8377 " . $resBody["total_amount"]; ?></span>
                                    </div>
                                </div>
                            <?php
                                $total += $resBody["total_amount"];
                            }
                            ?>





                        <?php
                        } else {
                            echo "<h4>Your Cart is empty...</h4>";
                        }
                        ?>
                        <div class="line_check"></div>
                        <div class="total_c_product">
                            <div class="total_contet">
                                <span>Total</span>
                                <h5><?php
                                    if (isset($total)) {
                                        echo "&#8377 " . $total;
                                        $_SESSION["total"] = $total;
                                    }
                                    ?></h5>
                            </div>
                        </div>

                    </div>
                    <div class="form_btn">

                        <input type="submit" name="order" class="form-control place_order" value="PLACE ORDER">
                    </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <!-- ---------billing end------------------------ -->








    <!-- ---------------------Footer Part Start--------------- -->
    <!-- <div class="spacer_y"> -->
    <?php
    include_once 'footer.php';
    ?>
    <!-- ---------------------Footer Part End--------------- -->


    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/kursor.js"></script>
    <script src="js/veldation.js"></script>
    <script src="js/cursor_custom.js"></script>

   




</body>

</html>