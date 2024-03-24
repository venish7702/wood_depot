<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Ruper</title>
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
    include_once './header.php';
    ?>
    <!-- header end-------------------- -->

    <!-- ---------------blog Hade section  start------------------- -->

    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img  responsive">
        <div class="about_content_parent">
            <div class="about_cotent">
                <h1>Pricing</h1>
                <p class="text-center">Home / <a href="#">package</a></p>
            </div>
        </div>
    </div>



    <!-- ---------------blog Hade section  End------------------- -->
    <!-- ----------------------------pricing part start---------------- -->



    <div class="spacer_y">
        <div class="container back_pricing">

            <h1 class="d-flex justify-content-center">package</h1>
            <h3 class="d-flex justify-content-center text-center">The right package for you, whoever you are</h3>

            <div class="em-bar">
                <div class="em_bar_bg"></div>
                <div class="row ">
                    <div class="col-12 d-flex justify-content-end">
                        <div class="price-toggler">
                            <span class="month active">Mounthly</span>
                            <!-- <span class="year">Yearly</span> -->
                        </div>
                    </div> 
                </div>

                <div class="row d-flex align-items-center justify-content-center ">
                    <?php
                    $str = "select * from tbl_package";
                    $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                    while ($res = mysqli_fetch_array($rs)) {
                    ?>



                        <div class="col-lg-4 mt-5 col-md-6 col-sm-12" id="counters_1"> 
                            <div class="pricing_main">
                                <div class="pricing_card_content  text-center">
                                <img src="./<?php echo $res["image_url"] ?>" class="rounded-circle" style="width: 80px;height: 80px;">
                                    <h2><?php echo $res["package_name"] ?></h2>
                                    <div class="price month"><span class="rupiyo">₹</span><span class="counter price_design" data-TargetNum="<?php  echo $res["price"] ?>" data-Speed="5000"><?php echo "Price | " . "Rs " . $res["price"] ?></span><span class="mounth">/Mounth
                                    </div>
                                    <!-- <div class="price year"><span class="rupiyo">₹</span><span class="counter price_design " data-TargetNum="50000" data-Speed="5000">5000</span><span class="mounth">/Year
                                    </div> -->



                                </div>
                                <div class="pricing_card_detail text-center">
                                    <p><?php echo $res["duration"] . " Month"; ?></p>
                                    <p><?php echo $res["description"] ?></p>
                                    <!-- <p>1000 request per day</p>
                                    <p>20000 users</p> -->
                                </div>
                                <a href="TxnTestPackage.php?PackID=<?php echo $res["package_id"]; ?>" class="banner_button purches_card"><span>Purches Now</span></a>

                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- <div class="col-lg-4 mt-5    col-md-6 col-sm-12" id="counters_1">
                        <div class="pricing_main">
                            <div class="pricing_card_content  text-center">
                                <h2>Standard</h2>
                                <div class="price month"><span class="rupiyo">₹</span><span class="counter price_design" data-TargetNum="8000" data-Speed="5000">8000</span><span class="mounth">/Mounth
                                </div>
                                <div class="price year"><span class="rupiyo">₹</span><span class="counter  price_design" data-TargetNum="50000" data-Speed="5000">5000</span><span class="mounth">/Year
                                </div>



                            </div>
                            <div class="pricing_card_detail text-center">
                                <p>2 team members</p>
                                <p>2GB storage</p>
                                <p>1000 request per day</p>
                                <p>20000 users</p>
                            </div>
                            <a href="txt_cmd.php" class="banner_button purches_card"><span>Purches Now</span></a>

                        </div>
                    </div> -->


                    <!-- <div class="col-lg-4 mt-5    col-md-6 col-sm-12" id="counters_1">
                        <div class="pricing_main">
                            <div class="pricing_card_content  text-center">
                                <h2>Premium</h2>
                                <div class="price month"><span class="rupiyo">₹</span><span class="counter price_design" data-TargetNum="8000" data-Speed="5000">8000</span><span class="mounth">/Mounth
                                </div>
                                <div class="price year"><span class="rupiyo">₹</span><span class="counter  price_design" data-TargetNum="50000" data-Speed="5000">5000</span><span class="mounth">/Year
                                </div>



                            </div>
                            <div class="pricing_card_detail text-center ">
                                <div class="month">
                                    <p>2 team members</p>
                                    <p>2GB storage</p>
                                    <p>1000 request per day</p>
                                    <p>20000 users</p>
                                </div>
                            </div>
                            <div class="pricing_card_detail text-center ">

                                <div class="year">
                                    <p>2 team members</p>
                                    <p>2GB============e</p>
                                    <p>1000 request per day</p>
                                    <p>20000 users</p>
                                </div>
                            </div>
                            <a href="#" class="banner_button purches_card"><span>Purches Now</span></a>

                        </div>
                    </div> -->
                </div>
            </div>
        </div>


        <!-- ----------------------------pricing part end---------------- -->

        <!-- ---------------------Footer Part Start--------------- -->
        <!-- <div class="spacer_y"> -->
        <?php
        include_once 'footer.php';

        ?>
    </div>
    <!-- ---------------------Footer Part End--------------- -->

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/kursor.js"></script>
    <script src="js/multi-animated-counter.js"></script>
    <script src="js/veldation.js"></script>
    <script src="js/cursor_custom.js"></script>



    <script>
        let month = document.querySelector('.price-toggler .month');
        let year = document.querySelector('.price-toggler .year');
        let monthAmount = document.querySelectorAll('.pricing_main .pricing_card_content .month');
        let yearAmount = document.querySelectorAll('.pricing_main .pricing_card_content .year');

        let mounthDetail = document.querySelectorAll('.pricing_card_detail .month');
        let yearDetail = document.querySelectorAll('.pricing_card_detail .year');

        year.onclick = () => {
            year.classList.add('active');
            month.classList.remove('active');


            monthAmount.forEach(mo => {
                mo.style.display = 'none'
            });
            yearAmount.forEach(yr => {
                yr.style.display = 'block'
            });
            mounthDetail.forEach(mo => {
                mo.style.display = 'none'
            });
            yearDetail.forEach(yr => {
                yr.style.display = 'block'
            });

        };

        month.onclick = () => {
            year.classList.remove('active');
            month.classList.add('active');

            monthAmount.forEach(mo => {
                mo.style.display = 'block'
            });
            yearAmount.forEach(yr => {
                yr.style.display = 'none'
            });
            mounthDetail.forEach(mo => {
                mo.style.display = 'block'
            });
            yearDetail.forEach(yr => {
                yr.style.display = 'none'
            });
        };
    </script>


</body>

</html>