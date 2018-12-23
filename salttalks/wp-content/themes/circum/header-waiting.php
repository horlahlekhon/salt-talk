<!DOCTYPE html> 
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" /> 
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="shortcut icon" href="<?php echo load_option("favicon"); ?>" type="image/x-icon">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php //wp_get_archives('type=monthly&format=link'); ?><?php // this function will be produce an Validation Error. You can uncomment if you want! ?>
<?php //comments_popup_script(); // off by default ?>
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php  body_class(); ?> > 
<div id="cbackground">
</div>
<div id="container" class='waitingpage'>
	<div id="layout" class="<?php echo load_option("layout"); ?>">
		<section id="page" class="page">
			<div class='mainsection'>
				<div class='inner'>