<?php
require('../../../../../wp-load.php');
$cols=array("one_half"=>"One Half","one_half_last"=>"One Half Last","one_third"=>"One Third","one_third_last"=>"One Third Last","two_third"=>"Two Third","two_third_last"=>"Two Third Last","one_fourth"=>"One Fourth","one_fourth_last"=>"One Fourth Last","three_fourth"=>"Three Fourth","three_fourth_last"=>"Three Fourth Last");
$lines=array("line"=>"Simple Line","blind"=>"Blind","small_line"=>"Small centered Line","line_1"=>"Shadow","line_2"=>"Line with Shadow 1","line_3"=>"Shadow 2","line_4"=>"Line with Shadow 2","line_5"=>"Line with Shadow 3","line_6"=>"Line with Shadow 4","line_7"=>"3D","line_8"=>"Rounded","line_9"=>"Shadow","line_10"=>"Imprint 1","line_11"=>"Imprint 2","line_12"=>"Seam 1","line_13"=>"Seam 2","line_14"=>"Seam 3","line_15"=>"Points","line_16"=>"Line with Shadows",);
$tables=array("","red","green","yellow","blue","black","orange","purple","pink");
$highlights =array();
$lists=array("Square","Photo","Info","Checked","Trash","Bullet","Bullet checked","Star","Dialog","Page","Letter","Plus","Letter open","Gear","VCard","List","List","Dialog","Attachment","Minus","Star","Chart","Person","File","Clipboard","Chard","Plus");
$hls=array(""=>"Default","red"=>"Red","dark"=>"Dark","blue"=>"Blue","green"=>"Green");
$bIcons=array(""=>"","help"=>"Help","info"=>"Info","rss"=>"RSS","flickr"=>"Flickr","facebook"=>"Facebook","stats"=>"Stats","addComment"=>"Add Comment","mail"=>"Mail","twitter"=>"Twitter","pdf"=>"PDF");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Insert Shortcodes</title>
<link rel="stylesheet" type="text/css" href="../../../../../wp-includes/js/tinymce/themes/advanced/skins/wp_theme/dialog.css"></style>
<link rel="stylesheet" type="text/css" href="../../style/jquery-ui.css" />
<link rel="stylesheet" href="../css/shortcodes_dialog.css" />
<script type="text/javascript" src="../../script/jquery.js"></script>
<script type="text/javascript" src="../../script/jquery-ui.min.js"></script> 
<script language="javascript" type="text/javascript" src="../../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script language="javascript" type="text/javascript" src="../../script/jscolor.js"></script>


<?php do_action("sevenleague_shortcode_generator_scripts"); ?>


<script type="text/javascript"> 
var ServiceboxDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ServiceboxDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertSection(ed) {
		var title = jQuery('#servicebox_title').val();	
		var text = jQuery('#servicebox_text').val(); 		 	
		var icon = jQuery('#servicebox_icon').val();
		var link = jQuery('#servicebox_link').val();
		var readmore = jQuery('#servicebox_readmore').val();

		var output = '';
		output = '[servicebox title="'+title+'" text="'+text+'" icon="'+icon+'" link="'+link+'" readmore="'+readmore+'" ]';
		output += ServiceboxDialog.local_ed.selection.getContent() +'[/servicebox]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ServiceboxDialog.init, ServiceboxDialog); 
</script>
<script type="text/javascript"> 
var SectionDialog = {
	local_ed : 'ed',
	init : function(ed) {
		SectionDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertSection(ed) {
		var bg = jQuery('#sbg').val();
		var bg2=jQuery('#sbg2').val();
		var bgimage=jQuery('#sbgimage').val();
		var bgrepeat=jQuery('#sbgrepeat').val();
		var bgpositionx=jQuery('#sbgpositionx').val();
		var bgpositiony=jQuery('#sbgpositiony').val();
		var bgfix=jQuery('#sbgfix').val(); 
		var bg_hpara=jQuery('#s_hpara').val(); 
		var bg_para=jQuery('#s_hpara').val(); 
		var inner=jQuery('#sinner').val(); 
		var sid=jQuery('#sid').val();
		var sclass=jQuery('#sclass').val();
		var style=jQuery('#sstyle').val();	
		var color = jQuery('#scolor').val(); 
		var margintop=jQuery('#smargintop').val();
		var marginbottom=jQuery('#smarginbottom').val();
		var paddingtop=jQuery('#spaddingtop').val();
		var paddingbottom=jQuery('#spaddingbottom').val();	
		var height=jQuery('#sheight').val();		 
		var output = '';
		output = '[section parallax="'+bg_para+'" horizontal_parallax="'+bg_hpara+'" bgimage="'+bgimage+'" class="'+sclass+'" id="'+sid+'" style="'+style+'" bgrepeat="'+bgrepeat+'" inner="'+inner+'" bgpositionx="'+bgpositionx+'" bgpositiony="'+bgpositiony+'" bgfix="'+bgfix+'" bg="' + bg + '" bg2="'+bg2+'" margintop="'+margintop+'" marginbottom="'+marginbottom+'" paddingtop="'+paddingtop+'" paddingbottom="'+paddingbottom+'" height="'+height+'" color="' + color+ '"]';
		output += SectionDialog.local_ed.selection.getContent() +'[/section]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(SectionDialog.init, SectionDialog); 
</script>

<script type="text/javascript"> 
var RoundskillDialog = {
	local_ed : 'ed',
	init : function(ed) {
		RoundskillDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertRoundskill(ed) {
		var title = jQuery('#roundskill_title').val();
		var text = jQuery('#roundskill_text').val();
		var max = jQuery('#roundskill_max').val();
		var current = jQuery('#roundskill_current').val();
		var color = jQuery('#roundskill_color').val();
		var width = jQuery('#roundskill_width').val();
			 	 
		var output = '';
		output = '[roundskills title="'+title+'" text="'+text+'" color="'+color+'" max="'+max+'" current="'+current+'" width="'+width+'"]';
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(RoundskillDialog.init, RoundskillDialog); 
</script>
<script type="text/javascript"> 
var SkillDialog = {
	local_ed : 'ed',
	init : function(ed) {
		SkillDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertSkill(ed) {
		var title = jQuery('#skill_title').val();
		var max = jQuery('#skill_max').val();
		var current = jQuery('#skill_current').val();
		var color = jQuery('#skill_color').val();
		var bgcolor=jQuery('#skill_bgcolor').val();
		var height = jQuery('#skill_height').val();			 	 
		var output = '';
		output = '[skills title="'+title+'" bgcolor="'+bgcolor+'" color="'+color+'" max="'+max+'" current="'+current+'" height="'+height+'"]';
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(SkillDialog.init, SkillDialog); 
</script>
<script type="text/javascript"> 
var SkillsDialog = {
	local_ed : 'ed',
	init : function(ed) {
		SkillsDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertSkills(ed) {
		var skillsname = jQuery('#skillsname').val();	
		var skillsmax = jQuery('#skillsmax').val();
		var skillsvalue = jQuery('#skillsvalue').val();		 
		var output = '';
		output = '[skills name="' + skillsname+ '" value="' + skillsvalue+ '" skillsmax="' + skillsmax + '"  ]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(SkillsDialog.init, SkillsDialog); 
</script>
<script type="text/javascript"> 
var TickerDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TickerDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertTicker(ed) {	 
		var output = '';
		output = '[jticker]'+TickerDialog.local_ed.selection.getContent() +'[/jticker]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TickerDialog.init, TickerDialog); 
</script>
<script type="text/javascript"> 
var TaglineDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TaglineDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertTicker(ed) {	 
		var output = '';
		output = '[tagline]'+TaglineDialog.local_ed.selection.getContent() +'[/tagline]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TaglineDialog.init, TaglineDialog); 
</script>
<script type="text/javascript"> 
var BlogSliderDialog = {
	local_ed : 'ed',
	init : function(ed) {
	BlogSliderDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertbloglsider(ed) {
		var blogs_number = jQuery('#blogs_number').val();	 
		var blogs_items = jQuery('#blogs_items').val();	
		var blogs_forward = jQuery('#blogs_forward').val();	
		var blogs_width = jQuery('#blogs_width').val();	
		var blogs_height = jQuery('#blogs_height').val();	
		var blogs_right = jQuery('#blogs_right').val();	
		var blogs_dir = jQuery('#blogs_dir').val(); 
		var blogs_image=jQuery('#blogs_image').val();
		var blogs_auto=jQuery('#blogs_auto').val();
		var blogs_speed=jQuery('#blogs_speed').val();
		var blogs_title=jQuery("#blogs_title").val();
		if(jQuery('#blogs_headline').is(':checked'))	 
			{
			var blogs_headline="true";
			}
		if(jQuery('#blogs_text').is(':checked'))	 
			{
			var blogs_text="true";
			}
		if(jQuery('#blogs_readmore').is(':checked'))	 
			{
			var blogs_readmore="true";
			}
		if(jQuery('#blogs_image').is(':checked'))	 
			{
			var blogs_image="true";
			}
		if(jQuery('#blogs_auto').is(':checked'))	 
			{
			var blogs_auto="true";
			}
		var output = '';
		output = '[blogslider title="'+blogs_title+'" speed="'+blogs_speed+'" auto="'+blogs_auto+'" image="'+blogs_image+'" readmore="'+blogs_readmore+'" direction="'+blogs_dir+'" items="'+blogs_items+'" number="'+blogs_number+'" itemsforward="'+blogs_forward+'" width="'+blogs_width+'" height="'+blogs_height+'" right="'+blogs_right+'" headline="'+blogs_headline+'" showtext="'+blogs_text+'"]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(BlogSliderDialog.init, BlogSliderDialog); 
</script>




<script type="text/javascript">
var ButtonDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ButtonDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	var marked_content=ButtonDialog.local_ed.selection.getContent();
	jQuery("#toggle-text").val(marked_content);
	jQuery("textarea[name='acc-text']").val(marked_content);
	jQuery("textarea[name='tabs-text']").val(marked_content);
	},
	insert : function insertButton(ed) { 
		tinyMCEPopup.execCommand('mceRemoveNode', false, null); 
		var url = jQuery('input#button-url').val();
		var text = jQuery('input#button-text').val();
		var size = jQuery('select#button-size').val();
		var color = jQuery('select#button-color').val();		 
		var style = jQuery('select#button-style').val();	 	 
		var icon = jQuery('select#button-icon').val();	
		var output = ''; 
		if(icon) {
			iicon="icon='"+icon+"'";
			}
		output = '[button ';
			output += 'size="' + size + '" ';
			output += 'style="' + style + '" ';
			output += 'color="' + color + '" ';
		if(icon)
			{
			output += iicon;
			}
		 if(url)
			output += ' url="' + url +'"'; 
		if(text) {	
			output += ']'+ text + '[/button]';
		} 
		else {
			output += ']'+ButtonDialog.local_ed.selection.getContent() + '[/button]';
		}
		tinyMCEPopup.execCommand('mceInsertContent', false, output); 
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ButtonDialog.init, ButtonDialog);
</script>
<script type="text/javascript"> 
var TwitterDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TwitterDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertTwitter(ed) {
		var twname = jQuery('#twname').val();	
		var twnumber = jQuery('#twnumber').val();
		var twpause = jQuery('#twpause').val();		 
		var output = '';
		output = '[twitter name="' + twname+ '" limit="' + twnumber+ '" pause="' + twpause+ '"  ]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TwitterDialog.init, TwitterDialog); 
</script>
<script type="text/javascript"> 
var LineDialog = {
	local_ed : 'ed',
	init : function(ed) {
		LineDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertLine(ed) {
		var linetype = jQuery('select#line-type').val();	
		var linetotop = jQuery('input#line-totop:checked').val();			 
		var output = '';
		output = '[hr type="' + linetype+ '" ' ;
		if(linetotop=='checked')	{output+=' top="true" '; }
		output+= ' ]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(LineDialog.init, LineDialog); 
</script>
<script type="text/javascript"> 
var ListDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ListDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertLine(ed) {
		var listtype = jQuery('select#list-type').val();	
		var output = '';
		output = '[list type="' + listtype+ '"]'+ButtonDialog.local_ed.selection.getContent() + ' [/list]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ListDialog.init, ListDialog); 
</script>
<script type="text/javascript"> 
var HLDialog = {
	local_ed : 'ed',
	init : function(ed) {
		HLDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function HL(ed) {
		var HLtype = jQuery('select#hl-type').val();	
		var HLcolor = jQuery('input#hl-color').val();
		var HLbgcolor = jQuery('input#hl-bgcolor').val();	
		var output = '';
		output = '[highlight type="' + HLtype+ '" color="'+HLcolor+'" bgcolor="'+HLbgcolor+'"]'+ButtonDialog.local_ed.selection.getContent() + ' [/highlight]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(HLDialog.init, HLDialog); 
</script>
<script type="text/javascript"> 
var BoxDialog = {
	local_ed : 'ed',
	init : function(ed) {
		BoxDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertBox(ed) {
		var boxtype = jQuery('input#box-type').val();
		var color1 = jQuery('input#box-color1').val();
		var color2 = jQuery('input#box-color2').val();
		var color3 = jQuery('input#box-color3').val();		 
		var output = '';
		output = '[box type="' + boxtype +  '" color1="'+color1+'" color2="'+color2+'" color3="'+color3+'"]'+ButtonDialog.local_ed.selection.getContent() + ' [/box]';		
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(BoxDialog.init, BoxDialog); 
</script>
<script type="text/javascript"> 
var ABoxDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ABoxDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertABox(ed) {
		var boxtype = jQuery('select#abox-type').val();
		var color1 = jQuery('input#abox-color1').val();
		var color2 = jQuery('input#abox-color2').val();
		var color3 = jQuery('input#abox-color3').val();		 
		var output = '';
		output = '[alert type="' + boxtype +  '" bgcolor="'+color1+'" color="'+color2+'" bordercolor="'+color3+'"]'+ButtonDialog.local_ed.selection.getContent() + ' [/alert]';		
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ABoxDialog.init, ABoxDialog); 
</script>
<script type="text/javascript"> 
var TableDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TableDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertTableBox(ed) {
	 tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		var tabletype = jQuery('select#table_type').val();
		var output = '';
		output = '[table type="' + tabletype +  '"]'+ButtonDialog.local_ed.selection.getContent() + ' [/table]';		
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TableDialog.init, TableDialog); 
</script>
<script type="text/javascript"> 
var PricingDialog = {
	local_ed : 'ed',
	init : function(ed) {
		PricingDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertTableBox(ed) {
	 tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		var highlight="";
		var button_size='medium';
		var button_color='custom';
		var pricing_divs = jQuery('#pricing_divs').val(); 
		highlight=jQuery("#pricing_highlight").val();
		var output = '';
		var ix=0;
		output = '[pricing col="'+pricing_divs+'" highlight="'+highlight+'"]<ul>';
		for (var i=0;i<pricing_divs ;i++)	// for(i=0;i<pricing_divs; i++)
			{
			ix=i+1;
			output+="<li class='pricing_td pricing_li_"+ix;
			if(highlight!="")
				{
				if(highlight==ix)
					{
					output+=" highlight ";
					}
					else
						{
						output+=" non_highlight ";
						}
				}
			output+="'><div><div class='pricing_heading'><h3>Option "+ix+"</h3><h4>$ 49.99</h4></div><ul><li>Place</li><li>Your</li><li>Text</li><li>here</li></ul><a class='sc_button block_button button square "+button_color+" "+button_size+"' href='#'>Your Linktext</a></div></li>";
			}
		output+='</ul>[/pricing]';		
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(PricingDialog.init, PricingDialog); 
</script>
<script type="text/javascript"> 
var ColumnDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ColumnDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertColumn(ed) {
	 tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		var columntype = jQuery('select#column-type').val();
		var typ=	jQuery('select#column-typ').val();	
		var col	= jQuery('#column-color').val();
		var bgcol	= jQuery('#column-bgcolor').val();	 
		var output = '';
		if(typ=="")
			{
			output = '[' + columntype + ']';	
			output += ButtonDialog.local_ed.selection.getContent() + '[/' + columntype +']';		
			}	
		if(typ=="boxed")
			{
			output = '[' + columntype + ' col="'+col+'" bgcol="'+bgcol+'" boxed="true"]';	
			output += ButtonDialog.local_ed.selection.getContent() + '[/' + columntype +']';
			}
		if(typ=="seamless")
			{
			output = '[seamlessbox_' + columntype + ' col="'+col+'" bgcol="'+bgcol+'"]<div class="columnbox">';	
			output += ButtonDialog.local_ed.selection.getContent() + '</div>[/seamlessbox_' + columntype +']';
			}
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ColumnDialog.init, ColumnDialog); 
</script>
<script type="text/javascript"> 
var CalloutDialog = {
	local_ed : 'ed',
	init : function(ed) {
		CalloutDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertCallout(ed) {
	 tinyMCEPopup.execCommand('mceRemoveNode', false, null); 	 
		var output = '';
		output = '[callout]';	
		output += ButtonDialog.local_ed.selection.getContent() + '[/callout]';		
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(CalloutDialog.init, CalloutDialog); 
</script>
<script type="text/javascript"> 
var ToggleDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ToggleDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertToggle(ed) {
		var toggletype = jQuery('#toggle-dialog select#toggle-type').val();
		var togglestyle = jQuery('#toggle-dialog select#toggle-style').val();
		var toggletitle = jQuery('#toggle-dialog input#toggle-title').val();
		var toggletext = jQuery('#toggle-dialog textarea#toggle-text').val();
		if( toggletype=='') {   toggletype='slide'; }		 
		var output = '';
		output = '[toggle style="'+togglestyle+'" title="'+toggletitle+'" type="'+toggletype+'"]';	
		output += toggletext+ '[/toggle]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(ToggleDialog.init, ToggleDialog); 
</script>
<script type="text/javascript"> 
var PEmailDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ToggleDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertToggle(ed) {
	 tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		var extrasemail = jQuery('#extras-dialog input#extras-email').val();			 
		var output = '';
		output = '[mailto]'+  extrasemail+ '[/mailto]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(PEmailDialog.init, PEmailDialog); 
</script>
<script type="text/javascript"> 
var TextMemberDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TextMemberDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertToggle(ed) {
	 tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		var extrasloggt = jQuery('#extras-dialog textarea#extras-loggt').val();			 
		var output = '';
		output = '[is-login]'+  extrasloggt+ '[/is-login]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TextMemberDialog.init, TextMemberDialog); 
</script>
<script type="text/javascript"> 
var TextNotMemberDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TextNotMemberDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertTextNotMemberDialog(ed) {
	 tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		var extrasnotloggt = jQuery('#extras-dialog textarea#extras-notloggt').val();			 
		var output = '';
		output = '[is-logout]'+  extrasnotloggt+ '[/is-logout]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TextNotMemberDialog.init, TextNotMemberDialog); 
</script>
<script type="text/javascript"> 
var SnapDialog = {
	local_ed : 'ed',
	init : function(ed) {
		SnapDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertSnap(ed) {
	 tinyMCEPopup.execCommand('mceRemoveNode', false, null);
		var snap = jQuery('input#extras-snap').val();			 
		var output = '';
		output = '[snap url="'+  snap + '"]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(SnapDialog.init, SnapDialog); 
</script>
<script type="text/javascript"> 
var DropcapDialog = {
	local_ed : 'ed',
	init : function(ed) {
		DropcapDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertDropcap(ed) {
		var DropcapSize=jQuery('select#dropcap_size').val();
		var DropcapColor=jQuery('input#dropcap_color').val();
		var DropcapBgColor=jQuery('input#dropcap_bgcolor').val();
		var DropcapRounded=jQuery('input#dropcap_rounded').val();
		if(DropcapRounded="checked")
			{
			var rounded=true;	
			}		 
		var output = '';
		output = '[dropcap size="'+ DropcapSize +'" color="'+DropcapColor+'" bgcolor="'+DropcapBgColor+'" rounded="'+rounded+'"]'+  ButtonDialog.local_ed.selection.getContent() + '[/dropcap]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(DropcapDialog.init, DropcapDialog); 
</script> 
<script type="text/javascript"> 
var TabsDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TabsDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertTabs(ed) {
		var tabstype = jQuery('select#tabs-type').val();
		var tabsstyle = jQuery('select#tabs-style').val();
		if(tabsstyle=="")
			{
			tabsstyle="default";
			}
		var tabstitle ="";
		jQuery('input.tabs-title').each(
			function()
				{
				tabstitle+=jQuery(this).val();
				}
		)
		var test="[tabs ";
		var titleFields = $(":input[name='tabs-title']").serializeArray();			 
			jQuery.each(titleFields, function(i, field)
				{
				test+="tab"+(i+1)+"='"+field.value+"' ";
				});
		 test+=" type='"+tabstype+"' style='"+tabsstyle+"'] ";
		var textFields = $("textarea[name='tabs-text']").serializeArray();			 
			jQuery.each(textFields, function(i, tfield)
				{
				test+="\r[tab]"+tfield.value+"[/tab]";
				});
		test+="\r[/tabs]";
		var tabstext = jQuery('textarea.tabs-text').val();
		var output = test;
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TabsDialog.init, TabsDialog); 
</script> 
<script type="text/javascript"> 
var ServiceDialog = {
	local_ed : 'ed',
	init : function(ed) {
		ServiceDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertService(ed) {
		var insh2="";
		var insh3="";
		var insicon="";
		var inscolor="";
		var defaultbg="";
		var shortcode="[services ";

		var defaultbg=$("#service_defaultbg").val();
		shortcode+=' defaultbg="'+defaultbg+'" ';
		shortcode+=" h2='";
		var serviceh2 = $(":input[name='serviceh2']").serializeArray();			 
			jQuery.each(serviceh2, function(i, field)
				{
				insh2+=field.value+", ";
				});

		shortcode+=insh2+"' h3='";

		var serviceh3 = $(":input[name='serviceh3']").serializeArray();			 
			jQuery.each(serviceh3, function(i, field)
				{
				insh3+=field.value+", ";
				});

		shortcode+=insh3+"' icon='";

		var serviceicon = $(":input[name='serviceicon']").serializeArray();			 
			jQuery.each(serviceicon, function(i, field)
				{
				insicon+=field.value+", ";
				});

		shortcode+=insicon+"' color='";

 		var color = $(":input[name='servicecolor']").serializeArray();			 
			jQuery.each(color, function(i, field)
				{
				inscolor+=field.value+", ";
				});


		shortcode+=inscolor+"']"; 
		var output = shortcode;
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TabsDialog.init, TabsDialog); 
</script> 
<script type="text/javascript"> 
var AccDialog = {
	local_ed : 'ed',
	init : function(ed) {
		AccDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertAcc(ed) { 
		var accstyle = jQuery('select#acc-style').val();
		if(accstyle=="")
			{
			accstyle="default";
			}
		var tabstitle ="";
		jQuery('input.acc-title').each(
			function()
				{
				tabstitle+=jQuery(this).val();
				}
		)
		var accs="[accordions style='"+accstyle+"'] ";
 		var titleFields = $(":input[name='acc-title']").serializeArray();
		var textFields = $("textarea[name='acc-text']").serializeArray();
		var accsarray=new Array();
		jQuery.each(textFields, function(i, tfield)
				{
				accsarray[i]= tfield.value+"  ";
				});			 
			jQuery.each(titleFields, function(i, field)
				{
				accs+="[accordion style='"+accstyle+"' title='"+field.value+"']"+accsarray[i]+" [/accordion]\r";
				});			
		accs+="\r[/accordions]";
		var output = accs;
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(AccDialog.init, AccDialog); 
</script>
<script type="text/javascript"> 
var MapDialog = {
	local_ed : 'ed',
	init : function(ed) {
		MapDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertMap(ed) {
		var maptype = jQuery('select#maptype').val();
		var mapwidth=jQuery('input#mapwidth').val();		
		var mapheight=jQuery('input#mapheight').val();
		var mapx=jQuery('input#mapx').val();
		var mapy=jQuery('input#mapy').val();
		var mapzoom=jQuery('input#mapzoom').val();
		var output="[map type='"+maptype+"' width='"+mapwidth+"' height='"+mapheight+"' zoom='"+mapzoom+"' x='"+mapx+"' y='"+mapy+"']";
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(MapDialog.init, MapDialog); 
</script>
<script type="text/javascript"> 
var TooltipDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TooltipDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertTooltip(ed) {
		var tttitle=jQuery('textarea#tttitle').val();		
		output = '[tooltip title="'+tttitle+'"]'+  ButtonDialog.local_ed.selection.getContent() + '[/tooltip]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TooltipDialog.init, TooltipDialog); 
</script>
<script type="text/javascript"> 
var LightboxDialog = {
	local_ed : 'ed',
	init : function(ed) {
		LightboxDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertLightbox(ed) {
		var lburl=jQuery('input#lburl').val();
		var lbtitle=jQuery('input#lbtitle').val();
		var lbwidth=jQuery('input#lbwidth').val();
		var lbheight=jQuery('input#lbheight').val();
		var lbgroup=jQuery('input#lbgroup').val(); 
		if(jQuery('#lbiframe').is(':checked'))
			{
			lbiframe="true";
			}
			else	
				{
				lbiframe="false";
				}
		output = '[lightbox url="'+lburl+'" title="'+lbtitle+'" width="'+lbwidth+'" height="'+lbheight+'" group="'+lbgroup+'"  iframe="'+lbiframe+'"]'+  ButtonDialog.local_ed.selection.getContent() + '[/lightbox]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(LightboxDialog.init, LightboxDialog); 
</script>
<script type="text/javascript"> 
var SlideshowDialog = {
	local_ed : 'ed',
	init : function(ed) {
		SlideshowDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertSlideshow(ed) {
		var sstype=jQuery('select#ss-type').val();
		var sseffect=jQuery('select#ss-effect').val();
		var sswidth=jQuery('input#ss-width').val();
		var ssheight=jQuery('input#ss-height').val();
		var sspause=jQuery('input#ss-pause').val();
		var ssspeed=jQuery('input#ss-speed').val();
		var ssfloat=jQuery('input#ss-float').val();
		var lbgroup=jQuery('input#lbgroup').val(); 
		if(jQuery('#ss-nav').is(':checked'))
			{
			ssnav="true";
			}
			else	
				{
				ssnav="false";
				}
		output = '[slideshow type="'+sstype+'" width="'+sswidth+'" height="'+ssheight+'" float="'+ssfloat+'" effect="'+sseffect+'" nav="'+ssnav+'" pause="'+sspause+'" speed="'+ssspeed+'"]'+  ButtonDialog.local_ed.selection.getContent() + '[/slideshow]';			
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(SlideshowDialog.init, SlideshowDialog); 
</script>
<script type="text/javascript"> 
var BlogDialog = {
	local_ed : 'ed',
	init : function(ed) {
		BlogDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertMap(ed) {
		var type = jQuery('select#blog_type').val();
		var before=jQuery('input#blog_before').val();		
		var number=jQuery('input#blog_number').val();
		var after=jQuery('input#blog_after').val();
		var column=jQuery('input#blog_column').val();
		var text=jQuery('#blog_text').val();
		if(jQuery('#blog_image').is(':checked'))
			{
			var image="true";
			}
			else	
				{
				var image="false";
				}
		if(jQuery('#blog_headline').is(':checked'))
			{
			var headline="true";
			}
			else	
				{
				var headline="false";
				}
		if(jQuery('#blog_readmore').is(':checked'))
			{
			var readmore="true";
			}
			else	
				{
				var readmore="false";
				}
		if(type=="popular") { type="popular_post"; }
		if(type=="random") { type="random_posts"; }
		if(type=="recent") { type="recent_posts"; }
 		var output='['+type+'  before="'+before+'" image="'+image+'" headline="'+headline+'" text="'+text+'" readmore="'+readmore+'" after="'+after+'" number="'+number+'" column="'+column+'"]';
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(BlogDialog.init, BlogDialog); 
</script>
<script type="text/javascript"> 
var CommentDialog = {
	local_ed : 'ed',
	init : function(ed) {
		CommentDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertMap(ed) {
		var type = jQuery('select#comment_type').val();
		var before=jQuery('input#comment_before').val();		
		var after=jQuery('input#comment_after').val();
		var number=jQuery('input#comment_number').val();
		var output='['+type+'_comments before="'+before+'" number="'+number+'" after="'+after+'" ]';
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(CommentDialog.init, CommentDialog); 
</script>
<script type="text/javascript"> 
var TBDialog = {
	local_ed : 'ed',
	init : function(ed) {
		TBDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertMap(ed) {
		var type = jQuery('select#tb_type').val();
		var before=jQuery('input#tb_before').val();		
		var after=jQuery('input#tb_after').val();
		var number=jQuery('input#tb_number').val();

		var output='['+type+'_trackbacks before="'+before+'" number="'+number+'" after="'+after+'" ]';
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(TBDialog.init, TBDialog); 
</script>
<script type="text/javascript"> 
var FlickrDialog = {
	local_ed : 'ed',
	init : function(ed) {
		FlickrDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertMap(ed) {
		var name = jQuery('input#flickr_name').val();
		var number=jQuery('input#flickr_number').val();	
		var output='[flickr number="'+number+'" id="'+name+'" ]';
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(FlickrDialog.init, FlickrDialog); 
</script>
<script type="text/javascript"> 
var GDocDialog = {
	local_ed : 'ed',
	init : function(ed) {
		GDocDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertMap(ed) {
		var url = jQuery('input#gdoc_url').val();
		var width=jQuery('input#gdoc_width').val();
		var height=jQuery('input#gdoc_height').val();	
		var output='[g_pdf url="'+url+'" height="'+height+'" width="'+width+'"]';
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(GDocDialog.init, GDocDialog); 
</script>
<script type="text/javascript"> 
var YoutubeDialog = {
	local_ed : 'ed',
	init : function(ed) {
		YoutubeDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertMap(ed) {
		var width = jQuery('input#youtube_width').val();
		var height=jQuery('input#youtube_height').val();	
		var id=jQuery('input#youtube_id').val();	
		var output='[youtube id="'+id+'" width="'+width+'" height="'+height+'" ]';
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(YoutubeDialog.init, YoutubeDialog); 
</script>
<script type="text/javascript"> 
var VimeoDialog = {
	local_ed : 'ed',
	init : function(ed) {
		VimeoDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertMap(ed) {
		var width = jQuery('input#vimeo_width').val();
		var height=jQuery('input#vimeo_height').val();	
		var id=jQuery('input#vimeo_id').val();	
		var color=jQuery('input#vimeo_color').val();	
		var output='[vimeo color="'+color+'" id="'+id+'" width="'+width+'" height="'+height+'" ]';
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(VimeoDialog.init, VimeoDialog); 
</script>
<script type="text/javascript"> 
var DMDialog = {
	local_ed : 'ed',
	init : function(ed) {
		DMDialog.local_ed = ed;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert : function insertMap(ed) {
		var width = jQuery('input#dm_width').val();
		var height=jQuery('input#dm_height').val();	
		var id=jQuery('input#dm_id').val();	
		var output='[dailymotion id="'+id+'" width="'+width+'" height="'+height+'" ]';
		tinyMCEPopup.execCommand('mceInsertContent', false, output);
		tinyMCEPopup.close();
	}
};
tinyMCEPopup.onInit.add(DMDialog.init, DMDialog); 
</script>

<script type="text/javascript">
	$(function() {
		$( "#tabs" ).tabs();
	});
	
	$(function() {
		$( ".accordion" ).accordion({
			autoHeight: false,
			navigation: true,
			collapsible: true,
			active: false
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function()
	{
	$("#moreTab").click(function()
		{
		$("#tabsset").append("<div class='tabinput'><div><label for='tabs-title'>Tabs Title</label><input type='text' name='tabs-title' value='' class='tabs-title' /></div><div><label for='tabs-text'>Tabs Text</label><textarea style='width:100%; height:200px;' name='tabs-text'  class='tabs-text' /></textarea></div>"); 
		return false;
		});
	$("#morePanel").click(function()
		{
		$("#accordionset").append("<div class='accinput'><div><label for='acc-title'>Panel Title</label><input type='text' name='acc-title' value='' class='acc-title' /></div><div><label for='acc-text'>Panel Text</label><textarea style='width:100%; height:200px;' name='acc-text'  class='acc-text' /></textarea></div>"); 
		return false;
		});
	$("#moreService").click(function()
		{
		$("#serviceset").append("	<div class='tabinput'><div><label for='serviceh2'>Headline 1</label><input type='text' id='serviceh2' name='serviceh2' value='' class='tabs-title' /></div><div><label for='serviceh3'>Headline 2</label><input type='text' id='serviceh3' name='serviceh3' value='' class='tabs-title' /></div><div><label for='serviceicon'>Icon</label><select name='serviceicon' id='serviceicon'><option value='consulting'>Consulting</option><option value='design'>Design</option><option value='documents'>Documents</option><option value='hosting'>Hosting</option><option value='openoffice'>Openoffice</option><option value='photography'>Photography</option><option value='photography2'>Photography 2</option><option value='publishing'>Publishing</option><option value='retusche'>Retouching</option><option value='retusche2'>Retouching 2</option>"
+"<option value='screendesign'>Screendesign</option><option value='screendesign2'>Screendesign 2</option><option value='seo'>SEO</option><option value='settings'>Settings</option><option value='support'>Support</option><option value='video'>Video</option></select></div><div><label for='servicecolor'>Mouseover color</label><input type='text'  class='color{hash:true,piclerClosable:true, required:false}' name='servicecolor' id='servicecolor' /><br /></div></div>"); 
		return false;
		});
	}); 
</script>
</head>
<body id="mce_popup">
	<div id="tabs">
	<ul>
		<li><a href="#tabs-16">Content</a></li>
		<li><a href="#tabs-1">Buttons</a></li> 
		<li><a href="#tabs-5">Toggles</a></li> 
		<li><a href="#tabs-10">Tabs</a></li>
		<li><a href="#tabs-11">Accordion</a></li>		
		<li><a href="#tabs-7">Extras</a></li>  
		<li><a href="#tabs-12">Slideshow</a></li>
		<li><a href="#tabs-13">Blog</a></li> 
		<li><a href="#tabs-14">Extern</a></li> 
		<li><a href="#tabs-17">Contentslider</a></li> 
		<?php do_action("sevenleague_sc_generator_add_tab"); ?>
	</ul>
	<div id="tabs-1">
		<div id="button-dialog">	
			<h3>Buttons</h3>
			<form action="/" method="get" accept-charset="utf-8">
				<div>
					<label for="button-url">Button URL</label>
					<input type="text" name="button-url" value="" id="button-url" />
				</div>
				<div>	
					<label for="button-text">Button Text</label>
					<input type="text" name="button-text" value="" id="button-text" />
				</div>
				<div>
					<label for="button-size">Size</label>
					<select name="button-size" id="button-size" size="1">
						<option value="small">Small</option>
						<option value="medium" selected="selected">Medium</option>
						<option value="large">Large</option>
						<option value="xlarge">Xlarge</option>
					</select>
				</div>
				<div>
					<label for="button-style">Style</label>
					<select name="button-style" id="button-style" size="1">
						<option value="less_round">Less Round</option>
						<option value="round" selected="selected">Round</option>
						<option value="">Square</option>
					</select>
				</div>
				<div>
					<label for="button-color">Color</label>
					<select name="button-color" id="button-color">
						<option value="gray" selected="selected">Gray</option>						
						<option value="darkgray">Darkgray</option>
						<option value="white">White</option>
						<option value="orange">Orange</option>
						<option value="yellow">Yellow</option>
						<option value="pink">Pink</option>
						<option value="purple">Purple</option>
						<option value="blue">Blue</option> 
						<option value="red">Red</option>
						<option value="green">Green</option>
						<option value="black">Black</option>
						<option value="gold">Gold</option>
						<option value="gold">Salmon</option>
					</select>
				</div>		
				<div>
					<label for="button-icon">Icon</label>
					<select name="button-icon" id="button-icon">
						<?php
						   foreach ($bIcons as $k => $v) 
							{ 
							echo "<option value='$k'>$v</option>";
							}							
						?>
					</select>
				</div>			 
				<div>	
					<a href="javascript:ButtonDialog.insert(ButtonDialog.local_ed)" id="insert" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
			<?php do_action("shortcode_generator_buttons_tab"); ?>
			</form>
		</div>
	</div>
	 <div id="tabs-5">		
		<div id="toggle-dialog">	
			<h3>Toggle</h3>
			<form action="/" method="get" accept-charset="utf-8">
				<div>
					<label for="toggle-type">Toggle Type</label>
					<select name="toggle-type" value="" id="toggle-type" >
						<option value="slide">Slide</option>
						<option value="fade">Fade</option>
					</select>
				</div>
				<div>
					<label for="toggle-style">Toggle Style</label>
					<select name="toggle-style" value="" id="toggle-style" >
						<option value="">Default</option>
						<option value="modern">Modern</option>
						<option value="box">Box</option>
						<option value="color">Color</option>
					</select>
				</div>				
				<div>
					<label for="toggle-title">Toggle Title</label>
					<input type="text" name="toggle-title" value="" id="toggle-title" />
				</div>					
				<div>
					<label for="toggle-text">Toggle Text</label>
					<textarea style="width:100%; height:200px;" name="toggle-text"  id="toggle-text" /></textarea>
				</div>		
				<div>	
					<a href="javascript:ToggleDialog.insert(ToggleDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>	
			<?php do_action("shortcode_generator_toggle_tab"); ?>			
			</form>
		</div>
	</div>
	 <div id="tabs-7">		
		<div id="extras-dialog">	
			<h3>Extras</h3>
			<form action="/" method="get" accept-charset="utf-8">

			<div class="accordion">
				<h3><a href="#">Prodect Email</a></h3>
				<div>					
					<label for="extras-email">Type your Email</label>
					<input type="text" name="extras-email" value="" id="extras-email" />
					<a href="javascript:PEmailDialog.insert(PEmailDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
				<h3><a href="#">Text only for Logged Persons</a></h3>		
				<div>
					<label for="extras-loggt">Toggle Title</label>
					<textarea name="extras-loggt"   id="extras-loggt" ></textarea>
					<a href="javascript:TextMemberDialog.insert(TextMemberDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>		
				<h3><a href="#">Text only for Not Logged Persons</a></h3>		
				<div>
					<label for="extras-notloggt">Toggle Title</label>
					<textarea name="extras-notloggt"   id="extras-notloggt" ></textarea>
					<a href="javascript:TextNotMemberDialog.insert(TextNotMemberDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>

				<h3><a href="#">Tooltips</a></h3>	
				<div>
				 	<label for="tttitle">Tooltip Content</label> 
					<textarea name="tttitle" id="tttitle" style="width:200px; height:200px;"></textarea><br /><br />
				 	<a href="javascript:TooltipDialog.insert(TooltipDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				 </div>
				<h3><a href="#">Lightboxes</a></h3>	
				<div>
				 	<label for="lburl">Lightbox Url</label> 
					<input type="text" name="lburl" id="lburl" /><br /><br />

				 	<label for="lbtitle">Lightbox Content</label> 
					<input type="text" name="lbtitle" id="lbtitle" /><br /><br />

				 	<label for="lbwidth">Lighbox Width</label> 
					<input type="text" name="lbwidth" id="lbwidth" /><br /><br />

				 	<label for="lbheight">Height</label> 
					<input type="text" name="lbheight" id="lbheight" /><br /><br />

				 	<label for="lbgroup">Lightbox Groupname</label> 
					<input type="text" name="lbgroup" id="lbgroup" /><br /><br />

				 	<label for="lbtitle">Is Lightbox an Iframe?</label> 
					<input type="checkbox" name="lbiframe" id="lbiframe" /><br /><br />

				 	<a href="javascript:LightboxDialog.insert(LightboxDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				 </div>
			<?php do_action("shortcode_generator_extras_tab"); ?>
			</div>				
							
			</form>
		</div>
	</div>	
	<div id="tabs-10">		
		<div id="tabs-dialog">	
			<h3>Tabs</h3>
			<form action="/" method="get" accept-charset="utf-8">
				<div>
					<label for="tabs-type">Tabs Type</label>
					<select name="tabs-type" value="" id="tabs-type" >
						<option value="slide">Slide</option>
						<option value="fade">Fade</option>
					</select>
				</div>
				<div>
					<label for="tabs-style">Tabs Style</label>
					<select name="tabs-style" value="" id="tabs-style" >
						<option value="">Default</option>
						<option value="easy">Simple</option>
						<option value="vertical">Vertical</option>
					</select>
				</div>
				<div id="tabsset">
					<div class="tabinput">				
						<div>
							<label for="tabs-title">Tabs Title</label>
							<input type="text" name="tabs-title" value="" class="tabs-title" />
						</div>					
						<div>
							<label for="tabs-text">Tabs Text</label>
							<textarea style="width:100%; height:200px;" name="tabs-text"  class="tabs-text" /></textarea>
						</div>	
					</div>
				</div>	
				<div>
					<a class="updateButton"  style="display: block; line-height: 24px;" id="moreTab" href="#">1 more Tab</a>
				</div>
				<div>	
					<a href="javascript:TabsDialog.insert(TabsDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
			<?php do_action("shortcode_generator_tabs_tab"); ?>				
			</form>
		</div>
	</div>
	<div id="tabs-11">		
		<div id="accordion-dialog">	
			<h3>Accordion</h3>
			<form action="/" method="get" accept-charset="utf-8">
				<div>
					<label for="acc-style">Accordion Style</label>
					<select name="acc-style" value="" id="acc-style" >
						<option value="">Default</option>
						<option value="easy">Modern</option>
						<option value="box">Box</option>
					</select>
				</div>
				<div id="accordionset">
					<div class="accinput">				
						<div>
							<label for="acc-title">Panel Title</label>
							<input type="text" name="acc-title" value="" class="acc-title" />
						</div>					
						<div>
							<label for="acc-text">Panel Text</label>
							<textarea style="width:100%; height:200px;" name="acc-text"  class="acc-text" /></textarea>
						</div>	
					</div>
				</div>	
				<div>
					<a class="updateButton"  style="display: block; line-height: 24px;" id="morePanel" href="#">1 more Panel</a>
				</div>
				<div>	
					<a href="javascript:AccDialog.insert(AccDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>		
			<?php do_action("shortcode_generator_accordion_tab"); ?>		
			</form>
		</div>
	</div>
	<div id="tabs-12">		
		<div id="slideshow-dialog">	
			<h3>Slideshows</h3>
			<form action="/" method="get" accept-charset="utf-8">
				<div>
					<label for="ss-type">Slideshow Type</label>
					<select name="ss-type" value="" id="ss-type" >
						<option value="cycle">Cycle Slider</option>
						<option value="nivo">Nivo Slider</option>
					</select>
				</div>
				<div>
					<label for="ss-effect">Slideshow Effect</label>
					<select name="ss-effect" value="" id="ss-effect" >
						<option></option>
						<option disabled>Nivo Effects</option>
							<option value="sliceDown">sliceDown</option>
							<option value="sliceDownLeft">sliceDownLeft</option>
							<option value="sliceUp">sliceUp</option>
							<option value="sliceUpLeft">sliceUpLeft</option>
							<option value="sliceUpDown">sliceUpDown</option>
							<option value="sliceUpDownLeft">sliceUpDownLeft</option>
							<option value="fold">fold</option>
							<option value="fade">fade</option>
							<option value="random">random</option>	
							<option value="slideInRight">slideInRight</option>
							<option value="slideInLeft">slideInLeft</option>
							<option value="boxRandom">boxRandom</option>
							<option value="boxRain">boxRain</option>
							<option value="boxRainReverse">boxRainReverse</option>
							<option value="boxRainGrow">boxRainGrow</option>
							<option value="boxRainGrowReverse">boxRainGrowReverse</option>
						<option disabled>Cycle Effects</option>
							<option value="blindX">blindX</option>
							<option value="blindY">blindY</option>
							<option value="blindZ">blindZ</option>
							<option value="cover">cover</option>
							<option value="curtainX">curtainX</option>
							<option value="curtainY">curtainY</option>
							<option value="fade">fade</option>
							<option value="fadeZoom">fadeZoom</option>
							<option value="growX">growX</option>
							<option value="growY">growY</option>
							<option value="none">none</option>
							<option value="scrollUp">scrollUp</option>
							<option value="scrollDown">scrollDown</option>
							<option value="scrollLeft">scrollLeft</option>
							<option value="scrollRight">scrollRight</option>
							<option value="scrollHorz">scrollHorz</option>
							<option value="scrollVert">scrollVert</option>
							<option value="shuffle">shuffle</option>
							<option value="slideX">slideX</option>
							<option value="slideY">slideY</option>
							<option value="toss">toss</option>
							<option value="turnUp">turnUp</option>
							<option value="turnDown">turnDown</option>
							<option value="turnLeft">turnLeft</option>
							<option value="turnRight">turnRight</option>
							<option value="uncover">uncover</option>
							<option value="wipe">wipe</option>
							<option value="zoom">zoom</option>
					</select>
				</div>
				<div>
					<label for="ss-height">Height</label>
					<input type="text" name="ss-height" id="ss-height" />
				</div>
				<div>
					<label for="ss-width">Width</label>
					<input type="text" name="ss-width" id="ss-width" />
				</div>
				<div>
					<label for="ss-nav">Show Navigation?</label>
					<input type="checkbox" name="ss-nav" id="ss-nav" />
				</div>
				<div>
					<label for="ss-pause">Pause in Millisecondes</label>
					<input type="text" name="ss-pause" id="ss-pause" />
				</div>
				<div>
					<label for="ss-speed">Animation Speed</label>
					<input type="text" name="ss-speed" id="ss-speed" />
				</div>
				<div>
					<label for="ss-float">Float</label>
					<input type="text" name="ss-float" id="ss-float" />
				</div>
				<div>	
					<a href="javascript:SlideshowDialog.insert(SlideshowDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>	
			<?php do_action("shortcode_generator_extras_tab"); ?>			
			</form>
		</div>
	</div>
	<div id="tabs-13">		
		<div id="blog-dialog">	
			<h3>Blog</h3>
			<form action="/" method="get" accept-charset="utf-8">
			<div class="accordion">
				<h3><a href="#">Blog Posts</a></h3>
				<div>
					<label for="recent_blog_type">Type</label> 
					<select name="blog_type" value="" id="blog_type" >
						<option value="recent">Recent</option>
						<option value="random">Random</option>
						<option value="popular">Popular</option>
					</select><br />
					<label for="blog_before">Before Content</label> 
					<input type="text" name="blog_before" value="" id="blog_before" /><br />					
					<label for="blog_number">Number of Blogposts</label> 
					<input type="text" name="blog_number" value="" id="blog_number" /><br />
					<label for="blog_after">After Content</label> 
					<input type="text" name="blog_after" value="" id="blog_after" /><br />
					<label for="blog_columns">Number of Columns</label> 
					<input type="text" name="blog_column" value="" id="blog_column" /><br />
					<label for="blog_text">Number of Excerpt-Letters</label> 
					<input type="text" name="blog_text" value="" id="blog_text" /><br />						
					<label for="blog_headline">Show Headline?</label> 
					<input type="checkbox" name="blog_headline" value="" id="blog_headline" /><br />
					<label for="blog_headline">Show Image?</label> 
					<input type="checkbox" name="blog_image" value="" id="blog_image" /><br />
					<label for="blog_headline">Show 'Read more' Button?</label> 
					<input type="checkbox" name="blog_readmore" value="" id="blog_readmore" /><br />									
					<a href="javascript:BlogDialog.insert(BlogDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>							
				<h3><a href="#">Comments</a></h3>
				<div>
					<label for="comment_type">Type</label> 
					<select name="comment_type" value="" id="comment_type" >
						<option value="recent">Recent</option>
						<option value="random">Random</option>
					</select><br />
					<label for="comment_before">Before Content</label> 
					<input type="text" name="comment_before" value="" id="comment_before" /><br />					
					<label for="comment_number">Number of Comments</label> 
					<input type="text" name="comment_number" value="" id="comment_number" /><br />
					<label for="comment_after">After Content</label> 
					<input type="text" name="comment_after" value="" id="comment_after" /><br />
					<a href="javascript:CommentDialog.insert(CommentDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>	
				<h3><a href="#">Trackbacks</a></h3>
				<div>
					<label for="tb_type">Type</label> 
					<select name="tb_type" value="" id="tb_type" >
						<option value="recent">Recent</option>
						<option value="random">Random</option>
					</select><br />
					<label for="tb_before">Before Content</label> 
					<input type="text" name="tb_before" value="" id="tb_before" /><br />					
					<label for="tb_number">Number of Trackbacks</label> 
					<input type="text" name="tb_number" value="" id="tb_number" /><br />
					<label for="tb_after">After Content</label> 
					<input type="text" name="tb_after" value="" id="tb_after" /><br />
					<a href="javascript:TBDialog.insert(TBDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>		
				<?php do_action("shortcode_generator_blog_tab"); ?>					
			</div>			
							
			</form>
		</div>
	</div>
 	<div id="tabs-14">		
		<div id="extern-dialog">	
			<h3>Extras</h3>
			<form action="/" method="get" accept-charset="utf-8">
			<div class="accordion">
				<h3><a href="#">Flickr</a></h3>
				<div>					
					<label for="flickr_name">The Flickr ID</label>
					<input type="text" name="flickr_name" value="" id="flickr_name" /><br />
					<label for="flickr_number">The numbers of Flickr Images</label>
					<input type="text" name="flickr_number" value="" id="flickr_number" /><br />
					<a href="javascript:FlickrDialog.insert(FlickrDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>	
				<h3><a href="#">Website Snapshot</a></h3>		
				<div>
					<label for="extras-snap">Website URL</label>
					<input type="text" name="extras-snap"   id="extras-snap" />
					<a href="javascript:SnapDialog.insert(SnapDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
				<h3><a href="#">Twitter</a></h3>
				<div>
					<label for="twname">The Twittername</label>
					<input type="text" name="twname"   id="twname" /><br />
					<label for="twnumber">The Numbers of Twitter Posts</label>
					<input type="text" name="twnumber"   id="twnumber" /><br />
					<label for="twpause">The Time in Millisecondes between show two Posts</label>
					<input type="text" name="twpause"   id="twpause" /><br />					
					<a href="javascript:TwitterDialog.insert(TwitterDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>	
				<h3><a href="#">YouTube</a></h3>
				<div>
					<label for="youtube_id">The Id of the Youtube Video</label>
					<input type="text" name="youtube_id"   id="youtube_id" /><br />
					<label for="youtube_width">The Width of the Video</label>
					<input type="text" name="youtube_width"   id="youtube_width" /><br />
					<label for="youtube_height">The Height of the Video</label>
					<input type="text" name="youtube_height"   id="youtube_height" /><br />
					<a href="javascript:YoutubeDialog.insert(YoutubeDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>	
				<h3><a href="#">Vimeo</a></h3>
				<div>
					<label for="vimeo_id">The Id of the Vimeo Video</label>
					<input type="text" name="vimeo_id"   id="vimeo_id" /><br />
					<label for="vimeo_width">The Width of the Video</label>
					<input type="text" name="vimeo_width"   id="vimeo_width" /><br />
					<label for="vimeo_height">The Height of the Video</label>
					<input type="text" name="vimeo_height"   id="vimeo_height" /><br />
					<label for="vimeo_color">The Color for the Video</label>
					<input type="text"  class="color{hash:true,piclerClosable:true, required:false}"  name="vimeo_color"   id="vimeo_color" /><br />
					<a href="javascript:VimeoDialog.insert(VimeoDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>	
				<h3><a href="#">Daily Motion</a></h3>
				<div>
					<label for="dm_id">The Id of the DailyMotion Video</label>
					<input type="text" name="dm_id"   id="dm_id" /><br />
					<label for="dm_width">The Width of the Video</label>
					<input type="text" name="dm_width"   id="dm_width" /><br />
					<label for="dm_height">The Height of the Video</label>
					<input type="text" name="dm_height"   id="dm_height" /><br />
					<a href="javascript:DMDialog.insert(DMDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>	
				<h3><a href="#">Google Maps</a></h3>	
				<div>
					<label for="maptype">Maptype</label>
					<select name="maptype" value="" id="maptype" />
						<option value="ROADMAP">Roadmap</option>
						<option value="SATELLITE">Satellite</option>
						<option value="HYBRID">Hybrid</option>
						<option value="TERRAIN">Terrain</option>
					</select><br /><br />
				 	<label for="mapwidth">Map width</label> 
					<input type="text" name="mapwidth" id="mapwidth" value="" /><br /><br />
				 	<label for="mapheight">Map height</label> 
					<input type="text" name="mapheight" id="mapheight" value="" /><br /><br />
				 	<label for="mapx">Map Longitude</label> 
					<input type="text" name="mapx" id="mapx" value="" /><br /><br />
				 	<label for="mapy">Map Latitude</label> 
					<input type="text" name="mapy" id="mapy" value="" /><br /><br />
				 	<label for="mapzoom">Zoom</label> 
					<input type="text" name="mapzoom" id="mapzoom" value="" /><br /><br />
				 	<a href="javascript:MapDialog.insert(MapDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				 </div>
				<h3><a href="#">Documents via Google Docs</a></h3>
				<div>
					<label for="gdoc_url">Directlink to the Document</label>
					<input type="text" name="gdoc_url"   id="gdoc_url" /><br />
					<label for="gdoc_width">The width for the Document</label>
					<input type="text" name="gdoc_width"   id="gdoc_width" /><br />
					<label for="gdoc_height">The height for the Document</label>
					<input type="text" name="gdoc_height"   id="gdoc_height" /><br />
					<a href="javascript:GDocDialog.insert(GDocDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
				<?php do_action("shortcode_generator_extern_tab"); ?>				
			</div>								
			</form>
		</div>
	</div>


	<div id="tabs-17">		
		<div id="contentslider-dialog">	
			<h3>Extras</h3>
			<form action="/" method="get" accept-charset="utf-8">
			<div class="accordion">


				<h3><a href="#">Blog Slider</a></h3>		
				<div>
					<label for="blogs_title">Title</label>
					<input type="text" name="blogs_title" id="blogs_title" /><br />
					<label for="blogs_number">Number of Items</label>
					<input type="text" name="blogs_number" value="" id="blogs_number" /><br />
					<label for="blogs_items">Visible items</label>
					<input type="text" name="blogs_items" value="" id="blogs_items" /><br />	
					<label for="blogs_forward">Number of Items go forward</label>
					<input type="text" name="blogs_forward" value="" id="blogs_forward" /><br />
					<label for="blogs_width">Width of sliding element</label>
					<input type="text" name="blogs_width" value="" id="blogs_width" /><br />
					<label for="blogs_height">Height of sliding element</label>
					<input type="text" name="blogs_height" value="" id="blogs_height" /><br />
					<label for="blogs_right">Sliding element, distanze to the Right</label>
					<input type="text" name="blogs_right" value="" id="blogs_right" /><br />
					<label for="blogs_headline">Show Headline?</label>
					<input type="checkbox" name="blogs_headline" value="" id="blogs_headline" /><br />
					<label for="blogs_text">Show Text?</label>
					<input type="checkbox" name="blogs_text" value="" id="blogs_text" /><br />
					<label for="blogs_readmore">Show Readmore Button?</label>
					<input type="checkbox" name="blogs_readmore" value="" id="blogs_readmore" /><br />
					<label for="blogs_image">Show Image?</label>
					<input type="checkbox" name="blogs_image" value="" id="blogs_image" /><br />  
					<label for="blogs_dir">Direction</label>
					<select name="blogs_dir" value="" id="blogs_dir" >
						<option></option>
						<option value="left">Left</option>
						<option value="right">Right</option>
						<option value="up">Up</option>
						<option value="down">Down</option>
					</select>
					<label for="blogs_auto">Autostart the Show?</label>
					<input type="checkbox" name="blogs_auto" value="" id="blogs_auto" /><br /> 
					<label for="blogs_speed">Pause between Change in Millisecondes</label>
					<input type="text" name="blogs_speed" id="blogs_speed"><br />
					<br />
					<a href="javascript:BlogSliderDialog.insert(BlogSliderDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>	
				<?php do_action("shortcode_generator_contentslider_tab"); ?>
			</div>								
			</form>
		</div>
	</div>


	<div id="tabs-16">		
		<div id="extras-dialog">	
			<h3>Content Shortcodes</h3>
			<form action="/" method="get" accept-charset="utf-8">
			<div class="accordion">
			
	 			 
			<h3><a href="#">Lists</a></h3>
			<div>
			 	<div>
					<label for="list-type">List Type</label>
					<select name="list-type" id="list-type">
						<?php
						   foreach ($lists as $k => $v) 
							{ 
							echo "<option value='$k'>$v</option>";
							}							
						?>
					</select>
				</div>
				<div>	
					<a href="javascript:ListDialog.insert(ListDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
			</div>			 
			<h3><a href="#">Highlight</a></h3>
			<div>
				<div>
					<label for="hl-type">Highlight Type</label>
					<select name="hl-type" id="hl-type">
						<?php
						   foreach ($hls as $k => $v) 
							{ 
							echo "<option value='$k'>$v</option>";
							}							
						?>
					</select>
					<p><strong>...or choose your Colors: </strong></p>
					<label for="hl-bgcolor">Background color</label>
					<input type="text"  class="color{hash:true,piclerClosable:true, required:false}" name="hl-bgcolor" id="hl-bgcolor" /><br />
					<label for="hl-color">Text Color</label>
					<input type="text"  class="color{hash:true,piclerClosable:true, required:false}" name="hl-color" id="hl-color" />
				</div>
				<div>	
					<a href="javascript:HLDialog.insert(HLDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
			</div>
			<h3><a href="#">Section</a></h3>
			<div>
				<div>  
					<label for="sbg">Background color</label>
					<input type="text"  class="color{hash:true,piclerClosable:true, required:false}" name="sbg" id="sbg" /><br />
					<label for="sbg2">2. Background color (for background gradient)</label> 
					<input type="text"  class="color{hash:true,piclerClosable:true, required:false}" name="sbg2" id="sbg2" /><br />

					<label for="sbgimage">Background Image (URL)</label>
					<input type="text" name="sbgimage" id="sbgimage" /><br />
					<label for="sbgrepeat">Background repeat</label>
					<select name="sbgrepeat" id="sbgrepeat">
						<option value=""></option>
						<option value="no-repeat">No Repeat</option>
						<option value="repeat">Repeat All</option>
						<option value="repeat-x">Repeat X</option>
						<option value="repeat-y">Repeat Y</option>
					</select><br />
					<label for="sbgpositionx">Background position x</label>
					<select name="sbgpositionx" id="sbgpositionx">
						<option value=""></option>
						<option value="left">Left</option>
						<option value="center">Center</option>
						<option value="right">Right</option>
					</select><br />
					<label for="sbgpositiony">Background position y</label>
					<select name="sbgpositiony" id="sbgpositiony">
						<option value=""></option>
						<option value="top">Top</option>
						<option value="center">Center</option>
						<option value="bottom">Bottom</option>
					</select><br />
					<label for="sbgfix">Background fix</label>
					<input type="checkbox" name="sbgfix" id="sbgfix" /><br />

					<label for="sbgfix">Horizontal Parallax</label>
					<input type="checkbox" name="s_hpara" id="s_hpara" /><br />

					<label for="sbgfix">Parallax</label>
					<input type="checkbox" name="s_para" id="s_para" /><br />

					<label for="sinner">Fullwidth</label>
					<input type="checkbox" name="sinner" id="sinner" /><br />
					

					<label for="sclass">Class name</label>
					<input type="text" name="sclass" id="sclass" /><br />
					<label for="sid">ID for this section</label>
					<input type="text" name="sid" id="sid" /><br />
				
					<label for="sstyle">Custom Styles</label>
					<textarea name="sstyle" id="sstyle"></textarea><br />
	
					<label for="sheight">Height in pixel</label>
					<input type="text" name="sheight" id="sheight" /><br />
					<label for="smargintop">Margin top</label>
					<input type="text" name="smargintop" id="smargintop" /><br />
					<label for="smarginbottom">Margin bottom</label>
					<input type="text" name="smarginbottom" id="smarginbottom" /><br />
					<label for="spaddingtop">Padding top</label>
					<input type="text" name="spaddingtop" id="spaddingtop" /><br />
					<label for="spaddingbottom">Padding bottom</label>
					<input type="text" name="spaddingbottom" id="spaddingbottom" /><br />
	

					<label for="scolor">Text Color</label>
					<input type="text"  class="color{hash:true,piclerClosable:true, required:false}" name="scolor" id="scolor" />
				</div>
				<div>	
					<a href="javascript:SectionDialog.insert(SectionDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
			</div>



			<h3><a href="#">Divider</a></h3>
			<div>
				<div>
					<label for="line-type">Line Type</label>
					<select name="line-type" id="line-type">
						<?php
						   foreach ($lines as $k => $v) 
							{ 
							echo "<option value='$k'>$v</option>";
							}
								//<input type="text" name="line-type" value="" id="line-type" />
						?>
					</select>
				</div>				
				<div>
					<label for="line-totop">Show "Top" Text</label>
					<input type="checkbox" name="line-totop" value="checked" id="line-totop" />
				</div>
				<div>	
					<a href="javascript:LineDialog.insert(LineDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
			</div>
			<h3><a href="#">Color Boxes</a></h3>
			<div>
					<div>
						<label for="box-type">Box Type</label>
						<input type="text" name="box-type" value="" id="box-type" />
					</div>
					<div>
						<label for="box-color1">From Color...</label>
						<input type="text"  class="color{hash:true, piclerClosable:true,  required:false}" name="box-color1" value="" id="box-color1" />
					</div>
					<div>
						<label for="box-color2">...to Color</label>
						<input type="text"  class="color{hash:true, piclerClosable:true,  required:false}" name="box-color2" value="" id="box-color2" />
					</div>
					<div>
						<label for="box-color3">Fontcolor</label>
						<input type="text" class="color{hash:true, piclerClosable:true,  required:false}" name="box-color3" value="" id="box-color3" />
					</div>
					<div>
						<a href="javascript:BoxDialog.insert(BoxDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
					</div>
				</div>	
			<h3><a href="#">Alert Boxes</a></h3>
			<div>
					<div>
						<label for="abox-type">Box Type</label>
						<select name="abox-type" value="" id="abox-type" >
							<option value=" "></option>
							<option value="yellow">Yellow</option>
							<option value="red">Red</option>
							<option value="green">Green</option>
							<option value="blue">Blue</option>
							<option value="black">Black</option>
						</select>
					</div>
					<div>
						<p><strong>...or choose your own colors:</strong></p>
						<p>&nbsp;</p>
						<label for="abox-color1">Backgroundcolor</label>
						<input type="text"  class="color{hash:true, piclerClosable:true, required:false}" name="abox-color1" value="" id="abox-color1" />
					</div>
					<div>
						<label for="abox-color2">Textcolor</label>
						<input type="text"  class="color{hash:true,piclerClosable:true, required:false}" name="abox-color2" value="" id="abox-color2" />
					</div>
					<div>
						<label for="abox-color3">Bordercolor</label>
						<input type="text" class="color{hash:true, piclerClosable:true,  required:false}" name="abox-color3" value="" id="abox-color3" />
					</div>
					<div>
						<a href="javascript:ABoxDialog.insert(ABoxDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
					</div>

			</div>	 
			<h3><a href="#">Table</a></h3>	
			<div>
					<label for="table">Tabletype</label>
					<select name="table_type" value="" id="table_type" />
						<?php
						   foreach ($tables as $k => $v) 
							{ 
							echo "<option value='$v'>$v</option>";
							}	
						?>
					</select>
					<a href="javascript:TableDialog.insert(TableDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
			</div>
			<h3><a href="#">Pricing Tables</a></h3>	
			<div>
					<label for="pricing_divs">Number of Columns</label>
					<input type="text" name="pricing_divs" id="pricing_divs" />
					<label for="pricing_highlight">Advise the follow Column</label>
					<input type="text" name="pricing_highlight" id="pricing_highlight" />
					
					<a href="javascript:PricingDialog.insert(PricingDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
			</div>
			<h3><a href="#">Columns</a></h3>
			<div>
				<div>
					<label for="column-typ">Column Type</label>
					<select name="column-typ" value="" id="column-typ" />
						<option value="">Normal</option>
						<option value="boxed">Boxed</option>
						<option value="seamless">Seamless</option>
					</select>
					<label for="column-type">Column Type</label>
					<select name="column-type" value="" id="column-type" />
						<?php
						   foreach ($cols as $k => $v) 
							{ 
							echo "<option value='$k'>$v</option>";
							}	
						?>
					</select>
					<label for="column-bgcolor">Column Backgroundcolor</label>
					<input  class="color{hash:true,piclerClosable:true, required:false}" type="text" name="column-bgcolor" value="" id="column-bgcolor" />
					<label for="column-color">Column Backgroundcolor</label>
					<input  class="color{hash:true,piclerClosable:true, required:false}" type="text" name="column-color" value="" id="column-color" />
				</div>
				<div>	
					<a href="javascript:ColumnDialog.insert(ColumnDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
				</div>
			</div>

			<h3><a href="#">Callout Box</a></h3>
			<div>
					<a href="javascript:CalloutDialog.insert(CalloutDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
 			</div>	
			<h3><a href="#">Ticker</a></h3>
			<div>
				<p>IMPORTANT: Please create a list with your scrolling Items, mark with mouse and then call this function!</p>
					<a href="javascript:TickerDialog.insert(TickerDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
 			</div>	
			<h3><a href="#">Tagline</a></h3>
			<div>
				<p>IMPORTANT: Please mark the content you wish to have within the Tagline with mouse and then call this function!</p>
					<a href="javascript:TaglineDialog.insert(TaglineDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
 			</div>	
			 <h3><a href="#">Dropcaps</a></h3>
			 <div>

				<div>
					<label for="dropcap_size">Dropcap Size</label>
					<select name="dropcap_bgcolor" value="" id="dropcap_size" >
						<option value="">Small</option>
						<option value="l">Medium</option>
						<option value="xl">Large</option>
					</select>
				</div>
				<div>
					<label for="dropcap_color">Dropcap Color</label>
					<input  class="color{hash:true,piclerClosable:true, required:false}" type="text" name="dropcap_color" value="" id="dropcap_color" />
				</div>
				<div>
					<label for="dropcap_bgcolor">Dropcap Backgroundcolor</label>
					<input  class="color{hash:true,piclerClosable:true, required:false}" type="text" name="dropcap_bgcolor" value="" id="dropcap_bgcolor" />
				</div>
				<div>
					<label for="dropcap_bgcolor">Dropcap Rounded Corners</label>
					<input type="checkbox" name="dropcap_rounded" value="" id="dropcap_rounded" />
				</div>
				<div>
					<a href="javascript:DropcapDialog.insert(DropcapDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>							
				</div>	
			</div>
			<h3><a href="#">Colored Skills</a></h3>
			<div>
					<div>
						<label for="skill_title">Name of the Skill</label>
						<input type="text" name="skill_title" value="" id="skill_title" />
					</div>
					<div>
						<label for="skill_max">Skill max Value %</label>
						<input type="text" name="skill_max" value="100" id="skill_max" />
					</div>
					<div>
						<label for="skill_value">Skill Value %</label>
						<input type="text" name="skill_current" value="" id="skill_current" />
					</div>
					<div>
						<label for="skill_height">Skill height in Pixel</label>
						<input type="text" name="skill_height" value="" id="skill_height" />
					</div>
					<div>
						<label for="skill_color">Color</label>
						<input  class="color{hash:true,piclerClosable:true, required:false}" type="text" name="skill_color" value="" id="skill_color" />
					</div>
					<div>
						<label for="skill_bgcolor">Backgroundcolor</label>
						<input  class="color{hash:true,piclerClosable:true, required:false}" type="text" name="skill_bgcolor" value="" id="skill_bgcolor" />
					</div>
					<div>
						<a href="javascript:SkillDialog.insert(SkillDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
					</div> 	
			</div>	
			<h3><a href="#">Round Skills</a></h3>
			<div>
					<div>
						<label for="roundskill_title">Name of the Skill</label>
						<input type="text" name="roundskill_title" value="" id="roundskill_title" />
					</div>
					<div>
						<label for="roundskill_text">Text, shown under the title</label>
						<textarea name="roundskill_text" id="roundskill_text" style="width:100%; height:100px"></textarea>
					</div>
					<div>
						<label for="roundskill_max">Skill max Value </label>
						<input type="text" name="roundskill_max" value="100" id="roundskill_max" />
					</div>
					<div>
						<label for="roundskill_value">Skill Value </label>
						<input type="text" name="roundskill_current" value="" id="roundskill_current" />
					</div>
					<div>
						<label for="roundskill_width">Skill width in Pixel</label>
						<input type="text" name="roundskill_width" value="" id="roundskill_width" />
					</div>
					<div>
						<label for="roundskill_color">Color</label>
						<input  class="color{hash:true,piclerClosable:true, required:false}" type="text" name="roundskill_color" value="" id="roundskill_color" />
					</div>
					<div>
						<a href="javascript:RoundskillDialog.insert(RoundskillDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
					</div> 	
			</div> 	
			<h3><a href="#">Servicebox</a></h3>
			<div>
					<div>
						<label for="servicebox_title">Name of the Skill</label>
						<input type="text" name="servicebox_title" value="" id="servicebox_title" />
					</div>
					<div>
						<label for="servicebox_text">Text, shown under the title</label>
						<textarea name="servicebox_text" id="servicebox_text" style="width:100%; height:100px"></textarea>
					</div>
					<div>
						<label for="servicebox_icon">The URL to the Icon</label>
						<input type="text" name="servicebox_icon" value="" id="servicebox_icon" />
					</div>
					<div>
						<label for="servicebox_link">URL of Readmore Link </label>
						<input type="text" name="servicebox_link" value="" id="servicebox_link" />
					</div>
					<div>
						<label for="servicebox_readmore">Title of 'Read more' Link</label>
						<input type="text" name="servicebox_readmore" value="" id="servicebox_readmore" />
					</div> 
					<div>
						<a href="javascript:ServiceboxDialog.insert(ServiceboxDialog.local_ed)" class="updateButton" style="display: block; line-height: 24px;">Insert</a>
					</div> 	
			</div> 
			<?php do_action("shortcode_generator_content_tab"); ?>	
			</form>
		</div>
	</div>
</div><!-- tabs -->
	<?php do_action("sevenleague_sc_generator_add_tab_content"); ?>
<div id="somediv"></div>
</body>
</html>