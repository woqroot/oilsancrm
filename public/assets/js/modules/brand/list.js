$(document).ready(function () {

	let table = $(".np-datatable").DataTable({
		language: {
			url: hostUrl + 'public/assets/plugins/custom/datatables/datatables.language-tr.json'
		}
	});


	$(document).on('click', '.np-delete', function (e) {
		e.preventDefault();
		var rowid = $(this).closest("tr").data("id");
		Actions.delete();
		Swal.fire({
			icon: 'warning',
			title: 'Silmek istediğinize emin misiniz?',
			showConfirmButton: !0,
			showCancelButton: !0,
			cancelButtonText: "Vazgeç",
			confirmButtonText: "Sil",
		}).then((result) => {
			if (result.isConfirmed === true) {
				$.ajax({
					type: "POST",
					url: hostUrl + "brands",
					dataType: "json",
					data: {
						action: "DELETE",
						id: rowid
					},
					success: function (res) {
						if(res.status == 1){
							reloadPage();
							Swal.fire({
								icon: 'success',
								text: res.message,
								showConfirmButton: !1,
								cancelButtonText: "Kapat",
								showCancelButton: !0,
								allowOutsideClick: !1
							}).then((result) => {
								window.location.reload();
							});
						}
					}
				})
			}
		})
	})

	$(document).on("click", ".np-add", function (e) {
		e.preventDefault();
		$("#primaryModal").modal("show");

		$("#primaryModal").find(".modal-title").html("Yeni Oluştur");
		$("#primaryForm").find("input,select,radio").val("").trigger("change");
		$("#primaryForm").find("[name='action']").val("ADD");

	})

	$(document).on("click", ".np-edit", function (e) {
		e.preventDefault();
		var rowid = $(this).closest("tr").data("id");

		$("#primaryModal").modal("show");

		$("#primaryModal").find(".modal-title").html("Düzenle");
		$("#primaryForm").find("input,select,radio").val("").trigger("change");
		$("#primaryForm").find("[name='action']").val("EDIT");

		$.ajax({
			type: "POST",
			url: hostUrl + "brands",
			dataType: "json",
			data: {
				id: rowid,
				action: "FIND"
			},
			success: function (res) {
				if (res.status === 1) {
					$("#primaryForm").find("[name='title']").val(res.data.title);
					$("#primaryForm").find("[name='id']").val(res.data.brandId);

				}
			}
		})

	})

	$("#primaryForm").on("submit", function (e) {
		e.preventDefault();

		$.ajax({
			type: "POST",
			url: hostUrl + "brands",
			dataType: "json",
			data: new FormData(this),
			contentType: false,
			processData: false,
			cache: false,
			beforeSend: function () {
				$("button").prop("disabled", true);
			},
			success: function (res) {

				if (res.status === 1) {
					reloadPage();
					Swal.fire({
						icon: 'success',
						text: res.message,
						showConfirmButton: !1,
						cancelButtonText: "Kapat",
						showCancelButton: !0,
						allowOutsideClick: !1
					}).then((result) => {
						window.location.reload();
					});

					$("#primaryModal").modal("hide");


				}

				$("button").prop("disabled", false);

			}
		})


	})
	const filterSearch = document.querySelector('.np-search-table');
	filterSearch.addEventListener('keyup', function (e) {
		table.search(e.target.value).draw();
	});
})
