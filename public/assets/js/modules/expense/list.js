$(document).ready(function () {

	var t = $("#expenses-table").DataTable({
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
			"url": hostUrl + "expenses/ajax",
			"data": function(d){
				// d.customerGroupID = $("#filterCustomerGroup").val();
			},
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
})
