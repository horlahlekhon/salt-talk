<?php
global $slider_shadows, $cycle_effects, $bgfx, $allslider;

$allslider_defaults=array();
$i=0;
foreach ($allslider as $value)
	{
	if(isset($value['id']) AND isset($value['std']))
		{
		$allslider_defaults[$value['id']]=$value['std'];
		}
	$i++;
	} 


$allslider_settings = get_option('allslider_settings'); 
	if(!isset($allslider_settings['installed']))
		{
		if(isset($allslider_defaults))
			{
			update_option("allslider_settings",$allslider_defaults);
			}
		}
function allslider2_register_settings() 
	{
	register_setting('allslider_settings', 'allslider_settings', 'allslider_settings_validate');
	}
	add_action('admin_init', 'allslider2_register_settings');

function add_allslider_settings_menu() 
	{
	add_theme_page('Allslider Settings', 'Allslider Settings', 'edit_theme_options', 'allslider.settings', 'allslider_settings_page');
	}
	add_action('admin_menu', 'add_allslider_settings_menu');

function allslider_settings_page() 
	{
	global $allslider_settings, $allslider_defaults; 
	echo '<div class="wrap"><h2>Allslider Settings</h2>';
	echo "<div id='poststuff' class='metabox-holder'>";
	echo "<div id='post-body' class='has-sidebar'>
		<div id='post-body-content' class='has-sidebar-content'>
		<div id='normal-sortables' class='meta-box-sortables ui-sortable'>";
	if(isset($allslider_settings['installed']))
		{
		if($allslider_settings['installed']=="")
			{
			$allslider_settings = wp_parse_args($allslider_settings, $allslider_defaults);
			} 
		}
	allslider_settings_admin_page();
	echo '</div></div></div>
		</div></div>';
	} 

function allslider_settings_update_check() 
	{
	global $allslider_settings;
	if(isset($allslider_settings['update'])) 
		{
		echo '<div class="updated fade" id="message"><p>allslider Settings <strong>'.$allslider_settings['update'].'</strong></p></div>';
		unset($allslider_settings['update']);
		update_option('allslider_settings', $allslider_settings);
		}
	}

function allslider_settings_admin()
	{
	global $fonts, $bgfx;
	allslider_settings_update_check(); ?>
	<p id="settings_filter">Filter: 
		<a href="#" style="margin-left:10px;" class="filtertab-active" onclick="filter_list1(''); return false;">All</a> 
		<a href="#" onclick="filter_list1('background'); return false;">Background Slider</a>  
	</p>
	<div class="clear"></div>
	<?php global $allslider_settings, $slider_shadows; $options = $allslider_settings; ?>
	
	<form method="post" action="options.php">
	<input type="hidden" name="allslider_settings[installed]" value="installed" />
	<?php settings_fields('allslider_settings'); ?>
	<?php global $allslider_settings, $allslider_defaults; $options = $allslider_settings; 	?>
	<div class="filters filter_background">
		<h2>Background Slideshow Settings</h2>
		<table class="form-table">
			<tr valign="top"><th scope="row">Pause on mouseover?</th>
				<td>
					<input type="checkbox" name="allslider_settings[bg_ponhover]" id="bg_ponhover" <?php if(isset($options['bg_ponhover'])) { checked('on', $options['bg_ponhover']); } ?> /> Stop Slideshow on Mouseover?<br />
				</td>
			</tr>
			<tr valign="top"><th scope="row">Autoplay?</th>
				<td>
					<input type="checkbox" name="allslider_settings[bg_autoplay]" id="bg_autoplay" <?php if(isset($options['bg_autoplay'])) { checked('on', $options['bg_autoplay']); } ?> /> Autoplay the Slideshow?
				</td>
			</tr>
			<tr valign="top"><th scope="row">Interval</th>
				<td>
					<input type="text" name="allslider_settings[bg_interval]" id="bg_interval" value="<?php if(isset($allslider_settings['bg_interval'])) { echo $allslider_settings['bg_interval']; } ?>" /> Interval in Milliseconds
				</td>
			</tr>	
			<tr valign="top"><th scope="row">Animation Speed</th>
				<td>
					<input type="text" name="allslider_settings[bg_speed]" id="bg_speed" value="<?php if(isset($allslider_settings['bg_speed'])) { echo $allslider_settings['bg_speed']; } ?>" /> Animationtime in Milliseconds
				</td>
			</tr>
			<tr valign="top"><th scope="row">Animationtype</th>
				<td>
					<select name="allslider_settings[bg_fx]" id="bg_fx" >
						<option></option>
						<?php
						$i=0;
						foreach($bgfx as $key=>$value) 
							{
							echo "<option value='".$key."'";
							if($options['bg_fx']==$key)
								{
								echo " selected ";
								}
							echo ">$value</option>";
							$i++;
							}
						?>		
					</select>
				</td>
			</tr>
		</table>
		<br /> 
		<input type="submit" class="button-primary" value="Save Settings" />
	</div>
	</form>

	<form method="post" action="options.php">
	<?php settings_fields('allslider_settings'); ?>
	<?php global $allslider_defaults; // use the defaults ?>
	<?php foreach((array)$allslider_defaults as $key => $value) : ?>
	<input type="hidden" name="allslider_settings[<?php echo $key; ?>]" value="<?php echo $value; ?>" />
	<?php endforeach; ?>
	<input type="hidden" name="allslider_settings[update]" value="RESET" />
	<input type="submit" class="button" value="Reset all (!!!) Settings" />
	</form>	
	<?php
	}










function allslider_settings_admin_page()
	{
	global $allslider, $allslider_settings, $allslider_defaults;
	?>
	<script type="text/javascript">
	jQuery(document).ready(function($) 
		{
		var actTab=1;
			if(actTab)
			{ 
			jQuery(".tabcontent").css("display","none");       	
			jQuery(".tabContainer #tab_content_"+actTab).css("display","block");       	
			} 
		}); 
	</script>
 	<div class="tabscontainer">
     		<div class="tabs">
        		<?php
 		$i=0;
	 	foreach ($allslider as $value)
	 		{
			if($value['type'] =="tab")
				{
				$i++;
				?>
        				<div class="tab <?php if($i<2) { echo " selected "; } ?>" id="tab_menu_<?php echo $i; ?>">
             				<div class="link"><?php echo $value['name']; ?></div>
             				<div class="arrow"></div>
         				</div>
				<?php
				}
			} ?>
	    	</div> <!-- tabs -->
		<form method="post" action="options.php">
	<input type="hidden" name="allslider_settings[installed]" value="installed" />
	<?php 
	settings_fields('allslider_settings'); 
	$iii=0;
	$vtabcounter=0;
	?>
    	<div class="tabContainer"><?php	
	foreach ($allslider as $value)
	 	{
		$iii++;
		switch ( $value['type'] ) 
		{
		case "tab":
			$vtabcounter++;
			?>
			<?php if($vtabcounter>1) { echo "</div> "; } ?>
			<div class="tabcontent" id="tab_content_<?php echo $vtabcounter; ?>">
			<?php
			break; 
		case "title":
			?>			
			<!--  <h2><?php echo $value['name']; ?></h2>-->
			<?php break; 
		case 'text':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="allslider_settings_<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			    <div class="options-right"><div class='clear-value'>x</div><input  name="allslider_settings[<?php echo $value['id']; ?>]" id="allslider_settings_<?php echo $value['id']; ?>" type="text" value="<?php if ( isset($allslider_settings[$value['id']]) AND  $allslider_settings[$value['id']]!= "") { echo $allslider_settings[$value['id']]; } ?>" /></div>
			</div>
			<div class="options-line2"><?php if(isset($value['desc'])) { echo $value['desc']; } ?></div>				
			<?php
			break; 
		case "checkbox":
			?>
			    <div class="options-line">
			   	 <div class="options-left"><label for="allslider_settings_<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			   	 <div class="options-right">
					<?php  
						$checked="";
						$cclass=" unchecked";
						if(isset($allslider_settings[$value['id']]) AND $allslider_settings[$value['id']]=="on")	
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
			               	<input type="hidden" name="allslider_settings[<?php echo $value['id']; ?>]" id="allslider_settings_<?php echo $value['id']; ?>" value="<?php if ( isset($allslider_settings[$value['id']]) AND  $allslider_settings[$value['id']]!= "") { echo $allslider_settings[$value['id']]; }  ?>" />
					<?php if(isset($value['desc'])) { echo $value['desc']; } ?>
			               </div>
			    </div>
				<div class="options-line2"></div>		   
			<?php         break;				
		case 'dropdown':
			?>
			<div class="options-line">
			    <div class="options-left"><label for="allslider_settings_<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
			    <div class="options-right">			
				<select name="allslider_settings[<?php echo $value['id']; ?>]" id="allslider_settings_<?php echo $value['id']; ?>"  >
					<?php
					for($i=0;$i<count($value['value']); $i++)
						{
						?><option value="<?php echo $value['value'][$i];?>"   <?php if(isset($allslider_settings[$value['id']]) AND trim($allslider_settings[$value['id']])== $value['value'][$i]){ echo " selected"; } ?>><?php echo $value['value'][$i] ; ?></option>
						<?php
						}
						?>
				</select>
				</div>
			</div>
			<div class="options-line2"><?php echo $value['desc']; ?></div>				
			<?php
			break;
		}

	}
		?>
	</div>
	</div>
	<div style="clear:both;"></div>  
	</div><!-- Tabscontainer--> 
		<p>&nbsp;</p>
		<input type="submit" class="button-primary" value="Save" />
		</form>
		<p>&nbsp;</p>
		<form method="post" action="options.php">
		<?php settings_fields('allslider_settings'); ?>
		<?php global $allslider_defaults; // use the defaults ?>
		<?php foreach((array)$allslider_defaults as $key => $value) : ?>
		<input type="hidden" name="allslider_settings[<?php echo $key; ?>]" value="<?php echo $value; ?>" />
		<?php endforeach; ?>
		<input type="hidden" name="allslider_settings[update]" value="RESET" />
		<input type="submit" class="button" value="Reset all (!!!) Settings" />
		</form>	
		<div class="clear"></div>
		<?php
	}





function allslider_settings_validate($input) 
	{
	return $input;
	}
 
 