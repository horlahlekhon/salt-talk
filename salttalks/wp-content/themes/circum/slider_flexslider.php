<?php  
global $allslider_settings;
?><!-- flex slider -->
<div id="flexslider_container" class="nocsl">
	<div id="flexslider">
		<section id="flexslider_header" class="header custom_header flexslider">
			
 <?php
$headervalue=get_post_custom_values("slideshow_name");
$headervalue=$headervalue[0];  
allslider( $type="flex", $name=$headervalue, $position="Content");
?> 
		</section>
	</div>
</div>
<script type="text/javascript">
jQuery(window).load(function($) 
	{



	jQuery('#flex_undernav').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 100,
		itemMargin: 15,
 		asNavFor: '#allslider_flex'
  		});




	jQuery('#allslider_flex').flexslider({    
 
		animation: "<?php echo $allslider_settings["flex_fx"]; ?>", 
		smoothHeight: true, 
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		pauseOnHover: <?php if($allslider_settings["flex_ponhover"]=="on") { echo "true"; } else { echo " false" ;} ?>,
		animationSpeed: <?php echo $allslider_settings["flex_speed"]; ?>,
		slideshowSpeed: <?php echo $allslider_settings["flex_interval"]; ?>,
		slideshow: <?php if($allslider_settings["flex_autoplay"]=="on") { echo " true"; } else { echo " false "; } ?>,

		sync: "#flex_undernav",

		});


	});
</script>
<?php ?>