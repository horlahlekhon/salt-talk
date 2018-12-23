<?php
/* VERSION 13022014 */
 





/////// ADD THEME OPTIONS IN ADMIN BAR FRONTEND
function sl_add_theme_options_link_frontend() {
	global $wp_admin_bar;
	$wp_admin_bar->add_menu( array( 
		'id' => 'theme_options_panel', // link ID, defaults to a sanitized title value
		'title' => 'Theme Options',
		'href' => admin_url( 'themes.php?page=options-page.php'),
		'meta' => false  ,
	));
}
add_action( 'wp_before_admin_bar_render', 'sl_add_theme_options_link_frontend' );




















function sevenleague_admin_scripts() 
	{
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_script('my-upload');
	}

function sevenleague_admin_styles() 
	{
	wp_enqueue_style('thickbox');
	}
	add_action('admin_print_scripts', 'sevenleague_admin_scripts');
	add_action('admin_print_styles', 'sevenleague_admin_styles');

function sevenleague_cycle_register_settings() 
	{
	register_setting('wp_cycle_images', 'wp_cycle_images', 'wp_cycle_images_validate');
	register_setting('wp_cycle_settings', 'wp_cycle_settings', 'wp_cycle_settings_validate');
	}
	add_action('admin_init', 'sevenleague_cycle_register_settings');

function sevenleague_header_content() 
	{  
	global $options;
	$used_colors=array();
	$iii=0;
	foreach ($options as $value)
		 {
		$iii++;
		if ( $value['type'] == 'color' OR $value['type'] == 'font-color' OR $value['type'] == 'text-color') 
			{
			if(  get_option($value['id']) !="" )
				{
				if(count($used_colors)<1)
					{
					$used_colors[]=get_option($value['id']);
					}
					else
						{
						if ( check_color(get_option( $value['id']), $used_colors) != "") 
							{
							$used_colors[]=get_option( $value['id']);
							}
						}
				}
			}
		}
	$colors="";
	for($i=0;$i<count($used_colors); $i++) 
		{  
		$colors.="\"".$used_colors[$i]."\",";
		} 
	?> 
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/7league/script/spectrum.js" ></script>
	<link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/7league/css/spectrum.css' />
	<script type="text/javascript">
	jQuery(document).ready(function()
		{ 
		jQuery(".font-color").spectrum({ 
			allowEmpty:true, 
			showInput: true,
			showInitial: true,
			showPalette: true,
			showSelectionPalette: true,
			maxPaletteSize: 5,
			className: "full-spectrum", 
			showAlpha: true, 
			preferredFormat: "rgb",
			palette: [
					[<?php echo $colors; ?>] 
				],
			move: function(c) 
				{
			//	var goal = jQuery(this).parent().find("input");
			//	goal.val( c );
			//	goal.css("border-color",c);
    }
			});
		});
	</script>
	<?php
	}
	add_action( 'admin_head', 'sevenleague_header_content' ); 



function sevenleague_save_input()
	{
	global $options;
	foreach($options as $value )
		{
		if(isset($value['id']))
			{
			$id=$value['id'];
			if(isset($_REQUEST["$id"]))
				{
				$entry="";
				$input=$_REQUEST["$id"];
				if(isset($value['filter']))
					{ 
					$filter=$value['filter'];
					switch($value['filter'])
						{
						case "url":
							$entry=esc_url($input);
							break; 
						case "html":
							$entry=$input;
							break;
						case "email":
							$entry=sanitize_email($input);
							break;
						case "number":
							$entry=intval($input);
							break;
						}
					}
					else
						{
						if($value['type']=="sidebar")
							{
							$entry=$input;
							}
						if($value['type']=="checkbox")
							{
							if ( $input == 'false' OR $input=='on')
								{
								$entry=$input;
								} 
							}
						}


					// CHECK FOR MULTIPLE FONTS
 
					if( $value['type'] == 'fontmulti' )
						{
						if( isset( $input ) && $input !="" )
							{
							for( $y = 0; $y < count( $input ); $y++ )
								{
								$input = implode( "," , $input);
								$entry = $input;
								}
							}
						}
 


					if($entry=="")
						{
						$entry = wp_filter_nohtml_kses($input);
						}
				if(isset($entry))
					{
					update_option( $id , $entry  );  	
					}
				}
			}
		} 	
	header("Location: themes.php?page=options-page.php&saved=true&currTab=$_REQUEST[currTab]");
	die;
	}

function sevenleague_add_adminpanel() 
	{
	global $themename, $shortname, $options, $fonts, $slider, $allslider_sliders;
	 if ( isset($_GET['page']) && $_GET['page'] == basename(__FILE__) ) 	//if ( $_GET['page'] == basename(__FILE__) ) 
		{
		
		if (isset($_REQUEST['action']))
			{
			if(   $_REQUEST['action'] == 'save') 
				{	
				sevenleague_save_input();
				}  
			if($_REQUEST['action'] =='reset') 
				{
				foreach ($options as $value) 
					{
					if($value['type']=="checkbox")
						{
						if($value['std']=="true")
							{
							update_option( $value['id'],  "on"  );
							}
							else
								{
								update_option( $value['id'],  "false"  );
								}
						}
						else
							{
							if(isset($value['std']))
								{
								update_option( $value['id'],  $value['std']  );
								}
								elseif(isset($value['id']))
									{
									update_option( $value['id'], "" );
									}
							}
					}
				header("Location: themes.php?page=options-page.php&reset=true");
				die;
      				} 
			if($_REQUEST['action'] =='softreset') 
				{
				foreach ($options as $value) 
					{
					if(!isset($value['reset']))
						{
						if($value['type']=="checkbox")
							{
							if($value['std']=="true")
								{
								update_option( $value['id'],  "on"  );
								}
								else
									{
									update_option( $value['id'],  "false"  );
									}
							}
							else
								{
								if(isset($value['std']))
									{
									update_option( $value['id'],  $value['std']  );
									}
									elseif(isset($value['id']))
										{
										update_option( $value['id'], "" );
										}
								}
						}
					}
				header("Location: themes.php?page=options-page.php&reset=true");
				die;
      				} 
			}
	    	}
		add_theme_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), 'sevenleague_adminpanel');
	}
	add_action('admin_menu', 'sevenleague_add_adminpanel'); 

function sevenleague_install()
	{
	global $options, $shortname;
	if(get_option($shortname."_installed")!="installed")
		{
		update_option($shortname."_installed","installed");
		foreach ($options as $value) 
			{
			if($value['type']=="checkbox")
				{
				if(isset($value['std']) && $value['std']=="true")
					{
					update_option( $value['id'],  "on"  );
					}
					else
						{
						update_option( $value['id'],  "false"  );
						}
				}
				else
					{
					if(isset($value['id']) AND isset($value['std']))
						{	
						update_option( $value['id'],  $value['std']  );
						}
					}
			}
		update_option($shortname."_installed","installed");
		}	
	}


function sevenleague_adminpanel() 
	{
 	global $themename, $shortname, $options, $mess, $fonts, $slider, $menus, $allslider_sliders, $socials, $social_icons_dir, $used_colors, $used_fonts, $gfonts, $hidden_options;
	$used_fonts=array();
	foreach ($options as $value) 
		{
		if($value['type']=="font") 
			{
			$narr=get_option($value['id']);
			if(($narr!="") AND ($used_fonts!=""))
				{
				if(!in_array($narr, $used_fonts))
					{
					$used_fonts[]=$narr;
					}
				}
			}
		}
	if($used_fonts)
		{
		sort($used_fonts);
		}
	if(isset($_REQUEST['saved']))
		{
	    	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>Settings saved.</strong></p></div>';
		}
	if(isset($_REQUEST['reset']))
		{
	    	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>Settings reset.</strong></p></div>'; 
		}
	add_action('admin_init', 'editor_admin_init');
	add_action('admin_head', 'editor_admin_head');
	function editor_admin_init() 
		{
		  wp_enqueue_script('word-count');
		  wp_enqueue_script('post');
		  wp_enqueue_script('editor');
		  wp_enqueue_script('media-upload');
		}
	function editor_admin_head() 
		{
		 // wp_tiny_mce();
		}
	$vtabcounter=1;
 	$zz=""; 
	$iii="";
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style/jquery-ui.css" />
<script type="text/javascript">
jQuery(document).ready(function($) 
	{
	jQuery('.upload_image_button').click(function() 
		{
	 	formfield = jQuery('.upload_image_<?php echo $zz; ?>').attr('name');
	 	tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	 	return false;
		});
	var actTab=1;
	<?php 
	if(isset($_REQUEST['currTab']))
		{
		if($_REQUEST['currTab']) 
			{ 
			?> var actTab=<?php echo $_REQUEST['currTab']; ?>; <?php 
			}  
			else 
				{ ?> var actTab=1; <?php 
			}  
		} ?>
	if(actTab)
		{ 
		jQuery(".tabcontent").css("display","none");       	
		jQuery(".tabContainer #tab_content_"+actTab).css("display","block");       	
		} 
	jQuery(".src_image").click(function()
		{
		var trigger;
		trigger=jQuery(this).prev().prev().attr('id');
		var url="<?php echo get_template_directory_uri(); ?>/7league/load_bg.php?url=<?php echo get_template_directory_uri(); ?>&trigger="+trigger;
		jQuery("#src_load").load(url, function()
			{
			jQuery("#src_load").dialog({modal:true,minWidth: 800,maxHeight: 400, height:500 }); 
			});
		});
	jQuery("#moresocial").click(function()
		{
		var sm1=jQuery("#sminput_1").val();
		var sm2=jQuery("#sminput_2").val();
		var insert_1="<a class='social_link "+sm1+" ' href='"+sm2+"' target='_blank'><i class='fa fa-"+sm1+"'></i></a>";
		jQuery("#social_movecontainer").append('<li class="social_move">'+insert_1+'<input  name="<?php echo $shortname; ?>_social_media[]"  type="hidden" value="'+insert_1+'" /><a href="#" class="remove_social" title="Remove Item">X</a></li>');
		return false;
		});
	<?php if( isset($_REQUEST['highlight']) && $_REQUEST['highlight']!="" )
		{
		?>
		jQuery("#options_spinner").remove();
		jQuery("#<?php echo $shortname."_".$_REQUEST['highlight']; ?>").parent().parent().addClass("option_highlight");
		jQuery("#<?php echo $shortname."_".$_REQUEST['highlight']; ?>").parent().parent().parent().parent().find('h3').addClass("stab_active").next().show();
		var pmenu = jQuery("#<?php echo $shortname."_".$_REQUEST['highlight']; ?>").parent().parent().parent().parent().parent().data("menu");
		jQuery("#"+pmenu).trigger("click");
		var hlpos= jQuery(".option_highlight").position();
		jQuery("body").scrollTop(hlpos.top-100);
		setTimeout(function() { jQuery(".option_highlight").addClass("animated flash"); }, 500);
		<?php } ?>
	}); 
	<?php if( isset($_REQUEST['highlight']) && $_REQUEST['highlight']!="" )
		{
		?>
		jQuery("#wpwrap").after("<div id='options_spinner'>Please wait while loading the options</div>");
		<?php } ?>

</script>
<div class="wrap">
<div id="optionsPage">
<h2>Theme settings</h2>
<?php $i=1; $used_colors=array(); ?>
<p><?php echo $mess; ?></p>
 <div class="tabscontainer">
     <div class="tabs">
        		 <div class="tab <?php if(isset($_REQUEST['currTab'])) { if(($_REQUEST['currTab']=="") OR ($_REQUEST['currTab']=="1")) { echo " selected "; } } ?> first" id="tab_menu_<?php echo "1"; ?>">
             		<div class="link">General</div>
             		<div class="arrow"></div>
         		</div>  
		<div class="tab  tab-less">
             		<div class="link">Sections</div>
             		<div class="arrow"></div>
         		</div>
	<?php
	 foreach ($options as $value)
	 {
	if($value['type'] =="newvtab")
		{
		$i++;
		?>
        		 <div class="tab<?php if(isset($_REQUEST['currTab'])) { if($_REQUEST['currTab']==$i)  { echo " selected "; } } ?>" id="tab_menu_<?php echo $i; ?>">
             		<div class="link"><?php echo $value['name']; ?></div>
             		<div class="arrow"></div>
         		</div>
		<?php
		}
	}
	?>
    </div> 
    <div class="tabContainer">
			<form class='options_page_form' method="post" enctype="multipart/form-data">
			<input type="hidden" name="action" value="save" />
			<input type="hidden" name="sendto" value="<?php echo $_SERVER['PHP_SELF']; ?>" />
			<input type="hidden" name="currTab" value="<?php echo $vtabcounter; ?>" />
			<div class="tabcontent" id="tab_content_1" style="display:block">	
<?php   foreach ($options as $value)
	{
	if( isset( $value['id'] ) )
		{
		}
		else
			{
			$value['id'] = '';
			}

	if( !isset($value['hidden'])  && !in_array( str_replace( $shortname."_", "", $value['id'] ), $hidden_options ) ) {
	$iii++;
	switch ( $value['type'] ) 
		{
 		case "newvtab":
			$vtabcounter++;
			?>			
			</div>
			</form>
			<form class='options_page_form' method="post" enctype="multipart/form-data">
			<input type="hidden" name="sendto" value="<?php echo $_SERVER['PHP_SELF']; ?>" />
			<input type="hidden" name="action" value="save" />
			<input type="hidden" name="currTab" value="<?php echo $vtabcounter; ?>" />
			<div class="tabcontent" data-menu="tab_menu_<?php echo $vtabcounter; ?>" id="tab_content_<?php echo $vtabcounter; ?>">
			<?php break;

		case "newtab":
			?>
			<div class="tab">
			<?php break;

		case "endtab":
			?>			
			</div><!-- close Tab -->
			<?php break;

		case "open":
			?>
			<div class="admin-options">
			<?php break;
	
		case "close":
			?><button class="button-primary"> Save </button>
			</div>			
			<?php break;

		case "title":
			?>			
			 <h3 class="taber" ><?php echo $value['name']; ?></h3>
			<?php break;

		case 'info':
			?>
			<div class="options-line">
				<div class="info">
				<p><?php echo $value['desc']; ?></p>
				</div>	
			</div>
			<?php
			break;

		case 'space':
			?>
			<div class="options-line space">
				<h3><?php echo $value['name']; ?></h3>
			</div><div class="options-line2 space"></div>
			<?php		
			break;

		case 'sidebar':
			?>
			<div>
				<ul>	
 				<?php foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) { ?>
 				              <?php // echo "<li>". $sidebar['name'] . "</li>"; ?>
      				<?php } 
				$sidebars=get_option( $value['id']);
				?><h3>Existing Sidebars</h3>				
				<?php 
				$z=0;
				for( $i=0; $i<count($sidebars); $i++ ) 
					{ 
					if(isset($sidebars[$i]))
						{
     					 	if($sidebars[$i]!="")	
							{  
							$z="1"; ?>
							<li class="sidebar_entry">
								<input type="hidden" name="<?php echo $shortname; ?>_sidebars[]" value="<?php echo  $sidebars[$i] ; ?>" /><a href='#' class='del_sidebar'><img src="<?php echo get_stylesheet_directory_uri(); ?>/7league/images/trash.png" width="16px" height="16px" title="Delete Sidebar" alt="Delete"></a><span><?php echo  $sidebars[$i];   ?></span>
							</li>
							<?php }  
						}
				 	 } ?> 
					<?php 
					if($z=="0")
						{
						echo "<div class='info'>There are no Sidebars to display</div>";
						}
					?>
				</ul>				
			</div> 			
			<div class="options-line">
			<h3>Create a new Sidebar</h3>
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></div>
			    <div class="options-right"><input style="width:400px;" name="<?php echo $value['id']; ?>[]" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>"   /></label><input type="submit" value="Save" /></div>
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?></div>				
			<?php
			break;

		case 'sidebar-dropdown':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></div>
			    <div class="options-right">
					<?php 
					$sidebarx="";
					foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) 
						{  
					    	$sidebarx[]= $sidebar['id'] ;
						$sidebarname[]=$sidebar['name'];
						}
						$actval=get_option( $value['id']);
					?> 
				<select  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"    />
					<option></option>
					<?php
					for( $i=0; $i<count($sidebarx); $i++ )
						{
						$actgoal=$sidebarx[$i];
					 	if($sidebarx[$i]!="")
							{
							echo "<option value='".$sidebarx[$i]."' ";
							if($actval==$actgoal)
								{
								echo " selected ";
								}

							echo ">".  $sidebarname[$i]. "</option> ";
							}
						}
					?>		
				</select>		
			</label></div>	
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?></div>				
			<?php
			break;

		case 'fulltime':
			?>
			<div class="options-line">
			    <div class="options-left"><?php echo $value['name']; ?></div>
			    <div class="options-right">
				<b>The Time:</b><br /><br />
				<input maxlength="2" style="width:20px;" name="<?php echo $value['id']; ?>_hour" id="<?php echo $value['id']; ?>_hour"  value="<?php echo  get_option(   $value['id']."_hour") ;  ?>" /> The Hours (01,02,...,23)<br />
				<input maxlength="2" style="width:20px;" name="<?php echo $value['id']; ?>_minute" id="<?php echo $value['id']; ?>_minute"  value="<?php echo  get_option(   $value['id']."_minute") ;  ?>" /> The Minutes (01,02,...,59)<br />
				<input maxlength="2" style="width:20px;" name="<?php echo $value['id']; ?>_second" id="<?php echo $value['id']; ?>_second"  value="<?php echo  get_option(   $value['id']."_second") ;  ?>" /> The Seconds (01,02,...,59)
				<br /><br /><br />
				<b>The Date:</b><br /><br />
				<input maxlength="2" style="width:20px;" name="<?php echo $value['id']; ?>_day" id="<?php echo $value['id']; ?>_day"   value="<?php  echo  get_option( $value['id']."_day" ) ;  ?>" /> The Day (01,14,21,...)<br />
				<input maxlength="2" style="width:20px;" name="<?php echo $value['id']; ?>_month" id="<?php echo $value['id']; ?>_month"  value="<?php echo  get_option(   $value['id']."_month") ;  ?>" /> The Month (01,02,...,12)<br />
				<input maxlength="4" style="width:40px;" name="<?php echo $value['id']; ?>_year" id="<?php echo $value['id']; ?>_year"  value="<?php echo  get_option(   $value['id']."_year") ;  ?>" /> The Year (2012, 2014, ...)
			    </div>
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?></div>				
			<?php
			break;

		case 'text':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></div>
			    <div class="options-right"><div class='clear-value'>x</div><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo esc_attr(get_option( $value['id'] )); } ?>" /></label></div>
			</div>
			<div class="options-line2"><?php if(isset($value['desc'])) { echo $value['desc']; } ?></div>				
			<?php
			break;

		case 'footer-column':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></div>
			    <div class="options-right"><input class='footer_col_input' style="width:400px; display:none;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo esc_attr(get_option( $value['id'] )); } ?>" /></label>


				<div class='footer_switch <?php if ( get_option( $value['id'])=='1' ) { echo 'active'; } ?>' data-id='1'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_1.png' alt='1 Column' title='1 Column' /></div>
				<div class='footer_switch <?php if ( get_option( $value['id'])=='2' ) { echo 'active'; } ?>' data-id='2'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_2.png' alt='2 Column' title='2 Columns' /></div>
				<div class='footer_switch <?php if ( get_option( $value['id'])=='3' ) { echo 'active'; } ?>' data-id='3'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_3.png' alt='3 Column' title='3 Columns' /></div>
				<div class='footer_switch <?php if ( get_option( $value['id'])=='4' ) { echo 'active'; } ?>' data-id='4'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_4.png' alt='4 Column' title='4 Columns' /></div>
				<div class='footer_switch <?php if ( get_option( $value['id'])=='5' ) { echo 'active'; } ?>' data-id='5'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_5.png' alt='5 Column' title='5 Columns' /></div>

				<div class='footer_switch <?php if ( get_option( $value['id'])=='211' ) { echo 'active'; } ?>' data-id='211'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_211.png' alt='One Half + One Fourth + One Fourth' title='One Half + One Fourth + One Fourth' /></div>
				<div class='footer_switch <?php if ( get_option( $value['id'])=='121' ) { echo 'active'; } ?>' data-id='121'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_121.png' alt='One Fourth + One Half + One Fourth' title='One Fourth + One Half + One Fourth' /></div>
				<div class='footer_switch <?php if ( get_option( $value['id'])=='112' ) { echo 'active'; } ?>' data-id='112'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_112.png' alt='One Fourth + One Fourth + One Half' title='One Fourth + One Fourth + One Half' /></div>

				<div class='footer_switch <?php if ( get_option( $value['id'])=='231' ) { echo 'active'; } ?>' data-id='231'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_231.png' alt='Two Third + One Third' title='Two Third + One Third' /></div>
				<div class='footer_switch <?php if ( get_option( $value['id'])=='132' ) { echo 'active'; } ?>' data-id='132'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_132.png' alt='One Third + Two Third' title='One Third + Two Third' /></div>

				<div class='footer_switch <?php if ( get_option( $value['id'])=='411' ) { echo 'active'; } ?>' data-id='411'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_411.png' alt='Three Foruth + One Fourth' title='Three Fourth + One Fourth' /></div>
				<div class='footer_switch <?php if ( get_option( $value['id'])=='114' ) { echo 'active'; } ?>' data-id='114'><img src='<?php echo get_template_directory_uri(); ?>/7league/images/footer_114.png' alt='One Foruth + Three Fourth' title='One Fourth + Three Fourth' /></div>


				<div class='clear'></div>
			    </div>
			</div>
			<script type="text/javascript">

			</script>
			<div class="options-line2"><?php if(isset($value['desc'])) { echo $value['desc']; } ?></div>				
			<?php
			break;

		case 'template':
			?>
			<div class="options-line">
			    <div class="options-left"><?php echo $value['name']; ?></div>
			    <div class="options-right">
				<input  name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="hidden" value="<?php if ( get_option( $value['id'] ) != "") { $echo = get_option( $value['id'] ); } else { $echo= $value['std']; }  echo $echo; ?>" />
				<div class="template_entry <?php if($echo=="page-sidebar-no-sidebar") { echo "active"; } ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/template_no.jpg" alt="No Sidebar" data-val="page-sidebar-no-sidebar"  />
				</div>
				<div class="template_entry <?php if($echo=="page-sidebar-left") { echo "active"; } ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/template_l.jpg" alt="Sidebar Left" data-val="page-sidebar-left" />
				</div>				
				<div class="template_entry <?php if($echo=="page-sidebar-right") { echo "active"; } ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/template_r.jpg" alt="Sidebar Right" data-val="page-sidebar-right"  />
				</div>				
				<div class="clear"></div>
			</div>
			</div>
			<div class="options-line2">Please choose your Template / Sidebar - Positions for this Page</div>				
			<?php
			break;

		case 'text-range':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></div>
			    <div class="options-right"><input step="10" max="<?php echo $value['max']; ?>" min="<?php echo $value['min']; ?>" style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"  value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>"  onInput="<?php echo $value['id']; ?>_val.value=value" ><output name="<?php echo $value['id']; ?>_val"><?php echo get_option( $value['id'] );  ?> px</output></label></div>
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?></div>
			<?php
			break;

		case 'slider_dropdown':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			    <div class="options-right">
				<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><option></option>
					<?php
					for($i=0; $i<count($slider); $i++)
						{
						?><option value="<?php echo $slider[$i]; ?>" <?php if(get_option( $value['id'])==$slider[$i]) { echo " selected "; } ?> ><?php echo $slider[$i]; ?></option><?php
						}
					?>
				</select>
				</div>
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?></div>
			<?php
			break;

		case 'social':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></div>
			    <div class="options-right" id="social_container">
			    	Your Network: <select name="sminput_1" id="sminput_1">
						<?php
						for($i=0;$i<count($socials); $i++)
							{
							echo "<option value='".$socials[$i]."'>".$socials[$i]."</option>";
							}
						?>
						</select>
				 The Link to your Profile: <input type="text" name="sminput_2" id="sminput_2"/><a href="#" class="button" id="moresocial"> Add</a><br />
			    </div>			
			</div>
			<div id="media_list"> 
			<div class="options-line space">
				<h3>Existing Social Medias:</h3>
			</div><div class="options-line2 space"></div>
			<ul id="social_movecontainer">
			<input type="hidden" name="<?php echo $shortname; ?>_social_media[]" />
			<?php 
			if(get_option($value['id'])!="")	
				{
				$vals=get_option($value['id']);
				}
			if(isset($vals))
				{
				for($i=0; $i<count($vals); $i++)
					{
					if($vals[$i]!="")
						{
						echo "<li class='social_move'>".stripslashes($vals[$i]);
						?>
						<input type="hidden" name="<?php echo $shortname; ?>_social_media[]" value="<?php echo stripslashes($vals[$i]); ?>" />
						<a href="#" class="remove_social" title="Remove Item">X</a>
					</li>
						<?php	
						$cvals=count($vals);
						}
					}
				}
			?>
			</ul>
			<?php	
			if(isset($cvals))
				{
				if($cvals<"1")	
						{
						echo "<div class='info'><p>You dont have defined Social Media Links. Please use the Area above to define your Social Media Profiles</p></div>";
						}	
				}
				?>
			<p>You can use the social icons with the widget or this shortcode: [social-icons]</p>
			</div>
			<div class="options-line2"></div>				
			<?php
			break;

		case 'slider-value':
			?>
			<?php $zz++; ?>
			<script type="text/javascript">
			jQuery(document).ready(function() {
				jQuery('.upload_image_button_<?php echo $zz; ?>').click(function() 
					{
					formfield = jQuery('.upload_image_<?php echo $zz; ?>').attr('name');
					tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
					window.send_to_editor=window.send_to_editor_<?php echo $zz; ?>;
					return false;
					});
				window.send_to_editor_<?php echo $zz; ?> = function(html) 
					{
					imgurl = jQuery('img',html).attr('src');
					jQuery('#<?php echo $value['id']; ?>').val(imgurl);
					tb_remove();
					}
				});
				</script>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></div>
			    <div class="options-right"><div class='clear-value'>x</div><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo esc_attr(get_option( $value['id'] )); } else { echo $value['std']; } ?>" /></label>
				<div>Picturesets: 
				<?php foreach((array)$allslider_sliders as $sliderid => $slid) : ?>
					<a href="#" class='exist_sliders' onclick="jQuery('#<?php echo $value['id']; ?>').val('<?php echo $slid[name]; ?>'); return false;"><?php echo $slid[name]; ?></a> 					 
				<?php endforeach; ?>
				</div><input class="upload_image_button_<?php echo $zz; ?>" type="button" value="Upload Image" />
			</div>
			</div>
			<div class="options-line2">Please choose your Header - Value. Note: if you choose one of the Slider, please select one of the defined Picturesets. If you want to use a Image, click one the >Upload Picture< Button, than you can choose an uploaded Picture or upload a new one. If you want to show the >Script< Header, insert a Word of your choice.</div>	
			<?php
			break;

		case 'text-color':
			?>
			<div class="options-line color_opts">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			    <div class="options-right"><div class='clear-value'>x</div>
				<input class="font-color" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"   value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } ?>"   />
				<div class='color_previewer'></div>
				<span><?php echo $value['desc']; ?></span>
			    </div>
			</div>
			<div class="options-line2"></div>
			<?php 
			if ( check_color(get_option( $value['id']),$used_colors) != "") 
				{
				$used_colors[]=get_option( $value['id']);
				}
			break;

		case 'textarea':
			if ( get_option( $value['id'] ) != "") { $echo=  stripslashes(get_option( $value['id']) ); } 
			$edit_id=$value['id'];
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></div>
			    <div class="options-right">

			<?php if(isset($value['editor'])) {if($value['editor']==true)
				{
				// the_editor("$echo",$value['id'], "", true,"1");
				?></label></div><?php
				}
				}			
				else
					{
					?>
					<div class='clear-value'>x</div><textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") {  echo esc_html(stripslashes(get_option( $value['id'])) ); }   ?></textarea></label></div>
					<?php
					}
			?>
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?></div>
			<?php
			break;

		case 'select':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></div>
			    <div class="options-right"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></label></div>
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?></div>
			<?php
			break;

		case "checkbox":
			?>
			    <div class="options-line">
			   	 <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></div>
			   	 <div class="options-right">
					<?php  
						 
						if(get_option($value['id'])=="on")	
							{ 
							$checked = " checked='checked' "; 
							$cclass=" checked";
							}
							else
								{
								$checked="";
								$cclass=" unchecked";
								} 
					?>	
					<div class="checkboxfake <?php echo $cclass; ?>"></div>
			               	<input type="hidden" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo esc_attr(get_option( $value['id'] )); } else { echo $value['std']; } ?>" /><?php if(isset($value['desc'])) { echo $value['desc']; } ?></label> 
			               </div>
			    </div>
				<div class="options-line2"></div>		   
			<?php         break;
				
		case 'dropdown':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			    <div class="options-right">			
				<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"  />
					<?php
					for($i=0;$i<count($value['value']); $i++)
						{
						?><option value="<?php echo $value['value'][$i];?>"   <?php if(trim(get_option($value['id']))== $value['value'][$i]){ echo " selected"; } ?>><?php echo $value['value'][$i] ; ?></option>
						<?php
						}
						?>
				</select>
				</div>
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?></div>				
			<?php
			break;




		case "fontdropdown":

			$ufont = "";
			$ufont = get_option( $value['id'] );
			$ufont_w = "";
			if( strpos($ufont,':') !== false) 
				{
				$ufonts = explode(":", $ufont);
				$ufont = $ufonts['0'];
				$ufont_w = $ufonts['1'];
				}
			?>
			    <div class="options-line color_opts font_opts">
			    	<div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			   	<div class="options-right"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
			                <select class="font_dropdown" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"  />
			             	<option></option>
					<?php
					if(count($used_fonts!=""))
						{ 
						?><option disabled><b>---Used Fonts---</b></option><?php
						for($i=0; $i<count($used_fonts); $i++)
							{
							?><option value="<?php echo $used_fonts[$i]; ?>"><?php echo $used_fonts[$i]; ?></option><?php
							}
						}
 					?><option></option><option disabled><b>---Standart Fonts---</b></option><?php
					for($i=0;$i<count($fonts); $i++)
						{
						?>
							<option value="<?php echo $fonts[$i]; ?>" <?php  if($fonts[$i]==get_option( $value['id'])   ) { echo " selected"; }  if(($fonts[$i]=="---Google Webfonts---") OR ($fonts[$i]=="---Cufon Fonts---")) { echo " disabled"; } ?> ><?php echo $fonts[$i]; ?></option>						
						<?php
						}
					?>
				</select>
			<?php 
			if(get_option($value['id']))
				{
				?>
				<script type="text/javascript">
				jQuery(document).ready(function($)
					{
					
					var link = ("<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=<?php echo get_option($value['id']); ?>' media='screen' />"); 
					$("head").append(link);
					});
				</script><?php
				$f=get_option($value['id']);
				}



			?>

			</div>
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?>
				<div class='upload_preview'>
				<?php if(get_option( $value['id'] )!="")
					{
					?>
					<p><strong>Preview:</strong></p>
					<img src="<?php echo get_option( $value['id'] ); ?>" alt="Your Upload" /><?php
					}
	
				?>	
				</div>
			</div>
			<?php

			break;
















		case "font":
			$ufont = "";
			$ufont = get_option( $value['id'] );
			$ufont_w = "";
			if( strpos($ufont,':') !== false) 
				{
				$ufonts = explode(":", $ufont);
				$ufont = $ufonts['0'];
				$ufont_w = $ufonts['1'];
				}
			?>
			    <div class="options-line color_opts font_opts">
			    	<div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			   	<div class="options-right"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
			                <select class="font_dropdown" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"  />
			             	<option></option>
					<?php
					if(count($used_fonts!=""))
						{ 
						?><option disabled><b>---Used Fonts---</b></option><?php
						for($i=0; $i<count($used_fonts); $i++)
							{
							?><option value="<?php echo $used_fonts[$i]; ?>"><?php echo $used_fonts[$i]; ?></option><?php
							}
						}
 					?><option></option><option disabled><b>---Standart Fonts---</b></option><?php
					for($i=0;$i<count($fonts); $i++)
						{
						?>
							<option value="<?php echo $fonts[$i]; ?>" <?php  if($fonts[$i]==get_option( $value['id'])   ) { echo " selected"; }  if(($fonts[$i]=="---Google Webfonts---") OR ($fonts[$i]=="---Cufon Fonts---")) { echo " disabled"; } ?> ><?php echo $fonts[$i]; ?></option>						
						<?php
						}
					?>
				</select>
			<?php 
			if(get_option($value['id']))
				{
				?>
				<script type="text/javascript">
				jQuery(document).ready(function($)
					{
					
					var link = ("<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=<?php echo get_option($value['id']); ?>' media='screen' />"); 
					$("head").append(link);
					});
				</script><?php
				$f=get_option($value['id']);
				}

			break;

		case "fontsize":
			?>			
			<input class='font-size' type="text" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); }  ?>" > px 
			<?php
			$siz=get_option( $value['id'] );
			break;
	
		case "fontcolor":
			?>
			<div class='clear'></div>	
			<div class='clear-value'>x</div>	
			<input type="text" class="font-color color{required:false, hash:true,pickerClosable:true, adjust:false}" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); }  ?>"> Fontcolor
			<div class='color_previewer'></div>
			<?php $col=get_option( $value['id'] ); ?>
			<div class='font-pre'><span><strong>Preview: </strong></span> 
				<div class='font_preview_change_background'>
					<a href='#' data-mode='_f_p_default'>No Background</a> |
					<a href='#' data-mode='_f_p_dark'>Dark Background</a> | 
					<a href='#' data-mode='_f_p_ps'>Photoshop Background</a>  		
				</div>
				<div class='font_preview_field'>
					<span class='font_preview' style="font-weight: <?php echo $ufont_w; ?>; font-family:<?php echo $ufont; ?>; color:<?php echo $col; ?>; font-size:<?php if($siz) { echo $siz; } else { echo "15"; } ?>px; ">Lorem Ipsum Dolor</span>
				</div>
			</div></div>
			</div>


<script type="text/javascript">
jQuery('.font_preview_change_background a').click(function() {

	var cbg = jQuery(this).data('mode');
	jQuery(this).parent().parent().find('.font_preview_field').removeAttr('class').addClass(cbg).addClass('font_preview_field');
	return false;
	});

</script>













			<div class="options-line2"><?php echo $value['desc']; ?></div>			  
			<?php    
			if ( check_color(get_option( $value['id']), $used_colors) != "") 
				{
				$used_colors[]=get_option( $value['id']);
				}
			$col="";
			$siz="";	
			$f="";		
			break;

		case "fontbgcolor":
			?>		
			<input type="text" class="font-color color{required:false, hash:true,pickerClosable:true, adjust:false}" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>"> Backgroundcolor
			<?php         break;






		case "fontmulti":
			$mufont = "";
			$mufont = get_option( $value['id'] );
			$mufont_w = "";
			if( strpos($mufont,':') !== false) 
				{
				$mufonts = explode(":", $mufont);
				$mufont = $mufonts['0'];
				$mufont_w = $mufonts['1'];
				}

			$ffont = get_option( $value['id'] );
			$fffont = explode( "," ,$ffont ); 

			?>
			    <div class="options-line color_opts font_opts">
			    	<div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			   	<div class="options-right"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
			                <select multiple class="font_dropdown" name="<?php echo $value['id']; ?>[]" id="<?php echo $value['id']; ?>"  />
			             	<option></option> 
					<?php
					for($i=0;$i<count($gfonts); $i++)
						{
						?>
							<option value="<?php echo $fonts[$i]; ?>" <?php  if( in_array($fonts[$i],  $fffont)   ) { echo " selected"; }  if(($fonts[$i]=="---Google Webfonts---") OR ($fonts[$i]=="---Cufon Fonts---")) { echo " disabled"; } ?> ><?php echo $fonts[$i]; ?></option>						
						<?php
						}
					?>
				</select>

				<h4>Class names: </h4>
				<?php

				// LIST CLASSNAMES FOR THE LOADED FONTS

				for( $ri = 0 ; $ri < count( $fffont); $ri++ )
					{
					$fo = $fffont[$ri];
	
					$fo =str_replace(" ","_",$fo );
					$fo = str_replace( "+", "_", $fo );
	 				$fo = str_replace( ":", "_", $fo );
	
	
					echo "<p>Classname: <strong>".$fo ."</strong></p>";
					}

				?>
				</div>
			</div>
			<?php   


			break;











		case "file":
			?>
			<?php $zz++; ?>
				<script type="text/javascript">
					jQuery(document).ready(function() {
					jQuery('.upload_image_button_<?php echo $zz; ?>').click(function() {
					formfield = jQuery('.upload_image_<?php echo $zz; ?>').attr('name');
					tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
					window.send_to_editor=window.send_to_editor_<?php echo $zz; ?>;
					return false;
					});
					window.send_to_editor_<?php echo $zz; ?> = function(html) {
					imgurl = jQuery('img',html).attr('src');
					jQuery('.upload_image_<?php echo $zz; ?>').val(imgurl);
					tb_remove();
					}
				});
				</script>
			 <div class="options-line">
				<div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			       	<div class="options-right">
			            		<div class='clear-value'>x</div><input id="<?php echo $value['id']; ?>" class="upload_image upload_image_<?php echo $zz; ?>" type="text" size="36" name="<?php echo $value['id']; ?><?php // upload_image ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); }  ?>" />
					<input class="upload_image_button_<?php echo $zz; ?>" type="button" value="Upload Image" />
				</div>
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?>
				<div class='upload_preview'>
				<?php if(get_option( $value['id'] )!="")
					{
					?>
					<p><strong>Preview:</strong></p>
					<img src="<?php echo get_option( $value['id'] ); ?>" alt="Your Upload" /><?php
					}
	
				?>	
				</div>
			</div>
			<?php
			break;

		case "background":
			?>
			<?php $zz++; ?>
				<script type="text/javascript">
					jQuery(document).ready(function() {
					jQuery('.upload_image_button_<?php echo $zz; ?>').click(function() {
					formfield = jQuery('.upload_image_<?php echo $zz; ?>').attr('name');
					tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
					window.send_to_editor=window.send_to_editor_<?php echo $zz; ?>;
					return false;
					});
					window.send_to_editor_<?php echo $zz; ?> = function(html) {
					imgurl = jQuery('img',html).attr('src');
					jQuery('.upload_image_<?php echo $zz; ?>').val(imgurl);
					tb_remove();
					}
				});
				</script>
			 <div class="options-line">
				<div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
				<div class="options-right">			             
					<div class='clear-value'>x</div><input id="<?php echo $value['id']; ?>" class="upload_image_<?php echo $zz; ?>" type="text" size="36" name="<?php echo $value['id']; ?>" value="<?php  echo get_option( $value['id'] ); ?>" />
					<input class="upload_image_button_<?php echo $zz; ?>" type="button" value="Upload Image" />
					<input class="src_image" type="button" value=" Sample " />				
				<?php 
				if(get_option( $value['id'] )!="")
					{
					$url=get_option( $value['id'] );
					}
				break; 


		case "background-x":
			?>
			<div>
				<span>Y-Axis: </span>
						<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" >
							<option value="top" <?php if( get_option($value['id'])=="top") { echo " selected"; } ?> >Top</>
							<option value="center" <?php if( get_option($value['id'])=="center") { echo " selected"; } ?> >Center</>
							<option value="bottom" <?php if( get_option($value['id'])=="bottom") { echo " selected"; } ?> >Bottom</>					
						</select>
			<?php
			$x=get_option($value['id']);
			break;


		case "background-y":
			?>
			<span>X-Axis: </span>
				<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" >
					<option value="left" <?php if( get_option($value['id'])=="left") { echo " selected"; } ?> >Left</>
					<option value="right" <?php if( get_option($value['id'])=="right") { echo " selected"; } ?> >Right</>
					<option value="center" <?php if( get_option($value['id'])=="center") { echo " selected"; } ?> >Center</>					
				</select>
			<?php
			$y=get_option($value['id']);
			break;

		case "background-repeat":
			?>
			<span>Background-Repeat: </span>
				<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" >
					<option value="repeat-x" <?php if( get_option($value['id'])=="repeat-x") { echo " selected"; } ?> >X</>
					<option value="repeat-y" <?php if( get_option($value['id'])=="repeat-y") { echo " selected"; } ?> >Y</>								
					<option value=""  <?php if( get_option($value['id'])=="") { echo " selected"; } ?> >All</>
					<option value="no-repeat" <?php if( get_option($value['id'])=="no-repeat") { echo " selected"; } ?> >No Repeat</>
				</select>
			<?php
			$rep=get_option($value['id']);
			break;	


		case "background-fix": 
			if(get_option($value['id'])=="on")	
				{ 
				$checked = " checked='checked' "; 
				$cclass=" checked";
				}
				else
					{
					$checked="";
					$cclass=" unchecked";
					} 
				?>
				<br /><br />	
				<div class="checkboxfake <?php echo $cclass; ?>" ><span style="margin-left:20px;">Background Fix</span></div>
			            	<input type="hidden" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo esc_attr(get_option( $value['id'] )); }  ?>" />
			</div>
			</div>
			</div>
			<div class="options-line2">
			<?php if(isset($url)) {if($url!="")
				{
				?>
				<p><strong>Preview:</strong></p>
				<div style="width:100%; height:100px; max-width:500px; background:url(<?php echo $url; ?>) <?php echo $x." ".$y ." ".$rep; ?>;"></div>
				<?php }
				}	
			?>
			</div>
			<?php
			$url="";
			$x="";
			$y="";
			$rep="";
			break;	
		
		case "cufon":
			$cufon_fonts=get_option("cufon_fonts");
			$ch1=get_option($shortname."_cufon_h1");
			$ch2=get_option($shortname."_cufon_h2");
			$ch3=get_option($shortname."_cufon_h3"); 
			$ch4=get_option($shortname."_cufon_body");
			if(!is_array($cufon_fonts))
				{ 
				?><div class='info'>Note: There are no Cufon Fonts. Please go to "Font Upload and add some Cufon Fonts.</div><?php					 
				}
				else
					{
			?>
			<div class="options-line">
			   <div class="options-left">Cufon H1 Replace</div>
			   <div class="options-right">
				<select name="<?php echo $shortname; ?>_cufon_h1" id="<?php echo $shortname; ?>_cufon_h1">	
					<option></option>
					<?php	
					$s=0;
					$sname=$shortname."_cufon_h1";
					foreach((array)$cufon_fonts as $font => $fata) 
						{
						$s++;
						echo '<option value="'.stripslashes($fata['name']).'"';
						if($fata['name']==$ch1) { echo " selected "; }
						echo '>'.stripslashes($fata['name']).'</option>';
						}
					?>
				</select>
			   </div> 	
			</div>			
			<div class="options-line2"> </div>

			<div class="options-line">
			   <div class="options-left">Cufon H2 Replace</div>
			   <div class="options-right">
				<select name="<?php echo $shortname; ?>_cufon_h2" id="<?php echo $shortname; ?>_cufon_h2">	
					<option></option>
					<?php	
					$sname=$shortname."_cufon_h2";
					if(is_array($cufon_fonts))
						{
						foreach((array)$cufon_fonts as $font => $fata) 
							{
							echo '<option value="'.stripslashes($fata['name']).'"';
							if($fata['name']==$ch2) { echo " selected "; }
							echo '>'.stripslashes($fata['name']).'</option>';
							}
						}
					?>
				</select>
			   </div> 	
			</div>			
			<div class="options-line2"> </div>

			<div class="options-line">
			   <div class="options-left">Cufon H3 Replace</div>
			   <div class="options-right">
				<select name="<?php echo $shortname; ?>_cufon_h3" id="<?php echo $shortname; ?>_cufon_h3">	
					<option></option>
					<?php	
					$sname=$shortname."_cufon_h3";
					foreach((array)$cufon_fonts as $font => $fata) 
						{
						echo '<option value="'.stripslashes($fata['name']).'"';
						if($fata['name']==$ch3) { echo " selected "; }
						echo '>'.stripslashes($fata['name']).'</option>';
						}
					?>
				</select>
			   </div> 	
			</div>			
			<div class="options-line2"> </div>

			<div class="options-line">
			   <div class="options-left">Cufon Body Replace</div>
			   <div class="options-right">
				<select name="<?php echo $shortname; ?>_cufon_body" id="<?php echo $shortname; ?>_cufon_body">	
					<option></option>
					<?php	
					$sname=$shortname."_cufon_body";
					if(is_array($cufon_fonts))
						{
						foreach((array)$cufon_fonts as $font => $fata) 
							{
							echo '<option value="'.stripslashes($fata['name']).'"';
							if($fata['name']==$ch4) { echo " selected "; }
							echo '>'.stripslashes($fata['name']).'</option>';
							}
						}
					?>
				</select>
			   </div> 	
			</div>			
			<div class="options-line2"> </div>






			<?php
				}
			break; 
 


		case "imagesize":
			unset($vals); 
			?>
			<div class="options-line">
			    <div class="options-left"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></div>
			    <div class="options-right" id="social_container">
			    	 Unique ID: 	<input type="text" name="<?php echo $value['id']; ?>_name" id="<?php echo $value['id']; ?>_in1" />
				 Width in pixel:	<input type="text" name="<?php echo $value['id']; ?>_id" id="<?php echo $value['id']; ?>_in2" /> 
				 Height in pixel:	<input type="text" name="<?php echo $value['id']; ?>_id" id="<?php echo $value['id']; ?>_in3" /><a href="#" class="button" id="more_arr_<?php echo $value['id']; ?>"> Add</a><br />
			    </div>			
			</div>
			<div id="arr_list_<?php echo $value['id']; ?>"> 
			<div class="options-line space">
				 
			</div><div class="options-line2 space"></div>
			<script type='text/javascript'>
			jQuery(document).ready(function($)
				{
				jQuery("#more_arr_<?php echo $value['id']; ?>").click(function()
					{
					var sm1=jQuery("#<?php echo $value['id']; ?>_in1").val();
					var sm2=jQuery("#<?php echo $value['id']; ?>_in2").val();
					var sm3=jQuery("#<?php echo $value['id']; ?>_in3").val();
					var insert_1="ID: "+sm1+" - Name: "+sm2;
					var insert_2=sm1+"|"+sm2+"|"+sm3;
					jQuery("#re_fx_<?php echo $value['id']; ?>_movecontainer").append('<li class="arr_move"><span class="span1">ID: '+sm1+'</span><span class="span2">Width: '+sm2+'</span><span class="span2">Height: '+sm3+'</span><input  name="<?php echo $value['id']; ?>[]"  type="hidden" value="'+insert_2+'" /><a href="#" class="remove_social" title="Remove Item">X</a></li>');
					return false;
					});
				}); 
			</script>

			</div>
			<div class="options-line2">
			<ul id="re_fx_<?php echo $value['id']; ?>_movecontainer" class='movecontainer'> 
			<input type="hidden" name="<?php echo $value['id']; ?>[]" />
			<?php   
			if(get_option($value['id'])!="")	
				{
				$vals=get_option($value['id']); 
				}
			if(isset($vals) && is_array($vals))
				{
				for($i=0; $i<count($vals); $i++)
					{
					if($vals[$i]!="")
						{
						
						$v=explode("|",$vals[$i]);
						echo "<li class='arr_move'><span class='span1'>ID: ".$v['0']."</span><span class='span2'>Width: ".$v['1']."</span><span class='span2'>Height: ".$v['2']."</span>";
						?>
						<input type="hidden" name="<?php echo $value['id']; ?>[]" value="<?php echo $vals[$i] ; ?>" />
						<a href="#" class="remove_social" title="Remove Item">X</a>
					</li>
						<?php	
						$cvals=count($vals);
						}
					}
				} 
			?>
			</ul>
			</div> <p>Please note: New created image size will affect only new uplodad images. If you want to use the image sizes for already uploaded images, please use this plugin: <a href='http://wordpress.org/plugins/regenerate-thumbnails/' target='_blank'>Regenerate Thumbnails</a></p>
			
			<?php
			break;
		}
	  } // Hidden Value
	} 
?>
</div>
</div>
<div style="clear:both;"></div>
</div><!-- Tabs-->
</div><!-- Tabscontainer--> 
</form>
<p>&nbsp;</p>
<form method="post" style="display:inline; margin-right:5px;"> 
		<input type="hidden" name="action" value="softreset" />
		<input id="softreset_options" name="reset" type="submit" value="Soft Reset" /> 
</form>
<form method="post" style="display:inline"> 
		<input type="hidden" name="action" value="reset" />
		<input id="reset_options" name="reset" type="submit" value="Reset ALL settings" /> 
</form>
<p>'Soft Reset' will reset only color, fonts and backgrounds, not your personal things like logo, favicon, custom css, social icons, google analytics and webmaster tools code, sidebars and image sizes.</p>

<div id="src_load"></div>
</div><!-- optionsPage-->
	<?php
/*
	$out="";
	for($i=0;$i<count($used_colors); $i++) 
		{ 
		$mycol=$used_colors[$i];
		$out.="<div class='used_color_picker'  data-color='$mycol' style='background:$used_colors[$i]'></div>"; 
		}
	$out.="<div class='clear'></div>";
*/
	?>

<!-- <script type="text/javascript">
jQuery(document).ready(function()
	{	
	jQuery('.color_opts').hover(function()
		{
		jQuery(this).stop().find(".color_previewer").show();
		jQuery(this).find(".color_previewer").html("<?php echo $out; ?>");
		}, function()
			{
			jQuery(this).find(".color_previewer").stop().delay('0').fadeOut();
			}
		); 

	jQuery('.used_color_picker').live('click',function()
		{
		var col=jQuery(this).data('color');
		jQuery(this).parent().prev().val(col).css('backgroundColor',col);
		//jQuery(this).parent().hide();
		});	 
	});
</script> -->
<?php
}
?>