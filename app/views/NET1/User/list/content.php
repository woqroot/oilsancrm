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
							<input type="text" data-kt-user-table-filter="search"
								   class="form-control form-control-solid w-250px ps-14" placeholder="Search user"/>
						</div>
						<!--end::Search-->
					</div>
					<!--begin::Card title-->
					<!--begin::Card toolbar-->
					<div class="card-toolbar">
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
							<div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
								<!--begin::Header-->
								<div class="px-7 py-5">
									<div class="fs-5 text-dark fw-bolder">Filter Options</div>
								</div>
								<!--end::Header-->
								<!--begin::Separator-->
								<div class="separator border-gray-200"></div>
								<!--end::Separator-->
								<!--begin::Content-->
								<div class="px-7 py-5" data-kt-user-table-filter="form">
									<!--begin::Input group-->
									<div class="mb-10">
										<label class="form-label fs-6 fw-bold">Rol Seçimi:</label>
										<select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
												data-placeholder="Seçim Yapın" data-allow-clear="true"
												data-kt-user-table-filter="role" data-hide-search="true">
											<option></option>
											<?php
											foreach ($roles as $role) {
												?>
												<option value="<?= $role["title"] ?>"><?= $role["title"] ?></option>
												<?php
											}
											?>
										</select>
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="mb-10">
										<label class="form-label fs-6 fw-bold">Durum:</label>
										<select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
												data-placeholder="Seçim Yapın" data-allow-clear="true"
												data-kt-user-table-filter="two-step" data-hide-search="true">
											<option></option>
											<option value="Çevrimiçi">Çevrimiçi</option>
											<option value="Çevrimdışı">Çevrimdışı</option>
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
							<button type="button" class="btn btn-primary" data-bs-toggle="modal"
									data-bs-target="#kt_modal_add_user">
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
						<!--begin::Modal - Adjust Balance-->
						<div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
							<!--begin::Modal dialog-->
							<div class="modal-dialog modal-dialog-centered mw-650px">
								<!--begin::Modal content-->
								<div class="modal-content">
									<!--begin::Modal header-->
									<div class="modal-header">
										<!--begin::Modal title-->
										<h2 class="fw-bolder">Export Users</h2>
										<!--end::Modal title-->
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary"
											 data-kt-users-modal-action="close">
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

								</div>
								<!--end::Modal content-->
							</div>
							<!--end::Modal dialog-->
						</div>
						<!--end::Modal - New Card-->
						<!--begin::Modal - Add task-->
						<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
							<!--begin::Modal dialog-->
							<div class="modal-dialog modal-dialog-centered modal-lg">
								<!--begin::Modal content-->
								<div class="modal-content">
									<!--begin::Modal header-->
									<div class="modal-header" id="kt_modal_add_user_header">
										<!--begin::Modal title-->
										<h2 class="fw-bolder">Yeni Oluştur <span data-bs-toggle="tooltip" data-bs-placement="right" title="Personel detay bilgileri hesabı oluşturduktan sonra kaydedilebilir."><i class="fa fa-info-circle fs-4 my-3"></i></span></h2>
										<!--end::Modal title-->
										<!--begin::Close-->
										<div class="btn btn-icon btn-sm btn-active-icon-primary"
											 data-kt-users-modal-action="close">
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
										<form id="addUserForm" enctype="multipart/form-data" class="form" action="#">
											<!--begin::Scroll-->
											<div class="d-flex flex-column scroll-y me-n7 pe-7"
												 id="kt_modal_add_user_scroll" data-kt-scroll="true"
												 data-kt-scroll-activate="{default: false, lg: true}"
												 data-kt-scroll-max-height="auto"
												 data-kt-scroll-dependencies="#kt_modal_add_user_header"
												 data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
												 data-kt-scroll-offset="300px">
												<!--begin::Input group-->
												<div class="fv-row  ">
													<div class="row">
														<div class="col-sm-12 text-center col-lg-3">
															<!--begin::Image input-->
															<div class="mt-6 image-input image-input-outline image-input-empty"
																 data-kt-image-input="true"
																 style="background-image: url('<?= assets_url() ?>media/svg/avatars/blank.svg')">
																<!--begin::Preview existing avatar-->
																<div class="image-input-wrapper w-125px h-125px"
																	 style=""></div>
																<!--end::Preview existing avatar-->
																<!--begin::Label-->
																<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
																	   data-kt-image-input-action="change"
																	   data-bs-toggle="tooltip" title="Profil Fotoğrafını Değiştir">
																	<i class="bi bi-pencil-fill fs-7"></i>
																	<!--begin::Inputs-->
																	<input type="file" name="image"
																		   accept=".png, .jpg, .jpeg"/>
																	<input type="hidden" name="avatar_remove"/>
																	<!--end::Inputs-->
																</label>
																<!--end::Label-->
																<!--begin::Cancel-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
																	  data-kt-image-input-action="cancel"
																	  data-bs-toggle="tooltip" title="Cancel avatar">
																				<i class="bi bi-x fs-2"></i>
																			</span>
																<!--end::Cancel-->
																<!--begin::Remove-->
																<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
																	  data-kt-image-input-action="remove"
																	  data-bs-toggle="tooltip" title="Remove avatar">
																				<i class="bi bi-x fs-2"></i>
																			</span>
																<!--end::Remove-->
															</div>
															<!--end::Image input-->
															<!--begin::Hint-->
															<!--end::Hint-->
														</div>
														<div class="col-sm-12 col-lg-9 row">
															<div class="col-md-6 col-sm-12 fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-bold fs-6 mb-2">Ad</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="firstName" maxlength="49"
																	   class="form-control form-control-solid mb-3 mb-lg-0"
																	   placeholder="" value=""/>
																<!--end::Input-->
															</div>
															<div class="col-md-6 col-sm-12 fv-row mb-7">
																<!--begin::Label-->
																<label class="required fw-bold fs-6 mb-2">Soyad</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="lastName"
																	   class="form-control form-control-solid mb-3 mb-lg-0"
																	   placeholder="" value=""/>
																<!--end::Input-->
															</div>
															<div class="col-md-6 col-sm-12 fv-row mb-3">
																<!--begin::Label-->
																<label class="required fw-bold fs-6 mb-2">E-Posta
																	Adresi</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="email" name="email"
																	   class="form-control form-control-solid mb-3 mb-lg-0"
																	   placeholder="" value=""/>
																<!--end::Input-->
															</div>
															<!--begin::Input group-->
															<div class="col-md-6 col-sm-12 fv-row mb-3">
																<!--begin::Label-->
																<label class="fw-bold fs-6 mb-2">Telefon
																	Numarası</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" name="phone"
																	   class="form-control form-control-solid mb-3 mb-lg-0 maskPhone"
																	   placeholder="" value=""/>
																<!--end::Input-->
															</div>
															<!--end::Input group-->
														</div>
													</div>
												</div>
												<!--end::Input group-->
												<div class="row">
													<div class="fv-row row mb-7" data-kt-password-meter="true">
														<h4 class="mt-8 mb-8">Parola Belirleme</h4>
														<!--begin::Input group-->
														<div class="col-md-6 col-sm-12 fv-row mb-7">
															<!--begin::Label-->
															<label class="fw-bold fs-6 mb-2">Parola</label>
															<!--end::Label-->
															<!--begin::Input-->
															<div class="position-relative mb-3">
																<input class=" form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off">
																<span class="showHidePassword btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
																	<i class="bi bi-eye-slash fs-2"></i>
																	<i class="bi bi-eye fs-2 d-none"></i>
																</span>
															</div>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="col-md-6 col-sm-12 fv-row mb-7"  data-kt-password-meter="true">
															<!--begin::Label-->
															<label class="fw-bold fs-6 mb-2">Parola (tekrar)</label>
															<!--end::Label-->
															<!--begin::Input-->
															<div class="position-relative mb-3">
																<input class="form-control form-control-lg form-control-solid" type="password" name="rePassword" autocomplete="off">
																<span style="opacity: 0" class="showHidePassword2 btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
																	<i class="bi bi-eye-slash fs-2"></i>
																	<i class="bi bi-eye fs-2 d-none"></i>
																</span>
															</div>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
													</div>
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fw-bold fs-6 mb-5">Rol Seçimi</label>
														<!--end::Label-->
														<!--begin::Roles-->
														<?php
														foreach ($roles as $role) {
															?>
															<!--begin::Input row-->
															<div class="d-flex fv-row">
																<!--begin::Radio-->
																<div class="form-check form-check-custom form-check-solid">
																	<!--begin::Input-->
																	<input class="form-check-input me-3" name="roleID"
																		   type="radio" value="<?=$role["roleId"]?>"
																		   id="editModalRole<?=$role["roleId"]?>"
																	/>
																	<!--end::Input-->
																	<!--begin::Label-->
																	<label class="form-check-label"
																		   for="editModalRole<?=$role["roleId"]?>">
																		<div class="fw-bolder text-gray-800"><?= $role["title"] ?>
																		</div>
																		<div class="text-gray-600">
																			<?php


																			foreach ($role["permissions"]["preview"] as $permission) {
																				?>
																				<span class="badge badge-light-primary"><?= $permission["title"] ?></span>
																				<?php
																			}
																			$countMore = count($role["permissions"]["all"]) - count($role["permissions"]["preview"]);
																			if ($countMore > 0) {
																				?>
																				<span data-bs-toggle="tooltip"
																					  data-bs-placement="bottom"
																					  title="<?= implode(", ", array_map(function ($item) {
																						  return $item["title"];
																					  }, $role["permissions"]["all"])) ?>"
																					  class="badge badge-light-success">+2 daha</span>
																				<?php
																			}
																			?>
																		</div>
																	</label>
																	<!--end::Label-->
																</div>
																<!--end::Radio-->
															</div>
															<!--end::Input row-->
															<div class='separator separator-dashed my-5'></div>
															<!--end::Input row-->
															<?php
														}
														?>
														<!--end::Roles-->
													</div>
													<!--end::Input group-->
												</div>
											</div>
											<!--end::Scroll-->
											<!--begin::Actions-->
											<div class="text-center pt-15">
												<button type="reset" class="btn btn-light me-3"
														data-kt-users-modal-action="cancel">Kapat
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
					<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
						<!--begin::Table head-->
						<thead>
						<!--begin::Table row-->
						<tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
							<th class="text-center w-50px pe-2">
								#
							</th>
							<th class="min-w-125px">Kullanıcı</th>
							<th class="min-w-125px">Rol</th>
							<th>Durum</th>
							<th class="min-w-125px">Telefon Numarası</th>
							<th class="min-w-125px">Son Görülme</th>
							<th class="text- min-w-100px">İşlem</th>
						</tr>
						<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody class="text-gray-600 fw-bold">
						<?php
						$counter = 1;
						foreach ($users as $user) {
							?>
							<!--begin::Table row-->
							<tr>
								<td class="text-center ">
									<?= $counter++; ?>
								</td>
								<td class="d-flex align-items-center">
									<!--begin:: Avatar -->
									<div class="position-relative me-3">
										<div class="symbol w-50px symbol-circle symbol-50px overflow-hidde">
											<a href="javascript:void(0)">
												<?= getAvatar($user) ?>
											</a>
										</div>
										<?= isOnline($user["lastSeenAt"], true) ?>
									</div>
									<!--end::Avatar-->
									<!--begin::User details-->
									<div class="d-flex flex-column">
										<a href="javascript:void(0)"
										   class="text-gray-800 text-hover-primary mb-1"><?= $user["firstName"] . " " . $user["lastName"] ?></a>
										<span><?= $user["email"] ?></span>
									</div>
									<!--begin::User details-->
								</td>
								<!--end::User=-->
								<td><?= showRole($user["role"]) ?></td>
								<td><?= isOnline($user["lastSeenAt"]) ? "Çevrimiçi" : "Çevrimdışı"; ?></td>
								<td><?= private_str(phoneMask($user["phone"]), 7, 3) ?></td>
								<td>
									<div class="badge badge-light fw-bolder"><?= convertDateTime($user["lastSeenAt"]) ?></div>
								</td>
								<td class="text-">
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
											<a href="<?=base_url("users/".$user["userId"])?>"
											   class="menu-link px-3">Görüntüle</a>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<a href="javascript:void(0)" class="menu-link px-3"
											   data-kt-users-table-filter="delete_row">Sil</a>
										</div>
										<!--end::Menu item-->
									</div>
									<!--end::Menu-->
								</td>
								<!--end::Action=-->
							</tr>
							<!--end::Table row-->
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
