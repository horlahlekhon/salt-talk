<?php
/* Template Name: Clients List*/
get_header();   

$clients_numbers=load_option("clients1_numbers");
$clients_showheadline=load_option("clients1_showheadline");
$clients_content=load_option("clients1_content");
$clients_showreadmore=load_option("clients1_showreadmore");
?>
<div id="<?php echo the_template(); ?>">
<!-- client-list -->
<div id="content" class="equal_height"> 
 	<div class="group">
		<div class="client-itemlist-col1">
		<?php
		query_posts(array( 'post_type' => 'clients', 'paged' => get_query_var('paged'), 'posts_per_page'=>"$clients_numbers" ) ); 
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post();  
 			$title= str_ireplace('"', '', trim(get_the_title()));
			$desc= str_ireplace('"', '', trim(get_the_content()));
			?>
			<div class="one_one client-lists-item">					 
					
					<?php   
					if(has_post_thumbnail())
						{
						?>
					<div class="single-client-image">
						<img src="<?php echo img_main_url(get_the_id()) ?>"   alt="" /> 
					</div>
					<?php } ?>
					<?php
					$content=get_the_content();
 					$content=strip_tags($content);
						echo "<h3>".$title."</h3><p>$content</p>"; 
						?><a href="<?php the_permalink(); ?>"> Read more </a> <?php 
					?> 

			</div>
			<?php if(isset($clear)) { echo $clear; } ?>
		<?php endwhile; 
		endif; ?> 
		</div><!-- client-itemlist-col1 -->
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
<div class="clear"></div>
</div>
<?php } ?>
<?php get_footer(); ?>