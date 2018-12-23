<?php header("Content-type: text/css");
/* VERSION 14022014 */
global $options, $shortname, $gfonts, $post, $color_profile ; 

@include_once( '../../../../../wp-load.php' ); 
@include_once( '../../7league_functions.php' );

/* FALLBACK IF THEME IS NOT INSTALLED CORRECT */
@include_once( '../../../../wp-load.php' ); 
@include_once( '../7league_functions.php' );

@include_once( '../options.php' );
@include_once( '../options-page.php' );

  

if( isset( $options ) )
	{
	foreach ($options as $value) 
		{
if( $color_profile == "" )
{
		if (isset($value['id']) && get_option( $value['id'] ) != FALSE ) 
			{
		            	$$value['id'] = get_option( $value['id'] ); 
			} 
			elseif(isset($value['id']))
				{
				$$value['id']="";
				}
}
		}
	}



echo "/* COLOR PROILE: ".$color_profile." */ ";

 
foreach( $options as $opt )
	{
	if ( isset( $opt['type']) && $opt['type'] == 'fontmulti' )
		{
		$afonts = get_option( $opt['id'] );
		}	
	}

if( isset( $afonts ) && $afonts != ""  )
	{ 
	$afonts =  explode( "," ,$afonts ); 

	foreach( $afonts as $ffont)
		{
		$xarr=ucwords($ffont);
		if($xarr!="") 
			{ 
			$my_font=str_replace(" ","+",$xarr);

			$mfont = str_replace( "+", "_", $my_font);
 			$mfont = str_replace( ":", "_", $mfont );
			echo ".".$mfont." {font-family:'".$my_font."'; }
";
			} 
		} 
	}
 









/*****/
	
	foreach ($options as $value) 
		{
		if($value['type']=="font")	
			{
			$tarr=get_option($value['id']);
			if($tarr!="")
				{
				$arr[]=$tarr;
				}
			}
		}
	$used_fonts="";
	$fams="";
	if( is_array( $arr ) ) {

		$arr=array_values(array_unique($arr)); 
		for($i=0;$i<count($arr); $i++)
			{
			if(in_array($arr[$i],$gfonts))
				{
				$arr[$i]=ucwords($arr[$i]);
				if($arr[$i]!="") { $my_font=str_replace(" ","+",$arr[$i]); $used_fonts.=$my_font."%7CPT"; }
				$fams.= "'".$arr[$i]."',";
	
	
				$ufont = "";
				$ufont = $arr[$i];
				$ufont_w = "";
	
	
				if( strpos($ufont,':') !== false) 
					{
					$ufonts = explode(":", $ufont);
					$ufont = $ufonts['0'];
					$ufont_w = $ufonts['1']; 
					}
				
				$yfont = str_replace(" ","_", $ufont);
				$yyfont = strtolower( $yfont );
		
				if( isset( $ufont_w ) && $ufont_w != "" && $ufont_w != "regular" )
					{
					$yyfont = $yyfont."_".$ufont_w;
					}
	
				echo ".$yyfont {font-family: '".$ufont."';";
		
				if( isset( $ufont_w ) && $ufont_w != "" && $ufont_w != "regular" )
					{
					echo " font-weight: ".$ufont_w."; ";
					}
		
				echo "} \n";
	
				}
		
			} 
	}

/******/


do_action("sevenleague_before_customstyle");
 
?>





 



/* BEGINN NON AUTO STYLES */

body  {<?php print_option("background-color:", load_option("Body_bgcolor") ,";"); ?> <?php print_option("background-image:url(",load_option("Body_bgimage"),");"); ?> <?php print_option("background-repeat:", load_option("Body_bgimage_repeat") ,";"); ?> <?php print_option("background-position:",  load_option("Body_bgimage_y")." ".load_option("Body_bgimage_x") ,";"); ?><?php if(load_option("Body_bgimage_fix")=="on") { echo "background-attachment:fixed"; } ?> }
body {<?php sevenleague_css_linear_gradient(load_option("Body_bgcolor"),"",load_option("Body_bgcolor2")); ?>}
#page {<?php if( load_option("block_shadow_size")!="" ) { echo "box-shadow:0px 0px ".load_option("block_shadow_size")."px  ".load_option("block_shadow_color")."; -webkit-box-shadow:0px 0px ".load_option("block_shadow_size")."px  ".load_option("block_shadow_color")."; -moz-box-shadow:0px 0px ".load_option("block_shadow_size")."px  ".load_option("block_shadow_color")."; -o-box-shadow:0px 0px ".load_option("block_shadow_size")."px  ".load_option("block_shadow_color").";"; } ?> }
.ui-tabs-nav li a, h3.toggle-trigger, h3.accordion-trigger, .accordion h3 {<?php print_option("font-size:", load_option("Body_fontsize") ,"px;"); ?>}


body  {<?php print_option("color:", load_option("Body_fontcolor") ,";"); ?> <?php print_font("Body_font"); ?><?php print_option("font-size:", load_option("Body_fontsize") ,"px;"); ?>}
a  {<?php print_option("color:",load_option("Body_acolor") ,";"); ?> <?php print_option("text-decoration:", load_option("Body_adecoration") ,"underline;"); ?>}
a:hover {<?php print_option("color:", load_option("Body_ahcolor") ,";"); ?>}
a:visited {<?php print_option("color:", load_option("Body_avcolor") ,";"); ?>}
h1, a h1, h1 a, .tagline, .h1 {<?php print_font("Body_h1_font"); ?> <?php print_option("font-size:", load_option("Body_h1_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Body_h1_fontcolor") ," ;"); ?> <?php print_option("line-height:", load_option("Body_h1_fontsize"),"px;", load_option("Body_h1_fontsize")+6); ?>}
h2, a h2, h2 a, .h2 {<?php print_font("Body_h2_font"); ?> <?php print_option("font-size:", load_option("Body_h2_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Body_h2_fontcolor") ," ;"); ?> <?php print_option("line-height:", load_option("Body_h2_fontsize"),"px;", load_option("Body_h2_fontsize")+6); ?>}
h3, a h3, h3 a, .h3 {<?php print_font("Body_h3_font"); ?> <?php print_option("font-size:", load_option("Body_h3_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Body_h3_fontcolor") ," ;"); ?> <?php print_option("line-height:", load_option("Body_h3_fontsize"),"px;", load_option("Body_h3_fontsize")+6); ?>}
h4, a h4, h4 a, .h4 {<?php print_font("Body_h4_font"); ?> <?php print_option("font-size:", load_option("Body_h4_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Body_h4_fontcolor") ," ;"); ?> <?php print_option("line-height:", load_option("Body_h4_fontsize"),"px;", load_option("Body_h4_fontsize")+6); ?>} 
h5, a h5, h5 a, .h5 {<?php print_font("Body_h5_font"); ?> <?php print_option("font-size:", load_option("Body_h5_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Body_h5_fontcolor") ," ;"); ?> <?php print_option("line-height:", load_option("Body_h5_fontsize"),"px;", load_option("Body_h5_fontsize")+6); ?>}
h6, a h6, h6 a, .h6 {<?php print_font("Body_h6_font"); ?> <?php print_option("font-size:", load_option("Body_h6_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Body_h6_fontcolor") ," ;"); ?> <?php print_option("line-height:", load_option("Body_h6_fontsize"),"px;", load_option("Body_h6_fontsize")+6); ?>}

#overheader { <?php print_option("background-color:", load_option("overhead_bgcolor") ,";"); ?> <?php print_option("background-image:url(",load_option("overhead_bgimage"),");"); ?> <?php print_option("background-repeat:", load_option("overhead_bgimage_repeat") ,";"); ?> <?php print_option("background-position:",  load_option("overhead_bgimage_y")." ".load_option("overhead_bgimage_x") ,";"); ?><?php print_option("color:",load_option("overhead_color"), ";"); ?> }
#overheader {<?php sevenleague_css_linear_gradient(load_option("overhead_bgcolor"),"",load_option("overhead_bgcolor2")); ?>}

#head_line {<?php print_option("background-color:", load_option("Service_bgcolor") ,";"); ?> <?php print_option("background-image:url(",load_option("Service_bgimage"),");"); ?> <?php print_option("background-repeat:", load_option("Service_bgimage_repeat") ,";"); ?> <?php print_option("background-position:",  load_option("Service_bgimage_y")." ".load_option("Service_bgimage_x") ,";"); ?><?php if(load_option("Service_bgimage_fix")=="on") { echo "background-attachment:fixed"; } ?>; } 
#head_line h1, #head_line a h1, #head_line h1 a {<?php print_font("hl_h1_font"); ?> <?php print_option("font-size:", load_option("hl_h1_fontsize"),"px;"); ?> <?php print_option("color:", load_option("hl_h1_fontcolor") ," ;"); ?> <?php print_option("line-height:", load_option("hl_h1_fontsize"),"px;", load_option("hl_h1_fontsize")+6); ?>}
#head_line h2, #head_line h2 a, #head_line a h2 {<?php print_font("hl_h2_font"); ?> <?php print_option("font-size:", load_option("hl_h2_fontsize"),"px;"); ?> <?php print_option("color:", load_option("hl_h2_fontcolor") ," ;"); ?> <?php print_option("line-height:", load_option("hl_h2_fontsize"),"px;", load_option("hl_h2_fontsize")+6); ?>}
 
.element-logo {<?php print_option("margin-top:",load_option("custom_logo_top"),"px;"); ?><?php print_option("margin-bottom:",load_option("custom_logo_bottom"),"px;"); ?>}
#pagename {<?php print_option("margin-top:",load_option("custom_logo_top"),"px;"); ?>}
#pageslogan {<?php print_option("margin-bottom:",load_option("custom_logo_bottom"),"px;"); ?>}

body.has_slider header #menu {<?php print_option("background:",load_option("menu_bgcol"),";"); ?>}

#header, #nav.one_page_fixed { <?php print_option("background-color:", load_option("Navigation_bgcolor") ,";"); ?> <?php print_option("background-image:url(",load_option("Navigation_bgimage"),");"); ?> <?php print_option("background-repeat:", load_option("Navigation_bgimage_repeat") ,";"); ?> <?php print_option("background-position:",  load_option("Navigation_bgimage_y")." ".load_option("Navigation_bgimage_x") ,";"); ?><?php if(load_option("Navigation_bgimage_fix")=="on") { echo "background-attachment:fixed"; } ?>; }
#header {<?php sevenleague_css_linear_gradient(load_option("Navigation_bgcolor"),"",load_option("Navigation_bgcolor2")); ?>}
<?php if( load_option( "header_transparent" ) == "on" ) { ?>
body.has_slider #before_headline {width:100%; position:absolute;}
body.has_slider #headline {z-index:initial;}
<?php } ?>


header .main-menu > li > a, #header_infoline  {<?php print_option("text-shadow: 1px 1px 0px ",load_option("header_text_shadow")," ;"); ?>}

header .main-menu {<?php print_font("menu_font"); ?> <?php print_option("font-size:",load_option("menu_fontsize"),"px;"); ?>}

header#headline.has_menu_description .main-menu > li > a > span {<?php print_option("top:",load_option("menu_fontsize"),"px;"); ?>}
header.logo-left .main-menu > li > a, #headline.logo-left #menu > li > i, header.logo-right .main-menu > li > a, #headline.logo-right #menu > li > i {/* <?php print_option("margin-top:-",load_option("menu_fontsize")/2,"px;"); ?> */}
#headline.logo-left #menu > li > i, #headline.logo-right #menu > li > i {<?php print_option("margin-top:-",load_option("menu_fontsize")/2,"px;"); ?>}

header.main-menu  .current-menu-item, .main-menu .current-menu-parent, .current-page-ancestor {}
header .main-menu li, header .main-menu a,  ul#responsive_menu a, .main-menu a:visited, .cart-contents, .cart-contents:hover {<?php print_option(" color:", load_option("menu_acolor"),"; "); ?>  } 
 
header .main-menu li:hover, header .main-menu li:hover > a {<?php print_option("color: ", load_option("menu_ahcolor"), " ;"); ?>}
header .main-menu ul.sub-menu a {<?php print_option("font-size: ",load_option("menu_sub_fontsize"), "px ;"); ?> <?php print_font("submenu_font");  ?>}
header .main-menu  ul.sub-menu  {<?php print_option("background-color:", load_option("menu_bgsubcolor")," ; "); ?> <?php print_option("line-height:",load_option("menu_line_height"),"px; "); ?> }
.seven_mega_menu {<?php print_option("background-color:", load_option("menu_bgsubcolor")," ; "); ?><?php print_option("color:", load_option("menu_asubcolor")," ; "); ?> } 
ul.sub-menu::before {<?php print_option("border-bottom-color:",load_option("menu_bgsubcolor"),";"); ?>}
header .main-menu  ul.sub-menu li a, header .main-menu  ul.sub-menu li,  ul#responsive_menu li a {<?php print_option("color:", load_option("menu_asubcolor")," ; "); ?> }	

header .seven_mega_menu *, header .seven_mega_menu *:hover, header .seven_mega_menu li, header .main-menu li:hover .seven_mega_menu, header .main-menu li:hover .seven_mega_menu a, header .seven_mega_menu a,  header li:hover .seven_mega_menu li {<?php print_option("color:", load_option("menu_asubcolor")," ; "); ?> }
header .seven_mega_menu {<?php print_option("font-size: ",load_option("menu_sub_fontsize"), "px ;"); ?> <?php print_font("submenu_font");  ?>}

header .main-menu  ul.sub-menu li a:hover {<?php print_option("color:", load_option("menu_ahsubcolor")," ; "); ?> }
header #menu > li:hover {<?php print_option("background-color:",load_option("menu_topbghcolor"), ";"); ?>}
header ul.sub-menu li:hover {<?php print_option("background-color:",load_option("menu_bghsubcolor")," !important;"); ?>}
.mean-container .mean-bar:after {<?php print_option("content:'", load_option("mobilemenu_label"), "';"); ?>}
.mean-container a.meanmenu-reveal span  {<?php print_option("background-color:", load_option("mobilemenu_color"), ";"); ?>}
  
.allslider_overlay1 {<?php print_font("slider_overlay1_font"); ?><?php print_option("line-height:", load_option("slider_overlay1_fontsize"),"px;", load_option("slider_overlay1_fontsize")+6); ?>}
.allslider_overlay2 {<?php print_font("slider_overlay2_font"); ?><?php print_option("line-height:", load_option("slider_overlay2_fontsize"),"px;", load_option("slider_overlay2_fontsize")+6); ?>}
.allslider_overlay3 {<?php print_font("slider_overlay3_font"); ?><?php print_option("line-height:", load_option("slider_overlay3_fontsize"),"px;", load_option("slider_overlay3_fontsize")+6); ?>}


#hero {<?php print_option("background-color:", load_option("Slider_bgcolor") ,";"); ?> <?php print_option("background-image:url(",load_option("Slider_bgimage"),");"); ?> <?php print_option("background-repeat:", load_option("Slider_bgimage_repeat") ,";"); ?> <?php print_option("background-position:",  load_option("Slider_bgimage_y")." ".load_option("Slider_bgimage_x") ,";"); ?><?php if(load_option("Slider_bgimage_fix")=="on") { echo "background-attachment:fixed"; } ?>; } 
<?php if( load_option( "slider_offset" ) != "" ) { echo "#hero + div  {padding-top:".str_replace( "-", "" , load_option( "slider_offset" ) )."px; } "; } ?>
#hero h2, #hero a h2, #hero  h2 a, #hero  .h2 {<?php print_font("slider_h2_font"); ?> <?php print_option("font-size:", load_option("slider_h2_fontsize"),"px;"); ?> <?php print_option("color:", load_option("slider_h2_fontcolor") ," ;"); ?> <?php print_option("line-height:", load_option("slider_h2_fontsize"),"px;", load_option("slider_h2_fontsize")+6); ?>}
#hero h3, #hero a h3, #hero  h3 a, #hero  .h3 {<?php print_font("slider_h3_font"); ?> <?php print_option("font-size:", load_option("slider_h3_fontsize"),"px;"); ?> <?php print_option("color:", load_option("slider_h3_fontcolor") ," ;"); ?> <?php print_option("line-height:", load_option("slider_h3_fontsize"),"px;", load_option("slider_h3_fontsize")+6); ?>}
#hero h2, #hero h3 {<?php print_option("text-shadow: 2px 2px 0px  ", load_option("slider_text_shadow"), ";" ); ?> }
#hero h2 span, #hero h3 span { <?php print_option("background:", load_option("slider_text_background"), ";"); ?>}


#main, .mainsection  {<?php print_option("background-color:", load_option("Main_bgcolor") ,";"); ?> <?php print_option("background-image:url(",load_option("Main_bgimage"),");"); ?> <?php print_option("background-repeat:", load_option("Main_bgimage_repeat") ,";"); ?> <?php print_option("background-position:",  load_option("Main_bgimage_y")." ".load_option("Main_bgimage_x") ,";"); ?><?php if(load_option("Main_bgimage_fix")=="on") { echo "background-attachment:fixed"; } ?> }
#main, .mainsection  {<?php sevenleague_css_linear_gradient(load_option("Main_bgcolor"),"",load_option("Main_bgcolor2")); ?>}
body.has_slider_gradient #hero:after {<?php sevenleague_css_linear_gradient( "rgba(255,255,255,0)" ,"", load_option("Main_bgcolor") ); ?>}


#content  {<?php print_option("color:", load_option("Main_fontcolor") ,";"); ?> <?php print_font("Main_font"); ?><?php print_option("font-size:", load_option("Main_fontsize") ,"px;"); ?>}
#content a  {<?php print_option("color:", load_option("Main_acolor") ,";"); ?> <?php print_option("text-decoration:", load_option("Main_adecoration") ,"underline;"); ?>}
#content a:hover {<?php print_option("color:", load_option("Main_ahcolor") ,";"); ?>}
#content a:visited {<?php print_option("color:", load_option("Main_avcolor") ,";"); ?>}
#content h1, #content a h1, .tagline  {<?php // print_option("background-color:",load_option("Main_h1_bgfontcolor"), ";"); ?><?php print_font("Main_h1_font"); ?> <?php print_option("font-size:", load_option("Main_h1_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Main_h1_fontcolor") ,";"); ?> <?php print_option("line-height:", load_option("Main_h1_fontsize"),"px;", load_option("Main_h1_fontsize")+6); ?>}
#content h1 strong {<?php //  print_option("background-color:",load_option("Main_h1_firstwordbg"),";"); ?><?php // print_option('color:',load_option("Main_h1_firstword"),';'); ?>}
#content h2, #content a h2 {<?php print_font("Main_h2_font"); ?> <?php print_option("font-size:", load_option("Main_h2_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Main_h2_fontcolor") ,";"); ?> <?php print_option("line-height:", load_option("Main_h2_fontsize"),"px;", load_option("Main_h2_fontsize")+6); ?>}

#content h3, #content a h3 {<?php print_font("Main_h3_font"); ?> <?php print_option("font-size:", load_option("Main_h3_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Main_h3_fontcolor") ,";"); ?> <?php print_option("line-height:", load_option("Main_h3_fontsize"),"px;", load_option("Main_h3_fontsize")+6); ?>}
#content h4, #content a h4 {<?php print_font("Main_h4_font"); ?> <?php print_option("font-size:", load_option("Main_h4_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Main_h4_fontcolor") ,";"); ?> <?php print_option("line-height:", load_option("Main_h4_fontsize"),"px;", load_option("Main_h4_fontsize")+6); ?>} 
#content h5, #content a h5 {<?php print_font("Main_h5_font"); ?> <?php print_option("font-size:", load_option("Main_h5_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Main_h5_fontcolor") ,";"); ?> <?php print_option("line-height:", load_option("Main_h5_fontsize"),"px;", load_option("Main_h5_fontsize")+6); ?>}
#content h6, #content a h6 {<?php print_font("Main_h6_font"); ?> <?php print_option("font-size:", load_option("Main_h6_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Main_h6_fontcolor") ,";"); ?> <?php print_option("line-height:", load_option("Main_h6_fontsize"),"px;", load_option("Main_h6_fontsize")+6); ?>}

 
#footer { <?php print_option("background-color: ",load_option("Footer_bgcolor")," ;"); ?><?php print_option("background-image:url(",load_option("Footer_bgimage"),");"); ?> <?php print_option("background-repeat:", load_option("Footer_bgimage_repeat") ,";"); ?> <?php print_option("background-position:",  load_option("Footer_bgimage_y")." ".load_option("Footer_bgimage_x") ,";"); ?><?php if(load_option("Footer_bgimage_fix")=="on") { echo "background-attachment:fixed"; } ?> }
#footer_gradient {<?php print_option("background-color: ",load_option("Footer_bgcolor")," ;"); ?><?php sevenleague_css_linear_gradient(load_option("Footer_bgcolor"),"",load_option("Footer_bgcolor2")); ?>}
 

#footer /* , #footer p, #footer * */ {<?php print_option("color:", load_option("Footer_fontcolor") ,";"); ?> <?php print_font("Footer_font"); ?><?php print_option("font-size:", load_option("Footer_fontsize") ,"px;"); ?>}
#footer a  {<?php print_option("color:", load_option("Footer_acolor") ,";"); ?> <?php print_option("text-decoration:", load_option("Footer_adecoration") ,"underline;"); ?>}
#footer a:hover {<?php print_option("color:", load_option("Footer_ahcolor") ,";"); ?>}
#footer a:visited {<?php print_option("color:", load_option("Footer_avcolor") ,";"); ?>}
#footer h2, #footer a h2 {<?php print_font("Footer_h2_font"); ?> <?php print_option("font-size:", load_option("Footer_h2_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Footer_h2_fontcolor") ,";"); ?> <?php print_option("line-height:", load_option("Footer_h2_fontsize") ,"px;", load_option("Footer_h2_fontsize")+6); ?>}
#footer h3, #footer a h3 {<?php print_font("Footer_h3_font"); ?> <?php print_option("font-size:", load_option("Footer_h3_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Footer_h3_fontcolor") ,";"); ?> <?php print_option("line-height:", load_option("Footer_h3_fontsize") ,"px;", load_option("Footer_h3_fontsize")+6); ?>}
#footer h4, #footer a h4 {<?php print_font("Footer_h4_font"); ?> <?php print_option("font-size:", load_option("Footer_h4_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Footer_h4_fontcolor") ,";"); ?> <?php print_option("line-height:", load_option("Footer_h4_fontsize") ,"px;", load_option("Footer_h4_fontsize")+6); ?>} 
#footer h5, #footer a h5 {<?php print_font("Footer_h5_font"); ?> <?php print_option("font-size:", load_option("Footer_h5_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Footer_h5_fontcolor") ,";"); ?> <?php print_option("line-height:", load_option("Footer_h5_fontsize") ,"px;", load_option("Footer_h5_fontsize")+6); ?>}
#footer h6, #footer a h6 {<?php print_font("Footer_h6_font"); ?> <?php print_option("font-size:", load_option("Footer_h6_fontsize"),"px;"); ?> <?php print_option("color:", load_option("Footer_h6_fontcolor") ,";"); ?> <?php print_option("line-height:", load_option("Footer_h6_fontsize") ,"px;", load_option("Footer_h6_fontsize")+6); ?>}
#footer h3.widget-title {<?php print_option("color:",load_option("Footer_titlecolor")," !important; "); ?> <?php print_option("background-color:",load_option("Footer_titlebg")," !important; "); ?>}

#footer_scroll_top {<?php print_option("line-height:", load_option('height_scrolltop'), 'px' ); ?>}


#secondfooter, #copyright { <?php print_option("background-color:", load_option("secondfooter_bgcolor") ,";"); ?> <?php print_option("background-image:url(",load_option("secondfooter_bgimage"),");"); ?> <?php print_option("background-repeat:", load_option("secondfooter_bgimage_repeat") ,";"); ?> <?php print_option("background-position:",  load_option("secondfooter_bgimage_y")." ".load_option("secondfooter_bgimage_x") ,";"); ?><?php print_option("color:",load_option("secondfooter_color"), ";"); ?> }
#secondfooter, #copyright {<?php sevenleague_css_linear_gradient(load_option("secondfooter_bgcolor"),"",load_option("secondfooter_bgcolor2")); ?>}

#underfooter {<?php print_option("background-image:url(",load_option("uFooter_bgimage"),"); "); ?>}

.callout {<?php print_option("color: ",load_option("Main_h1_fontcolor"), ";"); ?>}
.testimonial-lists-item-shortcode h5::before {<?php print_option("border-left:12px solid ", "transparent"," !important;"); ?> }
.post-count-comments::after {<?php print_option("top:", load_option("Main_h2_fontsize"),"px;", load_option("Main_h2_fontsize")+6); ?>} 
.toggle  h3.box {<?php print_option("color:",load_option("togglebox_color")," !important;"); ?> }
.toggle .box, .toggle .box + div {<?php print_option("background:",load_option("togglebox_bg")," !important;"); ?> <?php print_option("border-color:",load_option("togglebox_border")," !important;"); ?>}
.toggle  h3.color {<?php print_option("color: ",load_option("ctoggle_color")," !important;"); ?>}
.toggle .color  {<?php print_option("background:",load_option("ctoggle_bgcolor")," !important;"); ?> }
.toggle .color + div {<?php print_option("color:",load_option("ctoggle_content_color")," !important;"); ?> <?php print_option("background: ",load_option("ctoggle_content_bg")," !important;"); ?> <?php print_option("border-color:",load_option("ctoggle_bgcolor")," !important;"); ?>}
.accordion   h3.box {<?php print_option("color:",load_option("accordion_font")," !important;"); ?>}
.accordion .box, .accordion .box + div { <?php print_option("background: ",load_option("accordion_bg")," !important; "); ?> <?php print_option("border-color:",load_option("accordion_border")," !important; "); ?>}
::selection {<?php print_option("background-color: ",load_option("selection")," !important"); ?>}
.nivo-header .nivo-controlNav a.active, .cycle-content-navs a.activeSlide {<?php print_option("background:",load_option("scslider_bg")," !important;"); ?>}
.pricing_heading::after {<?php print_option("border-top-color: ", load_option("pricing_bgcolor"),";"); ?>}

<?php if(load_option("dark_spinner")=="on") { ?>.custom_header.wait, .wait {background:url(../../images/wait-dark.gif) center center no-repeat; } <?php } ?>

.cart-contents em:after, a.biggerPhoto, .skillsprogress   { <?php print_option("background-color:",load_option("ui_bgcolor"), ";"); ?><?php print_option("color:",load_option("ui_color"), ";"); ?>} 
#filters a , .pagination a, .pagination span, .page-pagination span, .page-pagination a  {  <?php print_option("color:",load_option("ui_bgcolor"), ";"); ?>} 

/* UI BG */
.flex-direction-nav a, .sc_appointment, .cbp_tmtimeline > li .cbp_tmicon, a.biggerPhoto:before, .div_portfolio_entry .lrs i,  .sc_button.custom, .feature_box > div:first-child,  a.portfolio_entry_bigger_image, .portfolio-img a.biggerPhoto,   .nivo-header .nivo-controlNav a.active, .cycle-content-navs a.activeSlide, #ascrail2000 > div, .nivo-header .nivo-controlNav a:hover, .tagcloud a, .cycle-content-navs a:hover {<?php print_option("background-color:",load_option("ui_bgcolor"), " !important;"); ?><?php print_option("color:",load_option("ui_color"), " !important;"); ?>}
.sc_button.custom:hover {<?php print_option("background-color:",load_option("ui_bgcolor_hover"), " !important;"); ?><?php print_option("color:",load_option("ui_color_hover"), " !important;"); ?>}

.owl-prev, .owl-next, .owl-prev i, .owl-next i {<?php print_option("background-color:",load_option("ui_bgcolor"), " !important;"); ?><?php print_option("color:",load_option("ui_color"), " !important;"); ?>}


.sc_splitheadline_left {<?php print_option("border-color:",load_option("ui_bgcolor"), " ;"); ?>}

 
h1 em, h2 em, h3 em, h4 em, h5 em, h6 em {<?php print_option("background-color:",load_option("ui_bgcolor"), " !important;"); ?><?php print_option("color:",load_option("ui_color"), " !important;"); ?>}
 
.ui-color-as-background {<?php print_option("background-color:",load_option("ui_color"), " !important;"); ?>}
.ui-background-as-color {<?php print_option("color:",load_option("ui_bgcolor"), " !important;"); ?>}

.woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce a.button, .button.alt, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce #content input.button.alt:hover, .woocommerce-page a.button.alt:hover, .woocommerce-page button.button.alt:hover, .woocommerce-page input.button.alt:hover, .woocommerce-page #respond input#submit.alt:hover, .woocommerce-page #content input.button.alt:hover
{
	<?php print_option("background-color:",load_option("ui_bgcolor"), " !important;"); ?><?php print_option("color:",load_option("ui_color"), " !important;"); ?> text-shadow:none !important;
}
.woocommerce-message:before {<?php print_option("background-color:",load_option("ui_bgcolor"), " !important;"); ?>}
.woocommerce-message {<?php print_option("border-top: 3px solid ",load_option("ui_bgcolor"), ";"); ?>}




.title_box .title_box_title, .title_box .title_box_title i { <?php print_option("background-color:",load_option("ui_bgcolor"), ";"); ?>  }
.title_box .title_box_title { <?php print_option("color:",load_option("ui_color"), ";"); ?>  }
.title_box_title, .title_box .title_box_title i  {<?php print_option("background-color:",load_option("ui_color"), ";"); ?>}
.title_box_title, .title_box .title_box_title i  {<?php print_option("color:",load_option("ui_bgcolor"), ";"); ?>}

 h1 strong, h2 strong, h3 strong, h4 strong, h5 strong, h6 strong, .tagline strong, [class*="icon-"], p.contact_widget + span { <?php print_option("color:",load_option("ui_bgcolor"), ";"); ?>  }
 
.callout {<?php print_option("border-left: 4px solid ",load_option("ui_bgcolor"), " ;"); ?>}
 
  
/* FOOTER SCROLLTOP */
#footer_scroll_top {<?php print_option("background-color:",load_option("ui_bgcolor"), ";"); ?><?php print_option("color:",load_option("ui_color"), ";"); ?>}


<?php
do_action("sevenleague_after_customstyle");
?> 