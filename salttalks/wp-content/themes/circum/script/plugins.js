/*! jQuery slabtext plugin v2.2 MIT/GPL2 @freqdec */
(function($){$.fn.slabText=function(options){var settings={fontRatio:0.78,forceNewCharCount:true,wrapAmpersand:true,headerBreakpoint:null,viewportBreakpoint:null,noResizeEvent:false,resizeThrottleTime:300,maxFontSize:999,postTweak:true,precision:3,minCharsPerLine:0};$("body").addClass("slabtexted");return this.each(function(){if(options){$.extend(settings,options);}var $this=$(this),keepSpans=$("span.slabtext",$this).length,words=keepSpans?[]:String($.trim($this.text())).replace(/\s{2,}/g," ").split(" "),origFontSize=null,idealCharPerLine=null,fontRatio=settings.fontRatio,forceNewCharCount=settings.forceNewCharCount,headerBreakpoint=settings.headerBreakpoint,viewportBreakpoint=settings.viewportBreakpoint,postTweak=settings.postTweak,precision=settings.precision,resizeThrottleTime=settings.resizeThrottleTime,minCharsPerLine=settings.minCharsPerLine,resizeThrottle=null,viewportWidth=$(window).width(),headLink=$this.find("a:first").attr("href")||$this.attr("href"),linkTitle=headLink?$this.find("a:first").attr("title"):"";if(!keepSpans&&minCharsPerLine&&words.join(" ").length<minCharsPerLine){return;}var grabPixelFontSize=function(){var dummy=jQuery('<div style="display:none;font-size:1em;margin:0;padding:0;height:auto;line-height:1;border:0;">&nbsp;</div>').appendTo($this),emH=dummy.height();dummy.remove();return emH;};var resizeSlabs=function resizeSlabs(){var parentWidth=$this.width(),fs;$this.removeClass("slabtextdone slabtextinactive");if(viewportBreakpoint&&viewportBreakpoint>viewportWidth||headerBreakpoint&&headerBreakpoint>parentWidth){$this.addClass("slabtextinactive");return;}fs=grabPixelFontSize();if(!keepSpans&&(forceNewCharCount||fs!=origFontSize)){origFontSize=fs;var newCharPerLine=Math.min(60,Math.floor(parentWidth/(origFontSize*fontRatio))),wordIndex=0,lineText=[],counter=0,preText="",postText="",finalText="",slice,preDiff,postDiff;if(newCharPerLine!=idealCharPerLine){idealCharPerLine=newCharPerLine;while(wordIndex<words.length){postText="";while(postText.length<idealCharPerLine){preText=postText;postText+=words[wordIndex]+" ";if(++wordIndex>=words.length){break;}}if(minCharsPerLine){slice=words.slice(wordIndex).join(" ");if(slice.length<minCharsPerLine){postText+=slice;preText=postText;wordIndex=words.length+2;}}preDiff=idealCharPerLine-preText.length;postDiff=postText.length-idealCharPerLine;if((preDiff<postDiff)&&(preText.length>=(minCharsPerLine||2))){finalText=preText;wordIndex--;}else{finalText=postText;}finalText=$("<div/>").text(finalText).html();if(settings.wrapAmpersand){finalText=finalText.replace(/&amp;/g,'<span class="amp">&amp;</span>');}finalText=$.trim(finalText);lineText.push('<span class="slabtext">'+finalText+"</span>");}$this.html(lineText.join(" "));if(headLink){$this.wrapInner('<a href="'+headLink+'" '+(linkTitle?'title="'+linkTitle+'" ':"")+"/>");}}}else{origFontSize=fs;}$("span.slabtext",$this).each(function(){var $span=$(this),innerText=$span.text(),wordSpacing=innerText.split(" ").length>1,diff,ratio,fontSize;if(postTweak){$span.css({"word-spacing":0,"letter-spacing":0});}ratio=parentWidth/$span.width();fontSize=parseFloat(this.style.fontSize)||origFontSize;$span.css("font-size",Math.min((fontSize*ratio).toFixed(precision),settings.maxFontSize)+"px");diff=!!postTweak?parentWidth-$span.width():false;if(diff){$span.css((wordSpacing?"word":"letter")+"-spacing",(diff/(wordSpacing?innerText.split(" ").length-1:innerText.length)).toFixed(precision)+"px");}});$this.addClass("slabtextdone");};resizeSlabs();if(!settings.noResizeEvent){$(window).resize(function(){if($(window).width()==viewportWidth){return;}viewportWidth=$(window).width();clearTimeout(resizeThrottle);resizeThrottle=setTimeout(resizeSlabs,resizeThrottleTime);});}});};})(jQuery);

/* SCROLL */ 

function k() { if (document.body) { var a = document.body, b = document.documentElement, c = window.innerHeight, d = a.scrollHeight; m = 0 <= document.compatMode.indexOf("CSS") ? b : a; p = a; r = !0; top != self ? s = !0 : d > c && (a.offsetHeight <= c || b.offsetHeight <= c) && (m.style.height = "auto", m.offsetHeight <= c && (c = document.createElement("div"), c.style.clear = "both", a.appendChild(c))); t || (a.style.backgroundAttachment = "scroll", b.style.backgroundAttachment = "scroll"); v && window.addEventListener("keydown", w, !1) } }
function x(a, b, c) {
    var d; d || (d = 1E3); y(b, c); z.push({ x: b, y: c, a: 0 > b ? 0.99 : -0.99, b: 0 > c ? 0.99 : -0.99, start: +new Date }); if (!A) {
        var e = function () {
            for (var u = +new Date, l = 0, q = 0, n = 0; n < z.length; n++) { var f = z[n], g = u - f.start, C = g >= B, h = C ? 1 : g / B; D && (g = h, 1 <= g ? h = 1 : 0 >= g ? h = 0 : (1 == E && (E /= F(1)), h = F(g))); g = f.x * h - f.a >> 0; h = f.y * h - f.b >> 0; l += g; q += h; f.a += g; f.b += h; C && (z.splice(n, 1), n--) } b && (u = a.scrollLeft, a.scrollLeft += l, l && a.scrollLeft === u && (b = 0)); c && (l = a.scrollTop, a.scrollTop += q, q && a.scrollTop === l && (c = 0)); b || c || (z = []); z.length ? setTimeout(e,
            d / G + 1) : A = !1
        }; setTimeout(e, 0); A = !0
    }
} function H(a) { r || k(); var b = a.target, c = I(b); if (!c || a.defaultPrevented || "embed" === p.nodeName.toLowerCase() || "embed" === b.nodeName.toLowerCase() && /\.pdf/i.test(b.src)) return !0; var b = a.wheelDeltaX || 0, d = a.wheelDeltaY || 0; b || d || (d = a.wheelDelta || 0); 1.2 < Math.abs(b) && (b *= J / 120); 1.2 < Math.abs(d) && (d *= J / 120); x(c, -b, -d); a.preventDefault() }
function w(a) {
    var b = a.target, c = a.ctrlKey || a.altKey || a.metaKey; if (/input|textarea|embed/i.test(b.nodeName) || b.isContentEditable || a.defaultPrevented || c || "button" === b.nodeName.toLowerCase() && a.keyCode === K) return !0; var d; d = b = 0; var c = I(p), e = c.clientHeight; c == document.body && (e = window.innerHeight); switch (a.keyCode) {
        case L: d = -M; break; case N: d = M; break; case K: d = a.shiftKey ? 1 : -1; d = -d * e * 0.9; break; case O: d = 0.9 * -e; break; case P: d = 0.9 * e; break; case Q: d = -c.scrollTop; break; case R: e = c.scrollHeight - c.scrollTop - e; d = 0 < e ?
        e + 10 : 0; break; case S: b = -M; break; case T: b = M; break; default: return !0
    } x(c, b, d); a.preventDefault()
} function U(a) { p = a.target } function V(a, b) { for (var c = a.length; c--;) W[X(a[c])] = b; return b }
function I(a) { var b = [], c = m.scrollHeight; do { var d = W[X(a)]; if (d) return V(b, d); b.push(a); if (c === a.scrollHeight) { if (!s || m.clientHeight + 10 < c) return V(b, document.body) } else if (a.clientHeight + 10 < a.scrollHeight && (overflow = getComputedStyle(a, "").getPropertyValue("overflow"), "scroll" === overflow || "auto" === overflow)) return V(b, a) } while (a = a.parentNode) } function y(a, b) { a = 0 < a ? 1 : -1; b = 0 < b ? 1 : -1; if (Y !== a || Z !== b) Y = a, Z = b, z = [] }
function F(a) { var b; a *= $; 1 > a ? b = a - (1 - Math.exp(-a)) : (b = Math.exp(-1), a = 1 - Math.exp(-(a - 1)), b += a * (1 - b)); return b * E } var G = 150, B = 500, J = 150, D = !0, $ = 6, E = 1, v = !0, M = 50, s = !1, Y = 0, Z = 0, r = !1, t = !0, m = document.documentElement, p, S = 37, L = 38, T = 39, N = 40, K = 32, O = 33, P = 34, R = 35, Q = 36, z = [], A = !1, W = {}; setInterval(function () { W = {} }, 1E4); var X = function () { var a = 0; return function (b) { return b.c || (b.c = a++) } }();
/chrome/.test(navigator.userAgent.toLowerCase()) && (window.addEventListener("mousedown", U, !1), window.addEventListener("mousewheel", H, !1), window.addEventListener("load", k, !1));

 
(function($) {
	
	var methods = {
			init 	: function( options ) {
				
				if( this.length ) {
					
					var settings = {
						// configuration for the mouseenter event
						animMouseenter		: {
							'mText' : {speed : 350, easing : 'easeOutExpo', delay : 140, dir : 1},
							'sText' : {speed : 350, easing : 'easeOutExpo', delay : 0, dir : 1},
							'icon'  : {speed : 350, easing : 'easeOutExpo', delay : 280, dir : 1}
						},
						// configuration for the mouseleave event
						animMouseleave		: {
							'mText' : {speed : 300, easing : 'easeInExpo', delay : 140, dir : 1},
							'sText' : {speed : 300, easing : 'easeInExpo', delay : 280, dir : 1},
							'icon'  : {speed : 300, easing : 'easeInExpo', delay : 0, dir : 1}
						},
						// speed for the item bg color animation
						boxAnimSpeed		: 300,
						// default text color (same defined in the css)
						defaultTextColor	: '#dcdcdc',
						// default bg color (same defined in the css)
						defaultBgColor		: '#fff'
					};
					
					return this.each(function() {
						
						// if options exist, lets merge them with our default settings
						if ( options ) {
							$.extend( settings, options );
						}
						
						var $el 			= $(this),
							// the menu items
							$menuItems		= $el.children('li'),
							// save max delay time for mouseleave anim parameters
						maxdelay	= Math.max( settings.animMouseleave['mText'].speed + settings.animMouseleave['mText'].delay ,
												settings.animMouseleave['sText'].speed + settings.animMouseleave['sText'].delay ,
												settings.animMouseleave['icon'].speed + settings.animMouseleave['icon'].delay
											  ),
							// timeout for the mouseenter event
							// lets us move the mouse quickly over the items,
							// without triggering the mouseenter event
							t_mouseenter;
						
						// save default top values for the moving elements:
						// the elements that animate inside each menu item
						$menuItems.find('.sti-item').each(function() {
							var $el	= $(this);
							$el.data('deftop', $el.position().top);
						});
						
						// ************** Events *************
						// mouseenter event for each menu item
						$menuItems.bind('mouseenter', function(e) {
							
							clearTimeout(t_mouseenter);
							
							var $item		= $(this),
								$wrapper	= $item.children('a'),
								wrapper_h	= $wrapper.height(),
								// the elements that animate inside this menu item
								$movingItems= $wrapper.find('.sti-item'),
								// the color that the texts will have on hover
								hovercolor	= $item.data('hovercolor');
							
							t_mouseenter	= setTimeout(function() {
								// indicates the item is on hover state
								$item.addClass('sti-current');
								
								$movingItems.each(function(i) {
									var $item			= $(this),
										item_sti_type	= $item.data('type'),
										speed			= settings.animMouseenter[item_sti_type].speed,
										easing			= settings.animMouseenter[item_sti_type].easing,
										delay			= settings.animMouseenter[item_sti_type].delay,
										dir				= settings.animMouseenter[item_sti_type].dir,
										// if dir is 1 the item moves downwards
										// if -1 then upwards
										style			= {'top' : -dir * wrapper_h + 'px'};
									
									if( item_sti_type === 'icon' ) {
										// this sets another bg image for the icon
										style.backgroundPosition	= 'bottom left';
									} else {
										style.color					= hovercolor;
									}
									// we hide the icon, move it up or down, and then show it
									$item.hide().css(style).show();
									clearTimeout($item.data('time_anim'));
									$item.data('time_anim',
										setTimeout(function() {
											// now animate each item to its default tops
											// each item will animate with a delay specified in the options
											$item.stop(true)
												 .animate({top : $item.data('deftop') + 'px'}, speed, easing);
										}, delay)
									);
								});
								// animate the bg color of the item
								$wrapper.stop(true).animate({
									backgroundColor: settings.defaultTextColor
								}, settings.boxAnimSpeed );
							
							}, 100);	

						})
						// mouseleave event for each menu item
						.bind('mouseleave', function(e) {
							
							clearTimeout(t_mouseenter);
							
							var $item		= $(this),
								$wrapper	= $item.children('a'),
								wrapper_h	= $wrapper.height(),
								$movingItems= $wrapper.find('.sti-item');
							
							if(!$item.hasClass('sti-current')) 
								return false;		
							
							$item.removeClass('sti-current');
							
							$movingItems.each(function(i) {
								var $item			= $(this),
									item_sti_type	= $item.data('type'),
									speed			= settings.animMouseleave[item_sti_type].speed,
									easing			= settings.animMouseleave[item_sti_type].easing,
									delay			= settings.animMouseleave[item_sti_type].delay,
									dir				= settings.animMouseleave[item_sti_type].dir;
								
								clearTimeout($item.data('time_anim'));
								
								setTimeout(function() {
									
									$item.stop(true).animate({'top' : -dir * wrapper_h + 'px'}, speed, easing, function() {
										
										if( delay + speed === maxdelay ) {
											
											$wrapper.stop(true).animate({
												backgroundColor: settings.defaultBgColor
											}, settings.boxAnimSpeed );
											
											$movingItems.each(function(i) {
												var $el				= $(this),
													style			= {'top' : $el.data('deftop') + 'px'};
												
												if( $el.data('type') === 'icon' ) {
													style.backgroundPosition	= 'top left';
												} else {
													style.color					= settings.defaultTextColor;
												}
												
												$el.hide().css(style).show();
											});
											
										}
									});
								}, delay);
							});
						});
						
					});
				}
			}
		};
	
	$.fn.iconmenu = function(method) {
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.iconmenu' );
		}
	};
	
})(jQuery);


/**
 * jquery.hoverdir.js v1.1.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2012, Codrops
 * http://www.codrops.com
 */
;( function( $, window, undefined ) {
	
	'use strict';

	$.HoverDir = function( options, element ) {
		
		this.$el = $( element );
		this._init( options );

	};

	// the options
	$.HoverDir.defaults = {
		speed : 300,
		easing : 'ease',
		hoverDelay : 0,
		inverse : false
	};

	$.HoverDir.prototype = {

		_init : function( options ) {
			
			// options
			this.options = $.extend( true, {}, $.HoverDir.defaults, options );
			// transition properties
			this.transitionProp = 'all ' + this.options.speed + 'ms ' + this.options.easing;
			// support for CSS transitions
			this.support = Modernizr.csstransitions;
			// load the events
			this._loadEvents();

		},
		_loadEvents : function() {

			var self = this;
			
			this.$el.on( 'mouseenter.hoverdir, mouseleave.hoverdir', function( event ) {
				
				var $el = $( this ),
					$hoverElem = $el.find( '.lr' ),
					direction = self._getDir( $el, { x : event.pageX, y : event.pageY } ),
					styleCSS = self._getStyle( direction );
				
				if( event.type === 'mouseenter' ) {
					
					$hoverElem.hide().css( styleCSS.from );
					clearTimeout( self.tmhover );

					self.tmhover = setTimeout( function() {
						
						$hoverElem.show( 0, function() {
							
							var $el = $( this );
							if( self.support ) {
								$el.css( 'transition', self.transitionProp );
							}
							self._applyAnimation( $el, styleCSS.to, self.options.speed );

						} );
						
					
					}, self.options.hoverDelay );
					
				}
				else {
				
					if( self.support ) {
						$hoverElem.css( 'transition', self.transitionProp );
					}
					clearTimeout( self.tmhover );
					self._applyAnimation( $hoverElem, styleCSS.from, self.options.speed );
					
				}
					
			} );

		},
		// credits : http://stackoverflow.com/a/3647634
		_getDir : function( $el, coordinates ) {
			
			// the width and height of the current div
			var w = $el.width(),
				h = $el.height(),

				// calculate the x and y to get an angle to the center of the div from that x and y.
				// gets the x value relative to the center of the DIV and "normalize" it
				x = ( coordinates.x - $el.offset().left - ( w/2 )) * ( w > h ? ( h/w ) : 1 ),
				y = ( coordinates.y - $el.offset().top  - ( h/2 )) * ( h > w ? ( w/h ) : 1 ),
			
				// the angle and the direction from where the mouse came in/went out clockwise (TRBL=0123);
				// first calculate the angle of the point,
				// add 180 deg to get rid of the negative values
				// divide by 90 to get the quadrant
				// add 3 and do a modulo by 4  to shift the quadrants to a proper clockwise TRBL (top/right/bottom/left) **/
				direction = Math.round( ( ( ( Math.atan2(y, x) * (180 / Math.PI) ) + 180 ) / 90 ) + 3 ) % 4;
			
			return direction;
			
		},
		_getStyle : function( direction ) {
			
			var fromStyle, toStyle,
				slideFromTop = { left : '0px', top : '-100%' },
				slideFromBottom = { left : '0px', top : '100%' },
				slideFromLeft = { left : '-100%', top : '0px' },
				slideFromRight = { left : '100%', top : '0px' },
				slideTop = { top : '0px' },
				slideLeft = { left : '0px' };
			
			switch( direction ) {
				case 0:
					// from top
					fromStyle = !this.options.inverse ? slideFromTop : slideFromBottom;
					toStyle = slideTop;
					break;
				case 1:
					// from right
					fromStyle = !this.options.inverse ? slideFromRight : slideFromLeft;
					toStyle = slideLeft;
					break;
				case 2:
					// from bottom
					fromStyle = !this.options.inverse ? slideFromBottom : slideFromTop;
					toStyle = slideTop;
					break;
				case 3:
					// from left
					fromStyle = !this.options.inverse ? slideFromLeft : slideFromRight;
					toStyle = slideLeft;
					break;
			};
			
			return { from : fromStyle, to : toStyle };
					
		},
		// apply a transition or fallback to jquery animate based on Modernizr.csstransitions support
		_applyAnimation : function( el, styleCSS, speed ) {

			$.fn.applyStyle = this.support ? $.fn.css : $.fn.animate;
			el.stop().applyStyle( styleCSS, $.extend( true, [], { duration : speed + 'ms' } ) );

		},

	};
	
	var logError = function( message ) {

		if ( window.console ) {

			window.console.error( message );
		
		}

	};
	
	$.fn.hoverdir = function( options ) {

		var instance = $.data( this, 'hoverdir' );
		
		if ( typeof options === 'string' ) {
			
			var args = Array.prototype.slice.call( arguments, 1 );
			
			this.each(function() {
			
				if ( !instance ) {

					logError( "cannot call methods on hoverdir prior to initialization; " +
					"attempted to call method '" + options + "'" );
					return;
				
				}
				
				if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {

					logError( "no such method '" + options + "' for hoverdir instance" );
					return;
				
				}
				
				instance[ options ].apply( instance, args );
			
			});
		
		} 
		else {
		
			this.each(function() {
				
				if ( instance ) {

					instance._init();
				
				}
				else {

					instance = $.data( this, 'hoverdir', new $.HoverDir( options, this ) );
				
				}

			});
		
		}
		
		return instance;
		
	};
	
} )( jQuery, window );



/*!
 * jQuery Form Plugin
 * version: 3.09 (16-APR-2012)
 * @requires jQuery v1.3.2 or later
 *
 * Examples and documentation at: http://malsup.com/jquery/form/
 * Project repository: https://github.com/malsup/form
 * Dual licensed under the MIT and GPL licenses:
 *    http://malsup.github.com/mit-license.txt
 *    http://malsup.github.com/gpl-license-v2.txt
 */
/*global ActiveXObject alert */
;(function($) {
"use strict";

/*
    Usage Note:
    -----------
    Do not use both ajaxSubmit and ajaxForm on the same form.  These
    functions are mutually exclusive.  Use ajaxSubmit if you want
    to bind your own submit handler to the form.  For example,

    $(document).ready(function() {
        $('#myForm').on('submit', function(e) {
            e.preventDefault(); // <-- important
            $(this).ajaxSubmit({
                target: '#output'
            });
        });
    });

    Use ajaxForm when you want the plugin to manage all the event binding
    for you.  For example,

    $(document).ready(function() {
        $('#myForm').ajaxForm({
            target: '#output'
        });
    });
    
    You can also use ajaxForm with delegation (requires jQuery v1.7+), so the
    form does not have to exist when you invoke ajaxForm:

    $('#myForm').ajaxForm({
        delegation: true,
        target: '#output'
    });
    
    When using ajaxForm, the ajaxSubmit function will be invoked for you
    at the appropriate time.
*/

/**
 * Feature detection
 */
var feature = {};
feature.fileapi = $("<input type='file'/>").get(0).files !== undefined;
feature.formdata = window.FormData !== undefined;

/**
 * ajaxSubmit() provides a mechanism for immediately submitting
 * an HTML form using AJAX.
 */
$.fn.ajaxSubmit = function(options) {
    /*jshint scripturl:true */

    // fast fail if nothing selected (http://dev.jquery.com/ticket/2752)
    if (!this.length) {
        log('ajaxSubmit: skipping submit process - no element selected');
        return this;
    }
    
    var method, action, url, $form = this;

    if (typeof options == 'function') {
        options = { success: options };
    }

    method = this.attr('method');
    action = this.attr('action');
    url = (typeof action === 'string') ? $.trim(action) : '';
    url = url || window.location.href || '';
    if (url) {
        // clean url (don't include hash vaue)
        url = (url.match(/^([^#]+)/)||[])[1];
    }

    options = $.extend(true, {
        url:  url,
        success: $.ajaxSettings.success,
        type: method || 'GET',
        iframeSrc: /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank'
    }, options);

    // hook for manipulating the form data before it is extracted;
    // convenient for use with rich editors like tinyMCE or FCKEditor
    var veto = {};
    this.trigger('form-pre-serialize', [this, options, veto]);
    if (veto.veto) {
        log('ajaxSubmit: submit vetoed via form-pre-serialize trigger');
        return this;
    }

    // provide opportunity to alter form data before it is serialized
    if (options.beforeSerialize && options.beforeSerialize(this, options) === false) {
        log('ajaxSubmit: submit aborted via beforeSerialize callback');
        return this;
    }

    var traditional = options.traditional;
    if ( traditional === undefined ) {
        traditional = $.ajaxSettings.traditional;
    }
    
    var elements = [];
    var qx, a = this.formToArray(options.semantic, elements);
    if (options.data) {
        options.extraData = options.data;
        qx = $.param(options.data, traditional);
    }

    // give pre-submit callback an opportunity to abort the submit
    if (options.beforeSubmit && options.beforeSubmit(a, this, options) === false) {
        log('ajaxSubmit: submit aborted via beforeSubmit callback');
        return this;
    }

    // fire vetoable 'validate' event
    this.trigger('form-submit-validate', [a, this, options, veto]);
    if (veto.veto) {
        log('ajaxSubmit: submit vetoed via form-submit-validate trigger');
        return this;
    }

    var q = $.param(a, traditional);
    if (qx) {
        q = ( q ? (q + '&' + qx) : qx );
    }    
    if (options.type.toUpperCase() == 'GET') {
        options.url += (options.url.indexOf('?') >= 0 ? '&' : '?') + q;
        options.data = null;  // data is null for 'get'
    }
    else {
        options.data = q; // data is the query string for 'post'
    }

    var callbacks = [];
    if (options.resetForm) {
        callbacks.push(function() { $form.resetForm(); });
    }
    if (options.clearForm) {
        callbacks.push(function() { $form.clearForm(options.includeHidden); });
    }

    // perform a load on the target only if dataType is not provided
    if (!options.dataType && options.target) {
        var oldSuccess = options.success || function(){};
        callbacks.push(function(data) {
            var fn = options.replaceTarget ? 'replaceWith' : 'html';
            $(options.target)[fn](data).each(oldSuccess, arguments);
        });
    }
    else if (options.success) {
        callbacks.push(options.success);
    }

    options.success = function(data, status, xhr) { // jQuery 1.4+ passes xhr as 3rd arg
        var context = options.context || options;    // jQuery 1.4+ supports scope context 
        for (var i=0, max=callbacks.length; i < max; i++) {
            callbacks[i].apply(context, [data, status, xhr || $form, $form]);
        }
    };

    // are there files to upload?
    var fileInputs = $('input:file:enabled[value]', this); // [value] (issue #113)
    var hasFileInputs = fileInputs.length > 0;
    var mp = 'multipart/form-data';
    var multipart = ($form.attr('enctype') == mp || $form.attr('encoding') == mp);

    var fileAPI = feature.fileapi && feature.formdata;
    log("fileAPI :" + fileAPI);
    var shouldUseFrame = (hasFileInputs || multipart) && !fileAPI;

    // options.iframe allows user to force iframe mode
    // 06-NOV-09: now defaulting to iframe mode if file input is detected
    if (options.iframe !== false && (options.iframe || shouldUseFrame)) {
        // hack to fix Safari hang (thanks to Tim Molendijk for this)
        // see:  http://groups.google.com/group/jquery-dev/browse_thread/thread/36395b7ab510dd5d
        if (options.closeKeepAlive) {
            $.get(options.closeKeepAlive, function() {
                fileUploadIframe(a);
            });
        }
          else {
            fileUploadIframe(a);
          }
    }
    else if ((hasFileInputs || multipart) && fileAPI) {
        fileUploadXhr(a);
    }
    else {
        $.ajax(options);
    }

    // clear element array
    for (var k=0; k < elements.length; k++)
        elements[k] = null;

    // fire 'notify' event
    this.trigger('form-submit-notify', [this, options]);
    return this;

     // XMLHttpRequest Level 2 file uploads (big hat tip to francois2metz)
    function fileUploadXhr(a) {
        var formdata = new FormData();

        for (var i=0; i < a.length; i++) {
            formdata.append(a[i].name, a[i].value);
        }

        if (options.extraData) {
            for (var p in options.extraData)
                if (options.extraData.hasOwnProperty(p))
                    formdata.append(p, options.extraData[p]);
        }

        options.data = null;

        var s = $.extend(true, {}, $.ajaxSettings, options, {
            contentType: false,
            processData: false,
            cache: false,
            type: 'POST'
        });
        
        if (options.uploadProgress) {
            // workaround because jqXHR does not expose upload property
            s.xhr = function() {
                var xhr = jQuery.ajaxSettings.xhr();
                if (xhr.upload) {
                    xhr.upload.onprogress = function(event) {
                        var percent = 0;
                        var position = event.loaded || event.position; /*event.position is deprecated*/
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        options.uploadProgress(event, position, total, percent);
                    };
                }
                return xhr;
            };
        }

        s.data = null;
          var beforeSend = s.beforeSend;
          s.beforeSend = function(xhr, o) {
              o.data = formdata;
            if(beforeSend)
                beforeSend.call(o, xhr, options);
        };
        $.ajax(s);
    }

    // private function for handling file uploads (hat tip to YAHOO!)
    function fileUploadIframe(a) {
        var form = $form[0], el, i, s, g, id, $io, io, xhr, sub, n, timedOut, timeoutHandle;
        var useProp = !!$.fn.prop;

        if ($(':input[name=submit],:input[id=submit]', form).length) {
            // if there is an input with a name or id of 'submit' then we won't be
            // able to invoke the submit fn on the form (at least not x-browser)
            alert('Error: Form elements must not have name or id of "submit".');
            return;
        }
        
        if (a) {
            // ensure that every serialized input is still enabled
            for (i=0; i < elements.length; i++) {
                el = $(elements[i]);
                if ( useProp )
                    el.prop('disabled', false);
                else
                    el.removeAttr('disabled');
            }
        }

        s = $.extend(true, {}, $.ajaxSettings, options);
        s.context = s.context || s;
        id = 'jqFormIO' + (new Date().getTime());
        if (s.iframeTarget) {
            $io = $(s.iframeTarget);
            n = $io.attr('name');
            if (!n)
                 $io.attr('name', id);
            else
                id = n;
        }
        else {
            $io = $('<iframe name="' + id + '" src="'+ s.iframeSrc +'" />');
            $io.css({ position: 'absolute', top: '-1000px', left: '-1000px' });
        }
        io = $io[0];


        xhr = { // mock object
            aborted: 0,
            responseText: null,
            responseXML: null,
            status: 0,
            statusText: 'n/a',
            getAllResponseHeaders: function() {},
            getResponseHeader: function() {},
            setRequestHeader: function() {},
            abort: function(status) {
                var e = (status === 'timeout' ? 'timeout' : 'aborted');
                log('aborting upload... ' + e);
                this.aborted = 1;
                $io.attr('src', s.iframeSrc); // abort op in progress
                xhr.error = e;
                if (s.error)
                    s.error.call(s.context, xhr, e, status);
                if (g)
                    $.event.trigger("ajaxError", [xhr, s, e]);
                if (s.complete)
                    s.complete.call(s.context, xhr, e);
            }
        };

        g = s.global;
        // trigger ajax global events so that activity/block indicators work like normal
        if (g && 0 === $.active++) {
            $.event.trigger("ajaxStart");
        }
        if (g) {
            $.event.trigger("ajaxSend", [xhr, s]);
        }

        if (s.beforeSend && s.beforeSend.call(s.context, xhr, s) === false) {
            if (s.global) {
                $.active--;
            }
            return;
        }
        if (xhr.aborted) {
            return;
        }

        // add submitting element to data if we know it
        sub = form.clk;
        if (sub) {
            n = sub.name;
            if (n && !sub.disabled) {
                s.extraData = s.extraData || {};
                s.extraData[n] = sub.value;
                if (sub.type == "image") {
                    s.extraData[n+'.x'] = form.clk_x;
                    s.extraData[n+'.y'] = form.clk_y;
                }
            }
        }
        
        var CLIENT_TIMEOUT_ABORT = 1;
        var SERVER_ABORT = 2;

        function getDoc(frame) {
            var doc = frame.contentWindow ? frame.contentWindow.document : frame.contentDocument ? frame.contentDocument : frame.document;
            return doc;
        }
        
        // Rails CSRF hack (thanks to Yvan Barthelemy)
        var csrf_token = $('meta[name=csrf-token]').attr('content');
        var csrf_param = $('meta[name=csrf-param]').attr('content');
        if (csrf_param && csrf_token) {
            s.extraData = s.extraData || {};
            s.extraData[csrf_param] = csrf_token;
        }

        // take a breath so that pending repaints get some cpu time before the upload starts
        function doSubmit() {
            // make sure form attrs are set
            var t = $form.attr('target'), a = $form.attr('action');

            // update form attrs in IE friendly way
            form.setAttribute('target',id);
            if (!method) {
                form.setAttribute('method', 'POST');
            }
            if (a != s.url) {
                form.setAttribute('action', s.url);
            }

            // ie borks in some cases when setting encoding
            if (! s.skipEncodingOverride && (!method || /post/i.test(method))) {
                $form.attr({
                    encoding: 'multipart/form-data',
                    enctype:  'multipart/form-data'
                });
            }

            // support timout
            if (s.timeout) {
                timeoutHandle = setTimeout(function() { timedOut = true; cb(CLIENT_TIMEOUT_ABORT); }, s.timeout);
            }
            
            // look for server aborts
            function checkState() {
                try {
                    var state = getDoc(io).readyState;
                    log('state = ' + state);
                    if (state && state.toLowerCase() == 'uninitialized')
                        setTimeout(checkState,50);
                }
                catch(e) {
                    log('Server abort: ' , e, ' (', e.name, ')');
                    cb(SERVER_ABORT);
                    if (timeoutHandle)
                        clearTimeout(timeoutHandle);
                    timeoutHandle = undefined;
                }
            }

            // add "extra" data to form if provided in options
            var extraInputs = [];
            try {
                if (s.extraData) {
                    for (var n in s.extraData) {
                        if (s.extraData.hasOwnProperty(n)) {
                            extraInputs.push(
                                $('<input type="hidden" name="'+n+'">').attr('value',s.extraData[n])
                                    .appendTo(form)[0]);
                        }
                    }
                }

                if (!s.iframeTarget) {
                    // add iframe to doc and submit the form
                    $io.appendTo('body');
                    if (io.attachEvent)
                        io.attachEvent('onload', cb);
                    else
                        io.addEventListener('load', cb, false);
                }
                setTimeout(checkState,15);
                form.submit();
            }
            finally {
                // reset attrs and remove "extra" input elements
                form.setAttribute('action',a);
                if(t) {
                    form.setAttribute('target', t);
                } else {
                    $form.removeAttr('target');
                }
                $(extraInputs).remove();
            }
        }

        if (s.forceSync) {
            doSubmit();
        }
        else {
            setTimeout(doSubmit, 10); // this lets dom updates render
        }

        var data, doc, domCheckCount = 50, callbackProcessed;

        function cb(e) {
            if (xhr.aborted || callbackProcessed) {
                return;
            }
            try {
                doc = getDoc(io);
            }
            catch(ex) {
                log('cannot access response document: ', ex);
                e = SERVER_ABORT;
            }
            if (e === CLIENT_TIMEOUT_ABORT && xhr) {
                xhr.abort('timeout');
                return;
            }
            else if (e == SERVER_ABORT && xhr) {
                xhr.abort('server abort');
                return;
            }

            if (!doc || doc.location.href == s.iframeSrc) {
                // response not received yet
                if (!timedOut)
                    return;
            }
            if (io.detachEvent)
                io.detachEvent('onload', cb);
            else    
                io.removeEventListener('load', cb, false);

            var status = 'success', errMsg;
            try {
                if (timedOut) {
                    throw 'timeout';
                }

                var isXml = s.dataType == 'xml' || doc.XMLDocument || $.isXMLDoc(doc);
                log('isXml='+isXml);
                if (!isXml && window.opera && (doc.body === null || !doc.body.innerHTML)) {
                    if (--domCheckCount) {
                        // in some browsers (Opera) the iframe DOM is not always traversable when
                        // the onload callback fires, so we loop a bit to accommodate
                        log('requeing onLoad callback, DOM not available');
                        setTimeout(cb, 250);
                        return;
                    }
                    // let this fall through because server response could be an empty document
                    //log('Could not access iframe DOM after mutiple tries.');
                    //throw 'DOMException: not available';
                }

                //log('response detected');
                var docRoot = doc.body ? doc.body : doc.documentElement;
                xhr.responseText = docRoot ? docRoot.innerHTML : null;
                xhr.responseXML = doc.XMLDocument ? doc.XMLDocument : doc;
                if (isXml)
                    s.dataType = 'xml';
                xhr.getResponseHeader = function(header){
                    var headers = {'content-type': s.dataType};
                    return headers[header];
                };
                // support for XHR 'status' & 'statusText' emulation :
                if (docRoot) {
                    xhr.status = Number( docRoot.getAttribute('status') ) || xhr.status;
                    xhr.statusText = docRoot.getAttribute('statusText') || xhr.statusText;
                }

                var dt = (s.dataType || '').toLowerCase();
                var scr = /(json|script|text)/.test(dt);
                if (scr || s.textarea) {
                    // see if user embedded response in textarea
                    var ta = doc.getElementsByTagName('textarea')[0];
                    if (ta) {
                        xhr.responseText = ta.value;
                        // support for XHR 'status' & 'statusText' emulation :
                        xhr.status = Number( ta.getAttribute('status') ) || xhr.status;
                        xhr.statusText = ta.getAttribute('statusText') || xhr.statusText;
                    }
                    else if (scr) {
                        // account for browsers injecting pre around json response
                        var pre = doc.getElementsByTagName('pre')[0];
                        var b = doc.getElementsByTagName('body')[0];
                        if (pre) {
                            xhr.responseText = pre.textContent ? pre.textContent : pre.innerText;
                        }
                        else if (b) {
                            xhr.responseText = b.textContent ? b.textContent : b.innerText;
                        }
                    }
                }
                else if (dt == 'xml' && !xhr.responseXML && xhr.responseText) {
                    xhr.responseXML = toXml(xhr.responseText);
                }

                try {
                    data = httpData(xhr, dt, s);
                }
                catch (e) {
                    status = 'parsererror';
                    xhr.error = errMsg = (e || status);
                }
            }
            catch (e) {
                log('error caught: ',e);
                status = 'error';
                xhr.error = errMsg = (e || status);
            }

            if (xhr.aborted) {
                log('upload aborted');
                status = null;
            }

            if (xhr.status) { // we've set xhr.status
                status = (xhr.status >= 200 && xhr.status < 300 || xhr.status === 304) ? 'success' : 'error';
            }

            // ordering of these callbacks/triggers is odd, but that's how $.ajax does it
            if (status === 'success') {
                if (s.success)
                    s.success.call(s.context, data, 'success', xhr);
                if (g)
                    $.event.trigger("ajaxSuccess", [xhr, s]);
            }
            else if (status) {
                if (errMsg === undefined)
                    errMsg = xhr.statusText;
                if (s.error)
                    s.error.call(s.context, xhr, status, errMsg);
                if (g)
                    $.event.trigger("ajaxError", [xhr, s, errMsg]);
            }

            if (g)
                $.event.trigger("ajaxComplete", [xhr, s]);

            if (g && ! --$.active) {
                $.event.trigger("ajaxStop");
            }

            if (s.complete)
                s.complete.call(s.context, xhr, status);

            callbackProcessed = true;
            if (s.timeout)
                clearTimeout(timeoutHandle);

            // clean up
            setTimeout(function() {
                if (!s.iframeTarget)
                    $io.remove();
                xhr.responseXML = null;
            }, 100);
        }

        var toXml = $.parseXML || function(s, doc) { // use parseXML if available (jQuery 1.5+)
            if (window.ActiveXObject) {
                doc = new ActiveXObject('Microsoft.XMLDOM');
                doc.async = 'false';
                doc.loadXML(s);
            }
            else {
                doc = (new DOMParser()).parseFromString(s, 'text/xml');
            }
            return (doc && doc.documentElement && doc.documentElement.nodeName != 'parsererror') ? doc : null;
        };
        var parseJSON = $.parseJSON || function(s) {
            /*jslint evil:true */
            return window['eval']('(' + s + ')');
        };

        var httpData = function( xhr, type, s ) { // mostly lifted from jq1.4.4

            var ct = xhr.getResponseHeader('content-type') || '',
                xml = type === 'xml' || !type && ct.indexOf('xml') >= 0,
                data = xml ? xhr.responseXML : xhr.responseText;

            if (xml && data.documentElement.nodeName === 'parsererror') {
                if ($.error)
                    $.error('parsererror');
            }
            if (s && s.dataFilter) {
                data = s.dataFilter(data, type);
            }
            if (typeof data === 'string') {
                if (type === 'json' || !type && ct.indexOf('json') >= 0) {
                    data = parseJSON(data);
                } else if (type === "script" || !type && ct.indexOf("javascript") >= 0) {
                    $.globalEval(data);
                }
            }
            return data;
        };
    }
};

/**
 * ajaxForm() provides a mechanism for fully automating form submission.
 *
 * The advantages of using this method instead of ajaxSubmit() are:
 *
 * 1: This method will include coordinates for <input type="image" /> elements (if the element
 *    is used to submit the form).
 * 2. This method will include the submit element's name/value data (for the element that was
 *    used to submit the form).
 * 3. This method binds the submit() method to the form for you.
 *
 * The options argument for ajaxForm works exactly as it does for ajaxSubmit.  ajaxForm merely
 * passes the options argument along after properly binding events for submit elements and
 * the form itself.
 */
$.fn.ajaxForm = function(options) {
    options = options || {};
    options.delegation = options.delegation && $.isFunction($.fn.on);
    
    // in jQuery 1.3+ we can fix mistakes with the ready state
    if (!options.delegation && this.length === 0) {
        var o = { s: this.selector, c: this.context };
        if (!$.isReady && o.s) {
            log('DOM not ready, queuing ajaxForm');
            $(function() {
                $(o.s,o.c).ajaxForm(options);
            });
            return this;
        }
        // is your DOM ready?  http://docs.jquery.com/Tutorials:Introducing_$(document).ready()
        log('terminating; zero elements found by selector' + ($.isReady ? '' : ' (DOM not ready)'));
        return this;
    }

    if ( options.delegation ) {
        $(document)
            .off('submit.form-plugin', this.selector, doAjaxSubmit)
            .off('click.form-plugin', this.selector, captureSubmittingElement)
            .on('submit.form-plugin', this.selector, options, doAjaxSubmit)
            .on('click.form-plugin', this.selector, options, captureSubmittingElement);
        return this;
    }

    return this.ajaxFormUnbind()
        .bind('submit.form-plugin', options, doAjaxSubmit)
        .bind('click.form-plugin', options, captureSubmittingElement);
};

// private event handlers    
function doAjaxSubmit(e) {
    /*jshint validthis:true */
    var options = e.data;
    if (!e.isDefaultPrevented()) { // if event has been canceled, don't proceed
        e.preventDefault();
        $(this).ajaxSubmit(options);
    }
}
    
function captureSubmittingElement(e) {
    /*jshint validthis:true */
    var target = e.target;
    var $el = $(target);
    if (!($el.is(":submit,input:image"))) {
        // is this a child element of the submit el?  (ex: a span within a button)
        var t = $el.closest(':submit');
        if (t.length === 0) {
            return;
        }
        target = t[0];
    }
    var form = this;
    form.clk = target;
    if (target.type == 'image') {
        if (e.offsetX !== undefined) {
            form.clk_x = e.offsetX;
            form.clk_y = e.offsetY;
        } else if (typeof $.fn.offset == 'function') {
            var offset = $el.offset();
            form.clk_x = e.pageX - offset.left;
            form.clk_y = e.pageY - offset.top;
        } else {
            form.clk_x = e.pageX - target.offsetLeft;
            form.clk_y = e.pageY - target.offsetTop;
        }
    }
    // clear form vars
    setTimeout(function() { form.clk = form.clk_x = form.clk_y = null; }, 100);
}


// ajaxFormUnbind unbinds the event handlers that were bound by ajaxForm
$.fn.ajaxFormUnbind = function() {
    return this.unbind('submit.form-plugin click.form-plugin');
};

/**
 * formToArray() gathers form element data into an array of objects that can
 * be passed to any of the following ajax functions: $.get, $.post, or load.
 * Each object in the array has both a 'name' and 'value' property.  An example of
 * an array for a simple login form might be:
 *
 * [ { name: 'username', value: 'jresig' }, { name: 'password', value: 'secret' } ]
 *
 * It is this array that is passed to pre-submit callback functions provided to the
 * ajaxSubmit() and ajaxForm() methods.
 */
$.fn.formToArray = function(semantic, elements) {
    var a = [];
    if (this.length === 0) {
        return a;
    }

    var form = this[0];
    var els = semantic ? form.getElementsByTagName('*') : form.elements;
    if (!els) {
        return a;
    }

    var i,j,n,v,el,max,jmax;
    for(i=0, max=els.length; i < max; i++) {
        el = els[i];
        n = el.name;
        if (!n) {
            continue;
        }

        if (semantic && form.clk && el.type == "image") {
            // handle image inputs on the fly when semantic == true
            if(!el.disabled && form.clk == el) {
                a.push({name: n, value: $(el).val(), type: el.type });
                a.push({name: n+'.x', value: form.clk_x}, {name: n+'.y', value: form.clk_y});
            }
            continue;
        }

        v = $.fieldValue(el, true);
        if (v && v.constructor == Array) {
            if (elements) 
                elements.push(el);
            for(j=0, jmax=v.length; j < jmax; j++) {
                a.push({name: n, value: v[j]});
            }
        }
        else if (feature.fileapi && el.type == 'file' && !el.disabled) {
            if (elements) 
                elements.push(el);
            var files = el.files;
            if (files.length) {
                for (j=0; j < files.length; j++) {
                    a.push({name: n, value: files[j], type: el.type});
                }
            }
            else {
                // #180
                a.push({ name: n, value: '', type: el.type });
            }
        }
        else if (v !== null && typeof v != 'undefined') {
            if (elements) 
                elements.push(el);
            a.push({name: n, value: v, type: el.type, required: el.required});
        }
    }

    if (!semantic && form.clk) {
        // input type=='image' are not found in elements array! handle it here
        var $input = $(form.clk), input = $input[0];
        n = input.name;
        if (n && !input.disabled && input.type == 'image') {
            a.push({name: n, value: $input.val()});
            a.push({name: n+'.x', value: form.clk_x}, {name: n+'.y', value: form.clk_y});
        }
    }
    return a;
};

/**
 * Serializes form data into a 'submittable' string. This method will return a string
 * in the format: name1=value1&amp;name2=value2
 */
$.fn.formSerialize = function(semantic) {
    //hand off to jQuery.param for proper encoding
    return $.param(this.formToArray(semantic));
};

/**
 * Serializes all field elements in the jQuery object into a query string.
 * This method will return a string in the format: name1=value1&amp;name2=value2
 */
$.fn.fieldSerialize = function(successful) {
    var a = [];
    this.each(function() {
        var n = this.name;
        if (!n) {
            return;
        }
        var v = $.fieldValue(this, successful);
        if (v && v.constructor == Array) {
            for (var i=0,max=v.length; i < max; i++) {
                a.push({name: n, value: v[i]});
            }
        }
        else if (v !== null && typeof v != 'undefined') {
            a.push({name: this.name, value: v});
        }
    });
    //hand off to jQuery.param for proper encoding
    return $.param(a);
};

/**
 * Returns the value(s) of the element in the matched set.  For example, consider the following form:
 *
 *  <form><fieldset>
 *      <input name="A" type="text" />
 *      <input name="A" type="text" />
 *      <input name="B" type="checkbox" value="B1" />
 *      <input name="B" type="checkbox" value="B2"/>
 *      <input name="C" type="radio" value="C1" />
 *      <input name="C" type="radio" value="C2" />
 *  </fieldset></form>
 *
 *  var v = $(':text').fieldValue();
 *  // if no values are entered into the text inputs
 *  v == ['','']
 *  // if values entered into the text inputs are 'foo' and 'bar'
 *  v == ['foo','bar']
 *
 *  var v = $(':checkbox').fieldValue();
 *  // if neither checkbox is checked
 *  v === undefined
 *  // if both checkboxes are checked
 *  v == ['B1', 'B2']
 *
 *  var v = $(':radio').fieldValue();
 *  // if neither radio is checked
 *  v === undefined
 *  // if first radio is checked
 *  v == ['C1']
 *
 * The successful argument controls whether or not the field element must be 'successful'
 * (per http://www.w3.org/TR/html4/interact/forms.html#successful-controls).
 * The default value of the successful argument is true.  If this value is false the value(s)
 * for each element is returned.
 *
 * Note: This method *always* returns an array.  If no valid value can be determined the
 *    array will be empty, otherwise it will contain one or more values.
 */
$.fn.fieldValue = function(successful) {
    for (var val=[], i=0, max=this.length; i < max; i++) {
        var el = this[i];
        var v = $.fieldValue(el, successful);
        if (v === null || typeof v == 'undefined' || (v.constructor == Array && !v.length)) {
            continue;
        }
        if (v.constructor == Array)
            $.merge(val, v);
        else
            val.push(v);
    }
    return val;
};

/**
 * Returns the value of the field element.
 */
$.fieldValue = function(el, successful) {
    var n = el.name, t = el.type, tag = el.tagName.toLowerCase();
    if (successful === undefined) {
        successful = true;
    }

    if (successful && (!n || el.disabled || t == 'reset' || t == 'button' ||
        (t == 'checkbox' || t == 'radio') && !el.checked ||
        (t == 'submit' || t == 'image') && el.form && el.form.clk != el ||
        tag == 'select' && el.selectedIndex == -1)) {
            return null;
    }

    if (tag == 'select') {
        var index = el.selectedIndex;
        if (index < 0) {
            return null;
        }
        var a = [], ops = el.options;
        var one = (t == 'select-one');
        var max = (one ? index+1 : ops.length);
        for(var i=(one ? index : 0); i < max; i++) {
            var op = ops[i];
            if (op.selected) {
                var v = op.value;
                if (!v) { // extra pain for IE...
                    v = (op.attributes && op.attributes['value'] && !(op.attributes['value'].specified)) ? op.text : op.value;
                }
                if (one) {
                    return v;
                }
                a.push(v);
            }
        }
        return a;
    }
    return $(el).val();
};

/**
 * Clears the form data.  Takes the following actions on the form's input fields:
 *  - input text fields will have their 'value' property set to the empty string
 *  - select elements will have their 'selectedIndex' property set to -1
 *  - checkbox and radio inputs will have their 'checked' property set to false
 *  - inputs of type submit, button, reset, and hidden will *not* be effected
 *  - button elements will *not* be effected
 */
$.fn.clearForm = function(includeHidden) {
    return this.each(function() {
        $('input,select,textarea', this).clearFields(includeHidden);
    });
};

/**
 * Clears the selected form elements.
 */
$.fn.clearFields = $.fn.clearInputs = function(includeHidden) {
    var re = /^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i; // 'hidden' is not in this list
    return this.each(function() {
        var t = this.type, tag = this.tagName.toLowerCase();
        if (re.test(t) || tag == 'textarea') {
            this.value = '';
        }
        else if (t == 'checkbox' || t == 'radio') {
            this.checked = false;
        }
        else if (tag == 'select') {
            this.selectedIndex = -1;
        }
        else if (includeHidden) {
            // includeHidden can be the valud true, or it can be a selector string
            // indicating a special test; for example:
            //  $('#myForm').clearForm('.special:hidden')
            // the above would clean hidden inputs that have the class of 'special'
            if ( (includeHidden === true && /hidden/.test(t)) ||
                 (typeof includeHidden == 'string' && $(this).is(includeHidden)) )
                this.value = '';
        }
    });
};

/**
 * Resets the form data.  Causes all form elements to be reset to their original value.
 */
$.fn.resetForm = function() {
    return this.each(function() {
        // guard against an input with the name of 'reset'
        // note that IE reports the reset function as an 'object'
        if (typeof this.reset == 'function' || (typeof this.reset == 'object' && !this.reset.nodeType)) {
            this.reset();
        }
    });
};

/**
 * Enables or disables any matching elements.
 */
$.fn.enable = function(b) {
    if (b === undefined) {
        b = true;
    }
    return this.each(function() {
        this.disabled = !b;
    });
};

/**
 * Checks/unchecks any matching checkboxes or radio buttons and
 * selects/deselects and matching option elements.
 */
$.fn.selected = function(select) {
    if (select === undefined) {
        select = true;
    }
    return this.each(function() {
        var t = this.type;
        if (t == 'checkbox' || t == 'radio') {
            this.checked = select;
        }
        else if (this.tagName.toLowerCase() == 'option') {
            var $sel = $(this).parent('select');
            if (select && $sel[0] && $sel[0].type == 'select-one') {
                // deselect all other options
                $sel.find('option').selected(false);
            }
            this.selected = select;
        }
    });
};

// expose debug var
$.fn.ajaxSubmit.debug = false;

// helper fn for console logging
function log() {
    if (!$.fn.ajaxSubmit.debug) 
        return;
    var msg = '[jquery.form] ' + Array.prototype.join.call(arguments,'');
    if (window.console && window.console.log) {
        window.console.log(msg);
    }
    else if (window.opera && window.opera.postError) {
        window.opera.postError(msg);
    }
}

})(jQuery);



/*global jQuery */
/*jshint multistr:true browser:true */
/*!
* FitVids 1.0.3
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
* Date: Thu Sept 01 18:00:00 2011 -0500
*/

(function( $ ){

  "use strict";

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null
    };

    if(!document.getElementById('fit-vids-style')) {

      var div = document.createElement('div'),
          ref = document.getElementsByTagName('base')[0] || document.getElementsByTagName('script')[0],
          cssStyles = '&shy;<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>';

      div.className = 'fit-vids-style';
      div.id = 'fit-vids-style';
      div.style.display = 'none';
      div.innerHTML = cssStyles;

      ref.parentNode.insertBefore(div,ref);

    }

    if ( options ) {
      $.extend( settings, options );
    }

    return this.each(function(){
      var selectors = [
        "iframe[src*='player.vimeo.com']",
        "iframe[src*='youtube.com']",
        "iframe[src*='youtube-nocookie.com']",
        "iframe[src*='kickstarter.com'][src*='video.html']",
        "object",
        "embed"
      ];

      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }

      var $allVideos = $(this).find(selectors.join(','));
      $allVideos = $allVideos.not("object object"); // SwfObj conflict patch

      $allVideos.each(function(){
        var $this = $(this);
        if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; }
        var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
            width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
            aspectRatio = height / width;
        if(!$this.attr('id')){
          var videoID = 'fitvid' + Math.floor(Math.random()*999999);
          $this.attr('id', videoID);
        }
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
        $this.removeAttr('height').removeAttr('width');
      });
    });
  };
// Works with either jQuery or Zepto
})( window.jQuery || window.Zepto );


/*
 * Adipoli jQuery Image Hover Plugin
 * http://jobyj.in/adipoli
 *
 * Copyright 2012, Joby Joseph
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 */
(function(a){a.fn.adipoli=function(b){function g(a){var b=document.createElement("canvas");var c=b.getContext("2d");var d=new Image;d.src=a;b.width=d.width;b.height=d.height;c.drawImage(d,0,0);var e=c.getImageData(0,0,b.width,b.height);for(var f=0;f<e.height;f++){for(var g=0;g<e.width;g++){var h=f*4*e.width+g*4;var i=(e.data[h]+e.data[h+1]+e.data[h+2])/3;e.data[h]=i;e.data[h+1]=i;e.data[h+2]=i}}c.putImageData(e,0,0,0,0,e.width,e.height);return b.toDataURL()}function f(a){for(var b,c,d=a.length;d;b=parseInt(Math.random()*d),c=a[--d],a[d]=a[b],a[b]=c);return a}function e(b,c){var d=Math.round(b.width()/c.boxCols);var e=Math.round(b.height()/c.boxRows);for(var f=0;f<c.boxRows;f++){for(var g=0;g<c.boxCols;g++){if(g==c.boxCols-1){b.children(".adipoli-after").append(a('<div class="adipoli-box"></div>').css({opacity:0,left:d*g+"px",top:e*f+"px",width:b.width()-d*g+"px",height:e+"px",background:'url("'+b.children("img").attr("src")+'") no-repeat -'+(d+g*d-d)+"px -"+(e+f*e-e)+"px"}))}else{b.children(".adipoli-after").append(a('<div class="adipoli-box"></div>').css({opacity:0,left:d*g+"px",top:e*f+"px",width:d+"px",height:e+"px",background:'url("'+b.children("img").attr("src")+'") no-repeat -'+(d+g*d-d)+"px -"+(e+f*e-e)+"px"}))}}}}function d(b,c){for(var d=0;d<c.slices;d++){var e=Math.round(b.width()/c.slices);if(d==c.slices-1){b.children(".adipoli-after").append(a('<div class="adipoli-slice"></div>').css({left:e*d+"px",width:b.width()-e*d+"px",height:"0px",opacity:"0",background:'url("'+b.children("img").attr("src")+'") no-repeat -'+(e+d*e-e)+"px 0%"}))}else{b.children(".adipoli-after").append(a('<div class="adipoli-slice"></div>').css({left:e*d+"px",width:e+"px",height:"0px",opacity:"0",background:'url("'+b.children("img").attr("src")+'") no-repeat -'+(e+d*e-e)+"px 0%"}))}}}var c=a.extend({startEffect:"transparent",hoverEffect:"normal",imageOpacity:.5,animSpeed:300,fillColor:"#000",textColor:"#fff",overlayText:"",slices:10,boxCols:5,boxRows:3,popOutMargin:10,popOutShadow:10},b);a(this).one("load",function(){a(this).wrap(function(){return'<div class="adipoli-wrapper '+a(this).attr("class")+'" style="width:'+a(this).width()+"px; height:"+a(this).height()+'px;"/>'});a(this).parent().append('<div class="adipoli-before '+a(this).attr("class")+'" style="display:none;width:'+a(this).width()+"px; height:"+a(this).height()+'px;"><img src="'+a(this).attr("src")+'"/></div>');a(this).parent().append('<div class="adipoli-after '+a(this).attr("class")+'" style="display:none;width:'+a(this).width()+"px; height:"+a(this).height()+'px;"></div>');if(c.startEffect=="transparent"){a(this).hide();a(this).siblings(".adipoli-before").css({"-ms-filter":'"progid:DXImageTransform.Microsoft.Alpha(Opacity='+c.imageOpacity*100+')"',filter:"alpha(opacity="+c.imageOpacity*100+")","-moz-opacity":c.imageOpacity,"-khtml-opacity":c.imageOpacity,opacity:c.imageOpacity}).show()}else if(c.startEffect=="grayscale"){var b=a(this);b.hide();b.siblings(".adipoli-before").show();b.siblings(".adipoli-before").children("img").each(function(){this.src=g(this.src)})}else if(c.startEffect=="normal"){a(this).hide();a(this).siblings(".adipoli-before").show()}else if(c.startEffect=="overlay"){b=a(this);b.hide();a(this).siblings(".adipoli-before").html(c.overlayText).css({"-ms-filter":'"progid:DXImageTransform.Microsoft.Alpha(Opacity='+c.imageOpacity*100+')"',filter:"alpha(opacity="+c.imageOpacity*100+")","-moz-opacity":c.imageOpacity,"-khtml-opacity":c.imageOpacity,opacity:c.imageOpacity,background:c.fillColor,color:c.textColor}).fadeIn();b.show()}a(this).parent().bind("mouseenter",function(){if(c.hoverEffect=="normal"){var b=a(this);b.children(".adipoli-after").html('<img src="'+b.children("img").attr("src")+'"/>').fadeIn(c.animSpeed)}else if(c.hoverEffect=="popout"){b=a(this);var g=b.children("img").width();var h=b.children("img").height();b.children(".adipoli-after").html('<img src="'+b.children("img").attr("src")+'"/>');var i=b.children(".adipoli-after").children("img");i.width(g+2*c.popOutMargin);i.height(h+2*c.popOutMargin);b.children(".adipoli-after").width(g+2*c.popOutMargin);b.children(".adipoli-after").height(h+2*c.popOutMargin);b.children(".adipoli-after").css({left:"-"+c.popOutMargin+"px",top:"-"+c.popOutMargin+"px","box-shadow":"0px 0px "+c.popOutShadow+"px #000"}).show()}else if(c.hoverEffect=="sliceDown"||c.hoverEffect=="sliceDownLeft"||c.hoverEffect=="sliceUp"||c.hoverEffect=="sliceUpLeft"||c.hoverEffect=="sliceUpRandom"||c.hoverEffect=="sliceDownRandom"){a(this).children(".adipoli-after").show();d(a(this),c);var j=0;var k=0;var l=a(".adipoli-slice",a(this));if(c.hoverEffect=="sliceDownLeft"||c.hoverEffect=="sliceUpLeft")l=a(".adipoli-slice",a(this))._reverse();if(c.hoverEffect=="sliceUpRandom"||c.hoverEffect=="sliceDownRandom")l=f(a(".adipoli-slice",a(this)));l.each(function(){var b=a(this);if(c.hoverEffect=="sliceDown"||c.hoverEffect=="sliceDownLeft"){b.css({top:"0px"})}else if(c.hoverEffect=="sliceUp"||c.hoverEffect=="sliceUpLeft"){b.css({bottom:"0px"})}if(k==c.slices-1){setTimeout(function(){b.animate({height:"100%",opacity:"1.0"},c.animSpeed,"",function(){})},100+j)}else{setTimeout(function(){b.animate({height:"100%",opacity:"1.0"},c.animSpeed)},100+j)}j+=50;k++})}else if(c.hoverEffect=="sliceUpDown"||c.hoverEffect=="sliceUpDownLeft"){a(this).children(".adipoli-after").show();d(a(this),c);j=0;k=0;var m=0;l=a(".adipoli-slice",a(this));if(c.hoverEffect=="sliceUpDownLeft")l=a(".adipoli-slice",a(this))._reverse();l.each(function(){var b=a(this);if(k==0){b.css("top","0px");k++}else{b.css("bottom","0px");k=0}if(m==c.slices-1){setTimeout(function(){b.animate({height:"100%",opacity:"1.0"},c.animSpeed,"",function(){})},100+j)}else{setTimeout(function(){b.animate({height:"100%",opacity:"1.0"},c.animSpeed)},100+j)}j+=50;m++})}else if(c.hoverEffect=="fold"||c.hoverEffect=="foldLeft"){a(this).children(".adipoli-after").show();b=a(this);d(b,c);j=0;k=0;l=a(".adipoli-slice",b);if(c.hoverEffect=="foldLeft")l=a(".adipoli-slice",a(this))._reverse();l.each(function(){var b=a(this);var d=b.width();b.css({top:"0px",height:"100%",width:"0px"});if(k==c.slices-1){setTimeout(function(){b.animate({width:d,opacity:"1.0"},c.animSpeed,"",function(){})},100+j)}else{setTimeout(function(){b.animate({width:d,opacity:"1.0"},c.animSpeed)},100+j)}j+=50;k++})}else if(c.hoverEffect=="boxRandom"){a(this).children(".adipoli-after").show();b=a(this);e(b,c);var n=c.boxCols*c.boxRows;k=0;j=0;var o=f(a(".adipoli-box",b));o.each(function(){var b=a(this);if(k==n-1){setTimeout(function(){b.animate({opacity:"1"},c.animSpeed,"",function(){})},100+j)}else{setTimeout(function(){b.animate({opacity:"1"},c.animSpeed)},100+j)}j+=20;k++})}else if(c.hoverEffect=="boxRain"||c.hoverEffect=="boxRainReverse"||c.hoverEffect=="boxRainGrow"||c.hoverEffect=="boxRainGrowReverse"){a(this).children(".adipoli-after").show();b=a(this);e(b,c);n=c.boxCols*c.boxRows;k=0;j=0;var p=0;var q=0;var r=new Array;r[p]=new Array;o=a(".adipoli-box",b);if(c.hoverEffect=="boxRainReverse"||c.hoverEffect=="boxRainGrowReverse"){o=a(".adipoli-box",b)._reverse()}o.each(function(){r[p][q]=a(this);q++;if(q==c.boxCols){p++;q=0;r[p]=new Array}});for(var s=0;s<c.boxCols*2;s++){var t=s;for(var u=0;u<c.boxRows;u++){if(t>=0&&t<c.boxCols){(function(b,d,e,f,g){var h=a(r[b][d]);var i=h.width();var j=h.height();if(c.hoverEffect=="boxRainGrow"||c.hoverEffect=="boxRainGrowReverse"){h.width(0).height(0)}if(f==g-1){setTimeout(function(){h.animate({opacity:"1",width:i,height:j},c.animSpeed/1.3,"",function(){})},100+e)}else{setTimeout(function(){h.animate({opacity:"1",width:i,height:j},c.animSpeed/1.3)},100+e)}})(u,t,j,k,n);k++}t--}j+=100}}});a(this).parent().bind("mouseleave",function(){a(this).children(".adipoli-after").html("").hide()})}).each(function(){if(this.complete)a(this).load()});return a(this)};a.fn._reverse=[].reverse})(jQuery);



/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
	var $window = $(window);
	var windowHeight = $window.height();

	$window.resize(function () {
		windowHeight = $window.height();
	});

	$.fn.parallax = function(xpos, speedFactor, outerHeight) {
		var $this = $(this);
		var getHeight;
		var firstTop;
		var paddingTop = 0;
		
		//get the starting position of each element to have parallax applied to it		
		$this.each(function(){
		    firstTop = $this.offset().top;
		});

		if (outerHeight) {
			getHeight = function(jqo) {
				return jqo.outerHeight(true);
			};
		} else {
			getHeight = function(jqo) {
				return jqo.height();
			};
		}
			
		// setup defaults if arguments aren't specified
		if (arguments.length < 1 || xpos === null) xpos = "50%";
		if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
		if (arguments.length < 3 || outerHeight === null) outerHeight = true;
		
		// function to be called whenever the window is scrolled or resized
		function update(){
			var pos = $window.scrollTop();				

			$this.each(function(){
				var $element = $(this);
				var top = $element.offset().top;
				var height = getHeight($element);

				// Check if totally above or totally below viewport
				if (top + height < pos || top > pos + windowHeight) {
					return;
				}

				$this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
			});
		}		

		$window.bind('scroll', update).resize(update);
		update();
	};
})(jQuery);
 

// Generated by CoffeeScript 1.4.0

/*
countdown is a simple jquery plugin for countdowns

Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
and GPL-3.0 (http://opensource.org/licenses/GPL-3.0) licenses.

@source: http://github.com/rendro/countdown/
@autor: Robert Fleischmann
@version: 1.0.1
*/


(function() {

  (function($) {
    $.countdown = function(el, options) {
      var getDateData,
        _this = this;
      this.el = el;
      this.$el = $(el);
      this.$el.data("countdown", this);
      this.init = function() {
        _this.options = $.extend({}, $.countdown.defaultOptions, options);
        if (_this.options.refresh) {
          _this.interval = setInterval(function() {
            return _this.render();
          }, _this.options.refresh);
        }
        _this.render();
        return _this;
      };
      getDateData = function(endDate) {
        var dateData, diff;
        endDate = Date.parse($.isPlainObject(_this.options.date) ? _this.options.date : new Date(_this.options.date));
        diff = (endDate - Date.parse(new Date)) / 1000;
        if (diff <= 0) {
          diff = 0;
          if (_this.interval) {
            _this.stop();
          }
          _this.options.onEnd.apply(_this);
        }
        dateData = {
          years: 0,
          days: 0,
          hours: 0,
          min: 0,
          sec: 0,
          millisec: 0
        };
        if (diff >= (365.25 * 86400)) {
          dateData.years = Math.floor(diff / (365.25 * 86400));
          diff -= dateData.years * 365.25 * 86400;
        }
        if (diff >= 86400) {
          dateData.days = Math.floor(diff / 86400);
          diff -= dateData.days * 86400;
        }
        if (diff >= 3600) {
          dateData.hours = Math.floor(diff / 3600);
          diff -= dateData.hours * 3600;
        }
        if (diff >= 60) {
          dateData.min = Math.floor(diff / 60);
          diff -= dateData.min * 60;
        }
        dateData.sec = diff;
        return dateData;
      };
      this.leadingZeros = function(num, length) {
        if (length == null) {
          length = 2;
        }
        num = String(num);
        while (num.length < length) {
          num = "0" + num;
        }
        return num;
      };
      this.update = function(newDate) {
        _this.options.date = newDate;
        return _this;
      };
      this.render = function() {
        _this.options.render.apply(_this, [getDateData(_this.options.date)]);
        return _this;
      };
      this.stop = function() {
        if (_this.interval) {
          clearInterval(_this.interval);
        }
        _this.interval = null;
        return _this;
      };
      this.start = function(refresh) {
        if (refresh == null) {
          refresh = _this.options.refresh || $.countdown.defaultOptions.refresh;
        }
        if (_this.interval) {
          clearInterval(_this.interval);
        }
        _this.render();
        _this.options.refresh = refresh;
        _this.interval = setInterval(function() {
          return _this.render();
        }, _this.options.refresh);
        return _this;
      };
      return this.init();
    };
    $.countdown.defaultOptions = {
      date: "June 7, 2087 15:03:25",
      refresh: 1000,
      onEnd: $.noop,
      render: function(date) {
        return $(this.el).html("" + date.years + " years, " + date.days + " days, " + (this.leadingZeros(date.hours)) + " hours, " + (this.leadingZeros(date.min)) + " min and " + (this.leadingZeros(date.sec)) + " sec");
      }
    };
    $.fn.countdown = function(options) {
      return $.each(this, function(i, el) {
        var $el;
        $el = $(el);
        if (!$el.data('countdown')) {
          return $el.data('countdown', new $.countdown(el, options));
        }
      });
    };
    return void 0;
  })(jQuery);

}).call(this);


/*global jQuery */
/*!
* FitText.js 1.1
*
* Copyright 2011, Dave Rupert http://daverupert.com
* Released under the WTFPL license
* http://sam.zoy.org/wtfpl/
*
* Date: Thu May 05 14:23:00 2011 -0600
*/

(function( $ ){

  $.fn.fitText = function( kompressor, options ) {

    // Setup options
    var compressor = kompressor || 1,
        settings = $.extend({
          'minFontSize' : Number.NEGATIVE_INFINITY,
          'maxFontSize' : Number.POSITIVE_INFINITY
        }, options);

    return this.each(function(){

      // Store the object
      var $this = $(this);

      // Resizer() resizes items based on the object width divided by the compressor * 10
      var resizer = function () {
        $this.css('font-size', Math.max(Math.min($this.width() / (compressor*10), parseFloat(settings.maxFontSize)), parseFloat(settings.minFontSize)));
      };

      // Call once to set.
      resizer();

      // Call on resize. Opera debounces their resize by default.
      $(window).on('resize.fittext orientationchange.fittext', resizer);

    });

  };

})( jQuery );


/**
 * jQuery.marquee - scrolling text horizontally
 * Date: 11/01/2013
 * @author Aamir Afridi - aamirafridi(at)gmail(dot)com / http://aamirafridi.com/jquery/jquery-marquee-plugin
 */
 (function(e){e.fn.marquee=function(t){return this.each(function(){function d(e){var t=[];for(var n in e){if(e.hasOwnProperty(n)){t.push(n+":"+e[n])}}t.push();return"{"+t.join(",")+"}"}function v(){if(l&&n.allowCss3Support){return i.css(f,"paused")}if(e.fn.pause){i.pause();r.trigger("paused")}}function m(){if(l&&n.allowCss3Support){return i.css(f,"running")}if(e.fn.resume){i.resume();r.trigger("resumed")}}var n=e.extend({},e.fn.marquee.defaults,t),r=e(this),i,s,o,u,a,f="animation-play-state",l=false;if(typeof r.data().delaybeforestart!=="undefined"){r.data().delayBeforeStart=r.data().delaybeforestart;delete r.data().delaybeforestart}if(typeof r.data().pauseonhover!=="undefined"){r.data().pauseOnHover=r.data().pauseonhover;delete r.data().pauseonhover}if(typeof r.data().pauseoncycle!=="undefined"){r.data().pauseOnCycle=r.data().pauseoncycle;delete r.data().pauseoncycle}if(typeof r.data().allowcss3support!=="undefined"){r.data().allowCss3Support=r.data().allowcss3support;delete r.data().allowcss3support}n=e.extend({},n,r.data());n.duration=n.speed||n.duration;u=n.direction=="up"||n.direction=="down";n.gap=n.duplicated?n.gap:0;r.wrapInner('<div class="js-marquee"></div>');var c=r.find(".js-marquee").css({"margin-right":n.gap,"float":"left"});if(n.duplicated){c.clone().appendTo(r)}r.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>');i=r.find(".js-marquee-wrapper");if(u){var h=r.height();i.removeAttr("style");r.height(h);r.find(".js-marquee").css({"float":"none","margin-bottom":n.gap,"margin-right":0});if(n.duplicated)r.find(".js-marquee:last").css({"margin-bottom":0});var p=r.find(".js-marquee:first").height()+n.gap;n.duration=(parseInt(p,10)+parseInt(h,10))/parseInt(h,10)*n.duration}else{a=r.find(".js-marquee:first").width()+n.gap;s=r.width();n.duration=(parseInt(a,10)+parseInt(s,10))/parseInt(s,10)*n.duration}if(n.duplicated){n.duration=n.duration/2}if(n.allowCss3Support){var g=document.createElement("div"),y="animation",b="marqueeAnimation-"+Math.floor(Math.random()*1e7),w="Webkit Moz O ms Khtml".split(" "),E="",S="",x=e("style"),T="";if(g.style.animationCssStr){l=true}if(l===false){for(var N=0;N<w.length;N++){if(g.style[w[N]+"AnimationName"]!==undefined){var C="-"+w[N].toLowerCase()+"-";E=C+"animation";f=C+f;T="@"+C+"keyframes "+b+" ";l=true;break}}}if(l){S=b+" "+n.duration/1e3+"s "+n.delayBeforeStart/1e3+"s infinite "+n.css3easing;}}var k=function(){if(u){if(n.duplicated){i.css("margin-top",n.direction=="up"?0:"-"+p+"px");o={"margin-top":n.direction=="up"?"-"+p+"px":0}}else{i.css("margin-top",n.direction=="up"?h+"px":"-"+p+"px");o={"margin-top":n.direction=="up"?"-"+i.height()+"px":h+"px"}}}else{if(n.duplicated){i.css("margin-left",n.direction=="left"?0:"-"+a+"px");o={"margin-left":n.direction=="left"?"-"+a+"px":0}}else{i.css("margin-left",n.direction=="left"?s+"px":"-"+a+"px");o={"margin-left":n.direction=="left"?"-"+a+"px":s+"px"}}}r.trigger("beforeStarting");if(l){i.css(E,S);var t=T+" { 100%  "+d(o)+"}";if(x.length!=0){x.last().append(t)}else{e("head").append("<style>"+t+"</style>")}}else{i.animate(o,n.duration,n.easing,function(){r.trigger("finished");if(n.pauseOnCycle){setTimeout(k,n.delayBeforeStart)}else{k()}})}};r.bind("pause",v);r.bind("resume",m);if(n.pauseOnHover){r.hover(v,m)}if(l&&n.allowCss3Support){k()}else{setTimeout(k,n.delayBeforeStart)}})};e.fn.marquee.defaults={allowCss3Support:true,css3easing:"linear",easing:"linear",delayBeforeStart:0,direction:"left",duplicated:false,duration:5e3,gap:20,pauseOnCycle:false,pauseOnHover:false}})(jQuery);
 
 /*global jQuery */
/*!	
* Lettering.JS 0.6.1
*
* Copyright 2010, Dave Rupert http://daverupert.com
* Released under the WTFPL license 
* http://sam.zoy.org/wtfpl/
*
* Thanks to Paul Irish - http://paulirish.com - for the feedback.
*
* Date: Mon Sep 20 17:14:00 2010 -0600
*/
(function($){
	function injector(t, splitter, klass, after) {
		var a = t.text().split(splitter), inject = '';
		if (a.length) {
			$(a).each(function(i, item) {
				inject += '<span class="'+klass+(i+1)+'">'+item+'</span>'+after;
			});	
			t.empty().append(inject);
		}
	}
	
	var methods = {
		init : function() {

			return this.each(function() {
				injector($(this), '', 'char', '');
			});

		},

		words : function() {

			return this.each(function() {
				injector($(this), ' ', 'word', ' ');
			});

		},
		
		lines : function() {

			return this.each(function() {
				var r = "eefec303079ad17405c889e092e105b0";
				// Because it's hard to split a <br/> tag consistently across browsers,
				// (*ahem* IE *ahem*), we replaces all <br/> instances with an md5 hash 
				// (of the word "split").  If you're trying to use this plugin on that 
				// md5 hash string, it will fail because you're being ridiculous.
				injector($(this).children("br").replaceWith(r).end(), r, 'line', '');
			});

		}
	};

	$.fn.lettering = function( method ) {
		// Method calling logic
		if ( method && methods[method] ) {
			return methods[ method ].apply( this, [].slice.call( arguments, 1 ));
		} else if ( method === 'letters' || ! method ) {
			return methods.init.apply( this, [].slice.call( arguments, 0 ) ); // always pass an array
		}
		$.error( 'Method ' +  method + ' does not exist on jQuery.lettering' );
		return this;
	};

})(jQuery);

/*global jQuery */
/*!	
* Lettering.JS 0.6.1
*
* Copyright 2010, Dave Rupert http://daverupert.com
* Released under the WTFPL license 
* http://sam.zoy.org/wtfpl/
*
* Thanks to Paul Irish - http://paulirish.com - for the feedback.
*
* Date: Mon Sep 20 17:14:00 2010 -0600
*/
(function($){
	function injector(t, splitter, klass, after) {
		var a = t.text().split(splitter), inject = '';
		if (a.length) {
			$(a).each(function(i, item) {
				inject += '<span class="'+klass+(i+1)+'">'+item+'</span>'+after;
			});	
			t.empty().append(inject);
		}
	}
	
	var methods = {
		init : function() {

			return this.each(function() {
				injector($(this), '', 'char', '');
			});

		},

		words : function() {

			return this.each(function() {
				injector($(this), ' ', 'word', ' ');
			});

		},
		
		lines : function() {

			return this.each(function() {
				var r = "eefec303079ad17405c889e092e105b0";
				// Because it's hard to split a <br/> tag consistently across browsers,
				// (*ahem* IE *ahem*), we replaces all <br/> instances with an md5 hash 
				// (of the word "split").  If you're trying to use this plugin on that 
				// md5 hash string, it will fail because you're being ridiculous.
				injector($(this).children("br").replaceWith(r).end(), r, 'line', '');
			});

		}
	};

	$.fn.lettering = function( method ) {
		// Method calling logic
		if ( method && methods[method] ) {
			return methods[ method ].apply( this, [].slice.call( arguments, 1 ));
		} else if ( method === 'letters' || ! method ) {
			return methods.init.apply( this, [].slice.call( arguments, 0 ) ); // always pass an array
		}
		$.error( 'Method ' +  method + ' does not exist on jQuery.lettering' );
		return this;
	};

})(jQuery);
 
 /*
 * textillate.js
 * http://jschr.github.com/textillate
 * MIT licensed
 *
 * Copyright (C) 2012-2013 Jordan Schroter
 */ 
(function ($) {
  "use strict"; 

  function isInEffect (effect) {
    return /In/.test(effect) || $.inArray(effect, $.fn.textillate.defaults.inEffects) >= 0;
  };

  function isOutEffect (effect) {
    return /Out/.test(effect) || $.inArray(effect, $.fn.textillate.defaults.outEffects) >= 0;
  };

  // custom get data api method
  function getData (node) {
    var attrs = node.attributes || []
      , data = {};

    if (!attrs.length) return data;

    $.each(attrs, function (i, attr) {
      if (/^data-in-*/.test(attr.nodeName)) {
        data.in = data.in || {};
        data.in[attr.nodeName.replace(/data-in-/, '')] = attr.nodeValue;
      } else if (/^data-out-*/.test(attr.nodeName)) {
        data.out = data.out || {};
        data.out[attr.nodeName.replace(/data-out-/, '')] = attr.nodeValue;
      } else if (/^data-*/.test(attr.nodeName)) {
        data[attr.nodeName] = attr.nodeValue;
      }
    })

    return data;
  }

  function shuffle (o) {
      for (var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
      return o;
  }

  function animate ($c, effect, cb) {
    $c.addClass('animated ' + effect)
      .css('visibility', 'visible')
      .show();

    $c.one('animationend webkitAnimationEnd oAnimationEnd', function () {
        $c.removeClass('animated ' + effect);
        cb && cb();
    });
  }

  function animateChars ($chars, options, cb) {
    var that = this
      , count = $chars.length;

    if (!count) {
      cb && cb();
      return;
    } 

    if (options.shuffle) $chars = shuffle($chars);
    if (options.reverse) $chars = $chars.toArray().reverse();

    $.each($chars, function (i, c) {
      var $char = $(c);
      
      function complete () {
        if (isInEffect(options.effect)) {
          $char.css('visibility', 'visible');
        } else if (isOutEffect(options.effect)) {
          $char.css('visibility', 'hidden');
        }
        count -= 1;
        if (!count && cb) cb();
      }

      var delay = options.sync ? options.delay : options.delay * i * options.delayScale;

      $char.text() ? 
        setTimeout(function () { animate($char, options.effect, complete) }, delay) :
        complete();
    });
  };

  var Textillate = function (element, options) {
    var base = this
      , $element = $(element);

    base.init = function () {
      base.$texts = $element.find(options.selector);
      
      if (!base.$texts.length) {
        base.$texts = $('<ul class="texts"><li>' + $element.html() + '</li></ul>');
        $element.html(base.$texts);
      }

      base.$texts.hide();

      base.$current = $('<span>')
        .text(base.$texts.find(':first-child').html())
        .prependTo($element);

      if (isInEffect(options.effect)) {
        base.$current.css('visibility', 'hidden');
      } else if (isOutEffect(options.effect)) {
        base.$current.css('visibility', 'visible');
      }

      base.setOptions(options);

      setTimeout(function () {
        base.options.autoStart && base.start();
      }, base.options.initialDelay)
    };

    base.setOptions = function (options) {
      base.options = options;
    };

    base.triggerEvent = function (name) {
      var e = $.Event(name + '.tlt');
      $element.trigger(e, base);
      return e;
    };

    base.in = function (index, cb) {
      index = index || 0;
       
      var $elem = base.$texts.find(':nth-child(' + (index + 1) + ')')
        , options = $.extend({}, base.options, getData($elem))
        , $chars;

      $elem.addClass('current');

      base.triggerEvent('inAnimationBegin');

      base.$current
        .text($elem.html())
        .lettering('words');

      base.$current.find('[class^="word"]')
          .css({ 
            'display': 'inline-block',
            // fix for poor ios performance
            '-webkit-transform': 'translate3d(0,0,0)',
               '-moz-transform': 'translate3d(0,0,0)',
                 '-o-transform': 'translate3d(0,0,0)',
                    'transform': 'translate3d(0,0,0)'
          })
          .each(function () { $(this).lettering() });

      $chars = base.$current
        .find('[class^="char"]')
        .css('display', 'inline-block');

      if (isInEffect(options.in.effect)) {
        $chars.css('visibility', 'hidden');
      } else if (isOutEffect(options.in.effect)) {
        $chars.css('visibility', 'visible');
      }

      base.currentIndex = index;

      animateChars($chars, options.in, function () {
        base.triggerEvent('inAnimationEnd');
        if (options.in.callback) options.in.callback();
        if (cb) cb(base);
      });
    };

    base.out = function (cb) {
      var $elem = base.$texts.find(':nth-child(' + (base.currentIndex + 1) + ')')
        , $chars = base.$current.find('[class^="char"]')
        , options = $.extend({}, base.options, getData($elem));

      base.triggerEvent('outAnimationBegin');

      animateChars($chars, options.out, function () {
        $elem.removeClass('current');
        base.triggerEvent('outAnimationEnd');
        if (options.out.callback) options.out.callback();
        if (cb) cb(base);
      });
    };

    base.start = function (index) {
      base.triggerEvent('start');

      (function run (index) {
        base.in(index, function () {
          var length = base.$texts.children().length;

          index += 1;
          
          if (!base.options.loop && index >= length) {
            if (base.options.callback) base.options.callback();
            base.triggerEvent('end');
          } else {
            index = index % length;

            setTimeout(function () {
              base.out(function () {
                run(index)
              });
            }, base.options.minDisplayTime);
          }
        });
      }(index || 0));
    };

    base.init();
  }

  $.fn.textillate = function (settings, args) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('textillate')
        , options = $.extend(true, {}, $.fn.textillate.defaults, getData(this), typeof settings == 'object' && settings);

      if (!data) { 
        $this.data('textillate', (data = new Textillate(this, options)));
      } else if (typeof settings == 'string') {
        data[settings].apply(data, [].concat(args));
      } else {
        data.setOptions.call(data, options);
      }
    })
  };
  
  $.fn.textillate.defaults = {
    selector: '.texts',
    loop: false,
    minDisplayTime: 2000,
    initialDelay: 0,
    in: {
      effect: 'fadeInLeftBig',
      delayScale: 1.5,
      delay: 50,
      sync: false,
      reverse: false,
      shuffle: false,
      callback: function () {}
    },
    out: {
      effect: 'hinge',
      delayScale: 1.5,
      delay: 50,
      sync: false,
      reverse: false,
      shuffle: false,
      callback: function () {}
    },
    autoStart: true,
    inEffects: [],
    outEffects: [ 'hinge' ],
    callback: function () {}
  };

}(jQuery));
 


// Queness Before & After jQuery Plugin 
// Created by Kevin Liew from Queness.com
// Permission is given to use this plugin in whatever way you want :)

	(function($){
    $.fn.extend({
        //plugin name - qbeforeafter
        qbeforeafter: function(options) {
 
            var defaults = {
            	defaultgap: 50,            
            	leftgap: 10,
            	rightgap: 10,
            	caption: false,
            	reveal: 0.5
            };
             
            var options = $.extend(defaults, options);
         
            return this.each(function() {

	            var o = options;
	            var i = $(this);
				var img_mask = i.children('img:eq(0)').attr('src');
				var img_bg = i.children('img:eq(1)').attr('src');
				var img_cap_one = i.children('img:eq(0)').attr('alt');
			
				var width = i.children('img:eq(0)').width();
				var height = i.children('img:eq(0)').height();
				
				i.children('img').hide();		
				
				i.css({'overflow': 'hidden', 'position': 'relative'});
				i.append('<div class="ba-mask"></div>');
				i.append('<div class="ba-bg"></div>');			
				i.append('<div class="ba-caption">' + img_cap_one + '</div>');
				
				i.children('.ba-mask, .ba-bg').width(width);
				i.children('.ba-mask, .ba-bg').height(height);
				i.children('.ba-mask').animate({'width':width - o.defaultgap}, 1000);
			
				i.children('.ba-mask').css('backgroundImage','url(' + img_mask + ')');
				i.children('.ba-bg').css('backgroundImage','url(' + img_bg + ')');	

				if (o.caption) i.children('.ba-caption').show();

            }).mousemove(function (e) {

				var o = options;
				var i = $(this);
				
				pos_img = i.offset()['left'];
				pos_mouse = e.pageX;		
				new_width = pos_mouse - pos_img;
				img_width = i.width();
				img_cap_one = i.children('img:eq(0)').attr('alt');
				img_cap_two = i.children('img:eq(1)').attr('alt');				

				if (new_width > o.leftgap && new_width < (img_width - o.rightgap)) {			
					i.children('.ba-mask').width(new_width);
				}
				
				if (new_width < (img_width * o.reveal)) {			
					i.children('.ba-caption').html(img_cap_two);
				} else {
					i.children('.ba-caption').html(img_cap_one);			
				}					
			
			});
        }
    });
	})(jQuery);	




/*! Copyright (c) 2011 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.0.6
 * 
 * Requires: 1.2.2+
 */

(function($) {

var types = ['DOMMouseScroll', 'mousewheel'];

if ($.event.fixHooks) {
    for ( var i=types.length; i; ) {
        $.event.fixHooks[ types[--i] ] = $.event.mouseHooks;
    }
}

$.event.special.mousewheel = {
    setup: function() {
        if ( this.addEventListener ) {
            for ( var i=types.length; i; ) {
                this.addEventListener( types[--i], handler, false );
            }
        } else {
            this.onmousewheel = handler;
        }
    },
    
    teardown: function() {
        if ( this.removeEventListener ) {
            for ( var i=types.length; i; ) {
                this.removeEventListener( types[--i], handler, false );
            }
        } else {
            this.onmousewheel = null;
        }
    }
};

$.fn.extend({
    mousewheel: function(fn) {
        return fn ? this.bind("mousewheel", fn) : this.trigger("mousewheel");
    },
    
    unmousewheel: function(fn) {
        return this.unbind("mousewheel", fn);
    }
});


function handler(event) {
    var orgEvent = event || window.event, args = [].slice.call( arguments, 1 ), delta = 0, returnValue = true, deltaX = 0, deltaY = 0;
    event = $.event.fix(orgEvent);
    event.type = "mousewheel";
    
    // Old school scrollwheel delta
    if ( orgEvent.wheelDelta ) { delta = orgEvent.wheelDelta/120; }
    if ( orgEvent.detail     ) { delta = -orgEvent.detail/3; }
    
    // New school multidimensional scroll (touchpads) deltas
    deltaY = delta;
    
    // Gecko
    if ( orgEvent.axis !== undefined && orgEvent.axis === orgEvent.HORIZONTAL_AXIS ) {
        deltaY = 0;
        deltaX = -1*delta;
    }
    
    // Webkit
    if ( orgEvent.wheelDeltaY !== undefined ) { deltaY = orgEvent.wheelDeltaY/120; }
    if ( orgEvent.wheelDeltaX !== undefined ) { deltaX = -1*orgEvent.wheelDeltaX/120; }
    
    // Add event and delta to the front of the arguments
    args.unshift(event, delta, deltaX, deltaY);
    
    return ($.event.dispatch || $.event.handle).apply(this, args);
}

})(jQuery);




/*!
 * jquery.typer.js 0.0.4 - https://github.com/yckart/jquery.typer.js
 * The typewriter effect
 *
 * Copyright (c) 2013 Yannick Albert (http://yckart.com)
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php).
 * 2013/03/24
*/
(function($){
    $.fn.typer = function(text, options){
        options = $.extend({}, {
            char: '',
            delay: 2000,
            duration: 600,
            endless: true,
            onType: $.noop,
            afterAll: $.noop,
            afterPhrase: $.noop
        }, options || text);

        text = $.isPlainObject(text) ? options.text : text;
        text = $.isArray(text) ? text : text.split(" ");

        return this.each(function(){
            var elem = $(this),
                isVal = {input:1, textarea:1}[this.tagName.toLowerCase()],
                isTag = false,
                timer,
                c = 0;

            (function typetext(i) {
                var e = ({string:1, number:1}[typeof text] ? text : text[i]) + '',
                    char = e.substr(c++, 1);

                if( char === '<' ){ isTag = true; }
                if( char === '>' ){ isTag = false; }
                elem[isVal ? "val" : "html"](e.substr(0, c) + ($.isFunction(options.char) ? options.char() : options.char || ' '));
                if(c <= e.length){
                    if( isTag ){
                        typetext(i);
                    } else {
                        timer = setTimeout(typetext, options.duration/10, i);
                    }
                    options.onType(timer);
                } else {
                    c = 0;
                    i++;

                    if (i === text.length && !options.endless) {
                        return;
                    } else if (i === text.length) {
                        i = 0;
                    }
                    timer = setTimeout(typetext, options.delay, i);
                    if(i === text.length - 1) options.afterAll(timer);
                    options.afterPhrase(timer);
                }
            })(0);
        });
    };
}(jQuery));






/*! sly 1.1.0 - 10th Sep 2013 | https://github.com/Darsain/sly */
(function(h,y,sa){function oa(f,ia,m){var ta,u,ua,z,M,y,U,pa;function ca(){var a=0,j=0,b=v.length;e.old=h.extend({},e);s=F?0:C[c.horizontal?"width":"height"]();N=I[c.horizontal?"width":"height"]();n=F?f:r[c.horizontal?"outerWidth":"outerHeight"]();v.length=0;e.start=0;e.end=Math.max(n-s,0);if(D){j=k.length;A=r.children(c.itemSelector);k.length=0;var Da=da(r,c.horizontal?"paddingLeft":"paddingTop"),ia=da(r,c.horizontal?"paddingRight":"paddingBottom"),Ea=da(A,c.horizontal?"marginLeft":"marginTop"),
a=da(A.slice(-1),c.horizontal?"marginRight":"marginBottom"),l=0,q="none"!==A.css("float"),a=Ea?0:a;n=0;A.each(function(a,b){var j=h(b),d=j[c.horizontal?"outerWidth":"outerHeight"](!0),K=da(j,c.horizontal?"marginLeft":"marginTop"),j=da(j,c.horizontal?"marginRight":"marginBottom"),e={el:b,size:d,half:d/2,start:n-(!a||c.horizontal?0:K),center:n-Math.round(s/2-d/2),end:n-s+d-(Ea?0:j)};a||(l=-(J?Math.round(s/2-d/2):0)+Da,n+=Da);n+=d;!c.horizontal&&!q&&j&&(K&&0<a)&&(n-=Math.min(K,j));a===A.length-1&&(n+=
ia);k.push(e)});r[0].style[c.horizontal?"width":"height"]=n+"px";n-=a;e.start=l;e.end=J?k.length?k[k.length-1].center:l:Math.max(n-s,0)}e.center=Math.round(e.end/2+e.start/2);h.extend(g,va(void 0));B.length&&0<N&&(c.dynamicHandle?(O=J?k.length?N*s/(s+k[k.length-1].center-k[0].center):N:N*s/n,O=w(Math.round(O),c.minHandleSize,N),B[0].style[c.horizontal?"width":"height"]=O+"px"):O=B[c.horizontal?"outerWidth":"outerHeight"](),p.end=N-O,V||na());if(!F&&0<s){var m=e.start,a="";if(D)h.each(k,function(a,
j){if(J||j.start+j.size>m)m=j[J?"center":"start"],v.push(m),m+=s});else for(;m-s<e.end;)v.push(m),m+=s;if(W[0]&&b!==v.length){for(b=0;b<v.length;b++)a+=c.pageBuilder.call(d,b);ja=W.html(a).children();ja.eq(g.activePage).addClass(c.activeClass)}}g.slideeSize=n;g.frameSize=s;g.sbSize=N;g.handleSize=O;if(D){if(d.initialized){if(g.activeItem>=k.length||0===j&&0<k.length)qa(0<k.length?k.length-1:0)}else qa(c.startAt),d[P?"toCenter":"toStart"](c.startAt);G(w(e.dest,e.start,e.end))}else d.initialized?G(w(e.dest,
e.start,e.end)):G(c.startAt,1);x("load")}function G(a,j,K){if(D&&b.released&&!K){K=va(a);var f=a>e.start&&a<e.end;P?(f&&(a=k[K.centerItem].center),J&&c.activateMiddle&&qa(K.centerItem)):f&&(a=k[K.firstItem].start)}b.init&&b.slidee&&c.elasticBounds?a>e.end?a=e.end+(a-e.end)/6:a<e.start&&(a=e.start+(a-e.start)/6):a=w(a,e.start,e.end);ta=+new Date;u=0;ua=e.cur;z=a;M=a-e.cur;y=b.tweese||b.init&&!b.slidee;U=!y&&(j||b.init&&b.slidee||!c.speed);b.tweese=0;a!==e.dest&&(e.dest=a,x("change"),V||ba());b.released&&
!d.isPaused&&d.resume();h.extend(g,va(void 0));Fa();ja[0]&&q.page!==g.activePage&&(q.page=g.activePage,ja.removeClass(c.activeClass).eq(g.activePage).addClass(c.activeClass),x("activePage",q.page))}function ba(){V?(U?e.cur=z:y?(pa=z-e.cur,e.cur=0.1>Math.abs(pa)?z:e.cur+pa*(b.released?c.swingSpeed:c.syncSpeed)):(u=Math.min(+new Date-ta,c.speed),e.cur=ua+M*jQuery.easing[c.easing](u/c.speed,u,0,1,c.speed)),z===e.cur?(e.cur=z,b.tweese=V=0):V=ka(ba),x("move"),F||(H?r[0].style[H]=la+(c.horizontal?"translateX":
"translateY")+"("+-e.cur+"px)":r[0].style[c.horizontal?"left":"top"]=-Math.round(e.cur)+"px"),!V&&b.released&&x("moveEnd"),na()):(V=ka(ba),b.released&&x("moveStart"))}function na(){B.length&&(p.cur=e.start===e.end?0:((b.init&&!b.slidee?e.dest:e.cur)-e.start)/(e.end-e.start)*p.end,p.cur=w(Math.round(p.cur),p.start,p.end),q.hPos!==p.cur&&(q.hPos=p.cur,H?B[0].style[H]=la+(c.horizontal?"translateX":"translateY")+"("+p.cur+"px)":B[0].style[c.horizontal?"left":"top"]=p.cur+"px"))}function Ga(){(!t.speed||
e.cur===(0<t.speed?e.end:e.start))&&d.stop();Ha=b.init?ka(Ga):0;t.now=+new Date;t.pos=e.cur+(t.now-t.lastTime)/1E3*t.speed;G(b.init?t.pos:Math.round(t.pos));!b.init&&e.cur===e.dest&&x("moveEnd");t.lastTime=t.now}function wa(a,j,b){"boolean"===Q(j)&&(b=j,j=sa);j===sa?G(e[a],b):P&&"center"!==a||(j=d.getPos(j))&&G(j[a],b,!P)}function ra(a){return"undefined"!==Q(a)?R(a)?0<=a&&a<k.length?a:-1:A.index(a):-1}function xa(a){return ra(R(a)&&0>a?a+k.length:a)}function qa(a){a=ra(a);if(!D||0>a)return!1;q.active!==
a&&(A.eq(g.activeItem).removeClass(c.activeClass),A.eq(a).addClass(c.activeClass),q.active=g.activeItem=a,Fa(),x("active",a));return a}function va(a){a=w(R(a)?a:e.dest,e.start,e.end);var j={},b=J?0:s/2;if(!F)for(var c=0,d=v.length;c<d;c++){if(a>=e.end||c===v.length-1){j.activePage=v.length-1;break}if(a<=v[c]+b){j.activePage=c;break}}if(D){for(var d=c=b=!1,f=0,g=k.length;f<g;f++)if(!1===b&&a<=k[f].start+k[f].half&&(b=f),!1===d&&a<=k[f].center+k[f].half&&(d=f),f===g-1||a<=k[f].end+k[f].half){c=f;break}j.firstItem=
R(b)?b:0;j.centerItem=R(d)?d:j.firstItem;j.lastItem=R(c)?c:j.centerItem}return j}function Fa(){var a=e.dest<=e.start,j=e.dest>=e.end,d=a?1:j?2:3;q.slideePosState!==d&&(q.slideePosState=d,X.is("button,input")&&X.prop("disabled",a),Y.is("button,input")&&Y.prop("disabled",j),X.add(ea)[a?"addClass":"removeClass"](c.disabledClass),Y.add(Z)[j?"addClass":"removeClass"](c.disabledClass));q.fwdbwdState!==d&&b.released&&(q.fwdbwdState=d,ea.is("button,input")&&ea.prop("disabled",a),Z.is("button,input")&&Z.prop("disabled",
j));D&&(a=0===g.activeItem,j=g.activeItem>=k.length-1,d=a?1:j?2:3,q.itemsButtonState!==d&&(q.itemsButtonState=d,$.is("button,input")&&$.prop("disabled",a),aa.is("button,input")&&aa.prop("disabled",j),$[a?"addClass":"removeClass"](c.disabledClass),aa[j?"addClass":"removeClass"](c.disabledClass)))}function Ia(a,b,c){a=xa(a);b=xa(b);if(-1<a&&-1<b&&a!==b&&(!c||b!==a-1)&&(c||b!==a+1)){A.eq(a)[c?"insertAfter":"insertBefore"](k[b].el);var d=a<b?a:c?b:b-1,e=a>b?a:c?b+1:b,f=a>b;a===g.activeItem?q.active=g.activeItem=
c?f?b+1:b:f?b:b-1:g.activeItem>d&&g.activeItem<e&&(q.active=g.activeItem+=f?1:-1);ca()}}function Ja(a,b){for(var c=0,d=E[a].length;c<d;c++)if(E[a][c]===b)return c;return-1}function Ka(a){return Math.round(w(a,p.start,p.end)/p.end*(e.end-e.start))+e.start}function Ba(){b.history[0]=b.history[1];b.history[1]=b.history[2];b.history[2]=b.history[3];b.history[3]=b.delta}function La(a){b.released=0;b.source=a;b.slidee="slidee"===a}function Ma(a){if(!b.init){var d="touchstart"===a.type,f=a.data.source,g=
"slidee"===f;if(!("handle"===f&&(!c.dragHandle||p.start===p.end)))if(!g||(d?c.touchDragging:c.mouseDragging&&2>a.which))d||L(a,1),La(f),b.$source=h(a.target),b.init=0,b.touch=d,b.pointer=d?a.originalEvent.touches[0]:a,b.initX=b.pointer.pageX,b.initY=b.pointer.pageY,b.initPos=g?e.cur:p.cur,b.start=+new Date,b.time=0,b.path=0,b.pathToInit=g?d?50:10:0,b.history=[0,0,0,0],b.initLoc=b[c.horizontal?"initX":"initY"],b.deltaMin=g?-b.initLoc:-p.cur,b.deltaMax=g?document[c.horizontal?"width":"height"]-b.initLoc:
p.end-p.cur,(g?r:B).addClass(c.draggedClass),fa.on(d?Na:Oa,Pa),g&&(Qa=setInterval(Ba,10))}}function Pa(a){b.released="mouseup"===a.type||"touchend"===a.type;b.pointer=b.touch?a.originalEvent[b.released?"changedTouches":"touches"][0]:a;b.pathX=b.pointer.pageX-b.initX;b.pathY=b.pointer.pageY-b.initY;b.pathTotal=Math.sqrt(Math.pow(b.pathX,2)+Math.pow(b.pathY,2));b.delta=w(c.horizontal?b.pathX:b.pathY,b.deltaMin,b.deltaMax);if(!b.init&&b.pathTotal>b.pathToInit){if(b.slidee){if(c.horizontal?Math.abs(b.pathX)<
Math.abs(b.pathY):Math.abs(b.pathX)>Math.abs(b.pathY)){ya();return}b.$source.on(ga,Ra)}b.init=1;d.pause(1);x("moveStart")}b.init?(b.released?(b.touch||L(a),ya(),c.releaseSwing&&b.slidee&&(b.swing=300*((b.delta-b.history[0])/40),b.delta+=b.swing,b.tweese=10<Math.abs(b.swing))):L(a),G(b.slidee?Math.round(b.initPos-b.delta):Ka(b.initPos+b.delta))):b.released&&ya()}function ya(){clearInterval(Qa);fa.off(b.touch?Na:Oa,Pa);(b.slidee?r:B).removeClass(c.draggedClass);d.resume(1);e.cur===e.dest&&b.init&&x("moveEnd");
b.init=0}function Sa(){d.stop();fa.off("mouseup",Sa)}function ha(a){L(a);switch(this){case Z[0]:case ea[0]:d.moveBy(Z.is(this)?c.moveBy:-c.moveBy);fa.on("mouseup",Sa);break;case $[0]:d.prev();break;case aa[0]:d.next();break;case X[0]:d.prevPage();break;case Y[0]:d.nextPage()}}function Ca(a){c.scrollBy&&e.start!==e.end&&(L(a,1),d.slideBy(c.scrollBy*w(-a.originalEvent.wheelDelta||a.originalEvent.detail||a.originalEvent.deltaY,-1,1)))}function Wa(a){c.clickBar&&a.target===I[0]&&(L(a),G(Ka((c.horizontal?
a.pageX-I.offset().left:a.pageY-I.offset().top)-O/2)))}function Xa(a){if(c.keyboardNavBy)switch(a.which){case c.horizontal?37:38:L(a);d["pages"===c.keyboardNavBy?"prevPage":"prev"]();break;case c.horizontal?39:40:L(a),d["pages"===c.keyboardNavBy?"nextPage":"next"]()}}function Ya(){this.parentNode===r[0]&&d.activate(this)}function Za(){this.parentNode===W[0]&&d.activatePage(ja.index(this))}function $a(a){if(c.pauseOnHover)d["mouseenter"===a.type?"pause":"resume"](2)}function x(a,b){if(E[a]){za=E[a].length;
for(S=Aa.length=0;S<za;S++)Aa.push(E[a][S]);for(S=0;S<za;S++)Aa[S].call(d,a,b)}}var c=h.extend({},oa.defaults,ia),d=this,F=R(f),C=h(f),r=C.children().eq(0),s=0,n=0,e={start:0,center:0,end:0,cur:0,dest:0},I=h(c.scrollBar).eq(0),B=I.children().eq(0),N=0,O=0,p={start:0,end:0,cur:0},W=h(c.pagesBar),ja=0,v=[],A=0,k=[],g={firstItem:0,lastItem:0,centerItem:0,activeItem:-1,activePage:0};ia="basic"===c.itemNav;var J="forceCentered"===c.itemNav,P="centered"===c.itemNav||J,D=!F&&(ia||P||J),Ta=c.scrollSource?
h(c.scrollSource):C,ab=c.dragSource?h(c.dragSource):C,Z=h(c.forward),ea=h(c.backward),$=h(c.prev),aa=h(c.next),X=h(c.prevPage),Y=h(c.nextPage),E={},q={};pa=U=y=M=z=ua=u=ta=void 0;var t={},b={released:1},V=0,Qa=0,T=0,Ha=0,S,za;F||(f=C[0]);d.initialized=0;d.frame=f;d.slidee=r[0];d.pos=e;d.rel=g;d.items=k;d.pages=v;d.isPaused=0;d.options=c;d.reload=ca;d.getPos=function(a){if(D)return a=ra(a),-1!==a?k[a]:!1;var b=r.find(a).eq(0);return b[0]?(a=c.horizontal?b.offset().left-r.offset().left:b.offset().top-
r.offset().top,b=b[c.horizontal?"outerWidth":"outerHeight"](),{start:a,center:a-s/2+b/2,end:a-s+b,size:b}):!1};d.moveBy=function(a){t.speed=a;if(!b.init&&t.speed&&e.cur!==(0<t.speed?e.end:e.start))t.lastTime=+new Date,t.startPos=e.cur,La("button"),b.init=1,x("moveStart"),ma(Ha),Ga()};d.stop=function(){"button"===b.source&&(b.init=0,b.released=1)};d.prev=function(){d.activate(g.activeItem-1)};d.next=function(){d.activate(g.activeItem+1)};d.prevPage=function(){d.activatePage(g.activePage-1)};d.nextPage=
function(){d.activatePage(g.activePage+1)};d.slideBy=function(a,b){if(D)d[P?"toCenter":"toStart"](w((P?g.centerItem:g.firstItem)+c.scrollBy*a,0,k.length));else G(e.dest+a,b)};d.slideTo=function(a,b){G(a,b)};d.toStart=function(a,b){wa("start",a,b)};d.toEnd=function(a,b){wa("end",a,b)};d.toCenter=function(a,b){wa("center",a,b)};d.getIndex=ra;d.activate=function(a,e){var f=qa(a);c.smart&&!1!==f&&(P?d.toCenter(f,e):f>=g.lastItem?d.toStart(f,e):f<=g.firstItem?d.toEnd(f,e):b.released&&!d.isPaused&&d.resume())};
d.activatePage=function(a,b){R(a)&&G(v[w(a,0,v.length-1)],b)};d.resume=function(a){if(c.cycleBy&&c.cycleInterval&&!("items"===c.cycleBy&&!k[0]||a<d.isPaused))d.isPaused=0,T?T=clearTimeout(T):x("resume"),T=setTimeout(function(){x("cycle");switch(c.cycleBy){case "items":d.activate(g.activeItem>=k.length-1?0:g.activeItem+1);break;case "pages":d.activatePage(g.activePage>=v.length-1?0:g.activePage+1)}},c.cycleInterval)};d.pause=function(a){a<d.isPaused||(d.isPaused=a||100,T&&(T=clearTimeout(T),x("pause")))};
d.toggle=function(){d[T?"pause":"resume"]()};d.set=function(a,b){h.isPlainObject(a)?h.extend(c,a):c.hasOwnProperty(a)&&(c[a]=b)};d.add=function(a,b){var c=h(a);D?("undefined"===Q(b)||!k[0]?c.appendTo(r):k.length&&c.insertBefore(k[b].el),b<=g.activeItem&&(q.active=g.activeItem+=c.length)):r.append(c);ca()};d.remove=function(a){if(D){if(a=xa(a),-1<a){A.eq(a).remove();var b=a===g.activeItem&&!(J&&c.activateMiddle);a<g.activeItem&&(q.active=--g.activeItem);ca();b&&(q.active=null,d.activate(g.activeItem))}}else h(a).remove(),
ca()};d.moveAfter=function(a,b){Ia(a,b,1)};d.moveBefore=function(a,b){Ia(a,b)};d.on=function(a,b){if("object"===Q(a))for(var c in a){if(a.hasOwnProperty(c))d.on(c,a[c])}else if("function"===Q(b)){c=a.split(" ");for(var e=0,f=c.length;e<f;e++)E[c[e]]=E[c[e]]||[],-1===Ja(c[e],b)&&E[c[e]].push(b)}else if("array"===Q(b)){c=0;for(e=b.length;c<e;c++)d.on(a,b[c])}};d.one=function(a,b){function c(){b.apply(d,arguments);d.off(a,c)}d.on(a,c)};d.off=function(a,b){if(b instanceof Array)for(var c=0,e=b.length;c<
e;c++)d.off(a,b[c]);else for(var c=a.split(" "),e=0,f=c.length;e<f;e++)if(E[c[e]]=E[c[e]]||[],"undefined"===Q(b))E[c[e]].length=0;else{var g=Ja(c[e],b);-1!==g&&E[c[e]].splice(g,1)}};d.destroy=function(){fa.add(Ta).add(B).add(I).add(W).add(Z).add(ea).add($).add(aa).add(X).add(Y).unbind("."+l);$.add(aa).add(X).add(Y).removeClass(c.disabledClass);A&&A.eq(g.activeItem).removeClass(c.activeClass);W.empty();F||(C.unbind("."+l),r.add(B).css(H||(c.horizontal?"left":"top"),H?"none":0),h.removeData(f,l));d.initialized=
0;return d};d.init=function(){if(!d.initialized){d.on(m);var a=B;F||(a=a.add(r),C.css("overflow","hidden"),!H&&"static"===C.css("position")&&C.css("position","relative"));H?la&&a.css(H,la):("static"===I.css("position")&&I.css("position","relative"),a.css({position:"absolute"}));if(c.forward)Z.on(Ua,ha);if(c.backward)ea.on(Ua,ha);if(c.prev)$.on(ga,ha);if(c.next)aa.on(ga,ha);if(c.prevPage)X.on(ga,ha);if(c.nextPage)Y.on(ga,ha);Ta.on("DOMMouseScroll."+l+" mousewheel."+l,Ca);if(I[0])I.on(ga,Wa);if(D&&
c.activateOn)C.on(c.activateOn+"."+l,"*",Ya);if(W[0]&&c.activatePageOn)W.on(c.activatePageOn+"."+l,"*",Za);ab.on(Va,{source:"slidee"},Ma);if(B)B.on(Va,{source:"handle"},Ma);fa.bind("keydown."+l,Xa);F||(C.on("mouseenter."+l+" mouseleave."+l,$a),C.on("scroll."+l,bb));ca();if(c.cycleBy&&!F)d[c.startPaused?"pause":"resume"]();d.initialized=1;return d}}}function Q(f){return null==f?String(f):"object"===typeof f||"function"===typeof f?Object.prototype.toString.call(f).match(/\s([a-z]+)/i)[1].toLowerCase()||
"object":typeof f}function L(f,h){f.preventDefault();h&&f.stopPropagation()}function Ra(f){L(f,1);h(this).off(f.type,Ra)}function bb(){this.scrollTop=this.scrollLeft=0}function R(f){return!isNaN(parseFloat(f))&&isFinite(f)}function da(f,h){return parseInt(f.css(h),10)||0}function w(f,h,m){return f<h?h:f>m?m:f}for(var l="sly",ma=y.cancelAnimationFrame||y.cancelRequestAnimationFrame,ka=y.requestAnimationFrame,H,la,fa=h(document),Va="touchstart."+l+" mousedown."+l,Oa="mousemove."+l+" mouseup."+l,Na=
"touchmove."+l+" touchend."+l,ga="click."+l,Ua="mousedown."+l,Aa=[],U=window,u=["moz","webkit","o"],na=0,M=0,Ba=u.length;M<Ba&&!ma;++M)ka=(ma=U[u[M]+"CancelAnimationFrame"]||U[u[M]+"CancelRequestAnimationFrame"])&&U[u[M]+"RequestAnimationFrame"];ma||(ka=function(f){var h=+new Date,m=Math.max(0,16-(h-na));na=h+m;return U.setTimeout(function(){f(h+m)},m)},ma=function(f){clearTimeout(f)});var u=function(f){for(var h=0,m=ba.length;h<m;h++){var l=ba[h]?ba[h]+f.charAt(0).toUpperCase()+f.slice(1):f;if(Ca.style[l]!==
sa)return l}},ba=["","webkit","moz","ms","o"],Ca=document.createElement("div");H=u("transform");la=u("perspective")?"translateZ(0) ":"";y.Sly=oa;h.fn.sly=function(f,u){var m,w;if(!h.isPlainObject(f)){if("string"===Q(f)||!1===f)m=!1===f?"destroy":f,w=Array.prototype.slice.call(arguments,1);f={}}return this.each(function(H,y){var z=h.data(y,l);!z&&!m?h.data(y,l,(new oa(y,f,u)).init()):z&&m&&z[m]&&z[m].apply(z,w)})};oa.defaults={horizontal:0,itemNav:null,itemSelector:null,smart:0,activateOn:null,activateMiddle:0,
scrollSource:null,scrollBy:0,dragSource:null,mouseDragging:0,touchDragging:0,releaseSwing:0,swingSpeed:0.2,elasticBounds:0,scrollBar:null,dragHandle:0,dynamicHandle:0,minHandleSize:50,clickBar:0,syncSpeed:0.5,pagesBar:null,activatePageOn:null,pageBuilder:function(f){return"<li>"+(f+1)+"</li>"},forward:null,backward:null,prev:null,next:null,prevPage:null,nextPage:null,cycleBy:null,cycleInterval:5E3,pauseOnHover:0,startPaused:0,moveBy:300,speed:0,easing:"swing",startAt:0,keyboardNavBy:null,draggedClass:"dragged",
activeClass:"active",disabledClass:"disabled"}})(jQuery,window);