<?php
/* Template Name: Blog grid */
get_header();  

/* LOAD THE POST CUSTOM VALUES FOR THIS GROUP PAGE */
$clear="";
$post_per_page="12";
$cols="3";
$group_cat="";
$custom = get_post_custom($post->ID);  
if($custom['group_items'][0]!="")
	{
	$post_per_page=$custom['group_items'][0];
	}
if($custom['group_columns'][0]!="")
	{
	$cols=$custom['group_columns'][0];
	}
if( isset( $custom['group_cat'][0] ) )
	{
	$group_cat=$custom['group_cat'][0]; 
	}  
?>
<div id="<?php echo the_template(); ?>">
<div id="content" class="equal_height">
<!-- blog-grid -->
	<div class="group">
		<div class="blog-itemlist-col<?php echo $cols; ?> blog-index group-itemlist-<?php echo $cols; ?>">
		<?php $ix=0; 
		if( is_front_page() )
			{
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
			} 
			else 
				{
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
				}
		query_posts(array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page'=>$post_per_page, 'category_name'=>$group_cat ) ); 
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); 
			$ix++;
			?>
 			<div class="<?php echo $cols; ?> <?php echo $clear; ?>">
				<?php get_template_part('format', 'standard'); ?>
			</div> 
		<?php  
		endwhile; 
		endif; ?>
		
		</div><!-- portfolio-itemlist-col1 -->
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
</div>
<?php } ?>
<div class="clear"></div>
</div>
<?php get_footer(); ?>