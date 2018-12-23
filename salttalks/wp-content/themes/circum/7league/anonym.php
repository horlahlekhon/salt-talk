<?php
// Admin footer modification
global $options, $shortname;  
function sevenleague_footer_admin ()
	{
	global $shortname, $options;
	echo "";  
	}
	add_filter('admin_footer_text', 'sevenleague_footer_admin');

 

// CUSTOM ADMIN LOGIN HEADER LOGO
function sevenleague_login_logo()
	{ 
	echo '<style  type="text/css">.login h1 a {  background-image:none !important; height:0px !important; display:none !important;  } </style>';
	}
	add_action('login_head',  'sevenleague_login_logo');


// REMOVE THE GENERATOR META TAG
remove_action('wp_head', 'wp_generator');

// REMOVE THE HELP CONTEXT
function sevenleague_hide_help() 
	{
    	echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }
          	</style>';
	}
	add_action('admin_head', 'sevenleague_hide_help');

// REMOVE WORDPRESS UPDATE NOTIFICATION
add_filter( 'pre_site_transient_update_core', create_function( '$a', "return null;" ) );


// REMOVE THE UPADE PAGE FROM WORDPRESS MENU
add_action( 'admin_init', 'sevenleague_remove_menu_pages' );
	function sevenleague_remove_menu_pages() 
		{
		remove_submenu_page('index.php','update-core.php');
		}

// REMOVE META BOXES FROM WORDPRESS DASHBOARD FOR ALL USERS
function sevenleague_example_remove_dashboard_widgets() 	
	{	
	global $wp_meta_boxes;
	// Remove the quickpress widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	// Remove the incoming links widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['wordpress_news']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	} 
	add_action('wp_dashboard_setup', 'sevenleague_example_remove_dashboard_widgets' );


function sevenleague_clean_admin_bar() 
	{
    	global $wp_admin_bar;
    	$wp_admin_bar->remove_menu('wp-logo');
	}
	add_action( 'wp_before_admin_bar_render', 'sevenleague_clean_admin_bar' );


function sevenleague_remove_panel_welcome() 
	{
        	echo '<style>[for="wp_welcome_panel-hide"] {display: none !important;}</style>';
	}
	add_action('admin_head', 'sevenleague_remove_panel_welcome');


function sevenleague_remove_wp_version( $translated_text, $untranslated_text, $domain ) 
	{
	$custom_field_text = 'You are using <span class="b">WordPress %s</span>.';
	if ( is_admin() && $untranslated_text === $custom_field_text ) 
		{
        		return '';
    		}
		return $translated_text;
	}
	add_filter('gettext', 'sevenleague_remove_wp_version', 20, 3);


?>