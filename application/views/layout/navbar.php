<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><?=lang('Links')?></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<!--                    <li><a href="/home">Home</a></li>-->
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if(empty($_SESSION['user'])) { ?>
					<li><a href="/login">登录</a></li>
					<li><a href="/join">注册</a></li>
				<?php }else{ ?>
					<li><a href="/home">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']->username; ?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/board/create">Create Board</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="/logout">退出</a></li>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>