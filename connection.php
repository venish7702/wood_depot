<?php
	$conn=mysqli_connect("localhost","root","","ruper");
	session_start();
	function SessionCheck()  
	{
		if($_SESSION["UserID"]=="" || $_SESSION["UserID"]==NULL)
		{ 
			// header("location:loginmodel.php");
			$url="loginmodel.php";
            echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
			// header("Location:#loginclient");
		}
	}
?>