<div data-kt-swapper="true" data-kt-swapper-mode="prepend"
	 data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
	 class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
	<!--begin::Title-->

	<h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1"><?= end($_breadcrumb["map"]) ?>
		<!--begin::Separator-->
		<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
		<!--end::Separator-->
		<!--begin::Description-->
		<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
			<!--begin::Item-->
			<li class="breadcrumb-item text-muted">
				<a href="<?= base_url() ?>"
				   class="text-muted text-hover-primary">MY CRM</a>
			</li>
			<!--end::Item-->
			<?php
			foreach ($_breadcrumb["map"] as $index => $item) {
				?>
				<!--begin::Item-->
				<li class="breadcrumb-item">
					<span class="bullet bg-gray-200 w-5px h-2px"></span>
				</li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item text-<?= array_key_last($_breadcrumb["map"]) == $index ? "dark" : "muted"; ?>"><?= $item ?></li>
				<!--end::Item-->
				<?php

			}
			?>

		</ul>
		<!--end::Description--></h1>
	<!--end::Title-->
</div>
