$(document).ready(function () {


	const getReports = () => {
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
