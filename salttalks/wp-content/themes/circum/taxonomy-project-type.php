<?php 
get_header(); 
$page_type_class= "page-sidebar-no-sidebar"; // load_option("portfolio_tax_sidebar");
$portfolio1_content ="300";
?>
<div id="<?php echo $page_type_class; ?>">
<div id="content" class="equal_height">
<!-- portfolio-taxonomy --> 
	<div class="group">
		<div class="portfolio-itemlist-col1">
		<?php $ix=0; 
		// query_posts(array( 'post_type' => 'portfolio', 'paged' => get_query_var('paged'), 'posts_per_page'=>load_option("portfolio1_numbers") ) ); 
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
					<?php if(load_option("portfolio1_showheadline")=="on") { ?>
					<h3><?php echo $title; ?></h3>
					<?php } ?>
					<?php $content=get_the_content();
					if($portfolio1_content!="")
						{
						if(strlen("$content")>$portfolio1_content)
							{
							$content=(substr( $content, 0, strpos( $content, " ", $portfolio1_content )+1 ) );
							}
						$content=strip_tags($content);
						echo "<p>$content</p>";
						}
						?> 
				<?php if(load_option("portfolio1_showreadmore")=="on") { ?>
				<a class="button" href="<?php the_permalink(); ?>"> Read more </a>
				<?php }?>
				</div>
				<div class="clear"></div>
			</div>			
		<?php endwhile; 
		endif; ?>
		
		</div><!-- portfolio-itemlist-col1 -->
		<div class="clear"></div>
	</div><!-- group-->

	<div class="pagination">
		<?php  custom_pagination(); ?>
	</div>
	<?php wp_reset_query(); ?> 
</div> 
<?php if($page_type_class!="page-sidebar-no-sidebar") { ?>
<div class="sidebar equal_height">
	<div id="sidebar-body">
		<?php load_sidebar(load_option("portfolio_tax_sidebar1"),'sidebar-1' ); ?>
	</div>
</div>
<div class="clear"></div>
</div>
<?php } ?>
<?php get_footer(); ?>