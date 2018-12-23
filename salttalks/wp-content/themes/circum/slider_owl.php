<?php  
global $allslider_settings;
wp_enqueue_script( 'owlslider' );
?><!-- owl slider -->



<div id="owlslider_container" class="nocsl">
	<div id="owlslider">
		<section id="owlslider_header" class="header custom_header owlslider owl-carousel owl-theme">
			
 <?php
$headervalue=get_post_custom_values("slideshow_name");
$headervalue=$headervalue[0];  
allslider( $type="owl", $name=$headervalue, $position="Content");
?> 
		</section>
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) 
	{
	var owl = $("#owlslider_header"); 
	owl.owlCarousel({
		navigation : true,
		singleItem : true,
		autoHeight : true,
		transitionStyle : '<?php echo $allslider_settings['owl_effect']; ?>',
		autoPlay : <?php if( $allslider_settings['owl_autoplay'] == "on") { echo "true"; } else { echo "false"; } ?>,
		stopOnHover : <?php if( $allslider_settings['owl_ponhover'] == "on") { echo "true"; } else { echo "false"; }  ?>,
		rewindSpeed: <?php echo $allslider_settings['owl_pause']; ?>,
		navigationText : ["",""],
		afterMove: function(elem)
			{
			var that = this;
			jQuery(elem).find("h2, h3").css({"opacity":"0", "marginTop":"-30px"});
			jQuery(elem).find("h2").delay("800").animate({"opacity":"1", "marginTop":"0"},300);
			jQuery(elem).find("h3").delay("950").animate({"opacity":"1", "marginTop":"0"},300);
			jQuery(elem).find("h2").animate({"opactiy":"1"});
			},
		beforeMove: function(elem)
			{
			var ne = this.owl.currentItem;
			jQuery(ne).find("h2").hide();
			},
		});
	});
</script>
<?php ?>