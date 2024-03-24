<?php
session_start();
session_unset();
// session_unset();
unset($_SESSION['UserID']);
unset($_SESSION['FirstName']);
unset($_SESSION['LastName']);

// session_unset("ImageURL");
session_destroy();
// header("location:Index.php");
$url = "index.php";
echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
?>
