<!DOCTYPE html>
<html lang="en">

<head>


    <?php

    include_once 'link.php';
    ?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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

    <?php

    include_once 'header.php';
    ?>
    <!-- ---------------------Header end--------------- -->

    <!-- ---------------Designer section  start------------------- -->

    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img ">
        <div class="about_content_parent">
            <div class="about_cotent">
                <h1>How It Work</h1>
                <p class="text-center">Designer / <a href="#">How It Work</a></p>
            </div>
        </div>
    </div>


    <!-- ---------------Designer section  End------------------- -->

    <!-- -------first step start--------------------- -->
    <div class="spacer_y">
        <div class="container">
            <div class="row g-0">
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_img">
                        <img src="./imgae/first_step.jpg" alt="" class="w-100 h-100 responsive">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_content" style="background-color: #c3ad92;">
                        <h1 class="head_step">01</h1>
                        <h3>Help us understand
                            your project requirements! </h3>
                        <p>your project requirements!
                            Book your free consultation and welcome home our experts for a complimentary site visit. Our
                            contractors analyze your interior ideas, budget in mind and accordingly navigate the process
                            further.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------first step end------------------ -->
    <!-- ------------------secound step start------------------ -->
    <div class="spacer_y">
        <div class="container">
            <div class="row g-0">

                <div class="col-sm-12 col-md-6">
                    <div class="first_step_content" style="background-color: #D1B588;">
                        <h1 class="head_step">02</h1>
                        <h3>Get to work with a talented
                            & experienced team. </h3>
                        <p>Our team of professional interior design experts, qualified contractors & dedicated project
                            managers work depending upon your style & specific needs maintaining a timely coordination.
                        </p>

                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_img">
                        <img src="./imgae/team.jpg" alt="" class="w-100 h-100 responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------secound step end------------------ -->
    <!-- -------third step start--------------------- -->
    <div class="spacer_y">
        <div class="container">
            <div class="row g-0">
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_img">
                        <img src="./imgae/3dmodal.jpg" alt="" class="w-100 h-100 responsive">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_content" style="background-color: #c3ad92;">
                        <h1 class="head_step">03</h1>
                        <h3>Sharing design concepts till visualizing 3D model</h3>
                        <p>yOur team will ensure to share the appropriate design concept through a combination of
                            elevations, sketches and 3D drawings which will take you to a virtual walkthrough.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------third step end------------------ -->

    <!-- ------------------fourth step start------------------ -->
    <div class="spacer_y">
        <div class="container">
            <div class="row g-0">

                <div class="col-sm-12 col-md-6">
                    <div class="first_step_content" style="background-color: #D1B588;">
                        <h1 class="head_step">04</h1>
                        <h3>Furnishing your Interiors
                            with a personalized touch!</h3>
                        <p>Quality is our priority & we make sure to finalize every asset keeping budget & latest style
                            trends in consideration. </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_img">
                        <img src="./imgae/touch.jpg" alt="" class="w-100 h-100 responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ------------------fourth step end------------------ -->

    <!-- -------fifth step start--------------------- -->
    <div class="spacer_y">
        <div class="container">
            <div class="row g-0">
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_img">
                        <img src="./imgae/timw.jpg" alt="" class="w-100 h-100 responsive">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="first_step_content" style="background-color: #c3ad92;">
                        <h1 class="head_step">05</h1>
                        <h3>Get your dream interior
                            completed on time!</h3>
                        <p>Your project is equally important to us which us why we deliver each project on mentioned
                            timelines & as beautiful as you have always wanted!</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------third step end------------------ -->

    <!-- ---------------------Footer Part Start--------------- -->
    <!-- <div class="spacer_y"> -->
    <?php


    include_once 'footer.php';
    ?>
    <!-- </div> -->
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

    <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> -->

    <script>
        function popupToggle() {
            var popup = document.getElementById('popup');
            {
                popup.classList.toggle('active');

            }
        }
    </script>




</body>

</html>