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
<!--begin::Page Custom Javascript(used by this page)-->
<script src="<?=public_url()?>assets/js/widgets.bundle.js"></script>
<script src="<?=public_url()?>assets/js/custom/widgets.js"></script>
<script src="<?=public_url()?>assets/js/custom/apps/chat/chat.js"></script>
<script src="<?=public_url()?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="<?=public_url()?>assets/js/custom/utilities/modals/create-app.js"></script>
<script src="<?=public_url()?>assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Page Custom Javascript-->

<?= $CI->loadCustomJs("list"); ?>
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
