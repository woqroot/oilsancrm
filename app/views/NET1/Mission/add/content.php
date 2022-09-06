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
									<div class="fw-bolder fs-3">#<?= $missionID ?></div>
									<!--end::Input-->
								</div>
								<!--end::Input group-->


								<!--begin::Input group-->
								<div class="fv-row fv-plugins-icon-container mb-5">
									<!--begin::Label-->
									<label class="required form-label">Görevli Personel</label>
									<!--end::Label-->
									<!--begin::Select2-->
									<select required class="form-select " data-control="select2"
											data-placeholder="Seçim Yapın"
											name="fkUser">
										<option value="">Seçim Yapın</option>
										<?php
										foreach ($users as $user) {
											?>
											<option value="<?= $user["userId"] ?>"><?= $user["firstName"] ?> <?= $user["lastName"] ?></option>
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
									<input required placeholder="Lütfen seçin" value="<?=date("d-m-Y")?>" class="form-control form-control-solid datepicker"
										   name="startDate">


									<!--end::Select2-->
								</div>
								<div class="fv-row fv-plugins-icon-container mb-5">
									<!--begin::Label-->
									<label class="required form-label">Bitiş Tarihi</label>
									<!--end::Label-->
									<!--begin::Select2-->
									<input required placeholder="Lütfen seçin" class="form-control form-control-solid datepicker"
										   name="endDate">


									<!--end::Select2-->
								</div>
								<div class="separator mb-3"></div>
								<div class="d-none fv-row fv-plugins-icon-container mb-5 ">
									<!--begin::Label-->
									<label class=" form-label">Doküman</label>
									<!--end::Label-->
									<!--begin::Select2-->
									<input type="file" name="document" class="form-control form-control-solid">

									<!--end::Select2-->
								</div>
								<div class="fv-row fv-plugins-icon-container mt-5">
									<button type="submit" class="btn btn-light-success w-100">Oluştur</button>
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
								<h2>Görev Bilgileri</h2>
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

										<input required name="title" type="text" class="form-control form-control-solid"
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

									<textarea placeholder="Talep içeriği hakkında özet bilgi" name="explanation" id=""
											  cols="30" rows="10"
											  class="editor form-control form-control-solid resize-none"></textarea>
									<!--begin::Total price-->
									<!--end::Total price-->
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

									<textarea disabled
											  placeholder="Bu alan, yalnızca görev oluşturulduktan sonra satış personeli tarafından düzenlenebilir."
											  name="approveMessage" id="" cols="30" rows="5"
											  class="form-control form-control-solid resize-none"></textarea>
									<!--begin::Total price-->
									<!--end::Total price-->
								</div>
								<!--begin::Separator-->
								<div class="separator"></div>
								<!--end::Separator-->

							</div>
						</div>
						<!--end::Card header-->
					</div>
					<!--end::Order details-->
					<!--begin::Order details-->

			
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
