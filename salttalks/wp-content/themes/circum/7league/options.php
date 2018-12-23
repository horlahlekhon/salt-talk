<?php
$options = array(
	array(
		"type"		=>	 "newtab",
		"name"		=>	 "General",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "General Settings",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Primary Buttoncolor",
		"id"		=>	 $shortname."_primary_button",
		"desc"		=>	 "Choose your default button color",
		"value"		=>	 array("white","gray","darkgray","orange","yellow","pink","purple","blue","red","green","black","custom"),
		"std"		=>	 "custom",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Secondary Buttoncolor",
		"id"		=>	 $shortname."_secondary_button",
		"desc"		=>	 "Choose your secondary button color",
		"value"		=>	 array("white","gray","darkgray","orange","yellow","pink","purple","blue","red","green","black"),
		"std"		=>	 "white",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Enable WooCommerce",
		"id"		=>	 $shortname."_woocommerce",
		"desc"		=>	 "Check this box if you would like to use the style presets for the WooCommerce shop plugin",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Enable Help Notice",
		"id"		=>	 $shortname."_show_admin_notice",
		"desc"		=>	 "Check this box if you would like to display help notices in your theme. This will only displayed if your are logged in as admin.",
		"std"		=>	 "true",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Disable Webfonts",
		"id"		=>	 $shortname."_disable_webfonts",
		"desc"		=>	 "Check this box if you would like to disable Google Webfonts integration: This will speed up your site.",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Dark Design Preset",
		"id"		=>	 $shortname."_dark_preset",
		"desc"		=>	 "Check this box if you would like to use a dark colored layout",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Support page",
		"id"		=>	 $shortname."_show_support_page",
		"desc"		=>	 "Check this box if you would like to show and use the theme help page",
		"std"		=>	 "true",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Enable responsive design",
		"id"		=>	 $shortname."_responsive",
		"desc"		=>	 "Check this box if you would like to enable the responsive design",
		"std"		=>	 "true",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Disable all Comments?",
		"id"		=>	 $shortname."_disable_comments",
		"desc"		=>	 "Check this box if you would like to DISABLE all Comments",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Google Analytics Code",
		"id"		=>	 $shortname."_google_analytics",
		"desc"		=>	 "Your Google Analytics Code",
		"filter"		=>	 "html", 
		"reset"		=>	 "false",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Google Webmastertools Code",
		"id"		=>	 $shortname."_google_webmaster",
		"desc"		=>	 "Your Google Webmastertools Code ()",
		"filter"		=>	 "html", 
		"reset"		=>	 "false",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Extra Javascript Content",
		"id"		=>	 $shortname."_extra_js",
		"desc"		=>	 "Type in your extra javascript code",
		"filter"		=>	 "html", 
		"reset"		=>	 "false",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Extra CSS Content",
		"id"		=>	 $shortname."_extra_css",
		"desc"		=>	 "Type in your extra css codes",
		"filter"		=>	 "html", 
		"reset"		=>	 "false",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Customize Wordpress",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "file",
		"name"		=>	 "Custom Favicon",
		"id"		=>	 $shortname."_favicon",
		"desc"		=>	 "Please click the >> Upload Image << button. Then upload your favicon, scroll to the bottom and click the >> Insert into Post << Button ",
		"filter"		=>	 "url", 
		"std"		=>	 "$favicon_default",
		"reset"		=>	 "false",
		),

	array(
		"type"		=>	 "file",
		"name"		=>	 "Custom Logo",
		"id"		=>	 $shortname."_custom_logo",
		"desc"		=>	 "Please click the >> Upload Image << button. Then upload your logo, scroll to the bottom and click the >> Insert into Post << Button ",
		"std"		=>	 "$logo_default",
		"reset"		=>	 "false",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Logo height",
		"id"		=>	 $shortname."_brand_height",
		"desc"		=>	 "Height of your logo",
		"cssgoal"		=>	 ".element-logo img",
		"csskey"		=>	 "height",
		"cssafter"		=>	 "px",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Logo Alignment",
		"id"		=>	 $shortname."_custom_logo_top",
		"desc"		=>	 "The Distanz in Pixel to the Top of the Branding- and Navigation Section",
		"filter"		=>	 "number", 
		"std"		=>	 "20",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Logo Alignment Bottom",
		"id"		=>	 $shortname."_custom_logo_bottom",
		"desc"		=>	 "The Distanz in Pixel to the Bottom of the Branding- and Navigation Section",
		"filter"		=>	 "number", 
		"std"		=>	 "20",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Background",
		"id"		=>	 $shortname."_brand_bg",
		"desc"		=>	 "Background color for your logo",
		"cssgoal"		=>	 ".element-logo img",
		"csskey"		=>	 "background-color",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color Logo",
		"id"		=>	 $shortname."_brand_color",
		"desc"		=>	 "Color for your logo (only if you remove the logo and use the page title and slogan)",
		"cssgoal"		=>	 "#brand #pagename",
		"csskey"		=>	 "color",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Logo Fontsize",
		"id"		=>	 $shortname."_brand_fontsize",
		"desc"		=>	 "Fontsize for your logo (only if you remove the logo and use the page title and slogan)",
		"cssgoal"		=>	 "#brand #pagename",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color Slogan",
		"id"		=>	 $shortname."_slogan_color",
		"desc"		=>	 "Color for your slogan (only if you remove the logo and use the page title and slogan)",
		"cssgoal"		=>	 "#brand #pageslogan",
		"csskey"		=>	 "color",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Fontsize Slogan",
		"id"		=>	 $shortname."_slogan_fontsize",
		"desc"		=>	 "Fontsize for your slogan (only if you remove the logo and use the page title and slogan)",
		"cssgoal"		=>	 "#brand #pageslogan",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Background Mouseover",
		"id"		=>	 $shortname."_brand_bg_hover",
		"desc"		=>	 "Background color for your logo on mouseover",
		"cssgoal"		=>	 "#brand img:hover",
		"csskey"		=>	 "background-color",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding",
		"id"		=>	 $shortname."_brand_padding",
		"desc"		=>	 "Padding for your logo in pixel (if you use background color)",
		"cssgoal"		=>	 "#brand img",
		"csskey"		=>	 "padding",
		"cssafter"		=>	 "px",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Hide Wordpress",
		"id"		=>	 $shortname."_hide_wp",
		"desc"		=>	 "Check this box if you would like to make anonymous Wordpress",
		"filter"		=>	 "checkbox", 
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Shortcodes",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "space",
		"name"		=>	 "Userinterface Colors",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor",
		"id"		=>	 $shortname."_ui_bgcolor",
		"desc"		=>	 "Please define a Background-Color for the UI elements",
		"std"		=>	 "rgb(72, 147, 227)",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color",
		"id"		=>	 $shortname."_ui_color",
		"desc"		=>	 "Please define a Color for the UI elements",
		"std"		=>	 "rgb(255, 255, 255)",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor",
		"id"		=>	 $shortname."_ui_bgcolor_hover",
		"desc"		=>	 "Please define a hover Background-Color for the UI elements (i.e. for buttons)",
		"std"		=>	 "rgb(49, 107, 169)",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color",
		"id"		=>	 $shortname."_ui_color_hover",
		"desc"		=>	 "Please define a hover color for the UI elements (i.e. buttons)",
		"std"		=>	 "rgb(255, 255, 255)",
		),

	array(
		"type"		=>	 "space",
		"name"		=>	 "Accordion Box-style",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Accordion Color",
		"id"		=>	 $shortname."_accordion_font",
		"desc"		=>	 "Please define a Fontcolor for the 'Box-Style' Accordion",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Accordion Background",
		"id"		=>	 $shortname."_accordion_bg",
		"desc"		=>	 "Please define a Backgroundcolor for the 'Box-Style' Accordion",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Accordion Border",
		"id"		=>	 $shortname."_accordion_border",
		"desc"		=>	 "Please define a Bordercolor for the 'Box-Style' Accordion",
		),

	array(
		"type"		=>	 "space",
		"name"		=>	 "Toggle 'Box' Type",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Toggle Box Color",
		"id"		=>	 $shortname."_togglebox_color",
		"desc"		=>	 "Please define a Color for the 'Box-Style' Toggle",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Toggle Box Background",
		"id"		=>	 $shortname."_togglebox_bg",
		"desc"		=>	 "Please define a Backgroundcolor for the 'Box-Style' Toggle",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Toggle Box Border",
		"id"		=>	 $shortname."_togglebox_border",
		"desc"		=>	 "Please define a Bordercolor for the 'Box-Style' Toggle",
		),

	array(
		"type"		=>	 "space",
		"name"		=>	 "Toggle 'Color' Type",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color-Toggle Color",
		"id"		=>	 $shortname."_ctoggle_color",
		"desc"		=>	 "Please define a Color for the 'Color-Style' Toggle Headline",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color-Toggle Background",
		"id"		=>	 $shortname."_ctoggle_bgcolor",
		"desc"		=>	 "Please define a Backgroundcolor for the 'Color-Style' Toggle Headline",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color-Toggle Color Content",
		"id"		=>	 $shortname."_ctoggle_content_color",
		"desc"		=>	 "Please define a Color for the 'Color-Style' Toggle Content",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color-Toggle Background Content",
		"id"		=>	 $shortname."_ctoggle_content_bg",
		"desc"		=>	 "Please define a Backgroundcolor for the 'Color-Style' Toggle Content",
		),

	array(
		"type"		=>	 "space",
		"name"		=>	 "Pricing tables",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor",
		"id"		=>	 $shortname."_pricing_bgcolor",
		"desc"		=>	 "Please define a Background-Color for the pricingtable shortcode",
		"std"		=>	 "rgb(72, 147, 227)",
		"cssgoal"		=>	 ".pricing_heading",
		"csskey"		=>	 "background",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color",
		"id"		=>	 $shortname."_pricing_color",
		"desc"		=>	 "Please define a Color for the pricingtable shortcode",
		"std"		=>	 "rgb(255, 255, 255)",
		"cssgoal"		=>	 ".pricing_heading h3, .pricing_heading h4",
		"csskey"		=>	 "color",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Global Settings",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "space",
		"name"		=>	 "Blog",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Global Post Headlines",
		"id"		=>	 $shortname."_global_post_headlines",
		"desc"		=>	 "Check this box if you want to show the headlines by default (This will work only for existing posts)",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "template",
		"name"		=>	 "Global post template",
		"id"		=>	 $shortname."_global_post_template",
		"desc"		=>	 "Choose a globalTemplate for your posts.",
		"std"		=>	 "page-sidebar-no-sidebar",
		),

	array(
		"type"		=>	 "sidebar-dropdown",
		"name"		=>	 "Global post Sidebar",
		"id"		=>	 $shortname."_global_post_sidebar",
		"desc"		=>	 "Choose a global sidebar for your posts.",
		),

	array(
		"type"		=>	 "space",
		"name"		=>	 "Archive",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Global Archive Headlines",
		"id"		=>	 $shortname."_global_archive_headlines",
		"desc"		=>	 "Check this box if you want to show the headlines by default (This will work only for existing posts)",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "template",
		"name"		=>	 "Global Archive template",
		"id"		=>	 $shortname."_global_archive_template",
		"desc"		=>	 "Choose a globalTemplate for your blog archive template .",
		"std"		=>	 "page-sidebar-no-sidebar",
		),

	array(
		"type"		=>	 "sidebar-dropdown",
		"name"		=>	 "Global Archive Sidebar",
		"id"		=>	 $shortname."_global_archive_sidebar",
		"desc"		=>	 "Choose a global sidebar for your blog archive template.",
		),

	array(
		"type"		=>	 "space",
		"name"		=>	 "Pages",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Global Page Headlines",
		"id"		=>	 $shortname."_global_page_headlines",
		"desc"		=>	 "Check this box if you want to show the headlines by default (This will work only for existing pages)",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "template",
		"name"		=>	 "Global page template",
		"id"		=>	 $shortname."_global_page_template",
		"desc"		=>	 "Choose a global template  for your pages",
		"std"		=>	 "page-sidebar-no-sidebar",
		),

	array(
		"type"		=>	 "sidebar-dropdown",
		"name"		=>	 "Global page sidebar",
		"id"		=>	 $shortname."_global_page_sidebar",
		"desc"		=>	 "Choose a global sidebar for your pages.",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Blog Excerpt",
		"id"		=>	 $shortname."_show_fullpost",
		"desc"		=>	 "Check this box if you want to show the complete content instead of the excerpt",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Body",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 " Body",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "info",
		"desc"		=>	 "NOTE: Set your generell Settings here. If you dont want to set the Settings of every Sitesection, you can here set generell Settings for all Elements. Per Examble: You can set the Fontsize to 14px, then the Fontsize will be used for all Sitesections, as long you dont set another Fontsize in another Section.",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor ",
		"id"		=>	 $shortname."_Body_bgcolor",
		"desc"		=>	 "Set the Background Color for the Body Section",
		"cssgoal"		=>	 "body",
		"csskey"		=>	 "background-color",
		"customizertitle"		=>	 "Body Background",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "2. Backgroundcolor ",
		"id"		=>	 $shortname."_Body_bgcolor2",
		"desc"		=>	 "A second background color for a vertical gradient",
		),

	array(
		"type"		=>	 "background",
		"name"		=>	 "Background Image",
		"id"		=>	 $shortname."_Body_bgimage",
		"desc"		=>	 "The Body Section Background Image",
		),

	array(
		"type"		=>	 "background-x",
		"name"		=>	 "Background Horizontal",
		"id"		=>	 $shortname."_Body_bgimage_x",
		"desc"		=>	 "Horizontal align for the Body Section Background Image",
		"std"		=>	 "top",
		),

	array(
		"type"		=>	 "background-y",
		"name"		=>	 "Background Vertical",
		"id"		=>	 $shortname."_Body_bgimage_y",
		"desc"		=>	 "The Vertical algin for the Body Section Background Image",
		"std"		=>	 "left",
		),

	array(
		"type"		=>	 "background-repeat",
		"name"		=>	 "Background Repeat",
		"id"		=>	 $shortname."_Body_bgimage_repeat",
		"desc"		=>	 "The Repeat for the Body Section Background Image",
		),

	array(
		"type"		=>	 "background-fix",
		"name"		=>	 "Background Fix",
		"id"		=>	 $shortname."_Body_bgimage_fix",
		"desc"		=>	 "The Repeat for the Body Section Background Image",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Background Selection",
		"id"		=>	 $shortname."_selection",
		"desc"		=>	 "Set the Background Color for selected Elements",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Box shadow size",
		"id"		=>	 $shortname."_block_shadow_size",
		"desc"		=>	 "Choose a size in pixel for the shadow (only for boxed layout)",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Box shadow color",
		"id"		=>	 $shortname."_block_shadow_color",
		"desc"		=>	 "Choose a color for the box shadow (only for boxed layout)",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Distance Top",
		"id"		=>	 $shortname."_layout_top",
		"desc"		=>	 "The distance to the top (only for boxed layout)",
		"cssgoal"		=>	 "#page",
		"csskey"		=>	 "margin-top",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Margin Top (works only in boxed Version)",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Distance Bottom",
		"id"		=>	 $shortname."_layout_bottom",
		"desc"		=>	 "The distance to the bottom (only for boxed layout)",
		"cssgoal"		=>	 "#page",
		"csskey"		=>	 "margin-bottom",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Margin Bottom (works only in boxed Version)",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Typographie",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "Text - Font",
		"id"		=>	 $shortname."_Body_font",
		"desc"		=>	 "The Font for the H1 Tag",
		"std"		=>	 "Open Sans:regular",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "Fontsize",
		"id"		=>	 $shortname."_Body_fontsize",
		"desc"		=>	 "The Fontsize for the H1 Tag",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "body",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Body Fontsize in pixel",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "Fontcolor",
		"id"		=>	 $shortname."_Body_fontcolor",
		"desc"		=>	 "The Fontcolor for the H1 Tag",
		"std"		=>	 "#A0A0A0",
		"cssgoal"		=>	 "body",
		"csskey"		=>	 "color",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Link Color",
		"id"		=>	 $shortname."_Body_acolor",
		"desc"		=>	 "The Linkcolor for the Body Section",
		"cssgoal"		=>	 "a",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "Link Color",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Link Color Hover",
		"id"		=>	 $shortname."_Body_ahcolor",
		"desc"		=>	 "The Linkcolor Mouseover for the Body Section",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Link Color Visited",
		"id"		=>	 $shortname."_Body_avcolor",
		"desc"		=>	 "The Linkcolor for visited Links",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Link Underline",
		"id"		=>	 $shortname."_Body_adecoration",
		"desc"		=>	 "Decorate the Links in the Body Section with a Underline",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H1 Font",
		"id"		=>	 $shortname."_Body_h1_font",
		"desc"		=>	 "The Font for the H1 Tag",
		"std"		=>	 "Raleway:900",
		"cssgoal"		=>	 "body h1",
		"customizertitle"		=>	 "H1 Font",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H1 Fontsize",
		"id"		=>	 $shortname."_Body_h1_fontsize",
		"desc"		=>	 "The Fontsize for the H1 Tag",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "h1, h1 a, a h1",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "H1 Fontsize in pixel",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H1 Fontcolor",
		"id"		=>	 $shortname."_Body_h1_fontcolor",
		"desc"		=>	 "The Fontcolor for the H1 Tag",
		"std"		=>	 "rgb(0, 0, 0)",
		"cssgoal"		=>	 "h1, a h1, h1 a",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "H1 Color",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H2 Font",
		"id"		=>	 $shortname."_Body_h2_font",
		"desc"		=>	 "The Font for the H2 Tag",
		"std"		=>	 "Raleway:900",
		"cssgoal"		=>	 "body h2",
		"customizertitle"		=>	 "H2 Font",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H2 Fontsize",
		"id"		=>	 $shortname."_Body_h2_fontsize",
		"desc"		=>	 "The Fontsize for the H2 Tag",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "h2, h2 a, a h2",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "H2 Fontsize in pixel",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H2 Fontcolor",
		"id"		=>	 $shortname."_Body_h2_fontcolor",
		"desc"		=>	 "The Fontcolor for the H2 Tag",
		"std"		=>	 "rgb(0, 0, 0)",
		"cssgoal"		=>	 "h2, a h2, h2 a",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "H2 Color",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H3 Font",
		"id"		=>	 $shortname."_Body_h3_font",
		"desc"		=>	 "The Font for the H3 Tag",
		"std"		=>	 "Raleway:900",
		"cssgoal"		=>	 "body h3",
		"customizertitle"		=>	 "H3 Font",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H3 Fontsize",
		"id"		=>	 $shortname."_Body_h3_fontsize",
		"desc"		=>	 "The Fontsize for the H3 Tag",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "h3, h3 a, a h3",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "H3 Fontsize in pixel",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H3 Fontcolor",
		"id"		=>	 $shortname."_Body_h3_fontcolor",
		"desc"		=>	 "The Fontcolor for the H1 Tag",
		"std"		=>	 "rgb(0, 0, 0)",
		"cssgoal"		=>	 "h3, a h3, h3 a",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "H3 Color",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H4 Font",
		"id"		=>	 $shortname."_Body_h4_font",
		"desc"		=>	 "The Font for the H4 Tag",
		"std"		=>	 "Raleway:900",
		"cssgoal"		=>	 "body h4",
		"customizertitle"		=>	 "H4 Font",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H4 Fontsize",
		"id"		=>	 $shortname."_Body_h4_fontsize",
		"desc"		=>	 "The Fontsize for the H4 Tag",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "h4, h4 a",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "H4 Fontsize in pixel",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H4 Fontcolor",
		"id"		=>	 $shortname."_Body_h4_fontcolor",
		"desc"		=>	 "The Fontcolor for the H4 Tag",
		"std"		=>	 "rgb(0, 0, 0)",
		"cssgoal"		=>	 "h4, a h4, h4 a",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "H4 Color",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H5 Font",
		"id"		=>	 $shortname."_Body_h5_font",
		"desc"		=>	 "The Font for the H5 Tag",
		"std"		=>	 "Raleway:600",
		"cssgoal"		=>	 "body h5",
		"customizertitle"		=>	 "H5 Font",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H5 Fontsize",
		"id"		=>	 $shortname."_Body_h5_fontsize",
		"desc"		=>	 "The Fontsize for the H5 Tag",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "h5, h5 a",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "H5 Fontsize in pixel",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H5 Fontcolor",
		"id"		=>	 $shortname."_Body_h5_fontcolor",
		"desc"		=>	 "The Fontcolor for the H5 Tag",
		"std"		=>	 "rgb(0, 0, 0)",
		"cssgoal"		=>	 "h5, a h5, h5 a",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "H5 Color",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H6 Font",
		"id"		=>	 $shortname."_Body_h6_font",
		"desc"		=>	 "The Font for the H6 Tag",
		"std"		=>	 "Raleway:regular",
		"cssgoal"		=>	 "body h6",
		"customizertitle"		=>	 "H6 Font",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H6 Fontsize",
		"id"		=>	 $shortname."_Body_h6_fontsize",
		"desc"		=>	 "The Fontsize for the H6 Tag",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "h6, h6 a",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "H6 Fontsize in pixel",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H6 Fontcolor",
		"id"		=>	 $shortname."_Body_h6_fontcolor",
		"desc"		=>	 "The Fontcolor for the H6 Tag",
		"std"		=>	 "rgb(0, 0, 0)",
		"cssgoal"		=>	 "h6, a h6, h6 a",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "H6 Color",
		"csection"		=>	 "body",
		),

	array(
		"type"		=>	 "fontmulti",
		"name"		=>	 "Additional Fonts",
		"id"		=>	 $shortname."_additional_fonts",
		"desc"		=>	 "Additional fonts to load",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Overheader",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Overheader",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show?",
		"id"		=>	 $shortname."_show_overheader",
		"desc"		=>	 "Show this Section?",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Width",
		"id"		=>	 $shortname."_overheader_inner",
		"desc"		=>	 "Choose the width of this section, inner = block, softinner = full width, only visible if you use the full-width layout",
		"value"		=>	 array("inner","softinner"),
		"std"		=>	 "inner",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor ",
		"id"		=>	 $shortname."_overhead_bgcolor",
		"desc"		=>	 "Set the Background Color for this Section",
		"cssgoal"		=>	 "#overheader",
		"csskey"		=>	 "background-color",
		"customizertitle"		=>	 "Background Overheader",
		"csection"		=>	 "overheader",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "2. Backgroundcolor ",
		"id"		=>	 $shortname."_overhead_bgcolor2",
		"desc"		=>	 "A second background color for a vertical gradient",
		),

	array(
		"type"		=>	 "background",
		"name"		=>	 "Background Image",
		"id"		=>	 $shortname."_overhead_bgimage",
		"desc"		=>	 "The Background Image for this Section",
		),

	array(
		"type"		=>	 "background-x",
		"name"		=>	 "Background Horizontal",
		"id"		=>	 $shortname."_overhead_bgimage_x",
		"desc"		=>	 "Horizontal align for this Section Background Image",
		),

	array(
		"type"		=>	 "background-y",
		"name"		=>	 "Background Vertical",
		"id"		=>	 $shortname."_overhead_bgimage_y",
		"desc"		=>	 "The Vertical algin for this Section Background Image",
		),

	array(
		"type"		=>	 "background-repeat",
		"name"		=>	 "Background Repeat",
		"id"		=>	 $shortname."_overhead_bgimage_repeat",
		"desc"		=>	 "The Repeat for this Section Background Image",
		),

	array(
		"type"		=>	 "background-fix",
		"name"		=>	 "Background Fix",
		"id"		=>	 $shortname."_overhead_bgimage_fix",
		"desc"		=>	 "The Repeat for this Section Background Image",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Top",
		"id"		=>	 $shortname."_overheader_padding_top",
		"desc"		=>	 "The padding to the top in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#overheader > div",
		"csskey"		=>	 "padding-top",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Padding Top",
		"csection"		=>	 "overheader",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Bottom",
		"id"		=>	 $shortname."_overheader_padding_bottom",
		"desc"		=>	 "The padding to the bottom in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#overheader > div",
		"csskey"		=>	 "padding-bottom",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Padding Bottom",
		"csection"		=>	 "overheader",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color",
		"id"		=>	 $shortname."_overhead_color",
		"desc"		=>	 "Set the Color for this Section",
		"cssgoal"		=>	 "#overheader",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "Overheader Color",
		"csection"		=>	 "overheader",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Fontsize",
		"id"		=>	 $shortname."_overheader_fontsize",
		"desc"		=>	 "The fontsize for this section",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#overheader",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Text align",
		"id"		=>	 $shortname."_overheader_text_align",
		"desc"		=>	 "Choose the text-align for this section",
		"value"		=>	 array("","left","center","right"),
		"cssgoal"		=>	 "#overheader",
		"csskey"		=>	 "text-align",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Content",
		"id"		=>	 $shortname."_overhead_content",
		"desc"		=>	 "The Content for this Section. You can also use Shortcodes",
		"filter"		=>	 "html", 
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Header",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Header Section",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "info",
		"desc"		=>	 "NOTE: You can upload your own logo here: Theme options -> General -> Customize WordPress -> Custom Logo.",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Width",
		"id"		=>	 $shortname."_header_inner",
		"desc"		=>	 "Choose the width of this section, inner = block, softinner = full width, only visible if you use the full-width layout",
		"value"		=>	 array("inner","softinner"),
		"std"		=>	 "softinner",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor ",
		"id"		=>	 $shortname."_Navigation_bgcolor",
		"desc"		=>	 "Set the Background Color for the Header Section",
		"cssgoal"		=>	 "#header",
		"csskey"		=>	 "background-color",
		"customizertitle"		=>	 "Background Header",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "2. Backgroundcolor ",
		"id"		=>	 $shortname."_Navigation_bgcolor2",
		"desc"		=>	 "A second background color for a vertical gradient",
		),

	array(
		"type"		=>	 "background",
		"name"		=>	 "Background Image",
		"id"		=>	 $shortname."_Navigation_bgimage",
		"desc"		=>	 "The Header Section Background Image",
		),

	array(
		"type"		=>	 "background-x",
		"name"		=>	 "Background Horizontal",
		"id"		=>	 $shortname."_Navigation_bgimage_x",
		"desc"		=>	 "Horizontal align for the Header Section Background Image",
		),

	array(
		"type"		=>	 "background-y",
		"name"		=>	 "Background Vertical",
		"id"		=>	 $shortname."_Navigation_bgimage_y",
		"desc"		=>	 "The Vertical algin for the Header Section Background Image",
		),

	array(
		"type"		=>	 "background-repeat",
		"name"		=>	 "Background Repeat",
		"id"		=>	 $shortname."_Navigation_bgimage_repeat",
		"desc"		=>	 "The Repeat for the Header Section Background Image",
		),

	array(
		"type"		=>	 "background-fix",
		"name"		=>	 "Background Fix",
		"id"		=>	 $shortname."_Navigation_bgimage_fix",
		"desc"		=>	 "The Repeat for the Header Section Background Image",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Navigation",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Navigation",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Menu description",
		"id"		=>	 $shortname."_has_menu_description",
		"desc"		=>	 "Check if you want to use the menu description",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Background menu",
		"id"		=>	 $shortname."_menu_bgcol",
		"desc"		=>	 "The background color for the navigation",
		"cssgoal"		=>	 "header #menu, body.has_slider header #menu:hover, #menu_below_slider ",
		"csskey"		=>	 "background",
		"customizertitle"		=>	 "Background Menu",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "Text - Font",
		"id"		=>	 $shortname."_menu_font",
		"desc"		=>	 "The Font for the Menu",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "Fontsize",
		"id"		=>	 $shortname."_menu_fontsize",
		"desc"		=>	 "The Fontsize for the Menu",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "header ul#menu > li > a, header ul#menu > li > i, .cart-contents",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Top-Menu Fontsize",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "Fontcolor",
		"id"		=>	 $shortname."_menu_acolor",
		"desc"		=>	 "The Fontcolor for the Menu",
		"std"		=>	 "rgb(0, 0, 0)",
		"cssgoal"		=>	 "header .main-menu a",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "Menu Color",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Link Mouseover Topnavigation",
		"id"		=>	 $shortname."_menu_ahcolor",
		"desc"		=>	 "Set the Background Color",
		"cssgoal"		=>	 "header #menu > li:hover  > a",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "Color Topmenu mouseover",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Background Mouseover Topnavigation",
		"id"		=>	 $shortname."_menu_topbghcolor",
		"desc"		=>	 "Set the Background Color",
		"cssgoal"		=>	 "header #menu > li:hover ",
		"csskey"		=>	 "background-color",
		"customizertitle"		=>	 "Background Topmenu Mouseover",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "Submenu Text - Font",
		"id"		=>	 $shortname."_submenu_font",
		"desc"		=>	 "The Font for the Submenu",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "Submenu Fontsize",
		"id"		=>	 $shortname."_menu_sub_fontsize",
		"desc"		=>	 "The Fontsize for the Submenu",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "ul#menu ul.sub-menu  a",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Sub-Menu Fontsize",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "Submenu Fontcolor",
		"id"		=>	 $shortname."_menu_asubcolor",
		"desc"		=>	 "The Fontcolor for the Submenu",
		"cssgoal"		=>	 "header .main-menu ul.sub-menu li a, header .main-menu ul.sub-menu li, ul#responsive_menu li a",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "Sub-Menu color",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Height Submenu Element",
		"id"		=>	 $shortname."_menu_line_height",
		"desc"		=>	 "Set the Height for each Submenu - Element in Pixel",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Submenu Border-color",
		"id"		=>	 $shortname."_menu_sub_bordercolor",
		"desc"		=>	 "The Color for the border",
		"cssgoal"		=>	 "header #menu ul.sub-menu li, .seven_mega_menu ul.menu li, .seven_mega_menu ul li ",
		"csskey"		=>	 "border-color",
		"cssafter"		=>	 " !important",
		"customizertitle"		=>	 "Color Submenu Separator / Border",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Submenu Border Size",
		"id"		=>	 $shortname."_menu_sub_bordersize",
		"desc"		=>	 "The size for the border in pixel",
		"cssgoal"		=>	 "header #menu ul.sub-menu li, .seven_mega_menu ul.menu li, .seven_mega_menu ul li ",
		"csskey"		=>	 "border-bottom",
		"cssafter"		=>	 "px solid",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor Subnavigation",
		"id"		=>	 $shortname."_menu_bgsubcolor",
		"desc"		=>	 "Set the Background Color",
		"cssgoal"		=>	 "header #menu ul.sub-menu",
		"csskey"		=>	 "background-color",
		"customizertitle"		=>	 "Background Sub-Menu",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor Mouseover Subnavigation",
		"id"		=>	 $shortname."_menu_bghsubcolor",
		"desc"		=>	 "Set the Background Color",
		"cssgoal"		=>	 "header #menu ul.sub-menu li:hover",
		"csskey"		=>	 "background-color",
		"customizertitle"		=>	 "Background Mouseover Submenu",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Linkcolor Mouseover Subnavigation",
		"id"		=>	 $shortname."_menu_ahsubcolor",
		"desc"		=>	 "Set the Background Color",
		"cssgoal"		=>	 "header ul.sub-menu li:hover a",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "Linkcolor Mouseover Submenu",
		"csection"		=>	 "header",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Background responsive Menu",
		"id"		=>	 $shortname."_mobilemenu_bg",
		"desc"		=>	 "Set the background color for responsive navigation",
		"std"		=>	 "rgb(72, 147, 227)",
		"cssgoal"		=>	 ".mean-container .mean-bar, .mean-container .mean-nav",
		"csskey"		=>	 "background-color",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color responsive Menu",
		"id"		=>	 $shortname."_mobilemenu_color",
		"desc"		=>	 "Set the color for responsive navigation",
		"std"		=>	 "rgb(255, 255, 255)",
		"cssgoal"		=>	 ".mean-container .mean-bar, .mean-container .mean-bar:after, .mean-bar a, .mean-container a.meanmenu-reveal, .mean-container .mean-nav ul li a ",
		"csskey"		=>	 "color",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Text Mobile Menu",
		"id"		=>	 $shortname."_mobilemenu_label",
		"desc"		=>	 "Set the overlay text for the responsive menu",
		"std"		=>	 "Menu",
		"cssgoal"		=>	 ".mean-container .mean-bar:after",
		"csskey"		=>	 "content",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Additional Menu Content",
		"id"		=>	 $shortname."_addit_menu_content",
		"desc"		=>	 "Insert additional Content to the menu",
		"filter"		=>	 "html", 
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Slideshow Section",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Slideshow Section",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor ",
		"id"		=>	 $shortname."_Slider_bgcolor",
		"desc"		=>	 "Set the Background Color for this Section",
		),

	array(
		"type"		=>	 "background",
		"name"		=>	 "Background Image",
		"id"		=>	 $shortname."_Slider_bgimage",
		"desc"		=>	 "Section Background Image",
		),

	array(
		"type"		=>	 "background-x",
		"name"		=>	 "Background Horizontal",
		"id"		=>	 $shortname."_Slider_bgimage_x",
		"desc"		=>	 "Horizontal align for this Section Background Image",
		"std"		=>	 "top",
		),

	array(
		"type"		=>	 "background-y",
		"name"		=>	 "Background Vertical",
		"id"		=>	 $shortname."_Slider_bgimage_y",
		"desc"		=>	 "The Vertical algin for this Section Background Image",
		"std"		=>	 "left",
		),

	array(
		"type"		=>	 "background-repeat",
		"name"		=>	 "Background Repeat",
		"id"		=>	 $shortname."_Slider_bgimage_repeat",
		"desc"		=>	 "The Repeat for this Section Background Image",
		),

	array(
		"type"		=>	 "background-fix",
		"name"		=>	 "Background Fix",
		"id"		=>	 $shortname."_Slider_bgimage_fix",
		"desc"		=>	 "The Repeat for this Section Background Image",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Top",
		"id"		=>	 $shortname."_slider_padding_top",
		"desc"		=>	 "The padding to the top in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#hero .boxed_slider",
		"csskey"		=>	 "padding-top",
		"cssafter"		=>	 "px",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Bottom",
		"id"		=>	 $shortname."_slider_padding_bottom",
		"desc"		=>	 "The padding to the bottom in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#hero .boxed_slider",
		"csskey"		=>	 "padding-bottom",
		"cssafter"		=>	 "px",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Dark Loading Gif",
		"id"		=>	 $shortname."_dark_spinner",
		"desc"		=>	 "Check this box if you want to use a dark background",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H2 Font",
		"id"		=>	 $shortname."_slider_h2_font",
		"desc"		=>	 "The Font for the H2 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H2 Fontsize",
		"id"		=>	 $shortname."_slider_h2_fontsize",
		"desc"		=>	 "The Fontsize for the H2 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H2 Fontcolor",
		"id"		=>	 $shortname."_slider_h2_fontcolor",
		"desc"		=>	 "The Fontcolor for the H2 Tag",
		"std"		=>	 "rgb(0, 0, 0)",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H3 Font",
		"id"		=>	 $shortname."_slider_h3_font",
		"desc"		=>	 "The Font for the H3 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H3 Fontsize",
		"id"		=>	 $shortname."_slider_h3_fontsize",
		"desc"		=>	 "The Fontsize for the H3 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H3 Fontcolor",
		"id"		=>	 $shortname."_slider_h3_fontcolor",
		"desc"		=>	 "The Fontcolor for the H1 Tag",
		"std"		=>	 "rgb(57, 57, 57)",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Text shadow",
		"id"		=>	 $shortname."_slider_text_shadow",
		"desc"		=>	 "The text shadow for this section",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Text Background",
		"id"		=>	 $shortname."_slider_text_background",
		"desc"		=>	 "The text background for this section",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Headline Section",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Headline Section",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Width",
		"id"		=>	 $shortname."_headline-section_inner",
		"desc"		=>	 "Choose the width of this section, inner = block, softinner = full width, only visible if you use the full-width layout",
		"value"		=>	 array("inner","softinner"),
		"std"		=>	 "inner",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor ",
		"id"		=>	 $shortname."_Service_bgcolor",
		"desc"		=>	 "Set the Background Color for this Section",
		"cssgoal"		=>	 "#head_line",
		"csskey"		=>	 "background-color",
		"customizertitle"		=>	 "Background Headline Section",
		"csection"		=>	 "headline",
		),

	array(
		"type"		=>	 "background",
		"name"		=>	 "Background Image",
		"id"		=>	 $shortname."_Service_bgimage",
		"desc"		=>	 "Section Background Image",
		),

	array(
		"type"		=>	 "background-x",
		"name"		=>	 "Background Horizontal",
		"id"		=>	 $shortname."_Service_bgimage_x",
		"desc"		=>	 "Horizontal align for this Section Background Image",
		),

	array(
		"type"		=>	 "background-y",
		"name"		=>	 "Background Vertical",
		"id"		=>	 $shortname."_Service_bgimage_y",
		"desc"		=>	 "The Vertical algin for this Section Background Image",
		),

	array(
		"type"		=>	 "background-repeat",
		"name"		=>	 "Background Repeat",
		"id"		=>	 $shortname."_Service_bgimage_repeat",
		"desc"		=>	 "The Repeat for this Section Background Image",
		),

	array(
		"type"		=>	 "background-fix",
		"name"		=>	 "Background Fix",
		"id"		=>	 $shortname."_Service_bgimage_fix",
		"desc"		=>	 "The Repeat for this Section Background Image",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Top",
		"id"		=>	 $shortname."_head_line_padding_top",
		"desc"		=>	 "The padding to the top in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#head_line > div",
		"csskey"		=>	 "padding-top",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Padding Top",
		"csection"		=>	 "headline",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Bottom",
		"id"		=>	 $shortname."_head_line_padding_bottom",
		"desc"		=>	 "The padding to the bottom in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#head_line > div",
		"csskey"		=>	 "padding-bottom",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Padding Bottom",
		"csection"		=>	 "headline",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Before content",
		"id"		=>	 $shortname."_before_headline_content",
		"desc"		=>	 "Content to show above the headline",
		"filter"		=>	 "html", 
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H1 Font",
		"id"		=>	 $shortname."_hl_h1_font",
		"desc"		=>	 "The Font for the H1 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H1 Fontsize",
		"id"		=>	 $shortname."_hl_h1_fontsize",
		"desc"		=>	 "The Fontsize for the H1 Tag",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#head_line h1",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "H1 Fontsize",
		"csection"		=>	 "headline",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H1 Fontcolor",
		"id"		=>	 $shortname."_hl_h1_fontcolor",
		"desc"		=>	 "The Fontcolor for the H1 Tag",
		"cssgoal"		=>	 "#head_line h1",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "Color Headline Section H1",
		"csection"		=>	 "headline",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H2Font",
		"id"		=>	 $shortname."_hl_h2_font",
		"desc"		=>	 "The Font for the H2 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H2 Fontsize",
		"id"		=>	 $shortname."_hl_h2_fontsize",
		"desc"		=>	 "The Fontsize for the H2 Tag",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#head_line h2",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "H2 Color",
		"csection"		=>	 "headline",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H2 Fontcolor",
		"id"		=>	 $shortname."_hl_h2_fontcolor",
		"desc"		=>	 "The Fontcolor for the H2 Tag",
		"cssgoal"		=>	 "#head_line h2",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "Color Headline Section H2",
		"csection"		=>	 "headline",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Text align",
		"id"		=>	 $shortname."_headline_align",
		"desc"		=>	 "The align for the headline",
		"value"		=>	 array("","left","center","right"),
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "After content",
		"id"		=>	 $shortname."_after_headline_content",
		"desc"		=>	 "Content to show below the headline",
		"filter"		=>	 "html", 
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Additional content",
		"id"		=>	 $shortname."_headline_add_content",
		"desc"		=>	 "Additional content for this section, you can use plain text, html and shortcodes",
		"filter"		=>	 "html", 
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Content Font Size",
		"id"		=>	 $shortname."_headline_content_font_size",
		"desc"		=>	 "The font size for the content in the headline section",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#head_line",
		"csskey"		=>	 "font-size",
		"cssafter"		=>	 "px;",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Content Color",
		"id"		=>	 $shortname."_headline_content_color",
		"desc"		=>	 "The color for the content in this area",
		"cssgoal"		=>	 "#head_line",
		"csskey"		=>	 "color",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Main Section",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Main section",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor ",
		"id"		=>	 $shortname."_Main_bgcolor",
		"desc"		=>	 "Set the Background Color for the Main Section",
		"cssgoal"		=>	 "#main, .mainsection",
		"csskey"		=>	 "background-color",
		"customizertitle"		=>	 "Mainsection Background",
		"csection"		=>	 "main",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "2. Backgroundcolor ",
		"id"		=>	 $shortname."_Main_bgcolor2",
		"desc"		=>	 "A second background color for a vertical gradient",
		),

	array(
		"type"		=>	 "background",
		"name"		=>	 "Background Image",
		"id"		=>	 $shortname."_Main_bgimage",
		"desc"		=>	 "The Main Section Background Image",
		),

	array(
		"type"		=>	 "background-x",
		"name"		=>	 "Background Horizontal",
		"id"		=>	 $shortname."_Main_bgimage_x",
		"desc"		=>	 "Horizontal align for the Main Section Background Image",
		),

	array(
		"type"		=>	 "background-y",
		"name"		=>	 "Background Vertical",
		"id"		=>	 $shortname."_Main_bgimage_y",
		"desc"		=>	 "The Vertical algin for the Main Section Background Image",
		),

	array(
		"type"		=>	 "background-repeat",
		"name"		=>	 "Background Repeat",
		"id"		=>	 $shortname."_Main_bgimage_repeat",
		"desc"		=>	 "The Repeat for the Main Section Background Image",
		),

	array(
		"type"		=>	 "background-fix",
		"name"		=>	 "Background Fix",
		"id"		=>	 $shortname."_Main_bgimage_fix",
		"desc"		=>	 "The Repeat for the Main Section Background Image",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Top",
		"id"		=>	 $shortname."_main_padding_top",
		"desc"		=>	 "The padding to the top in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 ".mainsection > .inner, .maincontent",
		"csskey"		=>	 "padding-top",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Padding Top",
		"csection"		=>	 "main",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Bottom",
		"id"		=>	 $shortname."_main_padding_bottom",
		"desc"		=>	 "The padding to the bottom in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 ".mainsection > .inner, .maincontent",
		"csskey"		=>	 "padding-bottom",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Padding Bottom",
		"csection"		=>	 "main",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Before Content",
		"id"		=>	 $shortname."_before_content",
		"desc"		=>	 "Some HTML or Text to display over the content section (sitewide)",
		"filter"		=>	 "html", 
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Before content background",
		"id"		=>	 $shortname."_before_content_bg",
		"desc"		=>	 "Backgroundcolor for this section",
		"cssgoal"		=>	 "#over_content",
		"csskey"		=>	 "background-color",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Before content color",
		"id"		=>	 $shortname."_before_content_color",
		"desc"		=>	 "The text color for this section",
		"cssgoal"		=>	 "#over_content",
		"csskey"		=>	 "color",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "After Content",
		"id"		=>	 $shortname."_after_content",
		"desc"		=>	 "Some HTML or Text to display below the content section (sitewide)",
		"filter"		=>	 "html", 
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "After content background",
		"id"		=>	 $shortname."_after_content_bg",
		"desc"		=>	 "Backgroundcolor for this section",
		"cssgoal"		=>	 "#after_content",
		"csskey"		=>	 "background-color",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "After content color",
		"id"		=>	 $shortname."_after_content_color",
		"desc"		=>	 "The text color for this section",
		"cssgoal"		=>	 "#after_content",
		"csskey"		=>	 "color",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Typographie",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "Text - Font",
		"id"		=>	 $shortname."_Main_font",
		"desc"		=>	 "The Font for the H1 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "Fontsize",
		"id"		=>	 $shortname."_Main_fontsize",
		"desc"		=>	 "The Fontsize for the H1 Tag",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 ".mainsection",
		"csskey"		=>	 "font-size",
		"customizertitle"		=>	 "Fontsize",
		"csection"		=>	 "main",
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "Fontcolor",
		"id"		=>	 $shortname."_Main_fontcolor",
		"desc"		=>	 "The Fontcolor for the H1 Tag",
		"cssgoal"		=>	 ".mainsection",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "Mainsection Color",
		"csection"		=>	 "main",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Link Color",
		"id"		=>	 $shortname."_Main_acolor",
		"desc"		=>	 "The Linkcolor for the Main Section",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Link Color Hover",
		"id"		=>	 $shortname."_Main_ahcolor",
		"desc"		=>	 "The Linkcolor Mouseover for the Main Section",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Link Color Visited",
		"id"		=>	 $shortname."_Main_avcolor",
		"desc"		=>	 "The Linkcolor for visited Links",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Link Underline",
		"id"		=>	 $shortname."_Main_adecoration",
		"desc"		=>	 "Decorate the Links in the Main Section with a Underline",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H1 Font",
		"id"		=>	 $shortname."_Main_h1_font",
		"desc"		=>	 "The Font for the H1 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H1 Fontsize",
		"id"		=>	 $shortname."_Main_h1_fontsize",
		"desc"		=>	 "The Fontsize for the H1 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H1 Fontcolor",
		"id"		=>	 $shortname."_Main_h1_fontcolor",
		"desc"		=>	 "The Fontcolor for the H1 Tag",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H2 Font",
		"id"		=>	 $shortname."_Main_h2_font",
		"desc"		=>	 "The Font for the H2 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H2 Fontsize",
		"id"		=>	 $shortname."_Main_h2_fontsize",
		"desc"		=>	 "The Fontsize for the H2 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H2 Fontcolor",
		"id"		=>	 $shortname."_Main_h2_fontcolor",
		"desc"		=>	 "The Fontcolor for the H2 Tag",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H3 Font",
		"id"		=>	 $shortname."_Main_h3_font",
		"desc"		=>	 "The Font for the H3 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H3 Fontsize",
		"id"		=>	 $shortname."_Main_h3_fontsize",
		"desc"		=>	 "The Fontsize for the H3 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H3 Fontcolor",
		"id"		=>	 $shortname."_Main_h3_fontcolor",
		"desc"		=>	 "The Fontcolor for the H1 Tag",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H4 Font",
		"id"		=>	 $shortname."_Main_h4_font",
		"desc"		=>	 "The Font for the H4 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H4 Fontsize",
		"id"		=>	 $shortname."_Main_h4_fontsize",
		"desc"		=>	 "The Fontsize for the H4 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H4 Fontcolor",
		"id"		=>	 $shortname."_Main_h4_fontcolor",
		"desc"		=>	 "The Fontcolor for the H4 Tag",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H5 Font",
		"id"		=>	 $shortname."_Main_h5_font",
		"desc"		=>	 "The Font for the H5 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H5 Fontsize",
		"id"		=>	 $shortname."_Main_h5_fontsize",
		"desc"		=>	 "The Fontsize for the H5 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H5 Fontcolor",
		"id"		=>	 $shortname."_Main_h5_fontcolor",
		"desc"		=>	 "The Fontcolor for the H5 Tag",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H6 Font",
		"id"		=>	 $shortname."_Main_h6_font",
		"desc"		=>	 "The Font for the H6 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H6 Fontsize",
		"id"		=>	 $shortname."_Main_h6_fontsize",
		"desc"		=>	 "The Fontsize for the H6 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H6 Fontcolor",
		"id"		=>	 $shortname."_Main_h6_fontcolor",
		"desc"		=>	 "The Fontcolor for the H6 Tag",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Widgettitle Sidebar Fontcolor",
		"id"		=>	 $shortname."_sidebar_fontcolor",
		"desc"		=>	 "The Fontcolor for Widgettitle in the Sidebar",
		"cssgoal"		=>	 ".sidebar h3.widget-title",
		"csskey"		=>	 "color",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Widgettitle Sidebar Background",
		"id"		=>	 $shortname."_sidebar_bgcolor",
		"desc"		=>	 "The backgroundcolor for the Widgettitle in the Sidebar",
		"cssgoal"		=>	 ".sidebar h3.widget-title",
		"csskey"		=>	 "background-color",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Widget links background",
		"id"		=>	 $shortname."_sidebar_linkbgcolor",
		"desc"		=>	 "The backgroundcolor for links in widgets",
		"cssgoal"		=>	 ".right ul.sisters li a, ul.sisters li a, ul.menu li a, .right ul li a, .sidebar .tagcloud a, .left ul.sisters li a,  .left ul li a, .sidebar li.recentcomments",
		"csskey"		=>	 "background-color",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Widget links color",
		"id"		=>	 $shortname."_sidebar_linkcolor",
		"desc"		=>	 "Color for links in widgets",
		"cssgoal"		=>	 ".right ul.sisters li a, ul.sisters li a, ul.menu li a, .right ul li a, .sidebar .tagcloud a, .left ul.sisters li a,   .left ul li a, .sidebar li.recentcomments",
		"csskey"		=>	 "color",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Footer Section",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 " Footer Section",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show?",
		"id"		=>	 $shortname."_show_footer",
		"desc"		=>	 "Show this Section?",
		"std"		=>	 "true",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Width",
		"id"		=>	 $shortname."_footer_inner",
		"desc"		=>	 "Choose the width of this section, inner = block, softinner = full width, only visible if you use the full-width layout",
		"value"		=>	 array("inner","softinner"),
		"std"		=>	 "softinner",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor ",
		"id"		=>	 $shortname."_Footer_bgcolor",
		"desc"		=>	 "Set the Background Color for the Footer Section",
		"cssgoal"		=>	 "#footer, #footer_gradient",
		"csskey"		=>	 "background-color",
		"customizertitle"		=>	 "Background Footer",
		"csection"		=>	 "footer",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "2. Backgroundcolor ",
		"id"		=>	 $shortname."_Footer_bgcolor2",
		"desc"		=>	 "A second Background Color for a vertical gradient",
		),

	array(
		"type"		=>	 "background",
		"name"		=>	 "Background Image",
		"id"		=>	 $shortname."_Footer_bgimage",
		"desc"		=>	 "The Footer Section Background Image",
		),

	array(
		"type"		=>	 "background-x",
		"name"		=>	 "Background Horizontal",
		"id"		=>	 $shortname."_Footer_bgimage_x",
		"desc"		=>	 "Horizontal align for the Footer Section Background Image",
		"std"		=>	 "top",
		),

	array(
		"type"		=>	 "background-y",
		"name"		=>	 "Background Vertical",
		"id"		=>	 $shortname."_Footer_bgimage_y",
		"desc"		=>	 "The Vertical algin for the Footer Section Background Image",
		"std"		=>	 "left",
		),

	array(
		"type"		=>	 "background-repeat",
		"name"		=>	 "Background Repeat",
		"id"		=>	 $shortname."_Footer_bgimage_repeat",
		"desc"		=>	 "The Repeat for the Footer Section Background Image",
		),

	array(
		"type"		=>	 "background-fix",
		"name"		=>	 "Background Fix",
		"id"		=>	 $shortname."_Footer_bgimage_fix",
		"desc"		=>	 "The Repeat for the Body Section Background Image",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Top",
		"id"		=>	 $shortname."_footer_padding_top",
		"desc"		=>	 "The padding to the top in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 ".footer-inner",
		"csskey"		=>	 "padding-top",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Padding Top",
		"csection"		=>	 "footer",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Bottom",
		"id"		=>	 $shortname."_footer_padding_bottom",
		"desc"		=>	 "The padding to the bottom in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 ".footer-inner",
		"csskey"		=>	 "padding-bottom",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Padding Bottom",
		"csection"		=>	 "footer",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Text align",
		"id"		=>	 $shortname."_footer_text_align",
		"desc"		=>	 "Choose the text-align for this section",
		"value"		=>	 array("","left","center","right"),
		"cssgoal"		=>	 "#footer",
		"csskey"		=>	 "text-align",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Content before footer",
		"id"		=>	 $shortname."_before_footer",
		"desc"		=>	 "The content over the footer columns in the footer",
		"filter"		=>	 "html", 
		),

	array(
		"type"		=>	 "footer-column",
		"name"		=>	 "Columns",
		"id"		=>	 $shortname."_footer_template",
		"desc"		=>	 "Choose how many Columns you need in the Footer Area",
		"filter"		=>	 "number", 
		"value"		=>	 array("1","2","3","4","5"),
		"std"		=>	 "4",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Content after footer",
		"id"		=>	 $shortname."_after_footer",
		"desc"		=>	 "The content below the footer columns in the footer",
		"filter"		=>	 "html", 
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Typographie",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "Text - Font",
		"id"		=>	 $shortname."_Footer_font",
		"desc"		=>	 "The Font for the H1 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "Fontsize",
		"id"		=>	 $shortname."_Footer_fontsize",
		"desc"		=>	 "The Fontsize for the H1 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "Fontcolor",
		"id"		=>	 $shortname."_Footer_fontcolor",
		"desc"		=>	 "The Fontcolor for the H1 Tag",
		"std"		=>	 "#7B7B7B",
		"cssgoal"		=>	 "#footer",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "Footer Color",
		"csection"		=>	 "footer",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Link Color",
		"id"		=>	 $shortname."_Footer_acolor",
		"desc"		=>	 "The Linkcolor for the Footer Section",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Link Color Hover",
		"id"		=>	 $shortname."_Footer_ahcolor",
		"desc"		=>	 "The Linkcolor Mouseover for the Footer Section",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Link Color Visited",
		"id"		=>	 $shortname."_Footer_avcolor",
		"desc"		=>	 "The Linkcolor for visited Links",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Link Underline",
		"id"		=>	 $shortname."_Footer_adecoration",
		"desc"		=>	 "Decorate the Links in the Footer Section with a Underline",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Widget Title Color",
		"id"		=>	 $shortname."_Footer_titlecolor",
		"desc"		=>	 "The Textcolor for the Widgettitle",
		"std"		=>	 "rgb(0, 0, 0)",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Widget Title Background",
		"id"		=>	 $shortname."_Footer_titlebg",
		"desc"		=>	 "The Backgroundcolor for the Widgettitle",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H2 Font",
		"id"		=>	 $shortname."_Footer_h2_font",
		"desc"		=>	 "The Font for the H2 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"id"		=>	 $shortname."_Footer_h2_fontsize",
		"desc"		=>	 "The Fontsize for the H2 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"id"		=>	 $shortname."_Footer_h2_fontcolor",
		"desc"		=>	 "The Fontcolor for the H2 Tag",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H3 Font",
		"id"		=>	 $shortname."_Footer_h3_font",
		"desc"		=>	 "The Font for the H3 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"id"		=>	 $shortname."_Footer_h3_fontsize",
		"desc"		=>	 "The Fontsize for the H3 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"id"		=>	 $shortname."_Footer_h3_fontcolor",
		"desc"		=>	 "The Fontcolor for the H3 Tag",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H4 Font",
		"id"		=>	 $shortname."_Footer_h4_font",
		"desc"		=>	 "The Font for the H4 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"id"		=>	 $shortname."_Footer_h4_fontsize",
		"desc"		=>	 "The Fontsize for the H4 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"id"		=>	 $shortname."_Footer_h4_fontcolor",
		"desc"		=>	 "The Fontcolor for the H4 Tag",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H5 Font",
		"id"		=>	 $shortname."_Footer_h5_font",
		"desc"		=>	 "The Font for the H5 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H5 Fontsize",
		"id"		=>	 $shortname."_Footer_h5_fontsize",
		"desc"		=>	 "The Fontsize for the H5 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H5 Fontcolor",
		"id"		=>	 $shortname."_Footer_h5_fontcolor",
		"desc"		=>	 "The Fontcolor for the H5 Tag",
		),

	array(
		"type"		=>	 "font",
		"name"		=>	 "H6 Font",
		"id"		=>	 $shortname."_Footer_h6_font",
		"desc"		=>	 "The Font for the H6 Tag",
		),

	array(
		"type"		=>	 "fontsize",
		"name"		=>	 "H6 Fontsize",
		"id"		=>	 $shortname."_Footer_h6_fontsize",
		"desc"		=>	 "The Fontsize for the H6 Tag",
		"filter"		=>	 "number", 
		),

	array(
		"type"		=>	 "fontcolor",
		"name"		=>	 "H6 Fontcolor",
		"id"		=>	 $shortname."_Footer_h6_fontcolor",
		"desc"		=>	 "The Fontcolor for the H6 Tag",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Widget links background",
		"id"		=>	 $shortname."_footerwidget_linkbgcolor",
		"desc"		=>	 "The backgroundcolor for links in widgets",
		"cssgoal"		=>	 "#footer ul > li > a ",
		"csskey"		=>	 "background-color",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Widget links color",
		"id"		=>	 $shortname."_footerwidget_linkcolor",
		"desc"		=>	 "Color for links in widgets",
		"cssgoal"		=>	 "#footer ul > li > a ",
		"csskey"		=>	 "color",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Scroll Top",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show?",
		"id"		=>	 $shortname."_show_scrolltop",
		"desc"		=>	 "Show the scroll to top button?",
		"std"		=>	 "true",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Background",
		"id"		=>	 $shortname."_bg_scrolltop",
		"desc"		=>	 "The background color for the button",
		"std"		=>	 "rgb(72, 147, 227)",
		"cssgoal"		=>	 ".scroll_top",
		"csskey"		=>	 "background",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "color",
		"id"		=>	 $shortname."_color_scrolltop",
		"desc"		=>	 "The color for the button",
		"std"		=>	 "rgb(255, 255, 255)",
		"cssgoal"		=>	 ".scroll_top i",
		"csskey"		=>	 "color",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Radius",
		"id"		=>	 $shortname."_radius_scolltop",
		"desc"		=>	 "The border-radius in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 ".scroll_top",
		"csskey"		=>	 "border-radius",
		"cssafter"		=>	 "px",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Width",
		"id"		=>	 $shortname."_width_scolltop",
		"desc"		=>	 "The widht in pixel for the button",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 ".scroll_top",
		"csskey"		=>	 "width",
		"cssafter"		=>	 "px",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Height",
		"id"		=>	 $shortname."_height_scrolltop",
		"desc"		=>	 "The height in pixel for the button",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 ".scroll_top",
		"csskey"		=>	 "height",
		"cssafter"		=>	 "px",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Second Footer Section",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Second Footer Section",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show?",
		"id"		=>	 $shortname."_show_secondfooter",
		"desc"		=>	 "Show this Section?",
		"std"		=>	 "true",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Width",
		"id"		=>	 $shortname."_copyright_inner",
		"desc"		=>	 "Choose the width of this section, inner = block, softinner = full width, only visible if you use the full-width layout",
		"value"		=>	 array("inner","softinner"),
		"std"		=>	 "softinner",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Backgroundcolor ",
		"id"		=>	 $shortname."_secondfooter_bgcolor",
		"desc"		=>	 "Set the Background Color for this Section",
		"cssgoal"		=>	 "#copyright",
		"csskey"		=>	 "background-color",
		"customizertitle"		=>	 "Background Second Footer",
		"csection"		=>	 "footer2",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "2. Backgroundcolor ",
		"id"		=>	 $shortname."_secondfooter_bgcolor2",
		"desc"		=>	 "A second background color for a vertical gradient",
		),

	array(
		"type"		=>	 "background",
		"name"		=>	 "Background Image",
		"id"		=>	 $shortname."_secondfooter_bgimage",
		"desc"		=>	 "The Background Image for this Section",
		),

	array(
		"type"		=>	 "background-x",
		"name"		=>	 "Background Horizontal",
		"id"		=>	 $shortname."_secondfooter_bgimage_x",
		"desc"		=>	 "Horizontal align for this Section Background Image",
		"std"		=>	 "top",
		),

	array(
		"type"		=>	 "background-y",
		"name"		=>	 "Background Vertical",
		"id"		=>	 $shortname."_secondfooter_bgimage_y",
		"desc"		=>	 "The Vertical algin for this Section Background Image",
		"std"		=>	 "left",
		),

	array(
		"type"		=>	 "background-repeat",
		"name"		=>	 "Background Repeat",
		"id"		=>	 $shortname."_secondfooter_bgimage_repeat",
		"desc"		=>	 "The Repeat for this Section Background Image",
		),

	array(
		"type"		=>	 "background-fix",
		"name"		=>	 "Background Fix",
		"id"		=>	 $shortname."_secondfooter_bgimage_fix",
		"desc"		=>	 "The Repeat for this Section Background Image",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Top",
		"id"		=>	 $shortname."_underfooter_padding_top",
		"desc"		=>	 "The padding to the top in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#copyright > div",
		"csskey"		=>	 "padding-top",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Padding Top",
		"csection"		=>	 "footer2",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Padding Bottom",
		"id"		=>	 $shortname."_underfooter_padding_bottom",
		"desc"		=>	 "The padding to the bottom in this section in pixel",
		"filter"		=>	 "number", 
		"cssgoal"		=>	 "#copyright > div",
		"csskey"		=>	 "padding-bottom",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Padding Bottom",
		"csection"		=>	 "footer2",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Color",
		"id"		=>	 $shortname."_secondfooter_color",
		"desc"		=>	 "Set the Color for this Section",
		"cssgoal"		=>	 "#copyright",
		"csskey"		=>	 "color",
		"customizertitle"		=>	 "Second Footer Color",
		"csection"		=>	 "footer2",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Text align",
		"id"		=>	 $shortname."_secondfooter_text_align",
		"desc"		=>	 "Choose the text-align for this section",
		"value"		=>	 array("","left","center","right"),
		"cssgoal"		=>	 "#copyright",
		"csskey"		=>	 "text-align",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Content",
		"id"		=>	 $shortname."_secondfooter_content",
		"desc"		=>	 "The Content for this Section. You can also use Shortcodes",
		"filter"		=>	 "html", 
		"std"		=>	 "Aenean faucibus bibendum ligula et dapibus. Aenean erat nisi, auctor ut placerat eget, viverra ut urna. Cras ac dapibus arcu, in porta magna. | [social-icons]",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "endtab",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Contact Page",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Contact Page",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Contact Email",
		"id"		=>	 $shortname."_contact_email",
		"desc"		=>	 "Please insert your Email for the contact form",
		"filter"		=>	 "email", 
		"reset"		=>	 "false",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Error 404 Page",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Error 404 Page",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Error404 title",
		"id"		=>	 $shortname."_error404_title",
		"desc"		=>	 "The Title for the Error 404 Page.",
		"std"		=>	 "Error 404 - Page not found!",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "ERROR 404 Content",
		"id"		=>	 $shortname."_error404_content",
		"desc"		=>	 "Here you can add your content for the Error 404 page.",
		"std"		=>	 "The content you are searching for is not here. Please use our search function or go to the homepage.",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show Searchform?",
		"id"		=>	 $shortname."_error404_search",
		"desc"		=>	 "Check this box if you would like to show the Searchform on the Error404 Page.",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "template",
		"name"		=>	 "Template",
		"id"		=>	 $shortname."_error404_sidebar",
		"desc"		=>	 "Choose your Template / Sidebarpostitions for this Page.",
		"std"		=>	 "page-sidebar-right",
		),

	array(
		"type"		=>	 "sidebar-dropdown",
		"name"		=>	 "Sidebar",
		"id"		=>	 $shortname."_error404_sidebar1",
		"desc"		=>	 "Choose your Sidebar.",
		"std"		=>	 "sidebar-2",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Blog",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Blog Options",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Title",
		"id"		=>	 $shortname."_blog_show_title_first",
		"desc"		=>	 "Check this box if you want to display the title above the featured image / gallery / video / ...",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Excerpt",
		"id"		=>	 $shortname."_blog_excerpt",
		"desc"		=>	 "The length of the excerpt for the blog",
		"filter"		=>	 "number", 
		"std"		=>	 "200",
		),

	array(
		"type"		=>	 "textarea",
		"name"		=>	 "Read more text",
		"id"		=>	 $shortname."_blog_readmore",
		"desc"		=>	 "The 'read more' text for the blog excerpt",
		"filter"		=>	 "html", 
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Blog Meta",
		"id"		=>	 $shortname."_show_blog_meta",
		"desc"		=>	 "Check this box if you want to display the blog meta (comments, author, tags, category...)",
		"std"		=>	 "true",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show Date?",
		"id"		=>	 $shortname."_show_blog_date",
		"desc"		=>	 "Check this box if you want to display the post date",
		"std"		=>	 "true",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show Author?",
		"id"		=>	 $shortname."_show_blog_author",
		"desc"		=>	 "Check this box if you want to display the post author",
		"std"		=>	 "true",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show Comments Count?",
		"id"		=>	 $shortname."_show_blog_comments",
		"desc"		=>	 "Check this box if you want to display the post comments counter",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show Tags?",
		"id"		=>	 $shortname."_show_blog_tags",
		"desc"		=>	 "Check this box if you want to display the post tags",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show Categories?",
		"id"		=>	 $shortname."_show_blog_category",
		"desc"		=>	 "Check this box if you want to display the post categories",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show Share Button?",
		"id"		=>	 $shortname."_show_blog_share",
		"desc"		=>	 "Check this box if you want to display the share button / icon",
		"std"		=>	 "false",
		),

	array(
		"type"		=>	 "checkbox",
		"name"		=>	 "Show Excerpt?",
		"id"		=>	 $shortname."_show_blog_excerpt",
		"desc"		=>	 "Check this box if you want to display only the excerpt in the blog summary",
		"std"		=>	 "true",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Sidebars",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Sidebars",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "sidebar",
		"name"		=>	 "The Name for a new Sidebar",
		"id"		=>	 $shortname."_sidebars",
		"desc"		=>	 "Please choose a name for the new Sidebar",
		"reset"		=>	 "false",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Social Media",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Social Media",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "social",
		"name"		=>	 "Social Media",
		"id"		=>	 $shortname."_social_media",
		"desc"		=>	 "Choose your Social Links and the Icons",
		"filter"		=>	 "html", 
		"reset"		=>	 "false",
		),

	array(
		"type"		=>	 "text-color",
		"name"		=>	 "Background Icons",
		"id"		=>	 $shortname."_social_bg",
		"desc"		=>	 "Set the background-color for the social icons. Leave blank if you want to use the brand colors",
		"cssgoal"		=>	 "a.social_media.social_icon",
		"csskey"		=>	 "background-color",
		"customizertitle"		=>	 "Social Icons Background",
		"csection"		=>	 "other",
		),

	array(
		"type"		=>	 "text",
		"name"		=>	 "Icons radius",
		"id"		=>	 $shortname."_social_radius",
		"desc"		=>	 "Set the width of the border-radius for the social icons in pixel.",
		"cssgoal"		=>	 "a.social_media.social_icon",
		"csskey"		=>	 "border-radius",
		"cssafter"		=>	 "px",
		"customizertitle"		=>	 "Icon Radius",
		"csection"		=>	 "other",
		),

	array(
		"type"		=>	 "close",
		),

	array(
		"type"		=>	 "newvtab",
		"name"		=>	 "Image sizes",
		),

	array(
		"type"		=>	 "newtab",
		),

	array(
		"type"		=>	 "title",
		"name"		=>	 "Thumbnails",
		),

	array(
		"type"		=>	 "open",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Post Thumbnail",
		"id"		=>	 $shortname."_post_thumbnail",
		"desc"		=>	 "Set the thumbnail for your post items",
		"filter"		=>	 "html", 
		"value"		=>	 sevenleague_show_imagesizes(),
		"std"		=>	 "gallery",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Portfolio Thumbnail",
		"id"		=>	 $shortname."_portfolio_thumbnail",
		"desc"		=>	 "Set the thumbnail for your portfolio items",
		"filter"		=>	 "html", 
		"value"		=>	 sevenleague_show_imagesizes(),
		"std"		=>	 "gallery",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Team Thumbnail",
		"id"		=>	 $shortname."_team_thumbnail",
		"desc"		=>	 "Set the thumbnail for your team items",
		"filter"		=>	 "html", 
		"value"		=>	 sevenleague_show_imagesizes(),
		"std"		=>	 "gallery",
		),

	array(
		"type"		=>	 "dropdown",
		"name"		=>	 "Quickgallery Thumbnail",
		"id"		=>	 $shortname."_quickgallery_thumbnail",
		"desc"		=>	 "Set the thumbnail for your quickgallery",
		"filter"		=>	 "html", 
		"value"		=>	 sevenleague_show_imagesizes(),
		"std"		=>	 "gallery",
		),

	array(
		"type"		=>	 "close",
		),

); 