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
							<input type="text" data-table-action="search"
								   class="form-control form-control-solid w-250px ps-14" placeholder="Tabloda Ara"/>
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

						<!--begin::Modal - Add task-->
						<div class="modal fade" data-bs-backdrop="static" id="primaryModal" tabindex="-1"
							 aria-hidden="true">
							<!--begin::Modal dialog-->
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<!--begin::Modal content-->
								<div class="modal-content">
									<!--begin::Modal header-->
									<div class="modal-header" id="primaryModal_header">
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
											<input type="hidden" name="action" value="ADD">
											<input type="hidden" name="id" value="">
											<input type="hidden" name="productType" value="PRODUCT">
											<input type="hidden" name="stockTracking" value="PASSIVE">
											<input type="hidden" name="currencyID" value="">

											<!--begin::Scroll-->
											<div class="d-flex flex-column scroll-y me-n7 pe-7"
												 id="primaryModal_scroll" data-kt-scroll="true"
												 data-kt-scroll-activate="{default: false, lg: true}"
												 data-kt-scroll-max-height="auto"
												 data-kt-scroll-dependencies="#primaryModal_header"
												 data-kt-scroll-wrappers="#primaryModal_scroll"
												 data-kt-scroll-offset="300px">
												<div class="row">
													<div class="fv-row row">
														<div class="col-6 d-none">
															<!--begin::Option-->
															<input type="radio" class="btn-check" name="type"
																   value="PRODUCT"
																   id="selectTypePRODUCT"/>
															<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-5"
																   for="selectTypePRODUCT">
																<!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
																<span class="svg-icon svg-icon-4x me-4">
																	<i class="bi-stack bi fs-3x"></i>
																</span>
																<!--end::Svg Icon-->

																<span class="d-block fw-bold text-start">
																	<span class="text-dark fw-bolder d-block fs-3">Ürün</span>
																</span>
															</label>
															<!--end::Option-->
														</div>
														<div class="col-6 d-none">
															<!--begin::Option-->
															<input type="radio" class="btn-check" name="type"
																   value="SERVICE" id="selectTypeSERVICE"/>
															<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center"
																   for="selectTypeSERVICE">
																<!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
																<span class="svg-icon svg-icon-4x me-4">
																	<i class="bi-person-workspace bi fs-3x"></i>
																</span>
																<!--end::Svg Icon-->
																<span class="d-block fw-bold text-start">
																	<span class="text-dark fw-bolder d-block fs-3">Hizmet</span>
																</span>
															</label>
															<!--end::Option-->
														</div>
													</div>
													<div class="fv-row row mb-7">
														<!--begin::Input group-->
														<div class="col-md-6 col-sm-12 fv-row mb-7">
															<!--begin::Label-->
															<label class="fw-bold fs-6 required mb-2">Ürün Adı</label>
															<input type="text" required name="name"
																   class="form-control form-control-solid">
															<!--end::Label-->
														</div>
														<div class="col-md-6 col-sm-12 fv-row mb-7">
															<!--begin::Label-->
															<div class="d-flex">
																<label class="required fw-bold d-flex fs-6 mb-2">Ürün
																	Kodu </label>


															</div>
															<input type="text" name="productCode" required
																   class="form-control form-control-solid">
															<!--end::Label-->
														</div>
														<div class="col-md-4 col-sm-12 fv-row mb-7">
															<!--begin::Label-->
															<label class="fw-bold fs-6 mb-2">Ürün Tipi</label>
															<!--end::Label-->
															<!--begin::Input-->
															<select name="productTypeID" id=""
																	class="form-control form-control-solid select2Init">
																<?php
																foreach ($productTypes as $productType) {
																	?>
																	<option
																			value="<?= $productType["productTypeId"] ?>"><?= $productType["title"] ?></option>
																	<?php
																}
																?>
															</select>
															<!--end::Input-->
														</div>
														<div class="col-md-4 col-sm-12 fv-row mb-7">
															<!--begin::Label-->
															<label class="fw-bold fs-6 mb-2">Marka</label>
															<!--end::Label-->
															<!--begin::Input-->
															<select name="brandID" id=""
																	class="form-control form-control-solid select2Init">
																<?php
																foreach ($brands as $brand) {
																	?>
																	<option
																			value="<?= $brand["brandId"] ?>"><?= $brand["title"] ?></option>
																	<?php
																}
																?>
															</select>
															<!--end::Input-->
														</div>
														<div class="col-md-4 col-sm-12 fv-row mb-7">
															<!--begin::Label-->
															<label class="fw-bold fs-6 mb-2">Ambalaj Tipi</label>
															<!--end::Label-->
															<!--begin::Input-->
															<select name="productPackID" id=""
																	class="form-control form-control-solid select2Init">
																<?php
																foreach ($productPacks as $productPack) {
																	?>
																	<option
																			value="<?= $productPack["productPackId"] ?>"><?= $productPack["title"] ?></option>
																	<?php
																}
																?>
															</select>
															<!--end::Input-->
														</div>
														<div class="col-md-4 col-sm-12 fv-row mb-7">
															<!--begin::Label-->
															<label class="fw-bold fs-6 mb-2">Akışkanlık Derecesi</label>
															<!--end::Label-->
															<!--begin::Input-->
															<select name="productFluidityID" id=""
																	class="form-control form-control-solid select2Init">
																<?php
																foreach ($productFluidities as $productFluidity) {
																	?>
																	<option
																			value="<?= $productFluidity["productFluidityId"] ?>"><?= $productFluidity["title"] ?></option>
																	<?php
																}
																?>
															</select>
															<!--end::Input-->
														</div>
														<!--begin::Input group-->
														<div class="col-md-4 col-sm-12 fv-row mb-7">
															<!--begin::Label-->
															<label class="fw-bold required fs-6 mb-2">Fiyat</label>
															<!--end::Label-->
															<div class="input-group input-group-solid">
																<div class="dropdown">
																	<span id="dropdownMenuButton1"
																		  data-bs-toggle="dropdown"
																		  aria-expanded="false"
																		  class="input-group-text currentCurrency dropdown-toggle bg-light-primary hoverable">₺</span>
																	<ul class="dropdown-menu "
																		aria-labelledby="dropdownMenuButton1"
																		style="min-width: unset;width: 100%">
																		<?php
																		foreach ($currencies as $currency) {
																			?>
																			<li>
																				<a class="dropdown-item changeCurrency text-center fw-bold fs-5"
																				   href="#"
																				   data-symbol="<?= $currency["symbol"] ?>"
																				   data-id="<?= $currency["currencyId"] ?>"><?= $currency["symbol"] ?></a>
																			</li>
																			<?php

																		}
																		?>
																	</ul>
																</div>
																<input required maxlength="13" name="unitPrice"
																	   type="text"
																	   placeholder="0,00" data-input-type="decimal"
																	   class="form-control form-control-solid">
															</div>
														</div>

														<div class="d-none col-md-4 col-sm-12 fv-row mb-7">
															<!--begin::Label-->
															<label class="fw-bold required fs-6 mb-2">KDV Oranı</label>
															<!--end::Label-->
															<!--begin::Input-->
															<select name="vatPercent" id=""
																	class="form-control form-control-solid selectVat">
																<?php
																foreach (getVats() as $vat) {
																	?>
																	<option <?= $vat == "18" ? "selected" : ""; ?>
																			value="<?= $vat ?>">%<?= $vat ?></option>
																	<?php
																}
																?>
															</select>
															<!--end::Input-->
														</div>
														<div class="d-none col-md-4 col-sm-12 fv-row mb-7">
															<!--begin::Label-->
															<label class="fw-bold required fs-6 mb-2">KDV Dahil
																Tutar </label>
															<!--end::Label-->
															<div class="input-group input-group-solid">
																<div class="dropdown">
																	<span id="dropdownMenuButton1"
																		  data-bs-toggle="dropdown"
																		  aria-expanded="false"
																		  class="input-group-text currentCurrency bg-light-primary ">₺</span>

																</div>
																<input maxlength="13" name="totalPrice" type="text"
																	   placeholder="0,00" data-input-type="decimal"
																	   class="form-control form-control-solid">
															</div>
														</div>
														<div class="col-md-4 col-sm-12 fv-row mb-7">
															<!--begin::Label-->
															<label class="fw-bold required fs-6 mb-2">Birim</label>
															<!--end::Label-->
															<!--begin::Input-->
															<select required name="unitID" id=""
																	class="form-control form-control-solid selectUnit">
																<?php
																foreach ($units as $unit) {
																	?>
																	<option <?= $unit["unitId"] == 1 ? "selected" : ""; ?>
																			value="<?= $unit["unitId"] ?>"><?= $unit["name"] ?></option>
																	<?php
																}
																?>
															</select>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<div class="d-none col-md-6 col-sm-12 fv-row mb-7"
															 data-np-type="PRODUCT">
															<label class="d-flex align-items-center fs-5 fw-bold mb-2">
																<span class="required">Stok Takibi</span>
															</label>
															<!--begin::Radio group-->
															<div class="btn-group w-100" data-kt-buttons="true"
																 data-kt-buttons-target="[data-kt-button]">
																<!--begin::Radio-->
																<label class="stockActiveLabel btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success"
																	   data-kt-button="true">
																	<!--begin::Input-->
																	<input class="btn-check" id="stockActive"
																		   type="radio" name="stockActive" value="1"/>
																	<!--end::Input-->
																	Aktif
																</label>
																<!--end::Radio-->

																<!--begin::Radio-->
																<label class="stockPassiveLabel btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success active"
																	   data-kt-button="true">
																	<!--begin::Input-->
																	<input class="btn-check" id="stockPassive"
																		   type="radio" name="stockActive"
																		   checked="checked" value="2"/>
																	<!--end::Input-->
																	Pasif
																</label>
																<!--end::Radio-->
															</div>
															<!--end::Radio group-->
														</div>
														<!--end::Input group-->
														<div data-edit-hidden='true'
															 class="col-md-6 col-sm-12 fv-row mb-7"
															 style="display: none"
															 data-np-type="STOCK_ACTIVE">
															<!--begin::Label-->
															<label class="required fw-bold fs-6 mb-2">Açılış Stok
																Miktarı</label>
															<input type="number" name="initialStock" value="0"
																   class="form-control form-control-solid">
															<!--end::Label-->
														</div>


													</div>
													<div class="fv-row row mb-7">

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
					<table class="table align-middle table-row-dashed fs-6 gy-5" id="np-datatable">
						<!--begin::Table head-->
						<thead>
						<!--begin::Table row-->
						<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
							<th class="text-start w-50px pe-2">
								#
							</th>
							<th class="mw-100px">Ürün Kodu</th>
							<th class="min-w-125px">Ürün/Hizmet Adı</th>
							<th class="min-w-125px d-none">Stok</th>
							<th class="min-w-125px">Birim Fiyat</th>
							<th class="text- min-w-100px">İşlem</th>
						</tr>
						<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody class="text-gray-600 fw-bold">
						<?php
						$counter = 1;
						foreach ($products as $product) {
							?>
							<tr data-id="<?= $product["productId"] ?>">
								<td><?= ++$counter; ?></td>
								<td>
									<div class="badge badge-light-primary">#<?= $product["productCode"] ?></div>
								</td>
								<td><?= $product["brand"] ? '<span class="badge badge-sm badge-info">' . $product["brand"]["title"] .'</span> ' : ''; ?><?= $product["name"] ?></td>
								<td class="d-none"><?= $product["stock"] ?> <?= Main::unit($product["fkUnit"]) ?> </td>
								<td><?= $product["totalPrice"] ?> <?= currency($product["fkCurrency"]) ?></td>
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
											   class="np-edit menu-link px-3"><?=isCan('admin') ? 'Düzenle' : 'Detay'?></a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="<?=hideByPerm('admin')?> menu-item px-3">
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
