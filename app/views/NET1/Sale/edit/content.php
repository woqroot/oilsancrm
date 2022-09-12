<?php
?>
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<?= $CI->loadLayout("breadcrumb"); ?>
			<!--end::Page title-->
			<!--begin::Actions-->
			<div class="d-flex align-items-center gap-2 gap-lg-3">
				<!--begin::Filter menu-->
				<div class="m-0">
					<!--begin::Menu toggle-->
					<a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"
					   data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
						<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
						<span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
												 viewBox="0 0 24 24" fill="none">
												<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
													  fill="currentColor"/>
											</svg>
										</span>
						<!--end::Svg Icon-->Filter</a>
					<!--end::Menu toggle-->
					<!--begin::Menu 1-->
					<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
						 id="kt_menu_626f219616223">
						<!--begin::Header-->
						<div class="px-7 py-5">
							<div class="fs-5 text-dark fw-bolder">Filter Options</div>
						</div>
						<!--end::Header-->
						<!--begin::Menu separator-->
						<div class="separator border-gray-200"></div>
						<!--end::Menu separator-->
						<!--begin::Form-->
						<div class="px-7 py-5">
							<!--begin::Input group-->
							<div class="mb-10">
								<!--begin::Label-->
								<label class="form-label fw-bold">Status:</label>
								<!--end::Label-->
								<!--begin::Input-->
								<div>
									<select class="form-select form-select-solid" data-kt-select2="true"
											data-placeholder="Select option"
											data-dropdown-parent="#kt_menu_626f219616223" data-allow-clear="true">
										<option></option>
										<option value="1">Approved</option>
										<option value="2">Pending</option>
										<option value="2">In Process</option>
										<option value="2">Rejected</option>
									</select>
								</div>
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-10">
								<!--begin::Label-->
								<label class="form-label fw-bold">Member Type:</label>
								<!--end::Label-->
								<!--begin::Options-->
								<div class="d-flex">
									<!--begin::Options-->
									<label class="form-check form-check-sm form-check-custom form-check-solid me-5">
										<input class="form-check-input" type="checkbox" value="1"/>
										<span class="form-check-label">Author</span>
									</label>
									<!--end::Options-->
									<!--begin::Options-->
									<label class="form-check form-check-sm form-check-custom form-check-solid">
										<input class="form-check-input" type="checkbox" value="2" checked="checked"/>
										<span class="form-check-label">Customer</span>
									</label>
									<!--end::Options-->
								</div>
								<!--end::Options-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-10">
								<!--begin::Label-->
								<label class="form-label fw-bold">Notifications:</label>
								<!--end::Label-->
								<!--begin::Switch-->
								<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
									<input class="form-check-input" type="checkbox" value="" name="notifications"
										   checked="checked"/>
									<label class="form-check-label">Enabled</label>
								</div>
								<!--end::Switch-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="d-flex justify-content-end">
								<button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
										data-kt-menu-dismiss="true">Reset
								</button>
								<button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply
								</button>
							</div>
							<!--end::Actions-->
						</div>
						<!--end::Form-->
					</div>
					<!--end::Menu 1-->
				</div>
				<!--end::Filter menu-->
			</div>
			<!--end::Actions-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Toolbar-->
	<?php
	$currencySymbol = currency($sale["fkCurrency"]);
	?>
	<!--begin::Post-->
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<span class="currentSaleID d-none"><?= $sale["saleId"] ?></span>
		<span class="currentCurrencyID d-none"><?= $sale["fkCurrency"] ?></span>
		<span class="currentCurrency d-none"><?= $currencySymbol ?></span>
		<span class="currentCustomer d-none"><?= $sale["fkCustomer"] ?></span>

		<!--begin::Container-->
		<div id="kt_content_container" class="container-xxl">

			<!--begin::Layout-->
			<div class="row">
				<div class="col-2  rounded-0 h-100">
					<div class=" card rounded-0 h-100">
						<div class="card-body">

							<ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column mb-3 mb-md-0 fs-6">
								<li class="nav-item w-md-150px me-0">
									<a class="nav-link active" data-bs-toggle="tab" href="#invoice">Satış
										Bilgileri</a>
								</li>
								<li class="nav-item w-md-150px">
									<a class="nav-link" data-bs-toggle="tab" href="#trialProducts">Deneme Süreçleri</a>
								</li>
								<li class="d-none nav-item w-md-150px me-0 ">
									<a class="nav-link" data-bs-toggle="tab" href="#collects">Tahsilatlar</a>
								</li>
								<li class="nav-item w-md-150px me-0">
									<a class="nav-link" data-bs-toggle="tab" href="#documents">Dokümanlar</a>
								</li>
								<li class="nav-item w-md-150px me-0">
									<a class="nav-link" data-bs-toggle="tab" href="#notes">Notlar</a>
								</li>

							</ul>
						</div>
					</div>
					<div class="mt-5 card rounded-0 h-100">
						<div class="card-body">
							<div class="fv-row d-none mb-7">
								<label class=" fw-bold  fs-6 mb-2">Kalan Bakiye</label>
								<div class="text-gray-600 currentBalance"><?= $currencySymbol . " " . showBalance($sale["balance"]) ?></div>
							</div>
							<div class="fv-row mb-7">
								<label class=" fw-bold  fs-6 mb-2">Durum</label>
								<div class="text-gray-600 "><span <?= $editable ? 'data-bs-target="#changeSaleStatusModal" data-bs-toggle="modal"' : ''; ?>
																  class="<?= $editable ? 'cursor-pointer' : ''; ?> changeStatus badge badge-<?= Main::getStatus($sale["fkStatus"])["className"] ?>"><?= Main::getStatus($sale["fkStatus"])["title"] ?></span>
								</div>
							</div>
							<div class="fv-row mb-7">
								<label class=" fw-bold  fs-6 mb-2">Son İşlem Tarihi</label>
								<div class="text-gray-600 "><?= showDate($sale["updatedAt"]) ?></div>
							</div>
							<div class="fv-row">
								<label class=" fw-bold  fs-6 mb-2">Satış Sorumlusu</label>
								<div class="text-gray-600 text-center">
									<div class="align-items-center">
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<a class=" cursor-default" href="javascript:void(0)">

												<div class="symbol"><?= getAvatar($user) ?></div>
											</a>
										</div>
										<div class="d-flex flex-column">
											<a href="javascript:void(0)"
											   class="fw-bold text-gray-500 cursor-default mb-1"><?= $user["firstName"] ?> <?= $user["lastName"] ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-10 tab-content" id="myTabContent">
					<div class="card mb-2">
						<div class="card-body">
							<?php
							if ($sale['fkStatus'] == 1) {
								$text = "Ön Bilgilendirme";
								$classNames = "bg-primary progress-bar-animated";
								$percent = 20;
							} elseif ($sale['fkStatus'] == 2) {
								$text = "Deneme Süreci";
								$classNames = "bg-info progress-bar-animated";
								$percent = 40;
							} elseif ($sale['fkStatus'] == 3) {
								$text = "Teklif Süreci";
								$classNames = "bg-success progress-bar-animated";
								$percent = 60;
							} elseif ($sale['fkStatus'] == 4) {
								$text = "Başarılı Satış";
								$classNames = "bg-success";
								$percent = 100;
							} elseif ($sale['fkStatus'] == 5) {
								$text = "Başarısız Satış";
								$classNames = "bg-danger";
								$percent = 100;
							} else {
								$text = "Bilinmiyor";
								$classNames = "bg-warning";
								$percent = 100;
							}
							?>
							<div data-bs-toggle="tooltip" title="<?= $text ?>" data-bs-placement="top" class="progress">

								<div class="progress-bar  progress-bar-striped <?= $classNames ?>"
									 role="progressbar"
									 style="width: <?= $percent ?>%"
									 aria-valuenow="10"
									 aria-valuemin="0"
									 aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade show active" id="invoice" role="tabpanel">
						<!--begin::Content-->
						<div class="flex-lg-row-fluid mb-10 mb-lg-0">
							<!--begin::Card-->
							<div class="card">
								<!--begin::Card body-->
								<div class="card-body p-12">
									<!--begin::Form-->
									<form action="" id="kt_invoice_form">
										<!--begin::Wrapper-->
										<input type="hidden" name="saleID" value="<?= $sale["saleId"] ?>">
										<div class="d-flex flex-column align-items-start flex-xxl-row">
											<!--begin::Input group-->
											<div class="d-flex align-items-center flex-equal fw-row me-4 order-2">
												<!--begin::Date-->
												<div class="fs-6 fw-bolder text-gray-700 text-nowrap">Tarih:
												</div>
												<!--end::Date-->
												<!--begin::Input-->
												<span class="d-none"
													  id="defInvoiceDate"><?= date('d M Y', strtotime($sale["invoiceDate"])) ?></span>
												<div class="position-relative d-flex align-items-center w-150px">
													<!--begin::Datepicker-->
													<input <?= !$editable ? "disabled" : ""; ?>
															class="form-control form-control-transparent fw-bolder pe-5"
															name="invoiceDate"/>
													<!--end::Datepicker-->
													<!--begin::Icon-->
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
													<span class="<?=!$editable ? "d-none" : "";?> svg-icon svg-icon-2 position-absolute ms-4 end-0">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																			  fill="currentColor"/>
																	</svg>
																</span>
													<!--end::Svg Icon-->
													<!--end::Icon-->
												</div>
												<!--end::Input-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="me-auto d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4"
												 data-bs-toggle="tooltip" data-bs-trigger="hover"
												 disabled
												 title="Satış Fatura Numarası">
												<span class="fs-2x fw-bolder text-gray-800">Fatura #</span>
												<input type="text" name="invoiceNumber"
														<?= writeDisableByPerm("edit-sale") ?>
														<?=!$editable ? "disabled" : "";?>
													   class="form-control form-control-flush fw-bolder text-muted fs-3 w-125px"
													   value="<?= $sale["invoiceNumber"] ?>" placehoder="..."/>
											</div>

											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="opacity-0 align-items-center justify-content-end flex-equal order-3 fw-row"
												 data-bs-toggle="tooltip" data-bs-trigger="hover">
												<a target="_blank"
												   href="<?= base_url("sales/" . $sale["saleId"] . "/view") ?>"
												   type="button" role="button" class="btn btn-light-primary"><i
															class="fa fa-eye"></i> Fatura Görüntüle
												</a>
											</div>


											<!--end::Input group-->
										</div>
										<!--end::Top-->
										<!--begin::Separator-->
										<div class="separator separator-dashed my-10"></div>
										<!--end::Separator-->
										<!--begin::Wrapper-->
										<div class="mb-0">
											<!--begin::Row-->

											<div class="row gx-10 mb-5">
												<!--begin::Col-->
												<div class="col-lg-6">
													<!--begin::Input group-->

													<div class="mb-1">
														<h6><?= $company['name'] ?></h6>
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="mb-1">
														<?= $company['address'] ?>
													</div>
													<div class="mb-5">
														<?= $company['taxNumber'] ?> / <?= $company['taxOffice'] ?>
													</div>
													<!--end::Input group-->

												</div>
												<!--end::Col-->
												<!--begin::Col-->
												<div class="col-lg-6 text-end customerInformation">
													<!--begin::Input group-->

													<div class="mb-1">
														<h6 class="name"><a target="_blank"
																			href="<?= base_url("customers/" . $customer["customerId"]) ?>"
																			class="badge badge-sm text-hover-primary badge-light-primary"><i
																		class="fa fa-eye"></i></a> <span
																	class="editCustomer cursor-pointer badge badge-sm text-hover-primary badge-light-primary"><i
																		class="fa fa-edit"></i></span> <?= $customer["name"] ?>
														</h6>
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="address">
														<?= $customer["address"] ?>
													</div>
													<div class="mb-5 addressAgain">
														<?= getDistrict($customer["fkDistrict"]) ?>
														/ <?= getCity($customer["fkCity"]) ?>
														- <?= getCountry($customer["fkCountry"]) ?>
													</div>
													<div class="mb-5 taxInformation">
														<?= $customer["taxNumber"] . " / " . $customer["taxOffice"] ?>
													</div>
													<!--end::Input group-->

												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
											<!--begin::Table wrapper-->
											<div class="table-responsive mb-10">
												<!--begin::Table-->
												<table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700"
													   data-kt-element="items">
													<!--begin::Table head-->
													<thead>
													<tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
														<th class="min-w-250px mw-250px">Ürün/Hİzmet</th>
														<th colspan="2" class="min-w-100px mw-100px">Miktar</th>
														<th class="min-w-100px mw-125px">Fiyat</th>
														<th class="d-none min-w-100px mw-100px">KDV</th>
														<th class="min-w-150px mw-150px text-start">Tutar</th>
													</tr>
													</thead>
													<!--end::Table head-->
													<!--begin::Table body-->
													<tbody>
													<?php

													foreach ($products as $product) {
														?>
														<tr class="border-bottom border-bottom-dashed"
															data-kt-element="item">

															<td class="pe-7">
																<input type="hidden"
																	   name="product[old][saleProductId][]"
																	   value="<?= $product["saleProductId"] ?>">
																<div data-bs-toggle="tooltip"
																	 title="Kod: #<?= $product["item"]["productCode"] ?>"
																	 data-bs-placement="bottom"
																	 class="productInputArea position-relative">
																	<?php
																	$tooltip = "<b>" . $product["item"]["name"] . "</b><br><b>Varsayılan Fiyat: </b>" . $product["item"]["totalPrice"] . " " . currency($product["item"]["fkCurrency"]) . "<br>";


																	if ($product["item"]["brand"]) {
																		$tooltip .= "<b>Marka: </b>" . $product["item"]["brand"]["title"] . "<br>";
																	}
																	if ($product["item"]["productType"]) {
																		$tooltip .= "<b>Ürün Tipi: </b>" . $product["item"]["productType"]["title"] . "<br>";
																	}
																	if ($product["item"]["productPack"]) {
																		$tooltip .= "<b>Ambalaj: </b>" . $product["item"]["productPack"]["title"] . "<br>";
																	}
																	if ($product["item"]["productFluidity"]) {
																		$tooltip .= "<b>Akışkanlık Der: </b>" . $product["item"]["productFluidity"]["title"] . "<br>";
																	}
																	if ($product["item"]["type"] == "PRODUCT") {
//																		$tooltip .= "<b>Stok Takip: </b>";
//																		$tooltip .= $product["item"]["stockTracking"] == "ACTIVE" ? "Aktif <br><b>Güncel Stok: </b>" . $product["item"]["stock"] . " " . Main::unit($product["item"]["fkUnit"]) : "Pasif";

																	}
																	?>
																	<input type="text" disabled readonly
																		   class="productInput pe-20 bg-secondary form-control form-control-solid mb-2"
																		   name="product[old][name][]"
																		   value="<?= $product["item"]["name"] ?>"
																		   placeholder="Ürün/Hizmet Adı"/>
																	<span style="display: none"
																		  class="badge badge-success badge-sm inputNewTag">Yeni</span>
																	<span class="inputInfoTag"><i
																				data-bs-toggle="tooltip"
																				data-bs-html="true"
																				title="<?= $tooltip ?>"
																				class="fa fa-info-circle"></i></span>
																</div>
															</td>
															<td class="ps-0" colspan="2">
																<div class="d-flex">
																	<input class="form-control form-control-solid me-3"
																			<?= writeDisableByPerm("edit-sale") ?>
																		   type="number" min="1"
																		   name="product[old][quantity][]"
																		   placeholder="1"
																		   value="<?= $product["quantity"] ?>"
																		   data-kt-element="quantity"/>

																	<select class="form-control form-control-solid"
																			type="number"
																			<?= writeDisableByPerm("edit-sale") ?>
																			name="product[old][unit][]"
																			data-kt-element="unit">
																		<?php
																		foreach ($units as $unit) {
																			?>
																			<option <?= $product["fkUnit"] == $unit["unitId"] ? "selected" : ""; ?>
																					value="<?= $unit["unitId"] ?>"><?= $unit["name"] ?></option>
																			<?php
																		}
																		?>
																	</select>
																</div>
															</td>
															<td>
																<input type="text"
																	   class="form-control form-control-solid text-end"
																	   name="product[old][price][]" placeholder="0,00"
																	   value="<?= number_format($product["unitPrice"], 4, ",", ".") ?>"
																	   data-kt-element="price"
																		<?= writeDisableByPerm("edit-sale") ?>/>
															</td>
															<td class="d-none">
																<select class="form-control form-control-solid"
																		name="product[old][vat][]"
																		<?= writeDisableByPerm("edit-sale") ?>
																		data-kt-element="vat">
																	<?php
																	foreach (getVats() as $vat) {
																		?>
																		<option <?= $vat == $product["vatPercent"] ? "selected" : ""; ?>
																				value="<?= $vat ?>">
																			%<?= $vat ?></option>
																		<?php
																	}
																	?>
																</select>
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<div class="input-group input-group-solid">
																		<div class="dropdown">
																	<span id="dropdownMenuButton1"
																		  data-bs-toggle="dropdown"
																		  aria-expanded="false"
																		  class="input-group-text currencySymbol bg-light-primary "></span>
																		</div>
																		<input type="text"
																				<?= writeDisableByPerm("edit-sale") ?>
																			   class="form-control form-control-solid text-end"
																			   name="product[old][totalPriceWithVat][]"
																			   placeholder="0,00"
																			   value="<?= number_format($product["totalPriceWithVat"], 2, ",", ".") ?>"
																			   data-kt-element="total"/>
																	</div>
																	<button type="button"
																			class="btn btn-sm btn-icon btn-active-color-danger"
																			data-kt-element="remove-item">
																		<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																		<span class="svg-icon svg-icon-3">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
																							  fill="currentColor"/>
																						<path opacity="0.5"
																							  d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
																							  fill="currentColor"/>
																						<path opacity="0.5"
																							  d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
																							  fill="currentColor"/>
																					</svg>
																				</span>
																		<!--end::Svg Icon-->
																	</button>
																</div>

															</td>
														</tr>
														<?php
													}
													?>
													</tbody>
													<!--end::Table body-->
													<!--begin::Table foot-->
													<tfoot>
													<tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700">

														<th class="">
															<button type="button"
																	class="btn btn-light-primary me-3 <?= hideByPerm("edit-sale") ?>"
																	data-kt-element="add-item">
														<span class="svg-icon svg-icon-2">
															<i class="fa fa-plus"></i>
														</span>
																Ekle
															</button>
														</th>

														<th colspan="2"
															class="d-none border-bottom border-bottom-dashed ps-0">
															<div class="d-flex flex-column align-items-start">
																<div class="fs-5">Toplam</div>
																<div class="d-none fs-5">KDV Toplamı</div>
															</div>
														</th>
														<th colspan="2"
															class="d-none border-bottom border-bottom-dashed text-end">
															<span class="currencySymbol"></span>
															<span data-kt-element="sub-total">0.00</span><br>
															<span class="d-none currencySymbol"></span>
															<span class="d-none "
																  data-kt-element="vat-total">0.00</span>

														</th>

													</tr>
													<tr class="align-top fw-bolder text-gray-700">
														<th></th>
														<th colspan="2" class="fs-4 ps-0">Toplam</th>
														<th colspan="2" class="text-end fs-4 text-nowrap"><span
																	class="currencySymbol"></span>
															<span data-kt-element="grand-total">0.00</span></th>
													</tr>
													<tr class="d-none align-top fw-bolder text-gray-700">
														<th></th>
														<th colspan="2" class="fs-4 ps-0">Kalan Bakiye</th>
														<th colspan="2" class="text-end fs-4 text-nowrap">
															<span><button class="btn btn-sm btn-success currentBalance"
																		  type="button"><span
																			class="currencySymbol"></span> </button> </span>
														</th>
													</tr>
													</tfoot>
													<!--end::Table foot-->
												</table>
											</div>
											<!--end::Table-->
											<!--begin::Item template-->
											<table class="table d-none" data-kt-element="item-template">
												<tr class="border-bottom border-bottom-dashed" data-kt-element="item">
													<td class="pe-7">
														<div class="productInputArea position-relative">

															<input type="text"
																	<?= writeDisableByPerm("edit-sale") ?>
																   class="productInput pe-20 form-control form-control-solid mb-2"
																   name="product[new][name][]"
																   placeholder="Ürün/Hizmet Adı"/>
															<span style="display: none"
																  class="badge badge-success badge-sm inputNewTag">Yeni</span>
															<span style="display: none" class="inputInfoTag"><i
																		data-bs-toggle="tooltip" data-bs-html="true"
																		class="fa fa-info-circle"></i></span>
														</div>
													</td>
													<td class="ps-0" colspan="2">
														<div class="d-flex">
															<input class="form-control form-control-solid me-3"
																   type="number"
																	<?= writeDisableByPerm("edit-sale") ?>
																   min="1"
																   name="product[new][quantity][]" placeholder="1"
																   value="1"
																   data-kt-element="quantity"/>

															<select class="form-control form-control-solid"
																	type="number"
																	min="1"
																	<?= writeDisableByPerm("edit-sale") ?>
																	name="product[new][unit][]"
																	data-kt-element="unit">
																<?php
																foreach ($units as $unit) {
																	?>
																	<option value="<?= $unit["unitId"] ?>"><?= $unit["name"] ?></option>
																	<?php
																}
																?>
															</select>
														</div>
													</td>
													<td>
														<input type="text"
															   class="form-control form-control-solid text-end"
															   name="product[new][price][]" placeholder="0,00"
															   value="0,00"
																<?= writeDisableByPerm("edit-sale") ?>
															   data-kt-element="price"/>
													</td>
													<td class="d-none">
														<select class="form-control form-control-solid"
																name="product[new][vat][]"
																<?= writeDisableByPerm("edit-sale") ?>
																data-kt-element="vat">
															<?php
															foreach (getVats() as $vat) {
																?>
																<option value="<?= $vat ?>">%<?= $vat ?></option>
																<?php
															}
															?>
														</select>
													</td>
													<td>
														<div class="d-flex align-items-center">
															<div class="input-group input-group-solid">
																<div class="dropdown">
															<span id="dropdownMenuButton1" data-bs-toggle="dropdown"
																  aria-expanded="false"
																  class="input-group-text currencySymbol bg-light-primary "></span>
																</div>
																<input type="text" data-input-type='decimal'
																	   class="form-control form-control-solid text-end"
																	   name="product[new][totalPriceWithVat][]"
																		<?= writeDisableByPerm("edit-sale") ?>
																	   placeholder="0,00"
																	   value="0,00"
																	   data-kt-element="total"/>
															</div>
															<button type="button"
																	class="btn btn-sm btn-icon btn-active-color-danger"
																	data-kt-element="remove-item">
																<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
																<span class="svg-icon svg-icon-3">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
																							  fill="currentColor"/>
																						<path opacity="0.5"
																							  d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
																							  fill="currentColor"/>
																						<path opacity="0.5"
																							  d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
																							  fill="currentColor"/>
																					</svg>
																				</span>
																<!--end::Svg Icon-->
															</button>
														</div>

													</td>
												</tr>

											</table>
											<table class="table d-none" data-kt-element="empty-template">
												<tr data-kt-element="empty">
													<th colspan="5" class="text-muted text-center py-10">Veri yok</th>
												</tr>
											</table>
											<!--end::Item template-->
											<!--begin::Notes-->
											<div class="mb-6">
												<label class="form-label fs-6 fw-bolder text-gray-700">Satış Notları <i
															class="fa fa-info-circle" data-bs-toggle="tooltip"
															title="Satış notlarını yalnızca ekip üyeleri görebilir."></i></label>
												<textarea name="notes"
														  <?= !$editable ? "disabled" : ""; ?>
														<?= writeDisableByPerm("edit-sale") ?>
														  class="resize-none form-control form-control-solid"
														  rows="3"
														  placeholder=""><?= $sale["notes"] ?></textarea>
											</div>
											<!--end::Notes-->
											<!--begin::Notes-->
											<div class="mb-0">
												<label class="form-label fs-6 fw-bolder text-gray-700">Fatura Notu <i
															class="fa fa-info-circle" data-bs-toggle="tooltip"
															title="Bu alan, oluşturulan fatura şablonunda not olarak gösterilir."></i></label>
												<textarea name="invoiceNotes"
														  <?= !$editable ? "disabled" : ""; ?>
														<?= writeDisableByPerm("edit-sale") ?>
														  class="resize-none form-control form-control-solid"
														  rows="3"
														  placeholder=""><?= $sale["invoiceNotes"] ?></textarea>
											</div>
											<!--end::Notes-->
											<?php
											if ($editable) {
												?>
												<div class="mt-5 text-end">
													<button type="submit" class="btn btn-light-success">Değişiklikleri
														Kaydet
													</button>
												</div>
												<?php
											}
											?>
										</div>
										<!--end::Wrapper-->
									</form>
									<!--end::Form-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Content-->
					</div>
					<div class="tab-pane fade " id="trialProducts" role="tabpanel">
						<!--begin::Content-->
						<div class="flex-lg-row-fluid mb-10 mb-lg-0">
							<!--begin::Card-->
							<div class="card">

								<div class="card-header border-0 pt-6">
									<!--begin::Card title-->
									<div class="card-title">
										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-1 position-absolute ms-6">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														 viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
															  height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
															  fill="currentColor"></rect>
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
															  fill="currentColor"></path>
													</svg>
												</span>
											<!--end::Svg Icon-->
											<input type="text" data-kt-filter="searchTrialProductInput"
												   class="form-control form-control-solid w-250px ps-15"
												   placeholder="Tabloda ara">
										</div>
										<!--end::Search-->
									</div>
									<!--begin::Card title-->
									<div class="card-toolbar">
										<div class="d-flex justify-content-end ms-4"
											 data-kt-customer-table-toolbar="base">

											<!--begin::Add customer-->
											<button class="btn btn-primary" data-bs-toggle="modal"
													data-bs-target="#addTrialProductModal"><i class="fa fa-plus"></i>
												Deneme Ürünü Ekle
											</button>
											<!--end::Add customer-->
										</div>
									</div>
								</div>
								<!--begin::Card body-->
								<div class="card-body p-12">
									<div class="d-flex flex-column align-items-start flex-xxl-row">
										<table class="table align-middle table-row-dashed fs-6 gy-5 trialProducts-datatable">
											<!--begin::Table head-->
											<thead>
											<!--begin::Table row-->
											<tr class="table-hover  text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

												<th class="min-w-50px">#</th>
												<th class="min-w-125px">Ürün</th>
												<th class="min-w-125px">Verildiği Tarih</th>
												<th class="min-w-125px">Durum</th>
												<th class="min-w-">İşlem</th>
											</tr>
											<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="text-gray-600 fw-bold cursor-pointer">


											</tbody>
										</table>
									</div>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Content-->
					</div>
					<div class="tab-pane fade " id="collects" role="tabpanel">
						<!--begin::Content-->
						<div class="flex-lg-row-fluid mb-10 mb-lg-0">
							<!--begin::Card-->
							<div class="card">

								<div class="card-header border-0 pt-6">
									<!--begin::Card title-->
									<div class="card-title">
										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-1 position-absolute ms-6">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														 viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
															  height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
															  fill="currentColor"></rect>
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
															  fill="currentColor"></path>
													</svg>
												</span>
											<!--end::Svg Icon-->
											<input type="text" data-kt-filter="searchCollectInput"
												   class="form-control form-control-solid w-250px ps-15"
												   placeholder="Tabloda ara">
										</div>
										<!--end::Search-->
									</div>
									<div id="kt_datatable_example_1_export" class="d-none"></div>
									<!--begin::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Export dropdown-->
										<button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click"
												data-kt-menu-placement="bottom-end">
											<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														 viewBox="0 0 24 24" fill="none">
														<rect opacity="0.3" x="12.75" y="4.25" width="12" height="2"
															  rx="1" transform="rotate(90 12.75 4.25)"
															  fill="currentColor"></rect>
														<path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
															  fill="currentColor"></path>
														<path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
															  fill="#C4C4C4"></path>
													</svg>
												</span>
											Dışa Aktar
										</button>
										<div class="d-none" id="exportTitle">#<?= $sale["invoiceNumber"] ?> Tahsilat
											Raporu | <?= $customer["name"] ?></div>
										<!--begin::Menu-->
										<div id="kt_datatable_example_1_export_menu"
											 class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-200px py-4"
											 data-kt-menu="true">

											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-export="excel">
													Excel'e aktar
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-export="csv">
													CSV'e aktar
												</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3" data-kt-export="pdf">
													PDF'e aktar
												</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu-->
										<!--end::Export dropdown-->
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end ms-4"
											 data-kt-customer-table-toolbar="base">

											<!--begin::Add customer-->
											<button class="btn btn-primary <?= hideByPerm('add-collect') ?>"
													data-bs-toggle="modal"
													data-bs-target="#addCollectModal"><i class="fa fa-plus"></i>
												Tahsilat
												Ekle
											</button>
											<!--end::Add customer-->
											<!--begin::Add supplier-->
											<button class="ms-4 btn btn-primary <?= hideByPerm('add-collect') ?>"
													data-bs-toggle="modal"
													data-bs-target="#addCollectAutoModal"><i class="fa fa-plus"></i>
												Otomatik Plan Oluştur
											</button>
											<!--end::Add supplier-->
										</div>
										<!--end::Toolbar-->
										<!--begin::Group actions-->
										<div class="d-flex justify-content-end align-items-center d-none"
											 data-kt-customer-table-toolbar="selected">
											<div class="fw-bolder me-5">
												<span class="me-2"
													  data-kt-customer-table-select="selected_count"></span>Selected
											</div>
											<button type="button" class="btn btn-danger"
													data-kt-customer-table-select="delete_selected">Delete Selected
											</button>
										</div>
										<!--end::Group actions-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--begin::Card body-->
								<div class="card-body p-12">
									<div class="d-flex flex-column align-items-start flex-xxl-row">
										<table class="table table-hover align-middle table-row-dashed fs-6 gy-5 collects-datatable">
											<!--begin::Table head-->
											<thead>
											<!--begin::Table row-->
											<tr class="table-hover  text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

												<th class="min-w-50px">İşlem ID</th>
												<th class="min-w-125px">Tahsilat Tarihi</th>
												<th class="min-w-125px">Tutar</th>
												<th class="min-w-125px">Hesap</th>
												<th class="min-w-125px">Açıklama</th>
												<th class="min-w-"></th>
											</tr>
											<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="text-gray-600 fw-bold cursor-pointer">


											</tbody>
										</table>
									</div>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Content-->
					</div>
					<div class="tab-pane fade " id="documents" role="tabpanel">
						<!--begin::Content-->
						<div class="flex-lg-row-fluid mb-10 mb-lg-0">
							<!--begin::Card-->
							<div class="card">

								<div class="card-header border-0 pt-6">
									<!--begin::Card title-->
									<div class="card-title">

										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-1 position-absolute ms-6">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														 viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
															  height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
															  fill="currentColor"></rect>
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
															  fill="currentColor"></path>
													</svg>
												</span>
											<!--end::Svg Icon-->
											<input type="text" data-kt-filter="searchDocumentInput"
												   class="form-control form-control-solid w-250px ps-15"
												   placeholder="Tabloda ara">
										</div>
										<!--end::Search-->
									</div>
									<div id="kt_datatable_example_1_export" class="d-none"></div>
									<!--begin::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Export dropdown-->

										<div class="d-none" id="exportTitle">#<?= $sale["invoiceNumber"] ?> Tahsilat
											Raporu | <?= $customer["name"] ?></div>
										<!--end::Export dropdown-->
										<!--begin::Toolbar-->
										<div class="d-flex justify-content-end ms-4"
											 data-kt-customer-table-toolbar="base">

											<!--begin::Add customer-->
											<button class="btn btn-primary"
													data-bs-target="#addDocumentModal"
													data-bs-toggle="modal">
												<i class="fa fa-upload"></i> Dosya Yükle
											</button>
											<!--end::Add customer-->
										</div>
										<!--end::Toolbar-->
										<!--begin::Group actions-->
										<div class="d-flex justify-content-end align-items-center d-none"
											 data-kt-customer-table-toolbar="selected">
											<div class="fw-bolder me-5">
												<span class="me-2"
													  data-kt-customer-table-select="selected_count"></span>Selected
											</div>
											<button type="button" class="btn btn-danger"
													data-kt-customer-table-select="delete_selected">Delete Selected
											</button>
										</div>
										<!--end::Group actions-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--begin::Card body-->
								<div class="card-body p-12">
									<div class="d-flex flex-column align-items-start flex-xxl-row">
										<table class="table align-middle table-row-dashed fs-6 gy-5 documents-datatable">
											<!--begin::Table head-->
											<thead>
											<!--begin::Table row-->
											<tr class="table-hover  text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

												<th class="min-w-50px">#</th>
												<th class="min-w-125px">Doküman Adı</th>
												<th class="min-w-125px">Yükleme Tarihi</th>
												<th class="min-w-125px">Yükleyen</th>
												<th class="min-w-">İşlem</th>
											</tr>
											<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="text-gray-600 fw-bold cursor-pointer">


											</tbody>
										</table>
									</div>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Content-->
					</div>
					<div class="tab-pane fade " id="notes" role="tabpanel">
						<!--begin::Content-->
						<div class="flex-lg-row-fluid mb-10 mb-lg-0">
							<!--begin::Card-->
							<div class="card">

								<div class="card-header border-0 pt-6">
									<!--begin::Card title-->
									<div class="card-title">
										<!--begin::Search-->
										<div class="d-flex align-items-center position-relative my-1">
											<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
											<span class="svg-icon svg-icon-1 position-absolute ms-6">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														 viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
															  height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
															  fill="currentColor"></rect>
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
															  fill="currentColor"></path>
													</svg>
												</span>
											<!--end::Svg Icon-->
											<input type="text" data-kt-filter="searchNoteInput"
												   class="form-control form-control-solid w-250px ps-15"
												   placeholder="Tabloda ara">
										</div>
										<!--end::Search-->
									</div>
									<!--begin::Card title-->
									<div class="card-toolbar">
										<div class="d-flex justify-content-end ms-4"
											 data-kt-customer-table-toolbar="base">

											<!--begin::Add customer-->
											<button class="btn btn-primary" data-bs-toggle="modal"
													data-bs-target="#addNoteModal"><i class="fa fa-plus"></i>
												Not Ekle
											</button>
											<!--end::Add customer-->
										</div>
									</div>
								</div>
								<!--begin::Card body-->
								<div class="card-body p-12">
									<div class="d-flex flex-column align-items-start flex-xxl-row">
										<table class="table align-middle table-row-dashed fs-6 gy-5 notes-datatable">
											<!--begin::Table head-->
											<thead>
											<!--begin::Table row-->
											<tr class="table-hover  text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

												<th class="min-w-50px">#</th>
												<th class="min-w-125px">Not İçeriği</th>
												<th class="min-w-125px">Tarih</th>
												<th class="min-w-125px">Oluşturan</th>
												<th class="min-w-">İşlem</th>
											</tr>
											<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="text-gray-600 fw-bold cursor-pointer">


											</tbody>
										</table>
									</div>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Content-->
					</div>
					<div class="tab-pane fade " id="logs" role="tabpanel">
						<!--begin::Content-->
						<div class="flex-lg-row-fluid mb-10 mb-lg-0">
							<!--begin::Card-->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">İşlem Geçmişi</h3>
								</div>
								<!--begin::Card body-->
								<div class="card-body p-12">
									<div class="d-flex flex-column align-items-start flex-xxl-row">
										<table class="table table-striped align-middle table-row-dashed fs-6 gy-5 logs-datatable">
											<!--begin::Table head-->
											<thead>
											<!--begin::Table row-->
											<tr class="table-hover table-striped text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

												<th class="min-w-50px">#</th>
												<th class="min-w-125px">Yapılan İşlem</th>
												<th class="min-w-125px">Tarih</th>
												<th class="min-w-125px">İşlem Yapan</th>
											</tr>
											<!--end::Table row-->
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody class="text-gray-600 fw-bold cursor-pointer">


											</tbody>
										</table>
									</div>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end::Content-->
					</div>
				</div>
				<!--begin::Sidebar-->
				<!--end::Sidebar-->


			</div>
			<!--end::Layout-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
<!--end::Content-->
<div id="userRole"><?= Auth::get('fkRole') ?></div>
<div class="modal fade <?= hideByPerm() ?>" id="addCollectModal" data-bs-backdrop="static"
	 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-750px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="kt_modal_add_user_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder formTitle">Tahsilat Ekle</h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-icon btn-sm btn-active-icon-primary"
					 data-bs-dismiss="modal">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
					<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16"
																			  height="2" rx="1"
																			  transform="rotate(-45 6 17.3137)"
																			  fill="currentColor"/>
																		<rect x="7.41422" y="6" width="16" height="2"
																			  rx="1" transform="rotate(45 7.41422 6)"
																			  fill="currentColor"/>
																	</svg>
																</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
				<!--begin::Form-->
				<form id="addCollectForm" enctype="multipart/form-data" class="form"
					  action="#">
					<input type="hidden" name="action" value="ADD">
					<input type="hidden" name="saleID" value="<?= $sale["saleId"] ?>">
					<input type="hidden" name="customerID" value="<?= $sale["fkCustomer"] ?>">
					<input type="hidden" name="currencyID" value="<?= $sale["fkCurrency"] ?>">
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7"
						 id="kt_modal_add_user_scroll" data-kt-scroll="true"
						 data-kt-scroll-activate="{default: false, lg: true}"
						 data-kt-scroll-max-height="auto"
						 data-kt-scroll-dependencies="#kt_modal_add_user_header"
						 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
						 data-kt-scroll-offset="300px">
						<!--begin::Input group-->
						<!--end::Input group-->
						<div class="row">

							<div class="col-lg-12">
								<div class="fv-row mb-5 row">
									<div class="col-md-6 col-sm-12 fv-row ">
										<label class="required fw-bold  fs-6 mb-2">Tutar</label>
										<!--end::Label-->
										<div class="input-group input-group-solid">
											<span class="input-group-text"><?= $currencySymbol ?></span>
											<input required maxlength="13" name="amount" type="text"
												   placeholder="0,00"
												   data-input-type="decimal" class="form-control form-control-solid">
										</div>
									</div>
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label for="zyx" class="required form-label fw-bolder fs-6 text-gray-700">Hesap
											Seçimi</label>
										<!--end::Label-->
										<!--begin::Select-->
										<select required name="accountID" data-dropdown-parent data-control="select2"
												data-placeholder="Kasa/Banka Seçimi"
												class="form-select form-select-solid ">
											<option value="">Lütfen Seçin</option>

										</select>
										<!--end::Select-->
									</div>
								</div>
								<div class="fv-row mb-5 row">
									<div class="col-md-6 col-sm-12 fv-row ">
										<label class="required fw-bold  fs-6 mb-2">İşlem Tarihi</label>
										<!--end::Label-->

										<input required value="" name="collectDate" type="text"
											   class="form-control collectDate form-control-solid">

									</div>
									<div class="col-md-6 col-sm-12 fv-row ">
										<label class="fw-bold  fs-6 mb-2">Dekont/Makbuz</label>
										<!--end::Label-->

										<input value="" name="fileName" type="file"
											   class="form-control form-control-solid">

									</div>
								</div>
								<div class="fv-row mb-5 ">
									<div class="col-md-12 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Açıklama</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea name="explanation" id=""
												  class="form-control form-control-solid resize-none"></textarea>
										<!--end::Input-->
									</div>
								</div>
								<div class="fv-row mb-5">
									<div class="col-md-12 col-sm-12 fv-row">
										<div class="form-check form-check-custom form-check-success form-check-solid">
											<input id="isCollectedNew" class="form-check-input" type="checkbox"
												   name="isCollected"
												   value="1" checked/>
											<label class="form-check-label" for="isCollectedNew">
												Ödeme alındı
											</label>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-light me-3"
								data-kt-users-modal-action="cancel" data-bs-dismiss="modal">
							Kapat
						</button>
						<button type="submit" class="btn btn-primary"
								data-kt-users-modal-action="submit">
							<span class="indicator-label">Kaydet</span>
							<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>

<div class="modal fade <?= hideByPerm() ?>" id="addCollectAutoModal" data-bs-backdrop="static"
	 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-750px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="kt_modal_add_user_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder formTitle">Otomatik Ödeme Planı Oluştur</h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-icon btn-sm btn-active-icon-primary"
					 data-bs-dismiss="modal">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
					<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16"
																			  height="2" rx="1"
																			  transform="rotate(-45 6 17.3137)"
																			  fill="currentColor"/>
																		<rect x="7.41422" y="6" width="16" height="2"
																			  rx="1" transform="rotate(45 7.41422 6)"
																			  fill="currentColor"/>
																	</svg>
																</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
				<!--begin::Form-->
				<form id="addCollectAutoForm" enctype="multipart/form-data" class="form"
					  action="">
					<input type="hidden" name="action" value="ADD_BULK">
					<input type="hidden" name="saleID" value="<?= $sale["saleId"] ?>">
					<input type="hidden" name="customerID" value="<?= $sale["fkCustomer"] ?>">
					<input type="hidden" name="currencyID" value="<?= $sale["fkCurrency"] ?>">
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7"
						 id="kt_modal_add_user_scroll" data-kt-scroll="true"
						 data-kt-scroll-activate="{default: false, lg: true}"
						 data-kt-scroll-max-height="auto"
						 data-kt-scroll-dependencies="#kt_modal_add_user_header"
						 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
						 data-kt-scroll-offset="300px">
						<!--begin::Input group-->
						<!--end::Input group-->
						<div class="row">

							<div class="col-lg-12">
								<div class="fv-row mb-7 text-center">
									<!--begin::Radio group-->
									<div class="btn-group w-100 w-lg-50 " data-kt-buttons="true"
										 data-kt-buttons-target="[data-kt-button]">
										<!--begin::Radio-->
										<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary active"
											   data-kt-button="true">
											<!--begin::Input-->
											<input class="btn-check" checked type="radio"
												   name="autoCollectType"
												   value="INSTALLMENT"/>
											<!--end::Input-->
											Taksitli Plan
										</label>
										<!--end::Radio-->
										<!--begin::Radio-->
										<label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-primary "
											   data-kt-button="true">
											<!--begin::Input-->
											<input class="btn-check" type="radio" name="autoCollectType"
												   value="REPEAT"/>
											<!--end::Input-->
											Düzenli Tekrar
										</label>
										<!--end::Radio-->
									</div>
								</div>
								<div class="fv-row mb-5 row">
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label for="zyx" class="required form-label fw-bold fs-6">Periyot
											Seçimi</label>
										<!--end::Label-->
										<!--begin::Select-->
										<select required name="periodType" data-dropdown-parent="#addCollectAutoModal"
												data-control="select2"

												data-placeholder="Periyot Seçimi"
												class="form-select form-select-solid">
											<option value="monthly" selected>Aylık</option>
											<option value="weekly">Haftalık</option>
											<option value="yearly">Yıllık</option>

										</select>
										<!--end::Select-->
									</div>
									<div class="col-md-6 col-sm-12 fv-row showOnInstallment">
										<label class="required fw-bold  fs-6 mb-2">Taksitlendirilecek Tutar</label>
										<!--end::Label-->
										<div class="input-group input-group-solid">
											<span class="input-group-text"><?= $currencySymbol ?></span>
											<input required name="totalAmount" type="text"
												   placeholder="0,00"
												   value="<?= showBalance($sale["balance"]) ?>"
												   data-input-type="decimal" class="form-control form-control-solid">
										</div>

									</div>
									<div class="col-md-6 col-sm-12 fv-row showOnRepeat" style="display: none">
										<label class="required fw-bold  fs-6 mb-2"><span
													class="currentPeriodType">Aylık</span> Tutar</label>
										<!--end::Label-->
										<div class="input-group input-group-solid">
											<span class="input-group-text"><?= $currencySymbol ?></span>
											<input required name="periodAmount" type="text"
												   placeholder="0,00"
												   value="<?= showBalance($sale["balance"]) ?>"
												   data-input-type="decimal" class="form-control form-control-solid">
										</div>

									</div>
								</div>
								<div class="fv-row mb-5 row">
									<!--begin::Input wrapper-->
									<div class="col-6">


										<div class="d-flex flex-column col-12">
											<!--begin::Label-->
											<label class="d-flex align-items-center fs-6 fw-bold mb-2">
												<span>Periyot sayısı</span>
												<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
												   title="Oluşturulacak ödeme planlarının vade sayısını ifade eder."></i>
											</label>
											<!--end::Label-->
											<!--begin::Buttons-->

											<!--begin::Buttons-->
											<!--begin::Dialer-->
											<div class="position-relative "
												 data-kt-dialer="true"
												 data-kt-dialer-min="1"
												 data-kt-dialer-max="36"
												 data-kt-dialer-step="1">

												<!--begin::Decrease control-->
												<button type="button"
														class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0"
														data-kt-dialer-control="decrease">
													<!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
													<span class="svg-icon svg-icon-1">
																<svg width="24" height="24" viewBox="0 0 24 24"
																	 fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.3" x="2" y="2" width="20"
																		  height="20" rx="5" fill="currentColor"></rect>
																	<rect x="6.0104" y="10.9247" width="12" height="2"
																		  rx="1" fill="currentColor"></rect>
																</svg>
															</span>
													<!--end::Svg Icon-->
												</button>
												<!--end::Decrease control-->

												<!--begin::Input control-->
												<input type="text"
													   class="form-control form-control-solid border-0 ps-12"
													   data-kt-dialer-control="input" placeholder="Amount"
													   name="periodCount" readonly value="1"/>
												<!--end::Input control-->

												<!--begin::Increase control-->
												<button type="button"
														class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0"
														data-kt-dialer-control="increase">
													<!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
													<span class="svg-icon svg-icon-1">
																<svg width="24" height="24" viewBox="0 0 24 24"
																	 fill="none" xmlns="http://www.w3.org/2000/svg">
																	<rect opacity="0.3" x="2" y="2" width="20"
																		  height="20" rx="5" fill="currentColor"></rect>
																	<rect x="10.8891" y="17.8033" width="12" height="2"
																		  rx="1" transform="rotate(-90 10.8891 17.8033)"
																		  fill="currentColor"></rect>
																	<rect x="6.01041" y="10.9247" width="12" height="2"
																		  rx="1" fill="currentColor"></rect>
																</svg>
															</span>
													<!--end::Svg Icon-->
												</button>
												<!--end::Increase control-->
											</div>
											<!--end::Dialer-->


										</div>
									</div>
									<!--end::Input wrapper-->
									<div class="col-6">


										<div class="col-md-12 col-sm12 fv-row ">
											<label class="required fw-bold  fs-6 mb-2">İlk Ödeme Tarihi</label>
											<!--end::Label-->

											<input required value="" name="firstCollectDate" type="text"
												   class="form-control firstCollectDate form-control-solid">
										</div>
									</div>

									<div class="fv-row mb-5 row">


										<div class="d-flex align-items-center justify-content-center mt-4">
											<button type="button" class="btn btn-light-primary"><span
														class="resultAmount"></span>
												<span class="currencySymbol"></span></button>
											<span class="svg-icon svg-icon-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="1" x="6" y="17.3137" width="16"
																			  height="2" rx="1"
																			  transform="rotate(-45 6 17.3137)"
																			  fill="#ff0000"></rect>
																		<rect x="7.41422" y="6" width="16" height="2"
																			  rx="1" transform="rotate(45 7.41422 6)"
																			  fill="#ff0000"></rect>
																	</svg>
																</span>
											<!--											<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Crystal_button_cancel.svg/1024px-Crystal_button_cancel.svg.png"-->
											<!--												 style="width: 16px;height: 16px" class="mx-3">-->
											<button type="button" class="btn btn-light-primary resultPeriod"></button>
										</div>


									</div>
									<div class="mt-5">
										<div style="overflow-y: scroll;max-height: 300px;"
											 class="table-responsive table-loading">

											<table class=" table table-row-bordered gy-5">
												<thead>
												<tr class="fw-bold fs-6 text-gray-800">
													<th>#</th>
													<th>Tarih</th>
													<th>Tutar</th>
												</tr>
												</thead>
												<tbody class="previewData">

												</tbody>
												<tfoot>
												<tr class="fw-bold fs-6 text-gray-800">
													<th></th>
													<th>TOPLAM</th>
													<th class="previewTotalResult">-</th>
												</tr>
												</tfoot>
											</table>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-light me-3"
								data-kt-users-modal-action="cancel" data-bs-dismiss="modal">
							Kapat
						</button>
						<button type="button" class="btn btn-light-primary previewAutoCollectButton">
							<span class="indicator-label">Hesapla</span>
							<span class="indicator-progress">Hesaplanıyor...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
						<button type="submit" class="btn btn-primary submitAutoCollectButton" style="display: none"
								data-kt-users-modal-action="submit">
							<span class="indicator-label">Oluştur</span>
							<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>


<div class="modal fade" id="addTrialProductModal" data-bs-backdrop="static"
	 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-850px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="kt_modal_add_user_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder formTitle">Deneme Ürünü Ekle</h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-icon btn-sm btn-active-icon-primary"
					 data-bs-dismiss="modal">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
					<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16"
																			  height="2" rx="1"
																			  transform="rotate(-45 6 17.3137)"
																			  fill="currentColor"/>
																		<rect x="7.41422" y="6" width="16" height="2"
																			  rx="1" transform="rotate(45 7.41422 6)"
																			  fill="currentColor"/>
																	</svg>
																</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
				<!--begin::Form-->
				<form id="addTrialProductForm" enctype="multipart/form-data" class="form"
					  action="#">
					<input type="hidden" name="action" value="ADD">
					<input type="hidden" name="saleID" value="<?= $sale["saleId"] ?>">
					<input type="hidden" name="customerID" value="<?= $sale["fkCustomer"] ?>">
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7"
						 id="kt_modal_add_user_scroll" data-kt-scroll="true"
						 data-kt-scroll-activate="{default: false, lg: true}"
						 data-kt-scroll-max-height="auto"
						 data-kt-scroll-dependencies="#kt_modal_add_user_header"
						 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
						 data-kt-scroll-offset="300px">
						<!--begin::Input group-->
						<!--end::Input group-->
						<div class="row">

							<div class="col-lg-12">
								<div class="fv-row row mb-5 ">
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Denemenin Yapıldığı Bölüm</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid"
											   name="department"/>
										<!--end::Input-->
									</div>
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Denemeyi Yapan Usta/Mühendis</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid"
											   name="author"/>
										<!--end::Input-->
									</div>
								</div>
								<div class="fv-row row mb-5">
									<div class="col-md-12 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Denemenin Yapıldığı Ekipman ve
											Özellikleri</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea rows="4" class="resize-none form-control form-control-solid"
												  name="equipment"></textarea>
										<!--end::Input-->
									</div>

								</div>
								<div class="fv-row row mb-5">
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Beklenen Performans</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea rows="3" class="resize-none form-control form-control-solid"
												  name="expectedPerformance"></textarea>
										<!--end::Input-->
									</div>
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Deneme Sonucu Performans</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea rows="3" class="resize-none form-control form-control-solid"
												  name="resultPerformance"></textarea>
										<!--end::Input-->
									</div>

								</div>
								<div class="fv-row row mb-5">
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Ürünlerin Veriliş Tarihi</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input required data-kt-calendar="datepicker"
											   class="form-control form-control-solid"
											   name="startDate"/>
										<!--end::Input-->
									</div>
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Geri Alınacak Tarih</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input data-kt-calendar="datepicker" required
											   class="form-control form-control-solid"
											   name="endDate"/>
										<!--end::Input-->
									</div>
								</div>
								<div class="separator border-1"></div>

								<!--begin::Repeater-->
								<div id="products">
									<!--begin::Form group-->
									<div class="form-group">
										<div data-repeater-list="products">
											<div data-repeater-item>
												<div class="form-group row my-3">
													<div class="col-md-4">
														<label class="form-label">Ürün:</label>
														<select required
																name="productID"
																class="form-control form-control-solid mb-2 mb-md-0 ">
															<option value="">Lütfen Seçin</option>
															<?php
															foreach ($sortedProducts as $product) {
																?>
																<option value="<?= $product["productId"] ?>"><?= $product["name"] ?></option>
																<?php
															}
															?>
														</select>
													</div>
													<div class="col-md-5">
														<label class="form-label">Miktar:</label>
														<div class="row">
															<div class="col">
																<input type="number" name="amount" required value="1"
																	   class="form-control form-control-solid mb-2 mb-md-0"/>
															</div>
															<div class="col">
																<select required class="form-control-solid form-control"
																		name="unitID" id="">
																	<option value="">Lütfen Seçin</option>
																	<?php
																	foreach ($units as $unit) {
																		?>
																		<option value="<?= $unit["unitId"] ?>"><?= $unit["name"] ?></option>
																		<?php
																	}
																	?>
																</select>
															</div>

														</div>
													</div>

													<div class="col-md-2">
														<a href="javascript:;" data-repeater-delete
														   class="btn btn-sm btn-light-danger mt-3 mt-md-8">
															<i class="la la-trash-o fw-bold fs-4"></i> Sil
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--end::Form group-->

									<!--begin::Form group-->
									<div class="form-group mt-5">
										<a href="javascript:;" data-repeater-create
										   class="btn btn-light-primary addTrialProductButton">
											<i class="la la-plus"></i>Çoğalt
										</a>
									</div>
									<!--end::Form group-->
								</div>
								<!--end::Repeater-->
							</div>

						</div>
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-light me-3"
								data-kt-users-modal-action="cancel" data-bs-dismiss="modal">
							Kapat
						</button>
						<button type="submit" class="btn btn-primary">
							<span class="indicator-label">Kaydet</span>
							<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<?php
if ($editable) {
	?>
	<div class="modal fade" id="changeSaleStatusModal" data-bs-backdrop="static"
		 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-dialog-centered modal-md">
			<!--begin::Modal content-->
			<div class="modal-content">
				<!--begin::Modal header-->
				<div class="modal-header" id="kt_modal_add_user_header">
					<!--begin::Modal title-->
					<h2 class="fw-bolder formTitle">Süreç Durumunu Değiştir</h2>
					<!--end::Modal title-->
					<!--begin::Close-->
					<div class="btn btn-icon btn-sm btn-active-icon-primary"
						 data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16"
																			  height="2" rx="1"
																			  transform="rotate(-45 6 17.3137)"
																			  fill="currentColor"/>
																		<rect x="7.41422" y="6" width="16" height="2"
																			  rx="1" transform="rotate(45 7.41422 6)"
																			  fill="currentColor"/>
																	</svg>
																</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
					<!--begin::Form-->
					<form id="changeSaleStatusForm" enctype="multipart/form-data" class="form"
						  action="#">
						<input type="hidden" name="action" value="UPDATE_STATUS">
						<input type="hidden" name="saleID" value="<?= $sale["saleId"] ?>">
						<input type="hidden" name="customerID" value="<?= $sale["fkCustomer"] ?>">
						<!--begin::Scroll-->
						<div class="d-flex flex-column scroll-y me-n7 pe-7"
							 id="kt_modal_add_user_scroll" data-kt-scroll="true"
							 data-kt-scroll-activate="{default: false, lg: true}"
							 data-kt-scroll-max-height="auto"
							 data-kt-scroll-dependencies="#kt_modal_add_user_header"
							 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
							 data-kt-scroll-offset="300px">
							<!--begin::Input group-->
							<!--end::Input group-->
							<div class="row">

								<div class="col-lg-12">

									<!--begin::Label-->
									<label class="fw-bold fs-6 mb-2">Durum</label>
									<!--end::Label-->
									<!--begin::Input-->
									<select name="statusID" id="" class="form-control form-control-solid">
										<?php
										foreach ($statuses as $status) {
											?>
											<option <?= $sale['fkStatus'] == $status['statusId'] ? 'selected' : ''; ?>
													value="<?= $status['statusId'] ?>"><?= $status['title'] ?></option>
											<?php
										}
										?>
									</select>


								</div>

							</div>
						</div>
						<!--end::Scroll-->
						<!--begin::Actions-->
						<div class="text-center pt-15">
							<button type="reset" class="btn btn-light me-3"
									data-kt-users-modal-action="cancel" data-bs-dismiss="modal">
								Kapat
							</button>
							<button type="submit" class="btn btn-primary">
								<span class="indicator-label">Kaydet</span>
								<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>
						<!--end::Actions-->
					</form>
					<!--end::Form-->
				</div>
				<!--end::Modal body-->
			</div>
			<!--end::Modal content-->
		</div>
		<!--end::Modal dialog-->
	</div>
	<?php
}
?>
<div class="modal fade" id="editTrialProductModal" data-bs-backdrop="static"
	 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered modal-xl">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="kt_modal_add_user_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder formTitle">Deneme Ürünü Bilgileri</h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-icon btn-sm btn-active-icon-primary"
					 data-bs-dismiss="modal">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
					<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16"
																			  height="2" rx="1"
																			  transform="rotate(-45 6 17.3137)"
																			  fill="currentColor"/>
																		<rect x="7.41422" y="6" width="16" height="2"
																			  rx="1" transform="rotate(45 7.41422 6)"
																			  fill="currentColor"/>
																	</svg>
																</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
				<!--begin::Form-->
				<form id="editTrialProductForm" enctype="multipart/form-data" class="form"
					  action="#">
					<input type="hidden" name="action" value="EDIT">
					<input type="hidden" name="trialProductID" value="">
					<input type="hidden" name="saleID" value="<?= $sale["saleId"] ?>">
					<input type="hidden" name="customerID" value="<?= $sale["fkCustomer"] ?>">
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7"
						 id="kt_modal_add_user_scroll" data-kt-scroll="true"
						 data-kt-scroll-activate="{default: false, lg: true}"
						 data-kt-scroll-max-height="auto"
						 data-kt-scroll-dependencies="#kt_modal_add_user_header"
						 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
						 data-kt-scroll-offset="300px">
						<!--begin::Input group-->
						<!--end::Input group-->
						<div class="row">

							<div class="col-lg-12">
								<div class="fv-row row mb-5 ">
									<div class="col-md-3 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Yapıldığı Bölüm</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid"
											   name="department"/>
										<!--end::Input-->
									</div>
									<div class="col-md-3 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Görevli Usta/Mühendis</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid"
											   name="author"/>
										<!--end::Input-->
									</div>
									<div class="col-md-3 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Ürünlerin Veriliş Tarihi</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input data-kt-calendar="datepicker" required
											   class="form-control form-control-solid"
											   name="startDate"/>
										<!--end::Input-->
									</div>
									<div class="col-md-3 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Geri Alınacak Tarih</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input data-kt-calendar="datepicker" required
											   class="form-control form-control-solid"
											   name="endDate"/>
										<!--end::Input-->
									</div>
								</div>
								<div class="fv-row row mb-5">
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Denemenin Yapıldığı Ekipman ve
											Özellikleri</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea rows="4" class="resize-none form-control form-control-solid"
												  name="equipment"></textarea>
										<!--end::Input-->
									</div>
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Sürece İlişkin Notlar</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea rows="4" class="resize-none form-control form-control-solid"
												  name="notes"></textarea>
										<!--end::Input-->
									</div>

								</div>
								<div class="fv-row row mb-5">
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Beklenen Performans</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea rows="3" class="resize-none form-control form-control-solid"
												  name="expectedPerformance"></textarea>
										<!--end::Input-->
									</div>
									<div class="col-md-6 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Deneme Sonucu Performans</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea rows="3" class="resize-none form-control form-control-solid"
												  name="resultPerformance"></textarea>
										<!--end::Input-->
									</div>

								</div>
								<div class="separator border-1"></div>

								<!--begin::Repeater-->
								<div id="products">
									<!--begin::Form group-->
									<div class="form-group">
										<div>
											<div class="form-group row my-3">
												<div class="col-md-4">
													<label class="form-label">Ürün:</label>
													<select required
															name="productID"
															readonly disabled
															class="form-control form-control-solid mb-2 mb-md-0 ">
														<?php
														foreach ($sortedProducts as $product) {
															?>
															<option value="<?= $product["productId"] ?>"><?= $product["name"] ?></option>
															<?php
														}
														?>
													</select>
												</div>
												<div class="col-md-4">
													<label class="form-label">Miktar:</label>
													<div class="row">
														<div class="col">
															<input type="number" name="amount" required value="1"
																   class="form-control form-control-solid mb-2 mb-md-0"/>
														</div>
														<div class="col">
															<select required class="form-control-solid form-control"
																	name="unitID" id="">
																<option value="">Lütfen Seçin</option>
																<?php
																foreach ($units as $unit) {
																	?>
																	<option value="<?= $unit["unitId"] ?>"><?= $unit["name"] ?></option>
																	<?php
																}
																?>
															</select>
														</div>

													</div>
												</div>
												<div class="col-md-3 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Durum</label>
													<!--end::Label-->
													<!--begin::Input-->
													<select name="tpStatus" id=""
															class="form-control form-control-solid">
														<option value="0">Devam Ediyor</option>
														<option value="1">Olumlu Sonuç</option>
														<option value="2">Olumsuz Sonuç</option>
													</select>
													<!--end::Input-->
												</div>
											</div>
										</div>
									</div>
									<!--end::Form group-->


								</div>
								<!--end::Repeater-->
							</div>

						</div>
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-light me-3"
								data-kt-users-modal-action="cancel" data-bs-dismiss="modal">
							Kapat
						</button>
						<button type="submit" class="btn btn-primary">
							<span class="indicator-label">Kaydet</span>
							<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<div class="modal fade" id="addNoteModal" data-bs-backdrop="static"
	 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-750px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="kt_modal_add_user_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder formTitle">Not Ekle</h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-icon btn-sm btn-active-icon-primary"
					 data-bs-dismiss="modal">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
					<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16"
																			  height="2" rx="1"
																			  transform="rotate(-45 6 17.3137)"
																			  fill="currentColor"/>
																		<rect x="7.41422" y="6" width="16" height="2"
																			  rx="1" transform="rotate(45 7.41422 6)"
																			  fill="currentColor"/>
																	</svg>
																</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
				<!--begin::Form-->
				<form id="addNoteForm" enctype="multipart/form-data" class="form"
					  action="#">
					<input type="hidden" name="action" value="ADD">
					<input type="hidden" name="saleID" value="<?= $sale["saleId"] ?>">
					<input type="hidden" name="customerID" value="<?= $sale["fkCustomer"] ?>">
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7"
						 id="kt_modal_add_user_scroll" data-kt-scroll="true"
						 data-kt-scroll-activate="{default: false, lg: true}"
						 data-kt-scroll-max-height="auto"
						 data-kt-scroll-dependencies="#kt_modal_add_user_header"
						 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
						 data-kt-scroll-offset="300px">
						<!--begin::Input group-->
						<!--end::Input group-->
						<div class="row">

							<div class="col-lg-12">
								<div class="fv-row mb-5 ">
									<div class="col-md-12 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Not İçeriği</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea name="explanation" id=""
												  placeholder="Bir şeyler yazın..."
												  rows="4"
												  class="form-control form-control-solid resize-none"></textarea>
										<!--end::Input-->
									</div>
								</div>

							</div>

						</div>
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-light me-3"
								data-kt-users-modal-action="cancel" data-bs-dismiss="modal">
							Kapat
						</button>
						<button type="submit" class="btn btn-primary"
								data-kt-users-modal-action="submit">
							<span class="indicator-label">Kaydet</span>
							<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<div class="modal fade" id="editNoteModal" data-bs-backdrop="static"
	 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-750px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="kt_modal_add_user_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder formTitle">Not Düzenle</h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-icon btn-sm btn-active-icon-primary"
					 data-bs-dismiss="modal">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
					<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16"
																			  height="2" rx="1"
																			  transform="rotate(-45 6 17.3137)"
																			  fill="currentColor"/>
																		<rect x="7.41422" y="6" width="16" height="2"
																			  rx="1" transform="rotate(45 7.41422 6)"
																			  fill="currentColor"/>
																	</svg>
																</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
				<!--begin::Form-->
				<form id="editNoteForm" enctype="multipart/form-data" class="form"
					  action="#">
					<input type="hidden" name="action" value="EDIT">
					<input type="hidden" name="noteID" value="">
					<input type="hidden" name="saleID" value="<?= $sale["saleId"] ?>">
					<input type="hidden" name="customerID" value="<?= $sale["fkCustomer"] ?>">
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7"
						 id="kt_modal_add_user_scroll" data-kt-scroll="true"
						 data-kt-scroll-activate="{default: false, lg: true}"
						 data-kt-scroll-max-height="auto"
						 data-kt-scroll-dependencies="#kt_modal_add_user_header"
						 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
						 data-kt-scroll-offset="300px">
						<!--begin::Input group-->
						<!--end::Input group-->
						<div class="row">

							<div class="col-lg-12">
								<div class="fv-row mb-5 ">
									<div class="col-md-12 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Not İçeriği</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea name="explanation" id=""
												  placeholder="Bir şeyler yazın..."
												  rows="4"
												  class="form-control form-control-solid resize-none"></textarea>
										<!--end::Input-->
									</div>
								</div>

							</div>

						</div>
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-light me-3"
								data-kt-users-modal-action="cancel" data-bs-dismiss="modal">
							Kapat
						</button>
						<button type="submit" class="btn btn-primary"
								data-kt-users-modal-action="submit">
							<span class="indicator-label">Kaydet</span>
							<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<div class="modal fade" id="addDocumentModal" data-bs-backdrop="static"
	 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-550px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="kt_modal_add_user_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder formTitle">Doküman Yükle </h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-icon btn-sm btn-active-icon-primary"
					 data-bs-dismiss="modal">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
					<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16"
																			  height="2" rx="1"
																			  transform="rotate(-45 6 17.3137)"
																			  fill="currentColor"/>
																		<rect x="7.41422" y="6" width="16" height="2"
																			  rx="1" transform="rotate(45 7.41422 6)"
																			  fill="currentColor"/>
																	</svg>
																</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
				<!--begin::Form-->
				<form id="addDocumentForm" enctype="multipart/form-data" class="form"
					  action="#">
					<input type="hidden" name="action" value="ADD">
					<input type="hidden" name="fkSale" value="<?= $sale["saleId"] ?>">
					<input type="hidden" name="fkCustomer" value="<?= $sale["fkCustomer"] ?>">
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7"
						 id="kt_modal_add_user_scroll" data-kt-scroll="true"
						 data-kt-scroll-activate="{default: false, lg: true}"
						 data-kt-scroll-max-height="auto"
						 data-kt-scroll-dependencies="#kt_modal_add_user_header"
						 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
						 data-kt-scroll-offset="300px">
						<!--begin::Input group-->
						<!--end::Input group-->
						<div class="row">

							<div class="col-lg-12">

								<div class="fv-row mb-5 ">
									<div class="col-md-12 col-sm-12 fv-row mb-7">
										<!--begin::Label-->
										<label for="xyz" class="required form-label fw-bolder fs-6 text-gray-700">Doküman
											Adı</label>
										<!--end::Label-->
										<!--begin::Select-->
										<input type="text" class="form-control form-control-solid" name="name">
										<!--end::Select-->
									</div>
									<div class="col-md-12 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label for="xyz" class="required form-label fw-bolder fs-6 text-gray-700">Dosya
											Seçimi</label>
										<!--end::Label-->
										<!--begin::Select-->
										<input type="file" class="form-control form-control-solid" name="document">
										<!--end::Select-->
									</div>
								</div>

							</div>

						</div>
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-light me-3"
								data-kt-users-modal-action="cancel" data-bs-dismiss="modal">
							Kapat
						</button>
						<button type="submit" class="btn btn-primary"
								data-kt-users-modal-action="submit">
							<span class="indicator-label">Kaydet</span>
							<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<div class="modal fade" id="editCollectModal" data-bs-backdrop="static"
	 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-750px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="kt_modal_add_user_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder formTitle">Tahsilat Detay <i
							class="notEditable fa fa-info-circle fs-4 text-hover-primary <?= hideByPerm('edit-collect') ?>"
							title="Üzerine farklı kayıtlar açılan tashilatların tutar, işlem tarihi gibi bilgilerini güncelleyemezsiniz."
							data-bs-toggle="tooltip"></i></h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div>
					<span class="fileDetails">
						<a target="_blank" href=""><button data-bs-toggle="tooltip"
														   title="Dekont/Makbuz dosyasını yeni sekmede aç"
														   class="btn btn-active-light-success"><i
										class="fa fa-eye fs-4"></i></button></a>
					<a href="" download><button data-bs-toggle="tooltip" title="Dekont/Makbuz dosyasını indir"
												class="btn btn-active-light-primary"><i class="fa fa-download fs-4"></i></button></a>
					</span>
					<button data-bs-toggle="tooltip" title="Tahsilat kaydını kalıcı olarak sil"
							class="btn btn-active-light-danger deleteCollect <?= hideByPerm("delete-collect") ?>"><i
								class="fa fa-trash fs-4"></i></button>

				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
				<!--begin::Form-->
				<form id="editCollectForm" enctype="multipart/form-data" class="form"
					  action="#">
					<input type="hidden" name="action" value="EDIT">
					<input type="hidden" name="collectID" value="">
					<input type="hidden" name="status" value="">
					<input type="hidden" name="saleID" value="<?= $sale["saleId"] ?>">
					<input type="hidden" name="customerID" value="<?= $sale["fkCustomer"] ?>">
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7"
						 id="kt_modal_add_user_scroll" data-kt-scroll="true"
						 data-kt-scroll-activate="{default: false, lg: true}"
						 data-kt-scroll-max-height="auto"
						 data-kt-scroll-dependencies="#kt_modal_add_user_header"
						 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
						 data-kt-scroll-offset="300px">
						<!--begin::Input group-->
						<!--end::Input group-->
						<div class="row">

							<div class="col-lg-12">
								<div class="fv-row mb-5 row">
									<div class="col-md-6 col-sm-12 fv-row ">
										<label class="required fw-bold  fs-6 mb-2">Tutar</label>
										<!--end::Label-->
										<div class="input-group input-group-solid">
											<span class="input-group-text"><?= $currencySymbol ?></span>
											<input disabled maxlength="13" name="amount" type="text"
												   placeholder="0,00"
												   data-input-type="decimal" class="form-control form-control-solid">
										</div>
									</div>
									<div class="col-md-6 col-sm-12 fv-row showOnPaid" style="display: none">
										<!--begin::Label-->
										<label for="xyz" class="required form-label fw-bolder fs-6 text-gray-700">Hesap
											Seçimi</label>
										<!--end::Label-->
										<!--begin::Select-->
										<select required name="accountID"
												class="form-select form-select-solid disableSelect2 editCollectSelectAccount"
												disabled="">
											<option value="">Lütfen Seçin</option>

										</select>
										<!--end::Select-->
									</div>
								</div>
								<div class="fv-row mb-5 row">
									<div class="col-md-6 col-sm-12 fv-row ">
										<label class="required fw-bold  fs-6 mb-2">İşlem Tarihi</label>
										<!--end::Label-->

										<input disabled required value="" name="collectDate" type="text"
											   class="form-control editCollectDate form-control-solid">

									</div>
									<div class="col-md-6 col-sm-12 fv-row ">
										<label class="fw-bold  fs-6 mb-2">Dekont <span data-bs-toggle="tooltip"
																					   title="Yeni bir dosya seçimi yaparsanız, halihazırda yüklü olan dekont/makbuz dosyası otomatik olarak silinecektir."
																					   class="badge badge-light-danger fileDetails"><i
														class="fa fa-exclamation-circle text-danger"></i></span></label>

										<!--end::Label-->

										<input value="" name="fileName"
											   type="file" <?= writeDisableByPerm("edit-collect") ?>
											   class="form-control form-control-solid">

									</div>
								</div>
								<div class="fv-row mb-5 ">
									<div class="col-md-12 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Açıklama</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea name="explanation" id="" <?= writeDisableByPerm("edit-collect") ?>
												  class="form-control form-control-solid resize-none"></textarea>
										<!--end::Input-->
									</div>
								</div>
								<div class="fv-row mb-5">
									<div class="col-md-12 col-sm-12 fv-row">
										<div class="form-check form-check-custom form-check-success form-check-solid">
											<input id="isCollected" class="form-check-input" type="checkbox"
												   name="isCollected"
												   value="1" checked/>
											<label class="form-check-label" for="isCollected">
												Ödeme alındı
											</label>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-light me-3"
								data-kt-users-modal-action="cancel" data-bs-dismiss="modal">
							Kapat
						</button>
						<button type="submit" class="btn btn-primary <?= hideByPerm("edit-collect") ?>"
								data-kt-users-modal-action="submit">
							<span class="indicator-label">Kaydet</span>
							<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
<div class="modal fade" id="primaryCustomerModal" data-bs-backdrop="static"
	 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="kt_modal_add_user_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder formTitle">Hızlı Müşteri Oluştur</h2>
				<!--end::Modal title-->
				<!--begin::Close-->
				<div class="btn btn-icon btn-sm btn-active-icon-primary"
					 data-bs-dismiss="modal">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
					<span class="svg-icon svg-icon-1">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="6" y="17.3137" width="16"
																			  height="2" rx="1"
																			  transform="rotate(-45 6 17.3137)"
																			  fill="currentColor"/>
																		<rect x="7.41422" y="6" width="16" height="2"
																			  rx="1" transform="rotate(45 7.41422 6)"
																			  fill="currentColor"/>
																	</svg>
																</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Close-->
			</div>
			<!--end::Modal header-->
			<!--begin::Modal body-->
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
				<!--begin::Form-->
				<form id="primaryCustomerForm" enctype="multipart/form-data" class="form"
					  action="#">
					<input type="hidden" name="action" value="ADD">
					<input type="hidden" name="customerID" value="">
					<input type="hidden" name="customerType" value="">
					<!--begin::Scroll-->
					<div class="d-flex flex-column scroll-y me-n7 pe-7"
						 id="kt_modal_add_user_scroll" data-kt-scroll="true"
						 data-kt-scroll-activate="{default: false, lg: true}"
						 data-kt-scroll-max-height="auto"
						 data-kt-scroll-dependencies="#kt_modal_add_user_header"
						 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
						 data-kt-scroll-offset="300px">
						<!--begin::Input group-->
						<!--end::Input group-->
						<div class="row">
							<div class="fv-row mb-7 text-center">
								<!--begin::Radio group-->
								<div class="btn-group w-100 w-lg-50 " data-kt-buttons="true"
									 data-kt-buttons-target="[data-kt-button]">
									<!--begin::Radio-->
									<label class="select-individual btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success active"
										   data-kt-button="true">
										<!--begin::Input-->
										<input class="btn-check" checked type="radio"
											   name="type"
											   value="INDIVIDUAL"/>
										<!--end::Input-->
										Bireysel
									</label>
									<!--end::Radio-->
									<!--begin::Radio-->
									<label class="select-corporate btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success "
										   data-kt-button="true">
										<!--begin::Input-->
										<input class="btn-check" type="radio" name="type"
											   value="CORPORATE"/>
										<!--end::Input-->
										Kurumsal
									</label>
									<!--end::Radio-->
								</div>
							</div>
							<div class="col-lg-12">
								<div class="fv-row row mb-5">
									<!--begin::Input group-->
									<div class="col-md-12 col-sm-12 fv-row">
										<!--begin::Label-->
										<label data-np-type="CORPORATE"
											   class="required fw-bold fs-6 mb-2">Firma Adı</label>
										<label data-np-type="INDIVIDUAL"
											   class="required fw-bold fs-6 mb-2">Müşteri Adı-Soyadı</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text"
											   required
											   name="name"
											   class="form-control form-control-lg form-control-solid">
										<!--end::Input-->
									</div>
									<!--end::Input group-->
								</div>
								<div class="fv-row row mb-5">
									<!--begin::Input group-->
									<div class="col-md-6 col-sm-12 fv-row">
										<!--begin::Label-->
										<label class=" fw-bold fs-6 mb-2">Müşteri Grubu</label>
										<!--end::Label-->
										<!--begin::Input-->
										<select type="text"
												name="fkCustomerGroup"
												class="form-control form-control-lg form-control-solid selectCustomerGroup">
											<option value="">Seçim Yok</option>
											<?php
											foreach ($customerGroups as $customerGroup) {

												?>
												<option value="<?= $customerGroup["customerGroupId"] ?>"><?= $customerGroup["title"] ?></option>
												<?php
											}
											?>
										</select>
										<!--end::Input-->
									</div>
									<div class="col-md-6 col-sm-12 fv-row">
										<!--begin::Label-->
										<label class=" fw-bold fs-6 mb-2">E-posta Adresi</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="email"
											   name="email"
											   class="form-control form-control-lg form-control-solid "/>

										<!--end::Input-->
									</div>
									<!--end::Input group-->
								</div>
								<!--begin::Input-->

								<!--end::Input-->
								<div class="fv-row row mb-5">
									<!--begin::Input group-->
									<div data-np-type="INDIVIDUAL"
										 class="col-md-6 col-sm-12 fv-row">
										<!--begin::Label-->
										<label class="required fw-bold fs-6 mb-2">TC Kimlik
											Numarası</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text"
											   pattern="(\d)+"
											   name="identityNumber"
											   minlength="11"
											   maxlength="11"
											   class="form-control form-control-lg form-control-solid">
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div data-np-type="CORPORATE"
										 class="col-md-6 col-sm-12 fv-row">
										<!--begin::Label-->
										<label class="required fw-bold fs-6 mb-2">Vergi
											Numarası</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text"

											   name="taxNumber"
											   class="form-control form-control-lg form-control-solid">
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="col-md-6 col-sm-12 fv-row">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Vergi
											Dairesi</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input type="text"
											   name="taxOffice"
											   class="form-control form-control-lg form-control-solid">
										<!--end::Input-->
									</div>
									<!--end::Input group-->
								</div>
								<div class="fv-row row mb-5">
									<div class="col-md-12 col-sm-12 fv-row">
										<!--begin::Label-->
										<label class="required fw-bold fs-6 mb-2">Ülke</label>
										<!--end::Label-->
										<!--begin::Input-->
										<select name="fkCountry" required id=""
												class="form-control form-control-solid selectCountry">
											<?php
											foreach (getCountries() as $country) {
												?>
												<option <?= $country["countryId"] == 1 ? 'selected' : ''; ?>
														value="<?= $country["countryId"] ?>"><?= $country["title"] ?></option>
												<?php
											}
											?>
										</select>
										<!--end::Input-->

									</div>
								</div>
								<div class="row">
									<div class="fv-row mb-5 col-md-6 col-sm-12">
										<div class="col-md-12 col-sm-12 fv-row">
											<!--begin::Label-->
											<label class="fw-bold fs-6 mb-2">Şehir</label>
											<!--end::Label-->
											<!--begin::Input-->
											<select name="fkCity" id=""
													class="form-control form-control-solid selectCity">
												<option value="">Şehir Seçimi</option>
												<?php
												foreach ($cities as $city) {
													?>
													<option value="<?= $city["cityId"] ?>"><?= $city["title"] ?></option>
													<?php
												}
												?>
											</select>
											<!--end::Input-->

										</div>

									</div>
									<div class="fv-row mb-5  col-md-6 col-sm-12">
										<div class="col-md-12 col-sm-12 fv-row ">
											<!--begin::Label-->
											<label class="fw-bold fs-6 mb-2">İlçe</label>
											<!--end::Label-->
											<!--begin::Input-->
											<select name="fkDistrict" id=""
													class="form-control form-control-solid selectDistrict">
												<option value="">İlçe Seçimi</option>
											</select>
											<!--end::Input-->
										</div>
									</div>
								</div>
								<div class="fv-row mb-5 ">
									<div class="col-md-12 col-sm-12 fv-row ">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Adres</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea name="address" id=""
												  class="form-control form-control-solid resize-none"></textarea>
										<!--end::Input-->
									</div>
								</div>

							</div>

						</div>
					</div>
					<!--end::Scroll-->
					<!--begin::Actions-->
					<div class="text-center pt-15">
						<button type="reset" class="btn btn-light me-3"
								data-kt-users-modal-action="cancel" data-bs-dismiss="modal">
							Kapat
						</button>
						<button type="submit" class="btn btn-primary"
								data-kt-users-modal-action="submit">
							<span class="indicator-label">Kaydet</span>
							<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Modal body-->
		</div>
		<!--end::Modal content-->
	</div>
	<!--end::Modal dialog-->
</div>
