<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once 'connection.php';
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
                <h1>Designer Gallery</h1>
                <p class="text-center">Designer / <a href="#">Designer Gallery</a></p>
            </div>
        </div>
    </div>
    <!-- ---------------Designer section  End------------------- -->
    <!-- ----------Designer gallery start------------------------ -->
    <div class="spacer_y">
        <div class="container">
            <h1 class="text-center" style="color: var(background-color); font-weight: 400; font-size: 45px;">Interior
                Designer Gallery
            </h1>

            <div class="em-bar">
                <div class="em_bar_bg">

                </div>
            </div>

            <!-- <div class=" row row-cols-auto  isotop-btn-group filter-button-group">

                <button class="isotop-btn  active" data-filter="*">show all</button>
                <button class="isotop-btn" data-filter=".sofa">Sofa</button>
                <button class="isotop-btn" data-filter=".chair">Chair</button>
                <button class="isotop-btn" data-filter=".home-decor">Home-Decor</button>
                <button class="isotop-btn" data-filter=".kitchen">Kitchen</button>
                <button class="isotop-btn" data-filter=".bed">Bed</button>

            </div> -->

            <div class="grid pt-5">
                <?php
                $str = "select i.*,p.designer_project_name,p.location,d.interior_designer_id from tbl_designer_project_image i,tbl_designer_project p,tbl_interior_designer d where i.designer_project_id=p.designer_project_id and d.interior_designer_id=p.interior_designer_id and i.is_default=1 and p.is_visible=1 group by designer_project_id";
                $rs = mysqli_query($conn, $str) or die(mysqli_error($conn));
                while ($res = mysqli_fetch_array($rs)) {
                    $imgName = $res["image_url"];
                    // if (!file_exists("Uploadfile/$imgName")) {
                    //     $imgName = "no-profile-image.png";
                    // }
                ?>

                    <div class="element-item home-decor    ">

                        <img src="./<?php echo $imgName; ?>">

                        <div class="item_img_overlay">
                            <div class="overlay_info">

                                <div class="gallery_shop">
                                    <a href="designer_gallery_image.php?PortID=<?php echo $res["designer_project_image_id"]; ?>">Detail</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="designer_gallery_inq"><?php
                            echo $res["designer_project_name"] . " - " . $res["location"];
                            ?></h4>
                        <center><a href="Inquiry.php?IntID=<?php echo $res["interior_designer_id"] ?>" style="color: black;" class="gal">INQUIRY</a></center>


                    </div>
                <?php
                }
                ?>
            </div>



        </div>
    </div>
    <!-- ----------Designer gallery end------------------------ -->


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
    <!-- <script src="js/kursor.js"></script> -->
    <script src="js/veldation.js"></script>
    <!-- <script src="js/cursor_custom.js"></script> -->

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