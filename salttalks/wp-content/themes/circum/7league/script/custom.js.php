<?php header("Content-type: text/javascript"); ?>
<?php
require_once( '../../../../../wp-load.php' ); global $options;
global $shortname, $options, $post;
?>
var break_animation=1;
 





/*!
 * imagesLoaded PACKAGED v3.0.4
 * https://github.com/desandro/imagesloaded
 * JavaScript is all like "You images are done yet or what?"
 */

(function(){"use strict";function e(){}function t(e,t){for(var n=e.length;n--;)if(e[n].listener===t)return n;return-1}var n=e.prototype;n.getListeners=function(e){var t,n,i=this._getEvents();if("object"==typeof e){t={};for(n in i)i.hasOwnProperty(n)&&e.test(n)&&(t[n]=i[n])}else t=i[e]||(i[e]=[]);return t},n.flattenListeners=function(e){var t,n=[];for(t=0;e.length>t;t+=1)n.push(e[t].listener);return n},n.getListenersAsObject=function(e){var t,n=this.getListeners(e);return n instanceof Array&&(t={},t[e]=n),t||n},n.addListener=function(e,n){var i,r=this.getListenersAsObject(e),o="object"==typeof n;for(i in r)r.hasOwnProperty(i)&&-1===t(r[i],n)&&r[i].push(o?n:{listener:n,once:!1});return this},n.on=n.addListener,n.addOnceListener=function(e,t){return this.addListener(e,{listener:t,once:!0})},n.once=n.addOnceListener,n.defineEvent=function(e){return this.getListeners(e),this},n.defineEvents=function(e){for(var t=0;e.length>t;t+=1)this.defineEvent(e[t]);return this},n.removeListener=function(e,n){var i,r,o=this.getListenersAsObject(e);for(r in o)o.hasOwnProperty(r)&&(i=t(o[r],n),-1!==i&&o[r].splice(i,1));return this},n.off=n.removeListener,n.addListeners=function(e,t){return this.manipulateListeners(!1,e,t)},n.removeListeners=function(e,t){return this.manipulateListeners(!0,e,t)},n.manipulateListeners=function(e,t,n){var i,r,o=e?this.removeListener:this.addListener,s=e?this.removeListeners:this.addListeners;if("object"!=typeof t||t instanceof RegExp)for(i=n.length;i--;)o.call(this,t,n[i]);else for(i in t)t.hasOwnProperty(i)&&(r=t[i])&&("function"==typeof r?o.call(this,i,r):s.call(this,i,r));return this},n.removeEvent=function(e){var t,n=typeof e,i=this._getEvents();if("string"===n)delete i[e];else if("object"===n)for(t in i)i.hasOwnProperty(t)&&e.test(t)&&delete i[t];else delete this._events;return this},n.emitEvent=function(e,t){var n,i,r,o,s=this.getListenersAsObject(e);for(r in s)if(s.hasOwnProperty(r))for(i=s[r].length;i--;)n=s[r][i],o=n.listener.apply(this,t||[]),(o===this._getOnceReturnValue()||n.once===!0)&&this.removeListener(e,s[r][i].listener);return this},n.trigger=n.emitEvent,n.emit=function(e){var t=Array.prototype.slice.call(arguments,1);return this.emitEvent(e,t)},n.setOnceReturnValue=function(e){return this._onceReturnValue=e,this},n._getOnceReturnValue=function(){return this.hasOwnProperty("_onceReturnValue")?this._onceReturnValue:!0},n._getEvents=function(){return this._events||(this._events={})},"function"==typeof define&&define.amd?define(function(){return e}):"undefined"!=typeof module&&module.exports?module.exports=e:this.EventEmitter=e}).call(this),function(e){"use strict";var t=document.documentElement,n=function(){};t.addEventListener?n=function(e,t,n){e.addEventListener(t,n,!1)}:t.attachEvent&&(n=function(t,n,i){t[n+i]=i.handleEvent?function(){var t=e.event;t.target=t.target||t.srcElement,i.handleEvent.call(i,t)}:function(){var n=e.event;n.target=n.target||n.srcElement,i.call(t,n)},t.attachEvent("on"+n,t[n+i])});var i=function(){};t.removeEventListener?i=function(e,t,n){e.removeEventListener(t,n,!1)}:t.detachEvent&&(i=function(e,t,n){e.detachEvent("on"+t,e[t+n]);try{delete e[t+n]}catch(i){e[t+n]=void 0}});var r={bind:n,unbind:i};"function"==typeof define&&define.amd?define(r):e.eventie=r}(this),function(e){"use strict";function t(e,t){for(var n in t)e[n]=t[n];return e}function n(e){return"[object Array]"===c.call(e)}function i(e){var t=[];if(n(e))t=e;else if("number"==typeof e.length)for(var i=0,r=e.length;r>i;i++)t.push(e[i]);else t.push(e);return t}function r(e,n){function r(e,n,s){if(!(this instanceof r))return new r(e,n);"string"==typeof e&&(e=document.querySelectorAll(e)),this.elements=i(e),this.options=t({},this.options),"function"==typeof n?s=n:t(this.options,n),s&&this.on("always",s),this.getImages(),o&&(this.jqDeferred=new o.Deferred);var a=this;setTimeout(function(){a.check()})}function c(e){this.img=e}r.prototype=new e,r.prototype.options={},r.prototype.getImages=function(){this.images=[];for(var e=0,t=this.elements.length;t>e;e++){var n=this.elements[e];"IMG"===n.nodeName&&this.addImage(n);for(var i=n.querySelectorAll("img"),r=0,o=i.length;o>r;r++){var s=i[r];this.addImage(s)}}},r.prototype.addImage=function(e){var t=new c(e);this.images.push(t)},r.prototype.check=function(){function e(e,r){return t.options.debug&&a&&s.log("confirm",e,r),t.progress(e),n++,n===i&&t.complete(),!0}var t=this,n=0,i=this.images.length;if(this.hasAnyBroken=!1,!i)return this.complete(),void 0;for(var r=0;i>r;r++){var o=this.images[r];o.on("confirm",e),o.check()}},r.prototype.progress=function(e){this.hasAnyBroken=this.hasAnyBroken||!e.isLoaded;var t=this;setTimeout(function(){t.emit("progress",t,e),t.jqDeferred&&t.jqDeferred.notify(t,e)})},r.prototype.complete=function(){var e=this.hasAnyBroken?"fail":"done";this.isComplete=!0;var t=this;setTimeout(function(){if(t.emit(e,t),t.emit("always",t),t.jqDeferred){var n=t.hasAnyBroken?"reject":"resolve";t.jqDeferred[n](t)}})},o&&(o.fn.imagesLoaded=function(e,t){var n=new r(this,e,t);return n.jqDeferred.promise(o(this))});var f={};return c.prototype=new e,c.prototype.check=function(){var e=f[this.img.src];if(e)return this.useCached(e),void 0;if(f[this.img.src]=this,this.img.complete&&void 0!==this.img.naturalWidth)return this.confirm(0!==this.img.naturalWidth,"naturalWidth"),void 0;var t=this.proxyImage=new Image;n.bind(t,"load",this),n.bind(t,"error",this),t.src=this.img.src},c.prototype.useCached=function(e){if(e.isConfirmed)this.confirm(e.isLoaded,"cached was confirmed");else{var t=this;e.on("confirm",function(e){return t.confirm(e.isLoaded,"cache emitted confirmed"),!0})}},c.prototype.confirm=function(e,t){this.isConfirmed=!0,this.isLoaded=e,this.emit("confirm",this,t)},c.prototype.handleEvent=function(e){var t="on"+e.type;this[t]&&this[t](e)},c.prototype.onload=function(){this.confirm(!0,"onload"),this.unbindProxyEvents()},c.prototype.onerror=function(){this.confirm(!1,"onerror"),this.unbindProxyEvents()},c.prototype.unbindProxyEvents=function(){n.unbind(this.proxyImage,"load",this),n.unbind(this.proxyImage,"error",this)},r}var o=e.jQuery,s=e.console,a=s!==void 0,c=Object.prototype.toString;"function"==typeof define&&define.amd?define(["eventEmitter/EventEmitter","eventie/eventie"],r):e.imagesLoaded=r(e.EventEmitter,e.eventie)}(window);

 
jQuery("load-img img").wrap("<div class='image-load'>");
jQuery(".load-img img").css("opacity","0");
jQuery(window).load(function()
	{
	"use strict";
	jQuery(".load-img img").animate({opacity:1}).unwrap();
	}); 
jQuery(document).ready(function ($) 
	{
	"use strict";

 	(function(c){c.fn.visible=function(e){var a=c(this),b=c(window),f=b.scrollTop();b=f+b.height();var d=a.offset().top;a=d+a.height();var g=e===true?a:d;return(e===true?d:a)<=b&&g>=f}})(jQuery);  

	jQuery(".responsive_text > *").fitText(1.2);
	


jQuery(".skill, .sc_skill").addClass("bringmein");
	var win = jQuery(window);
	var allMods = jQuery(".bringmein");
	allMods.each(function(i, el) 
		{
		var el = jQuery(el);
		if (el.visible(true)) 
			{ 
			el.addClass("already-visible").removeClass("bringmein"); 
			var te=jQuery(this);
			var newp=te.find(".skillsprogress").data("progress"); 
			te.find(".skillsprogress").animate({"width":newp+"%"},2000, "easeInOutBack");
			}		 
		});
	win.scroll(function(event) 
		{
		var co=0;
		var allMods = jQuery(".bringmein");
		allMods.each(function(i, el) 
			{
			var el = jQuery(el);
			if (el.visible(true)) 
				{
				jQuery(el).each(function()
					{
					var te=jQuery(this);				
					setTimeout(function()
						{ 
						te.removeClass("come-in").removeClass("bringmein").addClass("already-visible"); 
						var newp=te.find(".skillsprogress").data("progress"); 
						te.find(".skillsprogress").animate({"width":newp+"%"},2000, "easeInOutBack");
				 
						},co);
					co=co+100;
					});
				} 
			});
  		});


	jQuery('.quickgallery-3-cols> *:nth-child(3n), .group-itemlist-3 > *:nth-child(3n)').addClass('last');


/* OPEN HIDDEN CONTAINER */

	jQuery("#info_open_contactform").click(function()
		{ 
	 	jQuery('#info_line_map_container, #info_line_search_container').slideUp();
		jQuery("#info_line_contactform_container").slideToggle( 'slow' ).addClass('hidden_container_open');
		});

	jQuery("#info_open_map").click(function()
		{ 
	 	jQuery('#info_line_contactform_container, #info_line_search_container').slideUp();
		jQuery("#info_line_map_container").slideToggle( 'slow' ).addClass('hidden_container_open');
		google.maps.event.trigger(map, 'resize'); 
		jQuery(window).trigger('resize');
		});

	jQuery("#info_open_search").click(function()
		{ 
	 	jQuery('#info_line_map_container, #info_line_contactform_container').slideUp();
		jQuery("#info_line_search_container").slideToggle( 'slow' ).addClass('hidden_container_open');
		});


	jQuery("#menu").meanmenu({'meanMenu':'.menu-main-container'});


	jQuery(function()
		{
		jQuery(".adipoli").adipoli({'startEffect'   : 'transparent','hoverEffect'   : 'boxRandom'});
		});
 
	jQuery(".sc_map_overlay").click(function()
		{
		jQuery(this).remove();
		});

	jQuery("#big_headline_header p").slabText({ "viewportBreakpoint":380});
	jQuery(".slab_text").slabText({ "viewportBreakpoint":380});


	<?php if(load_option("smooth_scroll")=="on")	{ ?>
		jQuery("html").niceScroll(); 
	<?php	} ?>

	jQuery("#pgrid").click(function(){
		jQuery('.portfolio-nav-right').show();		
		jQuery('.item').parent().cycle('destroy');
		jQuery('.item').removeAttr('style');
		jQuery('.cycle-nav-arrows-portfolio').hide();
		jQuery('.item').fadeOut(500,function()
			{
			jQuery('.item').removeClass('portfolio-list').removeClass('portfolio-slider');
			jQuery('.item').addClass('portfolio-grid').css('opacity','1');
			}).fadeIn('500');
		jQuery('.item').css('opacity','1');
		return false;		
		});	
	jQuery("#plist").click(function()
		{
		jQuery('.portfolio-nav-right').show();				
		jQuery('.item').parent().cycle('destroy');
		jQuery('.item').removeAttr('style');
		jQuery('.cycle-nav-arrows-portfolio').hide();	
		jQuery('.item').fadeOut(500, function()
			{
			jQuery('.item').removeClass('portfolio-grid').removeClass('portfolio-slider');
			jQuery('.item').addClass('portfolio-list').css('opacity','1');
			}).fadeIn('500');	
		jQuery('.item').css('opacity','1');
		return false;		
		});
	jQuery("#pslider").click(function()
		{	
		jQuery('.portfolio-nav-right').hide();	
		jQuery('.item').fadeOut(500,function()
			{			
			jQuery('.item').removeClass('portfolio-grid').removeClass('portfolio-list');
			jQuery('.cycle-nav-arrows-portfolio').show();
			jQuery('.item').addClass('portfolio-slider');
			jQuery('.portfolio-slider').parent().cycle({fx:'fade' , prev:    '#cycle-prev',        next:    '#cycle-next', pause:true });	
			}).fadeIn('500');		
		return false;		
		});
	jQuery("a.portfolio-filter").click(function()
		{
		var pgoal=jQuery(this).data("pfilter");
		jQuery(".portfolio-lists-item").animate({"opacity":"1"});
		jQuery(".portfolio-lists-item").not("."+pgoal).animate({"opacity":"0.1"});
		return false;
		});	 

	jQuery(function() 
		{
		jQuery('.portfolio-lists-item').each( function() { jQuery(this).hoverdir(); } );
		});
 

	jQuery(function()
		{
	//	jQuery('.sf-menu').superfish({speed:0, delay:0, speedOut:0, autoArrows:false,animation: {opacity:'show',height:'show'} });
		});
	jQuery(function(){
		jQuery('a.top, a.scroller').click(function()
			{
			jQuery('html, body').animate({scrollTop:0}, 'slow');
			return false;
			});
		});
	jQuery(function() {
		jQuery( ".accordion" ).accordion({autoHeight: 'TRUE' ,navigation: true,collapsible: true, active:false  });
		}); 
	jQuery(function()
		{
		jQuery(".ui-tabs").tabs();
		jQuery(".ui-tabs-slide").tabs();
		});
	jQuery(function()
		{
		jQuery(".ui-tabs-fade").tabs({ fx: {height: 'toggle', opacity:'toggle'  } });
		}); 
	jQuery('.attachment-thumbnail, .attachment-gallery').parent().addClass('prettyPhoto');
	jQuery('.gallery-icon a').addClass('prettyPhoto');
	jQuery(function()
		{
		jQuery("a[rel^='prettyPhoto'], a.prettyPhoto, .gallery a").tosrus(
			{
			caption    : {add        : true, attributes: ["title"]  },
			pagination : {add        : true,      type       : "thumbnails"   },
			drag: true,
			infinite : true,
			}); 	 
		});
	jQuery(function()
		{
		jQuery('#contactForm input#ajaxType').val("ajaxTrue");
		jQuery('#contactForm').ajaxForm(function(responseText) 
			{ 
			if(responseText == 1)
				{
				jQuery("form#contactForm").slideUp();
				jQuery("#success").addClass("alert alert_green").text("<?php echo _e("Thanks, your email was sent successfully.", "sevenleague"); ?> ");
				jQuery("#success").slideDown();
				}
			if(responseText == 2)
				{ 
				jQuery("#success").addClass("alert alert_red").text("<?php echo _e("Sorry, an error occured. Please fill in all details corretly.","sevenleague"); ?>");
				jQuery("#success").slideDown();
				}		
			});  
		jQuery('#contactFormWidget input#ajaxType').val("ajaxTrue");
		jQuery('#contactFormWidget').ajaxForm(function(responseText) 
			{ 
			if(responseText=="1")
				{
				jQuery("form#contactFormWidget").slideUp();
				jQuery("#successWidget").addClass("alert contact_widget_alert_green alert_green").text("<?php echo _e("Thanks, your email was sent successfully.", "sevenleague"); ?> ");
				jQuery("#successWidget").slideDown();
				}
			if(responseText=="2")
				{ 
				jQuery("#successWidget").addClass("alert contact_widget_alert_red alert_red").text("<?php echo _e("Sorry, an error occured. Please fill in all details corretly.","sevenleague"); ?>");
				jQuery("#successWidget").slideDown();
				}	
			});
		});

	/*
	jQuery(".opacity-hover, a[rel^=prettyPhoto] img").hover(function() 
		{
		jQuery(this).stop().animate({opacity: 0.1}, 500); },
		function () 
			{
			jQuery(this).stop().animate({opacity: 1.0}, 500);
			});  
 	*/
 

 
	jQuery("h3.toggle-trigger, h3.accordion-trigger").next().hide();
	jQuery("h3.toggle-trigger-fade").click(function()
		{
		if(jQuery(this).hasClass('toggle-active'))
			{
			jQuery(this).removeClass('toggle-active');
			}
			else
				{
				jQuery(this).addClass('toggle-active');
				}
		jQuery(this).next().fadeToggle(); return false;
		});
	jQuery("h3.toggle-trigger-slide").click(function()
		{
		if(jQuery(this).hasClass('toggle-active'))
			{
			jQuery(this).removeClass('toggle-active');
			}
			else
				{
				jQuery(this).addClass('toggle-active');
				}
		jQuery(this).next().slideToggle(); return false;
		});   
	jQuery('[rel=tooltip], a.tooltip').mouseover(function(e) 
		{     
		var tip = jQuery(this).attr('title');   
		jQuery(this).attr('title','');
		jQuery(this).append('<div id="tooltip"><div class="tipHeader"></div><div class="tipBody">' + tip + '</div><div class="tipFooter"></div></div>');         
		jQuery('#tooltip').css('top', e.pageY +30 );
		jQuery('#tooltip').css('left', e.pageX - 80 );
		jQuery('#tooltip').animate({'marginTop':'-8px', 'opacity':'1'});
		}).mousemove(function(e) 
			{
			//
			}).mouseout(function() 
				{
				jQuery(this).attr('title',jQuery('.tipBody').html());
				jQuery(this).children('div#tooltip').remove();         
		});   
	jQuery("#main img, ul#menu > li > a, ul#menu_2 > li > a").removeAttr("title");

	jQuery("#cycle-nav-2").fadeIn();
	jQuery(".slideshow_cycle").hover(function()
		{
		jQuery("#cycle-nav-2").fadeIn(),function slideshow_fade_out()
			{
			jQuery("#cycle-nav-2").fadeOut();
			}
		});
   

 




 	jQuery('input#submit').addClass('sc_button <?php echo load_option("primary_button"); ?> medium square');



	setTimeout(function() { jQuery(".scrollableArea").css("width",jQuery(".scrollableArea").width()+2+"px");},1000);
  


	jQuery('.one_page_menu a').click(function()
		{
		var pageclass = jQuery('#layout').attr('class');
 
		if( pageclass === 'block' ) 
			{
			var hheight = jQuery('#headline').height();
			var nheight = jQuery("#navleft").height();
			}
			else if( pageclass == 'full-width' )
				{
				var hheight = jQuery('#headline').height();
				var nheight = jQuery("#navleft").height();
				}
				else
					{
					var hheight = 0;
					var nheight = 130;
					}

		var linkgoal = jQuery('[name="' + $.attr(this, 'href').substr(1) + '"]').offset().top;
		
		linkgoal = linkgoal - nheight - hheight;		
		var top = jQuery(document).scrollTop(); 
		var togo = linkgoal - top;
		var aspeed = togo / 2000;
		aspeed = aspeed * 1000; 	
		var nspeed = aspeed.toString();	
		var nspeed = nspeed.replace("-" , " ");
		var nspeed = parseInt(nspeed);  

		jQuery('html, body').animate(
			{
			scrollTop: linkgoal
			}, nspeed, 'swing');

		return false; 
		});

<?php if( load_option( 'show_scrolltop') == 'on' )	
	{
	?>

	var sc_h = jQuery(window).height();
	var d_h = jQuery(document).height();
	if( d_h > sc_h )
		{
		jQuery(window).scroll(function(event)
			{ 

			var ftop = jQuery("body").scrollTop() * 2; 
			if( ftop > sc_h )
				{
				jQuery("#footer_scroll_top, .scroll_top").fadeIn();
				}
				else
					{
					jQuery("#footer_scroll_top, .scroll_top").fadeOut();
					}
			});

		jQuery("#footer_scroll_top, .scroll_top").click(function()
			{
			var topSpeed = d_h / sc_h ;
			topSpeed = topSpeed * 300; 
			jQuery("html, body").animate({scrollTop:0}, topSpeed);
			});


		}

	<?php } ?>



<?php if( load_option( "fixed_menu" ) == "on" && load_option( 'layout' ) == 'block' OR  load_option('layout') == 'full-width'  && load_option( 'fixed_menu' ) == 'on' ) { ?>
 
	<?php if( load_option( 'layout' ) != 'sidenav' && load_option( 'layout' ) != 'sidenavright' ) { ?>

		var navtop = jQuery("#navleft").offset().top;  

		jQuery(window).scroll(function(event) 
			{
			if( jQuery(window).scrollTop()>navtop )
				{
				var hwidth = jQuery('#headline').width();
				jQuery('#nav').addClass('one_page_fixed');
				}
			if( jQuery(window).scrollTop()<navtop )
				{				
				jQuery('#nav').removeClass('one_page_fixed');
				}
			}); 


	<?php } ?>

<?php } ?>
 



jQuery(function($)
	{	
	var items = $('#portfolio li'),
		itemsByTags = {};
	items.each(function(i)
		{
		var elem = $(this),
		tags = elem.data('tags').split(',');
		elem.attr('data-id',i);		
		$.each(tags,function(key,value)
			{
			value = $.trim(value);			
			if(!(value in itemsByTags))
				{
				itemsByTags[value] = [];
				}
			itemsByTags[value].push(elem);
			});	
		});
	createList('All',items);
	$.each(itemsByTags,function(k,v)
		{
		createList(k,v);
		});	
	$('#filter a').live('click',function(e)
		{
		var link = $(this);		
		link.addClass('active').siblings().removeClass('active');
		$('#portfolio').quicksand(link.data('list').find('li'));
		e.preventDefault();
		});
	$('#filter a:first').click();
	function createList(text,items)
		{  
		var ul = $('<ul>',{'class':'hidden'});		
		$.each(items,function()
			{
			$(this).clone().appendTo(ul);
			});
		ul.appendTo('#container');
		var a = $('<a>',
			{
			'class': 'sc_button <?php echo load_option("primary_button"); ?> small square',
			html: text,
			href:'#',
			data: {list:ul}
			}).appendTo('#filter');
		}
	}); 




	jQuery("#open_loc").click(function()
		{ 
		jQuery(this).parent().toggleClass('active');
		jQuery("#info_map").toggleClass('activeMap');
		});

	jQuery(".responsive_video").fitVids();



	(function(c){c.fn.visible=function(e){var a=c(this),b=c(window),f=b.scrollTop();b=f+b.height();var d=a.offset().top;a=d+a.height();var g=e===true?a:d;return(e===true?d:a)<=b&&g>=f}})(jQuery);
 
	var win = jQuery(window);
	var allMods = jQuery(".bringmein");
	allMods.each(function(i, el) 
		{
		var el = jQuery(el);
		var effect="";
		effect=jQuery(this).data("animation");
		if (el.visible(true)) 
			{
			el.addClass("already-visible animated " + effect).removeClass("bringmein"); 
			}		 
		});
	win.scroll(function(event) 
		{
		var co=0;
		var allMods = jQuery(".bringmein");
		allMods.each(function(i, el) 
			{
			var el = jQuery(el);
			var effect="";
			effect=jQuery(this).data("animation");
			if (el.visible(true)) 
				{
				jQuery(el).each(function()
					{
					var te=jQuery(this);				
					setTimeout(function()
						{ 
						te.removeClass("come-in").removeClass("bringmein").addClass("already-visible animated " + effect); 				 
						},co);
					co=co+100;
					});
				} 
			});
  		});




	});	// FINAL JQUERY CLOSE


<?php 
if(load_option("page_transition")=="on")
	{
?>
	jQuery(document).ready(function($)
		{
		jQuery('body, html').css('display', 'none');
		jQuery('body, html').fadeIn(1000);
		jQuery('a').click(function(event) 
			{
			event.preventDefault();
			var newLocation = jQuery(this).attr('href').split('#')[0];
			if(newLocation != '')
				{
				jQuery('html').addClass('transition_in_atto');
				jQuery('body').fadeOut(2000, newpage(newLocation));
				} 
			});
		function newpage(newLocation) 
			{ 
			window.location = newLocation;
			}
		}); 
	<?php
	}
	?>




jQuery(window).load(function() 
	{ 

	jQuery("body").addClass("loaded");

	jQuery("#info_news_rotator").cycle({ fx:    'scrollLeft' });

	jQuery(".room_slideshow").each(function()
		{
		var ht = jQuery(this).find("img").height();
		var $this = jQuery(this);		
		$this.removeClass("wait").addClass("cycle_loaded");
		$this.css({height: ht},500);
		
		$this.cycle({
			'prev'		:	$this.parent().parent().find(".room_prev"), //+.room_prev',
			'next'		:	$this.parent().parent().find(".room_next"), //$(this)+'.room_next',
			'pager'		:	$this.parent().parent().find('.roomslider_nav'),   
			slideResize	:	true,
			containerResize	: 	true,
			width		:	'100%',
			height		:	'auto',
			fit		:	1,    
			after		:	slideSlider,
			'pagerAnchorBuilder': pagerImages 
		    	});
		$this.cycle('pause');
		});

	function pagerImages(idx, slide) 
		{
		var sl=jQuery(slide).data("slicon");
		return '<li><a href="#"><img src="' + sl + '"    /></a></li>';
		}   

	function slideSlider(oldSlide,slide)
		{ 
		var ht = jQuery(slide).find('img').height();
		if(ht)
			{
			jQuery(slide).parent().animate({height: ht});
			}
		}

 
	jQuery(window).resize(function()
		{
		jQuery(".room_slideshow").each(function()
			{
			var $this = jQuery(this);
			var ht = jQuery(this).find("img").height();  
			if(ht!=0)
				{
				jQuery(this).css({height: ht},500);
				}
			});
		});






	 jQuery('.cycle_slider_sc').each(function()
		{
		var tout = jQuery(this).data('pause'); 
	 	jQuery(this).cycle({
			timeout: tout,  
			'prev'	:	'.cycle_prev',
			'next'	:	'.cycle_next',     
    			after	: 	function (){
						jQuery(this).parent().animate({"height": jQuery(this).outerHeight()});
     						},   
			});
		}); 
	 jQuery('.cycle_slider_sc').hover(
		function()
			{
			jQuery(this).cycle('pause');   
			},
			function()
				{
				jQuery(this).cycle('resume'); 
				}); 











	"use strict"; 
 
	var filter = '';
	var handler;
	var options = 
		{
		autoResize: true, 
		container: jQuery('#masonry'), 
		offset: 10,
		outerOffset: 0,
		};
	var refresh = function() 
		{ 
		if(handler) 
			{ 
			handler = null;
			}         
		jQuery('#tiles li').addClass('inactive');         
		handler = jQuery(filter);
		handler.removeClass("inactive");     
   
		var coffset = jQuery('#masonry').data('offset');

		if( coffset !="" ) {

			options.offset = coffset;

			}

		handler.wookmark(options);

		jQuery("#filter li:first-child").trigger("click");
		};
       
	var updateFilters = function() 
		{
		var oldFilter = filter;
		filter = '';
		var filters = [];
		var lis = jQuery('#filters li');
		var i=0, length=lis.length, li;
		for(; i<length; i++) 
			{
			li = jQuery(lis[i]);
			if(li.hasClass('active')) 
				{
				filters.push('#tiles li.'+li.attr('data-filter'));
				}
			}
		if(filters.length === 0) 
			{
			filters.push('#tiles li');
			}
		filter = filters.join(', ');
		if(oldFilter !== filter) 
			{
			refresh();
			}
		};
      
	var onClickFilter = function(event) 
		{
		var item = jQuery(event.currentTarget);
		jQuery('#filters li').removeClass('active');
		item.toggleClass('active');
		updateFilters();
		return false;
		};
      
	jQuery('#filters li').click(onClickFilter);
	updateFilters();
	return false; 
    }); 




<?php echo stripslashes(load_option("extra_js")); ?>
<?php
// HOOK SOME ACTIONS 
do_action("sevenleague_custom_js");
?>