<!-- single - default -->
<?php 

	ob_start();

	if( is_singular() ) 	
		{
		the_content(); 
		}
		else
			{
			?><h3><a href='<?php echo get_permalink(); ?>'><?php the_title(); ?></a></h3><?php
			the_excerpt();
			}

	$content = ob_get_contents();

	ob_end_clean(); 	

	$content = apply_filters( 'sl_index_single_output' , $content );

	echo $content;

?>	