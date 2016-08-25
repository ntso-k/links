<?php
$layout_data = array(
	'title'			=> 'New Board',
	'cssLinks'		=> array(
	),
	'jsLinks'		=> array(
	),
);
?>


<?php $this->load->view('layout/header', $layout_data); ?>
<?php $this->load->view('layout/navbar', $layout_data); ?>
<div class="container">
	<ul class="list-unstyled">
		<?php foreach($boards as $board) { ?>
			<li><a href="/home/<?=$board->id?>"><?=$board->title?></a></li>
		<?php } ?>
	</ul>
</div>

<?php $this->load->view('layout/footer', $layout_data); ?>