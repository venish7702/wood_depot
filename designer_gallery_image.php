<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php 
    include_once "connection.php"; 
    extract($_REQUEST);

    $str="select designer_project_id from tbl_designer_project_image where designer_project_image_id=".$PortID;
      $rs=mysqli_query($conn,$str) or die(mysqli_error($conn));
      $res=mysqli_fetch_array($rs);

    $strSel="select * from tbl_designer_project_image where designer_project_id=".$res["designer_project_id"];
      $rsSel=mysqli_query($conn,$strSel) or die(mysqli_error($conn));
      


  ?>
<style type="text/css">

li{
  list-style-type: none;
}

  html {
  box-sizing: border-box;
  height: 100%;
}

*,
*::before,
*::after {
  box-sizing: inherit;
  margin: 0;
  padding: 0;
}

.container {
  display: flex;
  justify-content: center;
}

.thumbnails {
  display: flex;
  flex-direction: column;
  line-height: 0;
  
  li {
    flex: auto; 
  }

  a {
    display: block;
  }
  
  img {
    height: 20vmin;
    object-fit: cover;
    object-position: top;
  }
}

.slides {
  overflow: hidden;
  height: 94vmin;
  
  li {
    height: 100vmin;
    position: absolute;
    z-index: 1;
  }
  
  img {
    height: 100vmin;
    object-fit: cover;
    object-position: top;
  }
}

.slides li:target {
  z-index: 3;
}

.slides li:not(:target) {
  -webkit-animation: hidden 1s 1;
}

@keyframes slide {
  0% {
    transform: translateY(-100%);
  }
  100% {
    transform: translateY(0%);
  }
}

@keyframes hidden {
  0% {
    z-index: 2;
  }
  100% {
    z-index: 2;
  }
}

.lg-thumb-item:hover {
    border-color: #a90707;
    border-width: 30px;
}
</style>
<body>
<div style="background-color: black;">
<div align="right"><a href="designer_gallery.php"><i class="fa fa-close" style="margin-right: 10px;margin-top:6px;font-size: 20px;color: grey"></i></a></div>
<div class="container">
  <ul class="slides">
   <?php
   $str1="select * from tbl_designer_project_image where designer_project_id=".$res["designer_project_id"];
      $rs1=mysqli_query($conn,$str1) or die(mysqli_error($conn));
   $i=0;
      while($data=mysqli_fetch_array($rs1))
      
     //for ($i=0; $i < 4 ; $i++)  
   { 
   $i++;
     ?>
      <li id="<?php echo $i ?>"  ><img style="box-shadow: 2px 2px 2px lightgrey;width:900px;height:900px" src="./<?php echo $data["image_url"] ?>"alt="" /></li>
    <?php
     } 
   ?>
  </ul>

  <ul class="thumbnails" style="margin-left:5px;" >
    <?php
       $j=0;
      while ($resSel=mysqli_fetch_array($rsSel)) 
      {
    $j++;

    ?>
     <li style="margin-top:5px">
      <a href="#<?php echo $j ?>"  ><img style="width:80px;height:80px" src="./<?php echo $resSel["image_url"] ?>" class="lg-thumb-item"/></a>
    </li>
    <?php
       } 
    ?>
   
  
   
  </ul>
</div>
</div>
</body>
</html>