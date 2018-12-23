<?php



function sl_get_thumbsize() {
	$pt = get_post_type();
	switch($pt) {
		case 'portfolio':
			global $masonry;
			if( $masonry == 'true' ) {
				return "masonry";
			} else {
				return load_option('portfolio_thumbnail');
			}
			break;
		case 'post':
			return load_option('post_thumbnail');
			break;
		case 'team':
			return load_option('team_thumbnail');
			break;
		}			 
}



function sl_copy(){
	$return =  do_shortcode(stripslashes(load_option("secondfooter_content"))); 
	$return = apply_filters( 'sl_copy' , $return );
	echo $return;
}

function custom_search() {
	$return = '<form method="get" class="searchform" action="'.esc_url( home_url( '/' ) ).'"> 
			<input type="text" class="field s" name="s" placeholder="'.__('search','sevenleague').'"> 
		</form>';
	$return = apply_filters( 'sl_custom_search' , $return ); 
	echo $return;
}



function custom_content( $id = null) {
	if( do_shortcode(stripslashes(load_option( $id ))) ) {
		
		$c = do_shortcode(stripslashes(load_option( $id )));
		if( $c == strip_tags( $c ) ) {
			$return = "<p class='custom_content_p'>".$c."</p>";
		} else {
			$return =  $c;
		}
	} else {
		$return =  false;
	}
	$return = apply_filters( 'sl_custom_content_tag' , $return );
	echo $return;
}


function sl_logo(){ 
	$logo = load_logo();
	$logo = apply_filters( 'sl_logo' , $logo ); 
	echo $logo;
}

function sl_social() {
	$social_icons = social_icons();
	$social_icons = apply_filters( 'sl_social' , $social_icons ); 
	echo $social_icons;
}








/*
** FOOTER FUNCTIONS
*/


function sl_footer(){
	 if(load_option("show_footer")!="false" && !isset($custom['hide_footer'][0]) )
			{
			?>
			<footer id="footer" class="clear">	
				<div id="footer_gradient" class="element-Footer">
					<div id="footer_wrap" class="<?php echo load_option("footer_inner"); ?>">
						<?php if(load_option("before_footer")!="")
							{
							?><div class='footer_addit'><?php
							echo do_shortcode(stripslashes(load_option("before_footer"))); 
							?></div><?php
							}
						?>
						<?php sl_admin_notice($notice="Please go to the <a href='".admin_url()."widgets.php' target='_blank'>Widgets</a> to change the widgets in your footer",$position="footer"); ?>
						<?php sevenleague_footer_columns(); ?>
						<?php if(load_option("after_footer")!="")
							{
							?><div class='footer_addit'><?php
							echo do_shortcode(stripslashes(load_option("after_footer"))); 
							?></div><?php
							}
						?>
					</div>
				</div>
			</footer>
		<?php } 
}





function sl_second_footer(){

	 if(load_option("show_secondfooter")!="false" &&  !isset($custom['hide_underfooter'][0]) ) {
			?>
			<section id="copyright" class="element-SimpleFooter">
				<div class="<?php echo load_option("secondfooter_inner"); ?>"> 
					<?php sl_copy(); ?>	 
					<div class="clear"></div>
					<?php sl_admin_notice($notice="Please go to the <a target='_blank' href='".sl_options_link()."&highlight=secondfooter_content'>WordPress admin</a> to change this content",$position="secondfooter", $echo="on", $style="", $class="top"); ?>
				</div>
			</section>
			<?php
	}
		

}


function sl_before_footer() {
	if(load_option("before_footer")!="") {
		?><div class='footer_addit'><?php
		echo do_shortcode(stripslashes(load_option("before_footer"))); 
		?></div><?php
	}
}


function sl_after_footer() {
	if(load_option("after_footer")!="") {
		?><div class='footer_addit'><?php
		echo do_shortcode(stripslashes(load_option("after_footer"))); 
		?></div><?php
	}
}



function sl_scroll_top(){
	$sl_scroll_top = '
				<div class="scroll_top" style="text-align:center;"> 
					<a href="#" class="totop scroll_top_ scroll_top_button"> 
						<i class="fa fa-arrow-up"></i>
					</a>
				</div>
			';

	$sl_scroll_top = apply_filters( 'sl_scroll_top' , $sl_scroll_top );
	echo $sl_scroll_top; 
}



function sevenleague_simplemenu_output( $menu_name = 'main_menu_1') {
 
	if(has_nav_menu( $menu_name )) {
			$walker = new Menu_With_Description;  		
			$return=""; 									
			$return.=wp_nav_menu( array('echo' => '0', 'container'=> 'nav', 'walker'=>$walker , 'menu' =>$menu_name, 'fallback_cb' => 'wp_page_menu', 'depth'=>'1', 'theme_location' => $menu_name ,'menu_id'=>'simplemenu', 'menu_class'=>'simple_menu main-menu menu-element template_ul main-menu-1 sf-menu menu_element sf-js-enabled sf-shadow' )    ); 
			$return = apply_filters( "sl_simple_nav_output" , $return );	
			echo $return;
	} else {
		// SHOW LIST OF PAGES WHEN MENU IS NOT SET
		$out = wp_list_pages('title_li=&echo=0&depth=1'); 
		$out = str_replace('children','sub-menu',$out); 
		$return = "<nav class='menu-main-container'>
					<ul id='simplemenu' class='main-menu template_ul main-menu-1 sf-menu sf-js-enabled sf-shadow menu_element'>
						".$out."
					</ul>
				</nav>";
		$return = apply_filters( 'sl_default_menu_output' , $return );
		echo $return;
	} 
}




function sl_overheader(){
	if( load_option( "show_overheader" )!="false" && !isset($custom['hide_overheader'][0])  ) {
		$return = '<section id="overheader">
				<div class="'.load_option("overheader_inner").'">
					'.do_shortcode(stripslashes(load_option("overhead_content"))).'
					<div class="clear"></div>
					'.sl_admin_notice($notice="Please go to the <a target='_blank' href='".sl_options_link()."&highlight=overhead_content'>Theme Options</a> to change this content",$position="overheader" ).'
				</div> 
			</section>';
		$return = apply_filters( 'sl_overheader_output' , $return );
		echo $return;
	}
}




function sl_category() {
	$cats = get_object_taxonomies( get_post_type()  );
   	$the_cat = $cats[0];
	$terms = get_the_term_list( $post->ID, $the_cat ,"<span>","</span><em>,<em> <span>","</span>" ); 
	$terms = strip_tags( $terms, '<span>'); 
	echo "<div class='post_entry_categories'>".$terms."</div>";
}






function sl_before_main() {
	sevenleague_before_content_output();
}


function sl_after_main() {
	if(load_option("after_content")!="") {
		?><div id='after_content'>
			<div class="inner">
			<?php
				echo do_shortcode(stripslashes(load_option("after_content")));
			?></div>
		</div>
		<?php
	}
}



function sl_inner( $pos = null ){
	$return = "inner";
	if( $pos != "" ) {
		$pos = $pos."_inner";
		if( load_option( $pos ) == 'inner' or load_option( $pos) == 'softinner' ) {
			$return = load_option( $pos );
		}
	}
	$return .= ' '.$pos;
	echo $return;
}




function sl_content_below_header(){
	$custom = get_post_custom($post->ID);  
	if( isset($custom["custom_underheader_content"][0]) && $custom["custom_underheader_content"][0]!="" ) {
		?><div id='content_below_nav'> 
			<div class='inner'>
				<?php echo do_shortcode(stripslashes($custom["custom_underheader_content"][0]));	?> 
			</div>
		</div>
	<?php
	} 
}








/*
**
** POST TAGS
**
*/



function sl_post_date() {
	global $post; 
	?><span class='fa fa-clock-o'></span><span class='date-j date-m '><?php the_time( get_option( 'date_format' ) ); ?></span><?php
}

function sl_post_tags() { 
		?><span class='fa fa-tag'></span><span class='meta-tags'><?php the_tags('',', ',''); ?></span><?php 
}

function sl_post_author() {
	?><span class='fa fa-user'></span><span class='meta-author'><?php echo get_the_author(); ?></span><?php
}

function sl_linked_title() {
	global $post;
	$return = "<h3 class='linked_title'><a href='".get_permalink()."'>".get_the_title()."</a></h3>";
	$return = apply_filters( 'sl_linked_title_output' , $return );
	echo $return;
} 
 
function sl_post_comments_count(){
	?><span class='icon-comments'></span><span class='meta-comments'><?php comments_number(); ?></span><?php
}

function sl_post_excerpt(){
	echo get_the_excerpt();
}

function sl_post_readmore_link() {
	echo "<a href='".get_permalink()."'>".__( 'Read more' , 'sevenleague' )."</a>";
}

function sl_post_readmore_button() {
	echo "<a class='button sc_button custom medium' href='".get_permalink()."'>".__( 'Read more' , 'sevenleague' )."</a>";
}


function sl_featured_image( $echo = true ) {
	global $post;
	if ( has_post_thumbnail( $post->ID ) ) { 
		 $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), sl_get_thumbsize() );		
		if( $echo == true ) {
			echo "<img src='".$imgsrc[0]."' alt='' />";
		}
	}
}
 

function sl_linked_featured_image( $echo = true ) {
	global $post;
	if ( has_post_thumbnail( $post->ID ) ) { 
		 $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), sl_get_thumbsize() );		
		if( $echo == true ) {
			echo "<a href='".get_permalink()."'><img src='".$imgsrc[0]."' alt='' /></a>";
		}
	}
}

function sl_lightbox_featured_image( $echo = true ) {
	global $post;
	if ( has_post_thumbnail( $post->ID ) ) { 
		 $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), sl_get_thumbsize() );	
		 $osrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'original' );	
		if( $echo == true ) {
			echo "<a class='lightbox prettyPhoto' href='".$osrc[0]."'><img src='".$imgsrc[0]."' alt='' /></a>";
		}
	}
}



function sl_permalink_button() {
	global $post;
	
	$return = "<a href='".get_permalink()."' class='button sc_button custom'><?php _e('Read more' , 'sevenleague' ); ?></a>";
	return $return;
}




function sl_post_time() {
	the_time( get_option( 'date_format' ) );
}
 

function sl_read_more() {
	global $post;
	
	$return = "<a href='".get_permalink()."' class='sl_read_more'>".__('Read more' , 'sevenleague' )."</a>";
	echo $return;
}






