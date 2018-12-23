<?php   
$custom = get_post_custom($post->ID);  
	
?><!-- image header -->
 
<div id="custom_header_container" class="csl custom_header ">
	<?php echo do_shortcode( stripslashes ( $custom["custom_header_content"][0] ) ); ?>
</div>
 
<?php ?>