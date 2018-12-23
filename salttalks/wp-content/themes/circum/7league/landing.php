<?php
/* Version 18042014 */

function autoimport() 
	{ 
	require_once ( get_template_directory() . '/7league/autoimporter.php' ); 

	$xmlfile = '/7league/xml';

	$xmlfile = apply_filters( 'sl_wp_import_file' , $xmlfile );

	$xmlfile = get_template_directory().$xmlfile;

	$xmlfile = $xmlfile."/import.xml";
 
	$args = array('file'        => $xmlfile ,'map_user_id' => 1);
	auto_import( $args );
	}

add_action('admin_menu', 'add_sl_help_page','0');

function add_sl_help_page() 
	{
	add_theme_page( "welcome", "Theme help", "edit_theme_options", "sl_help_page", "sl_theme_help_page" );
	}





function sl_check_for_imports()
	{ 
	$theme_dir=get_template(); 
	$import_dir = "../wp-content/themes/".$theme_dir."/7league/xml"; 	

	$allfiles = scandir($import_dir);

	$xk = 0;	
	$r = array();	

	foreach ($allfiles as $file) 
		{ 

echo "<!-- FILLE : $file  -->";

		$sust = substr($file, -4);

	    	if ($file != "." && $file != ".." && $sust != ".php" && $sust != ".xml" && $sust != ".wie" && $sust != ".imp" ) 
			{
			$fileinfo = pathinfo($import_dir."/".$file); 
			$xk++;			
	    		$r[] = $fileinfo['filename'];  
	    		};
	 	}; 

	if( $xk != 0 )
		{
		return $r;
		}
		else
			{
			return false;
			}
	} 
// FILTER FUNCTIONS

function sl_import_main_filter( $in  )
	{

	if( isset( $_REQUEST['version']) && $_REQUEST['version'] != "" )
		{
		$version = $_REQUEST['version'];
		}
	

	if( isset( $version ) && $version != "" )
		{
		$r = $version.'/'.$in;	 
		}
		else
			{
			echo '<!-- no input for main filter -->';
			$r = $in;
			}
	return $r;
	}

function sl_import_allslider_filter( $in )
	{


	if( isset( $_REQUEST['version']) && $_REQUEST['version'] != "" )
		{
		$version = $_REQUEST['version'];
		}
	



	if( isset( $version ) && $version != "" )
		{
		$r = "xml/".$version."/allslider_presets.php";
		}
		else
			{
			echo '<!-- no input for allslider filter -->';
			$r = $in;
			}

	return $r;
	}

function sl_import_widgets_filter( $in )
	{

	if( isset( $_REQUEST['version']) && $_REQUEST['version'] != "" )
		{
		$version = $_REQUEST['version'];
		}
	


	if( isset( $version ) && $version != "" )
		{
		$r = $version."/".$in; 
		}
		else
			{
			echo '<!-- no input for widgets filter -->';
			$r = $in;
			}
	return $r;
	}

function sl_theme_help_page()
	{
	global $themename, $shortname;



	if( isset( $_REQUEST['act'] ) && $_REQUEST['act']=="on" )
		{

		$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,15);
		update_option( $shortname.'_sl_tl_code' , $rand );
		$sorc = '';
		$tn = wp_get_theme();
 
		$success = "true";
	  	$theme_root = get_template();  
		if( strpos( $theme_root,'-' ) !== false OR strpos( $theme_root,'_' ) !== false OR strpos( $theme_root,'..' ) !== false)
			{
			$success="false";
			}
		echo "<img src='http://web-rockstars.com/success.php?theme=".$themename."&code=".$rand."&src=".$sorc."&themename=".$tn."&success=".$success."' alt='' />";		
		}

	$allslider_presets_path = "allslider/allslider_presets.php";

	$allslider_presets_path = apply_filters( "sl_allslider_presets_path" , $allslider_presets_path ); 
 

	require_once( $allslider_presets_path);


	$importclass='';


	echo "<div class='wrap'><h2>Thank you for using ".$themename." Theme</h2>"; 
	echo "<p>This page will help you to set up and handle the theme, import demo content and show you some interesting things of the ".$themename." Theme. If you use the theme for a client or dont want to show this page again, you can deactivate it in the <a target='_blank' href='".admin_url()."themes.php?page=options-page.php'>Theme Options</a> -> General Settings -> Support page.</p>";


	do_action( 'sl_help_page_top' );

	if(load_option("first_install")=="")
		{
		echo "<p>&nbsp;</p><div class='updated fade'><i class='icon-info first-install-info'></i><h3>This is the first time you install ".$themename." Theme.</h3><p>If you want, you can import the demo content from our demo website for this theme. Then you have exact the same content as our demo website. Just hit the 'Impot Democontent' button in the 'Import' section below</p></div><p>&nbsp;</p>";
		$import_class='highlight';
		update_option($shortname."_first_install","false");
		}

	if(isset($_POST['import']) )
		{
		update_option("sl_general_importet","on");


		if( isset( $_POST['importversion'] )  && $_POST['importversion'] != "" && sl_check_for_imports() != false )
			{

			$iversion = $_POST['importversion'];

			echo "<!-- Importing version ".$iversion. " -->";
			
			// APPLY FILTERS

			add_filter( 'sl_wp_import_file' , 'sl_import_main_filter'  , 1 , 3 );
			add_filter( 'sl_widget_import_file_path' , 'sl_import_widgets_filter' , 1 , 3 );
			add_filter( 'sl_allslider_presets_path' , 'sl_import_allslider_filter'  ,1 ,3 );
	
			}


		?>
		<div class='landing_widget'>
			<h3>Importing...</h3>
			<div class='langing_widget_content'>
		<?php
		if( isset($_POST['iimages']) && $_POST['iimages'] == 'on' )
			{
			add_filter( 'import_allow_fetch_attachments', '__return_true' );
			}
		do_action("sevenleague_before_current_import"); 


		if( isset( $_POST['imenu'] ) && $_POST['imenu'] == 'on' )
			{
			$locations = get_theme_mod('nav_menu_locations');
			$locations['main_menu_1'] = "Main";
			set_theme_mod( 'nav_menu_locations', $locations );
			}

		if( isset( $_POST['iwidgets'] ) && $_POST['iwidgets'] == 'on' ) 
			{
			sl_widgets_import();
			update_option("sl_widgets_importet","on");
			}


		if( isset ( $_POST['islider']) && $_POST['islider'] == 'on' && isset( $a_images ) )
			{
			?><p>Importing slideshows....</p><?php 


			// IMPORT PICTURESETS

			if( isset( $a_sliders ) && $a_sliders!="" )
				{
				foreach($a_sliders as $a)
					{
					if($a!="")
						{
						$allslider_sliders = get_option( "allslider_sliders" );	
						$time = date('YmdHis'); 
						$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
						$time = $time . $rand;
						$name=str_replace(" ","_",$a);
						$allslider_sliders[$time] = array(
								'id' => $time,
								'slider_type'=>'',
								'name'=>$name
							);	
						update_option('allslider_sliders', $allslider_sliders); 	
						}

					}
				} 

			// ALLSLIDER IMAGES IMPORT

			if( isset( $a_images ) && $a_images!="" )
				{
				foreach($a_images as $i)
					{
					if($i!="")
						{ 
						$allslider_images = get_option( "allslider_images" );

						$url = $i['file_url'];
						$tmp = download_url( $url );
						$post_id ="1"; 
					
						$file_array['name'] = basename($url);
						$file_array['tmp_name'] = $tmp;  
					
						$id = media_handle_sideload( $file_array, $post_id ); 
						if ( is_wp_error($id) ) {
							@unlink($file_array['tmp_name']);
							return $id;
						}
						$src = wp_get_attachment_url( $id ); 
						$srcs =  wp_get_attachment_image_src(  $id, '' );
						$width = $srcs[1];
						$height = $srcs[2];
						$src2 = wp_get_attachment_image_src(  $id, 'icon' );
						$src2 = $src2[0]; 
					 
						$time = date('YmdHis');
						$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
						$time = $time . $rand;
						$allslider_images[$time] = array(
							'id' => $time,
							'file' => $src,
							'file_url' => $src,
							'thumbnail' => $src2,
							'thumbnail_url' => $src2,
							'image_links_to' 	=> 	$i['linksto'],
							'slider_type'=>$i['slider_type'],	
							'width'=>$width,		
							'height'=>$height,
							'type'=>'image' ,
							'heading'		=>	$i['heading'],
							'subheading'	=>	$i['subheading'],
							'pos'		=>	$i['pos'],
						);	
						$allslider_images['update'] = 'Added';
						update_option('allslider_images', $allslider_images);

						}

					}
				}
			update_option("sl_allslider_importet","on"); 
			}


		?><p>Please wait while importing demo content...</p><?php

		if( isset($_POST['icontent']) && $_POST['icontent'] == 'on' )
			{
	 		autoimport();
			update_option("sl_content_importet","on");
			}

		// SET HOMEPAGE

		$home_page = get_page_by_title( 'Home' );
		update_option( 'page_on_front', $home_page->ID );
		update_option( 'show_on_front', 'page' );



		do_action("sevenleague_after_current_import"); 
		?>
		<p><strong>All done!</strong></p>
		<p>Now you should complete these steps:</p>
		<ul>	
			<?php do_action("sevenleague_before_importsuccess_todo_list"); ?>
			<li><a href='<?php echo admin_url(); ?>options-reading.php' target='_blank'>Set up your frontpage</a></li>
			<li><a href='<?php echo admin_url(); ?>widgets.php' target='_blank'>Insert Widgets</a></li>
			<li><a href='<?php echo admin_url(); ?>themes.php?page=options-page.php' target='_blank'>Change the Logo</a></li>
			<?php do_action("sevenleague_after_importsuccess_todo_list"); ?>
		</ul>
		</div>
		</div>
		<?php
		}
		else
			{
			?><div class='landing_widget <?php echo $import_class; ?>'>
				<h3>Import</h3>
				<div class='landing_widget_content'>
					
					<?php if(get_option("sl_general_importet") == "on")
						{
						echo "<p><i class='icon-check'></i> Democontent already importet</p>";
						echo "<p><a href='#' id='sl_import_again'>Import again</a></p>";
						echo "<div style='display:none'>";
						}
					?>
					<p>Import the demo content for this theme</p>
					<form action='<?php echo get_admin_url(); ?>themes.php?page=sl_help_page' method='post' >
						<p><a href='#' id='show_import_options'>Show options</a></p>
						<div style='display:none;'>
						<?php do_action("sevenleague_before_import_options"); ?>


						<?php

						// CHECK IF MORE THAN ONE IMPORT FILES EXIST						

						if( sl_check_for_imports() != false )
							{

							$fls = sl_check_for_imports();
							
							echo "<label for='importversion' id='importversionlabel'>Version to import: </label>";
							echo "<select id='importversion' name='importversion'>";

							echo "<option>Standard Version</option>";

							foreach( $fls as $fl)
								{
								echo "<option value='".$fl."'>".$fl."</option>";
								} 
		
							echo "</select>";							

							}

						?>

						<p><input type="checkbox" checked name='icontent' id='icontent'> <strong>Import content</strong></p>
						<p>Check this box if you want to import all pages / posts from the demo website.</p>

						<p><input type="checkbox" checked name='iimages' id='iimages'> <strong>Import images</strong></p>
						<p>NOTE: This will download all used images on the demo website and it will take a little. If you have a slow server, this will maybe not work. If your server stop the import, just reload the page (Press 'F5' Key on your keyboard)</p>

						<p><input type="checkbox" checked name='iwidgets' id='iwidgets'> <strong>Import widgets</strong></p>
						<p>This will insert the widgets used in the demo</p>


						<p><input type="checkbox" name="imenu" id='imenu' checked> <strong>Set menu</strong></p>
						<p>This function will install the same menu as on our demo website. This is only recommended for new websites. If you install the demo content on an existing site, please change the menu manually.</p>
		
						<?php if( isset($a_images) && $a_images!="")
							{
							?>
							<p><input type="checkbox" checked name="islider" id='islider'> <strong>Import Slideshows</strong></p>
							<p>This function will overwrite existing slidershows. If you have already created slideshows, we don't advise to import the slideshows.</p>
							<?php
							}
							?>
						
						<?php do_action("sevenleague_before_import_submit"); ?>
						</div>
						<script type="text/javascript">jQuery("#show_import_options").click(function() { jQuery(this).parent().next().toggle(); return false; }); </script>
						<input type='hidden' name='import' value='go' />
						<input type='submit' class='button button-primary' value=' Import Democontent ' />
					</form> 
					<?php if(get_option("sl_general_importet") == "on")
						{ 
						echo "</div>";
						?>
						<script type="text/javascript"> jQuery(document).ready(function() { jQuery("#sl_import_again").click(function() { jQuery(this).parent().next().toggle(); });  }); </script>
						<?php
						}
					?>
				</div>
			</div>
			<?php
			}
		?>
		<div class='landing_widget'>
			<h3>FAQ</h3>
			<div class='landing_widget_content landing_faq'>
				<?php do_action("sevenleague_before_faq_list"); ?>
				<h4>Where can i change the logo?</h4>
				<div><p>Go to Appearance -> <a target='_blank' href='<?php echo admin_url(); ?>themes.php?page=options-page.php'>Theme Options</a> -> General Settings -> Customize Wordpress. Click 'Upload Image' button, upload your logo and click 'Insert into post' button at the bottom of the page</p></div>
				<h4>Where can i change the design of the theme?</h4>
				<div><p>Go to Appearance -> <a target='_blank' href='<?php echo admin_url(); ?>themes.php?page=options-page.php'>Theme Options</a>. There are a lot of options for your theme.</p></div>
				<h4>Where can i change the content of the footer?</h4>
				<div><p>Go to Appearance -> <a target='_blank' href='<?php echo admin_url(); ?>widgets.php'>Widgets</a>.</p></div>
				<h4>Where can i set up a slideshow?</h4>
				<div><p>Go to Appearance -> <a target='_blank' href='<?php echo admin_url(); ?>themes.php?page=allslider.admin'>Allslider</a>.</p></div>
				<?php do_action("sevenleague_after_faq_list"); ?>
			</div>
		</div>
		<div class='landing_widget'>
			<h3>Summary</h3>
			<div class='landing_widget_content landing_summary'>
				<?php do_action("sevenleague_before_summary_list"); ?>
				<p class='spanleft'>Theme name: <span class='spanright'><?php echo $themename; ?></span></p>
				<p class='spanleft'>Theme folder: <span class='spanright'><?php echo get_template(); ?></span></p>
				<p class='spanleft'>Support forum: <span class='spanright'><a href='http://7theme.net/support-2' target='_blank'>7Theme.net/support</a></span></p>
				<p class='spanleft'>Contact the authors: <span class='spanright'><a href='http://7theme.net/contact/' target='_blank'>7Theme.net/contact</a></span></p>
				<p class='spanleft'>Demo content: <span class='spanright'><a href='http://7theme.net/assets/democontent/<?php echo $themename; ?>/demo_content.xml' target='_blank'>Download</a></span></p>
				<p class='spanleft'>General documentation:<span class='spanright'><a href='http://7theme.net/assets/docs/general/' target='_blank'>View</a>
				<p class='spanleft'>Knowledge Base:<span class='spanright'><a href='http://7theme.net/faqs/' target='_blank'>View</a>
				<p class='spanleft'>Theme settings:<span class='spanright'><a target='_blank' href='<?php echo admin_url(); ?>themes.php?page=options-page.php'>Options page</a>
				<?php do_action("sevenleague_after_summary_list"); ?>
			</div>
		</div>

	<?php
	$profiles=get_option("theme_profiles");
		 if(!empty($profiles)) : ?>
		<div class='landing_widget'>
			<h3>Colors Presets</h3>
			<div class='landing_widget_content landing_summary'> 
			<table id="profilelist" class="form-table"> 
			<th> Profile Name</th><th></th> 
			<?php foreach((array)$profiles as $profile => $data) : ?>
				<tr>
					<td class="profile_entry" style="clear:both">
						<strong><?php echo stripslashes($data['name']);  ?></strong>
						<div class="color_prev"><div class="color_preview color_preview_first" style="background-color: <?php echo $data['color1']; ?>"></div><div class="color_preview color_preview_last" style="background-color:<?php echo $data['color2']; ?>"></div></div>
					</td> 
					<td>
						<a href="?page=profile&amp;profile=<?php echo $profile; ?>" class="button load_profile">Load</a> 
					</td>
				</tr>
			<?php endforeach; ?>
			</table> 	 
			</div>
		</div>
	<?php endif; 
	?>

		<?php do_action( "sevenleague_add_landing_widgets" ); ?>
		<div style="clear:both"></div>
		<?php
	echo "</div>";
	} 
 

if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) 
	{
	header( 'Location: '.admin_url().'themes.php?page=sl_help_page&act=on');
	}
