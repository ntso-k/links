<?php
$layout_data = array(
	'title'			=> 'Home',
	'cssLinks'		=> array(
	),
	'jsLinks'		=> array(
	),
);
?>


<?php $this->load->view('layout/header', $layout_data); ?>
<?php $this->load->view('layout/navbar', $layout_data); ?>
<div class="container">
<!--	<div class="page-header">-->
<!--		<h1>Home</h1>-->
<!--	</div>-->

	<div class="panel panel-default">
		<div class="panel-body">
			<ul class="list-inline">
				<?php foreach($boards as $board) { ?>
					<li><a href="/home/<?=$board->id?>"><?=$board->title?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="panel panel-default" style="min-height: 500px;">
		<div class="panel-heading">
			<h3 class="panel-title">Panel title</h3>
			<div class="pull-right" style="margin-top: -22px;">
				<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addBookmarkModal">
					Add <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				</button>
			</div>
		</div>
		<div class="panel-body">
			<ul class="list-unstyled">
				<?php foreach($links as $link) { ?>
					<li><a href="<?=prep_url($link->url)?>"><img src="<?=$link->icon_url?>" style="display: inline; width: 20px; height: 20px; margin-right: 10px;"><?=$link->title?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>

<!-- Add Bookmark Modal -->
<div id="addBookmarkModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add Bookmark</h4>
			</div>
			<div class="modal-body text-center">
				<form class="form-inline">
					<input type="hidden" id="board_id" value="<?=$board_id?>">
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">Page Url</div>
							<input type="url" class="form-control" id="url" placeholder="URL" size="50">
							<a class="input-group-addon" id="addBookmarkBtn" href="javascript:void(0);">Add</a>
						</div>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $this->load->view('layout/footer', $layout_data); ?>

<script>
	$(function() {
		$("#addBookmarkBtn").click(function() {
			if ("" != $.trim($("#url").val())) {
				$.ajax({
					type: "POST",
					url: "/bookmark/addByUrl",
					data: {url: $.trim($("#url").val()), board_id: $("#board_id").val()},
					success: function () {
						window.location.reload()
					},
					dataType: "json"
				});
			}
		});
	});
</script>