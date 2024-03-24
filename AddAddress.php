<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="Validation.js"></script>
<style type="text/css">
	.error1
	{
		color: red;
	}
</style>
<?php 
include_once "connection.php"; 
// include_once "Css.php";
SessionCheck();
extract($_REQUEST);
if(isset($btnSubmit))
{
	$str="select * from tbl_user_address where user_id=".$_SESSION["UserID"];
	$rs=mysqli_query($conn,$str);
	if(mysqli_num_rows($rs)>0)
	{
		$strIns="insert into tbl_user_address values(null,".$_SESSION["UserID"].",'$txtAddress',$cmbState,$cmbCity,$txtPincode,0)";
	}
	else
	{
		$strIns="insert into tbl_user_address values(null,".$_SESSION["UserID"].",'$txtAddress',$cmbState,$cmbCity,$txtPincode,1)";
	}
	mysqli_query($conn,$strIns) or die(mysqli_error($conn));
	header("location:DefaultPurchaseSetting.php");
}
?>
<script type="text/javascript">
function findCity(StateID) 
{
  
  var Url = "GetCity.php?SID="+StateID;	
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) 
    {
      document.getElementById("ddCity").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET",Url, true);
  xhttp.send();
}
</script>
<head>
</head>
<body>
<!-- Main header -->
<?php include_once "header.php"; ?> 
<!-- /main header -->

<div class="container">
<div class="checkout-left">
	<div class="address_form_agile">
		<h4>Add a new Address</h4>
		<form method="post" class="creditly-card-form agileinfo_form">
			<div class="creditly-wrapper wthree, w3_agileits_wrapper">
				<div class="information-wrapper">
					<div class="controls">
						<textarea class="form-control" name="txtAddress" placeholder="Full Address" required="" id="txtDescription" onblur="return allLetterDigitDot('txtDescription','lblDescription');"></textarea>
						<label id="lblDescription" class="control-label error1"></label>
					</div>
					<div class="controls">
						<select name="cmbState" onchange="findCity(this.value)">
						<option>Select State</option>
						<?php 
							$strState="select * from tbl_state";
							$rsState=mysqli_query($conn,$strState) or die(mysqli_error($conn));
							while($resState=mysqli_fetch_array($rsState))
							{
						?>
							<option value="<?php echo $resState["state_id"]; ?>"><?php echo $resState["state_name"]; ?></option>
						<?php
							}
						?>
						</select>
					</div>
					<div class="controls" id="ddCity">
						<select name="cmbCity">
							<option>Select State</option>
						</select>
					</div>
					<div class="controls">
						<input type="text" placeholder="Pincode" name="txtPincode" required="" id="txtPincode" maxlength="6" onblur="return LenghtValidPincode('txtPincode','tblPincode');" onkeypress="return NumbersOnly(event);">
						<label id="tblPincode" class="control-label error1"></label>
					</div>
				</div>
			</div>
			<button class="submit check_out" name="btnSubmit" style="margin-bottom:30px;">Submit</button>
		</form>
	</div>
	<div class="clearfix"> </div>
</div>
</div>
<!-- Footer -->
<?php include_once "footer.php"; ?>
<!-- /footer -->
	

</body>
</html>