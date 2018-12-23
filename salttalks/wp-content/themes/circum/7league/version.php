<?php
require('../../../../wp-load.php');
$addr = wp_get_theme();
$current_version = $addr->get( 'Version' );
echo $current_version;
?>