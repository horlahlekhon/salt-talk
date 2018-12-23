<?php  
wp_enqueue_script( 'smooth' );
global $allslider_settings;
?><!-- elastic slider --> 
<?php if($allslider_settings['smooth_height']!="")
	{ ?>
	<style type="text/css">#smooth_header {height: <?php echo $allslider_settings['smooth_height']; ?>px}</style>
	<?php } ?>
<div id="smoothslider_container" class="nocsl  ">
	<div id="smoothslider" >
		<section id="smooth_header" class="header custom_header smoothslider"> 
				<?php
				$headervalue=get_post_custom_values("slideshow_name");
				$headervalue=$headervalue[0];  
				allslider( $type="smooth", $name=$headervalue, $position="Content");
				?> 
		</section>
	</div>
</div>
        <script type="text/javascript">
        jQuery(document).ready(function($) 
		{
             	jQuery('#smooth_header').smoothDivScroll(
			{
			autoScrollingMode: "onStart",
			autoScrollingInterval: 10,
			autoScrollingStep: 1,
			scrollToAnimationDuration: 1000,
			autoScrollingDirection: "backAndForth",
			});
                	}); 
        </script>
<?php ?>