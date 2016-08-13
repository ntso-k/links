<?php
$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<title><?=(isset($title) ? $title : '')?></title>

	<link href="<?=base_url()?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets/toastr/toastr.min.css" rel="stylesheet">

	<?php if (isset($cssLinks) && count($cssLinks) > 0) { ?>
		<?php foreach($cssLinks as $link) { ?>
			<link href="<?=$link?>" rel="stylesheet">
		<?php } ?>
	<?php } ?>

</head>
<body>