<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Clean | Depot</title>

    <?php
    include_once 'connection.php';
    extract($_REQUEST);
    include_once 'link.php';
    ?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script>
        function findCity(StateID) {

            var Url = "GetCity.php?SID=" + StateID;
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("ddCity").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", Url, true);
            xhttp.send();
        }
    </script>


    <?php
    if (isset($btnSave)) {
        $pwd = base64_encode($txtPwd);
        $fileName = $_FILES["file"]["name"];
        $ImgName = "uploads/" . $fileName;
        if ($_FILES["file"]["error"] > 0) {
            $error = $_FILES["file"]["error"];
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $ImgName);
        }
        $str = "insert into tbl_interior_designer values(null,'$txtFname','$txtLname','$txtQualification','$txtExperiance','$txtDescription','$ImgName','$txtEmail','$pwd','$txtContact',$cmbState,$cmbCity,$txtPincode,now(),0,0,null)";
        mysqli_query($conn, $str) or die(mysqli_error($conn));
        $_SESSION["InteriorDesignerID"] = mysqli_insert_id($conn);
        header("location:SelectPackageInterior.php");
    }

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


    <?php
    include_once 'header.php';


    ?>
    <!-- ---------------------Header end--------------- -->

    <!-- ---------------Designer section  start------------------- -->

    <div class="about_head">
        <img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img ">
        <div class="about_content_parent">
            <div class="about_cotent">
                <h1>Become a Interior</h1>
                <p class="text-center">Designer / <a href="#">Become a Interior</a></p>
            </div>
        </div>
    </div>


    <!-- ---------------Designer section  End------------------- -->

    <!-- --------------Become a Interior start------------------------------- -->
    <div class="spacer_y interior_bg responsive">
        <div class="container">
            <div class="row  justify-content-center">
                <div class=" form_content col p-4 col-md-6 col-sm-12 p-2   ">
                    <h1>Sign Up</h1>
                    <p>Let's set up your Account.</p>
                    <div class="em-bar">
                        <div class="em_bar_bg">
                        </div>
                    </div>

                    <form class="edit_i_form " id="interior_reg" method="post" action="InteriorRegistration.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 ">
                                <input type="text" class="form-control fname_i" name="txtFname" placeholder="Name">
                                <span class="err">Plese Enter Name</span>
                            </div>
                            <div class="col-md-6 col-sm-12 ">
                                <input type="text" class="form-control sname_i" name="txtLname" placeholder="SurName">
                                <span class="err">Plese Enter Name</span>

                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" class="form-control qua" name="txtQualification" placeholder="Qualification">
                                <span class="err">Plese Enetr Qualification</span>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" class="form-control exp" name="txtExperiance" placeholder="Experiance">
                                <span class="err">Plese Enetr Experiance</span>

                            </div>
                            <div class="col-12">
                                <textarea cols="90" rows="2" placeholder="Your Description" class="i_your_descr" name="txtDescription"></textarea>
                                <span class="err">Please Enter Discription</span>

                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control int_email" name="txtEmail" placeholder="Email">
                                <span class="err">Plese Enetr Velid Email</span>

                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="password" class="form-control int_password" name="txtPwd" placeholder="Password">
                                <span class="err">Plese Enetr Password</span>

                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="password" class="form-control int_c_password" name="txtCPwd" int_c_password placeholder="Confirm Password">
                                <span class="err">Plese Enetr Confirm Password</span>

                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control int_contect" name="txtContact" placeholder="Contect No">
                                <span class="err">Plese Enetr contact No</span>

                            </div>
                            <div class="col-md-6 col-sm-12">
                                <select name="cmbState" id="" class="drop_dwn" onchange="findCity(this.value)">
                                    <option>Select State</option>
                                    <?php
                                    $strState = "select * from tbl_state";
                                    $rsState = mysqli_query($conn, $strState) or die(mysqli_error($conn));
                                    while ($resState = mysqli_fetch_array($rsState)) {
                                    ?>
                                        <option value="<?php echo $resState["state_id"]; ?>"><?php echo $resState["state_name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6 col-sm-12" id="ddCity">
                                <select name="cmbCity" id=""class="drop_dwn_2" >
                                    <option>Select State</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control int_pincode" name="txtPincode" placeholder="Pincode">
                                <span class="err">Plese Enetr Pincode</span>

                            </div>
                            <div class="col-12">
                                <input type="File" class="form-control int_file" name="file">
                                <span class="err">Plese Enetr File</span>

                            </div>
                            <div class="form_btn">
                                <input type="submit" class="btn_int" name="btnSave" value="Submit">

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- --------------Become a Interior end------------------------------- -->

    <!-- ---------------------Footer Part Start--------------- -->

    <?php
    include_once 'footer.php';


    ?>

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







</body>

</html>