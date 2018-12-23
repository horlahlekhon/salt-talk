var i=0;
function add_input(field,name)
	{
	var inn="<input type='text' name='"+name+"[]' /> Slider<br /><br />";
	jQuery("#"+field).append(inn);
	return false;
	}
window.send_to_editor = function(html) 
	{
 	imgurl = jQuery('img',html).attr('src');
 	jQuery('.upload_image').val(imgurl);
 	tb_remove();
	}
function filter_list(name)
	{		
	jQuery(".image_entry").hide();
	jQuery("."+name).show();
	}
function filter_list1(name)
		{
		jQuery(".filters").hide();
		if(name=="")
			{
			jQuery(".filters").show();
			}
			else
				{
				jQuery(".filter_"+name).show();
				}
		}
jQuery(function($)
	{
	jQuery(".tabcontent").find(".taber:not(:first)").next().hide();
	jQuery(".tabcontent").find(".taber:first").addClass("stab_active");
	jQuery("div.tab h3.taber").click(function(){  jQuery(this).toggleClass('stab_active').next().fadeToggle(); }); 
	});
jQuery(document).ready(function($)
	{
	jQuery(".clear-value").click(function()
		{
		jQuery(this).next().val("");
		});
	jQuery(".delete_profile").click(function()
		{
		if(confirm("Do you really want to remove this Item?")) 
			{
			return true;
			}
			else
				{
				return false;
				}
		return false;
		});

/* FONT PREVIEW */
	jQuery('.font_dropdown').change(function() 
		{
		var str = "";
		str=jQuery(this).find(":selected").text();
		str = str.split(':');  
	    	var link = ("<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=" + str[0] + "' media='screen' />");
		var col=jQuery(this).parent().find(".font-color").val();
		var siz=jQuery(this).parent().find(".font-size").val();
		jQuery("head").append(link);
	    	jQuery(this).parent().parent().find(".font_preview").text("Lorem Ipsum").css("font-family", str[0]).css("color", col).css("font-size", siz+"px").css("font-weight:",str[1]);
		if(str[1])
			{
			var ocss = jQuery(this).parent().parent().find(".font_preview").attr("style");
			jQuery(this).parent().parent().find(".font_preview").attr("style", ocss+"; font-weight:"+str[1]); 
			}
			else
				{
				jQuery(this).parent().parent().find(".font_preview").css("font-weight","normal");
				}
		});
	jQuery('.font-size, .font-color').change(function()
		{
		var col=jQuery(this).parent().find(".font-color").val();
		var siz=jQuery(this).parent().find(".font-size").val();
		jQuery(this).parent().parent().find(".font_preview").css("color", col).css("font-size", siz+"px");
		});

/* IMAGE UPLOAD PREVIEW */
	jQuery('.upload_image').change(function()
		{ 
		jQuery(this).parent().parent().next().find(".upload_preview").html("<p><strong>Preview:</strong></p><img src='"+jQuery(this).val()+"' alt='Your Logo' />");
		});

/* FONT PREVIEW WIZARD */
	jQuery('.wizard_font_select').change(function() 
		{
		var str = "";
		str=jQuery(this).find(":selected").text(); 
	    	var link = ("<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=" + str + "' media='screen' />"); 
		jQuery("head").append(link);
	    	jQuery(this).next().find(".font_preview").css("font-family", str);
		});

/* WIZARD */
	jQuery(function() {
		jQuery( "#admin-tabs, .admin-tabs" ).tabs();
	});
	jQuery('#wizard-1').click(function() 
		{
    		jQuery("#admin-tabs").tabs('select', 1); 
    		return false;
		});
	jQuery('#wizard-2').click(function() 
		{
	    	jQuery("#admin-tabs").tabs('select', 2); 
	    	return false;
		});
/* END WIZARD */
	jQuery("#reset_options").click(function()
		{	
		if(confirm("Do you really want to reset all Settings?")) 
			{
			return true;
			}
			else
				{
				return false;
				}
		return false;
		});
	jQuery("#softreset_options").click(function()
		{	
		if(confirm("Do you really want to reset all color and fonts settings? Note: all personal settings like logo, google analytics code and custom css code will not reset.")) 
			{
			return true;
			}
			else
				{
				return false;
				}
		return false;
		});
	jQuery(".remove_social, .del_sidebar").live("click", function()
		{
		if(confirm("Do you really want to remove this Item?")) 
			{
			jQuery(this).parent().remove();
			return false;
			}
			else
				{
				return false;
				}
		});
	jQuery("#social_movecontainer").sortable();
	jQuery(".template_entry").click(function()
		{
		var dataval=jQuery(this).find("img").data("val");
		jQuery(this).parent().find("input").val(dataval);
		jQuery(this).parent().find(".template_entry").removeClass("active");
		jQuery(this).addClass("active");
		});
	jQuery(document).ready(function()
		{
		jQuery(".footer_switch").click(function()
			{
			var footer_col=jQuery(this).data("id");
			jQuery(this).parent().find("input").val(footer_col);
			jQuery(".footer_switch").removeClass("active");
			jQuery(this).addClass("active");
			event.preventDefault();
			});
		});
	jQuery(".checkboxfake").live("click",(function()
		{
		 if (jQuery(this).next().val() == "on")
			{
			jQuery(this).removeClass("checked").addClass("unchecked");
			jQuery(this).next().val("false");
			}
			else
				{
				jQuery(this).removeClass("unchecked").addClass("checked");
				jQuery(this).next().val("on");
				}
		})
		);
	jQuery(".tabs .tab[id^=tab_menu]").click(function() 
		{
        		var curMenu=jQuery(this);
        		jQuery(".tabs .tab[id^=tab_menu]").removeClass("selected");
        		curMenu.addClass("selected");
        		var index=curMenu.attr("id").split("tab_menu_")[1];
       		jQuery(".tabContainer .tabcontent").css("display","none");
        		jQuery("input#currTab").val(index);
        		jQuery(".tabContainer #tab_content_"+index).css("display","block");
    		});
	jQuery(".JqueryUISortable").sortable();
	jQuery(".delete-me").click(function()
		{
		jQuery(this).parent().remove();
		return false;
		});
	jQuery(".opener").click(function()
		{
		jQuery(this).parent().next().find("div").toggle('500'); 		
		});
	jQuery(".filters a").click(function()
		{	
		jQuery(".filters a").removeClass("filtertab-active");
		jQuery(this).addClass("filtertab-active");
		});

	jQuery("#settings_filter a").click(function()
		{	
		jQuery("#settings_filter a").removeClass("filtertab-active");
		jQuery(this).addClass("filtertab-active");
		});
	jQuery(".selected-option").click(function()	
		{ 
		jQuery(".alternative-selectbox").hide();
		jQuery(this).next().toggle(); 
		});
	jQuery(".selected-option").blur(function(){ jQuery(this).prev().slideUp(); }); 
	jQuery(".select-option a").click(function()
		{ 
		var goal = jQuery(this).attr("data-goal");
		var val= jQuery(this).attr("data-val");
	 	jQuery("#"+goal).val(val); 
		jQuery(this).parent().parent().prev().html(jQuery(this).text());
		jQuery(this).parent().parent().hide();
		return false;
		});
	jQuery(".field-xfn").after("<select name='submenu_col' class='submenu_col'><option>1</option><option value='2'>2</option><option value='3'>3</option></select> Columns for the submenu of this item");
	jQuery(".submenu_col").change(function()
		{
		var old_val=jQuery(this).parent().find(".edit-menu-item-classes").val();
		var old_val=old_val.replace("c1 ","");
		var old_val=old_val.replace("c2 ","");
		var old_val=old_val.replace("c3 ","");	
		jQuery(this).parent().find(".edit-menu-item-classes").val(old_val+"c"+jQuery(this).val()+" ");
		});
	jQuery(".submenu_col").each(function()
		{
		tval=jQuery(this).parent().find(".edit-menu-item-classes").val();
		if (tval.indexOf("c1") >= 0)
			{
			var nval="1";
			}
		if (tval.indexOf("c2") >= 0)
			{
			var nval="2";
			}
		if (tval.indexOf("c3") >= 0)
			{
			var nval="3";
			}
		jQuery(this).find("option[value="+nval+"]").attr('selected', 'selected');
		});



	// OPTIONS PAGE ACTION WITH AJAX
 
		jQuery(".options_page_form").submit(function() 
			{
			jQuery("body").append("<div id='options_page_load'></div>");
			var form_data = jQuery(this).serializeArray(); 
			var to_url = jQuery(this).find("input[name=sendto]").val()+"?page=options-page.php";
			$.post( to_url, form_data ).error(function() 
				{
        				alert('error');
    				}).success( function() 
					{	
					jQuery("#options_page_load").fadeOut().remove();
					//alert('success');  					 
					});
				return false; 
			});
 


	jQuery("ul.icon_dropdown li").click(function()
		{
		jQuery(this).parent().parent().parent().find("input").val(jQuery(this).data("icon"));
		jQuery(this).parent().parent().find("i.current_icon").remove();
		jQuery(this).parent().parent().find("span").html("<i class='current_icon icon-"+jQuery(this).data("icon")+"'></i>");
		});



	jQuery(".sl_colorpicker").spectrum();
























	});