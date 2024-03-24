<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'connection.php';
    include_once 'link.php';
    extract($_REQUEST);

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
    <?php
    include_once 'header.php';
    if(isset($btnRequest))
    {
        $strUser="select email from tbluser where user_id=".$_SESSION["UserID"];
        $rsUser=mysqli_query($conn,$strUser) or die(mysqli_error($conn));
        $resUser=mysqli_fetch_array($rsUser);

        $strReq="insert into tbl_designer_requirement values(null,".$_SESSION["UserID"].",'$txtSubject','$txtDescription',$txtBudget,now(),'".$resUser["email"]."',1)";
        mysqli_query($conn,$strReq) or die(mysqli_error($conn));
    }
    ?>
    <!-- header end-------------------- -->
    <!-- ---------------Designer section  start------------------- -->

    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img ">
        <div class="about_content_parent">
            <div class="about_cotent">
                <h1>Interior Designer </h1>
                <p class="text-center">Designer / <a href="#">Interior Designer </a></p>
            </div>
        </div>
    </div>


    <!-- ---------------Designer section  End------------------- -->
    <!-- -----------------Designer form start---------------------- -->

    <div class="spacer_y">
        <div class="container">
            <div class="row g-0">
                <div class="col-sm-12 col-md-6">
                    <div class="designer_img">
                        <img src="./imgae/designer1.jpg" alt="" class="w-100 h-100">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="designer_form ">
                        <h4>
                            Offers a quick and easy way to book Interior Designer online
                        </h4>

                        <form class="designer_submit" id="design_form" method="post">
                            <div class="row">
                                <div class="col-12 ">
                                    <input type="text" class="form-control your_sub" name="txtSubject" placeholder="Your Subject">


                                    <span class="err ">Please Enter Your Subject</span>
                                </div>
                                <div class="col-12">
                                    <textarea cols="30" rows="3" placeholder="Your Description" name="txtDescription" class="your_descr"></textarea>
                                    <span class="err">Please Enter Your Description</span>

                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control your_bud"  name="txtBudget" placeholder="Your Budget">
                                    <span class="err">Please Enter Your Budget</span>

                                </div>
                                <?php if (isset($_SESSION["UserID"])) {
                                ?>

                                    <div class="form_btn">
                                        <input type="submit" class="btn_log" name="btnRequest" value="Submit">

                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="form_btn">
                                        <input type="submit" class="btn_log" value="Submit">

                                    </div>

                            </div>
                            <div class="col-12">
                                <div class="designer_note">
                                    <p>Note : For book Interior you must have Sign in and Your Account.</p>

                                </div>
                            </div>
                        <?php } ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- -----------------Designer form end---------------------- -->

    <!-- designer header start---------------------------------- -->
    <div class="spacer_y">
        <div class="container">
            <div class="row row-cols-auto   justify-content-center  text-center ">

                <div class="designer_header">
                    <a href="designer.php">Interior Design</a>
                    <a href="how to work.php">How it Works</a>
                    <a href="designer_gallery.php">Designer Gallery</a>
                    <a href="InteriorRegistration.php">Become a Interior</a>

                </div>

            </div>
        </div>
    </div>
    <!-- designer header end---------------------------------- -->
    <!-- why wooden street start-------------------------------- -->
    <div class="spacer_y">
        <div class="container">
            <h1 class="text-center" style="color: #868686; font-weight: 400; font-size: 45px;">Why Wood DEPOT</h1>
            <div class="em-bar">
                <div class="em_bar_bg">

                </div>
            </div>



            <!-- ------------------first step start---------------------------------------- -->
            <div class="row g-0 mt-5">
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_img">
                        <img src="./imgae/w1.jpg" alt="" class="w-100 h-100 responsive">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_content" style="background-color: #c3ad92;">
                        <h1 class="head_step">01</h1>
                        <h3>Consultation with
                            Experts </h3>
                        <p>Get in touch with our team of professional Interior Designers and Experienced Contractors
                            for the best tips and suggestions.
                            Consulting services generally fall under the domain of professional services, as
                            contingent work. A consultant is employed or involved in giving professional advice to
                            the public or to those practicing the profession
                        </p>

                    </div>
                </div>
            </div>
            <!-- ------------------first step end---------------------------------------- -->

            <!-- ------------------secound step start------------------ -->
            <div class="row g-0 mt-5">

                <div class="col-sm-12 col-md-6">
                    <div class="first_step_content" style="background-color: #D1B588;">
                        <h1 class="head_step">02</h1>
                        <h3>Affordable
                            Prices </h3>
                        <p>There is room for every single style and budget, with no compromise on quality standards.
                        </p>

                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_img">
                        <img src="./imgae/w2.jpeg" alt="" class="w-100 h-100 responsive">
                    </div>
                </div>
            </div>
            <!-- ------------------secound step end------------------ -->


            <!-- ------------------third step start---------------------------------------- -->
            <div class="row g-0 mt-5">
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_img">
                        <img src="./imgae/w3.jpg" alt="" class="w-100 h-100 responsive">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_content" style="background-color: #c3ad92;">
                        <h1 class="head_step">03</h1>
                        <h3>Co-Design
                            Concept </h3>
                        <p>Get involved with our experts in the design process. Your inputs are invaluable to us.
                            Participatory design is an approach to design attempting to actively involve all
                            stakeholders in the design process to help ensure the result meets their needs and is
                            usable.
                        </p>

                    </div>
                </div>
            </div>
            <!-- ------------------third step end---------------------------------------- -->

            <!-- ------------------fourth step start------------------ -->
            <div class="row g-0 mt-5">

                <div class="col-sm-12 col-md-6">
                    <div class="first_step_content" style="background-color: #D1B588;">
                        <h1 class="head_step">04</h1>
                        <h3>Tailor-Made
                            Solutions</h3>
                        <p>We bring customization to your fingertips, so you get a personalized touch in your dream
                            home.
                            The seventeenth century, in both Southern and Northern Europe, was characterized by
                            opulent, often gilded Baroque designs. The nineteenth century is usually defined by
                            revival styles.
                        </p>

                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_img">
                        <img src="./imgae/w4.jpg" alt="" class="w-100 h-100 responsive">
                    </div>
                </div>
            </div>
            <!-- ------------------fourth step end------------------ -->

        </div>
    </div>

    <!-- why wooden street end-------------------------------- -->


    <!-- -----------our services --------------------------- -->
    <div class="container">
        <h1 class="text-center" style="color: #868686; font-weight: 400; font-size: 45px;">Our Facility</h1>
        <div class="em-bar mb-5">
            <div class="em_bar_bg">

            </div>
        </div>



        <div class="row ">
            <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                <div class="icon_box">
                    <div class="btn-3 hover-border-3">
                        <div class="icon_services text-center icon_animation">
                            <i class="fa-solid fa-truck-fast"></i>
                        </div>
                        <h2>Free Shipping</h2>
                        <p class="text-center" style="color:#868686">You will love at great low prices</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                <div class="icon_box">
                    <div class="btn-3 hover-border-3">
                        <div class="icon_services text-center icon_animation">
                            <i class="fa-solid fa-money-check-dollar"></i>
                        </div>
                        <h2>Flexible Payment</h2>
                        <p class="text-center" style="color:#868686">Pay with Multiple Credit Cards</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                <div class="icon_box">
                    <div class="btn-3 hover-border-3">

                    <div class="icon_services text-center  icon_animation">
                                <i class="fa-solid fa-droplet"></i>

                            </div>
                            <h2>Colour Selection</h2>
                            <p class="text-center" style="color:#868686">You will select product colour.</p>
                        </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12 mt-3">
                <div class="icon_box">
                    <div class="btn-3 hover-border-3">

                        <div class="icon_services text-center icon_animation">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <h2>Online Support</h2>
                        <p class="text-center" style="color:#868686">24 hours a day, 7 days a week</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- -----------our services --------------------------- -->





    <!-- ---------------------Footer Part Start--------------- -->
    <!-- <div class="spacer_y"> -->
    <?php
    include_once 'footer.php';
    ?>
    <!-- ---------------------Footer Part End--------------- -->

<!-- 
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/kursor.js"></script>
    <script src="js/veldation.js"></script>
    <script src="js/cursor_custom.js"></script> -->




</body>

</html>