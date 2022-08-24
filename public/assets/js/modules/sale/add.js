"use strict";
var KTAppInvoicesCreate = function () {
	let rounder = (num) => {
		// var decimals = num % parseFloat(num);
		// console.log(num + " - " + num % parseFloat(num));
		// if (decimals >= 0.951) {
		// 	return Math.ceil(num);
		// }else if (decimals <= 0.049) {
		// 	return Math.floor(num);
		// }
		return num;
	}
	let rx = wNumb({mark: ',', decimals: 4, thousand: "."});

	var sc, v, e, t = function () {
		var t = [].slice.call(e.querySelectorAll('[data-kt-element="items"] [data-kt-element="item"]')), b = 0, a = 0,
			n = wNumb({mark: ',', decimals: 2, thousand: "."});
		t.map((function (e) {
			var t = e.querySelector('[data-kt-element="quantity"]'), l = e.querySelector('[data-kt-element="price"]'),
				r = n.from(l.value),
				v = e.querySelector('[data-kt-element="vat"]');
			r = !r || r < 0 ? 0 : r;
			var i = parseFloat(t.value);
			console.log(rx.to(rx.from(l.value)));
			i = !i || i < 0 ? 1 : i, t.value = i, e.querySelector('[data-kt-element="total"]').value = n.to(rounder((r * i) + (r * i * (parseFloat(v.value)) / 100))), a += (r * i), b += (r * i) + (r * i * (parseFloat(v.value)) / 100)
		})), e.querySelector('[data-kt-element="sub-total"]').innerText = n.to(rounder(a)), e.querySelector('[data-kt-element="grand-total"]').innerText = n.to(rounder(b)), e.querySelector('[data-kt-element="vat-total"]').innerText = n.to(rounder(b - a))
	}, a = function () {
		if (0 === e.querySelectorAll('[data-kt-element="items"] [data-kt-element="item"]').length) {
			var t = e.querySelector('[data-kt-element="empty-template"] tr').cloneNode(!0);
			e.querySelector('[data-kt-element="items"] tbody').appendChild(t)
		} else KTUtil.remove(e.querySelector('[data-kt-element="items"] [data-kt-element="empty"]'))
	}, z = function () {
		var t = [].slice.call(e.querySelectorAll('[data-kt-element="items"] [data-kt-element="item"]')), b = 0, a = 0,
			n = wNumb({mark: ',', decimals: 4, thousand: "."});
		t.map((function (e) {
			var total = e.querySelector('[data-kt-element="total"]');
			var price = e.querySelector('[data-kt-element="price"]');
			var quantity = e.querySelector('[data-kt-element="quantity"]');
			var vatPercent = e.querySelector('[data-kt-element="vat"]');
			price.value = n.to((n.from(total.value) / (100 + parseFloat(vatPercent.value)) * 100) / parseFloat(quantity.value));
			// $decimal / (100 + $vatPercent) * 100;
			var t = e.querySelector('[data-kt-element="quantity"]'), l = e.querySelector('[data-kt-element="price"]'),
				r = n.from(l.value),
				v = e.querySelector('[data-kt-element="vat"]');
			r = !r || r < 0 ? 0 : r;
			var i = parseFloat(t.value);
			i = !i || i < 0 ? 1 : i, t.value = i, a += (r * i), b += (r * i) + (r * i * (parseFloat(v.value)) / 100)
		})), e.querySelector('[data-kt-element="sub-total"]').innerText = n.to(rounder(a)), e.querySelector('[data-kt-element="grand-total"]').innerText = n.to(rounder(b)), e.querySelector('[data-kt-element="vat-total"]').innerText = n.to(rounder(b - a))

	};
	return {
		init: function (n) {

			(e = document.querySelector("#kt_invoice_form")).querySelector('[data-kt-element="items"] [data-kt-element="add-item"]').addEventListener("click", (function (n) {
				n.preventDefault();
				var l = e.querySelector('[data-kt-element="item-template"] tr').cloneNode(!0);
				e.querySelector('[data-kt-element="items"] tbody').appendChild(l), $('[data-bs-toggle="tooltip"]').tooltip(), $("input[data-input-type='decimal']").on({
					keyup: function () {
						formatCurrency($(this));
					},
					blur: function () {

						formatCurrency($(this), "blur");
					}
				}), a(), t(), productAutoCompleteInstance()
			})), KTUtil.on(e, '[data-kt-element="items"] [data-kt-element="remove-item"]', "click", (function (e) {
				e.preventDefault(), KTUtil.remove(this.closest('[data-kt-element="item"]')), a(), t()
			})), KTUtil.on(e, '[data-kt-element="items"] [data-kt-element="quantity"], [data-kt-element="items"] [data-kt-element="price"]', "keyup", (function (e) {
				e.preventDefault(), t()
			})), KTUtil.on(e, '[data-kt-element="items"], [data-kt-element="quantity"], [data-kt-element="items"], [data-kt-element="price"], [data-kt-element="vat"]', "change", (function (e) {
				e.preventDefault(), t()
			})), KTUtil.on(e, '[data-kt-element="price"]', "keyup", (function (e) {
				var start = this.selectionStart;
				var end = this.selectionEnd;

				this.value = rx.to(rx.from(this.value)) ? rx.to(rx.from(this.value)) : "";
				this.setSelectionRange(start,end);

			})), KTUtil.on(e, '[data-kt-element="total"]', "keyup", (function (e) {
				z();
				// $('[data-kt-element="price"]').trigger("keyup");
				// t();
			})), $(e.querySelector('[name="invoiceDate"]')).flatpickr({
				enableTime: !1,
				dateFormat: "d M Y",
				defaultDate: "today",
				locale: {
					firstDayOfWeek: 1,
					weekdays: {
						longhand: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
						shorthand: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt']
					},
					months: {
						longhand: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
						shorthand: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki', 'Kas', 'Ara']
					},
					today: 'Bugün',
					clear: 'Temizle'
				}
			}), $(document.querySelector('.collectDate')).flatpickr({
				enableTime: !1,
				dateFormat: "d M Y",
				locale: {
					firstDayOfWeek: 1,
					weekdays: {
						longhand: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
						shorthand: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt']
					},
					months: {
						longhand: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
						shorthand: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki', 'Kas', 'Ara']
					},
					today: 'Bugün',
					clear: 'Temizle'
				}
			}), t(), sc = $(".selectCustomer").select2({
				tags: false,
				language: {
					searching: function () {
						return "Aranıyor...";
					},
					inputTooShort: function () {
						return "En az 3 karakter girmelisiniz";
					},
					"noResults": function () {
						return "Sonuç bulunamadı";
					}
				},
				placeholder: "Müşteri Seçimi",
				ajax: {
					url: hostUrl + "customers/search",
					dataType: 'json',
					type: "POST",
					quietMillis: 50,
					data: function (term) {

						return {
							term: term
						};
					},
					processResults: function (data) {
						var res = data.items.map(function (item) {
							return {
								id: item.id,
								text: item.name
							};
						});
						return {
							results: res
						};
					}
				}
			});
			$(".selectCustomer").on("change", function () {
				$.ajax({
					type: "POST",
					url: hostUrl + "customers",
					dataType: "json",
					data: {
						id: $(this).val(),
						action: "FIND_FOR_INVOICE"
					},
					beforeSend() {
						$(".customerInformation").find(".name").html("");
						$(".customerInformation").find(".address").html("");
						$(".customerInformation").find(".addressAgain").html("");
						$(".customerInformation").find(".taxInformation").html("");

					},
					success: function (res) {
						if (res.status) {
							$(".customerInformation").find(".name").html('<span class="editCustomer cursor-pointer badge badge-sm text-hover-primary badge-light-primary"><i class="fa fa-edit"></i></span> ' + res.data.name);
							$(".customerInformation").find(".address").html(res.data.address);
							$(".customerInformation").find(".addressAgain").html(res.data.addressAgain);
							$(".customerInformation").find(".taxInformation").html(res.data.taxInformation);
						}
					}
				})

			});
			let sDistrict = $(".selectDistrict").select2({
				dropdownParent: "#primaryCustomerModal",
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

			$(document).on("click", ".editCustomer", function () {

				$.ajax({
					type: "POST",
					url: hostUrl + "customers",
					dataType: "json",
					data: {
						id: $(".selectCustomer").val(),
						action: "FIND"
					},
					success: function (res) {
						if (res.status == 1) {
							$("#primaryCustomerModal").find(".formTitle").html("Müşteri Bilgilerini Düzenle");

							if (res.data.type == "INDIVIDUAL") {
								$(".select-individual").click();
								$("[name='type']").val("INDIVIDUAL").trigger("change");

								$("[data-np-type='CORPORATE']").hide();
								$("[data-np-type='INDIVIDUAL']").show();
							} else {
								$(".select-corporate").click();
								$("[name='type']").val("CORPORATE").trigger("change");

								$("[data-np-type='CORPORATE']").show();
								$("[data-np-type='INDIVIDUAL']").hide();
							}
							$("#primaryCustomerModal").find("[name='action']").val("EDIT_IN_INVOICE");
							$("#primaryCustomerModal").find("[name='customerID']").val(res.data.customerId);
							$("#primaryCustomerModal").find("[name='name']").val(res.data.name);
							$("#primaryCustomerModal").find("[name='email']").val(res.data.email);
							if (res.data.type == "INDIVIDUAL") {
								$("#primaryCustomerModal").find("[name='identityNumber']").val(res.data.taxNumber);
							} else {
								$("#primaryCustomerModal").find("[name='taxNumber']").val(res.data.taxNumber);
							}
							$("#primaryCustomerModal").find("[name='taxOffice']").val(res.data.taxOffice);
							$("#primaryCustomerModal").find("[name='address']").val(res.data.address);
							$("#primaryCustomerModal").find("[name='fkCountry']").val(res.data.fkCountry).trigger("change");
							$("#primaryCustomerModal").find("[name='fkCity']").val(res.data.fkCity).trigger("change");
							$("#primaryCustomerModal").find("[name='fkCustomerGroup']").val(res.data.fkCustomerGroup).trigger("change");

							const newOption = new Option(res.data.districtName, res.data.fkDistrict, true, true);
							sDistrict.append(newOption).trigger('change');
							$("#primaryCustomerModal").find("[name='fkDistrict']").val(res.data.fkDistrict).trigger("change");
							$("#primaryCustomerModal").find("[name='name']").val(res.data.name);

						}
					}
				})

				$("#primaryCustomerModal").modal("show");
			});

			$(".addCustomerButton").on("click", function () {

				clearForm();
				// $("#primaryCustomerModal [name='name']").val("");
				$("#primaryCustomerModal").find("[name='action']").val("ADD");
				// $("#primaryCustomerModal").find("[name='customerID']").val("");
				$("#primaryCustomerModal").find(".formTitle").html("Hızlı Müşteri Oluştur");
				$("#primaryCustomerModal").modal("show");

			})

			function clearForm() {
				var inputNames = ["name", "email", "address", "fkCustomerGroup", "fkCity", "fkDistrict", "taxNumber", "taxOffice", "identityNumber"];
				$.each(inputNames, function (index, item) {
					$("[name='" + item + "']").val("").trigger("change");
				})
				$("[name='fkCountry']").val("1").trigger("change");

				$("[name='type']").val("INDIVIDUAL").trigger("change");
				$(".select-individual").click();

			}

			$(".selectCity").select2({
				dropdownParent: "#primaryCustomerModal",
				placeholder: "Şehir Seçimi",
				allowClear: true
			});
			$(".selectCustomerGroup").select2({
				dropdownParent: "#primaryCustomerModal",
				placeholder: "Seçim Yok",
				allowClear: true
			});
			$(document).on("change", ".selectCountry", function (e) {
				if ($(this).val() == 1) {
					$(".selectCity,.selectDistrict").closest(".fv-row").show(250);
				} else {
					$(".selectCity,.selectDistrict").closest(".fv-row").hide(250);
				}
			})
			var selectCountry = $(".selectCountry").select2({
				dropdownParent: "#primaryCustomerModal",
				placeholder: "Ülke Seçimi",
				allowClear: true
			});
			$(".selectCity").on("change", function () {
				$(".selectDistrict").val(null).trigger("change");
			});

			let productAutoCompleteInstance = () => {
				$(".productInput").autocomplete({


					serviceUrl: hostUrl + '/Product/search',
					onSelect: function (suggestion) {
						$(this).data("id", suggestion.id);
						// clearNewProductInput($(this));
						checkProductData(this);

					},

				});
			}

			$(".productInput").autocomplete({


				serviceUrl: hostUrl + '/Product/search',
				onSelect: function (suggestion) {
					$(this).data("id", suggestion.id);
					// clearNewProductInput($(this));
					checkProductData(this);

				},

			});
			$(document).ready(function () {
				selectCurrency();
			})

			function isCollected() {
				if ($('[name="isCollected"]').is(":checked")) {
					$('.selectAccount').prop("checked", true);
					$('.collectDate').prop("checked", true);
					$(".fkAccountWrapper").show(250);
				} else {
					$('.selectAccount').prop("checked", false);
					$('.collectDate').prop("checked", false);
					$(".fkAccountWrapper").hide(250);
				}
			}

			$("[name='isCollected']").on("change", isCollected);
			isCollected();

			function selectCurrency() {
				$(".currencySymbol").html($(".selectCurrency option:selected").data("symbol"));
				$.ajax({
					type: "POST",
					url: hostUrl + "accounts",
					dataType: "json",
					data: {
						action: "FIND_BY_CURRENCY",
						currencyID: $(".selectCurrency").val()
					},
					success: function (res) {
						$('select[name="fkAccount"]').html("");
						var newOption = new Option("Lütfen Seçin", "", false, false);
						$('select[name="fkAccount"]').append(newOption).trigger('change');
						$.each(res.data, function (index, item) {
							console.log(item);
							var newOption = new Option(item.name, item.accountId, false, false);
							$('select[name="fkAccount"]').append(newOption).trigger('change');
						});
						$('select[name="fkAccount"]').trigger("change");

					}
				})
			}

			$(".selectCurrency").on("change", function () {
				selectCurrency();
			})

			function checkProductData(input) {
				if ($(input).val().length == 0) {
					clearNewProductInput($(input));
					return true;
				}
				$.ajax({
					type: "POST",
					url: hostUrl + "products",
					dataType: "json",
					data: {
						action: "FIND_BY_NAME",
						name: $(input).val()
					},
					success: function (res) {
						var parent = $(input).closest("tr");
						if (res.status === 1) {

							$(input).parent().find(".inputInfoTag").find("i").attr("data-bs-original-title", res.data.info);
							parent.find('[data-kt-element="unit"]').val(res.data.fkUnit).trigger("change");
							if(res.data.stockTracking === 'ACTIVE'){
								parent.find('[data-kt-element="unit"]').prop('disabled',true);
							}
							parent.find('[data-kt-element="vat"]').val(res.data.vatPercent).trigger("change");
							if ($(".selectCurrency").val() == res.data.fkCurrency) {
								parent.find('[data-kt-element="price"]').val(res.data.unitPrice).trigger("change");
								t();
							}
							clearNewProductInput($(input));

						} else {
							parent.find('[data-kt-element="unit"]').prop('disabled',false);

							parent.find('[data-kt-element="unit"]').val(parent.find('[data-kt-element="unit"] option:first').attr("value")).trigger("change");
							drawNewProductInput($(input));
						}
					}
				})
			}

			$(document).on("keyup", ".productInput", function (e) {
				checkProductData(this);
			})
			$(document).on("change", '[data-kt-element="vat"]', function (e) {
				t();
			})

			function clearNewProductInput(input) {
				input.removeClass("border-success");
				input.parent().find(".inputNewTag").hide();
				if (input.val().length > 0) {
					input.parent().find(".inputInfoTag").show();
				} else {
					input.parent().find(".inputInfoTag").hide();
				}
			}

			function drawNewProductInput(input) {
				input.addClass("border-success");
				input.parent().find(".inputNewTag").show();
				input.parent().find(".inputInfoTag").hide();

			}

			$(document).on("click", "#kt_invoice_submit_button", function (e) {
				e.preventDefault();
				$("#kt_invoice_form").submit();
			})

			$(document).on("submit", "#kt_invoice_form", function (e) {

				let formData = new FormData(this);
				e.preventDefault();
				formData.append("action", "ADD");
				formData.append("fkCurrency", $(".selectCurrency").val());
				formData.append("isCollected", $(".isCollected").is(":checked") ? 1 : 0);
				formData.append("fkAccount", $(".selectAccount").val());
				formData.append("collectDate", $(".collectDate").val());
				formData.append("invoiceDocument", $("[name='invoiceDocument']")[0].files[0]);
				$.ajax({
					type: "POST",
					url: hostUrl + "sales",
					dataType: "json",
					data: formData,
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
							}).then((r) => {

								window.location.href = hostUrl + "sales/" + res.data.saleId;

							});
							setTimeout(function () {
								window.location.href = hostUrl + "sales/" + res.data.saleId;
							}, 3000);

						} else {
							Swal.fire({
								icon: 'error',
								text: res.message,
								showConfirmButton: !1,
								cancelButtonText: "Kapat",
								showCancelButton: !0,
								allowOutsideClick: !1
							})
						}
						$("button").prop("disabled", false);

					}
				})

			})
			$("#primaryCustomerForm").on("submit", function (e) {
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
						$("button").prop("disabled", true);
					},
					success: function (res) {

						if (res.status === 1) {
							clearForm();
							$("#primaryCustomerModal").modal("hide");

							Swal.fire({
								icon: 'success',
								text: res.message,
								showConfirmButton: !1,
								cancelButtonText: "Kapat",
								showCancelButton: !0,
								allowOutsideClick: !1
							}).then((result) => {

								var newOption = new Option(res.name, res.id, true, true);
								sc.append(newOption).trigger('change');
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


		}
	}
}();
KTUtil.onDOMContentLoaded((function () {
	KTAppInvoicesCreate.init()
}));
$(document).ready(function () {
	function checkInputs() {
		$("input,select").removeAttr("required");
		if ($(".select-individual").hasClass("active")) {

			var requiredFields = ["name", "identityNumber", "fkCountry"];
			$("[name='customerType']").val("INDIVIDUAL");

			$("[data-np-type='CORPORATE']").hide(250);
			$("[data-np-type='INDIVIDUAL']").show(250);

		} else {

			var requiredFields = ["name", "taxNumber", "fkCountry"];
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
})
