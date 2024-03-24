<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Ruper</title>

    <?php include_once 'link.php';  ?>
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
    <!-- ---------header strat ---------------->
    <?php
    include_once 'connection.php';
    include_once './header.php';

    extract($_REQUEST);
    if (isset($btnAddToCart)) {
        $string = exec('getmac');
        $mac = substr($string, 0, 17);

        $strSel = "select * from tbl_product where product_id=" . $hdnProductID;
        $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
        $resSel = mysqli_fetch_array($rsSel);

        $strP = "select * from tbl_cart where product_id=" . $hdnProductID;
        $rsP = mysqli_query($conn, $strP) or die(mysqli_error($conn));
        $resP = mysqli_fetch_array($rsP);
        if (mysqli_num_rows($rsP) > 0) {
            $Qty = $resP["quantity"] + 1;
            $x = $Qty * $resSel["price"];
            // $y = $x * $resSel["Discount"] / 100;
            $Amount = $x;
            if (isset($_SESSION["UserID"])) {
                $strUp = "update tbl_cart set quantity=$Qty,total_amount=$Amount where user_id=" . $_SESSION["UserID"] . " and product_id=" . $hdnProductID;
            } else {
                $strUp = "update tbl_cart set quantity=$Qty,total_amount=$Amount where mac_address='$mac' and product_id=" . $hdnProductID;
            }
            mysqli_query($conn, $strUp) or die(mysqli_error($conn));
        } else {


            $strColor = "select * from tbl_product_variance where product_id=$hdnProductID limit 1";
            $rsColor = mysqli_query($conn, $strColor) or die(mysqli_error($conn));
            $resColor = mysqli_fetch_array($rsColor);

            $x = 1 * $resSel["price"];
            // $y=$x*$resSel["Discount"]/100;
            $Amount = $x;

            if (isset($_SESSION["UserID"])) {
                $strIns = "insert into tbl_cart values(null," . $_SESSION["UserID"] . ",$hdnProductID," . $resColor["product_variance_id"] . ",1," . $resSel["price"] . ",$Amount,now(),'$mac')";
            } else {
                $strIns = "insert into tbl_cart values(null,null,$hdnProductID," . $resColor["product_variance_id"] . ",1," . $resSel["price"] . ",$Amount,now(),'$mac')";
            }
            mysqli_query($conn, $strIns) or die(mysqli_error($conn));
            $url = "add_to_cart.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
        }
    }

    if (isset($TypeID)) {
        $_SESSION["TypeID"] = $TypeID;
    }
    ?>
    <!-- ---------header end ---------------->

    <!-- -----------shop page start--------------------- -->
    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img ">
        <div class="about_content_parent">

            <div class="about_cotent">
                <h1>Shop</h1>
                <p class="text-center">Home / <a href="#">Shop</a></p>
            </div>
        </div>
    </div>
    <!-- -----------shop page end------------------------ -->


    <!-- ---------------------Latest Products part Start--------------- -->
    <?php
    if (isset($TypeID)) {
    ?>
        <div class="spacer_y">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-end  col-sm-12">
                        <form action="" class="serch_blog ">
                            <input type="text" class="cust_textbox" placeholder="Search...." id="inp">
                            <button type="button" class="serch_blog_btn" id="search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row  product_box">
                    <?php
                    $str = "select p.*,pi.* from tbl_product p,tbl_product_image pi where p.product_id=pi.product_id and p.IsActive=1 and pi.IsDefault=1 and category_type_id=" . $_SESSION["TypeID"];
                    $rs = mysqli_query($conn, $str) or mysqli_error($conn);
                    if (mysqli_num_rows($rs) > 0) {
                        while ($res = mysqli_fetch_array($rs)) {
                    ?>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6  mt-4 ">
                                <div class="main_box ">
                                    <div class="pro_img">
                                        <?php

                                        $imgName = $res["image_url"];
                                        ?>
                                        <img src="<?php echo $imgName; ?>" alt="" style="height:250px;width:320px;">
                                        <div class="social_icon justify-content-center w-100">
                                            <!-- <i class="fa-solid fa-cart-shopping even add_to_cart"></i> -->
                                            <form action="" method="post">
                                                <input type="hidden" name="hdnProductID" value="<?php echo $res["product_id"]; ?>">
                                                <button type="submit" class=" add_to_cart" name="btnAddToCart">
                                                    <i class="fa-solid fa-cart-shopping even"></i>
                                                </button>
                                                <!-- <button type="submit" class=" add_to_cart">
                                                <i class="fa-regular fa-heart  odd  add_like"></i>
                                            </button> -->
                                                <button type="submit" class=" add_to_cart" formaction="product_detail.php?PID=<?php echo $res["product_id"]; ?>">
                                                    <i class="fa-solid fa-eye odd"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <!-- <div class="hot">
                                        <p class="cool">HOT</p>
                                    </div> -->

                                    </div>
                                    <div class="datil">

                                        <h2 class="card-title">
                                            <!-- furniture -->
                                            <a href="#"><?php echo $res['product_name']; ?></a>
                                        </h2>

                                        <div class="orignal">
                                            <!-- <p class="first">$65.00</p> -->
                                            <p class="sec"><?php echo "&#8377 " . $res['price']; ?></p>
                                        </div>

                                    </div>



                                </div>
                            </div>
                        <?php
                        } ?>
                        <div class="clearfix"></div>

                    <?php

                    } else {
                        echo "<br><br><center><strong><h4>Product is not available now.</h4></strong></center>";
                    }
                    ?>

                </div>

                <div class="load_more mt-5 ">
                    <button class="load_btn" id="lod_less_btn"><span>Load More</span></button>
                    <!-- <button class="load_btn"><span>Load less <i class="fa-solid fa-arrow-down"></i></span></button> -->


                </div>
            </div>
        </div>
    <?php
    } else {


    ?>

        <!-- ---------------------Latest Products part End--------------- -->
        <div class="spacer_y">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-end  col-sm-12">
                        <form action="" class="serch_blog ">
                            <input type="text" class="cust_textbox" placeholder="Search...." id="inp">
                            <button type="button" class="serch_blog_btn" id="search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row  product_box">
                    <?php
                    $str = "select p.*,pi.* from tbl_product p,tbl_product_image pi where p.product_id=pi.product_id and p.IsActive=1 and pi.IsDefault=1";
                    $rs = mysqli_query($conn, $str) or mysqli_error($conn);
                    if (mysqli_num_rows($rs) > 0) {
                        while ($res = mysqli_fetch_array($rs)) {
                    ?>
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6  mt-4 ">
                                <div class="main_box ">
                                    <div class="pro_img">
                                        <?php

                                        $imgName = $res["image_url"];
                                        ?>
                                        <img src="<?php echo $imgName; ?>" alt="" style="height:250px;width:320px;">
                                        <div class="social_icon justify-content-center w-100">
                                            <!-- <i class="fa-solid fa-cart-shopping even add_to_cart"></i> -->
                                            <form action="" method="post">
                                                <input type="hidden" name="hdnProductID" value="<?php echo $res["product_id"]; ?>">
                                                <button type="submit" class=" add_to_cart" name="btnAddToCart">
                                                    <i class="fa-solid fa-cart-shopping even"></i>
                                                </button>
                                                <!-- <button type="submit" class=" add_to_cart">
                                        <i class="fa-regular fa-heart  odd  add_like"></i>
                                    </button> -->
                                                <button type="submit" class=" add_to_cart" formaction="product_detail.php?PID=<?php echo $res["product_id"]; ?>">
                                                    <i class="fa-solid fa-eye odd"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <!-- <div class="hot">
                                <p class="cool">HOT</p>
                            </div> -->

                                    </div>
                                    <div class="datil">

                                        <h2 class="card-title">
                                            <!-- furniture -->
                                            <a href="#"><?php echo $res['product_name']; ?></a>
                                        </h2>

                                        <div class="orignal">
                                            <!-- <p class="first">$65.00</p> -->
                                            <p class="sec"><?php echo "&#8377 " . $res['price']; ?></p>
                                        </div>

                                    </div>



                                </div>
                            </div>
                        <?php
                        } ?>
                        <div class="clearfix"></div>

                    <?php

                    } else {
                        echo "<br><br><center><strong><h4>Product is not available now.</h4></strong></center>";
                    }
                    ?>

                </div>

                <div class="load_more mt-5 ">
                    <button class="load_btn" id="lod_less_btn"><span>Load More</span></button>
                    <button class="less_btn" id="lod_less_btn"><span>Load Less</span></button>
                    <!-- <button class="load_btn"><span>Load less <i class="fa-solid fa-arrow-down"></i></span></button> -->


                </div>
            </div>
        </div>
        <!-- only product -->

    <?php
    }
    ?>

    <!-- product end -->




    <!-- ---------------------Footer Part Start--------------- -->
    <!-- <div class="spacer_y"> -->
    <?php
    include_once 'footer.php';

    ?>
    <!-- ---------------------Footer Part End--------------- -->



    </script>


    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/include-html.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- <script src="js/kursor.js"></script> -->
    <script src="js/loadmorebtn.js"></script>
    <!-- <script src="js/cursor_custom.js"></script> -->










</body>

</html>