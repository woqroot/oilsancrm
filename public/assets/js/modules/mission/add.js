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


	$("#addMissionForm").on("submit", function (e) {
		e.preventDefault();
		if ($("[name='endDate']").val().length <= 0) {
			Swal.fire('Hata!', 'Görev içeriği için bir bitiş tarihi seçmelisiniz.', 'error');
			return false;
		}

		var formData = new FormData(this);
		formData.append('action', 'ADD');
		$.ajax({
			type: "POST",
			url: hostUrl + "missions",
			data: formData,
			dataType: "json",
			contentType: false,
			processData: false,
			success: function (res) {
				if (res.status === 1) {
					Swal.fire('Başarılı!', res.message, 'success').then(r => {
						window.location.href = res.data.missionId;
					});

					setTimeout(function () {
						window.location.href = res.data.missionId;

					}, 2500)
				} else {
					Swal.fire('Hata!', res.message, 'error');

				}
			}
		})
	})

})
