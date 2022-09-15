"use strict";
var KTAppCalendar = function () {
	let xUserID = $('#xUserID').val();
	let localeFlatpickr = {
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
	};
	let e, t, n, a, o, r, i, l, d, s, c, m, u, v, f, p, y, D, _, b, k, g, S, Y, h, T, M, w, E, L,
		x = {
			calendarEventId: "",
			id: "",
			eventName: "",
			eventexplanation: "",
			eventLocation: "",
			startDate: "",
			endDate: "",
			allDay: !1,
			fkEventCategory: ""
		},
		B = !1;
	const q = e => {
		C();

		const n = x.allDay ? moment(x.startDate).locale('tr').format("DD MMM YYYY") : moment(x.startDate).locale('tr').format("DD MMM YYYY - H:mm "),
			a = x.allDay ? moment(x.endDate).locale('tr').format("DD MMM YYYY") : moment(x.endDate).locale('tr').format("DD MMM YYYY - H:mm");


		var o = {
			container: "body",
			trigger: "manual",
			boundary: "window",
			placement: "auto",
			dismiss: !0,
			html: !0,
			title: "Etkinlik Hakkında",
			content: '<div class="fw-bolder mb-2">' + x.eventName + '</div><div class="fs-7"><span class="fw-bold">Başlangıç:</span> ' + n + '</div><div class="fs-7 mb-4"><span class="fw-bold">Bitiş:</span> ' + a + '</div><div id="kt_calendar_event_view_button" type="button" class="btn btn-sm btn-light-primary">Daha fazla</div>'
		};
		(t = KTApp.initBootstrapPopover(e, o)).show(), B = !0, F()
	}, C = () => {
		B && (t.dispose(), B = !1)
	}, N = () => {
		$("#actionType").val('ADD');

		f.innerText = "Yeni Etkinlik Oluştur", v.show();
		const t = p.querySelectorAll('[data-kt-calendar="datepicker"]'),
			r = p.querySelector("#kt_calendar_datepicker_allday");
		r.addEventListener("click", (e => {
			e.target.checked ? t.forEach((e => {
				e.value = '00:00';
				e.classList.add("d-none")
			})) : (d.setDate(x.startDate, !0, "Y-m-d"), t.forEach((e => {
				e.classList.remove("d-none")
			})))
		})), O(x);
	}, A = () => {
		var e, t, n;
		w.show(), x.allDay ? (e = "Tüm Gün", t = moment(x.startDate).locale("tr").format("DD MMMM YYYY"), $("#fkEventCategory").val(x.fkEventCategory).trigger('change'),n = moment(x.endDate).locale("tr").format("DD MMMM YYYY")) : (e = "", t = moment(x.startDate).locale("tr").format("DD MMMM YYYY - H:mm"), n = moment(x.endDate).locale("tr").format("DD MMMM YYYY - H:mm")), g.innerText = x.eventName, S.innerText = e, Y.innerText = x.eventexplanation ? x.eventexplanation : "--", h.innerText = x.eventLocation ? x.eventLocation : "--", T.innerText = t, M.innerText = n
	}, H = () => {
		E.addEventListener("click", (t => {

			t.preventDefault(), w.hide(), (() => {
				$("#actionType").val('EDIT');
				f.innerText = "Etkinlik Düzenle", v.show();
				const t = p.querySelectorAll('[data-kt-calendar="datepicker"]'),
					r = p.querySelector("#kt_calendar_datepicker_allday");
				r.addEventListener("click", (e => {
					e.target.checked ? t.forEach((e => {
						e.value = '00:00';

						e.classList.add("d-none")
					})) : (d.setDate(x.startDate, !0, "Y-m-d"), t.forEach((e => {
						e.classList.remove("d-none")
					})))
				})), O(x);
				// _.addEventListener("click", (function (t) {
				// 	t.preventDefault(), y && y.validate().then((function (t) {
				// 		console.log("validated!"), "Valid" == t ? (_.setAttribute("data-kt-indicator", "on"), _.disabled = !0, setTimeout((function () {
				// 			_.removeAttribute("data-kt-indicator"), Swal.fire({
				// 				text: "New event added to calendar!",
				// 				icon: "success",
				// 				buttonsStyling: !1,
				// 				confirmButtonText: "Ok, got it!",
				// 				customClass: {confirmButton: "btn btn-primary"}
				// 			}).then((function (t) {
				// 				if (t.isConfirmed) {
				// 					v.hide(), _.disabled = !1, e.getEventById(x.id).remove();
				// 					let t = !1;
				// 					r.checked && (t = !0), 0 === c.selectedDates.length && (t = !0);
				// 					var l = moment(i.selectedDates[0]).format(),
				// 						s = moment(d.selectedDates[d.selectedDates.length - 1]).format();
				// 					if (!t) {
				// 						const e = moment(i.selectedDates[0]).format("YYYY-MM-DD"), t = e;
				// 						l = e + "T" + moment(c.selectedDates[0]).format("HH:mm:ss"), s = t + "T" + moment(u.selectedDates[0]).format("HH:mm:ss")
				// 					}
				// 					e.addEvent({
				// 						id: V(),
				// 						title: n.value,
				// 						explanation: a.value,
				// 						location: o.value,
				// 						start: l,
				// 						end: s,
				// 						allDay: t
				// 					}), e.render(), p.reset()
				// 				}
				// 			}))
				// 		}), 2e3)) : Swal.fire({
				// 			text: "Sorry, looks like there are some errors detected, please try again.",
				// 			icon: "error",
				// 			buttonsStyling: !1,
				// 			confirmButtonText: "Ok, got it!",
				// 			customClass: {confirmButton: "btn btn-primary"}
				// 		})
				// 	}))
				// }))
			})()
		}))
	}, F = () => {
		document.querySelector("#kt_calendar_event_view_button").addEventListener("click", (e => {
			e.preventDefault(), C(), A()
		}))
	}, O = () => {
		n.value = x.eventName ? x.eventName : "", a.value = x.eventexplanation ? x.eventexplanation : "", o.value = x.eventLocation ? x.eventLocation : "", i.setDate(x.startDate, !0, "Y-m-d");
		const e = x.endDate ? x.endDate : moment(x.startDate).format();
		console.log(x);
		d.setDate(e, !0, "Y-m-d");
		const t = p.querySelector("#kt_calendar_datepicker_allday"),
			r = p.querySelectorAll('[data-kt-calendar="datepicker"]');
		x.allDay ? (t.checked = !0, r.forEach((e => {
			e.value = '00:00';
			e.classList.add("d-none")
		}))) : (c.setDate(x.startDate, !0, "Y-m-d H:i"), u.setDate(x.endDate, !0, "Y-m-d H:i"), d.setDate(x.startDate, !0, "Y-m-d"), t.checked = !1, r.forEach((e => {
			e.classList.remove("d-none")
		})))
	}, P = e => {
			console.log(e);
		x.calendarEventId = e.calendarEventId, x.id = e.id, x.eventName = e.title, x.eventexplanation = e.explanation, x.fkEventCategory = e.fkEventCategory, x.eventLocation = e.location, x.startDate = e.startStr, x.endDate = e.endStr, x.allDay = e.allDay
	}, V = () => Date.now().toString() + Math.floor(1e3 * Math.random()).toString();

	$("#kt_modal_add_event_form").on("submit", (function (t) {

		t.preventDefault();
		let xyz;

		console.log("validated!"), 1 === 1 ? (_.setAttribute("data-kt-indicator", "on"), _.disabled = !0, xyz = () => {
				let t = !1;
				r.checked && (t = !0), 0 === c.selectedDates.length && (t = !0);
				var l = moment(i.selectedDates[0]).format(),
					s = moment(d.selectedDates[d.selectedDates.length - 1]).format();
				if (!t) {
					const e = moment(i.selectedDates[0]).format("YYYY-MM-DD"), t = e;
					l = e + "T" + moment(c.selectedDates[0]).format("HH:mm:ss"), s = t + "T" + moment(u.selectedDates[0]).format("HH:mm:ss")
				}
				$.ajax({
					type: "POST",
					url: hostUrl + "calendar?userID=" + xUserID,
					dataType: 'json',
					data: {
						action: $("#actionType").val(),
						event: {
							id: V(),
							title: n.value,
							explanation: a.value,
							location: o.value,
							start: l,
							end: s,
							fkEventCategory: $("#fkEventCategory").val(),
							calendarEventId: $("#calendarEventId").val()
						}
					},
					success: function (response) {
						if (response.status === 1) {
							_.removeAttribute("data-kt-indicator"), Swal.fire({
								text: response.message,
								icon: "success",
								buttonsStyling: !1,
								confirmButtonText: "Kapat",
								customClass: {confirmButton: "btn btn-primary"}
							}).then((function (t) {
								if (t.isConfirmed) {
									v.hide(), _.disabled = !1;
									let t = !1;
									r.checked && (t = !0), 0 === c.selectedDates.length && (t = !0);
									var l = moment(i.selectedDates[0]).format(),
										s = moment(d.selectedDates[d.selectedDates.length - 1]).format();
									if (!t) {
										const e = moment(i.selectedDates[0]).format("YYYY-MM-DD"), t = e;
										l = e + "T" + moment(c.selectedDates[0]).format("HH:mm:ss"), s = t + "T" + moment(u.selectedDates[0]).format("HH:mm:ss")
									}
									e.refetchEvents();
									e.render(), p.reset()
								}
							}))
						} else {
							Swal.fire('Hata!', 'Bir sorun oluştu.', 'error');
						}
					}
				})
			}, xyz()
		) : null


	}))

	return {
		init: function () {

			$("#kt_calendar_datepicker_allday").on("change", function (e) {
				e.preventDefault();
				if ($(this).is(":checked")) {
					c.setDate('00:00');
					u.setDate('00:00');

				}
			})

			const t = document.getElementById("kt_modal_add_event");
			p = t.querySelector("#kt_modal_add_event_form"), n = p.querySelector('[name="calendar_event_name"]'), a = p.querySelector('[name="calendar_event_explanation"]'), o = p.querySelector('[name="calendar_event_location"]'), r = p.querySelector("#kt_calendar_datepicker_start_date"), l = p.querySelector("#kt_calendar_datepicker_end_date"), s = p.querySelector("#kt_calendar_datepicker_start_time"), m = p.querySelector("#kt_calendar_datepicker_end_time"), D = document.querySelector('[data-kt-calendar="add"]'), _ = p.querySelector("#kt_modal_add_event_submit"), b = p.querySelector("#kt_modal_add_event_cancel"), k = t.querySelector("#kt_modal_add_event_close"), f = p.querySelector('[data-kt-calendar="title"]'), v = new bootstrap.Modal(t);
			const B = document.getElementById("kt_modal_view_event");
			var F, O, I, R, G, K;
			w = new bootstrap.Modal(B), g = B.querySelector('[data-kt-calendar="event_name"]'), S = B.querySelector('[data-kt-calendar="all_day"]'), Y = B.querySelector('[data-kt-calendar="event_explanation"]'), h = B.querySelector('[data-kt-calendar="event_location"]'), T = B.querySelector('[data-kt-calendar="event_start_date"]'), M = B.querySelector('[data-kt-calendar="event_end_date"]'), E = B.querySelector("#kt_modal_view_event_edit"), L = B.querySelector("#kt_modal_view_event_delete"), F = document.getElementById("kt_calendar_app"), O = moment().startOf("day"), I = O.format("YYYY-MM"), R = O.clone().subtract(1, "day").format("YYYY-MM-DD"), G = O.format("YYYY-MM-DD"), K = O.clone().add(1, "day").format("YYYY-MM-DD"), (e = new FullCalendar.Calendar(F, {
				headerToolbar: {
					left: "prev,next today",
					center: "title",
					right: "dayGridMonth,timeGridWeek,timeGridDay"
				},
				initialDate: G,
				firstDay: 1,
				navLinks: !0,
				locale: 'tr',
				selectable: !0,
				selectMirror: !0,
				select: function (e) {
					C(), P(e), N()
				},
				eventDrop: function (e) {

					var data = {
						title: e.event.title,
						explanation: e.event.extendedProps.explanation,
						start: moment(e.event.start).format("YYYY-MM-DD HH:mm"),
						end: moment(e.event.end).format("YYYY-MM-DD HH:mm"),
						calendarEventId: e.event.extendedProps.calendarEventId,
						fkEventCategory: e.event.extendedProps.fkEventCategory
					}

					$.ajax({
						type: "POST",
						url: hostUrl + "calendar",
						dataType: 'json',
						data: {
							action: "EDIT",
							event: data
						},
						success: function (response) {

						}
					})

				},
				eventResize: function (e) {
					var data = {
						title: e.event.title,
						explanation: e.event.extendedProps.explanation,
						start: moment(e.event.start).format("YYYY-MM-DD HH:mm"),
						end: moment(e.event.end).format("YYYY-MM-DD HH:mm"),
						calendarEventId: e.event.extendedProps.calendarEventId,
						fkEventCategory: e.event.extendedProps.fkEventCategory
					}

					$.ajax({
						type: "POST",
						url: hostUrl + "calendar",
						dataType: 'json',
						data: {
							action: "EDIT",
							event: data
						},
						success: function (response) {

						}
					})
				},
				eventClick: function (e) {
					$("#calendarEventId").val(e.event.extendedProps.calendarEventId);

					C(), P({
						calendarEventId: e.event.extendedProps.calendarEventId,
						id: e.event.id,
						title: e.event.title,
						explanation: e.event.extendedProps.explanation,
						location: e.event.extendedProps.location,
						startStr: e.event.startStr,
						endStr: e.event.endStr,
						allDay: e.event.allDay,
						fkEventCategory: e.event.extendedProps.fkEventCategory
					}), A()
				},
				eventMouseEnter: function (e) {
					P({
						id: e.event.id,
						title: e.event.title,
						explanation: e.event.extendedProps.explanation,
						location: e.event.extendedProps.location,
						startStr: e.event.startStr,
						endStr: e.event.endStr,
						allDay: e.event.allDay,
						fkEventCategory: e.event.extendedProps.fkEventCategory
					}), q(e.el)
				},
				editable: !0,
				dayMaxEvents: !0,
				events: {
					url: hostUrl + 'calendar/getEvents?userID=' + xUserID,
					failure: function () {

					}
				},
				// events: [
				// 	{
				// 	id: V(),
				// 	title: "All Day Event",
				// 	start: I + "-01",
				// 	end: I + "-02",
				// 	explanation: "Toto lorem ipsum dolor sit incid idunt ut",
				// 	className: "fc-event-danger fc-event-solid-warning",
				// 	location: "Federation Square"
				// }, {
				// 	id: V(),
				// 	title: "Reporting",
				// 	start: I + "-14T13:30:00",
				// 	explanation: "Lorem ipsum dolor incid idunt ut labore",
				// 	end: I + "-14T14:30:00",
				// 	className: "fc-event-success",
				// 	location: "Meeting Room 7.03"
				// }, {
				// 	id: V(),
				// 	title: "Company Trip",
				// 	start: I + "-02",
				// 	explanation: "Lorem ipsum dolor sit tempor incid",
				// 	end: I + "-03",
				// 	className: "fc-event-primary",
				// 	location: "Seoul, Korea"
				// }, {
				// 	id: V(),
				// 	title: "ICT Expo 2021 - Product Release",
				// 	start: I + "-03",
				// 	explanation: "Lorem ipsum dolor sit tempor inci",
				// 	end: I + "-05",
				// 	className: "fc-event-light fc-event-solid-primary",
				// 	location: "Melbourne Exhibition Hall"
				// }, {
				// 	id: V(),
				// 	title: "Dinner",
				// 	start: I + "-12",
				// 	explanation: "Lorem ipsum dolor sit amet, conse ctetur",
				// 	end: I + "-13",
				// 	location: "Squire's Loft"
				// }, {
				// 	id: V(),
				// 	title: "Repeating Event",
				// 	start: I + "-09T16:00:00",
				// 	end: I + "-09T17:00:00",
				// 	explanation: "Lorem ipsum dolor sit ncididunt ut labore",
				// 	className: "fc-event-danger",
				// 	location: "General Area"
				// }, {
				// 	id: V(),
				// 	title: "Repeating Event",
				// 	explanation: "Lorem ipsum dolor sit amet, labore",
				// 	start: I + "-16T16:00:00",
				// 	end: I + "-16T17:00:00",
				// 	location: "General Area"
				// }, {
				// 	id: V(),
				// 	title: "Conference",
				// 	start: R,
				// 	end: K,
				// 	explanation: "Lorem ipsum dolor eius mod tempor labore",
				// 	className: "fc-event-primary",
				// 	location: "Conference Hall A"
				// }, {
				// 	id: V(),
				// 	title: "Meeting",
				// 	start: G + "T10:30:00",
				// 	end: G + "T12:30:00",
				// 	explanation: "Lorem ipsum dolor eiu idunt ut labore",
				// 	location: "Meeting Room 11.06"
				// }, {
				// 	id: V(),
				// 	title: "Lunch",
				// 	start: G + "T12:00:00",
				// 	end: G + "T14:00:00",
				// 	className: "fc-event-info",
				// 	explanation: "Lorem ipsum dolor sit amet, ut labore",
				// 	location: "Cafeteria"
				// }, {
				// 	id: V(),
				// 	title: "Meeting",
				// 	start: G + "T14:30:00",
				// 	end: G + "T15:30:00",
				// 	className: "fc-event-warning",
				// 	explanation: "Lorem ipsum conse ctetur adipi scing",
				// 	location: "Meeting Room 11.10"
				// }, {
				// 	id: V(),
				// 	title: "Happy Hour",
				// 	start: G + "T17:30:00",
				// 	end: G + "T21:30:00",
				// 	className: "fc-event-info",
				// 	explanation: "Lorem ipsum dolor sit amet, conse ctetur",
				// 	location: "The English Pub"
				// }, {
				// 	id: V(),
				// 	title: "Dinner",
				// 	start: K + "T18:00:00",
				// 	end: K + "T21:00:00",
				// 	className: "fc-event-solid-danger fc-event-light",
				// 	explanation: "Lorem ipsum dolor sit ctetur adipi scing",
				// 	location: "New York Steakhouse"
				// }, {
				// 	id: V(),
				// 	title: "Birthday Party",
				// 	start: K + "T12:00:00",
				// 	end: K + "T14:00:00",
				// 	className: "fc-event-primary",
				// 	explanation: "Lorem ipsum dolor sit amet, scing",
				// 	location: "The English Pub"
				// }, {
				// 	id: V(),
				// 	title: "Site visit",
				// 	start: I + "-28",
				// 	end: I + "-29",
				// 	className: "fc-event-solid-info fc-event-light",
				// 	explanation: "Lorem ipsum dolor sit amet, labore",
				// 	location: "271, Spring Street"
				// }],
				datesSet: function () {
					C()
				}
			})).render(), y = FormValidation.formValidation(p, {
				fields: {
					calendar_event_name: {validators: {notEmpty: {message: "Etkinlik için bir başlık girmelisiniz."}}},
					calendar_event_start_date: {validators: {notEmpty: {message: "Bu alan zorunludur"}}},
					calendar_event_end_date: {validators: {notEmpty: {message: "Bu alan zorunludur"}}}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger,
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: ".fv-row",
						eleInvalidClass: "",
						eleValidClass: ""
					})
				}
			}), i = flatpickr(r, {enableTime: !1, dateFormat: "d M Y", locale: localeFlatpickr}), d = flatpickr(l, {
				enableTime: !1,
				dateFormat: "d M Y",
				locale: localeFlatpickr
			}), c = flatpickr(s, {
				enableTime: !0,
				noCalendar: !0,
				dateFormat: "H:i",
				time_24hr: true
			}), u = flatpickr(m, {
				enableTime: !0,
				noCalendar: !0,
				dateFormat: "H:i",
				time_24hr: true
			}), H(), D.addEventListener("click", (e => {
				C(), x = {
					id: "",
					eventName: "",
					eventexplanation: "",
					startDate: new Date,
					endDate: new Date,
					allDay: !1,
					fkEventCategory: ""
				}, N()
			})), L.addEventListener("click", (t => {
				t.preventDefault(), Swal.fire({
					text: "Etkinlik oluşturmaktan vazgeçtiğinize emin misiniz?",
					icon: "warning",
					showCancelButton: !0,
					buttonsStyling: !1,
					confirmButtonText: "Evet, iptal et!",
					cancelButtonText: "Vazgeç",
					customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
				}).then((function (t) {
					t.value ? (e.getEventById(x.id).remove(), w.hide()) : "cancel" === t.dismiss
				}))
			})), b.addEventListener("click", (function (e) {
				e.preventDefault(), Swal.fire({
					text: "İptal etmek istediğinize emin misiniz?",
					icon: "warning",
					showCancelButton: !0,
					buttonsStyling: !1,
					confirmButtonText: "Evet, kapat",
					cancelButtonText: "Vazgeç",
					customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
				}).then((function (e) {
					if (e.value) {
						p.reset(), v.hide()
					}

				}))
			})), k.addEventListener("click", (function (e) {
				e.preventDefault(), Swal.fire({
					text: "İptal etmek istediğinize emin misiniz?",
					icon: "warning",
					showCancelButton: !0,
					buttonsStyling: !1,
					confirmButtonText: "Evet, iptal et!",
					cancelButtonText: "Vazgeç",
					customClass: {confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light"}
				}).then((function (e) {
					e.value ? (p.reset(), v.hide()) : "cancel" === e.dismiss
				}))
			})), (e => {
				e.addEventListener("hidden.bs.modal", (e => {
					y && y.resetForm(!0)
				}))
			})(t)
		}
	}
}();
KTUtil.onDOMContentLoaded((function () {
	KTAppCalendar.init()
}));
