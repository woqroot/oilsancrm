"use strict";
var KTUsersAddRole = function () {
	const t = document.getElementById("kt_modal_add_role"), e = t.querySelector("#kt_modal_add_role_form"),
		n = new bootstrap.Modal(t);
	return {
		init: function () {
			(() => {
				var o = FormValidation.formValidation(e, {
					fields: {title: {validators: {notEmpty: {message: "Geçerli bir rol ismi girmelisiniz."}}}},
					plugins: {
						trigger: new FormValidation.plugins.Trigger,
						bootstrap: new FormValidation.plugins.Bootstrap5({
							rowSelector: ".fv-row",
							eleInvalidClass: "",
							eleValidClass: ""
						})
					}
				});
				t.querySelector('[data-kt-roles-modal-action="close"]').addEventListener("click", (t => {
					n.hide();
				})), t.querySelector('[data-kt-roles-modal-action="cancel"]').addEventListener("click", (t => {
					t.preventDefault(), e.reset(), n.hide()
				}));
				const r = t.querySelector('[data-kt-roles-modal-action="submit"]');
				r.addEventListener("click", (function (t) {
					t.preventDefault(), o && o.validate().then((function (t) {
						"Valid" == t ? (r.setAttribute("data-kt-indicator", "on"), r.disabled = !0,
							$.ajax({
								type: "POST",
								url: hostUrl + "roles/add",
								dataType: "json",
								data: $(e).serialize(),
								success: function (res) {
									r.removeAttribute("data-kt-indicator"), r.disabled = !1;
									if (res.status === 1) {
										Swal.fire({
											text: "Yeni rol kaydı başarıyla oluşturuldu!",
											icon: "success",
											buttonsStyling: !1,
											confirmButtonText: "Tamam",
											allowOutsideClick: false,
											customClass: {confirmButton: "btn btn-primary"}
										}).then((function (t) {
											t.isConfirmed && window.location.reload();
										}))
									} else {
										Swal.fire({
											text: "Bir hata oluştu.",
											icon: "error",
											buttonsStyling: !1,
											confirmButtonText: "Tekrar dene",
											customClass: {confirmButton: "btn btn-primary"}
										})
									}
								}
							})) : Swal.fire({
							text: "Formda boş alan bırakmadan tekrar deneyiniz.",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "OK!",
							customClass: {confirmButton: "btn btn-primary"}
						})
					}))
				}))
			})(), (() => {
				const t = e.querySelector("#kt_roles_select_all"), n = e.querySelectorAll('[type="checkbox"]');
				t.addEventListener("change", (t => {
					n.forEach((e => {
						e.checked = t.target.checked
					}))
				}))
			})()
		}
	}
}();
KTUtil.onDOMContentLoaded((function () {
	KTUsersAddRole.init()
}));



KTUtil.onDOMContentLoaded(function () {
	const modal = document.querySelector("#editModal");
	const t = document.querySelector("#edit_select_all"), n = modal.querySelectorAll('[type="checkbox"]');
	t.addEventListener("change", (t => {
		n.forEach((e => {
			e.checked = t.target.checked
		}))
	}))

	$(document).on("click", ".editButton", function () {
		var roleId = $(this).data("id");
		$.ajax({
			type: "POST",
			url: hostUrl + "roles/find",
			dataType: "json",
			data: {
				id: roleId
			},
			beforeSend: function () {
				$("#editModal .form-check-input").prop("checked", false).trigger("change");
				$("button").prop("disabled", true);
			},
			error: function () {
				$("button").prop("disabled", false);
				Swal.fire({
					text: "Bir hata oluştu.",
					icon: "error",
					buttonsStyling: !1,
					confirmButtonText: "Tekrar dene",
					customClass: {confirmButton: "btn btn-primary"}
				})
			},
			success: function (res) {

				$("#editModal input[name='roleId']").val(roleId);

				$("button").prop("disabled", false);
				$("#editModal input[name='title']").val(res.title);
				$.each(res.permissions.all, function (index, item) {
					$("#editModal .form-check-input[name='permissions[" + item.permissionId + "]']").prop("checked", true).trigger("change");
				})

				if ($("#editModal .row .form-check-input").length == $("#editModal .row .form-check-input:checked").length ) {
					$("#editModal #edit_select_all").prop("checked",true).trigger("change");
				}else{
					$("#editModal #edit_select_all").prop("checked",false).trigger("change");
				}

				if(res.isEditable == 0){
					$("#editModal .form-check-input").prop("disabled",true).trigger("change");
					$("#editModal button[type='submit']").prop("disabled",true);
				}else{
					$("#editModal .form-check-input").prop("disabled",false).trigger("change");
					$("#editModal button[type='submit']").prop("disabled",false);
				}

			}
		})

		$("#editModal").modal("show");
	})

	$(document).on("submit", "#editForm", function (e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: hostUrl + "roles/update",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				$("button").prop("disabled", true);
			},
			error: function () {
				$("button").prop("disabled", false);
				Swal.fire({
					text: "Bir hata oluştu.",
					icon: "error",
					buttonsStyling: !1,
					confirmButtonText: "Tekrar dene",
					customClass: {confirmButton: "btn btn-primary"}
				})
			},
			success: function (res) {
				$("button").prop("disabled", false);

				if (res.status === 1) {
					Swal.fire({
						text: "Değişiklikler başarıyla kaydedildi!",
						icon: "success",
						buttonsStyling: !1,
						confirmButtonText: "Tamam",
						allowOutsideClick: false,
						customClass: {confirmButton: "btn btn-primary"}
					}).then((function (t) {
						t.isConfirmed && window.location.reload();
					}))
				} else {
					Swal.fire({
						text: "Bir hata oluştu.",
						icon: "error",
						buttonsStyling: !1,
						confirmButtonText: "Tekrar dene",
						customClass: {confirmButton: "btn btn-primary"}
					})
				}
			}
		})
	})

	$(document).on("click", ".deleteRole", function (e) {
		var element = this;
		e.preventDefault();
		Swal.fire({
			title: "Bu rol kaydını silmek istediğinize emin misiniz?",
			icon: "warning",
			buttonsStyling: !1,
			confirmButtonText: "Tamam",
			cancelButtonText: "Vazgeç",
			showCancelButton: true,
			allowOutsideClick: false,
			customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-light"}
		}).then((function (t) {
			if (t.isConfirmed) {
				$.ajax({
					type: "POST",
					url: hostUrl + "roles/delete",
					dataType: "json",
					data: {
						roleId: $(element).data("id")
					},
					beforeSend: function () {
						$("button").prop("disabled", true);
					},
					error: function () {
						$("button").prop("disabled", false);
					},
					success: function (res) {
						$("button").prop("disabled", false);
						if (res.status === 1) {
							$(element).closest(".col-md-4").fadeOut(1000);


							Swal.fire({
								text: res.message,
								icon: "success",
								buttonsStyling: !1,
								confirmButtonText: "Tamam",
								allowOutsideClick: false,
								customClass: {confirmButton: "btn btn-primary"}
							})
						} else {
							Swal.fire({
								text: res.message,
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Kapat",
								allowOutsideClick: false,
								customClass: {confirmButton: "btn btn-light"}
							})
						}
					}
				});


			}
		}))
	})
})
