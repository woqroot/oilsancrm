$(document).ready(function () {


	var e = document.querySelectorAll(".trialProductChart");
	[].slice.call(e).map((function (e) {
		var t = parseInt(KTUtil.css(e, "height"));
		if (e) {
			var a = e.getAttribute("data-kt-chart-color"), o = KTUtil.getCssVariableValue("--bs-" + a),
				s = KTUtil.getCssVariableValue("--bs-light-" + a),
				r = KTUtil.getCssVariableValue("--bs-gray-700");
			new ApexCharts(e, {
				series: [30],
				chart: {id:'trialProducts1',fontFamily: "inherit", height: t, type: "radialBar"},
				plotOptions: {
					radialBar: {
						hollow: {margin: 0, size: "65%"},
						dataLabels: {
							showOn: "always",
							name: {show: !1, fontWeight: "700"},
							value: {
								color: r,
								fontSize: "30px",
								fontWeight: "700",
								offsetY: 12,
								show: !0,
								formatter: function (e) {
									return e + "%"
								}
							}
						},
						track: {background: s, strokeWidth: "100%"}
					}
				},
				colors: [o],
				stroke: {lineCap: "round"},
				labels: ["Progress"]
			}).render()
		}
	}))

	function createTrialProductsChart(data){
		ApexCharts.exec('trialProducts1', 'updateOptions', {
			series: [data.progress.percent]
		}, false, true);

		$("#trialProductsExplanation").html('Seçilen tarih aralığında <span class="badge badge-primary">' + data.total.count + '</span> farklı süreçte toplam <span class="badge badge-primary">' + data.total.amount + ' KG</span> ürün müşteriye teslim edilmiş. Verilen bu ürünlerin <span class="badge badge-success">' + data.completeds.amount + ' KG</span>\'ı geri teslim alınmıştır.');
	}

	const productPieChart = new ApexCharts(document.querySelector('#productPieChart'), {
		series: [],
		chart: {id: 'productPieChart', fontFamily: "inherit", type: "donut", width: 250},
		plotOptions: {pie: {donut: {size: "10%", labels: {value: {fontSize: "10px"}}}}},
		colors: [KTUtil.getCssVariableValue("--bs-info"), KTUtil.getCssVariableValue("--bs-success"), KTUtil.getCssVariableValue("--bs-primary"), KTUtil.getCssVariableValue("--bs-danger")],
		stroke: {width: 0},
		labels: [],
		yaxis: {
			labels: {
				formatter: function (value) {
					return value + " Kilogram";
				}
			}
		},
		legend: {show: !1},
		fill: {type: "false"}
	});

	productPieChart.render();

	function createPieChart(data) {
		if (data.data && data.labels) {

			ApexCharts.exec('productPieChart', 'updateOptions', {
				series: data.data,
				labels: data.labels,

			}, false, true);
		} else {
			ApexCharts.exec('productPieChart', 'updateOptions', {
				series: [],
				labels: [],

			}, false, true);
		}
	}


	function createProductUSERChart(data) {
		if (data.data && data.labels) {

			ApexCharts.exec('productUSERChart', 'updateOptions', {
				series: data.data,
				labels: data.labels,

			}, false, true);
		}else{
			ApexCharts.exec('productUSERChart', 'updateOptions', {
				series: [],
				labels: [],

			}, false, true);
		}
	}


	const getReports = () => {
		// $(".hideAndShow").hide();
		var dateRange = $("#dateRangeHiddenInput").val();

		$.ajax({
			type: "POST",
			url: "",
			dataType: "json",
			data: {
				daterange: dateRange,
				userID: $(".selectUser").val(),
				productID: $(".selectProduct").val(),
			},
			beforeSend: function () {
				$("button,input").prop('disabled', true);
			},
			success: function (res) {
				$(".hideAndShow").show(300);
				createPieChart(res.data.productChart);
				createTrialProductsChart(res.data.general);
				if (res.statics) {
					$.each(res.statics, function (key, item) {
						var ex = document.getElementById('NP' + key);
						if (ex) {
							ex.innerText = item;
						}
					})
				}


				$("button,input").prop('disabled', false);
			},
			error: function () {
				$("button,input").prop('disabled', false);
			}
		})


	}

	getReports();
	$(document).on("click", ".ranges li", function (e) {
		if (e.target.innerHTML != "Seç") {
			getReports();
		}
	})
	$(document).on("click", ".drp-buttons .applyBtn", getReports)
	$(document).on("change", ".selectUser", getReports)
	$(document).on("change", ".selectProduct", getReports)


})

