$(document).ready(function(){
	var selectCountry = $(".selectCountry").select2({
		dropdownParent: "#kt_modal_edit_user",
		placeholder: "Ülke Seçimi",
		allowClear: true
	});


	$(".selectCity").select2({
		dropdownParent: "#kt_modal_edit_user",
		placeholder: "Şehir Seçimi",
		allowClear: true
	});

	$("#sales-table,#trialproducts-table").DataTable();

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
					$('.goToSale').attr('href',hostUrl + 'sales/' + res.data.fkSale)
				}
			}
		})

		$("#editTrialProductModal").modal("show");
	})

	$(document).on("submit","#addContactForm",function (e) {
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
						window.location.reload();
					});

				} else {
					Swal.fire({
						icon: 'error',
						text: res.message,
						showConfirmButton: !1,
						cancelButtonText: "Kapat",
						showCancelButton: !1,
						allowOutsideClick: !1
					}).then(r => {
						window.location.reload();
					})
				}

				$("button").prop("disabled", false);

			}
		})

	})

	let selectCustomerGroup = $(".selectCustomerGroup").select2({
		dropdownParent: "#kt_modal_edit_user",
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
		dropdownParent: "#kt_modal_edit_user",
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

	setTimeout(function (){
		// alert<($("input[name='old_District']").val());

	}, 2500);

	function checkInputs() {
		$(".selectDistrict").val($("input[name='old_District']").val()).trigger("change");
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

	$("#editCustomerForm").on("submit", function (e) {
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


})
