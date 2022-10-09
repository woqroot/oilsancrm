$(document).ready(function () {

	var e = [].slice.call(document.querySelectorAll('.daterangeReport')), t = moment().subtract(29, "days"),
		n = moment();
	e.map((function (e) {
		var i = e.querySelector("div"),
			r = e.hasAttribute("data-kt-daterangepicker-opens") ? e.getAttribute("data-kt-daterangepicker-opens") : "left",
			o = function (e, t) {
				i && (i.innerHTML = e.locale("tr").format("D MMM YYYY") + " - " + t.locale("tr").format("D MMM YYYY"),$("#dateRangeHiddenInput").val(e.locale("tr").format("YYYY-MM-DD") + " - " + t.locale("tr").format("YYYY-MM-DD")))
			};
		$(e).daterangepicker({
			startDate: t,
			endDate: n,
			opens: r,
			ranges: {
				"Bugün": [moment(), moment()],
				"Dün": [moment().subtract(1, "days"), moment().subtract(1, "days")],
				"Son 7 Gün": [moment().subtract(6, "days"), moment()],
				"Son 30 Gün": [moment().subtract(29, "days"), moment()],
				"Bu Ay": [moment().startOf("month"), moment().endOf("month")],
				"Geçen Ay": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
			},
			"showDropdowns": true,
			"autoApply": false,
			"locale": {
				"format": "DD/MM/YYYY",
				"separator": " - ",
				"applyLabel": "Uygula",
				"cancelLabel": "Vazgeç",
				"fromLabel": "Dan",
				"toLabel": "a",
				"customRangeLabel": "Seç",
				"daysOfWeek": [
					"Pt",
					"Sl",
					"Çr",
					"Pr",
					"Cm",
					"Ct",
					"Pz"
				],
				"monthNames": [
					"Ocak",
					"Şubat",
					"Mart",
					"Nisan",
					"Mayıs",
					"Haziran",
					"Temmuz",
					"Ağustos",
					"Eylül",
					"Ekim",
					"Kasım",
					"Aralık"
				],
				"firstDay": 1
			}
		}, o), o(t, n)
	}))

})



