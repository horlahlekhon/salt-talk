<?php get_header(); 
 ?>	
<!-- single-team.php / TEAM SINLGE TEMPLATE-->
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); 


$teamFacebook = false;
$teamTwitter =  false;
$teamFlickr = false;
$teamYoutube =  false;
$teamDribbble =  false;
$teamPhone= false;
$teamFax= false;
$teamEmail= false;

$custom = get_post_custom($post->ID);  

if ( isset( $custom["teamFacebook"][0] ) )
	{
	$teamFacebook = $custom["teamFacebook"][0];   
	}

if( isset( $custom["teamTwitter"][0] ) )
	{ 
	$teamTwitter = $custom["teamTwitter"][0];   
	}

if( isset( $custom["teamFlickr"][0] ) )
	{
	$teamFlickr = $custom["teamFlickr"][0];   
	}

if( isset( $custom["teamYoutube"][0] ) )
	{
	$teamYoutube = $custom["teamYoutube"][0];   
	}

if( isset( $custom["teamDribbble"][0] ) )
	{
	$teamDribbble = $custom["teamDribbble"][0]; 
	}

if( isset( $custom["teamPhone"][0] ) )
	{
	$teamPhone=$custom["teamPhone"][0];
	}

if( isset( $custom["teamFax"][0] ) )
	{
	$teamFax=$custom["teamFax"][0];
	}

if( isset( $custom["teamEmail"][0] ) )
	{
	$teamEmail=$custom["teamEmail"][0];
	}
?>
<div id="<?php echo the_template(); ?>" <?php post_class(); ?>>
	<div id="content" class="equal_height single_team">
		<?php if(is_single()) { ?> 
		<?php } else { ?>
			<h3 class="single-heading"><?php the_title(); ?></h3>
		<?php } ?>

		<div class='two_third'>

			<?php sl_single_header_output(); ?>

			<div class="post-content">
				<?php the_content(); ?>
				<div class="clear"></div>
			</div>
	
		</div>
	
		<div class='one_third_last'>
	
		<div class="single_team_contact_container" style="float:right">
			<p class="team_single_contacts"><strong><?php _e('Contacts','sevenleague'); ?></strong></p>
			<?php
			if($teamPhone)
				{
				echo "<p class='single_team_phone contact_details phone contact_fon'><i class='fa fa-phone'></i><span>$teamPhone</span></p>";
				}
			if($teamFax)
				{
				echo "<p class='single_team_fax contact_details fax contact_fax'><i class='fa fa-file'></i><span>$teamFax</span></p>";
				}
			if($teamEmail)
				{
				echo "<p class='single_team_email contact_details email contact_email'><i class='fa fa-envelope'></i><span><a href='mailto:$teamEmail'>$teamEmail</a></span></p>";
				}
			if(get_the_term_list( get_the_ID(), 'team-position', "", "" )!="")
				{
				?><div class='team_position_container'><i class='fa fa-map-marker'></i><?php
				echo "<span>".strip_tags( get_the_term_list( get_the_ID(), 'team-position', "", ", " ) )."</span>";
				?></div><?php
				}	
			echo "<div class='team_social_container'>";
				if($teamFacebook) { echo "<p class='contact_details'><i class='fa fa-facebook'></i><a target='_blank' class='team_sociallinks facebook' href='$teamFacebook'><span>".__('Facebook','sevenleague')."</span></a></p>"; }
				if($teamTwitter) { echo "<p class='contact_details'><i class='fa fa-twitter'></i><a target='_blank' class='team_sociallinks twitter' href='$teamTwitter'>".__('Twitter','sevenleague')."</a></p>"; }
				if($teamFlickr) { echo "<p class='contact_details'><i class='fa fa-flickr'></i><a target='_blank' class='team_sociallinks flickr' href='$teamFlickr'>".__('Flickr','sevenleague')."</a></p>"; }
				if($teamYoutube) { echo "<p class='contact_details'><i class='fa fa-youtube'></i><a target='_blank' class='team_sociallinks youtube' href='$teamYoutube'>".__('Youtube','sevenleague')."</a></p>"; }
				if($teamDribbble) { echo "<p class='contact_details'><i class='fa fa-dribbble'></i><a target='_blank' class='team_sociallinks dribbble' href='$teamDribbble'>".__('Dribbble','sevenleague')."</a></p>"; }
			echo "</div>";
			?>
		</div>

		</div>
		<div class='clear'></div>
 
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