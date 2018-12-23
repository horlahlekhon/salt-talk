<?php
/* VERSION 11022014 */

global $post;

/* IMPORTANT DATA */


$themename = "Express";

$shortname = "express";

update_option($shortname."_theme_shortname",$shortname);

$theme_dir=get_template(); 
 

$bg_default="";


/* PREDEFINES */

$slider=array("Cycle", "Smooth-Slider" , "Cycle-Boxed", "Featured-image" );

$page_templates=array("page-sidebar-left","page-sidebar-right","page-no-sidebar");
 
$socials=array();

$socialdir = "../wp-content/themes/".$theme_dir."/images/".$social_icons_dir; 


$socials = array(
"500px",
"adn",
"amazon",
"android",
"angellist",
"apple",
"behance",
"behance-square",
"bitbucket",
"bitbucket-square",
"bitcoin ",
"black-tie",
"btc",
"buysellads",
"cc-amex",
"cc-diners-club",
"cc-discover",
"cc-jcb",
"cc-mastercard",
"cc-paypal",
"cc-stripe",
"cc-visa",
"chrome",
"codepen",
"connectdevelop",
"contao",
"css3",
"dashcube",
"delicious",
"deviantart",
"digg",
"dribbble",
"dropbox",
"drupal",
"empire",
"expeditedssl",
"facebook",
"facebook-f ",
"facebook-official",
"facebook-square",
"firefox",
"flickr",
"fonticons",
"forumbee",
"foursquare",
"ge ",
"get-pocket",
"gg",
"gg-circle",
"git",
"git-square",
"github",
"github-alt",
"github-square",
"gittip ",
"google",
"google-plus",
"google-plus-square",
"google-wallet",
"gratipay",
"hacker-news",
"houzz",
"html5",
"instagram",
"internet-explorer",
"ioxhost",
"joomla",
"jsfiddle",
"lastfm",
"lastfm-square",
"leanpub",
"linkedin",
"linkedin-square",
"linux",
"maxcdn",
"meanpath",
"medium",
"odnoklassniki",
"odnoklassniki-square",
"opencart",
"openid",
"opera",
"optin-monster",
"pagelines",
"paypal",
"pied-piper",
"pied-piper-alt",
"pinterest",
"pinterest-p",
"pinterest-square",
"qq",
"ra ",
"rebel",
"reddit",
"reddit-square",
"renren",
"safari",
"sellsy",
"share-alt",
"share-alt-square",
"shirtsinbulk",
"simplybuilt",
"skyatlas",
"skype",
"slack",
"slideshare",
"soundcloud",
"spotify",
"stack-exchange",
"stack-overflow",
"steam",
"steam-square",
"stumbleupon",
"stumbleupon-circle",
"tencent-weibo",
"trello",
"tripadvisor",
"tumblr",
"tumblr-square",
"twitch",
"twitter",
"twitter-square",
"viacoin",
"vimeo",
"vimeo-square",
"vine",
"vk",
"wechat ",
"weibo",
"weixin",
"whatsapp",
"wikipedia-w",
"windows",
"wordpress",
"xing",
"xing-square",
"y-combinator",
"y-combinator-square ",
"yahoo",
"yc ",
"yc-square ",
"yelp",
"youtube",
"youtube-play",
"youtube-square",
);


$cssurl=get_template_directory_uri();



$foodr_transparent="transparent";

$sidebars=get_option( $shortname."_sidebars" );

if(isset($sidebars))
	{
	for( $i=0; $i<count($sidebars); $i++ )
		{ 
		$ix=$i+20;
		if(isset($sidebars[$i]))
			{
			if($sidebars[$i]!="")	
				{ 
				$sidebar_names[]=$sidebars[$i];
				$sidebar_ids[]="sidebar-".$ix;	
				}
			}
		} 
	}
 

$logo_default=get_template_directory_uri()."/7league/default/logo.png";

$favicon_default=get_template_directory_uri()."/7league/default/favicon.ico";

 
// ARRAY WITH THE STANDARD FONTS

$fonts=array("Arial", "Times", "Georgia", "Arial Narrow", "Arial Black", "Helvetica", "Tahoma", "Trebuchet Ms", "Verdana", "Anadale Mono", "Courier New", "Comic Sans Ms", "Impact", "");

// BRING TOGETHER THE STANDARD FONTS ARRAY AND THE WEBFONTS ARRAY

if(load_option("disable_webfonts")!="on")
	{
	$fonts=array_merge($fonts,$gfonts);
	}

/* LOAD COLOR PROFILE FROM POST META */

if(isset($_REQUEST['color_profile']) && $_REQUEST['color_profile']!="")
	{
	$color_profile= $_REQUEST['color_profile'];  
	} 

 
if( !is_admin() )
	{

	$pid = url_to_postid( "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] );
 
	if(isset($pid) && $pid!="0")
		{ 
		$custom = get_post_custom($pid);
		}  

	if( isset( $post ) )
		{
		$custom = get_post_custom($post->ID);
		} 

	if(isset($custom["theme_profile"][0]) && $custom["theme_profile"][0]!="")
		{
		$color_profile = $custom["theme_profile"][0];
		} 

 
	}
 

/* ***** */


// IMAGE SIZES





$sevenleague_img_sizes=array(  
	array(
		"name"	=>	"shot",
		"width"	=>	"1200",
		"height" 	=>	"740",
		"crop"	=>	"true",
		),  
	array(
		"name"	=>	"default",
		"width"	=>	"500",
		"height" 	=>	"500",
		"crop"	=>	"true",
		), 
	array(
		"name"	=>	"icon",
		"width"	=>	"100",
		"height" 	=>	"100",
		"crop"	=>	"true",
		),   
	array(
		"name"	=>	"gallery",
		"width"	=>	"600",
		"height" 	=>	"400",
		"crop"	=>	"true",
		),  
	array(
		"name"	=>	"portrait",
		"width"	=>	"500",
		"height" 	=>	"730",
		"crop"	=>	"true",
		),  
	array(
		"name" => "masonry",
		"width"	=>	"500", 
		"crop"	=>	"true",
		),
	);




$animations=array( "flash"," bounce"," shake"," tada"," swing"," wobble"," pulse","  flip"," flipInX"," flipOutX"," flipInY"," flipOutY","  fadeIn","fadeInUp","fadeInDown","fadeInLeft","fadeInRight","fadeInUpBig","fadeInDownBig","fadeInLeftBig","fadeInRightBig"," fadeOut","
fadeOutUp","fadeOutDown","fadeOutLeft","fadeOutRight","fadeOutUpBig","fadeOutDownBig","fadeOutLeftBig","fadeOutRightBig"," slideInDown","slideInLeft","slideInRight","slideOutUp","slideOutLeft","slideOutRight"," bounceIn","bounceInDown","
bounceInUp","bounceInLeft","bounceInRight"," bounceOut","bounceOutDown","bounceOutUp","bounceOutLeft","bounceOutRight"," rotateIn","rotateInDownLeft","rotateInDownRight","rotateInUpLeft","rotateInUpRight"," 
rotateOut","rotateOutDownLeft","rotateOutDownRight","rotateOutUpLeft","rotateOutUpRight"," lightSpeedIn","lightSpeedOut"," hinge","rollIn","rollOut");








$theme_dir=get_template(); 
$social_icons_dir="s_icons"; 
$bg_default="";


/* PREDEFINES */
 


 
$page_templates=array("page-sidebar-left","page-sidebar-right","page-no-sidebar");
  

$cssurl=get_template_directory_uri();



$foodr_transparent="transparent";

	$sidebars=get_option( $shortname."_sidebars" );

if(isset($sidebars))
	{
	for( $i=0; $i<count($sidebars); $i++ )
		{ 
		$ix=$i+20;
		if(isset($sidebars[$i]))
			{
			if($sidebars[$i]!="")	
				{ 
				$sidebar_names[]=$sidebars[$i];
				$sidebar_ids[]="sidebar-".$ix;	
				}
			}
		} 
	}

 
 
// HIDDEN OPTIONS

$hidden_options = array(); 





