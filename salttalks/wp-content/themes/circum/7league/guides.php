<?php

function sl_guide_quickgallery() 
	{ 
	?>
	<script type="text/javascript">
	//<![CDATA[
	jQuery(document).ready( function($) {
	$('#title').pointer({
		content: '<h3>1. Title</h3><p>Please insert a title</p>',
		position: {
			my: 'left top',
			at: 'center bottom',
			offset: '-25 0'
		}
	}).pointer('open');

	$('#page_template').pointer({
		content: '<h3>2. Template</h3><p>Please choose "Quickgallery Grid" as template</p>',
		position: {
			align: 'left',
			edge: 'right',
		} 
	}).pointer('open');

	$('#insert-media-button').pointer({
		content: '<h3>3. Images</h3><p>Please upload your images</p>',
		position: {
			my: 'left top',
			at: 'left bottom',
			offset: '-25 0'
		} 
	}).pointer('open');
  

	$('#publish').pointer({
		content: '<h3>4. Publish</h3><p>Please publish the page</p>',
		position: {
			align: 'left',
			edge: 'right',
		} 
	}).pointer('open');
	});
	//]]>
	</script>
	<?php
	}


function sl_guide_portfolio_page() 
	{ 
	?>
	<script type="text/javascript">
	//<![CDATA[
	jQuery(document).ready( function($) {
 	$('#title').pointer({
		content: '<h3>1. Title</h3><p>Please insert a title</p>',
		position: {
			my: 'left top',
			at: 'center bottom',
			offset: '-25 0'
		}
	}).pointer('open');
	$('#page_template').pointer({
		content: '<h3>2. Template</h3><p>Please choose one of the "Portfolio...." as template</p>',
		position: {
			align: 'left',
			edge: 'right',
		}  
	}).pointer('open');
	$('#publish').pointer({
		content: '<h3>3. Publish</h3><p>Please publish the page</p>',
		position: {
			align: 'left',
			edge: 'right',
		} 
	}).pointer('open');
	});
	//]]>
	</script>
	<?php
	}


function sl_add_quickgallery_tour( $hook_suffix ) 
	{ 
	add_action( 'admin_print_footer_scripts', 'sl_guide_quickgallery' );
	wp_enqueue_style( 'wp-pointer' );
	wp_enqueue_script( 'wp-pointer' );
	wp_enqueue_script( 'utils' ); 
	}

function sl_add_portfoliopage_tour( $hook_suffix ) 
	{ 
	add_action( 'admin_print_footer_scripts', 'sl_guide_portfolio_page' );
	wp_enqueue_style( 'wp-pointer' );
	wp_enqueue_script( 'wp-pointer' );
	wp_enqueue_script( 'utils' ); 
	}

if( isset($_REQUEST['tour']) )
	{
	if( $_REQUEST['tour']=="quickgallery" )
		{
		add_action( 'admin_enqueue_scripts', 'sl_add_quickgallery_tour' );
		}
	if( $_REQUEST['tour']=="portfoliopage" )
		{
		add_action( 'admin_enqueue_scripts', 'sl_add_portfoliopage_tour' );
		}	


	}

