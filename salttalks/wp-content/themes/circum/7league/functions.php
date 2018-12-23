<?php   

require_once ( get_template_directory() . '/7league/init.php' );
   
 

  
 
/* WOOCOMMERCE ACTIVATION */
if(load_option("woocommerce")=="on")
	{
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

	add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
	function my_theme_wrapper_start() 
		{
		echo '<section id="woo_main">';
		}
	function my_theme_wrapper_end() 
		{
		echo '</section>';
		}
	add_theme_support( 'woocommerce' );
	add_action( 'init', 'sevenleague_remove_wc_breadcrumbs' );

	function sevenleague_remove_wc_breadcrumbs() 
		{
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		} 
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);  


	// DISABLE THE DEFAULT WORDPRESS STYLESHEET

	add_filter( 'woocommerce_enqueue_styles', '__return_false' );

	// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
	add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
	 
	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		
		ob_start();
		
		?>
		<a class="cart-contents cart-number-<?php echo $woocommerce->cart->cart_contents_count; ?>" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><i class='icon-shopping-cart'></i><em><?php echo $woocommerce->cart->cart_contents_count; ?></em></a>
		<?php
		
		$fragments['a.cart-contents'] = ob_get_clean();
		
		return $fragments;
	
		} 


	}

// add_filter("sl_social_icons_output", "sl_change_social_icons_output");
function sl_change_social_icons_output( $in = null )
	{
	if( $in == "" )
		{
		$in  = '<a class="social_media social_icon facebook " href="#" target="_blank"><img src="http://web-rockstars.com/iam-theme/wp-content/themes/iam/images/s_icons/facebook.png" alt=""></a><a class="social_media social_icon twitter " href="#" target="_blank"><img src="http://web-rockstars.com/iam-theme/wp-content/themes/iam/images/s_icons/twitter.png" alt=""></a><a class="social_media social_icon googleplus " href="#" target="_blank"><img src="http://web-rockstars.com/iam-theme/wp-content/themes/iam/images/s_icons/googleplus.png" alt=""></a><a class="social_media social_icon linkedin " href="#" target="_blank"><img src="http://web-rockstars.com/iam-theme/wp-content/themes/iam/images/s_icons/linkedin.png" alt=""></a><a class="social_media social_icon flickr " href="#" target="_blank"><img src="http://web-rockstars.com/iam-theme/wp-content/themes/iam/images/s_icons/flickr.png" alt=""></a>';
		}

	return $in;
	}

function prepare_headlines($content)
	{
	$content=str_replace("<h1>","<h1><span>",$content);
	$content=str_replace("</h1>","</span></h1>",$content);
	
	$content=str_replace("<h2>","<h2><span>",$content);
	$content=str_replace("</h2>","</span></h2>",$content);

	$content=str_replace("<h3>","<h3><span>",$content);
	$content=str_replace("</h3>","</span></h3>",$content);

	return $content;
	}

// add_filter('the_content','prepare_headlines');



load_theme_textdomain('sevenleague',get_template_directory() . '/languages');




 // Setup Theme Functions
 
function sl_theme_setup() {	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' ); 
	if ( ! isset( $content_width ) ) $content_width = 1200;		 
 
	// POST FORMATS

	add_theme_support( 'post-formats', array( 'video', 'audio', 'image', 'gallery','quote', 'link' ) );

	// ADD FILTERS 
	add_filter( 'excerpt_length', 'the_excerpt_length' );
	add_filter( 'get_the_excerpt', 'custom_excerpt_more' ); 
	add_filter( 'excerpt_more', 'auto_excerpt_more' );
 
	// CHECK FOR CUSTOM MENU
 	add_filter("sl_default_nav_output", "sl_check_for_one_page");
	add_filter("sl_navigation_menu", "sl_new_nav_output");


	// EXTRACT THE MENUS 

	global $menus;
	if (strpos($menus,',') !== false) {
		$tms = explode( ',' , $menus ); 
		$menu_array = array();
		foreach( $tms as $xtms ) {
			$menu_array[$xtms] = $xtms;
		} 
 

	} else {
		$menu_array = array( $menus => $menus );
	}


	// REGISTER THE MENU 
	register_nav_menus( $menu_array );



    } 
add_action('after_setup_theme', 'sl_theme_setup');


function sl_new_nav_output($menu)
	{
	global $post;

	if( isset( $post->ID ) )
		{
		$new_menu = get_post_meta( $post->ID, 'sl_new_menu' );
		if( isset( $new_menu[0]) && $new_menu[0] !="" )
			{
			$menu = $new_menu[0];
			}
		}

	return $menu;
	}


function sl_check_for_one_page( $pagenav )
	{
	global $post;  
	if( isset($post->ID ) && $post->ID !="" )
		{  
		$content_post = get_post($post->ID);
		$content = $content_post->post_content;
		if ( has_shortcode( $content, 'one_page' ) ) 
			{ 

 			/* PREPARE CONTENT */

			$content = str_replace( "[one_page" , "" , $content );
			$content = str_replace( "]" , "" , $content );
 
			 

			$atts = explode(" ", $content);
 
			foreach($atts as $entry)
				{  

				if(strpos( $entry , 'ids=' ) !== false)
					{
					$att = $entry;
					}
				if(strpos( $entry , 'menu=' ) !== false)
					{
					$xmenu = $entry;
					}
				if(strpos( $entry , 'before_nav=' ) !== false)
					{
					$bmenu = $entry;
					}
				} 

			/* EXTRACT THE ONE PAGE ENTRIES */

			$att = str_replace('ids="','',$att);
			$att = str_replace('"]','',$att); 
			$pages = explode( ",", $att );
 
			$pagenav= '<ul id="menu" class="main-menu template_ul main-menu-1 sf-menu sf-js-enabled sf-shadow one_page_menu">';
			
			$i = 0;


			/* EXTRACT EXTRA BEFORE MENU ITEMS */			

			if( isset( $bmenu ) && $bmenu!="" )
				{ 
				$bmenu = str_replace("menu=", "" , $bmenu );
				$bmenu = str_replace( "'" , "", $bmenu );
				$bmenu = str_replace( '"' , "", $bmenu );
  
				$bins = explode( ",", $bmenu );
				foreach( $bins as $bin )
					{ 
					$url=get_permalink($bin);
					if($url!="")
						{	
						$pagenav.="<li><a href='".get_permalink($bin)."'>".get_the_title($bin)."</a></li>";
						}
					}
				}


			foreach($pages as $page)
				{ 
				$title = get_the_title($page);
				$pagenav.="<li><a href='#sector_".$i."'>".$title."</a></li>";
				$i++;
				}
	
			/* EXTRACT EXTRA MENU ITEMS */			

			if( isset( $xmenu ) && $xmenu!="" )
				{ 
				$xmenu = str_replace("menu=", "" , $xmenu );
				$xmenu = str_replace( "'" , "", $xmenu );
				$xmenu = str_replace( '"' , "", $xmenu );
  
				$ins = explode( ",", $xmenu );
				foreach( $ins as $in )
					{  
					$url=get_permalink($bin);
					if($url!="")
						{
						$pagenav.="<li><a href='".get_permalink($in)."'>".get_the_title($in)."</a></li>";
						}
					}
				}
	

			$pagenav.= '</ul>';
			} 
		}
	return $pagenav;
	}



 function the_excerpt_length( $length ) 
	{
	if( load_option( "blog_excerpt" ) != "")
		{
		$excerpt = load_option( "blog_excerpt" );
		}
		else
			{
			$excerpt = "50";
			}
	return $excerpt;
	}


function continue_reading_link() 
	{
	$readmore = "...";
	if( load_option( "blog_readmore" ) != "" )
		{
		$readmore = load_option( "blog_readmore" );
		}
	return ' <a href="'. esc_url( get_permalink() ) . '"><span class="meta-nav">'.stripslashes($readmore).'</span></a>';
	}


function auto_excerpt_more( $more ) 
	{
	return continue_reading_link();
	}


function custom_excerpt_more( $output ) 
	{
	if ( has_excerpt() && ! is_attachment() ) 
		{
		$output .=  continue_reading_link();
		}
		return $output;
	}










/*
** THE COMMENTSTEMPLATE
*/
function mytheme_comment($comment, $args, $depth) 
	{
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-author vcard">
				<?php echo get_avatar( $comment->comment_author_email, 60 ); ?>
				<p class='commentauthor'><?php  comment_author_link(); ?></p>
				<p class='comment-time'><?php comment_date(); ?>, <?php comment_time(); ?></p>							
			</footer>
			<div class="comments-body">				
				<?php comment_text() ?>
				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?><?php edit_comment_link('Edit',' | ','') ?>
 				</div>
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.','sevenleague'); ?></em>			
				<?php endif; ?>
			</div>
			<div class="clear"></div>
		</article>
	</li>
	<?php
   	}












class Menu_With_Description extends Walker_Nav_Menu 
	{
    	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
    		{
        		$id_field = $this->db_fields['id'];
        			if ( is_object( $args[0] ) ) 
				{
            				$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
				}
        		return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    		}
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
		{
		global $wp_query;
		$item_output="";
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 		if( $args->has_children ) 
			{ 
			$classes[]="has-submenu"; 
			}
		if(is_numeric($item->xfn))
			{
			$classes[]="static-item";
			}
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>'; 
		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		// $attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

	$menuicon=get_post_custom_values("menuicon",$item->object_id);
	if($menuicon[0]!="")
		{
		$item_output .= "<i class='icon-".$menuicon[0]."'></i>";
		}

		if (trim($item->description)!="")
			{
			$attributes .= ! empty( $item->description) ? ' data-v="'.esc_Attr($item->description).'"' : '';
			}
		$item_output .= $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after ;
		//$item_output .= '<b>' . $item->description . '</b>';
		//$item_output .= '<em></em>';
		if (trim($item->description)!="")
			{
			$item_output.='<span>'.$item->description.'</span>';
			}
		$item_output .= '</a>';
		if(is_numeric($item->xfn))
			{
			$pid = $item->xfn;
			$page_object = get_post( $pid );
			if( isset( $page_object->post_content ) )
				{
				$sty = "";
				$cbg=get_post_custom_values('cbg', $item->xfn);
				$bgcolor=get_post_custom_values("bgcolor" , $item->xfn);
				$cx=get_post_custom_values("cx" , $item->xfn);
				$cy=get_post_custom_values("cy", $item->xfn);
				$crep=get_post_custom_values("crep", $item->xfn);
				$cfix=get_post_custom_values("cfix", $item->xfn); 

				if($bgcolor)
					{
					$sty.='background-color:'.$bgcolor[0].'}';	
					} 
				if($cbg[0])
					{
					$sty.='background:url('.$cbg[0].') '.$cx[0].' '.$cy[0].' '.$crep[0];
					if($cfix[0]=="on") 
						{ 
						$sty.= " fixed";
						}
					$sty.='';
					}



				$item_output .=  "<div class='seven_mega_menu' style='".$sty."'>".do_shortcode( $page_object->post_content )."</div>";
				}
			}
		$item_output .= $args->after;
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id ); 
	}
}  









function wr_wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}

 


/*
** MENU ICON 
*/

function add_menuicon_tab()
	{
	echo "<li><a href='#menuicon'>Menu</a></li>";	
	}
add_action("sevenleague_add_to_metabox_tablist", "add_menuicon_tab");





function add_menuicon_tab_content()
	{
	global $fa_icons;
	$menuicon=get_post_custom_values("menuicon");
	?>
	<div id="menuicon">
		 <div class="options-line">
			<div class="options-left"><label for="menuicon">The icon for the menu</label></div>
		       	<div class="options-right"> 
 				<?php echo icons_dropdown($id="menuicon", $name="menuicon", $value=$menuicon[0]);  ?>				
			</div> 
			<div class="clear"></div>
		</div> 
		<script type="text/javascript">
		jQuery(document).ready(function()
			{
			jQuery(".icon_dropdown li").click(function()
				{
				jQuery(".icon_dropdown li").removeClass("icon_menu_active");
				jQuery(this).addClass("icon_menu_active");
				});
			});
		</script>
	</div>
	<?php
	}
add_action("sevenleague_add_to_metabox_tabs","add_menuicon_tab_content");






function save_menuicon()
	{
	global $post;
	if(isset($_POST["menuicon"]) && $_POST["menuicon"] != "")
		{
    		update_post_meta($post->ID, "menuicon", $_POST["menuicon"]);
		} 
		else
			{
			delete_post_meta($post->ID, "menuicon" );
			}

	}

add_action("sevenleague_save_custom_meta","save_menuicon");

  











function sl_wp_gallery_hack($output, $attr) 
	{
	global $post;
	if (isset($attr['gallery_style']) && $attr['gallery_style'] == 'quickgallery')
		{

		// QUICKGALLERY

		$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
		static $instance = 0;
		$instance++;
		
		if ( isset( $attr['orderby'] ) ) 
			{
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
			            unset( $attr['orderby'] );
			}
		extract(shortcode_atts(array(
		        'order'      => 'ASC',
		        'orderby'    => 'menu_order ID',
		        'id'         => $post->ID,
		        'itemtag'    => 'dl',
		        'icontag'    => 'dt',
		        'captiontag' => 'dd',
		        'columns'    => 3,
		        'size'       => 'gallery',
		        'include'    => '',
		        'exclude'    => ''
		    ), $attr));		
	
		if($columns>4)
			{
			$columns="4";
			}
	
		$id = intval($id);
		if ( 'RAND' == $order )
		        $orderby = 'none';
	
		if ( !empty($include) ) 
			{
			$include = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		
			$attachments = array();
			foreach ( $_attachments as $key => $val ) 
				{
				$attachments[$val->ID] = $_attachments[$key];
				}
			} 
			elseif ( !empty($exclude) ) 
				{
				$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
				$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
				} 
				else 
					{
					$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
					}
	
		if ( empty($attachments) )
		return '';
	
		if ( is_feed() ) 
			{
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment )
				$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
			return $output;
			} 
         
		$size_class = sanitize_html_class( $size );
		$gallery_div = "<div class='group quickgallery-$columns-cols'>
				<div id='gallery-info-$rand' class='gallery-info gallery-info-$rand'></div>
				<div class='portfolio-itemlist-col$columns group-itemlist-$columns'>";
	
		$gallery_style="";
		$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );
	
		$i = 0;
		$z = 0;
		foreach ( $attachments as $id => $attachment ) 
			{
			$z++;
			$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_image($id, $size, false, false) : wp_get_attachment_image($id, $size, true, false);
		
			$b_url=wp_get_attachment_image_src($id, 'screen-shot', false, false);		
	
			$output .= "<div class='opacity-hover-bg-nix quickgallery-item' id='quick-gallery-$rand-$z'> ";
			$output .= "<div>$link</div>"; 
		
			$output .= "<div class='lrsg'>
					<a class='gallery-single-info gallery-single-info-".$rand." icon-search biggerPhoto'  href='". $b_url['0']."'> 
					</a>
				</div>";
	
			$output .= "</div>"; 
			} 
		$output .= "</div>\n";
		$output .= "<div class='clear'></div></div>";
		$output .='<script>
			jQuery(document).ready(function()
				{
				jQuery("a.gallery-single-info-'.$rand.'").click(function()
					{
					var ttop=	jQuery(".gallery-info-'.$rand.'").offset(); 
					jQuery(".gallery-info-'.$rand.'").css("opacity","0");
					jQuery("html, body").animate({scrollTop:ttop.top-100}, "slow");
					jQuery(".gallery-info-'.$rand.'").css({"height":"auto", "display":"block"}).delay(500).html("<div class=\'gallery_shadow_box\'><img src=\'"+jQuery(this).attr("href")+"\' alt=\'\' /><div id=\'close_info\' class=\'close_info\' data-goalid=\'"+jQuery(this).parent().parent().attr("id")+"\'>X</div></div>").animate({"opacity":"1"});
					return false;
					});
				});
				jQuery(".close_info").live("click",function()
					{
					var goalid=jQuery(this).data("goalid");  
					goalid=jQuery("#"+goalid).offset();
					jQuery(".gallery-info-'.$rand.'").animate({"height":"0"}).delay(500).html("");	
					jQuery("html, body").animate({scrollTop: goalid.top-jQuery(".gallery-info-'.$rand.'").css({"display":"none"}).outerHeight()-100},1000);
					});		
			</script>';
	    	return $output;
		}  

	if (isset($attr['gallery_style']) && $attr['gallery_style'] == 'slider')
		{

		// CYCLE SLIDESHOW

		static $instance = 0;
		$instance++;
		
		if ( isset( $attr['orderby'] ) ) 
			{
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
			            unset( $attr['orderby'] );
			}
		extract(shortcode_atts(array(
		        'order'      => 'ASC',
		        'orderby'    => 'menu_order ID',
		        'id'         => $post->ID,
		        'itemtag'    => 'dl',
		        'icontag'    => 'dt',
		        'captiontag' => 'dd',
		        'columns'    => 3,
		        'size'       => 'gallery',
		        'include'    => '',
		        'exclude'    => ''
		    ), $attr));		 
	
		$id = intval($id);
		if ( 'RAND' == $order )
		        $orderby = 'none';
	
		if ( !empty($include) ) 
			{
			$include = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		
			$attachments = array();
			foreach ( $_attachments as $key => $val ) 
				{
				$attachments[$val->ID] = $_attachments[$key];
				}
			} 
			elseif ( !empty($exclude) ) 
				{
				$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
				$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
				} 
				else 
					{
					$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
					}
	
		if ( empty($attachments) )
		return '';
		
		$output .= "[slideshow]";

		foreach ( $attachments as $id => $attachment ) 
			{ 
			$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_image($id, $size, false, false) : wp_get_attachment_image($id, $size, true, false);
		
			$b_url=wp_get_attachment_image_src($id, 'screen-shot', false, false);		
	 
			$output .= "<div>$link</div>";  
			} 

		$output .= "[/slideshow]";	
	    	return do_shortcode("$output");
		
		}


	if (isset($attr['gallery_style']) && $attr['gallery_style'] == 'justifyGallery')
		{

// JUSTIFIED GALLERY

		wp_enqueue_script( 'justifyGallery' );

		$return = "";

		$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);		

		static $instance = 0;
		$instance++;
		
		if ( isset( $attr['orderby'] ) ) 
			{
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
			            unset( $attr['orderby'] );
			}
		extract(shortcode_atts(array(
		        'order'      => 'ASC',
		        'orderby'    => 'menu_order ID',
		        'id'         => $post->ID,
		        'itemtag'    => 'dl',
		        'icontag'    => 'dt',
		        'captiontag' => 'dd',
		        'columns'    => 3,
		        'size'       => 'masonry',
		        'include'    => '',
		        'exclude'    => '',
		        'rowHeight'	=> '250',
		        'margins'  =>  '10'
		    ), $attr));		 
	
		$id = intval($id);
		if ( 'RAND' == $order )
		        $orderby = 'none';
	
		if ( !empty($include) ) 
			{
			$include = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		
			$attachments = array();
			foreach ( $_attachments as $key => $val ) 
				{
				$attachments[$val->ID] = $_attachments[$key];
				}
			} 
			elseif ( !empty($exclude) ) 
				{
				$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
				$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
				} 
				else 
					{
					$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
					}
	
		if ( empty($attachments) )
		return '';
		 
		$return .= "<div id='justify_gallery_$rand' class='justi_gallery'>";

		foreach ( $attachments as $id => $attachment ) 
			{ 
			$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_image($id, $size, false, false) : wp_get_attachment_image($id, $size, true, false);
		
			$b_url=wp_get_attachment_image_src($id, 'screen-shot', false, false);		
	 		
			$return .= "<a class='prettyPhoto' data-galid='lightbox-".$rand."' href='".$b_url[0]."' title='".get_the_title($id)."'>";
			$return .= "<div>$link</div>";  
			$return .="</a>";
			} 

		$return .= "</div>";
		
		

		$return .= "<script type='text/javascript'>
				jQuery(window).load(function()
					{
					jQuery('#justify_gallery_".$rand."').justifiedGallery({ margins:$margins ,rowHeight: $rowHeight});
					});
			  </script>";
		
		return $return;

		}



	if (isset($attr['gallery_style']) && $attr['gallery_style'] == 'masonry')
		{

		// CYCLE SLIDESHOW

		static $instance = 0;
		$instance++;
		
		if ( isset( $attr['orderby'] ) ) 
			{
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
			            unset( $attr['orderby'] );
			}
		extract(shortcode_atts(array(
		        'order'      => 'ASC',
		        'orderby'    => 'menu_order ID',
		        'id'         => $post->ID,
		        'itemtag'    => 'dl',
		        'icontag'    => 'dt',
		        'captiontag' => 'dd',
		        'columns'    => 3,
		        'size'       => 'masonry',
		        'include'    => '',
		        'exclude'    => ''
		    ), $attr));		 
	
		$id = intval($id);
		if ( 'RAND' == $order )
		        $orderby = 'none';
	
		if ( !empty($include) ) 
			{
			$include = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		
			$attachments = array();
			foreach ( $_attachments as $key => $val ) 
				{
				$attachments[$val->ID] = $_attachments[$key];
				}
			} 
			elseif ( !empty($exclude) ) 
				{
				$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
				$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
				} 
				else 
					{
					$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
					}
	
		if ( empty($attachments) )
		return '';

		$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
		
		$output .= "<div class='masonry_gallery_container pos_relative' id='masonry_".$rand."'>";
		$output .= "<ul class='template_ul masonry group-itemlist-".$columns."'>";

		foreach ( $attachments as $id => $attachment ) 
			{ 
			$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_image($id, $size, false, false) : wp_get_attachment_image($id, $size, true, false);
		
			$b_url=wp_get_attachment_image_src($id, 'screen-shot', false, false);		
	 
			$output .= "<li><a class='lightbox prettyPhoto' href='".$b_url[0]."'>$link</a></li>";  
			} 

		$output .= "</ul>";	
		$output .= "<div class='clear'></div>";
		$output .= "</div>";

		$output .= "<script type='text/javascript'>\n";
		$output .= "jQuery(window).load(function() {";
		$output .= "jQuery('#masonry_".$rand." li').wookmark({
  				align: 'center',
  				autoResize: true, 
  				container: jQuery('#masonry_".$rand."'),  
  			 	offset: 10,   
  				outerOffset: 0, 
  				resizeDelay: 50, 
				});";

		$output .=" }); ";
		$output .= "</script>";

	    	return do_shortcode("$output");
		
		}






	if (isset($attr['gallery_style']) && $attr['gallery_style'] == 'seamless')
		{

		// CYCLE SLIDESHOW

		static $instance = 0;
		$instance++;
		
		if ( isset( $attr['orderby'] ) ) 
			{
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
			            unset( $attr['orderby'] );
			}
		extract(shortcode_atts(array(
		        'order'      => 'ASC',
		        'orderby'    => 'menu_order ID',
		        'id'         => $post->ID,
		        'itemtag'    => 'dl',
		        'icontag'    => 'dt',
		        'captiontag' => 'dd',
		        'columns'    => 3,
		        'size'       => 'gallery',
		        'include'    => '',
		        'exclude'    => ''
		    ), $attr));		 
	
		if( $columns > 3 )
			{
			$columns = "3";
			}

		$cls = "third";
		
		if( $columns == '2' )
			{
			$cls = "half";
			}
		if( $columns == '3' )
			{
			$cls = 'fourth';
			} 

		$id = intval($id);
		if ( 'RAND' == $order )
		        $orderby = 'none';
	
		if ( !empty($include) ) 
			{
			$include = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		
			$attachments = array();
			foreach ( $_attachments as $key => $val ) 
				{
				$attachments[$val->ID] = $_attachments[$key];
				}
			} 
			elseif ( !empty($exclude) ) 
				{
				$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
				$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
				} 
				else 
					{
					$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
					}
	
		if ( empty($attachments) )
		return '';

		$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
		
		$output .= "<div class='pos_relative wp_seamless_gallery'>"; 

		foreach ( $attachments as $id => $attachment ) 
			{ 
			$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_image($id, $size, false, false) : wp_get_attachment_image($id, $size, true, false);
		
			$b_url=wp_get_attachment_image_src($id, 'screen-shot', false, false);		
	 
			$output .= "<div class='sc_seamlessbox seamlessbox_one_".$cls."'><a class='lightbox prettyPhoto' href='".$b_url[0]."'>$link</a></div>";  
			} 
 	
		$output .= "<div class='clear'></div>";
		$output .= "</div>";
 

	    	return do_shortcode("$output");
		
		}





	if (isset($attr['gallery_style']) && $attr['gallery_style'] == 'carousel')
		{

		// CYCLE SLIDESHOW

		static $instance = 0;
		$instance++;
		
		if ( isset( $attr['orderby'] ) ) 
			{
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
			            unset( $attr['orderby'] );
			}
		extract(shortcode_atts(array(
		        'order'      => 'ASC',
		        'orderby'    => 'menu_order ID',
		        'id'         => $post->ID,
		        'itemtag'    => 'dl',
		        'icontag'    => 'dt',
		        'captiontag' => 'dd',
		        'columns'    => 3,
		        'size'       => 'gallery',
		        'include'    => '',
		        'exclude'    => ''
		    ), $attr));		 
	
		$id = intval($id);
		if ( 'RAND' == $order )
		        $orderby = 'none';
	
		if ( !empty($include) ) 
			{
			$include = preg_replace( '/[^0-9,]+/', '', $include );
			$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
		
			$attachments = array();
			foreach ( $_attachments as $key => $val ) 
				{
				$attachments[$val->ID] = $_attachments[$key];
				}
			} 
			elseif ( !empty($exclude) ) 
				{
				$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
				$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
				} 
				else 
					{
					$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
					}
	
		if ( empty($attachments) )
		return '';

		$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
		
		$output .= "<div class='xframe cframe oneperpage megaframe pos_relative' id='carousel_".$rand."'>";
		$output .= "<ul class='template_ul masonry group-itemlist-".$columns."'>";

		$i=0;

		foreach ( $attachments as $id => $attachment ) 
			{ 
			$i++;
			$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_image($id, $size, false, false) : wp_get_attachment_image($id, $size, true, false);
				
			$l = wp_get_attachment_image_src( $id, $size, false );
			$link = "<img src='".$l[0]."' alt='' />";

			$b_url=wp_get_attachment_image_src($id, 'screen-shot', false, false);		
	 
			$output .= "<li><a class='lightbox prettyPhoto' href='".$b_url[0]."'>$link</a></li>";  
			} 

		$output .= "</ul>";	
		$output .= "<div class='clear'></div>";
		$output .= "</div>\n";

		$output .= "<script type='text/javascript'>\n";
 

		$output .="jQuery(document).ready(function(\$)
				{
				var imgw =  jQuery('#carousel_".$rand."').parent().width() / ".$columns.";
				jQuery('#carousel_".$rand." img').removeAttr('width').removeAttr('height');
				jQuery( '#carousel_".$rand." li, #carousel_".$rand." img ' ).width( imgw ).css('maxWidth',imgw);

				var ulwidth = ".$i."*imgw; 
				jQuery( '#carousel_".$rand." ul').width( ulwidth );
			
				var imgh = jQuery('#carousel_".$rand." img').height(); 
				jQuery('#carousel_".$rand."').height( imgh );
				
 
				var \$frame = \$('#carousel_".$rand."');
				var \$wrap  = \$frame.parent(); 
				\$frame.sly({
					horizontal: 1,
					itemNav: 'basic',
					smart: 1, 
					activateMiddle: 1,
					mouseDragging: 1,
					touchDragging: 1,
					releaseSwing: 1,
					startAt: 0,
					scrollBar: \$wrap.find('.scrollbar'),
					scrollBy: 0,
					scrollSource:\$frame,
					speed: 300,
					elasticBounds: 1,
					easing: 'easeOutExpo',
					dragHandle: 1,
					dynamicHandle: 1,
					clickBar: 0, 
					prev: \$wrap.find('.prev'),
					next: \$wrap.find('.next'), 
					});  

				function reorgli()
					{
					var imgaw =  jQuery('#carousel_".$rand."').parent().width() / ".$columns.";
					var ulwidth = ".$i."*imgaw;  
					jQuery( '#carousel_".$rand." ul').width( ulwidth );
					}
			}); ";

		$output .= "</script>";

	    	return do_shortcode("$output");
		
		}









	
 
	}
add_filter("post_gallery", "sl_wp_gallery_hack" ,10,2);


 
add_action('print_media_templates', 'sl_print_media_hack');


function sl_print_media_hack()
	{
	?>
	<script type="text/html" id="tmpl-gallery_style-setting">
	<label class="setting">
		<span>Gallery Style</span>
		<select data-setting="gallery_style">
			<option value=""> WordPress Style </option>
			<option value="quickgallery"> Quickgallery </option> 
			<option value="slider"> Slider </option> 	
			<option value="justifyGallery"> Justify Gallery </option>
			<option value="masonry"> Masonry Gallery </option>
			<option value="seamless"> Seamless Gallery </option>
			<option value="carousel"> Carousel </option>
		</select>
	</label>
	</script>
	<script>
	jQuery(document).ready(function()
		{ 
		_.extend(wp.media.gallery.defaults, { gallery_style: 'default_val'  });
		wp.media.view.Settings.Gallery = wp.media.view.Settings.Gallery.extend(
			{
			template: function(view)
				{
				return wp.media.template('gallery-settings')(view)
				+ wp.media.template('gallery_style-setting')(view);
				}
			});
		});
	</script>
	<?php
	}
















/*
 
 
function be_attachment_field_credit( $form_fields, $post ) {
	$form_fields['be-photographer-name'] = array(
		'label' => 'Photographer Name',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'be_photographer_name', true ),
		'helps' => 'If provided, photo credit will be displayed',
	);

	$form_fields['be-photographer-url'] = array(
		'label' => 'Photographer URL',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'be_photographer_url', true ),
		'helps' => 'Add Photographer URL',
	);

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'be_attachment_field_credit', 10, 2 );

 

function be_attachment_field_credit_save( $post, $attachment ) {
	if( isset( $attachment['be-photographer-name'] ) )
		update_post_meta( $post['ID'], 'be_photographer_name', $attachment['be-photographer-name'] );

	if( isset( $attachment['be-photographer-url'] ) )
update_post_meta( $post['ID'], 'be_photographer_url', esc_url( $attachment['be-photographer-url'] ) );

	return $post;
}

add_filter( 'attachment_fields_to_save', 'be_attachment_field_credit_save', 10, 2 );

*/










/*


function my_add_attachment_location_field( $form_fields, $post ) {
    $field_value = get_post_meta( $post->ID, 'location', true );
    $form_fields['location'] = array(
        'value' => $field_value ? $field_value : '',
        'label' => __( 'Location' ),
        'helps' => __( 'Set a location for this attachment' )
    );
    return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'my_add_attachment_location_field', 10, 2 );

function my_save_attachment_location( $attachment_id ) {
    if ( isset( $_REQUEST['attachments'][$attachment_id]['location'] ) ) {
        $location = $_REQUEST['attachments'][$attachment_id]['location'];
        update_post_meta( $attachment_id, 'location', $location );
    }
}
add_action( 'edit_attachment', 'my_save_attachment_location' );


*/




 









 
