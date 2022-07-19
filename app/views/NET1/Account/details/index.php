<?php

?>
<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->
<head>
	<head>
		<?= $CI->loadLayout("head"); ?>
	</head>
<body id="kt_body"
	  class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
	  style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<?= $CI->loadLayout("header") ?>
<?= $CI->loadContent(); ?>
<?= $CI->loadLayout("footer") ?>

<!--begin::Page Vendors Javascript(used by this page)-->
<script src="<?=public_url()?>assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="<?=public_url()?>assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->

<?= $CI->loadCustomJs("details"); ?>
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
