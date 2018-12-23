<?php 
/* VERSION 11022014 */
global $slider;  

$allslider_settings = get_option('allslider_settings');
$allslider_images = get_option('allslider_images');
$allslider_sliders = get_option('allslider_sliders');
$allslider_cycle_settings=get_option('allslider_cycle_settings');
$allslider_defaults="";
$allslider_settings = wp_parse_args($allslider_settings, $allslider_defaults);

function allslider_register_settings() 
	{ 
	register_setting('allslider_images', 'allslider_images', 'allslider_images_validate');
	register_setting('allslider_sliders', 'allslider_sliders', '');
	}
	add_action('admin_init', 'allslider_register_settings');

function add_allslider_menu() 
	{
	add_theme_page('Allslider', 'Allslider', 'edit_theme_options', 'allslider.admin', 'allslider_admin_page');
	}
	add_action('admin_menu', 'add_allslider_menu');

function allslider_admin_page() 
	{
	echo '<div class="wrap">';
	echo "<div id='poststuff' class='metabox-holder'>";
	echo "<div id='post-body' class='has-sidebar'>
		<div id='post-body-content' class='has-sidebar-content'>
		<div id='normal-sortables' class='meta-box-sortables ui-sortable'>";
		if(isset($_REQUEST['action']))
			{
			if($_REQUEST['action'] == 'wp_handle_upload')
				{
				allslider_handle_upload();
				}
			if($_REQUEST['action'] == 'wp_handle_youtube_upload')
				{
				allslider_handle_youtube_upload();
				}
			if($_REQUEST['action'] == 'wp_handle_post_upload')
				{
				allslider_handle_post_upload();
				}
			if($_REQUEST['action'] == 'wp_handle_html_upload')
				{
				allslider_handle_html_upload();
				}
			if($_REQUEST['action'] == 'allslider_handle_newid')
				{
				allslider_handle_newid();
				}
			if( $_REQUEST['action'] == 'wp_handle_media_import' )
				{
				allslider_handle_media_import();
				}
			}
		if(isset($_REQUEST['delete_pictureset']))
			{
			if($_REQUEST['delete_pictureset'] != '')
				{			
				delete_pictureset($set="$_REQUEST[delete_pictureset]");
				}
			}
		if(isset($_REQUEST['delete']))
			{
			allslider_delete_upload($_REQUEST['delete']);
			}
		if(isset($_REQUEST['delete_youtube']))
			{
			allslider_delete_youtube($_REQUEST['delete_youtube']);
			}
		allslider_images_admin();
	echo '</div></div></div>
	</div></div>';
	}

function allslider_handle_media_import()
	{
	global $allslider_settings, $allslider_images;



	if( isset($_POST['img_from_media'] ) && $_POST['img_from_media']!="" )
		{

		$num = count( $_POST['img_from_media'] );

		for( $i = 0 ; $i < $num; $i++ ) {

			$img = $_POST['img_from_media'][$i];
 
			$imgdata = wp_get_attachment_image_src($img,'',false);		
	
			$thumbdata = wp_get_attachment_image_src($img, 'icon');
	
			$time = date('YmdHis');
		
			$time = $time.$i;

			$allslider_images[$time] = array(
				'id' => $time,
				'file' => $imgdata[0],
				'file_url' => $imgdata[0],
				'thumbnail' => $thumbdata[0],
				'thumbnail_url' => $thumbdata[0],
				'image_links_to' => '',
				'slider_type'=>'',	
				'width'=>$imgdata[1],	
				'height'=>$imgdata[2],
				'type'=>'image' 
			);	
			$allslider_images['update'] = 'Added';
			update_option('allslider_images', $allslider_images);
		
			}


		}
	}


function allslider_handle_newid() 
	{
	global $allslider_sliders;	
	$time = date('YmdHis');
	if(!empty($_POST["newid"]))
		{
		$name=str_replace(" ","_",$_POST["newid"]);
		$allslider_sliders[$time] = array(
			'id' => $time,
			'slider_type'=>'',
			'name'=>$name
		);	
		update_option('allslider_sliders', $allslider_sliders);
		}	
	}

function allslider_handle_upload() 
	{
	global $allslider_settings, $allslider_images;
	$allslider_settings['img_width']=2000;
	$allslider_settings['img_height']=1000;
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	$overrides = array( 'test_form' => false);
	$upload = wp_handle_upload($_FILES['allslider'], 0);
	extract($upload);
	$upload_dir_url = str_replace(basename($file), '', $url);
	list($width, $height) = getimagesize($file);

	if(strpos($type, 'image') === FALSE) 
		{
		unlink($file);
		echo '<div class="error" id="message"><p>Sorry, but the file you uploaded does not seem to be a valid image. Please try again.</p></div>';
		return;
		} 
		$image = wp_get_image_editor( $file );
		if ( ! is_wp_error( $image ) ) 
			{ 
			$image->resize( $allslider_settings['img_width'], $allslider_settings['img_height'], true );
			$filename = $image->generate_filename( 'final', ABSPATH.'wp-content/uploads/final/', NULL ); 
			$resized = $image->save( $filename );
			$resized_url=$resized;

			$img_opts=$image->get_size();
			$width= $img_opts['width'];
			$height=$img_opts['height'];

			// GENERATE THUMBNAIL			
			$thumb_height = round((100 * $allslider_settings['img_height']) / $allslider_settings['img_width']);
			$image->resize( '100', '100', true );
			$filename2 = $image->generate_filename( 'thumb', ABSPATH.'wp-content/uploads/thumb/', NULL ); 
			$resized2 = $image->save( $filename2 );
			$resized_url2=$resized2;	
			$file2=$resized2;		
			} 
		$file = $resized; 
		$url = $resized_url;  

	$time = date('YmdHis');
	$allslider_images[$time] = array(
		'id' => $time,
		'file' => $file['path'],
		'file_url' => $upload_dir_url . basename($url['file']),
		'thumbnail' => $file2['path'],
		'thumbnail_url' => $upload_dir_url . basename($file2['file']),
		'image_links_to' => '',
		'slider_type'=>'',	
		'width'=>$width,	
		'height'=>$height,
		'type'=>'image' 
	);	
	$allslider_images['update'] = 'Added';
	update_option('allslider_images', $allslider_images);
	}



function allslider_handle_post_upload() 
	{
	global $allslider_settings, $allslider_images; 
	$url=$_REQUEST['link'];
	$thumb=$_REQUEST['thumb'];
	$time = date('YmdHis');
	$h=$_REQUEST['h'];
	$w=$_REQUEST['w'];
	$allslider_images[$time] = array(
		'id' => $time,
		'file' => '',
		'file_url' => $url,
		'thumbnail' => $thumb,
		'thumbnail_url' => "$thumb",
		'image_links_to' => '',
		'slider_type'=>'',	
		'width'=>$w,	
		'height'=>$h,
		'type'=>'imge',
		'pos'=>'left',
		'yid'=>''
	);	
	$allslider_images['update'] = 'Added';
	update_option('allslider_images', $allslider_images);
	}



function allslider_handle_html_upload() 
	{
	global $allslider_settings, $allslider_images; 
	$html=$_REQUEST['html_code'];
	$thumb=$_REQUEST['thumb'];
	$time = date('YmdHis');
	$h=$_REQUEST['h'];
	$w=$_REQUEST['w'];
	$allslider_images[$time] = array(
		'id' => $time,
		'file' => $file,
		'file_url' => $html,
		'thumbnail' => $thumb,
		'thumbnail_url' => "$thumb",
		'image_links_to' => '',
		'slider_type'=>'',	
		'width'=>$w,	
		'height'=>$h,
		'pos'=>'left',
		'type'=>'html',
		'yid'=>''
	);	
	$allslider_images['update'] = 'Added';
	update_option('allslider_images', $allslider_images);
	}

function allslider_handle_youtube_upload() 
	{
	global $allslider_settings, $allslider_images;
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	$overrides = array( 'test_form' => false);
	$url=$_REQUEST['youtube_link'];
	$time = date('YmdHis');
	$allslider_images[$time] = array(
		'id' => $time,
		'file' => '',
		'file_url' => $url,
		'thumbnail' => '',
		'thumbnail_url' => "http://img.youtube.com/vi/".$url."/0.jpg",
		'image_links_to' => '',
		'slider_type'=>'',	
		'width'=>'',	
		'height'=>'',
		'pos'=>'left',
		'type'=>'youtube',
		'yid'=>$url
	);	
	$allslider_images['update'] = 'Added';
	update_option('allslider_images', $allslider_images);
	}


function delete_pictureset($id)
	{	
	global $allslider_sliders;
	if(!isset($allslider_sliders[$id])) return;
	$allslider_message['update'] = 'Deleted';
	unset($allslider_sliders[$id]);
	update_option('allslider_sliders', $allslider_sliders);
	}

function allslider_delete_upload($id) 
	{
	global $allslider_images;
	if(!isset($allslider_images[$id])) return;
	if(file_exists($allslider_images[$id]['file']))
		{
	//	unlink($allslider_images[$id]['file']);
	//	unlink($allslider_images[$id]['thumbnail']);
		}
	$allslider_images['update'] = 'Deleted';
	unset($allslider_images[$id]);
	update_option('allslider_images', $allslider_images);
	}

function allslider_delete_youtube($id) 
	{
	global $allslider_images;
	if(!isset($allslider_images[$id])) return;
	$allslider_images['update'] = 'Deleted';
	unset($allslider_images[$id]);
	update_option('allslider_images', $allslider_images);
	}

function allslider_images_update_check() 
	{
	global $allslider_images, $allslider_message;
	if(isset($allslider_images['update']))
		{
		if($allslider_images['update'] == 'Added' || $allslider_images['update'] == 'Deleted' || $allslider_images['update'] == 'Updated') 
			{
			echo '<div class="updated fade" id="message"><p>File(s) '.$allslider_images['update'].' Successfully</p></div>';
			unset($allslider_images['update']);
			update_option('allslider_images', $allslider_images);
			}
		if($allslider_message['update']=="Deleted")
			{
			echo '<div class="updated fade" id="message"><p>Pictureset(s) '.$allslider_message['update'].' Successfully</p></div>';
			unset($allslider_message['update']);		
			}		
		}
	}

function allslider_images_admin()	
	{ 
	global $allslider_images, $allslider_sliders , $slider; ?>
	<?php allslider_images_update_check(); ?>
	<!-- <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/script/jquery-ui.min.js"></script> -->
 	<h2>Allslider</h2>	 
	<?php do_action("sl_allslider_before_upload_image_block"); ?>
	<table class="form-table">
		<tr valign="top"><th scope="row">Upload a new Image</th>
			<td>
			<form enctype="multipart/form-data" method="post" action="?page=allslider.admin">
				<input type="hidden" name="post_id" id="post_id" value="0" />
				<input type="hidden" name="action" id="action" value="wp_handle_upload" />				
				<label for="allslider">Select a File: </label>
				<input type="file" name="allslider" class="allslider_upload_field" id="allslider" />
				<input type="submit" class="button-primary" name="html-upload" value="Upload" />
			</form>
			</td>
		</tr>
	</table>
	<table class="form-table">
		<tr valign="top"><th scope="row">Insert from Media Library</th>
			<td>
			<form method="post" action="?page=allslider.admin">
				<input type="hidden" name="post_id" id="post_id" value="0" />
				<input type="hidden" name="action" id="action" value="wp_handle_media_import" />	

				<?php
				wp_enqueue_media();
				wp_enqueue_script( 'custom-header' );
				?>

				<div class="uploader" style="float:left">
					<input class="button" name="sl_single_add_img" id="sl_single_add_img" value="+" title='Add new image' />
				</div>

				<ul id='sl_single_slider_images_list'></ul><!-- container for preview image and hidden input -->

				<div style="clear:both"></div>
				<script>
				jQuery(document).ready(function($)
					{
					jQuery(".remove_sl_slider_image").live("click",function()
						{ 
						jQuery(this).parent().remove();
						});
					var _custom_media = true,
					_orig_send_attachment = wp.media.editor.send.attachment;
					$('.uploader .button').click(function(e) 
						{
						var send_attachment_bkp = wp.media.editor.send.attachment;
						var button = $(this);
						_custom_media = true;
						wp.media.editor.send.attachment = function(props, attachment)
						{
						if ( _custom_media ) 
							{ 
							$("#sl_single_slider_images_list").append("<li style='cursor:initial'><input type='hidden' name='img_from_media[]' value='"+attachment.id+"'><img width='200' src='"+attachment.url+"' alt='' /><span class='remove_sl_slider_image'>x</span></li>"); 	
							$("#current_no_images").remove();
							$(".uploader").remove();	
							$("#send_button").show();
				      			} 
							else 
								{
								return _orig_send_attachment.apply( this, [props, attachment] );
								};
				    		}
				
					wp.media.editor.open(button);
					return false;
					});
				
				  $('.add_media').on('click', function()	
					{
					 _custom_media = false;
				  	});
				});
				</script> 			 
				<input type="submit" id="send_button" style="display:none" class="button-primary" name="html-upload" value="Insert" />
			</form>
			</td>
		</tr>
	</table>
	<?php do_action("sl_allslider_after_upload_image_block"); ?>
<!--
	<table class="form-table">
		<tr valign="top"><th scope="row">Insert a Video from Youtube</th>
			<td>
			<form method="post" action="?page=allslider.admin">
				<input type="hidden" name="post_id" id="post_id" value="0" />
				<input type="hidden" name="action" id="action" value="wp_handle_youtube_upload" />				
				<label for="youtube_link">Insert YouTube ID: </label>
				<input type="text" name="youtube_link" id="youtube_link" />
				<input type="submit" class="button-primary" name="html-upload" value="Send" />
			</form>
			</td>
		</tr>
	</table>
-->
<!-- HTML BLOCK -->
<!--
	<table class="form-table">
		<tr valign="top"><th scope="row">Insert a HTML Code</th>
			<td>
			<form method="post" action="?page=allslider.admin">
				<input type="hidden" name="post_id" id="post_id" value="0" />
				<input type="hidden" name="action" id="action" value="wp_handle_html_upload" />				
				<label for="html_code">Insert your HTML Code: </label>
				<input type="text" name="html_code" id="html_code" />
				<input type="submit" class="button-primary" name="html-upload" value="Send" />
			</form>
			</td>
		</tr>
	</table>
-->
<!-- EXISTING POSTS -->
<!-- 
	<table class="form-table">
		<tr valign="top"><th scope="row">Use existing featured Images</th>
			<td>
	 <div id="admin-tabs"> 
		<ul class="tabs">
			<li><a href="#tab-post">Post</a></li>
			<li><a href="#tab-page">Page</a></li>
		<?php 
		$argss=array( 'public'   => true,  '_builtin' => false); 
		$output = 'names';
		$operator = 'and'; 
		$post_types=get_post_types($argss,$output,$operator); 
		foreach ($post_types  as $post_type ) 
			{
			echo '<li><a href="#tab-'.$post_type.'">'. $post_type. '</a></li>';
			}
	 	echo "</ul>";  ?>
 		<div id="tab-post" class="post_source_tab"><?php
			global $post;
			$args = array( 'numberposts' => 500, 'post_type'=>'post' );
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post); 
				if (has_post_thumbnail()) 
					{ 
				 	$image1 = wp_get_attachment_image_src( get_post_thumbnail_id(),'icon' ); 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id(),'original' );
					?><div class='post_source_entry'>
						<form action="?page=allslider.admin" method="post">
							<input type="hidden" name="action" value="wp_handle_post_upload" />	
							<input type="hidden" name="link" value="<?php echo $image[0]; ?>" />
							<input type="hidden" name="h" value="<?php echo $image[2]; ?>" />
							<input type="hidden" name="w" value="<?php echo $image[1]; ?>" />
							<input type="hidden" name="thumb" value="<?php echo $image1[0]; ?>" />						
							<input type="image" src="<?php echo $image1[0]; ?>" alt="Insert Image" />
						</form>						
					   </div><?php
					}	 
			endforeach;			 
			?><div class='clear'></div></div><?php



			?><div id="tab-page" class="post_source_tab"><?php
			global $post;
			$args = array( 'numberposts' => 500, 'post_type'=>'page' );
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post); 
				if (has_post_thumbnail()) 
					{ 
				 	$image1 = wp_get_attachment_image_src( get_post_thumbnail_id(),'icon' ); 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id(),'original' );
					?><div class='post_source_entry'>
						<form action="?page=allslider.admin" method="post">
							<input type="hidden" name="action" value="wp_handle_post_upload" />	
							<input type="hidden" name="link" value="<?php echo $image[0]; ?>" />
							<input type="hidden" name="h" value="<?php echo $image[2]; ?>" />
							<input type="hidden" name="w" value="<?php echo $image[1]; ?>" />
							<input type="hidden" name="thumb" value="<?php echo $image1[0]; ?>" />						
							<input type="image" src="<?php echo $image1[0]; ?>" alt="Insert Image" />
						</form>	
					   </div><?php
					}		 	 
			endforeach;
			?><div class='clear'></div></div><?php




		$argss=array('public'   => true,'_builtin' => false); 
		$output = 'names';
		$operator = 'and'; 
		$post_types=get_post_types($argss,$output,$operator); 
		foreach ($post_types  as $post_type ) 
			{
			?><div id="tab-<?php echo $post_type; ?>" class="post_source_tab"><?php
			global $post;
			$args = array( 'numberposts' => 500, 'post_type'=>"$post_type" );
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post); 
				if (has_post_thumbnail()) 
					{ 
				 	$image1 = wp_get_attachment_image_src( get_post_thumbnail_id(),'icon' ); 
					$image = wp_get_attachment_image_src( get_post_thumbnail_id(),'original' );
					?><div class='post_source_entry'>
						<form action="?page=allslider.admin" method="post">
							<input type="hidden" name="action" value="wp_handle_post_upload" />	
							<input type="hidden" name="link" value="<?php echo $image[0]; ?>" />
							<input type="hidden" name="h" value="<?php echo $image[2]; ?>" />
							<input type="hidden" name="w" value="<?php echo $image[1]; ?>" />
							<input type="hidden" name="thumb" value="<?php echo $image1[0]; ?>" />						
							<input type="image" src="<?php echo $image1[0]; ?>" alt="Insert Image" />
						</form>	
					   </div><?php
					}	 
			endforeach;
			?><div class='clear'></div></div><?php
			} ?>
	<div class='clear'></div></div> 
		</td>
	</tr>
	</table>
-->
	<h2>Picturesets</h2>	
	<?php do_action("sl_allslider_before_create_pictureset_block"); ?>
	<table class="form-table">
		<tr valign="top"><th scope="row">Create new Pictureset</th>
			<td>
			<form method="post" action="#">
				<input type="hidden" name="post_id" id="post_id" value="0" />
				<input type="hidden" name="action" id="action" value="allslider_handle_newid" />				
				<label for="newid">Choose a Name for your new Pictureset: </label>
				<input type="text" name="newid" id="newid" />
				<input type="submit" class="button-primary" name="new-id" value="Create new Slideshow" />
			</form>
			</td>
		</tr>
		<tr><th scope="row">Existing Picturesets</th>
		<?php if(!empty($allslider_sliders)) 
			{ ?>
			<td>
				<ul id="pictureset">
				<?php foreach((array)$allslider_sliders as $sliderid => $slid) : ?>
					<li><?php echo "<span class='exist_sliders' style='width:300px; float:left;'>$slid[name]</span>"; ?>
					<a href="?page=allslider.admin&amp;delete_pictureset=<?php echo $slid['id']; ?>" class="button"  >Delete</a></li>
				<?php $picturesets[]=$slid['name']; ?>
				<?php endforeach; ?>
			</ul>
			</td>
			<?php } else {echo "<td>No Sliders</td>"; } ?>	
		</tr>
	</table><br />
	<?php do_action("sl_allslider_after_create_pictureset_block"); ?>	
	<?php if(!empty($allslider_images)) : ?>
			<h2>Imagelist</h2>
			<?php do_action("sl_allslider_before_imagelist_form"); ?>
			<form method="post" action="options.php">
		<?php settings_fields('allslider_images'); ?>
		<p class="filters">Filter: <a href='#' class='filtertab filtertab-active' onclick='filter_list("image_entry"); return false;'>All</a> 
		<?php
		if(isset($picturesets))
			{
			foreach($picturesets as $picset)
				{
				echo "<a class='filtertab' href='#' onclick='filter_list(\"$picset\"); return false;'>$picset</a> ";
				}
			}
		?>
		</p><br />
		<ul class="JqueryUISortable">
<?php
foreach((array)$allslider_sliders as $key => $val) 
	{
	$sl_types[]=$val['name'];
	}
?>
		<?php foreach((array)$allslider_images as $image => $data) : ?>
			<li class="image_entry <?php echo $data['slider_type']; ?>">
				<input type="hidden" name="allslider_images[<?php echo $image; ?>][id]" value="<?php echo $data['id']; ?>" />
				<input type="hidden" name="allslider_images[<?php echo $image; ?>][file]" value="<?php echo $data['file']; ?>" />
				<input type="hidden" name="allslider_images[<?php echo $image; ?>][file_url]" value="<?php echo $data['file_url']; ?>" />
				<input type="hidden" name="allslider_images[<?php echo $image; ?>][thumbnail]" value="<?php echo $data['thumbnail']; ?>" />
				<input type="hidden" name="allslider_images[<?php echo $image; ?>][thumbnail_url]" value="<?php echo $data['thumbnail_url']; ?>" />
				<input type="hidden" name="allslider_images[<?php echo $image; ?>][width]" value="<?php echo $data['width']; ?>" />
				<input type="hidden" name="allslider_images[<?php echo $image; ?>][height]" value="<?php echo $data['height']; ?>" />
				<input type="hidden" name="allslider_images[<?php echo $image; ?>][type]" value="<?php echo $data['type']; ?>" />
				<input type="hidden" name="allslider_images[<?php echo $image; ?>][yid]" value="<?php if(isset($data['yid'])) { echo $data['yid']; } ?>" />
				
				<div class="lileft">
					<?php if($allslider_images[$image]['type']=="youtube")
						{
						?><img src="http://img.youtube.com/vi/<?php echo $data['yid']; ?>/0.jpg" alt="Video" width="100" /><?php
						}
						else
							if($allslider_images[$image]['type']=="html")
								{
								?><img src="<?php echo get_template_directory_uri(); ?>/images/admin/html.png" alt="HTML Code" /><?php
								}
							else
								{
								?><img src="<?php echo $data['thumbnail_url']; ?>" align="left" /><?php
								}
					?>
				</div>
				<div class="limiddle"><span class="opener"><img src="<?php echo get_template_directory_uri();?>/images/settings.png" alt="Open" /></span></div>
				<div class="liright">				
					<label for="allslider_images[<?php echo $image; ?>][slider_type]"><select id="allslider_images[<?php echo $image; ?>][slider_type]" name="allslider_images[<?php echo $image; ?>][slider_type]"   /> 
						<option></option>
						<?php for($i=0; $i<count($sl_types); $i++)
							{
							echo "<option value='$sl_types[$i]' ";
								if($sl_types[$i]==$data['slider_type']) {echo " selected "; }
							echo ">$sl_types[$i]</option>";
							}
						?>
					</select> The Pictureset</label><input type="submit" style='margin-left:30px;' class="button-primary" value="Update" />	
					<?php if( $data['width'] < 1600 ) { echo "<p><i class='icon-info allslider_info'></i>Image is only ".$data['width']." pixel width. We recommend a width of 2000px for full width slider.</p>"; } ?>				
					<div>
					<?php do_action("sl_allslider_before_attribute_list"); ?>
	
					<!--
					<label for="allslider_images[<?php echo $image; ?>][caption]">
						<input type="text" id="allslider_images[<?php echo $image; ?>][caption]" name="allslider_images[<?php echo $image; ?>][caption]" value="<?php if(isset($data["caption"])) { echo $data["caption"]; } ?>" /> 
					Captiontext</label>
					-->	

					<label for="allslider_images[<?php echo $image; ?>][image_links_to]">
						<input type="text" id="allslider_images[<?php echo $image; ?>][image_links_to]" name="allslider_images[<?php echo $image; ?>][image_links_to]" value="<?php if(isset($data['image_links_to'])) { echo $data['image_links_to']; } ?>" class="link_to"  /> Linktarget</label>
					<?php if(isset($data['heading'])) { $data['heading']=str_replace("\"","'",$data['heading']); } ?>
					<label for="allslider_images[<?php echo $image; ?>][heading]">
						<input type="text" id="allslider_images[<?php echo $image; ?>][heading]" name="allslider_images[<?php echo $image; ?>][heading]" value="<?php if(isset($data['heading'])) { echo $data['heading'];  } ?>" /> 
					First Headline</label>
					<label for="allslider_images[<?php echo $image; ?>][subheading]">
						<input type="text" id="allslider_images[<?php echo $image; ?>][subheading]" name="allslider_images[<?php echo $image; ?>][subheading]" value="<?php if(isset($data['subheading'])) { echo $data['subheading']; } ?>" /> 
					Second Headline</label>
					<label for="allslider_images[<?php echo $image; ?>][text]">
	
					<!--
					<textarea style="width:300px; height:200px;" id="allslider_images[<?php echo $image; ?>][text]" name="allslider_images[<?php echo $image; ?>][text]" ><?php if(isset($data['text'])) { echo $data['text']; } ?></textarea> 
					Text for:Piecemaker</label>
					-->

					<label for="allslider_images[<?php echo $image; ?>][pos]">
						<select id="allslider_images[<?php echo $image; ?>][pos]" name="allslider_images[<?php echo $image; ?>][pos]">
							<option></option>
							<option  value="left" <?php if(isset($data['pos']) AND $data['pos']=="left") { echo " selected "; } ?>>Left</option>
							<option value="center" <?php if(isset($data['pos']) AND $data['pos']=="center") { echo " selected "; } ?>>Center</option>
							<option value="right" <?php if(isset($data['pos']) AND $data['pos']=="right") { echo " selected "; } ?>>Right</option>
						</select> 
					Content position</label>
					<br />
					<?php if($data['type']=="youtube")
						{
						?><a href="?page=allslider.admin&amp;delete_youtube=<?php echo $image; ?>" class="button" style="float:right">Delete</a><?php
						}
						else
							{
							?><a href="?page=allslider.admin&amp;delete=<?php echo $image; ?>" class="button" style="float:right">Delete</a><?php
							}
					?>
					<?php do_action("sl_allslider_after_attribute_list"); ?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</li>
		<?php endforeach; ?>
		</ul>
		<input type="hidden" name="allslider_images[update]" value="Updated" /><input type="submit"  class="button-primary" value="Update" /> 
		</form>	
		<?php do_action("sl_allslider_after_imagelist_form"); ?>	
		</tbody>
	</table>
	<?php do_action("sl_allslider_below_imagelist"); ?>
	<?php endif; 
	}


function allslider_images_validate($input) 
	{
	foreach((array)$input as $key => $value) 
		{
		if($key != 'update') 
			{
		//	$input[$key]['file_url'] = esc_url($value['file_url']);
			$input[$key]['thumbnail_url'] = esc_url($value['thumbnail_url']);	
			if(isset($value['image_links_to']))
				{
				if($value['image_links_to'])	
					{
					$input[$key]['image_links_to'] = esc_url($value['image_links_to']);
					}
				}
			}
		}
		return $input;
	}





function allslider($type, $name,$position=null)		
	{  
	$li="";
	$liend="";
	$args="";	
	$before="";
	$after="";
	$height="300";		
	$output="";


	global $allslider_settings, $allslider_images, $slider_height;
	$slider_height=get_post_custom_values('slider_height');
	$args = wp_parse_args($args, $allslider_settings);	
	$newline = "\n"; 	

	if($position=="Content")
		{
		$width="600px";
		}

	if($type=="cycle")
		{			
		$before="<div class='slideshow_cycle'>";
		$after="</div>";
		}
	if($type=="cycle")
		{			
		echo "<div class='slideshow_cycle_container cycleslider'>"; 
		} 
	if($type=="flex")
		{
		?><div id='allslider_flex'><ul class="template_ul slides"><?php
		}
 

 	echo $before;
	$i=0;
	$thumb="";

	$thumbs=array();

 	if($type=="elastic")
		{
		echo "<div id='ei-slider' class='ei-slider'>";
		echo "<ul class='ei-slider-large template_ul'>";
		}
	if(($type=="accordion") OR ($type=="roundabout") OR ($type=="flex") OR ($type=="sly")) 
		{
	//	$li="<li>";$liend="</li>";
		}



	if( $type == "kenburns")
		{

		$kbimg = "";
		$mh = "0";

		// LOAD THE JAVASCRIPT FILE

		wp_enqueue_script( 'kenburns' );


		// CREATE THE WRAPPER

		echo "<div id='kenburns-slideshow'>";

		}


	foreach((array)$allslider_images as $image => $data) 
		{
		$i++;
		if($name==$data['slider_type'])
			{		
			echo $li;
			if($type=="bgslider")
				{ 
				echo "{image: '".$data['file_url']."'},";
				}
			if($type=="flex" OR $type=="sly")	
				{
				echo "<li><img src='".$data['file_url']."' alt='' />";
				$thumbs[]=$data['thumbnail_url'];		
				}

			if($type=="owl")	
				{
				echo "<div class=''><img src='".$data['file_url']."' alt='' />";

				echo "<div class='cycle_element_content pos".$data['pos']." slider_overlay'><div class='inner'>";
			
				if($data['heading']!="")
					{
					echo "<h2 class='bringme_in animation' data-animation='fade'><span>".$data['heading']."</span></h2>";
					}
				if($data['subheading']!="")
					{
					echo "<h3 class='bringme_in animation' data-animation='fade'><span>".$data['subheading']."</span></h3>";
					}
				if($data['image_links_to']!="")
					{
					echo "<a href='".$data['image_links_to']."'><span>".__('Read more','sevenleague')."</span></a>";
					}
				echo "</div><!-- inner --></div>";

				echo "</div>"; 	
				}

			if( $type == "kenburns" )
				{
				$kbimg .= ' "'.$data['file_url'].'", ';
				if( $mh == '0' )
					{
					$mh = $data['height'];
					}
				if( $mh > $data['height'] )
					{
					$mh = $data['height'];
					}
				}

			if(($type=="cycle") OR ($type=="nivo"))
				{
				$c_align=" align='left' ";
				if($data['type']!="html")
					{
					echo "<div class='cycle_element'><img alt='' src='".$data['file_url']."' style='' height='".$data['height']."' /><div class='cylce_element_content ex-inner slider_overlay pos_".$data['pos']."'><div class='inner'>";
					}
				if($data['type']=="html")
					{
					echo "<div class='cycle_element'>".stripslashes($data['file_url']);
					}			
				if($data['heading']!="")
					{
					echo "<h2 class='bringme_in animation' data-animation='fade'><span>".$data['heading']."</span></h2>";
					}
				if($data['subheading']!="")
					{
					echo "<h3 class='bringme_in animation' data-animation='fade'><span>".$data['subheading']."</span></h3>";
					}
				if($data['image_links_to']!="")
					{
					echo "<a href='".$data['image_links_to']."'><span>".__('Read more','sevenleague')."</span></a>";
					}
				}


			if($type=="sly")
				{
				if($data['heading']!="" OR $data['subheading']!="" OR $data['image_links_to']!="")
					{
					echo "<div class='sly_textoverlay'><div>";
					if($data['heading']!="")
						{
						echo "<h2><span>".$data['heading']."</span></h2>";
						}
					if($data['subheading']!="")
						{
							echo "<h3><span>".$data['subheading']."</span></h3>";
						}
					if($data['image_links_to']!="")
						{
						echo "<a href='".$data['image_links_to']."'><span>".__('Read more','sevenleague')."</span></a>";
						}
					echo "</div></div>";	
					}
				echo "</li>";
				}



			if(($type=="cycle") OR ($type=="nivo")) 
				{ 
				if( isset( $data['text'] ) )
					{
					echo "<p>".$data['text']."</p>"; 
					}
				echo "</div></div></div>";
				} 
			if($type=="elastic")
				{
				echo "<li><img src='".$data['file_url']."' alt='' />";
				if($data['heading']!="" OR $data['subheading']!="")
					{
					echo "<div class='ei-title'><h2>".$data['heading']."</h2><h3>".$data['subheading']."</h3></div>";
					}
				echo "</li>";
				$thumb.="<li><a href='#'><img src='".$data['thumbnail_url']."' alt='' /></a></li>";
				}
			if($type=="smooth")
				{
				echo "<a class='prettyPhoto' href='".$data['file_url']."'><img src='".$data['file_url']."' alt='' /></a>";
				}
			}
		echo $liend; 		
		} 



	if( $type == 'kenburns' )
		{
		
		// CLOSE THE WRAPPER

		echo "</div>";

		// OPTIONS 

		$kbscale = $allslider_settings["kbscale"]; 

		$kbduration = $allslider_settings["kbduration"];
	
		$kbfadespeed = $allslider_settings["kbfadespeed"]; 

		$kbrealheight = $mh * $kbscale;

		// THE JAVASCRIPT CODE

		?><script type="text/javascript"> 

		jQuery(document).ready(function() {


		    jQuery('#kenburns-slideshow').height('<?php echo $kbrealheight; ?>');
		    jQuery('#kenburns-slideshow').Kenburns({
		    	images: [
		    		<?php echo $kbimg; ?>
		    	],
		    	scale:<?php echo $kbscale; ?>,
		    	duration:<?php echo $kbduration; ?>,
		    	fadeSpeed:<?php echo $kbfadespeed; ?>,
		    	ease3d:'cubic-bezier(0.445, 0.050, 0.550, 0.950)',  
	
		    });
		});
		</script>	
		
		<?php

		}






	if($type=="flex")
		{
		echo "</ul></div>";
		echo "<div class='flex_carousel' id='flex_undernav'><ul class='template_ul slides'>";
		$output="";
		for($i=0;$i<count($thumbs);$i++)
			{
			$output.="<li><img src='".$thumbs[$i]."' alt='' /></li>";
			}
		echo $output;
		echo "</ul></div>";
		}
	if($type=="cycle")
		{			
		$before="<div class='slideshow_cycle'>";
		$after="</div>";
		}
 	echo $after;
	if($type=="cycle")
		{			 
		echo "</div>";
		}


	if($type=="cycle")
		{
		?>
		<div class='slider_overlay'>
			<ul id="cycle_nav" class='flex-control-nav flex-control-paging'>
			</ul>
			
			<a id="cycle-prev" href="#" class="fa fa-chevron-left cyclenav trans05"></a>
			<a id="cycle-next" class="fa fa-chevron-right cyclenav trans05" href="#"></a>
		
		</div>

		<script type="text/javascript">
// NEW
		jQuery(window).resize(function()
			{
			var ht = jQuery(".cycle_element").find("img").height(); 
			jQuery('.slideshow_cycle').css({height: ht},500);
			});
// NEW END
		jQuery(window).load(function()
			{
			jQuery(".cycle_element").show();
			var ht = jQuery(".cycle_element").find("img").height();
			jQuery(".cycleslider").removeClass("wait").addClass("cycle_loaded");
			jQuery('.slideshow_cycle').animate({height: ht},500);
 
			    	jQuery('.slideshow_cycle').cycle(
						{
				        		fx: "<?php echo $allslider_settings["cycle_fx"]; ?>",
				        		speed:"<?php echo $allslider_settings["cycle_speed"]; ?>",
						prev: 	"#cycle-prev",
						next:	"#cycle-next",
				        		timeout:  "<?php echo $allslider_settings["cycle_timeout"]; ?>",
				        		<?php if($allslider_settings["cycle_ponhover"]=="on") { echo " pause:true, "; } ?>
				        		<?php if($allslider_settings["cycle_autostart"]=="on") { echo " auto: true, "; } ?>  
						pager:  '#cycle_nav',      
// NEW
						slideResize: true,
						containerResize: true,
						width: '100%',
						height: 'auto',
						fit: 1,
// NEW END
	 					pagerAnchorBuilder: function(idx, slide) 
							{ 
	        						return '<li><a href="#">GO</a></li>'; 
	    						} ,	 
	   					before: beforeSlide,
						after:    slideSlider,
						});  

	
			function slideSlider(oldSlide,slide)
				{ 
				jQuery(oldSlide).removeClass("aSlide"); //.animate({'background-position-x':'50%'},50); 
				jQuery(slide).addClass("aSlide"); //.animate({'background-position-x': '100%'}, 5000); 
				var ht = jQuery(slide).find('img').height();
				if(ht)
					{
					jQuery(slide).parent().animate({height: ht});
					}
  
				var anh2 = jQuery(this).find("h2").data("animation");
				var anh3 = jQuery(this).find("h3").data("animation");
 	
				jQuery(this).find("h2").removeClass("bringme_in").addClass(anh2);
				setTimeout(function()
					{
					jQuery(this).find("h3").removeClass("bringme_in").addClass(anh3);
	 				},100);

 

				}


			function beforeSlide(oldSlide, slide)
				{
			//	jQuery(oldSlide).find("h2, h3, a").css("opacity","0");
				jQuery(oldSlide).find("h2","h3").removeAttr('class').addClass("animation");
				}
			    });
		</script>
		<?php  	
		}

	
 	if($type=="elastic")
		{
		echo "</ul>";
		echo "<ul class='ei-slider-thumbs template_ul'><li class='ei-slider-element'>Current</li>".$thumb."</ul>";
		echo "</div>";
		}
	}
 
function allslider_shortcode($atts) 
	{
	$output="";
	extract(shortcode_atts( array("type" => 'nivo' ,"name"=>''), $atts));
	$allslider_position="Content";
	$output.= allslider( $type="$type",$name="$name" ,$position="Content");
	return $output;
	}
	add_shortcode('allslider', 'allslider_shortcode');