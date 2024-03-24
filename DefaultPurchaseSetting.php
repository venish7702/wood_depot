<!DOCTYPE html>
<html lang="en">
<?php 
include_once "connection.php"; 
include_once "link.php";
SessionCheck();
extract($_REQUEST);
if(isset($AID))
{
$strUp="update tbl_user_address set IsPrimary=0 where user_id=".$_SESSION["UserID"];
mysqli_query($conn,$strUp) or die(mysqli_error($conn));
$strUp1="update tbl_user_address set IsPrimary=1 where address_id=".$AID;
mysqli_query($conn,$strUp1) or die(mysqli_error($conn));
// header("location:DefaultPurchaseSetting.php");
$url="DefaultPurchaseSetting.php";
echo "<script type='text/javascript'>document.location.href='{$url}';</script>";
}
?>
<head>
</head>
<body>
<!-- Main header -->
<?php include_once "header.php"; ?> 
<!-- /main header -->

<div class="privacy">
<div class="container">
	<!-- tittle heading -->
	<h3 class="tittle-w3l">Your Address
		<span class="heading-style">
			<i></i>
			<i></i>
			<i></i>
		</span>

	</h3>

	<div class="checkout-right">

		<div class="row">
		<?php 
			$no=1;
			$strSel="select u.*,c.city_name,s.state_name from tbl_user_address u,tbl_city c,tbl_state s where s.state_id=u.state_id and c.city_id=u.city_id and u.user_id=".$_SESSION["UserID"];
			$rsSel=mysqli_query($conn,$strSel) or die(mysqli_error($conn));
			if(mysqli_num_rows($rsSel)>0)
			{
		?>
		<div class="col-md-8">
			<table class="timetable_sub table table-responsive table table-hover">
				<thead>
					<tr>
						<th style="font-size: 20px;color: white;">Sr No.</th>
						<th style="font-size: 20px;color: white;">Address</th>
						<th style="font-size: 20px;color: white;">Primary</th>
					</tr>
				</thead>
				<style type="text/css">
					td{
						font-weight: bold;

					}
				</style>
				<?php
           			while($resSel=mysqli_fetch_array($rsSel))
            		{
				?>
				<tbody>
					<tr class="rem1">
						<td class="invert" style="font-size: 20px;width:100px;"><?php echo $no; ?></td>
						<td class="invert" style="font-size: 20px;"><?php echo $resSel["address"].", ".$resSel["state_name"].", ".$resSel["city_name"].", ".$resSel["pincode"];?></td>
						<td class="invert" style="font-size: 20px;">
						<?php
							if($resSel["IsPrimary"]==1)
							{
								?>
								<a href="?AID=<?php echo $resSel["address_id"];?>">Primary</a><?php
							}
							else
							{
								?>
								<a href="?AID=<?php echo $resSel["address_id"];?>">Make Primary</a><?php
							}
							?>				
							</td>				
							</td>
					</tr>
					<?php
						$no++;
					}
					?>
				</tbody>
			</table>
		</div>
		<?php 
			}
			else
			{
				$msg="Your address is not enter yet...";
			}
		?>
			<h4><?php if(isset($msg)) echo $msg; ?></h4>
		<div class="col-md-4">
			<img src="./imgae/address.jpg" style="height:300px;width:300px;margin-left:100px;">
			<a href="AddAddress.php" style="font-size: 25px;margin-left: 200px;">Add Address</a>
		</div>
		</div>
	</div>
</div>
</div>
<!-- Footer -->

<?php include_once "footer.php"; ?>
<!-- /footer -->

</body>
</html>