<?php
$layout_data = array(
	'title'			=> 'Home',
	'cssLinks'		=> array(
		//'//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css'
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
			<div class="row">
				<div class="col-md-2">
					<h4>我的分类</h4>
					<hr/>
					<ul class="list-unstyled">
						<?php foreach($boards as $board) { ?>
							<li><a href="/home/<?=$board->id?>"><?=$board->title?></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="col-md-10">
					<h4>
						<div class="dropdown pull-right">
							<i class="dropdown-toggle glyphicon glyphicon-option-vertical" role="button" style="padding: 0 20px" aria-hidden="true" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></i>

							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li><a href="javascript:void(0);" data-toggle="modal" data-target="#addBookmarkModal">Add Bookmark</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="javascript:void(0);" data-toggle="modal" data-target="#deleteBoardModal">Delete Board</a></li>
							</ul>
						</div>
						<span><?=empty($current_board) ? '' : $current_board->title?></span>
					</h4>
					<hr/>
					<ul class="list-unstyled">
						<?php foreach($links as $link) { ?>
							<li>
								<a href="<?=prep_url($link->url)?>"><img src="<?=$link->icon_url?>" style="display: inline; width: 20px; height: 20px; margin-right: 10px;"><?=$link->title?></a>
								<span> - </span>
								<a href="javascript:void(0);" class="removeBookmarkBtn" data-bookmark-id="<?=$link->id?>">remove</a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
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
<div id="deleteBoardModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Delete Board</h4>
			</div>
			<div class="modal-body">
				<p>确认删除这个分类？</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="/board/delete/<?=$board_id?>">Delete</a>
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

		$(".removeBookmarkBtn").click(function() {
			$.ajax({
				type: "GET",
				url: "/bookmark/del/" + $(this).attr("data-bookmark-id"),
				success: function () {
					window.location.reload()
				},
				dataType: "json"
			});
		});
	});
</script>