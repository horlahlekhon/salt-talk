<?php get_header(); ?>
<?php  
$page_type_class="page-sidebar-right";
?>	
<!-- index.php -->
<div id="<?php echo the_template(); ?>">
<div id="content" class="equal_height">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
 	<?php
 	if(!get_post_format()) 
		{
 	             get_template_part("format", "standard");
 		} 
		else 
			{
               		get_template_part("format", get_post_format());
          			}
endwhile; 
endif; 
?> 
		<div class="pagination archive">
			<?php custom_pagination(); ?>
		</div>
	</div>	
<!-- end index.php -->
<?php if(the_template()!="page-sidebar-no-sidebar") { ?>
<div class="sidebar equal_height">
		<div id="sidebar-body">
			<?php dynamic_sidebar( "sidebar-2" ); ?>
		</div>
</div>
<div class="clear"></div>
<?php } ?>
</div>
<?php get_footer(); ?>";
