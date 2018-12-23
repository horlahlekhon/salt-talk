<?php  
global $allslider_settings;
?><!-- image header -->
 
<div id="imagehader_container" class="csl custom_header ">
	<div id="featured_image">
		<section id="image_header" class="header  imageheader"> 
			<?php
			if(has_post_thumbnail())
				{
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'original' ); 
				?>
				<img src='<?php echo $image['0']; ?>' alt='' />
				<?php
				if(get_post_thumbnail_caption()!="")
					{
					echo get_post_thumbnail_caption();
					}
				if(get_post_thumbnail_description()!="")
					{
					echo get_post_thumbnail_description();
					}
				}
				else
					{
					echo "<div class='error'>Please set a featured image to this post or chance your slider</div>";
					}
			?>
		</section>
	</div>
</div>
 
<?php ?>