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

				<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1"><?= end($_breadcrumb["map"]) ?>
					<!--begin::Separator-->
					<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
					<!--end::Separator-->
					<!--begin::Description-->
					<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
						<!--begin::Item-->
						<li class="breadcrumb-item text-muted">
							<a href="<?= base_url() ?>"
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
		<div id="kt_content_container" class="container-xxl">
			<!--begin::Row-->
			<div id="kt_content_container" class="container-xxl">
				<!--begin::Layout-->
				<div class="d-flex flex-column flex-lg-row">
					<!--begin::Sidebar-->
					<div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
						<!--begin::Card-->
						<div class="card card-flush">
							<!--begin::Card header-->
							<div class="card-header">
								<!--begin::Card title-->
								<div class="card-title">
									<h2 class="mb-0"><?= $role["title"] ?></h2>
								</div>
								<!--end::Card title-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-0">
								<!--begin::Permissions-->
								<div class="d-flex flex-column text-gray-600">
									<?php
									foreach ($role["permissions"]["preview"] as $permission) {
										?>
										<div class="d-flex align-items-center py-2">
											<span class="bullet bg-primary me-3"></span><?= $permission["title"] ?>
										</div>
										<?php
									}
									$countMore = count($role["permissions"]["all"]) - count($role["permissions"]["preview"]);
									if ($countMore) {
										?>
										<div class='d-flex align-items-center py-2'>
											<span class='bullet bg-primary me-3'></span>
											<em><?= $countMore ?> daha...</em>
										</div>
										<?php
									}
									?>
								</div>
								<!--end::Permissions-->
							</div>
							<!--end::Card body-->
							<!--begin::Card footer-->
							<div class="card-footer pt-0">
								<button type="button" data-id="<?= $role["roleId"] ?>"
										class="btn btn-light btn-active-primary editButton">Düzenle
								</button>
							</div>
							<!--end::Card footer-->
						</div>
						<!--end::Card-->
						<!--begin::Modal-->
						<!--end::Modal-->
					</div>
					<!--end::Sidebar-->
					<!--begin::Content-->
					<div class="flex-lg-row-fluid ms-lg-10">
						<!--begin::Card-->
						<div class="card card-flush mb-6 mb-xl-9">
							<!--begin::Card header-->
							<div class="card-header pt-5">
								<!--begin::Card title-->
								<div class="card-title">
									<h2 class="d-flex align-items-center">Tanımlı Kullanıcılar
										<span class="text-gray-600 fs-6 ms-1">(<?= count($users) ?>)</span></h2>
								</div>
								<!--end::Card title-->
								<!--begin::Card toolbar-->
								<div class="card-toolbar">
									<!--begin::Search-->
									<div class="d-flex align-items-center position-relative my-1"
										 data-kt-view-roles-table-toolbar="base">
										<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
										<span class="svg-icon svg-icon-1 position-absolute ms-6">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
																 height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="17.0365" y="15.1223"
																	  width="8.15546" height="2" rx="1"
																	  transform="rotate(45 17.0365 15.1223)"
																	  fill="currentColor"/>
																<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
																	  fill="currentColor"/>
															</svg>
														</span>
										<!--end::Svg Icon-->
										<input type="text" data-kt-roles-table-filter="search"
											   class="form-control form-control-solid w-250px ps-15"
											   placeholder="Kullanıcı Ara"/>
									</div>
									<!--end::Search-->
									<!--begin::Group actions-->
									<div class="d-flex justify-content-end align-items-center d-none"
										 data-kt-view-roles-table-toolbar="selected">
										<div class="fw-bolder me-5">
											<span class="me-2" data-kt-view-roles-table-select="selected_count"></span>Selected
										</div>
										<button type="button" class="btn btn-danger"
												data-kt-view-roles-table-select="delete_selected">Delete Selected
										</button>
									</div>
									<!--end::Group actions-->
								</div>
								<!--end::Card toolbar-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-0">
								<!--begin::Table-->
								<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0"
									   id="kt_roles_view_table">

									<!--end::Table body-->
									<thead>
									<!--begin::Table row-->
									<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
										<th class="text-center w-50px pe-2">
											#
										</th>
										<th class="min-w-125px">Kullanıcı</th>
										<th>Durum</th>
										<th class="min-w-125px">Telefon Numarası</th>
										<th class="min-w-125px">Son Görülme</th>
									</tr>
									<!--end::Table row-->
									</thead>
									<!--end::Table head-->
									<!--begin::Table body-->
									<tbody class="text-gray-600 fw-bold">
									<?php
									foreach ($users as $user) {
										$counter = 0;
										?>
										<!--begin::Table row-->
										<tr>
											<td class="text-center ">
												<?= ++$counter; ?>
											</td>
											<td class="d-flex align-items-center">
												<!--begin:: Avatar -->
												<div class="position-relative me-3">
													<div class="symbol w-50px symbol-circle symbol-50px overflow-hidde">
														<a href="javascript:void(0)">
															<?= getAvatar($user["image"]) ?>
														</a>
													</div>
													<?= isOnline($user["lastSeenAt"], true) ?>
												</div>
												<!--end::Avatar-->
												<!--begin::User details-->
												<div class="d-flex flex-column">
													<a href="javascript:void(0)"
													   class="text-gray-800 text-hover-primary mb-1"><?= $user["firstName"] . " " . $user["lastName"] ?></a>
													<span><?= $user["email"] ?></span>
												</div>
												<!--begin::User details-->
											</td>
											<!--end::User=-->
											<td><?= isOnline($user["lastSeenAt"]) ? "Çevrimiçi" : "Çevrimdışı"; ?></td>
											<td><?= private_str(phoneMask($user["phone"]), 7, 3) ?></td>
											<td>
												<div class="badge badge-light fw-bolder"><?= convertDateTime($user["lastSeenAt"]) ?></div>
											</td>
											<!--end::Action=-->
										</tr>
										<!--end::Table row-->
										<?php
									}
									?>

									</tbody>
								</table>
								<!--end::Table-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Layout-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Post-->
	</div>
	<!--end::Content-->
	<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-dialog-centered mw-750px">
			<!--begin::Modal content-->
			<div class="modal-content">
				<!--begin::Modal header-->
				<div class="modal-header">
					<!--begin::Modal title-->
					<h2 class="fw-bolder">Rol Bilgilerini Düzenle</h2>
					<!--end::Modal title-->
					<!--begin::Close-->
					<div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
															 viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
																  rx="1" transform="rotate(-45 6 17.3137)"
																  fill="currentColor"/>
															<rect x="7.41422" y="6" width="16" height="2" rx="1"
																  transform="rotate(45 7.41422 6)" fill="currentColor"/>
														</svg>
													</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<!--end::Modal header-->
				<!--begin::Modal body-->
				<div class="modal-body scroll-y mx-lg-5 my-7">
					<!--begin::Form-->
					<form id="editForm" class="form" action="#">
						<input type="hidden" name="roleId">
						<!--begin::Scroll-->
						<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll"
							 data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
							 data-kt-scroll-max-height="auto"
							 data-kt-scroll-dependencies="#kt_modal_add_role_header"
							 data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
							<!--begin::Input group-->
							<div class="fv-row mb-5">
								<!--begin::Label-->
								<label class="fs-5 fw-bolder form-label mb-2">
									<span class="required">Rol Adı</span>
								</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input required class="form-control form-control-solid" placeholder=""
									   name="title"/>
								<!--end::Input-->
							</div>
							<!--end::Input group-->

							<!--begin::Permissions-->
							<div class="fv-row">
								<!--begin::Label-->
								<div class="d-flex">
									<label class="fs-3 fw-bolder form-label mb-4">İzinler</label>

									<label class="ms-auto form-check form-check-sm form-check-custom form-check-solid me-9">
										<input class="form-check-input" type="checkbox"
											   id="edit_select_all"/>
										<span class="form-check-label" for="edit_select_all">Tümü</span>
									</label>
								</div>
								<!--end::Label-->
								<div class="row mt-2">
									<?php
									foreach ($permissions as $permission) {
										?>
										<div class="col-4 border-right-1 border-gray-300 border-end-dashed">
											<label class="mb-5 fw-bold form-label fs-5"><?= $permission["title"] ?></label>
											<div class="col-12">
												<div class="row">
													<?php
													foreach ($permission["permissions"] as $item) {
														?>
														<div class="mb-3">
															<label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																<input class="form-check-input" type="checkbox"
																	   value="1"
																	   name="permissions[<?= $item["permissionId"] ?>]"/>
																<span class="form-check-label"><?= $item["title"] ?></span>
															</label>
														</div>
														<?php
													}
													?>
												</div>
											</div>
										</div>
										<?php
									}
									?>
								</div>

							</div>
							<!--end::Permissions-->
						</div>
						<!--end::Scroll-->
						<!--begin::Actions-->
						<div class="text-center pt-15">
							<button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">
								Kapat
							</button>
							<button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
								<span class="indicator-label">Kaydet</span>
								<span class="indicator-progress">Lütfen Bekleyin...
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
</div>


