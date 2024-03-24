<!DOCTYPE html>
<html lang="en">
<?php
include_once "connection.php";
include_once "link.php";
SessionCheck();
extract($_REQUEST);
if (isset($DID)) {
    $strDel = "delete from tbl_cart where cart_id=" . $DID;
    mysqli_query($conn, $strDel) or die(mysqli_error($conn));
}
?>


<head>
    <script type="text/javascript">
        function incrementValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                document.getElementById('number').value = value;
            }
        }

        function decrementValue() {
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                document.getElementById('number').value = value;
            }

        }
    </script>
</head>

<body>
    <?php include_once "header.php" ?>

    <form method="post" class="creditly-card-form agileinfo_form">

        <div class="privacy">
            <!-- <h3 class="tittle-w3l">Check Out
                    <span class="heading-style">
                    </span>
                </h3> -->

            <div class="about_head">
                <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img  responsive">
                <div class="about_content_parent">
                    <div class="about_cotent">
                        <h1>Check Out</h1>
                        <p class="text-center">Add To Cart / <a href="#">Check Out</a></p>
                    </div>
                </div>
            </div>
            <div class="container">

                <!-- //tittle heading -->
                <?php
                $no = 1;
                $total = 0;
                $strBody = "select c.*,p.*,pi.* from tbl_cart c,tbl_product p,tbl_product_image pi where p.product_id=pi.product_id and pi.IsDefault=1 and p.product_id=c.product_id and c.user_id=" . $_SESSION["UserID"];
                $rsBody = mysqli_query($conn, $strBody) or die(mysqli_error($conn));
                if (mysqli_num_rows($rsBody) > 0) {
                ?>
                    <div class="checkout-right">
                        <div class="table-responsive">
                            <table class="timetable_sub table text-center mt-5">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Product</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <!-- <th>Discount</th> -->
                                        <th>Price</th>
                                        <th>Total Amount</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($resBody = mysqli_fetch_array($rsBody)) {
                                 

                                ?>
                                    <tbody>
                                        <tr class="rem1">
                                            <td class="invert"><?php echo $no; ?></td>
                                            <td class="invert-image">
                                                <?php
                                                $imgName = $resBody["image_url"];
                                                // if(!file_exists("Uploadfile/$imgName"))
                                                // {
                                                // 	$imgName="no-image.png";
                                                // }
                                                ?>
                                                <img src="<?php echo $imgName; ?>" style="height:100px;width:150px;">
                                            </td>
                                            <td class="invert"><?php echo $resBody["product_name"]; ?></td>
                                            <td class="invert">
                                                <div class="quantity">
                                                    <div class="quantity-select">
                                                        <!-- <div class="entry value-minus">&nbsp;</div>
                                                        <div class="entry value"> -->
                                                        <span><?php echo $resBody["quantity"]; ?></span>
                                                    </div>
                                                    <!-- <div class="entry value-plus active">&nbsp;</div> -->
                                                </div>
                        </div>

                        <!-- <input type="button" onclick="decrementValue()" value="-" />
                                                <input type="text" name="quantity" value="1" maxlength="2" max="10" size="1" id="number" />
                                                <input type="button" onclick="incrementValue()" value="+" /> -->

                        </td>

                        <td class="invert"><?php echo "&#8377 " . $resBody["price"]; ?></td>
                        <td class="invert"><?php echo "&#8377 " . $resBody["total_amount"]; ?></td>
                        <td class="invert">
                            <a href="?DID=<?php echo $resBody["cart_id"]; ?>"><i class="fa fa-close" style="font-size:20px;color: #5a5a5a;"></i></a>
                        </td>
                        </tr>
                    <?php
                                    $no++;
                                    $total += $resBody["total_amount"];
                                }
                    ?>
                    <tr>
                        <td colspan="6"></td>
                        <td align="center"><b>Total : <?php
                                                        if (isset($total)) {
                                                            echo "&#8377 " . $total;
                                                            $_SESSION["total"] = $total;
                                                        }
                                                        ?></b>
                        </td>
                        <td></td>
                    </tr>
                    </tbody>
                    </table>
                    </div>
            </div><br>
            <div align="right">
                <a href="check_out_page.php" class=" checkout_btn" style="font-size: 18px;">checkout&nbsp;&nbsp;<i class="fa fa-angle-double-right" style="font-size: 20px;"></i></a>
            </div>
        <?php
                } else {
                    echo "<h4>Your Cart is empty...</h4>";
                }
        ?>
        </div>
        </div>
    </form>
    <?php include_once 'footer.php'; ?>
</body>

</html>