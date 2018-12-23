<?php
// SCRIPTCALLER - ADD THE SCRIPTS  
global $post, $options, $fonts, $gfonts, $shortname, $cufon_fonts, $color_profile;

 ////////////////////
//////////////////// FRAMEWORK REQUIRED STYLES AND SCRIPT HOOKS
////////////////////




//add_action('wp_head', 'sevenleague_call_cufon'); 
add_action('wp_head', 'sevenleague_call_custom_scripts'); 
add_action('wp_head', 'sevenleague_call_webfonts'); 
add_action('wp_head', 'sevenleague_call_custom_styles'); 




// CUFON FONTS

function sevenleague_call_cufon()
	{ 
	global $cufon_fonts;
	if($cufon_fonts!="")
		{
		foreach((array)$cufon_fonts as $font => $data) 
			{
			echo "<script type='text/javascript' src='".$data['file_url']."'></script>";
			}
		wp_enqueue_script( 'cufon' ); 
		$return='<script type="text/javascript">';
		if(load_option("cufon_h1")!="") { $return.= "Cufon.replace('h1', {fontFamily: \"".stripslashes(load_option("cufon_h1"))."\"}); ";  } 
		if(load_option("cufon_h2")!="") { $return.= "Cufon.replace('h2', {fontFamily: \"".stripslashes(load_option("cufon_h2"))."\"}); ";  } 
		if(load_option("cufon_h3")!="") { $return.= "Cufon.replace('h3', {fontFamily: \"".stripslashes(load_option("cufon_h3"))."\"}); "; } 
		if(load_option("cufon_body")!="") { $return.= "Cufon.replace('body', {fontFamily: \"".stripslashes(load_option("cufon_body"))."\"}); "; } 
		$return.='</script>';
		echo $return."\n"; 
		} 
	}



// GOOGLE WEBMASTER TOOLS 

function sevenleague_call_custom_scripts()
	{ 
	if(load_option("google_webmaster"))
		{
		echo stripslashes(load_option("google_webmaster")."\n");
		} 
	} 


// GOOGLE WEBFONTS

function sevenleague_call_webfonts()
	{	
	global $options, $gfonts, $color_profile, $shortname;


	// CHECK IF A COLOR PROFILE IS USED AND REPLACE DEFAULT OPTIONS
 

  	if(isset($color_profile) && $color_profile != "" )
 		{
		$val = "";
		$saved_profiles=get_option("theme_profiles");	
		$profile = $color_profile;
		$n=$shortname."_".$name; 	
		}






	foreach ($options as $value) 
		{
		if($value['type']=="font")	
			{
			$s = str_replace( $shortname."_", "" , $value['id'] );	 

			$tarr= load_option( $s );
	 
			if($tarr!="")
				{
				$arr[]=$tarr;
				}
			}
		}

	$used_fonts="";
	$fams="";

	if( isset( $arr ) && is_array( $arr )) {

		$arr=array_values(array_unique($arr)); 
		for($i=0;$i<count($arr); $i++)
			{
			if(in_array($arr[$i],$gfonts))
				{
				$arr[$i]= $arr[$i];
				if($arr[$i]!="") { $my_font=str_replace(" ","+",$arr[$i]); $used_fonts.=$my_font."%7CPT"; }
				$fams.= "'".$arr[$i]."',";
				}
		
			}
	}


	if(isset($used_fonts))
		{
		if($used_fonts!="") 
			{  
			echo "<link type='text/css' rel='stylesheet' href='//fonts.googleapis.com/css?family=".$used_fonts."' />\n";
			echo '<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
				<script>
  				WebFont.load({
    				google: {
      						families: ['.$fams.']
    					}
  				});
				</script>';
			}
		}
	}


// CUSTOM STYLES

function sevenleague_call_custom_styles()
	{
	global $post;
	if( isset( $post ) )
		{
		$cbg=get_post_custom_values('cbg');
		$bgcolor=get_post_custom_values("bgcolor");
		$cx=get_post_custom_values("cx");
		$cy=get_post_custom_values("cy");
		$crep=get_post_custom_values("crep");
		$cfix=get_post_custom_values("cfix"); 
		$return="";
		if($bgcolor)
			{
			$return.='#cbackground {background-color:'.$bgcolor[0].'}';	
			} 
		if($cbg[0])
			{
			$return.='#cbackground {background:url('.$cbg[0].') '.$cx[0].' '.$cy[0].' '.$crep[0];
			if($cfix[0]=="on") 
				{ 
				$return.= " fixed";
				}
			$return.='}';
			}
		if($return!="")
			{
			$ret="<style type='text/css'>";
			$ret.=$return;
			$ret.='</style>';
			echo $ret;
			} 
		}
	}

 


add_action('init', 'sevenleague_call_scripts'); 
add_action('init', 'sevenleague_call_styles'); 



function sevenleague_call_scripts()
	{
	global $post;
	wp_register_script( 'jqueryNivo', get_template_directory_uri().'/script/jquery.nivo.js','','',TRUE);
	wp_register_script( 'jqueryCycle', get_template_directory_uri().'/script/jquery.cycle.js' ,'','',TRUE);
	wp_register_script( 'jqueryTransform', get_template_directory_uri().'/script/jquery-transform.js','','',TRUE );
	wp_register_script( 'jqueryCss', get_template_directory_uri().'/script/jquery-css.js','','',TRUE ); 
	// wp_register_script( 'cufon', get_template_directory_uri().'/script/cufon.js' ,'','', FALSE);
	wp_register_script( 'mobilemenu', get_template_directory_uri().'/script/jquery.mobilemenu.js' ,'','',TRUE);
	wp_register_script( 'jqueryCaroufredsel', get_template_directory_uri().'/script/jquery.caroufredsel.js','','',TRUE ); 
	wp_register_script( 'scrollbar', get_template_directory_uri().'/script/jquery.scrollbar.js','','',TRUE ); 
	wp_register_script( 'Custom', get_template_directory_uri().'/7league/script/custom.js.php','','',TRUE ); 
	wp_register_script( 'Superfish', get_template_directory_uri().'/script/superfish.js' ,'','',TRUE); 
	wp_register_script( 'Easing', get_template_directory_uri().'/script/jquery.easing.min.js' ,'','',TRUE);  
	wp_register_script( 'jqueryWI', get_template_directory_uri().'/script/jquery.waitforimages.min.js','','',TRUE );      
	wp_register_script( 'wookmark', get_template_directory_uri().'/script/jquery.wookmark.js' ,'','',TRUE);    
	wp_register_script( 'flex', get_template_directory_uri().'/script/jquery.flexslider-min.js','','',TRUE );   
	wp_register_script( 'mobile', get_template_directory_uri().'/script/mobile.js','','',TRUE );    
	wp_register_script( 'modernizr', get_template_directory_uri().'/script/modernizr.custom.js','','',TRUE );   
	wp_register_script( 'nicescroll', get_template_directory_uri().'/script/jquery.nicescroll.js','','',TRUE );   
	wp_register_script( 'seven_plugins', get_template_directory_uri().'/script/plugins.js','','',TRUE );   
	wp_register_script( 'kin', get_template_directory_uri().'/script/jquery.kinetic.js','','',TRUE );    
	wp_register_script( 'smooth', get_template_directory_uri().'/script/jquery.smooth.js','','',TRUE );   
	wp_register_script( 'freewall', get_template_directory_uri().'/script/freewall.js','','',TRUE );      
	wp_register_script( 'owlslider', get_template_directory_uri().'/script/owl.carousel.min.js','','',TRUE );   
	wp_register_script( 'kenburns', get_template_directory_uri().'/script/kenburns.js','','',TRUE );   

	wp_register_script( 'justifyGallery', get_template_directory_uri().'/script/jquery.justifiedGallery.min.js','','',TRUE );  


	wp_register_script( 'tosrus', get_template_directory_uri().'/script/jquery.tosrus.min.all.js','','',TRUE );   

	wp_enqueue_script( 'jquery','','','',true ); 
	wp_enqueue_script( 'modernizr' );
	if(is_admin())
		{
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-draggable');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-selectable');
		wp_enqueue_script('jquery-ui-dialog');
		wp_enqueue_script('jquery-ui-datepicker');
		}

	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-widget');
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script( 'Easing' ); 
	
	if( !is_admin() )
		{
		// wp_enqueue_script( 'cufon' ); 
		}

	wp_enqueue_script( 'jqueryNivo' );
	wp_enqueue_script( 'jqueryCycle' );
	wp_enqueue_script( 'jqueryCaroufredsel' ); 
	wp_enqueue_script( 'easing' ); 
	wp_enqueue_script( 'mouse' ); 
	wp_enqueue_script( 'scrollbar' );
	wp_enqueue_script( 'jqueryWI');
	wp_enqueue_script( 'wookmark' );
	wp_enqueue_script( 'flex' );
	wp_enqueue_script( 'mobile' );
	wp_enqueue_script( 'seven_plugins' ); 
	wp_enqueue_script( 'kin' );
	wp_enqueue_script( 'freewall' );
	wp_enqueue_script( 'tosrus' );

	if(!is_admin())
		{
		wp_enqueue_script( 'nicescroll' );
		wp_enqueue_script( 'Custom' );  
		}
	
	} 

// FRONTEND STYLES

function sevenleague_call_styles()
	{
	global $color_profile, $post;

	$pid = "";

	if( isset( $post ) && $post->ID!="" )
		{
		$pid = $post->ID;
		}

	if(!is_admin())
		{
		if(load_option("woocommerce")=="on")
			{
			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_enqueue_style('woocommerce_custom', get_template_directory_uri() . '/woocommerce/woocommerce.css', false); 
			}
		wp_enqueue_style('theme-css', get_stylesheet_directory_uri() . '/style.css', false); 
		wp_enqueue_style('owl-all', get_template_directory_uri() . '/style/owl_all.css', false); 
		wp_enqueue_style('font-awesome', get_template_directory_uri() . '/style/font-awesome.css', false); 
		wp_enqueue_style('animate', get_template_directory_uri() . '/style/animate.min.css', false); 
		if(load_option("responsive")=="on") 
			{ 
			wp_enqueue_style('7league_responsive', get_template_directory_uri() . '/style/responsive.css', false); 
			}
		if(load_option("dark_preset")=="on")
			{	
			wp_enqueue_style('dark-css', get_stylesheet_directory_uri() . '/style/dark.css', false); 
			}
		wp_enqueue_style('custom-css', get_template_directory_uri() . "/7league/css/customcss.php?color_profile=$color_profile&post=$pid", false);  

		}
		else
			{
			wp_enqueue_style('animate', get_template_directory_uri() . '/style/animate.min.css', false); 
			wp_enqueue_style('font-awesome', get_template_directory_uri() . '/style/font-awesome.css', false); 
			}
	}




add_action( 'wp_head', 'sl_add_ie_fix');
function sl_add_ie_fix()
	{
	echo "<!--[if IE]><script type='text/javascript' src='".get_template_directory_uri()."script/selectivizr-min.js'></script><![endif]-->";
	}




function sevenleague_load_additional_fonts()
	{
	global $options;
	foreach( $options as $opt )
		{
		if( isset( $opt['type']) && $opt['type'] == 'fontmulti' )
			{
			$afonts = get_option( $opt['id'] );
			}
		}

	if( isset( $afonts ) && $afonts != ""  )
		{ 
		$afonts =  explode( "," ,$afonts ); 

		$lfonts = "";
		$fams = "";

		foreach( $afonts as $ffont)
			{
			$arr=ucwords($ffont);
			if($arr!="") 
				{ 
				$my_font=str_replace(" ","+",$arr); 
				$lfonts .= $my_font."|"; 
				}
			$fams.= "'".$arr."',";
			} 


		echo "<link id='addit_fonts_styles' type='text/css' rel='stylesheet' href='//fonts.googleapis.com/css?family=".$lfonts."' />\n";
		echo '<script id="addit_fonts_script" src="//ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
			<script>
  			WebFont.load({
    			google: {
      					families: ['.$fams.']
    				}
  			});
			</script>';
		
		}

	}

add_action('wp_head', 'sevenleague_load_additional_fonts'); 