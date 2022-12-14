"use strict";
var KTAppInvoicesCreate = function () {
	let rounder = (num) => {
		// var decimals = num % parseFloat(num);
		// console.log(num + " - " + num % parseFloat(num));
		// if (decimals >= 0.951) {
		// 	return Math.ceil(num);
		// } else if (decimals <= 0.049) {
		// 	return Math.floor(num);
		// }
		return num;
	}
	let rx = wNumb({mark: ',', decimals: 4, thousand: "."});
	let rxtwo = wNumb({mark: ',', decimals: 2, thousand: "."});

	var sc, v, e, t = function () {
		var t = [].slice.call(e.querySelectorAll('[data-kt-element="items"] [data-kt-element="item"]')), b = 0, a = 0,
			n = wNumb({mark: ',', decimals: 2, thousand: "."});
		t.map((function (e) {
			var t = e.querySelector('[data-kt-element="quantity"]'), l = e.querySelector('[data-kt-element="price"]'),
				r = n.from(l.value),
				v = e.querySelector('[data-kt-element="vat"]');
			r = !r || r < 0 ? 0 : r;
			var i = parseFloat(t.value);
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
			})),
				KTUtil.on(e, '[data-kt-element="items"] [data-kt-element="quantity"], [data-kt-element="items"] [data-kt-element="price"]', "keyup", (function (e) {
					e.preventDefault(), t()
				})),
				KTUtil.on(e, '[data-kt-element="price"]', "keyup", (function (e) {
					var start = this.selectionStart;
					var end = this.selectionEnd;

					this.value = rx.to(rx.from(this.value)) ? rx.to(rx.from(this.value)) : "";
					this.setSelectionRange(start, end);

				})),
				KTUtil.on(e, '[data-kt-element="items"], [data-kt-element="quantity"], [data-kt-element="items"], [data-kt-element="price"], [data-kt-element="vat"]', "change", (function (e) {
					e.preventDefault(), t()
				})),
				KTUtil.on(e, '[data-kt-element="total"]', "keyup", (function (e) {
					z();
					// $('[data-kt-element="price"]').trigger("keyup");
					// t();
				})), $(e.querySelector('[name="invoiceDate"]')).flatpickr({
				enableTime: !1,
				dateFormat: "d M Y",
				locale: {
					firstDayOfWeek: 1,
					weekdays: {
						longhand: ['Pazar', 'Pazartesi', 'Sal??', '??ar??amba', 'Per??embe', 'Cuma', 'Cumartesi'],
						shorthand: ['Paz', 'Pzt', 'Sal', '??ar', 'Per', 'Cum', 'Cmt']
					},
					months: {
						longhand: ['Ocak', '??ubat', 'Mart', 'Nisan', 'May??s', 'Haziran', 'Temmuz', 'A??ustos', 'Eyl??l', 'Ekim', 'Kas??m', 'Aral??k'],
						shorthand: ['Oca', '??ub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'A??u', 'Eyl', 'Eki', 'Kas', 'Ara']
					},
					today: 'Bug??n',
					clear: 'Temizle'
				}
			}), $(document.querySelector('.paymentDate')).flatpickr({
				enableTime: !1,
				dateFormat: "d M Y",
				defaultDate: "today",
				locale: {
					firstDayOfWeek: 1,
					weekdays: {
						longhand: ['Pazar', 'Pazartesi', 'Sal??', '??ar??amba', 'Per??embe', 'Cuma', 'Cumartesi'],
						shorthand: ['Paz', 'Pzt', 'Sal', '??ar', 'Per', 'Cum', 'Cmt']
					},
					months: {
						longhand: ['Ocak', '??ubat', 'Mart', 'Nisan', 'May??s', 'Haziran', 'Temmuz', 'A??ustos', 'Eyl??l', 'Ekim', 'Kas??m', 'Aral??k'],
						shorthand: ['Oca', '??ub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'A??u', 'Eyl', 'Eki', 'Kas', 'Ara']
					},
					today: 'Bug??n',
					clear: 'Temizle'
				}
			}), $(document.querySelector('.firstPaymentDate')).flatpickr({
				enableTime: !1,
				dateFormat: "d M Y",
				defaultDate: "today",
				locale: {
					firstDayOfWeek: 1,
					weekdays: {
						longhand: ['Pazar', 'Pazartesi', 'Sal??', '??ar??amba', 'Per??embe', 'Cuma', 'Cumartesi'],
						shorthand: ['Paz', 'Pzt', 'Sal', '??ar', 'Per', 'Cum', 'Cmt']
					},
					months: {
						longhand: ['Ocak', '??ubat', 'Mart', 'Nisan', 'May??s', 'Haziran', 'Temmuz', 'A??ustos', 'Eyl??l', 'Ekim', 'Kas??m', 'Aral??k'],
						shorthand: ['Oca', '??ub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'A??u', 'Eyl', 'Eki', 'Kas', 'Ara']
					},
					today: 'Bug??n',
					clear: 'Temizle'
				}
			}),  $(document.querySelector('.editPaymentDate')).flatpickr({
				enableTime: !1,
				dateFormat: "d M Y",
				defaultDate: "today",
				locale: {
					firstDayOfWeek: 1,
					weekdays: {
						longhand: ['Pazar', 'Pazartesi', 'Sal??', '??ar??amba', 'Per??embe', 'Cuma', 'Cumartesi'],
						shorthand: ['Paz', 'Pzt', 'Sal', '??ar', 'Per', 'Cum', 'Cmt']
					},
					months: {
						longhand: ['Ocak', '??ubat', 'Mart', 'Nisan', 'May??s', 'Haziran', 'Temmuz', 'A??ustos', 'Eyl??l', 'Ekim', 'Kas??m', 'Aral??k'],
						shorthand: ['Oca', '??ub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'A??u', 'Eyl', 'Eki', 'Kas', 'Ara']
					},
					today: 'Bug??n',
					clear: 'Temizle'
				}
			}), t(), sc = $(".selectSupplier").select2({
				tags: false,
				language: {
					searching: function () {
						return "Aran??yor...";
					},
					inputTooShort: function () {
						return "En az 3 karakter girmelisiniz";
					},
					"noResults": function () {
						return "Sonu?? bulunamad??";
					}
				},
				placeholder: "Tedarik??i Se??imi",
				ajax: {
					url: hostUrl + "suppliers/search",
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
			let periodTypeLabels = {
				monthly: 'Ayl??k',
				weekly: 'Haftal??k',
				yearly: 'Y??ll??k'
			};
			$(".editPaymentSelectAccount").select2({
				placeholder: "Kasa/Banka Se??imi",
				dropdownParent: "#editPaymentModal",
				allowClear: true
			});

			var addAutoPayment = () => {
				$(".submitAutoPaymentButton").show();
				$(".previewAutoPaymentButton").hide();
				// var budgetSlider = document.querySelector("#kt_modal_create_campaign_budget_slider");
				// var budgetValue = document.querySelector("#kt_modal_create_campaign_budget_label");
				//
				// noUiSlider.create(budgetSlider, {
				// 	start: [1],
				// 	connect: true,
				// 	range: {
				// 		"min": 1,
				// 		"max": 24
				// 	}
				// });
				//
				// budgetSlider.noUiSlider.on("update", function (values, handle) {
				// 	budgetValue.innerHTML = Math.round(values[handle]);
				// 	if (handle) {
				// 		budgetValue.innerHTML = Math.round(values[handle]);
				// 	}
				// });

				const options = document.querySelectorAll('[data-kt-docs-advanced-forms="interactive"]');
				options.forEach(option => {
					option.addEventListener('click', e => {
						e.preventDefault();

						$('[name="periodCount"]').val(e.target.innerText).trigger("change");
					});
				});

				function autoPaymentCalc() {
					$(".currentPeriodType").html(periodTypeLabels[$("[name='periodType']").val()]);
					$(".submitAutoPaymentButton").hide(500);
					$(".previewAutoPaymentButton").show(500);
					var periodTypes = {
						monthly: 'ay',
						weekly: 'hafta',
						yearly: 'y??l'
					};
					var periodType = periodTypes[$("#addPaymentAutoForm").find("[name='periodType']").val()];
					var periodCount = parseInt($("#addPaymentAutoForm").find("[name='periodCount']").val());
					if(getAutoPaymentType() === "INSTALLMENT"){

						if (!periodCount) {
							periodCount = 1;
							$("#addPaymentAutoForm").find("[name='periodCount']").val(1)
						}
						if (periodCount > 36) {
							periodCount = 1;
							$("#addPaymentAutoForm").find("[name='periodCount']").val(1);
							toastr.options = {
								"closeButton": false,
								"debug": true,
								"newestOnTop": true,
								"progressBar": true,
								"positionClass": "toastr-top-right",
								"preventDuplicates": true,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};

							toastr.error("Vade miktar?? 36'dan b??y??k olamaz.");
						}
						var totalAmount = $("#addPaymentAutoForm").find("[name='totalAmount']").val();


						$(".resultAmount").html(rxtwo.to(rxtwo.from(totalAmount) / parseInt(periodCount)));
						$(".resultPeriod").html(periodCount + " " + periodType);
					}else{

						if (!periodCount) {
							periodCount = 1;
							$("#addPaymentAutoForm").find("[name='periodCount']").val(1)
						}
						if (periodCount > 36) {
							periodCount = 1;
							$("#addPaymentAutoForm").find("[name='periodCount']").val(1);
							toastr.options = {
								"closeButton": false,
								"debug": true,
								"newestOnTop": true,
								"progressBar": true,
								"positionClass": "toastr-top-right",
								"preventDuplicates": true,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};

							toastr.error("Vade miktar?? 36'dan b??y??k olamaz.");
						}
						var periodAmount = $("#addPaymentAutoForm").find("[name='periodAmount']").val();

						console.log(periodAmount);
						$(".resultAmount").html(periodAmount);
						$(".resultPeriod").html(periodCount + " " + periodType);
					}


				}

				$("#addPaymentAutoForm input,select").on("keyup", function () {

					autoPaymentCalc();
				})
				$("#addPaymentAutoForm input,select").on("change", function () {
					autoPaymentCalc();
				})
				$(".currentPeriodType").html(periodTypeLabels[$("[name='periodType']").val()]);
			}

			addAutoPayment();

			const getAutoPaymentType = () => {
				return $("[name='autoPaymentType']:checked").val();
			}

			function checkAutoPaymentType() {
				if ($("[name='autoPaymentType']:checked").val() === 'INSTALLMENT') {
					$("#addPaymentAutoModal").find(".showOnRepeat").hide(400);
					$("#addPaymentAutoModal").find(".showOnInstallment").show(400);
				} else {
					$("#addPaymentAutoModal").find(".showOnInstallment").hide(400);
					$("#addPaymentAutoModal").find(".showOnRepeat").show(400);
				}


				$(".currentPeriodType").html(periodTypeLabels[$("[name='periodType']").val()]);
			}

			$("[name='autoPaymentType']").on("change", function () {
				checkAutoPaymentType();
			})
			$(".previewAutoPaymentButton").on("click", function (e) {
				var btn = this;
				$(btn).prop("disabled",true);
				$(".previewAutoPaymentButton").hide();
				$(".previewAutoPaymentButton").attr("data-kt-indicator", "on");
				setTimeout(function () {
					$("#addPaymentAutoForm").find("[name='action']").val('ADD_BULK_PREVIEW');
					e.preventDefault();
					$.ajax({
						type: "POST",
						url: hostUrl + "payments",
						dataType: "json",
						data: $("#addPaymentAutoForm").serialize(),
						success: function (res) {
							var tbody = $("#addPaymentAutoForm").find("tbody.previewData");
							tbody.html('');
							$.each(res.data, function (index, item) {
								setTimeout(function () {
									if (item.highlight) {

										toastr.options = {
											"closeButton": false,
											"debug": true,
											"newestOnTop": true,
											"progressBar": true,
											"positionClass": "toastr-top-right",
											"preventDuplicates": true,
											"onclick": null,
											"showDuration": "700",
											"hideDuration": "2000",
											"timeOut": "5000",
											"extendedTimeOut": "1000",
											"showEasing": "swing",
											"hideEasing": "linear",
											"showMethod": "fadeIn",
											"hideMethod": "fadeOut"
										};

										toastr.info(item.date + " tarihli ??deme i??in fiyat fark?? olu??tu.");
									}
									tbody.append('<tr class="' + (item.highlight ? "bg-light-warning" : "") + '">' +
										'<td>' + item.date + '</td>' +
										'<td class="">' + item.amount + '</td>' +
										'</tr>');
									if (index === (res.data.length - 1)) {
										$(".previewTotalResult").html(res.total);
									}
								}, (parseInt(index) * 100));


							})

							$(".previewAutoPaymentButton").attr("data-kt-indicator", "off");
							toastr.options = {
								"closeButton": false,
								"debug": true,
								"newestOnTop": true,
								"progressBar": true,
								"positionClass": "toastr-top-right",
								"preventDuplicates": true,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};

							toastr.success("??deme plan?? hesapland??.");

							$(".submitAutoPaymentButton").show();
							$(btn).prop("disabled",false);

						},
						error: function () {
							$(".previewAutoPaymentButton").attr("data-kt-indicator", "off");
							$(btn).prop("disabled",false);

						}
					})
				}, 1200)

			})
			$("#addPaymentAutoForm").on("submit", function (e) {

				$("#addPaymentAutoForm").find("[name='action']").val('ADD_BULK');
				e.preventDefault();
				$.ajax({
					type: "POST",
					url: hostUrl + "payments",
					dataType: "json",
					data: $("#addPaymentAutoForm").serialize(),
					success: function (res) {
						if(res.status === 1){
							toastr.options = {
								"closeButton": false,
								"debug": true,
								"newestOnTop": true,
								"progressBar": true,
								"positionClass": "toastr-top-right",
								"preventDuplicates": true,
								"onclick": null,
								"showDuration": "3000",
								"hideDuration": "1500",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
							};

							toastr.success(res.message);
							$('#addPaymentAutoForm').trigger("reset");
							$('#addPaymentAutoModal').find("tbody").html("");
							$('#addPaymentAutoModal').find(".previewTotalResult").html("-");
							$("select").trigger("change");
							$("#addPaymentAutoModal").modal("hide");
						}
					}
				})

			})
			$("#addPaymentAutoForm").find("[name='action']").val('ADD_BULK_PREVIEW');

			$(".selectSupplier").on("change", function () {
				$.ajax({
					type: "POST",
					url: hostUrl + "suppliers",
					dataType: "json",
					data: {
						id: $(this).val(),
						action: "FIND_FOR_INVOICE"
					},
					beforeSend() {
						$(".supplierInformation").find(".name").html("");
						$(".supplierInformation").find(".address").html("");
						$(".supplierInformation").find(".addressAgain").html("");
						$(".supplierInformation").find(".taxInformation").html("");

					},
					success: function (res) {
						if (res.status) {
							$(".supplierInformation").find(".name").html('<span class="editSupplier cursor-pointer badge badge-sm text-hover-primary badge-light-primary"><i class="fa fa-edit"></i></span> ' + res.data.name);
							$(".supplierInformation").find(".address").html(res.data.address);
							$(".supplierInformation").find(".addressAgain").html(res.data.addressAgain);
							$(".supplierInformation").find(".taxInformation").html(res.data.taxInformation);
						}
					}
				})

			});


			let sDistrict = $(".selectDistrict").select2({
				dropdownParent: "#primarySupplierModal",
				placeholder: "??l??e Se??imi",
				allowClear: true,
				tags: false,
				language: {
					searching: function () {
						return "Aran??yor...";
					},
					"noResults": function () {
						return "Sonu?? bulunamad??";
					},
					"errorLoading": function () {
						return '??nce ??ehir se??melisiniz.';
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
			$(document).on("click", ".editNoteButton", function () {
				var noteID = $(this).data('id');
				$.ajax({
					type: "POST",
					url: hostUrl + "notes",
					dataType: "json",
					data: {
						id: noteID,
						action: "FIND"
					},
					success: function (res) {
						if (res.status == 1) {
							$('#editNoteForm [name="noteID"]').val(res.data.noteId);
							$('#editNoteForm [name="explanation"]').val(res.data.explanation);
						}
					}
				})

				$("#editNoteModal").modal("show");
			})
			$(document).on("click", ".editSupplier", function () {

				$.ajax({
					type: "POST",
					url: hostUrl + "suppliers",
					dataType: "json",
					data: {
						id: $(".currentSupplier").html(),
						action: "FIND"
					},
					success: function (res) {
						if (res.status == 1) {
							$("#primarySupplierModal").find(".formTitle").html("M????teri Bilgilerini D??zenle");

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
							$("#primarySupplierModal").find("[name='action']").val("EDIT_IN_INVOICE");
							$("#primarySupplierModal").find("[name='supplierID']").val(res.data.supplierId);
							$("#primarySupplierModal").find("[name='name']").val(res.data.name);
							$("#primarySupplierModal").find("[name='email']").val(res.data.email);
							if (res.data.type == "INDIVIDUAL") {
								$("#primarySupplierModal").find("[name='identityNumber']").val(res.data.taxNumber);
							} else {
								$("#primarySupplierModal").find("[name='taxNumber']").val(res.data.taxNumber);
							}
							$("#primarySupplierModal").find("[name='taxOffice']").val(res.data.taxOffice);
							$("#primarySupplierModal").find("[name='address']").val(res.data.address);
							$("#primarySupplierModal").find("[name='fkCountry']").val(res.data.fkCountry).trigger("change");
							$("#primarySupplierModal").find("[name='fkCity']").val(res.data.fkCity).trigger("change");
							$("#primarySupplierModal").find("[name='fkSupplierGroup']").val(res.data.fkSupplierGroup).trigger("change");

							const newOption = new Option(res.data.districtName, res.data.fkDistrict, true, true);
							sDistrict.append(newOption).trigger('change');
							$("#primarySupplierModal").find("[name='fkDistrict']").val(res.data.fkDistrict).trigger("change");
							$("#primarySupplierModal").find("[name='name']").val(res.data.name);

						}
						$("input,select").removeAttr("required");
						if ($(".select-individual").hasClass("active")) {

							var requiredFields = ["name", "identityNumber", "fkCountry"];
							$("[name='supplierType']").val("INDIVIDUAL");

							$("[data-np-type='CORPORATE']").hide(250);
							$("[data-np-type='INDIVIDUAL']").show(250);

						} else {

							var requiredFields = ["name", "taxNumber", "fkCountry"];
							$("[name='supplierType']").val("CORPORATE");
							$("[data-np-type='INDIVIDUAL']").hide(250);
							$("[data-np-type='CORPORATE']").show(250);
						}

						$.each(requiredFields, function (index, item) {
							$("[name='" + item + "']").prop("required", true);
						})
					}
				})

				$("#primarySupplierModal").modal("show");
			});

			$(".addSupplierButton").on("click", function () {

				clearForm();
				// $("#primarySupplierModal [name='name']").val("");
				$("#primarySupplierModal").find("[name='action']").val("ADD");
				// $("#primarySupplierModal").find("[name='supplierID']").val("");
				$("#primarySupplierModal").find(".formTitle").html("H??zl?? M????teri Olu??tur");
				$("#primarySupplierModal").modal("show");

			})

			function clearForm() {
				var inputNames = ["name", "email", "address", "fkSupplierGroup", "fkCity", "fkDistrict", "taxNumber", "taxOffice", "identityNumber"];
				$.each(inputNames, function (index, item) {
					$("[name='" + item + "']").val("").trigger("change");
				})
				$("[name='fkCountry']").val("1").trigger("change");

				$("[name='type']").val("INDIVIDUAL").trigger("change");
				$(".select-individual").click();

			}

			$(".selectCity").select2({
				dropdownParent: "#primarySupplierModal",
				placeholder: "??ehir Se??imi",
				allowClear: true
			});
			$(".selectSupplierGroup").select2({
				dropdownParent: "#primarySupplierModal",
				placeholder: "Se??im Yok",
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
				dropdownParent: "#primarySupplierModal",
				placeholder: "??lke Se??imi",
				allowClear: true
			});
			$(".selectCity").on("change", function () {
				$(".selectDistrict").val(null).trigger("change");
			});

			let productAutoCompleteInstance = () => {
				$(".productInput").autocomplete({


					serviceUrl: '/Product/search',
					onSelect: function (suggestion) {
						$(this).data("id", suggestion.id);
						// clearNewProductInput($(this));
						checkProductData(this);

					},

				});
			}

			$(".productInput").autocomplete({


				serviceUrl: '/Product/search',
				onSelect: function (suggestion) {
					$(this).data("id", suggestion.id);
					// clearNewProductInput($(this));
					checkProductData(this);

				},

			});


			function selectCurrency() {
				$(".currencySymbol").html($(".currentCurrency").html());
			}

			selectCurrency();

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
							if (res.data.stockTracking === 'ACTIVE') {
								parent.find('[data-kt-element="unit"]').prop('disabled', true);
							}
							parent.find('[data-kt-element="vat"]').val(res.data.vatPercent).trigger("change");
							if ($(".currentCurrencyID").html() == res.data.fkCurrency) {
								parent.find('[data-kt-element="price"]').val(res.data.unitPrice).trigger("change");
								t();
							}
							clearNewProductInput($(input));

						} else {
							parent.find('[data-kt-element="unit"]').val(parent.find('[data-kt-element="unit"] option:first').attr("value")).trigger("change");
							drawNewProductInput($(input));
							parent.find('[data-kt-element="unit"]').prop('disabled', false);

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

			$(document).on("click", ".payments-datatable tbody tr", function (e) {
				var paymentId = $(this).find("td:eq(0)").find("span").data("id");

				$.ajax({
					type: "POST",
					url: hostUrl + "payments",
					dataType: "json",
					data: {
						action: "FIND",
						id: paymentId
					},
					success: function (res) {

						if (res.data.editable === true) {
							$("#editPaymentModal").find("input,select").prop("disabled", false);
							$("#editPaymentModal").find("[name='accountID']").prop("disabled", true);
							if (res.data.status === "PENDING") {
								$("#editPaymentModal").find("[name='paymentDate']").prop("disabled", false);
							} else {
								$("#editPaymentModal").find("[name='paymentDate']").prop("disabled", true);
							}
							$(".notEditable").hide();
						} else {
							$("#editPaymentModal").find("[name='amount']").prop("disabled", true);
							$("#editPaymentModal").find("[name='accountID']").prop("disabled", true);
							if (res.data.status === "PENDING") {
								$("#editPaymentModal").find("[name='paymentDate']").prop("disabled", false);
							} else {
								$("#editPaymentModal").find("[name='paymentDate']").prop("disabled", true);
							}
							$(".notEditable").show();
						}
						$("#editPaymentModal").find("[name='status']").val(res.data.status);
						$("#editPaymentModal").find("[name='paymentID']").val(res.data.paymentId);

						$("#editPaymentModal").find("[name='amount']").val(res.data.amount);
						$("#editPaymentModal").find("[name='accountID']").val(res.data.fkAccount).trigger("change");
						$("#editPaymentModal").find("[name='paymentDate']").val(res.data.paymentDate).trigger("change");
						$("#editPaymentModal").find("[name='explanation']").val(res.data.explanation).trigger("change");
						if (res.data.fileName) {

							$("#editPaymentModal").find(".fileDetails").show(500);
							$("#editPaymentModal").find(".fileDetails a").attr("href", res.data.fileName);

						} else {
							$("#editPaymentModal").find(".fileDetails").hide();
						}

						if (res.data.status === 'PENDING') {
							$("#editPaymentModal").find("#isPaid").prop('checked', false).prop("disabled", false).trigger("change");

						} else {
							$("#editPaymentModal").find("#isPaid").prop('checked', true).prop("disabled", true).trigger("change");

						}
						$("#editPaymentModal").modal("show");
					}
				})

			})

			$(document).on("change", "#isPaid", function (e) {
				if ($("#editPaymentModal").find("[name='status']").val() === 'PENDING') {
					if (e.target.checked === true) {
						$("#editPaymentModal").find(".showOnPaid").show(400);
						$("#editPaymentModal").find("[name='accountID']").prop("disabled", false);

					} else {
						$("#editPaymentModal").find("[name='accountID']").prop("disabled", true);

						$("#editPaymentModal").find(".showOnPaid").hide(400);
					}
				} else {
					$("#editPaymentModal").find("[name='accountID']").prop("disabled", true);

					$(".showOnPaid").show(400);
				}

			})


			$(document).on("change", "#isPaidNew", function (e) {

				if (e.target.checked === true) {
					$("#addPaymentModal").find(".showOnPaid").show(400);
					// $("#addPaymentModal").find(".showOnPaid").prop("disabled", false);

				} else {
					// $("#addPaymentModal").find(".showOnPaid").find("[name='accountID']").prop("disabled", true);

					$("#addPaymentModal").find(".showOnPaid").hide(400);
				}

			})
			// $("#editPaymentModal").modal("show");
			let paymentsTable = $(".payments-datatable").DataTable({
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
					"url": hostUrl + "payments/ajax",
					"data": function (d) {
						d.fkExpense = $(".currentExpenseID").html();
					},
					"type": "POST",

				}
			}).on("draw", function () {
				KTMenu.createInstances();
				$('.payments-datatable tbody tr').each(function (index, item) {

					var status = $(item).find("span.paymentStatus").data("status");

					if (status === 'PENDING') {
						$(this).addClass('bg-light-warning');

					} else if (status === 'PAID') {
						$(this).addClass('bg-light-success');

					}
				})

			});

			let logsTable = $(".logs-datatable").DataTable({
				info: !0,
				order: [],
				columnDefs: [
					{
						orderable: !1, targets: 0
					},
					{
						orderable: !1, targets: 1
					},
					{
						orderable: !1, targets: 2
					},
					{
						orderable: !1, targets: 3
					}
				],
				"processing": true,
				"serverSide": true,
				"ajax": {
					"url": hostUrl + "logs/ajax",
					"data": function (d) {
						d.fkExpense = $(".currentExpenseID").html();
					},
					"type": "POST",

				}
			}).on("draw", function () {
				KTMenu.createInstances();
			});

			// Hook export buttons
			var exportButtons = () => {
				const documentTitle = $("#exportTitle").html();
				var buttons = new $.fn.dataTable.Buttons(paymentsTable, {
					buttons: [
						{
							extend: 'excelHtml5',
							title: documentTitle
						},
						{
							extend: 'csvHtml5',
							title: documentTitle
						},
						{
							extend: 'pdfHtml5',
							title: documentTitle
						}
					]
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

			var handleSearchDatatable = () => {

				document.querySelector('[data-kt-filter="searchPaymentInput"]').addEventListener('keyup', function (e) {
					paymentsTable.search(e.target.value).draw();
				});

				document.querySelector('[data-kt-filter="searchDocumentInput"]').addEventListener('keyup', function (e) {
					documentsTable.search(e.target.value).draw();
				});
				document.querySelector('[data-kt-filter="searchNoteInput"]').addEventListener('keyup', function (e) {
					notesTable.search(e.target.value).draw();
				});

			}

			exportButtons();
			handleSearchDatatable();


			let documentsTable = $(".documents-datatable").DataTable({
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
					"url": hostUrl + "documents/ajax",
					"data": function (d) {
						d.fkExpense = $(".currentExpenseID").html();
					},
					"type": "POST",

				}
			}).on("draw", function () {
				KTMenu.createInstances();
			});

			let notesTable = $(".notes-datatable").DataTable({
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
					"url": hostUrl + "notes/ajax",
					"data": function (d) {
						d.fkExpense = $(".currentExpenseID").html();
					},
					"type": "POST",

				}
			}).on("draw", function () {
				KTMenu.createInstances();
			});


			// Hook export buttons
			var exportButtons = () => {
				const documentTitle = $("#exportTitle").html();
				var buttons = new $.fn.dataTable.Buttons(paymentsTable, {
					buttons: [
						{
							extend: 'excelHtml5',
							title: documentTitle
						},
						{
							extend: 'csvHtml5',
							title: documentTitle
						},
						{
							extend: 'pdfHtml5',
							title: documentTitle
						}
					]
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
			$(document).on("submit", "#addDocumentForm", function (e) {
				e.preventDefault();
				const formData = new FormData(this);

				$.ajax({
					type: "POST",
					url: hostUrl + "documents",
					dataType: "json",
					data: formData,
					contentType: false,
					processData: false,
					cache: false,
					beforeSend: function () {
						$("button").prop("disabled", true);
					},
					success: function (res) {
						if (res.status === 1) {
							$("#addDocumentModal").modal("hide");
							Swal.fire({
								icon: 'success',
								text: res.message,
								showConfirmButton: !1,
								cancelButtonText: "Kapat",
								showCancelButton: !0,
								allowOutsideClick: !1
							});

							$("#addDocumentForm input[type!=hidden][name!=paymentDate]").val("");
							$("#addDocumentForm select[type!=hidden]").val("");
							$("#addDocumentForm textarea[type!=hidden]").val("");

							documentsTable.draw();

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

					},
					error: function (r) {
						Swal.fire({
							icon: 'error',
							text: "Hata meydana geldi!",
							showConfirmButton: !1,
							cancelButtonText: "Kapat",
							showCancelButton: !0,
							allowOutsideClick: !1
						})
						$("button").prop("disabled", false);

					}
				})
			})
			$(document).on("submit", "#addNoteForm,#editNoteForm", function (e) {
				e.preventDefault();
				const formData = new FormData(this);

				$.ajax({
					type: "POST",
					url: hostUrl + "notes",
					dataType: "json",
					data: formData,
					contentType: false,
					processData: false,
					cache: false,
					beforeSend: function () {
						$("button").prop("disabled", true);
					},
					success: function (res) {
						if (res.status === 1) {
							$(".modal").modal("hide");
							Swal.fire({
								icon: 'success',
								text: res.message,
								showConfirmButton: !1,
								cancelButtonText: "Kapat",
								showCancelButton: !0,
								allowOutsideClick: !1
							});

							$("#addNoteForm input[type!=hidden][name!=paymentDate]").val("");
							$("#addNoteForm select[type!=hidden]").val("");
							$("#addNoteForm textarea[type!=hidden]").val("");

							notesTable.draw();

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

					},
					error: function (r) {
						Swal.fire({
							icon: 'error',
							text: "Hata meydana geldi!",
							showConfirmButton: !1,
							cancelButtonText: "Kapat",
							showCancelButton: !0,
							allowOutsideClick: !1
						})
						$("button").prop("disabled", false);

					}
				})
			})
			$(document).on("submit", "#addPaymentForm", function (e) {
				e.preventDefault();
				const formData = new FormData(this);

				$.ajax({
					type: "POST",
					url: hostUrl + "payments",
					dataType: "json",
					data: formData,
					contentType: false,
					processData: false,
					cache: false,
					beforeSend: function () {
						$("button").prop("disabled", true);
					},
					success: function (res) {
						if (res.status === 1) {
							$("#addPaymentModal").modal("hide");
							Swal.fire({
								icon: 'success',
								text: res.message,
								showConfirmButton: !1,
								cancelButtonText: "Kapat",
								showCancelButton: !0,
								allowOutsideClick: !1
							});

							paymentsTable.draw(false);

							$("#addPaymentForm input[type!=hidden][name!=paymentDate][name!=isPaid]").val("");
							$("#addPaymentForm select[type!=hidden]").val("").trigger("change");
							$("#addPaymentForm textarea[type!=hidden]").val("");
							updateBalance();
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

					},
					error: function (r) {
						Swal.fire({
							icon: 'error',
							text: "Hata meydana geldi!",
							showConfirmButton: !1,
							cancelButtonText: "Kapat",
							showCancelButton: !0,
							allowOutsideClick: !1
						})
						$("button").prop("disabled", false);

					}
				})
			})
			$(document).on("submit", "#editPaymentForm", function (e) {

				e.preventDefault();
				const formData = new FormData(this);

				$.ajax({
					type: "POST",
					url: hostUrl + "payments",
					dataType: "json",
					data: formData,
					contentType: false,
					processData: false,
					cache: false,
					beforeSend: function () {
						$("button").prop("disabled", true);
					},
					success: function (res) {
						if (res.status === 1) {
							$("#editPaymentModal").modal("hide");
							Swal.fire({
								icon: 'success',
								text: res.message,
								showConfirmButton: !1,
								cancelButtonText: "Kapat",
								showCancelButton: !0,
								allowOutsideClick: !1
							});

							paymentsTable.draw(false);

							$("#editPaymentForm input[type!=hidden][name!=paymentDate][name!=isPaid]").val("");
							$("#editPaymentForm select[type!=hidden]").val("");
							$("#editPaymentForm textarea[type!=hidden]").val("");
							updateBalance();
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

					},
					error: function (r) {
						Swal.fire({
							icon: 'error',
							text: "Hata meydana geldi!",
							showConfirmButton: !1,
							cancelButtonText: "Kapat",
							showCancelButton: !0,
							allowOutsideClick: !1
						})
						$("button").prop("disabled", false);

					}
				})
			})
			$(document).on("submit", "#kt_invoice_form", function (e) {

				let formData = new FormData(this);
				e.preventDefault();
				formData.append("action", "EDIT");
				$.ajax({
					type: "POST",
					url: hostUrl + "expenses",
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
							});

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
			$("#primarySupplierForm").on("submit", function (e) {
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
						$("button").prop("disabled", true);
					},
					success: function (res) {

						if (res.status === 1) {

							$(".supplierInformation").find(".name").html('<span class="editSupplier cursor-pointer badge badge-sm text-hover-primary badge-light-primary"><i class="fa fa-edit"></i></span> ' + res.data.name);
							$(".supplierInformation").find(".address").html(res.data.address);
							$(".supplierInformation").find(".addressAgain").html(res.data.addressAgain);
							$(".supplierInformation").find(".taxInformation").html(res.data.taxInformation);

							clearForm();
							$("#primarySupplierModal").modal("hide");

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

			function checkInputs() {
				$("input,select").removeAttr("required");
				if ($(".select-individual").hasClass("active")) {

					var requiredFields = ["name", "identityNumber", "fkCountry"];
					$("[name='supplierType']").val("INDIVIDUAL");

					$("[data-np-type='CORPORATE']").hide(250);
					$("[data-np-type='INDIVIDUAL']").show(250);

				} else {

					var requiredFields = ["name", "taxNumber", "fkCountry"];
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
			$.ajax({
				type: "POST",
				url: hostUrl + "accounts",
				dataType: "json",
				data: {
					action: "FIND_BY_CURRENCY",
					currencyID: $(".currentCurrencyID").html()
				},
				success: function (res) {
					$('#addPaymentForm select[name="accountID"]').html("");
					var newOption = new Option("L??tfen Se??in", "", false, false);
					$('#addPaymentForm select[name="accountID"]').append(newOption).trigger('change');
					$.each(res.data, function (index, item) {
						var newOption = new Option(item.name, item.accountId, false, false);
						$('#addPaymentForm select[name="accountID"]').append(newOption).trigger('change');
					});
					$('#addPaymentForm select[name="accountID"]').trigger("change");

					$('#editPaymentForm select[name="accountID"]').html("").trigger("change");
					var newOption = new Option("L??tfen Se??in", "", false, false);
					$('#editPaymentForm select[name="accountID"]').append(newOption).trigger('change');
					$.each(res.data, function (index, item) {
						var newOption = new Option(item.name, item.accountId, false, false);
						$('#editPaymentForm select[name="accountID"]').append(newOption).trigger('change');
					});
					$('#editPaymentForm select[name="accountID"]').trigger("change");

				}
			})
			$(document).on("click", ".deleteDocument", function (e) {
				var documentID = $(this).data('id');
				Swal.fire({
					icon: 'warning',
					title: 'Bu dok??man?? kal??c?? olarak silmek istedi??inize emin misiniz?',
					showConfirmButton: !0,
					showCancelButton: !0,
					cancelButtonText: "Vazge??",
					confirmButtonText: "Sil",
				}).then((result) => {
					if (result.isConfirmed === true) {
						$.ajax({
							type: "POST",
							url: hostUrl + "documents",
							dataType: "json",
							data: {
								action: "DELETE",
								id: documentID
							},
							beforeSend: function () {
								$("button").prop("disabled", true);
							},
							success: function (res) {
								$("button").prop("disabled", false);

								if (res.status == 1) {

									// reloadPage();
									Swal.fire({
										icon: 'success',
										text: res.message,
										showConfirmButton: !1,
										cancelButtonText: "Kapat",
										showCancelButton: !0,
										allowOutsideClick: !1
									});
									documentsTable.draw(false);
								}
							}
						})
					}
				})
			})
			$(document).on("click", ".deleteNote", function (e) {
				var noteID = $(this).data('id');
				Swal.fire({
					icon: 'warning',
					title: 'Notu kal??c?? olarak silmek istedi??inize emin misiniz?',
					showConfirmButton: !0,
					showCancelButton: !0,
					cancelButtonText: "Vazge??",
					confirmButtonText: "Sil",
				}).then((result) => {
					if (result.isConfirmed === true) {
						$.ajax({
							type: "POST",
							url: hostUrl + "notes",
							dataType: "json",
							data: {
								action: "DELETE",
								id: noteID
							},
							beforeSend: function () {
								$("button").prop("disabled", true);
							},
							success: function (res) {
								$("button").prop("disabled", false);

								if (res.status == 1) {

									// reloadPage();
									Swal.fire({
										icon: 'success',
										text: res.message,
										showConfirmButton: !1,
										cancelButtonText: "Kapat",
										showCancelButton: !0,
										allowOutsideClick: !1
									});
									notesTable.draw(false);
								}
							}
						})
					}
				})
			})
			$(document).on("click", ".deletePayment", function (e) {
				Swal.fire({
					icon: 'warning',
					title: 'Tahsilat kayd??n?? silmek istedi??inize emin misiniz?',
					showConfirmButton: !0,
					showCancelButton: !0,
					cancelButtonText: "Vazge??",
					confirmButtonText: "Sil",
				}).then((result) => {
					if (result.isConfirmed === true) {
						$.ajax({
							type: "POST",
							url: hostUrl + "payments",
							dataType: "json",
							data: {
								action: "DELETE",
								id: $("#editPaymentModal").find("[name='paymentID']").val()
							},
							beforeSend: function () {
								$("button,input").prop("disabled", true);
							},
							success: function (res) {
								$("button,input").prop("disabled", false);

								$("#editPaymentModal").modal('hide');
								if (res.status == 1) {

									Swal.fire({
										icon: 'success',
										text: res.message,
										showConfirmButton: !1,
										cancelButtonText: "Kapat",
										showCancelButton: !0,
										allowOutsideClick: !1
									});
									updateBalance();
									paymentsTable.draw();
								}

							}
						})
					}
				})
			})

			function updateBalance() {
				$.ajax({
					type: "POST",
					url: hostUrl + "expenses",
					dataType: "json",
					data: {
						action: 'GET_BALANCE',
						expenseID: $(".currentExpenseID").html()
					},
					success: function (res) {
						$(".currentBalance").html(res.currency + " " + res.balance);
					}
				})
			}

			updateBalance();
		}
	}
}();
KTUtil.onDOMContentLoaded((function () {
	KTAppInvoicesCreate.init()
}));
$(document).ready(function () {

})
