<?php
/*
Template Name: Register-Template
*/
require_once(ABSPATH . WPINC . '/registration.php');
global $wpdb, $user_ID;
//Check whether the user is already logged in
if ( !$user_ID ) 
	{ 
	if( isset( $_REQUEST['regajax'] ) )
		{ 

		$username = $wpdb->escape($_REQUEST['user_login']);
		if(empty($username)) 
			{
			echo "<p>".__('User name should not be empty' , 'sevenleague' )."</p>"; 
			echo "<p><a href='#' id='open_again'>Try again</a></p>";
			exit();
			}
		$email = $wpdb->escape($_REQUEST['user_email']);
		if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) 
			{
			echo "<p>".__( 'Please enter a valid email' , 'sevenleague')."</p>"; 
			echo "<p><a href='#' id='open_again'>Try again</a></p>";
			exit();
			}

			$random_password = wp_generate_password( 12, false );
			$status = wp_create_user( $username, $random_password, $email );
			if ( is_wp_error($status) )
				{
				echo "<p>".__( 'Username already exists. Please try another one.' , 'sevenleague' )."</p>";
				echo "<p><a href='#' id='open_again'>Try again</a></p>";
				}
				else 
					{
					$from = get_option('admin_email');
				             $headers = 'From: '.$from . "\r\n";
					$subject = "Registration successful";
					$msg = "Registration successful.\nYour login details\nUsername: $username\nPassword: $random_password";
					wp_mail( $email, $subject, $msg, $headers );
					echo "<p>".__( 'Please check your email for login details' , 'sevenleague' )."</p>";

			 		} 
			exit(); 
			die();
		} 
	else 
	{

get_header();

?>

	<div id="<?php echo the_template(); ?>" class="register-page"> 
		<div id="content" class="equal_height"> 
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				 
				<div class="one_fourth"></div>
				<div class="one_half">
					<?php the_content(); ?>
 					<?php
					 if(get_option( 'users_can_register' ) )
						{
						?>

						<div id="register-form"> 
							<form action="<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>" method="post" id="wp_signup_form"  >		
	
								<input type="hidden" name="regajax" id="regajax" value="true" />

								<label for="user_login"><?php echo _e( 'Username' , 'sevenleague' ); ?></label>
									<input type="text" name="user_login" placeholder="<?php echo _e( 'Username' , 'sevenleague' ); ?>" id="user_login" class="input" />
	
								<label for="user_email"><?php echo _e( 'E-Mail' , 'sevenleague' ); ?></label>
									<input type="text" name="user_email" placeholder="<?php echo _e( 'E-Mail' , 'sevenleague' ); ?>" id="user_email" class="input"  />
	
								<?php do_action('register_form'); ?>
								<input type="submit" class="button sc_button custom medium" value="<?php _e('Register','sevenleague'); ?>" id="register" /> 
							</form>
						</div> 
						<div id='result'></div>

						<script type="text/javascript">
						//<![CDATA[
	
						jQuery(function($) 
							{

							$('#open_again').live( "click" , function()
								{
								$("#result").hide();
								$("#register-form").show();			
								return false;
								});
		
						$("#register").click(function() 
							{
			
							var input_data = $('#wp_signup_form').serialize();
				 
							$('#register-form').hide();
			
							$("#result").html('<img src="<?php bloginfo('template_url') ?>/images/wait.gif" class="loader" />').fadeIn();
						
							$.ajax({
								type: "POST",
								url:  "<?php echo $_SERVER['REQUEST_URI']; ?>",
								data: input_data,
								success: function(msg){
									$('.loader').remove(); 		
									$('#result').html(msg);  
									}
								});
							return false;
			
							});
						});
						//]]>
						</script>

						<?php
						}
						else
							{
							echo "<div class='error'>".__( "User registration is currently not allowed." , "sevenleague" )."</div>"; 
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
<?php  
		} 
	} 	
	else 
		{ 
		header( "Location: ".home_url() );
		}

?>