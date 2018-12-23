<?php
/* Template Name: Portfolio list*/
get_header(); 
$page_type_class=load_option("portfolio1_sidebar");
$portfolio1_content = load_option("portfolio1_content");
$custom = get_post_custom($post->ID);  
$group_cat="";
if( isset( $custom['group_cat'][0] ) )
	{
	$group_cat=$custom['group_cat'][0]; 
	} 
?>
<div id="<?php echo the_template(); ?>">
<div id="content" class="equal_height">
<!-- portfolio-list -->
<?php
$terms = get_terms('project-type' );
$count = count($terms); $i=0; 
$term_list_gen="";
$term_list_gen.="<ul id='term_list'>";
$term_list_gen.="<li><a href='#' class='".load_option("primary_button")." small sc_button portfolio-filter' data-pfilter='portfolio-lists-item'>"._e('All','sevenleague')."</a></li>";
if ($count > 0) {
     foreach ($terms as $term) {
        $i++;
    	$term_list_gen.="<li>";	 
	$term_list_gen.="<a href='#' class='portfolio-filter small sc_button ".load_option("secondary_button")."' data-pfilter='portfolio-".$term->name."'>".$term->name."</a>";
	$term_list_gen.="</li>";
    }    
} 	
$term_list_gen.="</ul>";
if(load_option("portfolio1_showfilter")=="on")
	{
	echo $term_list_gen;
	}
?>
	<div class="group">
		<div class="portfolio-itemlist-col1">
		<?php $ix=0; 
		query_posts(array( 'post_type' => 'portfolio', 'paged' => get_query_var('paged'), 'posts_per_page'=>load_option("portfolio1_numbers")  , 'project-type'=>$group_cat ) ); 
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
			<?php		 
			$title= str_ireplace('"', '', trim(get_the_title()));
			$desc= str_ireplace('"', '', trim(get_the_content()));
			$ix++;
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
			<div class="portfolio-lists-item <?php echo $term_list ?>">
				<div class="portfolio-1-left">
					<div>	


<div class="portfolio-img"><a class="prettyPhoto prettyPhoto[works-<?php echo $ix; ?>]" href="<?php print  img_full_url($post->ID) ?>"><img src="<?php print  img_default_url($post->ID) ?>" alt="" /></a></div>
				




					</div>
				</div>
				<div class="portfolio-1-right">	 
					<h3><?php echo $title; ?></h3> 
					<?php $content=get_the_content();
  
						$content=strip_tags($content);
						echo "<p>$content</p>";  
						?>  
				<a class="" href="<?php the_permalink(); ?>"><?php _e('Read more','sevenleague'); ?></a> 
				</div>
				<div class="clear"></div>
			</div>			
		<?php endwhile; 
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
<div class="clear"></div>
</div>
<?php } ?>
<?php get_footer(); ?>