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
