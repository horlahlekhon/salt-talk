<?php


/* REMOVE DEFAULT WORDPRESS IMAGE SIZES */

function sevenleague_filter_image_sizes( $sizes) {
		
	unset( $sizes['thumbnail']);
	unset( $sizes['medium']);
	unset( $sizes['large']);
	
	return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'sevenleague_filter_image_sizes');













if ( function_exists( 'add_theme_support' ) ) 
	{ 
	global $sevenleague_img_sizes;
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 100, 100, true );
	
	foreach($sevenleague_img_sizes as $size)
		{
		if(isset($size['name']))
			{
			$size = shortcode_atts(array(
				'name' 	=>	'unset',
				'width'	=>	'',
				'height'	=>	'',	
				'crop'	=>	''			
				), $size);
			add_image_size($size['name'], $size['width'], $size['height'], $size['crop']);
			}
		}
	if(load_option("image_sizes")!="")	
		{
		$vals=load_option("image_sizes"); 
		}
	if(isset($vals) && is_array($vals))
		{ 
		for($i=0; $i<count($vals); $i++)
			{
			if($vals[$i]!="")
				{  
				$v=explode("|",$vals[$i]);
				add_image_size($v[0], $v[1], $v[2],"true");
				}
			}
		}  
	}  



function sevenleague_show_imagesizes()
	{
	global $_wp_additional_image_sizes;
	foreach ($_wp_additional_image_sizes as $size_name => $size_attrs): 
    		$ret1[]= $size_name;  
	endforeach;	
	return  $ret1;  
	} 

 



function sevenleague_show_image_sizes($sizes) {
	global $sevenleague_img_sizes; 
	foreach($sevenleague_img_sizes as $size)
		{
		$name=$size['name'];
		$sizes[$name]=$name;
		}  
	if(load_option("image_sizes")!="")	
		{
		$vals=load_option("image_sizes"); 
		}
	if(isset($vals) && is_array($vals))
		{ 
		for($i=0; $i<count($vals); $i++)
			{
			if($vals[$i]!="")
				{  
				$v=explode("|",$vals[$i]);
				$name=$v[0];
				$sizes[$name]=$name;
				}
			}
		}  
    	return $sizes;
	}
add_filter('image_size_names_choose', 'sevenleague_show_image_sizes');

 
 
function sevenleague_image_url($postid, $size)
	{ 
	$image_id = get_post_thumbnail_id($postid);
	$image_url = wp_get_attachment_image_src($image_id, $size);
	return $image_url[0];
	} 
 





function img_original_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'original'); 
	return  $image_url[0];  
	}
function img_mini_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'mini'); 
	return  $image_url[0];  
	}
function img_default_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'default'); 
	return  $image_url[0];  
	}
function img_icon_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'icon'); 
	return  $image_url[0];  
	}
function img_main_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'screen-shot'); 
	return  $image_url[0];  
	}
function img_slider_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'slider'); 
	return  $image_url[0];  
	}
function img_gallery_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'gallery'); 
	return  $image_url[0];  
	}
function img_panorama_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'panorama'); 
	return  $image_url[0];  
	}
function img_slideshow_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'slideshow'); 
	return  $image_url[0];  
	}
function img_screenshot_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'screen-shot'); 
	return  $image_url[0];  
	}
function img_full_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'full'); 
	return  $image_url[0];  
	}
function img_portfolio_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'portfolio'); 
	return  $image_url[0];  
	}
function img_masonry_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'masonry'); 
	return  $image_url[0];  
	}
function img_thumbnail_url($pid)
	{	
	$image_id = get_post_thumbnail_id($pid); 	
	$image_url = wp_get_attachment_image_src($image_id,'thumbnail'); 
	return  $image_url[0];  
	}