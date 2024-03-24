<!DOCTYPE html>
<html lang="en">
<?php
include_once "connection.php";
include_once "link.php";
SessionCheck();
extract($_REQUEST);
if (isset($btnMakePayment)) {
    $UserID = $_SESSION["UserID"];
    $GrandTotal = $_SESSION["total"];

    $strIns = "insert into tbl_order values(null,$UserID,$GrandTotal,$rd,now())";
    $rsIns = mysqli_query($conn, $strIns) or die(mysqli_error($conn));

    $OrderID = mysqli_insert_id($conn);
    $_SESSION["OrderID"] = $OrderID;

    $strDis = "select * from tbl_order where order_id=" . $OrderID;
    $rsDis = mysqli_query($conn, $strDis) or die(mysqli_error($conn));
    $resDis = mysqli_fetch_array($rsDis);
    $_SESSION["FinalAmount"] = $resDis["GrandTotal"];

    $strSelCart = "select * from tbl_cart where user_id=" . $_SESSION["UserID"];
    $rsSelCart = mysqli_query($conn, $strSelCart) or die(mysqli_error($conn));
    while ($resSelCart = mysqli_fetch_array($rsSelCart)) {
        $sql = "insert into tbl_order_detail values(null,$OrderID," . $resSelCart["product_id"] . "," . $resSelCart["product_variance_id"] . "," . $resSelCart["price"] . "," . $resSelCart["quantity"] . "," . $resSelCart["total_amount"] . ",'Not Proceeded',now())";
        mysqli_query($conn, $sql) or die(mysqli_error($conn));
    }
    $strDel = "delete from tbl_cart where user_id=" . $_SESSION["UserID"];
    mysqli_query($conn, $strDel) or die(mysqli_error($conn));
    // header("location:pay.php");
    $url = "pay.php";
    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
}
?>

<head>
</head>

<body>
    <?php include_once "header.php"; ?>
    <div class="container">
        <h3 class="tittle-w3l">
            <font size=6>Select Address For Deliverd Order</font>
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <?php
        $strSel = "select u.*,c.city_name,s.state_name from tbl_user_address u,tbl_city c,tbl_state s where s.state_id=u.state_id and c.city_id=u.city_id and u.user_id=" . $_SESSION["UserID"];
        $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
        if (mysqli_num_rows($rsSel) > 0) {
        ?>
            <div class="checkout-right">
                <form method="post">
                    <table class="timetable_sub table-responsive" noscrolling="">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <?php
                        while ($resSel = mysqli_fetch_array($rsSel)) {
                            if ($resSel["IsPrimary"] == 1) {
                        ?>
                                <tbody>
                                    <!-- <div class="checkout-left">
						<div class="address_form_agile"> -->

                                    <tr>
                                        <td><input style="color:#f97c00;" type="radio" name="rd" value="<?php echo $resSel["address_id"]; ?>" checked=""></td>
                                        <td><?php echo $resSel["address"] . ", " . $resSel["state_name"] . ", " . $resSel["city_name"] . " - " . $resSel["pincode"]; ?></td>
                                    </tr>
                                <?php
                            } else {
                                ?>
                                    <tr>
                                        <td><input style="color:#f97c00;" type="radio" name="rd" value="<?php echo $resSel["address_id"]; ?>"></td>
                                        <td><?php echo $resSel["address"] . ", " . $resSel["state_name"] . ", " . $resSel["city_name"] . " - " . $resSel["pincode"]; ?></td>
                                    </tr>
                            <?php
                            }
                        }
                            ?>
                                </tbody>
                    </table>
                    <div class="checkout-right-basket" align="right">
                        <span class="fa fa-hand-o-right" aria-hidden="true" style="font-size:30px;"><input type="submit" name="btnMakePayment" class="btn btn-primary" value="Make a Payment" style="font-size:20px;"></span>
                    </div>
                <?php
            }
                ?>
                <br>
                <style type="text/css">
                    .abcde a:hover {
                        color: #f97c00;
                    }
                </style>
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="abcde"><a href="DefaultPurchaseSetting.php" style="font-size: 20px;"><i class="fa fa-cog fa-spin" style="font-size: 20px;"></i>&nbsp;&nbsp;Default Purchase Setting</a></h4>
                    </div>
                    <!-- <div class="col-md-3" align="right">
					<div class="checkout-right-basket">
						<span class="fa fa-hand-o-right" aria-hidden="true" style="font-size:30px;"><input type="submit" name="btnMakePayment" class="btn btn-primary" value="Make a Payment" style="font-size:20px;"></span>
					</div>
				</div> -->
                </div>
                </form>
            </div>
            <div class="clearfix"> </div>
    </div>
    </div><br>
    <!-- Footer -->
    <?php include_once "./footer.php"; ?>
    <!-- /footer -->


</body>

</html>