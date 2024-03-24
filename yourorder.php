<!DOCTYPE html>
<html lang="en">
<script type="text/javascript" src="Validation.js"></script>

<?php
include_once "link.php";
include_once "connection.php";
SessionCheck();
extract($_REQUEST);

?>

<head>
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


<div id="review_modal" class="modal" tabindex="-1" role="dialog">
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
					<?php
					if (isset($_SESSION["prid"])) {
						$prid = $_SESSION["prid"];
					}



					?>
					<input type="hidden" name="prod_name" id="prod_name" class="form-control " value="<?php echo  $prid; ?>" />
					<input type="hidden" name="user_id" id="user_id" class="form-control " value="<?php echo $_SESSION["UserID"]; ?>" />
					<input type="text" name="user_name" id="user_name" class="form-control ret" placeholder="Enter Your Name" value="<?php echo  $_SESSION["FirstName"] . $_SESSION["LastName"]; ?>" />
				</div>
				<div class="form-group">
					<textarea name="user_review" id="user_review" class="form-control ret_txt" placeholder="Type Review Here"></textarea>
				</div>
				<div class="form-group text-center mt-4">
					<button type="button" class="orer_btn" id="save_review">Submit</button>
				</div>
			</div>
		</div>
	</div>
</div>



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

		var rating_data = 0;

		$('#add_review').click(function() {

			$('#review_modal').modal('show');

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
			var user_id = $("#user_id").val();

			var prod_name = $("#prod_name").val();

			var user_name = $('#user_name').val();

			var user_review = $('#user_review').val();

			if (user_name == '' || user_review == '') {
				alert("Please Fill Both Field");
				return false;
			} else {
				$.ajax({
					url: "submit_rating.php",
					method: "POST",
					data: {
						rating_data: rating_data,
						user_id: user_id,
						prod_name: prod_name,
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

		load_rating_data();

		function load_rating_data() {
			$.ajax({
				url: "submit_rating.php",
				method: "POST",
				data: {
					action: 'load_data'
				},
				dataType: "JSON",
				success: function(data) {
					$('#average_rating').text(data.average_rating);
					$('#total_review').text(data.total_review);

					var count_star = 0;

					$('.main_star').each(function() {
						count_star++;
						if (Math.ceil(data.average_rating) >= count_star) {
							$(this).addClass('text-warning');
							$(this).addClass('star-light');
						}
					});

					$('#total_five_star_review').text(data.five_star_review);

					$('#total_four_star_review').text(data.four_star_review);

					$('#total_three_star_review').text(data.three_star_review);

					$('#total_two_star_review').text(data.two_star_review);

					$('#total_one_star_review').text(data.one_star_review);

					$('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

					$('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

					$('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

					$('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

					$('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

					if (data.review_data.length > 0) {
						var html = '';

						for (var count = 0; count < data.review_data.length; count++) {
							html += '<div class="row mb-3">';

							html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

							html += '<div class="col-sm-11">';

							html += '<div class="card">';

							html += '<div class="card-header"><b>' + data.review_data[count].user_name + '</b></div>';

							html += '<div class="card-body">';

							for (var star = 1; star <= 5; star++) {
								var class_name = '';

								if (data.review_data[count].rating >= star) {
									class_name = 'text-warning';
								} else {
									class_name = 'star-light';
								}

								html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
							}

							html += '<br />';

							html += data.review_data[count].user_review;

							html += '</div>';

							html += '<div class="card-footer text-right">On ' + data.review_data[count].datetime + '</div>';

							html += '</div>';

							html += '</div>';

							html += '</div>';
						}

						$('#review_content').html(html);
					}
				}
			})
		}

	});
</script>
<!-- end feedback script -->

<style type="text/css">
	ol.progtrckr {
		margin: 0;
		padding: 0;
		list-style-type none;
	}

	ol.progtrckr li {
		display: inline-block;
		text-align: center;
		line-height: 3.5em;
	}

	ol.progtrckr[data-progtrckr-steps="2"] li {
		width: 49%;
	}

	ol.progtrckr[data-progtrckr-steps="3"] li {
		width: 33%;
	}

	ol.progtrckr[data-progtrckr-steps="4"] li {
		width: 24%;
	}

	ol.progtrckr[data-progtrckr-steps="5"] li {
		width: 19%;
	}

	ol.progtrckr[data-progtrckr-steps="6"] li {
		width: 16%;
	}

	ol.progtrckr[data-progtrckr-steps="7"] li {
		width: 14%;
	}

	ol.progtrckr[data-progtrckr-steps="8"] li {
		width: 12%;
	}

	ol.progtrckr[data-progtrckr-steps="9"] li {
		width: 11%;
	}

	ol.progtrckr li.progtrckr-done {
		color: black;
		border-bottom: 4px solid yellowgreen;
	}

	ol.progtrckr li.progtrckr-todo {
		color: silver;
		border-bottom: 4px solid silver;
	}

	ol.progtrckr li:after {
		content: "\00a0\00a0";
	}

	ol.progtrckr li:before {
		position: relative;
		bottom: -2.5em;
		float: left;
		left: 50%;
		line-height: 1em;
	}

	ol.progtrckr li.progtrckr-done:before {
		content: "\2713";
		color: white;
		background-color: yellowgreen;
		height: 2.2em;
		width: 2.2em;
		line-height: 2.2em;
		border: none;
		border-radius: 2.2em;
	}

	ol.progtrckr li.progtrckr-todo:before {
		content: "\039F";
		color: silver;
		background-color: white;
		font-size: 2.2em;
		bottom: -1.2em;
	}
</style>

<body>
	<?php include_once 'header.php';  ?>
	<div class="privacy">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Your Order
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<?php
			$no = 1;

			$strSel = "select op.*,p.product_name,pi.*,od.*,od.product_id as pid,o.GrandTotal from tbl_order o,tbl_order_detail od,tbl_product p,tbl_product_image pi,tbl_order_payment op where p.product_id=pi.product_id and pi.IsDefault=1 and p.product_id=od.product_id and o.order_id=od.order_id and o.order_id=op.order_id and op.IsPaid=1 and o.user_id='" . $_SESSION["UserID"] . "' order by o.order_id desc";

			$rsSel = mysqli_query($conn, $strSel) or die(mysqli_error($conn));
			if (mysqli_num_rows($rsSel) > 0) {
				$count = mysqli_num_rows($rsSel);
			?>
				<!-- //tittle heading -->
				<div class="checkout-right">
					<h4>Your Order:
						<span>
							<?php echo $count; ?>
						</span>
					</h4>
				</div>
				<!-- //tittle heading -->
				<div class="checkout-right">
					<div class="table-responsive">
						<table class="timetable_sub table">
							<thead>
								<tr>
									<th>Sr No.</th>
									<th>Product</th>
									<th>Quantity</th>
									<th>Product Name</th>
									<th>Total Amount</th>
									<th>Give Feedback</th>
								</tr>
							</thead>
							<?php
							while ($resSel = mysqli_fetch_array($rsSel)) {
							?>
								<tbody>
									<tr class="rem1">
										<td class="invert"><?php echo $no; ?></td>
										<td class="invert-image">
											<?php
											$imgName = $resSel["image_url"];

											?>
											<img src="<?php echo $imgName; ?>" style="height:100px;width:150px;">
										</td>
										<td class="invert"><?php echo $resSel["quantity"]; ?></td>
										<td class="invert"><?php echo $resSel["product_name"]; ?></td>
										<td class="invert"><?php echo "&#8377 " . $resSel["total_amount"]; ?></td>


										<?php
										$_SESSION["prid"] = $resSel["product_id"];
										?>
										<td><button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button></td>
									</tr>
									<tr>
										<td colspan="6" style="height:130px">
											<ol class="progtrckr text-center" data-progtrckr-steps="5">
												<?php
												if ($resSel["order_status"] == "Order Processing") {
												?>
													<li class="progtrckr-done">Order Processing</li>
													<li class="progtrckr-todo">Shipped</li>
													<li class="progtrckr-todo">Delivered</li>
												<?php
												} else if ($resSel["order_status"] == "Shipped") {
												?>
													<li class="progtrckr-done">Order Processing</li>
													<li class="progtrckr-done">Shipped</li>
													<li class="progtrckr-todo">Delivered</li>
												<?php
												} else if ($resSel["order_status"] == "Delivered") {
												?>
													<li class="progtrckr-done">Order Processing</li>
													<li class="progtrckr-done">Shipped</li>
													<li class="progtrckr-done">Delivered</li>
												<?php
												} else { ?>
													<li class="progtrckr-todo">Order Processing</li>
													<li class="progtrckr-todo">Shipped</li>
													<li class="progtrckr-todo">Delivered</li>
												<?php
												}
												?>
											</ol>
										</td>
									</tr>

								<?php
								$no++;
							}
								?>

								</tbody>
						</table>
					</div>
				</div>
			<?php } else {
				echo "<h4>Order Not Available...</h4>";
			} ?>
		</div>
	</div>
	<!-- Footer -->
	<?php include_once 'footer.php';  ?>

</body>

</html>