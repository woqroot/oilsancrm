<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
	<head>
		<?= $CI->loadLayout("head"); ?>
	</head>
<body id="kt_body"
	  class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
	  style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<?= $CI->loadLayout("header") ?>
<?= $CI->loadContent(); ?>
<?= $CI->loadLayout("footer") ?>

<!--begin::Page Vendors Javascript(used by this page)-->
<script src="<?= public_url() ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="<?= public_url() ?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="<?= public_url() ?>assets/js/widgets.bundle.js"></script>
<script src="<?= public_url() ?>assets/js/custom/widgets.js"></script>
<script src="<?= public_url() ?>assets/js/custom/apps/chat/chat.js"></script>
<script src="<?= public_url() ?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="<?= public_url() ?>assets/js/custom/utilities/modals/create-app.js"></script>
<script src="<?= public_url() ?>assets/js/custom/utilities/modals/users-search.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<!--end::Page Custom Javascript-->
<?= $CI->loadCustomJs(); ?>
<!--end::Javascript-->
</body>

<?php
if (isCan('admin')) {
	?>
	<script>
		const initChartOne = (res) => {
			$(".totalResultedRegs").html(res.data.totalResultedRegs);

			var e, t, a, o = document.querySelectorAll(".customChart"),
				s = KTUtil.getCssVariableValue("--bs-gray-500"),
				r = KTUtil.getCssVariableValue("--bs-gray-200"),
				i = KTUtil.getCssVariableValue("--bs-gray-300");
			[].slice.call(o).map((function (o) {
				e = o.getAttribute("data-kt-color"), t = parseInt(KTUtil.css(o, "height")), a = KTUtil.getCssVariableValue("--bs-" + e), new ApexCharts(o, {
					series: [
						{
							name: "Başarılı Satışlar",
							data: res.data.series.success
						},
						{
							name: "Başarısız Satış", data: res.data.series.denies
						}],
					chart: {fontFamily: "inherit", type: "bar", height: t, toolbar: {show: !1}},
					plotOptions: {bar: {horizontal: !1, columnWidth: ["50%"], borderRadius: 4}},
					legend: {show: !1},
					dataLabels: {enabled: !1},
					stroke: {show: !0, width: 2, colors: ["transparent"]},
					xaxis: {
						categories: res.data.labels,
						axisBorder: {show: !1},
						axisTicks: {show: !1},
						labels: {style: {colors: s, fontSize: "12px"}}
					},
					yaxis: {y: 0, offsetX: 0, offsetY: 0, labels: {style: {colors: s, fontSize: "12px"}}},
					fill: {type: "solid"},
					states: {
						normal: {filter: {type: "none", value: 0}},
						hover: {filter: {type: "none", value: 0}},
						active: {allowMultipleDataPointsSelection: !1, filter: {type: "none", value: 0}}
					},
					tooltip: {
						style: {fontSize: "12px"}, y: {
							formatter: function (e) {
								return e + " süreç"
							}
						}
					},
					colors: [a, i],
					grid: {padding: {top: 10}, borderColor: r, strokeDashArray: 4, yaxis: {lines: {show: !0}}}
				}).render()
			}))
		}

		$.ajax({
			type: "POST",
			url: hostUrl + "ajax/dashReportTwo",
			dataType: "json",
			data: {},
			success: function (res) {
				initChartOne(res);
			}
		})

	</script>
	<?php
}
?>
<!--end::Body-->
</html>
