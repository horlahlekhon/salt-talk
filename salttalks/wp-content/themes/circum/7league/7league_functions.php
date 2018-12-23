<?php 
global $color_profile;
 
/* VERSION 08042014 */
 
/* HACK FOR THE WORDPRESS PREVIEW */ 
function sevenleague_install_for_preview()
	{
	global $color_profile; 
	// INSTALL DEFAULT SETTINGS FOR THE WORDPRESS PREVIEW
	include_once( "config.php" );
	include_once("profile.php");
	include_once( "options.php" );
	include_once("options-page.php");
	sevenleague_install();	

		if(load_option("woocommerce")=="on")
			{
			wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_enqueue_style('woocommerce_custom', get_template_directory_uri() . '/woocommerce/woocommerce.css', false); 
			}
		wp_enqueue_style('theme-css', get_stylesheet_directory_uri() . '/style.css', false); 
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
		wp_enqueue_style('custom-css', get_template_directory_uri() . "/7league/css/customcss.php?color_profile=$color_profile", false);  
	}
add_action("sevenleague_before_customstyle","sevenleague_install_for_preview","100");
 


/* RESPONSIVE FUNCTION */
 

function handle_viewport_in()
	{
	echo '<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />';
	}
add_action("wp_head","handle_viewport_in");



function header_class()
	{
	$return="";
	if(load_option("header_layout")!="" && load_option( 'layout' ) !="sidenav" && load_option( 'layout' ) != "sidenav sidenavright" )
		{
		$return.= str_replace(" ","-",load_option("header_layout"));
		}
	if(load_option("has_menu_description")=="on")
		{
		$return.=" has_menu_description";
		}
	if( load_option( "small_menu" )=="on" )
		{
		$return.=" small_menu";
		}
	echo $return;
	}

function check_posttype($type)
	{
	// THIS FUNCTIONS CHECK IF A POSTTYPE IS ACTIVE OR NOT. THIS REDUCE ERRORS WHILE USING AN INACTIVE POSTTYPE
	if(load_option("posttype_".$type)=="on")
		{
		return;
		}
		else
			{
			echo "<div class='error'><p>This Posttype is not active. Please go to the adminpanel and actived this posttype for using.</p></div>";
			get_footer();
			die();
			}
	}



function print_font($id)
	{ 
	$val=load_option($id);
	if($val!="")
		{
		if(strpos( $val, ":" )!==false)
			{
			$val1=explode(":",$val);
			echo "font-family: '".$val1[0]."'   ; ";
			if($val1[1]!="regular")
				{
				echo "font-weight:".$val1[1].";";
				}
				else
					{
					echo "font-weight: normal;";
					}
			}
			else
				{
				echo "font-family:'".$val."'   ; ";
				}
		}
	}



// ADD CUSTOM BODY CLASSES

add_filter('body_class','sevenleague_body_class');

function sevenleague_body_class($classes  ) 
	{
	global $post, $shortname;
	if(isset($post))
		{
		$custom = get_post_custom($post->ID);
		}
	if(isset($custom["slider_type"][0]) && $custom["slider_type"][0]!="")
		{
		$classes[] = 'has_slider';
		}
		else
			{
			$classes[] = 'has_no_slider';
			}
 
 
 

	return $classes;
}










// THIS FUNCTION CAN BE USED TO EXTEND THE OPTIONS FOR THE ADMINPAEL

function sevenleague_extend_options($array)
	{
	global $options;
	$options = array_merge($options,$array);
	return $options;
	}



// THIS FUNCTION ADDS A PREVIEW IMAGE TO THE ADMIN POST VIEW

add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
add_action('manage_pages_custom_column', 'posts_custom_columns', 5, 2);
function posts_columns($defaults)
	{
    	$defaults['post_thumbs'] = "Image";
    	return $defaults;
	}
function posts_custom_columns($column_name, $id)
	{
	if($column_name === 'post_thumbs')
		{
        		echo the_post_thumbnail('icon');
    		}
	}



// THIS FUNCTION RETURNS A GIVEN ENTRY FROM THE DATABASE
 
function load_option($name=null)
	{
	global $shortname, $color_profile, $post, $wp_query; 
	$name = trim($name);
	$val=get_option($shortname."_".$name);  


  	if(isset($color_profile) && $color_profile != "" )
 		{
		$val = "";
		$saved_profiles=get_option("theme_profiles");	
		$profile = $color_profile;
		$n=$shortname."_".$name; 
		if(isset($saved_profiles[$profile]) )
			{
			$curr_profile = $saved_profiles[$profile]; 
			if(isset($curr_profile[$n]))
		 		{
				$val = $curr_profile[$n]; 			//$saved_profiles["$profile"]["$n"];
		 		} 	
	 		}
		}
	return apply_filters( 'sl_load_option' , $val , $name  );
	}


add_filter( 'sl_load_option' , 'check_for_overheader' , '10' ,3);

function check_for_overheader( $in, $name, $content = null)
	{  
	if( $name == 'show_overheader'  ) { 
		if( get_post_meta( get_the_ID(), 'hide_overheader'  , true ) == 'on' ) {
			$in = false;
		}
	}

	if( $name == 'show_footer'  ) { 
		if( get_post_meta( get_the_ID(), 'hide_footer'  , true ) == 'on' ) {
			$in = false;
		}
	}

	if( $name == 'show_secondfooter'  ) { 
		if( get_post_meta( get_the_ID(), 'hide_underfooter'  , true ) == 'on' ) {
			$in = false;
		}
	}


	return $in;
}

// THIS FUNCTION FRUSTRATE HTML ERRORS

function sevenleague_clean_shortcodes($content)
	{   
	$array = array (
    		'<p>[' => '[', 
    		']</p>' => ']', 
    		']<br />' => ']'
		);
	$content = strtr($content, $array);
	return $content;
	}
add_filter('the_content', 'sevenleague_clean_shortcodes');



// THIS FUNCTION IS USED BY THE ADMINPANEL 

function hex2rgb($hex) 
	{
   	$hex = str_replace("#", "", $hex); 
   	if(strlen($hex) == 3) 
		{
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
	      	$g = hexdec(substr($hex,1,1).substr($hex,1,1));
	      	$b = hexdec(substr($hex,2,1).substr($hex,2,1));
	   	}
		else 
			{
	      		$r = hexdec(substr($hex,0,2));
	      		$g = hexdec(substr($hex,2,2));
	      		$b = hexdec(substr($hex,4,2));
	   		}
	   $rgb = array($r, $g, $b);
	   return implode(",", $rgb); 
	}

// THIS FUNCTION CHANGE A GIVEN COLOR TO A DARKER COLOR

function darker_color($color, $dif=30) 
	{
	$color = str_replace('#', '', $color);
    	if (strlen($color) != 6){ return '000000'; }
    	$rgb = '';
 	for ($x=0;$x<3;$x++)
		{
        		$c = hexdec(substr($color,(2*$x),2)) - $dif;
        		$c = ($c < 0) ? 0 : dechex($c);
        		$rgb .= (strlen($c) < 2) ? '0'.$c : $c;
    		}
 	return '#'.$rgb;
	}     

function change_color($colourstr, $steps) 
	{
	$colourstr = str_replace('#','',$colourstr);
	$rhex = substr($colourstr,0,2);
	$ghex = substr($colourstr,2,2);
	$bhex = substr($colourstr,4,2);

	$r = hexdec($rhex);
	$g = hexdec($ghex);
	$b = hexdec($bhex);

	$r = max(0,min(255,$r + $steps));
	$g = max(0,min(255,$g + $steps));  
	$b = max(0,min(255,$b + $steps));

	return '#'.dechex($r).dechex($g).dechex($b);
	}






/*
** ADD LIGHTBOX TO IMAGES IN CONTENT
*/
function sevenleague_add_rel_lightbox($content)
	{
	$string = '/<a href="(.*?).(jpg|jpeg|png|gif|bmp|ico)"><img(.*?)class="(.*?)wp-image-(.*?)" \/><\/a>/i';	
	preg_match_all( $string, $content, $matches, PREG_SET_ORDER);
	foreach ($matches as $val)
		{
		$slimbox_caption = '';
		$post = get_post($val[5]);		
		$string = '<a href="' . $val[1] . '.' . $val[2] . '"><img' . $val[3] . 'class="' . $val[4] . 'wp-image-' . $val[5] . '" /></a>';
		$replace = '<a href="' . $val[1] . '.' . $val[2] . '" class="prettyPhoto" title="'.get_the_title($val[5]).'"><img' . $val[3] . 'class="' . $val[4] . 'wp-image-' . $val[5] . ' image-wp" /></a>';
		$content = str_replace( $string, $replace, $content);
		}
	return $content;
	}
	add_filter('the_content', 'sevenleague_add_rel_lightbox', 12);




/*
** PRINT THE "EDIT THIS" LINK 
*/
function the_adminbar()
	{
	return edit_post_link();
	}











//////////////////////////
////////////////////////// TEMPLATE FUNCTIONS
//////////////////////////

/* THIS FUNCTION SELECT THE CHOOSEN SIDEBAR */

function load_sidebar ($position  , $sidebar)
	{ 
//	if(!is_404())
//		{
		$return="";
		global $post;
		$sidebarx=get_post_custom_values('the_sidebar');
		$sidebar1=$sidebarx[0];
		$sidebarx=get_post_custom_values('the_sidebar');
		$sidebar2=$sidebarx[0]; 
	
		if($position=="2")
			{
			$custom_sidebar=$sidebar2;
			}
			elseif($position=="1")
				{
				$custom_sidebar=$sidebar1;
				}
		if(($position!="") AND ($position!="1") AND ($position!="2"))
			{
			$custom_sidebar=$position;
			}
		if(isset($custom_sidebar) && !is_archive())
			{
			if($custom_sidebar!="")
				{
				echo "<div class='sidebar_top'></div><div class='sidebar_body'>";
				dynamic_sidebar( "$custom_sidebar" );	
				echo "</div><div class='sidebar_bottom'></div>";		
				}	
				else
					{
					echo "<div class='sidebar_top'></div><div class='sidebar_body'>";
					dynamic_sidebar( "$sidebar" );
					echo "</div><div class='sidebar_bottom'></div>";	
					} 
			}
			else
				{
				if( is_singular() && load_option( 'global_page_sidebar' ) !="" )
					{
					echo "<div class='sidebar_top'></div><div class='sidebar_body'>";
					dynamic_sidebar( load_option( 'global_page_sidebar' ) );
					echo "</div><div class='sidebar_bottom'></div>";
					}

				if( is_singular( 'post' ) && load_option( 'global_post_sidebar' ) !="" )
					{
					echo "<div class='sidebar_top'></div><div class='sidebar_body'>";
					dynamic_sidebar( load_option( 'global_post_sidebar' ) );
					echo "</div><div class='sidebar_bottom'></div>";
					}
				if( is_archive() && load_option( 'global_archive_sidebar' ) !="" )
					{
					echo "<div class='sidebar_top'></div><div class='sidebar_body'>";
					dynamic_sidebar( load_option( 'global_archive_sidebar' ) );
					echo "</div><div class='sidebar_bottom'></div>";
					}

				}	
//		}
	}

/* THIS FUNCTION SELECT THE CHOOSEN PAGETEMPLATE  (FULLWIDTH / RIGHT SIDEBAR / LEFT SIDEBAR )*/

function the_template()
	{ 
	global $post;
	$page_type_class="page-sidebar-no-sidebar";

	if(is_archive() OR is_404())
		{
		$page_type_class="page-sidebar-right";
		}

	if(!is_404() AND isset($post))
		{
		$custom = get_post_custom($post->ID);  
		if(isset($custom['page_type_class'][0]))
			{
			$page_type_class=$custom['page_type_class'][0]; 
			}	
			else
				{
				if( is_singular() )
					{
					if( load_option( "global_page_template" ) != "" )
						{
						$page_type_class = load_option( "global_page_template" );
						}
						else
							{
							$page_type_class="page-sidebar-right";
							}
					}

				if( is_singular( 'post' ) )
					{
					if( load_option( "global_post_template" ) != "" )
						{
						$page_type_class = load_option( "global_post_template" );
						}
						else
							{
							$page_type_class="page-sidebar-right";
							}
					}
				if( is_archive() )
					{
					if( load_option( "global_archive_template" ) != "" )
						{
						$page_type_class = load_option( "global_archive_template" );
						}
						else
							{
							$page_type_class="page-sidebar-right";
							}
					}
				}
		}	
	if( is_404() ) {
		$page_type_class = load_option( "error404_sidebar" );
	}

	$page_type_class = apply_filters('page_type_class', $page_type_class);

	return $page_type_class; 
	} 


/* THIS FUNCTION DISPLAY THE PAGINATION */ 
function custom_pagination()
	{
	global $wp_query;
	$big = 9999; 
	if(paginate_links( array('base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),'format' => '?paged=%#%','current' => max( 1, get_query_var('paged') ),'total' => $wp_query->max_num_pages) )!="")
		{
		echo "<div class='pagination'>";
		echo str_replace( "#038;" , "&", paginate_links( array('base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),'format' => '?paged=%#%','current' => max( 1, get_query_var('paged') ),'total' => $wp_query->max_num_pages) ) );
		echo "</div>";
		}
	}



/* THIS FUNCTION DISPLAY YOUR LOGO, CHOOSEN IN THE ADMINPANEL */

function load_logo()
	{
	global $post;

	if( !is_404() && isset( $post ) )
		{ 
		$custom = get_post_custom($post->ID);  
		}
		else
			{
			$custom="";
			} 

	$return="";



	if(load_option("custom_logo")!="")
		{
		if( !isset( $custom['unlink_logo'][0] )   )
			{
			$return.="<a href=".home_url().">";
			}

		$return.= "<img src='".load_option("custom_logo")."' alt='' />";

		if( !isset( $custom['unlink_logo'][0] )  )
			{
			$return.="</a>";
			}

		if( load_option( "header_layout" ) == "logo blocked left"  && load_option( "header_add_content" ) !="" OR load_option( "header_layout" ) == "logo fixed left" && load_option( "header_add_content" ) !="" OR load_option( "header_layout" ) == "logo fixed right" && load_option( "header_add_content" ) !="" )
			{
			$return.="<div class='header_add_content react_to_left'>".do_shortcode( stripslashes( load_option( "header_add_content" ) ) )."</div>";
			}
		}
		else
			{
			if( !isset( $custom['unlink_logo'][0] )   )
				{
				$return.="<a href=".home_url().">";
				}

			$return.= "<p id='pagename'>".get_bloginfo('name')."</p><p id='pageslogan'>".get_bloginfo('description')."</p>";	

			if( !isset( $custom['unlink_logo'][0] )  )
				{
				$return.="</a>";
				}	

			if( load_option( "header_layout" ) == "logo-blocked-left"  && load_option( "header_add_content" ) !="")
				{
				$return.="<div class='header_add_content react_to_left'>".do_shortcode( stripslashes( load_option( "header_add_content" ) ) )."</div>";
				}		
			}



	$return = apply_filters("the_logo",$return);

	echo $return;

	
	}

/* THIS FUNCTION RETURNS THE THUMBNAIL CAPTION, USEFUL TO DISPLAY A FEATURED IMAGE */

function get_post_thumbnail_caption() 
	{
  	global $post;
	$thumbnail_id    = get_post_thumbnail_id($post->ID);
	$thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
	if ($thumbnail_image && isset($thumbnail_image[0])) 
		{
    		return '<p class="featured_image_caption"><span>'.$thumbnail_image[0]->post_excerpt.'</span></p>';
  		}
	}


/* THIS FUNCTION RETURNS A DESCRIPTION TO A FEATURED IMAGE */

function get_post_thumbnail_description() 
	{
  	global $post;
	$thumbnail_id    = get_post_thumbnail_id($post->ID);
	$thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));
	if ($thumbnail_image && isset($thumbnail_image[0])) 
		{
    		return '<p class="featured_image_description"><span>'.$thumbnail_image[0]->post_content.'</span></p>';
  		}
	}


// THIS FUNCTION REDMOVE AN HTML ERROR

add_filter('the_category', 'sevenleague_remove_category_rel'); 
function sevenleague_remove_category_rel($string)	
	{ 
    	return str_replace('rel="category tag"', '', $string);
	}



// THIS FUNCTION DO SHORTCODES IN WIDGETS

add_filter('widget_text', 'do_shortcode'); 




// DISPLAYS A BREADCRUMB NAVIGATION



/*
** BREADCRUMB FUNCTION
*/

function sevenleague_breadcrumbs() 
	{ 
	$space = '&raquo;';
	$home = 'Home'; 
	$before = '<span class="breadcrumb_current">'; 
	$after = '</span>'; 
	$oi_home_link=home_url();
	$homeLink=$oi_home_link;

echo '<a href="' . $oi_home_link . '">' . $home . '</a> ' . $space . ' '; 
if ( !is_home() && !is_front_page() || is_paged() ) 
	{    
	global $post, $options;
	$oi_home_link = home_url();

	if ( is_category() ) 
		{
		global $wp_query;
		$cat_obj = $wp_query->get_queried_object();
		      $thisCat = $cat_obj->term_id;
		      $thisCat = get_category($thisCat);
		      $parentCat = get_category($thisCat->parent);
		      if ($thisCat->parent != 0) 
				{
				echo(get_category_parents($parentCat, TRUE, ' ' . $space . ' '));
				}
		echo $before . 'Archive "' . single_cat_title('', false) . '"' . $after; 
    		} 
		elseif ( is_day() ) 
			{
			      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $space . ' ';
			      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $space . ' ';
			      echo $before . get_the_time('d') . $after; 
			    } 
		elseif ( is_month() ) 
			{
      			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $space . ' ';
      			echo $before . get_the_time('F') . $after; 
    			}
		elseif ( is_year() ) 
			{
      			echo $before . get_the_time('Y') . $after; 
			}
		elseif ( is_single() && !is_attachment() ) 
			{
      			if ( get_post_type() != 'post' ) 
				{
        				$post_type = get_post_type_object(get_post_type());
        				$slug = $post_type->rewrite;
        				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $space . ' ';
        				echo $before . get_the_title() . $after;
      				} 
		else 
			{
        			$cat = get_the_category(); $cat = $cat[0];
        			echo get_category_parents($cat, TRUE, ' ' . $space . ' ');
        			echo $before . get_the_title() . $after;
      			} 
    		} 
	elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) 
		{
      		$post_type = get_post_type_object(get_post_type());
      		echo $before . $post_type->labels->singular_name . $after; 
    		} 
	elseif ( is_page() && !$post->post_parent ) 
		{
      		echo $before . get_the_title() . $after; 
    		}
	elseif ( is_page() && $post->post_parent ) 
		{
     		$parent_id  = $post->post_parent;
      		$breadcrumbs = array();
      		while ($parent_id) 
			{
       			$page = get_page($parent_id);
        			$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        			$parent_id  = $page->post_parent;
      			}
      		$breadcrumbs = array_reverse($breadcrumbs);
      		foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $space . ' ';
      		echo $before . get_the_title() . $after; 
    		} 
	elseif ( is_search() ) 
		{
      		echo $before . 'Search results for "' . get_search_query() . '"' . $after; 
    		} 
	elseif ( is_tag() ) 
		{
      		echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after; 
    		}
	elseif ( is_author() ) 
		{
       		global $author;
      		$userdata = get_userdata($author);
      		echo $before . 'Articles posted by ' . $userdata->display_name . $after; 
    		} 
	elseif ( is_404() ) 
		{
      		echo $before . 'Error 404' . $after;
    		} 
    	if ( get_query_var('paged') ) 
		{
      		echo $space.'<span>Page' . ' ' . get_query_var('paged') .'</span>';
    		} 
  	}
} 




////////////////////
//////////////////// CUSTOMIZATION FUNCTIONS, MOST USED IN CUSTOMCSS.PHP AND OPTIONS-PAGE.PHP
////////////////////


//  FUNCTION PRINT_OPTION, Check if string is empty, if not: Output the String with Before and After, Used in customcss.php
function print_option($before,$tstring,$after, $alternatestring=null)
	{
	if(!empty($tstring) )
		{
		if($tstring!="false")
			{
			if(($tstring!="") AND ($tstring!=" "))
				{
			echo " $before";
			if(($tstring!="on") AND ($alternatestring=="")  ) 
				{ 
				echo "$tstring"; 
				} 
				else 
					{ 
					echo $alternatestring; 
					}
			echo "$after";
				}
			}
		}		
	}

// FUNCTION SWITCH_TRUE, NEEDED IN CUSTOM.CSS AND OPTIONS.PHP
function switch_true($string)
	{
	if($string=="on")
		{
		$return="true";
		}
		else
			{
			$return="false";
			}
	return $return;
	}

// RETURNS THE USED COLORS IN THE ADMINPANEL

function check_color($color, $used_colors="")
	{
	// global $used_colors;
		if(!in_array($color,$used_colors))
			{
			return $color;
			}
			else
				{
				return "";
				}
	}




function sevenleague_second_headline()
	{
	global $post;
	$custom = get_post_custom($post->ID);   
	$sec=""; 
	$return="";
	if((isset($custom["second_headline"]["0"])) AND ( $custom["second_headline"]["0"]!=""))
		{
		$return="<h2 class='headline_page_subtitle'>".$custom["second_headline"]["0"]."</h2>";
		} 
	$return = apply_filters( "sl_second_headline_return", $return );
	return $return;
	}


function sevenleague_headline_section_class()
	{
	global $post;
	if( isset( $post ) ) {

		$custom = get_post_custom($post->ID);   
		$classname="";
		if((isset($custom["show_headline"][0])) AND ($custom["show_headline"][0]!="on") AND (!is_archive()))
			{
			if($custom["second_headline"][0]!="")
				{
				$classname="has_second_headline sec";
				}
			}
		return $classname;

		}

	}

function sevenleague_css_linear_gradient($color1, $pos1="0%", $color2,  $pos2="100%", $direction="to bottom", $echo = true )
	{ 
	$return="		background: $color1;
			background: -moz-linear-gradient(top, $color1 $pos1, $color2 $pos2);
			background: -webkit-gradient(linear, left top, left bottom, color-stop($pos1,$color1), color-stop($pos2,$color2));
			background: -webkit-linear-gradient(top, $color1 $pos1,$color2 $pos2);
			background: -o-linear-gradient(top, $color1 $pos1,$color2 $pos2);
			background: -ms-linear-gradient(top, $color1 $pos1,$color2 $pos2);
			background: linear-gradient(to bottom, $color1 $pos1,$color2 $pos2); 
		 ";

	if($color1=="" OR $color2=="")
		{
		$return="";
		}
	if( $echo == true ) {
		echo $return;
		}	
		else {
		return $return;
		}
	}





////////////////////////
//////////////////////// HELPER FUNCTIONS
////////////////////////


// REMOVE (NUMER OF POST) BEHIND THE LINKS IN WIDGETS
function sevenleague_categories_postcount_filter ($variable) 
	{
	$variable = str_replace('(', '<span class="post-count"> ', $variable);
	$variable = str_replace('&nbsp;','', $variable);
	$variable = str_replace(')', ' </span>', $variable);
	$variable = str_replace('0</li>', '', $variable);
   	return $variable;
	}
add_filter('wp_list_categories','sevenleague_categories_postcount_filter');
add_filter('get_archives_link','sevenleague_categories_postcount_filter');
add_filter('get_links_list','sevenleague_categories_postcount_filter');
add_filter('get_bookmarks','sevenleague_categories_postcount_filter');
add_filter('wp_list_bookmarks','sevenleague_categories_postcount_filter'); 


// LOAD CUSTOM STYLE IN ADMIN - SECTION

function sevenleague_admin_head() 
	{
	$aurl=get_template_directory_uri();
	$echo= '<link rel="stylesheet" type="text/css" href="'.$aurl;
	$echo.='/7league/css/admin.css">';
	$echo2='<script type="text/javascript" src="'.$aurl;
	$echo2.='/7league/script/admin.js"></script>';
	echo $echo.$echo2;
	}
	add_action('admin_head', 'sevenleague_admin_head');




// ADDS TRACKING CODE, IF SET, TO WP_FOOTER

function sevenleague_footer_tracking()
	{
	echo stripslashes(load_option("google_analytics"));
	}
add_action('wp_footer', 'sevenleague_footer_tracking', 100);















/////////////////////////
///////////////////////// THE BASIC METABOX
/////////////////////////

 

 
add_action( 'add_meta_boxes', 'cbg_add_custom_box' );
add_action( 'save_post', 'cbg_save_postdata' );
add_action( 'save_page', 'cbg_save_postdata' );

function cbg_add_custom_box() 
	{
	$post_types = get_post_types();
	foreach ( $post_types as $post_type )
		{
		if($post_type!="attachment" && $post_type!="revision" && $post_type!="nav_menu_item" )
			{
			add_meta_box( 'choose_your_options',  'Custom Options','cbg_inner_custom_box', $post_type,'normal','high' ); 
			}
		}
	} 
function cbg_inner_custom_box( $post ) 
	{
	global $allslider_sliders, $slider, $options;
	foreach((array)$allslider_sliders as $key => $val) 
		{
		$sl_types[]=$val['name'];
		}
	echo "<style>.meta-box-content {margin:2px; padding:8px; border:1px solid #dcdcdc; }
			.meta-box-content input[type=text] {width:100%; display:block;}
			.meta-box-content h3 {cursor:pointer; margin:0px -8px !important;}
		</style>";
	$cbg=get_post_custom_values('cbg');   
	$content_centered=get_post_custom_values('content_centered');   

	$slideshow_name=get_post_custom_values('slideshow_name');
	$slider_type=get_post_custom_values('slider_type');

	$bgcolor=get_post_custom_values("bgcolor");
	$cx=get_post_custom_values("cx");
	$cx=$cx[0];
	$cy=get_post_custom_values("cy");
	$cy=$cy[0];
	$crep=get_post_custom_values("crep");
	$crep=$crep[0];
	$cfix=get_post_custom_values("cfix");
	$cfix=$cfix[0];
	$page_type_class=get_post_custom_values("page_type_class");
	$page_type_class=$page_type_class["0"];

	$show_headline=get_post_custom_values("show_headline"); 
	$hide_search=get_post_custom_values("hide_search");
	$second_headline=get_post_custom_values("second_headline");

	$group_items=get_post_custom_values("group_items");
	$group_columns=get_post_custom_values("group_columns");
	$group_cat=	get_post_custom_values("group_cat");

	$hide_overheader 	=	get_post_custom_values("hide_overheader");
	$hide_menu	=	get_post_custom_values("hide_menu");
	$hide_footer	=	get_post_custom_values("hide_footer");
	$hide_underfooter	=	get_post_custom_values("hide_underfooter");
	$unlink_logo	=	get_post_custom_values("unlink_logo");

	$custom_header_content = get_post_custom_values("custom_header_content"); 
	$custom_underheader_content = get_post_custom_values("custom_underheader_content"); 

	$sl_rev_id 	=	get_post_custom_values("sl_rev_id");
	$sl_layer_id	=	get_post_custom_values("sl_layer_id");


	$the_sidebar=get_post_custom_values("the_sidebar");
	$the_sidebar=$the_sidebar[0];

	$theme_profile 	=	get_post_custom_values( "theme_profile" );

	$sl_new_menu = get_post_custom_values("sl_new_menu");

	$xcss = get_post_custom_values("xcss");
	$xjs = get_post_custom_values("xjs");
 

	

	
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style/jquery-ui.css" />
	<script type="text/javascript">
		jQuery(document).ready(function() {
		jQuery('.upload_image_button_cbg').click(function() {
		formfield = jQuery('.upload_image_cbg').attr('name');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		window.send_to_editor=window.send_to_editor_cbg;
		return false;
		});
		window.send_to_editor_cbg = function(html) {
		imgurl = jQuery('img',html).attr('src');
		jQuery('.upload_image_cbg').val(imgurl);
		tb_remove();
		}
	jQuery(".src_image").click(function()
		{
		var trigger;
		trigger=jQuery(this).prev().prev().attr('id');
		var url="<?php echo get_template_directory_uri(); ?>/7league/load_bg.php?url=<?php echo get_template_directory_uri(); ?>&trigger="+trigger;
		jQuery("#src_load").load(url).dialog({modal:true,minWidth: 800,maxHeight: 400, height:500 }); 
		});
	jQuery(".tabs").tabs();
	});	
	</script>
	<div class='tabs'>
	<ul>
		<li><a href='#styling'>Layout</a></li>
		<li><a href='#slideshow'>Slideshows</a></li>
		<li><a href='#sidebars'>Sidebars</a></li>
		<li><a href='#headlines'>Headlines</a></li>
		<li><a href='#groups'>Group templates</a></li>
		<li><a href='#extras'>Extras</a></li>
		<?php do_action("sevenleague_add_to_metabox_tablist"); ?>
	</ul>
	<div id="styling">
	 	<div class="options-line">
			<div class="options-left"><label for="cbg">Custom Background:</label></div>
		       	<div class="options-right">
		            		<div class='clear-value'>x</div><input id="cbg" class="upload_image upload_image_cbg" type="text" size="36" name="cbg" value="<?php echo $cbg[0]; ?>" />
				<input class="upload_image_button_cbg" type="button" value="Upload Image" />
						<input class="src_image" type="button" value=" Sample " />
				<div>
					<span>Y-Axis: </span>
							<select name="cy" id="cy" >
								<option></option>
								<option value="top" <?php if( $cy=="top") { echo " selected"; } ?> >Top</>
								<option value="center" <?php if( $cy=="center") { echo " selected"; } ?> >Center</>
								<option value="bottom" <?php if( $cy=="bottom") { echo " selected"; } ?> >Bottom</>					
							</select>
				<span>X-Axis: </span>
					<select name="cx" id="cx" >
						<option></option>
						<option value="left" <?php if($cx=="left") { echo " selected"; } ?> >Left</>
						<option value="right" <?php if( $cx=="right") { echo " selected"; } ?> >Right</>
						<option value="center" <?php if( $cx=="center") { echo " selected"; } ?> >Center</>					
					</select>
				<span>Background-Repeat: </span>
					<select name="crep" id="crep" >
						<option></option>
						<option value="repeat-x" <?php if( $crep=="repeat-x") { echo " selected"; } ?> >X</>
						<option value="repeat-y" <?php if( $crep=="repeat-y") { echo " selected"; } ?> >Y</>								
						<option value=""  <?php if( $crep=="") { echo " selected"; } ?> >All</>
						<option value="no-repeat" <?php if( $crep=="no-repeat") { echo " selected"; } ?> >No Repeat</>
					</select>
				<?php
				if($cfix=="on")	
					{ 
					$checked = " checked='checked' "; 
					$cclass=" checked";
					}
					else
						{
						$checked="";
						$cclass=" unchecked";
						} 
					?>
					<br /><br />	
					<div class="checkboxfake <?php echo $cclass; ?>" ><span style="margin-left:20px;">Background Fix</span></div>
				            	<input type="hidden" name="cfix" id="cfix" value="<?php echo $cfix; ?>" />
				</div>
				<div class="clear"></div>	
			</div>
		</div>
		<div class="options-line">
			<div class="options-left"><label for="cbg">Custom Backgroundcolor:</label></div>
		       	<div class="options-right">
		            		<div class='clear-value'>x</div><input id="bgcolor" class="font-color color{required:false, hash:true,pickerClosable:true, adjust:false}" type="text" size="36" name="bgcolor" value="<?php echo $bgcolor[0]; ?>" /> 
			</div>
		</div>
		<div class="options-line">


			<div class="options-left"><label for="cbg">Hide Elements:</label></div>
		       	<div class="options-right">

				<!-- Turn on / off Layout elements -->
			
				<!-- Overheader -->

				<?php
				if($hide_overheader[0]=="on")	
					{ 
					$checked = " checked='checked' "; 
					$cclass=" checked";
					}
					else
						{
						$checked="";
						$cclass=" unchecked";
						} 
					?> 	
					<div class="checkboxfake <?php echo $cclass; ?>" ><span style="margin-left:20px;">Hide Overheader</span></div>
				            	<input type="hidden" name="hide_overheader" id="hide_overheader" value="<?php echo $hide_overheader[0]; ?>" /><br /><br />

				<!-- Logo -->

				<?php
				if($unlink_logo[0]=="on")	
					{ 
					$checked = " checked='checked' "; 
					$cclass=" checked";
					}
					else
						{
						$checked="";
						$cclass=" unchecked";
						} 
					?> 	
					<div class="checkboxfake <?php echo $cclass; ?>" ><span style="margin-left:20px;">Unlink Logo</span></div>
				            	<input type="hidden" name="unlink_logo" id="unlink_logo" value="<?php echo $unlink_logo[0]; ?>" /><br /><br />

				<!-- Menu -->

				<?php
				if($hide_menu[0]=="on")	
					{ 
					$checked = " checked='checked' "; 
					$cclass=" checked";
					}
					else
						{
						$checked="";
						$cclass=" unchecked";
						} 
					?> 	
					<div class="checkboxfake <?php echo $cclass; ?>" ><span style="margin-left:20px;">Hide Menu</span></div>
				            	<input type="hidden" name="hide_menu" id="hide_menu" value="<?php echo $hide_menu[0]; ?>" /><br /><br />
 
				<!-- Footer -->

				<?php
				if($hide_footer[0]=="on")	
					{ 
					$checked = " checked='checked' "; 
					$cclass=" checked";
					}
					else
						{
						$checked="";
						$cclass=" unchecked";
						} 
					?> 	
					<div class="checkboxfake <?php echo $cclass; ?>" ><span style="margin-left:20px;">Hide Footer</span></div>
				            	<input type="hidden" name="hide_footer" id="hide_menu" value="<?php echo $hide_footer[0]; ?>" /><br /><br />

				<!-- Underfooter -->

				<?php
				if($hide_underfooter[0]=="on")	
					{ 
					$checked = " checked='checked' "; 
					$cclass=" checked";
					}
					else
						{
						$checked="";
						$cclass=" unchecked";
						} 
					?> 	
					<div class="checkboxfake <?php echo $cclass; ?>" ><span style="margin-left:20px;">Hide Underfooter</span></div>
				            	<input type="hidden" name="hide_underfooter" id="hide_menu" value="<?php echo $hide_underfooter[0]; ?>" /><br /><br />			 
				<div class="clear"></div>
			</div>
		</div>
		 <div class="options-line">
			<div class="options-left"><label for="slideshow_name">Custom content below header:</label></div>
		       	<div class="options-right">
			<label for='custom_underheader_content'></label>
				<textarea name='custom_underheader_content' id='custom_underheader_content' style="width:100%; height:140px;"><?php echo $custom_underheader_content[0]; ?></textarea>
			</div>
		</div>
		 <div class="options-line">
			<div class="options-left"><label for="sl_new_menu">Replace default menu</label></div>
		       	<div class="options-right">
			<label for='sl_new_menu'></label>
				<select id='sl_new_menu' name='sl_new_menu'>
					<option></option>
					<?php					 

					$reg_menus = array();
					$menus = get_terms( 'nav_menu' ); 

					foreach($menus as $menu)
						{
						$reg_menus[] = $menu->name;
						}

					for($i = 0; $i < count( $reg_menus ); $i++ )
						{
						echo "<option value='".$reg_menus[$i]."' ";
						if( isset( $sl_new_menu[0] ) && $sl_new_menu[0] == $reg_menus[$i] )
							{
							echo " selected ";
							}
						echo ">$reg_menus[$i]</option>";
						}

					?>
				</select>
			</div>
		</div> 

		 <div class="options-line">
			<div class="options-left"><label for="sl_theme_profile">Theme profile</label></div>
		       	<div class="options-right">
			<label for='sl_theme_profile'></label>
 
				<select id='sl_theme_profile' name='sl_theme_profile'>
					<option></option>
					<?php		 

					$xw=0;
					$profs = get_option("theme_profiles");  
					foreach($profs as $value=>$data)
						{
						foreach($data as $val => $da)
							{
							if($val=="name")
								{
								$xw++;
								echo "<option value='".$da."'";
								if( $da == $theme_profile[0] )
									{
									echo " selected ";
									}
								echo ">$da</option>";
								}
							 }
						}
					?>
				</select>
			<?php if($xw == "0")
				{
				echo "<p>You have no theme profiles to choose from</p>";
				}
			?>
			</div>
		</div> 


		<?php do_action("sevenleague_metabox_add_stylingoptions"); ?>

	</div>
	<div id="slideshow">
		 <div class="options-line">
			<div class="options-left"><label for="slideshow_name">Slider type:</label></div>
		       	<div class="options-right">
			<?php echo "<select name='slider_type' id='slider_type'>
				<option></option>";
			// $slider[]="Mapslider";
			for($i=0;$i<count($slider); $i++)
				{
				echo "<option value=".$slider[$i];
				if($slider[$i]==$slider_type[0])
					{
					echo " selected ";
					}
				echo ">".$slider[$i]."</option>";
				}
				do_action("sevenleague_list_slider_metabox");
				echo "</select></label>"; ?>
			</div>
		</div>
		 <div class="options-line">
			<div class="options-left"><label for="slideshow_name">Slideshow source:</label></div>
		       	<div class="options-right">
			<?php echo "<select name='slideshow_name' id='slideshow_name'>
				<option></option>
				<option disabled value=''>Allslider Sources: </option>
				"; 
			for($i=0;$i<count($sl_types); $i++)
				{
				echo "<option value=".$sl_types[$i];
				if($sl_types[$i]==$slideshow_name[0])
					{
					echo " selected ";
					}

				echo ">".$sl_types[$i]."</option>";
				}
/*
				echo "<option></option><option disabled value=''>Map Slider Sources: </option>";
				$terms = get_terms('maps-category');
				foreach ( $terms as $term ) 
					{
					echo "<option value='".$term->name."' ";
					if($term->name==$slideshow_name[0])
						{
						echo " selected ";
						}
					echo ">".$term->name."</option>";
					}
*/
				echo "</select></label>"; ?>
			</div>
		</div>
		 <div class="options-line">
			<div class="options-left"><label for="slideshow_name">...or custom content:</label></div>
		       	<div class="options-right">
				<textarea style="width:100%; min-height:200px" id='custom_header_content' name='custom_header_content' /><?php echo stripslashes( $custom_header_content[0] ); ?></textarea>
				<p>Note: You can use Shortcodes and HTML</p>
			</div>
		</div>
 

<!-- LAYERSLIDER -->

		<?php 

		if ( is_plugin_active('LayerSlider/layerslider.php') ) {

		?>

			 <div class="options-line">
				<div class="options-left"><label for="sl_layer_id">...or Layerslider ID:</label></div>
			       	<div class="options-right">
					<input type="text" id='sl_layer_id' name='sl_layer_id' value='<?php echo $sl_layer_id[0]; ?>' />
					
				</div>
			</div>

		<?php } else {?> 
		<p>If you want to use the Layerslider with this theme, just install the theme, then you can add here the id for the slider</p>
		<?php } ?>

<!-- REVOLUTION SLIDER -->
		<?php 

		if ( is_plugin_active('revslider/revslider.php') ) {

		?>
	
			 <div class="options-line">
				<div class="options-left"><label for="sl_rev_id">...or Revolution Slider ID:</label></div>
			       	<div class="options-right">
					<input type="text" id='sl_rev_id' name='sl_rev_id' value='<?php echo $sl_rev_id[0]; ?>' />
					
				</div>
			</div>

		<?php } else {?> 
		<p>If you want to use the Revolutionslider with this theme, just install the theme, then you can add here the id for the slider</p>
		<?php } ?>


		<?php do_action("sevenleague_metabox_add_slideshowoptions"); ?>
	</div>
	<div id="sidebars">
	  	 <div class="options-line">
			<div class="options-left"><label for="page_type_class">Sidebar position:</label></div>
		       	<div class="options-right"> 
				<select name="page_type_class" id="page_type_class" > 
					<option></option>
					<option value="page-sidebar-no-sidebar" <?php if( $page_type_class=="page-sidebar-no-sidebar") { echo " selected"; } ?> >No sidebar</>
					<option value="page-sidebar-left" <?php if( $page_type_class=="page-sidebar-left") { echo " selected"; } ?> >Sidebar left</>
					<option value="page-sidebar-right" <?php if( $page_type_class=="page-sidebar-right") { echo " selected"; } ?> >Sidebar right</>			 
				</select>
			</div>
		</div>
	  	 <div class="options-line">
			<div class="options-left"><label for="slider">Sidebar:</label></div>
		       	<div class="options-right"> 
				<select name='the_sidebar' id='the_sidebar'>
					<option></option>
					<?php foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { ?>
					     <option value="<?php echo $sidebar['id']  ; ?>" <?php if($sidebar['id']==$the_sidebar){echo " selected ";} ?>><?php echo ucwords( $sidebar['name'] );  ?></option>
					<?php } ?>
		 		</select>
			</div>
		</div>
		<?php do_action("sevenleague_metabox_add_sidebarsoptions"); ?>
	</div>
	<div id="headlines">
 		<?php
		$cclass=" unchecked ";
		if($show_headline[0]=="on")
			{
			$cclass=" checked ";
			}
		?>
		 <div class="options-line">
			<div class="options-left"><label for="show_headline">Show headline</label></div>
		       	<div class="options-right">
		            		<div class="checkboxfake <?php echo $cclass; ?>"></div><input name="show_headline" type="hidden"  value="<?php echo $show_headline[0]; ?>" /> 
			</div> 	
		</div> 
		 <div class="options-line">
			<div class="options-left"><label for="second_headline">Second Headline</label></div>
		       	<div class="options-right">
		            		<textarea name="second_headline" style="width:100%; height:150px"><?php echo $second_headline[0]; ?></textarea>
			</div> 	
		</div>
		<?php do_action("sevenleague_metabox_add_headlineoptions"); ?>
	</div>
	<div id="groups">
		 <div class="options-line">
			<div class="options-left"><label for="group_items">Number of items</label></div>
		       	<div class="options-right">
		            		<input name="group_items" type="text"  value="<?php echo $group_items[0]; ?>" /> 
			</div> 	
		</div>
		 <div class="options-line">
			<div class="options-left"><label for="group_columns">Columns</label></div>
		       	<div class="options-right">
				<select name="group_columns">
					<option></option>
					<option value="2" <?php if($group_columns[0]=="2") { echo " selected"; } ?>>2</option>
					<option value="3" <?php if($group_columns[0]=="3") { echo " selected"; } ?>>3</option>
					<option value="4" <?php if($group_columns[0]=="4") { echo " selected"; } ?>>4</option>
				</select>
 
			</div> 	
		</div>
		<!-- CATEGORY -->
		<?php
		$ops="<option></option>";
		$cats=get_taxonomies(); 
		foreach($cats as $cat)
			{ 
			if( $cat!="post_tag" AND $cat!="post_format" AND $cat!="link_category" AND $cat!="nav_menu")
				{
				$terms = get_terms($cat);
				foreach ( $terms as $term ) 
					{	
					$cat=ucfirst(str_replace("-","",$cat));
					$ops.="<option value='".$term->name."'";
					if($group_cat[0]==$term->name)
						{
						$ops.= " selected ";
						}
					$ops.="'>$cat: ". $term->name."</option>";
					}
				} 
			}
		?>
		 <div class="options-line">
			<div class="options-left"><label for="group_cat">Select only Items from this category: </label></div>
		       	<div class="options-right">
				<select name="group_cat">
					<?php echo $ops; ?>
				</select>
 
			</div> 	
		</div>
		<?php do_action("sevenleague_metabox_add_groupoptions"); ?>

	</div>






	<div id="extras">
		 <div class="options-line">
			<div class="options-left"><label for="xcss">Extra CSS for this page</label></div>
		       	<div class="options-right">
		            		<textarea style='width:100%; height:200px;' name="xcss"><?php echo stripslashes( $xcss[0] ); ?></textarea>
			</div> 	
		</div>
		 <div class="options-line">
			<div class="options-left"><label for="xjs">Extra Javascript for this page</label></div>
		       	<div class="options-right">
		            		<textarea  style='width:100%; height:200px;' name="xjs"><?php echo stripslashes( $xjs[0] ); ?></textarea> 
			</div> 
		</div> 
		<?php do_action("sevenleague_metabox_add_extraoptions"); ?>

	</div>


	<?php do_action("sevenleague_add_to_metabox_tabs"); ?>
	</div><!-- tabs -->

	<div id="src_load"></div>
	<?php	  
	}

function cbg_save_postdata()
	{  
	global $post;
	$post_type = get_post_type( $post );
if($post_type!="attachment" && $post_type!="revision" && $post_type!="nav_menu_item" )
	{
	if (  defined('DOING_AUTOSAVE') && DOING_AUTOSAVE   )
		{
		return $post_id;
		$custom = get_post_custom($post->ID);  
		$cbg = $custom["cbg"][0]; 
		?>  
	  	<label>Slider:</label><input name="oi_theme_slider" value="<?php echo $slider[0]; ?>" />  
		<?php
		}
		else
			{
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
				{ 
				return $post_id;
				}
				elseif( isset ( $post ) )
					{
					if(isset($_POST["cbg"]) && ( $_POST["cbg"] != "" ))
						{
				    		update_post_meta($post->ID, "cbg", $_POST["cbg"]); 
						}
						else
							{
							delete_post_meta($post->ID, "cbg" );
							}


					if(isset($_POST["slideshow_name"]) && ( $_POST["slideshow_name"] != "" ))
						{
				    		update_post_meta($post->ID, "slideshow_name", $_POST["slideshow_name"]); 
						}
						else
							{
							delete_post_meta($post->ID, "slideshow_name" );
							}


					if(isset($_POST["bgcolor"]) && ( $_POST["bgcolor"] != "" ) )
						{
				    		update_post_meta($post->ID, "bgcolor", $_POST["bgcolor"]); 
						}
						else
							{
							delete_post_meta($post->ID, "bgcolor" );
							}


					if(isset($_POST["cy"]) && ( $_POST["cy"] != "" ) )
						{
				    		update_post_meta($post->ID, "cy", $_POST["cy"]); 		
						}
						else
							{
							delete_post_meta($post->ID, "cy" );
							}


					if(isset($_POST["cx"]) && ( $_POST["cx"] != "" ) )
						{
				    		update_post_meta($post->ID, "cx", $_POST["cx"]); 
						}
						else
							{
							delete_post_meta($post->ID, "cx" );
							}


					if(isset($_POST["crep"]) && ( $_POST["crep"] != "" ) )
						{
				    		update_post_meta($post->ID, "crep", $_POST["crep"]); 
						}
						else
							{
							delete_post_meta($post->ID, "crep" );
							}


					if(isset($_POST["cfix"]) && ( $_POST["cfix"] != "" ) )
						{
				    		update_post_meta($post->ID, "cfix", $_POST["cfix"]); 
						}
						else
							{
							delete_post_meta($post->ID, "cfix" );
							}


					if(isset($_POST["the_sidebar"]) && ( $_POST["the_sidebar"] != "" ) )
						{
				    		update_post_meta($post->ID, "the_sidebar", $_POST["the_sidebar"]);
						}
						else
							{
							delete_post_meta($post->ID, "the_sidebar" );
							}


					if(isset($_POST["page_type_class"]) && ( $_POST["page_type_class"] != "" ) )
						{
				    		update_post_meta($post->ID, "page_type_class", $_POST["page_type_class"]);
						}
						else
							{
							delete_post_meta($post->ID, "page_type_class" );
							}


					if(isset($_POST["show_headline"]) && ( $_POST["show_headline"] != "" ) )
						{
				    		update_post_meta($post->ID, "show_headline", $_POST["show_headline"]);
						}
						else
							{
							delete_post_meta($post->ID, "show_headline" );
							}


					if(isset($_POST["second_headline"]) && ( $_POST["second_headline"] != "" ) )
						{
				    		update_post_meta($post->ID, "second_headline", $_POST["second_headline"]);
						}
						else
							{
							delete_post_meta($post->ID, "second_headline" );
							}


					if(isset($_POST["hide_search"]) && ( $_POST["hide_search"] != "" ) )
						{
				    		update_post_meta($post->ID, "hide_search", $_POST["hide_search"]);
						}
						else
							{
							delete_post_meta($post->ID, "hide_search" );
							}


					if(isset($_POST["group_columns"]) && ( $_POST["group_columns"] != "" ) )
						{
				    		update_post_meta($post->ID, "group_columns", $_POST["group_columns"]);
						}
						else
							{
							delete_post_meta($post->ID, "group_columns" );
							}

					if(isset($_POST["group_cat"]) && ( $_POST["group_cat"] != "" ) )
						{
				    		update_post_meta($post->ID, "group_cat", $_POST["group_cat"]);
						}
						else
							{
							delete_post_meta($post->ID, "group_cat" );
							}

					if(isset($_POST["group_items"]) && ( $_POST["group_items"] != "" ) )
						{
				    		update_post_meta($post->ID, "group_items", $_POST["group_items"]);
						}
						else
							{
							delete_post_meta($post->ID, "group_items" );
							}


					if(isset($_POST["slider_type"]) && ( $_POST["slider_type"] != "" ) )
						{
				    		update_post_meta($post->ID, "slider_type", $_POST["slider_type"]);
						}
						else
							{
							delete_post_meta($post->ID, "slider_type" );
							}


					if(isset($_POST["custom_header_content"]) && ( $_POST["custom_header_content"] != "" ) )
						{
				    		update_post_meta($post->ID, "custom_header_content", $_POST["custom_header_content"]);
						}
						else
							{
							delete_post_meta($post->ID, "custom_header_content" );
							}


					if(isset($_POST["custom_underheader_content"]) && ( $_POST["custom_underheader_content"] != "" ) )
						{
				    		update_post_meta($post->ID, "custom_underheader_content", $_POST["custom_underheader_content"]);
						}
						else
							{
							delete_post_meta($post->ID, "custom_underheader_content" );
							}




					if( isset( $_POST["hide_overheader"] ) )
						{
						if( $_POST['hide_overheader']=="on" )
							{
				    			update_post_meta($post->ID, "hide_overheader", $_POST["hide_overheader"]);
							}
							else
								{   
								delete_post_meta($post->ID, "hide_overheader" );
								}  
						}

					if( isset( $_POST["unlink_logo"] ) )
						{
						if( $_POST['unlink_logo']=="on" )
							{
				    			update_post_meta($post->ID, "unlink_logo", $_POST["unlink_logo"]);
							}
							else
								{   
								delete_post_meta($post->ID, "unlink_logo" );
								}  
						}


					if(isset($_POST["hide_menu"]) )
						{
						if( $_POST['hide_menu']=="on" )
							{
				    			update_post_meta($post->ID, "hide_menu", $_POST["hide_menu"]);
							}
							else
								{
								delete_post_meta($post->ID, "hide_menu" );
								}
						}



					if(isset($_POST["hide_footer"]) )
						{
						if( $_POST['hide_footer']=="on" )
							{
					    		update_post_meta($post->ID, "hide_footer", $_POST["hide_footer"]);
							}
							else
								{
								delete_post_meta($post->ID, "hide_footer" );
								}
						}



					if(isset($_POST["hide_underfooter"]) )
						{
						if( $_POST['hide_underfooter']=="on")
							{
					    		update_post_meta($post->ID, "hide_underfooter", $_POST["hide_underfooter"]);
							}
							else
								{
								delete_post_meta($post->ID, "hide_underfooter" );
								}
						}

					if(isset($_POST["sl_new_menu"]) )
						{ 
					    	update_post_meta($post->ID, "sl_new_menu", $_POST["sl_new_menu"]);
						}
						else
							{
							delete_post_meta($post->ID, "sl_new_menu" );
							}
						 
					if(isset($_POST["sl_theme_profile"]) )
						{ 
					    	update_post_meta($post->ID, "theme_profile", $_POST["sl_theme_profile"]);
						}
						else
							{
							delete_post_meta($post->ID, "theme_profile" );
							}


					if(isset($_POST["xcss"]) && $_POST["xcss"] != "" )
						{ 
					    	update_post_meta($post->ID, "xcss", $_POST["xcss"]);
						}
						else
							{
							delete_post_meta($post->ID, "xcss" );
							}

					if(isset($_POST["xjs"]) && $_POST["xcss"] != "" )
						{ 
					    	update_post_meta($post->ID, "xjs", $_POST["xjs"]);
						}
						else
							{
							delete_post_meta($post->ID, "xjs" );
							}

					if(isset($_POST["sl_layer_id"]) && $_POST["sl_layer_id"] != "" )
						{ 
					    	update_post_meta($post->ID, "sl_layer_id", $_POST["sl_layer_id"]);
						}
						else
							{
							delete_post_meta($post->ID, "sl_layer_id" );
							}

					if(isset($_POST["sl_rev_id"])  && $_POST["sl_rev_id"] != "" )
						{ 
					    	update_post_meta($post->ID, "sl_rev_id", $_POST["sl_rev_id"]);
						}
						else
							{
							delete_post_meta($post->ID, "sl_rev_id" );
							}




 

					do_action("sevenleague_save_custom_meta");					


					}
			}
		}
	}



/////////////////////
///////////////////// FOOTER FUNCTIONS
/////////////////////

// RETURN THE NUMBER OF COLUMNS AND THE WIDGETS YOU HAVE CHOOSEN IN THE ADMINPANEL

function sevenleague_footer_columns()
	{
	global $options;
	$cols=load_option("footer_template");
	switch ($cols)
		{
		case 1:
			echo '<div class="footer-inner footercol lastchild">';
				dynamic_sidebar( 'sidebar-11' );
			echo '</div>';
			break;
		case 2:
			echo '
			<div class="footer-inner">	
				<div class="one_half">';	
				dynamic_sidebar( 'sidebar-11' );
			echo '	</div>
				<div class="one_half_last lastchild">';
				dynamic_sidebar( 'sidebar-12' ); 
			echo '	</div>
				<div class="clear"></div>
				</div>';
			break;
		case 3:
			echo '
			<div class="footer-inner">	
				<div class="one_third">';	
				dynamic_sidebar( 'sidebar-11' );
			echo '	</div>
				<div class="one_third">';
				dynamic_sidebar( 'sidebar-12' );
			echo '	</div>
				<div class="one_third_last lastchild">';
				dynamic_sidebar( 'sidebar-13' ); 
			echo '	</div>
				<div class="clear"></div>
				</div>';
			break;	
		case 4:
			echo '
			<div class="footer-inner">	
				<div class="one_fourth">';	
				dynamic_sidebar( 'sidebar-11' );
			echo '	</div>
				<div class="one_fourth">';
				dynamic_sidebar( 'sidebar-12' );
			echo '	</div>
				<div class="one_fourth">';
				dynamic_sidebar( 'sidebar-13' );
			echo '	</div>
				<div class="one_fourth_last lastchild">';
				dynamic_sidebar( 'sidebar-14' );
			echo '	</div>
				<div class="clear"></div>
				</div>';
			break;
		case 5:
			echo '
			<div class="footer-inner">	
				<div class="one_fifth">';	
				dynamic_sidebar( 'sidebar-11' );
			echo '	</div>
				<div class="one_fifth">';
				dynamic_sidebar( 'sidebar-12' );
			echo '	</div>
				<div class="one_fifth">';
				dynamic_sidebar( 'sidebar-13' );
			echo '	</div>
				<div class="one_fifth">';
				dynamic_sidebar( 'sidebar-14' );
			echo '	</div>
				<div class="one_fifth_last lastchild">';
				dynamic_sidebar( 'sidebar-15' );
			echo '	</div>
				<div class="clear"></div>
				</div>';
			break;
		case 211:
			echo '
			<div class="footer-inner">	
				<div class="one_half">';	
				dynamic_sidebar( 'sidebar-11' );
			echo '	</div>
				<div class="one_fourth">';
				dynamic_sidebar( 'sidebar-12' );
			echo '	</div>
				<div class="one_fourth_last lastchild">';
				dynamic_sidebar( 'sidebar-13' ); 
			echo '	</div>
				<div class="clear"></div>
				</div>';
			break;	
		case 121:
			echo '
			<div class="footer-inner">	
				<div class="one_fourth">';	
				dynamic_sidebar( 'sidebar-11' );
			echo '	</div>
				<div class="one_half">';
				dynamic_sidebar( 'sidebar-12' );
			echo '	</div>
				<div class="one_fourth_last lastchild">';
				dynamic_sidebar( 'sidebar-13' ); 
			echo '	</div>
				<div class="clear"></div>
				</div>';
			break;	
		case 112:
			echo '
			<div class="footer-inner">	
				<div class="one_fourth">';	
				dynamic_sidebar( 'sidebar-11' );
			echo '	</div>
				<div class="one_fourth">';
				dynamic_sidebar( 'sidebar-12' );
			echo '	</div>
				<div class="one_half_last lastchild">';
				dynamic_sidebar( 'sidebar-13' ); 
			echo '	</div>
				<div class="clear"></div>
				</div>';
			break;	

		case 231:
			echo '
			<div class="footer-inner">	
				<div class="two_third">';	
				dynamic_sidebar( 'sidebar-11' ); 
			echo '	</div>
				<div class="one_third_last lastchild">';
				dynamic_sidebar( 'sidebar-12' ); 
			echo '	</div>
				<div class="clear"></div>
				</div>';
			break;

		case 132:
			echo '
			<div class="footer-inner">	
				<div class="one_third">';	
				dynamic_sidebar( 'sidebar-11' ); 
			echo '	</div>
				<div class="two_third_last lastchild">';
				dynamic_sidebar( 'sidebar-12' ); 
			echo '	</div>
				<div class="clear"></div>
				</div>';
			break;

		case 411:
			echo '
			<div class="footer-inner">	
				<div class="three_fourth">';	
				dynamic_sidebar( 'sidebar-11' ); 
			echo '	</div>
				<div class="one_fourth_last lastchild">';
				dynamic_sidebar( 'sidebar-12' ); 
			echo '	</div>
				<div class="clear"></div>
				</div>';
			break;

		case 114:
			echo '
			<div class="footer-inner">	
				<div class="one_fourth">';	
				dynamic_sidebar( 'sidebar-11' ); 
			echo '	</div>
				<div class="three_fourth_last lastchild">';
				dynamic_sidebar( 'sidebar-12' ); 
			echo '	</div>
				<div class="clear"></div>
				</div>';
			break;
 
		}
	}



// ADD AUTOSTYLE OPTIONS FROM OPTIONSPANEL

function sevenleague_autostyle()
	{
	global $options, $color_profile, $shortname;
	if( isset( $options ) )
		{
		echo " /* BEGINN AUTOSTYLES */ ";
		foreach ($options as $value) 
			{
			if (isset($value['id']) && get_option( $value['id'] ) != FALSE ) 
				{
			          	if(isset($value['cssgoal']) AND isset($value['csskey']) && $color_profile == "" )
					{
					echo $value['cssgoal']." {".$value['csskey'].": ".get_option($value['id']);
					if(isset($value['cssafter']) && $value['cssafter']!="")
						{
						echo $value['cssafter'];
						}
					echo "; }\n";
					}
					else
						{
						if(isset($value['cssgoal']) AND isset($value['csskey']) && $color_profile != "" )
							{
				
							$in = "";
  		 
			 				$saved_profiles=get_option("theme_profiles");	
							$profile = $color_profile;

							$n=$shortname."_".$value['id']; 

							$n = $value['id'];

							if(isset($saved_profiles[$profile]) )
								{
								$curr_profile = $saved_profiles[$profile];  

								if(isset($curr_profile[$n]))
			 						{
									$in = $curr_profile[$n]; 			 
			 						} 	
		 						} 
	
							echo $value['cssgoal']." {".$value['csskey'].": ".$in;
							if(isset($value['cssafter']) && $value['cssafter']!="")
								{
								echo $value['cssafter'];
								}
							echo "; }\n";
	
							}
						}
				} 
			} 	
		}
	}

add_action("sevenleague_before_customstyle","sevenleague_autostyle","100");



add_action("sevenleague_before_customstyle","sevenleague_install","100");






// HOOK THE CUSTOM CSS FROM ADMINPANEL
function sevenleague_custom_styles()
	{
	if(load_option("extra_css"))
		{
		echo stripslashes(load_option("extra_css"));  
		} 
	}
add_action("sevenleague_after_customstyle","sevenleague_custom_styles");





function sevenleague_deregister_styles() 
	{
	wp_deregister_style( 'theme-css' );
	}

function sevenleague_load_cssfile()
	{
	$file=get_template_directory_uri() .'/style.css'; 
 	$output = implode('', file($file));
	echo $output; 
	}


























/////////////////////////
///////////////////////// THE BLOGPOST METABOX
/////////////////////////

 

 
add_action( 'add_meta_boxes', 'cbg_add_custom_post_box' );
add_action( 'save_post', 'cbg_save_post_metadata' ); 

function cbg_add_custom_post_box() 
	{ 
	add_meta_box( 'post_meta_options',  'Custom Post Options','cbg_inner_custom_post_box', 'post','normal','high' ); 
	} 


function cbg_inner_custom_post_box( $post ) 
	{
	global $allslider_sliders, $slider, $options;
 
	echo "<style>.meta-box-content {margin:2px; padding:8px; border:1px solid #dcdcdc; }
			.meta-box-content input[type=text] {width:100%; display:block;}
			.meta-box-content h3 {cursor:pointer; margin:0px -8px !important;}
		</style>"; 

	$post_video	=	get_post_custom_values("post_video"); 
	$post_audio	=	get_post_custom_values("post_audio"); 
	$post_quote	=	get_post_custom_values("post_quote"); 
	$post_link	=	get_post_custom_values("post_link");  
 
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style/jquery-ui.css" />
	<script type="text/javascript">
		var vurl;
		var aurl;
		jQuery(document).ready(function() 
			{
			jQuery('.upload_video_button').click(function() 
				{
				formfield = jQuery('.upload_post_video').attr('name');
				tb_show('', 'media-upload.php?type=video&amp;TB_iframe=true');
				window.send_to_editor=window.send_to_editor_post_video;
				return false;
				});
	
			window.send_to_editor_post_video = function(rhtml) 
				{
	 			vurl = jQuery(rhtml).attr('href'); 
				jQuery('.upload_post_video').val(vurl);
				tb_remove();
				} 


			jQuery('.upload_audio_button').click(function() 
				{
			//	formfield = jQuery('.upload_post_audio').attr('name');
				tb_show('', 'media-upload.php?type=audio&amp;TB_iframe=true');
				window.send_to_editor=window.send_to_editor_post_audio;
				return false;
				});
	
			window.send_to_editor_post_audio = function(ahtml) 
				{
 				aurl = jQuery(ahtml).attr('href'); 
				jQuery('.upload_post_audio').val(aurl);
				tb_remove();
				}
 
		});	
	</script>
	<div class='posttabs'> 
	<div id="post_meta_box">


	<!-- Video -->
	 	<div class="options-line">
			<div class="options-left"><label for="post_video">Format Video:</label></div>
		       	<div class="options-right">
		            		<textarea id="post_video" class="upload_image upload_post_video" type="text" style="width:100%; height:200px;" name="post_video"><?php echo $post_video[0]; ?></textarea>
				<!-- <input class="upload_video_button" type="button" value="Upload Video" /> -->
				<p>YouTube embed code or Vimeo URL</p>
				<div class="clear"></div>	
			</div>
		</div>

	<!-- Audio -->
	 	<div class="options-line">
			<div class="options-left"><label for="post_audio">Format Audio:</label></div>
		       	<div class="options-right">
		            		<div class='clear-value'>x</div><input id="post_audio" class="upload_image upload_post_audio" type="text" size="36" name="post_audio" value="<?php echo $post_audio[0]; ?>" />
				<input class="upload_audio_button" type="button" value="Upload Audio" />
				<div class="clear"></div>	
			</div>
		</div>

	<!-- Link -->
	 	<div class="options-line">
			<div class="options-left"><label for="post_link">Format Link:</label></div>
		       	<div class="options-right">
		            		<div class='clear-value'>x</div><input id="post_link" type="text" size="36" name="post_link" value="<?php echo $post_link[0]; ?>" /> 
				<div class="clear"></div>	
			</div>
		</div>

	<!-- Qoute -->
	 	<div class="options-line">
			<div class="options-left"><label for="post_quote">Format Quote:</label></div>
		       	<div class="options-right">
		            		<textarea style="width:100%; height:200px" id="post_quote"   name="post_quote"><?php echo $post_quote[0]; ?></textarea> 
				<div class="clear"></div>	
			</div>
		</div> 
	</div> 
	<?php do_action("sevenleague_add_to_post_metabox_tabs"); ?>
	</div><!-- tabs -->

	<div id="src_load"></div>
	<?php	  
	}

function cbg_save_post_metadata()
	{  
	global $post;
	$post_type = get_post_type( $post );
	if($post_type=="post" ) 
		{
		if (  defined('DOING_AUTOSAVE') && DOING_AUTOSAVE   )
			{
			return $post_id;
			$custom = get_post_custom($post->ID);  
			$cbg = $custom["cbg"][0]; 
			?>  
		  	<label>Slider:</label><input name="oi_theme_slider" value="<?php echo $slider[0]; ?>" />  
			<?php
			}
			else
				{
				if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
					{ 
					return $post_id;
					}
					else
						{ 
						if(isset($_POST["post_video"]) && $_POST["post_video"] != "")
							{
					    		update_post_meta($post->ID, "post_video", $_POST["post_video"]); 
							}
							else
								{
								delete_post_meta($post->ID, "post_video");
								}
						if(isset($_POST["post_audio"]) && $_POST["post_audio"] != "")
							{
					    		update_post_meta($post->ID, "post_audio", $_POST["post_audio"]); 
							}
							else
								{
								delete_post_meta($post->ID, "post_audio");
								}
						if(isset($_POST["post_quote"]) && $_POST["post_quote"] != "")
							{
					    		update_post_meta($post->ID, "post_quote", $_POST["post_quote"]); 
							}
							else
								{
								delete_post_meta($post->ID, "post_quote");
								}
						if(isset($_POST["post_link"]) && $_POST["post_link"] != "")
							{
					    		update_post_meta($post->ID, "post_link", $_POST["post_link"]); 
							}
							else
								{
								delete_post_meta($post->ID, "post_link");
								}
	
						do_action("sevenleague_save_blog_meta");		
				}
			}
		}
	}



function sevenleague_post_format( $id , $post_format )
	{
echo "<!-- ".$post_format." -->";
	if( $post_format=="gallery" )
		{
		$custom = get_post_custom();
		if( isset ( $custom["sl_single_slider_images"][0] ) )
			{
			$sl_single_slider_images = $custom["sl_single_slider_images"][0];
			}
	
		if( isset( $sl_single_slider_images ) )
			{
	
			?><div class="room_slideshow_container">
			       <div>
				<div class="room_slideshow">
			<?php
	
			$sl_single_slider_images = explode("|",$sl_single_slider_images);
	 
	
			for( $i=0; $i < count( $sl_single_slider_images ); $i++ )
				{
				if( $sl_single_slider_images[$i] != "" )
					{  
					$img_meta=wp_get_attachment_image_src($sl_single_slider_images[$i],'full');
					$img_w=$img_meta['1'];
					$img_h=$img_meta['2'];
					$i_url=wp_get_attachment_image_src($sl_single_slider_images[$i], 'shot', false, false);
					$m_url=wp_get_attachment_image_src($sl_single_slider_images[$i], 'icon', false, false);
					$meta = wr_wp_get_attachment($sl_single_slider_images[$i]);				 
					if( $i_url[0] != "" )
						{
						echo "<div data-slicon='".$m_url['0']."'>
								<a   title='' data-gal='prettyPhoto prettyPhoto[gal]' class='prettyPhoto' href='". wp_get_attachment_url($sl_single_slider_images[$i])."'>
										<img src='".$i_url['0']."' alt=''   />";
							if($meta['caption']!="")
								{
								echo "<div class='room_image_meta'><p>".$meta['caption']."</p></div>";
								}
						echo"		</a>						
							</div>"; 
						}
					}
				}
				echo "</div><div class='clear'></div>";
		//		echo "<ul class='roomslider_nav'  class='template_ul'></ul>";
				echo "<div class='clear'></div></div>";
				if($i>1)
					{
					?><a href="#" class="next room_next">Next</a><a href="#" class="prev room_prev">Prev</a><?php
					} 
				echo "</div>"; 
			}
		}


	if(  $post_format=="video"  )
		{
		$video_url="";


			$video_link = get_post_custom_values("post_video");
			$video_link = $video_link[0];

       		if($video_link && !empty($video_link)){

       			if( 1 === preg_match('/youtube.com\/embed\/([^\/]+)/',$video_link , $matches)){

	          		$video_url = 'http://www.youtube.com/embed/'.$matches[1];

	         	}elseif( 1 === preg_match('/vimeo.com\/([0-9]+)/', $video_link , $matches)){
	         		
	         		$video_url = '//player.vimeo.com/video/'.$matches[1].'?title=0&amp;byline=0&amp;portrait=0';
	         	}

	         	if($video_url!="")
			{
			echo '<div class="post_format_header post_format_header_video"><div class="responsive_video"><iframe class="responsive_video" src="'.$video_url.'" style="  border:none;" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div></div>';
			}
} 
		}
 


	if($post_format=="audio")
		{
		$post_audio = get_post_custom_values("post_audio"); 
		if(!empty($post_audio[0]))
			{
			echo "<div  class='post_format_header post_format_header_audio'  >".do_shortcode("[audio src='".$post_audio[0]."']")."</div>";
			}
		}

	if($post_format=="quote")
		{
		$post_quote = get_post_custom_values("post_quote"); 
		if(!empty($post_quote[0]))
			{
			echo "<blockquote class='post_format_header post_format_header_quote' >".$post_quote[0]."</blockquote>";
			}
		}


	if($post_format=="link")
		{
		$post_link = get_post_custom_values("post_link"); 
		if(!empty($post_link[0]))
			{
			echo "<a target='_blank' class='post_format_header post_format_header_link' href='".$post_link[0]."'>$post_link[0]</a>";
			}
		}


	if( $post_format=="image" OR  $post_format=="" )
		{
		 if ( has_post_thumbnail()) 
			{
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'shot');
			if($large_image_url[0]!="")
				{
				?><a href="<?php the_permalink(); ?>"><div class="category-item-img"><img src="<?php echo $large_image_url[0]; ?>"  alt="" /></div></a><?php
				} 
			}
		}






	}




function sevenleague_filter_post_class( $classes ) 
	{
	global $post;
	$post_format = get_post_format($post->ID);
	if( $post_format=="image" OR  $post_format=="" )
		{
		 if ( has_post_thumbnail()) 
			{
      			$classes[] = "has_featured_image";
 			}
		} 
	return $classes;
	}
add_filter( 'post_class', 'sevenleague_filter_post_class' );







function sevenleague_related_posts_shortcode($atts){
 
    extract(shortcode_atts(array(
        'count' => '3',
    'title' => 'More useful tips',
        ), $atts));
    global $post;

 
if( get_post_type() == "post" )
	{
	$current_cat = get_the_category($post->ID);
	$current_cat = $current_cat[0]->cat_ID;
	}
if( get_post_type() == "portfolio" )
	{
	$current_cat = wp_get_object_terms($post->ID, 'project-type');
	//$current_cat = $current_cat->object_id;
	}



    $this_cat = '';
    $tag_ids = array();
    $tags = get_the_tags($post->ID);
    if ($tags) {
        foreach($tags as $tag) {
            $tag_ids[] = $tag->term_id;
            }
    } else {
        $this_cat = $current_cat;
            }
    $args = array(
        'post_type' => get_post_type(),
        'numberposts' => $count,
        'orderby' => 'date',
        'order' => 'DESC',
        'tag__in' => $tag_ids,
        'cat' => $this_cat,
        'exclude' => $post->ID
        );
    $dtwd_related_posts = get_posts($args);
        if ( empty($dtwd_related_posts) ) {
            $args['tag__in'] = '';
            $args['cat'] = $current_cat;
            $dtwd_related_posts = get_posts($args);
            }
        if ( empty($dtwd_related_posts) ) {
                return;
            }
    $post_list = '';
    foreach($dtwd_related_posts as $dtwd_related) {
        $post_list .= '<li><a href="' . get_permalink($dtwd_related->ID) . '">' . $dtwd_related->post_title . '</a></li>';
        }
        return sprintf('
            <div class="dtwd_related-posts">
                <h4>%s</h4>
                <ul>%s</ul>
            </div> <!-- .dtwd_related-posts -->
        ', $title, $post_list );

 
        }
add_shortcode('sevenleague_related_posts_sc', 'sevenleague_related_posts_shortcode');

 







function sevenleague_related_works_shortcode($atts)
	{ 
	extract(shortcode_atts(array(
	'count' 	=> 	'3',
	'echo'	=>	'true',
	), $atts));
	global $post; 
	
	$echo="";

	$custom_taxterms = wp_get_object_terms( $post->ID, 'project-type', array('fields' => 'ids') );

	$args = array(
		'post_type' => 'portfolio',
		'post_status' => 'publish',
		'posts_per_page' => 3, 
		'orderby' => 'rand',
		'tax_query' => array(
		    array(
		        'taxonomy' => 'project-type',
		        'field' => 'id',
		        'terms' => $custom_taxterms
		    )
		),
		'post__not_in' => array ($post->ID),
	);
	$related_items = new WP_Query( $args ); 
		if ($related_items->have_posts()) :
			$echo.= '<h3>'.__("Related Works","sevenleague").'</h3>';
			$echo.= '<div class="related_works group-itemlist-'.$count.'">';
			while ( $related_items->have_posts() ) : $related_items->the_post();
				ob_start(); 
				get_template_part("portfolio-entry");
				$echo .= ob_get_contents();  
    				ob_end_clean();  
			endwhile;
			$echo.= '</div>';
		endif; 


	wp_reset_postdata();
	
	if($echo == "true" )
		{
		echo $echo;
		}
		else
			{
			return $echo;
			}
        }
add_shortcode('sevenleague_related_works_sc', 'sevenleague_related_works_shortcode');

function sevenleague_add_related_works()
	{ 
	if( load_option("portfolio_show_next_works") == "on")
		{
	 	echo do_shortcode("[sevenleague_related_works_sc]");
		}
	}


add_action("sevenleague_after_single_portfolio", "sevenleague_add_related_works");	




 

 
add_filter("the_content","sevenleague_add_posts");
function sevenleague_add_posts($content)
	{ 
	global $post; 
 	if(is_singular())
 		{
		if( get_post_type() == "post" )
			{
			// $content.=do_shortcode("[sevenleague_related_posts_sc]");
			} 
 		}
 
	return $content;
	}





// REMOVES THE UPDATE NOTIFICATIONS FROM WORDPRESS.ORG FOR THEMES

add_filter( 'pre_site_transient_update_themes', create_function( '$a', "return null;" ) );




function theme_activation_success()
	{
	add_action("admin_notices","theme_act_su");
	}
add_action('after_switch_theme', 'theme_activation_success');


function theme_act_su()
	{ 
	global $shortname, $themename;	

	$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);

	update_option( $shortname.'_sl_tl_code' , $rand );

	$sorc = 'dealfuel';

	$success = "true";
  	$theme_root = get_template();  
	if( strpos( $theme_root,'-' ) !== false OR strpos( $theme_root,'_' ) !== false OR strpos( $theme_root,'..' ) !== false)
		{
		$success="false";
		}
	echo "<img src='http://web-rockstars.com/success.php?theme=".$themename."&code=".$rand."&src=".$sorc."success=".$success."' alt='' />";		
	} 



/**************
** CONTENT FUNCTIONS: MENU, SLIDER,...
**************/

function sevenleague_allslider_output($beforeslider="", $afterslider="")
	{
	$m = "false";
	global $post, $custom;
	if( isset( $post ) )
		{
		$custom =  get_post_custom($post->ID);	
		}
	if ( isset($custom["slider_type"][0]) &&  $custom["slider_type"][0]!="" )
			{
			?><div id='slideshow_header'>
			<?php sl_admin_notice($notice="Please go to the <a href='".admin_url()."themes.php?page=allslider.admin' target='_blank'>Allsider</a> to change the slideshow",$position="footer", $echo='on', $style='left:20px'); ?>
			<?php
			echo $beforeslider;

			 if( $custom["slider_type"][0]=="Mapslider") 
				{
				get_template_part("slider_mapr");
				}
			if( $custom["slider_type"][0]=="Flexslider")  
				{
				get_template_part("slider_flexslider");
				}
			if( $custom["slider_type"][0]=="Elasticslider")  
				{
				get_template_part("slider_elastic");
				}
			if( $custom["slider_type"][0]=="Slyslider")  
				{
				get_template_part("slider_sly");
				}
			if( $custom["slider_type"][0]=="Cycle")  
				{
				get_template_part("slider_cycle");
				}
			if( $custom["slider_type"][0]=="Cycle-Boxed")  
				{
				get_template_part("slider_cycle_boxed");
				}
			if( $custom["slider_type"][0]=="Featured-image") 
				{
				get_template_part("slider_image");
				}
			if( $custom["slider_type"][0]=="Smooth-Slider")  
				{
				get_template_part("slider_smooth");
				} 
			if( $custom["slider_type"][0]=="Owl-Slider")  
				{
				get_template_part("slider_owl");
				} 
			if( $custom["slider_type"][0]=="KenBurns")  
				{
				get_template_part("slider_kenburns");
				} 

			$m = "true";
			
			do_action("allslider_theme_output_choice");

			echo $afterslider;

			?></div><!-- # slideshow_header --><?php

			}

		if( isset( $custom["sl_layer_id"][0]) OR isset( $custom["sl_rev_id"][0] ) )
			{

			if( isset( $custom["sl_rev_id"][0] ) && $custom["sl_rev_id"][0] != "" )
				{
				echo "<!-- revolution slider id ".$custom['sl_rev_id'][0]." -->";
				echo do_shortcode( "[rev_slider ".$custom['sl_rev_id'][0]."]" ); 
				}
			if( isset( $custom["sl_layer_id"][0] ) && $custom["sl_layer_id"][0] != "" )	
				{
				echo "<!-- layer slider id ".$custom['sl_layer_id'][0]." -->";
				echo do_shortcode( "[layerslider id='".$custom['sl_layer_id'][0]."']" ); 
				}
			$m = "true";

			}

		if( isset ( $custom["custom_header_content"][0] ) &&  $custom["custom_header_content"][0]!="")  
			{
			?><div id='slideshow_header'><?php
			echo $beforeslider;
			get_template_part("slider_custom_html");
			echo $afterslider;
			?></div><?php
			
			$m = "true";

			}  

	}


function sevenleague_menu_output( $menu_name = 'main_menu_1')
	{
	global $post, $custom;

	if( !is_404() && isset( $post ) )
		{ 
		$custom = get_post_custom($post->ID);  
		}
		else
			{
			$custom="";
			} 

	if( ! isset( $custom['hide_menu'][0] ) )
		{
		if(has_nav_menu( $menu_name ))
			{
			$walker = new Menu_With_Description;  
		
			$return="";

			$menu_name = apply_filters( "sl_navigation_menu" , $menu_name );
									
			$return.=wp_nav_menu( array('echo' => '0', 'container'=> 'nav', 'walker'=>$walker , 'menu' =>$menu_name, 'fallback_cb' => 'wp_page_menu', 'theme_location' => $menu_name ,'menu_id'=>'menu', 'menu_class'=>'main-menu menu-element template_ul main-menu-1 sf-menu menu_element sf-js-enabled sf-shadow' )    ); 

			if( load_option( "addit_menu_content" ) != "" )
				{
				$addin = load_option( "addit_menu_content" );
				$return = str_replace( "</ul></nav>", "<li class='addit_menu_content'>".do_shortcode( stripslashes( $addin ) )."</li></ul></nav>", $return );
				}

			$return = apply_filters( "sl_default_nav_output" , $return );
	
			echo $return;

			}
			else 
				{
				// echo "<div class='alert alert_red'><a style='color:#fff;' href='".admin_url()."/nav-menus.php'>Please define a menu</a></div>"; //wp_page_menu(array('menu_class'  => 'main-menu main-menu-1 sf-menu sf-js-enabled sf-shadow')); //wp_list_pages();
				?>
				<nav class='menu-main-container'>
					<ul id='menu' class='main-menu template_ul main-menu-1 sf-menu sf-js-enabled sf-shadow menu_element'>
						<?php 
						$out = wp_list_pages('title_li=&echo=0'); 
						$out = str_replace('children','sub-menu',$out); 
						echo $out; 
						?>
					</ul>
				</nav>
				<?php
				}
		}
	}


function sevenleague_before_content_output()
	{
	if(load_option("before_content")!="")
		{
		?><div id='over_content'>
			<div class="inner">
			<?php
				echo do_shortcode(stripslashes(load_option("before_content")));
			?></div>
		</div>
		<?php
		}
	}


function sevenleague_headline_section()
	{
	global $post, $custom;
	$return="";
	if(is_singular() && isset($custom['show_headline'][0]) AND $custom['show_headline'][0]=='on' OR ( !isset($custom['show_headline'][0] ) && is_singular('post') && load_option("global_post_headlines")=="on" )  OR ( !isset($custom['show_headline'][0] ) && !is_archive() && load_option("global_archive_headlines")=="on" )  OR ( isset($custom['show_headline'][0]) && $custom['show_headline'][0]==""  && is_singular('post') && load_option("global_post_headlines")=="on" ) OR ( !isset($custom['show_headline'][0] ) && is_singular() && !is_singular('post') && load_option("global_page_headlines")=="on" ) )
		{ 

		$return.='<section id="head_line" class="'.sevenleague_headline_section_class().' '.load_option( "headline_align" ).'">';
		$return.='<div class="'.load_option("headline-section_inner").'">';

		if( load_option( "before_headline_content" ) !="" )
			{
			$return.= "<div class='before_headline_content'>".do_shortcode( stripslashes( load_option("before_headline_content") ) )."</div>";
			}

		if( load_option( "headline_add_content") !="" )
			{
			$return.="<div class='react_to_".load_option( "headline_align" )." headline_additional_content'>";
			$return.=do_shortcode( stripslashes( load_option( "headline_add_content" ) ) );
			$return.="</div>";
			}

		$return.='<h1 class="headline_page_title">'.get_the_title().'</h1>
				'.sevenleague_second_headline().'
			<div class="clear"></div>';




		if( load_option( "after_headline_content" ) !="" )
			{
			$return.= "<div class='after_headline_content'>".do_shortcode( stripslashes( load_option("after_headline_content") ) )."</div>";
			}

		$return.='</div><!-- inner --></section>';
		}
	
	$return = apply_filters("sl_headline_section_return",$return);
	echo $return;
	}


function sl_admin_notice($notice='', $position='', $echo='on', $style='', $class='')
	{ 
	$return=""; 
	if(  current_user_can( 'manage_options' )  && load_option("show_admin_notice")=="on" )
		{
		
		$return.="<span class='admin_notice position_".$position." $class' style='$style'>
						<i class='fa fa-info icon-info'></i>
						<em>".$notice."
						<hr />
						This notices are only visible if you are logged in as admin in WordPress. You can remove all notices <a href='".sl_options_link()."&highlight=show_admin_notice' target='_blank'>here</a>
						</em>
			</span>";
		}

	$return = apply_filters( 'sl_admin_notice_filter' , $return );

	
	if($echo == 'on')
		{
		echo $return;
		}
		else
			{
			return $return;
			}
	}


function sl_options_link()	
	{
	return admin_url()."themes.php?page=options-page.php";
	}







function sl_cpt_settings($opts="")
	{ 
	global $shortname;
	if( isset($_REQUEST['step']) && $_REQUEST['step']=="2" )
		{ 
		// update Options
		foreach($opts as $value)
			{ 
			$cn = $value['id'];
			if( isset( $_REQUEST[$cn] )  && $_REQUEST[$cn]!="" )
				{
				update_option( $shortname."_".$value['id'] , $_REQUEST[$cn] );
				}
			}
		}
	?> 
	<form method="post" action="#"> 
	<input type="hidden" name="step" value="2" />
	<?php	
	foreach ($opts as $value)
	 	{ 
		switch ( $value['type'] ) 
		{ 
		case "title":
			?>			
			<!--  <h2><?php echo $value['name']; ?></h2>-->
			<?php break; 
		case 'text':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			    <div class="options-right"><div class='clear-value'>x</div><input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo load_option($value['id']);  ?>" /></div>
			</div>
			<div class="options-line2"><?php if(isset($value['desc'])) { echo $value['desc']; } ?></div>				
			<?php
			break; 
		case "checkbox":
			?>
			    <div class="options-line">
			   	 <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			   	 <div class="options-right">
					<?php  
						$checked="";
						$cclass=" unchecked";
						if(load_option($value['id'])=="on")	
							{ 
							$checked = " checked='checked' "; 
							$cclass=" checked";
							}
							else
								{
								$checked="";
								$cclass=" unchecked";
								} 
					?>	
					<div class="checkboxfake <?php echo $cclass; ?>"></div>
			               	<input type="hidden" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if( load_option( $value['id'] )=="on" ) { echo "on"; } else { echo "false"; }  ?>" />
					<?php if(isset($value['desc'])) { echo $value['desc']; } ?>
			               </div>
			    </div>
				<div class="options-line2"></div>		   
			<?php         break;			
		case 'dropdown':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			    <div class="options-right">			
				<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"  >
					<?php
					for($i=0;$i<count($value['value']); $i++)
						{
						?><option value="<?php echo $value['value'][$i];?>"   <?php if(load_option($value['id']) == $value['value'][$i]) { echo " selected"; } ?>><?php echo $value['value'][$i] ; ?></option>
						<?php
						}
						?>
				</select>
				</div>
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?></div>				
			<?php
			break;
		}

	}
		?>
	</div>
	</div>
	<div style="clear:both;"></div>   
		<p>&nbsp;</p>
		<input type="submit" class="button-primary" value="Save" />
		</form> 
		<div class="clear"></div>
		<?php
	}





function sl_install_other_options()
	{
	global $shortname;
	$options = array();
	$options = apply_filters( "sl_add_other_options", $options ); 
		// INSTALL THE OPTIONS
		foreach ($options as $value) 
			{
			if($value['type']=="checkbox")
				{
				if(isset($value['std']) && $value['std']=="true" OR $value['std']=="on")
					{
					update_option( $shortname."_".$value['id'],  "on"  );
					}
					else
						{
						update_option( $shortname."_".$value['id'],  "false"  );
						}
				}
				else
					{
					if(isset($value['id']) AND isset($value['std']))
						{	
						update_option( $shortname."_".$value['id'],  $value['std']  );
						}
					}
			} 
	}




function sl_setup_custom_metas()
	{
	// SETUP CUSTOM PAGE CSS AND CUSTOM PAGE JS IF ISSET

	global $post;

	if( is_singular() )
		{

		$xcss = get_post_custom_values("xcss");
		$xjs = get_post_custom_values("xjs");
	
		if( $xcss[0] !="" )	
			{
			echo "<style type='text/css'>".$xcss[0]."</style>";
			}
		if( $xjs[0] !="" )
			{
			echo "<script type='text/javascript'>".$xjs[0]."</script>";
			}

		}	
		
	}


add_action( 'wp_head' , 'sl_setup_custom_metas' );


function sl_footer_scrolltop()
	{
	if( load_option( 'show_scrolltop' ) == 'on' )	
		{
		echo "<div id='footer_scroll_top'><i class='fa fa-angle-up icon icon-angle-up'></i></div>";
		}
	}










/* 
** Function sl_load_template
** Added: 05032015
** Params: posttype, template
** Filters: sl_load_template_name, sl_load_template_content
*/

function sl_load_template( $posttype="", $template="" ) {
	
	$return = "";

	if( $posttype == "" ) {
		// GET THE CURRENT POSTTYPE
		$posttype = get_post_type();
	}

	if( $template != "") {
		$template_name = $template;
		} else {
		$template_name = $posttype."-entry";
	}


	// ADD FILTER TO TEMPLATE NAME
	$template_name = apply_filters( 'sl_load_template_name' , $template_name );


	// LOAD THE TEMPLATE CONTENT
    	ob_start();  
    	get_template_part( $template_name );  
    	$ret = ob_get_contents();  
    	ob_end_clean();  
   	$return.= $ret;  


	// APPLY FILTER TO CONTENT
	$return = apply_filters('sl_load_template_content' , $return );


	return $return;

	}


 
function sl_add_sccode( $name = '' , $code = '' , $parent = '' ) {

	global $sc_gen_codes;

	if( $parent !="" ) {

		$sc_gen_codes[] = array(  
	
				"title"		=>	$name,
				"code"		=>	$code, 
				"parent"		=>	$parent,
			);
	}
	
	

}











?>