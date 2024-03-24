<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Ruper</title>
    


    <!-- link -->
    <?php include_once 'link.php';
    include_once 'connection.php';
    extract($_REQUEST);
    if (isset($PID)) {
        $_SESSION["PID"] = $PID;
    }
    if (isset($btnAddToCart)) {
        $string = exec('getmac');
        $mac = substr($string, 0, 17);

        $strSel = "select * from tbl_product where product_id=" . $_SESSION["PID"];
        $rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
        $resSel = mysqli_fetch_array($rsSel);

        $strP = "select * from tbl_cart where product_id=" . $_SESSION["PID"];
        $rsP = mysqli_query($conn, $strP) or die(mysqli_error($conn));
        $resP = mysqli_fetch_array($rsP);

        if (mysqli_num_rows($rsP) > 0) {
            $Qty = $resP["quantity"] + 1;
            $x = $Qty * $resSel["price"];
            // $y = $x * $resSel["Discount"] / 100;
            $Amount = $x;
            if (isset($_SESSION["UserID"])) {
                $strUp = "update tbl_cart set quantity=$Qty,total_amount=$Amount where user_id=" . $_SESSION["UserID"] . " and product_id=" . $_SESSION["PID"];
            } else {
                $strUp = "update tbl_cart set quantity=$Qty,total_amount=$Amount where mac_address='$mac' and product_id=" . $_SESSION["PID"];
            }
            mysqli_query($conn, $strUp) or die(mysqli_error($conn));
        } else {
            $x = 1 * $resSel["price"];
            // $y = $x * $resSel["Discount"] / 100;
            $Amount = $x;
            if (isset($_SESSION["UserID"])) {
                $strIns = "insert into tbl_cart values(null," . $_SESSION["UserID"] . "," . $_SESSION["PID"] . ",$rdColor,1," . $resSel["price"] . ",$Amount,now(),'$mac')";
            } else {
                $strIns = "insert into tbl_cart values(null,null," . $_SESSION["PID"] . ",$rdColor,1," . $resSel["price"] . ",$Amount,now(),'$mac')";
            }
            mysqli_query($conn, $strIns) or die(mysqli_error($conn));
        }
        $url = "add_to_cart.php";
        echo "<script type='text/javascript'>document.location.href='{$url}';</script>";

    ?>
        <script>
            $(document).ready(function() {
                $("#btnCart").click();
            });
        </script>
    <?php
    }
    ?>





    <!-- <link rel="stylesheet" href="./css/mode.css"> -->

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
    <!-- header start-------------------- -->
    <?php
    include_once './header.php';
    ?>
    <!-- header end-------------------- -->

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
    <form action="" method="post">

        <div class="spacer_y">
            <div class="container">
                <div class="row g-0">

                    <div class="col-lg-5 col-sm-12">
                        <?php
                        $str = "select p.*,pi.* from tbl_product p,tbl_product_image pi where p.product_id=pi.product_id  and p.product_id=" . $_SESSION["PID"];
                        $rs = mysqli_query($conn, $str) or mysqli_error($conn);
                        while ($res = mysqli_fetch_array($rs)) {
                            $imgName = $res["image_url"];
                        ?>

                            <!-- <img src="<?php echo $imgName; ?>" alt="" srcset="" id="mainimg" class="w-100" > -->
                            <div class="small_img_group  m-auto">

                                <div class="small_img_col">
                                    <img src="<?php echo $imgName; ?>" width=100%; class="small-img" alt="">
                                </div>

                                <div class="small_img_col">
                                    <img src="" width=100%; class="small-img" alt="">
                                </div>


                            </div>
                        <?php }  ?>
                    </div>
                    <?php
                    $STRP = "select p.*,c.category,t.category_type_name from tbl_product p,tblcategory c,tbl_category_type t where p.category_id=c.id and p.category_type_id=t.id and  p.product_id=" . $_SESSION["PID"];
                    $Rsp = mysqli_query($conn, $STRP) or mysqli_error($conn);
                    while ($Resp = mysqli_fetch_array($Rsp)) {
                    ?>

                        <div class="col-lg-7 col-sm-12  p-4">
                            <div class="sub_product_content">
                                <div class="sub_product_head">
                                    <h1><?php echo $Resp["product_name"]; ?></h1>
                                    <?php
                                    $strFeed = "select avg(rating) as rating from tbl_feedback where product_id=" . $_SESSION["PID"];
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
                                    <h4><?php echo "&#8377 " . $Resp["price"]; ?></h4>

                                </div>
                                <div class="sub_product_detail">
                                    <h3>Product Detail</h3>
                                    <p>
                                        <?php echo $Resp["description"]; ?>

                                    </p>
                                </div>

                                <div class="product_color d-flex align-items-center">
                                    <h5>COLOR :</h5>
                                    <div class="color"></div>
                                    <?php
                                    $strColor = "select * from tbl_product_variance where is_active=1 and product_id=" . $_SESSION["PID"];
                                    $rsColor = mysqli_query($conn, $strColor) or mysqli_error($conn);
                                    while ($resColor = mysqli_fetch_array($rsColor)) {
                                    ?>


                                        <label class="rad-label">
                                            <input type="radio" class="rad-input  d-block rddiv" name="rad" style="background-color: <?php echo $resColor["product_color"]; ?>" id="<?php echo $resColor["product_variance_id"]; ?>">
                                            <!-- <div class="rad-design"></div> -->
                                        </label>
                                    <?php } ?>
                                    <!-- <label class="rad-label"> -->
                                    <!-- <input type="radio" class="rad-input d-block" name="rad" style="background-color: #4d4d4d;"> -->
                                    <!-- <div class="rad-design"></div> -->
                                    <!-- </label> -->



                                </div>

                                <div class="add_product">


                                    <!------- Add to cart btn start------ -->

                                    <input type="submit" id="btnc" name="btnAddToCart" class="px-3 align-items-center sub_add_cart" role="button" value="ADD TO CART">

                                    <!------- add to cart btn end------ -->
                                    <input type="hidden" id="rdColor" name="rdColor">



                                </div>



                                <a href="inquiry.php?IID=<?php echo $Resp["product_id"] ?>" class="sub_add_product button" value="Inquiry" align="center">Inquiry</a>




                            </div>
                            <!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating System in PHP & Mysql using Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-5">Review & Rating </h1>
        <div class="card">
            <div class="card-header">Sample Product</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <h1 class="text-warning mt-4 mb-4">
                            <b><span id="average_rating">0.0</span> / 5</b>
                        </h1>
                        <div class="mb-3">
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                        </div>
                        <h3><span id="total_review">0</span> Review</h3>
                    </div>
                    <div class="col-sm-4">
                        <p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
                        <p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
                        <p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
                        <p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
                        <p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
                    </div>
                    <div class="col-sm-4 text-center">
                        <h3 class="mt-4 mb-3">Write Review Here</h3>
                        <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5" id="review_content"></div>
    </div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submit Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                </h4>
                <div class="form-group">
                    <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                </div>
                <div class="form-group">
                    <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
                </div>
                <div class="form-group text-center mt-4">
                    <button type="button" class="btn btn-primary" id="save_review">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .progress-label-left
    {
        float: left;
        margin-left: 0.5em;
        line-height: 1em;
    }
    .progress-label-right
    {
        float: right;
        margin-left: 0.3em;
        line-height: 1em;
    }
    .star-light
    {
        color:#e9ecef;
    }
</style>

<script>
    $(document).ready(function() {
        var rating_data = 0;

        $('#add_review').click(function() {
            $('#review_modal').modal('show');
        });

        $(document).on('mouseenter', '.submit_star', function() {
            var rating = $(this).data('rating');
            reset_background();
            for (var count = 1; count <= rating; count++) {
                $('#submit_star_' + count).addClass('text-warning');
            }
        });

        function reset_background() {
            for (var count = 1; count <= 5; count++) {
                $('#submit_star_' + count).addClass('star-light');
                $('#submit_star_' + count).removeClass('text-warning');
            }
        }

        $(document).on('mouseleave', '.submit_star', function() {
            reset_background();
            for (var count = 1; count <= rating_data; count++) {
                $('#submit_star_' + count).removeClass('star-light');
                $('#submit_star_' + count).addClass('text-warning');
            }
        });

        $(document).on('click', '.submit_star', function() {
            rating_data = $(this).data('rating');
        });

        $('#save_review').click(function() {
            var user_name = $('#user_name').val();
            var user_review = $('#user_review').val();

            if (user_name == '' || user_review == '') {
                alert("Please Fill Both Fields");
                return false;
            } else {
                $.ajax({
                    url: "submit_rating.php",
                    method: "POST",
                    data: {
                        rating_data: rating_data,
                        user_name: user_name,
                        user_review: user_review
                    },
                    success: function(data) {
                        $('#review_modal').modal('hide');
                        load_rating_data();
                        alert(data);
                    }
                });
            }
        });
        

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"submit_rating.php",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

    });


</script>





                        <?php  }  ?>

                        </div>
                </div>
            </div>
        </div>




    </form>





    <!-- --------------------- Products part End--------------- -->









    <!-- ---------------------Footer Part Start--------------- -->
    <!-- <div class="spacer_y"> -->
    <?php
    include_once 'footer.php';

    ?>
    <!-- </div> -->
    <!-- ---------------------Footer Part End--------------- -->
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/include-html.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/veldation.js"></script>
    <script src="js/kursor.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/cursor_custom.js"></script>
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








</body>

</html>