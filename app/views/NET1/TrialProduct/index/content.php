<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<!--begin::Container-->
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<!--begin::Page title-->
			<?= $CI->loadLayout("breadcrumb"); ?>
			<!--end::Page title-->

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
							<input type="text"
								   class="np-search-table form-control form-control-solid w-250px ps-14"
								   placeholder="Tabloda Ara"/>
						</div>
						<!--end::Search-->
					</div>
					<!--begin::Card title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
						<!--begin::Toolbar-->
						<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

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
								<div id="kkmenu" class="menu menu-sub menu-sub-dropdown w-500px" data-kt-menu="true">
									<!--begin::Header-->
									<div class="px-7 py-5">
										<div class="fs-5 text-dark fw-bolder">Kay??tlar?? Filtrele</div>
									</div>
									<!--end::Header-->
									<!--begin::Separator-->
									<div class="separator border-gray-200"></div>
									<!--end::Separator-->
									<!--begin::Content-->
									<div class="px-7 py-5" data-kt-user-table-filter="form" >
										<!--start::Input group-->
										<div class="mb-6">
											<label class="form-label fs-6 fw-bold">M????teriye Verili?? Tarihi:</label>
											<input class="form-control form-control-solid" placeholder="Tarih Se??imi"
												   id="kt_daterangepicker_1"/>
										</div>
										<!--end::Input group-->

										<!--start::Input group-->
										<div class="mb-6">
											<label class="form-label fs-6 fw-bold">Geri Alma Tarihi:</label>
											<input class="form-control form-control-solid" placeholder="Tarih Se??imi"
												   id="kt_daterangepicker_2"/>
										</div>
										<!--end::Input group-->
										<!--begin::Input group-->
										<div class="mb-10">
											<label class="form-label fs-6 fw-bold">Durum:</label>
											<select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
													data-placeholder="T??m??" data-allow-clear="true"
													data-kt-user-table-filter="role" id="filterStatus"
													data-hide-search="true">
												<option value=""></option>

													<option value="0">Devam Ediyor</option>
													<option value="1">Ba??ar??l?? Sonu??</option>
													<option value="2">Ba??ar??s??z Sonu??</option>

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

								?>
								<a href="<?= base_url("sales/create") ?>">
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
										<!--end::Svg Icon-->Yeni Olu??tur
									</button>
								</a>
								<?php

								?>
								<!--end::Add user-->
							</div>
							<!--end::Toolbar-->
						</div>
						<!--end::Toolbar-->
						<!--begin::Modal - Add task-->
						<div class="modal fade" id="primaryModal" tabindex="-1" aria-hidden="true">
							<!--begin::Modal dialog-->
							<div class="modal-dialog modal-dialog-centered mw-650px">
								<!--begin::Modal content-->
								<div class="modal-content">
									<!--begin::Modal header-->
									<div class="modal-header" id="kt_modal_add_user_header">
										<!--begin::Modal title-->
										<h2 class="fw-bolder modal-title">Yeni Olu??tur</h2>
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
											<input type="hidden" name="action" value="">
											<input type="hidden" name="id" value="">
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
														<label class="fw-bold fs-6 mb-2">Ba??l??k</label>
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
						<!--end::Modal - Add task-->
					</div>
					<!--end::Card toolbar-->
				</div>
				<!--end::Card header-->
				<!--begin::Card body-->
				<div class="card-body py-4">
					<!--begin::Table-->
					<table class="table align-middle table-row-dashed fs-6 gy-5 np-datatable">
						<!--begin::Table head-->
						<thead>
						<!--begin::Table row-->
						<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
							<th class="text-center w-50px pe-2">
								#
							</th>
							<th class="min-w-125px">??lgili Sat???? - M????teri</th>
							<th class="min-w-100px">??r??n</th>
							<th class="min-w-100px">Verili?? Tarihi</th>
							<th class="min-w-100px">Teslim Alma Tarihi</th>
							<?php
							if (isCan('admin')) {
								?>
								<th class="min-w-100px">Sorumlu</th>
								<?php
							}
							?>
							<th class="min-w-100px">????lem</th>
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
			<div class="modal fade" id="editTrialProductModal" data-bs-backdrop="static"
				 data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
				<!--begin::Modal dialog-->
				<div class="modal-dialog modal-dialog-centered modal-xl">
					<!--begin::Modal content-->
					<div class="modal-content">
						<!--begin::Modal header-->
						<div class="modal-header" id="kt_modal_add_user_header">
							<!--begin::Modal title-->
							<h2 class="fw-bolder formTitle">Deneme ??r??n?? Bilgileri</h2>
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
							<form onsubmit="return false;" id="editTrialProductForm" enctype="multipart/form-data"
								  class="form"
								  action="#">
								<input type="hidden" name="action" value="EDIT">
								<input type="hidden" name="trialProductID" value="">
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

										<div class="col-lg-12">
											<div class="fv-row row mb-5 ">
												<div class="col-md-3 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Yap??ld?????? B??l??m</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input readonly disabled class="form-control form-control-solid"
														   name="department"/>
													<!--end::Input-->
												</div>
												<div class="col-md-3 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">G??revli Usta/M??hendis</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input readonly disabled class="form-control form-control-solid"
														   name="author"/>
													<!--end::Input-->
												</div>
												<div class="col-md-3 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">??r??nlerin Verili?? Tarihi</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input readonly disabled data-kt-calendar="datepicker" required
														   class="form-control form-control-solid"
														   name="startDate"/>
													<!--end::Input-->
												</div>
												<div class="col-md-3 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Teslim Alma Tarihi</label>
													<!--end::Label-->
													<!--begin::Input-->
													<input readonly disabled data-kt-calendar="datepicker" required
														   class="form-control form-control-solid"
														   name="endDate"/>
													<!--end::Input-->
												</div>
											</div>
											<div class="fv-row row mb-5">
												<div class="col-md-6 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Denemenin Yap??ld?????? Ekipman ve
														??zellikleri</label>
													<!--end::Label-->
													<!--begin::Input-->
													<textarea readonly disabled rows="4"
															  class="resize-none form-control form-control-solid"
															  name="equipment"></textarea>
													<!--end::Input-->
												</div>
												<div class="col-md-6 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">S??rece ??li??kin Notlar</label>
													<!--end::Label-->
													<!--begin::Input-->
													<textarea readonly disabled rows="4"
															  class="resize-none form-control form-control-solid"
															  name="notes"></textarea>
													<!--end::Input-->
												</div>

											</div>
											<div class="fv-row row mb-5">
												<div class="col-md-6 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Beklenen Performans</label>
													<!--end::Label-->
													<!--begin::Input-->
													<textarea readonly disabled rows="3"
															  class="resize-none form-control form-control-solid"
															  name="expectedPerformance"></textarea>
													<!--end::Input-->
												</div>
												<div class="col-md-6 col-sm-12 fv-row ">
													<!--begin::Label-->
													<label class="fw-bold fs-6 mb-2">Deneme Sonucu Performans</label>
													<!--end::Label-->
													<!--begin::Input-->
													<textarea readonly disabled rows="3"
															  class="resize-none form-control form-control-solid"
															  name="resultPerformance"></textarea>
													<!--end::Input-->
												</div>

											</div>
											<div class="separator border-1"></div>

											<!--begin::Repeater-->
											<div id="products">
												<!--begin::Form group-->
												<div class="form-group">
													<div>
														<div class="form-group row my-3">
															<div class="col-md-4">
																<label class="form-label">??r??n:</label>
																<select required
																		name="productID"
																		readonly disabled
																		class="form-control form-control-solid mb-2 mb-md-0 ">
																	<?php
																	foreach ($sortedProducts as $product) {
																		?>
																		<option value="<?= $product["productId"] ?>"><?= $product["name"] ?></option>
																		<?php
																	}
																	?>
																</select>
															</div>
															<div class="col-md-4">
																<label class="form-label">Miktar:</label>
																<div class="row">
																	<div class="col">
																		<input readonly disabled type="number"
																			   name="amount" required value="1"
																			   class="form-control form-control-solid mb-2 mb-md-0"/>
																	</div>
																	<div class="col">
																		<select readonly disabled required
																				class="form-control-solid form-control"
																				name="unitID" id="">
																			<option value="">L??tfen Se??in</option>
																			<?php
																			foreach ($units as $unit) {
																				?>
																				<option value="<?= $unit["unitId"] ?>"><?= $unit["name"] ?></option>
																				<?php
																			}
																			?>
																		</select>
																	</div>

																</div>
															</div>
															<div class="col-md-3 col-sm-12 fv-row ">
																<!--begin::Label-->
																<label class="fw-bold fs-6 mb-2">Durum</label>
																<!--end::Label-->
																<!--begin::Input-->
																<select readonly disabled name="tpStatus" id=""
																		class="form-control form-control-solid">
																	<option value="0">Devam Ediyor</option>
																	<option value="1">Olumlu Sonu??</option>
																	<option value="2">Olumsuz Sonu??</option>
																</select>
																<!--end::Input-->
															</div>
														</div>
													</div>
												</div>
												<!--end::Form group-->


											</div>
											<!--end::Repeater-->
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
									<a target="_blank" href="" class="btn btn-light-primary" id="goToSale">
										<span class="indicator-label">Sat????'a Git</span>
										<span class="indicator-progress">L??tfen Bekleyin
																		<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</a>
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
		</div>

		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>
