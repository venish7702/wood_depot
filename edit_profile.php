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
    <!-- header start-------------------- -->
    <?php
    include_once 'connection.php';
    include_once './header.php';   
    SessionCheck();
    extract($_REQUEST);

    ?>
    <!-- header end-------------------- -->
    <!-- ---------------cotect Hade section  start------------------- -->

    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img responsive ">
        <div class="about_content_parent">

            <div class="about_cotent">
                <h1>Edit Profile</h1>
                <p class="text-center">Profile / <a href="#">Edit Profile</a></p>
            </div>
        </div>
    </div>


    <!-- ---------------contect Hade section  End------------------- -->

    <!-- -----------------profile page start--------------------- -->
    <div class="spacer_y">
        <div class="container">

            <div class="row  ">
                <?php
                $str = "select * from tbluser where user_id=" . $_SESSION["UserID"];
                $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                while ($res = mysqli_fetch_array($rs)) {
                ?>

                <!-- <form class="edit_form" method="post" enctype="multipart/form-data"> -->
                <div class="col-sm-12 col-md-6 col-lg-4 ">
                    <div class="edit_profile_img_side ">
                        <?php
                        $imgName = $res["img_url"];
                        ?>
                        <img src="<?php echo $imgName; 
                                    ?>" alt="" class="responsive">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-8 ">
                    <form class="edit_form" method="post" enctype="multipart/form-data">
                        <?php
                        if (isset($btnSave)) {
                            $fileName = $hdnName;
                            if (!empty($_FILES["txtFile"]["name"])) {
                                // if (file_exists("Uploadfile/$fileName")) {
                                //     unlink("Uploadfile/$fileName");
                                // }

                                $fileName = "uploads/" . $_FILES["txtFile"]["name"];
                               
                            }
                            $strUp = "update tbluser set first_name='$txtFirstName',last_name='$txtLastName',email='$txtEmail',contact_no='$txtContact',gender='$rd',dob='$txtDOB',img_url='$fileName' where user_id=" . $_SESSION["UserID"];
                            move_uploaded_file($_FILES["txtFile"]["tmp_name"], "'C:\wamp\www\Bootstrap Website\uploads/'.$fileName");
                            mysqli_query($conn, $strUp) or die(mysqli_error($conn));
                            // header("location:profile.php");
                            $url="profile.php";
                            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
                        }
                        if (isset($txtFirstName)) {
                            $_SESSION["FirstName"] = $txtFirstName;
                        }
                        if (isset($txtLastName)) {
                            $_SESSION["LastName"] = $txtLastName;
                        }
                        ?>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <input type="text" class="form-control edit_first_name " name="txtFirstName" placeholder="First Name" value="<?php echo $res["first_name"]; 
                                                                                                                                                ?>">
                                <span class="err ">Please Enter First Name</span>


                            </div>
                            <div class="col-sm-12 col-md-6">
                                <input type="text" class="form-control edit_last_name" name="txtLastName" placeholder="Last Name" value="<?php echo $res["last_name"]; 
                                                                                                                                            ?>">
                                <span class="err ">Please Enter Last Name</span>



                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control edit_email" name="txtEmail" placeholder="Email" value="<?php echo $res["email"]; ?>">
                                <span class="err ">Please Enter Velid Email</span>



                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control edit_contect" name="txtContact" placeholder="Contect No" value="<?php echo $res["contact_no"]; 
                                                                                                                                        ?>">
                                <span class="err ">Please Enter Velid Contect Number</span>



                            </div>
                            <div class="col-12 ">
                                <div class="wrapper form-control">
                                    <input type="radio" name="rd" id="option-3" value="male" class="edit_r_gen" <?php if ($res["gender"] == "male") { echo "checked";} ?>>
                                    <!-- <span class="edit_err">plese Enter gender</span> -->

                                    <input type="radio" name="rd" id="option-4" value="female" class="edit_r_gen" <?php if ($res["gender"] == "female") {echo "checked";}?>>


                                    <label for="option-3" class="option option-3">
                                        <div class="dot"></div>
                                        <span>Male</span>
                                    </label>
                                    <label for="option-4" class="option option-4">
                                        <div class="dot"></div>
                                        <span>Female</span>
                                    </label>
                                </div>
                                <div class="edit_err">
                                    <span> plese Enter gender</span>
                                </div>
                            </div>

                            <div class="col-12">
                                <input type="date" class="form-control dob_date" name="txtDOB" value="<?php echo $res["dob"]; 
                                                                                                        ?>">
                                <span class="err">Plese Enter Date Of Birth</span>


                            </div>
                            <div class="col-12">
                             <input type="file" name="txtFile"><input type="hidden" name="hdnName" value="<?php echo $res["img_url"]; 
                            //   class="form-control edit_file"                                                                                                                    ?>">
                                <!-- <span class="err">Plese Enter Img</span> -->



                            </div>
                            <div class="col-12">
                                <div class="form_btn">
                                    <!-- <a href="profile.php"  class="edit_form_btn" name="btnSave" value="Save">save</a> -->
                                    <input type="submit" class="edit_form_btn" name="btnSave" value="Save">
                                    <?php
                                    // if (isset($btnSave)) {
                                    //     echo '<script>alert("updated")</script>';
                                    // }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- </form> -->
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

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/include-html.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/veldation.js"></script>
    <script src="js/kursor.js"></script>
    <script src="js/cursor_custom.js"></script>



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