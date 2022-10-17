$(document).ready(function () {


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

	var t = $("#sales-table").DataTable({
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
			"url": hostUrl + "sales/ajax",
			"data": function(d){
				d.statusID = $("#filterStatus").val();
				d.userID = $("#filterUser").val();
				d.dateBetween = $("#kt_daterangepicker_1").val();
			},
			"type": "POST",

		}
	}).on("draw",function(){
		KTMenu.createInstances();
	});
	$('button[data-kt-user-table-filter="filter"]').on("click",function(){
		t.draw();
	})
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
