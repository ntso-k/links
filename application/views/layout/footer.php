

<script src="<?=base_url()?>/assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>/assets/toastr/toastr.min.js"></script>

<?php if (isset($jsLinks) && count($jsLinks) > 0) { ?>
	<?php foreach($jsLinks as $link) { ?>
		<script src="<?=$link?>"></script>
	<?php } ?>
<?php } ?>

<?php $flash_success_message = $this->session->flashdata(FLASH_SUCCESS_MESSAGE); ?>
<?php $flash_info_message = $this->session->flashdata(FLASH_ERROR_MESSAGE); ?>
<?php $flash_error_message = $this->session->flashdata(FLASH_INFO_MESSAGE); ?>
<script>
	toastr.options = {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-top-center",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}
	<?php if(!empty($flash_success_message)){ ?>
	toastr.success('<?=$flash_success_message?>');
	<?php } ?>
	<?php if(!empty($flash_info_message)){ ?>
	toastr.info('<?=$flash_info_message?>');
	<?php } ?>
	<?php if(!empty($flash_error_message)){ ?>
	toastr.error('<?=$flash_error_message?>');
	<?php } ?>
</script>
</body>
</html>