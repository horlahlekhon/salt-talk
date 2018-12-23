<?php
/*
Template Name: Login-Template
*/

get_header();

?>

	<div id="<?php echo the_template(); ?>" class="login-page"> 
		<div id="content" class="equal_height"> 
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				 
				<div class="one_fourth"></div>
				<div class="one_half"> 
					<?php 

					if( !is_user_logged_in() )
						{
		
						the_content();

						$args= array( "echo" => false );  
						$f = wp_login_form( $args ); 	
						$f = str_replace('type="submit"', 'type="submit" class="button sc_button custom medium"', $f);
						echo $f;
						}
						else
							{
							echo "<p>".__( 'You are already logged in' , 'sevenleague' )."</p>";
							}
					?>
		
				</div>
				<div class="one_fourth_last"></div>


			<?php endwhile; endif; ?> 
		</div><!-- content -->
		<?php if (the_template()!="page-sidebar-no-sidebar") { ?>
		<div class="sidebar equal_height">
			<div id="sidebar-body">
				<?php load_sidebar( "1",'sidebar-1' ); ?>
			</div>			
		</div>
		<?php } ?>
		<div class="clear"></div> 
	</div>
<?php get_footer(); ?> 