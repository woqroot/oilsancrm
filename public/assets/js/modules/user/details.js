$(document).ready(function(){
	$(".autoForm").on("submit",function(e){
		e.preventDefault();

		let formData = new FormData(this);

		$.ajax({
			type: "POST",
			url: hostUrl + "users",
			data: formData,
			dataType: 'json',
			contentType: false,
			processData: false,
			beforeSend: function(){
				$("button").prop("disabled",true);

			},
			success: function(res){
				$("button").prop("disabled",false);
				if(res.status === 1){
					Swal.fire('Başarılı!',res.message,'success').then(r => window.location.reload());
				}else{
					Swal.fire('Hata!',res.message,'error')
				}
			},
			error: function(){
				Swal.fire('Hata!','Bir sorun oluştu.','error').then(r => window.location.reload())
				$("button").prop("disabled",false);
			}
		})
	})

	let documentsTable = $(".documents-datatable").DataTable({
		info: !0,
		order: [],
		columnDefs: [
			{
				orderable: !0, targets: 0
			},
			{
				orderable: !0, targets: 1
			},
			{
				orderable: !0, targets: 2
			},
			{
				orderable: !0, targets: 3
			},
			{
				orderable: !0, targets: 4
			}
		],
		responsive: true,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": hostUrl + "documents/ajax",
			"data": function (d) {
				d.fkUser = $("#userID").val();
			},
			"type": "POST",

		}
	}).on("draw", function () {
		KTMenu.createInstances();
	});

	$('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
		$.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
		if($(this).hasClass('xyz')){
			documentsTable.columns.adjust().responsive.recalc();
		}
	});
	document.querySelector('[data-kt-filter="searchDocumentInput"]').addEventListener('keyup', function (e) {
		documentsTable.search(e.target.value).draw();
	});

	$(document).on("click", ".deleteDocument", function (e) {
		var documentID = $(this).data('id');
		Swal.fire({
			icon: 'warning',
			title: 'Bu dokümanı kalıcı olarak silmek istediğinize emin misiniz?',
			showConfirmButton: !0,
			showCancelButton: !0,
			cancelButtonText: "Vazgeç",
			confirmButtonText: "Sil",
		}).then((result) => {
			if (result.isConfirmed === true) {
				$.ajax({
					type: "POST",
					url: hostUrl + "documents",
					dataType: "json",
					data: {
						action: "DELETE",
						id: documentID
					},
					beforeSend: function () {
						$("button").prop("disabled", true);
					},
					success: function (res) {
						$("button").prop("disabled", false);

						if (res.status == 1) {

							// reloadPage();
							Swal.fire({
								icon: 'success',
								text: res.message,
								showConfirmButton: !1,
								cancelButtonText: "Kapat",
								showCancelButton: !0,
								allowOutsideClick: !1
							});
							documentsTable.draw(false);
						}
					}
				})
			}
		})
	})

	$(document).on("submit", "#addDocumentForm", function (e) {
		e.preventDefault();
		const formData = new FormData(this);

		$.ajax({
			type: "POST",
			url: hostUrl + "documents",
			dataType: "json",
			data: formData,
			contentType: false,
			processData: false,
			cache: false,
			beforeSend: function () {
				$("button").prop("disabled", true);
			},
			success: function (res) {
				if (res.status === 1) {
					$("#addDocumentModal").modal("hide");
					Swal.fire({
						icon: 'success',
						text: res.message,
						showConfirmButton: !1,
						cancelButtonText: "Kapat",
						showCancelButton: !0,
						allowOutsideClick: !1
					});

					$("#addDocumentForm input[type!=hidden][name!=collectDate]").val("");
					$("#addDocumentForm select[type!=hidden]").val("");
					$("#addDocumentForm textarea[type!=hidden]").val("");

					documentsTable.draw();

				} else {
					Swal.fire({
						icon: 'error',
						text: res.message,
						showConfirmButton: !1,
						cancelButtonText: "Kapat",
						showCancelButton: !0,
						allowOutsideClick: !1
					})
				}
				$("button").prop("disabled", false);

			},
			error: function (r) {
				Swal.fire({
					icon: 'error',
					text: "Hata meydana geldi!",
					showConfirmButton: !1,
					cancelButtonText: "Kapat",
					showCancelButton: !0,
					allowOutsideClick: !1
				})
				$("button").prop("disabled", false);

			}
		})
	})
})
