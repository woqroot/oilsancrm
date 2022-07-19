<!--begin::Root-->
<div class="d-flex flex-column flex-root">
	<!--begin::Authentication - Sign-in -->
	<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(assets/media/illustrations/sketchy-1/14-dark.png">
		<!--begin::Content-->
		<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
			<!--begin::Logo-->
			<a href="" class="mb-12">
				<img alt="Logo" src="<?=base_url("public/assets/media/logo.png")?>" class="h-100px" />
			</a>
			<!--end::Logo-->
			<!--begin::Wrapper-->
			<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
				<!--begin::Form-->
				<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
					<!--begin::Heading-->
					<div class="text-center mb-10">
						<!--begin::Title-->
						<h1 class=" mb-3">NetCRM v0.1 - Giriş Yap</h1>
						<!--end::Title-->

					</div>
					<!--begin::Heading-->
					<!--begin::Input group-->
					<div class="fv-row mb-10">
						<!--begin::Label-->
						<label class="form-label fs-6 fw-bolder ">E-posta Adresi</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" />
						<!--end::Input-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="fv-row mb-10">
						<!--begin::Wrapper-->
						<div class="d-flex flex-stack mb-2">
							<!--begin::Label-->
							<label class="form-label fw-bolder  fs-6 mb-0">Parola</label>
							<!--end::Label-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Input-->
						<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
						<!--end::Input-->
					</div>
					<!--end::Input group-->
					<!--begin::Actions-->
					<div class="text-center">
						<!--begin::Submit button-->
						<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
							<span class="indicator-label">Giriş Yap</span>
							<span class="indicator-progress">Lütfen bekleyin...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
						<!--end::Submit button-->

					</div>
					<!--end::Actions-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Content-->
		<!--begin::Footer-->
		<div class="d-flex flex-center flex-column-auto p-10">
			<!--begin::Links-->
			<div class="d-flex align-items-center fw-bold fs-6">
				<a href="javascript:void(0)" class="text-muted text-hover-primary px-2">About</a>
				<a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact</a>
				<a href="javascript:void(0)" class="text-muted text-hover-primary px-2">Contact Us</a>
			</div>
			<!--end::Links-->
		</div>
		<!--end::Footer-->
	</div>
	<!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->
