<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<?= $CI->loadLayout('breadcrumb') ?>
			<!--end::Page title-->
			<!--begin::Actions-->

			<!--end::Primary button-->
			<?php
			if (isCan('admin')) {
				?>
				<!--begin::Primary button-->
				<a href="<?= base_url('customers') ?>" class="btn btn-sm btn-success">Yeni Müşteri</a>
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

			<div class="mx-auto col-xl-4">
				<!--begin::Statistics Widget 5-->
				<a href="<?= base_url("customers") ?>" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
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
						<div class="text-white fw-bolder fs-2 mb-2 mt-5">Müşteriler</div>
						<div class="fw-bold text-white">Devam Eden <b><?= $statistics['ongoingSales'] ?></b> Süreç
						</div>
					</div>
					<!--end::Body-->
				</a>
				<!--end::Statistics Widget 5-->
			</div>


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
							<!--begin::Menu 1-->
							<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
								<!--begin::Content-->
								<div class="px-7 py-5" data-kt-user-table-filter="form">

								</div>
								<!--end::Content-->
							</div>
					
						</div>

					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body py-4">
					<!--begin::Table-->
					<table class="table align-middle table-row-dashed fs-6 gy-5" id="customers-table">
						<!--begin::Table head-->
						<thead>
						<!--begin::Table row-->
						<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
							<th class="text-start w-50px pe-2">
								#
							</th>
							<th class="min-w-125px">Müşteri</th>
							<th class="min-w-125px">İl / İlçe</th>
							<th class="min-w-125px">Telefon Numarası</th>
							<th class="min-w-125px">İş Yapılma Tarihi</th>
							<th class="text- min-w-100px">İşlem</th>
						</tr>
						<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody class="text-gray-600 fw-bold">
						<?php
						foreach ($customers as $customer) {

							?>

							<tr class="">
								<td><?php echo $customer['customerId'] ?></td>
								<td><?php echo $customer['name'] ?></td>
								<td><?= getDistrict($customer['fkDistrict']) ?>/<?= getCity($customer['fkCity']) ?></td>
								<td><?php echo $customer['phone'] ?></td>
								<td><?php echo localizeDate("d M Y", $customer['workedAt']) ?></td>
								<td><?php echo $customer['customerId'] ?></td>
							</tr>
							<?php
						}
						?>

						<tr>
							<td>a</td>
							<td>b</td>
							<td>c</td>
							<td>d</td>
							<td>e</td>
							<td>f</td>
						</tr>

						</tbody>
					</table>
				</div>
			</div>
			<?php

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
															if (isCanOr("admin")) {
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
													<div class="col-md-6 col-sm-12 fv-row">
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
													<div class="col-md-6 col-sm-12 fv-row">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">Referans/Kaynak</label>
														<!--end::Label-->
														<!--begin::Input-->
														<select name="fkSource" id="selectSource"
																class="form-control-solid form-control">
															<option value="">Seçim Yok</option>
															<?php
															foreach ($customerSources as $customerSource) {
																?>
																<option value="<?= $customerSource['customerSourceId'] ?>"><?= $customerSource['title'] ?></option>
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
													<div class="col-md-6 col-sm-12 fv-row">
														<!--begin::Label-->
														<label class="fw-bold fs-6 mb-2">Sektör</label>
														<!--end::Label-->
														<!--begin::Input-->
														<select name="fkSector" id="selectSector"
																class="form-control-solid form-control">
															<option value="">Seçim Yok</option>
															<?php
															foreach ($sectors as $sector) {
																?>
																<option value="<?= $sector['sectorId'] ?>"><?= $sector['title'] ?></option>
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
			?>
			<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addCustomerGroupModal"
				 tabindex="-1"
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

			?>


		</div>
	</div>
</div>
</div>
