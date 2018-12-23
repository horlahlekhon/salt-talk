<?php
/* Template Name: Testimonials list*/
get_header();   
/* LOAD THE POST CUSTOM VALUES FOR THIS GROUP PAGE */
$clear="";
$post_per_page="12";
$cols="3";
$custom = get_post_custom($post->ID);  
if($custom['group_items'][0]!="")
	{
	$post_per_page=$custom['group_items'][0];
	}
if($custom['group_columns'][0]!="")
	{
	$cols=$custom['group_columns'][0];
	}
?>
<div id="<?php echo the_template(); ?>">
<!-- testimonials-list -->
<div id="content" class="equal_height"> 
 	<div class="group">
		<div class="testimonials-itemlist-col1">
		<?php
		query_posts(array( 'post_type' => 'testimonial', 'paged' => get_query_var('paged'), 'posts_per_page'=>$post_per_page) ); 
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post();  
 			echo  sl_load_template(); 
			endwhile; 
		endif; ?> 
		</div><!-- testimonials-itemlist-col1 -->
		<div class="clear"></div>
	</div><!-- group--> 
		<?php  custom_pagination(); ?> 
	<?php wp_reset_query(); ?> 
</div> 
<?php if(the_template()!="page-sidebar-no-sidebar") { ?>
<div class="sidebar equal_height">	 
	<div id="sidebar-body">
		<?php load_sidebar( '1','sidebar-1' ); ?>
	</div>
</div><!-- sidebar -->
<?php } ?>
<div class="clear"></div>
</div>
<?php get_footer(); ?>