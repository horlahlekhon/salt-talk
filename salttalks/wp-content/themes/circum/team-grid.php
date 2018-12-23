<?php
/* Template Name: Team grid*/
get_header();  

/* LOAD THE POST CUSTOM VALUES FOR THIS GROUP PAGE */
$clear="";
$post_per_page="12";
$cols="3";
$group_cat = "";
$custom = get_post_custom($post->ID);  
if( isset ( $custom['group_items'][0] ) && $custom['group_items'][0]!="")
	{
	$post_per_page=$custom['group_items'][0];
	}
if( isset ( $custom['group_columns'][0] ) && $custom['group_columns'][0]!="")
	{
	$cols=$custom['group_columns'][0];
	}
if( isset( $custom['group_cat'][0] ) )
	{
	$group_cat=$custom['group_cat'][0]; 
	}  

$page_type_class=load_option("team2_sidebar");
$team2_content=load_option("team2_content");
?>
<div id="<?php echo the_template(); ?>">
<!-- team-grid -->
<div id="content" class="equal_height"> 
 	<div class="group">
		<div class="team-itemlist-col<?php echo $cols; ?> group-itemlist-<?php echo $cols; ?>">
		<?php $ix=0; 
		query_posts(array( 'post_type' => 'team', 'paged' => get_query_var('paged'), 'posts_per_page'=>$post_per_page,  'team-position'=>$group_cat  ) ); 
		      	  $custom = get_post_custom($post->ID);  
		if(isset($custom["teamFacebook"][0]))
			{
		        	$teamFacebook = $custom["teamFacebook"][0];    		
			}
		if(isset($custom["teamTwitter"][0]))
			{
	        		$teamTwitter = $custom["teamTwitter"][0];
			}
		if(isset($custom["teamFlickr"][0]))
			{   
	        		$teamFlickr = $custom["teamFlickr"][0];   
			}
		if(isset($custom["teamYoutube"][0]))
			{
	        		$teamYoutube = $custom["teamYoutube"][0];
			}
		if(isset($custom["teamDribbble"][0]))
			{   
	        		$teamDribbble = $custom["teamDribbble"][0];   
			}
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php echo  sl_load_template();  
			endwhile; 
		endif; ?> 
		</div><!-- team-itemlist-col2 -->
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
<?php } ?>
<div class="clear"></div>
</div>
<?php get_footer(); ?>