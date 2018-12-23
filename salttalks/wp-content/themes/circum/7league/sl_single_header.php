<?php
/* single_header_functions 
** Version 14042014
*/



 


function sl_single_header_metabox()
	{
	$custom = get_post_custom();
	$no="";
	if( isset( $custom["sl_single_slider_images"][0] ) )
		{
		$sl_single_slider_images = $custom["sl_single_slider_images"][0];
		}

	echo "<ul id='sl_single_slider_images_list' class=' JqueryUISortable ui-sortable'>";

	if(  isset( $sl_single_slider_images ) && $sl_single_slider_images !="" )
		{

		$sl_single_slider_images = explode("|",$sl_single_slider_images);

		for( $i=0; $i < count( $sl_single_slider_images ); $i++ )
			{

			if( $sl_single_slider_images != "" )
				{
				$img_src = wp_get_attachment_image_src( $sl_single_slider_images[$i] , 'icon'); 
				if( $img_src!="" )
					{
					echo "	<li>
							<input type='hidden' name='sl_single_slider_images[]' value='".$sl_single_slider_images[$i]."' />
							<img src='".$img_src[0]."' alt='' />
							<span class='remove_sl_slider_image'>x</span>
						</li>";	
					}
				}	
			}	


		echo "</ul>";

	

		}
		else
			{	
			echo "</ul>";
			$no = "<p id='current_no_images'>Currently there are no images in the header slider</p>";
			}



	// MEDIA UPLOADER

		wp_enqueue_media();
		wp_enqueue_script( 'custom-header' );
		?>

		<div class="uploader">
			<input class="button" name="sl_single_add_img" id="sl_single_add_img" value="+" title='Add new image' />
		</div>
		<div style="clear:both"></div>
		<?php echo $no; ?>
		<script>
		jQuery(document).ready(function($){
	
		jQuery(".remove_sl_slider_image").bind("click",function()
			{
			jQuery(this).parent().remove();
			});
		

		var _custom_media = true,
		_orig_send_attachment = wp.media.editor.send.attachment;
		$('.uploader .button').click(function(e) 
			{
			var send_attachment_bkp = wp.media.editor.send.attachment;
			var button = $(this);
//		    var id = button.attr('id').replace('_button', '');
			_custom_media = true;
			wp.media.editor.send.attachment = function(props, attachment)
				{
				if ( _custom_media ) 
					{ 
					$("#sl_single_slider_images_list").append("<li><input type='hidden' name='sl_single_slider_images[]' value='"+attachment.id+"'><img src='"+attachment.url+"' alt='' /><span class='remove_sl_slider_image'>x</span></li>"); 	
					$("#current_no_images").remove();	
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
		<?php 
	}



function sl_single_header_metabox_save()
	{
	    global $post;  
	    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		{ 
		return $post_id;
		}	
		else
			{
			if( isset( $_POST["sl_single_slider_images"] )  )
				{
				$imgs = $_POST["sl_single_slider_images"];
				$images = "";
				for( $i = 0; $i< count( $imgs ); $i++ )
					{
					$images.= $imgs[$i]."|";
					}
				update_post_meta("$post->ID", "sl_single_slider_images" ,  $images);
				}
				else
					{
					if( isset( $post ) )
						{
						delete_post_meta("$post->ID", "sl_single_slider_images");
						}
					} 
			} 
 
	}



function sl_single_header_output()
	{
	global $post;
	

	$custom = get_post_custom();
	if( isset ( $custom["sl_single_slider_images"][0] ) )
		{
		$sl_single_slider_images = $custom["sl_single_slider_images"][0];
		}

	if( isset( $sl_single_slider_images ) )
		{

		?><div class="room_slideshow_container">
		       <div>
			<div class="room_slideshow">
		<?php

		$sl_single_slider_images = explode("|",$sl_single_slider_images);
 

		for( $i=0; $i < count( $sl_single_slider_images ); $i++ )
			{
			if( trim( $sl_single_slider_images[$i] ) != "" ) 
				{  
				$img_meta=wp_get_attachment_image_src($sl_single_slider_images[$i],'full');
				$img_w=$img_meta['1'];
				$img_h=$img_meta['2'];
				$i_url=wp_get_attachment_image_src($sl_single_slider_images[$i], 'shot', false, false);
				$m_url=wp_get_attachment_image_src($sl_single_slider_images[$i], 'icon', false, false);
				$meta = wr_wp_get_attachment($sl_single_slider_images[$i]);				 
				if( $i_url[0] != "" )
					{
					echo "<div data-slicon='".$m_url['0']."'>
							<a   title='' data-gal='prettyPhoto prettyPhoto[gal]' class='prettyPhoto' href='". wp_get_attachment_url($sl_single_slider_images[$i])."'>
									<img src='".$i_url['0']."' alt=''   />";
						if($meta['caption']!="")
							{
							echo "<div class='room_image_meta'><p>".$meta['caption']."</p></div>";
							}
					echo"		</a>						
						</div>"; 
					}
				}
			}
			echo "</div><div class='clear'></div>"; 
			echo "<ul id='roomslider_nav' class='template_ul'></ul>";
			echo "<div class='clear'></div></div>";
			if($i>1)
				{
				?><a href="#" class="next room_next">Next</a><a href="#" class="prev room_prev">Prev</a><?php
				} 
			echo "</div>"; 
		}
		else
			{
			if ( has_post_thumbnail()) 
				{	
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'original');
				echo "<div class='opacity-hover-bg single-portfolio-image'>";
				echo '<a rel="prettyPhoto"  href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
				the_post_thumbnail('shot', array('class' => 'opacity-hover')); 
				echo '</a></div>';
				}
			}

	}




function sl_single_header_list_output()
	{
	global $post;
	

	$custom = get_post_custom();
	if( isset ( $custom["sl_single_slider_images"][0] ) )
		{
		$sl_single_slider_images = $custom["sl_single_slider_images"][0];
		}

	if( isset( $sl_single_slider_images ) )
		{

		?><div class="sl_single_header_list_output">
		       <div> 
		<?php

		$sl_single_slider_images = explode("|",$sl_single_slider_images);
 
		?><ul class='template_ul sl_single_header_list_output'><?php

		for( $i=0; $i < count( $sl_single_slider_images ); $i++ )
			{
			if( trim( $sl_single_slider_images[$i] ) != "" ) 
				{  
				$img_meta=wp_get_attachment_image_src($sl_single_slider_images[$i],'full');
				$img_w=$img_meta['1'];
				$img_h=$img_meta['2'];
				$i_url=wp_get_attachment_image_src($sl_single_slider_images[$i], 'shot', false, false);
				$m_url=wp_get_attachment_image_src($sl_single_slider_images[$i], 'icon', false, false);
				$meta = wr_wp_get_attachment($sl_single_slider_images[$i]);				 
				if( $i_url[0] != "" )
					{
					echo "<li><div data-slicon='".$m_url['0']."'>
							<a   title='' data-gal='prettyPhoto prettyPhoto[gal]' class='prettyPhoto' href='". wp_get_attachment_url($sl_single_slider_images[$i])."'>
									<img src='".$i_url['0']."' alt=''   />   
							</a>						
						</div>
					         </li>"; 
					}
				}
			}
			echo "</ul>";
			echo "</div><div class='clear'></div>";  
			echo "<div class='clear'></div>"; 
			echo "</div>";
		}
		else
			{
			if ( has_post_thumbnail()) 
				{	
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'original');
				echo "<div class='opacity-hover-bg single-portfolio-image'>";
				echo '<a rel="prettyPhoto"  href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
				the_post_thumbnail('shot', array('class' => 'opacity-hover')); 
				echo '</a></div>';
				}
			}

	}






















$sl_single_header_add_to = array( "clients" , "portfolio" , "post" , "team" );
 



add_action( 'save_post', 'sl_single_header_metabox_save' );
add_action( 'save_page', 'sl_single_header_metabox_save' );

add_action( 'add_meta_boxes', 'sl_add_singleheader_box' ); 

function sl_add_singleheader_box() 
	{
	global $sl_single_header_add_to;

	$sl_single_header_add_to = apply_filters( "sl_single_header_add_posttype" , $sl_single_header_add_to, 10, 3 );
	 
	foreach ( $sl_single_header_add_to as $post_type )
		{ 
		if($post_type!="post")
			{
			add_meta_box( 'sl_single_meta_box',  'Slideshow header', 'sl_single_header_metabox', $post_type,'normal','high' ); 
			}
			else
				{
				add_meta_box( 'sl_single_meta_box',  'Gallery format', 'sl_single_header_metabox', $post_type,'normal','high' ); 
				}
		
		}
	} 