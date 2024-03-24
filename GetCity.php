<?php
include_once "connection.php";
$SID = $_REQUEST["SID"];
$strCity = "select * from tbl_city where state_id=$SID";
$rsCity = mysqli_query($conn, $strCity) or die(mysqli_error($conn));
?>
<select name="cmbCity" class="drop_dwn_2">
	<option>Select City</option>
	<?php
	while ($resCity = mysqli_fetch_array($rsCity)) {
	?>
		<option value="<?php echo $resCity["city_id"]; ?>"><?php echo $resCity["city_name"]; ?></option>
	<?php
	}
	?>
</select>