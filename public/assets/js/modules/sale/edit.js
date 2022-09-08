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
	let r;
	let localeFlatpickr = {
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
	};

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
				defaultDate: "24 Agu 2022",
				locale: {
					firstDayOfWeek: 1,
					weekdays: {
						longhand: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
						shorthand: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt']
					},
					months: {
						longhand: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Agustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
						shorthand: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Ara']
					},
					today: 'Bugün',
					clear: 'Temizle'
				}
			}),
				r = document.querySelectorAll('[data-kt-calendar="datepicker"]');
			flatpickr(r, {enableTime: !1, dateFormat: "d M Y", locale: localeFlatpickr}),
				$(document.querySelector('.collectDate')).flatpickr({
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
							longhand: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Agustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
							shorthand: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Ara']
						},
						today: 'Bugün',
						clear: 'Temizle'
					}
				}), $(document.querySelector('.editCollectDate')).flatpickr({
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
						longhand: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Agustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
						shorthand: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Ara']
					},
					today: 'Bugün',
					clear: 'Temizle'
				}
			}), $(document.querySelector('.editCollectDate')).flatpickr({
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
						longhand: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Agustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
						shorthand: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Ara']
					},
					today: 'Bugün',
					clear: 'Temizle'
				}
			}), $(document.querySelector('.firstCollectDate')).flatpickr({
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
						longhand: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Agustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
						shorthand: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Agu', 'Eyl', 'Eki', 'Kas', 'Ara']
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
			// $(".disableSelect2").select2({
			// 	placeholder: "Kasa/Banka Seçimi",
			// });

			let periodTypeLabels = {
				monthly: 'Aylık',
				weekly: 'Haftalık',
				yearly: 'Yıllık'
			};
			$(".editCollectSelectAccount").select2({
				placeholder: "Kasa/Banka Seçimi",
				dropdownParent: "#editCollectModal",
				allowClear: true
			});

			$(".selectTrialProduct").select2({
				placeholder: "Ürün Seçimi",
				dropdownParent: "#addTrialProductModal",
				allowClear: false
			})

			$(".addTrialProductButton").on("click", function () {
				//
				// setTimeout(function(){
				// 	$(".selectTrialProduct").select2({
				// 		placeholder: "Ürün Seçimi",
				// 		dropdownParent: "#addTrialProductModal",
				// 		allowClear: false
				// 	}).trigger("change")
				// },150)
			})
			var addAutoCollect = () => {
				$(".submitAutoCollectButton").show();
				$(".previewAutoCollectButton").hide();
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

				function autoCollectCalc() {
					$(".currentPeriodType").html(periodTypeLabels[$("[name='periodType']").val()]);
					$(".submitAutoCollectButton").hide(500);
					$(".previewAutoCollectButton").show(500);
					var periodTypes = {
						monthly: 'ay',
						weekly: 'hafta',
						yearly: 'yıl'
					};
					var periodType = periodTypes[$("#addCollectAutoForm").find("[name='periodType']").val()];
					var periodCount = parseInt($("#addCollectAutoForm").find("[name='periodCount']").val());
					if (getAutoCollectType() === "INSTALLMENT") {

						if (!periodCount) {
							periodCount = 1;
							$("#addCollectAutoForm").find("[name='periodCount']").val(1)
						}
						if (periodCount > 36) {
							periodCount = 1;
							$("#addCollectAutoForm").find("[name='periodCount']").val(1);
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

							toastr.error("Vade miktarı 36'dan büyük olamaz.");
						}
						var totalAmount = $("#addCollectAutoForm").find("[name='totalAmount']").val();


						$(".resultAmount").html(rxtwo.to(rxtwo.from(totalAmount) / parseInt(periodCount)));
						$(".resultPeriod").html(periodCount + " " + periodType);
					} else {

						if (!periodCount) {
							periodCount = 1;
							$("#addCollectAutoForm").find("[name='periodCount']").val(1)
						}
						if (periodCount > 36) {
							periodCount = 1;
							$("#addCollectAutoForm").find("[name='periodCount']").val(1);
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

							toastr.error("Vade miktarı 36'dan büyük olamaz.");
						}
						var periodAmount = $("#addCollectAutoForm").find("[name='periodAmount']").val();

						console.log(periodAmount);
						$(".resultAmount").html(periodAmount);
						$(".resultPeriod").html(periodCount + " " + periodType);
					}


				}

				$("#addCollectAutoForm input,select").on("keyup", function () {

					autoCollectCalc();
				})
				$("#addCollectAutoForm input,select").on("change", function () {
					autoCollectCalc();
				})
				$(".currentPeriodType").html(periodTypeLabels[$("[name='periodType']").val()]);
			}

			addAutoCollect();

			const getAutoCollectType = () => {
				return $("[name='autoCollectType']:checked").val();
			}

			function checkAutoCollectType() {
				if ($("[name='autoCollectType']:checked").val() === 'INSTALLMENT') {
					$("#addCollectAutoModal").find(".showOnRepeat").hide(400);
					$("#addCollectAutoModal").find(".showOnInstallment").show(400);
				} else {
					$("#addCollectAutoModal").find(".showOnInstallment").hide(400);
					$("#addCollectAutoModal").find(".showOnRepeat").show(400);
				}


				$(".currentPeriodType").html(periodTypeLabels[$("[name='periodType']").val()]);
			}

			$("[name='autoCollectType']").on("change", function () {
				checkAutoCollectType();
			})
			$(".previewAutoCollectButton").on("click", function (e) {
				var btn = this;
				$(btn).prop("disabled", true);
				$(".previewAutoCollectButton").hide();
				$(".previewAutoCollectButton").attr("data-kt-indicator", "on");
				setTimeout(function () {
					$("#addCollectAutoForm").find("[name='action']").val('ADD_BULK_PREVIEW');
					e.preventDefault();
					$.ajax({
						type: "POST",
						url: hostUrl + "collects",
						dataType: "json",
						data: $("#addCollectAutoForm").serialize(),
						success: function (res) {
							var tbody = $("#addCollectAutoForm").find("tbody.previewData");
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

										toastr.info(item.date + " tarihli ödeme için fiyat farkı oluştu.");
									}
									tbody.append('<tr class="' + (item.highlight ? "bg-light-warning" : "") + '">' +
										'<td>' + (parseInt(index) + 1) + '</td>' +
										// '<td>' + (parseInt(index) + 1) + '</td>',
										'<td>' + item.date + '</td>' +
										'<td class="">' + item.amount + '</td>' +
										'</tr>');
									if (index === (res.data.length - 1)) {
										$(".previewTotalResult").html(res.total);
									}
								}, (parseInt(index) * 100));


							})

							$(".previewAutoCollectButton").attr("data-kt-indicator", "off");
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

							toastr.success("Ödeme planı hesaplandı.");

							$(".submitAutoCollectButton").show();
							$(btn).prop("disabled", false);

						},
						error: function () {
							$(".previewAutoCollectButton").attr("data-kt-indicator", "off");
							$(btn).prop("disabled", false);

						}
					})
				}, 1200)

			})
			$("#addCollectAutoForm").on("submit", function (e) {

				$("#addCollectAutoForm").find("[name='action']").val('ADD_BULK');
				e.preventDefault();
				$.ajax({
					type: "POST",
					url: hostUrl + "collects",
					dataType: "json",
					data: $("#addCollectAutoForm").serialize(),
					success: function (res) {
						if (res.status === 1) {
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
							$('#addCollectAutoForm').trigger("reset");
							$('#addCollectAutoModal').find("tbody").html("");
							$('#addCollectAutoModal').find(".previewTotalResult").html("-");
							$("select").trigger("change");
							$("#addCollectAutoModal").modal("hide");
						}
					}
				})
			})

			$("#addCollectAutoForm").find("[name='action']").val('ADD_BULK_PREVIEW');

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
						}
					}
				})

				$("#editTrialProductModal").modal("show");
			})

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
			$(document).on("click", ".editCustomer", function () {

				$.ajax({
					type: "POST",
					url: hostUrl + "customers",
					dataType: "json",
					data: {
						id: $(".currentCustomer").html(),
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


					serviceUrl: hostUrl + 'Product/search',
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

			$(document).on("click", ".collects-datatable tbody tr", function (e) {
				var collectId = $(this).find("td:eq(0)").find("span").data("id");

				$.ajax({
					type: "POST",
					url: hostUrl + "collects",
					dataType: "json",
					data: {
						action: "FIND",
						id: collectId
					},
					success: function (res) {

						if (res.data.editable === true) {
							$("#editCollectModal").find("input,select").prop("disabled", false);
							$("#editCollectModal").find("[name='accountID']").prop("disabled", true);
							if (res.data.status === "PENDING") {
								$("#editCollectModal").find("[name='collectDate']").prop("disabled", false);
							} else {
								$("#editCollectModal").find("[name='collectDate']").prop("disabled", true);
							}
							$(".notEditable").hide();
						} else {
							$("#editCollectModal").find("[name='amount']").prop("disabled", true);
							$("#editCollectModal").find("[name='accountID']").prop("disabled", true);
							if (res.data.status === "PENDING") {
								$("#editCollectModal").find("[name='collectDate']").prop("disabled", false);
							} else {
								$("#editCollectModal").find("[name='collectDate']").prop("disabled", true);
							}
							$(".notEditable").show();
						}
						$("#editCollectModal").find("[name='status']").val(res.data.status);
						$("#editCollectModal").find("[name='collectID']").val(res.data.collectId);

						$("#editCollectModal").find("[name='amount']").val(res.data.amount);
						$("#editCollectModal").find("[name='accountID']").val(res.data.fkAccount).trigger("change");
						$("#editCollectModal").find("[name='collectDate']").val(res.data.collectDate).trigger("change");
						$("#editCollectModal").find("[name='explanation']").val(res.data.explanation).trigger("change");
						if (res.data.fileName) {

							$("#editCollectModal").find(".fileDetails").show(500);
							$("#editCollectModal").find(".fileDetails a").attr("href", res.data.fileName);

						} else {
							$("#editCollectModal").find(".fileDetails").hide();
						}

						if (res.data.status === 'PENDING') {
							$("#editCollectModal").find("#isCollected").prop('checked', false).prop("disabled", false).trigger("change");

						} else {
							$("#editCollectModal").find("#isCollected").prop('checked', true).prop("disabled", true).trigger("change");

						}
						$("#editCollectModal").modal("show");
					}
				})

			})

			$(document).on("change", "#isCollected", function (e) {
				if ($("#editCollectModal").find("[name='status']").val() === 'PENDING') {
					if (e.target.checked === true) {
						$("#editCollectModal").find(".showOnPaid").show(400);
						$("#editCollectModal").find("[name='accountID']").prop("disabled", false);

					} else {
						$("#editCollectModal").find("[name='accountID']").prop("disabled", true);

						$("#editCollectModal").find(".showOnPaid").hide(400);
					}
				} else {
					$("#editCollectModal").find("[name='accountID']").prop("disabled", true);

					$(".showOnPaid").show(400);
				}

			})


			$(document).on("change", "#isCollectedNew", function (e) {

				if (e.target.checked === true) {
					$("#addCollectModal").find(".showOnPaid").show(400);
					// $("#addCollectModal").find(".showOnPaid").prop("disabled", false);

				} else {
					// $("#addCollectModal").find(".showOnPaid").find("[name='accountID']").prop("disabled", true);

					$("#addCollectModal").find(".showOnPaid").hide(400);
				}

			})

			// $("#editCollectModal").modal("show");
			let collectsTable = $(".collects-datatable").DataTable({
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
					"url": hostUrl + "collects/ajax",
					"data": function (d) {
						d.fkSale = $(".currentSaleID").html();
					},
					"type": "POST",

				}
			}).on("draw", function () {
				KTMenu.createInstances();
				$('.collects-datatable tbody tr').each(function (index, item) {

					var status = $(item).find("span.collectStatus").data("status");

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
						d.fkSale = $(".currentSaleID").html();
					},
					"type": "POST",

				}
			}).on("draw", function () {
				KTMenu.createInstances();
			});

			// Hook export buttons
			var exportButtons = () => {
				const documentTitle = $("#exportTitle").html();
				var buttons = new $.fn.dataTable.Buttons(collectsTable, {
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

				document.querySelector('[data-kt-filter="searchCollectInput"]').addEventListener('keyup', function (e) {
					collectsTable.search(e.target.value).draw();
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
						d.fkSale = $(".currentSaleID").html();
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
						d.fkSale = $(".currentSaleID").html();
					},
					"type": "POST",

				}
			}).on("draw", function () {
				KTMenu.createInstances();
			});


			// Hook export buttons
			var exportButtons = () => {
				const documentTitle = $("#exportTitle").html();
				var buttons = new $.fn.dataTable.Buttons(collectsTable, {
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

			let trialProductsTable = $(".trialProducts-datatable").DataTable({
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
					"url": hostUrl + "trial-products/ajax",
					"data": function (d) {
						d.fkSale = $(".currentSaleID").html();
					},
					"type": "POST",

				}
			}).on("draw", function () {
				KTMenu.createInstances();
				$('.trialProducts-datatable tbody tr').each(function (index, item) {

					var status = $(item).find("span.tpStatus").data("status");

					if (status == '0') {
						$(this).addClass('bg-light-warning');

					} else if (status == '1') {
						$(this).addClass('bg-light-success');

					} else if (status == '2') {
						$(this).addClass('bg-light-danger');

					}
				})
			});

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

							$("#addDocumentForm input[type!=hidden][name!=collectDate]").val("");
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

							$("#addNoteForm input[type!=hidden][name!=collectDate]").val("");
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
			$(document).on("submit", "#addTrialProductForm,#editTrialProductForm", function (e) {

				e.preventDefault();
				const formData = new FormData(this);

				$.ajax({
					type: "POST",
					url: hostUrl + "trial-products",
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

							$("#addTrialProductForm input[type!=hidden][name!=collectDate]").val("");
							$("#addTrialProductForm select[type!=hidden]").val("");
							$("#addTrialProductForm textarea[type!=hidden]").val("");

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
						trialProductsTable.draw();
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

			$(document).on("submit", "#addCollectForm", function (e) {
				e.preventDefault();
				const formData = new FormData(this);

				$.ajax({
					type: "POST",
					url: hostUrl + "collects",
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
							$("#addCollectModal").modal("hide");
							Swal.fire({
								icon: 'success',
								text: res.message,
								showConfirmButton: !1,
								cancelButtonText: "Kapat",
								showCancelButton: !0,
								allowOutsideClick: !1
							});

							collectsTable.draw(false);

							$("#addCollectForm input[type!=hidden][name!=collectDate]").val("");
							$("#addCollectForm select[type!=hidden]").val("");
							$("#addCollectForm textarea[type!=hidden]").val("");
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
			$(document).on("submit", "#editCollectForm", function (e) {
				e.preventDefault();
				const formData = new FormData(this);

				$.ajax({
					type: "POST",
					url: hostUrl + "collects",
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
							$("#editCollectModal").modal("hide");
							Swal.fire({
								icon: 'success',
								text: res.message,
								showConfirmButton: !1,
								cancelButtonText: "Kapat",
								showCancelButton: !0,
								allowOutsideClick: !1
							});

							collectsTable.draw(false);

							$("#editCollectForm input[type!=hidden][name!=collectDate][name!=isCollected]").val("");
							$("#editCollectForm select[type!=hidden]").val("");
							$("#editCollectForm textarea[type!=hidden]").val("");
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

							$(".customerInformation").find(".name").html('<span class="editCustomer cursor-pointer badge badge-sm text-hover-primary badge-light-primary"><i class="fa fa-edit"></i></span> ' + res.data.name);
							$(".customerInformation").find(".address").html(res.data.address);
							$(".customerInformation").find(".addressAgain").html(res.data.addressAgain);
							$(".customerInformation").find(".taxInformation").html(res.data.taxInformation);

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
			$.ajax({
				type: "POST",
				url: hostUrl + "accounts",
				dataType: "json",
				data: {
					action: "FIND_BY_CURRENCY",
					currencyID: $(".currentCurrencyID").html()
				},
				success: function (res) {
					$('#addCollectForm select[name="accountID"]').html("");
					var newOption = new Option("Lütfen Seçin", "", false, false);
					$('#addCollectForm select[name="accountID"]').append(newOption).trigger('change');
					$.each(res.data, function (index, item) {
						var newOption = new Option(item.name, item.accountId, false, false);
						$('#addCollectForm select[name="accountID"]').append(newOption).trigger('change');
					});
					$('#addCollectForm select[name="accountID"]').trigger("change");

					$('#editCollectForm select[name="accountID"]').html("");
					var newOption = new Option("Lütfen Seçin", "", false, false);
					$('#editCollectForm select[name="accountID"]').append(newOption).trigger('change');
					$.each(res.data, function (index, item) {
						var newOption = new Option(item.name, item.accountId, false, false);
						$('#editCollectForm select[name="accountID"]').append(newOption).trigger('change');
					});
					$('#editCollectForm select[name="accountID"]').trigger("change");

				}
			})
			$(document).on("click", ".deleteDocument", function (e) {
				var documentID = $(this).data('id');
				Swal.fire({
					icon: 'warning',
					title: 'Bu dokümanı kalıcı olarak silmek istediğinize emin misiniz?',
					showConfirmButton: !0,
					showCancelButton: !0,
					cancelButtonText: "Vazgeç",
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
					title: 'Notu kalıcı olarak silmek istediğinize emin misiniz?',
					showConfirmButton: !0,
					showCancelButton: !0,
					cancelButtonText: "Vazgeç",
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
			$(document).on("click", ".deleteTrialProduct", function (e) {
				var trialProductID = $(this).data('id');
				Swal.fire({
					icon: 'warning',
					title: 'Süreci kalıcı olarak silmek istediğinize emin misiniz?',
					showConfirmButton: !0,
					showCancelButton: !0,
					cancelButtonText: "Vazgeç",
					confirmButtonText: "Sil",
				}).then((result) => {
					if (result.isConfirmed === true) {
						$.ajax({
							type: "POST",
							url: hostUrl + "trial-products",
							dataType: "json",
							data: {
								action: "DELETE",
								id: trialProductID
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
									trialProductsTable.draw(false);
								}
							}
						})
					}
				})
			})
			$(document).on("click", ".deleteCollect", function (e) {
				Swal.fire({
					icon: 'warning',
					title: 'Tahsilat kaydını silmek istediğinize emin misiniz?',
					showConfirmButton: !0,
					showCancelButton: !0,
					cancelButtonText: "Vazgeç",
					confirmButtonText: "Sil",
				}).then((result) => {
					if (result.isConfirmed === true) {
						$.ajax({
							type: "POST",
							url: hostUrl + "collects",
							dataType: "json",
							data: {
								action: "DELETE",
								id: $("#editCollectModal").find("[name='collectID']").val()
							},
							beforeSend: function () {
								$("button,input").prop("disabled", true);
							},
							success: function (res) {
								$("button,input").prop("disabled", false);

								$("#editCollectModal").modal('hide');
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
									collectsTable.draw();
								}

							}
						})
					}
				})
			})

			function updateBalance() {
				$.ajax({
					type: "POST",
					url: hostUrl + "sales",
					dataType: "json",
					data: {
						action: 'GET_BALANCE',
						saleID: $(".currentSaleID").html()
					},
					success: function (res) {
						$(".currentBalance").html(res.currency + " " + res.balance);
					}
				})
			}

			updateBalance();

			$('#products').repeater({
				initEmpty: false,

				defaultValues: {
					'text-input': 'foo'
				},

				show: function () {
					$(this).slideDown();
				},

				hide: function (deleteElement) {
					$(this).slideUp(deleteElement);
				}
			});
		}
	}
}();
KTUtil.onDOMContentLoaded((function () {
	KTAppInvoicesCreate.init()
}));
$(document).ready(function () {

})
