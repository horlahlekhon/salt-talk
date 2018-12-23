<?php

function portfolio_register() 
	{  
    	$args = array(  
        	'label' => 'Portfolio',  
        	'singular_label' => 'Project',  
        	'public' => true,  
        	'show_ui' => true,  
        	'capability_type' => 'post',  
        	'hierarchical' => true,  
        	'rewrite' => true,  
        	'supports' => array('title', 'editor', 'thumbnail','custom-fields','post-types') ,
		'show_in_menu' => true  ,
		 'menu_position' => null,
       	);  
    	register_post_type( 'portfolio' , $args );  
	}  
	add_action('init', 'portfolio_register');  


register_taxonomy("project-type", array("portfolio"), array("hierarchical" => true, "label" => "Project Types", "singular_label" => "Project Type", "rewrite" => true));






/* OPTIONS */

/* META BOX */
 
$sl_pf_options = array( 
 
		array(
			'title'		=>	__('Header Type','sevenleague'),
			'id'		=>	'header',
			'type'		=>	'dropdown', 
			'values'		=>	"Slider,List,None",
			'description'	=>	'The construction time',
			'autoload'		=>	true,
			), 
		); 

 

 

// DISPLAY THE METABOX 
function sl_pf_metabox() {
	global $sl_pf_options;
	sl_add_pt_metabox( $sl_pf_options );
	}


// SAVE THE METABOX

function sl_pf_save_meta() {
	global $sl_pf_options;
	sl_save_pt_metabox( $sl_pf_options );
	}



// ADD GENERAL ACTION TO METABOXES
add_action( 'add_meta_boxes' , 'sl_add_pf_box');

function sl_add_pf_box() {
	add_meta_box( 'pf_box' , 'Portfolio Options', 'sl_pf_metabox', 'portfolio' );	
	}


// ADD ACTION TO SAVE POST
add_action('save_post' , 'sl_pf_save_meta');
   




/*
** SHORTCODES
*/

 

///////////////////////
/////////// PORTFOLIO SLIDER
//////////////////////

function portfolioslider($atts, $content=null)
	{
	$type="";
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
	'title'=>'',
	'showtext'=>'true',
	'headline'=>'true',
	'right'=>'20',
	'number'=>'10',
	'direction'=>'left',
	'auto'=>'false',
	
	'ids'		=>	'',
	'exclude'		=>	'',
	'order'		=>	'DESC',
	'orderby'		=>	'',

	    ), $atts));

	$return="";

	if( $ids !="" ) {
		$ids = explode(",", $ids );
	}
	if( $exclude !="" ) {
		$exclude = explode( "," ,$exclude );
	}



	if($speed=="")	
		{
		$speed="1000";
		}

	$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
	$half_height=$height/2;	
	$return.="<div class='portfolio-carousel'>";
	$return.="<style type='text/css' scoped><!--#".$rand." .pfs-lists-item-shortcode {display:inline; float:left; width:".$width."px; margin-right:".$right."px;}";
 	if($width!="")
		{
		$return.=" #".$rand." ul li, #".$rand." > div {width:".$width."px; }";
		}
	$return.="--></style>";
	$return.="<div id='carousel-".$rand."' class='carousel-container'>";
	if(isset($title) && $title!="")
		{
		$return.= "<h2>".$title."</h2>";
		}
	if($buttons=="true")
		{	
		$return.="<a id='".$rand."-prev' class='carousel-nav carousel-nav-prev ".load_option('primary_button')."' onclick='return false' href='#'>&lt;</a><a id='".$rand."-next' class='carousel-nav carousel-nav-next ".load_option('primary_button')."' onclick='return false' href='#'>&gt;</a>";
		}
	
	$return.="<ul class='carousel template_ul' id='".$rand."'>";



	switch ($columns)
		{
		case 1: $cols=""; break;
		case 2: $cols="one_half"; break;
		case 3: $cols="one_third"; break;
		case 4: $cols="one_fourth"; break; 
		}
	
	$args = array(
		'numberposts' => $number, 
		'post_type'=>'portfolio',
		'post_status' => 'publish', 
		'project-type'=>$type,	
 		'post__in'		=>	$ids,
		'post__not_in' 	=> 	$exclude, 
		'order'		=>	$order,
		'orderby'		=>	$orderby,
	);
	

	global $post;
	$ix="";
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post);  
	$ix++; 	
	$title= str_ireplace('"', '', trim(get_the_title()));
	$desc= str_ireplace('"', '', trim(get_the_content()));			 
	$return.='	<li class="ex-'.$cols.  ' pfs-lists-item-shortcode">';


	$masonry="false";
 



	$return .= sl_load_template();

	$return.="</li>";





	endforeach;
	wp_reset_query();
	$return.="</ul>";
	$return.="<script type='text/javascript'>
		<!--//--><![CDATA[//><!--
		jQuery(window).load(function(\$)
			{	
			\$carousel = jQuery('#carousel-".$rand." .carousel ');
			jQuery('#carousel-".$rand." .carousel ').carouFredSel({
				items               	: ".$items.",
				direction           	: '".$direction."',
				";
 
	$return.="height:null,";
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
	$return.="</div></div>";
	$return.="<div class='clear'></div>";
	return $return;		
	}
	add_shortcode('portfolioslider', 'portfolioslider');



/*
**
** PORTFOLIO SHORTCODE
**
*/
function portfolio_shortcode($atts, $content = null)
	{
	$ix=0;
	extract(shortcode_atts(array(
		'number'=>'9',
		'columns'=>'3',
		'category'=>'',  
	
		'ids'		=>	'',
		'exclude'		=>	'',
			
		'order'		=>	'DESC',
		'orderby'		=>	'',

	     ), $atts));

	$return=""; 

	if( $ids !="" ) {
		$ids = explode(",", $ids );
	}
	if( $exclude !="" ) {
		$exclude = explode( "," ,$exclude );
	}



	switch ($columns)
		{
		case 1: $cols="one"; break;
		case 2: $cols="one_half"; break;
		case 3: $cols="one_third"; break;
		case 4: $cols="one_fourth"; break; 
		} 

	$args = array( 
			'numberposts' => $number, 
			'post_type'=>'portfolio',
			'post_status' => 'publish', 
			'project-type'=>$category,			
 			'post__in'		=>	$ids,
			'post__not_in' 	=> 	$exclude, 
			'order'		=>	$order,
			'orderby'		=>	$orderby,
		);
 
	global $post;
	$myposts = get_posts( $args );
		foreach( $myposts as $post ) :	setup_postdata($post);  

 
			$ix++; 	 
			if($ix>=$columns)
				{
				$last="_last"; 
				$ix=0;
				}
				else
					{
					$last="";	
					$clear="";
					} 


		 
			$return.='	<div class="'.$cols. $last.' portfolio-lists-item-shortcode">';  

			$return .= sl_load_template();
			
			if($cols=="one")
				{
				$clear="";
				} 
			$return.="</div>";	 




			$return.="".$clear;



		endforeach;
	wp_reset_query(); 


	$return.="<div class='clear'></div>";
	return $return;		
	}
	add_shortcode('portfolio', 'portfolio_shortcode');
	
	sl_add_sccode( "Portfolio Grid" , "[portfolio number=9 columns=3 category=]" , "Portfolio" );

/*
**
** PORTFOLIO WIDGET SHORTCODE
**
*/
function portfolio_widget_shortcode($atts, $content = null)
	{
	extract(shortcode_atts(array(
	'number'=>'5', 
	'type'=>'',
	'columns'=>'1'
	     ), $atts));
	$return=""; 
	switch ($columns)
		{
		case 1: $cols="one"; break;
		case 2: $cols="one_half"; break;
		case 3: $cols="one_third"; break;
		case 4: $cols="one_fourth"; break; 
		}
	if($type!="")
		{
		$args = array( 'numberposts' => $number, 'post_type'=>'portfolio','post_status' => 'publish', 'project-type'=>$type);
		}
		else
			{
			$args = array( 'numberposts' => $number, 'post_type'=>'portfolio','post_status' => 'publish');
			}
			global $post;
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post);  
			$ix++; 
			if($ix>=$columns)
				{
				$last="_last";
				$clear="<div class='clear'></div>";
				$ix=0;
				if($columns=="1")
					{
					$last="";
					$clear="";
					}
				}
				else
					{
					$last="";	
					$clear="";
					}	 
			$title= str_ireplace('"', '', trim(get_the_title()));
			$return.='	<div class="'.$cols. $last.'   portfolio-lists-item-shortcode">
					<h4>'. $title.'</h4>
					<a    class="opacity-hover-bg pretty_portfolio prettyPhoto"  href="'.  img_thumbnail_url($post->ID).'"><img class="opacity-hover" src="'.   img_mini_url($post->ID) .'" alt="" /></a>	
					<div class="clear"></div>
					<a class="portfolio_readmore button" href="'.get_permalink().'">Read more</a>';
					$site= get_post_custom_values('projLink'); 
					if($site[0] != "")
						{
						$return.='<a class="portfolio_livelink button" target="_blank" href="'.$site[0].'">Visit the Site</a>';
						}
			if($columns!=1)
				{				
				$return.='<div class="clear"></div>';
				}
			$return.='</div>'.$clear;
			endforeach;			
			if($columns!=1)
				{				
				$return.='<div class="clear"></div>';
				}
	return $return;		
	}
	add_shortcode('portfolio_widget', 'portfolio_widget_shortcode');






add_action('sevenleague_sc_generator_add_tab','generator_add_portfolio_tab');
function generator_add_portfolio_tab()
	{
	echo "<li><a href='#tabs-44'>Portfolio</a></li>";
	}


add_action('sevenleague_sc_generator_add_tab_content','generator_add_portfolio_content');
function generator_add_portfolio_content()
	{
	$return= '<div id="tabs-44">	
		<div id="portfolio-dialog">	
			<h3>Portfolio</h3>
			<form action="/" method="get" accept-charset="utf-8">
			<div class="accordion ui-accordion ui-widget ui-helper-reset ui-accordion-icons" role="tablist">
				<h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-state-active ui-corner-top" role="tab" aria-expanded="true" aria-selected="true" tabindex="0"><span class="ui-icon ui-icon-triangle-1-s"></span><a href="#">Recent Projects</a></h3>
				<div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active" role="tabpanel">
					<label for="pf_number">Number of Projects</label> 
					<input type="text" name="pf_number" value="" id="pf_number"><br>
					<label for="pf_column">Number of Columns</label> 
					<select name="pf_column" value="" id="pf_column">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select><br>	
					<label for="pf_type">Project Type (Logo, Website,..! Leave empty for show all Types)</label> 
					<input type="text" name="pf_type" value="" id="pf_type"><br>


					<a href="javascript:PFDialog.insert(PFDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>	
										
							
			</div>			
							
			</form>
		</div>
		</div>
		';
	echo $return;
	}



function add_portfoliogrid_script()
	{
	ob_start();
	?>
	<script type="text/javascript"> 
	var PFDialog = {
		local_ed : 'ed',
		init : function(ed) {
			PFDialog.local_ed = ed;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert : function insertMap(ed) {
			var number = jQuery('input#pf_number').val();
			var column=jQuery('select#pf_column').val();	
			var type=jQuery('input#pf_type').val();
			var text=jQuery('input#pf_text').val(); 
			var output='[portfolio number="'+number+'" columns="'+column+'"   type="'+type+'"  ]';
			tinyMCEPopup.execCommand('mceInsertContent', false, output);
			tinyMCEPopup.close();
		}
	};
	tinyMCEPopup.onInit.add(PFDialog.init, PFDialog); 
	</script>
	<?php
	$return = ob_get_contents();  
    	ob_end_clean(); 	
	echo $return;
	}
add_action('sevenleague_shortcode_generator_scripts','add_portfoliogrid_script');








function add_portfolio_script()
	{
	ob_start();
	?>
	<script type="text/javascript"> 
	var PFSDialog = {
		local_ed : 'ed',
		init : function(ed) {
			ClientDialog.local_ed = ed;
			tinyMCEPopup.resizeToInnerSize();
		},
		insert : function insertClient(ed) {
			var pfs_title = jQuery('#pfs_title').val();	
			var pfs_number = jQuery('#pfs_number').val();	 
			var pfs_items = jQuery('#pfs_items').val();	
			var pfs_forward = jQuery('#pfs_forward').val();	
			var pfs_width = jQuery('#pfs_width').val();	
			var pfs_height = jQuery('#pfs_height').val();	
			var pfs_right = jQuery('#pfs_right').val();
			var pfs_dir=jQuery('#pfs_dir').val();
			var pfs_auto=jQuery('#pfs_auto').val();
			var pfs_speed=jQuery('#pfs_speed').val();
			if(jQuery('#pfs_auto').is(':checked'))	 
				{
				var pfs_auto="true";
				} 
 
			var output = '';
			output = '[portfolioslider title="'+pfs_title+'" speed="'+pfs_speed+'" auto="'+pfs_auto+'" items="'+pfs_items+'" number="'+pfs_number+'" itemsforward="'+pfs_forward+'" width="'+pfs_width+'" height="'+pfs_height+'" right="'+pfs_right+'"  direction="'+pfs_dir+'"]';			
			tinyMCEPopup.execCommand('mceInsertContent', false, output);
			tinyMCEPopup.close();
		}
	};
	tinyMCEPopup.onInit.add(PFSDialog.init, PFSDialog); 
	</script>
	<?php
	$return = ob_get_contents();  
    	ob_end_clean(); 	
	echo $return;
	}
add_action('sevenleague_shortcode_generator_scripts','add_portfolio_script');







function add_portfolioslider_tab()
	{
	$return='

				<h3><a href="#">Portfolio Slider</a></h3>		
				<div>
					<label for="pfs_title">Headline</label>
					<input type="text" name="pfs_title" value="" id="pfs_title" /><br />
					<label for="pfs_number">Number of Items</label>
					<input type="text" name="pfs_number" value="" id="pfs_number" /><br />
					<label for="pfs_items">Visible items</label>
					<input type="text" name="pfs_items" value="" id="pfs_items" /><br />	
					<label for="pfs_forward">Number of Items go forward</label>
					<input type="text" name="pfs_forward" value="" id="pfs_forward" /><br />
					<label for="pfs_width">Width of sliding element</label>
					<input type="text" name="pfs_width" value="" id="pfs_width" /><br />
					<label for="pfs_height">Height of sliding element</label>
					<input type="text" name="pfs_height" value="" id="pfs_height" /><br />
					<label for="pfs_right">Sliding element, distanze to the Right</label>
					<input type="text" name="pfs_right" value="" id="pfs_right" /><br /> 
					<label for="pfs_dir">Direction</label>
					<select name="pfs_dir" value="" id="pfs_dir" >
						<option></option>
						<option value="left">Left</option>
						<option value="right">Right</option>
						<option value="up">Up</option>
						<option value="down">Down</option>
					</select>
					<label for="pfs_auto">Autostart the Show?</label>
					<input type="checkbox" name="pfs_auto" value="" id="pfs_auto" /><br /> 
					<label for="pfs_speed">Pause between Change in Millisecondes</label>
					<input type="text" name="pfs_speed" id="pfs_speed"><br />
					<br />
					<a href="javascript:PFSDialog.insert(PFSDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
	';
	echo $return;
	}
add_action('shortcode_generator_contentslider_tab', 'add_portfolioslider_tab');




/*
** WIDGET
*/




///////////////////////////////
///////////////////////////////
/////////////////////////////// PORTFOLIO
///////////////////////////////
///////////////////////////////
 

class PortfolioWidget extends WP_Widget
	{
	function PortfolioWidget()
		{
		$widget_ops = array('classname' => 'PortfolioWidget', 'description' => 'Displays Portfolio Items in Slideshow' );
		$this->WP_Widget('PortfolioWidget', 'Widget :: Recent Portfolio Items', $widget_ops);
		} 
	function form($instance)
		{
		$instance = wp_parse_args( (array) $instance, array( 'title' => ''  ,'number'=>'3','height'=>'') );
		$title = $instance['title'];
		$number = $instance['number'];
		$height = $instance['height'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
		<p><label for="<?php echo $this->get_field_id('number'); ?>">Items: <input class="widefat" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo esc_attr($number); ?>" /></label></p>		
		<p><label for="<?php echo $this->get_field_id('height'); ?>">Height: <input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo esc_attr($height); ?>" /></label></p>		
		
		<?php
		}
	function update($new_instance, $old_instance)
		{
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		$instance['height'] = $new_instance['height'];
		$instance['number'] = $new_instance['number'];
		return $instance;
		}
 
  	function widget($args, $instance)
		{
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = $instance['title'];
		$number =$instance['number'];
		$height =$instance['height'];
		if ( $title) 
			{ 
			echo $before_title . $title . $after_title;	
			}


		echo do_shortcode("[slideshow widget='true' type='cycle'  height='$height'  effect='fade' nav='true' pause='false' speed='1000'][portfolio number='$number' widget='true' excerpt='0' columns='1' showheadline='false' showreadmore='false' showimage='true' ][/slideshow]");


		echo $after_widget;
		}

	}
	add_action( 'widgets_init', create_function('', 'return register_widget("PortfolioWidget");') );

  

function sort_portfolio($atts, $content = null)
	{
	extract(shortcode_atts(array(

		'items'=>'8',  
		'cols'=>'4'

	     ), $atts));
	global $post; 
	$return=""; 
	$clear="";
	wp_enqueue_script( 'wookmark' );
	$terms = get_terms('project-type' );
	$count = count($terms); $i=0; 
	$term_list_gen="";
	$term_list_gen.="<ol id='filters' class='template_ol'>";
	$term_list_gen.="<li class='active' data-filter='portfolio-lists-item'><a href='#' >".__('All','sevenleague')."</a></li>";
	if ($count > 0) {
	     foreach ($terms as $term) {
	        $i++;
	    	$term_list_gen.="<li data-filter='portfolio-".$term->slug."'>";	 
		$term_list_gen.="<a href='#'  data-filter='portfolio-".$term->slug."'>".$term->name."</a>";
		$term_list_gen.="</li>";
	    }    
	} 	
	$term_list_gen.="</ol>";
	$return.= $term_list_gen; 	
	$return.="<div id='masonry'>	
		<ul class='portfolio-itemlist-col".$cols." group-itemlist-".$cols." template_ul' id='tiles'>
		";
	$ix=0; 
	query_posts(array( 'post_type' => 'portfolio', 'paged' => get_query_var('paged'), 'posts_per_page'=>$items ));  
	if (have_posts()) : while (have_posts()) : the_post();
	$ix++;  
	
	$terms = wp_get_object_terms($post->ID, 'project-type');
	$term_list="";
	$count = count($terms); $i=0;
	if ($count > 0) 
		{
		foreach ($terms as $term) 
			{
        			$i++;
    			$term_list .= "portfolio-$term->slug ";    	 
			}    
		}
	ob_start();
	?>
	<li class="portfolio-lists-item <?php echo $term_list ?> <?php echo $clear; ?>"> 
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
add_shortcode('sortfolio','sort_portfolio');

sl_add_sccode( "Sortable Portfolio" , "[sortfolio items=12 cols=3]" , "Portfolio" );



function portfolio_single_entry($atts, $content=null)
	{
	global $default_button;
	extract(shortcode_atts(array( 
	'id'=>'',   
	    ), $atts));
	$return="";
	$cols="2";   
 	$args = array( 'posts_per_page' => '1', 'p'=>$id, 'post_type'=>'portfolio','post_status' => 'publish'); 
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
	add_shortcode('portfolio_single_entry', 'portfolio_single_entry');
	
	sl_add_sccode( "Portfolio Single Entry" , "[portfolio_single_entry id=]" , "Portfolio" );



/* MEGA PORTFOLIO SHORTCODE */

function sc_mega_portfolio($atts, $content=null)
	{
	global $default_button;
	extract(shortcode_atts(array( 

		'items'	=>	'12',
		'size'	=>	'16',
		'distanze'	=>	'3',
		'cellW'	=>	'120',
		'cellH'	=>	'120',
		'delay'	=>	'50',
		'fit'	=>	'fitWidth',
		'bigsize'	=>	'size17',
		'megasize'=>	'size17',
	  
	    ), $atts));

	$return=""; 

	$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
	$return.='<div class="layout"><div id="pwall_'.$rand.'" class="pwall">';
 	$args = array( 'posts_per_page' => $items , 'post_type'=>'portfolio' , 'post_status' => 'publish', 'orderby' => 'menu_order' ); 
	$xpost = null;
	$xpost = new WP_Query($args); 
	$ix=0; 
	if( $xpost->have_posts() ) 
		{
		while ($xpost->have_posts()) : $xpost->the_post();  
		$ix++;   
		$class="size".$size;

		$pfeat="0";
		$custom = get_post_custom(get_the_id());  
		if( isset( $custom["pfeat"][0] ) )
			{
			$pfeat = $custom["pfeat"][0];
			}

		if($pfeat=="2")
			{
			$class=$megasize;
			}
		if($pfeat=="1" )
			{
			$class=$bigsize;
			}

	    	ob_start(); 
		?><div class="pitem <?php echo $class; ?> level1"  >
			<div class="padding">
		<?php
		$u =  wp_get_attachment_url( get_post_thumbnail_id( get_the_id() ) );
		?><div style='background:url(<?php echo $u; ?>) center center no-repeat; background-size:cover;'></div><?php
		?>	</div>	
		</div><?php 
	    	$ret = ob_get_contents();  
	    	ob_end_clean();  
	   	$return.= $ret;  
	endwhile;
	}
	wp_reset_query();  			 
	$return.='	</div>
		</div>';
	$return.="
	<script type='text/javascript'>
	jQuery(function($) {
		var wall = new freewall('#pwall_$rand');
		wall.reset({
			selector: '.pitem',
			cellW: $cellW,
			cellH: $cellH,
			fixSize: 1,
		 	delay: $delay, 
			animate: true,
			gutterY: $distanze,
			gutterX: $distanze,
			onResize: function() { 
			wall.$fit();
			}
		}); 
		wall.fitWidth();
		$(window).trigger('resize');
	});
	</script>
	 "; 
	return $return;		
	}
	add_shortcode('mega_portfolio', 'sc_mega_portfolio');






 







/* PORTFOLIO SETTINGS PAGE */

add_action("admin_menu" , "sl_portfolio_settings");

function sl_portfolio_settings() 
	{ 

	add_theme_page("Portfolio Settings", "Portfolio Settings", "edit_posts", basename(__FILE__), "sl_portfolio_settings_page");
	}



$portfolio_opts=array(   
		array(
		"type"	=>	"checkbox",
		"name"	=>	"Has single ",
		"std"	=>	"on",
		"id"	=>	"portfolio_has_single",
		"desc"	=>	"Check this box if you want to have to use the single template.",
		),   
		array(
		"type"	=>	"checkbox",
		"name"	=>	"Show releated works ",
		"std"	=>	"on",
		"id"	=>	"portfolio_show_next_works",
		"desc"	=>	"Check this box if you want to show releated works below the single entry",
		),   
	);

add_filter( "sl_add_other_options", "sl_add_portfolio_options" );

function sl_add_portfolio_options( $val )
	{
	global $portfolio_opts;
	$return = array_merge( $val , $portfolio_opts );
	return $return;	
	}






function sl_portfolio_settings_page()
	{
	global $portfolio_opts;
	echo "<h1>Portfolio Settings Page</h1>";
	sl_cpt_settings($portfolio_opts);
	}


function sl_portfolio_single_link($text)
	{
	if( load_option("portfolio_has_single")!="false" )
		{
		echo "<a href='".get_permalink()."'>$text</a>";
		}
		else
			{
			echo "$text";
			}
	}










/*
**
** PORTFOLIO SEAMLESS GRID SHORTCODE
**
*/
function sc_portfolio_seamless_grid($atts, $content = null)
	{
	$ix=0;
	extract(shortcode_atts(array(

		'items'=>'8',
		'columns'=>'4',
		'category'=>'', 
		'ids'	=>	'',
		'exclude'	=>	'',
		'order'	=>	'',
		'orderby'	=>	'',

	     ), $atts));

	$return="";  

	if( $ids !="" ) {
		$ids = explode(",", $ids );
	}
	if( $exclude !="" ) {
		$exclude = explode( "," ,$exclude );
	}

	switch ($columns)
		{
		case 1: $cols="one"; break;
		case 2: $cols="one_half"; break;
		case 3: $cols="one_third"; break;
		case 4: $cols="one_fourth"; break; 
		}

		$args = array( 
			'numberposts' => $items, 
			'post_type'=>'portfolio',
			'post_status' => 'publish',  
			'project-type'=>$category,
			'post__in'		=>	$ids,
			'post__not_in'	=>	$exclude,			
			'order'		=>	$order,
			'orderby'		=>	$orderby,
		);
		global $post;
		$myposts = get_posts( $args );
		foreach( $myposts as $post ) :	setup_postdata($post);  

			$ix++; 	 
			if($ix>=$columns)
				{
				$last="_last"; 
				$ix=0;
				}
				else
					{
					$last="";	
					$clear="";
					} 
				 
			$return.='	<div class="seamlessbox_'.$cols. $last.' portfolio-lists-item-shortcode">'; 

			$return .= sl_load_template();
			
			if($cols=="one")
				{
				$clear="";
				} 
			$return.="</div>";	 
			$return.="".$clear;
		endforeach;

		wp_reset_query();

 	$return.="<div class='clear'></div>";
	return $return;		
	}
	add_shortcode('portfolio_seamless_grid', 'sc_portfolio_seamless_grid');

	sl_add_sccode( "Portfolio Seamless Grid" , "[portfolio_seamless_grid items=12 columns=3 category=]" , "Portfolio" );



/*
**
** PORTFOLIO SEAMLESS SLIDER
**
*/
function sc_portfolio_seamless_grid_slider($atts, $content = null)
	{
	$ix=0;
	$w = 0;
	extract(shortcode_atts(array(

		'items'=>'8',
		'columns'=>'4',
		'category'=>'', 
		'slides' =>'2',
		'ids'	=>	'',
		'exclude'	=>	'',
		'order'	=>	'',
		'orderby'	=>	'',

	     ), $atts));
	$return="";  

	if( $ids !="" ) {
		$ids = explode(",", $ids );
	}
	if( $exclude !="" ) {
		$exclude = explode( "," ,$exclude );
	}

	$pitems = $items * $slides; 

	$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);

	switch ($columns)
		{
		case 1: $cols="one"; break;
		case 2: $cols="one_half"; break;
		case 3: $cols="one_third"; break;
		case 4: $cols="one_fourth"; break; 
		}

		$args = array( 
			'numberposts' => $pitems, 
			'post_type'=>'portfolio',
			'post_status' => 'publish',  
			'project-type'=>$category,
			'post__in'		=>	$ids,
			'post__not_in'	=>	$exclude,			
			'order'		=>	$order,
			'orderby'		=>	$orderby,

		);
		
		$return.="<div id='sc_portfolio_slider_".$rand."' class='pos_relative'>";

		$return.= "<ul class='template_ul portfolio_slide slides'>";
		$return.= "<li>";

		global $post;
		$myposts = get_posts( $args );
		foreach( $myposts as $post ) :	setup_postdata($post);  
			$ix++; 	 
			if($ix==$columns)
				{
				$last="_last"; 
				$ix=0;
				}
				else
					{
					$last="";	
					$clear="";
					} 

			if($w == $items)
				{
				$return.= "</li><li>";
				$w=0; 
				}  

			$return.='<div class="seamlessbox_'.$cols. $last.' portfolio-lists-item-shortcode">'; 

			$return .= sl_load_template();
			
			if($cols=="one")
				{
				$clear="";
				} 
			$return.="</div>";	 
			$return.="".$clear;

			$w++;

		endforeach;

		$return.="</li>";
		$return.="</ul>";
		$return.="</div>";

		$return.="<script type='text/javascript'>";
		$return.="jQuery(window).load(function() {  jQuery('#sc_portfolio_slider_".$rand."').flexslider({    animation: 'slide',    animationLoop: false,   controlsContainer: '.flex-container'      }); }); ";
		$return.="</script>";

		wp_reset_query();

 	$return.="<div class='clear'></div>";
	return $return;		
	}
	add_shortcode('portfolio_seamless_grid_slider', 'sc_portfolio_seamless_grid_slider');

	sl_add_sccode( "Portfolio Seamless Grid Slider" , "[portfolio_seamless_grid_slider items=6 columns=3 slides=2 category=]" , "Portfolio" );



/*
**
** PORTFOLIO GRID SLIDER
**
*/
function sc_portfolio_grid_slider($atts, $content = null)
	{
	$ix=0;
	$w = 0;
	extract(shortcode_atts(array(

		'items'=>'8',
		'columns'=>'4',
		'category'=>'', 
		'slides' =>'2',
		'ids'	=>	'',
		'exclude'	=>	'',
		'order'	=>	'',
		'orderby'	=>	'',

	     ), $atts));

	$return="";  

	if( $ids !="" ) {
		$ids = explode(",", $ids );
	}
	if( $exclude !="" ) {
		$exclude = explode( "," ,$exclude );
	}

	$pitems = $items * $slides; 

	$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);

	switch ($columns)
		{
		case 1: $cols="one"; break;
		case 2: $cols="one_half"; break;
		case 3: $cols="one_third"; break;
		case 4: $cols="one_fourth"; break; 
		}

		$args = array( 
			'numberposts' => $pitems, 
			'post_type'=>'portfolio',
			'post_status' => 'publish',  
			'project-type'=>$category,
			'post__in'		=>	$ids,
			'post__not_in'	=>	$exclude,			
			'order'		=>	$order,
			'orderby'		=>	$orderby,
		);
		
		$return.="<div id='sc_portfolio_gridslider_".$rand."' class='pos_relative'>";

		$return.= "<ul class='template_ul portfolio_slide slides'>";
		$return.= "<li>";

		global $post;
		$myposts = get_posts( $args );
		foreach( $myposts as $post ) :	setup_postdata($post);  
			$ix++; 	 
			if($ix==$columns)
				{
				$last="_last"; 
				$ix=0;
				}
				else
					{
					$last="";	
					$clear="";
					} 

			if($w == $items)
				{
				$return.= "</li><li>";
				$w=0; 
				}  

			$return.='<div class="'.$cols. $last.' portfolio-lists-item-shortcode">'; 

			$return .= sl_load_template();
			
			if($cols=="one")
				{
				$clear="";
				} 
			$return.="</div>";	 
			$return.="".$clear;

			$w++;

		endforeach;

		$return.="</li>";
		$return.="</ul>";
		$return.="</div>";

		$return.="<script type='text/javascript'>";
		$return.="jQuery(window).load(function() {  jQuery('#sc_portfolio_gridslider_".$rand."').flexslider({    animation: 'slide',    animationLoop: false, controlsContainer: '.flex-container'      }); }); ";
		$return.="</script>";

		wp_reset_query();

 	$return.="<div class='clear'></div>";
	return $return;		
	}
	add_shortcode('portfolio_grid_slider', 'sc_portfolio_grid_slider');

	sl_add_sccode( "Portfolio Grid Slider" , "[portfolio_grid_slider items=6 columns=3 slides=2 category=]" , "Portfolio" );





/* TEMPLATE TAGS */

function sl_portfolio_title(){
	if( load_option( 'portfolio_has_single') == 'on' ) {
		echo "<h3><a href='".get_permalink()."'>".get_the_title()."</a></h3>";
	} else {
		echo "<h3>".get_the_title()."</h3>";
	}
}


function sl_portfolio_category(){
	if(get_the_term_list( get_the_ID(), 'project-type', "", "","")) {
		$cats=get_the_term_list( get_the_ID(), 'project-type', "", ", ","");
		echo "<p class='sl_portfolio_category'><span><i>".strip_tags($cats)."</i></span></p>"; 
	}
}



?>