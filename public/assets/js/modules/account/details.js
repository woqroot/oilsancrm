$(document).ready(function () {
	let table = $(".np-datatable").DataTable({
		"order": [[ 0, "asc" ]],
		language: {
			url: hostUrl + 'public/assets/plugins/custom/datatables/datatables.language-tr.json'
		}
	});
})
Inputmask({
	"mask": "TR99 9999 9999 9999 9999 9999 99",
	"placeholder": "TR__ ____ ____ ____ ____ ____ __",
	"autoUnmask" : true
}).mask("[name='bankIBAN']");

$("#primaryForm").on("submit", function (e) {
	e.preventDefault();
	$.ajax({
		type: "POST",
		url: hostUrl + "accounts",
		dataType: "json",
		data: new FormData(this),
		contentType: false,
		processData: false,
		cache: false,
		beforeSend: function () {
			$("button").prop("disabled", true);
		},
		success: function (res) {

			if (res.status === 1) {

				Swal.fire({
					icon: 'success',
					text: res.message,
					showConfirmButton: !1,
					cancelButtonText: "Kapat",
					showCancelButton: !0,
					allowOutsideClick: !1
				}).then((result) => {
					window.location.reload();
				});

			} else {
				Swal.fire({
					icon: 'error',
					text: res.message,
					showConfirmButton: !1,
					cancelButtonText: "Kapat",
					showCancelButton: !1,
					allowOutsideClick: !1
				})
			}

			$("button").prop("disabled", false);

		}
	})

})

$(document).on('click', '.np-delete', function (e) {
	e.preventDefault();
	var rowid = $("#primaryForm [name='id']").val();

	Swal.fire({
		icon: 'warning',
		title: 'Hesabı istediğinize emin misiniz?',
		text: 'Bu hesaba dair tüm hareketler kalıcı olarak silinecektir. ',
		showConfirmButton: !0,
		showCancelButton: !0,
		cancelButtonText: "Vazgeç",
		confirmButtonText: "Sil",
	}).then((result) => {
		if (result.isConfirmed === true) {
			$.ajax({
				type: "POST",
				url: hostUrl + "accounts",
				dataType: "json",
				data: {
					action: "DELETE",
					id: rowid
				},
				success: function (res) {
					if(res.status == 1){

						Swal.fire({
							icon: 'success',
							text: res.message,
							showConfirmButton: !1,
							cancelButtonText: "Kapat",
							showCancelButton: !0,
							allowOutsideClick: !1
						}).then((result) => {
							window.location = document.referrer;
						});
					}else{
						Swal.fire({
							icon: 'error',
							html: res.message,
							showConfirmButton: !1,
							cancelButtonText: "Kapat",
							showCancelButton: !0,
							allowOutsideClick: !1
						});
					}
				}
			})
		}
	})
})
