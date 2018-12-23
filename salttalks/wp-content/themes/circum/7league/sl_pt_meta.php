<?php

/* POSTTYPE METABOXES */

function sl_add_pt_metabox( $in ) {

	if( is_array( $in ) ) {

		foreach( $in as $option ) {

			if( $option['type'] == 'text' ) {
			// NORMAL TEXTFIELD
				?>
				<div class='options-line'>
					<div class='options-left'>
						<label for='sl_meta_<?php echo $option['id']; ?>'><?php echo $option['title']; ?></label>
					</div>
					<div class='options-right'>
						<input type='text' name='<?php echo $option['id']; ?>' value='<?php echo sl_post_meta( $option['id'] ); ?>' >
						<p><?php echo $option['description']; ?></p>
					</div>
				</div>
				<?php
				}

			if( $option['type'] == 'textarea' ) {
			// TEXTAREA
				?>
				<div class='options-line'>
					<div class='options-left'>
						<label for='sl_meta_<?php echo $option['id']; ?>'><?php echo $option['title']; ?></label>
					</div>
					<div class='options-right'>
						<textarea style="width:100%; max-width:500px; height:200px;" name='<?php echo $option['id']; ?>'><?php echo sl_post_meta( $option['id'] ); ?></textarea>
						<p><?php echo $option['description']; ?></p>
					</div>
				</div>
				<?php
				}

			if( $option['type'] == 'checkbox' ) {
			// CHECKBOX
				$checked = ''; 
				if(sl_post_meta( $option['id'] ) == 'on' ) {
					$checked = ' checked ';
					} else {
					$checked = ' unchecked ';
				}
				?>
				<div class='options-line'>
					<div class='options-left'>
						<label for='sl_meta_<?php echo $option['id']; ?>'><?php echo $option['title']; ?></label>
					</div>
					<div class='options-right'>
						<div class="checkboxfake <?php echo $checked; ?>" ><span style="margin-left:20px;"><?php echo $option['description']; ?></span></div>
						<input type='hidden'  name='<?php echo $option['id']; ?>' value='<?php echo sl_post_meta( $option['id'] ); ?>' />						
					</div>
				</div>
				<?php
				}


			if( $option['type'] == 'dropdown' ) {
			// DROPDOWN FIELD
				?>
				<div class='options-line'>
					<div class='options-left'>
						<label for='sl_meta_<?php echo $option['id']; ?>'><?php echo $option['title']; ?></label>
					</div>
					<div class='options-right'>
						<select name='<?php echo $option['id']; ?>'>	
							<option></option>
							<?php 
							$vals = explode(",", $option['values'] );
							foreach( $vals as $v)
								{
								echo "<option value='".$v."' ";
								if( sl_post_meta( $option['id'] ) == $v ) {
									echo " selected ";
									}

								echo ">".$v."</option>";
								}
							?>
	

						</select> 
						<p><?php echo $option['description']; ?></p>
					</div>
				</div>
				<?php
				}

			}		

		}
	
	}
 

function sl_save_pt_metabox( $in ) {

	global $post;
	$post_type = get_post_type( $post );
		
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
		{ 
		return $post_id;
		}
	if( isset ( $post ) ) {
		if( is_array( $in ) ) {
	
				foreach( $in as $option ) {
			
					$cid = $option['id']; 
					if( isset( $_REQUEST[ $cid ] ) ) {
						update_post_meta($post->ID, $cid, $_POST[ $cid ]); 
						}
						else {
							delete_post_meta($post->ID, $cid );
							}
					}
				// END FOREACH
				
				}
			}

		}
		 
// GET THE VALUE OF A POST META FIELD

function sl_post_meta( $id, $before="", $after="", $cpid='' ) {
	global $post;
	if( isset( $post->ID )) {
	
		$pid = $post->ID;

		if( $cpid != "" ) {
			$pid = $cpid;
			}
	

		$m = get_post_meta( $pid , $id );
	
		if( isset ( $m[0] ) && $m[0] != "") {

			$return = $before;
			$return .= $m[0];
			$return .= $after;
			
			return $return;
			
			}



		}
	}