<?php // TESTIMONIAL ENTRY ?>
<div>
<div class="testimonial_entry_content">
	<div class="testimonial_entry_p">
		<div class='testimonial_content'><p><?php echo get_the_content(); ?></p></div>
		<div class="testimonial_entry_img">
	<?php  if ( has_post_thumbnail()) 
		{
		?>
		<?php
		$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'icon');
		if($large_image_url!="")
			{
			?>
			<img src="<?php echo $large_image_url[0]; ?>"  alt=""  />
			<?php
			}
			?> 
		<?php
		}
	?>
		<strong class='testimonial_entry_h3'><?php echo sl_testimonial_single_link(get_the_title()); ?></strong>
		<?php
		if(get_post_custom_values("testimonialName")!="")
			{
			$company=get_post_custom_values("testimonialName");
			echo "<p class='testimonial_entry_h4'>".$company['0']."</p>";
			}
		?>
		</div> 
	<div class="clear"></div>
	</div>
</div> 
</div>









