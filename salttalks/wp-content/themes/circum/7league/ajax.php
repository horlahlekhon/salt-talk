<?php 
require_once( '../../../../wp-load.php' ); 
	
	global $options;

	$f = $_SERVER['HTTP_REFERER'];

	if(isset($_POST['submitted'])) {
	if(trim($_POST['contactName']) === '') {
		$nameError = 'Please enter your name.';
		$hasError = true;
	} else {
		$name = trim($_POST['contactName']);
	}
	if(trim($_POST['email']) === '')  {
		$emailError = 'Please enter your email address.';
		$hasError = true;
	} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
		$emailError = 'You entered an invalid email address.';
		$hasError = true;
	} else {
		$email = trim($_POST['email']);
	}
	if(trim($_POST['message']) === '') {
		$commentError = 'Please enter a message.';
		$hasError = true;
	} else {
		if(function_exists('stripslashes')) {
			$message = stripslashes(trim($_POST['message']));
		} else {
			$message = trim($_POST['message']);
		}
	}

	do_action("sl_ajaxform_before_sendmail");

	if(!isset($hasError)) {
		$emailTo = get_option('oitheme_contact_email');
		if (!isset($emailTo) || ($emailTo == '') ){
			$emailTo = get_option('admin_email');
		}
		$subject = 'Message from '.$name;
		$subject = apply_filters( 'sl_ajaxform_mailsubject' , $subject );

		$body = "Name: $name \n\nEmail: $email \n\nMessage: $message \n\n Request URL: $f";
		$body = apply_filters( 'sl_ajaxform_mailbody' , $body );

		$headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
		$headers = apply_filters( 'sl_ajaxform_mailheader' , $headers );

		if(mail($emailTo, $subject, $body, $headers)) { $emailSent = true; $trueText=" Thanks, your email was sent successfully. "; }
	}
	if($_POST['ajaxType']=="ajaxTrue")
		{
		if($emailSent==true)
			{
			echo "1";
			}	
			else
				{ 
				echo "2";
				}
		}
		else
			{
			$url=$_SEVER["HTTP_REFERER"];
			//header("Location: $url");
			die();
			}
	} 
?>