$(document).ready(function(){
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

	var tab = $("#kt_roles_view_table").DataTable({
		"info": false,
		'order': [],
		"pageLength": 10,
		"lengthChange": false,
		'columnDefs': [
			{
				"targets": [ 2 ],
				"visible": false
			}// Disable ordering on column 6 (actions)
		]
	});

	document.querySelector('[data-kt-roles-table-filter="search"]').addEventListener("keyup", (function (e) {
		tab.search(e.target.value).draw()
	}))
})
