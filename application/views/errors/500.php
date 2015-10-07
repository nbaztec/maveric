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

<body class="bg-danger">
	<div class="container theme-showcase" role="main">
		<div class="jumbotron text-center">
			<div class="page-header">
				<h1>500</h1>
				<h3>SERVER ERROR</h3>
			</div>

			<div class="page-header">
				<p>
					We're experiencing an internal server problem.
					<br>Please try again later.
				</p>
			</div>

			<div class="page-header">
				<h4><a href="<?=$Url::base('')?>">Maveric</a></h4>
				<section class="row mt25">
					<code>
						<?php isset($data['error'])? var_dump($data['error']): null; ?>
					</code>
				</section>
			</div>
		</div>
	</div>
</body>
</html>