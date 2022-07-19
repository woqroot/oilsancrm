<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="ThemeMarch">
	<!-- Site Title -->
	<title>General Invoice</title>

	<link rel="stylesheet" href="<?= public_url("assets/css/invoice.css") ?>">
	<style>
		/* The container */
		.container {
			display: block;
			position: relative;
			padding-left: 35px;
			margin-bottom: 12px;
			cursor: pointer;
			font-size: 22px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		/* Hide the browser's default radio button */
		.container input {
			position: absolute;
			opacity: 0;
			cursor: pointer;
		}

		/* Create a custom radio button */
		.checkmark {
			position: absolute;
			top: 0;
			left: 0;
			height: 25px;
			width: 25px;
			background-color: #eee;
			border-radius: 50%;
		}

		/* On mouse-over, add a grey background color */
		.container:hover input ~ .checkmark {
			background-color: #ccc;
		}

		/* When the radio button is checked, add a blue background */
		.container input:checked ~ .checkmark {
			background-color: #2196F3;
		}

		/* Create the indicator (the dot/circle - hidden when not checked) */
		.checkmark:after {
			content: "";
			position: absolute;
			display: none;
		}

		/* Show the indicator (dot/circle) when checked */
		.container input:checked ~ .checkmark:after {
			display: block;
		}

		/* Style the indicator (dot/circle) */
		.container .checkmark:after {
			top: 9px;
			left: 9px;
			width: 8px;
			height: 8px;
			border-radius: 50%;
			background: white;
		}
	</style>
</head>

<body>
<?php
$CI->loadContent();
?>
<script
		src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous"></script>
<script>

	$(document).ready(function () {
		let hostUrl = "<?=base_url()?>";
		let invoiceNumber = $("#invoiceNumber").html();

		$("#paymentButton").on("click", function () {
			$.ajax({
				type: "POST",
				url: hostUrl + "/invoice-detail/" + invoiceNumber + "/paymentDetails",
				dataType: "json",
				data: {
					invoiceNumber: invoiceNumber
				},
				success: function (res) {
					if (res.status === 1) {
						$(".paymentButton").hide();
						$(".printInvoiceButton").hide();
						$(".cancelPaymentButton").show();
						$(".selectPaymentMethods").css("display","grid");

					}
				}
			})
		})

		$(document).on("click", ".cancelPaymentButton", function () {
			$(".cancelPaymentButton").hide();
			$(".selectPaymentMethods").hide();
			$(".paymentButton").show();
			$(".printInvoiceButton").show();

		})
	})
</script>
</body>
</html>
