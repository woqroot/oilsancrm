<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<?= $CI->loadLayout('breadcrumb') ?>
			<!--end::Page title-->
			<!--begin::Actions-->
			<div class="d-flex align-items-center gap-2 gap-lg-3">
				<!--begin::Primary button-->
				<a href="<?= base_url('sales/create') ?>" class="btn btn-sm btn-primary">Yeni Satış Kaydı</a>
				<!--end::Primary button-->
				<?php
				if (isCan('admin')) {
					?>
					<!--begin::Primary button-->
					<a href="<?= base_url('missions/add') ?>" class="btn btn-sm btn-success">Yeni Görev</a>
					<!--end::Primary button-->
					<?php
				}
				?>
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
				<div class="col-xl-4">
					<!--begin::Statistics Widget 5-->
					<a href="<?= base_url("missions") ?>" class="card bg-success hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
							<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														 viewBox="0 0 24 24" fill="none">
														<path opacity="0.3"
															  d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
															  fill="currentColor"></path>
														<path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
															  fill="currentColor"></path>
														<path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
															  fill="currentColor"></path>
													</svg>
												</span>
							<!--end::Svg Icon-->
							<div class="text-white fw-bolder fs-2 mb-2 mt-5">Görevler</div>
							<div class="fw-bold text-white">Bekleyen <b><?= $statistics['waitingMissions'] ?></b> Görev
							</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>
				<div class="col-xl-4">
					<!--begin::Statistics Widget 5-->
					<a href="<?= base_url("sales") ?>" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
							<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														 viewBox="0 0 24 24" fill="none">
														<path opacity="0.3"
															  d="M14 12V21H10V12C10 11.4 10.4 11 11 11H13C13.6 11 14 11.4 14 12ZM7 2H5C4.4 2 4 2.4 4 3V21H8V3C8 2.4 7.6 2 7 2Z"
															  fill="currentColor"></path>
														<path d="M21 20H20V16C20 15.4 19.6 15 19 15H17C16.4 15 16 15.4 16 16V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z"
															  fill="currentColor"></path>
													</svg>
												</span>
							<!--end::Svg Icon-->
							<div class="text-white fw-bolder fs-2 mb-2 mt-5">Satışlar</div>
							<div class="fw-bold text-white">Devam Eden <b><?= $statistics['ongoingSales'] ?></b> Süreç
							</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>
				<div class="col-xl-4">
					<!--begin::Statistics Widget 5-->
					<a href="<?= base_url("calendar") ?>" class="card bg-info hoverable card-xl-stretch mb-xl-8">
						<!--begin::Body-->
						<div class="card-body">
							<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
							<span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														 viewBox="0 0 24 24" fill="none">
														<path opacity="0.3"
															  d="M10.9607 12.9128H18.8607C19.4607 12.9128 19.9607 13.4128 19.8607 14.0128C19.2607 19.0128 14.4607 22.7128 9.26068 21.7128C5.66068 21.0128 2.86071 18.2128 2.16071 14.6128C1.16071 9.31284 4.96069 4.61281 9.86069 4.01281C10.4607 3.91281 10.9607 4.41281 10.9607 5.01281V12.9128Z"
															  fill="currentColor"></path>
														<path d="M12.9607 10.9128V3.01281C12.9607 2.41281 13.4607 1.91281 14.0607 2.01281C16.0607 2.21281 17.8607 3.11284 19.2607 4.61284C20.6607 6.01284 21.5607 7.91285 21.8607 9.81285C21.9607 10.4129 21.4607 10.9128 20.8607 10.9128H12.9607Z"
															  fill="currentColor"></path>
													</svg>
												</span>
							<!--end::Svg Icon-->
							<div class="text-white fw-bolder fs-2 mb-2 mt-5">Takvim</div>
							<div class="fw-bold d-flex align-items-center text-white">
								Bugün <?= $statistics['todayEvents'] ?> Etkinlik
							</div>
						</div>
						<!--end::Body-->
					</a>
					<!--end::Statistics Widget 5-->
				</div>
				<?php
				if (isCan('admin')) {
					?>
					<!--begin::Col-->
					<div class="col-xl-4">
						<!--begin::Mixed Widget 7-->
						<div class="card card-xl-stretch-50 mb-5 mb-xl-8">
							<!--begin::Body-->
							<div class="card-body d-flex flex-column p-0">
								<!--begin::Stats-->
								<div class="flex-grow-1 card-p pb-0">
									<div class="d-flex flex-stack flex-wrap">
										<div class="me-2">
											<a href="#" class="text-dark text-hover-primary fw-bolder fs-3">Generate
												Reports</a>
											<div class="text-muted fs-7 fw-bold">Finance and accounting reports</div>
										</div>
										<div class="fw-bolder fs-3 text-primary">$24,500</div>
									</div>
								</div>
								<!--end::Stats-->
								<!--begin::Chart-->
									<div id="currentSalesStatuses" class="" data-kt-chart-color="primary"
										 style="height: 300px"></div>
								<!--end::Chart-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Mixed Widget 7-->
						<!--begin::Mixed Widget 10-->
						<div class="card card-xl-stretch-50 mb-5 mb-xl-8">
							<!--begin::Body-->
							<div class="card-body p-0 d-flex justify-content-between flex-column overflow-hidden">
								<!--begin::Hidden-->
								<div class="d-flex flex-stack flex-wrap flex-grow-1 px-9 pb-3">
									<div class="me-2">
										<span class="fw-bolder text-gray-800 d-block fs-3">Satış Sonuçlanma Durumları</span>
										<span class="text-gray-400 fw-bold"><?=localizeDate("M Y",date("Y-m-d H:i:s",strtotime('-6 month')))?> - <?=localizeDate("M Y",date("Y-m-d H:i:s"))?></span>
									</div>
									<div class="fw-bolder fs-3 text-primary totalResultedRegs"></div>
								</div>
								<!--end::Hidden-->
								<!--begin::Chart-->
								<div class="customChart" data-kt-color="primary" style="height: 175px"></div>
								<!--end::Chart-->
							</div>
						</div>
						<!--end::Mixed Widget 10-->
					</div>
					<!--end::Col-->
					<?php
				} else {
					?>
					<div class="col-xl-4">
						<!--begin::Mixed Widget 2-->
						<div class="card card-xl-stretch">
							<!--begin::Header-->
							<div class="card-header border-0 bg-primary py-5">
								<h3 class="card-title fw-bolder text-white">Aylık Hedef</h3>

							</div>
							<!--end::Header-->
							<!--begin::Body-->
							<div class="card-body p-0">

								<!--begin::Chart-->
								<div class="d-flex flex-center w-100">
									<div id="goalHedefChart" class="" data-kt-chart-color="primary"
										 style="height: 300px"></div>
								</div>
								<!--end::Chart-->
								<!--begin::Content-->
								<div class="text-center w-100 position-relative z-index-1" style="margin-top: -130px">
									<!--begin::Text-->
									<p class="fw-bold fs-4 text-gray-400 mt-8">
										Güncel Hedef
									</p>
									<!--end::Text-->
									<!--begin::Action-->
									<div class="mb-9 mb-xxl-1">
										<a href='javascript:void(0)' class="btn btn-success fw-bold"
										   id="currentGoal"></a>
									</div>
									<!--ed::Action-->
								</div>
								<!--end::Content-->

							</div>
							<!--end::Body-->
						</div>
						<!--end::Mixed Widget 2-->
					</div>
					<?php
				}
				?>
				<!--begin::Col-->

				<!--end::Col-->
				<!--begin::Col-->
				<div class="col-xl-8 ">
					<div class="card card-xl-stretch mb-5 mb-xl-8">
						<!--begin::Header-->
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label fw-bolder fs-3 mb-1">Haber Akışı</span>
								<span class="text-muted mt-1 fw-bold fs-7">Son yayımlanan duyurular listelenmiştir.</span>
							</h3>

						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body py-3 overflow-scroll h-300px">
							<div class="tab-content">
								<!--begin::Tap pane-->
								<div class="tab-pane fade show active" id="kt_table_widget_5_tab_1">
									<?php
									if (count($announcements) == 0) {
										?>
										<div class="alert alert-warning">Duyuru içeriği bulunamadı.</div>
										<?php
									}
									?>
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
							<p class="mb-10 fw-bold fs-2" id="explanation">Bu bir örnek duyuru içeriğidir. Bu bir örnek
								duyuru
								içeriğidir. Bu bir örnek duyuru içeriğidir. Bu bir örnek duyuru içeriğidir. Bu bir örnek
								duyuru
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
