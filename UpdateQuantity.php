<?php
include_once "connection.php";
	if(isset($_POST["id"]))
	{	$str="select price from tbl_cart where cart_id=".$_POST["id"];
		$rs=mysqli_query($conn,$str) or die(mysqli_error($conn));
		$res=mysqli_fetch_array($rs);
		$Amount=$_POST["qty"]*$res["price"];
		// $y=$x*$resSel["Discount"]/100;
		// $Amount=$x-$y;
		
		$query = "update tbl_cart set quantity='".$_POST["qty"]."',total_amount=$Amount where cart_id = ".$_POST["id"];
		mysqli_query($conn,$query);

		$total=0;
		$string=exec('getmac');
	    $mac=substr($string, 0, 17);
					if(isset($_SESSION["UserID"]))
					{
						$str="select c.*,p.* from tbl_cart c,tbl_product p where p.product_id=c.product_id and c.user_id=".$_SESSION["UserID"];
					}
					else
					{
						$str="select c.*,p.* from tbl_cart c join tbl_product p on p.product_id=c.product_id where c.mac_address='$mac' or user_id IS NULL";
					}
					$rs=mysqli_query($conn,$str) or die(mysqli_error($conn));
					while($res=mysqli_fetch_array($rs))
					{
						$total+=$res["total_amount"];

					}

					echo $total;
			


	}
	?>
