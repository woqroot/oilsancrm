<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<?=$CI->loadLayout("breadcrumb")?>
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
						 id="kt_menu_624445cf8181d">
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
											data-dropdown-parent="#kt_menu_624445cf8181d" data-allow-clear="true">
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
				<a href="../../demo1/dist/.html" class="btn btn-sm btn-primary" data-bs-toggle="modal"
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
			<!--begin::Navbar-->
			<div class="card mb-5 mb-xl-10">
				<div class="card-body pt-9 pb-0">
					<!--begin::Details-->
					<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
						<!--begin: Pic-->
						<div class="me-7 mb-4">
							<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
								<?= getAvatar($user,null,"fs-4x") ?>
								<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-<?= isOnline($user["lastSeenAt"]) ? "success" : "danger"; ?> rounded-circle border border-4 border-white h-20px w-20px"></div>
							</div>
						</div>
						<!--end::Pic-->
						<!--begin::Info-->
						<div class="flex-grow-1">
							<!--begin::Title-->
							<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
								<!--begin::User-->
								<div class="d-flex flex-column">
									<!--begin::Name-->
									<div class="d-flex align-items-center mb-2">
										<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1"><?=$user["firstName"]." ".$user["lastName"]?></a>
										<a href="#" class="btn btn-sm btn-light-<?=isOnline($user["lastSeenAt"]) ? "success" : "danger"?> fw-bolder ms-2 fs-8 py-1 px-3"
										   data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan"><?=isOnline($user["lastSeenAt"]) ? "Çevrimiçi" : "Çevrimdışı"?></a>
									</div>
									<!--end::Name-->
									<!--begin::Info-->
									<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
										<a href="#"
										   class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
											<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
											<span class="svg-icon svg-icon-4 me-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3"
																		  d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
																		  fill="currentColor"/>
																	<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
																		  fill="currentColor"/>
																</svg>
															</span>
											<!--end::Svg Icon--><?=$user["role"]["title"]?></a>

										<a href="#"
										   class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
											<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
											<span class="svg-icon svg-icon-4 me-1">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3"
																		  d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
																		  fill="currentColor"/>
																	<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
																		  fill="currentColor"/>
																</svg>
															</span>
											<!--end::Svg Icon--><?=$user["email"]?></a>

										<a href="#"
										   class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
											<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
											<span class="svg-icon svg-icon-4 me-1">
																<i class="fa fa-clock"></i>
															</span>
											<!--end::Svg Icon--><?=timeAgo($user["lastSeenAt"])?></a>
									</div>
									<!--end::Info-->
								</div>
								<!--end::User-->
								<!--begin::Actions-->
								<div class="d-flex my-4">
									<a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
										<span class="svg-icon svg-icon-3 d-none">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3"
																		  d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z"
																		  fill="currentColor"/>
																	<path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z"
																		  fill="currentColor"/>
																</svg>
															</span>
										<!--end::Svg Icon-->
										<!--begin::Indicator-->
										<span class="indicator-label">Follow</span>
										<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator-->
									</a>
									<a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal"
									   data-bs-target="#kt_modal_offer_a_deal">Hire Me</a>
									<!--begin::Menu-->
									<div class="me-0">
										<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"
												data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<i class="bi bi-three-dots fs-3"></i>
										</button>
										<!--begin::Menu 3-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
											 data-kt-menu="true">
											<!--begin::Heading-->
											<div class="menu-item px-3">
												<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
													Payments
												</div>
											</div>
											<!--end::Heading-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3">Create Invoice</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link flex-stack px-3">Create Payment
													<i class="fas fa-exclamation-circle ms-2 fs-7"
													   data-bs-toggle="tooltip"
													   title="Specify a target name for future usage and reference"></i></a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<a href="#" class="menu-link px-3">Generate Bill</a>
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3" data-kt-menu-trigger="hover"
												 data-kt-menu-placement="right-end">
												<a href="#" class="menu-link px-3">
													<span class="menu-title">Subscription</span>
													<span class="menu-arrow"></span>
												</a>
												<!--begin::Menu sub-->
												<div class="menu-sub menu-sub-dropdown w-175px py-4">
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">Plans</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">Billing</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3">Statements</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu separator-->
													<div class="separator my-2"></div>
													<!--end::Menu separator-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<div class="menu-content px-3">
															<!--begin::Switch-->
															<label class="form-check form-switch form-check-custom form-check-solid">
																<!--begin::Input-->
																<input class="form-check-input w-30px h-20px"
																	   type="checkbox" value="1" checked="checked"
																	   name="notifications"/>
																<!--end::Input-->
																<!--end::Label-->
																<span class="form-check-label text-muted fs-6">Recuring</span>
																<!--end::Label-->
															</label>
															<!--end::Switch-->
														</div>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu sub-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item px-3 my-1">
												<a href="#" class="menu-link px-3">Settings</a>
											</div>
											<!--end::Menu item-->
										</div>
										<!--end::Menu 3-->
									</div>
									<!--end::Menu-->
								</div>
								<!--end::Actions-->
							</div>
							<!--end::Title-->
							<!--begin::Stats-->
							<div class="d-flex flex-wrap flex-stack">
								<!--begin::Wrapper-->
								<div class="d-flex flex-column flex-grow-1 pe-8">
									<!--begin::Stats-->
									<div class="d-flex flex-wrap">
										<!--begin::Stat-->
										<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
											<!--begin::Number-->
											<div class="d-flex align-items-center">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
												<span class="svg-icon svg-icon-3 svg-icon-success me-2">
																		<svg xmlns="http://www.w3.org/2000/svg"
																			 width="24" height="24" viewBox="0 0 24 24"
																			 fill="none">
																			<rect opacity="0.5" x="13" y="6" width="13"
																				  height="2" rx="1"
																				  transform="rotate(90 13 6)"
																				  fill="currentColor"/>
																			<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
																				  fill="currentColor"/>
																		</svg>
																	</span>
												<!--end::Svg Icon-->
												<div class="fs-2 fw-bolder" data-kt-countup="true"
													 data-kt-countup-value="4500" data-kt-countup-prefix="$">0
												</div>
											</div>
											<!--end::Number-->
											<!--begin::Label-->
											<div class="fw-bold fs-6 text-gray-400">Earnings</div>
											<!--end::Label-->
										</div>
										<!--end::Stat-->
										<!--begin::Stat-->
										<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
											<!--begin::Number-->
											<div class="d-flex align-items-center">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
												<span class="svg-icon svg-icon-3 svg-icon-danger me-2">
																		<svg xmlns="http://www.w3.org/2000/svg"
																			 width="24" height="24" viewBox="0 0 24 24"
																			 fill="none">
																			<rect opacity="0.5" x="11" y="18" width="13"
																				  height="2" rx="1"
																				  transform="rotate(-90 11 18)"
																				  fill="currentColor"/>
																			<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
																				  fill="currentColor"/>
																		</svg>
																	</span>
												<!--end::Svg Icon-->
												<div class="fs-2 fw-bolder" data-kt-countup="true"
													 data-kt-countup-value="75">0
												</div>
											</div>
											<!--end::Number-->
											<!--begin::Label-->
											<div class="fw-bold fs-6 text-gray-400">Projects</div>
											<!--end::Label-->
										</div>
										<!--end::Stat-->
										<!--begin::Stat-->
										<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
											<!--begin::Number-->
											<div class="d-flex align-items-center">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
												<span class="svg-icon svg-icon-3 svg-icon-success me-2">
																		<svg xmlns="http://www.w3.org/2000/svg"
																			 width="24" height="24" viewBox="0 0 24 24"
																			 fill="none">
																			<rect opacity="0.5" x="13" y="6" width="13"
																				  height="2" rx="1"
																				  transform="rotate(90 13 6)"
																				  fill="currentColor"/>
																			<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
																				  fill="currentColor"/>
																		</svg>
																	</span>
												<!--end::Svg Icon-->
												<div class="fs-2 fw-bolder" data-kt-countup="true"
													 data-kt-countup-value="60" data-kt-countup-prefix="%">0
												</div>
											</div>
											<!--end::Number-->
											<!--begin::Label-->
											<div class="fw-bold fs-6 text-gray-400">Success Rate</div>
											<!--end::Label-->
										</div>
										<!--end::Stat-->
									</div>
									<!--end::Stats-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Progress-->
								<div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
									<div class="d-flex justify-content-between w-100 mt-auto mb-2">
										<span class="fw-bold fs-6 text-gray-400">Profile Compleation</span>
										<span class="fw-bolder fs-6">50%</span>
									</div>
									<div class="h-5px mx-3 w-100 bg-light mb-3">
										<div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;"
											 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<!--end::Progress-->
							</div>
							<!--end::Stats-->
						</div>
						<!--end::Info-->
					</div>
					<!--end::Details-->
					<!--begin::Navs-->
					<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
						<!--begin::Nav item-->
						<li class="nav-item mt-2">
							<a data-bs-target="#overview" data-bs-toggle="tab" href="#overview"
							   class="nav-link text-active-primary ms-0 me-10 py-5 active">Genel Bakış</a>
						</li>
						<!--end::Nav item-->
						<!--begin::Nav item-->
						<li class="nav-item mt-2">
							<a data-bs-target="#personal-settings" data-bs-toggle="tab" href="#personal-settings"
							   class="nav-link text-active-primary ms-0 me-10 py-5">Ayarlar</a>
						</li>
						<!--end::Nav item-->
						<!--end::Nav item-->
					</ul>
					<!--begin::Navs-->
				</div>
			</div>
			<!--end::Navbar-->
			<div class="tab-content" id="myTabContent">
				<!-- begin::Overview -->
				<div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="home-tab">
					<div class="card mb-5 mb-xl-10">
						<!--begin::Card header-->
						<div class="card-header">
							<!--begin::Card title-->
							<div class="card-title m-0">
								<h3 class="fw-bolder m-0">Kullanıcı Bilgileri</h3>
							</div>
							<!--end::Card title-->
						</div>
						<!--begin::Card header-->
						<!--begin::Card body-->
						<div class="card-body p-9">
							<!--begin::Row-->
							<div class="row mb-7">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">Ad-Soyad</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8">
									<span class="fw-bolder fs-6 text-gray-800"><?=$user["firstName"]." ".$user["lastName"]?></span>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
							<!--begin::Input group-->
							<div class="row mb-7">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">E-posta Adresi</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<span class="fw-bolder text-gray-800 fs-6"><?=$user["email"]?></span>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-7">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">Telefon Numarası</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 d-flex align-items-center">
									<span class="fw-bolder fs-6 text-gray-800 me-2"><?=phoneMask($user["phone"])?></span>

								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-7">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">Doğum Tarihi</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8">
									<label class="fw-bold fs-6 text-gray-800"><?=convertDate($user["birthDate"]) ?? "-"?></label>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Notice-->
							<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
								<!--begin::Icon-->
								<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
								<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
													 viewBox="0 0 24 24" fill="none">
													<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
														  fill="currentColor"/>
													<rect x="11" y="14" width="7" height="2" rx="1"
														  transform="rotate(-90 11 14)" fill="currentColor"/>
													<rect x="11" y="17" width="2" height="2" rx="1"
														  transform="rotate(-90 11 17)" fill="currentColor"/>
												</svg>
											</span>
								<!--end::Svg Icon-->
								<!--end::Icon-->
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack flex-grow-1">
									<!--begin::Content-->
									<div class="fw-bold">
										<h4 class="text-gray-900 fw-bolder">We need your attention!</h4>
										<div class="fs-6 text-gray-700">Your payment was declined. To start using tools,
											please
											<a class="fw-bolder" href="../../demo1/dist/account/billing.html">Add
												Payment
												Method</a>.
										</div>
									</div>
									<!--end::Content-->
								</div>
								<!--end::Wrapper-->
							</div>
							<!--end::Notice-->
						</div>
						<!--end::Card body-->
					</div>
				</div>
				<!-- end::Overview -->
				<!-- begin::Personal Settings -->

				<div class="tab-pane fade" id="personal-settings" role="tabpanel" aria-labelledby="home-tab">
					<!--begin::details View-->
					<div class="card mb-5 mb-xl-10">
						<!--begin::Basic info-->
						<div class="card mb-5 mb-xl-10">
							<!--begin::Card header-->
							<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
								 data-bs-target="#kt_account_profile_details" aria-expanded="true"
								 aria-controls="kt_account_profile_details">
								<!--begin::Card title-->
								<div class="card-title m-0">
									<h3 class="fw-bolder m-0">Temel Bilgiler</h3>
								</div>
								<!--end::Card title-->
							</div>
							<!--begin::Card header-->
							<div class="card-body border-top p-9">
								<!--begin::Input group-->
								<div class="row mb-6">
									<!--begin::Label-->
									<label class="col-lg-4 col-form-label fw-bold fs-6">Profil Fotoğrafı</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8">
										<!--begin::Image input-->
										<div class="image-input image-input-outline" data-kt-image-input="true"
											 style="background-image: url('<?= assets_url() ?>media/svg/avatars/blank.svg')">
											<!--begin::Preview existing avatar-->
											<div class="image-input-wrapper w-125px h-125px"
												 style="background-image: url(<?= is_file(uploads_dir($user["image"])) ? uploads_url($user["image"]) : assets_url("media/svg/avatars/blank.svg") ?>"></div>
											<!--end::Preview existing avatar-->
											<!--begin::Label-->
											<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
												   data-kt-image-input-action="change" data-bs-toggle="tooltip"
												   title="Change avatar">
												<i class="bi bi-pencil-fill fs-7"></i>
												<!--begin::Inputs-->
												<input type="file" name="avatar" accept=".png, .jpg, .jpeg"/>
												<input type="hidden" name="avatar_remove"/>
												<!--end::Inputs-->
											</label>
											<!--end::Label-->
											<!--begin::Cancel-->
											<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
												  data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
												  title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
											<!--end::Cancel-->
											<!--begin::Remove-->
											<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
												  data-kt-image-input-action="remove" data-bs-toggle="tooltip"
												  title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
											<!--end::Remove-->
										</div>
										<!--end::Image input-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="row mb-6">
									<!--begin::Label-->
									<label class="col-lg-4 col-form-label required fw-bold fs-6">Ad-Soyad</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8">
										<!--begin::Row-->
										<div class="row">
											<!--begin::Col-->
											<div class="col-lg-6 fv-row">
												<input type="text" required name="firstName"
													   class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
													   placeholder="" value="<?=$user["firstName"]?>"/>
											</div>
											<!--end::Col-->
											<!--begin::Col-->
											<div class="col-lg-6 fv-row">
												<input type="text" required name="lastName"
													   class="form-control form-control-lg form-control-solid"
													   placeholder="" value="<?=$user["lastName"]?>"/>
											</div>
											<!--end::Col-->
										</div>
										<!--end::Row-->
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="row mb-6">
									<!--begin::Label-->
									<label class="col-lg-4 col-form-label  fw-bold fs-6">Telefon Numarası</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8 fv-row">
										<input type="text" name="phone"
											   class="form-control form-control-lg maskPhone form-control-solid"
											   placeholder="Telefon Numarası"  value="<?=phoneMask($user["phone"])?>"/>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->

								<!--begin::Input group-->
								<div class="row mb-6">
									<!--begin::Label-->
									<label class="col-lg-4 col-form-label  fw-bold fs-6">Doğum Tarihi</label>
									<!--end::Label-->
									<!--begin::Col-->
									<div class="col-lg-8 fv-row">
										<input type="text" name="phone"
											   class="dateInput form-control form-control-lg  form-control-solid"
											   placeholder="Doğum Tarihi"  value="<?=convertDate($user["birthDate"])?>"/>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Input group-->
							</div>

							<!--end::Card body-->
							<!--begin::Actions-->
							<div class="card-footer d-flex justify-content-end py-6 px-9">
								<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">
									Değişiklikleri Kaydet
								</button>
							</div>
							<!--end::Actions-->

						</div>
						<!--end::Basic info-->
					</div>
					<!--end::details View-->
					<!--begin::Sign-in Method-->
					<div class="card mb-5 mb-xl-10">
						<!--begin::Card header-->
						<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
							<div class="card-title m-0">
								<h3 class="fw-bolder m-0">Güvenlik Ayarları</h3>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Content-->
						<div id="kt_account_settings_signin_method" class="collapse show">
							<!--begin::Card body-->
							<div class="card-body border-top p-9">
								<!--begin::Email Address-->
								<div class="d-flex flex-wrap align-items-center">
									<!--begin::Label-->
									<div id="kt_signin_email">
										<div class="fs-6 fw-bolder mb-1">E-Posta Adresi</div>
										<div class="fw-bold text-gray-600"><?=$user["email"]?></div>
									</div>
									<!--end::Label-->
									<!--begin::Edit-->
									<div id="kt_signin_email_edit" class="flex-row-fluid d-none">
										<!--begin::Form-->
										<form id="kt_signin_change_email" class="form" novalidate="novalidate">
											<div class="row mb-6">
												<div class="col-lg-6 mb-4 mb-lg-0">
													<div class="fv-row mb-0">
														<label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Yeni E-Posta Adresi</label>
														<input type="email" class="form-control form-control-lg form-control-solid" id="emailaddress" placeholder="E-posta Adresi" name="email" value="" />
													</div>
												</div>
												<div class="col-lg-6">
													<div class="fv-row mb-0">
														<label for="confirmemailpassword" class="form-label fs-6 fw-bolder mb-3">Hesap Parolanız</label>
														<input type="password" class="form-control form-control-lg form-control-solid" name="confirmPassword" id="confirmemailpassword" />
													</div>
												</div>
											</div>
											<div class="d-flex">
												<button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Kaydet</button>
												<button id="kt_signin_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Vazgeç</button>
											</div>
										</form>
										<!--end::Form-->
									</div>
									<!--end::Edit-->
									<!--begin::Action-->
									<div id="kt_signin_email_button" class="ms-auto">
										<button class="btn btn-light btn-active-light-primary">Değiştir</button>
									</div>
									<!--end::Action-->
								</div>
								<!--end::Email Address-->
								<!--begin::Separator-->
								<div class="separator separator-dashed my-6"></div>
								<!--end::Separator-->
								<!--begin::Password-->
								<div class="d-flex flex-wrap align-items-center mb-10">
									<!--begin::Label-->
									<div id="kt_signin_password">
										<div class="fs-6 fw-bolder mb-1">Parola</div>
										<div class="fw-bold text-gray-600">************</div>
									</div>
									<!--end::Label-->
									<!--begin::Edit-->
									<div id="kt_signin_password_edit" class="flex-row-fluid d-none">
										<!--begin::Form-->
										<form id="kt_signin_change_password" class="form" novalidate="novalidate">
											<div class="row mb-1">
												<div class="col-lg-4">
													<div class="fv-row mb-0">
														<label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Eski Parola</label>
														<input type="password" class="form-control form-control-lg form-control-solid" name="currentpassword" id="currentpassword" />
													</div>
												</div>
												<div class="col-lg-4">
													<div class="fv-row mb-0">
														<label for="newpassword" class="form-label fs-6 fw-bolder mb-3">Yeni Parola</label>
														<input type="password" class="form-control form-control-lg form-control-solid" name="newpassword" id="newpassword" />
													</div>
												</div>
												<div class="col-lg-4">
													<div class="fv-row mb-0">
														<label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Yeni Parola (tekrar)</label>
														<input type="password" class="form-control form-control-lg form-control-solid" name="confirmpassword" id="confirmpassword" />
													</div>
												</div>
											</div>
											<div class="form-text mb-5">En az 8 karakter uzunluğunda yeni şifrenizi belirleyebilirsiniz.</div>
											<div class="d-flex">
												<button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Kaydet</button>
												<button id="kt_password_cancel" type="button" class="btn btn-color-gray-400 btn-active-light-primary px-6">Vazgeç</button>
											</div>
										</form>
										<!--end::Form-->
									</div>
									<!--end::Edit-->
									<!--begin::Action-->
									<div id="kt_signin_password_button" class="ms-auto">
										<button class="btn btn-light btn-active-light-primary">Şifre Sıfırla</button>
									</div>
									<!--end::Action-->
								</div>
								<!--end::Password-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Sign-in Method-->
				</div>
			</div>


		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
<!--end::Content-->
