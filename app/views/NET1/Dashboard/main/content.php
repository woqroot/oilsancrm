<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
				 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
				 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<!--begin::Title-->

				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1"><?=end($_breadcrumb["map"])?>
					<!--begin::Separator-->
					<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
					<!--end::Separator-->
					<!--begin::Description-->
					<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">
							<a href="<?=base_url()?>"
							   class="text-muted text-hover-primary">NetCRM v1.0</a>
						</li>
						<!--end::Item-->
						<?php
						foreach ($_breadcrumb["map"] as $index => $item) {
							?>
							<!--begin::Item-->
							<li class="breadcrumb-item">
								<span class="bullet bg-gray-200 w-5px h-2px"></span>
							</li>
							<!--end::Item-->
							<!--begin::Item-->
							<li class="breadcrumb-item text-<?= array_key_last($_breadcrumb["map"]) == $index ? "dark" : "muted"; ?>"><?= $item ?></li>
							<!--end::Item-->
							<?php

						}
						?>

					</ul>
					<!--end::Description--></h1>
				<!--end::Title-->
			</div>
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
						 id="kt_menu_624445fe239d1">
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
											data-dropdown-parent="#kt_menu_624445fe239d1"
											data-allow-clear="true">
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
										<input class="form-check-input" type="checkbox" value="2"
											   checked="checked"/>
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
									<input class="form-check-input" type="checkbox" value=""
										   name="notifications" checked="checked"/>
									<label class="form-check-label">Enabled</label>
								</div>
								<!--end::Switch-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="d-flex justify-content-end">
								<button type="reset"
										class="btn btn-sm btn-light btn-active-light-primary me-2"
										data-kt-menu-dismiss="true">Reset
								</button>
								<button type="submit" class="btn btn-sm btn-primary"
										data-kt-menu-dismiss="true">Apply
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
			<!--begin::Row-->
			<div class="row gy-5 g-xl-8">
				<!--begin::Col-->
				<div class="col-xl-4">
					<!--begin::Mixed Widget 2-->
					<div class="card card-xl-stretch">
						<!--begin::Header-->
						<div class="card-header border-0 bg-danger py-5">
							<h3 class="card-title fw-bolder text-white">Sales Statistics</h3>
							<div class="card-toolbar">
								<!--begin::Menu-->
								<button type="button"
										class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color- border-0 me-n3"
										data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
									<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
									<span class="svg-icon svg-icon-2">
															<svg xmlns="http://www.w3.org/2000/svg" width="24px"
																 height="24px" viewBox="0 0 24 24">
																<g stroke="none" stroke-width="1" fill="none"
																   fill-rule="evenodd">
																	<rect x="5" y="5" width="5" height="5" rx="1"
																		  fill="currentColor"/>
																	<rect x="14" y="5" width="5" height="5" rx="1"
																		  fill="currentColor" opacity="0.3"/>
																	<rect x="5" y="14" width="5" height="5" rx="1"
																		  fill="currentColor" opacity="0.3"/>
																	<rect x="14" y="14" width="5" height="5" rx="1"
																		  fill="currentColor" opacity="0.3"/>
																</g>
															</svg>
														</span>
									<!--end::Svg Icon-->
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
								<!--end::Menu-->
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body p-0">
							<!--begin::Chart-->
							<div class="mixed-widget-2-chart card-rounded-bottom bg-danger"
								 data-kt-color="danger" style="height: 200px"></div>
							<!--end::Chart-->
							<!--begin::Stats-->
							<div class="card-p mt-n20 position-relative">
								<!--begin::Row-->
								<div class="row g-0">
									<!--begin::Col-->
									<div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
										<!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
										<span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<rect x="8" y="9" width="3" height="10" rx="1.5"
																		  fill="currentColor"/>
																	<rect opacity="0.5" x="13" y="5" width="3"
																		  height="14" rx="1.5" fill="currentColor"/>
																	<rect x="18" y="11" width="3" height="8" rx="1.5"
																		  fill="currentColor"/>
																	<rect x="3" y="13" width="3" height="6" rx="1.5"
																		  fill="currentColor"/>
																</svg>
															</span>
										<!--end::Svg Icon-->
										<a href="#" class="text-warning fw-bold fs-6">Weekly Sales</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
										<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
										<span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3"
																		  d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z"
																		  fill="currentColor"/>
																	<path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z"
																		  fill="currentColor"/>
																</svg>
															</span>
										<!--end::Svg Icon-->
										<a href="#" class="text-primary fw-bold fs-6">New Projects</a>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
								<!--begin::Row-->
								<div class="row g-0">
									<!--begin::Col-->
									<div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
										<!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
										<span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3"
																		  d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
																		  fill="currentColor"/>
																	<path d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
																		  fill="currentColor"/>
																</svg>
															</span>
										<!--end::Svg Icon-->
										<a href="#" class="text-danger fw-bold fs-6 mt-2">Item Orders</a>
									</div>
									<!--end::Col-->
									<!--begin::Col-->
									<div class="col bg-light-success px-6 py-8 rounded-2">
										<!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
										<span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
																	 height="24" viewBox="0 0 24 24" fill="none">
																	<path d="M6 8.725C6 8.125 6.4 7.725 7 7.725H14L18 11.725V12.925L22 9.725L12.6 2.225C12.2 1.925 11.7 1.925 11.4 2.225L2 9.725L6 12.925V8.725Z"
																		  fill="currentColor"/>
																	<path opacity="0.3"
																		  d="M22 9.72498V20.725C22 21.325 21.6 21.725 21 21.725H3C2.4 21.725 2 21.325 2 20.725V9.72498L11.4 17.225C11.8 17.525 12.3 17.525 12.6 17.225L22 9.72498ZM15 11.725H18L14 7.72498V10.725C14 11.325 14.4 11.725 15 11.725Z"
																		  fill="currentColor"/>
																</svg>
															</span>
										<!--end::Svg Icon-->
										<a href="#" class="text-success fw-bold fs-6 mt-2">Bug Reports</a>
									</div>
									<!--end::Col-->
								</div>
								<!--end::Row-->
							</div>
							<!--end::Stats-->
						</div>
						<!--end::Body-->
					</div>
					<!--end::Mixed Widget 2-->
				</div>
				<!--end::Col-->
				<!--begin::Col-->
				<div class="col-xl-8 ">
					<div class="card card-xl-stretch mb-5 mb-xl-8">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label fw-bolder fs-3 mb-1">Duyurular</span>
								<span class="text-muted mt-1 fw-bold fs-7">Son yayımlanan duyurular listelenmiştir.</span>
							</h3>

						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-3 overflow-scroll h-300px">
							<div class="tab-content">
								<!--begin::Tap pane-->
								<div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
									<!--begin::Table container-->
									<div class="table-responsive">
										<!--begin::Table-->
										<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4 overflow-hidden">
											<!--begin::Table head-->
											<thead>
											<tr class="border-0">
												<th class="p-0 w-50px"></th>
												<th class="p-0 w-50px"></th>
												<th class="p-0 w-150px"></th>
											</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
											<?php
											$ix = 1;
											foreach ($announcements as $announcement) {


												?>
												<tr data-id="<?= $announcement["announcementId"] ?>"
													class="cursor-pointer viewAnnouncement <?= $announcement["isViewed"] == 0 ? "bg-light-warning animate__animated animate__headShake  alerting animate__infinite" : ""; ?>">
													<td><span class="badge badge-light-warning">#<?= $ix++; ?></span>
													</td>
													<td>
														<div class="symbol symbol-45px me-2">
															<?= getAvatar($announcement["image"]) ?>
														</div>
													</td>
													<td>
														<a href="javascript:void(0)"
														   class="text-dark fw-bolder text-hover-primary mb-1 fs-6"><?= $announcement["firstName"] ?> <?= $announcement["lastName"] ?></a>
														<span class="text-muted fw-bold d-block"><?= localizeDate("d M Y", $announcement["createdAt"]) ?></span>
													</td>
													<td class="text-center"><span
																class="badge badge-lg badge badge-light-primary"><?= $announcement["title"] ?></span>
													</td>


													<td class="text-end">
														<a href="javascript:void(0)"
														   data-id="<?= $announcement["announcementId"] ?>"
														   class="viewAnnouncement btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
															<span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<rect opacity="0.5" x="18"
																							  y="13" width="13"
																							  height="2" rx="1"
																							  transform="rotate(-180 18 13)"
																							  fill="black"/>
																						<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
																							  fill="black"/>
																					</svg>
																				</span>
															<!--end::Svg Icon-->
														</a>
													</td>
												</tr>
												<?php
											}
											?>
											</tbody>
											<!--end::Table body-->
										</table>
									</div>
									<!--end::Table-->
								</div>
								<!--end::Tap pane-->
								<!--begin::Tap pane-->
								<div class="tab-pane fade" id="kt_table_widget_5_tab_2">
									<!--begin::Table container-->
									<div class="table-responsive">
										<!--begin::Table-->
										<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
											<tr class="border-0">
												<th class="p-0 w-50px"></th>
												<th class="p-0 min-w-150px"></th>
												<th class="p-0 min-w-140px"></th>
												<th class="p-0 min-w-110px"></th>
												<th class="p-0 min-w-50px"></th>
											</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
											<tr>
												<td>
													<div class="symbol symbol-45px me-2">
																				<span class="symbol-label">
																					<img src="/metronic8/demo8/assets/media/svg/brand-logos/plurk.svg"
																						 class="h-50 align-self-center"
																						 alt=""/>
																				</span>
													</div>
												</td>
												<td>
													<a href="javascript:void(0)"
													   class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Brad
														Simmons</a>
													<span class="text-muted fw-bold d-block">Movie Creator</span>
												</td>
												<td class="text-end text-muted fw-bold">React, HTML</td>
												<td class="text-end">
													<span class="badge badge-light-success">Approved</span>
												</td>
												<td class="text-end">
													<a href="javascript:void(0)"
													   class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<rect opacity="0.5" x="18"
																							  y="13" width="13"
																							  height="2" rx="1"
																							  transform="rotate(-180 18 13)"
																							  fill="black"/>
																						<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
																							  fill="black"/>
																					</svg>
																				</span>
														<!--end::Svg Icon-->
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<div class="symbol symbol-45px me-2">
																				<span class="symbol-label">
																					<img src="/metronic8/demo8/assets/media/svg/brand-logos/telegram.svg"
																						 class="h-50 align-self-center"
																						 alt=""/>
																				</span>
													</div>
												</td>
												<td>
													<a href="javascript:void(0)"
													   class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Popular
														Authors</a>
													<span class="text-muted fw-bold d-block">Most Successful</span>
												</td>
												<td class="text-end text-muted fw-bold">Python, MySQL</td>
												<td class="text-end">
													<span class="badge badge-light-warning">In Progress</span>
												</td>
												<td class="text-end">
													<a href="javascript:void(0)"
													   class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<rect opacity="0.5" x="18"
																							  y="13" width="13"
																							  height="2" rx="1"
																							  transform="rotate(-180 18 13)"
																							  fill="black"/>
																						<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
																							  fill="black"/>
																					</svg>
																				</span>
														<!--end::Svg Icon-->
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<div class="symbol symbol-45px me-2">
																				<span class="symbol-label">
																					<img src="/metronic8/demo8/assets/media/svg/brand-logos/bebo.svg"
																						 class="h-50 align-self-center"
																						 alt=""/>
																				</span>
													</div>
												</td>
												<td>
													<a href="javascript:void(0)"
													   class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Active
														Customers</a>
													<span class="text-muted fw-bold d-block">Movie Creator</span>
												</td>
												<td class="text-end text-muted fw-bold">AngularJS, C#</td>
												<td class="text-end">
													<span class="badge badge-light-danger">Rejected</span>
												</td>
												<td class="text-end">
													<a href="javascript:void(0)"
													   class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<rect opacity="0.5" x="18"
																							  y="13" width="13"
																							  height="2" rx="1"
																							  transform="rotate(-180 18 13)"
																							  fill="black"/>
																						<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
																							  fill="black"/>
																					</svg>
																				</span>
														<!--end::Svg Icon-->
													</a>
												</td>
											</tr>
											</tbody>
											<!--end::Table body-->
										</table>
									</div>
									<!--end::Table-->
								</div>
								<!--end::Tap pane-->
								<!--begin::Tap pane-->
								<div class="tab-pane fade" id="kt_table_widget_5_tab_3">
									<!--begin::Table container-->
									<div class="table-responsive">
										<!--begin::Table-->
										<table class="table table-row-dashed table-row-gray-200 align-middle gs-0 gy-4">
											<!--begin::Table head-->
											<thead>
											<tr class="border-0">
												<th class="p-0 w-50px"></th>
												<th class="p-0 min-w-150px"></th>
												<th class="p-0 min-w-140px"></th>
												<th class="p-0 min-w-110px"></th>
												<th class="p-0 min-w-50px"></th>
											</tr>
											</thead>
											<!--end::Table head-->
											<!--begin::Table body-->
											<tbody>
											<tr>
												<td>
													<div class="symbol symbol-45px me-2">
																				<span class="symbol-label">
																					<img src="/metronic8/demo8/assets/media/svg/brand-logos/kickstarter.svg"
																						 class="h-50 align-self-center"
																						 alt=""/>
																				</span>
													</div>
												</td>
												<td>
													<a href="javascript:void(0)"
													   class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Bestseller
														Theme</a>
													<span class="text-muted fw-bold d-block">Best Customers</span>
												</td>
												<td class="text-end text-muted fw-bold">ReactJS, Ruby</td>
												<td class="text-end">
													<span class="badge badge-light-warning">In Progress</span>
												</td>
												<td class="text-end">
													<a href="javascript:void(0)"
													   class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<rect opacity="0.5" x="18"
																							  y="13" width="13"
																							  height="2" rx="1"
																							  transform="rotate(-180 18 13)"
																							  fill="black"/>
																						<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
																							  fill="black"/>
																					</svg>
																				</span>
														<!--end::Svg Icon-->
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<div class="symbol symbol-45px me-2">
																				<span class="symbol-label">
																					<img src="/metronic8/demo8/assets/media/svg/brand-logos/bebo.svg"
																						 class="h-50 align-self-center"
																						 alt=""/>
																				</span>
													</div>
												</td>
												<td>
													<a href="javascript:void(0)"
													   class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Active
														Customers</a>
													<span class="text-muted fw-bold d-block">Movie Creator</span>
												</td>
												<td class="text-end text-muted fw-bold">AngularJS, C#</td>
												<td class="text-end">
													<span class="badge badge-light-danger">Rejected</span>
												</td>
												<td class="text-end">
													<a href="javascript:void(0)"
													   class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<rect opacity="0.5" x="18"
																							  y="13" width="13"
																							  height="2" rx="1"
																							  transform="rotate(-180 18 13)"
																							  fill="black"/>
																						<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
																							  fill="black"/>
																					</svg>
																				</span>
														<!--end::Svg Icon-->
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<div class="symbol symbol-45px me-2">
																				<span class="symbol-label">
																					<img src="/metronic8/demo8/assets/media/svg/brand-logos/vimeo.svg"
																						 class="h-50 align-self-center"
																						 alt=""/>
																				</span>
													</div>
												</td>
												<td>
													<a href="javascript:void(0)"
													   class="text-dark fw-bolder text-hover-primary mb-1 fs-6">New
														Users</a>
													<span class="text-muted fw-bold d-block">Awesome Users</span>
												</td>
												<td class="text-end text-muted fw-bold">Laravel,Metronic</td>
												<td class="text-end">
													<span class="badge badge-light-primary">Success</span>
												</td>
												<td class="text-end">
													<a href="javascript:void(0)"
													   class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<rect opacity="0.5" x="18"
																							  y="13" width="13"
																							  height="2" rx="1"
																							  transform="rotate(-180 18 13)"
																							  fill="black"/>
																						<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
																							  fill="black"/>
																					</svg>
																				</span>
														<!--end::Svg Icon-->
													</a>
												</td>
											</tr>
											<tr>
												<td>
													<div class="symbol symbol-45px me-2">
																				<span class="symbol-label">
																					<img src="/metronic8/demo8/assets/media/svg/brand-logos/telegram.svg"
																						 class="h-50 align-self-center"
																						 alt=""/>
																				</span>
													</div>
												</td>
												<td>
													<a href="javascript:void(0)"
													   class="text-dark fw-bolder text-hover-primary mb-1 fs-6">Popular
														Authors</a>
													<span class="text-muted fw-bold d-block">Most Successful</span>
												</td>
												<td class="text-end text-muted fw-bold">Python, MySQL</td>
												<td class="text-end">
													<span class="badge badge-light-warning">In Progress</span>
												</td>
												<td class="text-end">
													<a href="javascript:void(0)"
													   class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
														<span class="svg-icon svg-icon-2">
																					<svg xmlns="http://www.w3.org/2000/svg"
																						 width="24" height="24"
																						 viewBox="0 0 24 24"
																						 fill="none">
																						<rect opacity="0.5" x="18"
																							  y="13" width="13"
																							  height="2" rx="1"
																							  transform="rotate(-180 18 13)"
																							  fill="black"/>
																						<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
																							  fill="black"/>
																					</svg>
																				</span>
														<!--end::Svg Icon-->
													</a>
												</td>
											</tr>
											</tbody>
											<!--end::Table body-->
										</table>
									</div>
									<!--end::Table-->
								</div>
								<!--end::Tap pane-->
							</div>
						</div>
						<!--end::Body-->
					</div>
				</div>
				<!--end::Col-->
			</div>
			<!--end::Row-->
			<!--begin::Calendar Widget 1-->
			<div class="card">
				<!--begin::Card header-->
				<div class="card-header">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bolder text-dark">My Calendar</span>
						<span class="text-muted mt-1 fw-bold fs-7">Preview monthly events</span>
					</h3>
					<div class="card-toolbar">
						<a href="../../demo1/dist/apps/calendar.html" class="btn btn-primary">Manage
							Calendar</a>
					</div>
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body">
					<!--begin::Calendar-->
					<div id="kt_calendar_widget_1"></div>
					<!--end::Calendar-->
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Calendar Widget 1-->
			<!--begin::Modals-->
			<div class="modal fade" id="viewAnnouncement" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header pb-0 border-0 justify-content-end">
							<!--begin::Close-->
							<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
								<span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									 fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
										  transform="rotate(-45 6 17.3137)" fill="black"/>
									<rect x="7.41422" y="6" width="16" height="2" rx="1"
										  transform="rotate(45 7.41422 6)" fill="black"/>
								</svg>
							</span>
								<!--end::Svg Icon-->
							</div>
							<!--end::Close-->
						</div>
						<!--begin::Modal header-->
						<!--begin::Modal body-->
						<div id="announcementDetails" class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
							<!--begin::Heading-->
							<div class="text-center mb-13">
								<!--begin::Title-->
								<h1 class="mb-3" id="title">Duyuru</h1>
								<!--end::Title-->
								<div class="separator d-flex flex-center mb-8">

								</div>

							</div>

							<!--begin::Textarea-->
							<p class="mb-10 fw-bold fs-2" id="explanation">Bu bir örnek duyuru içeriğidir. Bu bir örnek duyuru
								içeriğidir. Bu bir örnek duyuru içeriğidir. Bu bir örnek duyuru içeriğidir. Bu bir örnek duyuru
								içeriğidir. </p>
							<!--end::Textarea-->
							<div class="separator d-flex flex-center mb-8">

							</div>
							<!--begin::Users-->
							<div class="mb-10">
								<!--begin::Heading-->

								<div class="fs-6 fw-bold mb-2">Yayımlayan</div>


								<!--end::Heading-->
								<!--begin::List-->
								<div class="mh-300px scroll-y me-n7 pe-7">
									<!--begin::User-->
									<div class="d-flex flex-stack py-4 border-bottom border-gray-300 border-bottom-dashed">
										<!--begin::Details-->
										<div class="d-flex align-items-center">
											<!--begin::Avatar-->
											<div class="symbol symbol-35px symbol-circle" id="showImage">

											</div>
											<!--end::Avatar-->
											<!--begin::Details-->
											<div class="ms-5">
												<a href="javascript:void(0)" id="name"
												   class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2"></a>
												<div class="fw-bold text-muted" id="email"></div>
											</div>
											<!--end::Details-->
										</div>
										<!--end::Details-->

									</div>
									<!--end::User-->

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end::Modals-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
