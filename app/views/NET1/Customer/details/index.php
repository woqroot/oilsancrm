
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

<script src="<?=public_url()?>assets/plugins/custom/datatables/datatables.bundle.js"></script>

<!--begin::Page Custom Javascript(used by this page)-->
<script src="<?=public_url()?>assets/js/custom/apps/customers/view/add-payment.js"></script>
<script src="<?=public_url()?>assets/js/custom/apps/customers/view/adjust-balance.js"></script>
<script src="<?=public_url()?>assets/js/custom/apps/customers/view/invoices.js"></script>
<script src="<?=public_url()?>assets/js/custom/apps/customers/view/payment-method.js"></script>
<script src="<?=public_url()?>assets/js/custom/apps/customers/view/payment-table.js"></script>
<script src="<?=public_url()?>assets/js/custom/apps/customers/view/statement.js"></script>
<script src="<?=public_url()?>assets/js/custom/apps/customers/update.js"></script>
<script src="<?=public_url()?>assets/js/widgets.bundle.js"></script>
<script src="<?=public_url()?>assets/js/custom/widgets.js"></script>
<script src="<?=public_url()?>assets/js/custom/apps/chat/chat.js"></script>
<script src="<?=public_url()?>assets/js/custom/intro.js"></script>
<script src="<?=public_url()?>assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="<?=public_url()?>assets/js/custom/utilities/modals/create-app.js"></script>
<script src="<?=public_url()?>assets/js/custom/utilities/modals/new-card.js"></script>
<script src="<?=public_url()?>assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Page Custom Javascript-->
<!--begin::Page Vendors Javascript(used by this page)-->
<!--end::Page Vendors Javascript-->

<!--end::Page Custom Javascript-->
<?= $CI->loadCustomJs("details"); ?>
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
