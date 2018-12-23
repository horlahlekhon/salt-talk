<?php
/* Template Name: Portfolio grid*/
get_header();  
/* LOAD THE POST CUSTOM VALUES FOR THIS GROUP PAGE */
$clear="";
$post_per_page="12";
$cols="3";

$custom = get_post_custom($post->ID);  

$group_cat="";
if( isset( $custom['group_cat'][0] ) )
	{
	$group_cat=$custom['group_cat'][0]; 
	} 

if( isset ( $custom['group_items'][0] ) )
	{
	$post_per_page=$custom['group_items'][0];
	}
if( isset ( $custom['group_columns'][0] ) )
	{
	$cols=$custom['group_columns'][0];
	}

$portfolio2_content=load_option("portfolio2_content");
?>
<div id="<?php echo the_template(); ?>">
<div id="content" class="equal_height">
<?php the_content(); ?>
<!-- portfolio-grid --> 
	<div class="group">
		<div class="portfolio-itemlist-col<?php echo $cols; ?> group-itemlist-<?php echo $cols; ?>">
		<?php $ix=0; 
		query_posts(array( 'post_type' => 'portfolio', 'paged' => get_query_var('paged'), 'posts_per_page'=>$post_per_page , 'project-type'=>$group_cat ) ); 
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $ix++; ?>
			<?php
			if($ix>1)
				{
				$last="_last";
				$clear="<div class='clear'></div>";
				$ix=0;
				}
				else
					{
					$last="";	
					$clear="";
					}
			$title= str_ireplace('"', '', trim(get_the_title()));
			$desc= str_ireplace('"', '', trim(get_the_content()));
			$terms = wp_get_object_terms($post->ID, 'project-type');
			$term_list="";
			$count = count($terms); $i=0;
			if ($count > 0) 
				{
				foreach ($terms as $term) 
					{
        					$i++;
    					$term_list .= "portfolio-$term->name ";    	 
					}    
				}
			?>
			<div class="portfolio-lists-item <?php echo $term_list ?> <?php echo $clear; ?>">
				<?php echo sl_load_template(); ?>
			</div>

		<?php 	
			$clear="";
			if($ix>=$cols)
				{
				$ix=0;
				$clear=" clear";
				}

			endwhile; 
		endif; ?>		 
		</div><!-- portfolio-itemlist-col2 -->
		<div class="clear"></div>
	</div><!-- group-->  
		<?php  custom_pagination(); ?> 
	<?php wp_reset_query(); ?> 
</div><!-- content --> 

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