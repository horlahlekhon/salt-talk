<?php
/* Template Name: Testimonials Masonry */
get_header();  
$masonry=false;  


/* LOAD THE POST CUSTOM VALUES FOR THIS GROUP PAGE */
$clear="";
$post_per_page="12";
$cols="3";
$custom = get_post_custom($post->ID);  
if( isset ( $custom['group_items'][0] ) )
	{
	$post_per_page=$custom['group_items'][0];
	}
if( isset ( $custom['group_columns'][0] ) ) 
	{
	$cols=$custom['group_columns'][0];
	}

?>
<div id="<?php echo the_template(); ?>">
<!-- testimonials-masonry -->
<div id="content" class="equal_height"> 
	<div id='masonry'>	
		<ul class="portfolio-itemlist-col<?php echo $cols; ?>  group-itemlist-<?php echo $cols; ?> template_ul" id="tiles">
		<?php $ix=0; 
		query_posts(array( 'post_type' => 'testimonial', 'paged' => get_query_var('paged'), 'posts_per_page'=>$post_per_page ));  
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $ix++;  ?>
			<li class="portfolio-lists-item testimonials-masonry-entry <?php echo $clear; ?>"> 
				<?php echo sl_load_template(); ?>
			</li> 
		<?php 
			$clear="";
			if($ix>=$cols)
				{
				$ix=0;
				$clear=" clear";
				}
			endwhile; 
		endif; ?> 
		</ul> 
	</div> 
		<?php  custom_pagination(); ?> 
	<?php wp_reset_query(); ?> 
</div> 
<?php if(the_template()!="page-sidebar-no-sidebar") { ?>
	<div class="sidebar equal_height">	 
		<div id="sidebar-body">
			<?php load_sidebar( '1','sidebar-1' ); ?>
		</div>
	</div><!-- sidebar -->
	<div class="clear"></div>
<?php } ?>
</div>
<?php get_footer(); ?>



