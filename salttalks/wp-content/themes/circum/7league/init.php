<?php
// 7League FRAMEWORK BY 7THEME.NET
// VERSION 1.1 
global $post;

/* GLOBAL VARS */

$sc_gen_codes = array(); 

require_once ( get_template_directory() . '/7league/translator.php' ); 

require_once ( get_template_directory() . '/7league/7league_functions.php' );
require_once ( get_template_directory() . '/7league/profile_presets.php' );
require_once ( get_template_directory() . '/7league/webfonts.php' );
require_once ( get_template_directory() . '/7league/config.php' );

require_once ( get_template_directory() . '/7league/theme_config.php' );
require_once ( get_template_directory() . '/7league/template_tags.php' );

require_once ( get_template_directory() . '/7league/crop.php' );
require_once ( get_template_directory() . '/7league/options.php' );
require_once ( get_template_directory() . '/7league/updates.php' );
require_once ( get_template_directory() . '/7league/profile.php' );
require_once ( get_template_directory() . '/7league/fa_icons.php' );
require_once ( get_template_directory() . '/7league/sl_pt_meta.php' );  
require_once ( get_template_directory() . '/7league/options-page.php' );
require_once ( get_template_directory() . '/7league/shortcodes.php' );
require_once ( get_template_directory() . '/7league/widgets.php' );
require_once ( get_template_directory() . '/7league/sidebars.php' ); 
require_once ( get_template_directory() . '/7league/allslider/allslider.php' );
require_once ( get_template_directory() . '/7league/allslider/allslider_settings.php' );
require_once ( get_template_directory() . '/7league/allslider/allslider_settings_page.php' );
// require_once ( get_template_directory() . '/7league/cufon.php' );
require_once ( get_template_directory() . '/7league/callscripts.php' ); 
require_once ( get_template_directory() . '/7league/posttype-client.php' ); 
require_once ( get_template_directory() . '/7league/posttype-testimonial.php' ); 
require_once ( get_template_directory() . '/7league/posttype-team.php' ); 
require_once ( get_template_directory() . '/7league/posttype-portfolio.php' );  
require_once ( get_template_directory() . '/7league/extend-posttype-post.php' ); 
require_once ( get_template_directory() . '/7league/guides.php' ); 
require_once ( get_template_directory() . '/7league/sl_single_header.php' ); 
require_once ( get_template_directory() . '/7league/widgets_import.php' ); 
require_once ( get_template_directory() . '/7league/attachment_box.php' ); 
require_once ( get_template_directory() . '/7league/sl_customizer.php' ); 
// require_once ( get_template_directory() . '/7league/register.php' ); 


// THEME UPDATE NOTIFICATION

if ( is_admin() ) {
	include_once ( get_template_directory() . '/7league/updater.php');
}

 



if( load_option("show_support_page") != "false" )
	{
	require_once ( get_template_directory() . '/7league/landing.php' ); 
	}

 
if(load_option("hide_wp")=="on")
	{
	require_once ( get_template_directory() . '/7league/anonym.php' ); 
	} 


require_once ( get_template_directory() . '/7league/options-page.php' );


add_filter( 'body_class', 'add_transition_class');
function add_transition_class( $classes ) 
	{
	if(load_option("page_transition")=="on")
		{
		$classes[]='has_transition';
		}
	return $classes;
	}


 
if(get_option($shortname."_installed")!="installed")
	{
	sevenleague_install();
	install_presets();
	sl_install_other_options();
	}


 


?>