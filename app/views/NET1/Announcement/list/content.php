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
						<div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

							<!--begin::Add customer-->
							<button type="button" class="btn btn-primary" data-bs-toggle="modal"
									data-bs-target="#addModal">
								<!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
								<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg"
														 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
														 height="24px" viewBox="0 0 24 24" version="1.1">
														<rect fill="#ffffff" x="4" y="11" width="16" height="2" rx="1"/>
														<rect fill="#ffffff" opacity="0.5"
															  transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)"
															  x="4" y="11" width="16" height="2" rx="1"/>
													</svg>
												</span>
								<!--end::Svg Icon-->Yeni Oluştur
							</button>
							<!--end::Add customer-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Group actions-->
						<div class="d-flex justify-content-end align-items-center d-none"
							 data-kt-customer-table-toolbar="selected">
							<div class="fw-bolder me-5">
								<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
							</div>
							<button type="button" class="btn btn-danger"
									data-kt-customer-table-select="delete_selected">Delete Selected
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
					<!--begin::Table-->
					<table class="basic-datatable table align-middle table-row-dashed fs-6 gy-5">
						<!--begin::Table head-->
						<thead>
						<!--begin::Table row-->
						<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

							<th class="mw-75px">#</th>
							<th class="">Oluşturan</th>

							<th class="">Başlık</th>
							<th class="">Tarih</th>
							<th class="">İşlem</th>
						</tr>
						<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<tbody class="fw-bold text-gray-600">
						<?php
						$index = 1;
						foreach ($announcements as $announcement) {

							@$createdBy = getUser($announcement["createdBy"],"firstName,lastName,email");

							?>
							<tr data-id="<?= $announcement["announcementId"] ?>">
								<td><?= $index++; ?></td>
								<td class="d-flex align-items-center">
									<!--begin:: Avatar -->
									<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
										<?=getAvatar($createdBy["image"]) ?>
									</div>
									<!--end::Avatar-->
									<!--begin::User details-->
									<div class="d-flex flex-column">
										<a href="javascript:void(0)"
										   class="text-gray-800 text-hover-primary mb-1"><?= @$createdBy["firstName"] ?? "-" ?> <?= @$createdBy["lastName"] ?>
											
										</a>
										<span><?= @$createdBy["email"] ?></span>
									</div>
									<!--begin::User details-->
								</td>

								<td><?=$announcement["title"]?></td>
								<td><?=date("d-m-Y",strtotime($announcement["createdAt"]))?></td>
								<td>
									<a href="javascript:void(0)" class="editButton">
										<button class=" btn btn-light-primary btn-sm">Düzenle</button>
									</a>
									<a href="javascript:void(0)" class="deleteButton">
										<button class="btn btn-light-danger btn-sm">Sil</button>
									</a>
								</td>
							</tr>
							<?php
						}
						?>

						</tbody>

					</table>
					<!--end::Table-->
					<!--end::Table-->
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Card-->
			<!--begin::Modals-->
			<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-sm modal-dialog-centered mw-650px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Form-->
						<form enctype="multipart/form-data" class="form" action="" method="POST">
							<!--begin::Modal header-->
							<input type="hidden" name="action" value="ADD">
							<div class="modal-header" id="kt_modal_add_customer_header">
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
							<div class="modal-body py-10 px-lg-17">
								<!--begin::Scroll-->
								<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
									 data-kt-scroll-activate="{default: false, lg: true}"
									 data-kt-scroll-max-height="auto"
									 data-kt-scroll-dependencies="#kt_modal_add_customer_header"
									 data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
									 data-kt-scroll-offset="300px">

									<div class="row g-9 mb-7">
										<!--begin::Col-->
										<div class="col-md-12 fv-row">
											<!--begin::Label-->
											<label class="required fs-6 fw-bold mb-2">Duyuru Başlığı</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input required class="form-control form-control-solid" placeholder=""
												   name="title" value=""/>
											<!--end::Input-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-md-12 fv-row">
											<!--begin::Label-->
											<label class="required fs-6 fw-bold mb-2">Duyuru İçeriği</label>
											<!--end::Label-->
											<!--begin::Input-->
											<textarea required class="resize-none form-control form-control-solid" rows="5" placeholder=""
												   name="explanation" value=""></textarea>
											<!--end::Input-->
										</div>
										<!--end::Col-->

									</div>

								</div>
								<!--end::Scroll-->
							</div>
							<!--end::Modal body-->
							<!--begin::Modal footer-->
							<div class="modal-footer flex-center">
								<!--begin::Button-->

								<!--end::Button-->
								<!--begin::Button-->
								<button type="submit" id="edit_Organization_Button" class="btn btn-primary">
									<span class="indicator-label">Kaydet</span>
									<span class="indicator-progress">Lütfen bekleyin...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<button type="reset" data-bs-dismiss="modal" class="btn btn-white me-3">
									Kapat
								</button>
								<!--end::Button-->
							</div>
							<!--end::Modal footer-->
						</form>
						<!--end::Form-->
					</div>
				</div>
			</div>
			<!--begin::Modal - Customers - Add-->
			<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-sm modal-dialog-centered mw-450px">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Form-->
						<form enctype="multipart/form-data" class="form" action="" method="POST">
							<!--begin::Modal header-->
							<input type="hidden" name="action" value="EDIT">
							<input type="hidden" name="id" value="">
							<div class="modal-header" id="kt_modal_add_customer_header">
								<!--begin::Modal title-->
								<h2 class="fw-bolder">Ürün/Hizmet Bilgilerini Düzenle</h2>
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
							<div class="modal-body py-10 px-lg-17">
								<!--begin::Scroll-->
								<div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
									 data-kt-scroll-activate="{default: false, lg: true}"
									 data-kt-scroll-max-height="auto"
									 data-kt-scroll-dependencies="#kt_modal_add_customer_header"
									 data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
									 data-kt-scroll-offset="300px">

									<div class="row g-9 mb-7">
										<!--begin::Col-->
										<div class="col-md-12 fv-row">
											<!--begin::Label-->
											<label class="required fs-6 fw-bold mb-2">Duyuru Başlığı</label>
											<!--end::Label-->
											<!--begin::Input-->
											<input required class="form-control form-control-solid" placeholder=""
												   name="title" value=""/>
											<!--end::Input-->
										</div>
										<!--end::Col-->
										<!--begin::Col-->
										<div class="col-md-12 fv-row">
											<!--begin::Label-->
											<label class="required fs-6 fw-bold mb-2">Duyuru İçeriği</label>
											<!--end::Label-->
											<!--begin::Input-->
											<textarea required class="resize-none form-control form-control-solid" rows="5" placeholder=""
													  name="explanation" value=""></textarea>
											<!--end::Input-->
										</div>
										<!--end::Col-->

									</div>

								</div>
								<!--end::Scroll-->
							</div>
							<!--end::Modal body-->
							<!--begin::Modal footer-->
							<div class="modal-footer flex-center">
								<!--begin::Button-->

								<!--end::Button-->
								<!--begin::Button-->
								<button type="submit" id="edit_Organization_Button" class="btn btn-primary">
									<span class="indicator-label">Kaydet</span>
									<span class="indicator-progress">Lütfen bekleyin...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<button type="reset" data-bs-dismiss="modal" class="btn btn-white me-3">
									Kapat
								</button>
								<!--end::Button-->
							</div>
							<!--end::Modal footer-->
						</form>

						<!--end::Form-->
					</div>
				</div>
			</div>

			<!--end::Modals-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
<!--end::Content-->

