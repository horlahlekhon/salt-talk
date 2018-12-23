<?php
/*
Template Name: Contact-Template
*/
global $options;
if(isset($_POST['submitted'])) 
	{
	if(trim($_POST['contactName']) === '') 
		{
		$nameError = 'Please enter your name.';
		$hasError = true;
		} else 
			{
			$name = trim($_POST['contactName']);
			}
	if(trim($_POST['email']) === '')  
		{
		$emailError = 'Please enter your email address.';
		$hasError = true;
		} 
		else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) 
			{
			$emailError = 'You entered an invalid email address.';
			$hasError = true;
			} else 
				{
				$email = trim($_POST['email']);
				}
	if(trim($_POST['message']) === '') 
		{
		$commentError = 'Please enter a message.';
		$hasError = true;
		} 
		else 
			{
			if(function_exists('stripslashes')) 
				{
				$message = stripslashes(trim($_POST['message']));
				} 
				else 
					{
					$message = trim($_POST['message']);
					}
			}
	if(!isset($hasError)) 
		{
		$emailTo = load_option("contact_email");
		if (!isset($emailTo) || ($emailTo == '') )
			{
			$emailTo = get_option('admin_email');
			}
		$subject = 'Message from '.$name;
		$body = "Name: $name \n\nEmail: $email \n\nMessage: $message";
		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
		if(mail($emailTo, $subject, $body, $headers)) 
			{ 
			$emailSent = true; $trueText=" Thanks, your email was sent successfully. "; 
			}
	}
	if($_POST['ajaxType']=="ajaxTrue")
		{	
		$ajax="true";
 		if($emailSent==true)
			{
			echo "1";
			}	
			else
				{ 
				echo "2";
				}
		}
} ?>
<?php 
if(!isset($ajax))	
	{
	$ajax="false";
	}
if($ajax!="true") { ?>
<?php get_header();  
?>
	<div id="<?php echo the_template(); ?>" class="contact-page"> 
		<div id="content" class="equal_height"> 
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if(isset($emailSent) && $emailSent == true) 
					{  ?>
					<div class="thanks" class="alert alert_green">
						<?php _e('Thanks, your email was sent successfully.','sevenleague'); ?>
					</div>
					<?php 
					}  
					else 
					{   ?>
					<?php the_content(); ?>
					<div id="success"  style="display:none">
						<div class="alert alert_green"><?php _e('Thanks, your email was sent successfully.','sevenleague'); ?></div>
					</div>
					<?php if(isset($hasError) || isset($captchaError)) 
						{ ?><p class="error"><?php _e('Sorry, an error occured.','sevenleague'); ?><p><?php } ?>	
					<div class="clear"></div>
					<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
					<div class="contact_left">
						<p>
							<label for="contactName"><?php _e('Name:','sevenleague'); ?></label>
							<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" /> 
						</p>
						<?php if(isset($nameError)) { ?>
							<p class="error"><?php echo $nameError; ?></p>
						<?php } ?>
					</div>
					<div class="contact_right">	
						<p>
							<label for="contactEmail"><?php _e('Email:','sevenleague'); ?></label>
							<input type="text" name="email" id="contactEmail" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" /> 
						</p>
						<?php if(isset($emailError)) { ?>
							<p class="error"><?php echo $emailError;?></p>
						<?php } ?>
					</div>
					<div class="clear"></div>
						<p>
							<label for="message"><?php _e('Message:','sevenleague'); ?></label>
							<textarea name="message" id="message"   class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
						</p>
						<?php if(isset($commentError)) { ?>
							<p class="error"><?php echo $commentError;?></p>
						<?php } ?>
						<div class="clear"></div>	
						<input type="hidden" name="submitted" id="submitted" value="true" />
						<input type="hidden" name="ajaxType" id="ajaxType" />						
						<label for="contact-go"></label><p><input id="contact-go" class="sc_button medium <?php echo load_option("primary_button"); ?>" name="contact-go" type="submit" value="<?php _e('Send message','sevenleague'); ?>" /></p>
						<div class="clear"></div>
					</form>
					<?php } ?>
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
<?php }   ?>