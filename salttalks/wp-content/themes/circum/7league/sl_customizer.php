<?php

new theme_customizer();

class theme_customizer
	{
	public function __construct()
		{
		add_action ('admin_menu', array(&$this, 'customizer_admin'));
		add_action( 'customize_register', array(&$this, 'customize_manager_demo' ));
		} 
	public function customizer_admin() 
		{
		add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
		} 
	public function customize_manager_demo( $wp_manager )
		{
		$this->sl_color_section( $wp_manager );


		$this->sl_layout_section( $wp_manager );

		$this->sl_body_section( $wp_manager );
		$this->sl_overheader_section( $wp_manager );

		$this->sl_header_section( $wp_manager );
		$this->sl_headline_section( $wp_manager );
		$this->sl_main_section( $wp_manager );
		$this->sl_footer_section( $wp_manager );
		$this->sl_footer2_section( $wp_manager );
		$this->sl_other_section( $wp_manager );


		$this->sl_customizer_autogenerator( $wp_manager );
		$this->sl_customizer_layout( $wp_manager );
		}



 	/* ADD SECTIONS TO CUSTOMIZER */

	public function sl_layout_section( $wp_manager )
		{
		$wp_manager->add_section( 'customiser_sl_colors_section', 
			array(
				'title'          => 'Color Settings',
				'priority'       => 35,
				) 
			); 
		}

	public function sl_body_section( $wp_manager )
		{
		$wp_manager->add_section( 'customiser_sl_colors_section_body', 
			array(
				'title'          => 'Body Settings',
				'priority'       => 35,
				) 
			); 
		}

	public function sl_overheader_section( $wp_manager )
		{
		$wp_manager->add_section( 'customiser_sl_colors_section_overheader', 
			array(
				'title'          => 'Overhead Settings',
				'priority'       => 36,
				) 
			); 
		}

	public function sl_headline_section( $wp_manager )
		{
		$wp_manager->add_section( 'customiser_sl_colors_section_headline', 
			array(
				'title'          => 'Headline Settings',
				'priority'       => 37,
				) 
			); 
		}

	public function sl_header_section( $wp_manager )
		{
		$wp_manager->add_section( 'customiser_sl_colors_section_header', 
			array(
				'title'          => 'Header Settings',
				'priority'       => 37,
				) 
			); 
		}
	public function sl_main_section( $wp_manager )
		{
		$wp_manager->add_section( 'customiser_sl_colors_section_main', 
			array(
				'title'          => 'Content Settings',
				'priority'       => 38,
				) 
			); 
		}
	public function sl_footer_section( $wp_manager )
		{
		$wp_manager->add_section( 'customiser_sl_colors_section_footer', 
			array(
				'title'          => 'Footer Settings',
				'priority'       => 39,
				) 
			); 
		}
	public function sl_footer2_section( $wp_manager )
		{
		$wp_manager->add_section( 'customiser_sl_colors_section_footer2', 
			array(
				'title'          => 'Footer 2 Settings',
				'priority'       => 40,
				) 
			); 
		}

	public function sl_other_section( $wp_manager )
		{
		$wp_manager->add_section( 'customiser_sl_colors_section_other', 
			array(
				'title'          => 'Other Settings',
				'priority'       => 41,
				) 
			); 
		}

	public function sl_color_section( $wp_manager )
    		{ 
        		$wp_manager->add_section( 'customiser_sl_layout_section', 
			array(
		       	     'title'          => 'Layout Settings',
		       	     'priority'       => 34,
				) 
			); 
		} 



















	public function sl_customizer_layout( $wp_manager )
		{
		global $shortname, $options, $hidden_options;

	/* LAYOUT TYPE */

		if( !in_array( 'layout' , $hidden_options ) )
			{
/*
			$wp_manager->add_setting(  load_option( 'theme_shortname' ).'_layout',    array(        
				            'default'        	=> 	load_option( 'layout' ),
					'type' 		=> 	'option', 
				        	'transport' 	=> 	'postMessage',
					'sanitize_callback' 	=>	'sl_sanitize_layout',
					    )
					);
			$wp_manager->add_control(    load_option( 'theme_shortname' ).'_layout' ,  array(
				           	'label' => 'Layout', 
				     	'settings' => load_option( 'theme_shortname' ).'_layout', 
				           	'section' => 'customiser_sl_layout_section', 
					'type'    => 'select',
					'choices'	=>	array('full-width'=>'Full width','block'=>'Block'),  

				     	   ) 
					);
*/
			}
			

	/* MENU TYPE */

		if( !in_array( 'header_layout' , $hidden_options ) )
			{
/*	
			$wp_manager->add_setting(  load_option( 'theme_shortname' ).'_header_layout',    array(        
				            'default'        	=> 	load_option( 'header_layout' ),
					'type' 		=> 	'option', 
				        	'transport' 	=> 	'postMessage',
					'sanitize_callback' 	=>	'sl_sanitize_header_layout',
					    )
					);
			$wp_manager->add_control(    load_option( 'theme_shortname' ).'_header_layout' ,  array(
				           	'label' => 'Header',
				     	'settings' => load_option( 'theme_shortname' ).'_header_layout', 
				           	'section' => 'customiser_sl_layout_section', 
					'type'    => 'select',
					'choices'	=>	array( 'logo centered'=>'Logo Centered' , 'logo blocked left'=>'Logo Blocked Left' , 'logo left'=>'Logo Left' , 'logo right'=>'Logo Right' ),  
				     	   ) 
					);
*/
			}

		}


	





 

	public function sl_customizer_autogenerator( $wp_manager )
		{
		global $options, $gfonts, $hidden_options, $shortname;
	
		$arr = array();
		foreach( $gfonts as $fo )	
			{
			$arr[$fo] = $fo;
			}
		$gfonts_array = $arr;
 

	
		$io = 0;
		foreach ($options as $value)
			{
			$io ++;

			if( isset($value['customizertitle']) && !isset($value['hidden'])  && !in_array( str_replace( $shortname."_", "", $value['id'] ), $hidden_options ) ) 
				{
				if( $value['type'] != "font" )
					{
			 		$wp_manager->add_setting(  $value['id'],    array(        
					            'default'        	=> load_option( $value['id'] ),
						'type' 		=> 'option', 
					        	'transport' => 'postMessage',
						    )
						);
					}

			// TYPE FONT

				if( $value['type'] == 'font' )
					{

					$pos = array_search( get_option( $value['id']) , $gfonts); 

			 		$wp_manager->add_setting(  $value['id'],    array(        
					            'default'        	=> load_option( $value['id'] ),
						'type' 		=> 'option', 
					        	'transport' => 'postMessage',
						'sanitize_callback' 	=>	'sl_sanitize_font',
						    )
						);
					 
					$wp_manager->add_control( new WP_Customize_Control($wp_manager, $value['id'],  array(
					           	'label' => $value['customizertitle'],
					     	'settings' =>$value['id'], 
					           	'section' => 'customiser_sl_colors_section_'.$value['csection'],
		       	 			'priority'       => $io,
						'type'    => 'select', 
						'choices'	=>	$gfonts_array,  

					     	   )
					 	   )
						);	
					}





		// TYPE COLOR

				if( $value['type'] == 'text-color' OR $value['type'] == 'fontcolor'  )
					{
					$wp_manager->add_control( new WP_Customize_Color_Control($wp_manager, $value['id'],  array(
					           	'label' => $value['customizertitle'],
					     	'settings' =>$value['id'], 
					           	'section' => 'customiser_sl_colors_section_'.$value['csection'],
		       	 			'priority'       => $io,
					     	   )
					 	   )
						);	
					}

		// TYPE TEXT
				

				if( $value['type'] == 'text'  OR $value['type'] == 'fontsize' )
					{
					$wp_manager->add_control( new WP_Customize_Control($wp_manager, $value['id'],  array(
					           	'label' => $value['customizertitle'],
					     	'settings' =>$value['id'], 
					           	'section' => 'customiser_sl_colors_section_'.$value['csection'],
		       	 			'priority'       => $io,
					     	   )
					 	   )
						);	
					}






				}	
		}













	//	}



 

	if ( $wp_manager->is_preview() && ! is_admin() ) 
		{
		add_action( 'wp_footer', 'example_customize_preview1', 21);
		} 
	}
}
  
function example_customize_preview1()
	{
	global $shortname, $options, $gfonts; 
	$f = "[";
	foreach($gfonts as $font)
		{ 
		$f .= "'".$font."',"; 
		} 
	$f .= "]";	
	$f = str_replace( ",]" , "]\n;" , $f );

	?>
	<script type="text/javascript">


	<?php /* var gfonts = <?php echo $f; ?>   */ ?>
	
	( function( $ ) 
		{
            		wp.customize('<?php echo load_option("theme_shortname"); ?>_layout',function( value ) 
			{
                		value.bind(function(to) 
				{  
				if( to === "block")
					{ 		
	                    			$('#layout').removeClass('full-width').addClass('block');
					}
					else
						{ 
						if( to === "full-width" )
							{
							$('#layout').removeClass('block').addClass('full-width');
							}
						}
                			});
            			});


             	wp.customize('<?php echo load_option("theme_shortname"); ?>_header_layout',function( value ) 
			{
                		value.bind(function(to) 
				{  
				if( to === "0")
					{ 		
	                    			$('#headline').removeClass('logo-centered logo-blocked-left logo-left logo-right').addClass('logo-centered'); 
					}
				if( to === "1")
					{ 		
	                    			$('#headline').removeClass('logo-centered logo-blocked-left logo-left logo-right').addClass('logo-blocked-left'); 
					}
				if( to === "2")
					{ 		
	                    			$('#headline').removeClass('logo-centered logo-blocked-left logo-left logo-right').addClass('logo-left'); 
					}
				if( to === "3")
					{ 		
	                    			$('#headline').removeClass('logo-centered logo-blocked-left logo-left logo-right').addClass('logo-right'); 
					}
                			});
            			});

 



		<?php

		// AUTOGENERATED THINGS

		foreach ($options as $value)
			{
			if( isset($value['cssgoal']) && $value['cssgoal'] !="" && isset( $value['customizertitle'] ) && !isset($value['hidden']) && $value['type'] !="font" )
				{
				$ex = "";
				if( isset( $value['cssafter'] ) )
					{
					$ex = $value['cssafter'];
					}

				?>
            				wp.customize('<?php echo $value['id']; ?>',function( value ) 
					{
                				value.bind(function(to) 
						{ 
             		       			$('<?php echo $value['cssgoal']; ?>').css('<?php echo $value['csskey']; ?>', to <?php if($ex!="") { ?>+'<?php echo $ex; ?>'<?php } ?> );

						jQuery("body").append("<style type='text/css'><?php echo $value['cssgoal']; ?> {<?php echo $value['csskey']; ?>: "+to+" <?php echo $ex; ?> !important;  }</style>");
             		   			});
            					});
				<?php
				}

			if(  isset( $value['customizertitle'] ) && !isset($value['hidden']) && $value['type'] =="font" )
				{
				?>
            				wp.customize('<?php echo $value['id']; ?>',function( value ) 
					{
                				value.bind(function(to) 
						{     
	
							lfont = to.split(':');  
		    					var link = ("<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=" + lfont[0] + "' media='screen' />");	
							jQuery("head").append(link);
	             		       			$('<?php echo $value['cssgoal']; ?> ').css('font-family', lfont[0]  );
							jQuery("body").append("<style type='text/css'><?php echo $value['cssgoal']; ?> {font-family: "+lfont[0]+" !important; font-weight: "+lfont[1]+" !important;}</style>");   


	             		   		});

            					});
				<?php				
				}

		 
				
			}
		?>



        		})( jQuery )
	</script>
	<?php
	}
 





	/* SANITIZE */

function sl_sanitize_layout( $input ) 
	{ 
	if( $input == "1" )
		{
		return "block";
		}
		elseif( $input == "0" )
			{
			return "full-width";
			} 
	}


function sl_sanitize_header_layout( $input ) 
	{ 
	switch($input)
		{
		case "0":
			return "logo centered";
			break;
		case "1":
			return "logo blocked left";
			break;
		case "2":
			return "logo left";
			break;
		case "3":
			return "logo right";
			break;
		} 

	}



function sl_sanitize_font( $input )
	{
	global $gfonts;
	/*
	$offset = (int)$input;

	if( isset( $gfonts) && $gfonts !=""  && isset( $input ) && $input !="" )
		{
		$input = array_slice($gfonts, $offset, 1); 	
		}
 	*/
	return $input;
	}


