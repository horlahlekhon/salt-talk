<?php get_header(); ?>	
<!-- Page  -->	
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	<div id="<?php echo the_template(); ?>">
		<div id="content" class="equal_height"><?php	 
			the_content();  
			wp_link_pages( array( 'before' => '<nav class="page-pagination">', 'after' => '</nav>','pagelink'         => '<span>%</span>', 'nextpagelink'     => 'Next page',	'previouspagelink' => 'Previous page') ); 		 
		?></div>
<?php if(the_template()!="page-sidebar-no-sidebar")
	{	
	?>
		<div class="sidebar equal_height">
			<div id="sidebar-body">
				<?php  load_sidebar( '1','sidebar-2' );   ?>
			</div>
		</div>
	<div class="clear"></div>
	<?php 
	}
	?>
	</div>
<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>