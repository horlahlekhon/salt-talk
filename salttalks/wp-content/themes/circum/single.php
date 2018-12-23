<?php get_header(); 
 ?>	
<!-- single.php / SINLGE TEMPLATE-->
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="<?php echo the_template(); ?>" <?php post_class(); ?>>
	<div id="content" class="equal_height">
		<?php 

		if( get_post_type() == "post" )
			{
			get_template_part('format', 'standard');
			}
			else
				{
				get_template_part( 'single_default' );
				}
		?>
		<?php if(load_option("disable_comments")=="false" && get_post_type() == 'post' ) { comments_template( '', true ); } ?>
	</div><!-- content -->
 

<?php endwhile; ?>
<?php endif; ?> 

<!-- end single.php -->	
<?php if(the_template()!="page-sidebar-no-sidebar") { ?>
<div class="sidebar equal_height"> 
	<div id="sidebar-body">
		<?php load_sidebar( '1','sidebar-1' ); ?>
	</div>
</div>
<div class="clear"></div>
<?php } ?>
</div>
<?php get_footer(); ?>