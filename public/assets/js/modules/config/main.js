$(document).ready(function(){
	$("form#general").on("submit",function(e){
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: hostUrl + "settings",
			dataType: "json",
			contentType: false,
			processData: false,
			cache: false,
			data: new FormData(this),
			beforeSend: function () {
				$("button").prop("disabled", true);
			},
			error: function () {
				$("button").prop("disabled", false);
				Swal.fire({
					text: "Bir hata oluştu.",
					icon: "error",
					buttonsStyling: !1,
					confirmButtonText: "Tekrar dene",
					customClass: {confirmButton: "btn btn-primary"}
				})
			},
			success: function (res) {
				$("button").prop("disabled", false);

				if (res.status === 1) {
					Swal.fire({
						text: "Hesap başarıyla oluşturuldu! Yönlendiriliyorsunuz...",
						icon: "success",
						buttonsStyling: !1,
						showConfirmButton: false,
						allowOutsideClick: false
					});
					setTimeout(function (){
						// window.location.href = hostUrl + "users/" + res.userID;
					},3000)
				} else {
					Swal.fire({
						text: res.message,
						icon: "error",
						buttonsStyling: !1,
						confirmButtonText: "Tekrar dene",
						customClass: {confirmButton: "btn btn-primary"}
					})
				}
			}
		})
	})
})
