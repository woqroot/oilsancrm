$(document).ready(function () {


	checkInputs();
	$(".selectUnit").select2({
		dropdownParent: "#primaryModal",
		placeholder: "Birim Seçimi",
		allowClear: false
	});

	$(".select2Init").select2({
		dropdownParent: "#primaryModal",
		placeholder: "Lütfen seçin",
		allowClear: false
	});

	$(".changeCurrency").on("click", function () {
		var currency = $(this).data("symbol");
		$("input[name='currencyID']").val($(this).data("id"));

		$(".currentCurrency").html(currency);
	})

	$(document).on("click", ".generateCode", function () {
		$('input[name=productCode]').val($(this).data("code"));
		$(this).hide(500);
	})
	$('input[name=productCode]').on("keyup", function () {
		$(".generateCode").show(500);
	})

	$(document).on("click", function () {
		checkInputs();
	})

	function checkInputs() {


		if ($("#selectTypeSERVICE").is(":checked")) {

			var requiredFields = [];
			$("[name='productType']").val("SERVICE");

			$("[data-np-type='PRODUCT']").hide(250);
			$("[data-np-type='SERVICE']").show(250);
			$("[data-np-type='STOCK_ACTIVE']").hide(250);
			$("[name='stockTracking']").val("PASSIVE");
		} else {


			var requiredFields = [];
			$("[name='productType']").val("PRODUCT");
			$("[data-np-type='SERVICE']").hide(250);
			$("[data-np-type='PRODUCT']").show(250);
			if ($("#stockActive").is(":checked")) {
				$("[data-np-type='STOCK_ACTIVE']").show(250);
				$("[name='initialStack']").prop("required", true);
				$("[name='stockTracking']").val("ACTIVE");

			} else {
				$("[data-np-type='STOCK_ACTIVE']").hide(250);
				$("[name='initialStack']").prop("required", false);
				$("[name='stockTracking']").val("PASSIVE");

			}
		}
		// $(".selectCurrency").prop("required",true);


	}

	$(document).on("click", ".np-add", function (e) {
		$("[data-edit-hidden='true']").removeClass("d-none");

		e.preventDefault();

		$("#primaryForm").find("input[type='radio']").prop("disabled", false);
		$("#primaryForm").find("input,select").prop("disabled", false);


		$("#primaryModal").modal("show");

		$("#primaryModal").find(".modal-title").html("Yeni Oluştur");
		$("#primaryForm").find("input,select ").val("").trigger("change");
		$(".selectVat").val("18").trigger("change");
		$("#primaryForm").find('#selectTypePRODUCT').click();

		$("#primaryForm").find("[name='currencyID']").val("1");
		$("#primaryForm").find("[name='action']").val("ADD");

	})

	$(document).on('click', '.np-delete', function (e) {
		e.preventDefault();
		var rowid = $(this).closest("tr").data("id");

		Swal.fire({
			icon: 'warning',
			title: 'Hesabı istediğinize emin misiniz?',
			text: 'Bu hesaba dair tüm hareketler kalıcı olarak silinecektir. ',
			showConfirmButton: !0,
			showCancelButton: !0,
			cancelButtonText: "Vazgeç",
			confirmButtonText: "Sil",
		}).then((result) => {
			if (result.isConfirmed === true) {
				$.ajax({
					type: "POST",
					url: hostUrl + "accounts",
					dataType: "json",
					data: {
						action: "DELETE",
						id: rowid
					},
					success: function (res) {
						if (res.status == 1) {
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
						} else {
							Swal.fire({
								icon: 'error',
								html: res.message,
								showConfirmButton: !1,
								cancelButtonText: "Kapat",
								showCancelButton: !0,
								allowOutsideClick: !1
							});
						}
					}
				})
			}
		})
	})

	$("input[type='radio']").on("click", function () {
		checkInputs();
	})


	$("#primaryForm").on("submit", function (e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: hostUrl + "products",
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
					})
				}

				$("button").prop("disabled", false);

			}
		})

	})
	let n = wNumb({mark: ',', decimals: 2, thousand: "."});
	$(document).on("keyup","[name='unitPrice']",function (e){
		e.preventDefault();
		var unit = n.from($(this).val());
		var vat = parseInt($("[name='vatPercent']").val());

		$("[name='totalPrice']").val(n.to(unit+(unit*vat/100)));
	})

	$(document).on("change","[name='vatPercent']",function (e){
		e.preventDefault();
		var unit = n.from($("[name='unitPrice']").val());
		var vat = parseInt($("[name='vatPercent']").val());

		$("[name='totalPrice']").val(n.to(unit+(unit*vat/100)));
	})

	$(document).on("keyup","[name='totalPrice']",function (e){
		e.preventDefault();
		var total = n.from($(this).val());
		var vat = parseInt($("[name='vatPercent']").val());

		$("[name='unitPrice']").val(n.to(total/(100+vat)*100));
	})

	$(document).on("click", ".np-edit", function (e) {

		$("[data-edit-hidden='true']").addClass("d-none");
		e.preventDefault();
		$("#primaryForm").find("input,select").prop("disabled", false);
		var rowid = $(this).closest("tr").data("id");

		$("#primaryModal").modal("show");

		$("#primaryModal").find(".modal-title").html("Düzenle");
		$("#primaryForm").find("input,select,radio").val("").trigger("change");
		$("#primaryForm").find("[name='action']").val("EDIT");
		$("#primaryForm").find("[name='id']").val(rowid);

		$.ajax({
			type: "POST",
			url: hostUrl + "products",
			dataType: "json",
			data: {
				id: rowid,
				action: "FIND"
			},
			success: function (res) {

				if (res.status === 1) {

					var inputID = "selectType" + res.data.type;
					$("#primaryForm").find("#" + inputID).click();
				
					$("[name=\"type\"]").prop("disabled",true);
					$("#primaryForm").find("[name='name']").val(res.data.name);
					$("#primaryForm").find("[name='unitPrice']").val(res.data.unitPrice);
					$("#primaryForm").find("[name='productCode']").val(res.data.productCode);
					$("#primaryForm").find("[name='currencyID']").val(res.data.fkCurrency).trigger("change");
					$("#primaryForm").find("[name='vatPercent']").val(res.data.vatPercent).trigger("change");
					$("#primaryForm").find("[name='unitID']").val(res.data.fkUnit).trigger("change");
					$("#primaryForm").find("[name='bankID']").val(res.data.fkBank).trigger("change");
					$("#primaryForm").find("[name='brandID']").val(res.data.fkBrand).trigger("change");
					$("#primaryForm").find("[name='productTypeID']").val(res.data.fkProductType).trigger("change");
					$("#primaryForm").find("[name='productFluidityID']").val(res.data.fkProductFluidity).trigger("change");
					$("#primaryForm").find("[name='productPackID']").val(res.data.fkProductPack).trigger("change");
					$("#primaryForm").find(".currentCurrency").html(res.data.currencySymbol);

					var unit = n.from($("[name='unitPrice']").val());
					var vat = parseInt($("[name='vatPercent']").val());

					$("[name='totalPrice']").val(n.to(unit+(unit*vat/100)));

					// $("#primaryForm").find("[name='currencyID']").val(res.data.fkCurrency).trigger("change").prop("disabled", true);
					if(res.data.stockTracking == "ACTIVE"){
						$("#stockPassive").prop("checked", false);
						$("#stockActive").prop("checked", true);
						$("#primaryForm").find(".stockActiveLabel").click();
					}else{
						$("#stockActive").prop("checked", false);
						$("#stockPassive").prop("checked", true);
						$("#primaryForm").find(".stockPassiveLabel").click();
					}
				}
			}
		})

	})


	var t = $("#np-datatable").DataTable();

	document.querySelector('[data-table-action="search"]').addEventListener("keyup", (function (e) {
		t.search(e.target.value).draw();
	}));


})
