<?php ?>
<!-- ERROR 404 Template-->
<?php global $options, $shortname; 
get_header(); 
?>
	<div id="<?php echo the_template(); ?>">
		<div id="content" class="equal_height">
		<div class="error404-left">
			<h1><?php echo get_option($shortname."_error404_title"); ?></h1>
		</div>
		<div class="error404-right">
			<p><?php echo get_option($shortname."_error404_content"); ?></p>
		
		<?php  if(get_option($shortname."_error404_search")=="on")
			{
			get_search_form(  );
			}
		?>
		</div>
	</div>	
	<?php if(the_template()!="page-sidebar-no-sidebar") { ?>
	<div class="sidebar equal_height">
		<div id="sidebar-body"> 
			<?php load_sidebar(load_option("error404_sidebar1"),'sidebar-1' ); ?>
		</div>
	</div>
	<div class="clear"></div>
	</div>
	<?php }  			 	
get_footer();