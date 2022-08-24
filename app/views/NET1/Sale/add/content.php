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
				<!--begin::Secondary button-->
				<!--end::Secondary button-->
				<!--begin::Primary button-->
				<a href="/metronic8/demo1/../demo1/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal"
				   data-bs-target="#kt_modal_create_app">Create</a>
				<!--end::Primary button-->
			</div>
			<!--end::Actions-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Toolbar-->
	<!--begin::Post-->
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<!--begin::Container-->
		<div id="kt_content_container" class="container-fluid">
			<!--begin::Layout-->
			<div class="d-flex flex-column flex-lg-row">
				<!--begin::Content-->
				<div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
					<!--begin::Card-->
					<div class="card">
						<!--begin::Card body-->
						<div class="card-body p-12">
							<!--begin::Form-->
							<form action="" id="kt_invoice_form">
								<!--begin::Wrapper-->
								<div class="d-flex flex-column align-items-start flex-xxl-row">
									<!--begin::Input group-->
									<div class="d-flex align-items-center flex-equal fw-row me-4 order-2">
										<!--begin::Date-->
										<div class="fs-6 fw-bolder text-gray-700 text-nowrap">Fatura Tarihi:</div>
										<!--end::Date-->
										<!--begin::Input-->
										<div class="position-relative d-flex align-items-center w-150px">
											<!--begin::Datepicker-->
											<input class="form-control form-control-transparent fw-bolder pe-5"
												   value="" name="invoiceDate"/>
											<!--end::Datepicker-->
											<!--begin::Icon-->
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
											<span class="svg-icon svg-icon-2 position-absolute ms-4 end-0">
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
										 data-bs-toggle="tooltip" data-bs-trigger="hover" title="Kayıt Numarası">
										<span class="fs-2x fw-bolder text-gray-800">Fatura #</span>
										<input type="text" name="invoiceNumber"
											   class="form-control form-control-flush fw-bolder text-muted fs-3 w-125px"
											   value="<?= $defaultInvoiceNumber ?>" placehoder="..."/>
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="d-flex align-items-center justify-content-end flex-equal order-3 fw-row"
										 data-bs-toggle="tooltip" data-bs-trigger="hover"
										 title="Specify invoice due date">

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
										<div class="col-lg-5 ms-auto">
											<div class="mb-5">
												<select name="customerID"
														class="selectCustomer form-control form-control-solid">

												</select>
												<a href="javascript:void(0)" class="addCustomerButton">
													<span class="badge badge-sm badge-light-success float-end mt-1">Yeni Oluştur</span>
												</a>
											</div>
										</div>
									</div>
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
												<h6 class="name"></h6>
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="address">

											</div>
											<div class="mb-5 addressAgain">

											</div>
											<div class="mb-5 taxInformation">

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
												<th class="min-w-250px mw-250px">Ürün/Hizmet</th>
												<th colspan="2" class="min-w-100px mw-100px">Miktar</th>
												<th class="min-w-100px mw-125px">Fiyat</th>
												<th class="d-none min-w-100px mw-100px">KDV</th>
												<th class="min-w-150px mw-150px text-start">Tutar</th>
											</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
											<tr class="border-bottom border-bottom-dashed" data-kt-element="item">
												<td class="pe-7">
													<div class="productInputArea position-relative">

														<input type="text"
															   class="productInput pe-20 form-control form-control-solid mb-2"
															   name="product[name][]" placeholder="Ürün/Hizmet Adı"/>
														<span style="display: none"
															  class="badge badge-success badge-sm inputNewTag">Yeni</span>
														<span style="display: none" class="inputInfoTag"><i
																	data-bs-toggle="tooltip" data-bs-html="true"
																	title="<b>Kahve Makinesi</b> <br><b>Fiyat: </b> 1,000 ₺<br><b>Stok: </b> 123 Adet"
																	class="fa fa-info-circle"></i></span>
													</div>
												</td>
												<td class="ps-0" colspan="2">
													<div class="d-flex">
														<input class="form-control form-control-solid me-3"
															   type="number" min="1"
															   name="product[quantity][]" placeholder="1" value="1"
															   data-kt-element="quantity"/>

														<select class="form-control form-control-solid" type="number"
																min="1"
																name="product[unit][]"
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
														   name="product[price][]" placeholder="0,00" value="0,00"
														   data-kt-element="price"/>
												</td>
												<td class="d-none">
													<select class="form-control form-control-solid"
															name="product[vat][]"
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
																   name="product[totalPrice][]" placeholder="0,00"
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
											</tbody>
											<!--end::Table body-->
											<!--begin::Table foot-->
											<tfoot>
											<tr class="border-top border-top-dashed align-top fs-6 fw-bolder text-gray-700">
												<th class="">
													<button type="button" class="btn btn-light-primary me-3"
															data-kt-element="add-item">
														<span class="svg-icon svg-icon-2">
															<i class="fa fa-plus"></i>
														</span>
														Ekle
													</button>
												</th>
												<th colspan="2" class="border-bottom border-bottom-dashed ps-0">
													<div class="d-flex flex-column align-items-start">
														<div class="fs-5">Toplam</div>
														<div class="fs-5 d-none">KDV Toplamı</div>

													</div>
												</th>
												<th colspan="2" class="border-bottom border-bottom-dashed text-end">
													<span class="currencySymbol"></span>
													<span data-kt-element="sub-total">0.00</span><br>
													<span class="d-none currencySymbol"></span>
													<span class="d-none " data-kt-element="vat-total">0.00</span>

												</th>

											</tr>
											<tr class="d-none align-top fw-bolder text-gray-700">
												<th></th>
												<th colspan="2" class="fs-4 ps-0">Toplam</th>
												<th colspan="2" class="text-end fs-4 text-nowrap"><span
															class="currencySymbol"></span>
													<span data-kt-element="grand-total">0.00</span></th>
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
														   class="productInput pe-20 form-control form-control-solid mb-2"
														   name="product[name][]" placeholder="Ürün/Hizmet Adı"/>
													<span style="display: none"
														  class="badge badge-success badge-sm inputNewTag">Yeni</span>
													<span style="display: none" class="inputInfoTag"><i
																data-bs-toggle="tooltip" data-bs-html="true"
																title="<b>Kahve Makinesi</b> <br><b>Fiyat: </b> 1,000 ₺<br><b>Stok: </b> 123 Adet"
																class="fa fa-info-circle"></i></span>
												</div>
											</td>
											<td class="ps-0" colspan="2">
												<div class="d-flex">
													<input class="form-control form-control-solid me-3" type="number"
														   min="1"
														   name="product[quantity][]" placeholder="1" value="1"
														   data-kt-element="quantity"/>

													<select class="form-control form-control-solid" type="number"
															min="1"
															name="product[unit][]"
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
												<input type="text" data-input-type='decimal'
													   class="form-control form-control-solid text-end"
													   name="product[price][]" placeholder="0,00" value="0,00"
													   data-kt-element="price"/>
											</td>
											<td class="d-none">
												<select class="form-control form-control-solid"
														name="product[vat][]"
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
															   name="product[totalPrice][]" placeholder="0,00"
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
									<div class="mb-3">
										<label class="form-label fs-6 fw-bolder text-gray-700">Notlar <i
													class="fa fa-info-circle" data-bs-toggle="tooltip"
													title="Notlar, müşteriye gösterilmez"></i></label>
										<textarea name="notes" class="resize-none form-control form-control-solid"
												  rows="3"
												  placeholder=""></textarea>
									</div>
									<!--end::Notes-->
									<!--begin::Notes-->
									<div class="mb-0">
										<label class="form-label fs-6 fw-bolder text-gray-700">Teklif Notları <i
													class="fa fa-info-circle" data-bs-toggle="tooltip"
													title="Müşteriye iletilecek dokümanda yer alır."></i></label>
										<textarea name="invoiceNotes" class="resize-none form-control form-control-solid"
												  rows="3"
												  placeholder=""></textarea>
									</div>
									<!--end::Notes-->
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
				<!--begin::Sidebar-->
				<div class="flex-lg-auto min-w-lg-300px">
					<!--begin::Card-->
					<div class="card" data-kt-sticky="true" data-kt-sticky-name="invoice"
						 data-kt-sticky-offset="{default: false, lg: '200px'}"
						 data-kt-sticky-width="{lg: '250px', lg: '300px'}" data-kt-sticky-left="auto"
						 data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
						<!--begin::Card body-->
						<div class="card-body p-10">
							<!--begin::Input group-->
							<div class="mb-10">
								<!--begin::Label-->
								<label class="form-label fw-bolder fs-6 text-gray-700">Aşama</label>
								<!--end::Label-->
								<!--begin::Select-->
								<select name="fkStatus" data-control="select2"
										data-placeholder="Aşama Seçimi"
										class="form-select form-select-solid ">
									<option value=""></option>
									<?php
									foreach ($statuses as $status) {
										?>
										<option <?= $status["statusId"] == 1 ? "selected" : ""; ?>
												value="<?= $status["statusId"] ?>"><?= $status["title"] ?></option>
										<?php
									}
									?>
								</select>
								<!--end::Select-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-10">
								<!--begin::Label-->
								<label class="form-label fw-bolder fs-6 text-gray-700">Fatura Döviz Cinsi</label>
								<!--end::Label-->
								<!--begin::Select-->
								<select name="fkCurrency" data-control="select2"
										data-placeholder="Döviz Cinsi Seçimi"
										class="form-select form-select-solid selectCurrency">
									<option value=""></option>
									<?php
									foreach ($currencies as $currency) {
										?>
										<option <?= $currency["currencyId"] == 1 ? "selected" : ""; ?>
												data-symbol="<?= $currency["symbol"] ?>"
												value="<?= $currency["currencyId"] ?>"><?= $currency["code"] ?>
											| <?= $currency["name"] ?></option>
										<?php
									}
									?>
								</select>
								<!--end::Select-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="mb-10 <?= hideByPerm("admin") ?>">
								<!--begin::Label-->
								<label class="form-label fw-bolder fs-6 text-gray-700">Satış Sorumlusu</label>
								<!--end::Label-->
								<!--begin::Select-->
								<select required name="fkUser" data-control="select2"
										data-placeholder="Satış Sorumlusu Seçimi"
										class="form-select form-select-solid selectCurrency">
									<?php
									foreach ($users as $user) {
										?>
										<option <?= $user["userId"] == Auth::get('userId') ? 'selected' : ''; ?>
												value="<?= $user["userId"] ?>"><?= $user["firstName"] . " " . $user["lastName"] ?></option>
										<?php
									}
									?>
								</select>
								<!--end::Select-->
							</div>
							<!--end::Input group-->
							<!--begin::Separator-->
							<div class="d-none separator separator-dashed mb-8"></div>
							<!--end::Separator-->

							<!--begin::Input group-->
							<div class="mb-8 d-none">
								<!--begin::Option-->
								<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid flex-stack mb-5">
									<span class="form-check-label ms-0 fw-bolder fs-6 text-gray-700">Ödeme Alındı</span>
									<input class="form-check-input isCollected" type="checkbox" name="isCollected"
										   value="1"/>
								</label>
								<div class="mb-3 fkAccountWrapper">
									<!--begin::Label-->
									<label class="form-label fw-bolder fs-6 text-gray-700">Hesap Seçimi</label>
									<!--end::Label-->
									<!--begin::Select-->
									<select name="fkAccount" data-control="select2"
											data-placeholder="Kasa/Banka Seçimi"
											class="form-select form-select-solid selectAccount">
										<option value="">Lütfen Seçin</option>

									</select>
									<!--end::Select-->
								</div>
								<div class="mb-8 fkAccountWrapper">
									<!--begin::Label-->
									<label class="form-label fw-bolder fs-6 text-gray-700">Ödeme Tarihi</label>
									<!--end::Label-->
									<!--begin::Select-->
									<input type="text" class="form-control form-control-solid collectDate"
										   value="<?= date("d M Y") ?>" name="collectDate">
									<!--end::Select-->
								</div>
								<!--end::Option-->

							</div>
							<!--end::Input group-->

							<!--begin::Separator-->
							<div class="separator separator-dashed mb-8"></div>
							<!--end::Separator-->
							<!--begin::Input group-->
							<div class="mb-10">
								<!--begin::Label-->
								<label class="form-label fw-bolder fs-6 text-gray-700">Ek Dosya</label>
								<!--end::Label-->
								<!--begin::Select-->
								<input type="file" name="invoiceDocument" class="form-control form-control-solid">
								<!--end::Select-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="mb-0">
								<!--begin::Row-->

								<!--end::Row-->
								<button type="button" href="#" class="btn btn-primary w-100"
										id="kt_invoice_submit_button">
									<!--begin::Svg Icon | path: icons/duotune/general/gen016.svg-->
									<span class="svg-icon svg-icon-3">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
															 viewBox="0 0 24 24" fill="none">
															<path d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z"
																  fill="currentColor"/>
															<path opacity="0.3"
																  d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z"
																  fill="currentColor"/>
														</svg>
													</span>
									<!--end::Svg Icon-->Oluştur
								</button>
							</div>
							<!--end::Actions-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Sidebar-->
			</div>
			<!--end::Layout-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
<!--end::Content-->
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
