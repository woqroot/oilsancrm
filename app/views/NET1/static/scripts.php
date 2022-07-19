<script>
	let theme = "<?=Auth::get("theme")?>";
	let hostUrl = "<?=base_url()?>";
</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="<?= public_url() ?>assets/plugins/global/plugins.bundle.js"></script>
<script src="<?= public_url() ?>assets/js/scripts.bundle.js"></script>
<script src="<?= public_url() ?>assets/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/5.1.0/intro.min.js"></script>
<!--end::Global Javascript Bundle-->
<script>
	$(document).ready(function () {
		Inputmask({
			"mask": "0(599) 999 9999"
		}).mask(".maskPhone");
		// introJs().setOptions({
		// 	steps: [
		// 		{
		// 			title: 'Satış Oluştur',
		// 			intro: 'Satış faturalarınızı hızlı bir şekilde tüm detaylarıyla kaydetmeye hazırsınız.'
		// 		},
		// 		{
		// 			element: document.querySelector('.productInput'),
		// 			intro: 'Halihazırda önceden kayıt ettiğiniz ürün veya hizmetleri aratabilir, anlık olarak yenisini oluşturabilirsiniz.'
		// 		},
		// 		{
		// 			element: document.querySelector('[data-kt-element="quantity"]'),
		// 			intro: 'Halihazırda önceden kayıt ettiğiniz ürün veya hizmetleri aratabilir, anlık olarak yenisini oluşturabilirsiniz.'
		// 		}
		// 	]
		// }).start();
	})
</script>
