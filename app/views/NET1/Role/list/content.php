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
		<div id="kt_content_container" class="container-xxl">
			<!--begin::Row-->
			<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
				<!--begin::Add new card-->
				<div class="col-md-4">
					<!--begin::Card-->
					<div class="card h-md-100">
						<!--begin::Card body-->
						<div class="card-body d-flex flex-center">
							<!--begin::Button-->
							<button type="button" class="btn btn-clear d-flex flex-column flex-center"
									data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
								<!--begin::Illustration-->
								<img src="<?= public_url("assets/media/illustrations/sketchy-1/4.png") ?>" alt=""
									 class="mw-100 mh-150px mb-7"/>
								<!--end::Illustration-->
								<!--begin::Label-->
								<div class="fw-bolder fs-3 text-gray-600 text-hover-primary">Yeni Oluştur</div>
								<!--end::Label-->
							</button>
							<!--begin::Button-->
						</div>
						<!--begin::Card body-->
					</div>
					<!--begin::Card-->
				</div>
				<!--begin::Add new card-->
				<?php
				foreach ($roles as $role) {
					?>
					<!--begin::Col-->
					<div class="col-md-4">
						<!--begin::Card-->
						<div class="card card-flush h-md-100">
							<!--begin::Card header-->
							<div class="card-header">
								<!--begin::Card title-->
								<div class="card-title">
									<h2><?= $role["title"] ?></h2>
								</div>
								<?php
								if ($role["isEditable"] == 1) {
									?>
									<div class="card-toolbar">
										<a href="" data-id="<?= $role["roleId"] ?>"
										   class="deleteRole text-hover-danger">
											<i class="fs-4 fa fa-trash"></i>
										</a>
									</div>
									<?php
								}
								?>
								<!--end::Card title-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-1">
								<!--begin::Users-->
								<div class="fw-bolder text-gray-600 mb-5">Bu role ait izin
									sayısı: <?= count($role["permissions"]["all"]) ?></div>
								<!--end::Users-->
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
							<div class="card-footer flex-wrap pt-0">
								<a href="<?= base_url("roles/" . $role["roleId"]) ?>"
								   class="btn btn-light btn-active-primary my-1 me-2">Görüntüle</a>
								<button type="button" class="btn btn-light btn-active-light-primary my-1 editButton"
										data-id="<?= $role["roleId"] ?>">İzinleri Yönet
								</button>
							</div>
							<!--end::Card footer-->
						</div>
						<!--end::Card-->
					</div>
					<!--end::Col-->
					<?php
				}
				?>
				<!--end::Col-->

			</div>
			<!--end::Row-->
			<!--begin::Modals-->
			<!--begin::Modal - Add role-->
			<div class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header">
							<!--begin::Modal title-->
							<h2 class="fw-bolder">Yeni Rol Oluştur</h2>
							<!--end::Modal title-->
							<!--begin::Close-->
							<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
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
							<form id="kt_modal_add_role_form" class="form" action="#">

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
													   id="kt_roles_select_all"/>
												<span class="form-check-label" for="kt_roles_select_all">Tümü</span>
											</label>
										</div>
										<!--end::Label-->
										<div class="row mt-2">
											<?php
											foreach ($permissions as $permission) {
												?>
												<div class="col-3 border-right-1 border-gray-300 border-end-dashed">
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
									<button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">
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
			<!--end::Modal - Add role-->
			<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered  modal-xl">
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

			<!--end::Modals-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
