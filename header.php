<!DOCTYPE html>
<html lang="en-gb">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title(''); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="header" role="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p>HEADER</p>
			</div>
		</div>
	</div>
</header>
<nav id="nav" role="navigation">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p>NAV</p>
				<?php require_once('mega-menu.php') ?>
			</div>
		</div>
	</div>
</nav>