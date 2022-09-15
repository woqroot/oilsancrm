<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<?= $CI->loadLayout("breadcrumb"); ?>
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
													  fill="currentColor"></path>
											</svg>
										</span>
						<!--end::Svg Icon-->Filter</a>
					<!--end::Menu toggle-->
					<!--begin::Menu 1-->
					<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
						 id="kt_menu_625c27d1bcf7f">
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
									<select class="form-select form-select-solid select2-hidden-accessible"
											data-kt-select2="true" data-placeholder="Select option"
											data-dropdown-parent="#kt_menu_625c27d1bcf7f" data-allow-clear="true"
											data-select2-id="select2-data-7-afwu" tabindex="-1" aria-hidden="true">
										<option data-select2-id="select2-data-9-so6x"></option>
										<option value="1">Approved</option>
										<option value="2">Pending</option>
										<option value="2">In Process</option>
										<option value="2">Rejected</option>
									</select><span class="select2 select2-container select2-container--bootstrap5"
												   dir="ltr" data-select2-id="select2-data-8-2owf" style="width: 100%;"><span
												class="selection"><span
													class="select2-selection select2-selection--single form-select form-select-solid"
													role="combobox" aria-haspopup="true" aria-expanded="false"
													tabindex="0" aria-disabled="false"
													aria-labelledby="select2-mcpk-container"
													aria-controls="select2-mcpk-container"><span
														class="select2-selection__rendered" id="select2-mcpk-container"
														role="textbox" aria-readonly="true" title="Select option"><span
															class="select2-selection__placeholder">Select option</span></span><span
														class="select2-selection__arrow" role="presentation"><b
															role="presentation"></b></span></span></span><span
												class="dropdown-wrapper" aria-hidden="true"></span></span>
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
										<input class="form-check-input" type="checkbox" value="1">
										<span class="form-check-label">Author</span>
									</label>
									<!--end::Options-->
									<!--begin::Options-->
									<label class="form-check form-check-sm form-check-custom form-check-solid">
										<input class="form-check-input" type="checkbox" value="2" checked="checked">
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
										   checked="checked">
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
				<a href="<?= public_url() ?>../demo1/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal"
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
		<div id="kt_content_container" class="container-xxl">
			<!--begin::Layout-->
			<div class="d-flex flex-column flex-xl-row">
				<!--begin::Sidebar-->
				<div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
					<!--begin::Card-->
					<div class="card mb-5 mb-xl-8">
						<!--begin::Card body-->
						<div class="card-body pt-15">
							<!--begin::Summary-->
							<div class="d-flex flex-center flex-column mb-5">
								<!--begin::Avatar-->
								<div class="symbol symbol-125px symbol-circle mb-7">
									<img src="<?= public_url() ?>assets/media/customer.png" alt="image">
								</div>
								<!--end::Avatar-->
								<!--begin::Name-->
								<a href="#"
								   class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1"><?= $data["name"] ? $data["name"] : $data["shortName"] ?></a>
								<!--end::Name-->
								<!--begin::Position-->
								<?php
								if ($data['isActive'] == 1) {
									?>
									<div class="fs-5 fw-bold text-muted mb-6"><span class="badge badge-light-success">Aktif Müşteri</span>
									</div>
									<?php
								} else {
									?>
									<div class="fs-5 fw-bold text-muted mb-6"><span class="badge badge-light-danger">Pasif Müşteri</span>
									</div>
									<?php
								}
								?>
								<!--end::Position-->
								<!--begin::Info-->
								<div class="d-flex flex-wrap flex-center">
									<!--begin::Stats-->
									<div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
										<div class="fs-4 fw-bolder text-gray-700">
											<span class="w-75px"><?= $statistics["sales"]["counts"]["success"] ?> adet</span>
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
											<span class="svg-icon svg-icon-3 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="13" y="6" width="13"
																			  height="2" rx="1"
																			  transform="rotate(90 13 6)"
																			  fill="currentColor"></rect>
																		<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
																			  fill="currentColor"></path>
																	</svg>
																</span>
											<!--end::Svg Icon-->
										</div>
										<div class="fw-bold text-muted">Başarılı Satış</div>
									</div>
									<!--end::Stats-->
									<!--begin::Stats-->
									<div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
										<div class="fs-4 fw-bolder text-gray-700">
											<span class="w-50px"><?= $statistics["sales"]["counts"]["fail"] ?> adet </span>
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
											<span class="svg-icon svg-icon-3 svg-icon-danger">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24"
																		 height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="11" y="18" width="13"
																			  height="2" rx="1"
																			  transform="rotate(-90 11 18)"
																			  fill="currentColor"></rect>
																		<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
																			  fill="currentColor"></path>
																	</svg>
																</span>
											<!--end::Svg Icon-->
										</div>
										<div class="fw-bold text-muted">Başarısız Satış</div>
									</div>
									<!--end::Stats-->
									<!--begin::Stats-->
									<div class="text-center border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
										<div class="fs-4 fw-bolder text-gray-700">
											<span class="w-50px"><?= $statistics["sales"]["counts"]["continue"] ?> adet</span>
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->

											<!--end::Svg Icon-->
										</div>
										<div class="fw-bold text-muted">Devam Eden</div>
									</div>
									<!--end::Stats-->
								</div>
								<!--end::Info-->
							</div>
							<!--end::Summary-->
							<!--begin::Details toggle-->
							<div class="d-flex flex-stack fs-4 py-3">
								<div class="fw-bolder rotate collapsible active" data-bs-toggle="collapse"
									 href="#kt_customer_view_details" role="button" aria-expanded="true"
									 aria-controls="kt_customer_view_details">Detaylar
									<span class="ms-2 rotate-180">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
																 height="24" viewBox="0 0 24 24" fill="none">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																	  fill="currentColor"></path>
															</svg>
														</span>
										<!--end::Svg Icon-->
									</span>
								</div>
								<span><a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
										 data-bs-target="#kt_modal_edit_user">Düzenle</a>
													</span>
							</div>
							<!--end::Details toggle-->
							<div class="separator separator-dashed my-3"></div>
							<!--begin::Details content-->
							<div id="kt_customer_view_details" class="collapse show" style="">
								<div class="py-5 fs-6">
									<!--begin::Badge-->

									<!--begin::Badge-->
									<!--begin::Details item-->
									<div class="fw-bolder mt-5">Müşteri No
										<div class="float-end badge badge-light-info"><?= $data["type"] == "INDIVIDUAL" ? "Bireysel" : "Kurumsal" ?></div>
									</div>
									<div class="text-gray-600">ID-<?= $data["customerId"] ?></div>
									<!--begin::Details item-->
									<!--begin::Details item-->
									<div class="fw-bolder mt-5">E-posta Adresi</div>
									<div class="text-gray-600">
										<a href="mailto:<?= $data["email"] ?>"
										   class="text-gray-600 text-hover-primary"><?= $data["email"] ?></a>
									</div>
									<!--begin::Details item-->
									<!--begin::Details item-->
									<div class="fw-bolder mt-5">Telefon Numarası</div>
									<div class="text-gray-600"><?= phoneMask($data["phone"]) ?></div>
									<!--begin::Details item-->
									<?php
									if ($data["secondPhone"]) {
										?>
										<!--begin::Details item-->
										<div class="fw-bolder mt-5">Telefon Numarası - 2</div>
										<div class="text-gray-600"><?= phoneMask($data["secondPhone"]) ?></div>
										<!--begin::Details item-->
										<?php
									}
									?>
									<!--begin::Details item-->
									<div class="fw-bolder mt-5">Adres</div>
									<div class="text-gray-600">
										<?= $data["address"] ?> - <?= getDistrict($data["fkDistrict"]) ?>
										/ <?= getCity($data["fkCity"]) ?> / <?= getCountry($data["fkCountry"]); ?>
									</div>
									<!--begin::Details item-->
									<!--begin::Details item-->
									<div class="fw-bolder mt-5">Upcoming Invoice</div>
									<div class="text-gray-600">54238-8693</div>
									<!--begin::Details item-->
									<!--begin::Details item-->
									<div class="fw-bolder mt-5"><?= $data["type"] == "INDIVIDUAL" ? "TCKN" : "VKN" ?> /
										Vergi Dairesi
									</div>
									<div class="text-gray-600"><?= $data["taxNumber"] ?> <?= $data["taxOffice"] ? " - " . $data["taxOffice"] : null ?></div>
									<!--begin::Details item-->
								</div>
							</div>
							<!--end::Details content-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Sidebar-->
				<!--begin::Content-->
				<div class="flex-lg-row-fluid ms-lg-15">
					<!--begin:::Tabs-->
					<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
						<!--begin:::Tab item-->
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
							   href="#kt_customer_view_overview_tab">Satış Süreçleri</a>
						</li>
						<!--end:::Tab item-->
						<!--begin:::Tab item-->
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
							   href="#trialProducts">Deneme Süreçleri</a>
						</li>
						<!--end:::Tab item-->
						<!--begin:::Tab item-->
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4"
							   data-bs-toggle="tab" href="#documents">Dosya & Evraklar</a>
						</li>
						<!--end:::Tab item-->
						<!--begin:::Tab item-->
						<li class="nav-item ms-auto">
							<!--begin::Action menu-->
							<a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
							   data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
								<span class="svg-icon svg-icon-2 me-0">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														 viewBox="0 0 24 24" fill="none">
														<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
															  fill="currentColor"></path>
													</svg>
												</span>
								<!--end::Svg Icon--></a>
							<!--begin::Menu-->
							<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6"
								 data-kt-menu="true">
								<!--begin::Menu item-->
								<div class="menu-item px-5">
									<div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-5">
									<a href="#" class="menu-link px-5">Create invoice</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-5">
									<a href="#" class="menu-link flex-stack px-5">Create payments
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""
										   data-bs-original-title="Specify a target name for future usage and reference"
										   aria-label="Specify a target name for future usage and reference"></i></a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-5" data-kt-menu-trigger="hover"
									 data-kt-menu-placement="left-start">
									<a href="#" class="menu-link px-5">
										<span class="menu-title">Subscription</span>
										<span class="menu-arrow"></span>
									</a>
									<!--begin::Menu sub-->
									<div class="menu-sub menu-sub-dropdown w-175px py-4">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-5">Apps</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-5">Billing</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="#" class="menu-link px-5">Statements</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<div class="menu-content px-3">
												<label class="form-check form-switch form-check-custom form-check-solid">
													<input class="form-check-input w-30px h-20px" type="checkbox"
														   value="" name="notifications" checked="checked"
														   id="kt_user_menu_notifications">
													<span class="form-check-label text-muted fs-6"
														  for="kt_user_menu_notifications">Notifications</span>
												</label>
											</div>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu sub-->
								</div>
								<!--end::Menu item-->
								<!--begin::Menu separator-->
								<div class="separator my-3"></div>
								<!--end::Menu separator-->
								<!--begin::Menu item-->
								<div class="menu-item px-5">
									<div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-5">
									<a href="#" class="menu-link px-5">Reports</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-5 my-1">
									<a href="#" class="menu-link px-5">Account Settings</a>
								</div>
								<!--end::Menu item-->
								<!--begin::Menu item-->
								<div class="menu-item px-5">
									<a href="#" class="menu-link text-danger px-5">Delete customer</a>
								</div>
								<!--end::Menu item-->
							</div>
							<!--end::Menu-->
							<!--end::Menu-->
						</li>
						<!--end:::Tab item-->
					</ul>
					<!--end:::Tabs-->
					<!--begin:::Tab content-->
					<div class="tab-content" id="myTabContent">
						<!--begin:::Tab pane-->
						<div class="tab-pane fade show active" id="kt_customer_view_overview_tab" role="tabpanel">
							<!--begin::Card-->
							<div class="card pt-4 mb-6 mb-xl-9">
								<!--begin::Card header-->
								<div class="card-header border-0">
									<!--begin::Card title-->
									<div class="card-title">
										<h2>Satışlar</h2>
									</div>
									<!--end::Card title-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0 pb-5">
									<!--begin::Table-->
									<div id="kt_table_customers_payment_wrapper"
										 class="dataTables_wrapper dt-bootstrap4 no-footer">
										<div class="table-responsive">
											<table class="table align-middle table-row-dashed gy-5 dataTable no-footer"
												   id="sales-table">
												<!--begin::Table head-->
												<thead class="border-bottom border-gray-200 fs-7 fw-bolder">
												<!--begin::Table row-->
												<tr class="text-start text-muted text-uppercase gs-0">
													<th>#
													</th>
													<th>Durum
													</th>
													<th>Tutar
													</th>
													<th>Tarih
													</th>
													<th class="ext-end min-w-100px pe-4 "
													>
														İşlem
													</th>
												</tr>
												<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="fs-6 fw-bold text-gray-600">
												<!--end::Table row-->
												<?php
												foreach ($sales as $sale) {
													?>
													<tr>
														<!--begin::Invoice=-->
														<td>
															<a href="#"
															   class="text-gray-600 text-hover-primary mb-1"><?= $sale["invoiceNumber"] ?></a>
														</td>
														<!--end::Invoice=-->
														<!--begin::Status=-->
														<td>
															<span class="badge badge-<?= Main::getStatus($sale["fkStatus"])["className"] ?>"><?= Main::getStatus($sale["fkStatus"])["title"] ?></span>
														</td>
														<!--end::Status=-->
														<!--begin::Amount=-->
														<td><?= showBalance($sale["balance"], $sale["fkCurrency"]) ?></td>
														<!--end::Amount=-->
														<!--begin::Date=-->
														<td data-order="2020-12-14T20:43:00+03:00"><?= localizeDate("d M Y", $sale["invoiceDate"]) ?>
														</td>
														<!--end::Date=-->
														<!--begin::Action=-->
														<td class="pe-0 ">
															<a target="_blank"
															   href="<?= base_url("sales/" . $sale["saleId"]) ?>"
															   class="btn btn-sm btn-light-primary">Görüntüle</a>
														</td>
														<!--end::Action=-->
													</tr>
													<?php

												}
												?>
												</tbody>
												<!--end::Table body-->
											</table>
										</div>

									</div>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
							<!--begin::Card-->
							<div class="card pt-4 mb-6 mb-xl-9">
								<!--begin::Card header-->
								<div class="card-header border-0">
									<!--begin::Card title-->
									<div class="card-title">
										<h2 class="fw-bolder mb-0">Yetkili Bilgileri</h2>
									</div>
									<!--end::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal"
										   data-bs-target="#addContact">
											<!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
											<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.3" x="2" y="2" width="20"
																		  height="20" rx="5" fill="currentColor"></rect>
																	<rect x="10.8891" y="17.8033" width="12" height="2"
																		  rx="1" transform="rotate(-90 10.8891 17.8033)"
																		  fill="currentColor"></rect>
																	<rect x="6.01041" y="10.9247" width="12" height="2"
																		  rx="1" fill="currentColor"></rect>
																</svg>
															</span>
											<!--end::Svg Icon-->Yeni Oluştur</a>
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div id="kt_customer_view_payment_method" class="card-body pt-0">


									<?php
									foreach ($contacts as $key => $contact) {
										?>
										<!--begin::Option-->
										<div class="py-0" data-kt-customer-payment-method="row">
											<!--begin::Header-->
											<div class="py-3 d-flex flex-stack flex-wrap">
												<!--begin::Toggle-->
												<div class="d-flex align-items-center collapsible collapsed rotate"
													 data-bs-toggle="collapse"
													 href="#kt_customer_view_payment_method_<?= $key ?>"
													 role="button" aria-expanded="false"
													 aria-controls="kt_customer_view_payment_method_<?= $key ?>">
													<!--begin::Arrow-->
													<div class="me-3 rotate-90">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
														<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg"
																				 width="24" height="24"
																				 viewBox="0 0 24 24" fill="none">
																				<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
																					  fill="currentColor"></path>
																			</svg>
																		</span>
														<!--end::Svg Icon-->
													</div>
													<!--end::Arrow-->

													<!--begin::Summary-->
													<div class="me-3">
														<div class="d-flex align-items-center">
															<div class="text-gray-800 fw-bolder"><?= $contact["name"] ?></div>
														</div>
														<div class="text-muted"><?= $contact["department"] ?: "-" ?></div>
													</div>
													<!--end::Summary-->
												</div>
												<!--end::Toggle-->
												<!--begin::Toolbar-->
												<div class="d-flex my-3 ms-9">
													<!--begin::Edit-->
													<a href="#"
													   data-id="<?= $contact['customerContactId'] ?>"
													   class="editContactButton btn btn-icon btn-active-light-primary w-30px h-30px me-3"
													>
																		<span data-bs-toggle="tooltip"
																			  data-bs-trigger="hover" title=""
																			  data-bs-original-title="Düzenle">
																			<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																			<span class="svg-icon svg-icon-3">
																				<svg xmlns="http://www.w3.org/2000/svg"
																					 width="24" height="24"
																					 viewBox="0 0 24 24" fill="none">
																					<path opacity="0.3"
																						  d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
																						  fill="currentColor"></path>
																					<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
																						  fill="currentColor"></path>
																				</svg>
																			</span>
																			<!--end::Svg Icon-->
																		</span>
													</a>
													<!--end::Edit-->
													<!--begin::Delete-->
													<?php
													if (isCan('admin')) {
														?>
														<a href="javascript:void(0)"
														   data-id="<?= $contact['customerContactId'] ?>"
														   data-bs-toggle="tooltip"
														   data-bs-trigger="hover" title=""
														   data-bs-original-title="Sil"
														   class="btn btn-icon btn-active-light-danger w-30px h-30px me-3 deleteContactButton">
															<!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
															<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg"
																				 width="24" height="24"
																				 viewBox="0 0 24 24" fill="none">
																				<path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
																					  fill="currentColor"></path>
																				<path opacity="0.5"
																					  d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
																					  fill="currentColor"></path>
																				<path opacity="0.5"
																					  d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
																					  fill="currentColor"></path>
																			</svg>
																		</span>
															<!--end::Svg Icon-->
														</a>
														<?php
													}
													?>
													<!--end::Delete-->
												</div>
												<!--end::Toolbar-->
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div id="kt_customer_view_payment_method_<?= $key ?>"
												 class="collapse fs-6 ps-10"
												 data-bs-parent="#kt_customer_view_payment_method">
												<!--begin::Details-->
												<div class="d-flex flex-wrap py-5">
													<!--begin::Col-->
													<div class="flex-equal me-5">
														<table class="table table-flush fw-bold gy-1">
															<tbody>
															<tr>
																<td class="text-muted min-w-125px w-125px">Ad-Soyad</td>
																<td class="text-gray-800"><?= $contact["name"] ?></td>
															</tr>
															<tr>
																<td class="text-muted min-w-125px w-125px">Departman
																</td>
																<td class="text-gray-800"><?= $contact["department"] ?></td>
															</tr>

															</tbody>
														</table>
													</div>
													<!--end::Col-->
													<!--begin::Col-->
													<div class="flex-equal">
														<table class="table table-flush fw-bold gy-1">
															<tbody>
															<tr>
																<td class="text-muted min-w-125px w-125px">E-posta
																	Adresi
																</td>
																<td class="text-gray-800"><?= $contact["email"] ?></td>
															</tr>
															<tr>
																<td class="text-muted min-w-125px w-125px">Telefon</td>
																<td class="text-gray-800"><?= phoneMask($contact["phone"]) ?></td>
															</tr>


															</tbody>
														</table>
													</div>
													<!--end::Col-->
												</div>
												<!--end::Details-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Option-->
										<div class="separator separator-dashed"></div>
										<?php
									}
									?>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->

						</div>
						<!--end:::Tab pane-->
						<!--begin:::Tab pane-->
						<div class="tab-pane fade" id="trialProducts" role="tabpanel">
							<!--begin::Card-->
							<div class="card pt-4 mb-6 mb-xl-9">
								<!--begin::Card header-->
								<div class="card-header border-0">
									<!--begin::Card title-->
									<div class="card-title">
										<h2>Deneme Süreçleri</h2>
									</div>
									<!--end::Card title-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0 pb-5">
									<!--begin::Table-->
									<div id="kt_table_customers_payment_wrapper"
										 class="dataTables_wrapper dt-bootstrap4 no-footer">
										<div class="table-responsive">
											<table class="table align-middle table-row-dashed gy-5 dataTable no-footer"
												   id="trialproducts-table">
												<!--begin::Table head-->
												<thead class="border-bottom border-gray-200 fs-7 fw-bolder">
												<!--begin::Table row-->
												<tr class="text-start text-muted text-uppercase gs-0">
													<th>#
													</th>
													<th>Durum
													</th>
													<th>Ürün
													</th>
													<th>Verildiği Tarih
													</th>
													<th class="ext-end min-w-100px pe-4 "
													>
														İşlem
													</th>
												</tr>
												<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="fs-6 fw-bold text-gray-600">
												<!--end::Table row-->
												<?php
												foreach ($trialProducts as $trialProduct) {
													if ($trialProduct['tpStatus'] == 0) {
														$stat = "<span class='badge badge-sm badge-warning text-gray-700'>Devam Ediyor</span>";
													} elseif ($trialProduct['tpStatus'] == 1) {
														$stat = "<span class='badge badge-sm badge-success'>Başarılı Sonuç</span>";
													} elseif ($trialProduct['tpStatus'] == 2) {
														$stat = "<span class='badge badge-sm badge-danger'>Başarısız Sonuç</span>";
													} else {
														$stat = "Bilinmiyor";
													}
													?>
													<tr>
														<!--begin::Invoice=-->
														<td>
															<a href="#"
															   class="text-gray-600 text-hover-primary mb-1"><?= $trialProduct["trialProductId"] ?></a>
														</td>
														<!--end::Invoice=-->
														<td>
															<?= $stat ?>
														</td>
														<!--begin::Status=-->
														<td>
															<span class="badge badge-sm badge-primary"><?= $trialProduct["amount"] ?> <?= Main::unit($trialProduct["fkUnit"]) ?></span> <?= $trialProduct["productName"] ?>
														</td>
														<!--end::Status=-->

														<!--begin::Date=-->
														<td><?= localizeDate("d M Y", $trialProduct["startDate"]) ?>
														</td>
														<!--end::Date=-->
														<!--begin::Action=-->
														<td class="pe-0 ">
															<a data-bs-target="#editTrialProductModal"
															   data-bs-toggle="modal"
															   data-id="<?= $trialProduct["trialProductId"] ?>"
															   class="editTrialProductButton btn btn-sm btn-light-primary">Görüntüle</a>
														</td>
														<!--end::Action=-->
													</tr>
													<?php

												}
												?>
												</tbody>
												<!--end::Table body-->
											</table>
										</div>

									</div>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->


						</div>
						<!--end:::Tab pane-->
						<!--begin:::Tab pane-->
						<div class="tab-pane fade" id="documents" role="tabpanel">
							<!--begin::Card-->
							<div class="card pt-4 mb-6 mb-xl-9">
								<!--begin::Card header-->
								<div class="card-header border-0">
									<!--begin::Card title-->
									<div class="card-title">
										<h2>Dokümanlar</h2>
									</div>
									<!--end::Card title-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0 pb-5">
									<!--begin::Table-->
									<div id="kt_table_customers_payment_wrapper"
										 class="dataTables_wrapper dt-bootstrap4 no-footer">
										<div class="table-responsive">
											<table class="table align-middle table-row-dashed gy-5 dataTable no-footer"
												   id="trialproducts-table">
												<!--begin::Table head-->
												<thead class="border-bottom border-gray-200 fs-7 fw-bolder">
												<!--begin::Table row-->
												<tr class="text-start text-muted text-uppercase gs-0">
													<th>#
													</th>
													<th>Satış No
													</th>
													<th>Doküman Adı
													</th>
													<th>Yükleyen
													</th>
													<th>Tarih
													</th>
													<th class="text-esnd min-w-100px pe-4 ">
														İşlem
													</th>
												</tr>
												<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="fs-6 fw-bold text-gray-600">
												<!--end::Table row-->
												<?php
												foreach ($documents as $document) {
													?>
													<tr>
														<!--begin::Invoice=-->
														<td>
															<a href="#"
															   class="text-gray-600 text-hover-primary mb-1"><?= $document["documentId"] ?></a>
														</td>
														<!--end::Invoice=-->
														<td>
															#<?= $document["sale"]['invoiceNumber'] ?>
														</td>
														<!--begin::Status=-->
														<td>
															<?= $document["name"] ?>
														</td>
														<!--end::Status=-->
														<!--begin::Status=-->
														<td>
															<?= $document["user"]["firstName"] . " " . $document["user"]["lastName"] ?>
														</td>
														<!--end::Status=-->
														<!--begin::Date=-->
														<td><?= localizeDate("d M Y", $document["createdAt"]) ?>
														</td>
														<!--end::Date=-->
														<!--begin::Action=-->
														<td class="pe-0 text-ensd">
															<a download href="<?= uploads_url($document['document']) ?>"
															   class="">

																<button class="btn btn-light-success btn-sm">İndir
																</button>
															</a>
															<a target="_blank"
															   href="<?= uploads_url($document['document']) ?>"
															   class="">
																<button class="btn btn-light-primary btn-sm">Görüntüle
																</button>
															</a>
														</td>
														<!--end::Action=-->
													</tr>
													<?php

												}
												?>
												</tbody>
												<!--end::Table body-->
											</table>
										</div>

									</div>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->

						</div>
						<!--end:::Tab pane-->

					</div>
					<!--end:::Tab content-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Layout-->
			<!--begin::Modals-->
			<!--begin::Modal - Add Payment-->
			<div class="modal fade" id="kt_modal_add_payment" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header">
							<!--begin::Modal title-->
							<h2 class="fw-bolder">Add a Payment Record</h2>
							<!--end::Modal title-->
							<!--begin::Close-->
							<div id="kt_modal_add_payment_close" class="btn btn-icon btn-sm btn-active-icon-primary">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
								<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
															 viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
																  rx="1" transform="rotate(-45 6 17.3137)"
																  fill="currentColor"></rect>
															<rect x="7.41422" y="6" width="16" height="2" rx="1"
																  transform="rotate(45 7.41422 6)"
																  fill="currentColor"></rect>
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
							<form id="kt_modal_add_payment_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
								  action="#">
								<!--begin::Input group-->
								<div class="fv-row mb-7 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="fs-6 fw-bold form-label mb-2">
										<span class="required">Invoice Number</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
										   data-bs-original-title="The invoice number must be unique."
										   aria-label="The invoice number must be unique."></i>
									</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" name="invoice" value="">
									<!--end::Input-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-7 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-6 fw-bold form-label mb-2">Status</label>
									<!--end::Label-->
									<!--begin::Input-->
									<select class="form-select form-select-solid fw-bolder select2-hidden-accessible"
											name="status" data-control="select2" data-placeholder="Select an option"
											data-hide-search="true" data-select2-id="select2-data-10-zy6j" tabindex="-1"
											aria-hidden="true">
										<option data-select2-id="select2-data-12-0rqv"></option>
										<option value="0">Approved</option>
										<option value="1">Pending</option>
										<option value="2">Rejected</option>
										<option value="3">In progress</option>
										<option value="4">Completed</option>
									</select><span class="select2 select2-container select2-container--bootstrap5"
												   dir="ltr" data-select2-id="select2-data-11-k48m"
												   style="width: 100%;"><span class="selection"><span
													class="select2-selection select2-selection--single form-select form-select-solid fw-bolder"
													role="combobox" aria-haspopup="true" aria-expanded="false"
													tabindex="0" aria-disabled="false"
													aria-labelledby="select2-status-kb-container"
													aria-controls="select2-status-kb-container"><span
														class="select2-selection__rendered"
														id="select2-status-kb-container" role="textbox"
														aria-readonly="true" title="Select an option"><span
															class="select2-selection__placeholder">Select an option</span></span><span
														class="select2-selection__arrow" role="presentation"><b
															role="presentation"></b></span></span></span><span
												class="dropdown-wrapper" aria-hidden="true"></span></span>
									<!--end::Input-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-7 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-6 fw-bold form-label mb-2">Invoice Amount</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" name="amount" value="">
									<!--end::Input-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-15">
									<!--begin::Label-->
									<label class="fs-6 fw-bold form-label mb-2">
										<span class="required">Additional Information</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
										   data-bs-original-title="Information such as description of invoice or product purchased."
										   aria-label="Information such as description of invoice or product purchased."></i>
									</label>
									<!--end::Label-->
									<!--begin::Input-->
									<textarea class="form-control form-control-solid rounded-3"
											  name="additional_info"></textarea>
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Actions-->
								<div class="text-center">
									<button type="reset" id="kt_modal_add_payment_cancel" class="btn btn-light me-3">
										Discard
									</button>
									<button type="submit" id="kt_modal_add_payment_submit" class="btn btn-primary">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<!--end::Actions-->
								<div></div>
							</form>
							<!--end::Form-->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - New Card-->
			<!--begin::Modal - Adjust Balance-->
			<div class="modal fade" id="kt_modal_adjust_balance" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header">
							<!--begin::Modal title-->
							<h2 class="fw-bolder">Adjust Balance</h2>
							<!--end::Modal title-->
							<!--begin::Close-->
							<div id="kt_modal_adjust_balance_close" class="btn btn-icon btn-sm btn-active-icon-primary">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
								<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
															 viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
																  rx="1" transform="rotate(-45 6 17.3137)"
																  fill="currentColor"></rect>
															<rect x="7.41422" y="6" width="16" height="2" rx="1"
																  transform="rotate(45 7.41422 6)"
																  fill="currentColor"></rect>
														</svg>
													</span>
								<!--end::Svg Icon-->
							</div>
							<!--end::Close-->
						</div>
						<!--end::Modal header-->
						<!--begin::Modal body-->
						<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
							<!--begin::Balance preview-->
							<div class="d-flex text-center mb-9">
								<div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
									<div class="fs-6 fw-bold mb-2 text-muted">Current Balance</div>
									<div class="fs-2 fw-bolder" kt-modal-adjust-balance="current_balance">US$
										32,487.57
									</div>
								</div>
								<div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
									<div class="fs-6 fw-bold mb-2 text-muted">New Balance
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""
										   data-bs-original-title="Enter an amount to preview the new balance."
										   aria-label="Enter an amount to preview the new balance."></i></div>
									<div class="fs-2 fw-bolder" kt-modal-adjust-balance="new_balance">--</div>
								</div>
							</div>
							<!--end::Balance preview-->
							<!--begin::Form-->
							<form id="kt_modal_adjust_balance_form"
								  class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#">
								<!--begin::Input group-->
								<div class="fv-row mb-7 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-6 fw-bold form-label mb-2">Adjustment type</label>
									<!--end::Label-->
									<!--begin::Dropdown-->
									<select class="form-select form-select-solid fw-bolder select2-hidden-accessible"
											name="adjustment" aria-label="Select an option" data-control="select2"
											data-dropdown-parent="#kt_modal_adjust_balance"
											data-placeholder="Select an option" data-hide-search="true"
											data-select2-id="select2-data-13-ub70" tabindex="-1" aria-hidden="true">
										<option data-select2-id="select2-data-15-oadc"></option>
										<option value="1">Credit</option>
										<option value="2">Debit</option>
									</select><span class="select2 select2-container select2-container--bootstrap5"
												   dir="ltr" data-select2-id="select2-data-14-sueq"
												   style="width: 100%;"><span class="selection"><span
													class="select2-selection select2-selection--single form-select form-select-solid fw-bolder"
													role="combobox" aria-haspopup="true" aria-expanded="false"
													tabindex="0" aria-disabled="false"
													aria-labelledby="select2-adjustment-2x-container"
													aria-controls="select2-adjustment-2x-container"><span
														class="select2-selection__rendered"
														id="select2-adjustment-2x-container" role="textbox"
														aria-readonly="true" title="Select an option"><span
															class="select2-selection__placeholder">Select an option</span></span><span
														class="select2-selection__arrow" role="presentation"><b
															role="presentation"></b></span></span></span><span
												class="dropdown-wrapper" aria-hidden="true"></span></span>
									<!--end::Dropdown-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-7 fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-6 fw-bold form-label mb-2">Amount</label>
									<!--end::Label-->
									<!--begin::Input-->
									<input id="kt_modal_inputmask" type="text" class="form-control form-control-solid"
										   name="amount" value="" inputmode="text">
									<!--end::Input-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-7">
									<!--begin::Label-->
									<label class="fs-6 fw-bold form-label mb-2">Add adjustment note</label>
									<!--end::Label-->
									<!--begin::Input-->
									<textarea class="form-control form-control-solid rounded-3 mb-5"></textarea>
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Disclaimer-->
								<div class="fs-7 text-muted mb-15">Please be aware that all manual balance changes will
									be audited by the financial team every fortnight. Please maintain your invoices and
									receipts until then. Thank you.
								</div>
								<!--end::Disclaimer-->
								<!--begin::Actions-->
								<div class="text-center">
									<button type="reset" id="kt_modal_adjust_balance_cancel" class="btn btn-light me-3">
										Discard
									</button>
									<button type="submit" id="kt_modal_adjust_balance_submit" class="btn btn-primary">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<!--end::Actions-->
								<div></div>
							</form>
							<!--end::Form-->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<!--end::Modal - New Card-->
			<!--begin::Modal - New Address-->
			<div class="modal fade" id="kt_modal_update_customer" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Form-->
						<form class="form" action="#" id="kt_modal_update_customer_form">
							<!--begin::Modal header-->
							<div class="modal-header" id="kt_modal_update_customer_header">
								<!--begin::Modal title-->
								<h2 class="fw-bolder">Update Customer</h2>
								<!--end::Modal title-->
								<!--begin::Close-->
								<div id="kt_modal_update_customer_close"
									 class="btn btn-icon btn-sm btn-active-icon-primary">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
									<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
																 height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="6" y="17.3137" width="16"
																	  height="2" rx="1"
																	  transform="rotate(-45 6 17.3137)"
																	  fill="currentColor"></rect>
																<rect x="7.41422" y="6" width="16" height="2" rx="1"
																	  transform="rotate(45 7.41422 6)"
																	  fill="currentColor"></rect>
															</svg>
														</span>
									<!--end::Svg Icon-->
								</div>
								<!--end::Close-->
							</div>
							<!--end::Modal header-->
							<!--begin::Modal body-->
							<div class="modal-body py-10 px-lg-17">
								<!--begin::Scroll-->
								<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_customer_scroll"
									 data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
									 data-kt-scroll-max-height="auto"
									 data-kt-scroll-dependencies="#kt_modal_update_customer_header"
									 data-kt-scroll-wrappers="#kt_modal_update_customer_scroll"
									 data-kt-scroll-offset="300px" style="max-height: 661px;">
									<!--begin::Notice-->
									<!--begin::Notice-->
									<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
										<!--begin::Icon-->
										<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
										<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.3" x="2" y="2" width="20"
																		  height="20" rx="10"
																		  fill="currentColor"></rect>
																	<rect x="11" y="14" width="7" height="2" rx="1"
																		  transform="rotate(-90 11 14)"
																		  fill="currentColor"></rect>
																	<rect x="11" y="17" width="2" height="2" rx="1"
																		  transform="rotate(-90 11 17)"
																		  fill="currentColor"></rect>
																</svg>
															</span>
										<!--end::Svg Icon-->
										<!--end::Icon-->
										<!--begin::Wrapper-->
										<div class="d-flex flex-stack flex-grow-1">
											<!--begin::Content-->
											<div class="fw-bold">
												<div class="fs-6 text-gray-700">Updating customer details will receive a
													privacy audit. For more info, please read our
													<a href="#">Privacy Policy</a></div>
											</div>
											<!--end::Content-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Notice-->
									<!--end::Notice-->
									<!--begin::User toggle-->
									<div class="fw-bolder fs-3 rotate collapsible mb-7" data-bs-toggle="collapse"
										 href="#kt_modal_update_customer_user_info" role="button" aria-expanded="false"
										 aria-controls="kt_modal_update_customer_user_info">User Information
										<span class="ms-2 rotate-180">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																		  fill="currentColor"></path>
																</svg>
															</span>
											<!--end::Svg Icon-->
														</span></div>
									<!--end::User toggle-->
									<!--begin::User form-->
									<div id="kt_modal_update_customer_user_info" class="collapse show">
										<!--begin::Input group-->
										<div class="mb-7">
											<!--begin::Label-->
											<label class="fs-6 fw-bold mb-2">
												<span>Update Avatar</span>
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
												   title="" data-bs-original-title="Allowed file types: png, jpg, jpeg."
												   aria-label="Allowed file types: png, jpg, jpeg."></i>
											</label>
											<!--end::Label-->
											<!--begin::Image input wrapper-->
											<div class="mt-1">
												<!--begin::Image input-->
												<div class="image-input image-input-outline" data-kt-image-input="true"
													 style="background-image: url('<?= public_url() ?>assets/media/svg/avatars/blank.svg')">
													<!--begin::Preview existing avatar-->
													<div class="image-input-wrapper w-125px h-125px"
														 style="background-image: url(<?= public_url() ?>assets/media/avatars/300-1.jpg)"></div>
													<!--end::Preview existing avatar-->
													<!--begin::Edit-->
													<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
														   data-kt-image-input-action="change" data-bs-toggle="tooltip"
														   title="" data-bs-original-title="Change avatar">
														<i class="bi bi-pencil-fill fs-7"></i>
														<!--begin::Inputs-->
														<input type="file" name="avatar" accept=".png, .jpg, .jpeg">
														<input type="hidden" name="avatar_remove">
														<!--end::Inputs-->
													</label>
													<!--end::Edit-->
													<!--begin::Cancel-->
													<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
														  data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
														  title="" data-bs-original-title="Cancel avatar">
																			<i class="bi bi-x fs-2"></i>
																		</span>
													<!--end::Cancel-->
													<!--begin::Remove-->
													<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
														  data-kt-image-input-action="remove" data-bs-toggle="tooltip"
														  title="" data-bs-original-title="Remove avatar">
																			<i class="bi bi-x fs-2"></i>
																		</span>
													<!--end::Remove-->
												</div>
												<!--end::Image input-->
											</div>
											<!--end::Image input wrapper-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="fs-6 fw-bold mb-2">Name</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input type="text" class="form-control form-control-solid" placeholder=""
												   name="name" value="Sean Bean">
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Label-->
											<label class="fs-6 fw-bold mb-2">
												<span>Email</span>
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
												   title="" data-bs-original-title="Email address must be active"
												   aria-label="Email address must be active"></i>
											</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input type="email" class="form-control form-control-solid" placeholder=""
												   name="email" value="sean@dellito.com">
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-15">
											<!--begin::Label-->
											<label class="fs-6 fw-bold mb-2">Description</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input type="text" class="form-control form-control-solid" placeholder=""
												   name="description">
											<!--end::Input-->
										</div>
										<!--end::Input group-->
									</div>
									<!--end::User form-->
									<!--begin::Billing toggle-->
									<div class="fw-bolder fs-3 rotate collapsible collapsed mb-7"
										 data-bs-toggle="collapse" href="#kt_modal_update_customer_billing_info"
										 role="button" aria-expanded="false"
										 aria-controls="kt_modal_update_customer_billing_info">Shipping Information
										<span class="ms-2 rotate-180">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																		  fill="currentColor"></path>
																</svg>
															</span>
											<!--end::Svg Icon-->
														</span></div>
									<!--end::Billing toggle-->
									<!--begin::Billing form-->
									<div id="kt_modal_update_customer_billing_info" class="collapse">
										<!--begin::Input group-->
										<div class="d-flex flex-column mb-7 fv-row">
											<!--begin::Label-->
											<label class="fs-6 fw-bold mb-2">Address Line 1</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input class="form-control form-control-solid" placeholder=""
												   name="address1" value="101, Collins Street">
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="d-flex flex-column mb-7 fv-row">
											<!--begin::Label-->
											<label class="fs-6 fw-bold mb-2">Address Line 2</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input class="form-control form-control-solid" placeholder=""
												   name="address2">
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="d-flex flex-column mb-7 fv-row">
											<!--begin::Label-->
											<label class="fs-6 fw-bold mb-2">Town</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input class="form-control form-control-solid" placeholder="" name="city"
												   value="Melbourne">
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="row g-9 mb-7">
											<!--begin::Col-->
											<div class="col-md-6 fv-row">
												<!--begin::Label-->
												<label class="fs-6 fw-bold mb-2">State / Province</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input class="form-control form-control-solid" placeholder=""
													   name="state" value="Victoria">
												<!--end::Input-->
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-md-6 fv-row">
												<!--begin::Label-->
												<label class="fs-6 fw-bold mb-2">Post Code</label>
												<!--end::Label-->
												<!--begin::Input-->
												<input class="form-control form-control-solid" placeholder=""
													   name="postcode" value="3000">
												<!--end::Input-->
											</div>
											<!--end::Col-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="d-flex flex-column mb-7 fv-row">
											<!--begin::Label-->
											<label class="fs-6 fw-bold mb-2">
												<span>Country</span>
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
												   title="" data-bs-original-title="Country of origination"
												   aria-label="Country of origination"></i>
											</label>
											<!--end::Label-->
											<!--begin::Input-->
											<select name="country" aria-label="Select a Country" data-control="select2"
													data-placeholder="Select a Country..."
													data-dropdown-parent="#kt_modal_update_customer"
													class="form-select form-select-solid fw-bolder select2-hidden-accessible"
													data-select2-id="select2-data-16-ig9p" tabindex="-1"
													aria-hidden="true">
												<option value="" data-select2-id="select2-data-18-8i7c">Select a
													Country...
												</option>
												<option value="AF">Afghanistan</option>
												<option value="AX">Aland Islands</option>
												<option value="AL">Albania</option>
												<option value="DZ">Algeria</option>
												<option value="AS">American Samoa</option>
												<option value="AD">Andorra</option>
												<option value="AO">Angola</option>
												<option value="AI">Anguilla</option>
												<option value="AG">Antigua and Barbuda</option>
												<option value="AR">Argentina</option>
												<option value="AM">Armenia</option>
												<option value="AW">Aruba</option>
												<option value="AU">Australia</option>
												<option value="AT">Austria</option>
												<option value="AZ">Azerbaijan</option>
												<option value="BS">Bahamas</option>
												<option value="BH">Bahrain</option>
												<option value="BD">Bangladesh</option>
												<option value="BB">Barbados</option>
												<option value="BY">Belarus</option>
												<option value="BE">Belgium</option>
												<option value="BZ">Belize</option>
												<option value="BJ">Benin</option>
												<option value="BM">Bermuda</option>
												<option value="BT">Bhutan</option>
												<option value="BO">Bolivia, Plurinational State of</option>
												<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
												<option value="BA">Bosnia and Herzegovina</option>
												<option value="BW">Botswana</option>
												<option value="BR">Brazil</option>
												<option value="IO">British Indian Ocean Territory</option>
												<option value="BN">Brunei Darussalam</option>
												<option value="BG">Bulgaria</option>
												<option value="BF">Burkina Faso</option>
												<option value="BI">Burundi</option>
												<option value="KH">Cambodia</option>
												<option value="CM">Cameroon</option>
												<option value="CA">Canada</option>
												<option value="CV">Cape Verde</option>
												<option value="KY">Cayman Islands</option>
												<option value="CF">Central African Republic</option>
												<option value="TD">Chad</option>
												<option value="CL">Chile</option>
												<option value="CN">China</option>
												<option value="CX">Christmas Island</option>
												<option value="CC">Cocos (Keeling) Islands</option>
												<option value="CO">Colombia</option>
												<option value="KM">Comoros</option>
												<option value="CK">Cook Islands</option>
												<option value="CR">Costa Rica</option>
												<option value="CI">Côte d'Ivoire</option>
												<option value="HR">Croatia</option>
												<option value="CU">Cuba</option>
												<option value="CW">Curaçao</option>
												<option value="CZ">Czech Republic</option>
												<option value="DK">Denmark</option>
												<option value="DJ">Djibouti</option>
												<option value="DM">Dominica</option>
												<option value="DO">Dominican Republic</option>
												<option value="EC">Ecuador</option>
												<option value="EG">Egypt</option>
												<option value="SV">El Salvador</option>
												<option value="GQ">Equatorial Guinea</option>
												<option value="ER">Eritrea</option>
												<option value="EE">Estonia</option>
												<option value="ET">Ethiopia</option>
												<option value="FK">Falkland Islands (Malvinas)</option>
												<option value="FJ">Fiji</option>
												<option value="FI">Finland</option>
												<option value="FR">France</option>
												<option value="PF">French Polynesia</option>
												<option value="GA">Gabon</option>
												<option value="GM">Gambia</option>
												<option value="GE">Georgia</option>
												<option value="DE">Germany</option>
												<option value="GH">Ghana</option>
												<option value="GI">Gibraltar</option>
												<option value="GR">Greece</option>
												<option value="GL">Greenland</option>
												<option value="GD">Grenada</option>
												<option value="GU">Guam</option>
												<option value="GT">Guatemala</option>
												<option value="GG">Guernsey</option>
												<option value="GN">Guinea</option>
												<option value="GW">Guinea-Bissau</option>
												<option value="HT">Haiti</option>
												<option value="VA">Holy See (Vatican City State)</option>
												<option value="HN">Honduras</option>
												<option value="HK">Hong Kong</option>
												<option value="HU">Hungary</option>
												<option value="IS">Iceland</option>
												<option value="IN">India</option>
												<option value="ID">Indonesia</option>
												<option value="IR">Iran, Islamic Republic of</option>
												<option value="IQ">Iraq</option>
												<option value="IE">Ireland</option>
												<option value="IM">Isle of Man</option>
												<option value="IL">Israel</option>
												<option value="IT">Italy</option>
												<option value="JM">Jamaica</option>
												<option value="JP">Japan</option>
												<option value="JE">Jersey</option>
												<option value="JO">Jordan</option>
												<option value="KZ">Kazakhstan</option>
												<option value="KE">Kenya</option>
												<option value="KI">Kiribati</option>
												<option value="KP">Korea, Democratic People's Republic of</option>
												<option value="KW">Kuwait</option>
												<option value="KG">Kyrgyzstan</option>
												<option value="LA">Lao People's Democratic Republic</option>
												<option value="LV">Latvia</option>
												<option value="LB">Lebanon</option>
												<option value="LS">Lesotho</option>
												<option value="LR">Liberia</option>
												<option value="LY">Libya</option>
												<option value="LI">Liechtenstein</option>
												<option value="LT">Lithuania</option>
												<option value="LU">Luxembourg</option>
												<option value="MO">Macao</option>
												<option value="MG">Madagascar</option>
												<option value="MW">Malawi</option>
												<option value="MY">Malaysia</option>
												<option value="MV">Maldives</option>
												<option value="ML">Mali</option>
												<option value="MT">Malta</option>
												<option value="MH">Marshall Islands</option>
												<option value="MQ">Martinique</option>
												<option value="MR">Mauritania</option>
												<option value="MU">Mauritius</option>
												<option value="MX">Mexico</option>
												<option value="FM">Micronesia, Federated States of</option>
												<option value="MD">Moldova, Republic of</option>
												<option value="MC">Monaco</option>
												<option value="MN">Mongolia</option>
												<option value="ME">Montenegro</option>
												<option value="MS">Montserrat</option>
												<option value="MA">Morocco</option>
												<option value="MZ">Mozambique</option>
												<option value="MM">Myanmar</option>
												<option value="NA">Namibia</option>
												<option value="NR">Nauru</option>
												<option value="NP">Nepal</option>
												<option value="NL">Netherlands</option>
												<option value="NZ">New Zealand</option>
												<option value="NI">Nicaragua</option>
												<option value="NE">Niger</option>
												<option value="NG">Nigeria</option>
												<option value="NU">Niue</option>
												<option value="NF">Norfolk Island</option>
												<option value="MP">Northern Mariana Islands</option>
												<option value="NO">Norway</option>
												<option value="OM">Oman</option>
												<option value="PK">Pakistan</option>
												<option value="PW">Palau</option>
												<option value="PS">Palestinian Territory, Occupied</option>
												<option value="PA">Panama</option>
												<option value="PG">Papua New Guinea</option>
												<option value="PY">Paraguay</option>
												<option value="PE">Peru</option>
												<option value="PH">Philippines</option>
												<option value="PL">Poland</option>
												<option value="PT">Portugal</option>
												<option value="PR">Puerto Rico</option>
												<option value="QA">Qatar</option>
												<option value="RO">Romania</option>
												<option value="RU">Russian Federation</option>
												<option value="RW">Rwanda</option>
												<option value="BL">Saint Barthélemy</option>
												<option value="KN">Saint Kitts and Nevis</option>
												<option value="LC">Saint Lucia</option>
												<option value="MF">Saint Martin (French part)</option>
												<option value="VC">Saint Vincent and the Grenadines</option>
												<option value="WS">Samoa</option>
												<option value="SM">San Marino</option>
												<option value="ST">Sao Tome and Principe</option>
												<option value="SA">Saudi Arabia</option>
												<option value="SN">Senegal</option>
												<option value="RS">Serbia</option>
												<option value="SC">Seychelles</option>
												<option value="SL">Sierra Leone</option>
												<option value="SG">Singapore</option>
												<option value="SX">Sint Maarten (Dutch part)</option>
												<option value="SK">Slovakia</option>
												<option value="SI">Slovenia</option>
												<option value="SB">Solomon Islands</option>
												<option value="SO">Somalia</option>
												<option value="ZA">South Africa</option>
												<option value="KR">South Korea</option>
												<option value="SS">South Sudan</option>
												<option value="ES">Spain</option>
												<option value="LK">Sri Lanka</option>
												<option value="SD">Sudan</option>
												<option value="SR">Suriname</option>
												<option value="SZ">Swaziland</option>
												<option value="SE">Sweden</option>
												<option value="CH">Switzerland</option>
												<option value="SY">Syrian Arab Republic</option>
												<option value="TW">Taiwan, Province of China</option>
												<option value="TJ">Tajikistan</option>
												<option value="TZ">Tanzania, United Republic of</option>
												<option value="TH">Thailand</option>
												<option value="TG">Togo</option>
												<option value="TK">Tokelau</option>
												<option value="TO">Tonga</option>
												<option value="TT">Trinidad and Tobago</option>
												<option value="TN">Tunisia</option>
												<option value="TR">Turkey</option>
												<option value="TM">Turkmenistan</option>
												<option value="TC">Turks and Caicos Islands</option>
												<option value="TV">Tuvalu</option>
												<option value="UG">Uganda</option>
												<option value="UA">Ukraine</option>
												<option value="AE">United Arab Emirates</option>
												<option value="GB">United Kingdom</option>
												<option value="US">United States</option>
												<option value="UY">Uruguay</option>
												<option value="UZ">Uzbekistan</option>
												<option value="VU">Vanuatu</option>
												<option value="VE">Venezuela, Bolivarian Republic of</option>
												<option value="VN">Vietnam</option>
												<option value="VI">Virgin Islands</option>
												<option value="YE">Yemen</option>
												<option value="ZM">Zambia</option>
												<option value="ZW">Zimbabwe</option>
											</select><span
													class="select2 select2-container select2-container--bootstrap5"
													dir="ltr" data-select2-id="select2-data-17-oh7n"
													style="width: 100%;"><span class="selection"><span
															class="select2-selection select2-selection--single form-select form-select-solid fw-bolder"
															role="combobox" aria-haspopup="true" aria-expanded="false"
															tabindex="0" aria-disabled="false"
															aria-labelledby="select2-country-n2-container"
															aria-controls="select2-country-n2-container"><span
																class="select2-selection__rendered"
																id="select2-country-n2-container" role="textbox"
																aria-readonly="true" title="Select a Country..."><span
																	class="select2-selection__placeholder">Select a Country...</span></span><span
																class="select2-selection__arrow" role="presentation"><b
																	role="presentation"></b></span></span></span><span
														class="dropdown-wrapper" aria-hidden="true"></span></span>
											<!--end::Input-->
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="fv-row mb-7">
											<!--begin::Wrapper-->
											<div class="d-flex flex-stack">
												<!--begin::Label-->
												<div class="me-5">
													<!--begin::Label-->
													<label class="fs-6 fw-bold">Use as a billing adderess?</label>
													<!--end::Label-->
													<!--begin::Input-->
													<div class="fs-7 fw-bold text-muted">If you need more info, please
														check budget planning
													</div>
													<!--end::Input-->
												</div>
												<!--end::Label-->
												<!--begin::Switch-->
												<label class="form-check form-switch form-check-custom form-check-solid">
													<!--begin::Input-->
													<input class="form-check-input" name="billing" type="checkbox"
														   value="1" id="kt_modal_update_customer_billing"
														   checked="checked">
													<!--end::Input-->
													<!--begin::Label-->
													<span class="form-check-label fw-bold text-muted"
														  for="kt_modal_update_customer_billing">Yes</span>
													<!--end::Label-->
												</label>
												<!--end::Switch-->
											</div>
											<!--begin::Wrapper-->
										</div>
										<!--end::Input group-->
									</div>
									<!--end::Billing form-->
								</div>
								<!--end::Scroll-->
							</div>
							<!--end::Modal body-->
							<!--begin::Modal footer-->
							<div class="modal-footer flex-center">
								<!--begin::Button-->
								<button type="reset" id="kt_modal_update_customer_cancel" class="btn btn-light me-3">
									Discard
								</button>
								<!--end::Button-->
								<!--begin::Button-->
								<button type="submit" id="kt_modal_update_customer_submit" class="btn btn-primary">
									<span class="indicator-label">Submit</span>
									<span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Button-->
							</div>
							<!--end::Modal footer-->
						</form>
						<!--end::Form-->
					</div>
				</div>
			</div>
			<!--end::Modal - New Address-->
			<!--begin::Modal - New Card-->
			<div class="modal fade" id="addContact" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header">
							<!--begin::Modal title-->
							<h2>Yetkili Kaydı Oluştur</h2>
							<!--end::Modal title-->
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
								<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
															 viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
																  rx="1" transform="rotate(-45 6 17.3137)"
																  fill="currentColor"></rect>
															<rect x="7.41422" y="6" width="16" height="2" rx="1"
																  transform="rotate(45 7.41422 6)"
																  fill="currentColor"></rect>
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
							<form id="addContactForm" class="form fv-plugins-bootstrap5 fv-plugins-framework"
								  action="#">
								<input type="hidden" name="action" value="ADD_CONTACT">
								<input type="hidden" name="customerID" value="<?= $data["customerId"] ?>">
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Ad-Soyad</span>
									</label>
									<!--end::Label-->
									<input required type="text" class="form-control form-control-solid" placeholder=""
										   name="name" value="">
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class=" fs-6 fw-bold form-label mb-2">E-posta Adresi</label>
									<!--end::Label-->
									<input type="email" class="form-control form-control-solid" placeholder=""
										   name="email" value="">
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class=" fs-6 fw-bold form-label mb-2">Telefon Numarası</label>
									<!--end::Label-->
									<input type="text" class="phoneMask form-control form-control-solid" placeholder=""
										   name="phone" value="">
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class=" fs-6 fw-bold form-label mb-2">Departman / Pozisyon</label>
									<!--end::Label-->
									<input type="text" class="form-control form-control-solid" placeholder=""
										   name="department" value="">
								</div>
								<!--end::Input group-->


								<!--begin::Actions-->
								<div class="text-center pt-15">
									<button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">
										Kapat
									</button>
									<button type="submit" id="" class="btn btn-primary">
										<span class="indicator-label">Kaydet</span>
										<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<!--end::Actions-->
								<div></div>
							</form>
							<!--end::Form-->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>
			<div class="modal fade" id="editContact" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header">
							<!--begin::Modal title-->
							<h2>Yetkili Kaydı Düzenle</h2>
							<!--end::Modal title-->
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
								<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
															 viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
																  rx="1" transform="rotate(-45 6 17.3137)"
																  fill="currentColor"></rect>
															<rect x="7.41422" y="6" width="16" height="2" rx="1"
																  transform="rotate(45 7.41422 6)"
																  fill="currentColor"></rect>
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
							<form id="editContactForm" class="form fv-plugins-bootstrap5 fv-plugins-framework"
								  action="#">
								<input type="hidden" name="action" value="EDIT_CONTACT">
								<input type="hidden" name="contactID" value="">
								<input type="hidden" name="customerID" value="<?= $data["customerId"] ?>">
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Ad-Soyad</span>
									</label>
									<!--end::Label-->
									<input required type="text" class="form-control form-control-solid" placeholder=""
										   name="name" value="">
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class=" fs-6 fw-bold form-label mb-2">E-posta Adresi</label>
									<!--end::Label-->
									<input type="email" class="form-control form-control-solid" placeholder=""
										   name="email" value="">
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class=" fs-6 fw-bold form-label mb-2">Telefon Numarası</label>
									<!--end::Label-->
									<input type="text" class="phoneMask form-control form-control-solid" placeholder=""
										   name="phone" value="">
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class=" fs-6 fw-bold form-label mb-2">Departman / Pozisyon</label>
									<!--end::Label-->
									<input type="text" class="form-control form-control-solid" placeholder=""
										   name="department" value="">
								</div>
								<!--end::Input group-->


								<!--begin::Actions-->
								<div class="text-center pt-15">
									<button type="reset" data-bs-dismiss="modal" class="btn btn-light me-3">
										Kapat
									</button>
									<button type="submit" id="" class="btn btn-primary">
										<span class="indicator-label">Kaydet</span>
										<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
								</div>
								<!--end::Actions-->
								<div></div>
							</form>
							<!--end::Form-->
						</div>
						<!--end::Modal body-->
					</div>
					<!--end::Modal content-->
				</div>
				<!--end::Modal dialog-->
			</div>

			<!--end::Modal - New Card-->
			<div class="modal fade" id="kt_modal_edit_user" data-bs-backdrop="static"
				 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_add_user_header">
							<!--begin::Modal title-->
							<h2 class="fw-bolder">Yeni Oluştur</h2>
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
							<form id="editCustomerForm" enctype="multipart/form-data" class="form"
								  action="#">
								<input type="hidden" name="">

								<input type="hidden" name="customerID" value="<?= $data["customerId"] ?>">
								<input type="hidden" name="action" value="EDIT">
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
												<label class="select-individual btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success <?= $data["type"] == "INDIVIDUAL" ? "active" : ""; ?>"
													   data-kt-button="true">
													<!--begin::Input-->
													<input class="btn-check" <?= $data["type"] == "INDIVIDUAL" ? "checked" : ""; ?>
														   type="radio"
														   name="type"
														   value="INDIVIDUAL"/>
													<!--end::Input-->
													Bireysel
												</label>
												<!--end::Radio-->
												<!--begin::Radio-->
												<label class="select-corporate btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success  <?= $data["type"] == "INDIVIDUAL" ? "" : "active"; ?>"
													   data-kt-button="true">
													<!--begin::Input-->
													<input class="btn-check" <?= $data["type"] == "INDIVIDUAL" ? "" : "checked"; ?>
														   type="radio" name="type"
														   value="CORPORATE"/>
													<!--end::Input-->
													Kurumsal
												</label>
												<!--end::Radio-->
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<h4 class="mb-7">Temel Bilgiler </h4>

												<div class="fv-row row mb-5">
													<!--begin::Input group-->
													<div
															class="col-md-12 col-sm-12 fv-row">
														<!--begin::Label-->
														<label data-np-type="CORPORATE"
															   class="required fw-bold fs-6 mb-2">Firma
															Adı</label>
														<label data-np-type="INDIVIDUAL"
															   class="required fw-bold fs-6 mb-2">Ad-Soyad</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text"
															   name="name"
															   value="<?= $data["name"] ?>"
															   class="form-control form-control-lg form-control-solid">
														<!--end::Input-->
													</div>
													<!--end::Input group-->
												</div>
												<div class="fv-row row mb-5">
													<div class="col-md-6 col-sm-12 fv-row">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">Kısa İsim <i
																	class="fa fa-info-circle"
																	data-bs-toggle="tooltip"
																	title="Kısa isim, müşteriyi tanımlamak amacıyla yalnızca ekip üyelerine gösterilir."></i></label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text"
															   name="shortName"
															   value="<?= $data["shortName"] ?>"
															   class="form-control form-control-lg form-control-solid">
														<!--end::Input-->
													</div>
													<div class="col-md-6 col-sm-12 fv-row">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2 d-flex">Müşteri
															Grubu</label>
														<!--end::Label-->
														<!--begin::Input-->
														<select type="text"
																name="fkCustomerGroup"
																class="form-control form-control-lg form-control-solid selectCustomerGroup">
															<option value="">Seçim Yok</option>
															<?php
															foreach ($customerGroups as $customerGroup) {
																?>
																<option <?= $data["fkCustomerGroup"] == $customerGroup["customerGroupId"] ? "selected" : ""; ?>
																		value="<?= $customerGroup["customerGroupId"] ?>"><?= $customerGroup["title"] ?></option>
																<?php
															}
															?>
														</select>
														<!--end::Input-->
													</div>
												</div>
												<div class="fv-row row mb-5">
													<!--begin::Input group-->
													<div data-np-type="INDIVIDUAL"
														 class="col-md-6 col-sm-12 fv-row">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">TC Kimlik
															Numarası</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text"
															   pattern="(\d)+"
															   name="identityNumber"
															   value="<?= $data["type"] == "INDIVIDUAL" ? $data["taxNumber"] : ""; ?>"
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
														<label class="fw-bold fs-6 mb-2">Vergi
															Numarası</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text"
															   minlength="10"
															   maxlength="10"
															   name="taxNumber"
															   value="<?= $data["type"] == "CORPORATE" ? $data["taxNumber"] : ""; ?>"
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
															   value="<?= $data["taxOffice"] ?>"
															   class="form-control form-control-lg form-control-solid">
														<!--end::Input-->
													</div>
													<!--end::Input group-->
												</div>
												<div class="fv-row row mb-5">
													<div style="margin-top: -7px;"
														 class="col-md-12 col-sm-12 fv-row">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">Müşteri
															Notları</label>
														<!--end::Label-->
														<!--begin::Input-->
														<textarea name="notes" rows="3"
																  class="resize-none form-control form-control-solid"><?= $data["notes"] ?></textarea>
														<!--end::Input-->
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<h4 class="mb-7">İletişim Bilgileri</h4>
												<div class="fv-row row mb-5">
													<div class="col-md-12 col-sm-12 fv-row">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">E-Posta
															Adresi</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="email"
															   value="<?= $data["email"] ?>"
															   name="email"
															   class="form-control form-control-lg form-control-solid">
														<!--end::Input-->
													</div>
												</div>
												<div class="fv-row row mb-5">
													<div class="col-md-12 col-sm-12 fv-row">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">Ülke</label>
														<!--end::Label-->
														<!--begin::Input-->
														<select name="fkCountry" required id=""
																class="form-control form-control-solid selectCountry">
															<?php
															foreach (getCountries() as $country) {
																?>
																<option <?= $country["countryId"] == $data["fkCountry"] ? 'selected' : ''; ?>
																		value="<?= $country["countryId"] ?>"><?= $country["title"] ?></option>
																<?php
															}
															?>
														</select>
														<!--end::Input-->

													</div>
												</div>
												<div class="fv-row row mb-5">
													<div class="col-md-6 col-sm-12 fv-row">
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
																<option <?= $city["cityId"] == $data["fkCity"] ? "selected" : ""; ?>
																		value="<?= $city["cityId"] ?>"><?= $city["title"] ?></option>
																<?php
															}
															?>
														</select>
														<!--end::Input-->

													</div>
													<input type="hidden" name="old_District"
														   value="<?= $data["fkDistrict"] ?>">
													<div class="col-md-6 col-sm-12 fv-row ">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">İlçe</label>
														<!--end::Label-->
														<!--begin::Input-->
														<select name="fkDistrict" id=""
																class="form-control form-control-solid selectDistrict">
															<option value="">İlçe Seçimi</option>
															<?php
															foreach ($districts as $district) {
																?>
																<option <?= $district["districtId"] == $data["fkDistrict"] ? "selected" : ""; ?>
																		value="<?= $district["districtId"] ?>">
																	<?= $district["title"] ?>
																</option>
																<?php
															}
															?>
														</select>
														<!--end::Input-->
													</div>

												</div>
												<div class="fv-row row mb-5">
													<div class="col-md-12 col-sm-12 fv-row mb-7">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">Adres</label>
														<!--end::Label-->
														<!--begin::Input-->
														<textarea name="address"
																  class="form-control form-control-lg form-control-solid resize-none"><?= $data["address"] ?></textarea>
														<!--end::Input-->
													</div>
												</div>
												<div class="fv-row row mb-5">
													<div class="col-md-6 col-sm-12 fv-row mb-7">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">Telefon
															Numarası</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text"
															   name="phone"
															   value="<?= phoneMask($data["phone"]) ?>"
															   class="form-control phoneMask form-control-lg form-control-solid">
														<!--end::Input-->
													</div>

													<div class="col-md-6 col-sm-12 fv-row mb-7">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">Telefon
															Numarası - 2</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text"
															   name="secondPhone"
															   value="<?= phoneMask($data["secondPhone"]) ?>"
															   class="form-control phoneMask form-control-lg form-control-solid">
														<!--end::Input-->
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
													<input readonly class="form-control form-control-solid"
														   name="department"/>
													<!--end::Input-->
												</div>
												<div class="col-md-3 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Görevli Usta/Mühendis</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input readonly class="form-control form-control-solid"
														   name="author"/>
													<!--end::Input-->
												</div>
												<div class="col-md-3 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Ürünlerin Veriliş Tarihi</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input disabled data-kt-calendar="datepicker" required
														   class="form-control form-control-solid"
														   name="startDate"/>
													<!--end::Input-->
												</div>
												<div class="col-md-3 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Geri Alınacak Tarih</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input disabled data-kt-calendar="datepicker" required
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
													<textarea readonly rows="4"
															  class="resize-none form-control form-control-solid"
															  name="equipment"></textarea>
													<!--end::Input-->
												</div>
												<div class="col-md-6 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Sürece İlişkin Notlar</label>
													<!--end::Label-->
													<!--begin::Input-->
													<textarea readonly rows="4"
															  class="resize-none form-control form-control-solid"
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
													<textarea readonly rows="3"
															  class="resize-none form-control form-control-solid"
															  name="expectedPerformance"></textarea>
													<!--end::Input-->
												</div>
												<div class="col-md-6 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Deneme Sonucu Performans</label>
													<!--end::Label-->
													<!--begin::Input-->
													<textarea readonly rows="3"
															  class="resize-none form-control form-control-solid"
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
																<select readonly required
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
																		<input readonly type="number" name="amount"
																			   required value="1"
																			   class="form-control form-control-solid mb-2 mb-md-0"/>
																	</div>
																	<div class="col">
																		<select disabled required
																				class="form-control-solid form-control"
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
																<select disabled name="tpStatus" id=""
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
									<a href="" class="goToSale btn btn-light-primary">
										<span class="indicator-label">Satışa Git</span>
										<span class="indicator-progress">Please wait...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</a>
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

			<!--end::Modals-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
