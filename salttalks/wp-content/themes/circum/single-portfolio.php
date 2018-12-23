<?php get_header(); ?>	
<?php 
$client= get_post_custom_values('client'); 
$site= get_post_custom_values('projLink');
?>
<!-- single-portfolio.php / SINLGE PORTFOLIO -->	
<div id="<?php echo the_template(); ?>" class="portfolio-single">
	<div id="content" class="equal_height">

		
		<?php if( sl_post_meta( 'header' ) == 'Slider' ) {
			sl_single_header_output(); 
			}
		if( sl_post_meta( 'header' ) == 'List' )
				{
				sl_single_header_list_output();
				}
		?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 

		<div class='portfolio-single-content'>
			<?php  the_content(); ?>
		</div>
		 
		<?php if(load_option("portfolio_show_nav")=="on")
			{
			?>
			<div class="pagination">
			<?php if(previous_post_link_plus(array('post_type'=>' "portfolio" ','return'=>'id')))
				{
				?>
				<span class="page-numbers"><?php   previous_post_link_plus(array('post_type'=>' "portfolio" ')); ?></span>
				<?php
				}
			if(next_post_link_plus(array('post_type'=>' "portfolio" ','return'=>'id')))
				{
				?>
				<span class="page-numbers"><?php   next_post_link_plus(array('post_type'=>' "portfolio" ')); ?></span>
				<?php
				}
				?>
			</div>
		<?php 
		}
		do_action("sevenleague_after_single_portfolio"); 
		endwhile; 
	endif; ?>
	<div class="clear"></div>
	</div>
	<!-- end single-portfolio.php -->
	<?php if(the_template()!="page-sidebar-no-sidebar") { ?>
	<div class="sidebar equal_height"> 
		<div id="sidebar-body">
			<?php load_sidebar( '1','sidebar-1' ); ?>
		</div>
	</div>
	<?php } ?>
	<div class="clear"></div>
</div>
<?php  get_footer(); ?>