<?php

function team_register() 
	{  
    	$args = array(  
        	'label' => 'Team',  
        	'singular_label' => 'Team',  
        	'public' => true,  
        	'show_ui' => true,  
        	'capability_type' => 'post',  
        	'hierarchical' => false,  
        	'rewrite' => true,  
        	'supports' => array('title', 'editor', 'thumbnail','post-types') ,
		'show_in_menu' => true  ,
		 'menu_position' => null,
       	);  
    	register_post_type( 'team' , $args );  
	}  
	add_action('init', 'team_register');  


/* FOR TEAM POSITIONS, FOR EXAMPLE: CEO, COO, SERVICE, ... */

register_taxonomy("team-position", array("team"), array("hierarchical" => true, "label" => "Team Position", "singular_label" => "Team Position", "rewrite" => true));



add_action("admin_init", "team_meta_box"); 

function team_meta_box()
	{  
	add_meta_box("teamInfo-meta", "Team Options", "team_meta_options", "team", "side", "low");  
	}   

function team_meta_options()
	{  
	        global $post;  
	        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
	        $custom = get_post_custom($post->ID);  
		if(isset($custom["teamFacebook"][0]))
			{
		        	$teamFacebook = $custom["teamFacebook"][0];    		
			}
		if(isset($custom["teamTwitter"][0]))
			{
	        		$teamTwitter = $custom["teamTwitter"][0];
			}
		if(isset($custom["teamFlickr"][0]))
			{   
	        		$teamFlickr = $custom["teamFlickr"][0];   
			}
		if(isset($custom["teamYoutube"][0]))
			{
	        		$teamYoutube = $custom["teamYoutube"][0];
			}
		if(isset($custom["teamDribbble"][0]))
			{   
	        		$teamDribbble = $custom["teamDribbble"][0];   
			}
		if(isset($custom["teamPhone"][0]))
			{   
	        		$teamPhone = $custom["teamPhone"][0];   
			}
		if(isset($custom["teamFax"][0]))
			{   
	        		$teamFax = $custom["teamFax"][0];   
			}
		if(isset($custom["teamEmail"][0]))
			{   
	        		$teamEmail = $custom["teamEmail"][0];   
			}
	?>  
	<label for="teamPhone">Phone number:</label><input id="teamPhone" name="teamPhone" value="<?php if(isset($teamPhone)) { echo $teamPhone; } ?>" /><br /> 
	<label for="teamFax">Fax number:</label><input id="teamFax" name="teamFax" value="<?php if(isset($teamFax)) { echo $teamFax; } ?>" /><br /> 
	<label for="teamEmail">Email:</label><input id="teamEmail" name="teamEmail" value="<?php if(isset($teamEmail)) { echo $teamEmail; } ?>" /><br /> 

	<label for="teamFacebook">Facebook Profile:</label><input id="teamFacebook" name="teamFacebook" value="<?php if(isset($teamFacebook)) { echo $teamFacebook; } ?>" /><br /> 
	<label for="teamTwitter">Twitter Profile:</label><input id="teamTwitter" name="teamTwitter" value="<?php if(isset($teamTwitter)) { echo $teamTwitter; } ?>" /><br /> 
	<label for="teamFlickr">Flickr Profile:</label><input id="teamFlickr" name="teamFlickr" value="<?php if(isset($teamFlickr)) { echo $teamFlickr; } ?>" /><br /> 
	<label for="teamYoutube">Youtube Profile:</label><input id="teamYoutube" name="teamYoutube" value="<?php if(isset($teamYoutube)) { echo $teamYoutube; } ?>" /><br /> 
	<label for="teamDribbble">Dribbble Profile:</label><input id="teamDribbble" name="teamDribbble" value="<?php if(isset($teamDribbble)) { echo $teamDribbble; } ?>" /><br /> 
	<?php  
	}  
	add_action('save_post', 'save_team_meta');  
function save_team_meta()
	{  
	    global $post;  
	    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		{ 
		return $post_id;
		}	
		elseif( isset( $post ) ) 
			{
			if(isset($_POST["teamFacebook"]) && ( $_POST["teamFacebook"] != "" ) )
				{
		    		update_post_meta($post->ID, "teamFacebook", $_POST["teamFacebook"]); 
				}
				else
					{
					delete_post_meta($post->ID, "teamFacebook" );
					}

			if(isset($_POST["teamTwitter"]) && ( $_POST["teamTwitter"] != "" ) )
				{		    		
				update_post_meta($post->ID, "teamTwitter", $_POST["teamTwitter"]);  
				}
				else
					{
					delete_post_meta($post->ID, "teamTwitter" );
					}

			if(isset($_POST["teamFlickr"]) && ( $_POST["teamFlickr"] != "" ) )
				{
		    		update_post_meta($post->ID, "teamFlickr", $_POST["teamFlickr"]);  
				}
				else
					{
					delete_post_meta($post->ID, "teamFlickr" );
					}

			if(isset($_POST["teamYoutube"]) && ( $_POST["teamYoutube"] != "" ) )
				{
		    		update_post_meta($post->ID, "teamYoutube", $_POST["teamYoutube"]);  
				}
				else
					{
					delete_post_meta($post->ID, "teamYoutube" );
					}

			if(isset($_POST["teamDribbble"]) && ( $_POST["teamDribbble"] != "" ) )
				{
		    		update_post_meta($post->ID, "teamDribbble", $_POST["teamDribbble"]);  
				}
				else
					{
					delete_post_meta($post->ID, "teamDribbble" );
					}


			if(isset($_POST["teamFax"]) && ( $_POST["teamFax"] != "" ) )
				{
		    		update_post_meta($post->ID, "teamFax", $_POST["teamFax"]);  
				}
				else
					{
					delete_post_meta($post->ID, "teamFax" );
					}

			if(isset($_POST["teamPhone"]) && ( $_POST["teamPhone"] != "" ) )
				{
		    		update_post_meta($post->ID, "teamPhone", $_POST["teamPhone"]);  
				}
				else
					{
					delete_post_meta($post->ID, "teamPhone" );
					}

			if(isset($_POST["teamEmail"]) && ( $_POST["teamEmail"] != "" ) )
				{
		    		update_post_meta($post->ID, "teamEmail", $_POST["teamEmail"]);  
				}
				else
					{
					delete_post_meta($post->ID, "teamEmail" );
					}

			} 
		}  




/*
** SHORTCODES
**/




///////////////////////
/////////// TEAM SLIDER
//////////////////////

function teamslider($atts, $content=null)
	{	
	$type="";
	$showtext="";
	$headline="";
	$showreadmore="";
	extract(shortcode_atts(array(
	'buttons'=>true,
	'speed'=>'1000',
	'width'=>'',
	'height'=>'',
	'easing'=>'',
	'items'=>'10',
	'itemsforward'=>'4',
	'pauseonhover'=>'true', 
	'direction'=>'left',
	'columns'=>'3',
	'right'=>'20',
	'number'=>'10',
	'direction'=>'left',
	'auto'=>'false',
	'title'=>''
	    ), $atts));
	$return="";

	if($speed=="")	
		{
		$speed="1000";
		}

	$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
	$return="<div id='carousel-".$rand."' class='carousel-container'>";
	$half_height=$height/2;	
	$return.="<style type='text/css' scoped><!--#".$rand." .team-lists-item-shortcode {display:inline-block; width:".$width."px; margin-right:".$right."px;}";
	$return.=" #carousel-".$rand."  .carousel-nav {top:0px;}";
	if($height!="")
		{
		$return.=" #".$rand." {height:".$height."px;} #".$rand." li, #".$rand." > div {  height:".$height."px;}";
		}
	if($width!="")
		{
		$return.=" #".$rand." ul li, #".$rand." > div {width:".$width."px; }";
		}
	$return.="--></style>";	
	if(isset($title))
		{
		$return.="<h2>".$title."</h2>";
		}
	if($buttons=="true")
		{	
		$return.="<a id='".$rand."-prev' class='carousel-nav carousel-nav-prev ".load_option('primary_button')."' onclick='return false' href='#'>&lt;</a>
			<a id='".$rand."-next' class='carousel-nav carousel-nav-next ".load_option('primary_button')."' onclick='return false' href='#'>&gt;</a>";
		}
	$return.="<ul class='carousel template_ul' id='".$rand."'>";



	switch ($columns)
		{
		case 1: $cols=""; break;
		case 2: $cols="one_half"; break;
		case 3: $cols="one_third"; break;
		case 4: $cols="one_fourth"; break; 
		}
	if($type!="")
		{
		$args = array( 'numberposts' => $number, 'post_type'=>'team','post_status' => 'publish', 'project-type'=>$type);
		}
		else
			{
			$args = array( 'numberposts' => $number, 'post_type'=>'team','post_status' => 'publish');
			}
	$ix="";
	global $post;
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post);  
	$ix++; 	
	$title= str_ireplace('"', '', trim(get_the_title()));
	$desc= str_ireplace('"', '', trim(get_the_content()));			 
	$return.='	<li class="ex-'.$cols.  ' team-lists-item-shortcode">';

    

	$return .= sl_load_template();

	$return.="</li>";
	endforeach;
	wp_reset_query();
	$return.="</ul>";
	$return.="<script type='text/javascript'>
		<!--//--><![CDATA[//><!--
		jQuery(window).load(function()
			{
			jQuery('#carousel-".$rand." .carousel ').carouFredSel({
				items               	: ".$items.",
				direction           	: '".$direction."',
				";
			if($height!="")
				{
				$return.="height		: '".$height."', "; 
				}
	$return.="				
				prev		: '#".$rand."-prev',
				next		: '#".$rand."-next',";
	if($auto!="true")
		{
		$return.="
				auto :
					{
					play:	false 
					},
			";
		}
	$return.="		scroll : 
					{	";
	if($easing!="")
		{
		$return.="	easing		: '".$easing."', ";
		}
	$return.="
		            			items           : ".$itemsforward.",
		            			duration        : ".$speed.",                  
	            				pauseOnHover    : true
	        				} 
				 });
			";
	if($height!="")
		{
		$return.="			jQuery('#".$rand."').parent().height('".$height."');";
		}
	$return.="
			});
		//--><!]]>
		</script>";
	$return.="</div>";
	$return.="<div class='clear'></div>";
	return $return;		
	}
	add_shortcode('teamslider', 'teamslider');

//	sl_add_sccode( "Team Slider" , "[teamslider items=3 columns=3 number=9 itemsforward=1]" , "Team" );






function add_team_tab()
	{
	$return='
				<h3><a href="#">Team Slider</a></h3>		
				<div>
					<label for="team_title">Title</label>
					<input type="text" name="team_title" id="team_title" /><br />
					<label for="team_number">Number of Items</label>
					<input type="text" name="team_number" value="" id="team_number" /><br />
					<label for="team_items">Visible items</label>
					<input type="text" name="team_items" value="" id="team_items" /><br />	
					<label for="team_forward">Number of Items go forward</label>
					<input type="text" name="team_forward" value="" id="team_forward" /><br />
					<label for="team_width">Width of sliding element</label>
					<input type="text" name="team_width" value="" id="team_width" /><br />
					<label for="team_height">Height of sliding element</label>
					<input type="text" name="team_height" value="" id="team_height" /><br />
					<label for="team_right">Sliding element, distanze to the Right</label>
					<input type="text" name="team_right" value="" id="team_right" /><br /> 
					<label for="team_dir">Direction</label>
					<select name="team_dir" value="" id="team_dir" >
						<option></option>
						<option value="left">Left</option>
						<option value="right">Right</option>
						<option value="up">Up</option>
						<option value="down">Down</option>
					</select>
					<label for="team_auto">Autostart the Show?</label>
					<input type="checkbox" name="team_auto" value="" id="team_auto" /><br /> 
					<label for="team_speed">Pause between Change in Millisecondes</label>
					<input type="text" name="team_speed" id="team_speed"><br />
					<br />
					<a href="javascript:TeamDialog.insert(TeamDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>	';
	echo $return;
	}
add_action('shortcode_generator_contentslider_tab', 'add_team_tab');


function add_team_script()
	{
	ob_start();
	?>
	<script type="text/javascript"> 
	var TeamDialog = {
		local_ed : 'ed',
		init : function(ed) {
		TeamDialog.local_ed = ed;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert : function insertteam(ed) {
			var team_number = jQuery('#team_number').val();	 
			var team_items = jQuery('#team_items').val();	
			var team_forward = jQuery('#team_forward').val();	
			var team_width = jQuery('#team_width').val();	
			var team_height = jQuery('#team_height').val();	
			var team_right = jQuery('#team_right').val();	
			var team_dir = jQuery('#team_dir').val(); 
			var team_auto=jQuery('#team_auto').val();
			var team_speed=jQuery('#team_speed').val();
			var team_title=jQuery("#team_title").val();
			if(jQuery('#team_auto').is(':checked'))	 
				{
				var team_auto="true";
				} 
			if(jQuery('#team_headline').is(':checked'))	 
				{
				var team_headline="true";
				}
			if(jQuery('#team_text').is(':checked'))	 
				{
				var team_text="true";
				}
			var output = '';
			output = '[teamslider title="'+team_title+'" speed="'+team_speed+'" auto="'+team_auto+'" direction="'+team_dir+'" items="'+team_items+'" number="'+team_number+'" itemsforward="'+team_forward+'" width="'+team_width+'" height="'+team_height+'" right="'+team_right+'"  ]';			
			tinyMCEPopup.execCommand('mceInsertContent', false, output);
			tinyMCEPopup.close();
		}
	};
	tinyMCEPopup.onInit.add(TeamDialog.init, TeamDialog); 
	</script>
	<?php
	$return = ob_get_contents();  
    	ob_end_clean(); 	
	echo $return;
	}
add_action('sevenleague_shortcode_generator_scripts','add_team_script');



function team_single_entry($atts, $content=null)
	{
	global $default_button;
	extract(shortcode_atts(array( 
	'id'=>'',   
	    ), $atts));
	$return="";  
 	$args = array( 'posts_per_page' => '1', 'p'=>$id, 'post_type'=>'team','post_status' => 'publish'); 
	$xpost = null;
	$xpost = new WP_Query($args); 
	$ix=0; 
	if( $xpost->have_posts() ) 
		{
		while ($xpost->have_posts()) : $xpost->the_post();  
		$ix++;   

		$return .= sl_load_template();

	endwhile;
	}
	wp_reset_query();  
	return $return;		
	}
	add_shortcode('team_single_entry', 'team_single_entry');
	
	sl_add_sccode( "Team Single Entry" , "[team_single_entry id=]" , "Team" );




function team_grid($atts, $content=null)
	{
	global $default_button;
	extract(shortcode_atts(array( 
	'items'=>'9',  
	'columns'=>'3',
	'category'=>'', 
	    ), $atts));
	$return="";
	$cols="2";  
	$return.="<div  class='portfolio-itemlist-col".$columns." group-itemlist-".$columns." grid' >\n";

 	$args = array( 'posts_per_page' => $items, 'post_type'=>'team','post_status' => 'publish' , 'team-position' => $category ); 

	$xpost = null;
	$xpost = new WP_Query($args); 
	$ix=0;
	if( $xpost->have_posts() ) 
		{
		while ($xpost->have_posts()) : $xpost->the_post();  
		$ix++; 
		$toid=get_the_id();
		$id=$toid;

		$return .= sl_load_template();


	endwhile;
	}
	wp_reset_query(); 
	$return.="</div>"; 
	$return.="<div class='clear'></div>";
	return $return;		
	}
	add_shortcode('team_grid', 'team_grid');

	sl_add_sccode("Team Grid" , "[team_grid items=9 columns=3 category=]" , "Team" );

$sl_sc_generator[] = array( 'name'=> 'Team Grid', 'value' => '[team_grid items=6 columns=3 category=]' );







/* TEAM SETTINGS PAGE */

add_action("admin_menu" , "sl_team_settings");

function sl_team_settings() 
	{ 
	add_theme_page( "Team Settings", "Team Settings", "edit_posts", basename(__FILE__), "sl_team_settings_page");
	}



$team_opts=array(   
		array(
		"type"	=>	"checkbox",
		"name"	=>	"Has single ",
		"std"	=>	"on",
		"id"	=>	"team_has_single",
		"desc"	=>	"Check this box if you want to have to use the single template.",
		),   
	);

add_filter( "sl_add_other_options", "sl_add_team_options" );

function sl_add_team_options($val)
	{
	global $team_opts;
	$return = array_merge( $val , $team_opts );
	return $return;	
	}




function sl_team_settings_page()
	{
	global $team_opts;
	echo "<h1>Team Settings Page</h1>";
	sl_cpt_settings($team_opts);
	}


function sl_team_single_link($text)
	{
	if( load_option("team_has_single")!="false" )
		{
		echo "<a href='".get_permalink()."'>$text</a>";
		}
		else
			{
			echo "$text";
			}
	}




///////////////////////
/////////// TEAM SORTABLE
//////////////////////



function sc_team_masonry($atts, $content = null)
	{
	extract(shortcode_atts(array(
	'items'=>'8', 
	'type'=>'',
	'cols'=>'4'
	     ), $atts));
	global $post; 
	$return=""; 
	$clear="";
	wp_enqueue_script( 'wookmark' ); 
	$return.="<div id='masonry'>	
		<ul class='portfolio-itemlist-col".$cols." group-itemlist-".$cols." template_ul' id='tiles'>
		";
	$ix=0; 
	query_posts(array( 'post_type' => 'team', 'paged' => get_query_var('paged'), 'posts_per_page'=>$items ));  
	if (have_posts()) : while (have_posts()) : the_post();
	$ix++;   
	ob_start();
	?>
	<li class="portfolio-lists-item team-masonry-entry team-masonry-shortcode <?php echo $clear; ?>"> 
		<?php echo sl_load_template(); ?>
	</li> 
	<?php
	$return.= ob_get_contents();  
    	ob_end_clean();  
	$clear="";
	if($ix>=$cols)
		{
		$ix=0;
		$clear=" clear";
		}
	endwhile; 
	endif; 
	wp_reset_query();
	$return.='	</ul> 
		</div> ';
	$return.= "<div class='clear'></div>";
	return $return;
	}
add_shortcode('team_masonry','sc_team_masonry'); 


/* TEMPLATE TAGS */

function team_social(){
	global $post;
	$custom = get_post_custom($post->ID);  
	
	if ( isset( $custom["teamFacebook"][0] ) )
		{
		$teamFacebook = $custom["teamFacebook"][0];   
		}
	
	if( isset( $custom["teamTwitter"][0] ) )
		{ 
		$teamTwitter = $custom["teamTwitter"][0];   
		}
	
	if( isset( $custom["teamFlickr"][0] ) )
		{
		$teamFlickr = $custom["teamFlickr"][0];   
		}
	
	if( isset( $custom["teamYoutube"][0] ) )
		{
		$teamYoutube = $custom["teamYoutube"][0];   
		}
	
	if( isset( $custom["teamDribbble"][0] ) )
		{
		$teamDribbble = $custom["teamDribbble"][0]; 
		}
	
	if( isset( $custom["teamPhone"][0] ) )
		{
		$teamPhone=$custom["teamPhone"][0];
		}
	
	if( isset( $custom["teamFax"][0] ) )
		{
		$teamFax=$custom["teamFax"][0];
		}
	
	if( isset( $custom["teamEmail"][0] ) )
		{
		$teamEmail=$custom["teamEmail"][0];
		}


	if($teamFacebook) { echo "<a target='_blank' class='team_sociallinks facebook' href='$teamFacebook'><i class='fa fa-facebook'></i></a>"; }
	if($teamTwitter) { echo "<a target='_blank' class='team_sociallinks twitter' href='$teamTwitter'><i class='fa fa-twitter'></i></a>"; }
	if($teamFlickr) { echo "<a target='_blank' class='team_sociallinks flickr' href='$teamFlickr'><i class='fa fa-flickr'></i></a>"; }
	if($teamYoutube) { echo "<a target='_blank' class='team_sociallinks youtube' href='$teamYoutube'><i class='fa fa-youtube'></i></a>"; }
	if($teamDribbble) { echo "<a target='_blank' class='team_sociallinks dribbble' href='$teamDribbble'><i class='fa fa-dribbble'></i></a>"; }


}



function sl_team_title(){
	if( load_option( 'team_has_single') == 'on' ) {
		echo "<h3><a href='".get_permalink()."'>".get_the_title()."</a></h3>";
	} else {
		echo "<h3>".get_the_title()."</h3>";
	}
}


function sl_team_category(){
	if(get_the_term_list( get_the_ID(), 'team-position', "", "","")) {
		$cats=get_the_term_list( get_the_ID(), 'team-position', "", ", ","");
		echo "<span><i>".strip_tags($cats)."</i></span>"; 
	}
}

?>