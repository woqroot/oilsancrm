
class Actions{
	static delete(){

	}
}

KTApp.setThemeMode(theme);

$(".change-theme").on("click", function (e) {

	var element = this;
	if (theme === "light") {
		KTApp.setThemeMode("dark");
		theme = "dark";
	} else {
		KTApp.setThemeMode("light");
		theme = "light";
	}

	$.ajax({
		type: "POST",
		url: hostUrl + "change-theme",
		data: {
			theme: theme
		},
		dataType: "json",
		success: function (res) {
			if(res.status == 1){
				$("#change-theme i").removeClass("fonticon-sun");
				$("#change-theme i").removeClass("fonticon-moon");
				if(theme === "dark"){
					$("input.change-theme").prop("checked",true);
					$("#change-theme i").addClass("fonticon-moon");
				}else{
					$("input.change-theme").prop("checked",false);
					$("#change-theme i").addClass("fonticon-sun");
				}
			}
		}
	})

})
$(document).ready(function(){
	Inputmask({
		"mask": "0(999) 999 9999"
	}).mask(".phoneMask");
	var currYear = new Date().getFullYear()-18;

	$(".dateInput").flatpickr({
		dateFormat: "d-m-Y",
		enableTime: false,
		locale: {
			weekdays: {
				longhand: ['Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi'],
				shorthand: ['Paz', 'Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt']
			},
			months: {
				longhand: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'],
				shorthand: ['Oca', 'Şub', 'Mar', 'Nis', 'May', 'Haz', 'Tem', 'Ağu', 'Eyl', 'Eki', 'Kas', 'Ara']
			},
			today: 'Bugün',
			clear: 'Temizle',
			firstDayOfWeek: 1,
			time_24hr: true
		},
		maxDate: "31-12-"+currYear,
		time_24hr: true
	});

	$(".menu-link").each(function(index,element){

		if($(element).attr("href") == window.location.href){
			$(element).addClass("active");
			if($(element).closest(".menu-accordion").length > 0){
				$(element).closest(".menu-accordion").addClass("show");
				if($(element).closest(".menu-accordion").parent().parent().length > 0){
					$(element).closest(".menu-accordion").parent().parent().addClass("show");

				}
			}
		}
	})
})

function reloadPage(timeout = 3000){
	setInterval(function (){
		window.location.reload();
	},timeout)
}


$(document).ready(function(){
	$("input[data-input-type='decimal']").on({
		keyup: function() {
			formatCurrency($(this));
		},
		blur: function() {
			formatCurrency($(this), "blur");
		}
	});
})





function formatNumber(n) {
	// format number 1000000 to 1,234,567
	return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".")
}


function formatCurrency(input, blur) {
	// appends $ to value, validates decimal side
	// and puts cursor back in right position.

	// get input value
	var input_val = input.val();

	// don't validate empty input
	if (input_val === "") { return; }

	// original length
	var original_len = input_val.length;

	// initial caret position
	var caret_pos = input.prop("selectionStart");

	// check for decimal
	if (input_val.indexOf(",") >= 0) {

		// get position of first decimal
		// this prevents multiple decimals from
		// being entered
		var decimal_pos = input_val.indexOf(",");

		// split number by decimal point
		var left_side = input_val.substring(0, decimal_pos);
		var right_side = input_val.substring(decimal_pos);

		// add commas to left side of number
		left_side = formatNumber(left_side);

		// validate right side
		right_side = formatNumber(right_side);

		// On blur make sure 2 numbers after decimal
		if (blur === "blur") {
			right_side += "00";
		}

		// Limit decimal to only 2 digits
		right_side = right_side.substring(0, 2);

		// join number by .
		input_val = left_side + "," + right_side;

	} else {
		// no decimal entered
		// add commas to number
		// remove all non-digits
		input_val = formatNumber(input_val);
		input_val = input_val;

		// final formatting
		if (blur === "blur") {
			input_val += ",00";
		}
	}

	// send updated string to input
	input.val(input_val);

	// put caret back in the right position
	var updated_len = input_val.length;
	caret_pos = updated_len - original_len + caret_pos;
	input[0].setSelectionRange(caret_pos, caret_pos);
}
