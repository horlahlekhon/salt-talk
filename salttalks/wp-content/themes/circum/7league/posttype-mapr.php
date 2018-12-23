<?php
function maps_register() 
	{  
    	$args = array(  
        	'label' => 'Maps',  
        	'singular_label' => 'Maps',  
        	'public' => true,  
        	'show_ui' => true,  
        	'capability_type' => 'post',  
        	'hierarchical' => false,  
        	'rewrite' => true,  
        	'supports' => array('title',  'thumbnail','post-types') ,
		'show_in_menu' => true  ,
		 'menu_position' => null,
       	);  
    	register_post_type( 'maps' , $args );  
	}  
	add_action('init', 'maps_register');  
 
register_taxonomy("maps-category", array("maps"), array("hierarchical" => true, "label" => "Category", "singular_label" => "Maps Category", "rewrite" => true));

function maps_meta_box()
	{  
	add_meta_box("mapsInfo-meta", "Maps Options", "maps_meta_options", "maps", "normal", "core");  
	}   
	add_action("admin_init", "maps_meta_box"); 

function maps_meta_options()
	{  
	global $post;  
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
	$custom = get_post_custom($post->ID);  
		
	if(isset($custom["pointer"][0]))
		{
		$pointer=$custom["pointer"][0]; 
		$pointer=unserialize("$pointer");
		}
	if(isset($custom["pointerx"][0]))
		{
		$pointerx=$custom["pointerx"][0]; 
		$pointerx=unserialize("$pointerx");
		}
	if(isset($custom["pointery"][0]))
		{
		$pointery=$custom["pointery"][0]; 
		$pointery=unserialize("$pointery");
		}
	if(isset($custom["pointerh"][0]))
		{
		$pointerh=$custom["pointerh"][0]; 
		$pointerh=unserialize("$pointerh");
		}
	if(isset($custom["pointerp"][0]))
		{
 		$pointerp=$custom["pointerp"][0]; 
		$pointerp=unserialize("$pointerp");
		}
	if(isset($custom["pointerref"][0]))
		{
 		$pointerref=$custom["pointerref"][0]; 
		$pointerref=unserialize("$pointerref");
		}
	if(isset($custom["pointer_style"][0]))
		{
		$pointer_style=$custom["pointer_style"][0]; 
		$pointer_style=unserialize("$pointer_style");	
		}
	if(isset($custom["pointer_target"][0]))
		{
		$pointer_target=$custom["pointer_target"][0]; 
		$pointer_target=unserialize("$pointer_target");
		}
	if(isset($custom["pointer_lb"][0]))
		{
		$pointer_lb=$custom["pointer_lb"][0]; 
		$pointer_lb=unserialize("$pointer_lb");	
		}
	if(isset($custom["pointer_fx"][0]))
		{
		$pointer_fx=$custom["pointer_fx"][0]; 
		$pointer_fx=unserialize("$pointer_fx");	
		}
	if(isset($custom["pointerid"][0]))
		{
		$pointerid=$custom["pointerid"][0]; 
		$pointerid=unserialize("$pointerid");	
		}
	if(isset($custom["pointercol1"][0]))
		{
		$pointercol1=$custom["pointercol1"][0]; 
		$pointercol1=unserialize("$pointercol1");
		}
	if(isset($custom["pointercol2"][0]))
		{
		$pointercol2=$custom["pointercol2"][0]; 
		$pointercol2=unserialize("$pointercol2");
		}
	if(isset($custom["pointercol3"][0]))
		{
		$pointercol3=$custom["pointercol3"][0]; 
		$pointercol3=unserialize("$pointercol3");
		}
	if(isset($custom["pathx"][0]))
		{
		$pathx=$custom["pathx"][0];
		$pathx=unserialize("$pathx");
		}
	if(isset($custom["pathy"][0]))
		{
		$pathy=$custom["pathy"][0];
		$pathy=unserialize("$pathy");
		}
	if(isset($custom["path_ease"][0]))
		{
		$path_ease=$custom["path_ease"][0];
		$path_ease=unserialize("$path_ease");
		}
	if(isset($custom["pathd"][0]))
		{
		$pathd=$custom["pathd"][0];
		$pathd=unserialize("$pathd");
		}
	if(isset($custom["eyecatcher"][0]))
		{
		$eyecatcher=$custom["eyecatcher"][0];
		$eyecatcher=unserialize("$eyecatcher");
		}
	if(isset($custom["pathp"][0]))
		{
		$pathp=$custom["pathp"][0];
		$pathp=unserialize("$pathp");
		}
	if(isset($custom["pathpins"][0]))
		{
		$pathpins=$custom["pathpins"][0];
		$pathpins=unserialize("$pathpins");
		}
	if(isset($custom["maxzoom"][0]))
		{
		$maxzoom=$custom["maxzoom"][0];
		}
	if(isset($custom["map_dark"][0]))
		{
		$map_dark=$custom["map_dark"][0];
		}
	if(isset($custom["map_caption"][0]))
		{
		$map_caption=$custom["map_caption"][0];
		}
	if(isset($custom["o_color1"][0]))
		{
		$o_color1=$custom["o_color1"][0];
		}
	if(isset($custom["o_color2"][0]))
		{
		$o_color2=$custom["o_color2"][0];
		}
	if(isset($custom["path_change"][0]))
		{
		$path_change=$custom["path_change"][0];
		}
	?>  
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/jquery-ui.css" />
	<?php $img = wp_get_attachment_url( get_post_thumbnail_id($post->ID));  
		if($img=="")
		{
		echo "<div class='error'><h4>Please Upload a Image (set Thumbnail Image), then you can set pointers to your Image</h4></div>";
		}
		else
			{			
			?><h4>Set new Pointers to your Image below:</h4>
			<div id="map_src_container">
				<img id="map_src" src="<?php echo $img; ?>" alt="Image" width="800px" />
				<?php

				$imgdata = wp_get_attachment_image_src( get_post_thumbnail_id(), "original"  );
				$imgwidth = $imgdata[1]; 
				$imgheight = $imgdata[2];
				if($imgwidth)
					{
					$ratio=800/$imgwidth;
					}
				if(isset($pointer))
					{
					if(is_array($pointer))
						{ 	
			  			$i=0;
						foreach($pointer as $key => $value)
							{ 
							?> 
							<div id='map_pointer_<?php echo $i+1; ?>'  data-pid='<?php echo $i+1; ?>' class='map_pointer map_pointer_active ' style='top: <?php echo $pointery[$i]*$ratio; ?>px; left:<?php echo $pointerx[$i]*$ratio; ?>px'><span>#<?php echo $i+1; ?></span></div> 
							<?php
							$i++;
							} 
						}
					}
				if(isset($pathx))
					{
					if(is_array($pathx))
						{ 	
			  			$i=0;
						foreach($pathx as $key => $value)
							{ 
							?> 
							<div id='map_path_<?php echo $i+1; ?>'  data-pid='<?php echo $i+1; ?>' class='map_path map_path_active ' style='top: <?php echo $pathy[$i]*$ratio; ?>px; left:<?php echo $pathx[$i]*$ratio; ?>px'><span>#<?php echo $i+1; ?></span></div> 
							<?php
							$i++;
							} 
						}
					}
				?>
			</div>
		<div class="admin-tabs">
    			<ul>
    			    <li><a href="#tabs-1">Pointer</a></li>
    			    <li><a href="#tabs-2">Paths</a></li> 
    			</ul>
    		<div id="tabs-1">
			<ul id='exist_pointers'>
			<?php
			if(isset($pointer))
			{
			if(is_array($pointer))
				{ 
		  		$if=0;
				foreach($pointer as $key => $value)
					{ 
					$if++;
					?> 
					<li id='exist_pointer_<?php echo $if; ?>' class='exist_pointer_li link' data-rid='<?php echo $if; ?>'><a  data-target='<?php echo $if; ?>' href='#'>#<?php echo $if; ?><div class='arrow'></div></a></li>

					<?php
					} 
				} 
			}	
			?>
			</ul>





			<div style="padding-left:162px">
			<table class="form-table" id="pointer_list" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<th></th>
					<!-- <th style="width:20px;">ID</th>
					<th>Pointer Headline / Text</th> 
					<th>Pointer Type</th>
					<th>Pointer links to</th> 
					<th style="min-width:200px;">Colors</th>  -->
				</tr>






			<?php
			if(isset($pointer))
			{
			if(is_array($pointer))
				{ 
		  		$i=0;
				foreach($pointer as $key => $value)
					{ 
					?> 
					<tr class="pointer_list_row" id="pointer_line_<?php echo $i+1; ?>" data-rid="<?php echo $i+1; ?>">	
						<td>
							<input name="pointer[]" type="hidden" value="<?php if(isset($pointer[$i])) { echo $pointer[$i]; } ?>" />
							<div class='pll'>Headline</div>
							<div class='plr'>
								<input class='pointer_title' name="pointerh[]" value="<?php if(isset($pointerh[$i])) { echo $pointerh[$i]; } ?>" />								 
							</div>
							<div class='pll'>Text / HTML</div>		
							<div class='plr'>
								<textarea name="pointerp[]" style="width:100%; height:100px;"><?php if(isset($pointerp[$i])) {  echo $pointerp[$i]; } ?></textarea>					<!-- </td> -->			
							</div>
							<div class='pll'>Link:</div>
							<div class='plr'>
								<input class="link_to plr_link " name="pointerref[]" type="text" value="<?php if(isset($pointerref[$i])) { echo $pointerref[$i]; } ?>" />
									<?php $cclass="unchecked"; if(isset($pointer_target[$i])) {  if($pointer_target[$i]=="on") { $cclass="checked"; }  } ?>
								<div class='plr_link'><div class="checkboxfake <?php echo $cclass; ?>"></div><input name="pointer_target[]" type="hidden" value="<?php if(isset($pointer_target[$i])) {  echo $pointer_target[$i]; } ?>" /> Open in new window</div>
									<?php $cclass="unchecked";if(isset($pointer_lb[$i])) {  if($pointer_lb[$i]=="on") { $cclass="checked"; }  } ?>	
								<div class='plr_link'><div class="checkboxfake <?php echo $cclass; ?>"></div><input name="pointer_lb[]" type="hidden"  value="<?php if(isset($pointer_lb[$i])) { echo $pointer_lb[$i]; } ?>" /> Open as Lightbox</div>
								<div class='clear'></div>
							</div>
							<div class='pll'>Colors:</div>
							<div class='plr'>
								<div>
									<input class="color{required:false, hash:true,pickerClosable:true, adjust:false}" name="pointercol1[]" value="<?php if(isset($pointercol1[$i])) { echo $pointercol1[$i]; } ?>" /> Text Background
								</div>
								<div>
									<input class="color{required:false, hash:true,pickerClosable:true, adjust:false}" name="pointercol2[]" value="<?php if(isset($pointercol2[$i])) { echo $pointercol2[$i]; } ?>" /> Text Color
								</div>
								<div>
									<input class="color{required:false, hash:true,pickerClosable:true, adjust:false}" name="pointercol3[]" value="<?php if(isset($pointercol3[$i])) { echo $pointercol3[$i]; } ?>" /> Pin Background
								</div>
							</div>
							<div class='pll'>Coordinates:</div>
							<div class='plr'>
						    		<div class='plr_link'><span>X:</span><input type="text" class="posx" name="pointerx[]" value="<?php if(isset($pointerx[$i])) {  echo $pointerx[$i]; } ?>" /></div>
								<div class='plr_link'><span>Y:</span><input type="text" class="posy" name="pointery[]" value="<?php if(isset($pointery[$i])) { echo $pointery[$i]; } ?>" /></div>
								<div class='clear'></div>
							</div>
							<div class='pll'>Styles:</div>
							<div class='plr'>
 								<div>
									<select name="pointer_style[]">	
										<option></option>
										<option value="arrow" <?php if(isset($pointer_style[$i])) { if($pointer_style[$i]=="arrow") { echo " selected "; } } ?>>Arrow</option>
										<option value="textfield" <?php if(isset($pointer_style[$i])) { if($pointer_style[$i]=="textfield") { echo " selected "; } }?>>Textfield</option>
										<option value="photo" <?php if(isset($pointer_style[$i])) { if($pointer_style[$i]=="photo") { echo " selected "; } }?>>Photo</option>
										<option value="plus" <?php if(isset($pointer_style[$i])) { if($pointer_style[$i]=="plus") { echo " selected "; } } ?>>Plus</option>
										<option value="link" <?php if(isset($pointer_style[$i])) { if($pointer_style[$i]=="link") { echo " selected "; } } ?>>Link</option>	
										<option value="pointer" <?php if(isset($pointer_style[$i])) { if($pointer_style[$i]=="pointer") { echo " selected "; } } ?>>Pointer</option>
										<option value="gps" <?php if(isset($pointer_style[$i])) { if($pointer_style[$i]=="gps") { echo " selected "; } } ?>>GPS</option>
										<option value="pop" <?php if(isset($pointer_style[$i])) { if($pointer_style[$i]=="pop") { echo " selected "; } } ?>>Pop out</option>
										<option value="loupe" <?php if(isset($pointer_style[$i])) { if($pointer_style[$i]=="loupe") { echo " selected "; } } ?>>Magnifier</option>
									</select>
								</div>
							</div>
							<div class='pll'>Effect:</div>
							<div class='plr'>
 								<div>
									<select name="pointer_fx[]">	
										<option></option>
										<?php echo "<!-- ".$pointer_fx[$i]. " -->" ?>
										<option value="fadein" <?php if(isset($pointer_fx[$i])) {  if($pointer_fx[$i]=="fadein") { echo " selected "; } } ?>>Fade in</option>
										<option value="falldown" <?php if(isset($pointer_fx[$i])) {  if($pointer_fx[$i]=="falldown") { echo " selected "; } } ?>>Fall down</option>
										<option value="slideup" <?php if(isset($pointer_fx[$i])) {  if($pointer_fx[$i]=="slideup") { echo " selected "; } }?>>Slide up</option>
										<option value="slideleft" <?php if(isset($pointer_fx[$i])) {  if($pointer_fx[$i]=="slideleft") { echo " selected "; } } ?>>Slide left</option>
										<option value="slideright" <?php if(isset($pointer_fx[$i])) {  if($pointer_fx[$i]=="slideright") { echo " selected "; } } ?>>Slide right</option>
										<option value="skrewin" <?php if(isset($pointer_fx[$i])) {  if($pointer_fx[$i]=="skrewin") { echo " selected "; } } ?>>Rotate</option>
										<option value="popin" <?php if(isset($pointer_fx[$i])) {  if($pointer_fx[$i]=="popin") { echo " selected "; } }?>>Pop in</option>
									</select>
								</div>
							</div>
							<div class='pll'>Eyecatcher:</div>
							<div class='plr'>
 								<div>
									<select name="eyecatcher[]">
										<option></option>
										<option value="eye_updown" <?php if(isset($eyecatcher[$i])) {  if($eyecatcher[$i]=="eye_updown") { echo " selected "; } } ?>>Up-Down</option>
										<option value="eye_anim2" <?php if(isset($eyecatcher[$i])) {  if($eyecatcher[$i]=="eye_anim2") { echo " selected "; } } ?>>Shake left right</option>
										<option value="eye_anim3" <?php if(isset($eyecatcher[$i])) {  if($eyecatcher[$i]=="eye_anim3") { echo " selected "; } }?>>Flickering</option>
									</select> 
								</div>
							</div>
							<div class='pll'>Delete:</div>
							<div class='plr'>
								 <a href='#' class="delete_pointer">X</a>
							</div>
							<div class="clear"></div>				
						</div>
						</td>
					</tr>
					<?php
					$i++;
					} 
				} 
			}
			?></table>
			</div>
			<div class="clear"></div>
			<a href='#' class="button-primary" id='add_more_pointer'> + Add one more Pointer</a>
		</div>
		<div id="tabs-2">
			<table class="form-table" id="path_list" width="100%" cellpadding="0" cellspacing="0">
				<th style="width:20px;">Delete</th>				
				<th>Animation Speed</th>
				<th>Start after Milliseconds</th>
				<th>Pins to load on "pathafter", seperate with ","</th>
				<th>Easing</th>
			<?php
			if(isset($pathx))
				{
				if(is_array($pathx))
					{ 
			  		$i=0;
					foreach($pathx as $key => $value)
						{ 
						?> 
						<tr class="path_list_row" id="path_line_<?php echo $i+1; ?>" data-rid="<?php echo $i+1; ?>">	
							<td class="delete_path">X</td>
							<td><input type="hidden" name="pathx[]" class="pox" value="<?php if(isset($pathx[$i])) { echo $pathx[$i]; } ?>" />
							<input type="hidden" name="pathy[]" class="poy" value="<?php if(isset($pathy[$i])) { echo $pathy[$i]; }  ?>" /> 
							<input name="pathd[]" value="<?php if(isset($pathd[$i]))  { echo $pathd[$i]; } ?>" /></td> 
							<td><input name="pathp[]" value="<?php if(isset($pathp[$i])) { echo $pathp[$i]; } ?>" /></td> 
							<td><input name="pathpins[]" value="<?php if(isset($pathpins[$i])) { echo $pathpins[$i]; } ?>" /></td> 
							<?php if(isset($path_ease[$i]))
								{
								$pathease=$path_ease[$i];
								}
								else
									{
									$pathease="";
									}
							?>
							<td><select name="path_ease[]">
								<option></option> 
								<option <?php if($pathease=="linear") { echo " selected "; } ?>>linear</option>
								<option <?php if($pathease=="swing") { echo " selected "; } ?>>swing</option>
								<option <?php if($pathease=="jswing") { echo " selected "; } ?>>jswing</option>
								<option <?php if($pathease=="easeInQuad") { echo " selected "; }  ?>>easeInQuad</option>
								<option <?php if($pathease=="easeInCubic") { echo " selected ";  } ?>>easeInCubic</option>
								<option <?php if($pathease=="easeInQuart") { echo " selected ";  } ?>>easeInQuart</option>
								<option <?php if($pathease=="easeInQuint") { echo " selected ";  } ?>>easeInQuint</option>
								<option <?php if($pathease=="easeInSine") { echo " selected ";  } ?>>easeInSine</option>
								<option <?php if($pathease=="easeInExpo") { echo " selected ";  } ?>>easeInExpo</option>
								<option <?php if($pathease=="easeInCirc") { echo " selected ";  } ?>>easeInCirc</option>
								<option <?php if($pathease=="easeInElastic") { echo " selected ";  } ?>>easeInElastic</option>
								<option <?php if($pathease=="easeInBack") { echo " selected ";  } ?>>easeInBack</option>
								<option <?php if($pathease=="easeInBounce") { echo " selected "; }  ?>>easeInBounce</option>
								<option <?php if($pathease=="easeOutQuad") { echo " selected "; }  ?>>easeOutQuad</option>
								<option <?php if($pathease=="easeOutCubic") { echo " selected "; }  ?>>easeOutCubic</option>
								<option <?php if($pathease=="easeOutQuart") { echo " selected "; }  ?>>easeOutQuart</option>
								<option <?php if($pathease=="easeOutQuint") { echo " selected "; }  ?>>easeOutQuint</option>
								<option <?php if($pathease=="easeOutSine") { echo " selected "; }  ?>>easeOutSine</option>
								<option <?php if($pathease=="easeOutExpo") { echo " selected "; }  ?>>easeOutExpo</option>
								<option <?php if($pathease=="easeOutCirc") { echo " selected ";  } ?>>easeOutCirc</option>
								<option <?php if($pathease=="easeOutElastic") { echo " selected "; }  ?>>easeOutElastic</option>
								<option <?php if($pathease=="easeOutBack") { echo " selected "; }  ?>>easeOutBack</option>
								<option <?php if($pathease=="easeOutBounce") { echo " selected "; }  ?>>easeOutBounce</option>
								<option <?php if($pathease=="easeInOutQuad") { echo " selected "; }  ?>>easeInOutQuad</option>
								<option <?php if($pathease=="easeInOutCubic") { echo " selected "; }  ?>>easeInOutCubic</option>		
								<option <?php if($pathease=="easeInOutQuart") { echo " selected "; }  ?>>easeInOutQuart</option>
								<option <?php if($pathease=="easeInOutQuint") { echo " selected "; }  ?>>easeInOutQuint</option>	
								<option <?php if($pathease=="easeInOutSine") { echo " selected "; }  ?>>easeInOutSine</option>	
								<option <?php if($pathease=="easeInOutExpo") { echo " selected "; }  ?>>easeInOutExpo</option>
								<option <?php if($pathease=="easeInOutCirc") { echo " selected "; }  ?>>easeInOutCirc</option>
								<option <?php if($pathease=="easeInOutElastic") { echo " selected "; }  ?>>easeInOutElastic</option>	
								<option <?php if($pathease=="easeInOutBack") { echo " selected "; }  ?>>easeInOutBack</option>
								<option <?php if($pathease=="easeInOutBounce") { echo " selected "; }  ?>>easeInOutBounce</option>
								</select>
							</td>
						</tr>
						<?php
						$i++;
						} 
					} 
				}
			?></table>
			<a href='#' id='add_more_path' class="button-primary"> + Add one more Pathpointer</a>
		</div>
		</div><!-- tabs-->
			<h4>Settings</h4>
			<label for="maxzoom">Maximal Zoom in % for this Map: <input id="maxzoom" name="maxzoom" value="<?php if(isset($maxzoom)) { echo $maxzoom; } ?>" /> % (Default: 50%)</label>
			<?php $cclass="unchecked"; if(isset($map_dark)) { if($map_dark=="on") { $cclass="checked"; } } ?>	
			<div class="clear"></div><p></p> 
			<div class="checkboxfake <?php echo $cclass; ?>"></div><input name="map_dark" type="hidden"  value="<?php if(isset($map_dark)) { echo $map_dark; } ?>" /> Turn of the Lights when hover a Pin? 
			<div class="clear"></div>	
			<label for="map_caption">Caption / Description for this Map:
			<textarea name="map_caption" id="map_caption" style="width:100%; height:150px"><?php if(isset($map_caption)) { echo $map_caption; } ?></textarea>
			</label>
			<label for="o_color1">Caption / Overlay Background Color: </label><input class="color{required:false, hash:true,pickerClosable:true, adjust:false}" name="o_color1" value="<?php if(isset($o_color1)) { echo $o_color1; } ?>" />
			<label for="o_color2">Caption / Overlay Background Color: </label><input class="color{required:false, hash:true,pickerClosable:true, adjust:false}" name="o_color2" value="<?php if(isset($o_color2)) { echo $o_color2; } ?>" />
			<p>&nbsp;</p>
			<label for="path_change">Change into the next Map after millisecondes: </label><input id="path_change" name="path_change" value="<?php if(isset($path_change)) { echo $path_change; } ?>" />
			
			<div class="clear"></div>		
			<?php } ?>
<script type="text/javascript">
jQuery(document).ready(function($)
	{
	var ease_select="<select name='path_ease[]'><option></option><option>linear</option><option>swing</option><option>jswing</option><option>easeInQuad</option><option>easeInCubic</option><option>easeInQuart</option><option>easeInQuint</option><option>easeInSine</option><option>easeInExpo</option><option>easeInCirc</option><option>easeInElastic</option><option>easeInBack</option><option>easeInBounce</option><option>easeOutQuad</option><option>easeOutCubic</option><option>easeOutQuart</option><option>easeOutQuint</option><option>easeOutSine</option><option>easeOutExpo</option><option>easeOutCirc</option><option>easeOutElastic</option><option>easeOutBack</option><option>easeOutBounce</option><option>easeInOutQuad</option><option>easeInOutCubic</option><option>easeInOutQuart</option><option>easeInOutQuint</option><option>easeInOutSine</option><option>easeInOutExpo</option><option>easeInOutCirc</option><option>easeInOutElastic</option><option>easeInOutBack</option><option>easeInOutBounce</option></select>";

	jQuery(".map_pointer, .map_path").draggable();
	jQuery("#add_more_path").click(function()
		{
		var n2_id= $('#path_list tr').length;
		var one_more2='<tr class="pointer_list_row" id="path_line_'+n2_id+'" data-rid="'+n2_id+'"><td class="delete_path">X</td><td><input name="pathx[]" type="hidden" class="pox"/><input type="hidden" name="pathy[]" class="poy" /><input name="pathd[]" /></td><td><input name="pathp[]" /></td></td><td><input name="pathpins[]" /></td><td>'+ease_select+'</td></tr>';										
		jQuery("#path_list").append(one_more2);
		jQuery(".map_path").removeClass("map_path_active");
		jQuery("#map_src_container").append("<div id='map_path_"+n2_id+"' data-pid='"+n2_id+"' class='map_path map_path_active'><span>#"+n2_id+"</span></div>");
		jQuery(".map_path").draggable(); 
		return false;
		});
	jQuery(".delete_path").live("click",(function()
		{
		jQuery(this).parent().remove();
		})
		);
	jQuery("#path_list tr").live("hover",function()
		{
		jQuery(".path_list_row").removeClass("path_list_row_active");
		jQuery(".map_path").removeClass("map_path_active");
		var tid=jQuery(this).data("rid");
		jQuery("#map_path_"+tid).addClass("map_path_active");
		});
	jQuery(".map_path").live("hover",function()
		{
		jQuery(".map_path").removeClass("path_list_row_active");
		jQuery(this).addClass("map_path_active");
		var poid=jQuery(this).data("pid");
		jQuery(".path_list_row").removeClass("path_list_row_active");
		jQuery("#path_line_"+poid).addClass("path_list_row_active");
		}); 
 	jQuery(".map_path").live("click, mousemove, mousedown, mouseup", function(e) 
		{  
		jQuery(".map_path_active").removeClass("map_path_active");
		jQuery(this).addClass("map_path_active");
		var mcs=jQuery("#map_src_container").offset();
		var mcs1=mcs.top;
		var mcs2=mcs.left; 
		var x = e.pageX - mcs2;
    		var y = e.pageY - mcs1;
		var pid=jQuery(this).data("pid");  
		<?php if(isset($ratio))
			{
			?>
			x=Math.round(x /<?php echo $ratio; ?>,2);
			y=Math.round(y /<?php echo $ratio; ?>,2);  
			document.getElementById("path_line_1").style.display.none;
			jQuery("#path_line_"+pid).find('.pox').val(x);
			jQuery("#path_line_"+pid).find('.poy').val(y);
			<?php }
			?>
		});
	jQuery("#add_more_pointer").click(function()
		{
		var n_id= $('#pointer_list tr').length;
		var one_more='<tr class="pointer_list_row" id="pointer_line_'+n_id+'" data-rid="'+n_id+'"><td class="delete_pointer">X</td><td>'+n_id+'<input type="hidden" name="pointerid[]" value="'+n_id+'" /></td><td><input name="pointer[]" type="hidden" /><input name="pointerh[]"/><textarea name="pointerp[]"></textarea></td><td class="dbl-td">'
						+'<select name="pointer_style[]"><option></option><option value="arrow">Arrow</option><option value="textfield">Textfield</option><option value="photo">Photo</option><option value="plus">Plus</option><option value="link">Link</option><option value="pointer">Pointer</option><option value="gps">GPS</option><option value="pop">Pop out</option><option value="loupe">Magnifier</option></select>'
						+'<div class="cbf"><select name="pointer_fx[]"><option></option><option value="fadein">Fade in</option><option value="falldown">Fall down</option><option value="slideup">Slide up</option><option value="slideleft">Slide left</option><option value="slideright">Slide right</option><option value="skrewin">Skrew in</option><option value="popin">Pop in</option></select>'
						+'<select name="eyecatcher[]"><option></option><option value="eye_updown">Up-Down</option><option value="eye_anim2">Shake left right</option><option value="eye_anim3">Flackern</option></select>'
						+'<span>X:</span><input type="text" class="posx" name="pointerx[]" /><br /><span>Y:</span><input type="text" class="posy" name="pointery[]" /></div></td><td><input name="pointerref[]" />'
						+'<div class="clear"></div><div class="cbf"><div class="checkboxfake unchecked"></div><input name="pointer_target[]" type="hidden" /> New window?<div class="clear"></div><div class="checkboxfake unchecked"></div><input name="pointer_lb[]" type="hidden"  /> Lightbox?</div></td>'
						+'<td class="colorp"><input class="color{required:false, hash:true,pickerClosable:true, adjust:false}" name="pointercol1[]" /> Text Background<div class="cbf"><input class="color{required:false, hash:true,pickerClosable:true, adjust:false}" name="pointercol2[]" /> Text Color<br /><input class="color{required:false, hash:true,pickerClosable:true, adjust:false}" name="pointercol3[]" /> Pin Background</div></td></tr>';										

var one_more='<tr class="pointer_list_row" id="pointer_line_'+n_id+'" data-rid="'+n_id+'"><td><input name="pointer[]" type="hidden" /><div class="pll">Headline</div><div class="plr"><input class="pointer_title" name="pointerh[]" /></div><div class="pll">Text / HTML</div><div class="plr"><textarea name="pointerp[]" style="width:100%; height:100px;"></textarea></div>'
+'<div class="pll">Link:</div><div class="plr"><input class="link_to plr_link " name="pointerref[]" type="text"/><div class="plr_link"><div class="checkboxfake"></div><input name="pointer_target[]" type="hidden"/> Open in new window</div><div class="plr_link"><div class="checkboxfake"></div><input name="pointer_lb[]" type="hidden"  /> Open as Lightbox</div><div class="clear"></div></div>'
+'<div class="pll">Colors:</div><div class="plr"><div><input class="color{required:false, hash:true,pickerClosable:true, adjust:false}" name="pointercol1[]" /> Text Background</div><div><input class="color{required:false, hash:true,pickerClosable:true, adjust:false}" name="pointercol2[]"  /> Text Color</div><div><input class="color{required:false, hash:true,pickerClosable:true, adjust:false}" name="pointercol3[]"/> Pin Background</div></div>'
+'<div class="pll">Coordinates:</div><div class="plr"><div class="plr_link"><span>X:</span><input type="text" class="posx" name="pointerx[]"/></div><div class="plr_link"><span>Y:</span><input type="text" class="posy" name="pointery[]" /></div><div class="clear"></div></div>'
+'<div class="pll">Styles:</div><div class="plr"><div><select name="pointer_style[]"><option></option><option value="arrow">Arrow</option><option value="textfield">Textfield</option><option value="photo">>Photo</option><option value="plus">Plus</option><option value="link">Link</option><option value="pointer">Pointer</option><option value="gps">GPS</option><option value="pop">Pop out</option><option value="loupe">Magnifier</option></select></div></div>'
+'<div class="pll">Effect:</div><div class="plr"><div><select name="pointer_fx[]"><option></option>	<option value="fadein">Fade in</option><option value="falldown">Fall down</option><option value="slideup">Slide up</option><option value="slideleft">Slide left</option><option value="slideright">Slide right</option><option value="skrewin">Rotate</option><option value="popin">Pop in</option></select></div></div>'
+'<div class="pll">Eyecatcher:</div><div class="plr"><div><select name="eyecatcher[]"><option></option><option value="eye_updown">Up-Down</option><option value="eye_anim2">Shake left right</option><option value="eye_anim3">Flickering</option></select></div></div>'
+'<div class="pll">Delete:</div><div class="plr"><a href="#" class="delete_pointer">X</a></div><div class="clear"></div></div></td></tr>';

		jQuery("#pointer_list").append(one_more);
		jQuery("#pointer_list tr").hide();
		jQuery(".exist_pointer_li").removeClass("selected");
		jQuery("#pointer_line_"+n_id).show();
		
		var more_li="<li id='exist_pointer_"+n_id+"' class='exist_pointer_li link' data-rid='"+n_id+"'><a  data-target='"+n_id+"' href='#'>#"+n_id+"<div class='arrow'></div></a></li>";
		jQuery("ul#exist_pointers").append(more_li);
		jQuery(".map_pointer").removeClass("map_pointer_active");
		jQuery("#map_src_container").append("<div id='map_pointer_"+n_id+"' data-pid='"+n_id+"' class='map_pointer map_pointer_active'><span>#"+n_id+"</span></div>");
		jQuery(".map_pointer").draggable();
		jQuery("#exist_pointer_"+n_id).addClass("selected");
		return false;
		});
	jQuery(".delete_pointer").live("click",(function()
		{
		var teid=jQuery(this).parent().parent().parent().data("rid");
		jQuery(this).parent().parent().parent().remove(); 
		jQuery("#exist_pointer_"+teid).remove();
		jQuery("#pointer_list tr:nth-child(2)").show();
		jQuery("#exist_pointers li:first-child").addClass("selected");
		jQuery("#map_pointer_"+teid).remove();
		return false;
		})
		);
	jQuery("#pointer_list tr").hide();
	jQuery("#pointer_list tr:nth-child(2)").show();
	jQuery("#exist_pointers li:first-child").addClass("selected");
 	jQuery(".map_pointer").live("click, mousemove, mousedown, mouseup", function(e) 	
		{  
		jQuery(".map_pointer").removeClass("map_pointer_active");
		jQuery(".map_pointer_active").removeClass("map_pointer_active");
		jQuery(this).addClass("map_pointer_active");
		var mcs=jQuery("#map_src_container").offset();
		var mcs1=mcs.top;
		var mcs2=mcs.left; 
		var x = e.pageX - mcs2;
    		var y = e.pageY - mcs1;
		var pid=jQuery(this).data("pid");
		<?php if(isset($ratio)) { ?> 
		x=Math.round(x /<?php echo $ratio; ?>,2);
		y=Math.round(y /<?php echo $ratio; ?>,2);  
		jQuery("#pointer_line_"+pid).find('.posx').val(x);
		jQuery("#pointer_line_"+pid).find('.posy').val(y);
		<?php } ?>
		}); 
	jQuery("#pointer_list tr, .exist_pointer_li").live("hover",function()
		{
		jQuery(".pointer_list_row").removeClass("pointer_list_row_active");
		jQuery(".map_pointer").removeClass("map_pointer_active");
		var tid=jQuery(this).data("rid");
		jQuery("#map_pointer_"+tid).addClass("map_pointer_active");
		});
	jQuery(".map_pointer").live("hover",function()
		{
		jQuery(".map_pointer").removeClass("map_pointer_active");
		jQuery(".map_pointer").removeClass("pointer_list_row_active");
		jQuery(this).addClass("map_pointer_active");
		var poid=jQuery(this).data("pid");
		jQuery(".pointer_list_row").removeClass("pointer_list_row_active");
		jQuery("#pointer_line_"+poid).addClass("pointer_list_row_active");
		}); 
	jQuery("#exist_pointers li a").live("click",function()
		{
		jQuery("#exist_pointers li").removeClass("selected");
		jQuery(this).parent().addClass("selected");
		jQuery(".pointer_list_row").hide();
		jQuery("#pointer_line_"+jQuery(this).data("target")).show(); 
		return false;
		});
	});
</script>
<?php  
	}  

function save_maps_meta()
	{  
	    global $post;  
	    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		{ 
		return $post_id;
		}	
		else
			{
			if(isset($_POST["pointer"]))
				{	
			    	update_post_meta($post->ID, "pointer", $_POST["pointer"]);
				} 
			if(isset($_POST["pointerx"]))
				{	
			    	update_post_meta($post->ID, "pointerx", $_POST["pointerx"]); 	
				} 
			if(isset($_POST["pointery"]))
				{
			    	update_post_meta($post->ID, "pointery", $_POST["pointery"]); 	
				} 
			if(isset($_POST["pointerh"]))
				{
			    	update_post_meta($post->ID, "pointerh", $_POST["pointerh"]); 	
				} 
			if(isset( $_POST["pointerp"]))
				{
			    	update_post_meta($post->ID, "pointerp", $_POST["pointerp"]); 
				} 
			if(isset($_POST["pointerid"]))
				{
			    	update_post_meta($post->ID, "pointerid", $_POST["pointerid"]); 	
				} 
			if(isset($_POST["pointercol1"]))
				{
			    	update_post_meta($post->ID, "pointercol1", $_POST["pointercol1"]); 	
				} 
			if(isset($_POST["pointercol2"]))
				{
			    	update_post_meta($post->ID, "pointercol2", $_POST["pointercol2"]); 
				} 
			if(isset($_POST["pointercol3"]))
				{
			    	update_post_meta($post->ID, "pointercol3", $_POST["pointercol3"]); 
				} 
			if(isset($_POST["pointer_style"]))
				{
			    	update_post_meta($post->ID, "pointer_style", $_POST["pointer_style"]); 	
				} 
			if(isset($_POST["pointerref"]))
				{
			    	update_post_meta($post->ID, "pointerref", $_POST["pointerref"]); 	
				} 
			if(isset($_POST["pointer_target"]))
				{
			    	update_post_meta($post->ID, "pointer_target", $_POST["pointer_target"]); 	
				} 
			if(isset($_POST["pointer_fx"]))
				{
			    	update_post_meta($post->ID, "pointer_fx", $_POST["pointer_fx"]); 	
				} 
			if(isset( $_POST["pointer_lb"]))
				{
			    	update_post_meta($post->ID, "pointer_lb", $_POST["pointer_lb"]); 
				} 
			if(isset($_POST["pathx"]))
				{
			    	update_post_meta($post->ID, "pathx", $_POST["pathx"]); 	
				} 
			if(isset($_POST["pathy"]))
				{
			    	update_post_meta($post->ID, "pathy", $_POST["pathy"]); 	
				} 
			if(isset( $_POST["pathd"]))
				{
			    	update_post_meta($post->ID, "pathd", $_POST["pathd"]); 	
				} 
			if(isset($_POST["pathp"]))
				{
			    	update_post_meta($post->ID, "pathp", $_POST["pathp"]); 	
				} 
			if(isset($_POST["path_change"]))
				{
			    	update_post_meta($post->ID, "path_change", $_POST["path_change"]); 	
				} 
			if(isset($_POST["pathpins"]))
				{
			    	update_post_meta($post->ID, "pathpins", $_POST["pathpins"]); 	
				} 
			if(isset($_POST["path_ease"]))
				{
			    	update_post_meta($post->ID, "path_ease", $_POST["path_ease"]); 	
				} 
			if(isset( $_POST["maxzoom"]))
				{
			    	update_post_meta($post->ID, "maxzoom", $_POST["maxzoom"]); 	
				} 
			if(isset($_POST["map_dark"]))
				{
			    	update_post_meta($post->ID, "map_dark", $_POST["map_dark"]); 	
				} 
			if(isset($_POST["map_caption"]))
				{
			    	update_post_meta($post->ID, "map_caption", $_POST["map_caption"]); 	
				} 
			if(isset($_POST["o_color1"]))
				{
				update_post_meta($post->ID, "o_color1", $_POST["o_color1"]);
				} 
			if(isset( $_POST["o_color2"]))
				{
				update_post_meta($post->ID, "o_color2", $_POST["o_color2"]);
				} 
			if(isset( $_POST["eyecatcher"]))
				{
				update_post_meta($post->ID, "eyecatcher", $_POST["eyecatcher"]);
				}

			} 
		}   
	add_action('save_post', 'save_maps_meta');  

?>