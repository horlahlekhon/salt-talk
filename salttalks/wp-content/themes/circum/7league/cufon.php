<?php 
$cufon_fonts=get_option("cufon_fonts");
function sevenleague_cufon_register_settings() 
	{
	}
	add_action('admin_init', 'sevenleague_cufon_register_settings');

function sevenleague_add_cufon_menu() 
	{
	add_theme_page('Fonts Upload for Cufon Replace', 'Fonts Upload', 'edit_theme_options', 'cufon', 'sevenleague_cufon_admin_page');
	}
	add_action('admin_menu', 'sevenleague_add_cufon_menu');

function sevenleague_cufon_admin_page() 
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
				sevenleague_cufon_handle_upload();
				}   
			}
		if(isset($_REQUEST['delete']))
			{
			sevenleague_cufon_delete_upload($_REQUEST['delete']);
			} 
		sevenleague_cufon_admin();
	echo '</div></div></div>
		</div></div>';
	}
 

function sevenleague_cufon_handle_upload() 
	{
	global $cufon_fonts;
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
	$overrides = array( 'test_form' => false);
	$upload = wp_handle_upload($_FILES['font'], 0);	
	$fontname=$_REQUEST['fontname'];
	extract($upload);
	$upload_dir_url = str_replace(basename($file), '', $url);

	if(strpos($type, 'javascript') === FALSE) 
		{
		unlink($file);
		echo '<div class="error" id="message"><p>Sorry, but the file you uploaded does not seem to be a valid Cufon Javascript File. Please try again.</p></div>';
		return;
		}
	$time = date('YmdHis');
	$cufon_fonts[$time] = array(
		'id' => $time,
		'file' => $file,
		'file_url' => $url,
		'name' =>$fontname
		);	
	$cufon_update['update'] = 'Added';
	update_option('cufon_fonts', $cufon_fonts);
	} 
 

function sevenleague_cufon_delete_upload($id) 
	{
	global $cufon_fonts;
	if(!isset($cufon_fonts[$id])) return;
	unlink($cufon_fonts[$id]['file']); 
	$cufon_update['update'] = 'Deleted';
	unset($cufon_fonts[$id]);
	update_option('cufon_fonts', $cufon_fonts);
	}
 

function sevenleague_cufon_update_check() 
	{
	global $cufon_update;
	if($cufon_update['update'] == 'Added' || $cufon_update['update'] == 'Deleted' || $cufon_update['update'] == 'Updated') 
		{
		echo '<div class="updated fade" id="message"><p>File(s) '.$cufon_update['update'].' Successfully</p></div>';
		unset($cufon_update['update']);
		}		
	}

function sevenleague_cufon_admin()	
	{ 
	$cufon_fonts=get_option("cufon_fonts");
	sevenleague_cufon_update_check(); ?>
 	<h1>Cufon Fonts</h1>	
	<h2>Font - Upload</h2>
	<table class="form-table">
		<tr valign="top"><th scope="row">Upload a new font</th>
			<td>
			<form enctype="multipart/form-data" method="post" action="?page=cufon">
				<input type="hidden" name="post_id" id="post_id" value="0" />
				<input type="hidden" name="action" id="action" value="wp_handle_upload" />				
				<label for="font">Select a File: </label>
				<input type="file" name="font" id="font" />
				<input type="text" name="fontname" id="fontname" /> Fontname
				<input type="submit" class="button-primary" name="html-upload" value="Upload" />
			</form>
			</td>
		</tr>
	</table><br />
	<?php if(!empty($cufon_fonts)) : ?>
			<h2>Fontlist</h2>
			<ul id="fontlist">
			<?php foreach((array)$cufon_fonts as $font => $data) : ?>
				<li class="font_entry <?php echo $data['slider_type']; ?>">
					<?php echo stripslashes($data['name']); ?>
					<a href="?page=cufon&amp;delete=<?php echo $font; ?>" class="button" style="float:right">Delete</a>	
				</li>
			<?php endforeach; ?>
			</ul> 	 
	<?php endif; 
	}

 
 