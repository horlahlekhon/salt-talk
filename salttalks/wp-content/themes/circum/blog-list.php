<?php
/* Template Name: Blog List */
get_header();  
$post_per_page="12";
$group_cat = "";
$custom = get_post_custom($post->ID);  
if(isset( $custom['group_items'][0] ) )
	{
	$post_per_page=$custom['group_items'][0];
	}
if( isset( $custom['group_cat'][0] ) )
	{
	$group_cat=$custom['group_cat'][0]; 
	}  
?>
<div id="<?php echo the_template(); ?>">
<div id="content" class="equal_height">
<!-- blog-list -->
	<div class="group">
		<div class="blog-itemlist-col1 blog-index">
		<?php $ix=0; 
		if( is_front_page() )
			{
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
			} 
			else 
				{
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
				}
		query_posts(array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page'=>$post_per_page, 'category_name'=>$group_cat  ) ); 
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
			<?php get_template_part('format', 'standard'); ?>
		<?php endwhile; 
		endif; ?>
		
		</div><!-- blog-itemlist-col1 -->
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