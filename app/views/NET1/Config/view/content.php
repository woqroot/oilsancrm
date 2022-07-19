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
				<!--begin:::Tabs-->
				<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
					<!--begin:::Tab item-->
					<li class="nav-item">
						<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
						   href="#kt_ecommerce_settings_general">
							<!--begin::Svg Icon | path: icons/duotune/general/gen001.svg-->
							<span class="svg-icon svg-icon-2 me-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
													 viewBox="0 0 24 24" fill="none">
													<path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z"
														  fill="currentColor"/>
												</svg>
											</span>
							<!--end::Svg Icon-->Sistem</a>
					</li>
					<!--end:::Tab item-->
				</ul>
				<!--end:::Tabs-->
				<!--begin:::Tab content-->
				<div class="tab-content" id="myTabContent">
					<!--begin:::Tab pane-->
					<div class="tab-pane fade show active" id="kt_ecommerce_settings_general" role="tabpanel">
						<!--begin::Products-->
						<div class="card card-flush">
							<!--begin::Card header-->
							<div class="card-header align-items-center py-5 gap-2 gap-md-5">
								<!--begin::Card title-->
								<div class="card-title">
									<!--begin::Title-->
									<h2>Sistem</h2>
									<!--end::Title-->
								</div>
								<!--end::Card title-->
							</div>
							<!--end::Card header-->
							<!--begin::Card body-->
							<div class="card-body pt-0">
								<!--begin::Form-->
								<form id="general" class="form" action="#">
									<input type="hidden" name="__heading" value="GENERAL">
									<!--begin::Input group-->
									<div class="row fv-row mb-7">
										<div class="col-md-3 text-md-end">
											<!--begin::Label-->
											<label class="fs-6 fw-bold form-label mt-3">
												<span class="required">Panel Başlık</span>
											</label>
											<!--end::Label-->
										</div>
										<div class="col-md-9">
											<!--begin::Input-->
											<input type="text" required class="form-control form-control-solid" maxlength="33" name="title"
												   value="<?=$configs["title"]?>"/>
											<!--end::Input-->
										</div>
									</div>
									<!--end::Input group-->
									<!--begin::Action buttons-->
									<div class="row">
										<div class="col-md-9 offset-md-3">
											<!--begin::Separator-->
											<div class="separator mb-6"></div>
											<!--end::Separator-->
											<div class="d-flex justify-content-end">
												<!--begin::Button-->
												<button type="submit" data-kt-ecommerce-settings-type="submit"
														class="btn btn-primary">
													<span class="indicator-label">Değişiklikleri Kaydet</span>
													<span class="indicator-progress">Lütfen bekleyin...
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
												<!--end::Button-->
											</div>
										</div>
									</div>
									<!--end::Action buttons-->
								</form>
								<!--end::Form-->
							</div>
							<!--end::Card body-->
						</div>
						<!--end::Products-->
					</div>
					<!--end:::Tab pane-->
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Post-->
