var anim=99;
var timeouts = [];
var nonactive=0;
var ease;
var break_animation=1;


function set_anim_out(oid, reason)
	{ 
	"use strict";
	if(break_animation===1)
		{
		break_animation=0; 
		}
	for (var i=0; i<timeouts.length; i++) 
		{
		clearTimeout(timeouts[i]);
		}
	jQuery("#"+oid).find(".map-content").stop();
	jQuery("#"+oid).find(".pin").fadeIn();
	}

function load_map(oid)
	{ 
	"use strict";
	if(break_animation===0)
		{
		break_animation=1;
		}
	var wh=self.innerHeight;	
	var zoom_scala=0; 
	var parentPos = jQuery("#"+oid+' .map-container').offset();
	var childPos = jQuery("#"+oid+' .map-content').offset();
	var mh=0; // jQuery("#headline").height();
	var ab=jQuery("#wpadminbar").height();
	mh=mh+ab; 
	jQuery(".map").removeClass("activeMap");
	jQuery("#"+oid).addClass("activeMap");
	jQuery(function(){
	jQuery("#"+oid+" .map-content").stop().draggable({
		drag: function(event, ui)
			{
			if(break_animation===1)
				{
				set_anim_out(oid,"Drag");
				}			
			var zm=jQuery("#"+oid+" .map_img").height()-jQuery("#"+oid+" .map-container").height();
			var dl=jQuery("#"+oid+" .map_img").width()-jQuery("#"+oid+" .map-container").width();  

			if (ui.position.top > 0)  //parentPos.top-mh)) 
				{
				ui.position.top =0; //( parentPos.top-mh);
				}
			if (ui.position.top < -zm) 
				{
				ui.position.top = -zm;
				}

			if (ui.position.left > 0) // parentPos .left) 
				{
				ui.position.left= 0; // parentPos.left;
				}
			if (ui.position.left < -dl) 
				{
				ui.position.left= -dl;
				}
			},
			scroll: false 
		});
		});
	}


function map_centro(oid)
	{ 
	"use strict"; 
	var wh=self.innerHeight;
	jQuery(".map").animate({"opacity":"0"}).css("z-index","10");
 	jQuery("#"+oid+" .map-container").height(jQuery("#"+oid+ " .map_img").height()); 
 	jQuery(".scroll_bar").jScrollPane();
	var w=jQuery(".map_container_outer").width();
	var i=jQuery("#"+oid+" .map-content").width();
	var h=wh;		
	var j=jQuery("#"+oid+" .map-content").height();
	if(i>w)
		{
		jQuery("#"+oid+" .map-content").css("left","-"+(i-w)/2+"px");
		} 
	jQuery("#"+oid).animate({"opacity":"1"},1000);
	jQuery("#"+oid+" .map-content").animate({"opacity":"1"},1000);
	jQuery("#"+oid).animate({"opacity":"1"}).css("z-index","11");
	
	var new_h=jQuery("#"+oid +" .map-container").height();
	jQuery(".map_container_outer").delay("500").animate({"height": new_h}); 
	}
function reload_map(oid)
	{
	"use strict";
	map_centro(oid);
	load_map(oid);
	}
function change_map_nav(id)
	{
	"use strict";
	jQuery(".mapchanger_"+id).next().hide();
	jQuery(".mapchanger_"+id+" .play_path_span").css("display","inline-block");
	}

function next_map(oid)
	{
//	"use strict";
	if(break_animation===1)
		{
		if(jQuery("#map_"+oid).data("played")==="0")
			{
			jQuery("#map_"+oid).data("played","1");
			}
		if(jQuery("#map_"+oid).next().hasClass("map"))
			{ 
			jQuery(".mapchanger_"+oid).parent().next().find(".mapchanger").trigger("click");
			}
			
		}	
	}

function scroll_path(x,y,dur,oid, fafter, anim, mease)
	{
	"use strict";
	if(mease==='')
		{
		mease="swing";
		}
	if(break_animation===1)
		{
		anim=1;
		var wh=jQuery("#"+oid +" .map_img"); //self.innerHeight;
		var ww=jQuery(".map_container_outer").width();
		var cw=jQuery("#"+oid).find(".map-content").width();
		var ch=jQuery("#"+oid).find(".map-content").height();	
		x=ww-x;
		y=wh-y;
		var noid=oid.replace("_", ""); 
		x=x-(ww/2);
		y=y-(wh/2);

		if(wh-ch>y)
			{
			y=wh-ch;
			}
	y=0;	
		if(ww-cw>x)
			{
			x=ww-cw;
			}
		if(x>0)
			{
			x=0;
			}
		if(y>0)
			{
			y=0;
			} 
		dur=Number(dur);
		jQuery("#"+oid).find(".map-content").animate({"left":x,"top":y},dur, mease, function()
			{
			var a1 = [];
			a1=fafter.split(",");
			for (var i=0,len=a1.length; i<len; i++)
				{ 
				var totop=jQuery("#"+oid).find("#pin_"+noid+"_"+a1[i]).data("piny");
				var toleft=jQuery("#"+oid).find("#pin_"+noid+"_"+a1[i]).data("pinx");
				var t=250*i;
				var pfx=jQuery("#"+oid).find("#pin_"+noid+"_"+a1[i]).data("pinfx");
				if(pfx==="fadein" || pfx==="")
					{
					jQuery("#"+oid).find("#pin_"+noid+"_"+a1[i]).delay(t).fadeIn("100");
					}
				if(pfx==="falldown")
					{
					jQuery("#"+oid).find("#pin_"+noid+"_"+a1[i]).css({"top":totop-100,"display":"block","opacity":"0"}).delay(t).animate({"top":totop, "opacity":"1"});
					}
				if(pfx==="slideup")
					{ 
					jQuery("#"+oid).find("#pin_"+noid+"_"+a1[i]).css({"top":totop+100,"display":"block","opacity":"0"}).delay(t).animate({"top":totop, "opacity":"1"});
					}
				if(pfx==="slideleft")
					{ 
					jQuery("#"+oid).find("#pin_"+noid+"_"+a1[i]).css({"left":toleft-100,"display":"block","opacity":"0"}).delay(t).animate({"left":toleft, "opacity":"1"});
					}
				if(pfx==="slideright")
					{ 
					jQuery("#"+oid).find("#pin_"+noid+"_"+a1[i]).css({"left":toleft+100,"display":"block","opacity":"0"}).delay(t).animate({"left":toleft, "opacity":"1"});
					}
				if(pfx==="popin")
					{ 
					var z=0;
					var zi=0;
					jQuery("#"+oid).find("#pin_"+noid+"_"+a1[i]).addClass("popin_inactive").css({"display":"block","opacity":"0"}).delay(t).animate({opacity:"1",  "marginRight": "0" }, 
						{
						step: function(now,fx) 
							{
							z++;
							zi=z/100;
							if(z>100)
								{
								z=100;	
								}
							jQuery(this).css('-webkit-transform','scale('+zi+')'); 
							jQuery(this).css('-moz-transform','scale('+zi+')'); 
							jQuery(this).css('transform','scale('+zi+')'); 
							},
							duration:700
						},'linear');
					}
				if(pfx==="skrewin")
					{ 
					jQuery("#"+oid).find("#pin_"+noid+"_"+a1[i]).addClass("skrewin_inactive").css({"display":"block","opacity":"0"}).delay(t).animate({opacity:"1",  marginRight: 0 }, 
						{
						step: function(now,fx) 
							{
							jQuery(this).css('-webkit-transform','rotate('+now+'deg)'); 
							jQuery(this).css('-moz-transform','rotate('+now+'deg)'); 
							jQuery(this).css('transform','rotate('+now+'deg)'); 
							},
							duration:1000
						},'linear');
					}
				}	
			});	 
		anim=2;
		}
	}

jQuery(document).ready(function()
	{
	"use strict";
	jQuery(".lights_out .pin").hover(function()
		{
		jQuery(this).parent().find(".map_img").css("opacity","0.5");
		},
			function()
				{
				jQuery(this).parent().find(".map_img").css("opacity","1");
				}
		);
	});