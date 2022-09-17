$(document).ready(function () {

	let table = $(".np-datatable").DataTable({
		language: {
			url: hostUrl + 'public/assets/plugins/custom/datatables/datatables.language-tr.json'
		},
		info: !0,
		order: [],
		columnDefs: [
			{
				orderable: !0, targets: 0
			},
			{
				orderable: !0, targets: 1
			},
			{
				orderable: !0, targets: 2
			},
			{
				orderable: !0, targets: 3
			},
			{
				orderable: !0, targets: 4
			}
		],
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": hostUrl + "trial-products/ajaxGeneral",
			"data": function (d) {

			},
			"type": "POST",

		}
	}).on("draw", function () {
		KTMenu.createInstances();
		$('.np-datatable tbody tr').each(function (index, item) {

			var status = $(item).find("span.tpStatus").data("status");

			if (status == 1) {
				$(this).addClass('bg-light-success');

			} else if (status == 2) {
				$(this).addClass('bg-light-danger');
			}else {
				$(this).addClass('bg-light-warning');
			}
		})
	});;

	$(document).on("click", ".editTrialProductButton", function () {
		var trialProductID = $(this).data('id');
		$.ajax({
			type: "POST",
			url: hostUrl + "trial-products",
			dataType: "json",
			data: {
				id: trialProductID,
				action: "FIND"
			},
			success: function (res) {
				if (res.status == 1) {
					$('#editTrialProductForm [name="trialProductID"]').val(res.data.trialProductId);
					$('#editTrialProductForm [name="department"]').val(res.data.department);
					$('#editTrialProductForm [name="author"]').val(res.data.author);
					$('#editTrialProductForm [name="equipment"]').val(res.data.equipment);
					$('#editTrialProductForm [name="expectedPerformance"]').val(res.data.expectedPerformance);
					$('#editTrialProductForm [name="resultPerformance"]').val(res.data.resultPerformance);
					$('#editTrialProductForm [name="startDate"]').flatpickr().setDate(res.data.startDate);
					$('#editTrialProductForm [name="endDate"]').flatpickr().setDate(res.data.endDate);
					$('#editTrialProductForm [name="amount"]').val(res.data.amount);
					$('#editTrialProductForm [name="notes"]').val(res.data.notes);
					$('#editTrialProductForm [name="tpStatus"]').val(res.data.tpStatus);
					$('#editTrialProductForm [name="unitID"]').val(res.data.fkUnit);
					$('#editTrialProductForm [name="productID"]').val(res.data.fkProduct).trigger("change");

					$("#goToSale").attr('href',hostUrl + 'sales/' + res.data.fkSale)
				}
			}
		})

		$("#editTrialProductModal").modal("show");
	})

	$(document).on('click', '.deleteTrialProduct', function (e) {
		e.preventDefault();
		var saleid = $(this).data("saleid");

		Swal.fire({
			icon: 'warning',
			title: 'Bu veriyi silmek için satış sayfasında işlem yapmalısınız.',
			showConfirmButton: !0,
			showCancelButton: !0,
			cancelButtonText: "Kapat",
			confirmButtonText: "Satış'a Git"
		}).then((result) => {
			if(result.isConfirmed){
				window.location.href = hostUrl + 'sales/' + saleid;
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
			url: hostUrl + "trial-products",
			dataType: "json",
			data: {
				id: rowid,
				action: "FIND"
			},
			success: function (res) {
				if (res.status === 1) {
					$("#primaryForm").find("[name='title']").val(res.data.title);
					$("#primaryForm").find("[name='id']").val(res.data.trialProductId);

				}
			}
		})

	})

	$("#primaryForm").on("submit", function (e) {
		e.preventDefault();

		$.ajax({
			type: "POST",
			url: hostUrl + "trial-products",
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
