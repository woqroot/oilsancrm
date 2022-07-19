


$(document).ready(function () {
	checkInputs();

	$(".selectBank").select2({
		dropdownParent: "#primaryModal",
		placeholder: "Banka Seçimi",
		allowClear: false
	});
	$(".selectCurrency").select2({
		dropdownParent: "#primaryModal",
		placeholder: "Döviz Cinsi",
		allowClear: false
	});
	$(".selectCurrency").on("change", function () {
		if($(this).children(":checked").html()){
			var currency = $(this).children(":checked").html().slice(-1);
		}else{
			var currency = "₺";
		}

		$("[name='initialBalance']").prev("span").html(currency);
	})
setTimeout(function(){
	$(".selectCurrency").val(1).trigger("change");

},1000)
	function checkInputs() {


		$("input,select").removeAttr("required");
		if ($("#selectTypeCASH").is(":checked")) {

			var requiredFields = [];
			$("input[name='name']").parent().removeClass("col-md-6");
			$("input[name='name']").parent().addClass("col-md-12");
			$("[name='accountType']").val("CASH");
			$("[data-np-type='BANK']").hide(250);
			$("[data-np-type='CASH']").show(250);
			$(".selectBank").prop("required", false);

		} else {
			$("input[name='name']").parent().removeClass("col-md-12");
			$("input[name='name']").parent().addClass("col-md-6");
			$(".selectBank").prop("required", true);
			var requiredFields = ["bankID"];
			$("[name='accountType']").val("BANK");
			$("[data-np-type='CASH']").hide(250);
			$("[data-np-type='BANK']").show(250);
		}
		// $(".selectCurrency").prop("required",true);


	}

	$(document).on("click", ".np-add", function (e) {


		$("#primaryForm").find("input[type='radio']").prop("disabled",false);
		$("#primaryForm").find("input,select").prop("disabled",false);

		$("#primaryForm").find('#selectTypeBANK').click();
		e.preventDefault();
		$("#primaryModal").modal("show");

		$("#primaryModal").find(".modal-title").html("Yeni Oluştur");
		$("#primaryForm").find("input,select,radio").val("").trigger("change");
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
						}else{
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

	Inputmask({
		"mask": "TR99 9999 9999 9999 9999 9999 99",
		"placeholder": "TR__ ____ ____ ____ ____ ____ __",
		"autoUnmask" : true
	}).mask("[name='bankIBAN']");


	$("#primaryForm").on("submit", function (e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: hostUrl + "accounts",
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



	$(document).on("click", ".np-edit", function (e) {
		e.preventDefault();
		$("#primaryForm").find("input,select").prop("disabled",false);
		var rowid = $(this).closest("tr").data("id");

		$("#primaryModal").modal("show");

		$("#primaryModal").find(".modal-title").html("Düzenle");
		$("#primaryForm").find("input,select,radio").val("").trigger("change");
		$("#primaryForm").find("[name='action']").val("EDIT");
		$("#primaryForm").find("[name='id']").val(rowid);

		$.ajax({
			type: "POST",
			url: hostUrl + "accounts",
			dataType: "json",
			data: {
				id: rowid,
				action: "FIND"
			},
			success: function (res) {

				if (res.status === 1) {

					var inputID = "selectType" + res.data.type;
					$("#primaryForm").find("#"+inputID).click();
					$("#primaryForm").find("input[type='radio']").prop("disabled",true);
					$("#primaryForm").find("[name='name']").val(res.data.name);
					$("#primaryForm").find("[name='bankBranch']").val(res.data.bankBranch);
					$("#primaryForm").find("[name='bankIBAN']").val(res.data.bankIban);
					$("#primaryForm").find("[name='initialBalance']").val(res.data.initialBalance).prop("disabled",true);
					$("#primaryForm").find("[name='bankAccountNumber']").val(res.data.bankAccountNumber);
					$("#primaryForm").find("[name='bankID']").val(res.data.fkBank).trigger("change");
					$("#primaryForm").find("[name='currencyID']").val(res.data.fkCurrency).trigger("change").prop("disabled",true);

				}
			}
		})

	})



	var t = $("#np-datatable").DataTable();

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
			text: 'IBAN numarası başarıyla kopyalandı!',
			icon: 'success',
			allowOutsideClick: false,
			showCancelButton: false,
			cancelButtonText: 'Kapat'
		})
	})
})
