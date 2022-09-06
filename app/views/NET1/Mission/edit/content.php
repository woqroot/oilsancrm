<?php
$deleteText = !isCan("admin") ? '' : '<a href="javascript:void(0)" class="deleteMission" data-id="' . $mission["missionId"] . '"><button class="btn btn-sm btn-light-danger">Sil</button></a>';
?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<?= $CI->loadLayout("breadcrumb") ?>
			<!--end::Page title-->
			<!--begin::Actions-->
			<div class="d-flex align-items-center gap-2 gap-lg-3">

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
			<!--begin::Form-->
			<form enctype="multipart/form-data" id="addMissionForm"
				  class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
				<!--begin::Aside column-->
				<input type="hidden" name="missionID" value="<?= $mission["missionId"] ?>">
				<input type="hidden" name="type" value="">
				<div class="w-100 flex-lg-row-auto w-lg-300px mb-7 me-7 me-lg-10">
					<!--begin::Order details-->
					<div class="card card-flush py-4">
						<!--begin::Card header-->
						<div class="card-header">
							<div class="card-title">
								<h2>Görev Bilgileri</h2>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0">
							<div class="d-flex flex-column">
								<!--begin::Input group-->
								<div class="fv-row mb-5">
									<!--begin::Label-->
									<label class="form-label">Görev ID</label>
									<!--end::Label-->
									<!--begin::Auto-generated ID-->
									<div class="fw-bolder fs-3">#<?= $mission["missionId"] ?></div>
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->

								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row fv-plugins-icon-container mb-5">
									<!--begin::Label-->
									<label class="required form-label">Görev Durumu</label>
									<!--end::Label-->
									<!--begin::Select2-->
									<select <?= writeDisableByPerm("admin") ?> required
																			   class="form-select mb-2 select2-hidden-accessible"
																			   data-control="select2"
																			   data-placeholder="Seçim Yapın"
																			   name="fkStatus"
																			   id="kt_ecommerce_edit_order_shipping"
																			   data-select2-id="select2-data-kt_ecommerce_edit_order_shipping"
																			   tabindex="-1" aria-hidden="true">
										<?php
										foreach ($statuses as $status) {
											?>
											<option <?= $status["missionStatusId"] == $mission["fkMissionStatus"] ? "selected" : ""; ?>
													value="<?= $status["missionStatusId"] ?>"><?= $status["name"] ?></option>
											<?php
										}
										?>
									</select>

									<!--end::Select2-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row fv-plugins-icon-container mb-0">
									<!--begin::Label-->
									<label class="required form-label">Görevli Personel</label>
									<!--end::Label-->
									<!--begin::Select2-->
									<select <?= writeDisableByPerm("admin") ?> required class="form-select "
																			   data-control="select2"
																			   data-placeholder="Seçim Yapın"
																			   name="fkUser">
										<option value="">Seçim Yapın</option>
										<?php
										foreach ($users as $user) {
											?>
											<option <?= $user["userId"] == $mission["fkUser"] ? "selected" : ""; ?>
													value="<?= $user["userId"] ?>"><?= $user["firstName"] ?> <?= $user["lastName"] ?></option>
											<?php
										}
										?>
									</select>

									<!--end::Select2-->
								</div>
								<div class="separator mb-3"></div>
								<div class="fv-row fv-plugins-icon-container mb-5">
									<!--begin::Label-->
									<label class="required form-label">Başlangıç Tarihi</label>
									<!--end::Label-->
									<!--begin::Select2-->
									<input required placeholder="Lütfen seçin"
										   value="<?= $mission["startDate"] ? date("d-m-Y", strtotime($mission["startDate"])) : null ?>"
										   class="form-control form-control-solid datepicker"
										   name="startDate">


									<!--end::Select2-->
								</div>
								<div class="fv-row fv-plugins-icon-container mb-5">
									<!--begin::Label-->
									<label class="required form-label">Bitiş Tarihi</label>
									<!--end::Label-->
									<!--begin::Select2-->
									<input required placeholder="Lütfen seçin"
										   class="form-control form-control-solid datepicker"
										   name="endDate"
										   value="<?= $mission["endDate"] ? date("d-m-Y", strtotime($mission["endDate"])) : null ?>">


									<!--end::Select2-->
								</div>
								<div class="separator mb-3"></div>
								<!--end::Input group-->
								<?php

								?>
								<div class="fv-row fv-plugins-icon-container mt-5">
									<button type="submit" class="btn btn-light-success w-100">Değişiklikleri Kaydet
									</button>
								</div>
								<!--end::Input group-->
							</div>

						</div>
						<!--end::Card header-->
					</div>
					<!--end::Order details-->

				</div>

				<!--end::Aside column-->
				<!--begin::Main column-->
				<div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
					<!--begin::Order details-->
					<div class="card card-flush py-4">
						<!--begin::Card header-->
						<div class="card-header">
							<div class="card-title">
								<h2>Görev İçeriği</h2>
							</div>
							<div class="card-toolbar">
								<button type="button"
										class="btn btn-<?= $currentStatus["className"] ?>"><?= $currentStatus["name"] ?></button>
								<?php
								if (isCan("admin")) {
									?>
									<button type="button" data-id="<?=$mission["missionId"]?>"
											class="btn btn-light-danger ms-3 deleteMission"><i class="fa fa-trash"></i> Sil</button>

									<?php
								}
								?>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0">
							<div class="d-flex flex-column gap-3">
								<!--begin::Input group-->
								<div class="row">
									<div class="fv-row mb-5 col-12">
										<!--begin::Label-->
										<label class=" required form-label fw-bolder mb-2">Başlık</label>

										<input <?= writeDisableByPerm("admin") ?> value="<?= $mission["title"] ?>"
																				  required name="title" type="text"
																				  class="form-control form-control-solid"
																				  placeholder="Görev Başlığı">
										<!--begin::Total price-->
										<!--end::Total price-->
									</div>

								</div>
								<!--end::Input group-->
								<!--begin::Separator-->
								<div class="separator"></div>
								<!--end::Separator-->
								<div class="fv-row mb-5">
									<!--begin::Label-->
									<label class="required form-label fw-bolder mb-2">Görev Detayları</label>

									<textarea <?= writeDisableByPerm("admin") ?> placeholder="Talep içeriği hakkında özet bilgi"
																				 name="explanation" id=""
																				 cols="30" rows="10"
																				 class="form-control editor form-control-solid resize-none"><?= $mission["explanation"] ?></textarea>
								</div>
							</div>
						</div>
						<!--end::Card header-->
					</div>
					<!--end::Order details-->
					<!--begin::Order details-->
					<div class="card card-flush py-4">
						<!--begin::Card header-->
						<div class="card-header">
							<div class="card-title">
								<h2>Görev Onay Bilgileri</h2>
							</div>
						</div>
						<!--end::Card header-->
						<!--begin::Card body-->
						<div class="card-body pt-0">
							<div class="d-flex flex-column gap-3">
								<div class="fv-row mb-5">
									<!--begin::Label-->
									<label class="form-label fw-bolder mb-2">Görev Onay Mesajı</label>

									<textarea <?= $mission["fkUser"] == Auth::get("userId") ? "" : "disabled" ?> name="approveMessage"
																												 id=""
																												 cols="30"
																												 rows="5"
																												 class="editor form-control form-control-solid resize-none"><?= $mission["approveMessage"] ?></textarea>
									<!--begin::Total price-->
									<!--end::Total price-->
								</div>
							</div>

							<div class="<?= $mission["fkUser"] == Auth::get("userId") ? "" : "d-none" ?> d-flex justify-content-end">
								<!--begin::Button-->
								<button type="submit" name="subAction" value="possitive"
										class="me-3 btn btn-success">
									<span class="indicator-label">Kaydet - Tamamlandı</span>
									<span class="indicator-progress">Lütfen Bekleyin
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Button-->
								<!--begin::Button-->
								<button type="submit" name="subAction" value="negative" class="btn btn-light-primary">
									<span class="indicator-label">Kaydet - Devam Ediyor</span>
									<span class="indicator-progress">Lütfen Bekleyin
												<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Button-->
							</div>
						</div>
						<!--end::Card header-->
					</div>
					<!--end::Order details-->
					<!--begin::Order details-->

					<!--end::Order details-->

				</div>
				<!--end::Main column-->
				<div></div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
