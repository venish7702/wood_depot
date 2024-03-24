<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'link.php';
    include_once 'connection.php';
    extract($_REQUEST);
    if (isset($btnPassword)) {
        $strsel = "select password from tbluser where user_id=" . $_SESSION["UserID"];
        $strrs = mysqli_query($conn, $strsel) or die(mysqli_error($conn));
        $strres = mysqli_fetch_array($strrs);
        $pwd = base64_encode($txtPwd);
        $pwdNew = base64_encode($txtNewPwd);
        $pwdCon = base64_encode($txtConPwd);
        if ($pwd == $strres["password"]) {
            if ($pwdNew == $pwdCon) {
                $strup = "update tbluser set password='$pwdNew' where user_id=" . $_SESSION["UserID"];
                $strrs = mysqli_query($conn, $strup) or die(mysqli_error($conn));
                echo "<script>alert('password change successfully')</script>";
            } else {
                echo "<script>alert('New Password and Confirm Password is not match...')</script>";
            }
        } else {
            echo "<script>alert('current password is not correct.....')</script>";
        }
    }
    ?>

</head>

<body>
    <!-- scroll header and scroll rocket and loader  start------------------ -->
    <div class="scroll_top">
        <i class="fa-solid fa-shuttle-space"></i>
    </div>

    <div class="center-body">

        <div class="loader-square"></div>

    </div>
    <!-- scroll header and scroll rocket and loader  end------------------ -->
    <!-- header start-------------------- -->
    <?php
    include_once './header.php';
    ?>
    <!-- header end-------------------- -->
    <!-- ---------------cotect Hade section  start------------------- -->

    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img responsive ">

        <div class="about_content_parent">
            <div class="about_cotent">
                <h1>Chang Password</h1>
                <p class="text-center">Setting / <a href="#">Chang Password</a></p>
            </div>
        </div>
    </div>


    <!-- ---------------contect Hade section  End------------------- -->
    <div class="spacer_y">
        <div class="container">
            <div class="row g-0">
                <div class="col-sm-12 col-md-6">

                    <div class="chang_password_img">
                        <img src="./imgae/chang_password_3.jpg" alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="chang_password_content">
                        <h2>Change Password</h2>
                        <p>Let's set up your Password</p>
                        <form class="chang_password_form" id="chang_password_form" method="post">
                            <div class="row">
                                <div class="col-12 ">
                                    <input type="password" class="form-control current_password" name="txtPwd" placeholder="Current Password">


                                    <span class="err ">Please Enter Current Password</span>
                                </div>

                                <div class="col-12">
                                    <input type="password" class="form-control new_password" name="txtNewPwd" placeholder="New Password">
                                    <span class="err">Please Enter New Password</span>

                                </div>
                                <div class="col-12">
                                    <input type="password" class="form-control confirm_password" name="txtConPwd" placeholder="Confirm Password">
                                    <span class="err">Please Enter Confirm Password</span>

                                </div>


                                <div class="form_btn">
                                    <input type="submit" class="btn_save" name="btnPassword" value="Save">


                                </div>

                            </div>

                        </form>
                    </div>



                </div>
            </div>





        </div>
    </div>




    <!-- ---------------------Footer Part Start--------------- -->
    <!-- <div class="spacer_y"> -->
    <?php
    include_once 'footer.php';

    ?>
    <!-- ---------------------Footer Part End--------------- -->

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/include-html.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/kursor.js"></script>
    <!-- <script src="js/veldation.js"></script> -->
    <script src="js/veldation.js"></script>
    <script src="js/cursor_custom.js"></script>
    <script src="js/loadmorebtn.js"></script>
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->








</body>

</html>