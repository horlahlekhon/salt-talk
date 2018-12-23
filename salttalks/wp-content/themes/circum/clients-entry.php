<?php // team-entry.php 

$custom = get_post_custom($post->ID);  
?><!-- clients-entry -->
<div class="clients_entry_div ">
<?php  if ( has_post_thumbnail()) 
	{	
	$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider');
		?>
		<div class="clients_entry_img">
			<?php sl_clients_single_link('<div style="background:url('.$large_image_url[0].') center center no-repeat;"></div>'); ?>  
		</div>
		<?php
	}
	?>
	<p class='clients_p'><strong class='clients_entry_h3'><?php echo get_the_title(); ?></strong>
		<?php if(get_the_term_list( get_the_ID(), 'team-position', "", "",""))
			{
			?>
			<?php echo "<span>, </span>".get_the_term_list( get_the_ID(), 'team-position', "", ", ",""); ?>
			<?php
			} ?>
	</p>
	<div class="clear"></div>
</div>