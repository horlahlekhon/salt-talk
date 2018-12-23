<?php  
global $preset_profiles;

function sevenleague_add_profile_menu() 
	{
		add_theme_page('Save your Theme-Settings', 'Theme Profiles', 'edit_theme_options', 'profile', 'sevenleague_profile_admin_page');
	}
	add_action('admin_menu', 'sevenleague_add_profile_menu');

function install_presets()
	{ 
	global $preset_profiles; 
	$saved_profiles=$preset_profiles; 
	update_option("theme_profiles", $saved_profiles);  
	} 
  
function sevenleague_profile_admin_page() 
	{
	echo '<div class="wrap">';
	echo "<div id='poststuff' class='metabox-holder'>";
	echo "<div id='post-body' class='has-sidebar'>
		<div id='post-body-content' class='has-sidebar-content'>
		<div id='normal-sortables' class='meta-box-sortables ui-sortable'>";
		if(isset($_REQUEST['action']))
			{
			if($_REQUEST['action'] == 'save_profile')
				{
				sevenleague_save_profile();
				}   
			if($_REQUEST['action'] == 'import_profile')
				{
				sevenleague_import_profile();
				}   
			}
		if(isset($_REQUEST['delete']))
			{
			sevenleague_delete_profile($_REQUEST['delete']);
			} 			
		if(isset($_REQUEST['profile']))
			{
			sevenleague_load_profile($_REQUEST['profile']);
			} 
		if(isset($_REQUEST['export']))
			{
			sevenleague_profile_export();
			}
		sevenleague_profile_admin();
	echo '</div></div></div>
		</div></div>';
	}

function sevenleague_import_profile()
	{
	global $options;
	if(isset($_REQUEST['input']) AND ($_REQUEST['input']!=""))
		{
		$data=stripslashes($_REQUEST['input']);
		$data=json_decode($data,true);
		$ex_profiles=get_option("theme_profiles");
		$i=0;
		foreach((array)$ex_profiles as $profile => $datt)
			{
			$i++; 
			$curr= stripslashes($datt['name']);
			$data["$curr"."_old"]=$ex_profiles[$curr];
			}
 		update_option("theme_profiles",$data);
 
		}
	}
function sevenleague_export_profile()
	{
	$data=get_option("theme_profiles");
	echo $export_data= json_encode($data);
	}
function sevenleague_profile_export()
	{
	$saved_profiles =get_option("theme_profiles");   
	echo "\$preset_profiles=array(";
	foreach($saved_profiles as $value=>$data)
		{
		echo " \"$value\"=>array(<br />";
		foreach($data as $val => $da)
			{
			echo "\"".$val."\"=>\"". htmlentities( $da ) ."\", <br />";
			if($val=="name")
				{
				echo "\"predefined\"=>\"preset\",<br />";
				}
			 }
		echo "),<br />";
		}
	echo ");";
	}

function sevenleague_delete_profile() 
	{ 
	$id=$_REQUEST['delete'];	 
	$saved_profiles =get_option("theme_profiles"); 
 	foreach($saved_profiles as $value =>$data)
		{
		if($value==$id)
			{ 
			if(!isset($data['predefined']))
				{
				unset($saved_profiles["$value"]);
				}
				else
					{
					echo "<div class='error'><p>Profile is predefined, you cant delete it.</p></div>";
					}
			}
		}
 	update_option("theme_profiles", $saved_profiles );
 	$profile_update['update'] = 'Profile deleted'; 
	} 
 

function sevenleague_save_profile() 
	{
	$i="";
	global $options;
	$saved_profiles=get_option("theme_profiles");
	if(!empty($_REQUEST['profile_name']))
		{
		$profile_name=$_REQUEST['profile_name'];
		$saved_profiles["$profile_name"]['name']=$profile_name;
		foreach ($options as $value)
			{	
			$i++;
			if(isset($value['name']))
				{
				$l=$value['name'];
				}
			if(isset($value['id']))
				{
				$id=$value['id'];
				}
			if(isset($id))
				{
				$val=get_option("$id");
				}
			if(!empty($val))
				{
				$saved_profiles["$profile_name"]["$id"]=$val;
				$saved_profiles["$profile_name"]["save_time"]=time();
				$saved_profiles["$profile_name"]["color1"]=$_REQUEST['color1'];
				$saved_profiles["$profile_name"]["color2"]=$_REQUEST['color2'];
				}
			if(isset($_REQUEST['pre']))
				{
				if($_REQUEST['pre'])
					{
					$saved_profiles["$profile_name"]["predefined"]="predefined";
					}
				}
			} 
		update_option("theme_profiles",$saved_profiles); 
		$profile_update['update'] = 'Profile saved'; 
		}
		else
			{
			echo "<div class='error'><p>ERROR: MISSING PROFILE NAME</p></div>";
			}
	}
 

function sevenleague_load_profile() 
	{
	$i="";
	$val="";	
	global $options, $shortname;
	$saved_profiles=get_option("theme_profiles");
	if(!empty($_REQUEST['profile']))
		{	
		$profile=$_REQUEST['profile']; 
		foreach ($options as $value)
			{
			$i++;	
			if(isset($value['id']))
				{
				$val=$value['id'];
				}
			if(isset($profile))
				{ 
				if(isset($saved_profiles["$profile"]["$val"]))
					{
					update_option($val,$saved_profiles["$profile"]["$val"]); 
					} 	
				} 
		}
		$profile_update['update'] = 'Profile loaded'; 	
		}
		else
			{
			echo "<div class='error'><p>ERROR: CAN NOT LOAD PROFILE. MISSING PROFILE NAME</p></div>";
			}
 
	}


function sevenleague_profile_update_check() 
	{
	global $profile_update;
	if($profile_update['update'] == 'Added' || $profile_update['update'] == 'Deleted' || $profile_update['update'] == 'Profile loaded') 
		{
		echo '<div class="updated fade" id="message"><p>File(s) '.$profile_update['update'].' Successfully</p></div>';
		unset($profile_update['update']);
		}		
	}







function sevenleague_profile_admin()	
	{  
	$profiles=get_option("theme_profiles");
	sevenleague_profile_update_check(); ?>
 	<h1>Theme Profiles</h1>	
	<h2>Save your current Settings</h2>
	<table class="form-table">
		<tr valign="top"><td> 
			<form method="post" action="?page=profile">
				<input type="hidden" name="post_id" id="post_id" value="0" />
				<input type="hidden" name="action" id="action" value="save_profile" />
				<label for="profile_name">Profilname: <input type="text" name="profile_name" id="profile_name" /></label>
				<label for="color1">Color 1: </label><input type="text" class="font-color color{required:false, hash:true,pickerClosable:true, adjust:false}" name="color1" id="color1" />
				<label for="color2">Color 2: </label><input type="text" class="font-color color{required:false, hash:true,pickerClosable:true, adjust:false}" name="color2" id="color2" />
				<input type="submit" class="button-primary" name="html-upload" value="Save" />
			</form>
			</td> 
		</tr>
	</table><br />
	<?php if(!empty($profiles)) : ?>
			<h2>Exisiting Profiles</h2>
			<table id="profilelist" class="form-table"> 
			<th> Profile Name</th><th>saved...</th><th>Load / Delete</th><th>Preview</th>
			<?php foreach((array)$profiles as $profile => $data) : ?>
				<tr>
					<td class="profile_entry" style="clear:both">
						<strong><?php echo stripslashes($data['name']);  ?></strong>
						<div class="color_prev"><div class="color_preview color_preview_first" style="background-color: <?php echo $data['color1']; ?>"></div><div class="color_preview color_preview_last" style="background-color:<?php echo $data['color2']; ?>"></div></div>
					</td>
					<td>
						<?php echo date("Y-m-d H:i:s",$data['save_time']); ?>
					</td>
					<td>
						<a href="?page=profile&amp;profile=<?php echo $profile; ?>" class="button load_profile">Load</a>
					<?php if(!isset($data['predefined'])) {  ?>	
						<a href="?page=profile&amp;delete=<?php echo $profile; ?>" class="button delete_profile">Delete</a>		
					<?php  }?>

					<td><a target='_blank' class='button' href='<?php echo home_url(); ?>?color_profile=<?php echo $profile; ?>'>Preview</a></td>
					</td>
				</tr>
			<?php endforeach; ?>
			</table> 	 
	<?php endif; 
	?>
	<h2>Import</h2>
	<form method="post" action="?page=profile">
		<input type="hidden" name="post_id" value="0" />
		<input type="hidden" name="action" value="import_profile" />
		<textarea style="width:100%; height:200px" name="input" id="input"></textarea>
		<input type="submit" value="Import Profiles" />
	</form>
	<h2>Export</h2>
	<?php
	if(isset($_REQUEST['action']) AND ($_REQUEST['action'] == 'export_profile'))
		{
		echo "<p>Please copy the following code and paste it to the 'Import' section on the desired web page</p>";
		echo "<textarea style='width:100%; height:200px;'>";
		sevenleague_export_profile(); 
		echo "</textarea>";
		}   
	?>
	<form method="post" action="?page=profile">
		<input type="hidden" name="post_id" value="0" />
		<input type="hidden" name="action" value="export_profile" /> 
		<input type="submit" value="Export Profiles" />
	</form>
 	 <?php
	}

 
 