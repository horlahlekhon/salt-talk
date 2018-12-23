<?php
/* Template Name: Portfolio sortable */
get_header();  
$masonry=false; 
$portfolio2_content=load_option("portfolio2_content");


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
<!-- portfolio-sortable -->
<div id="content" class="equal_height"> 
<?php
$terms = get_terms('project-type' );
$count = count($terms); $i=0; 
$term_list_gen="";
$term_list_gen.="<ol id='filters' class='template_ol'>";
$term_list_gen.="<li class='active' data-filter='portfolio-lists-item'><a href='#' >".__('All','sevenleague')."</a></li>";
if ($count > 0) {
     foreach ($terms as $term) {
        $i++;
    	$term_list_gen.="<li data-filter='portfolio-".$term->slug."'>";	 
	$term_list_gen.="<a href='#'  data-filter='portfolio-".$term->slug."'>".$term->name."</a>";
	$term_list_gen.="</li>";
    }    
} 	
$term_list_gen.="</ol>";
 echo $term_list_gen; 	
?>
	<div id='masonry'>	
		<ul class="portfolio-itemlist-col<?php echo $cols; ?>  group-itemlist-<?php echo $cols; ?> template_ul" id="tiles">
		<?php $ix=0; 
		query_posts(array( 'post_type' => 'portfolio', 'paged' => get_query_var('paged'), 'posts_per_page'=>$post_per_page ));  
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php $ix++;  
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
    					$term_list .= "portfolio-$term->slug ";    	 
					}    
				}
			?>
			<li class="portfolio-lists-item <?php echo $term_list ?> <?php echo $clear; ?>"> 
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



