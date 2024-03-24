<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Depot</title>
    <?php
    include_once 'connection.php';

    include_once 'link.php';
    SessionCheck();
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
                <h1>Profile</h1>
                <p class="text-center">Home / <a href="#">Profile</a></p>
            </div>
        </div>
    </div>


    <!-- ---------------contect Hade section  End------------------- -->

    <!-- -----------------profile page start--------------------- -->
    <div class="spacer_y">
        <div class="container">

            <div class="row  g-0">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <?php
                    $str = "select * from tbluser where user_id=" . $_SESSION["UserID"];
                    $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                    while ($res = mysqli_fetch_array($rs)) {
                    ?>
                        <form method="post">

                            <div class="profile_img_side ">
                                <?php
                                $imgName = $res["img_url"];
                                ?>
                                <img src="<?php echo $imgName; ?>" alt="" class="responsive">
                            </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-8">
                    <div class="profile_content">
                        <h2><?php echo $res["first_name"] . " " . $res["last_name"]; ?></h2>
                        <div class="chang_icon_main_box ">
                            <div class="chang_prfile_icon ">
                                <p class=""><i class="fa-solid fa-person-half-dress"></i><?php echo $res["gender"]; ?></p>
                                <p class=""><i class="fa-solid fa-envelope"></i><?php echo $res["email"]; ?></p>
                                <p class=""><i class="fa-solid fa-phone"></i>+<?php echo $res["contact_no"]; ?></p>
                                <p class=""><i class="fa-solid fa-cake-candles"></i><?php echo $res["dob"]; ?></p>

                                <!-- <input type="submit" class="btn_save mt-3" name="submit" value="Save"> -->
                                <a href="edit_profile.php" class="form_btn_edit d-block  edit_profile_btn p-2 mt-5">Edit Profile</a>



                            </div>
                        </div>
                    </div>
                </div>
                </form>
            <?php
                    }
            ?>
            </div>
        </div>
    </div>
    <!-- -----------------profile page end--------------------- -->


    <!-- ---------------------Footer Part Start--------------- -->
    <!-- <div class="spacer_y"> -->
    <?php
    include_once 'footer.php';

    ?>
    <!-- ---------------------Footer Part End--------------- -->





    <!-- <script>
        $(document).ready(function () {
            $('.mob_sub_menu, .mob_main_menu').hide();
                $('.toggle').click(function () {
                $('.mob_main_menu').slideToggle();
                $('.toggle > i').toggleClass('fa-bars , fa-xmark')
            })
            $('.mob_main_menu >  li > a').click(function () {
                $(this).next('.mob_sub_menu').slideToggle();
            })
           
        })

    </script> -->


</body>

</html>