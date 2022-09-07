$(document).ready(function () {

	var options = {
		selector: ".editor",
		plugins: 'image',
	};

	// if (KTApp.isDarkMode()) {
	// 	options["skin"] = "oxide-dark";
	// 	options["content_css"] = "dark";
	// }

	tinymce.init(options);


	$(".datepicker").flatpickr({
		enableTime: !1,
		dateFormat: "d-m-Y",
		locale: {
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
		}
	});

	$("[name='subAction']").on("click",function (e){
		$("input[name='type']").val($(this).val());
	})

	$("#addMissionForm").on("submit", function (e) {
		e.preventDefault();

		var formData = new FormData(this);
		formData.append('action', 'EDIT');
		$.ajax({
			type: "POST",
			url: hostUrl + "missions",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			beforeSend: function () {
				$("button").prop('disabled', true);
			},
			success: function (res) {
				if (res.status === 1) {
					Swal.fire('Başarılı!', res.message, 'success').then(r => {
						window.location.reload();
					});

					setTimeout(function () {
						window.location.reload();

					}, 2500)
				} else {
					Swal.fire('Hata!', res.message, 'error');

				}
			},
			complete: function () {
				$("button").prop('disabled', false);


			}
		})
	})
	$(document).on("click",".deleteMission",function(e){
		e.preventDefault();
		var id = $(this).data("id");
		Swal.fire({
			title: 'Emin misiniz?',
			text: "Bu talebi kalıcı olarak silmek istediğinize emin misiniz?",
			icon: "warning",
			confirmButtonText: "Sil",
			cancelButtonText: "Vazgeç",
			showCancelButton: !0
		}).then(r => {
			if (r.isConfirmed === true) {
				$.ajax({
					type: "POST",
					url: hostUrl + "missions",
					data: {
						"action": "DELETE",
						"id": id
					},
					dataType: "json",
					success: function (res) {
						if (res.status === 1) {
							Swal.fire('Başarılı!', res.message, 'success').then(r => {
								window.location.reload();
							});
						} else {
							Swal.fire('Hata!', res.message, 'error').then(r => {
								window.location.reload();
							});
						}


					}
				})
			}
		})
	})
	$(document).on("click", ".removeDocument", function (e) {
		e.preventDefault();
		var id = $(this).data("id");

		Swal.fire({
			title: 'Emin misiniz?',
			text: "Doküman kalıcı olarak silinecektir. Emin misiniz?",
			icon: "warning",
			confirmButtonText: "Sil",
			cancelButtonText: "Vazgeç",
			showCancelButton: !0
		}).then(r => {
			if (r.isConfirmed === true) {
				$.ajax({
					type: "POST",
					url: hostUrl + "documents",
					data: {
						"action": "DELETE",
						"id": id
					},
					dataType: "json",
					success: function (res) {
						if (res.status === 1) {
							Swal.fire('Başarılı!', res.message, 'success').then(r => {
								window.location.reload();
							});
						} else {
							Swal.fire('Hata!', res.message, 'error').then(r => {
								window.location.reload();
							});
						}


					}
				})
			}
		})
	})

})
