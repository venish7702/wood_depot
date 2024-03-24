<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Clean | Ruper</title>
    <?php
    include_once 'link.php';
    include_once 'connection.php';
    extract($_REQUEST);



    ?>

    <script type="text/javascript" src="validation.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="alert/dist/sweetalert.css">
    <script type="text/javascript">
        $(document).ready(function() {
            function ValidateQty(ControlID) {
                var Qty = document.getElementById(ControlID).value;
                if (Qty == 0) {
                    alert("Enter Minimum 1 Quantity");
                    return false;
                }
            }
        })
    </script>

</head>

<body>

    <!-- <div class="scroll_top">
        <i class="fa fa-angle-up"></i>
    </div>

    <div class="center-body">

        <div class="loader-square"></div>

    </div> -->
    <!-- <h1 class="mode_all">heding</h1> -->

    <!-- ---------header strat ---------------->
    <header>
        <div class="d-none d-md-block">
            <div class="container py-2 d-sm-block ">
                <div class="row justify-content-between">
                    <div class="col-auto ">

                        <div class="addinfo text-info">
                            <a href="https://www.google.com/maps/place/Surat,+Gujarat/@21.2132777,72.9204605,12z/data=!4m6!3m5!1s0x3be04e59411d1563:0xfe4558290938b042!8m2!3d21.1702401!4d72.8310607!16zL20vMDFoMWhu">
                                <i class="fa fa-map-marker-alt"></i>Find Store</a>
                            <a href="https://accounts.google.com/v3/signin/identifier?dsh=S-1308204416%3A1677171624660542&continue=https%3A%2F%2Fmyaccount.google.com%2Femail%3Fpli%3D1&followup=https%3A%2F%2Fmyaccount.google.com%2Femail%3Fpli%3D1&osid=1&passive=1209600&service=accountsettings&flowName=GlifWebSignIn&flowEntry=ServiceLogin&ifkv=AWnogHcGaMMUuyoy3JktFG6Hys4jAHmPqjYu1OmCdhc3GISer72blspoQs5ALMQGrXt9DyvI28jj-Q">
                                <i class="fa fa-envelope"></i>wooddepot@gmail.com</a>

                        </div>

                    </div>
                    <div class="col-auto text-info  p-0">
                        <!-- <a href="#">Gift Cards </a> -->
                        <a href="faq.php"> FAQs</a>
                        <a href="contact.php"> Contact</a>
                        <a href="profile.php"><?php if (isset($_SESSION["UserID"])) {
                                                    echo  $_SESSION["FirstName"];
                                                } ?></a>

                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="top_header py-2">
            <div class="container">
                <div class="row justify-content-between align-items-center ">

                    <div class=" col-xxl-5 col-xl-5 col-lg-4 col-md-4 col-sm-4 col-4 p-0">

                        <nav>
                            <ul class="list-unstyled main_menu flex m-0">
                                <li>
                                    <a href="#">Home <i class="fa-solid fa-chevron-down" style="font-size: 10px;"></i></a>
                                    <ul class="sub_menu">
                                        <li><a href="index.php">Home 01</a></li>
                                        <li><a href="index2.php">Home 02</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Shop <i class="fa-solid fa-chevron-down" style="font-size: 10px;"></i></a>
                                    <div class="mega_div">
                                        <div class=" row ">
                                            <?php
                                            $strCate = "select * from tblcategory where IsApprove=1 and IsActive=1";
                                            $rsCate = mysqli_query($conn, $strCate) or mysqli_error($conn);
                                            while ($resCate = mysqli_fetch_array($rsCate)) {
                                            ?>

                                                <div class="col-4 mega_items">

                                                    <h3><?php echo $resCate["category"]; ?></h3>
                                                    <div class="content_shop_header">
                                                        <?php
                                                        $strCType = "select t.* from tbl_category_type t where t.category_id=" . $resCate["id"];
                                                        $rsCType = mysqli_query($conn, $strCType) or mysqli_error($conn);
                                                        while ($resCType = mysqli_fetch_array($rsCType)) {
                                                        ?>
                                                            <a href="shop.php?TypeID=<?php echo $resCType["id"]; ?>"><?php echo $resCType["category_type_name"]; ?></a>

                                                        <?php } ?>
                                                    </div>

                                                </div>

                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                                <!-- <li><a href="blog.php">Blog</a></li> -->
                                <li><a href="inquiry.php">Inquiry</a></li>
                                <li><a href="#">Page <i class="fa-solid fa-chevron-down" style="font-size: 12px;"></i></a>
                                    <ul class="sub_menu">
                                        <!-- <li><a href="pricing.php">Pricing</a></li> -->
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="contact.php">contact</a></li>
                                        <li><a href="faq.php">FAQ</a></li>
                                        <!-- <li><a href="page-404.php">Page 404</a></li> -->

                                    </ul>
                                </li>
                                <!-- <li><a href="contact.php">Contact</a></li> -->
                                <li><a href="designer.php">Designer</a></li>
                                <?php
                                if (isset($_SESSION["UserID"])) {
                                ?>
                                    <li><a href="#">Setting <i class="fa-solid fa-chevron-down" style="font-size: 12px;"></i></a>
                                        <ul class="sub_menu">

                                            <li><a href="yourorder.php">Your Order</a></li>
                                            <li><a href="Accept_request.php">Interior Request</a></li>
                                            <li><a href="chang_password.php">Change Password</a></li>
                                            <li><a href="profile.php">Profile</a></li>

                                        </ul>

                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <div class="toggle">
                                <i class="fa fa-bars"></i>
                            </div>
                            <ul class="mob_main_menu">
                                <li>
                                    <a href="#">Home <i class="fa-solid fa-chevron-down" style="font-size: 12px;"></i></a>
                                    <ul class="mob_sub_menu">
                                        <li><a href="index.php">Home 01</a></li>
                                        <li><a href="index2.php">Home 02</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="heder_shop">Shop <i class="fa-solid fa-chevron-down" style="font-size: 12px;"></i></a>
                                    <div class="mega_div_mob">
                                        <div class=" row ">

                                            <div class="col-6  mega_items">

                                                <h3>Living</h3>
                                                <div class="content_shop_header">
                                                    <a href="shop.php">Living Storage</a>
                                                    <a href="#">Tables</a>
                                                    <a href="#">Outdoor</a>
                                                </div>

                                            </div>
                                            <div class="col-6 mega_items">

                                                <h3>Badroom</h3>
                                                <div class="content_shop_header">
                                                    <a href="#">Living Storage</a>
                                                    <a href="#">Tables</a>
                                                    <a href="#">Outdoor</a>
                                                </div>

                                            </div>
                                            <div class="col-6 mega_items">

                                                <h3>Dining</h3>
                                                <div class="content_shop_header">
                                                    <a href="#">Living Storage</a>
                                                    <a href="#">Tables</a>
                                                    <a href="#">Outdoor</a>
                                                </div>

                                            </div>
                                            <div class="col-6   mt-3 mega_items">

                                                <h3>Study</h3>
                                                <div class="content_shop_header">
                                                    <a href="#">Living Storage</a>
                                                    <a href="#">Tables</a>
                                                    <a href="#">Outdoor</a>
                                                </div>

                                            </div>
                                            <div class="col-6  mt-3  mega_items">

                                                <h3>Decor</h3>
                                                <div class="content_shop_header">
                                                    <a href="#">Living Storage</a>
                                                    <a href="#">Tables</a>
                                                    <a href="#">Outdoor</a>
                                                </div>

                                            </div>
                                            <div class="col-6   mt-3 mega_items">

                                                <h3>Sofa</h3>
                                                <div class="content_shop_header">
                                                    <a href="#">Living Storage</a>
                                                    <a href="#">Tables</a>
                                                    <a href="#">Outdoor</a>
                                                </div>

                                            </div>





                                        </div>
                                    </div>

                                </li>
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="#">Page <i class="fa-solid fa-chevron-down" style="font-size: 12px;"></i></a>
                                    <ul class="mob_sub_menu">
                                        <li><a href="pricing.php">Pricing</a></li>
                                        <li><a href="about.php">About Us</a></li>
                                        <li><a href="inquiry.php">Inquiry</a></li>
                                        <li><a href="faq.php">FAQ</a></li>
                                        <li><a href="page-404.php">Page 404</a></li>


                                    </ul>
                                </li>
                                <li><a href="designer.php">Designer</a></li>

                                <li><a href="#">Setting <i class="fa-solid fa-chevron-down" style="font-size: 12px;"></i></a>
                                    <ul class="mob_sub_menu">
                                        <li><a href="yourorder.php">Your Order</a></li>
                                        <li><a href="chang_password.php">Change Password</a></li>
                                        <!-- <li><a href="#">Default Purchase Setting</a></li> -->
                                        <li><a href="profile.php">Profile</a></li>

                                    </ul>
                                </li>

                            </ul>
                        </nav>



                    </div>
                    <div class=" col-xxl-2 col-xl-2 col-lg-4 col-md-4 col-sm-4 col-4   p-0 text-center ">
                        <div class="site_logo">
                            <a href="#"><img src="./imgae/asset 0.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-5 col-lg-4 col-md-4 col-sm-4 col-4  p-0 text-end">
                        <div class="icon">

                            <!------- login btn end------ -->

                            <!-- <a class="px-1 align-items-center login  focus_login" data-bs-toggle="modal"
                                href="#exampleModalToggle" role="button">Login</a> -->
                            <?php
                            if (isset($_SESSION["UserID"])) {
                            ?>
                                <a class="px-1 align-items-center login  focus_login" href="logout.php" role="button" onclick="jsalert()" title="logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                                <script>
                                    function jsalert() {
                                        swal("Congrats!", "logout successfully!", "success");
                                    }
                                </script>

                            <?php
                            } else {
                            ?>
                                <a class="px-1 align-items-center login  focus_login" data-bs-toggle="modal" href="#exampleModalToggle" role="button" title="login"><i class="fa-solid fa-user p-2"></i></a>

                            <?php
                            }
                            ?>

                            <!------- login btn end------ -->

                            <!-- ---login model start------ -->
                            <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalToggle" aria-hidden="true" id="exampleModalToggle">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" data-bs-dismiss="modal" class="close_btn "><i class="fa-solid fa-xmark"></i></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="model_body_head">
                                                Signup
                                            </div>
                                            <div class="em-bar">
                                                <div class="em_bar_bg">
                                                </div>
                                            </div>


                                            <form class="login_form" id="login_client" method="post" action="index.php">
                                                <?php
                                                if (isset($login)) {

                                                    $p = base64_encode($Password);

                                                    $strsel = "select * from tbluser where email='$Email' and password='$p'";
                                                    $rs = mysqli_query($conn, $strsel) or die(mysqli_error($conn));
                                                    if (mysqli_num_rows($rs) > 0) {

                                                        $res = mysqli_fetch_array($rs);
                                                        if ($res["IsActive"] == 1) {
                                                            $_SESSION["UserID"] = $res["user_id"];
                                                            $_SESSION["FirstName"] = $res["first_name"];
                                                            $_SESSION["LastName"] = $res["last_name"];
                                                            $_SESSION["email"] = $res["email"];
                                                            $_SESSION["contactno"] = $res["contact_no"];
                                                            // header("Location:index.php");
                                                            $url = "index.php";
                                                            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                                                        } else {
                                                ?>
                                                            <script>
                                                                swal("Oops!", " You are Blocked by Admin,Plz Contact Administrator...!", "error");
                                                            </script>



                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <script>
                                                            swal("Oops!", " Invalid EmailID or Password!", "error");
                                                        </script>
                                                <?php

                                                    }
                                                    // $string = exec('getmac');
                                                    // $mac = substr($string, 0, 17);
                                                    // if (isset($_SESSION["UserID"])) {
                                                    //     $strUp = "update tbl_cart set user_id=" . $_SESSION["UserID"] . " where mac_address='$mac'";
                                                    //     mysqli_query($conn, $strUp) or die(mysqli_error($conn));
                                                    // }
                                                }

                                                ?>
                                                <div class="row">

                                                    <div class="col-12">


                                                        <input type="text" class="form-control client_email" name="Email" placeholder="Enter Email">
                                                        <span class="err">Enter Your Valid Email</span>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="password" class="form-control client_password" name="Password" placeholder="Enter Password">
                                                        <span class="err">Enter Your Password</span>

                                                    </div>
                                                </div>

                                                <div class="forget_password post_cat">
                                                    <a href="forget_password.php">Lost Your Password?</a>
                                                </div>
                                                <div class="form_btn">
                                                    <input type="submit" class="btn_log" name="login" value="LOGIN">

                                                    <input type="button" class="btn_reg" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" value="REGISTRATION">

                                            </form>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- ---login model end------ -->
                        <!-- ---registration model start------ -->
                        <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalToggle2" aria-hidden="true" id="exampleModalToggle2">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-bs-dismiss="modal" class="close_btn "><i class="fa-solid fa-xmark"></i></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="model_body_head">
                                            Regisrtation
                                        </div>
                                        <div class="em-bar">
                                            <div class="em_bar_bg">
                                            </div>
                                        </div>


                                        <form class="login_form" method="post" id="reg_client" enctype="multipart/form-data">
                                            <?php
                                            if (isset($registration)) {
                                                $txtpwd = base64_encode($pwd);
                                                $fileName = "uploads/" . $_FILES["file"]["name"];
                                                if ($_FILES["file"]["error"] > 0) {
                                                    $error = $_FILES["file"]["error"];
                                                } else {
                                                    move_uploaded_file($_FILES["file"]["tmp_name"], 'uploads/' . $fileName);
                                                }
                                                $str = "insert into tbluser values(null,'$fname','$lname','$email','$txtpwd','$cno','$gen','$dob',$city,'$fileName',1,0,null)";
                                                mysqli_query($conn, $str) or die(mysqli_error($conn));

                                                $url = "index.php";
                                                echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                                            ?>
                                                <script>
                                                    swal("Congrats!", ", your account is created!", "success");
                                                </script>
                                            <?php
                                            }
                                            ?>



                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <input type="text" class="form-control first_name " name='fname' placeholder="First Name">
                                                    <span class="err">Enter Letter Only  Name</span>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <input type="text" class="form-control last_name" name="lname" placeholder="Last Name">
                                                    <span class="err">Enter Letter Only Last Name</span>


                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control reg_email" name="email" placeholder="Email">
                                                    <span class="err">Enter Your Email</span>

                                                </div>
                                                <div class="col-12">
                                                    <input type="password" class="form-control reg_password" name='pwd' placeholder="Password">
                                                    <span class="err">Enter Your Password</span>

                                                </div>
                                                <div class="col-12">
                                                    <input type="password" class="form-control reg_c_password" name='cpwd' placeholder="Confirm Password">
                                                    <span class="err">Enter Confirm Password</span>

                                                </div>
                                                <div class="col-12">
                                                    <input type="text" class="form-control reg_contect" name="cno" placeholder="Contact No">
                                                    <span class="err">Enter Mobile Number</span>

                                                </div>
                                                <div class="col-12 ">
                                                    <div class="wrapper form-control">
                                                        <input type="radio" name="gen" id="option-1" value="male" class="r_gen">
                                                        <input type="radio" name="gen" id="option-2" value="female" class="r_gen">
                                                        <!-- <span class="err_r"> plese Enter gender</span> -->


                                                        <label for="option-1" class="option option-1">
                                                            <div class="dot"></div>
                                                            <span>Male</span>
                                                        </label>
                                                        <label for="option-2" class="option option-2">
                                                            <div class="dot"></div>
                                                            <span>Female</span>
                                                        </label>
                                                    </div>
                                                    <div class="edit_err">
                                                        <span> plese Enter gender</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <input type="date" class="form-control r_date" name="dob" class="s_city">
                                                    <span class="err">plese Enter dob</span>

                                                </div>
                                                <div class="col-12">
                                                    <select class="form-control cust_drop" name="city">
                                                        <option>Select City</option>
                                                        <!-- <option>Surat</option>
                                                        <option>Vapi</option> -->
                                                        <?php
                                                        $str_cmb = " select * from tbl_city";
                                                        $res = mysqli_query($conn, $str_cmb);

                                                        if ($res->num_rows > 0) {
                                                            while ($row = $res->fetch_assoc()) {
                                                        ?>
                                                                <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?><i class="fa-solid fa-chevron-down"></i></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                        <!-- <option><i class="fa-solid fa-chevron-down"></i></option> -->


                                                    </select>

                                                </div>
                                                <div class="col-12">
                                                    <!-- <input type="File" class="form-control" name="image" src="./imgae/2.jpg" width="50"> -->
                                                    <input type="File" class="form-control reg_img" name="file">
                                                    <span class="err">Plese Select Img File</span>

                                                </div>
                                            </div>

                                            <div class="form_btn mt-4">
                                                <input type="submit" class="btn_log" value="REGISTRATION" name="registration">

                                                <input type="button" class="btn_reg" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal" value="Al Ready  Has An Account">

                                            </div>
                                        </form>


                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- ---registration model end------ -->




                        <!-- <a href="#" class="slider_social_icon"><i class="fa-regular fa-heart"></i></a> -->
                        <!------- add to cart btn start------ -->
                        <a href="add_to_cart.php"><i class="fa-solid fa-shop p-1" data-bs-toggle="modal" href="#exampleModalToggle1" role="button"></i></a>


                        <!-- <input type="submit" class="px-3 align-items-center sub_add_cart" data-bs-toggle="modal" href="#exampleModalToggle1" role="button" value="ADD TO CART"> -->

                        <!------- add to cart btn end------ -->

                        <!-- ---add to cart model start------ -->
                        <form id="cart_sp" method="post" action="shopping_cart.php">
                            <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalToggle1" role="dialog" aria-hidden="true" id="exampleModalToggle1">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <button type="button" data-bs-dismiss="modal" class="close_btn "><i class="fa-solid fa-xmark"></i></button>
                                        </div>

                                        <div class="modal-body ">
                                            <div class="model_body_head">
                                                Add To Cart
                                            </div>
                                            <div class="em-bar">
                                                <div class="em_bar_bg"></div>
                                            </div>
                                            <div class="table-responsive ">

                                                <?php
                                                if (isset($DIDCart)) {
                                                    $strDel = "delete from tbl_cart where cart_id=" . $DIDCart;
                                                    mysqli_query($conn, $strDel) or die(mysqli_error($conn));
                                                }
                                                $string = exec('getmac');
                                                $mac = substr($string, 0, 17);
                                                $total = 0;
                                                if (isset($_SESSION["UserID"])) {
                                                    $str = "select c.*,p.* from tbl_cart c,tbl_product p where p.product_id=c.product_id and c.user_id=" . $_SESSION["UserID"];
                                                } else {
                                                    $str = "select c.*,p.* from tbl_cart c join tbl_product p on p.product_id=c.product_id where c.mac_address='$mac' or user_id IS NULL";
                                                }
                                                $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                                                if (mysqli_num_rows($rs) > 0) {
                                                ?>
                                                    <table class="table   table-hover table-border text-center " style="line-height: 15px; border: 1px solid #dedede;">
                                                        <thead>
                                                            <tr style="font-size: 15px;">
                                                                <td>Product name</td>
                                                                <td>Quantity</td>
                                                                <td>Price</td>
                                                                <td>Total amount</td>
                                                                <td>Remove</td>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            while ($res = mysqli_fetch_array($rs)) {
                                                            ?>
                                                                <tr>
                                                                    <td scope="col"><?php echo $res["product_name"]; ?></td>
                                                                    <td>


                                                                        <input type="number" style="width: 50px;" onchange="return NumbersOnly(event);" min="1" max="5" require name="txtQty" class="Quantity" ids="<?php echo $res["cart_id"]; ?>" price="<?php echo $res["price"]; ?>" value="<?php echo $res["quantity"]; ?>" id="txtQty" onkeypress="return ValidateQty('txtQty');" class="in_number">

                                                                    </td>
                                                                    <td><?php echo "&#8377 " . $res["price"]; ?></td>
                                                                    <td>&#8377<span id="<?php echo $res["cart_id"] ?>"> <?php $v = $res["quantity"] * $res["price"];
                                                                                                                        echo (int)$v; ?></span>
                                                                        <?php //echo " " . $res["price"]; 
                                                                        ?>
                                                                    </td>

                                                                    <td><a href="?DIDCart=<?php echo $res["cart_id"];
                                                                                            ?>"><i class="fa-solid fa-trash"></i></a></td>
                                                                </tr>

                                                            <?php
                                                                $total += $res["total_amount"];
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td colspan="4"></td>
                                                                <td align="center"><b>Total Cost : <br>&#8377
                                                                        <span id="tamount" price=<?php echo $total; ?>>
                                                                            <?php echo $total; ?>
                                                                        </span> </b></td>
                                                                <td colspan="1"></td>
                                                            </tr>
                                                        <?php
                                                        if (isset($total)) {
                                                            $_SESSION["total"] = $total;
                                                        }
                                                    } else {
                                                        echo "Your shopping cart is empty";
                                                    }
                                                        ?>


                                                        </tbody>
                                                    </table>
                                                    <div class="form_btn">
                                                        <?php
                                                        if (isset($_SESSION["UserID"])) {
                                                        ?>
                                                            <a href="shopping_cart.php"><input type="submit" class="btn_log" value="Check Out With"></a>

                                                        <?php } else {
                                                        ?>
                                                            <!-- <input type="button" class="btn btn-primary" value="Check Out With" name="btnCheckOut" data-toggle="modal" data-target="#myModal1"> -->
                                                            <input type="button" class="btn btn-primary" value="Check Out With" name="btnCheckOut" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">


                                                        <?php
                                                            $_SESSION["urlCart"] = $_SERVER['REQUEST_URI'];
                                                        }
                                                        ?>

                                                    </div>
                                            </div>








                                        </div>


                                    </div>
                                </div>
                            </div>
                        </form>

                        <script type="text/javascript">
                            $("#exampleModalToggle1").modal("show").on("shown", function() {
                                window.setTimeout(function() {
                                    $("#exampleModalToggle1").modal("hide");
                                }, 3000);
                            });
                        </script>




                    </div>


                </div>

            </div>
        </div>

    </header>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".Quantity").change(function() {
                var id = $(this).attr("ids");
                var price = $(this).attr("price");
                // var dis = $(this).attr("dis");
                var qty = $(this).val();
                var tprice = $("#tamount").attr("price");
                $.ajax({
                    url: "UpdateQuantity.php",
                    method: "post",
                    data: {
                        id: id,
                        qty: qty
                    },
                    success: function(data) {
                        var price1 = qty * price;
                        // var price2 = price1 - (price1 * dis / 100);
                        var price3 = parseInt(price1);
                        $("#" + id).html(price3);
                        $("#tamount").html(data);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#btnc").click(function(e) {
                if ($("#rdColor").val() == "" || ("#rdColor").val() == NULL) {
                    e.preventDefault();
                    alert("select color");
                }
            });

            $(".rddiv").click(function() {
                var color = $(this).attr("id");
                $("#rdColor").val(color);
                $(".rddiv").css('border', 'none');
                var id = '#' + color;
                $(id).css('border', '3px solid #00ff00');

                //alert($("#rdColor").val());
                //alert($(this).attr("id"));

            });
        });
    </script>

    <!-- ---------header end ---------------->




</body>

</html>