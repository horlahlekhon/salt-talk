<?php

function testimonial_register() 
	{  
    	$args = array(  
        	'label' => 'Testimonial',  
        	'singular_label' => 'Testimonial',  
        	'public' => true,  
        	'show_ui' => true,  
        	'capability_type' => 'post',  
        	'hierarchical' => false,  
        	'rewrite' => true,  
        	'supports' => array('title', 'editor', 'thumbnail','post-types') ,
		'show_in_menu' => true  ,
		 'menu_position' => null,
       	);  
    	register_post_type( 'testimonial' , $args );  
	}  
	add_action('init', 'testimonial_register');  





add_action("admin_init", "testimonial_meta_box"); 

function testimonial_meta_box()
	{  
	add_meta_box("testimonialInfo-meta", "Testimonial Options", "testimonial_meta_options", "testimonial", "side", "low");  
	}   
function testimonial_meta_options()
	{  
	        global $post;  
	        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
	        $custom = get_post_custom($post->ID);  
		if(isset($custom["testimonialName"][0]))
			{
		        	$name = $custom["testimonialName"][0];    
			}
	?>  
	<label>Client Name:</label><input name="testimonialName" value="<?php if(isset($name)) { echo $name; } ?>" /><br /> 
	<?php  
	}  
	add_action('save_post', 'save_testimonial_meta');  
function save_testimonial_meta()
	{  
	    global $post;  
	    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		{ 
		return $post_id;
		}	
		else
			{
			if(isset($_POST['testimonialName']))
				{
			    	update_post_meta($post->ID, "testimonialName", $_POST["testimonialName"]);  
				}
			} 
		}    

/* 
** SHORTCODES
*/



///////////////////////
/////////// TESTIMONIAL CAROUSEL
//////////////////////

function testimonialcarousel($atts, $content=null)
	{
	$showheadline="";
	extract(shortcode_atts(array(    
	'number'=>'10',
	'auto'=>'false'
	    ), $atts));
	$return=""; 
	$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
	$return="<div id='carousel-".$rand."' class='carousel-container'>"; 
	$return.="<ul class='carousel template_ul testimonial_carousel' id='".$rand."'>"; 
	$args = array( 'numberposts' => $number, 'post_type'=>'testimonial','post_status' => 'publish');
	$pager="";
	$ix="";
	global $post;
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post);  
	$ix++; 	
	$name=get_post_custom_values('testimonialName'); 
	$title= str_ireplace('"', '', trim(get_the_title()));
	$desc= str_ireplace('"', '', trim(get_the_content()));	
	$img=wp_get_attachment_image_src(get_the_id(), 'icon', false, false);	
	$bigimg=wp_get_attachment_image_src(get_the_id(), 'default', false, false);		 
	$return.='	<li class="sc_testimonial_li">';
		$return.='<div class="testimonalcarousel_content" data-title="'.$title.'" data-img="'.img_icon_url(get_the_id()).'"><img class="testicarouimg" align="left" src="'.img_slider_url(get_the_id()).'" alt="'.$title.'" /><p>'.$desc.'</p><strong>'.$title.'</strong><div class="clear"></div></div>';		
	$return.="<div class='clear'></div></li>";
	endforeach;
	wp_reset_query();
	$return.="</ul>";
 	$return.="<ul class='template_ul cycle_pager' id='cycle-pager-".$rand."'></ul>";
	$return.="</div>";
	$return.="<div class='clear'></div>";
	ob_start();	
	?>
	<script type="text/javascript">
	jQuery(window).load(function()
		{
	    	jQuery("#<?php echo $rand ?>").cycle({
	 		fx:     'scrollLeft',
       			timeout:  5000,
			speed:'800',
			easing:'easeInOutExpo',
			pause: true,
			prev:    '#cycle-prev',
			next:    '#cycle-next',
			pager:   '#cycle-pager-<?php echo $rand; ?>',  
			pagerAnchorBuilder: pagerImages,  
			after:    afterSlide,
			});  
		function afterSlide(oldSlide,slide)
			{
			jQuery("#<?php echo $rand; ?>").animate({"height": jQuery(slide).find("div").outerHeight() });
			}

	function pagerImages(idx, slide) 
		{
		var sl=jQuery(slide).find("div").data("img");
		return '<li><a href="#"><img src="' + sl + '"   /></a></li>';
		}   

	});
	</script>
	<?php
	$ret = ob_get_contents();  
    	ob_end_clean();  
   	$return.= $ret;  
	return $return;		
	}
	add_shortcode('testimonialcarousel', 'testimonialcarousel');

	sl_add_sccode( "Testimonial Carousel" , "[testimonialcarousel number=10]" , "Testimonials" );

///////////////////////
/////////// TESTIMONIAL SLIDER
//////////////////////

function testimonialslider($atts, $content=null)
	{
	$showheadline="";
	extract(shortcode_atts(array(
	'buttons'=>true,
	'speed'=>'1000',
	'width'=>'',
	'title'=>'',
	'height'=>'',
	'easing'=>'',
	'items'=>'10',
	'itemsforward'=>'4',
	'pauseonhover'=>'true', 
	'direction'=>'left',
	'columns'=>'3',
	'showtext'=>'true',
	'showheadline'=>'true',
	'right'=>'20',
	'number'=>'10',
	'auto'=>'false'
	    ), $atts));
	$return="";

	if($speed=="")	
		{
		$speed="1000";
		}

	$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
	$return="<div id='carousel-".$rand."' class='carousel-container'>";
	$half_height=$height/2;	
	$return.="<style type='text/css' scoped><!--#".$rand." .testimonial-lists-item-shortcode {display:inline-table; width:".$width."px; margin-right:".$right."px;}";
	$return.=" #carousel-".$rand." .carousel-nav {top:0px;}  ";
	if($width!="")
		{
		$return.=" #".$rand." ul li, #".$rand." > div {width:".$width."px; }";
		}
	$return.="--></style>";	
	if($buttons=="true")
		{	
		$return.="<a id='".$rand."-prev' class='carousel-nav carousel-nav-prev ".load_option('primary_button')."' onclick='return false' href='#'><i class='fa fa-arrow-left'></i></a>
			<a id='".$rand."-next' class='carousel-nav carousel-nav-next ".load_option('primary_button')."' onclick='return false' href='#'><i class='fa fa-arrow-right'></i></a>";
		}
	if($title!="")
		{
		$return.="<h3>".$title."</h3>";
		}
	$return.="<ul class='carousel template_ul' id='".$rand."'>";



	switch ($columns)
		{
		case 1: $cols=""; break;
		case 2: $cols="one_half"; break;
		case 3: $cols="one_third"; break;
		case 4: $cols="one_fourth"; break; 
		}
	if(isset($type))
		{
		if($type!="")
			{
			$args = array( 'numberposts' => $number, 'post_type'=>'testimonial','post_status' => 'publish', 'project-type'=>$type);
			}
		}
		else
			{
			$args = array( 'numberposts' => $number, 'post_type'=>'testimonial','post_status' => 'publish');
			}
	$ix="";
	global $post;
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post);  
	$ix++; 	 
		 
	$return.='	<li class="ex-'.$cols.  ' testimonial-lists-item-shortcode">';

    

	$return .= sl_load_template();

	$return.="</li>";
	endforeach;
	wp_reset_query();
	$return.="</ul>";
	$return.="<script type='text/javascript'>
		<!--//--><![CDATA[//><!--
		jQuery(window).resize(function()
			{
			jQuery('#carousel-".$rand." .carousel li').width( jQuery('#carousel-".$rand." .carousel ').parent().width() );
			});

		jQuery(window).load(function()
			{
			jQuery('#carousel-".$rand." .carousel li').width( jQuery('#carousel-".$rand." .carousel ').parent().width() );

			jQuery('#carousel-".$rand." .carousel ').carouFredSel({
				items               	: ".$items.",
				direction           	: '".$direction."',
				  height      : null, 
				";
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
	$return.="

		

			});
		//--><!]]>
		</script>";
	$return.="</div>";
	$return.="<div class='clear'></div>";
	return $return;		
	}
	add_shortcode('testimonialslider', 'testimonialslider');

/*
**
** TESTIMONIAL SHORTCODE
**
*/
function testimonial_shortcode($atts, $content = null)
	{
	$ix=0;
	extract(shortcode_atts(array(
	'number'=>'5',
	'columns'=>'2',
	'type'=>'',
	'slider'=>'false',
	'showheadline'=>'false',
	'showtext'=>'false',
	'showreadmore'=>'false',
	'height'=>'160'
	     ), $atts));
	$return=""; 
	$height=$height/2;
	switch ($columns)
		{
		case 1: $cols=""; break;
		case 2: $cols="one_half"; break;
		case 3: $cols="one_third"; break;
		case 4: $cols="one_fourth"; break; 
		}
	if($slider=="true")
		{
		$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,5);	
		$return.="<div class='sc_slider' id='".$rand."'>";
		}
	if($type!="")
		{
		$args = array( 'numberposts' => $number, 'post_type'=>'testimonial','post_status' => 'publish', 'project-type'=>$type);
		}
		else
			{
			$args = array( 'numberposts' => $number, 'post_type'=>'testimonial','post_status' => 'publish');
			}
			global $post;
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post);  
			if(($ix=="0") AND ($slider=="true"))
				{
				$return.="<div class='sc_slider_element'  style='width:980px; float:left; height:".$height."px;'>";
				}
			$ix++; 	
			if($slider=="false")
				{
				if($ix>=$columns)
					{
					$last="_last";
					//$clear="<div class='clear'></div>";
					$ix=0;
					}
					else
						{
						$last="";	
						$clear="";
						}
				}
				else	
					{
					if($ix>=$columns)
						{
						$last="_last";
						$ix=0;
						$return.="";
						$clear="<div class='clear'></div></div>";
						}
						else
							{							
							$last="";	
							$clear="";
							}
					}
			$name=get_post_custom_values('testimonialName'); 
			$title= str_ireplace('"', '', trim(get_the_title()));
			$desc= str_ireplace('"', '', trim(get_the_content()));			 
			$return.='	<div class="'.$cols. $last.' testimonial-lists-item-shortcode">';	
			if($showheadline=="true")
				{
				$return.="<h5>". $name[0]."</h5>";
				}
			$return.='<img src="'.img_icon_url($post->ID) .'" alt="" />';
			if($showtext=="true")
				{	
				$return.="<p>". get_the_excerpt()."</p>";
				}
			if($showreadmore=="true")
				{
				$return.='<a class="testimonial_readmore button" href="'.get_permalink().'">Read more</a>';
				}
					$site= get_post_custom_values('projLink'); 
					if($site[0] != "")
						{
						$return.='<a class="portfolio_livelink button" target="_blank" href="'.$site[0].'">Visit the Site</a>';
						}				
			$return.='<div class="clear"></div>'.$clear;
			$return.="</div>".$clear;
		endforeach;
		wp_reset_query();
	if($slider!="true")
		{
		$return.="<div class='clear'></div>";
		}
	if($slider=="true")
		{
		$return.="</div>";
		$return.='<script type="text/javascript" src="'. get_template_directory_uri(). '/script/jquery.anythingslider.min.js"></script>';
		$return.="<script type='text/javascript'>
			var pw=jQuery('.sc_slider_element').parent().parent().width();			
			jQuery('.sc_slider_element').width(pw);
			jQuery('#".$rand."').anythingSlider({buildNavigation     : false });		//.caroufredsel({ scroll : {items : 1, duration: 1000,pauseOnHover: true} });
			</script>";
		}
	return $return;		
	}
	add_shortcode('testimonial', 'testimonial_shortcode');




function add_testimonials_tab()
	{
	$return='

	
				<h3><a href="#">Testimonial Slider</a></h3>		
				<div>
					<label for="test_title">Title</label>
					<input type="text" name="test_title" id="test_title" /><br />
					<label for="test_number">Number of Items</label>
					<input type="text" name="test_number" value="" id="test_number" /><br />
					<label for="test_items">Visible items</label>
					<input type="text" name="test_items" value="" id="test_items" /><br />	
					<label for="test_forward">Number of Items go forward</label>
					<input type="text" name="test_forward" value="" id="test_forward" /><br />
					<label for="test_width">Width of sliding element</label>
					<input type="text" name="test_width" value="" id="test_width" /><br />
					<label for="test_height">Height of sliding element</label>
					<input type="text" name="test_height" value="" id="test_height" /><br />
					<label for="test_right">Sliding element, distanze to the Right</label>
					<input type="text" name="test_right" value="" id="test_right" /><br />						
					<label for="test_dir">Direction</label>
					<select name="test_dir" value="" id="test_dir" >
						<option></option>
						<option value="left">Left</option>
						<option value="right">Right</option>
						<option value="up">Up</option>
						<option value="down">Down</option>
					</select>
					<label for="test_auto">Autostart the Show?</label>
					<input type="checkbox" name="test_auto" value="" id="test_auto" /><br /> 
					<label for="test_speed">Pause between Change in Millisecondes</label>
					<input type="text" name="test_speed" id="test_speed"><br />
					<br />
					<a href="javascript:TestimonialDialog.insert(TestimonialDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
	';
	echo $return;
	}
add_action('shortcode_generator_contentslider_tab', 'add_testimonials_tab');


function add_testimonials_script()
	{
	ob_start();
	?>
	<script type="text/javascript"> 
	var TestimonialDialog = {
		local_ed : 'ed',
		init : function(ed) {
			TestimonialDialog.local_ed = ed;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert : function insertClient(ed) {
			var test_number = jQuery('#test_number').val();	 
			var test_items = jQuery('#test_items').val();	
			var test_forward = jQuery('#test_forward').val();	
			var test_width = jQuery('#test_width').val();	
			var test_height = jQuery('#test_height').val();	
			var test_right = jQuery('#test_right').val();
			var test_dir = jQuery('#test_dir').val();
			var test_auto=jQuery('#test_auto').val();
			var test_speed=jQuery('#test_speed').val();
			var test_title=jQuery('#test_title').val();
			if(jQuery('#test_auto').is(':checked'))	 
				{
				var test_auto="true";
				} 	
 
			var output = '';
			output = '[testimonialslider title="'+test_title+'" speed="'+test_speed+'" auto="'+test_auto+'" direction="'+test_dir+'" items="'+test_items+'" number="'+test_number+'" itemsforward="'+test_forward+'" width="'+test_width+'" height="'+test_height+'" right="'+test_right+'"  ]';			
			tinyMCEPopup.execCommand('mceInsertContent', false, output);
			tinyMCEPopup.close();
		}
	};
	tinyMCEPopup.onInit.add(TestimonialDialog.init, TestimonialDialog); 
	</script>
	<?php
	$return = ob_get_contents();  
    	ob_end_clean(); 	
	echo $return;
	}
add_action('sevenleague_shortcode_generator_scripts','add_testimonials_script');


function add_testimonialstab_tab()
	{
	$return='

				<h3><a href="#">Testimonial Tabs</a></h3>		
				<div>
					<label for="testitabs_number">Number Items</label>
					<input type="text" name="testitabs_number" id="testitabs_number" /><br />
					<br />
					<a href="javascript:TestitabsDialog.insert(TestitabsDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
	';
	echo $return;
	}
add_action('shortcode_generator_contentslider_tab', 'add_testimonialstab_tab');


function add_testimonialstab_script()
	{
	ob_start();
	?>
	<script type="text/javascript"> 
	var TestitabsDialog = {
		local_ed : 'ed',
		init : function(ed) {
			TestitabsDialog.local_ed = ed;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert : function insertTestitabs(ed) {
			var number = jQuery('#testitabs_number').val();	 	 
			var output = '';
			output = '[testimonialcarousel number="'+number+'"]';
			tinyMCEPopup.execCommand('mceInsertContent', false, output);
			tinyMCEPopup.close();
		}
	};
	tinyMCEPopup.onInit.add(TestitabsDialog.init, TestitabsDialog); 
	</script>
	<?php
	$return = ob_get_contents();  
    	ob_end_clean(); 	
	echo $return;
	}
add_action('sevenleague_shortcode_generator_scripts','add_testimonialstab_script');




function testimonial_big_slider($atts, $content = null)
	{
	extract(shortcode_atts(array(
	'number'=>'5',  
	'pause'	=>	'2000',
	     ), $atts));
	$return=""; 
	$args = array( 'numberposts' => $number, 'post_type'=>'testimonial','post_status' => 'publish');
	global $post;
	$return.="<div class='testimonial_big_slider'>";
	$return.="<ul class='template_ul cycle_slider_sc' data-pause='".$pause."'>";
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post); 
		$return.="<li class='testimonial_big_slider_item'>";
		$return.="<blockquote>".get_the_content()."</blockquote>";
		$img=get_the_post_thumbnail($post->ID, "icon");
		$return.=$img;
		$com=get_post_custom_values("testimonialName");
		$return.="<p>".get_the_title().", ".$com[0]."</p>";
		$return.="</li>";

	endforeach;
	$return.="</ul>";
	$return.="<a href='#' class='cycle_prev'>Prev</a><a href='#' class='cycle_next'>Next</a>";
	$return.="</div>";
	wp_reset_query();
	return $return;
	}
add_shortcode("testimonial_big_slider","testimonial_big_slider");
sl_add_sccode("Testimonial Big Slider" , "[testimonial_big_slider number=6]" , "Testimonials" );


function add_testimonial_big_slider_tab()
	{
	$return='

				<h3><a href="#">Big testimonial slider</a></h3>		
				<div>
					<label for="testitabs_number">Number Items</label>
					<input type="text" name="testitabs_number" id="testbslider_number" /><br />
					<br />
					<a href="javascript:TestbsliderDialog.insert(TestbsliderDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
	';
	echo $return;
	}
add_action('shortcode_generator_contentslider_tab', 'add_testimonial_big_slider_tab');

function add_testimonialbslider_script()
	{
	ob_start();
	?>
	<script type="text/javascript"> 
	var TestbsliderDialog = {
		local_ed : 'ed',
		init : function(ed) {
			TestbsliderDialog.local_ed = ed;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert : function insertTestbslider(ed) {
			var number = jQuery('#testbslider_number').val();	 	 
			var output = '';
			output = '[testimonial_big_slider number="'+number+'"]';
			tinyMCEPopup.execCommand('mceInsertContent', false, output);
			tinyMCEPopup.close();
		}
	};
	tinyMCEPopup.onInit.add(TestbsliderDialog.init, TestbsliderDialog); 
	</script>
	<?php
	$return = ob_get_contents();  
    	ob_end_clean(); 	
	echo $return;
	}
add_action('sevenleague_shortcode_generator_scripts','add_testimonialbslider_script');



function testimonial_single_entry($atts, $content=null)
	{
	global $default_button;
	extract(shortcode_atts(array( 
	'id'=>'',   
	    ), $atts));
	$return="";
	$cols="2";   
 	$args = array( 'posts_per_page' => '1', 'p'=>$id, 'post_type'=>'testimonial','post_status' => 'publish'); 
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
	add_shortcode('testimonial_single_entry', 'testimonial_single_entry');

	sl_add_sccode("Testimonial Single Entry" , "[testimonial_single_entry id=]" , "Testimonials" );



function testimonial_grid($atts, $content=null)
	{
	global $default_button;
	extract(shortcode_atts(array( 
	'items'=>'9',  
	'columns'=>'3',
	'type'=>'', 
	    ), $atts));
	$return="";
	$cols="2";  
	$return.="<div  class='portfolio-itemlist-col".$columns." group-itemlist-".$columns." grid' >\n";
 	$args = array( 'posts_per_page' => $items, 'post_type'=>'testimonial','post_status' => 'publish'); 
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
	add_shortcode('testimonial_grid', 'testimonial_grid');

	sl_add_sccode("Testimonial Grid" , "[testimonial_grid columns=3 items=6]" , "Testimonials" );


/* TESTIMONIAL SETTINGS PAGE */

add_action("admin_menu" , "sl_testimonial_settings");

function sl_testimonial_settings() 
	{ 
	add_theme_page( "Testimonials Settings", "Testimonial Settings", "edit_posts", basename(__FILE__), "sl_testimonial_settings_page");
	}



$testimonial_opts=array(   
		array(
		"type"	=>	"checkbox",
		"name"	=>	"Has single ",
		"std"	=>	"on",
		"id"	=>	"testimonial_has_single",
		"desc"	=>	"Check this box if you want to have to use the single template.",
		),   
	);


add_filter( "sl_add_other_options", "sl_add_testimonials_options" );

function sl_add_testimonials_options($val)
	{
	global $testimonial_opts;
	$return = array_merge( $val , $testimonial_opts );
	return $return;	
	}



function sl_testimonial_settings_page()
	{
	global $testimonial_opts;
	echo "<h1>Testimonial Settings Page</h1>";
	sl_cpt_settings($testimonial_opts);
	}


function sl_testimonial_single_link($text)
	{
	if( load_option("testimonial_has_single")!="false" )
		{
		echo "<a href='".get_permalink()."'>$text</a>";
		}
		else
			{
			echo "$text";
			}
	}




///////////////////////
/////////// TESTIMONIALS MASONRY
//////////////////////



function sc_testimonials_masonry($atts, $content = null)
	{
	extract(shortcode_atts(array(
	'items'=>'8',  
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
	query_posts(array( 'post_type' => 'testimonial', 'paged' => get_query_var('paged'), 'posts_per_page'=>$items ));  
	if (have_posts()) : while (have_posts()) : the_post();
	$ix++;   
	ob_start();
	?>
	<li class="portfolio-lists-item testimonials-masonry-entry testimonials-masonry-shortcode <?php echo $clear; ?>"> 
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
add_shortcode('testimonials_masonry','sc_testimonials_masonry');

sl_add_sccode("Testimonial Masonry" , "[testimonials_masonry cols=3 items=6]" , "Testimonials" );




 
?>