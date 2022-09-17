"use strict";
var KTSigninGeneral = function () {
	var t, e, i;
	return {
		init: function () {
			t = document.querySelector("#kt_sign_in_form"), e = document.querySelector("#kt_sign_in_submit"), i = FormValidation.formValidation(t, {
				fields: {
					email: {
						validators: {
							notEmpty: {message: "Geçerli bir e-posta adresi girmelisiniz."},
							emailAddress: {message: "Geçerli bir e-posta adresi girmelisiniz."}
						}
					}, password: {validators: {notEmpty: {message: "Parolanızı girmelisiniz."}}}
				}, plugins: {
					trigger: new FormValidation.plugins.Trigger,
					bootstrap: new FormValidation.plugins.Bootstrap5({rowSelector: ".fv-row"})
				}
			}), e.addEventListener("click", (function (n) {
				n.preventDefault(), i.validate().then((function (i) {
					if(i == "Valid"){
						e.setAttribute("data-kt-indicator", "on");
						e.disabled = !0;

						$.ajax({
							type: "POST",
							url: hostUrl + "auth/login",
							dataType: "json",
							data: $(t).serialize(),
							success: function(res){
								if (res.status === 1) {
									Swal.fire({
										text: res.message,
										icon: "success",
										buttonsStyling: !1,
										showConfirmButton: !1,
										allowOutsideClick: false,
										customClass: {confirmButton: "btn btn-primary"}
									})
									setTimeout(function (){
										window.location.href = hostUrl;
									},2e3);
								} else {
									e.disabled = !1;
									e.removeAttribute("data-kt-indicator");
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


					}
				}))
			}))
		}
	}
}();
KTUtil.onDOMContentLoaded((function () {
	KTSigninGeneral.init()
}));
