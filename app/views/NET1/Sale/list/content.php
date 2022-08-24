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

				<!--begin::Primary button-->
				<a href="<?= base_url("sales/create") ?>" class="btn btn-sm btn-primary">Yeni Oluştur</a>
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
		<!--begin::Container-->
		<!--begin::Container-->
		<div id="kt_content_container" class="container-xxl">
			<!--begin::Card-->
			<div class="card">
				<!--begin::Card header-->
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
															  fill="currentColor"/>
														<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
															  fill="currentColor"/>
													</svg>
												</span>
							<!--end::Svg Icon-->
							<input type="text" data-table-action="search"
								   class="form-control form-control-solid w-250px ps-14" placeholder="Müşteri Ara"/>
						</div>
						<!--end::Search-->
					</div>
					<!--begin::Card title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<!--begin::Toolbar-->
						<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
							<!--begin::Filter-->
							<button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
									data-kt-menu-placement="bottom-end">
								<!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
								<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														 viewBox="0 0 24 24" fill="none">
														<path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
															  fill="currentColor"/>
													</svg>
												</span>
								<!--end::Svg Icon-->Filtrele
							</button>
							<!--begin::Menu 1-->
							<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
								<!--begin::Header-->
								<div class="px-7 py-5">
									<div class="fs-5 text-dark fw-bolder">Müşterileri Filtrele</div>
								</div>
								<!--end::Header-->
								<!--begin::Separator-->
								<div class="separator border-gray-200"></div>
								<!--end::Separator-->
								<!--begin::Content-->
								<div class="px-7 py-5" data-kt-user-table-filter="form">
									<!--begin::Input group-->
									<div class="mb-10">
										<label class="form-label fs-6 fw-bold">Müşteri Grubu:</label>
										<select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
												data-placeholder="Seçim Yapın" data-allow-clear="true"
												data-kt-user-table-filter="role" id="filterCustomerGroup"
												data-hide-search="true">
											<option value=""></option>
											<?php
											foreach ($customerGroups as $customerGroup) {
												?>
												<option value="<?= $customerGroup["customerGroupId"] ?>"><?= $customerGroup["title"] ?></option>
												<?php
											}
											?>
										</select>
									</div>
									<!--end::Input group-->

									<!--begin::Actions-->
									<div class="d-flex justify-content-end">
										<button type="reset"
												class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
												data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Kapat
										</button>
										<button type="submit" class="btn btn-primary fw-bold px-6"
												data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Filtrele
										</button>
									</div>
									<!--end::Actions-->
								</div>
								<!--end::Content-->
							</div>
							<!--end::Menu 1-->
							<!--end::Filter-->

							<!--begin::Add user-->
							<?php

								?>
								<a href="<?= base_url("sales/create") ?>">
									<button type="button" class="btn btn-primary">
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
										<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
														 viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2"
															  rx="1" transform="rotate(-90 11.364 20.364)"
															  fill="currentColor"/>
														<rect x="4.36396" y="11.364" width="16" height="2" rx="1"
															  fill="currentColor"/>
													</svg>
												</span>
										<!--end::Svg Icon-->Yeni Oluştur
									</button>
								</a>
								<?php

							?>
							<!--end::Add user-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Group actions-->
						<div class="d-flex justify-content-end align-items-center d-none"
							 data-kt-user-table-toolbar="selected">
							<div class="fw-bolder me-5">
								<span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
							</div>
							<button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">
								Delete Selected
							</button>
						</div>
						<!--end::Group actions-->
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body py-4">
					<!--begin::Table-->
					<table class="table align-middle table-row-dashed fs-6 gy-5" id="sales-table">
						<!--begin::Table head-->
						<thead>
						<!--begin::Table row-->
						<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
							<th class="text-start w-50px pe-2">
								#
							</th>
							<th class="min-w-125px">Müşteri</th>
							<th class="min-w-125px">Fatura Tarihi</th>
							<th class="min-w-125px">Bakiye</th>
							<th class="min-w-125px">Durum</th>
							<th class="text- min-w-100px">İşlem</th>
						</tr>
						<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody class="text-gray-600 fw-bold">


						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>

