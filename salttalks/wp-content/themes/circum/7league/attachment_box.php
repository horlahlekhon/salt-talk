<?php 
global $color_profile;
 












/////////////////////////
///////////////////////// THE ATTACHMENT META BOX
/////////////////////////

 

 
add_action( 'add_meta_boxes', 'sl_add_attachment_box' ); 

function sl_add_attachment_box() 
	{
	$post_types = get_post_types();
	foreach ( $post_types as $post_type )
		{
		if($post_type!="attachment" && $post_type!="revision" && $post_type!="nav_menu_item" )
			{
			add_meta_box( 'attachment_meta_box',  'Attached images','sl_attachment_box', $post_type,'normal','high' ); 
			}
		}
	} 
function sl_attachment_box( $post ) 
	{
	global $allslider_sliders, $slider, $options; 
	echo "<style>.meta-box-content {margin:2px; padding:8px; border:1px solid #dcdcdc; }
			.meta-box-content input[type=text] {width:100%; display:block;}
			.meta-box-content h3 {cursor:pointer; margin:0px -8px !important;}
		</style>"; 
	sevenleague_list_attached_images();	  
	}



function sevenleague_list_attached_images()
	{
	global $post;
		$args = array(
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'post_type'      => 'attachment',
		'post_parent'    => $post->ID,
		'post_mime_type' => 'image',
		'post_status'    => null,
		'numberposts'    => '1000', 
		);
		$attachments = get_posts($args);
		$i=0;
		$clear="";
		echo "<style type='text/css'>ul.inline_ul li {display:inline-block;}</style>";
		
		if ($attachments) 
			{
			?><p>Here you can see all attached images to this page / post</p><?php
			echo "<ul class='inline_ul'>";
			foreach ($attachments as $attachment) 
				{
				$i++;
				$i_url=wp_get_attachment_image_src($attachment->ID, 'icon', false, false);
				$b_url=wp_get_attachment_image_src($attachment->ID, 'screen-shot', false, false);	 
						echo "<li>	 
							<img src='".$i_url['0']."' alt='' />
						</li> ";
				}
			echo "</ul>";
			echo "<div style='clear:both'></div>";
			?><p>You can use following shortcode:</p>
				<ul>
					<li>
						<p>Shortcode gallery:<br /> [quickgallery id="<?php echo $post->ID; ?>" columns="3" count="12"]</p>
						<p><small>Note: You can change 'columns' to 2,3 or 4. Count is the number of items</small></p>
					</li>
					<li>
						<p>Attachment slider:<br /> [attachment_slider id="<?php echo $post->ID; ?>" count="12"]</p>
						<p><small>Note: Count is the number of items</small></p>
					</li>
					<?php do_action("sevenleague_attachmentbox_list_shortcodes"); ?>
				</ul>
			<?php			
			}
			else
				{
				?><p>There are 0 attached images to this page / post. Click "Add Media" button above the editor and upload some images if you want to use [quickgallery] shortcodes or the "gallery post format" for blog entries.</p><?php
				}
	}



?>