<!DOCTYPE html>
<html lang="en">



<body>

    <?php
     include_once 'connection.php';
    extract($_REQUEST);
    // // SessionCheck();
    if (isset($place_order)) {
        


    //     $strIns = "insert into tbl_order(order_id,first_name,last_name,contact_no,address) values(null,$fname,$lname,$phone,$address)";
    $strIns="INSERT INTO tbl_order (order_id, first_name, last_name, contact_no, address) VALUES (null,$fname, $lname, $phone, $address)";
        $rsIns = mysqli_query($conn, $strIns) or die(mysqli_error($conn));
        echo '<script>alert("inserted")</script>';
    }


    ?>
    <?php
    include_once 'connection.php';
    if (isset($_POST['place_order'])) {
        $fname = mysqli_real_escape_string($conn, strip_tags($_POST['fname']));
        $lname = mysqli_real_escape_string($conn, strip_tags($_POST['lname']));
        $phone = mysqli_real_escape_string($conn, strip_tags($_POST['phone']));
        $address = mysqli_real_escape_string($conn, strip_tags($_POST['address']));
        
        $stmt = $conn->prepare("INSERT INTO tbl_order (order_id, first_name, last_name, contact_no, address) VALUES (null, ?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fname, $lname, $phone, $address);
        $stmt->execute();
        
        echo '<script>alert("Order placed successfully!")</script>';
    }
?>



    <!-- ---------billing start------------------------ -->

    <form class="edit_c_form " action="" method="post">

        <h3>Billing details </h3>





        <input type="text" name="fname" class="form-control" placeholder="First Name">

        <input type="text" name="lname" class="form-control" placeholder="Last Name">

        <input type="text" name="phone" class="form-control" placeholder="Phone">

        <input type="text" class="form-control" placeholder="Email">

        <input type="text" name="address" class="form-control" placeholder="House number and street name">
        <input type="submit" name="place_order" class="form-control place_order" value="PLACE ORDER">
    </form>


    <!-- <div class="col-lg-4 mt-5 col-md-12 col-sm-12">
                        <div class="product_checkout">
                            <div class="product_check_content">
                                <h3>Product</h3>
                            </div> -->
    <?php
    // $no = 1;
    // $total = 0;
    // $strBody = "select c.*,p.*,pi.* from tbl_cart c,tbl_product p,tbl_product_image pi where p.product_id=pi.product_id and pi.IsDefault=1 and p.product_id=c.product_id and c.user_id=" . $_SESSION["UserID"];
    // $rsBody = mysqli_query($conn, $strBody) or die(mysqli_error($conn));
    // if (mysqli_num_rows($rsBody) > 0) {
    //     while ($resBody = mysqli_fetch_array($rsBody)) {
    ?>
    <div class="card_check_item">
        <div class="info_product">
            <div class="product-thumbnail">
                <?php
                // $imgName = $resBody["image_url"];
                // if(!file_exists("Uploadfile/$imgName"))
                // {
                // 	$imgName="no-image.png";
                // }
                ?>
                <!-- <img width="600" height="600" src="imgae/8.jpg" alt=""> -->
                <img src="<?php //echo $imgName; 
                            ?>" style="height:600;width:600;">
            </div>
            <div class="product_c_name">
                <?php //$_SESSION['description'] = $resBody["description"]; 
                ?>
                <?php //$_SESSION["product_id"] = $resBody["product_id"];  
                ?>

                <?php //echo $resBody["product_name"]; 
                ?>
                <!-- <strong class="product-quantity">QTY : <?php //echo $resBody["quantity"]; 
                                                            ?></strong> -->
            </div>
        </div>
        <div class="product-c-total">
            <span><?php //echo "&#8377 " . $resBody["total_amount"]; 
                    ?></span>
        </div>
    </div>
    <?php
    //$total += $resBody["total_amount"];
    // }
    ?>





    <?php
    // } else {
    //     echo "<h4>Your Cart is empty...</h4>";
    // }
    ?>
    <!-- <div class="line_check"></div>
                            <div class="total_c_product">
                                <div class="total_contet"> -->
    <!-- <span>Total</span> -->
    <h5><?php
        // if (isset($total)) {
        //     echo "&#8377 " . $total;
        //     $_SESSION["total"] = $total;
        // }
        ?></h5>
    <!-- </div>
                            </div>
                            <div class="form_btn"> -->

    <!-- <input type="submit" name="place_order" class="form-control place_order" value="PLACE ORDER"> -->
    <!-- </div>
                        </div> -->

    <!-- </div> -->
    </form>
    <!-- </div>
        </div>
    </div> -->
    <!-- ---------billing end------------------------ -->









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