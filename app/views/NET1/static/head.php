<?php
//print_r(Auth::getSidebar());
//exit;
?>
<title><?=$_breadcrumb["current"]?> | NetCRM</title>
<meta charset="utf-8"/>
<meta name="description"
	  content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free."/>
<meta name="keywords"
	  content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="article"/>
<meta property="og:title"
	  content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme"/>
<meta property="og:url" content="https://keenthemes.com/metronic"/>
<meta property="og:site_name" content="Keenthemes | Metronic"/>
<link rel="canonical" href="https://preview.keenthemes.com/metronic8"/>
<link rel="shortcut icon" href="<?=assets_url()?>media/favicon.png"/>
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
<!--end::Fonts-->
<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="<?= public_url() ?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet"
	  type="text/css"/>
<link href="<?= public_url() ?>assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
	  type="text/css"/>
<!--end::Page Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="<?= public_url() ?>assets/plugins/global/plugins<?= Auth::get("theme") == "dark" ? ".dark" : ""; ?>.bundle.css"
	  rel="stylesheet" type="text/css"/>
<link href="<?= public_url() ?>assets/css/style<?= Auth::get("theme") == "dark" ? ".dark" : ""; ?>.bundle.css" rel="stylesheet" type="text/css"/>
<!--end::Global Stylesheets Bundle-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/5.1.0/introjs.min.css">
