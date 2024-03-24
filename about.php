<!DOCTYPE html>
<html lang="en">

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

    <div class="center-body">

        <div class="loader-square"></div>

    </div>
    <!-- scroll header and scroll rocket and loader  end------------------ -->
    <!-------------------- header start---------------------- -->
    <?php
    include_once './header.php';
    ?>
    <!-------------------- header end---------------------- -->

    <!-- ---------------About Hade section  start------------------- -->

    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img ">
        <div class="about_content_parent">
            <div class="about_cotent">
                <h1>About US</h1>
                <p class="text-center">Home / <a href="#">About Us</a></p>
            </div>
        </div>
    </div>


    <!-- ---------------About Hade section  End------------------- -->
    <!-- ---------------About Hade image  Start------------------- -->
    <div class="spacer_y">

        <div class="container">

            <div class="about_first_img">
                <a href="#"><img src="./imgae/about-us-1.jpg" alt=""></a>
            </div>

        </div>
    </div>
    <!-- ---------------About Hade image  end------------------- -->


    <!-- ---------------Great Design  start------------------- -->
    <div class="spacer_y">
        <div class="container">
            <h1 class="text-center" style="color: var(background-color); font-weight: 400; font-size: 45px;">Great
                Design For All
            </h1>
            <h4 class="text-center mt-3" style="color:#98929f; font-weight: 400;">At Ruper, we create affordable designs
                for the modern home
            </h4>
            <div class="em-bar">
                <div class="em_bar_bg">

                </div>
            </div>

            <div class="row pt-5 g-0">
                <div class="col-md-6  col-sm-12">
                    <div class="about_img_side">
                        <img src="./imgae/about-us-2.jpg" alt="" class="w-100 h-100">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="about_content_side" style="background-color: #94856C; padding:70px">
                        <div class="about_content_all">
                            <div class="about_content_icon">
                                <i class="fa-solid fa-pen-ruler"></i>
                            </div>
                            <a href="#">
                                <h1>Designs You Desire</h1>
                            </a>
                            <p>We love creating furniture you want and will love for years to come. Our designs feature
                                a fusion of unique styles that inspire us – from mid-century modern to contemporary.</p>
                            <a href="faq.php" class="banner_button"><span>Read More</span></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------Great Design  End------------------- -->

    <!-- ---------------------Icon Part Start--------------- -->
    <div class="spacer_y">
        <div class="container">
            <div class="row">
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
    </div>
    <!-- ---------------------Icon Part End--------------- -->

    <!-- ------------qlty-------------------- -->
    <div class="spacer_y">
        <div class="container">
            <div class="row pt-5 g-0">

                <div class="col-md-6  col-sm-12 ">
                    <div class="about_content_side" style="background-color: #4c5365;">
                        <div class="about_content_all">
                            <div class="about_content_icon">
                                <i class="fa-solid fa-snowflake"></i>
                            </div>
                            <a href="#">
                                <h1>Quality At Every Step
                                </h1>
                            </a>
                            <p style="margin-top: 10px;">Rest easy. From choice materials and expert hands, to precision
                                tools and tests, we
                                ensure your product is made of hardy stuff
                            </p>
                            <a href="faq.php" class="banner_button"><span>Read More</span></a>

                        </div>
                    </div>
                </div>
                <div class="col-md-6  col-sm-12 ">
                    <div class="about_img_side">
                        <img src="./imgae/about-us-3.jpg" alt="" class="w-100 h-100">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------qlty-------------------- -->
    <!-- ---------------------Client Part Start--------------- -->
    <div class="spacer_y">
        <div class="container">
            <div class="owl-carousel owl-theme slider2">
                <?php
                $strF = "SELECT * FROM tbl_feedback";
                $rsF = mysqli_query($conn, $strF) or mysqli_error($conn);

                while ($resF = mysqli_fetch_array($rsF)) {
                ?>
                    <div class="box2">

                        <div class="star">
                            <?php
                            $strFeed = "select avg(rating) as rating from tbl_feedback";
                            $rsFeed = mysqli_query($conn, $strFeed) or mysqli_error($conn);
                            $resFeed = mysqli_fetch_array($rsFeed);
                            $Val = $resFeed["rating"];
                            for ($i = 1; $i <= 5; $i++) {
                                if ($Val < $i) {
                            ?>
                                    <i class="fa fa-star" style="color: #353535;"></i>
                                <?php
                                } else { ?>
                                    <i class="fa fa-star" style="color: #FFC107;"></i>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="letter">
                            <h1><?php echo $resF['review']; ?></h1>
                        </div>
                        <?php
                        $userid = $resF['user_id'];

                        $str = "SELECT * FROM tbluser WHERE user_id = $userid";
                        $rs = mysqli_query($conn, $str) or mysqli_error($conn);
                        $res = mysqli_fetch_array($rs);

                        if (!is_null($res)) {
                            $imgname = $res['img_url'];
                        ?>

                            <div class="client_box">
                                <img src="<?php echo $imgname; ?>" alt="" srcset="">
                            </div>
                            <p><?php echo $resF['name']; ?></p>


                    </div>
            <?php
                        }
                    }

            ?>
            </div>
        </div>
    </div>
    <!-- ---------------------Client Part End--------------- -->
    <!-- ---------------------About coumpny icon start--------------- -->
    <div class="spacer_y">
        <div class="container">
            <!-- <div class="flex space-15 "> -->
            <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5 justify-content-center">
                <div class="col">
                    <div class="services_item">
                        <div class="services_box">
                            <img src="./imgae/brand1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col">

                    <div class="services_item">
                        <div class="services_box">
                            <img src="./imgae/brand2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col">

                    <div class="services_item">
                        <div class="services_box">
                            <img src="./imgae/brand3.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col">

                    <div class="services_item">
                        <div class="services_box">
                            <img src="./imgae/brand4.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col">

                    <div class="services_item">
                        <div class="services_box">
                            <img src="./imgae/brand5.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>


            <!-- </div> -->
        </div>
    </div>
    <!-- ---------------------About coumpny icon End--------------- -->

    <!-- ---------------------Footer Part Start--------------- -->

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
    <!-- <script src="js/kursor.js"></script> -->
    <!-- <script src="js/veldation.js"></script> -->
    <script src="js/veldation.js"></script>
    <!-- <script src="js/cursor_custom.js"></script> -->
    <script src="js/loadmorebtn.js"></script>
    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->



</body>

</html>