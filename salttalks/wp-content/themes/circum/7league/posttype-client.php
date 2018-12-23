<?php

function clients_register() 
	{  
    	$args = array(  
        	'label' => 'Clients',  
        	'singular_label' => 'Clients',  
        	'public' => true,  
        	'show_ui' => true,  
        	'capability_type' => 'post',  
        	'hierarchical' => false,  
        	'rewrite' => true,  
        	'supports' => array('title', 'editor', 'thumbnail','post-types') ,
		'show_in_menu' => true  ,
		 'menu_position' => null,
       	);  
    	register_post_type( 'clients' , $args );  
	}  
	add_action('init', 'clients_register');  


register_taxonomy("clients-type", array("clients"), array("hierarchical" => true, "label" => "Client Types", "singular_label" => "Clients Type", "rewrite" => true));


add_action("admin_init", "client_meta_box"); 





function client_meta_box()
	{  
	add_meta_box("clientInfo-meta", "Client Options", "client_meta_options", "clients", "side", "low");  
	}   
function client_meta_options()
	{  
	        global $post;  
	        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
	        $custom = get_post_custom($post->ID);  
		if(isset($custom["clientLink"][0]))
			{
		 	$link = $custom["clientLink"][0];    
			}
	?>  
	<label>Link:</label><input name="clientLink" value="<?php if(isset($link)) { echo $link; } ?>" /><br /> 
	<?php  
	}  
	add_action('save_post', 'save_client_link');  
function save_client_link()
	{  
	    global $post;  
	    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		{ 
		return $post_id;
		}	
		else
			{
			if(isset($_POST["clientLink"]))
				{
			    	update_post_meta($post->ID, "clientLink", $_POST["clientLink"]);  
				}
			} 
		}  



/* 
** SHORTCODES
*/


///////////////////////
/////////// CLIENT SLIDER
//////////////////////

function clientslider($atts, $content=null)
	{
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
	'showtext'=>'true',
	'showheadline'=>'true',
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
	$return.="<style type='text/css' scoped><!--#".$rand." .client-lists-item-shortcode {display:inline-table; width:".$width."px; margin-right:".$right."px;}";
	$return.=" #carousel-".$rand." .carousel-nav {top:0px;}";
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
	if((isset($type)) AND ($type!=""))
		{
		$args = array( 'numberposts' => $number, 'post_type'=>'clients','post_status' => 'publish', 'project-type'=>$type);
		}
		else
			{
			$args = array( 'numberposts' => $number, 'post_type'=>'clients','post_status' => 'publish');
			}
	$ix="";
	global $post;
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post);  
	$ix++; 	
	$title= str_ireplace('"', '', trim(get_the_title()));
	$desc= str_ireplace('"', '', trim(get_the_content()));			 
	$return.='	<li class="ex-'.$cols.  ' client-lists-item-shortcode">';

    	

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
	add_shortcode('clientslider', 'clientslider');

//	sl_add_sccode( "Client Slider" , "[clientslider items=3 number=9 itemsforward=1 width=300]", "Clients" );





function add_client_script()
	{
	ob_start();
	?>
	<script type="text/javascript"> 
	var ClientDialog = {
		local_ed : 'ed',
		init : function(ed) {
			ClientDialog.local_ed = ed;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert : function insertClient(ed) {
			var client_number = jQuery('#client_number').val();	 
			var client_items = jQuery('#client_items').val();	
			var client_forward = jQuery('#client_forward').val();	
			var client_width = jQuery('#client_width').val();	
			var client_height = jQuery('#client_height').val();	
			var client_right = jQuery('#client_right').val();	
			var client_dir = jQuery('#client_dir').val(); 
			var client_auto=jQuery('#client_auto').val();
			var client_speed=jQuery('#client_speed').val();
			var client_title=jQuery("#client_title").val();
			if(jQuery('#client_auto').is(':checked'))	 
				{
				var client_auto="true";
				} 
			if(jQuery('#client_headline').is(':checked'))	 
				{
				var client_headline="true";
				}
			if(jQuery('#client_text').is(':checked'))	 
				{
				var client_text="true";
				}
			var output = '';
			output = '[clientslider title="'+client_title+'" speed="'+client_speed+'" auto="'+client_auto+'" direction="'+client_dir+'" items="'+client_items+'" number="'+client_number+'" itemsforward="'+client_forward+'" width="'+client_width+'" height="'+client_height+'" right="'+client_right+'" headline="'+client_headline+'" showtext="'+client_text+'"]';			
			tinyMCEPopup.execCommand('mceInsertContent', false, output);
			tinyMCEPopup.close();
		}
	};
	tinyMCEPopup.onInit.add(ClientDialog.init, ClientDialog); 
	</script>
	<?php
	$return = ob_get_contents();  
    	ob_end_clean(); 	
	echo $return;
	}
add_action('sevenleague_shortcode_generator_scripts','add_client_script');



function add_client_tab()
	{
	$return='		<h3><a href="#">Client Slider</a></h3>
				<div>
					<label for="client_title">Title</label>
					<input type="text" name="client_title" id="client_title" /><br />					
					<label for="client_number">Number of Items</label>
					<input type="text" name="client_number" value="" id="client_number" /><br />
					<label for="client_items">Visible items</label>
					<input type="text" name="client_items" value="" id="client_items" /><br />	
					<label for="client_forward">Number of Items go forward</label>
					<input type="text" name="client_forward" value="" id="client_forward" /><br />
					<label for="client_width">Width of sliding element</label>
					<input type="text" name="client_width" value="" id="client_width" /><br /> 
					<label for="client_right">Sliding element, distanze to the Right</label>
					<input type="text" name="client_right" value="" id="client_right" /><br /> 
					<label for="client_dir">Direction</label>
					<select name="client_dir" value="" id="client_dir" >
						<option></option>
						<option value="left">Left</option>
						<option value="right">Right</option>
						<option value="up">Up</option>
						<option value="down">Down</option>
					</select>
					<label for="client_auto">Autostart the Show?</label>
					<input type="checkbox" name="client_auto" value="" id="client_auto" /><br /> 
					<label for="client_speed">Pause between Change in Millisecondes</label>
					<input type="text" name="client_speed" id="client_speed"><br />
					<br />
					<a href="javascript:ClientDialog.insert(ClientDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
			';
	echo $return;
	}
add_action('shortcode_generator_contentslider_tab', 'add_client_tab');






function client_single_entry($atts, $content=null)
	{
	global $default_button;
	extract(shortcode_atts(array( 
	'id'=>'',   
	    ), $atts));
	$return="";
	$cols="2";   
 	$args = array( 'posts_per_page' => '1', 'p'=>$id, 'post_type'=>'clients','post_status' => 'publish'); 
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
	add_shortcode('client_single_entry', 'client_single_entry');

	sl_add_sccode( "Client Single Entry" , "[client_single_entry id=]" , "Clients" );


function client_grid($atts, $content=null)
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

 	$args = array( 'posts_per_page' => $items, 'post_type'=>'clients','post_status' => 'publish', 'clients-type' => $category ); 

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
	add_shortcode('client_grid', 'client_grid');

	sl_add_sccode( "Client Grid" , "[client_grid items=9 columns=3 category=]", "Clients" );


/* CLIENT SETTINGS PAGE */

add_action("admin_menu" , "sl_client_settings");

function sl_client_settings() 
	{ 
	add_theme_page(  "Settings", "Client Settings", "edit_posts", basename(__FILE__), "sl_clients_settings_page");
	}



$clients_opts=array(   
		array(
		"type"	=>	"checkbox",
		"name"	=>	"Has single ",
		"std"	=>	"on",
		"id"	=>	"clients_has_single",
		"desc"	=>	"Check this box if you want to have to use the single template.",
		),   
	);


add_filter( "sl_add_other_options", "sl_add_clients_options" );

function sl_add_clients_options($val)
	{
	global $clients_opts;
	$return = array_merge( $val , $clients_opts );
	return $return;	
	}



function sl_clients_settings_page()
	{
	global $clients_opts;
	echo "<h1>Clients Settings Page</h1>";
	sl_cpt_settings($clients_opts);
	}


function sl_clients_single_link($text)
	{
	if( load_option("clients_has_single")!="false" )
		{
		echo "<a href='".get_permalink()."'>$text</a>";
		}
		else
			{
			echo "$text";
			}
	}










?>