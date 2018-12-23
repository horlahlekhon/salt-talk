<?php
/* VERSION 1.1.2304151 */


add_action('admin_menu', 'sl_add_translation_page');

function sl_add_translation_page()
	{
	add_theme_page('Theme Translation' , 'Theme Translation' , 'manage_options' , "sl_translation_page" , "sl_translation_page");
	}



function sl_translation_page() {

	if( isset( $_POST['action'] ) && $_POST['action'] == 'translate' ) {

		sl_save_translation();

	}

	sl_translation_admin();
}



function sl_translation_admin() {

	require_once ( get_template_directory() . '/7league/translator_tools.php' ); 

	?><h1>Theme Translation</h1><?php

	$n = get_option('sl_translation');
	$val = array();

	if( $n !="" && is_array( $n ) ) {

		foreach( $n as $k ) {
			$nk = explode( '|' , $k);
			$o = $nk[0];
			$o = str_replace( "{" , "" , $o );
			$o = str_replace( "}" , "" , $o );
			$v = $nk[1];
			$v = str_replace( "{" , "" , $v );
			$v = str_replace( "}" , "" , $v );
			$val[$o] = $v; 
	
		}

	}


	// GET THEME PATH PO FILE

	$f=get_template(); 
	
	$fi = "../wp-content/themes/".$f."/languages/sevenleague.po";
	   

	$parser = new POParser(); 
	$entries = $parser->parse( $fi );
 

	?>
	<style type="text/css">
	.sl_translation_entry {margin-bottom:30px;}
	.sl_translation_entry .translation_label {margin-bottom:4px;}
	.sl_translation_entry input[type=text] {min-width:500px;}
	</style>
	<form action='' method='post' />
	<input type='hidden' name='action' value='translate'>
	<?php 

	if( $entries !="" && is_array( $entries ) ) {

		foreach( $entries[1] as $e) {
	
			if( $e['msgid'][0] !="" ) {
	
				?><div class='sl_translation_entry'><?php
		
					$newval = "";
					$tv = $e['msgid'];
	
					if( isset( $val[$tv] ) ) {
	
						$newval = $val[$tv];
	
					}
	
					echo "<p class='translation_label'>Translation for: <strong>".$e['msgid']."</strong></p>";
					?><input type='text' name='t[<?php echo $e['msgid']; ?>]' value='<?php echo $newval; ?>' class='sl_translation_string' />
				</div>
				<?php
			}	
	
		}
	}

	?>
	<input type='submit' value='Save' />
	</form>
	<?php


}


function sl_save_translation() {

	if( current_user_can('manage_options') ) {

		$t = $_POST['t'];
	
		$n = array();
		$i = 0;
	
		foreach($t as $tl => $v) {
	 			
			$n[] = "{".$tl."}|{".$v."}";
				
			$i++; 
	
		}
	
		if( $i !="" ) {
	
			update_option( 'sl_translation' , $n );
	
		}
	
		echo "<div class='updated'><p>Translation saved</p></div>";
	} else {

		echo "<p>Sorry, you don't can't do that</p>";

	}

}





add_filter( 'gettext', 'sl_translation_filter', 10, 3 );
 
function sl_translation_filter( $in ) {

	$n = get_option('sl_translation');
	$val = array();

	if( $n !="" && is_array( $n ) ) {

		foreach( $n as $k ) {
	
			$nk = explode( '|' , $k);
	
			$o = $nk[0];
			$o = str_replace( "{" , "" , $o );
			$o = str_replace( "}" , "" , $o );
	
			$v = $nk[1];
			$v = str_replace( "{" , "" , $v );
			$v = str_replace( "}" , "" , $v );
	
			$val[$o] = $v; 
	
			if( $in == $o ) {
	
				if( $v !="" ) {
	
					$in =  $v;
				
				}
	
			}
	
		}

	}
	 
	return $in;

}


