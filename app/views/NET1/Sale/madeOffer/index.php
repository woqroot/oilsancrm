<?php

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

function toBase64($path)
{

	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	return 'data:image/' . $type . ';base64,' . base64_encode($data);
}

?>
	<!doctype html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Teklif - <?=$sale["invoiceNumber"]?> <?=date("Ymd")?></title>
		<style>
			* {
				font-family: DejaVu Sans !important;
				font-size: 11px !important;
			}

			.invoice-box {
				max-width: 100%;
				margin: auto;
				padding: 10px;
				border: 1px solid #faf9f9;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(4) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #faf9f9;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
				font-size: 12px;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #faf9f9;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #faf9f9;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
	<div class="invoice-box">
		<table style="width:100%;" cellpadding="0" cellspacing="0">
			<tr class="top">
				<td colspan="4">
					<table>
						<tr>
							<td style="width: 60%;" class="title">
								<div style="width:100px; ">
									<img src="data:image/png;base64,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"
										 style="width: 100%; max-width: 200px"/>
								</div>
							</td>
							<td style="text-align:right;">
								<div style="border-radius:0 0 4px 0; border-right: 0px solid #c9c0c0;  padding-right:5px;">
									<b style="font-size: 14px; font-family:Arial, Helvetica, sans-serif ;">Teklif #</b>
									&nbsp; <?= $sale["invoiceNumber"] ?>
									<hr style="width: 120px; border: 1px solid #dedede; margin-left: 55%;"></div>
								<div style="border-radius:0 0 4px 0; border-right: 0px solid #c9c0c0;  padding-right:5px;">
									<b style="font-size: 14px; font-family:Arial, Helvetica, sans-serif ;">Tarih  </b>
									&nbsp; <?= date("d/m/Y",time()) ?>
									<hr style="width: 120px; border: 1px solid #dedede; margin-left: 55%;"></div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="4" style="padding-bottom: 50px;">
					<table>
						<tr>
							<td>
								<b>OİLSAN Endüstriyel Yağlar <br> Bakım Kimyasalları Dış Ticaret A.Ş.</b>

								<hr style="width: 220px; border: 1px solid #dedede; margin-right: 100%;">
							</td>
							<td style="text-align: right">
								<b>TEKLİF</b>
								<hr style="width: 60px; border: 1px solid #dedede; margin-left: 85%;">
							</td>
						</tr>
						<tr>

							<td>
								Cumhuriyet Mah, Halaskargazi Cad, 99/3 <br> Şişli, İstanbul, Türkiye<br/>
								<?= $companyInformation['taxNumber'] ?> - <?= $companyInformation['taxOffice'] ?><br/>

							</td>

							<td style="text-align: right">
								<?= $customer["name"] ?><br/>
								<?= $customer["address"] ?><br/>
								<?= phoneMask($customer["phone"]) ?><br/>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="heading">
				<td>Ürün</td>
				<td>Miktar</td>
				<td>Birim Fiyat</td>
				<td>Tutar</td>
			</tr>
			<?php
			foreach ($products as $product) {
				?>
				<tr class="item">
					<td style=""><?= $product['name'] ?></td>
					<td style=""><?= $product['quantity'] ?> <?= Main::unit($product['fkUnit']) ?></td>
					<td style=""><?= number_format($product['unitPrice'], 2, ",", ".") ?> <?= currency($sale['fkCurrency']) ?></td>
					<td style=""><?= number_format($product['totalPriceWithVat'], 2, ",", ".") ?> <?= currency($sale['fkCurrency']) ?></td>
				</tr>

				<?php
			}
			?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr class="total" style="">
				<td></td>
				<td></td>
				<td></td>
				<td style="font-size: 14px !important;"><b style="font-size: 13px !important;">Toplam:</b> <?= showBalance($sale['totalPriceWithVat'], $sale['fkCurrency']) ?> </td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td><b>Teklif Notları</b></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="4">
					<table>
						<tbody>
						<tr>
							<td style="line-height: 13px">
								<?php $notes = explode("\n",$sale["invoiceNotes"]);

								foreach ($notes as $note) {
									?>
									- <?=$note?><br>
									<?php
								}
								?>

							</td>
						</tr>

						</tbody>
					</table>
				</td>
			</tr>

		</table>
	</div>
	</body>

	</html>
<?php
$htmlTemplate = ob_get_clean();
$dompdf->loadHtml($htmlTemplate);

// (Optional) Setup the paper size and orientation
//$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

//$output = $dompdf->output();
// Output the generated PDF to Browser
$dompdf->stream("Teklif ".$sale["invoiceNumber"]."-".date("YmdHis").".pdf", ['Attachment' => false]);
