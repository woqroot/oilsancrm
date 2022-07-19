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
							if (isCan('add-expense')) {
								?>
								<a href="<?= base_url("expenses/create") ?>">
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
							}
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
					<table class="table align-middle table-row-dashed fs-6 gy-5" id="expenses-table">
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
<?php
if (isCanOr("add-customer")) {
	?>

	<div class="modal fade" id="kt_modal_add_user" data-bs-backdrop="static"
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
					<form id="addCustomerForm" enctype="multipart/form-data" class="form"
						  action="#">
						<input type="hidden" name="customerType" value="INDIVIDUAL">

						<input type="hidden" name="action" value="ADD">
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
										<label class="select-individual btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success active"
											   data-kt-button="true">
											<!--begin::Input-->
											<input class="btn-check" checked type="radio"
												   name="type"
												   value="INDIVIDUAL"/>
											<!--end::Input-->
											Bireysel
										</label>
										<!--end::Radio-->
										<!--begin::Radio-->
										<label class="select-corporate btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success "
											   data-kt-button="true">
											<!--begin::Input-->
											<input class="btn-check" type="radio" name="type"
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
													   class="form-control form-control-lg form-control-solid">
												<!--end::Input-->
											</div>
											<div class="col-md-6 col-sm-12 fv-row">
												<!--begin::Label-->
												<label class="fw-bold fs-6 mb-2 d-flex">Müşteri
													Grubu
													<?php
													if (isCanOr("manage-customer-groups")) {
														?>
														<a href="javascript:void(0)"
														   onclick="$('#addCustomerGroupModal').modal('show')"><span
																	class="ms-1 badge badge-light-primary">Yeni Ekle</span></a>
														<?php
													}
													?>
												</label>
												<!--end::Label-->
												<!--begin::Input-->
												<select type="text"
														name="fkCustomerGroup"
														class="form-control form-control-lg form-control-solid selectCustomerGroup">
													<option value="">Seçim Yok</option>
													<?php
													foreach ($customerGroups as $customerGroup) {
														?>
														<option value="<?= $customerGroup["customerGroupId"] ?>"><?= $customerGroup["title"] ?></option>
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
													   name="taxNumber"
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
														  class="resize-none form-control form-control-solid"></textarea>
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
														<option <?= $country["countryId"] == 1 ? 'selected' : ''; ?>
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
														<option value="<?= $city["cityId"] ?>"><?= $city["title"] ?></option>
														<?php
													}
													?>
												</select>
												<!--end::Input-->

											</div>

											<div class="col-md-6 col-sm-12 fv-row ">
												<!--begin::Label-->
												<label class="fw-bold fs-6 mb-2">İlçe</label>
												<!--end::Label-->
												<!--begin::Input-->
												<select name="fkDistrict" id=""
														class="form-control form-control-solid selectDistrict">
													<option value="">İlçe Seçimi</option>
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
														  class="form-control form-control-lg form-control-solid resize-none"></textarea>
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

	<?php
}
if (isCan("manage-customer-groups")) {
	?>
	<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addCustomerGroupModal" tabindex="-1"
		 aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-dialog-centered mw-650px">
			<!--begin::Modal content-->
			<div class="modal-content">
				<!--begin::Modal header-->
				<div class="modal-header" id="kt_modal_add_user_header">
					<!--begin::Modal title-->
					<h2 class="fw-bolder modal-title">Yeni Müşteri Grubu Oluştur</h2>
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
					<form id="addCustomerGroupForm" enctype="multipart/form-data" class="form" action="#">
						<input type="hidden" name="action" value="ADD">
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
	<?php
}

?>
