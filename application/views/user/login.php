<?php
$layout_data = array(
	'title'			=> 'Sign in',
	'cssLinks'		=> array(
	),
	'jsLinks'		=> array(
	),
);
?>

<?php $this->load->view('layout/header', $layout_data); ?>
<?php $this->load->view('layout/navbar', $layout_data); ?>

	<style>
		.signup-div {
			max-width: 500px;
			margin: 150px auto;
		}
	</style>

	<div class="signup-div">
		<div class="page-header" style="text-align: center;">
			<h1><?=lang('Sign in')?></h1>
		</div>
		<div>
			<div>
				<?php echo validation_errors(); ?>
			</div>
			<form class="form-horizontal" action="/login" method="post">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="username" value="<?=set_value('username')?>" placeholder="Username" required="required" size="30">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<input type="password" class="form-control" name="password" value="<?=set_value('password')?>" placeholder="Password" required="required">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<div class="checkbox">
							<label>
								<input type="checkbox"> Remember me
							</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">Sign in</button>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php $this->load->view('layout/footer', $layout_data); ?>