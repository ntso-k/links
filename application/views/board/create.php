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
	<form method="post">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" placeholder="Title">
		</div>
		<div class="form-group">
			<label for="description">Description</label>
			<input type="text" class="form-control" id="description" name="description" placeholder="Description">
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
</div>

<?php $this->load->view('layout/footer', $layout_data); ?>