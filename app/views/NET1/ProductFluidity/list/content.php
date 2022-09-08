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
				<a href="javascript:void(0)" class="btn btn-sm btn-primary" data-bs-toggle="modal"
				   data-bs-target="#kt_modal_create_app">Yeni Oluştur</a>
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
							<input type="text"
								   class="np-search-table form-control form-control-solid w-250px ps-14" placeholder="Tabloda Ara"/>
						</div>
						<!--end::Search-->
					</div>
					<!--begin::Card title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<!--begin::Toolbar-->
						<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">


							<!--begin::Add user-->
							<button type="button" class="btn btn-primary np-add">
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
							<!--end::Add user-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Modal - Add task-->
						<div class="modal fade" id="primaryModal" tabindex="-1" aria-hidden="true">
							<!--begin::Modal dialog-->
							<div class="modal-dialog modal-dialog-centered mw-650px">
								<!--begin::Modal content-->
								<div class="modal-content">
									<!--begin::Modal header-->
									<div class="modal-header" id="kt_modal_add_user_header">
										<!--begin::Modal title-->
										<h2 class="fw-bolder modal-title">Yeni Oluştur</h2>
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
										<form id="primaryForm" enctype="multipart/form-data" class="form" action="#">
											<input type="hidden" name="action" value="">
											<input type="hidden" name="id" value="">
											<!--begin::Scroll-->
											<div class="d-flex flex-column scroll-y me-n7 pe-7"
												 id="kt_modal_add_user_scroll" data-kt-scroll="true"
												 data-kt-scroll-activate="{default: false, lg: true}"
												 data-kt-scroll-max-height="auto"
												 data-kt-scroll-dependencies="#kt_modal_add_user_header"
												 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
												 data-kt-scroll-offset="300px">
												<div class="row">
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">Başlık</label>
														<!--end::Label-->
														<!--begin::Input-->
														<div class="position-relative mb-3">
															<input class="form-control form-control-lg form-control-solid"
																   type="text" name="title">
														</div>
														<!--end::Input-->
													</div>
												</div>
											</div>
											<!--end::Scroll-->
											<!--begin::Actions-->
											<div class="text-center pt-15">
												<button type="reset" class="btn btn-light me-3"
														data-bs-dismiss="modal">Kapat
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
						<!--end::Modal - Add task-->
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body py-4">
					<!--begin::Table-->
					<table class="table align-middle table-row-dashed fs-6 gy-5 np-datatable">
						<!--begin::Table head-->
						<thead>
						<!--begin::Table row-->
						<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
							<th class="text-center w-50px pe-2">
								#
							</th>
							<th class="min-w-125px">Başlık</th>
							<th class="min-w-125px">Ürün Sayısı</th>
							<th class="min-w-100px">İşlem</th>
						</tr>
						<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody class="text-gray-600 fw-bold">
						<?php
						$counter = 0;
						foreach ($productFluidities as $item) {
							$counter++;
							?>
							<tr data-id="<?= $item["productFluidityId"] ?>">
								<td><?= $counter; ?></td>
								<td><?= $item["title"] ?></td>
								<td><span class="badge badge-light-primary"><?=$item["countProduct"]?></span></td>
								<td>
									<a href="#" class="btn btn-light btn-active-light-primary btn-sm"
									   data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">İşlemler
										<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
										<span class="svg-icon svg-icon-5 m-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
																 height="24" viewBox="0 0 24 24" fill="none">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
																	  fill="currentColor"/>
															</svg>
														</span>
										<!--end::Svg Icon--></a>
									<!--begin::Menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
										 data-kt-menu="true">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="javascript:void(0)"
											   class="np-edit menu-link px-3">Düzenle</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="javascript:void(0)" class="np-delete menu-link px-3">Sil</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
								</td>
							</tr>
							<?php
						}
						?>

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
