<?php
/**
 * Author : Nisheeth Barthwal
 * Date   : 07 Oct 2015
 * Project: maveric
 *
 */
?>
<!doctype html>
<html class="error-page no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Maveric - Internal Error</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- Or include locally --
	<link rel="stylesheet" href="<?=$Url::asset_path('bootstrap/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=$Url::asset_path('bootstrap/css/bootstrap-theme.min.css')?>">
	<script src="<?=$Url::asset_path('bootstrap/js/bootstrap.min.js')?>"></script>
	-->


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Project name</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<form method="post" action="<?=$Url::base('login')?>" class="navbar-form navbar-right">
					<div class="form-group">
						<input name="username" type="text" placeholder="Use foo" class="form-control">
					</div>
					<div class="form-group">
						<input name="password" type="password" placeholder="Use bar" class="form-control">
					</div>
					<button type="submit" class="btn btn-success">Sign in</button>
				</form>
			</div><!--/.navbar-collapse -->
		</div>
	</nav>
	<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
		<div class="container">
			<h1><?=$data['message']?></h1>
			<p><?=$data['description']?></p>
			<?php
			if ($a = $Alert->get())
			{
				printf('<div class="alert text-center alert-%s">%s</div>', $a['type'], $a['message']);
			}
			?>
		</div>
	</div>

	<div class="container">