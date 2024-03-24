<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Ruper</title>

    <!-- link -->
    <!-- http://caketheme.com/html/ruper/index2.html -->

    <!-- bootsrap link -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- fontawsome -->
    <link rel="stylesheet" href="./css/all.min.css">
    <!-- slider-->
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- aenimation custom -->
    <link rel="stylesheet" href="./css/aenimation.css">

    <!-- link icon -->
    <link rel="icon" type="image/xicon" href="./imgae/asset 0.png">
    <link rel="stylesheet" href="css/kursor.css">


    <style>
        .color_1 {
            border: 2px solid black;
        }

        .color_2 {
            border: none;
        }
    </style>
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
    <!-- ---------header strat ---------------->
    <?php
    include_once './header.php';
    ?>
    <!-- ---------header end ---------------->

    <!-- -----------shop page start--------------------- -->
    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img responsive ">
        <div class="about_content_parent">

            <div class="about_cotent">
                <h1>Shop</h1>
                <p class="text-center">Home / <a href="#">Shop</a></p>
            </div>
        </div>
    </div>
    <!-- -----------shop page end------------------------ -->


    <!-- --------------------- Products part Start--------------- -->

    <div class="spacer_y">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5 col-sm-12">
                    <img src="./imgae/sub_product1_1.jpg" alt="" srcset="" id="mainimg" class="w-100">
                    <div class="small_img_group  m-auto">

                        <div class="small_img_col">
                            <img src="./imgae/sub_product1_1.jpg" width=100%; class="small-img" alt="">
                        </div>

                        <div class="small_img_col">
                            <img src="./imgae/sub_product1_2.jpg" width=100%; class="small-img" alt="">
                        </div>


                    </div>
                </div>
                <div class="col-lg-7 col-sm-12  p-4">
                    <div class="sub_product_content">
                        <div class="sub_product_head">
                            <h1>Bora Armchair
                            </h1>
                            <h4>$90.00</h4>

                        </div>
                        <div class="sub_product_detail">
                            <h3>Product Detail</h3>
                            <p>
                                Lorem ipsum color sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.


                            </p>
                        </div>
                        <div class="product_color d-flex align-items-center">
                            <h5>COLOR :</h5>
                            <div class="color"></div>
                            <!-- <div class="sub_color " style="background-color:rgb(161, 168, 136) ;" >
                               

                            </div>
                            <div class="sub_color " style="background-color: #4d4d4d;" >

                            </div> -->
                            <!-- <form class="color_readio">
                            <input type="radio" name="radio-group"   class=" green_readio ">
                           
                            <input type="radio"  name="radio-group" class="  black_readio">
                           </form> -->

                            <label class="rad-label">
                                <input type="radio" class="rad-input  d-block" name="rad" style="background-color:rgb(161, 168, 136)  ;">
                                <!-- <div class="rad-design"></div> -->
                            </label>
                            <label class="rad-label">
                                <input type="radio" class="rad-input d-block" name="rad" style="background-color: #4d4d4d;">
                                <!-- <div class="rad-design"></div> -->
                            </label>



                        </div>

                        <div class="add_product">
                            <input type="number" class="number_type text-center" value="1" min="1">

                            <!------- Add to cart btn start------ -->

                            <input type="submit" class="px-3 align-items-center sub_add_cart" data-bs-toggle="modal" href="#exampleModalToggle1" role="button" value="ADD TO CART">

                            <!------- add to cart btn end------ -->

                            <!-- ---add to cart model start------ -->
                            <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalToggle1" aria-hidden="true" id="exampleModalToggle1">
                                <div class="modal-dialog modal-dialog-centered">
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
                                                <table class="table   table-hover table-border text-center " style="line-height: 15px; border: 1px solid #dedede;">
                                                    <thead>
                                                        <tr style="font-size: 15px;">
                                                            <td>Product name</td>
                                                            <td>Quantity</td>
                                                            <td>Price</td>
                                                            <td>Remove</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td scope="col">Sofa</td>
                                                            <td><input type="number" style="width: 50px;"></td>
                                                            <td>200</td>
                                                            <td><a href="#"></a> <i class="fa-solid fa-trash"></i></a></td>
                                                        </tr>
                                                        <tr>


                                                    </tbody>
                                                </table>
                                            </div>


                                            <div class="form_btn">
                                                <input type="submit" class="btn_log" value="Check Out With">


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ---add to cart model end------ -->

                        <input type="submit" class="sub_add_product" value="BUY IT NOW">




                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- --------------------- Products part End--------------- -->

    <!-- -------------rated product start------------------------- -->
    <div class="spacer_y">
        <div class="container">
            <h1 class="text-center" style="color: #868686; font-weight: 400; font-size: 45px;">Rated Products</h1>
            <div class="em-bar">
                <div class="em_bar_bg">

                </div>


                <div class="owl-carousel owl-theme slider3">

                    <div class="col-12  mt-4">
                        <div class="main_box">
                            <div class="pro_img">
                                <img src="./imgae/asset 12.jpeg" alt="">
                                <img src="./imgae/asset 13.jpeg" alt="" class="sec_img">
                                <div class="social_icon justify-content-center w-100">
                                    <i class="fa-solid fa-cart-shopping even add_to_cart"></i>
                                    <i class="fa-regular fa-heart  odd  add_like"></i>
                                    <i class="fa-solid fa-eye even"></i>
                                </div>
                                <div class="hot">
                                    <p class="cool">HOT</p>
                                </div>
                            </div>
                            <div class="datil">

                                <h2>
                                    <a href="#">DINING TABLE</a>
                                </h2>
                                <div class="orignal">
                                    <!-- <p class="first">$65.00</p> -->
                                    <p class="sec">$150.00</p>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="col-12  mt-4">
                        <div class="main_box">
                            <div class="pro_img">
                                <img src="./imgae/asset 14.jpeg" alt="">
                                <img src="./imgae/asset 15.jpeg" alt="" class="sec_img">
                                <div class="social_icon justify-content-center w-100">
                                    <i class="fa-solid fa-cart-shopping even"></i>
                                    <i class="fa-regular fa-heart  odd"></i>
                                    <i class="fa-solid fa-eye even"></i>
                                </div>
                                <div class="hot">
                                    <p class="less">-33%</p>
                                </div>
                            </div>
                            <div class="datil">

                                <h2>
                                    <a href="#">PILLAR DINING TABLE </a>
                                </h2>
                                <div class="orignal">
                                    <p class="first">$65.00</p>
                                    <p class="sec">$55.00</p>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="col-12  mt-4">
                        <div class="main_box">
                            <div class="pro_img">
                                <img src="./imgae/asset 16.jpeg" alt="">
                                <img src="./imgae/asset 17.jpeg" alt="" class="sec_img">
                                <div class="social_icon justify-content-center w-100">
                                    <i class="fa-solid fa-cart-shopping even"></i>
                                    <i class="fa-regular fa-heart  odd"></i>
                                    <i class="fa-solid fa-eye even"></i>
                                </div>
                                <!-- <div class="hot">
                                <p class="less">-33%</p>
                            </div> -->
                            </div>
                            <div class="datil">

                                <h2>
                                    <a href="#">MAGS SOFA 2.5 SEATER</a>
                                </h2>
                                <div class="orignal">
                                    <!-- <p class="first">$65.00</p> -->
                                    <p class="sec">$150.00</p>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="col-12  mt-4">
                        <div class="main_box">
                            <div class="pro_img">
                                <img src="./imgae/asset 18.jpeg" alt="">
                                <img src="./imgae/asset 19.jpeg" alt="" class="sec_img">
                                <div class="social_icon justify-content-center w-100">
                                    <i class="fa-solid fa-cart-shopping even"></i>
                                    <i class="fa-regular fa-heart  odd"></i>
                                    <i class="fa-solid fa-eye even"></i>
                                </div>
                                <div class="hot">
                                    <div class="cool">HOT</div>
                                    <p class="less">-33%</p>
                                </div>
                            </div>
                            <div class="datil">

                                <h2>
                                    <a href="#">SPINNING PENDANT LAMP</a>
                                </h2>
                                <div class="orignal">
                                    <p class="first">$100.00</p>
                                    <p class="sec">$150.00</p>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="col-12  mt-4">
                        <div class="main_box">
                            <div class="pro_img">
                                <img src="./imgae/asset 20.jpeg" alt="">
                                <img src="./imgae/asset 21.jpeg" alt="" class="sec_img">
                                <div class="social_icon justify-content-center w-100">
                                    <i class="fa-solid fa-cart-shopping even"></i>
                                    <i class="fa-regular fa-heart  odd"></i>
                                    <i class="fa-solid fa-eye even"></i>
                                </div>
                                <div class="hot">
                                    <div class="cool">HOT</div>
                                    <p class="less">-33%</p>
                                </div>
                            </div>
                            <div class="datil">

                                <h2>
                                    <a href="#">BORA ARMCHAIR</a>
                                </h2>
                                <div class="orignal">
                                    <p class="first">$100.00</p>
                                    <p class="sec">$90.00</p>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="col-12  mt-4">
                        <div class="main_box">
                            <div class="pro_img">
                                <img src="./imgae/asset 22.jpeg" alt="">
                                <img src="./imgae/asset 23.jpeg" alt="" class="sec_img">
                                <div class="social_icon justify-content-center w-100">
                                    <i class="fa-solid fa-cart-shopping even"></i>
                                    <i class="fa-regular fa-heart  odd"></i>
                                    <i class="fa-solid fa-eye even"></i>
                                </div>
                                <div class="hot">
                                    <div class="cool">HOT</div>
                                    <p class="less">-33%</p>
                                </div>
                            </div>
                            <div class="datil">

                                <h2>
                                    <a href="#">PANTON DINING TABLE </a>
                                </h2>
                                <div class="orignal">
                                    <p class="first">$79.00</p>
                                    <p class="sec">$49.00</p>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="col-12  mt-4">
                        <div class="main_box">
                            <div class="pro_img">
                                <img src="./imgae/asset 24.jpeg" alt="">
                                <img src="./imgae/asset 25.jpeg" alt="" class="sec_img">
                                <div class="social_icon justify-content-center w-100">
                                    <i class="fa-solid fa-cart-shopping even"></i>
                                    <i class="fa-regular fa-heart  odd"></i>
                                    <i class="fa-solid fa-eye even"></i>
                                </div>
                                <!-- <div class="hot">
                                    <div class="cool">HOT</div>
                                    <p class="less">-33%</p>
                                </div> -->
                            </div>
                            <div class="datil">

                                <h2>
                                    <a href="#">KITTCHEN TABLE</a>
                                </h2>
                                <div class="orignal">
                                    <!-- <p class="first">$65.00</p> -->
                                    <p class="sec">$120.00</p>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="col-12  mt-4">
                        <div class="main_box">
                            <div class="pro_img">
                                <img src="./imgae/asset 26.jpeg" alt="">
                                <img src="./imgae/asset 27.jpeg" alt="" class="sec_img">
                                <div class="social_icon justify-content-center w-100">
                                    <i class="fa-solid fa-cart-shopping even"></i>
                                    <i class="fa-regular fa-heart  odd"></i>
                                    <i class="fa-solid fa-eye even"></i>
                                </div>
                                <div class="hot">
                                    <div class="cool">HOT</div>
                                    <p class="less">-33%</p>
                                </div>
                            </div>
                            <div class="datil">

                                <h2>
                                    <a href="#">MUNDO SOFA </a>
                                </h2>
                                <div class="orignal">
                                    <p class="first">$200.00</p>
                                    <p class="sec">$180.00</p>
                                </div>

                            </div>


                        </div>
                    </div>







                </div>
            </div>
        </div>
    </div>
    <!-- -------------rated product end------------------------- -->





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
    <script src="/js/custom.js"></script>
    <script src="js/kursor.js"></script>
    <script src="js/cursor_custom.js"></script>







</body>

</html>