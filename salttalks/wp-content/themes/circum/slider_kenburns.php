<?php  
global $allslider_settings;
?><!-- flex slider -->
<div id="kenburns_container">
	<div id="kenburnsslider" >
		<section id="kenburns_header" class="header custom_header kenburns"> 
 			<?php
			$headervalue=get_post_custom_values("slideshow_name");
			$headervalue=$headervalue[0];  
			allslider( $type="kenburns", $name=$headervalue, $position="Content");
			?> 
		</section>  
	</div>
</div>
<?php ?>