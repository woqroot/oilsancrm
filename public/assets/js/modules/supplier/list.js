$(document).ready(function () {

	var t = $("#suppliers-table").DataTable({
		info: !0,
		order: [],
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
				orderable: !1, targets: 5
			}
		],
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": hostUrl + "suppliers/ajax",
			"type": "POST",

		}
	}).on("draw",function(){
		KTMenu.createInstances();
	});

	document.querySelector('[data-table-action="search"]').addEventListener("keyup", (function (e) {
		t.search(e.target.value).draw();
	}));

	$(document).on("click", ".copyThis", function () {

		var text = $(this).data("text");
		var TempText = document.createElement("input");
		TempText.value = text;
		document.body.appendChild(TempText);
		TempText.select();

		document.execCommand("copy");
		document.body.removeChild(TempText);

		Swal.fire({
			title: 'Başarılı',
			text: 'Telefon numarası kopyalandı!',
			icon: 'success',
			allowOutsideClick: false,
			showCancelButton: false,
			cancelButtonText: 'Kapat'
		})
	})

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
			$("[name='supplierType']").val("INDIVIDUAL");
			$("[data-np-type='CORPORATE']").hide(250);
			$("[data-np-type='INDIVIDUAL']").show(250);

		} else {

			var requiredFields = ["companyName"];
			$("[name='supplierType']").val("CORPORATE");
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


	$("#addSupplierForm").on("submit", function (e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: hostUrl + "suppliers",
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

	$('button[data-kt-user-table-filter="filter"]').on("click",function(){
		t.draw();
	})
})
