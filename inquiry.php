<!DOCTYPE html>
<html lang="en">
<?php
include_once 'connection.php';
extract($_REQUEST);
if (isset($btnInquiry)) {
    if (isset($IID)) {
        if (isset($_SESSION["UserID"])) {
            $strIns = "insert into tbl_inquiry values(null,$IID," . $_SESSION["UserID"] . ",null,'$txtSubject','$txtDescription','$txtEmail','$txtContact',now(),0,null,null,null)";
        } else {
            $strIns = "insert into tbl_inquiry values(null,$IID,null,null,'$txtSubject','$txtDescription','$txtEmail','$txtContact',now(),0,null,null,null)";
        }
    } else {
        if (isset($_SESSION["UserID"])) {
            $strIns = "insert into tbl_inquiry values(null,null," . $_SESSION["UserID"] . ",null,'$txtSubject','$txtDescription','$txtEmail','$txtContact',now(),0,null,null,null)";
        } else {
            $strIns = "insert into tbl_inquiry values(null,null,null,null,'$txtSubject','$txtDescription','$txtEmail','$txtContact',now(),0,null,null,null)";
        }
    }
    if(isset($IntID))
	{
		$strIns="insert into tbl_inquiry values(null,null,null,$IntID,'$txtSubject','$txtDescription','$txtEmail','$txtContact',now(),0,null,null,null)";
	}
	
    mysqli_query($conn, $strIns) or die(mysqli_error($conn));
    // echo '<script>alert("inserted")</script>';
    $url = "inquiry.php";
    echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
}


?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry | Depot</title>
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
    include_once './header.php';
    ?>
    <!-- header end-------------------- -->
    <!-- ---------------cotect Hade section  start------------------- -->

    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img responsive ">
        <div class="about_content_parent">

            <div class="about_cotent">
                <h1>Inquiry</h1>
                <p class="text-center">Page / Inquiry<a href="#"></a></p>
            </div>
        </div>
    </div>


    <!-- ---------------contect Hade section  End------------------- -->

    <div class="spacer_y">
        <div class="container">
            <div class="row g-0">
                <div class="col-sm-12 col-md-6">

                    <div class="inquery_img">
                        <img src="./imgae/inquery.jpg" alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="inquery_page_content">
                        <h2>Inquiry</h2>
                        <h4>We're open for any suggestion or just to have a chat</h4>
                        <!-- <p>Let's set up your Password</p> -->
                        <form class="inquery_form" id="inquiry_form_velidation" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 ">
                                    <input type="text" class="form-control  inquery_email" name="txtEmail" placeholder="Email">
                                    <span class="err">Plese Enter Velid Email</span>


                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <input type="text" class="form-control inquery_contect" name="txtContact" placeholder="Contact No">
                                    <span class="err">Please Enter Velid Contact No</span>

                                </div>
                                <div class="col-12">
                                    <input type="text" name="txtSubject" class="form-control  inquery_sub" name="inquery_sub" placeholder="Subject">
                                    <span class="err">Please Enter Your Subject</span>

                                </div>
                                <div class="col-12">
                                    <textarea cols="20" rows="3" placeholder="Discription" name="txtDescription" class="inquery_desc"></textarea>
                                    <span class="err">Please Enter Discription</span>

                                </div>


                                <div class="form_btn">
                                    <input type="submit" class="btn_save" name="btnInquiry" value="Submit">


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
    <script src="js/include-html.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- <script src="js/kursor.js"></script> -->
    <script src="js/veldation.js"></script>
    <!-- <script src="js/cursor_custom.js"></script> -->







</body>

</html>