<?php get_header(); 

$custom = get_post_custom($post->ID);  

if ( isset( $custom["clientLink"][0] ) )
	{
	$clientLink = $custom["clientLink"][0];   
	}

 ?>	
<!-- single-clients.php / CLIENT SINLGE TEMPLATE-->
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div id="<?php echo the_template(); ?>" <?php post_class(); ?>>
	<div id="content" class="equal_height">
	 
		<?php sl_single_header_output(); ?>

		<div class="post-content">
			<?php the_content(); ?>
		<?php
		if( isset( $clientLink ) )
			{
			echo "<a target='blank' class='button custom sc_button large' href='".$clientLink."'>".__("Visit","sevenleague")." ".get_the_title()."</a>";
			}
		?>
		</div> 
		<div class="wp_link_pages"><?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=Page %'); ?></div>	

	</div><!-- content -->

<?php endwhile; ?>
<?php endif; ?>	
<!-- end single.php -->	
<?php if(the_template()!="page-sidebar-no-sidebar") { ?>
<div class="sidebar equal_height"> 
	<div id="sidebar-body">
		<?php load_sidebar( '1','sidebar-1' ); ?>
	</div>
</div>
<div class="clear"></div>
<?php } ?>
</div>
<?php get_footer(); ?>