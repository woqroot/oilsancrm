<div class="cs-container">
	<div class="cs-invoice cs-style1">
		<div class="cs-invoice_in" id="download_section">
			<div class="cs-invoice_head cs-type1 cs-mb25">
				<div class="cs-invoice_left">
					<p class="cs-invoice_number cs-primary_color cs-mb5 cs-f16"><b class="cs-primary_color">Fatura
							No:</b> #<span id="invoiceNumber"><?= $sale['invoiceNumber'] ?></span></p>
					<p class="cs-invoice_date cs-primary_color cs-m0"><b class="cs-primary_color">Fatura
							Tarihi: </b><?= $sale["invoiceDate"] ?></p>

				</div>
				<div class="cs-invoice_right cs-text_right">
					<div class="cs-logo cs-mb5"><img style="width:250px"
													 src="<?= public_url("assets/media/logos/logo-blue.svg") ?>"
													 alt="Logo"></div>
				</div>
			</div>
			<div class="cs-invoice_head cs-mb10">
				<div class="cs-invoice_left">
					<b class="cs-primary_color"><?= $company['name'] ?></b>
					<p>

						<?= $company['address'] ?> <br>
						<?= $company['taxOffice'] ?> / <?= $company['taxNumber'] ?> <br>
						<?= $company['email'] ?>
					</p>
				</div>
				<div class="cs-invoice_right">
					<b class="cs-primary_color">Sayın</b>
					<p>
						<?= $customer['name'] ?> <br>
						<?= $customer['address'] ?>
						<?= getDistrict($customer["fkDistrict"]) ?>
						/ <?= getCity($customer["fkCity"]) ?>
						- <?= getCountry($customer["fkCountry"]) ?><br>
						<?= $customer['taxOffice'] ?> / <?= $customer['taxNumber'] ?>
					</p>
				</div>
			</div>
			<div class="cs-table cs-style1">
				<div class="cs-round_border">
					<div class="cs-table_responsive">
						<table>
							<thead>
							<tr>
								<th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Ürün/Hizmet</th>
								<th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Miktar</th>
								<th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Fiyat</th>
								<th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">KDV Oranı</th>
								<th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg cs-text_right">Toplam
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach ($products as $product) {
								?>
								<tr>
									<td class="cs-width_2"><?= $product['name'] ?></td>
									<td class="cs-width_2"><?= $product['quantity'] ?> <?= Main::unit($product['fkUnit']) ?></td>
									<td class="cs-width_2"><?= number_format($product['unitPrice'], 4, ",", ".") ?> <?= currency($sale['fkCurrency']) ?></td>
									<td class="cs-width_1">%<?= $product['vatPercent'] ?></td>
									<td class="cs-width_2 cs-text_right"><?= number_format($product['totalPriceWithVat'], 2, ",", ".") ?> <?= currency($sale['fkCurrency']) ?></td>
								</tr>
								<?php
							}
							?>

							</tbody>
						</table>
					</div>
					<div class="cs-invoice_footer cs-border_top">
						<div class="cs-left_footer cs-mobile_hide">
							<p class="cs-mb0"><b class="cs-primary_color">Ek Bilgiler:</b></p>
							<p class="cs-m0">Düzenlenebilir ek bilgiler alanı.</p>
						</div>
						<div class="cs-right_footer">
							<table>
								<tbody>
								<tr class="cs-border_left">
									<td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Ara Toplam</td>
									<td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">
										<?= number_format($sale['totalPrice'], 2, ",", ".") ?> <?= currency($sale['fkCurrency']) ?>
									</td>
								</tr>
								<tr class="cs-border_left">
									<td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">KDV</td>
									<td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right">
										<?= number_format($sale['totalVat'], 2, ",", ".") ?> <?= currency($sale['fkCurrency']) ?>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="cs-invoice_footer">
					<div class="cs-left_footer cs-mobile_hide"></div>
					<div class="cs-right_footer">
						<table>
							<tbody>
							<tr class="cs-border_left">
								<td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">Fatura Tutarı
								</td>
								<td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right">
									<?= number_format($sale['totalPriceWithVat'], 2, ",", ".") ?> <?= currency($sale['fkCurrency']) ?>

								</td>
							</tr>
							<tr class="cs-border_none " style="background: #dedede">
								<td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">Kalan Miktar</td>
								<td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right">
									<?= number_format($sale['balance'], 2, ",", ".") ?> <?= currency($sale['fkCurrency']) ?>

								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php
			if ($sale["invoiceNotes"]) {
				?>
				<div class="cs-note">
					<div class="cs-note_left">
						<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
							<path d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z"
								  fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
							<path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none"
								  stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
								  stroke-width="32"/>
						</svg>
					</div>

					<div class="cs-note_right">
						<p class="cs-mb0"><b class="cs-primary_color cs-bold">Notlar:</b></p>
						<p class="cs-m0"><?= $sale["invoiceNotes"] ?></p>
					</div>

				</div><!-- .cs-note -->
				<?php
			}
			?>
		</div>
		<div class="selectPaymentMethods" style="display:none;justify-content:center;margin-top: 40px">
			<label class="container">Havale/EFT
				<input type="radio" checked="checked" name="radio">
				<span class="checkmark"></span>
			</label>
			<label class="container">Kredi Kartı
				<input type="radio" name="radio">
				<span class="checkmark"></span>
			</label>
		</div>
		<div class="cs-invoice_btns cs-hide_print">
			<a href="javascript:window.print()" class="cs-invoice_btn cs-color1 printInvoiceButton">
				<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
					<path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24"
						  fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
					<rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none"
						  stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
					<path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none"
						  stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
					<circle cx="392" cy="184" r="24"/>
				</svg>
				<span>Yazdır</span>
			</a>
			<a style="display: none" href="javascript:void()" class="cs-invoice_btn cs-color3 cancelPaymentButton">
				<svg style="width: 16px" xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
					<g>
						<path d="M300.188,246L484.14,62.04c5.06-5.064,7.852-11.82,7.86-19.024c0-7.208-2.792-13.972-7.86-19.028L468.02,7.872
			c-5.068-5.076-11.824-7.856-19.036-7.856c-7.2,0-13.956,2.78-19.024,7.856L246.008,191.82L62.048,7.872
			c-5.06-5.076-11.82-7.856-19.028-7.856c-7.2,0-13.96,2.78-19.02,7.856L7.872,23.988c-10.496,10.496-10.496,27.568,0,38.052
			L191.828,246L7.872,429.952c-5.064,5.072-7.852,11.828-7.852,19.032c0,7.204,2.788,13.96,7.852,19.028l16.124,16.116
			c5.06,5.072,11.824,7.856,19.02,7.856c7.208,0,13.968-2.784,19.028-7.856l183.96-183.952l183.952,183.952
			c5.068,5.072,11.824,7.856,19.024,7.856h0.008c7.204,0,13.96-2.784,19.028-7.856l16.12-16.116
			c5.06-5.064,7.852-11.824,7.852-19.028c0-7.204-2.792-13.96-7.852-19.028L300.188,246z"/>
					</g>
				</svg>
				<span>İptal</span>
			</a>
			<a id="paymentButton" class="cs-invoice_btn cs-color2 paymentButton" style="margin-left: 10px">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
					 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
					 viewBox="0 0 502.685 502.685" style="enable-background:new 0 0 502.685 502.685;"
					 xml:space="preserve">
<g>
	<path d="M452.585,98.818H58.465c-5.247,0-9.5,4.253-9.5,9.5v14.98h-14.98c-5.247,0-9.5,4.253-9.5,9.5v14.979H9.5
		c-5.247,0-9.5,4.253-9.5,9.5v196.49c0,5.247,4.253,9.5,9.5,9.5h394.117c5.247,0,9.5-4.253,9.5-9.5v-14.98h14.978
		c5.247,0,9.5-4.253,9.5-9.5v-14.98h14.99c5.247,0,9.5-4.253,9.5-9.5v-196.49C462.085,103.071,457.832,98.818,452.585,98.818z
		 M46.808,166.777C43.341,180.385,32.607,191.118,19,194.586v-27.809H46.808z M394.117,194.586
		c-13.609-3.467-24.343-14.201-27.811-27.809h27.811V194.586z M346.917,166.777c4.027,24.105,23.095,43.173,47.201,47.199v83.09
		c-24.107,4.026-43.175,23.095-47.201,47.201H66.198C62.172,320.162,43.105,301.094,19,297.067v-83.091
		c24.105-4.028,43.171-23.094,47.198-47.199H346.917z M19,316.457c13.608,3.468,24.342,14.202,27.808,27.811H19V316.457z
		 M366.306,344.267c3.467-13.609,14.202-24.344,27.811-27.811v27.811H366.306z M418.595,319.787h-5.478v-162.51
		c0-5.247-4.253-9.5-9.5-9.5H43.484v-5.479h375.11V319.787z M443.085,295.307h-5.49v-162.51c0-5.247-4.253-9.5-9.5-9.5H67.965v-5.48
		h375.12V295.307z"/>
	<path d="M161.564,311.56c11.817,15.934,27.797,24.708,44.994,24.708c17.198,0,33.178-8.775,44.995-24.708
		c11.187-15.083,17.347-34.984,17.347-56.038c0-21.055-6.16-40.956-17.347-56.038c-11.817-15.934-27.797-24.708-44.995-24.708
		c-17.197,0-33.177,8.775-44.994,24.708c-11.187,15.082-17.347,34.983-17.347,56.038
		C144.218,276.576,150.378,296.478,161.564,311.56z M206.559,317.268c-9.053,0-17.463-3.981-24.423-10.77
		c1.486-12.161,11.868-21.612,24.423-21.612c12.556,0,22.938,9.451,24.424,21.612C224.022,313.287,215.612,317.268,206.559,317.268z
		 M206.562,265.49c-8.022,0-14.549-6.526-14.549-14.548c0-8.022,6.526-14.549,14.549-14.549c8.021,0,14.548,6.526,14.548,14.549
		C221.109,258.963,214.583,265.49,206.562,265.49z M206.559,193.776c23.898,0,43.342,27.699,43.342,61.747
		c0,11.458-2.209,22.189-6.042,31.396c-3.208-5.279-7.508-9.82-12.579-13.322c5.479-5.973,8.83-13.929,8.83-22.655
		c0-18.499-15.05-33.549-33.548-33.549c-18.499,0-33.549,15.05-33.549,33.549c0,8.725,3.35,16.68,8.829,22.653
		c-5.072,3.502-9.374,8.044-12.582,13.324c-3.833-9.206-6.042-19.938-6.042-31.396C163.218,221.475,182.66,193.776,206.559,193.776z
		"/>
</g></svg>
				<span>Ödeme Yap</span>
			</a>
			<!--			<button id="download_btn" class="cs-invoice_btn cs-color2">-->
			<!--				<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Download</title>-->
			<!--					<path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40"-->
			<!--						  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"-->
			<!--						  stroke-width="32"/>-->
			<!--					<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"-->
			<!--						  stroke-width="32" d="M176 272l80 80 80-80M256 48v288"/>-->
			<!--				</svg>-->
			<!--				<span>Download</span>-->
			<!--			</button>-->
		</div>
	</div>
</div>
