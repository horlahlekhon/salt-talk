<?php
global $options;
register_sidebar( array(
		'name' => 'Left Sidebar',
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="left widget %2$s"><div>',
		'after_widget' => "</div></aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
register_sidebar( array(
		'name' => 'Right Sidebar',
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="right widget %2$s"><div>',
		'after_widget' => "</div></aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) ); 
// FOOTER SIDEBARS  
register_sidebar( array(
		'name' => 'Footer 1 Sidebar',
		'id' => 'sidebar-11',
		'before_widget' => '<aside id="%1$s" class="footer-first-sidebar widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
register_sidebar( array(
		'name' => 'Footer 2 Sidebar',
		'id' => 'sidebar-12',
		'before_widget' => '<aside id="%1$s" class="footer-second-sidebar widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
register_sidebar( array(
		'name' => 'Footer 3 Sidebar',
		'id' => 'sidebar-13',
		'before_widget' => '<aside id="%1$s" class="footer-third-sidebar widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
register_sidebar( array(
		'name' => 'Footer 4 Sidebar',
		'id' => 'sidebar-14',
		'before_widget' => '<aside id="%1$s" class="footer-fourth-sidebar widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) ); 
register_sidebar( array(
		'name' => 'Footer 5 Sidebar',
		'id' => 'sidebar-15',
		'before_widget' => '<aside id="%1$s" class="footer-fifth-sidebar widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) ); 

/* CUSTOM SIDEBARS */

$my_sidebars=load_option("sidebars");
if(isset($my_sidebars))
	{
	for( $i=0; $i<count($my_sidebars); $i++ ) 
		{
		$ix=$i+20;
		if(isset($my_sidebars[$i]))
			{
			if($my_sidebars[$i]!="")	 
				{
				register_sidebar( array(
					'name' => 'Sidebar '.$my_sidebars[$i],
					'id' => 'sidebar-'.$ix,
					'before_widget' => '<aside id="%1$s" class="'.$my_sidebars[$i].'-sidebar widget %2$s"><div>',
					'after_widget' => "</div></aside>",
					'before_title' => '<h3 class="widget-title">',
					'after_title' => '</h3>',
				) );	
				}
			}
		}
	}  
?>