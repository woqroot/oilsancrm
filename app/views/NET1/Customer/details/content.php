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
								<div class="fs-5 fw-bold text-muted mb-6"><?= $data["shortName"] ? $data["shortName"] : "Yok" ?></div>
								<!--end::Position-->
								<!--begin::Info-->
								<div class="d-flex flex-wrap flex-center">
									<!--begin::Stats-->
									<div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
										<div class="fs-4 fw-bolder text-gray-700">
											<span class="w-75px">₺ 6,900</span>
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
										<div class="fw-bold text-muted">Satış</div>
									</div>
									<!--end::Stats-->
									<!--begin::Stats-->
									<div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
										<div class="fs-4 fw-bolder text-gray-700">
											<span class="w-50px">130</span>
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
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
										<div class="fw-bold text-muted">Tasks</div>
									</div>
									<!--end::Stats-->
									<!--begin::Stats-->
									<div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
										<div class="fs-4 fw-bolder text-gray-700">
											<span class="w-50px">500</span>
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
										<div class="fw-bold text-muted">Hours</div>
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
					<!--begin::Connected Accounts-->
					<div class="card mb-5 mb-xl-8">
						<!--begin::Card header-->
						<div class="card-header border-0">
							<div class="card-title">
								<h3 class="fw-bolder m-0">İletişim İzinleri</h3>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-2">

							<!--begin::Items-->
							<div class="py-2">
								<!--begin::Item-->
								<div class="d-flex flex-stack">
									<div class="d-flex">
										<i style="font-size: 3.30rem!important;margin-right: 1rem;" class="fa fa-sms"></i>

											<a href="#" class="my-auto fs-5 text-dark text-hover-primary fw-bolder"><?=phoneMask($data["phone"])?></a>

									</div>
									<div class="d-flex justify-content-end">
										<!--begin::Switch-->
										<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
											<!--begin::Input-->
											<input class="form-check-input" name="google" type="checkbox" value="1"
												   id="kt_modal_connected_accounts_google" checked="checked">
											<!--end::Input-->
											<!--begin::Label-->
											<span class="form-check-label fw-bold text-muted"
												  for="kt_modal_connected_accounts_google"></span>
											<!--end::Label-->
										</label>
										<!--end::Switch-->
									</div>
								</div>
								<!--end::Item-->
								<div class="separator separator-dashed my-5"></div>
								<!--begin::Item-->
								<div class="d-flex flex-stack">
									<div class="d-flex">
										<img src="<?= public_url() ?>assets/media/svg/brand-logos/github.svg"
											 class="w-30px me-6" alt="">
										<div class="d-flex flex-column">
											<a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Github</a>
											<div class="fs-6 fw-bold text-muted">Keep eye on on your Repositories</div>
										</div>
									</div>
									<div class="d-flex justify-content-end">
										<!--begin::Switch-->
										<label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
											<!--begin::Input-->
											<input class="form-check-input" name="github" type="checkbox" value="1"
												   id="kt_modal_connected_accounts_github" checked="checked">
											<!--end::Input-->
											<!--begin::Label-->
											<span class="form-check-label fw-bold text-muted"
												  for="kt_modal_connected_accounts_github"></span>
											<!--end::Label-->
										</label>
										<!--end::Switch-->
									</div>
								</div>
								<!--end::Item-->
							</div>
							<!--end::Items-->
						</div>
						<!--end::Card body-->
						<!--begin::Card footer-->
						<div class="card-footer border-0 d-flex justify-content-center pt-0">
							<button class="btn btn-sm btn-light-primary">Save Changes</button>
						</div>
						<!--end::Card footer-->
					</div>
					<!--end::Connected Accounts-->
				</div>
				<!--end::Sidebar-->
				<!--begin::Content-->
				<div class="flex-lg-row-fluid ms-lg-15">
					<!--begin:::Tabs-->
					<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
						<!--begin:::Tab item-->
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
							   href="#kt_customer_view_overview_tab">Fatura & Ödemeler</a>
						</li>
						<!--end:::Tab item-->
						<!--begin:::Tab item-->
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
							   href="#kt_customer_view_overview_events_and_logs_tab">Events &amp; Logs</a>
						</li>
						<!--end:::Tab item-->
						<!--begin:::Tab item-->
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true"
							   data-bs-toggle="tab" href="#kt_customer_view_overview_statements">Statements</a>
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
										<h2>Payment Records</h2>
									</div>
									<!--end::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Filter-->
										<button type="button" class="btn btn-sm btn-flex btn-light-primary"
												data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
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
											<!--end::Svg Icon-->Add payment
										</button>
										<!--end::Filter-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0 pb-5">
									<!--begin::Table-->
									<div id="kt_table_customers_payment_wrapper"
										 class="dataTables_wrapper dt-bootstrap4 no-footer">
										<div class="table-responsive">
											<table class="table align-middle table-row-dashed gy-5 dataTable no-footer"
												   id="kt_table_customers_payment">
												<!--begin::Table head-->
												<thead class="border-bottom border-gray-200 fs-7 fw-bolder">
												<!--begin::Table row-->
												<tr class="text-start text-muted text-uppercase gs-0">
													<th class="min-w-100px sorting" tabindex="0"
														aria-controls="kt_table_customers_payment" rowspan="1"
														colspan="1"
														aria-label="Invoice No.: activate to sort column ascending"
														style="width: 139.344px;">Invoice No.
													</th>
													<th class="sorting" tabindex="0"
														aria-controls="kt_table_customers_payment" rowspan="1"
														colspan="1"
														aria-label="Status: activate to sort column ascending"
														style="width: 119.688px;">Status
													</th>
													<th class="sorting" tabindex="0"
														aria-controls="kt_table_customers_payment" rowspan="1"
														colspan="1"
														aria-label="Amount: activate to sort column ascending"
														style="width: 113.938px;">Amount
													</th>
													<th class="min-w-100px sorting" tabindex="0"
														aria-controls="kt_table_customers_payment" rowspan="1"
														colspan="1" aria-label="Date: activate to sort column ascending"
														style="width: 229.469px;">Date
													</th>
													<th class="text-end min-w-100px pe-4 sorting_disabled" rowspan="1"
														colspan="1" aria-label="Actions" style="width: 148.312px;">
														Actions
													</th>
												</tr>
												<!--end::Table row-->
												</thead>
												<!--end::Table head-->
												<!--begin::Table body-->
												<tbody class="fs-6 fw-bold text-gray-600">
												<!--begin::Table row-->

												<!--end::Table row-->
												<!--begin::Table row-->

												<!--end::Table row-->
												<!--begin::Table row-->

												<!--end::Table row-->
												<!--begin::Table row-->

												<!--end::Table row-->
												<!--begin::Table row-->

												<!--end::Table row-->
												<!--begin::Table row-->

												<!--end::Table row-->
												<!--begin::Table row-->

												<!--end::Table row-->
												<!--begin::Table row-->

												<!--end::Table row-->
												<!--begin::Table row-->

												<!--end::Table row-->
												<tr class="odd">
													<!--begin::Invoice=-->
													<td>
														<a href="#" class="text-gray-600 text-hover-primary mb-1">9764-1223</a>
													</td>
													<!--end::Invoice=-->
													<!--begin::Status=-->
													<td>
														<span class="badge badge-light-success">Successful</span>
													</td>
													<!--end::Status=-->
													<!--begin::Amount=-->
													<td>$1,200.00</td>
													<!--end::Amount=-->
													<!--begin::Date=-->
													<td data-order="2020-12-14T20:43:00+03:00">14 Dec 2020, 8:43 pm</td>
													<!--end::Date=-->
													<!--begin::Action=-->
													<td class="pe-0 text-end">
														<a href="#"
														   class="btn btn-sm btn-light btn-active-light-primary"
														   data-kt-menu-trigger="click"
														   data-kt-menu-placement="bottom-end">Actions
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon svg-icon-5 m-0">
																			<svg xmlns="http://www.w3.org/2000/svg"
																				 width="24" height="24"
																				 viewBox="0 0 24 24" fill="none">
																				<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																					  fill="currentColor"></path>
																			</svg>
																		</span>
															<!--end::Svg Icon--></a>
														<!--begin::Menu-->
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
															 data-kt-menu="true">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="<?= public_url() ?>../demo1/apps/customers/view.html"
																   class="menu-link px-3">View</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3"
																   data-kt-customer-table-filter="delete_row">Delete</a>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu-->
													</td>
													<!--end::Action=-->
												</tr>
												<tr class="even">
													<!--begin::Invoice=-->
													<td>
														<a href="#" class="text-gray-600 text-hover-primary mb-1">6556-3842</a>
													</td>
													<!--end::Invoice=-->
													<!--begin::Status=-->
													<td>
														<span class="badge badge-light-success">Successful</span>
													</td>
													<!--end::Status=-->
													<!--begin::Amount=-->
													<td>$79.00</td>
													<!--end::Amount=-->
													<!--begin::Date=-->
													<td data-order="2020-12-01T10:12:00+03:00">01 Dec 2020, 10:12 am
													</td>
													<!--end::Date=-->
													<!--begin::Action=-->
													<td class="pe-0 text-end">
														<a href="#"
														   class="btn btn-sm btn-light btn-active-light-primary"
														   data-kt-menu-trigger="click"
														   data-kt-menu-placement="bottom-end">Actions
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon svg-icon-5 m-0">
																			<svg xmlns="http://www.w3.org/2000/svg"
																				 width="24" height="24"
																				 viewBox="0 0 24 24" fill="none">
																				<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																					  fill="currentColor"></path>
																			</svg>
																		</span>
															<!--end::Svg Icon--></a>
														<!--begin::Menu-->
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
															 data-kt-menu="true">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="<?= public_url() ?>../demo1/apps/customers/view.html"
																   class="menu-link px-3">View</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3"
																   data-kt-customer-table-filter="delete_row">Delete</a>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu-->
													</td>
													<!--end::Action=-->
												</tr>
												<tr class="odd">
													<!--begin::Invoice=-->
													<td>
														<a href="#" class="text-gray-600 text-hover-primary mb-1">2792-4489</a>
													</td>
													<!--end::Invoice=-->
													<!--begin::Status=-->
													<td>
														<span class="badge badge-light-success">Successful</span>
													</td>
													<!--end::Status=-->
													<!--begin::Amount=-->
													<td>$5,500.00</td>
													<!--end::Amount=-->
													<!--begin::Date=-->
													<td data-order="2020-11-12T14:01:00+03:00">12 Nov 2020, 2:01 pm</td>
													<!--end::Date=-->
													<!--begin::Action=-->
													<td class="pe-0 text-end">
														<a href="#"
														   class="btn btn-sm btn-light btn-active-light-primary"
														   data-kt-menu-trigger="click"
														   data-kt-menu-placement="bottom-end">Actions
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon svg-icon-5 m-0">
																			<svg xmlns="http://www.w3.org/2000/svg"
																				 width="24" height="24"
																				 viewBox="0 0 24 24" fill="none">
																				<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																					  fill="currentColor"></path>
																			</svg>
																		</span>
															<!--end::Svg Icon--></a>
														<!--begin::Menu-->
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
															 data-kt-menu="true">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="<?= public_url() ?>../demo1/apps/customers/view.html"
																   class="menu-link px-3">View</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3"
																   data-kt-customer-table-filter="delete_row">Delete</a>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu-->
													</td>
													<!--end::Action=-->
												</tr>
												<tr class="even">
													<!--begin::Invoice=-->
													<td>
														<a href="#" class="text-gray-600 text-hover-primary mb-1">8200-3481</a>
													</td>
													<!--end::Invoice=-->
													<!--begin::Status=-->
													<td>
														<span class="badge badge-light-warning">Pending</span>
													</td>
													<!--end::Status=-->
													<!--begin::Amount=-->
													<td>$880.00</td>
													<!--end::Amount=-->
													<!--begin::Date=-->
													<td data-order="2020-10-21T17:54:00+03:00">21 Oct 2020, 5:54 pm</td>
													<!--end::Date=-->
													<!--begin::Action=-->
													<td class="pe-0 text-end">
														<a href="#"
														   class="btn btn-sm btn-light btn-active-light-primary"
														   data-kt-menu-trigger="click"
														   data-kt-menu-placement="bottom-end">Actions
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon svg-icon-5 m-0">
																			<svg xmlns="http://www.w3.org/2000/svg"
																				 width="24" height="24"
																				 viewBox="0 0 24 24" fill="none">
																				<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																					  fill="currentColor"></path>
																			</svg>
																		</span>
															<!--end::Svg Icon--></a>
														<!--begin::Menu-->
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
															 data-kt-menu="true">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="<?= public_url() ?>../demo1/apps/customers/view.html"
																   class="menu-link px-3">View</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3"
																   data-kt-customer-table-filter="delete_row">Delete</a>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu-->
													</td>
													<!--end::Action=-->
												</tr>
												<tr class="odd">
													<!--begin::Invoice=-->
													<td>
														<a href="#" class="text-gray-600 text-hover-primary mb-1">3640-7662</a>
													</td>
													<!--end::Invoice=-->
													<!--begin::Status=-->
													<td>
														<span class="badge badge-light-success">Successful</span>
													</td>
													<!--end::Status=-->
													<!--begin::Amount=-->
													<td>$7,650.00</td>
													<!--end::Amount=-->
													<!--begin::Date=-->
													<td data-order="2020-10-19T07:32:00+03:00">19 Oct 2020, 7:32 am</td>
													<!--end::Date=-->
													<!--begin::Action=-->
													<td class="pe-0 text-end">
														<a href="#"
														   class="btn btn-sm btn-light btn-active-light-primary"
														   data-kt-menu-trigger="click"
														   data-kt-menu-placement="bottom-end">Actions
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
															<span class="svg-icon svg-icon-5 m-0">
																			<svg xmlns="http://www.w3.org/2000/svg"
																				 width="24" height="24"
																				 viewBox="0 0 24 24" fill="none">
																				<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																					  fill="currentColor"></path>
																			</svg>
																		</span>
															<!--end::Svg Icon--></a>
														<!--begin::Menu-->
														<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
															 data-kt-menu="true">
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="<?= public_url() ?>../demo1/apps/customers/view.html"
																   class="menu-link px-3">View</a>
															</div>
															<!--end::Menu item-->
															<!--begin::Menu item-->
															<div class="menu-item px-3">
																<a href="#" class="menu-link px-3"
																   data-kt-customer-table-filter="delete_row">Delete</a>
															</div>
															<!--end::Menu item-->
														</div>
														<!--end::Menu-->
													</td>
													<!--end::Action=-->
												</tr>
												</tbody>
												<!--end::Table body-->
											</table>
										</div>
										<div class="row">
											<div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
											<div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
												<div class="dataTables_paginate paging_simple_numbers"
													 id="kt_table_customers_payment_paginate">
													<ul class="pagination">
														<li class="paginate_button page-item previous disabled"
															id="kt_table_customers_payment_previous"><a href="#"
																										aria-controls="kt_table_customers_payment"
																										data-dt-idx="0"
																										tabindex="0"
																										class="page-link"><i
																		class="previous"></i></a></li>
														<li class="paginate_button page-item active"><a href="#"
																										aria-controls="kt_table_customers_payment"
																										data-dt-idx="1"
																										tabindex="0"
																										class="page-link">1</a>
														</li>
														<li class="paginate_button page-item "><a href="#"
																								  aria-controls="kt_table_customers_payment"
																								  data-dt-idx="2"
																								  tabindex="0"
																								  class="page-link">2</a>
														</li>
														<li class="paginate_button page-item next"
															id="kt_table_customers_payment_next"><a href="#"
																									aria-controls="kt_table_customers_payment"
																									data-dt-idx="3"
																									tabindex="0"
																									class="page-link"><i
																		class="next"></i></a></li>
													</ul>
												</div>
											</div>
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
										<h2 class="fw-bolder mb-0">Payment Methods</h2>
									</div>
									<!--end::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal"
										   data-bs-target="#kt_modal_new_card">
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
											<!--end::Svg Icon-->Add new method</a>
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div id="kt_customer_view_payment_method" class="card-body pt-0">
									<!--begin::Option-->
									<div class="py-0" data-kt-customer-payment-method="row">
										<!--begin::Header-->
										<div class="py-3 d-flex flex-stack flex-wrap">
											<!--begin::Toggle-->
											<div class="d-flex align-items-center collapsible rotate"
												 data-bs-toggle="collapse" href="#kt_customer_view_payment_method_1"
												 role="button" aria-expanded="false"
												 aria-controls="kt_customer_view_payment_method_1">
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
												<!--begin::Logo-->
												<img src="<?= public_url() ?>assets/media/svg/card-logos/mastercard.svg"
													 class="w-40px me-3" alt="">
												<!--end::Logo-->
												<!--begin::Summary-->
												<div class="me-3">
													<div class="d-flex align-items-center">
														<div class="text-gray-800 fw-bolder">Mastercard</div>
														<div class="badge badge-light-primary ms-5">Primary</div>
													</div>
													<div class="text-muted">Expires Dec 2024</div>
												</div>
												<!--end::Summary-->
											</div>
											<!--end::Toggle-->
											<!--begin::Toolbar-->
											<div class="d-flex my-3 ms-9">
												<!--begin::Edit-->
												<a href="#"
												   class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
												   data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
																		<span data-bs-toggle="tooltip"
																			  data-bs-trigger="hover" title=""
																			  data-bs-original-title="Edit">
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
												<a href="#"
												   class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
												   data-bs-toggle="tooltip" title=""
												   data-kt-customer-payment-method="delete"
												   data-bs-original-title="Delete">
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
												<!--end::Delete-->
												<!--begin::More-->
												<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
												   data-bs-toggle="tooltip" title="" data-kt-menu-trigger="click"
												   data-kt-menu-placement="bottom-end"
												   data-bs-original-title="More Options">
													<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
													<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg"
																				 width="24" height="24"
																				 viewBox="0 0 24 24" fill="none">
																				<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
																					  fill="currentColor"></path>
																				<path opacity="0.3"
																					  d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
																					  fill="currentColor"></path>
																			</svg>
																		</span>
													<!--end::Svg Icon-->
												</a>
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3"
													 data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3"
														   data-kt-payment-mehtod-action="set_as_primary">Set as
															Primary</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
												<!--end::More-->
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10"
											 data-bs-parent="#kt_customer_view_payment_method">
											<!--begin::Details-->
											<div class="d-flex flex-wrap py-5">
												<!--begin::Col-->
												<div class="flex-equal me-5">
													<table class="table table-flush fw-bold gy-1">
														<tbody>
														<tr>
															<td class="text-muted min-w-125px w-125px">Name</td>
															<td class="text-gray-800">Emma Smith</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Number</td>
															<td class="text-gray-800">**** 8309</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Expires</td>
															<td class="text-gray-800">12/2024</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Type</td>
															<td class="text-gray-800">Mastercard credit card</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Issuer</td>
															<td class="text-gray-800">VICBANK</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">ID</td>
															<td class="text-gray-800">id_4325df90sdf8</td>
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
															<td class="text-muted min-w-125px w-125px">Billing address
															</td>
															<td class="text-gray-800">AU</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Phone</td>
															<td class="text-gray-800">No phone provided</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Email</td>
															<td class="text-gray-800">
																<a href="#" class="text-gray-900 text-hover-primary">smith@kpmg.com</a>
															</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Origin</td>
															<td class="text-gray-800">Australia
																<div class="symbol symbol-20px symbol-circle ms-2">
																	<img src="<?= public_url() ?>assets/media/flags/australia.svg">
																</div>
															</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">CVC check</td>
															<td class="text-gray-800">Passed
																<!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
																<span class="svg-icon svg-icon-2 svg-icon-success">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<rect opacity="0.3" x="2" y="2"
																							  width="20" height="20"
																							  rx="10"
																							  fill="currentColor"></rect>
																						<path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
																							  fill="currentColor"></path>
																					</svg>
																				</span>
																<!--end::Svg Icon--></td>
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
									<!--begin::Option-->
									<div class="py-0" data-kt-customer-payment-method="row">
										<!--begin::Header-->
										<div class="py-3 d-flex flex-stack flex-wrap">
											<!--begin::Toggle-->
											<div class="d-flex align-items-center collapsible collapsed rotate"
												 data-bs-toggle="collapse" href="#kt_customer_view_payment_method_2"
												 role="button" aria-expanded="false"
												 aria-controls="kt_customer_view_payment_method_2">
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
												<!--begin::Logo-->
												<img src="<?= public_url() ?>assets/media/svg/card-logos/visa.svg"
													 class="w-40px me-3" alt="">
												<!--end::Logo-->
												<!--begin::Summary-->
												<div class="me-3">
													<div class="d-flex align-items-center">
														<div class="text-gray-800 fw-bolder">Visa</div>
													</div>
													<div class="text-muted">Expires Feb 2022</div>
												</div>
												<!--end::Summary-->
											</div>
											<!--end::Toggle-->
											<!--begin::Toolbar-->
											<div class="d-flex my-3 ms-9">
												<!--begin::Edit-->
												<a href="#"
												   class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
												   data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
																		<span data-bs-toggle="tooltip"
																			  data-bs-trigger="hover" title=""
																			  data-bs-original-title="Edit">
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
												<a href="#"
												   class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
												   data-bs-toggle="tooltip" title=""
												   data-kt-customer-payment-method="delete"
												   data-bs-original-title="Delete">
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
												<!--end::Delete-->
												<!--begin::More-->
												<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
												   data-bs-toggle="tooltip" title="" data-kt-menu-trigger="click"
												   data-kt-menu-placement="bottom-end"
												   data-bs-original-title="More Options">
													<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
													<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg"
																				 width="24" height="24"
																				 viewBox="0 0 24 24" fill="none">
																				<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
																					  fill="currentColor"></path>
																				<path opacity="0.3"
																					  d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
																					  fill="currentColor"></path>
																			</svg>
																		</span>
													<!--end::Svg Icon-->
												</a>
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3"
													 data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3"
														   data-kt-payment-mehtod-action="set_as_primary">Set as
															Primary</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
												<!--end::More-->
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div id="kt_customer_view_payment_method_2" class="collapse fs-6 ps-10"
											 data-bs-parent="#kt_customer_view_payment_method">
											<!--begin::Details-->
											<div class="d-flex flex-wrap py-5">
												<!--begin::Col-->
												<div class="flex-equal me-5">
													<table class="table table-flush fw-bold gy-1">
														<tbody>
														<tr>
															<td class="text-muted min-w-125px w-125px">Name</td>
															<td class="text-gray-800">Melody Macy</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Number</td>
															<td class="text-gray-800">**** 1667</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Expires</td>
															<td class="text-gray-800">02/2022</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Type</td>
															<td class="text-gray-800">Visa credit card</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Issuer</td>
															<td class="text-gray-800">ENBANK</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">ID</td>
															<td class="text-gray-800">id_w2r84jdy723</td>
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
															<td class="text-muted min-w-125px w-125px">Billing address
															</td>
															<td class="text-gray-800">UK</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Phone</td>
															<td class="text-gray-800">No phone provided</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Email</td>
															<td class="text-gray-800">
																<a href="#" class="text-gray-900 text-hover-primary">melody@altbox.com</a>
															</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Origin</td>
															<td class="text-gray-800">United Kingdom
																<div class="symbol symbol-20px symbol-circle ms-2">
																	<img src="<?= public_url() ?>assets/media/flags/united-kingdom.svg">
																</div>
															</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">CVC check</td>
															<td class="text-gray-800">Passed
																<!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
																<span class="svg-icon svg-icon-2 svg-icon-success">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<path opacity="0.3"
																							  d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z"
																							  fill="currentColor"></path>
																						<path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z"
																							  fill="currentColor"></path>
																					</svg>
																				</span>
																<!--end::Svg Icon--></td>
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
									<!--begin::Option-->
									<div class="py-0" data-kt-customer-payment-method="row">
										<!--begin::Header-->
										<div class="py-3 d-flex flex-stack flex-wrap">
											<!--begin::Toggle-->
											<div class="d-flex align-items-center collapsible collapsed rotate"
												 data-bs-toggle="collapse" href="#kt_customer_view_payment_method_3"
												 role="button" aria-expanded="false"
												 aria-controls="kt_customer_view_payment_method_3">
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
												<!--begin::Logo-->
												<img src="<?= public_url() ?>assets/media/svg/card-logos/american-express.svg"
													 class="w-40px me-3" alt="">
												<!--end::Logo-->
												<!--begin::Summary-->
												<div class="me-3">
													<div class="d-flex align-items-center">
														<div class="text-gray-800 fw-bolder">American Express</div>
														<div class="badge badge-light-danger ms-5">Expired</div>
													</div>
													<div class="text-muted">Expires Aug 2021</div>
												</div>
												<!--end::Summary-->
											</div>
											<!--end::Toggle-->
											<!--begin::Toolbar-->
											<div class="d-flex my-3 ms-9">
												<!--begin::Edit-->
												<a href="#"
												   class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
												   data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
																		<span data-bs-toggle="tooltip"
																			  data-bs-trigger="hover" title=""
																			  data-bs-original-title="Edit">
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
												<a href="#"
												   class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
												   data-bs-toggle="tooltip" title=""
												   data-kt-customer-payment-method="delete"
												   data-bs-original-title="Delete">
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
												<!--end::Delete-->
												<!--begin::More-->
												<a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
												   data-bs-toggle="tooltip" title="" data-kt-menu-trigger="click"
												   data-kt-menu-placement="bottom-end"
												   data-bs-original-title="More Options">
													<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
													<span class="svg-icon svg-icon-3">
																			<svg xmlns="http://www.w3.org/2000/svg"
																				 width="24" height="24"
																				 viewBox="0 0 24 24" fill="none">
																				<path d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
																					  fill="currentColor"></path>
																				<path opacity="0.3"
																					  d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
																					  fill="currentColor"></path>
																			</svg>
																		</span>
													<!--end::Svg Icon-->
												</a>
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3"
													 data-kt-menu="true">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3"
														   data-kt-payment-mehtod-action="set_as_primary">Set as
															Primary</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
												<!--end::More-->
											</div>
											<!--end::Toolbar-->
										</div>
										<!--end::Header-->
										<!--begin::Body-->
										<div id="kt_customer_view_payment_method_3" class="collapse fs-6 ps-10"
											 data-bs-parent="#kt_customer_view_payment_method">
											<!--begin::Details-->
											<div class="d-flex flex-wrap py-5">
												<!--begin::Col-->
												<div class="flex-equal me-5">
													<table class="table table-flush fw-bold gy-1">
														<tbody>
														<tr>
															<td class="text-muted min-w-125px w-125px">Name</td>
															<td class="text-gray-800">Max Smith</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Number</td>
															<td class="text-gray-800">**** 1038</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Expires</td>
															<td class="text-gray-800">08/2021</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Type</td>
															<td class="text-gray-800">American express credit card</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Issuer</td>
															<td class="text-gray-800">USABANK</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">ID</td>
															<td class="text-gray-800">id_89457jcje63</td>
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
															<td class="text-muted min-w-125px w-125px">Billing address
															</td>
															<td class="text-gray-800">US</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Phone</td>
															<td class="text-gray-800">No phone provided</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Email</td>
															<td class="text-gray-800">
																<a href="#" class="text-gray-900 text-hover-primary">max@kt.com</a>
															</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">Origin</td>
															<td class="text-gray-800">United States of America
																<div class="symbol symbol-20px symbol-circle ms-2">
																	<img src="<?= public_url() ?>assets/media/flags/united-states.svg">
																</div>
															</td>
														</tr>
														<tr>
															<td class="text-muted min-w-125px w-125px">CVC check</td>
															<td class="text-gray-800">Failed
																<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
																<span class="svg-icon svg-icon-2 svg-icon-danger">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<rect opacity="0.5" x="6"
																							  y="17.3137" width="16"
																							  height="2" rx="1"
																							  transform="rotate(-45 6 17.3137)"
																							  fill="currentColor"></rect>
																						<rect x="7.41422" y="6"
																							  width="16" height="2"
																							  rx="1"
																							  transform="rotate(45 7.41422 6)"
																							  fill="currentColor"></rect>
																					</svg>
																				</span>
																<!--end::Svg Icon--></td>
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
										<h2 class="fw-bolder">Credit Balance</h2>
									</div>
									<!--end::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal"
										   data-bs-target="#kt_modal_adjust_balance">
											<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
											<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3"
																		  d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
																		  fill="currentColor"></path>
																	<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
																		  fill="currentColor"></path>
																</svg>
															</span>
											<!--end::Svg Icon-->Adjust Balance</a>
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<div class="fw-bolder fs-2">$32,487.57
										<span class="text-muted fs-4 fw-bold">USD</span>
										<div class="fs-7 fw-normal text-muted">Balance will increase the amount due on
											the customer's next invoice.
										</div>
									</div>
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
							<!--begin::Card-->
							<div class="card pt-2 mb-6 mb-xl-9">
								<!--begin::Card header-->
								<div class="card-header border-0">
									<!--begin::Card title-->
									<div class="card-title">
										<h2>Invoices</h2>
									</div>
									<!--end::Card title-->
									<!--begin::Toolbar-->
									<div class="card-toolbar m-0">
										<!--begin::Tab nav-->
										<ul class="nav nav-stretch fs-5 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent"
											role="tablist">
											<li class="nav-item" role="presentation">
												<a id="kt_referrals_year_tab"
												   class="nav-link text-active-primary active" data-bs-toggle="tab"
												   role="tab" href="#kt_customer_details_invoices_1">This Year</a>
											</li>
											<li class="nav-item" role="presentation">
												<a id="kt_referrals_2019_tab" class="nav-link text-active-primary ms-3"
												   data-bs-toggle="tab" role="tab"
												   href="#kt_customer_details_invoices_2">2020</a>
											</li>
											<li class="nav-item" role="presentation">
												<a id="kt_referrals_2018_tab" class="nav-link text-active-primary ms-3"
												   data-bs-toggle="tab" role="tab"
												   href="#kt_customer_details_invoices_3">2019</a>
											</li>
											<li class="nav-item" role="presentation">
												<a id="kt_referrals_2017_tab" class="nav-link text-active-primary ms-3"
												   data-bs-toggle="tab" role="tab"
												   href="#kt_customer_details_invoices_4">2018</a>
											</li>
										</ul>
										<!--end::Tab nav-->
									</div>
									<!--end::Toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body pt-0">
									<!--begin::Tab Content-->
									<div id="kt_referred_users_tab_content" class="tab-content">
										<!--begin::Tab panel-->
										<div id="kt_customer_details_invoices_1" class="py-0 tab-pane fade show active"
											 role="tabpanel">
											<!--begin::Table-->
											<div id="kt_customer_details_invoices_table_1_wrapper"
												 class="dataTables_wrapper dt-bootstrap4 no-footer">
												<div class="table-responsive">
													<table id="kt_customer_details_invoices_table_1"
														   class="table align-middle table-row-dashed fs-6 fw-bolder gy-5 dataTable no-footer">
														<!--begin::Thead-->
														<thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
														<tr class="text-start text-muted gs-0">
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_1"
																rowspan="1" colspan="1"
																aria-label="Order ID: activate to sort column ascending"
																style="width: 136.812px;">Order ID
															</th>
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_1"
																rowspan="1" colspan="1"
																aria-label="Amount: activate to sort column ascending"
																style="width: 140.391px;">Amount
															</th>
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_1"
																rowspan="1" colspan="1"
																aria-label="Status: activate to sort column ascending"
																style="width: 140.391px;">Status
															</th>
															<th class="min-w-125px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_1"
																rowspan="1" colspan="1"
																aria-label="Date: activate to sort column ascending"
																style="width: 174.594px;">Date
															</th>
															<th class="min-w-100px text-end pe-7 sorting_disabled"
																rowspan="1" colspan="1" aria-label="Invoice"
																style="width: 148.812px;">Invoice
															</th>
														</tr>
														</thead>
														<!--end::Thead-->
														<!--begin::Tbody-->
														<tbody class="fs-6 fw-bold text-gray-600">


														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
															</td>
															<td class="text-success">$38.00</td>
															<td>
																<span class="badge badge-light-success">Approved</span>
															</td>
															<td>Nov 01, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
															</td>
															<td class="text-danger">$-2.60</td>
															<td>
																<span class="badge badge-light-warning">Pending</span>
															</td>
															<td>Oct 24, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
															</td>
															<td class="text-success">$76.00</td>
															<td>
																<span class="badge badge-light-warning">Pending</span>
															</td>
															<td>Oct 08, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
															</td>
															<td class="text-success">$5.00</td>
															<td>
																<span class="badge badge-light-info">In progress</span>
															</td>
															<td>Sep 15, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
															</td>
															<td class="text-danger">$-1.30</td>
															<td>
																<span class="badge badge-light-success">Approved</span>
															</td>
															<td>May 30, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														</tbody>
														<!--end::Tbody-->
													</table>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
													<div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
														<div class="dataTables_paginate paging_simple_numbers"
															 id="kt_customer_details_invoices_table_1_paginate">
															<ul class="pagination">
																<li class="paginate_button page-item previous disabled"
																	id="kt_customer_details_invoices_table_1_previous">
																	<a href="#"
																	   aria-controls="kt_customer_details_invoices_table_1"
																	   data-dt-idx="0" tabindex="0" class="page-link"><i
																				class="previous"></i></a></li>
																<li class="paginate_button page-item active"><a href="#"
																												aria-controls="kt_customer_details_invoices_table_1"
																												data-dt-idx="1"
																												tabindex="0"
																												class="page-link">1</a>
																</li>
																<li class="paginate_button page-item "><a href="#"
																										  aria-controls="kt_customer_details_invoices_table_1"
																										  data-dt-idx="2"
																										  tabindex="0"
																										  class="page-link">2</a>
																</li>
																<li class="paginate_button page-item next"
																	id="kt_customer_details_invoices_table_1_next"><a
																			href="#"
																			aria-controls="kt_customer_details_invoices_table_1"
																			data-dt-idx="3" tabindex="0"
																			class="page-link"><i class="next"></i></a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<!--end::Table-->
										</div>
										<!--end::Tab panel-->
										<!--begin::Tab panel-->
										<div id="kt_customer_details_invoices_2" class="py-0 tab-pane fade"
											 role="tabpanel">
											<!--begin::Table-->
											<div id="kt_customer_details_invoices_table_2_wrapper"
												 class="dataTables_wrapper dt-bootstrap4 no-footer">
												<div class="table-responsive">
													<table id="kt_customer_details_invoices_table_2"
														   class="table align-middle table-row-dashed fs-6 fw-bolder gy-5 dataTable no-footer">
														<!--begin::Thead-->
														<thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
														<tr class="text-start text-muted gs-0">
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_2"
																rowspan="1" colspan="1"
																aria-label="Order ID: activate to sort column ascending"
																style="width: 0px;">Order ID
															</th>
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_2"
																rowspan="1" colspan="1"
																aria-label="Amount: activate to sort column ascending"
																style="width: 0px;">Amount
															</th>
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_2"
																rowspan="1" colspan="1"
																aria-label="Status: activate to sort column ascending"
																style="width: 0px;">Status
															</th>
															<th class="min-w-125px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_2"
																rowspan="1" colspan="1"
																aria-label="Date: activate to sort column ascending"
																style="width: 0px;">Date
															</th>
															<th class="min-w-100px text-end pe-7 sorting_disabled"
																rowspan="1" colspan="1" aria-label="Invoice"
																style="width: 0px;">Invoice
															</th>
														</tr>
														</thead>
														<!--end::Thead-->
														<!--begin::Tbody-->
														<tbody class="fs-6 fw-bold text-gray-600">


														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
															</td>
															<td class="text-danger">$-1.30</td>
															<td>
																<span class="badge badge-light-info">In progress</span>
															</td>
															<td>May 30, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
															</td>
															<td class="text-success">$204.00</td>
															<td>
																<span class="badge badge-light-warning">Pending</span>
															</td>
															<td>Apr 22, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
															</td>
															<td class="text-success">$31.00</td>
															<td>
																<span class="badge badge-light-success">Approved</span>
															</td>
															<td>Feb 09, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
															</td>
															<td class="text-success">$52.00</td>
															<td>
																<span class="badge badge-light-warning">Pending</span>
															</td>
															<td>Nov 01, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
															</td>
															<td class="text-danger">$-0.80</td>
															<td>
																<span class="badge badge-light-info">In progress</span>
															</td>
															<td>Jan 04, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														</tbody>
														<!--end::Tbody-->
													</table>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
													<div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
														<div class="dataTables_paginate paging_simple_numbers"
															 id="kt_customer_details_invoices_table_2_paginate">
															<ul class="pagination">
																<li class="paginate_button page-item previous disabled"
																	id="kt_customer_details_invoices_table_2_previous">
																	<a href="#"
																	   aria-controls="kt_customer_details_invoices_table_2"
																	   data-dt-idx="0" tabindex="0" class="page-link"><i
																				class="previous"></i></a></li>
																<li class="paginate_button page-item active"><a href="#"
																												aria-controls="kt_customer_details_invoices_table_2"
																												data-dt-idx="1"
																												tabindex="0"
																												class="page-link">1</a>
																</li>
																<li class="paginate_button page-item "><a href="#"
																										  aria-controls="kt_customer_details_invoices_table_2"
																										  data-dt-idx="2"
																										  tabindex="0"
																										  class="page-link">2</a>
																</li>
																<li class="paginate_button page-item next"
																	id="kt_customer_details_invoices_table_2_next"><a
																			href="#"
																			aria-controls="kt_customer_details_invoices_table_2"
																			data-dt-idx="3" tabindex="0"
																			class="page-link"><i class="next"></i></a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<!--end::Table-->
										</div>
										<!--end::Tab panel-->
										<!--begin::Tab panel-->
										<div id="kt_customer_details_invoices_3" class="py-0 tab-pane fade"
											 role="tabpanel">
											<!--begin::Table-->
											<div id="kt_customer_details_invoices_table_3_wrapper"
												 class="dataTables_wrapper dt-bootstrap4 no-footer">
												<div class="table-responsive">
													<table id="kt_customer_details_invoices_table_3"
														   class="table align-middle table-row-dashed fs-6 fw-bolder gy-5 dataTable no-footer">
														<!--begin::Thead-->
														<thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
														<tr class="text-start text-muted gs-0">
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_3"
																rowspan="1" colspan="1"
																aria-label="Order ID: activate to sort column ascending"
																style="width: 0px;">Order ID
															</th>
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_3"
																rowspan="1" colspan="1"
																aria-label="Amount: activate to sort column ascending"
																style="width: 0px;">Amount
															</th>
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_3"
																rowspan="1" colspan="1"
																aria-label="Status: activate to sort column ascending"
																style="width: 0px;">Status
															</th>
															<th class="min-w-125px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_3"
																rowspan="1" colspan="1"
																aria-label="Date: activate to sort column ascending"
																style="width: 0px;">Date
															</th>
															<th class="min-w-100px text-end pe-7 sorting_disabled"
																rowspan="1" colspan="1" aria-label="Invoice"
																style="width: 0px;">Invoice
															</th>
														</tr>
														</thead>
														<!--end::Thead-->
														<!--begin::Tbody-->
														<tbody class="fs-6 fw-bold text-gray-600">


														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
															</td>
															<td class="text-success">$31.00</td>
															<td>
																<span class="badge badge-light-info">In progress</span>
															</td>
															<td>Feb 09, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
															</td>
															<td class="text-success">$52.00</td>
															<td>
																<span class="badge badge-light-warning">Pending</span>
															</td>
															<td>Nov 01, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
															</td>
															<td class="text-danger">$-0.80</td>
															<td>
																<span class="badge badge-light-info">In progress</span>
															</td>
															<td>Jan 04, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
															</td>
															<td class="text-success">$5.00</td>
															<td>
																<span class="badge badge-light-success">Approved</span>
															</td>
															<td>Sep 15, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
															</td>
															<td class="text-success">$38.00</td>
															<td>
																<span class="badge badge-light-success">Approved</span>
															</td>
															<td>Nov 01, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														</tbody>
														<!--end::Tbody-->
													</table>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
													<div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
														<div class="dataTables_paginate paging_simple_numbers"
															 id="kt_customer_details_invoices_table_3_paginate">
															<ul class="pagination">
																<li class="paginate_button page-item previous disabled"
																	id="kt_customer_details_invoices_table_3_previous">
																	<a href="#"
																	   aria-controls="kt_customer_details_invoices_table_3"
																	   data-dt-idx="0" tabindex="0" class="page-link"><i
																				class="previous"></i></a></li>
																<li class="paginate_button page-item active"><a href="#"
																												aria-controls="kt_customer_details_invoices_table_3"
																												data-dt-idx="1"
																												tabindex="0"
																												class="page-link">1</a>
																</li>
																<li class="paginate_button page-item "><a href="#"
																										  aria-controls="kt_customer_details_invoices_table_3"
																										  data-dt-idx="2"
																										  tabindex="0"
																										  class="page-link">2</a>
																</li>
																<li class="paginate_button page-item next"
																	id="kt_customer_details_invoices_table_3_next"><a
																			href="#"
																			aria-controls="kt_customer_details_invoices_table_3"
																			data-dt-idx="3" tabindex="0"
																			class="page-link"><i class="next"></i></a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<!--end::Table-->
										</div>
										<!--end::Tab panel-->
										<!--begin::Tab panel-->
										<div id="kt_customer_details_invoices_4" class="py-0 tab-pane fade"
											 role="tabpanel">
											<!--begin::Table-->
											<div id="kt_customer_details_invoices_table_4_wrapper"
												 class="dataTables_wrapper dt-bootstrap4 no-footer">
												<div class="table-responsive">
													<table id="kt_customer_details_invoices_table_4"
														   class="table align-middle table-row-dashed fs-6 fw-bolder gy-5 dataTable no-footer">
														<!--begin::Thead-->
														<thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
														<tr class="text-start text-muted gs-0">
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_4"
																rowspan="1" colspan="1"
																aria-label="Order ID: activate to sort column ascending"
																style="width: 0px;">Order ID
															</th>
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_4"
																rowspan="1" colspan="1"
																aria-label="Amount: activate to sort column ascending"
																style="width: 0px;">Amount
															</th>
															<th class="min-w-100px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_4"
																rowspan="1" colspan="1"
																aria-label="Status: activate to sort column ascending"
																style="width: 0px;">Status
															</th>
															<th class="min-w-125px sorting" tabindex="0"
																aria-controls="kt_customer_details_invoices_table_4"
																rowspan="1" colspan="1"
																aria-label="Date: activate to sort column ascending"
																style="width: 0px;">Date
															</th>
															<th class="min-w-100px text-end pe-7 sorting_disabled"
																rowspan="1" colspan="1" aria-label="Invoice"
																style="width: 0px;">Invoice
															</th>
														</tr>
														</thead>
														<!--end::Thead-->
														<!--begin::Tbody-->
														<tbody class="fs-6 fw-bold text-gray-600">


														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
															</td>
															<td class="text-success">$38.00</td>
															<td>
																<span class="badge badge-light-success">Approved</span>
															</td>
															<td>Nov 01, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
															</td>
															<td class="text-danger">$-2.60</td>
															<td>
																<span class="badge badge-light-warning">Pending</span>
															</td>
															<td>Oct 24, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
															</td>
															<td class="text-success">$38.00</td>
															<td>
																<span class="badge badge-light-warning">Pending</span>
															</td>
															<td>Nov 01, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
															</td>
															<td class="text-danger">$-2.60</td>
															<td>
																<span class="badge badge-light-info">In progress</span>
															</td>
															<td>Oct 24, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="Invalid date">
																<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
															</td>
															<td class="text-success">$31.00</td>
															<td>
																<span class="badge badge-light-success">Approved</span>
															</td>
															<td>Feb 09, 2020</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														</tbody>
														<!--end::Tbody-->
													</table>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
													<div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
														<div class="dataTables_paginate paging_simple_numbers"
															 id="kt_customer_details_invoices_table_4_paginate">
															<ul class="pagination">
																<li class="paginate_button page-item previous disabled"
																	id="kt_customer_details_invoices_table_4_previous">
																	<a href="#"
																	   aria-controls="kt_customer_details_invoices_table_4"
																	   data-dt-idx="0" tabindex="0" class="page-link"><i
																				class="previous"></i></a></li>
																<li class="paginate_button page-item active"><a href="#"
																												aria-controls="kt_customer_details_invoices_table_4"
																												data-dt-idx="1"
																												tabindex="0"
																												class="page-link">1</a>
																</li>
																<li class="paginate_button page-item "><a href="#"
																										  aria-controls="kt_customer_details_invoices_table_4"
																										  data-dt-idx="2"
																										  tabindex="0"
																										  class="page-link">2</a>
																</li>
																<li class="paginate_button page-item next"
																	id="kt_customer_details_invoices_table_4_next"><a
																			href="#"
																			aria-controls="kt_customer_details_invoices_table_4"
																			data-dt-idx="3" tabindex="0"
																			class="page-link"><i class="next"></i></a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<!--end::Table-->
										</div>
										<!--end::Tab panel-->
									</div>
									<!--end::Tab Content-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end:::Tab pane-->
						<!--begin:::Tab pane-->
						<div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">
							<!--begin::Card-->
							<div class="card pt-4 mb-6 mb-xl-9">
								<!--begin::Card header-->
								<div class="card-header border-0">
									<!--begin::Card title-->
									<div class="card-title">
										<h2>Logs</h2>
									</div>
									<!--end::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Button-->
										<button type="button" class="btn btn-sm btn-light-primary">
											<!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
											<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3"
																		  d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z"
																		  fill="currentColor"></path>
																	<path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z"
																		  fill="currentColor"></path>
																	<path opacity="0.3"
																		  d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z"
																		  fill="currentColor"></path>
																</svg>
															</span>
											<!--end::Svg Icon-->Download Report
										</button>
										<!--end::Button-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body py-0">
									<!--begin::Table wrapper-->
									<div class="table-responsive">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5"
											   id="kt_table_customers_logs">
											<!--begin::Table body-->
											<tbody>
											<!--begin::Table row-->
											<tr>
												<!--begin::Badge=-->
												<td class="min-w-70px">
													<div class="badge badge-light-success">200 OK</div>
												</td>
												<!--end::Badge=-->
												<!--begin::Status=-->
												<td>POST /v1/invoices/in_4914_2176/payment</td>
												<!--end::Status=-->
												<!--begin::Timestamp=-->
												<td class="pe-0 text-end min-w-200px">20 Jun 2022, 9:23 pm</td>
												<!--end::Timestamp=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<!--begin::Badge=-->
												<td class="min-w-70px">
													<div class="badge badge-light-danger">500 ERR</div>
												</td>
												<!--end::Badge=-->
												<!--begin::Status=-->
												<td>POST /v1/invoice/in_2861_5795/invalid</td>
												<!--end::Status=-->
												<!--begin::Timestamp=-->
												<td class="pe-0 text-end min-w-200px">05 May 2022, 10:30 am</td>
												<!--end::Timestamp=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<!--begin::Badge=-->
												<td class="min-w-70px">
													<div class="badge badge-light-danger">500 ERR</div>
												</td>
												<!--end::Badge=-->
												<!--begin::Status=-->
												<td>POST /v1/invoice/in_8814_1217/invalid</td>
												<!--end::Status=-->
												<!--begin::Timestamp=-->
												<td class="pe-0 text-end min-w-200px">25 Oct 2022, 6:05 pm</td>
												<!--end::Timestamp=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<!--begin::Badge=-->
												<td class="min-w-70px">
													<div class="badge badge-light-danger">500 ERR</div>
												</td>
												<!--end::Badge=-->
												<!--begin::Status=-->
												<td>POST /v1/invoice/in_8814_1217/invalid</td>
												<!--end::Status=-->
												<!--begin::Timestamp=-->
												<td class="pe-0 text-end min-w-200px">10 Nov 2022, 9:23 pm</td>
												<!--end::Timestamp=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<!--begin::Badge=-->
												<td class="min-w-70px">
													<div class="badge badge-light-success">200 OK</div>
												</td>
												<!--end::Badge=-->
												<!--begin::Status=-->
												<td>POST /v1/invoices/in_2597_3387/payment</td>
												<!--end::Status=-->
												<!--begin::Timestamp=-->
												<td class="pe-0 text-end min-w-200px">20 Jun 2022, 8:43 pm</td>
												<!--end::Timestamp=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<!--begin::Badge=-->
												<td class="min-w-70px">
													<div class="badge badge-light-success">200 OK</div>
												</td>
												<!--end::Badge=-->
												<!--begin::Status=-->
												<td>POST /v1/invoices/in_5112_7630/payment</td>
												<!--end::Status=-->
												<!--begin::Timestamp=-->
												<td class="pe-0 text-end min-w-200px">10 Nov 2022, 5:20 pm</td>
												<!--end::Timestamp=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<!--begin::Badge=-->
												<td class="min-w-70px">
													<div class="badge badge-light-success">200 OK</div>
												</td>
												<!--end::Badge=-->
												<!--begin::Status=-->
												<td>POST /v1/invoices/in_2597_3387/payment</td>
												<!--end::Status=-->
												<!--begin::Timestamp=-->
												<td class="pe-0 text-end min-w-200px">20 Jun 2022, 10:10 pm</td>
												<!--end::Timestamp=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<!--begin::Badge=-->
												<td class="min-w-70px">
													<div class="badge badge-light-success">200 OK</div>
												</td>
												<!--end::Badge=-->
												<!--begin::Status=-->
												<td>POST /v1/invoices/in_3153_1742/payment</td>
												<!--end::Status=-->
												<!--begin::Timestamp=-->
												<td class="pe-0 text-end min-w-200px">19 Aug 2022, 11:05 am</td>
												<!--end::Timestamp=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<!--begin::Badge=-->
												<td class="min-w-70px">
													<div class="badge badge-light-success">200 OK</div>
												</td>
												<!--end::Badge=-->
												<!--begin::Status=-->
												<td>POST /v1/invoices/in_6427_3444/payment</td>
												<!--end::Status=-->
												<!--begin::Timestamp=-->
												<td class="pe-0 text-end min-w-200px">10 Nov 2022, 2:40 pm</td>
												<!--end::Timestamp=-->
											</tr>
											<!--end::Table row-->
											<!--begin::Table row-->
											<tr>
												<!--begin::Badge=-->
												<td class="min-w-70px">
													<div class="badge badge-light-danger">500 ERR</div>
												</td>
												<!--end::Badge=-->
												<!--begin::Status=-->
												<td>POST /v1/invoice/in_2861_5795/invalid</td>
												<!--end::Status=-->
												<!--begin::Timestamp=-->
												<td class="pe-0 text-end min-w-200px">24 Jun 2022, 5:30 pm</td>
												<!--end::Timestamp=-->
											</tr>
											<!--end::Table row-->
											</tbody>
											<!--end::Table body-->
										</table>
										<!--end::Table-->
									</div>
									<!--end::Table wrapper-->
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
										<h2>Events</h2>
									</div>
									<!--end::Card title-->
									<!--begin::Card toolbar-->
									<div class="card-toolbar">
										<!--begin::Button-->
										<button type="button" class="btn btn-sm btn-light-primary">
											<!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
											<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3"
																		  d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z"
																		  fill="currentColor"></path>
																	<path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z"
																		  fill="currentColor"></path>
																	<path opacity="0.3"
																		  d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z"
																		  fill="currentColor"></path>
																</svg>
															</span>
											<!--end::Svg Icon-->Download Report
										</button>
										<!--end::Button-->
									</div>
									<!--end::Card toolbar-->
								</div>
								<!--end::Card header-->
								<!--begin::Card body-->
								<div class="card-body py-0">
									<!--begin::Table-->
									<table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-5"
										   id="kt_table_customers_events">
										<!--begin::Table body-->
										<tbody>
										<!--begin::Table row-->
										<tr>
											<!--begin::Event=-->
											<td class="min-w-400px">Invoice
												<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#WER-45670</a>is
												<span class="badge badge-light-info">In Progress</span></td>
											<!--end::Event=-->
											<!--begin::Timestamp=-->
											<td class="pe-0 text-gray-600 text-end min-w-200px">24 Jun 2022, 9:23 pm
											</td>
											<!--end::Timestamp=-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Event=-->
											<td class="min-w-400px">Invoice
												<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#SEP-45656</a>status
												has changed from
												<span class="badge badge-light-warning me-1">Pending</span>to
												<span class="badge badge-light-info">In Progress</span></td>
											<!--end::Event=-->
											<!--begin::Timestamp=-->
											<td class="pe-0 text-gray-600 text-end min-w-200px">24 Jun 2022, 6:43 am
											</td>
											<!--end::Timestamp=-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Event=-->
											<td class="min-w-400px">Invoice
												<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#LOP-45640</a>has
												been
												<span class="badge badge-light-danger">Declined</span></td>
											<!--end::Event=-->
											<!--begin::Timestamp=-->
											<td class="pe-0 text-gray-600 text-end min-w-200px">21 Feb 2022, 11:05 am
											</td>
											<!--end::Timestamp=-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Event=-->
											<td class="min-w-400px">
												<a href="#" class="text-gray-600 text-hover-primary me-1">Emma Smith</a>has
												made payment to
												<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#XRS-45670</a>
											</td>
											<!--end::Event=-->
											<!--begin::Timestamp=-->
											<td class="pe-0 text-gray-600 text-end min-w-200px">21 Feb 2022, 2:40 pm
											</td>
											<!--end::Timestamp=-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Event=-->
											<td class="min-w-400px">
												<a href="#" class="text-gray-600 text-hover-primary me-1">Emma Smith</a>has
												made payment to
												<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#XRS-45670</a>
											</td>
											<!--end::Event=-->
											<!--begin::Timestamp=-->
											<td class="pe-0 text-gray-600 text-end min-w-200px">21 Feb 2022, 11:30 am
											</td>
											<!--end::Timestamp=-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Event=-->
											<td class="min-w-400px">
												<a href="#" class="text-gray-600 text-hover-primary me-1">Brian Cox</a>has
												made payment to
												<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#OLP-45690</a>
											</td>
											<!--end::Event=-->
											<!--begin::Timestamp=-->
											<td class="pe-0 text-gray-600 text-end min-w-200px">24 Jun 2022, 2:40 pm
											</td>
											<!--end::Timestamp=-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Event=-->
											<td class="min-w-400px">Invoice
												<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#SEP-45656</a>status
												has changed from
												<span class="badge badge-light-warning me-1">Pending</span>to
												<span class="badge badge-light-info">In Progress</span></td>
											<!--end::Event=-->
											<!--begin::Timestamp=-->
											<td class="pe-0 text-gray-600 text-end min-w-200px">22 Sep 2022, 11:30 am
											</td>
											<!--end::Timestamp=-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Event=-->
											<td class="min-w-400px">Invoice
												<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#DER-45645</a>status
												has changed from
												<span class="badge badge-light-info me-1">In Progress</span>to
												<span class="badge badge-light-primary">In Transit</span></td>
											<!--end::Event=-->
											<!--begin::Timestamp=-->
											<td class="pe-0 text-gray-600 text-end min-w-200px">20 Jun 2022, 9:23 pm
											</td>
											<!--end::Timestamp=-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Event=-->
											<td class="min-w-400px">Invoice
												<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#WER-45670</a>is
												<span class="badge badge-light-info">In Progress</span></td>
											<!--end::Event=-->
											<!--begin::Timestamp=-->
											<td class="pe-0 text-gray-600 text-end min-w-200px">20 Dec 2022, 10:10 pm
											</td>
											<!--end::Timestamp=-->
										</tr>
										<!--end::Table row-->
										<!--begin::Table row-->
										<tr>
											<!--begin::Event=-->
											<td class="min-w-400px">
												<a href="#" class="text-gray-600 text-hover-primary me-1">Emma Smith</a>has
												made payment to
												<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#XRS-45670</a>
											</td>
											<!--end::Event=-->
											<!--begin::Timestamp=-->
											<td class="pe-0 text-gray-600 text-end min-w-200px">10 Nov 2022, 2:40 pm
											</td>
											<!--end::Timestamp=-->
										</tr>
										<!--end::Table row-->
										</tbody>
										<!--end::Table body-->
									</table>
									<!--end::Table-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->
						</div>
						<!--end:::Tab pane-->
						<!--begin:::Tab pane-->
						<div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel">
							<!--begin::Earnings-->
							<div class="card mb-6 mb-xl-9">
								<!--begin::Header-->
								<div class="card-header border-0">
									<div class="card-title">
										<h2>Earnings</h2>
									</div>
								</div>
								<!--end::Header-->
								<!--begin::Body-->
								<div class="card-body py-0">
									<div class="fs-5 fw-bold text-gray-500 mb-4">Last 30 day earnings calculated. Apart
										from arranging the order of topics.
									</div>
									<!--begin::Left Section-->
									<div class="d-flex flex-wrap flex-stack mb-5">
										<!--begin::Row-->
										<div class="d-flex flex-wrap">
											<!--begin::Col-->
											<div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
																	<span class="fs-1 fw-bolder text-gray-800 lh-1">
																		<span data-kt-countup="true"
																			  data-kt-countup-value="6,840"
																			  data-kt-countup-prefix="$">0</span>
																		<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
																		<span class="svg-icon svg-icon-1 svg-icon-success">
																			<svg xmlns="http://www.w3.org/2000/svg"
																				 width="24" height="24"
																				 viewBox="0 0 24 24" fill="none">
																				<rect opacity="0.5" x="13" y="6"
																					  width="13" height="2" rx="1"
																					  transform="rotate(90 13 6)"
																					  fill="currentColor"></rect>
																				<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
																					  fill="currentColor"></path>
																			</svg>
																		</span>
																		<!--end::Svg Icon-->
																	</span>
												<span class="fs-6 fw-bold text-muted d-block lh-1 pt-2">Net Earnings</span>
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
																	<span class="fs-1 fw-bolder text-gray-800 lh-1">
																	<span class="" data-kt-countup="true"
																		  data-kt-countup-value="16">0</span>%
																		<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
																	<span class="svg-icon svg-icon-1 svg-icon-danger">
																		<svg xmlns="http://www.w3.org/2000/svg"
																			 width="24" height="24" viewBox="0 0 24 24"
																			 fill="none">
																			<rect opacity="0.5" x="11" y="18" width="13"
																				  height="2" rx="1"
																				  transform="rotate(-90 11 18)"
																				  fill="currentColor"></rect>
																			<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
																		<!--end::Svg Icon--></span>
												<span class="fs-6 fw-bold text-muted d-block lh-1 pt-2">Change</span>
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
																	<span class="fs-1 fw-bolder text-gray-800 lh-1">
																		<span data-kt-countup="true"
																			  data-kt-countup-value="1,240"
																			  data-kt-countup-prefix="$">0</span>
																		<span class="text-primary">--</span>
																	</span>
												<span class="fs-6 fw-bold text-muted d-block lh-1 pt-2">Fees</span>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
										<a href="#" class="btn btn-sm btn-light-primary flex-shrink-0">Withdraw
											Earnings</a>
									</div>
									<!--end::Left Section-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::Earnings-->
							<!--begin::Statements-->
							<div class="card mb-6 mb-xl-9">
								<!--begin::Header-->
								<div class="card-header">
									<!--begin::Title-->
									<div class="card-title">
										<h2>Statement</h2>
									</div>
									<!--end::Title-->
									<!--begin::Toolbar-->
									<div class="card-toolbar">
										<!--begin::Tab nav-->
										<ul class="nav nav-stretch fs-5 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent"
											role="tablist">
											<li class="nav-item" role="presentation">
												<a class="nav-link text-active-primary active" data-bs-toggle="tab"
												   role="tab" href="#kt_customer_view_statement_1">This Year</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link text-active-primary ms-3" data-bs-toggle="tab"
												   role="tab" href="#kt_customer_view_statement_2">2020</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link text-active-primary ms-3" data-bs-toggle="tab"
												   role="tab" href="#kt_customer_view_statement_3">2019</a>
											</li>
											<li class="nav-item" role="presentation">
												<a class="nav-link text-active-primary ms-3" data-bs-toggle="tab"
												   role="tab" href="#kt_customer_view_statement_4">2018</a>
											</li>
										</ul>
										<!--end::Tab nav-->
									</div>
									<!--end::Toolbar-->
								</div>
								<!--end::Header-->
								<!--begin::Card body-->
								<div class="card-body pb-5">
									<!--begin::Tab Content-->
									<div id="kt_customer_view_statement_tab_content" class="tab-content">
										<!--begin::Tab panel-->
										<div id="kt_customer_view_statement_1" class="py-0 tab-pane fade show active"
											 role="tabpanel">
											<!--begin::Table-->
											<div id="kt_customer_view_statement_table_1_wrapper"
												 class="dataTables_wrapper dt-bootstrap4 no-footer">
												<div class="table-responsive">
													<table id="kt_customer_view_statement_table_1"
														   class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4 dataTable no-footer">
														<!--begin::Table head-->
														<thead class="border-bottom border-gray-200">
														<!--begin::Table row-->
														<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
															<th class="w-125px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_1"
																rowspan="1" colspan="1"
																aria-label="Date: activate to sort column ascending"
																style="width: 125px;">Date
															</th>
															<th class="w-100px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_1"
																rowspan="1" colspan="1"
																aria-label="Order ID: activate to sort column ascending"
																style="width: 100px;">Order ID
															</th>
															<th class="w-300px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_1"
																rowspan="1" colspan="1"
																aria-label="Details: activate to sort column ascending"
																style="width: 300px;">Details
															</th>
															<th class="w-100px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_1"
																rowspan="1" colspan="1"
																aria-label="Amount: activate to sort column ascending"
																style="width: 100px;">Amount
															</th>
															<th class="w-100px text-end pe-7 sorting_disabled"
																rowspan="1" colspan="1" aria-label="Invoice"
																style="width: 100px;">Invoice
															</th>
														</tr>
														<!--end::Table row-->
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>


														<tr class="odd">
															<td data-order="2021-01-01T00:00:00+03:00">Nov 01, 2021</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
															</td>
															<td>Darknight transparency 36 Icons Pack</td>
															<td class="text-success">$38.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2021-01-24T00:00:00+03:00">Oct 24, 2021</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-2.60</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2021-01-08T00:00:00+03:00">Oct 08, 2021</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
															</td>
															<td>Cartoon Mobile Emoji Phone Pack</td>
															<td class="text-success">$76.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2021-01-15T00:00:00+03:00">Sep 15, 2021</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
															</td>
															<td>Iphone 12 Pro Mockup Mega Bundle</td>
															<td class="text-success">$5.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2021-01-30T00:00:00+03:00">May 30, 2021</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-1.30</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2021-01-22T00:00:00+03:00">Apr 22, 2021</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
															</td>
															<td>Parcel Shipping / Delivery Service App</td>
															<td class="text-success">$204.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2021-01-09T00:00:00+03:00">Feb 09, 2021</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
															</td>
															<td>Visual Design Illustration</td>
															<td class="text-success">$31.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2021-01-01T00:00:00+03:00">Nov 01, 2021</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
															</td>
															<td>Abstract Vusial Pack</td>
															<td class="text-success">$52.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2021-01-04T00:00:00+03:00">Jan 04, 2021</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-0.80</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2021-01-01T00:00:00+03:00">Nov 01, 2021</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
															</td>
															<td>Darknight transparency 36 Icons Pack</td>
															<td class="text-success">$38.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														</tbody>
														<!--end::Table body-->
													</table>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
													<div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
														<div class="dataTables_paginate paging_simple_numbers"
															 id="kt_customer_view_statement_table_1_paginate">
															<ul class="pagination">
																<li class="paginate_button page-item previous disabled"
																	id="kt_customer_view_statement_table_1_previous"><a
																			href="#"
																			aria-controls="kt_customer_view_statement_table_1"
																			data-dt-idx="0" tabindex="0"
																			class="page-link"><i
																				class="previous"></i></a></li>
																<li class="paginate_button page-item active"><a href="#"
																												aria-controls="kt_customer_view_statement_table_1"
																												data-dt-idx="1"
																												tabindex="0"
																												class="page-link">1</a>
																</li>
																<li class="paginate_button page-item "><a href="#"
																										  aria-controls="kt_customer_view_statement_table_1"
																										  data-dt-idx="2"
																										  tabindex="0"
																										  class="page-link">2</a>
																</li>
																<li class="paginate_button page-item next"
																	id="kt_customer_view_statement_table_1_next"><a
																			href="#"
																			aria-controls="kt_customer_view_statement_table_1"
																			data-dt-idx="3" tabindex="0"
																			class="page-link"><i class="next"></i></a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<!--end::Table-->
										</div>
										<!--end::Tab panel-->
										<!--begin::Tab panel-->
										<div id="kt_customer_view_statement_2" class="py-0 tab-pane fade"
											 role="tabpanel">
											<!--begin::Table-->
											<div id="kt_customer_view_statement_table_2_wrapper"
												 class="dataTables_wrapper dt-bootstrap4 no-footer">
												<div class="table-responsive">
													<table id="kt_customer_view_statement_table_2"
														   class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4 dataTable no-footer">
														<!--begin::Table head-->
														<thead class="border-bottom border-gray-200">
														<!--begin::Table row-->
														<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
															<th class="w-125px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_2"
																rowspan="1" colspan="1"
																aria-label="Date: activate to sort column ascending"
																style="width: 125px;">Date
															</th>
															<th class="w-100px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_2"
																rowspan="1" colspan="1"
																aria-label="Order ID: activate to sort column ascending"
																style="width: 100px;">Order ID
															</th>
															<th class="w-300px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_2"
																rowspan="1" colspan="1"
																aria-label="Details: activate to sort column ascending"
																style="width: 300px;">Details
															</th>
															<th class="w-100px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_2"
																rowspan="1" colspan="1"
																aria-label="Amount: activate to sort column ascending"
																style="width: 100px;">Amount
															</th>
															<th class="w-100px text-end pe-7 sorting_disabled"
																rowspan="1" colspan="1" aria-label="Invoice"
																style="width: 100px;">Invoice
															</th>
														</tr>
														<!--end::Table row-->
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>


														<tr class="odd">
															<td data-order="2020-01-30T00:00:00+03:00">May 30, 2020</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-1.30</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2020-01-22T00:00:00+03:00">Apr 22, 2020</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
															</td>
															<td>Parcel Shipping / Delivery Service App</td>
															<td class="text-success">$204.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2020-01-09T00:00:00+03:00">Feb 09, 2020</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
															</td>
															<td>Visual Design Illustration</td>
															<td class="text-success">$31.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2020-01-01T00:00:00+03:00">Nov 01, 2020</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
															</td>
															<td>Abstract Vusial Pack</td>
															<td class="text-success">$52.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2020-01-04T00:00:00+03:00">Jan 04, 2020</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-0.80</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2020-01-01T00:00:00+03:00">Nov 01, 2020</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
															</td>
															<td>Darknight transparency 36 Icons Pack</td>
															<td class="text-success">$38.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2020-01-24T00:00:00+03:00">Oct 24, 2020</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-2.60</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2020-01-08T00:00:00+03:00">Oct 08, 2020</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
															</td>
															<td>Cartoon Mobile Emoji Phone Pack</td>
															<td class="text-success">$76.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2020-01-15T00:00:00+03:00">Sep 15, 2020</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
															</td>
															<td>Iphone 12 Pro Mockup Mega Bundle</td>
															<td class="text-success">$5.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2020-01-30T00:00:00+03:00">May 30, 2020</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-1.30</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														</tbody>
														<!--end::Table body-->
													</table>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
													<div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
														<div class="dataTables_paginate paging_simple_numbers"
															 id="kt_customer_view_statement_table_2_paginate">
															<ul class="pagination">
																<li class="paginate_button page-item previous disabled"
																	id="kt_customer_view_statement_table_2_previous"><a
																			href="#"
																			aria-controls="kt_customer_view_statement_table_2"
																			data-dt-idx="0" tabindex="0"
																			class="page-link"><i
																				class="previous"></i></a></li>
																<li class="paginate_button page-item active"><a href="#"
																												aria-controls="kt_customer_view_statement_table_2"
																												data-dt-idx="1"
																												tabindex="0"
																												class="page-link">1</a>
																</li>
																<li class="paginate_button page-item "><a href="#"
																										  aria-controls="kt_customer_view_statement_table_2"
																										  data-dt-idx="2"
																										  tabindex="0"
																										  class="page-link">2</a>
																</li>
																<li class="paginate_button page-item next"
																	id="kt_customer_view_statement_table_2_next"><a
																			href="#"
																			aria-controls="kt_customer_view_statement_table_2"
																			data-dt-idx="3" tabindex="0"
																			class="page-link"><i class="next"></i></a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<!--end::Table-->
										</div>
										<!--end::Tab panel-->
										<!--begin::Tab panel-->
										<div id="kt_customer_view_statement_3" class="py-0 tab-pane fade"
											 role="tabpanel">
											<!--begin::Table-->
											<div id="kt_customer_view_statement_table_3_wrapper"
												 class="dataTables_wrapper dt-bootstrap4 no-footer">
												<div class="table-responsive">
													<table id="kt_customer_view_statement_table_3"
														   class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4 dataTable no-footer">
														<!--begin::Table head-->
														<thead class="border-bottom border-gray-200">
														<!--begin::Table row-->
														<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
															<th class="w-125px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_3"
																rowspan="1" colspan="1"
																aria-label="Date: activate to sort column ascending"
																style="width: 125px;">Date
															</th>
															<th class="w-100px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_3"
																rowspan="1" colspan="1"
																aria-label="Order ID: activate to sort column ascending"
																style="width: 100px;">Order ID
															</th>
															<th class="w-300px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_3"
																rowspan="1" colspan="1"
																aria-label="Details: activate to sort column ascending"
																style="width: 300px;">Details
															</th>
															<th class="w-100px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_3"
																rowspan="1" colspan="1"
																aria-label="Amount: activate to sort column ascending"
																style="width: 100px;">Amount
															</th>
															<th class="w-100px text-end pe-7 sorting_disabled"
																rowspan="1" colspan="1" aria-label="Invoice"
																style="width: 100px;">Invoice
															</th>
														</tr>
														<!--end::Table row-->
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>


														<tr class="odd">
															<td data-order="2019-01-09T00:00:00+03:00">Feb 09, 2019</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
															</td>
															<td>Visual Design Illustration</td>
															<td class="text-success">$31.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2019-01-01T00:00:00+03:00">Nov 01, 2019</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
															</td>
															<td>Abstract Vusial Pack</td>
															<td class="text-success">$52.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2019-01-04T00:00:00+03:00">Jan 04, 2019</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-0.80</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2019-01-15T00:00:00+03:00">Sep 15, 2019</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
															</td>
															<td>Iphone 12 Pro Mockup Mega Bundle</td>
															<td class="text-success">$5.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2019-01-01T00:00:00+03:00">Nov 01, 2019</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
															</td>
															<td>Darknight transparency 36 Icons Pack</td>
															<td class="text-success">$38.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2019-01-24T00:00:00+03:00">Oct 24, 2019</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-2.60</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2019-01-08T00:00:00+03:00">Oct 08, 2019</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
															</td>
															<td>Cartoon Mobile Emoji Phone Pack</td>
															<td class="text-success">$76.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2019-01-30T00:00:00+03:00">May 30, 2019</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">523445943</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-1.30</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2019-01-22T00:00:00+03:00">Apr 22, 2019</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">231445943</a>
															</td>
															<td>Parcel Shipping / Delivery Service App</td>
															<td class="text-success">$204.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2019-01-09T00:00:00+03:00">Feb 09, 2019</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
															</td>
															<td>Visual Design Illustration</td>
															<td class="text-success">$31.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														</tbody>
														<!--end::Table body-->
													</table>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
													<div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
														<div class="dataTables_paginate paging_simple_numbers"
															 id="kt_customer_view_statement_table_3_paginate">
															<ul class="pagination">
																<li class="paginate_button page-item previous disabled"
																	id="kt_customer_view_statement_table_3_previous"><a
																			href="#"
																			aria-controls="kt_customer_view_statement_table_3"
																			data-dt-idx="0" tabindex="0"
																			class="page-link"><i
																				class="previous"></i></a></li>
																<li class="paginate_button page-item active"><a href="#"
																												aria-controls="kt_customer_view_statement_table_3"
																												data-dt-idx="1"
																												tabindex="0"
																												class="page-link">1</a>
																</li>
																<li class="paginate_button page-item "><a href="#"
																										  aria-controls="kt_customer_view_statement_table_3"
																										  data-dt-idx="2"
																										  tabindex="0"
																										  class="page-link">2</a>
																</li>
																<li class="paginate_button page-item next"
																	id="kt_customer_view_statement_table_3_next"><a
																			href="#"
																			aria-controls="kt_customer_view_statement_table_3"
																			data-dt-idx="3" tabindex="0"
																			class="page-link"><i class="next"></i></a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<!--end::Table-->
										</div>
										<!--end::Tab panel-->
										<!--begin::Tab panel-->
										<div id="kt_customer_view_statement_4" class="py-0 tab-pane fade"
											 role="tabpanel">
											<!--begin::Table-->
											<div id="kt_customer_view_statement_table_4_wrapper"
												 class="dataTables_wrapper dt-bootstrap4 no-footer">
												<div class="table-responsive">
													<table id="kt_customer_view_statement_table_4"
														   class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4 dataTable no-footer">
														<!--begin::Table head-->
														<thead class="border-bottom border-gray-200">
														<!--begin::Table row-->
														<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
															<th class="w-125px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_4"
																rowspan="1" colspan="1"
																aria-label="Date: activate to sort column ascending"
																style="width: 125px;">Date
															</th>
															<th class="w-100px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_4"
																rowspan="1" colspan="1"
																aria-label="Order ID: activate to sort column ascending"
																style="width: 100px;">Order ID
															</th>
															<th class="w-300px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_4"
																rowspan="1" colspan="1"
																aria-label="Details: activate to sort column ascending"
																style="width: 300px;">Details
															</th>
															<th class="w-100px sorting" tabindex="0"
																aria-controls="kt_customer_view_statement_table_4"
																rowspan="1" colspan="1"
																aria-label="Amount: activate to sort column ascending"
																style="width: 100px;">Amount
															</th>
															<th class="w-100px text-end pe-7 sorting_disabled"
																rowspan="1" colspan="1" aria-label="Invoice"
																style="width: 100px;">Invoice
															</th>
														</tr>
														<!--end::Table row-->
														</thead>
														<!--end::Table head-->
														<!--begin::Table body-->
														<tbody>


														<tr class="odd">
															<td data-order="2018-01-01T00:00:00+03:00">Nov 01, 2018</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
															</td>
															<td>Darknight transparency 36 Icons Pack</td>
															<td class="text-success">$38.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2018-01-24T00:00:00+03:00">Oct 24, 2018</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-2.60</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2018-01-01T00:00:00+03:00">Nov 01, 2018</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">102445788</a>
															</td>
															<td>Darknight transparency 36 Icons Pack</td>
															<td class="text-success">$38.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2018-01-24T00:00:00+03:00">Oct 24, 2018</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">423445721</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-2.60</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2018-01-09T00:00:00+03:00">Feb 09, 2018</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
															</td>
															<td>Visual Design Illustration</td>
															<td class="text-success">$31.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2018-01-01T00:00:00+03:00">Nov 01, 2018</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">984445943</a>
															</td>
															<td>Abstract Vusial Pack</td>
															<td class="text-success">$52.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2018-01-04T00:00:00+03:00">Jan 04, 2018</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">324442313</a>
															</td>
															<td>Seller Fee</td>
															<td class="text-danger">$-0.80</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2018-01-08T00:00:00+03:00">Oct 08, 2018</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
															</td>
															<td>Cartoon Mobile Emoji Phone Pack</td>
															<td class="text-success">$76.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="odd">
															<td data-order="2018-01-08T00:00:00+03:00">Oct 08, 2018</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">312445984</a>
															</td>
															<td>Cartoon Mobile Emoji Phone Pack</td>
															<td class="text-success">$76.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														<tr class="even">
															<td data-order="2019-01-09T00:00:00+03:00">Feb 09, 2019</td>
															<td>
																<a href="#" class="text-gray-600 text-hover-primary">426445943</a>
															</td>
															<td>Visual Design Illustration</td>
															<td class="text-success">$31.00</td>
															<td class="text-end">
																<button class="btn btn-sm btn-light btn-active-light-primary">
																	Download
																</button>
															</td>
														</tr>
														</tbody>
														<!--end::Table body-->
													</table>
												</div>
												<div class="row">
													<div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
													<div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
														<div class="dataTables_paginate paging_simple_numbers"
															 id="kt_customer_view_statement_table_4_paginate">
															<ul class="pagination">
																<li class="paginate_button page-item previous disabled"
																	id="kt_customer_view_statement_table_4_previous"><a
																			href="#"
																			aria-controls="kt_customer_view_statement_table_4"
																			data-dt-idx="0" tabindex="0"
																			class="page-link"><i
																				class="previous"></i></a></li>
																<li class="paginate_button page-item active"><a href="#"
																												aria-controls="kt_customer_view_statement_table_4"
																												data-dt-idx="1"
																												tabindex="0"
																												class="page-link">1</a>
																</li>
																<li class="paginate_button page-item "><a href="#"
																										  aria-controls="kt_customer_view_statement_table_4"
																										  data-dt-idx="2"
																										  tabindex="0"
																										  class="page-link">2</a>
																</li>
																<li class="paginate_button page-item next"
																	id="kt_customer_view_statement_table_4_next"><a
																			href="#"
																			aria-controls="kt_customer_view_statement_table_4"
																			data-dt-idx="3" tabindex="0"
																			class="page-link"><i class="next"></i></a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<!--end::Table-->
										</div>
										<!--end::Tab panel-->
									</div>
									<!--end::Tab Content-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Statements-->
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
			<div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header">
							<!--begin::Modal title-->
							<h2>Add New Card</h2>
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
							<form id="kt_modal_new_card_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
								  action="#">
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
										<span class="required">Name On Card</span>
										<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title=""
										   data-bs-original-title="Specify a card holder's name"
										   aria-label="Specify a card holder's name"></i>
									</label>
									<!--end::Label-->
									<input type="text" class="form-control form-control-solid" placeholder=""
										   name="card_name" value="Max Doe">
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-column mb-7 fv-row fv-plugins-icon-container">
									<!--begin::Label-->
									<label class="required fs-6 fw-bold form-label mb-2">Card Number</label>
									<!--end::Label-->
									<!--begin::Input wrapper-->
									<div class="position-relative">
										<!--begin::Input-->
										<input type="text" class="form-control form-control-solid"
											   placeholder="Enter card number" name="card_number"
											   value="4111 1111 1111 1111">
										<!--end::Input-->
										<!--begin::Card logos-->
										<div class="position-absolute translate-middle-y top-50 end-0 me-5">
											<img src="<?= public_url() ?>assets/media/svg/card-logos/visa.svg" alt=""
												 class="h-25px">
											<img src="<?= public_url() ?>assets/media/svg/card-logos/mastercard.svg"
												 alt="" class="h-25px">
											<img src="<?= public_url() ?>assets/media/svg/card-logos/american-express.svg"
												 alt="" class="h-25px">
										</div>
										<!--end::Card logos-->
									</div>
									<!--end::Input wrapper-->
									<div class="fv-plugins-message-container invalid-feedback"></div>
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="row mb-10">
									<!--begin::Col-->
									<div class="col-md-8 fv-row">
										<!--begin::Label-->
										<label class="required fs-6 fw-bold form-label mb-2">Expiration Date</label>
										<!--end::Label-->
										<!--begin::Row-->
										<div class="row fv-row fv-plugins-icon-container">
											<!--begin::Col-->
											<div class="col-6">
												<select name="card_expiry_month"
														class="form-select form-select-solid select2-hidden-accessible"
														data-control="select2" data-hide-search="true"
														data-placeholder="Month" data-select2-id="select2-data-19-ohll"
														tabindex="-1" aria-hidden="true">
													<option data-select2-id="select2-data-21-y5no"></option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
													<option value="9">9</option>
													<option value="10">10</option>
													<option value="11">11</option>
													<option value="12">12</option>
												</select><span
														class="select2 select2-container select2-container--bootstrap5"
														dir="ltr" data-select2-id="select2-data-20-a48t"
														style="width: 100%;"><span class="selection"><span
																class="select2-selection select2-selection--single form-select form-select-solid"
																role="combobox" aria-haspopup="true"
																aria-expanded="false" tabindex="0" aria-disabled="false"
																aria-labelledby="select2-card_expiry_month-ht-container"
																aria-controls="select2-card_expiry_month-ht-container"><span
																	class="select2-selection__rendered"
																	id="select2-card_expiry_month-ht-container"
																	role="textbox" aria-readonly="true"
																	title="Month"><span
																		class="select2-selection__placeholder">Month</span></span><span
																	class="select2-selection__arrow"
																	role="presentation"><b
																		role="presentation"></b></span></span></span><span
															class="dropdown-wrapper" aria-hidden="true"></span></span>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-6">
												<select name="card_expiry_year"
														class="form-select form-select-solid select2-hidden-accessible"
														data-control="select2" data-hide-search="true"
														data-placeholder="Year" data-select2-id="select2-data-22-o034"
														tabindex="-1" aria-hidden="true">
													<option data-select2-id="select2-data-24-vgmz"></option>
													<option value="2022">2022</option>
													<option value="2023">2023</option>
													<option value="2024">2024</option>
													<option value="2025">2025</option>
													<option value="2026">2026</option>
													<option value="2027">2027</option>
													<option value="2028">2028</option>
													<option value="2029">2029</option>
													<option value="2030">2030</option>
													<option value="2031">2031</option>
													<option value="2032">2032</option>
												</select><span
														class="select2 select2-container select2-container--bootstrap5"
														dir="ltr" data-select2-id="select2-data-23-c0xl"
														style="width: 100%;"><span class="selection"><span
																class="select2-selection select2-selection--single form-select form-select-solid"
																role="combobox" aria-haspopup="true"
																aria-expanded="false" tabindex="0" aria-disabled="false"
																aria-labelledby="select2-card_expiry_year-he-container"
																aria-controls="select2-card_expiry_year-he-container"><span
																	class="select2-selection__rendered"
																	id="select2-card_expiry_year-he-container"
																	role="textbox" aria-readonly="true"
																	title="Year"><span
																		class="select2-selection__placeholder">Year</span></span><span
																	class="select2-selection__arrow"
																	role="presentation"><b
																		role="presentation"></b></span></span></span><span
															class="dropdown-wrapper" aria-hidden="true"></span></span>
												<div class="fv-plugins-message-container invalid-feedback"></div>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col-md-4 fv-row fv-plugins-icon-container">
										<!--begin::Label-->
										<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
											<span class="required">CVV</span>
											<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
											   title="" data-bs-original-title="Enter a card CVV code"
											   aria-label="Enter a card CVV code"></i>
										</label>
										<!--end::Label-->
										<!--begin::Input wrapper-->
										<div class="position-relative">
											<!--begin::Input-->
											<input type="text" class="form-control form-control-solid" minlength="3"
												   maxlength="4" placeholder="CVV" name="card_cvv">
											<!--end::Input-->
											<!--begin::CVV icon-->
											<div class="position-absolute translate-middle-y top-50 end-0 me-3">
												<!--begin::Svg Icon | path: icons/duotune/finance/fin002.svg-->
												<span class="svg-icon svg-icon-2hx">
																		<svg xmlns="http://www.w3.org/2000/svg"
																			 width="24" height="24" viewBox="0 0 24 24"
																			 fill="none">
																			<path d="M22 7H2V11H22V7Z"
																				  fill="currentColor"></path>
																			<path opacity="0.3"
																				  d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z"
																				  fill="currentColor"></path>
																		</svg>
																	</span>
												<!--end::Svg Icon-->
											</div>
											<!--end::CVV icon-->
										</div>
										<!--end::Input wrapper-->
										<div class="fv-plugins-message-container invalid-feedback"></div>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="d-flex flex-stack">
									<!--begin::Label-->
									<div class="me-5">
										<label class="fs-6 fw-bold form-label">Save Card for further billing?</label>
										<div class="fs-7 fw-bold text-muted">If you need more info, please check budget
											planning
										</div>
									</div>
									<!--end::Label-->
									<!--begin::Switch-->
									<label class="form-check form-switch form-check-custom form-check-solid">
										<input class="form-check-input" type="checkbox" value="1" checked="checked">
										<span class="form-check-label fw-bold text-muted">Save Card</span>
									</label>
									<!--end::Switch-->
								</div>
								<!--end::Input group-->
								<!--begin::Actions-->
								<div class="text-center pt-15">
									<button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">
										Discard
									</button>
									<button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
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
								  action="#">"customerType" value="INDIVIDUAL">
								<input type="hidden" name=

								<input type="hidden" name="customerID" value="<?=$data["customerId"]?>">
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
																  class="form-control form-control-lg form-control-solid resize-none"><?=$data["address"]?></textarea>
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
															   value="<?=phoneMask($data["phone"])?>"
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
															   value="<?=phoneMask($data["secondPhone"])?>"
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

			<!--end::Modals-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
