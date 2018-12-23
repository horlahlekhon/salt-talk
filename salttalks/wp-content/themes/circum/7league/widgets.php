<?php
 





///////////////////////////////
///////////////////////////////
///////////////// CONTACT DETAILS WIDGET
///////////////////////////////
///////////////////////////////
 

class ContactsWidget extends WP_Widget
	{
	function ContactsWidget()
		{
		$widget_ops = array('classname' => 'ContactsWidget', 'description' => 'Displays your Contact Details' );
		$this->WP_Widget('ContactsWidget', 'Widget :: Contact Details', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ,'adress'=>'','fon'=>'','mobil'=>'','fax'=>'','email'=>'','website'=>'','facebook'=>'','twitter'=>'' ) );
		$title =  $instance['title'];
		$adress=$instance['adress'];
		$fon=$instance['fon'];
		$mobil=$instance['mobil'];
		$fax=$instance['fax'];
		$email=$instance['email'];
		$website=$instance['website'];
		$facebook=$instance['facebook'];
		$twitter=$instance['twitter'];
		?><p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('adress'); ?>">Adress: <input class="widefat" id="<?php echo $this->get_field_id('adress'); ?>" name="<?php echo $this->get_field_name('adress'); ?>" type="text" value="<?php echo esc_attr($adress); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('fon'); ?>">Fon number: <input class="widefat" id="<?php echo $this->get_field_id('fon'); ?>" name="<?php echo $this->get_field_name('fon'); ?>" type="text" value="<?php echo esc_attr($fon); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('mobil'); ?>">Mobil: <input class="widefat" id="<?php echo $this->get_field_id('mobil'); ?>" name="<?php echo $this->get_field_name('mobil'); ?>" type="text" value="<?php echo esc_attr($mobil); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('fax'); ?>">Fax: <input class="widefat" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" type="text" value="<?php echo esc_attr($fax); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('email'); ?>">Email: <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('website'); ?>">Website: <input class="widefat" id="<?php echo $this->get_field_id('website'); ?>" name="<?php echo $this->get_field_name('website'); ?>" type="text" value="<?php echo esc_attr($website); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook: <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter: <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" /></label></p>
		<?php
		}

	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['adress'] = $new_instance['adress']; 
		$instance['fon'] = $new_instance['fon']; 
		$instance['mobil'] = $new_instance['mobil']; 
		$instance['fax'] = $new_instance['fax']; 
		$instance['email'] = $new_instance['email']; 
		$instance['website'] = $new_instance['website']; 
		$instance['facebook'] = $new_instance['facebook']; 
		$instance['twitter'] = $new_instance['twitter']; 
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title =$instance['title'];
		$adress=$instance['adress'];
		$fon=$instance['fon'];
		$mobil=$instance['mobil'];
		$fax=$instance['fax'];
		$email=$instance['email'];
		$website=$instance['website'];
		$facebook=$instance['facebook'];
		$twitter=$instance['twitter'];
		if ( $title) 
			{ 
			echo $before_title . $title . $after_title;	
			}
		if($adress)
			{
			echo "<p class='contact_widget contact_adress'><span class='fa fa-home'></span><span>".$adress."</span></p>";
			}
		if($fon)
			{
			echo "<p class='contact_widget contact_fon'><span class='fa fa-phone'></span><span>".$fon."</span></p>";
			}
		if($fax)
			{
			echo "<p class='contact_widget contact_fax'><span class='fa fa-file'></span><span>".$fax."</span></p>";
			}
		if($mobil)
			{
			echo "<p class='contact_widget contact_mobil'><span class='fa fa-mobile-phone'></span><span>".$mobil."</span></p>";
			}
		if($email)
			{
			echo "<p class='contact_widget contact_email'><span class='fa fa-envelope'></span><span><a target='_blank' href='mailto:".$email."'>".$email."</a></span></p>";
			}

		if($website)
			{
			echo "<p class='contact_widget contact_website'><span class='fa fa-link'></span><span><a target='_blank' href='".$website."'>".$website."</a></span></p>";
			}
		if($facebook)
			{
			echo "<p class='contact_widget contact_facebook'><span class='fa fa-facebook'></span><span><a target='_blank' href='http://www.facebook.com/".$facebook."'>".substr("$facebook",0,30)."...</a></span></p>";
			}
		if($twitter)
			{
			echo "<p class='contact_widget contact_twitter'><span class='fa fa-twitter'></span><span><a target='_blank' href='http://www.twitter.com/#/".$twitter."'>".$twitter."</a></span></p>";
			}
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("ContactsWidget");') );


///////////////////////////////
///////////////////////////////
/////////////////////////////// PAYMENTS
///////////////////////////////
///////////////////////////////
 

class PaymentWidget extends WP_Widget
	{
	function PaymentWidget()
		{
		$widget_ops = array('classname' => 'PaymentWidget', 'description' => 'Displays your Payment Types' );
		$this->WP_Widget('PaymentWidget', 'Widget :: Payments', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ,'american_express'=>'','maestrocard'=>'','visacard'=>'','western_union'=>'','mastercard'=>'','paypal'=>'' ) );
		$title = $instance['title'];
		$american_express=$instance['american_express'];
		$maestrocard=$instance['maestrocard'];
		$visacard=$instance['visacard'];
		$western_union=$instance['western_union'];
		$mastercard=$instance['mastercard'];
		$paypal=$instance['paypal'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('american_express'); ?>">American Express: <input id="<?php echo $this->get_field_id('american_express'); ?>" name="<?php echo $this->get_field_name('american_express'); ?>" type="checkbox" <?php if($american_express==true) { echo " checked "; } ?> /></label></p>
		<p><label for="<?php echo $this->get_field_id('maestrocard'); ?>">Maestocard: <input id="<?php echo $this->get_field_id('maestrocard'); ?>" name="<?php echo $this->get_field_name('maestrocard'); ?>" type="checkbox" <?php if($maestrocard==true) { echo " checked "; } ?> /></label></p>
		<p><label for="<?php echo $this->get_field_id('mastercard'); ?>">Mastercard: <input id="<?php echo $this->get_field_id('mastercard'); ?>" name="<?php echo $this->get_field_name('mastercard'); ?>" type="checkbox" <?php if($mastercard==true) { echo " checked "; } ?> /></label></p>
		<p><label for="<?php echo $this->get_field_id('visacard'); ?>">Visacard: <input id="<?php echo $this->get_field_id('visacard'); ?>" name="<?php echo $this->get_field_name('visacard'); ?>" type="checkbox" <?php if($visacard==true) { echo " checked "; } ?> /></label></p>
		<p><label for="<?php echo $this->get_field_id('western_union'); ?>">Western Union: <input id="<?php echo $this->get_field_id('wester_union'); ?>" name="<?php echo $this->get_field_name('western_union'); ?>" type="checkbox" <?php if($western_union==true) { echo " checked "; } ?> /></label></p>
		<p><label for="<?php echo $this->get_field_id('paypal'); ?>">Paypal: <input id="<?php echo $this->get_field_id('paypal'); ?>" name="<?php echo $this->get_field_name('paypal'); ?>" type="checkbox" <?php if($paypal==true) { echo " checked "; } ?> /></label></p>
		<?php
		}

	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['maestrocard'] = $new_instance['maestrocard'];
		$instance['mastercard'] = $new_instance['mastercard'];
		$instance['american_express'] = $new_instance['american_express'];
		$instance['visacard'] = $new_instance['visacard'];
		$instance['western_union'] = $new_instance['western_union'];
		$instance['paypal'] = $new_instance['paypal'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = $instance['title'];
		$american_express=$instance['american_express'];
		$maestrocard=$instance['maestrocard'];
		$visacard=$instance['visacard'];
		$western_union=$instance['western_union'];
		$mastercard=$instance['mastercard'];
		$paypal=$instance['paypal'];
		if($american_express) { $american_express="true"; }
		if($maestrocard) { $maestrocard="true"; }
		if($mastercard) { $mastercard="true"; }
		if($visacard) { $visacard="true"; }
		if($western_union) { $western_union="true"; }
		if($paypal) { $paypal="true"; }
		if ( $title) 
			{ 
			echo $before_title . $title . $after_title;	
			}
		echo do_shortcode("[payment american_express='".$american_express."' maestrocard='".$maestrocard."' mastercard='".$mastercard."' visacard='".$visacard."' western_union='".$western_union."' paypal='".$paypal."' ]");
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("PaymentWidget");') );








///////////////////////////////
///////////////////////////////
/////////////////////////////// AJAX CONTACT
///////////////////////////////
///////////////////////////////
 

class ContactWidget extends WP_Widget
	{
	function ContactWidget()
		{
		$widget_ops = array('classname' => 'ContactWidget', 'description' => 'Displays a Ajax Contact Form' );
		$this->WP_Widget('ContactWidget', 'Widget :: Ajax Contact Form', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => ''  ) );
		$title = $instance['title'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>		
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = $instance['title'];	
		if ( $title) 
			{ 
			echo $before_title . $title . $after_title;	
			}
		echo do_shortcode("[contact]");
		echo $after_widget;
		}

	}
	add_action( 'widgets_init', create_function('', 'return register_widget("ContactWidget");') );














 

///////////////////////////////
///////////////////////////////
/////////////////////////////// GMAP WIDGET
///////////////////////////////
///////////////////////////////
 

class GMapWidget extends WP_Widget
	{
	function GMapWidget()
		{
		$widget_ops = array('classname' => 'GMapWidget', 'description' => 'Displays a Google Map' );
		$this->WP_Widget('GMapWidget', 'Widget :: Google Maps', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '','x'=>'','y'=>'','zoom'=>'10','width'=>'100px','height'=>'100px','type'=>'ROADMAP'  ) );
		$title = $instance['title'];
		$x = $instance['x'];	
		$y = $instance['y'];
		$zoom=$instance['zoom'];
		$width=$instance['width'];
		$height=$instance['height'];
		$type=$instance['type'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('x'); ?>">Longitude: <input class="widefat" id="<?php echo $this->get_field_id('x'); ?>" name="<?php echo $this->get_field_name('x'); ?>" type="text" value="<?php echo esc_attr($x); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('y'); ?>">Latitude: <input class="widefat" id="<?php echo $this->get_field_id('y'); ?>" name="<?php echo $this->get_field_name('y'); ?>" type="text" value="<?php echo esc_attr($y); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('zoom'); ?>">Zoom: <input class="widefat" id="<?php echo $this->get_field_id('zoom'); ?>" name="<?php echo $this->get_field_name('zoom'); ?>" type="text" value="<?php echo esc_attr($zoom); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('width'); ?>">Width (in pixel or %): <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo esc_attr($width); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('height'); ?>">Height (in pixel or %): <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo esc_attr($height); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('height'); ?>">Maptype: 	
			<select class="widefat" id="<?php echo $this->get_field_id('type'); ?>" name="<?php echo $this->get_field_name('type'); ?>" >
				<option value="ROADMAP" <?php if($type=="ROADMAP") { echo "selected"; } ?>>Roadmap</option>
				<option value="SATELLITE" <?php if($type=="SATELLITE") { echo "selected"; } ?>>Sattelite</option>
				<option value="HYBRID" <?php if($type=="HYBRID") { echo "selected"; } ?>>Hybrid</option>
				<option value="TERRAIN" <?php if($type=="TERRAIN") { echo "selected"; } ?>>Terrain</option>
			</select>
		</label></p>
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['x'] = $new_instance['x'];
		$instance['y'] = $new_instance['y'];
		$instance['zoom'] = $new_instance['zoom'];
		$instance['width']=$new_instance['width'];
		$instance['height']=$new_instance['height'];
		$instance['type']=$new_instance['type'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title =$instance['title'];
		$x =$instance['x'];
		$y =$instance['y'];
		$zoom =$instance['zoom'];
		$width=$instance['width'];
		$height=$instance['height'];
		$type=$instance['type'];
		if ( $title) 
			{ 
			echo $before_title . $title . $after_title;	
			}	
		echo do_shortcode("[map type='".$type."' width='".$width."' height='".$height."' x='".$x."' y='".$y."' zoom='".$zoom."']");
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("GMapWidget");') );





///////////////////////////////
///////////////////////////////
/////////////////////////////// YOUTUBE VIDEO WIDGET
///////////////////////////////
///////////////////////////////
 

class YoutubeWidget extends WP_Widget
	{
	function YoutubeWidget()
		{
		$widget_ops = array('classname' => 'YoutubeWidget', 'description' => 'Displays a Youtube Video' );
		$this->WP_Widget('YoutubeWidget', 'Widget :: Youtube', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => ''  ,'yid'=>'','width'=>'','height'=>'' ) );
		$title = $instance['title'];
		if(isset($instance['yid']))
			{
			$yid = $instance['yid'];
			}	
		if(isset($instance['width']))
			{
			$width=$instance['width'];
			}
		$height=$instance['height'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('yid'); ?>">Youtube ID: <input class="widefat" id="<?php echo $this->get_field_id('yid'); ?>" name="<?php echo $this->get_field_name('yid'); ?>" type="text" value="<?php echo esc_attr($yid); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('width'); ?>">Width: <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo esc_attr($width); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('height'); ?>">Height: <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo esc_attr($height); ?>" /></label></p>
		
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['yid'] = $new_instance['yid'];
		$instance['width']=$new_instance['width'];
		$instance['height']=$new_instance['height'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = $instance['title'];
		$yid =$instance['yid'];
		$width=$instance['width'];
		$height=$instance['height'];
		if ( $title) 
			{ 
			echo $before_title . $title . $after_title;	
			}	
		echo do_shortcode("[youtube id=$yid width=$width height=$height]");
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("YoutubeWidget");') );


///////////////////////////////
///////////////////////////////
/////////////////////////////// VIMEO VIDEO WIDGET
///////////////////////////////
///////////////////////////////
 

class VimeoWidget extends WP_Widget
	{
	function VimeoWidget()
		{
		$widget_ops = array('classname' => 'VimeoWidget', 'description' => 'Displays a Vimeo Video' );
		$this->WP_Widget('VimeoWidget', 'Widget :: Vimeo Video', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ,'yid'=>'','width'=>'','height'=>'' ) );
		$title = $instance['title'];
		$yid = $instance['yid'];
		$width=$instance['width'];
		$height=$instance['height'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('yid'); ?>">Vimeo ID: <input class="widefat" id="<?php echo $this->get_field_id('yid'); ?>" name="<?php echo $this->get_field_name('yid'); ?>" type="text" value="<?php echo esc_attr($yid); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('width'); ?>">Width: <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo esc_attr($width); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('height'); ?>">Height: <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo esc_attr($height); ?>" /></label></p>
		
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['yid'] = $new_instance['yid'];
		$instance['width']=$new_instance['width'];
		$instance['height']=$new_instance['height'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = $instance['title'];
		$yid =$instance['yid'];
		$width=$instance['width'];
		$height=$instance['height'];
		if ( $title) 
			{ 
			echo $before_title . $title . $after_title;	
			}	
		echo do_shortcode("[vimeo id=$yid width=$width height=$height]");
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("VimeoWidget");') );



///////////////////////////////
///////////////////////////////
/////////////////////////////// DAILY MOTION VIDEO WIDGET
///////////////////////////////
///////////////////////////////
 

class DMWidget extends WP_Widget
	{
	function DMWidget()
		{
		$widget_ops = array('classname' => 'DMWidget', 'description' => 'Displays a Daily Motion Video' );
		$this->WP_Widget('DMWidget', 'Widget :: Daily Motion Video', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => ''  ,'yid'=>'','width'=>'','height'=>'') );
		$title = $instance['title'];
		$yid = $instance['yid'];
		$width=$instance['width'];
		$height=$instance['height'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('yid'); ?>">Daily Motion ID: <input class="widefat" id="<?php echo $this->get_field_id('yid'); ?>" name="<?php echo $this->get_field_name('yid'); ?>" type="text" value="<?php echo esc_attr($yid); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('width'); ?>">Width: <input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo esc_attr($width); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('height'); ?>">Height: <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo esc_attr($height); ?>" /></label></p>
		
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['yid'] = $new_instance['yid'];
		$instance['width']=$new_instance['width'];
		$instance['height']=$new_instance['height'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title =$instance['title'];	
		$yid =$instance['yid'];
		$width=$instance['width'];
		$height=$instance['height'];
		if ( $title) 
			{ 
			echo $before_title . $title . $after_title;	
			}	
		echo do_shortcode("[dailymotion id=$yid width=$width height=$height]");
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("DMWidget");') );

///////////////////////////////
///////////////////////////////
/////////////////////////////// ONLY FOR LOGGED IN USERS
///////////////////////////////
///////////////////////////////
 
class LoggedWidget extends WP_Widget
	{
	function LoggedWidget()
		{
		$widget_ops = array('classname' => 'LoggedWidget', 'description' => 'Displays the Text-Widget only when user is logged in' );
		$this->WP_Widget('LoggedWidget', 'Widget :: Only logged Users', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ,'text'=>'' ) );
		$title = $instance['title'];
		$text = $instance['text'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('text'); ?>">Text: <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" style="width:100%; height:200px"><?php echo esc_attr($text); ?></textarea></label></p>
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['text'] = $new_instance['text'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
		if (is_user_logged_in()) 
			{
	 		echo $before_widget;
			$title = $instance['title'];	
			$text =$instance['text'];
			if ( $title) 
				{ 
				echo $before_title . $title . $after_title;	
				}	
			echo do_shortcode("$text");
			echo $after_widget;
			}
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("LoggedWidget");') );




///////////////////////////////
///////////////////////////////
/////////////////////////////// ONLY FOR NOT LOGGED IN USERS
///////////////////////////////
///////////////////////////////
 

class NotLoggedWidget extends WP_Widget
	{
	function NotLoggedWidget()
		{
		$widget_ops = array('classname' => 'NotLoggedWidget', 'description' => 'Displays the Text-Widget only when user is not logged in' );
		$this->WP_Widget('NotLoggedWidget', 'Widget :: Only not logged Users', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '','text'=>''  ) );
		$title = $instance['title'];
		$text = $instance['text'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('text'); ?>">Text: <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" style="width:100%; height:200px"><?php echo esc_attr($text); ?></textarea></label></p>
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['text'] = $new_instance['text'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
		if (!is_user_logged_in()) 
			{
	 		echo $before_widget;
			$title = $instance['title'];	
			$text =$instance['text'];
			if ( $title) 
				{ 
				echo $before_title . $title . $after_title;	
				}	
			echo do_shortcode("$text");
			echo $after_widget;
			}
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("NotLoggedWidget");') );



///////////////////////////////
///////////////////////////////
/////////////////////////////// BREADCRUMB WIDGET
///////////////////////////////
///////////////////////////////
 
class BreadcrumbWidget extends WP_Widget
	{
	function BreadcrumbWidget()
		{
		$widget_ops = array('classname' => 'BreadcrumbWidget', 'description' => 'Displays the Breadcrumbs' );
		$this->WP_Widget('BreadcrumbWidget', 'Widget :: Breadcrumbs', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => ''  ) );
		$title = $instance['title'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
 		echo $before_widget;
		$title = $instance['title'];
		if (  $title)  
			echo $before_title . $title . $after_title;
		echo do_shortcode("[breadcrumbs]");
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("BreadcrumbWidget");') );




///////////////////////////////
///////////////////////////////
/////////////////////////////// LOGIN WIDGET
///////////////////////////////
///////////////////////////////
 
class LoginWidget extends WP_Widget
	{
	function LoginWidget()
		{
		$widget_ops = array('classname' => 'LoginWidget', 'description' => 'Displays a Login Form' );
		$this->WP_Widget('LoginWidget', 'Widget :: Login Form', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => ''  ) );
		$title = $instance['title'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
 		echo $before_widget;
		$title = $instance['title'];
		if (( $title) AND (!is_user_logged_in()) )
			echo $before_title . $title . $after_title;
		echo do_shortcode("[login-form]");
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("LoginWidget");') );




///////////////////////////////
///////////////////////////////
/////////////////////////////// SOCIAL WIDGET
///////////////////////////////
///////////////////////////////
 
class SocialWidget extends WP_Widget
	{
	function SocialWidget()
		{
		$widget_ops = array('classname' => 'LoginWidget', 'description' => 'Displays a Your Social Media Icons. Please create it under "Options" -> "Navigation Section" ' );
		$this->WP_Widget('SocialWidget', 'Widget :: Social Icons', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => ''  ) );
		$title = $instance['title'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
 		echo $before_widget;
		$title = $instance['title'];
		if ( $title) 
			echo $before_title . $title . $after_title;
		echo do_shortcode("[social-icons]");
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("SocialWidget");') );







///////////////////////////////
///////////////////////////////
/////////////////////////////// RANDOM POSTS WIDGET
///////////////////////////////
///////////////////////////////
 
class RandomPostWidget extends WP_Widget
	{
	function RandomPostWidget()
		{
		$widget_ops = array('classname' => 'RandomPostWidget', 'description' => 'Displays random posts with thumbnail' );
		$this->WP_Widget('RandomPostWidget', 'Widget :: Random Posts', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'number'=>'3' ,'text'=>'0','headline'=>'1','image'=>'1','readmore'=>'1') );
		$title = $instance['title'];
		$number = $instance['number'];
		$text=$instance['text'];
		$headline=$instance['headline'];
		$image=$instance['image'];
		$readmore=$instance['readmore'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Numbers of Posts: <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('text'); ?>">Excerpt Letters: <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo esc_attr($text); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('headline'); ?>"><input id="<?php echo $this->get_field_id('headline'); ?>" name="<?php echo $this->get_field_name('headline'); ?>" type="checkbox" <?php if($headline) { echo " checked "; } ?>" /> Show Headline?</label></p>
		<p><label for="<?php echo $this->get_field_id('image'); ?>"><input id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="checkbox" <?php if($image) { echo " checked "; } ?>" /> Show Image?</label></p>
		<p><label for="<?php echo $this->get_field_id('readmore'); ?>"><input id="<?php echo $this->get_field_id('readmore'); ?>" name="<?php echo $this->get_field_name('readmore'); ?>" type="checkbox" <?php if($readmore) { echo " checked "; } ?>" /> Show Readmore Button?</label></p>
		
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['text']=$new_instance['text'];
		$instance['headline']=$new_instance['headline'];
		$instance['image']=$new_instance['image'];
		$instance['readmore']=$new_instance['readmore'];
		return $instance;
		} 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
 		echo $before_widget;
		$title =$instance['title'];
		$number = $instance['number'];
		$text = $instance['text'];
		$headline = $instance['headline'];
		$image = $instance['image'];
		$readmore = $instance['readmore'];	
		if($headline) 
			{
			$headline="true";
			}	
			else
				{
				$headline="false";
				}
		if($image)
			{
			$image="true";
			}
			else
				{
				$image="false";
				}
		if($readmore)
			{
			$readmore="true";
			}
			else
				{
				$readmore="false";
				}
		if (!empty($title))
		echo $before_title . $title . $after_title;
 		echo do_shortcode("[random_posts column='1' number=".$number."  headline=".$headline." text=".$text." readmore=".$readmore." image=".$image." imgsize='icon']");
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("RandomPostWidget");') );




///////////////////////////////
///////////////////////////////
/////////////////////////////// RECENT POSTS WIDGET
///////////////////////////////
///////////////////////////////
 
class LastPostWidget extends WP_Widget
	{
	function LastPostWidget()
		{
		$widget_ops = array('classname' => 'LastPostWidget', 'description' => 'Displays the last posts with thumbnail' );
		$this->WP_Widget('LastPostWidget', 'Widget :: Recent Posts', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'number'=>'3', 'text'=>'0','headline'=>'1','image'=>'1','readmore'=>'1' ) );
		$title = $instance['title'];
		$number = $instance['number'];
		$text=$instance['text'];
		$headline=$instance['headline'];
		$image=$instance['image'];
		$readmore=$instance['readmore'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Numbers of Posts: <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" /></label></p>		
		<p><label for="<?php echo $this->get_field_id('text'); ?>">Excerpt Letters: <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo esc_attr($text); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('headline'); ?>"><input id="<?php echo $this->get_field_id('headline'); ?>" name="<?php echo $this->get_field_name('headline'); ?>" type="checkbox" <?php if($headline) { echo " checked "; } ?>" /> Show Headline?</label></p>
		<p><label for="<?php echo $this->get_field_id('image'); ?>"><input id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="checkbox" <?php if($image) { echo " checked "; } ?>" /> Show Image?</label></p>
		<p><label for="<?php echo $this->get_field_id('readmore'); ?>"><input id="<?php echo $this->get_field_id('readmore'); ?>" name="<?php echo $this->get_field_name('readmore'); ?>" type="checkbox" <?php if($readmore) { echo " checked "; } ?>" /> Show Readmore Button?</label></p>
		
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['text']=$new_instance['text'];
		$instance['headline']=$new_instance['headline'];
		$instance['image']=$new_instance['image'];
		$instance['readmore']=$new_instance['readmore'];
		return $instance;
		}
   	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
 		echo $before_widget;
		$title = $instance['title']; 
		$number = $instance['number']; 
		$text = $instance['text'];
		$headline = $instance['headline'];
		$image = $instance['image'];
		$readmore = $instance['readmore'];	
		if($headline) 
			{
			$headline="true";
			}	
			else
				{
				$headline="false";
				}
		if($image)
			{
			$image="true";
			}
			else
				{
				$image="false";
				}
		if($readmore)
			{
			$readmore="true";
			}
			else
				{
				$readmore="false";
				}
		if (!empty($title))
		echo $before_title . $title . $after_title;
			echo  do_shortcode('[recent_posts before="" after="" number="'.$number.'" column="1"  headline="'.$headline.'" text="'.$text.'" show_date="false" readmore="'.$readmore.'" image="'.$image.'" imgsize="icon"]');
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("LastPostWidget");') );





///////////////////////////////
///////////////////////////////
/////////////////////////////// POPULAR POSTS WIDGET
///////////////////////////////
///////////////////////////////
 
class PopPostWidget extends WP_Widget
	{
	function PopPostWidget()
		{
		$widget_ops = array('classname' => 'PopPostWidget', 'description' => 'Displays the popular posts with thumbnail' );
		$this->WP_Widget('PopPostWidget', 'Widget :: Popular Posts', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'number'=>'3','text'=>'0','image'=>'1','headline'=>'1', 'readmore'=>'1' ) ); 
		$title = $instance['title'];
 		$number = $instance['number'];
		$text = $instance['text'];
		$image = $instance['image'];
		$headline = $instance['headline'];
		$readmore = $instance['readmore'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Numbers of Posts: <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('text'); ?>">Excerpt Letters: <input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo esc_attr($text); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('headline'); ?>"><input id="<?php echo $this->get_field_id('headline'); ?>" name="<?php echo $this->get_field_name('headline'); ?>" type="checkbox" <?php if($headline) { echo " checked "; } ?>" /> Show Headline?</label></p>
		<p><label for="<?php echo $this->get_field_id('image'); ?>"><input id="<?php echo $this->get_field_id('image'); ?>" name="<?php echo $this->get_field_name('image'); ?>" type="checkbox" <?php if($image) { echo " checked "; } ?>" /> Show Image?</label></p>
		<p><label for="<?php echo $this->get_field_id('readmore'); ?>"><input id="<?php echo $this->get_field_id('readmore'); ?>" name="<?php echo $this->get_field_name('readmore'); ?>" type="checkbox" <?php if($readmore) { echo " checked "; } ?>" /> Show Readmore Button?</label></p>
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['text'] = $new_instance['text'];
		$instance['image'] = $new_instance['image'];
		$instance['headline'] = $new_instance['headline'];
		$instance['readmore'] = $new_instance['readmore'];
		return $instance;
		}
   	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
 		echo $before_widget;
		$title = $instance['title'];
		$number = $instance['number'];
		$text=$instance['text'];
		$image=$instance['image'];	
		$headline=$instance['headline'];
		$readmore=$instance['readmore'];	
		if($headline) 
			{
			$headline="true";
			}	
			else
				{
				$headline="false";
				}
		if($image)
			{
			$image="true";
			}
			else
				{
				$image="false";
				}
		if($readmore)
			{
			$readmore="true";
			}
			else
				{
				$readmore="false";
				}
		if (!empty($title))
		echo $before_title . $title . $after_title;;
			echo do_shortcode('[popular_post before="" after="" number="'.$number.'" column="1"  headline="'.$headline.'" text="'.$text.'" readmore="'.$readmore.'" image="'.$image.'" imgsize="icon"]');
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("PopPostWidget");') );



///////////////////////////////
///////////////////////////////
/////////////////////////////// LATEST COMMENTS SLIDER WIDGET
///////////////////////////////
///////////////////////////////
 
class LastCommentWidget extends WP_Widget
	{
	function LastCommentWidget()
		{
		$widget_ops = array('classname' => 'LastComment', 'description' => 'Displays last Comments in a Slider' );
		$this->WP_Widget('LastComment', 'Widget :: Comment Slider', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'number'=>'5' , 'pause'=>'3000') );
		$title = $instance['title'];
		$number = $instance['number'];
		$pause=$instance['pause'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Numbers of Comments: <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('pause'); ?>">Pause for Millisecondes: <input class="widefat" id="<?php echo $this->get_field_id('pause'); ?>" name="<?php echo $this->get_field_name('pause'); ?>" type="text" value="<?php echo esc_attr($pause); ?>" /></label></p>
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['pause'] = $new_instance['pause'];
		return $instance;
		}
   	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
 		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$number = $instance['number'];
		$pause=$instance['pause'];
		if (!empty($title))
		echo $before_title . $title . $after_title;
		echo do_shortcode("[commentslider number='$number' pause='$pause' slider='true']");
		echo $after_widget;
		}
	}
	add_action( 'widgets_init', create_function('', 'return register_widget("LastCommentWidget");') );
 
///////////////////////////////
///////////////////////////////
/////////////////////////////// FLICKR WIDGET WIDTH LIGHTBOX
///////////////////////////////
///////////////////////////////
 
class FlickrWidget extends WP_Widget
	{
	function FlickrWidget()
		{
		$widget_ops = array('classname' => 'FlickrWidget', 'description' => 'Displays Flickr Stream' );
		$this->WP_Widget('FlickrWidget', 'Widget :: Flickr Images', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'number'=>'12' , 'fname'=>'') );
		$title = $instance['title'];
		$number = $instance['number'];
		$fname=$instance['fname'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Numbers of Images: <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('fname'); ?>">Flickr Name: <input class="widefat" id="<?php echo $this->get_field_id('fname'); ?>" name="<?php echo $this->get_field_name('fname'); ?>" type="text" value="<?php echo esc_attr($fname); ?>" /></label></p>
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['fname'] = $new_instance['fname'];
		return $instance;
		}
   	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
 		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$number = $instance['number'];
		$widget_id=$args['widget_id'];
		$fname = $instance['fname'];
		if (!empty($title))
		echo $before_title . $title . $after_title;
			echo do_shortcode("[flickr number='$number' id='$fname' ]");
		echo $after_widget;
		}
		}
	add_action( 'widgets_init', create_function('', 'return register_widget("FlickrWidget");') );

/*
**
** SUBMENU WIDGET
**
*/


class SubWidget extends WP_Widget
	{
	function SubWidget()
		{
		$widget_ops = array('classname' => 'SubWidget', 'description' => 'Displays the Submenu of current Page' );
		$this->WP_Widget('SubWidget', 'Widget :: Submenu', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'depth'=>'0' , 'sort'=>'post_title','order'=>'ASC') );
		$title = $instance['title'];
		$depth = $instance['depth'];
		$sort=$instance['sort'];
		$order=$instance['order'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('depth'); ?>">Depth: 
			<select class="widefat" id="<?php echo $this->get_field_id('depth'); ?>" name="<?php echo $this->get_field_name('depth'); ?>" >
				<option></option>
				<option value='0' <?php if(esc_attr($depth)=="0") {echo " selected ";} ?> >Show all Pages</option>
				<option value='1' <?php if(esc_attr($depth)=="1") {echo " selected ";} ?> >Only Top Pages</option>
			</select>
		</label></p>
		<p><label for="<?php echo $this->get_field_id('sort'); ?>">Sort by: 
			<select class="widefat" id="<?php echo $this->get_field_id('sort'); ?>" name="<?php echo $this->get_field_name('sort'); ?>" >
				<option></option>
				<option value='post_title' <?php if(esc_attr($sort)=="post_title") {echo " selected ";} ?> >Post Title</option>
				<option value='menu_order' <?php if(esc_attr($sort)=="menu_order") {echo " selected ";} ?> >Menu Order</option>
				<option value='post_date' <?php if(esc_attr($sort)=="post_date") {echo " selected ";} ?> >Publish Date</option>		
				<option value='post_modified' <?php if(esc_attr($sort)=="post_modified") {echo " selected ";} ?> >Date of last Modifing</option>
			</select>
		</label></p>
		<p><label for="<?php echo $this->get_field_id('order'); ?>">Order ASC or DESC: 
			<select class="widefat" id="<?php echo $this->get_field_id('order'); ?>" name="<?php echo $this->get_field_name('order'); ?>" >
				<option value='ASC' <?php if(esc_attr($order)=="ASC") {echo " selected ";} ?> >ASC</option>
				<option value='DESC' <?php if(esc_attr($order)=="DESC") {echo " selected ";} ?> >DESC</option>
			</select>
		</label></p>


		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['depth'] = $new_instance['depth'];
		$instance['sort'] = $new_instance['sort'];
		$instance['order'] = $new_instance['order'];
		return $instance;
		}
   	function widget($args, $instance)
		{
		global $post;
		extract($args, EXTR_SKIP);
 		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
		$title=trim($title);
		$depth = $instance['depth'];
		$sort = $instance['sort'];
		$order=$instance['order'];
		if ( $title!="")
			{
			if( $post->post_parent) 
				{
				echo $before_title . $title . $after_title;
				}
			}
		$content="[sisters depth='";
		$content.=$depth;
		$content.="' sort='";
		$content.="$sort";
		$content.="' order='";
		$content.="$order";
		$content.="']";	
		echo do_shortcode("$content");		
		echo $after_widget;
		}
		}
	add_action( 'widgets_init', create_function('', 'return register_widget("SubWidget");') );


















	class tp_widget_recent_tweets extends WP_Widget {
		
		public function __construct() {
			parent::__construct(
				'tp_widget_recent_tweets', // Base ID
				'Widget:: Recent Tweets', // Name
				array( 'description' => __( 'Display recent tweets', 'ingrid' ), ) // Args
			);
		}

		
		//widget output
			public function widget($args, $instance) {
				extract($args);
				if(!empty($instance['title'])){ $title = apply_filters( 'widget_title', $instance['title'] ); }
				
				echo $before_widget;				
				if ( ! empty( $title ) ){ echo $before_title . $title . $after_title; }

				
					//check settings and die if not set
						if(empty($instance['consumerkey']) || empty($instance['consumersecret']) || empty($instance['accesstoken']) || empty($instance['accesstokensecret']) || empty($instance['cachetime']) || empty($instance['username'])){
							echo '<strong>Please fill all widget settings!</strong>' . $after_widget;
							return;
						}
					
										
					//check if cache needs update
						$tp_twitter_plugin_last_cache_time = get_option('tp_twitter_plugin_last_cache_time');
						$diff = time() - $tp_twitter_plugin_last_cache_time;
						$crt = $instance['cachetime'] * 3600;
						
					 //	yes, it needs update			
						if($diff >= $crt || empty($tp_twitter_plugin_last_cache_time)){
							
							if(!require_once('twitteroauth.php')){ 
								echo '<strong>Couldn\'t find twitteroauth.php!</strong>' . $after_widget;
								return;
							}
														
							function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
							  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
							  return $connection;
							}
							  
							  							  
							$connection = getConnectionWithAccessToken($instance['consumerkey'], $instance['consumersecret'], $instance['accesstoken'], $instance['accesstokensecret']);
							$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$instance['username']."&count=10&exclude_replies=".$instance['excludereplies']) or die('Couldn\'t retrieve tweets! Wrong username?');
							
														
							if(!empty($tweets->errors)){
								if($tweets->errors[0]->message == 'Invalid or expired token'){
									echo '<strong>'.$tweets->errors[0]->message.'!</strong><br />You\'ll need to regenerate it <a href="https://dev.twitter.com/apps" target="_blank">here</a>!' . $after_widget;
								}else{
									echo '<strong>'.$tweets->errors[0]->message.'</strong>' . $after_widget;
								}
								return;
							}
							
							$tweets_array = array();
							for($i = 0;$i <= count($tweets); $i++){
								if(!empty($tweets[$i])){
									$tweets_array[$i]['created_at'] = $tweets[$i]->created_at;
									
										//clean tweet text
										$tweets_array[$i]['text'] = preg_replace('/[\x{10000}-\x{10FFFF}]/u', '', $tweets[$i]->text);
									
									if(!empty($tweets[$i]->id_str)){
										$tweets_array[$i]['status_id'] = $tweets[$i]->id_str;			
									}
								}	
							}							
							
							//save tweets to wp option 		
								update_option('tp_twitter_plugin_tweets',serialize($tweets_array));							
								update_option('tp_twitter_plugin_last_cache_time',time());
								
							echo '<!-- twitter cache has been updated! -->';
						}
						
						
												
					
					$tp_twitter_plugin_tweets = maybe_unserialize(get_option('tp_twitter_plugin_tweets'));
					if(!empty($tp_twitter_plugin_tweets)){
						print '
						<div class="tp_recent_tweets">
							<ul>';
							$fctr = '1';
							foreach($tp_twitter_plugin_tweets as $tweet){					
								if(!empty($tweet['text'])){
									if(empty($tweet['status_id'])){ $tweet['status_id'] = ''; }
									if(empty($tweet['created_at'])){ $tweet['created_at'] = ''; }
								
									print '<li><span>'.tp_convert_links($tweet['text']).'</span><br /><a class="twitter_time" target="_blank" href="http://twitter.com/'.$instance['username'].'/statuses/'.$tweet['status_id'].'">'.tp_relative_time($tweet['created_at']).'</a></li>';
									if($fctr == $instance['tweetstoshow']){ break; }
									$fctr++;
								}
							}
						
						print '
							</ul>
						</div>';
					}
				
				
				
				echo $after_widget;
			}
			
		
		//save widget settings 
			public function update($new_instance, $old_instance) {				
				$instance = array();
				$instance['title'] = strip_tags( $new_instance['title'] );
				$instance['consumerkey'] = strip_tags( $new_instance['consumerkey'] );
				$instance['consumersecret'] = strip_tags( $new_instance['consumersecret'] );
				$instance['accesstoken'] = strip_tags( $new_instance['accesstoken'] );
				$instance['accesstokensecret'] = strip_tags( $new_instance['accesstokensecret'] );
				$instance['cachetime'] = strip_tags( $new_instance['cachetime'] );
				$instance['username'] = strip_tags( $new_instance['username'] );
				$instance['tweetstoshow'] = strip_tags( $new_instance['tweetstoshow'] );
				$instance['excludereplies'] = strip_tags( $new_instance['excludereplies'] );

				if($old_instance['username'] != $new_instance['username']){
					delete_option('tp_twitter_plugin_last_cache_time');
				}
				
				return $instance;
			}
			
			
		//widget settings form	
			public function form($instance) {
				$defaults = array( 'title' => '', 'consumerkey' => '', 'consumersecret' => '', 'accesstoken' => '', 'accesstokensecret' => '', 'cachetime' => '', 'username' => '', 'tweetstoshow' => '' );
				$instance = wp_parse_args( (array) $instance, $defaults );
						
				echo '
				<p><label>Title:</label>
					<input type="text" name="'.$this->get_field_name( 'title' ).'" id="'.$this->get_field_id( 'title' ).'" value="'.esc_attr($instance['title']).'" class="widefat" /></p>
				<p><label>Consumer Key:</label>
					<input type="text" name="'.$this->get_field_name( 'consumerkey' ).'" id="'.$this->get_field_id( 'consumerkey' ).'" value="'.esc_attr($instance['consumerkey']).'" class="widefat" /></p>
				<p><label>Consumer Secret:</label>
					<input type="text" name="'.$this->get_field_name( 'consumersecret' ).'" id="'.$this->get_field_id( 'consumersecret' ).'" value="'.esc_attr($instance['consumersecret']).'" class="widefat" /></p>					
				<p><label>Access Token:</label>
					<input type="text" name="'.$this->get_field_name( 'accesstoken' ).'" id="'.$this->get_field_id( 'accesstoken' ).'" value="'.esc_attr($instance['accesstoken']).'" class="widefat" /></p>									
				<p><label>Access Token Secret:</label>		
					<input type="text" name="'.$this->get_field_name( 'accesstokensecret' ).'" id="'.$this->get_field_id( 'accesstokensecret' ).'" value="'.esc_attr($instance['accesstokensecret']).'" class="widefat" /></p>														
				<p><label>Cache Tweets in every:</label>
					<input type="text" name="'.$this->get_field_name( 'cachetime' ).'" id="'.$this->get_field_id( 'cachetime' ).'" value="'.esc_attr($instance['cachetime']).'" class="small-text" /> hours</p>																			
				<p><label>Twitter Username:</label>
					<input type="text" name="'.$this->get_field_name( 'username' ).'" id="'.$this->get_field_id( 'username' ).'" value="'.esc_attr($instance['username']).'" class="widefat" /></p>																			
				<p><label>Tweets to display:</label>
					<select type="text" name="'.$this->get_field_name( 'tweetstoshow' ).'" id="'.$this->get_field_id( 'tweetstoshow' ).'">';
					$i = 1;
					for(i; $i <= 10; $i++){
						echo '<option value="'.$i.'"'; if($instance['tweetstoshow'] == $i){ echo ' selected="selected"'; } echo '>'.$i.'</option>';						
					}
					echo '
					</select></p>
				<p><label>Exclude replies:</label>
					<input type="checkbox" name="'.$this->get_field_name( 'excludereplies' ).'" id="'.$this->get_field_id( 'excludereplies' ).'" value="true"'; 
					if(!empty($instance['excludereplies']) && esc_attr($instance['excludereplies']) == 'true'){
						print ' checked="checked"';
					}					
					print ' /></p>';		
			}
	}
	
	
	

										
					//convert links to clickable format
					if (!function_exists('tp_convert_links')) {
						function tp_convert_links($status,$targetBlank=true,$linkMaxLen=250){
						 
							// the target
								$target=$targetBlank ? " target=\"_blank\" " : "";
							 
							// convert link to url
								$status = preg_replace("/((http:\/\/|https:\/\/)[^ )
]+)/e", "'<a href=\"$1\" title=\"$1\" $target >'. ((strlen('$1')>=$linkMaxLen ? substr('$1',0,$linkMaxLen).'...':'$1')).'</a>'", $status);
							 
							// convert @ to follow
								$status = preg_replace("/(@([_a-z0-9\-]+))/i","<a href=\"http://twitter.com/$2\" title=\"Follow $2\" $target >$1</a>",$status);
							 
							// convert # to search
								$status = preg_replace("/(#([_a-z0-9\-]+))/i","<a href=\"https://twitter.com/search?q=$2\" title=\"Search $1\" $target >$1</a>",$status);
							 
							// return the status
								return $status;
						}
					}
					
					
					//convert dates to readable format	
					if (!function_exists('tp_relative_time')) {
						function tp_relative_time($a) {
							//get current timestampt
							$b = strtotime("now"); 
							//get timestamp when tweet created
							$c = strtotime($a);
							//get difference
							$d = $b - $c;
							//calculate different time values
							$minute = 60;
							$hour = $minute * 60;
							$day = $hour * 24;
							$week = $day * 7;
								
							if(is_numeric($d) && $d > 0) {
								//if less then 3 seconds
								if($d < 3) return "right now";
								//if less then minute
								if($d < $minute) return floor($d) . " seconds ago";
								//if less then 2 minutes
								if($d < $minute * 2) return "about 1 minute ago";
								//if less then hour
								if($d < $hour) return floor($d / $minute) . " minutes ago";
								//if less then 2 hours
								if($d < $hour * 2) return "about 1 hour ago";
								//if less then day
								if($d < $day) return floor($d / $hour) . " hours ago";
								//if more then day, but less then 2 days
								if($d > $day && $d < $day * 2) return "yesterday";
								//if less then year
								if($d < $day * 365) return floor($d / $day) . " days ago";
								//else return more than a year
								return "over a year ago";
							}
						}	
					}	
	
	
	
	function register_tp_twitter_widget(){
		register_widget('tp_widget_recent_tweets');
	}
	add_action('widgets_init', 'register_tp_twitter_widget', 1)
	



















?>