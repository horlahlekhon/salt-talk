<?php


add_action('admin_notices','sl_register_theme');

function sl_register_theme()
	{

	$reg = load_option("theme_register");
	
	$u = "0";
	if( isset( $_REQUEST['page']) && $_REQUEST['page'] == 'sl_help_page' )
		{
		$u = "1";
		}

	if( $reg != "on" && $u == "0" )
		{
		?>
		<div class='error'>
			<p><a href='<?php echo admin_url(); ?>themes.php?page=sl_help_page'>Please register the theme.</a></p>
		</div><?php
		}

	}






add_action('sl_help_page_top','sl_register_theme_form');

function sl_register_theme_form()
	{ 
	if( load_option( "theme_register" ) !="on" )
		{
		?>
		<div class='landing_widget error' style='width:100%; max-width:100%;'>
			<form action='' method='post'>
				<input type='hidden' name='captcha'>
				<input type='hidden' name='action' value='register_theme' />
				<h3>Theme Registration</h3>
				<p>&nbsp;</p>				 
				<p><strong>Please register your theme for update notifications.</strong></p>
				<p>&nbsp;</p>
				<p>
					<label for='tEmail' style='width:200px; display:inline-block;'>Email:</label>
						<input id='tEmail' type='text' name='tEmail' value='' />
					<label for='tCode' style='width:200px; margin-left:50px; display:inline-block;'>Purchasecode: </label>
						<input id='tCode' type='text' name='tCode' value='' />
				<input class='button button-primary button-large' type='submit' style='margin-left:50px' value='Register' /></p>
				<p>&nbsp;</p>
			</form>
		</div><?php 
		}
	}












function sl_register_the_theme()
	{ 

	global $shortname;

	if( isset( $_REQUEST['tCode'] ) && isset( $_REQUEST['tEmail'] ) && isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'register_theme' )
		{
		// SEND TO HOMEBASE 
		$code = $_REQUEST['tCode'];
		$email = $_REQUEST['tEmail'];
		
		if( $code !="" && $email !="" )
			{ 

			$homeurl = "http://7theme.net";
	
			$register_addr = $homeurl."/register?tEmail=$email&tCode=$code";
 
			$respond = file_get_contents( $register_addr );
			
			if( $respond == '1' )
				{
				update_option( $shortname."_theme_register" , "on" );
				}
			}

		}
	} 


add_action( 'admin_init', 'sl_register_the_theme' );