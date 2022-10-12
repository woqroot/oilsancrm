$(document).ready(function () {

	const productKGChart = new ApexCharts(document.querySelector('#productKGChart'), {
		series: [],
		chart: {id: 'productKGChart', fontFamily: "inherit", type: "donut", width: 250},
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

	productKGChart.render();

	function createProductKGChart(data) {
		if (data.data && data.labels) {

			ApexCharts.exec('productKGChart', 'updateOptions', {
				series: data.data,
				labels: data.labels,

			}, false, true);
		} else {
			ApexCharts.exec('productKGChart', 'updateOptions', {
				series: [],
				labels: [],

			}, false, true);
		}
	}

	const productPRICEChart = new ApexCharts(document.querySelector('#productPRICEChart'), {
		series: [],
		chart: {id: 'productPRICEChart', fontFamily: "inherit", type: "donut", width: 250},
		plotOptions: {pie: {donut: {size: "50%", labels: {value: {fontSize: "10px"}}}}},
		colors: [KTUtil.getCssVariableValue("--bs-info"), KTUtil.getCssVariableValue("--bs-success"), KTUtil.getCssVariableValue("--bs-primary"), KTUtil.getCssVariableValue("--bs-danger")],
		stroke: {width: 0},
		labels: [],
		yaxis: {
			labels: {
				formatter: function (value) {
					return value + " $";
				}
			}
		},
		legend: {show: !1},
		fill: {type: "false"}
	});

	productPRICEChart.render();

	function createProductPRICEChart(data) {
		if (data.data && data.labels) {

			ApexCharts.exec('productPRICEChart', 'updateOptions', {
				series: data.data,
				labels: data.labels,

			}, false, true);
		} else {
			ApexCharts.exec('productPRICEChart', 'updateOptions', {
				series: [],
				labels: [],

			}, false, true);
		}
	}


	const productUSERChart = new ApexCharts(document.querySelector('#productUSERChart'), {
		series: [],
		chart: {id: 'productUSERChart', fontFamily: "inherit", type: "donut", width: 250},
		plotOptions: {pie: {donut: {size: "0%", labels: {value: {fontSize: "10px"}}}}},
		colors: [KTUtil.getCssVariableValue("--bs-info"), KTUtil.getCssVariableValue("--bs-success"), KTUtil.getCssVariableValue("--bs-primary"), KTUtil.getCssVariableValue("--bs-danger")],
		stroke: {width: 0},
		labels: [],
		yaxis: {
			labels: {
				formatter: function (value) {
					return value + " KG";
				}
			}
		},
		legend: {show: !1},
		fill: {type: "false"}
	});

	productUSERChart.render();

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
				userID: $(".selectUser").val()
			},
			beforeSend: function () {
				$("button,input").prop('disabled', true);
			},
			success: function (res) {
				$(".hideAndShow").show(300);
				createProductKGChart(res.productKGChart);
				createProductPRICEChart(res.productPRICEChart);
				createProductUSERChart(res.productUSERChart);
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


})

