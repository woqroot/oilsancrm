$(document).ready(function () {
	const documentTitle = "PimakCRM - Talep Listesi";

	var t = $("#missions-table").DataTable({
		info: !0,
		order: [],
		lengthMenu: [10,25,50,100,500,1000,2000],
		dom: 'Blfrtip',
		buttons: [
			{
				extend: 'excelHtml5',
				title: documentTitle,
				exportOptions: {
					columns: ['.printThis']
				}
			},
			{
				extend: 'csvHtml5',
				title: documentTitle,
				exportOptions: {
					columns: ['.printThis']
				}
			},
			{
				extend: 'pdfHtml5',
				title: documentTitle,
				exportOptions: {
					columns: ['.printThis']
				}
			}
		],
		columnDefs: [
			{
				orderable: !1, targets: 0
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
			},
			{
				orderable: !0, targets: 5
			}
		],
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": hostUrl + "missions/ajax",
			"data": function (d) {
				d.statusID = $("#filterStatusID").val();
				d.userID = $("#filterUserID").val();
				d.countryID = $("#filterCountryID").val();
				d.dateBetween = $("#kt_daterangepicker_1").val();

			},
			"type": "POST",

		}
	}).on("draw", function () {
		KTMenu.createInstances();
	});

	var exportButtons = () => {
		var buttons = new $.fn.dataTable.Buttons(t, {

		}).container().appendTo($('#kt_datatable_example_1_export'));

		// Hook dropdown menu click event to datatable export buttons
		const exportButtons = document.querySelectorAll('#kt_datatable_example_1_export_menu [data-kt-export]');
		exportButtons.forEach(exportButton => {
			exportButton.addEventListener('click', e => {
				e.preventDefault();

				// Get clicked export value
				const exportValue = e.target.getAttribute('data-kt-export');
				const target = document.querySelector('.dt-buttons .buttons-' + exportValue);

				// Trigger click event on hidden datatable export buttons
				target.click();
			});
		});
	}

	exportButtons();

	var start = moment('2020-01-01');
	var end = moment('2029-12-31');

	function cb(start, end) {
		$("#kt_daterangepicker_1").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
	}


	$("#kt_daterangepicker_1").daterangepicker({
		startDate: start,
		endDate: end,
		ranges: {
			"Tüm Zamanlar": [moment('2022-09-01'), moment('2029-12-31')],
			"Bugün": [moment(), moment()],
			"Dün": [moment().subtract(1, "days"), moment().subtract(1, "days")],
			"Son 7 gün": [moment().subtract(6, "days"), moment()],
			"Son 30 gün": [moment().subtract(29, "days"), moment()],
			"Bu ay": [moment().startOf("month"), moment().endOf("month")],
			"Geçen ay": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
		},
		parentEl: '#kkmenu',
		locale: {
			format: "DD/MM/YYYY"
		}
	}, cb);

	cb(start, end);

	$(document).on("click",".deleteMission",function(e){
		e.preventDefault();
		var id = $(this).data("id");
		Swal.fire({
			title: 'Emin misiniz?',
			text: "Bu talebi kalıcı olarak silmek istediğinize emin misiniz?",
			icon: "warning",
			confirmButtonText: "Sil",
			cancelButtonText: "Vazgeç",
			showCancelButton: !0
		}).then(r => {
			if (r.isConfirmed === true) {
				$.ajax({
					type: "POST",
					url: hostUrl + "missions",
					data: {
						"action": "DELETE",
						"id": id
					},
					dataType: "json",
					success: function (res) {
						if (res.status === 1) {
							Swal.fire('Başarılı!', res.message, 'success').then(r => {
								window.location.reload();
							});
						} else {
							Swal.fire('Hata!', res.message, 'error').then(r => {
								window.location.reload();
							});
						}


					}
				})
			}
		})
	})


	document.querySelector('[data-table-action="search"]').addEventListener("keyup", (function (e) {
		t.search(e.target.value).draw();
	}));



	var selectCountry = $(".selectCountry").select2({
		dropdownParent: "#kt_modal_add_user",
		placeholder: "Ülke Seçimi",
		allowClear: true
	});


	$(".selectCity").select2({
		dropdownParent: "#kt_modal_add_user",
		placeholder: "Şehir Seçimi",
		allowClear: true
	});

	let selectCustomerGroup = $(".selectCustomerGroup").select2({
		dropdownParent: "#kt_modal_add_user",
		placeholder: "Seçim Yok",
		tags: false,
		allowClear: true
	});

	$(".selectCity").on("change", function () {
		$(".selectDistrict").val(null).trigger("change");
	})


	// setTimeout(function () {
	// 	$(".selectCountry").val("1").trigger("change");
	// }, 750);


	$(".selectDistrict").select2({
		dropdownParent: "#kt_modal_add_user",
		placeholder: "İlçe Seçimi",
		allowClear: true,
		tags: false,
		language: {
			searching: function () {
				return "Aranıyor...";
			},
			"noResults": function () {
				return "Sonuç bulunamadı";
			},
			"errorLoading": function () {
				return 'Önce şehir seçmelisiniz.';
			}
		},
		ajax: {
			url: hostUrl + "districts/search",
			type: "POST",
			dataType: 'json',
			quietMillis: 50,
			data: function (term) {

				return {
					term: term,
					cityId: $(".selectCity").val()
				};
			},
			processResults: function (data) {
				var res = data.items.map(function (item) {
					return {
						id: item.id,
						text: item.text
					};
				});
				return {
					results: res
				};
			}
		}
	});

	function checkInputs() {
		$("input,select").removeAttr("required");
		if ($(".select-individual").hasClass("active")) {
			var requiredFields = ["firstName", "lastName"];
			$("[name='customerType']").val("INDIVIDUAL");
			$("[data-np-type='CORPORATE']").hide(250);
			$("[data-np-type='INDIVIDUAL']").show(250);

		} else {

			var requiredFields = ["companyName"];
			$("[name='customerType']").val("CORPORATE");
			$("[data-np-type='INDIVIDUAL']").hide(250);
			$("[data-np-type='CORPORATE']").show(250);
		}

		$.each(requiredFields, function (index, item) {
			$("[name='" + item + "']").prop("required", true);
		})
	}

	checkInputs();

	$(document).on("click", "[name='type']", function () {
		checkInputs();
	})

	$(document).on("change", ".selectCountry", function (e) {
		if ($(this).val() == 1) {
			$(".selectCity,.selectDistrict").closest(".fv-row").show(250);
		} else {
			$(".selectCity,.selectDistrict").closest(".fv-row").hide(250);
		}
	})


	$("#addCustomerForm").on("submit", function (e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: hostUrl + "customers",
			dataType: "json",
			data: new FormData(this),
			contentType: false,
			processData: false,
			cache: false,
			beforeSend: function () {
				// $("button").prop("disabled", true);
			},
			success: function (res) {

				if (res.status === 1) {

					Swal.fire({
						icon: 'success',
						text: res.message,
						showConfirmButton: !1,
						cancelButtonText: "Kapat",
						showCancelButton: !0,
						allowOutsideClick: !1
					}).then((result) => {
						window.location.href = res.redirectUrl;
					});

				} else {
					Swal.fire({
						icon: 'error',
						text: res.message,
						showConfirmButton: !1,
						cancelButtonText: "Kapat",
						showCancelButton: !1,
						allowOutsideClick: !1
					})
				}

				$("button").prop("disabled", false);

			}
		})

	})
	$("#addCustomerGroupForm").on("submit", function (e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: hostUrl + "customer-groups",
			dataType: "json",
			data: new FormData(this),
			contentType: false,
			processData: false,
			cache: false,
			beforeSend: function () {
				$("button").prop("disabled", true);
			},
			success: function (res) {
				$("#addCustomerGroupForm input[name='title']").val("");

				if (res.status === 1) {
					var data = {
						id: res.data.customerGroupId,
						text: res.data.title
					};

					var newOption = new Option(data.text, data.id, true, true);
					selectCustomerGroup.append(newOption).trigger('change');

					$("#addCustomerGroupModal").modal("hide");
					Swal.fire({
						icon: 'success',
						text: res.message,
						showConfirmButton: !1,
						cancelButtonText: "Kapat",
						showCancelButton: !0,
						allowOutsideClick: !1
					}).then((result) => {

					});

				}

				$("button").prop("disabled", false);

			}
		})

	})
	$(document).on("click", ".np-add", function (e) {
		e.preventDefault();
		$("#kt_modal_add_user").modal("show");

		$("#kt_modal_add_user").find(".modal-title").html("Yeni Müşteri Grubu Oluştur");
		$("#kt_modal_add_user form").find("input,select,radio").val("").trigger("change");
		$("#kt_modal_add_user form").find("[name='action']").val("ADD");

	})



	setTimeout(function () {
		selectCountry.val(1).trigger("change");
	}, 1000);

	$('button[data-kt-user-table-filter="filter"]').on("click", function () {
		t.draw();
	})
})
