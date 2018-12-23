<?php  
global $allslider_settings;
?><!-- flex slider -->
<div id="cycle_container" class="boxed_slider"> 
	<div id="cycleslider" class="inner">
		<section id="cycle_header" class="header custom_header cycleslider wait"> 
 			<?php
			$headervalue=get_post_custom_values("slideshow_name");
			$headervalue=$headervalue[0];  
			allslider( $type="cycle", $name=$headervalue, $position="Content");
			?> 
		</section> 
	</div>
</div>
<?php ?>