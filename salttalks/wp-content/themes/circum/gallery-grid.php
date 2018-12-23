<?php
/* Template Name: Quickgallery grid*/
get_header();  
/* LOAD THE POST CUSTOM VALUES FOR THIS GROUP PAGE */
$clear="";
$post_per_page="12";
$cols="3";
$custom = get_post_custom($post->ID);  
if( isset ( $custom['group_items'][0] ) && $custom['group_items'][0] != "" )
	{
	$post_per_page=$custom['group_items'][0];
	}
if( isset ( $custom['group_columns'][0] ) &&  $custom['group_columns'][0] != "" ) 
	{
	$cols=$custom['group_columns'][0];
	}

$portfolio2_content=load_option("portfolio2_content");
if (have_posts()) :  
	while (have_posts()) : the_post(); 
		$content="<p>".do_shortcode(get_the_content())."</p>";
	endwhile; 
endif; 
?>
<div id="<?php echo the_template(); ?>">
	<div id="content" class="equal_height qgall">
	<!-- gallery-grid -->
		<?php echo do_shortcode("[quickgallery id='".$post->ID."' count='".$post_per_page."' cols='".$cols."']"); ?>
		<?php echo $content; ?> 
			<?php  custom_pagination(); ?> 
		<?php wp_reset_query(); ?> 
	</div><!-- content --> 

	<?php if(the_template()!="page-sidebar-no-sidebar") { ?>
		<div class="sidebar equal_height">	 
			<div id="sidebar-body">
				<?php load_sidebar( '1','sidebar-1' ); ?>
			</div>
		</div><!-- sidebar -->
	<?php } ?>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>