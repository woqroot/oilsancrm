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
	<!--begin::Post-->
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<!--begin::Container-->
		<div id="kt_content_container" class="container-xxl">
			<!--begin::Content-->
			<div class="flex-lg-row-fluid ms-lg-15">
				<div class="card card-flush">
					<!--begin::Card header-->
					<div class="card-header align-items-center py-5 gap-2 gap-md-5">
						<!--begin::Card title-->
						<div class="card-title">
							<!--begin::Title-->
							<h2>Hesap Bilgileri</h2>
							<!--end::Title-->
						</div>
						<!--end::Card title-->
						<div class="card-toolbar">
							<button class="btn btn-primary" data-bs-target="#editModal" data-bs-toggle="modal">Düzenle
							</button>

							<button class="btn btn-danger ms-4 np-delete" >Sil
							</button>
						</div>
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<div class="d-flex flex-equal me-5 mb-10">
							<table class="table table-flush fw-bold">
								<tbody>
								<tr>
									<td class="text-muted min-w-125px w-125px">Hesap İsmi</td>
									<td class="text-gray-800"><?= $account["name"] ?></td>
								</tr>
								<tr>
									<td class="text-muted min-w-125px w-125px">Döviz Cinsi</td>
									<td class="text-gray-800"><?= currency($account["fkCurrency"], false)["name"] ?>
										(<?= currency($account["fkCurrency"], false)["code"] ?>)
									</td>
								</tr>
								<tr>
									<td class="text-muted min-w-125px w-125px">Açılış Tarihi</td>
									<td class="text-gray-800"><?= localizeDate("d M Y", $account["createdAt"]) ?></td>
								</tr>
								<tr>
									<td class="text-muted min-w-125px w-125px">Güncel Bakiye</td>
									<td class="text-gray-800">
										<div class="badge badge-lg badge-primary hoverable "><?= showBalance($account["balance"], $account["fkCurrency"]) ?></div>
									</td>
								</tr>
								</tbody>
							</table>
							<?php
							if ($account["type"] == "BANK") {
								?>
								<table class="table table-flush fw-bold">
									<tbody>
									<tr>
										<td class="text-muted min-w-125px w-125px">Banka</td>
										<td class="text-gray-800"><?= bankName($account["fkBank"]) ?></td>
									</tr>
									<tr>
										<td class="text-muted min-w-125px w-125px">IBAN</td>
										<td class="text-gray-800"><?= $account["bankIban"] ?></td>
									</tr>
									<tr>
										<td class="text-muted min-w-125px w-125px">Hesap No/Şube</td>
										<td class="text-gray-800"><?= $account["bankAccountNumber"] ?>
											/ <?= $account["bankBranch"] ?></td>
									</tr>
									<tr>
										<td class="text-muted min-w-125px w-125px">Şube</td>
										<td class="text-gray-800">12/2024</td>
									</tr>
									</tbody>
								</table>
								<?php
							}
							?>

							<div class="symbol symbol-circle symbol-125px ms-auto" style="margin-bottom: 30px;">
								<a href="javascript:void(0)">
									<div class="symbol-label fs-3 bg-light-primary text-primary">
										<i class="bi bi-<?= $account["type"] == "CASH" ? "cash" : "bank2" ?> fs-5x text-primary"></i>
									</div>
								</a>
							</div>
						</div>
						<div class="separator border-1 border-secondary"></div>
						<!--begin::Form-->
						<h2 class="my-5">Hesap Hareketleri</h2>
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-5 np-datatable">
							<!--begin::Table head-->
							<thead>
							<!--begin::Table row-->
							<tr class="table-hover text-start text-muted fw-bolder fs-7 text-uppercase gs-0">

								<th class=" min-w-125px"><span class="ms-3">#</span></th>
								<th class=" min-w-125px"><span class="ms-3">İşlem Tipi</span></th>
								<th class="min-w-125px">Tarih</th>
								<th class="min-w-125px">İlgili Müşteri/Tedarikçi</th>
								<th class="min-w-125px">Tutar</th>
								<th class="min-w-125px">Bakiye</th>
							</tr>
							<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="text-gray-600 fw-bold">
							<?php
							$counter = 0;
							foreach ($activities as $activity) {
								$counter++;
								?>
								<tr class="bg-light-<?= $activity["type"] == "INCOME" ? "success" : "danger" ?> hoverable">
									<td><span class="ms-3"><?=$counter?></span></td>
									<td><span class="ms-3"><?= $activity["explanation"] ?></span></td>
									<td><?= $activity["actionDate"] ?></td>
									<td><?= $activity["opponent"] ? 1 : 2; ?></td>
									<td><?= $activity["amount"] ?></td>
									<td><?= $activity["afterBalance"] ?></td>
								</tr>
								<?php
							}
							?>

							</tbody>
						</table>
						<!--end::Form-->
					</div>
					<!--end::Card body-->
				</div>

			</div>
		</div>
	</div>
</div>
<!--end::Post-->
<div class="modal fade" data-bs-backdrop="static" id="editModal" tabindex="-1"
	 aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Modal header-->
			<div class="modal-header" id="primaryModal_header">
				<!--begin::Modal title-->
				<h2 class="fw-bolder modal-title">Düzenle</h2>
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
					<input type="hidden" name="action" value="EDIT">
					<input type="hidden" name="id" value="<?= $account["accountId"] ?>">
					<input type="hidden" name="accountType" value="">
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
								<div class="col-6">
									<!--begin::Option-->
									<input disabled type="radio" <?= $account["type"] == "BANK" ? "checked" : ""; ?>
										   class="btn-check" name="type"
										   value="BANK"
										   id="selectTypeBANK"/>
									<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-5"
										   for="selectTypeBANK">
										<!--begin::Svg Icon | path: icons/duotune/coding/cod001.svg-->
										<span class="svg-icon svg-icon-4x me-4">
																	<i class="bi bi-bank fs-3x"></i>
																</span>
										<!--end::Svg Icon-->

										<span class="d-block fw-bold text-start">
																	<span class="text-dark fw-bolder d-block fs-3">Banka</span>
																</span>
									</label>
									<!--end::Option-->
								</div>
								<div class="col-6">
									<!--begin::Option-->
									<input disabled type="radio" <?= $account["type"] == "CASH" ? "checked" : ""; ?>
										   class="btn-check" name="type"
										   value="CASH" id="selectTypeCASH"/>
									<label class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center"
										   for="selectTypeCASH">
										<!--begin::Svg Icon | path: icons/duotune/communication/com003.svg-->
										<span class="svg-icon svg-icon-4x me-4">
																	<i class="bi bi-safe fs-3x"></i>
																</span>
										<!--end::Svg Icon-->
										<span class="d-block fw-bold text-start">
																	<span class="text-dark fw-bolder d-block fs-3">Kasa</span>
																</span>
									</label>
									<!--end::Option-->
								</div>
							</div>
							<div class="fv-row row mb-7">
								<!--begin::Input group-->
								<div class="col-md-12 col-sm-12 fv-row mb-7">
									<!--begin::Label-->
									<label class="fw-bold fs-6 required mb-2">Hesap Adı</label>
									<input type="text" required name="name" value="<?= $account["name"] ?>"
										   class="form-control form-control-solid">
									<!--end::Label-->
								</div>
								<?php
								$currency = currency($account["fkCurrency"], false);


								?>
									<div class="col-md-6 col-sm-12 fv-row mb-7">
										<!--begin::Label-->
										<label class="fw-bold required fs-6 mb-2">Döviz Cinsi</label>
										<!--end::Label-->
										<!--begin::Input-->
										<select disabled name="currencyID" id=""
												class="form-control form-control-solid selectCurrency">

											<option><?= $currency["name"] ?> - <?= $currency["symbol"] ?></option>

										</select>
										<!--end::Input-->
									</div>
								<?php
								if ($account["type"] == "BANK") {


									?>
									<div class="col-md-6 col-sm-12 fv-row mb-7" data-np-type="BANK">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Hesap Numarası</label>
										<input type="text" value="<?= $account["bankAccountNumber"] ?>"
											   name="bankAccountNumber" class="form-control form-control-solid">
										<!--end::Label-->
									</div>
									<!--begin::Input group-->


									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="col-md-6 col-sm-12 fv-row mb-7" data-np-type="BANK">
										<!--begin::Label-->
										<label class="fw-bold required fs-6 mb-2">Banka Seçimi</label>
										<!--end::Label-->
										<!--begin::Input-->
										<select name="bankID" id="" required data-control="select2"
												class="form-control form-control-solid selectBank">
											<?php
											foreach (getBanks() as $bank) {
												?>
												<option <?= $bank["bankId"] == $account["fkBank"] ? "selected" : ""; ?>
														value="<?= $bank["bankId"] ?>"><?= $bank["name"] ?></option>
												<?php
											}
											?>
										</select>
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<div class="col-md-6 col-sm-12 fv-row mb-7" data-np-type="BANK">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">Şube</label>
										<input type="text" value="<?= $account["bankBranch"] ?>" name="bankBranch"
											   class="form-control form-control-solid">
										<!--end::Label-->
									</div>
									<div class="col-md-12 col-sm-12 fv-row mb-7" data-np-type="BANK">
										<!--begin::Label-->
										<label class="fw-bold fs-6 mb-2">IBAN Numarası</label>
										<input type="text" value="<?= $account["bankIban"] ?>" name="bankIBAN"
											   class="form-control form-control-solid">
										<!--end::Label-->
									</div>
									<?php
								}
								?>


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
