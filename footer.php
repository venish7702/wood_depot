<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Clean | Ruper</title>

  <?php
    include_once './link.php';
    include_once "./connection.php";
	extract($_REQUEST);
	if(isset($btnSubmit))
	{
		$str="insert into tbl_newsletter values(null,'$txtEmail',now())";
		mysqli_query($conn,$str) or mysqli_error($conn);
	}
  ?>
</head>

<body>
    <!-- ---------------------Footer Part Start--------------- -->
    <!-- <div class="spacer_y"> -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-2 ">
                    <div class="footer_content">
                        <h5 class="mb-4">Links</h5>
                        
                        <p><a href="#">Inquiry</a></p>
                        <p><a href="#">Interior Design</a></p>
                        <p><a href="#">How it Works</a></p>
                        <p><a href="#">Designer Gallery</a></p>
                       
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="footer_content">
                        <h5 class="mb-4">HELP</h5>
                        <p><a href="#">Contact</a></p>
                        <p><a href="#">Faq</a></p>
                        <p><a href="#">Track Your Order</a></p>
                       
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="footer_content">
                        <h5 class="mb-4">SERVICES</h5>
                        <p><a href="#">Free Shipping</a></p>
                        <p><a href="#">Flexible Payment</a></p>
                        <p><a href="#">Colour Selection</a></p>
                        <p><a href="#">Online Support</a></p>
                      
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="footer_content">
                        <h5 class="mb-4">NEWS LATTER</h5>
                        <p>Enter your email below to be the first to know about new collections and product launches.
                        </p>
                        <form action="" class="subscrib" method="post">
                            <input type="text" class="cust_textbox" placeholder="Enter email" name="txtEmail">
                            <button type="submit" class="subscribe__btn" name="btnSubmit">
                                <i class="fa-solid fa-envelope"></i>
                            </button>
                            
                        </form>

                        <!-- <div class="footer_social_icon">
                            <a href="#"> <i class="fa-brands fa-twitter"></i></a>
                            <a href="#"> <i class="fa-brands fa-instagram"></i></a>
                            <a href="#"> <i class="fa-brands fa-behance"></i></a>
                            <a href="#"> <i class="fa-solid fa-basketball"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
            <hr>
            <div class="row ">
                <div class="col-md-6 col-sm-12 text-strat mt-3 ">
                    <p>Copyright © 2022. All Right Reserved</p>
                </div>
                <div class="col-md-6  col-sm-12 text-end mt-3">
                    <div class="footer_logo">
                        <img src="./imgae/asset 32.png" alt="" class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- ---------------------Footer Part End--------------- -->





    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/include-html.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.mob_sub_menu, .mob_main_menu').hide();




            $('.toggle').click(function () {
                $('.mob_main_menu').slideToggle();
                $('.toggle > i').toggleClass('fa-bars , fa-xmark')
            })

            $('.mob_main_menu >  li > a').click(function () {
                $(this).next('.mob_sub_menu').slideToggle();
            })
            $(".slider1").owlCarousel({
                items: 1,
                nav: false,
                autoplay: true,
                autoplayTimeout: 5000,
                animateIn: 'animate__fadeInLeft',
                // animateOut:'animate__fadeOutRight',
                autoplayHoverPause: true,
                loop: true,

            });

            new WOW().init();

            var owl = $('.slider1');
            owl.owlCarousel();
            owl.on('changed.owl.carousel', function (event) {
                new WOW().init();
            })

        })

    </script>
    </script>
</body>

</html>