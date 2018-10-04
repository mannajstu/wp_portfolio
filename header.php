<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *

 *
 * @package wp_preface
 */

?>
<?php global $wp_preface;?>
<!doctype html>
<html <?php language_attributes();?>>
<head>

	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
<!-- webfonts -->
	<link href='//fonts.googleapis.com/css?family=Asap:400,700,400italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<!-- webfonts -->
	<?php wp_head();?>

</head>

<body <?php ?>>
		<!-- container -->
			<!-- header -->
			<div id="home" class="header" style="background: url(<?php echo $wp_preface['header-backgroud-image']['url']; ?>) no-repeat center top;
    ">
				<div class="container">
				<!-- top-hedader -->
				<div class="top-header">
					<!-- /logo -->
					<!--top-nav---->
					<div class="top-nav">
					<div class="navigation">
					<div class="logo">
						<h1>
							<a href="<?php echo get_home_url(); ?>">
							<span>
								<?php $logotext = $wp_preface['menu-logo-text'];
echo $logotext[0];?>
</span>
<?php echo substr($logotext, 1); ?>
</a></h1>
					</div>
					<div class="navigation-right">
						<span class="menu">
							<img src="<?php echo $wp_preface['menu-mobile-image']['url']?>" alt=" " />
						</span>
						<nav class="link-effect-3" id="link-effect-3">
							<ul class="nav1 nav nav-wil">
								<li class="active"><a data-hover="Home" href="<?php echo get_home_url(); ?>"><?php echo $wp_preface['menu-item-1'];?></a></li>

								<li><a class="scroll" data-hover="About" href="#about"><?php echo $wp_preface['menu-item-2'];?></a></li>

								<li><a class="scroll" data-hover="Services" href="#services" ><?php echo $wp_preface['menu-item-3'];?></a></li>

								<li><a class="scroll" data-hover="Experience" href="#work"><?php echo $wp_preface['menu-item-4'];?></a></li>
								<li><a class="scroll" data-hover="Portfolio" href="#port"><?php echo $wp_preface['menu-item-5'];?></a></li>
								<li><a class="scroll" data-hover="Blog" href="#blogs"><?php echo $wp_preface['menu-item-6'];?></a></li>
								<li><a class="scroll" data-hover="Contact" href="#contact"><?php echo $wp_preface['menu-item-7'];?></a></li>
							</ul>
						</nav>
							<!-- script-for-menu -->


							<!-- /script-for-menu -->
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- /top-hedader -->
				</div>
