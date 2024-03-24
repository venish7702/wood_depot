<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        include_once 'link.php';
    ?>
</head>

<body>
    <?php
        include_once 'header.php';

    ?>


    <!-- <a href="#" id="sn" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#exampleModalToggle1" role="button" title="login"></a> -->
    <input style="display:none;" type="button" id="sn" class="btn_reg" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal" value="REGISTRATION">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="./js/jquery-3.6.1.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sn").click();

        });
    </script>

    <?php include_once "index.php"; ?> 


</body>

</html>