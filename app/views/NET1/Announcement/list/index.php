<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
	<title>Duyuru Yönetimi | <?=config("siteTitle")?></title>
	<?php
	$CI->loadLayout("head");
	?>
</head>

<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="header-tablet-and-mobile-fixed aside-disabled">
<!--begin::Main-->
<?= $CI->loadLayout("header") ?>
<?= $CI->loadContent(); ?>
<?= $CI->loadLayout("footer") ?>
<!--end::Main-->

<!--begin::Javascript-->
<?= $CI->loadLayout("scripts") ?>

<!--begin::Page Custom Javascript(used by this page)-->

<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
<script>

	$(".editButton").on("click",function(e){
		var dataid = $(this).closest("tr").data("id");
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "",
			dataType: "json",
			data: {
				action: "FIND",
				id: dataid
			},
			success: function (res) {
				$("#editModal").find("input[name='title']").val(res.title);
				$("#editModal").find("[name='explanation']").val(res.explanation);
				$("#editModal").find("input[name='id']").val(res.announcementId);
				$("#editModal").modal("show");
			}
		})
	})

	$(".deleteButton").on("click", function () {
		var dataid = $(this).closest("tr").data("id");
		Swal.fire({
			title: 'Kaydı silmek istediğinize emin misiniz?',
			text: 'Bu işlem geri alınamaz.',
			icon: 'warning',
			allowOutsideClick: false,
			showCancelButton: true,
			confirmButtonText: 'Sil',
			cancelButtonText: 'İptal'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "",
					dataType: "json",
					data: {
						action: "DELETE",
						id: dataid
					},
					success: function (res) {
						if (res.status == 1) {
							Swal.fire({
								title: 'Başarılı!',
								text: res.message,
								icon: 'success',
								allowOutsideClick: false
							}).then((result) => {
								if (result.isConfirmed) {
									window.location.reload();
								}
							});
						}
					}
				})
			}
		})
	})

	$("form").on("submit", function (event) {

		let formData = new FormData(this);
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "",
			dataType: "json",
			data: formData,
			processData: false,
			contentType: false,
			success: function (res) {
				if (res.status == 1) {
					Swal.fire({
						title: 'Başarılı!',
						text: res.message,
						icon: 'success',
						allowOutsideClick: false
					}).then((result) => {
						if (result.isConfirmed) {
							window.location.reload();
						}
					});
				}
			}
		})
	})
</script>
</html>
