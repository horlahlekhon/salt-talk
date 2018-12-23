<?php  
global $allslider_settings;
?><!-- flex slider -->
<div id="sly_container" class="csl">
	<div id="slyslider_container">
		<section id="sly_header" class="header custom_header slyslider wait"> 
			<div class="frame onepageframe" id="oneperframe">
				<ul id="slyslider" class="template_ul">
 				<?php
				$headervalue=get_post_custom_values("slideshow_name");
				$headervalue=$headervalue[0];  
				allslider( $type="sly", $name=$headervalue, $position="Content");
				?> 
				</ul>
				<div class="nav">
					<a class="prev">PRev</a>	
					<a class="next">Next</a>
				</div>
			</div>
		</section> 
	</div>
<script type="text/javascript">
jQuery(document).ready(function($)
	{
	jQuery("#sly_header").removeClass("wait");
	jQuery(".frame").css({"height":"auto", "opacity":"1"});
	(function () {
		var $frame = $('#oneperframe');
		var $wrap  = $frame.parent(); 
		$frame.sly({
			horizontal: 1,
			itemNav: 'forceCentered',
			smart: 1,
			activateMiddle: 1,
			mouseDragging: 1,
			touchDragging: 1,
			releaseSwing: 1,
			startAt: 1,
			scrollBar: $wrap.find('.scrollbar'),
			scrollBy: 1,
			scrollSource:".frame ul li",
			speed: 300,
			elasticBounds: 1,
			easing: 'easeOutExpo',
			dragHandle: 1,
			dynamicHandle: 1,
			clickBar: 1, 
			prev: $wrap.find('.prev'),
			next: $wrap.find('.next')
			});
		jQuery(window).resize(function()
			{  
 			$frame.sly('reload'); 
			});
		}());
	});
</script>
</div>
<?php ?>