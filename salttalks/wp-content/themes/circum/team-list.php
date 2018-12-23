<?php
/* Template Name: Team list*/
get_header();   
$team1_content=load_option("team1_content");

$group_cat = "";
$custom = get_post_custom($post->ID);  
if( isset( $custom['group_cat'][0] ) )
	{
	$group_cat=$custom['group_cat'][0]; 
	}  
?>
<div id="<?php echo the_template(); ?>">
<!-- team-list --> 
<div id="content" class="equal_height"> 
 	<div class="group">
		<div class="team-itemlist-col1">
		<?php
		query_posts(array( 'post_type' => 'team', 'paged' => get_query_var('paged'), 'posts_per_page'=>load_option("team1_numbers"), 'team-position'=>$group_cat ) ); 
		?>
		<?php if (have_posts()) : while (have_posts()) : the_post();  
 			$title= str_ireplace('"', '', trim(get_the_title()));
			$desc= str_ireplace('"', '', trim(get_the_content()));
		      	  $custom = get_post_custom($post->ID);  
		      	  $teamFacebook = $custom["teamFacebook"][0];    
		      	  $teamTwitter = $custom["teamTwitter"][0];   
	      		  $teamFlickr = $custom["teamFlickr"][0];   
	      		  $teamYoutube = $custom["teamYoutube"][0];   
	      		  $teamDribbble = $custom["teamDribbble"][0];  
			?>
			<?php echo sl_load_template();?>
		<?php endwhile; 
		endif; ?> 
		</div><!-- team-itemlist-col1 -->
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