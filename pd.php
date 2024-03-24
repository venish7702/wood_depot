<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once 'connection.php';
    extract($_REQUEST);
    if (isset($PID)) {
        $_SESSION["PID"] = $PID;
    }
    ?>

    <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalToggle10" aria-hidden="true" id="exampleModalToggle10">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content full ">
                <div class="modal-header">
                    <button type="button" data-bs-dismiss="modal" class="close_btn "><i class="fa-solid fa-xmark"></i></button>
                </div>

                <div class="modal-body ">
                    <div class="model_body_head">
                        Product Detail
                    </div>
                    <div class="em-bar">
                        <div class="em_bar_bg"></div>
                    </div>
                    <div class="row view_product">
                        <?php

                        ?>
                        <?php
                        $str = "select p.*,pi.* from tbl_product p,tbl_product_image pi where p.product_id=pi.product_id and p.product_id=" . $_SESSION["PID"];
                        $rs = mysqli_query($conn, $str) or mysqli_error($conn);
                        while ($res = mysqli_fetch_array($rs)) {
                            $imgName = $res["image_url"];
                        ?>


                            <div class="col-lg-6 col-md-12 col-sm-12 ">
                                <div class="box_view">
                                    <input type="hidden" name="hdnProductID" value="<?php echo $res["product_id"]; ?>">
                                    <img src="<?php echo $imgName; ?>">
                                </div>
                            </div>
                        <?php }  ?>
                        <?php
                        $STRP = "select p.*,c.category,t.category_type_name from tbl_product p,tblcategory c,tbl_category_type t where p.category_id=c.id and p.category_type_id=t.id and  p.product_id=" . $_SESSION["PID"];
                        $Rsp = mysqli_query($conn, $STRP) or mysqli_error($conn);
                        while ($Resp = mysqli_fetch_array($Rsp)) {
                        ?>
                            <div class="col-lg-6  col-md-12   col-sm-12">
                                <div class="view_content">
                                    <h2><?php echo $Resp["product_name"]; ?></h2>
                                    <h3><b>Product Code</b> : <?php echo $Resp["product_code"]; ?></h3>
                                    <h3><b>category</b> : <?php echo $Resp["category"]; ?></h3>
                                    <h3><b>category</b> : <?php echo $Resp["category_type_name"]; ?></h3>



                                    <p>
                                        <?php echo $Resp["description"]; ?>
                                    </p>
                                <?php  }  ?>
                                <h3><b>color
                                        <?php
                                        $strColor = "select * from tbl_product_variance where is_active=1 and product_id=" . $_SESSION["PID"];
                                        $rsColor = mysqli_query($conn, $strColor) or mysqli_error($conn);
                                        while ($resColor = mysqli_fetch_array($rsColor)) {
                                        ?>

                                            <div style="background-color: <?php echo $resColor["product_color"]; ?>;height: 50px;width: 50px;border: 1px solid;cursor: pointer;" class="rddiv" id="<?php echo $resColor["product_variance_id"]; ?>"></div>
                                    </b> </h3>

                            <?php } ?>
                                </div>

                                <div class="add_product">
                                    <!-- <input type="number" class="number_type text-center" value="1" min="1"> -->
                                    <input type="submit" id="btnc" class="px-3 align-items-center sub_add_cart" role="button" value="ADD TO CART" name="btnAddToCart" formaction="add_to_cart.php">

                                    <!------- add to cart btn start------ -->


                                    <!-- ---add to cart model end------ -->
                                </div>
                                <input type="submit" class="sub_add_product" value="inquiry">

                                <input type="hidden" id="rdColor" name="rdColor">
                            </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


</body>

</html>