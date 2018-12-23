<?php
	$slider_shadows=array("Type-1","Type-2","Type-3","Type-4","Type-5","Type-6","Type-7","Type-8","Type-10","Type-11","Type-12","Type-13","Type-14","Type-15");
	$cycle_effects=array("blindX","blindY","blindZ","cover","curtainX","curtainY","fade","fadeZoom","growX","growY","none","scrollUp","scrollDown","scrollLeft","scrollRight","scrollHorz","scrollVert","shuffle","slideX","slideY","toss","turnUp","turnDown","turnLeft","turnRight","uncover","wipe","zoom");
	$bgfx=array("0"=>"No","1"=>"Fade","2"=>"Slide from Top","3"=>"Slide from the right Side","4"=>"Slide from the bottom","5"=>"Slide from the left side","6"=>"Carousel right","7"=>"Carousel left");

	$owl_effects = array("fade","backSlide","goDown","fadeUp");

$allslider=array(
		array(
		"type"	=>	"tab",
		"name"	=>	"Cycle Slider",
		),
/* CYCLE SLIDER */
		array(
		"type"	=>	"title",
		"name"	=>	"Cycle slider",
		),
		array(
		"type"	=>	"text",
		"name"	=>	"Timeout",
		"std"	=>	"3000",
		"id"	=>	"cycle_timeout",
		"desc"	=>	"The pause between two changes",
		),
		array(
		"type"	=>	"text",
		"name"	=>	"Speed",
		"std"	=>	"1000",
		"id"	=>	"cycle_speed",
		"desc"	=>	"The animationspeed in millisecondes",
		),
		array(
		"type"	=>	"checkbox",
		"name"	=>	"Pause on Mouseover",
		"std"	=>	"on",
		"id"	=>	"cycle_ponhover",
		"desc"	=>	"Stop the slideshow while mouseover?",
		),
		array(
		"type"	=>	"checkbox",
		"name"	=>	"Slider Autostart",
		"std"	=>	"on",
		"id"	=>	"cycle_autostart",
		"desc"	=>	"Start the slideshow after pageload?",
		),
		array(
		"type"	=>	"dropdown",
		"value"	=>	$cycle_effects,
		"std"	=>	"fade",
		"name"	=>	"Slideshow effect",
		"id"	=>	"cycle_fx",
		"desc"	=>	"The effect for the slider",
		),
/* FLEXSLIDER */	 
/*
		array(
		"type"	=>	"tab",
		"name"	=>	"Flex Slider",
		),
		array(
		"type"	=>	"title",
		"name"	=>	"Flex slider",
		),
		array(
		"type"	=>	"dropdown",
		"value"	=>	array("slide","fade","none"),
		"std"	=>	"fade",
		"name"	=>	"Slideshow effect",
		"id"	=>	"flex_fx",
		"desc"	=>	"The effect for the slider",
		),
		array(
		"type"	=>	"text",
		"std"	=>	"3000",
		"id"	=>	"flex_interval",
		"name"	=>	"Flexslider interval",
		"desc"	=>	"The time between the changes"
		),
		array(
		"type"	=>	"checkbox",
		"name"	=>	"Pause on Mouseover",
		"id"	=>	"flex_ponhover",
		"desc"	=>	"Stop the slider while mouseover",
		"std"	=>	"on",
		),
		array(
		"type"	=>	"checkbox",
		"name"	=>	"Autoplay",
		"id"	=>	"flex_autoplay",
		"std"	=>	"on",
		"desc"	=>	"Start the slideshow on Pageload",
		),
		array(
		"type"	=>	"text",
		"id"	=>	"flex_speed",
		"name"	=>	"Slideshow Speed",
		"desc"	=>	"The speed in Millisecondes for the animation",
		"std"	=>	"500"
		), 
*/
/* SMOOTHSLIDER */	 
		array(
		"type"	=>	"tab",
		"name"	=>	"Smooth Slider",
		),
		array(
		"type"	=>	"title",
		"name"	=>	"Smooth slider",
		), 
		array(
		"type"	=>	"text",
		"std"	=>	"700",
		"id"	=>	"smooth_height",
		"name"	=>	"Height",
		"desc"	=>	"The height of the Smooth Slider"
		), 
	
/* OWL SLIDER */	  
		array(
		"type"	=>	"tab",
		"name"	=>	"Owl Slider",
		),
		array(
		"type"	=>	"title",
		"name"	=>	"Owl slider",
		), 
		array(
		"type"	=>	"dropdown",
		"value"	=>	$owl_effects,
		"std"	=>	"fade",
		"name"	=>	"Slideshow effect",
		"id"	=>	"owl_effect",
		"desc"	=>	"The effect for the slider",
		), 

		array(
		"type"	=>	"checkbox",
		"name"	=>	"Autoplay",
		"std"	=>	"on",
		"id"	=>	"owl_autoplay",
		"desc"	=>	"Start the slider on pageload?",
		),

		array(
		"type"	=>	"checkbox",
		"name"	=>	"Pause on Mouseover",
		"std"	=>	"on",
		"id"	=>	"owl_ponhover",
		"desc"	=>	"Stop the slideshow while mouseover?",
		),

		array(
		"type"	=>	"text",
		"std"	=>	"2500",
		"id"	=>	"owl_pause",
		"name"	=>	"Pause",
		"desc"	=>	"Pause after each slider in milliseconds (only for autoplay)"
		),  

/* KEN BURNS SLIDER */
		array(
		"type"	=>	"tab",
		"name"	=>	"Ken Burns Slider",
		),
		array(
		"type"	=>	"title",
		"name"	=>	"Ken Burns slider",
		), 
		array(
		"type"	=>	"text",
		"std"	=>	"8000",
		"id"	=>	"kbduration",
		"name"	=>	"Duration",
		"desc"	=>	"The duration for each slide",
		),
		array(
		"type"	=>	"text",
		"std"	=>	"1200",
		"id"	=>	"kbfadespeed",
		"name"	=>	"Speed",
		"desc"	=>	"The speed for the animation effect",
		),
		array(
		"type"	=>	"text",
		"std"	=>	"0.75",
		"id"	=>	"kbscale",
		"name"	=>	"Scale",
		"desc"	=>	"The scale factor for the Ken Burns effect, a number from 0 to 1, default is 0.75",
		),
	);
 