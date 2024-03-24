<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Interior Request | Ruper</title>
	<!-- link -->
	<!-- http://caketheme.com/html/ruper/index2.html -->

	<?php
	include_once 'connection.php';
	include_once 'link.php';
	SessionCheck();
	extract($_REQUEST);
	?>
	<style type="text/css">
		.rating {
			width: 300px;
			height: 34px;
		}

		.rating label {
			width: 40px !important;
			height: 30px;


		}

		.label {

			padding-top: 3px;
		}

		input[type="radio"] {
			padding-right: 4px;
			position: absolute;
			left: 340px;
			margin-top: -500px;
		}

		input[type="radio"],
		.rating label.stars {
			float: right;
			line-height: 30px;
			height: 30px;
		}

		span+input[type=radio]+label,
		legend+input[type=radio]+label {

			margin-right: 80px;
			counter-reset: checkbox;
		}

		.rating input[type="radio"]:required {
			content: '';
			position: absolute;
			/*left: 340px; */
			min-height: 10px;
			margin-top: -36px;
			text-align: left;
			background: #6cbf00;
			padding: 10px 10px;
			display: block;
			width: 50px;
		}

		.rating label.stars {
			background: transparent url('Image/star_off.png') no-repeat center center;
		}

		.rating label.stars:hover~label.stars,
		.rating label.stars:hover,
		.rating input[type=radio][name=stars]:checked~label.stars {
			background-image: url('Image/star.png');
		}

		.rating input[type=radio][name=stars]:required {
			content: counter(checkbox) " stars!";
		}
	</style>

</head>

<!-- feedback model -->
<div id="review_modal" class="modal" tabindex="-2" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" data-bs-dismiss="modal" class="close_btn "><i class="fa-solid fa-xmark"></i></button>
			</div>
			<div class="modal-body">
				<div class="model_body_head">
				Give Feedack
				</div>
				<div class="em-bar">
					<div class="em_bar_bg"></div>
				</div>
				<h4 class="text-center mt-2 mb-4">
					<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
					<i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
					<i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
					<i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
					<i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
				</h4>
				<div class="form-group">

					<input type="text" name="user_name" id="user_name" class="form-control ret"  value="<?php echo $_SESSION["UserID"];  ?>" />
				</div>
				<div class="form-group">
					<textarea name="user_review" id="user_review" class="form-control ret_txt" placeholder="Type Review Here"></textarea>
					<input type="text" name="hddfeedmansi" id="hddfeedmansi">
						<input type="text" name="hdd" id="hdd">
				</div>
				<div class="form-group text-center mt-4">
					<button type="button" class="orer_btn" id="save_review">Submit</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- feedback model end -->


<!-- feedback model script -->
<style>
	.progress-label-left {
		float: left;
		margin-right: 0.5em;
		line-height: 1em;
	}

	.progress-label-right {
		float: right;
		margin-left: 0.3em;
		line-height: 1em;
	}

	.star-light {
		color: #e9ecef;
	}
</style>

<script>
	$(document).ready(function() {

		// var rating_data = 0;

		$('#add_review').click(function() {
			var id=$(this).attr("feedbackid");
			$("#hddfeedmansi").val(id);
			var id1=$(this).attr("Interiorid");
			$("#hdd").val(id1);

			$('#review_modal').modal('show');
			return false;

		});

		$(document).on('mouseenter', '.submit_star', function() {

			var rating = $(this).data('rating');

			reset_background();

			for (var count = 1; count <= rating; count++) {

				$('#submit_star_' + count).addClass('text-warning');

			}

		});

		function reset_background() {
			for (var count = 1; count <= 5; count++) {

				$('#submit_star_' + count).addClass('star-light');

				$('#submit_star_' + count).removeClass('text-warning');

			}
		}

		$(document).on('mouseleave', '.submit_star', function() {

			reset_background();

			for (var count = 1; count <= rating_data; count++) {

				$('#submit_star_' + count).removeClass('star-light');

				$('#submit_star_' + count).addClass('text-warning');
			}

		});

		$(document).on('click', '.submit_star', function() {

			rating_data = $(this).data('rating');

		});

		$('#save_review').click(function() {
			var hddfeedmansi = $("#hddfeedmansi").val();

			var hdd = $("#hdd").val();

			var user_name = $('#user_name').val();

			var user_review = $('#user_review').val();

			if (user_name == '' || user_review == '') {
				alert("Please Fill Both Field");
				return false;
			} else {
				$.ajax({
					url: "Accept_request.php",
					method: "POST",
					data: {
						rating_data: rating_data,
						hddfeedmansi: hddfeedmansi,
						hdd: hdd,
						user_name: user_name,
						user_review: user_review
					},
					success: function(data) {
						$('#review_modal').modal('hide');

						load_rating_data();

						alert(data);
					}
				})
			}

		});

	});
</script>
<!-- end feedback script -->
<?php
//submit_rating.php


$connect = new PDO("mysql:host=localhost;dbname=ruper", "root", "");


if(isset($_POST["rating_data"]))
{

	$data = array(
        ':hddfeedmansi'     =>  $_POST["hddfeedmansi"],
        ':hdd'        		=>  $_POST["hdd"],
		':user_name'		=>	$_POST["user_name"],
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
	
	);

	$query = "
		INSERT INTO tbl_designer_feedback 
		(interior_designer_id, user_id, review, rating, createdon, request_designer_id) 
		VALUES (:hdd, :user_name, :user_review, :user_rating, now(), :hddfeedmansi)
	";  
	
	// $strF="insert into tbl_designer_feedback values(null,$hdd,".$_SESSION["UserID"].",'$txtReview ','$stars',now(),$hddfeedmansi)";
	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";
} 
?>
















<body>
	<!-- scroll header and scroll rocket and loader  start------------------ -->
	<div class="scroll_top">
		<i class="fa-solid fa-shuttle-space"></i>
	</div>

	<!-- <div class="center-body">

        <div class="loader-square"></div>

    </div> -->
	<!-- scroll header and scroll rocket and loader  end------------------ -->
	<!-- header start-------------------- -->
	<?php include_once 'header.php';   ?>
	<!-- header end-------------------- -->
	<!-- ---------------cotect Hade section  start------------------- -->

	<div class="about_head">
		<img src="./imgae/slider1.jpeg" alt="" srcset="" class="about_img responsive ">

		<div class="about_content_parent">
			<div class="about_cotent">
				<h1>Interior Request</h1>
				<p class="text-center">Home / <a href="#">Interior Request</a></p>
			</div>
		</div>
	</div>


	<!-- ---------------contect Hade section  End------------------- -->
	<?php
	$strSel = "select * from tbl_designer_requirement where user_id=" . $_SESSION["UserID"];
	$rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
	if (mysqli_num_rows($rsSel) > 0) {
		$resSel = mysqli_fetch_array($rsSel);
	?>

		<div class="spacer_y">
			<div class="container">
				<div class="row g-0">
					<div class="col-sm-12 col-md-6">

						<div class="chang_password_img">
							<img src="./imgae/accept_req.jpg" alt="">
						</div>
					</div>

					<div class="col-sm-12 col-md-6">

						<div class="accept_req_content">
							<h2>Interior Request</h2>
							<p>Let's send a Request</p>
							<div class="row comman_accept">
								<div class="col-4">
									<h5>Subject</h5>
								</div>
								<div class="col-8"><?php echo $resSel["subject"]; ?></div>
							</div>
							<div class="row comman_accept">
								<div class="col-md-4 col-sm-3 ">
									<h5>Description</h5>
								</div>
								<div class="col-md-8 col-sm-8 "><?php echo $resSel["description"]; ?></div>
							</div>
							<div class="row comman_accept">
								<div class="col-4">
									<h5>Budget</h5>
								</div>
								<div class="col-8"><?php echo $resSel["budget"] . " Rs."; ?></div>
							</div>
							<div class="row comman_accept">
								<div class="col-4">
									<h5>Request On</h5>
								</div>
								<div class="col-8"><?php echo $resSel["createdon"]; ?></div>
							</div>
							<?php
							$strReq = "SELECT * FROM tbl_request_designer r, tbl_interior_designer d WHERE r.interior_designer_id = d.interior_designer_id AND designer_requirement_id = " . $resSel["designer_requirement_id"];
							$rsReq = mysqli_query($conn, $strReq) or die(mysqli_error($conn));
							$resReq = mysqli_fetch_array($rsReq);
							if (!empty($resReq) && isset($resReq["IsConfirmed"]) && $resReq["IsConfirmed"] == 1) {


							?>

								<div class="row comman_accept">
									<div class="col-4">
										<h5>Confirm By</h5>
									</div>
									<div class="col-8"><?php echo $resReq["first_name"] . " " . $resReq["last_name"]; ?></div>
								</div>
								<div class="row comman_accept">
									<div class="col-4">
										<h5>Confirm On</h5>
									</div>
									<div class="col-8"><?php echo $resReq["CreatedaOn"]; ?></div>
								</div>
								<div class="row">
									<div class="col-12">
										<a href="" class=" d-block  edit_profile_btn  p-2 mt-4" id="add_review" name="add_review" feedbackid="<?php echo $resReq["request_designer_id"];?>" Interiorid="<?php echo $resReq["interior_designer_id"];?>">Give Feedback</button></a>

									</div>

								</div>
							<?php
							} else {
							?>
								<div class="row comman_accept">
									<div class="col-4">
										<h5>Confirm</h5>
									</div>
									<div class="col-8"><i class="fa fa-minus" style="font-size: 18px;margin-top: 5px;margin-left: 30px;"></i></div>
								</div>
							<?php
							}
							?>
						</div>


					</div>
				</div>





			</div>
		</div>

	<?php
	} else {
		echo "<br><center><h2>No Request Available</h2></center></br>";
	}
	?>




	<!-- ---------------------Footer Part Start--------------- -->
	<!-- <div class="spacer_y"> -->
	<?php include_once 'footer.php';   ?>
	<!-- ---------------------Footer Part End--------------- -->










</body>

</html>