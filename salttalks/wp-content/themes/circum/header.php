<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv='Content-Type' content='<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>' /> 
<title><?php wp_title(); ?></title>
<link rel='shortcut icon' href='<?php echo load_option('favicon'); ?>' type='mage/x-icon'>
<link rel='pingback' href='<?php bloginfo('pingback_url'); ?>' />
<?php //wp_get_archives('type=monthly&format=link'); ?><?php // this function will be produce an Validation Error. You can uncomment if you want! ?>
<?php //comments_popup_script(); // off by default ?>
<!--[if lt IE 9]>
<script src='//html5shim.googlecode.com/svn/trunk/html5.js'></script>
<![endif]-->
<?php wp_head(); ?></head>
<body <?php body_class(); ?>>
<div id='cbackground'></div>	<div id="container" class="">
		<div id="page" class="clear is_fullwidth">
<?php if( load_option("show_overheader") == "on" ) { ?>
			<?php }?>	
			<header id="header" class="clear">
				<div class="clear <?php sl_inner('header'); ?>">
				<div class="element-logo block-on-mobile logo-1" id="logo_1_container">
			<?php sl_logo(); ?>
	</div><div class="element-Menu element-DefaultMenu block-on-mobile menu-main" id="menu-main_container">
			<?php sevenleague_menu_output("main"); ?>
	</div></div>
				<?php sl_content_below_header(); ?>
			</header>
			<header id="hero" class="clear">
				<div class="element-slider" id="element-slider">
			<?php sevenleague_allslider_output(); ?>
	</div> 
			</header>
			<?php sevenleague_headline_section(); ?>
			<section id="main" class="mainsection ex-inner clear element-Content">
				<?php sl_before_main(); ?>
				<div class="clear <?php sl_inner('main'); ?>">
					