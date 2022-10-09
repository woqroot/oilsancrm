<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
	 data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
	 data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
	 data-kt-drawer-toggle="#kt_aside_mobile_toggle">
	<!--begin::Brand-->
	<div class="aside-logo align-items-center flex-column-auto" id="kt_aside_logo">
		<!--begin::Logo-->
		<a class="" href="<?= base_url() ?>">
			<img alt="Logo" src="<?= public_url("assets/media/logos/logo-white.svg") ?>" class="w-50px logo"/>
		</a>

		<h3 class="m-0 text-white">OilsanCRM</h3>

		<!--end::Logo-->
		<!--begin::Aside toggler-->
		<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
			 data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
			 data-kt-toggle-name="aside-minimize">
			<!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
			<span class="svg-icon svg-icon-1 rotate-180">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									 fill="none">
									<path opacity="0.5"
										  d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
										  fill="currentColor"/>
									<path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
										  fill="currentColor"/>
								</svg>
							</span>
			<!--end::Svg Icon-->
		</div>
		<!--end::Aside toggler-->
	</div>
	<!--end::Brand-->
	<!--begin::Aside menu-->
	<div class="aside-menu flex-column-fluid">
		<!--begin::Aside Menu-->
		<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
			 data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
			 data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
			 data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
			<!--begin::Menu-->
			<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
				 id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Genel Bakış</span>
					</div>
				</div>

				<div class="menu-item">
					<a class="menu-link " href="<?= base_url("dashboard") ?>">
										<span class="menu-icon">
											<i class="bi bi-grid fs-3"></i>
										</span>
						<span class="menu-title">Ana Sayfa</span>
					</a>
				</div>

				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Satış</span>
					</div>
				</div>
				<?php
				if (isCan('admin')) {
					?>
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
					<i class="bi bi-person fs-3"></i>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Müşteri Yönetimi</span>
										<span class="menu-arrow"></span>
									</span>
						<div class="menu-sub menu-sub-accordion menu-active-bg">
							<?php

							?>
							<div class="menu-item">
								<a class="menu-link" href="<?= base_url("customers") ?>">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Müşteriler</span>
								</a>
							</div>

							<div class="menu-item">
								<a href="<?= base_url("customer-groups") ?>" class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Müşteri Grupları</span>
								</a>
							</div>

							<div class="menu-item">
								<a href="<?= base_url("customer-sources") ?>" class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Kaynak Tanımları</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="<?= base_url("sectors") ?>" class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Sektör Tanımları</span>
								</a>
							</div>


						</div>
					</div>
					<?php
				} else {
					?>
					<div class=" menu-item">
						<a class="menu-link" href="<?= base_url("customers") ?>">
										<span class="menu-icon">
					<i class="bi bi-person fs-3"></i>
										</span>
							<span class="menu-title">Müşteriler</span>
						</a>
					</div>
					<?php
				}
				?>

				<div class="<?= hideByPerm("admin") ?> menu-item">
					<a class="menu-link" href="<?= base_url("duyuru-yonetimi") ?>">
										<span class="menu-icon">
											<i class="bi-newspaper bi fs-3"></i>
										</span>
						<span class="menu-title">Duyuru Yönetimi</span>
					</a>
				</div>

				<div class="menu-item d-none">
					<a class="menu-link" href="<?= base_url("accounts") ?>">
										<span class="menu-icon">
											<i class="bi bi-cash fs-3"></i>
										</span>
						<span class="menu-title">Kasa & Bankalar</span>
					</a>
				</div>
				<?php
				if (isCan('admin')) {
					?>
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
											<i class="bi bi-stack fs-3"></i>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Ürün Yönetimi</span>
										<span class="menu-arrow"></span>
									</span>
						<div class="menu-sub menu-sub-accordion menu-active-bg">
							<?php

							?>
							<div class="menu-item">
								<a class="menu-link" href="<?= base_url("products") ?>">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Ürün Listesi</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="<?= base_url("brands") ?>" class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Markalar</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="<?= base_url("product-types") ?>" class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Ürün Tipleri</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="<?= base_url("product-packs") ?>" class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Ambalaj Çeşitleri</span>
								</a>
							</div>
							<div class="menu-item">
								<a href="<?= base_url("product-fluidities") ?>" class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Akışkanlık Çeşitleri</span>
								</a>
							</div>


						</div>
					</div>

					<?php
				} else {
					?>
					<div class="menu-item">
						<a class="menu-link" href="<?= base_url("products") ?>">
										<span class="menu-icon">
											<i class="bi bi-stack fs-3"></i>
										</span>
							<span class="menu-title">Ürünler</span>
						</a>
					</div>
					<?php
				}
				?>
				<div class="menu-item">
					<a class="menu-link" href="<?= base_url("sales") ?>">
										<span class="menu-icon">
											<i class="fa fa-file-invoice fs-3"></i>
										</span>
						<span class="menu-title">Satışlar</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link" href="<?= base_url("missions") ?>">
										<span class="menu-icon">
											<i class="fa fa-folder fs-3"></i>
										</span>
						<span class="menu-title"><?= isCan('admin') ? 'Görev Yönetimi' : 'Görevlerim'; ?></span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link" href="<?= base_url("calendar") ?>">
										<span class="menu-icon">
											<i class="bi bi-calendar fs-3"></i>
										</span>
						<span class="menu-title">Takvim</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link" href="<?= base_url("trial-products") ?>">
										<span class="menu-icon">
											<i class="bi bi-stack-overflow fs-3"></i>
										</span>
						<span class="menu-title">Deneme Ürünleri</span>
					</a>
				</div>
				<?php
				if (isCan('admin')) {
					?>

					<div class="menu-item">
						<div class="menu-content pt-8 pb-2">
							<span class="menu-section text-muted text-uppercase fs-8 ls-1">Yönetim</span>
						</div>
					</div>
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
											<!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
					<i class="bi-calculator bi fs-3"></i>
											<!--end::Svg Icon-->
										</span>
										<span class="menu-title">Raporlar</span>
										<span class="menu-arrow"></span>
									</span>
						<div class="menu-sub menu-sub-accordion menu-active-bg">
							<?php

							?>
							<div class="menu-item">
								<a class="menu-link" href="<?= base_url("reports/general") ?>">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Genel Raporlar</span>
								</a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="<?= base_url("reports/product") ?>">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Ürün Raporları</span>
								</a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="<?= base_url("reports/staff") ?>">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Personel Raporları</span>
								</a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="<?= base_url("reports/sale") ?>">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Satış Raporları</span>
								</a>
							</div>
							<div class="menu-item">
								<a class="menu-link" href="<?= base_url("reports/trial-product") ?>">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
									<span class="menu-title">Deneme Ürünleri</span>
								</a>
							</div>

						</div>
					</div>
					<div class="menu-item">
						<a class="menu-link" href="<?= base_url("users") ?>">
										<span class="menu-icon">
											<i class="bi bi-person-workspace fs-3"></i>
										</span>
							<span class="menu-title">Ekip Yönetimi</span>
						</a>
					</div>
					<?php
				}
				?>
			</div>
			<!--end::Menu-->
		</div>
		<!--end::Aside Menu-->
	</div>
	<!--end::Aside menu-->
	<!--begin::Footer-->
	<div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
		<a href="<?= base_url("auth/logout") ?>" class="btn btn-custom btn-primary w-100">
			<span class="btn-label">Çıkış Yap</span>
			<!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
			<span class="svg-icon btn-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
									 fill="none">
									<path opacity="0.3"
										  d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
										  fill="currentColor"/>
									<rect x="7" y="17" width="6" height="2" rx="1" fill="currentColor"/>
									<rect x="7" y="12" width="10" height="2" rx="1" fill="currentColor"/>
									<rect x="7" y="7" width="6" height="2" rx="1" fill="currentColor"/>
									<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor"/>
								</svg>
							</span>
			<!--end::Svg Icon-->
		</a>
	</div>
	<!--end::Footer-->
</div>
