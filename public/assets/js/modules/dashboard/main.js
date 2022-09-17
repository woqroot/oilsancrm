$(".viewAnnouncement").on("click", function () {
	var id = $(this).data("id");
	var element = this;
	$.ajax({
		type: "POST",
		url: hostUrl + "ajax/announcement",
		data: {
		announcementId: id
	},
	dataType: "json",
		success: function (res) {
		$(element).closest("tr").removeClass("animate__animated");
		$(element).closest("tr").removeClass("bg-light-warning");
		$("#announcementDetails #title").html(res.title);
		$("#announcementDetails #explanation").html(res.explanation);
		$("#announcementDetails #showImage").html(res.image);
		$("#announcementDetails #name").html(res.name);
		$("#announcementDetails #email").html(res.email);

		$("#viewAnnouncement").modal("show");


	}
})

})




	var e = document.querySelectorAll("#goalHedefChart");
	[].slice.call(e).map((function (e) {
		var t = parseInt(KTUtil.css(e, "height"));
		if (e) {
			$.ajax({
				type: "POST",
				url: hostUrl + "ajax",
				dataType: "json",
				data: {},
				success: function(res){
					$("#currentGoal").html(res.data.goal.total);
					var a = e.getAttribute("data-kt-chart-color"), o = {
						labels: [res.data.goal.title],
						series: [(res.data.goal.percent)],
						chart: {fontFamily: "inherit", height: t, type: "radialBar", offsetY: 0},
						plotOptions: {
							radialBar: {
								startAngle: -90,
								endAngle: 90,
								hollow: {margin: 0, size: "55%"},
								dataLabels: {
									showOn: "always",
									name: {
										show: !0,
										fontSize: "12px",
										fontWeight: "700",
										offsetY: -5,
										color: KTUtil.getCssVariableValue("--bs-gray-500")
									},
									value: {
										color: KTUtil.getCssVariableValue("--bs-gray-900"),
										fontSize: "24px",
										fontWeight: "600",
										offsetY: -40,
										show: !0,
										formatter: function (e) {
											return res.data.goal.currentSales;
										}
									}
								},
								track: {background: KTUtil.getCssVariableValue("--bs-gray-300"), strokeWidth: "100%"}
							}
						},
						colors: [KTUtil.getCssVariableValue("--bs-" + a)],
						stroke: {lineCap: "round"}
					};
					new ApexCharts(e, o).render()
				}
			})

		}
	}))

