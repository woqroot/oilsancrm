$(document).ready(function () {

	var e = document.getElementById("missionUserChart");
	if (e) {
		var a = KTUtil.getCssVariableValue("--bs-gray-800"),
			t = KTUtil.getCssVariableValue("--bs-border-dashed-color"),
			saleStatusChart = new ApexCharts(e, {
				series: [{name: "Kayıt Sayısı", data: []}],
				chart: {id: 'missionUserChart1', fontFamily: "inherit", type: "bar", height: 350, toolbar: {show: !1}},
				plotOptions: {
					bar: {
						borderRadius: 8,
						horizontal: !0,
						distributed: !0,
						barHeight: 50,
						dataLabels: {position: "bottom"}
					}
				},
				dataLabels: {
					enabled: !0,
					textAnchor: "start",
					offsetX: 0,
					style: {fontSize: "14px", fontWeight: "600", align: "left"}
				},
				legend: {show: !1},
				colors: ["#3E97FF", "#7239EA", "#50CD89", "#00b20f", "#F1416C"],
				xaxis: {
					categories: [],
					labels: {
						style: {colors: a, fontSize: "14px", fontWeight: "600", align: "left"}
					},
					axisBorder: {show: !1}
				},
				yaxis: {
					labels: {
						formatter: function (e, a) {
							return Number.isInteger(e) ? e + " - " + parseInt(100 * e / 18).toString() + "%" : e
						}, style: {colors: a, fontSize: "14px", fontWeight: "600"}, offsetY: 2, align: "left"
					}
				},
				grid: {borderColor: t, xaxis: {lines: {show: !0}}, yaxis: {lines: {show: !1}}, strokeDashArray: 4},
				tooltip: {
					style: {fontSize: "12px"}, y: {
						formatter: function (e) {
							return e
						}
					}
				}
			});

		saleStatusChart.render()

	}

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

	const missionUserChart = new ApexCharts(document.querySelector('#saleStatusChart'), {
		series: [20, 100, 15, 25],
		chart: {id:'saleStatusChart1',fontFamily: "inherit", type: "donut", width: 250},
		plotOptions: {pie: {donut: {size: "50%", labels: {value: {fontSize: "10px"}}}}},
		colors: [KTUtil.getCssVariableValue("--bs-info"), KTUtil.getCssVariableValue("--bs-success"), KTUtil.getCssVariableValue("--bs-primary"), KTUtil.getCssVariableValue("--bs-danger")],
		stroke: {width: 0},
		labels: ["Sales", "Sales", "Sales", "Sales"],
		legend: {show: !1},
		fill: {type: "false"}
	});

	missionUserChart.render();

	function createStatusChart(data) {
		ApexCharts.exec('saleStatusChart1', 'updateOptions', {
			series: data.data,
			labels: data.labels,

		}, false, true);
	}

	function createUserChart(data){
		ApexCharts.exec('missionUserChart1', 'updateOptions', {
			series: [{name: "Kayıt Sayısı", data: data.series}],
			xaxis: {
				categories: data.labels,
				labels: {
					style: {colors: a, fontSize: "14px", fontWeight: "600", align: "left"}
				},
				axisBorder: {show: !1}
			},

		}, false, true);
	}

	function createTrialProductsChart(data){
		ApexCharts.exec('trialProducts1', 'updateOptions', {
			series: [data.progress.percent]
		}, false, true);

		$("#trialProductsExplanation").html('Seçilen tarih aralığında <span class="badge badge-primary">' + data.total.count + '</span> farklı süreçte toplam <span class="badge badge-primary">' + data.total.amount + ' KG</span> ürün müşteriye teslim edilmiş. Verilen bu ürünlerin <span class="badge badge-success">' + data.completeds.amount + ' KG</span>\'ı geri teslim alınmıştır.');
	}
	const getReports = () => {
		$(".hideAndShow").hide();
		var dateRange = $("#dateRangeHiddenInput").val();

		$.ajax({
			type: "POST",
			url: "",
			dataType: "json",
			data: {
				daterange: dateRange
			},
			beforeSend: function () {
				$("button,input").prop('disabled', true);
			},
			success: function (res) {
				$(".hideAndShow").show(300);

				createStatusChart(res.saleStatusChart);
				createUserChart(res.missionUserChart);

				if (res.statics) {
					$.each(res.statics, function (key, item) {
						var ex = document.getElementById('NP' + key);
						if (ex) {
							ex.innerText = item;
						}
					})
				}


				createTrialProductsChart(res.trialProducts);
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






})

