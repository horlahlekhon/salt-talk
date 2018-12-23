<?php 
 



/*
** SHORTCODES
**/

 



function sl_blog_single_entry($atts, $content=null)
	{
	global $default_button;
	extract(shortcode_atts(array( 
	'id'=>'',   
	    ), $atts));
	$return="";  
 	$args = array( 'posts_per_page' => '1', 'p'=>$id, 'post_type'=>'post','post_status' => 'publish'); 
	$xpost = null;
	$xpost = new WP_Query($args); 
	$ix=0; 
	if( $xpost->have_posts() ) 
		{
		while ($xpost->have_posts()) : $xpost->the_post();  
		$ix++;   

		$return .= sl_load_template();


	endwhile;
	}
	wp_reset_query();  
	return $return;		
	}
	add_shortcode('post_single_entry', 'sl_blog_single_entry');

	sl_add_sccode( "Post Single Entry" , "[post_single_entry id=]" , "Blog" );




function sl_post_grid($atts, $content=null)
	{
	global $default_button;
	extract(shortcode_atts(array( 
	'items'=>'9',  
	'columns'=>'3',
	'category'=>'', 
	    ), $atts));

	$return="";

	$return.="<div  class='post-grid portfolio-itemlist-col".$columns." group-itemlist-".$columns." grid' >\n";

 	$args = array( 'posts_per_page' => $items, 'post_type'=>'post','post_status' => 'publish' , 'category' => $category ); 

	$xpost = null;
	$xpost = new WP_Query($args); 
	$ix=0;
	if( $xpost->have_posts() ) 
		{
		while ($xpost->have_posts()) : $xpost->the_post();  
		$ix++; 
		$toid=get_the_id();
		$id=$toid;

		$return .= sl_load_template(); 


	endwhile;
	}
	wp_reset_query(); 
	$return.="</div>"; 
	$return.="<div class='clear'></div>";
	return $return;		
	}
	add_shortcode('post_grid', 'sl_post_grid');

	sl_add_sccode( "Post Grid" , "[post_grid items=6 columns=3 category=]" , "Blog" );



 


///////////////////////
/////////// BLOG SORTABLE
//////////////////////




function sl_post_sortable($atts, $content = null)
	{
	extract(shortcode_atts(array(
	'items'	=>	'8',  
	'cols'	=>	'4',
	'offset'	=>	'25',

	     ), $atts));
	global $post; 
	$return=""; 
	$clear="";
	wp_enqueue_script( 'wookmark' );
	$terms = get_terms('category' );
	$count = count($terms); $i=0; 
	$term_list_gen="";
	$term_list_gen.="<ol id='filters' class='template_ol'>";
	$term_list_gen.="<li class='active' data-filter='portfolio-lists-item'><a href='#' >".__('All','sevenleague')."</a></li>";
	if ($count > 0) {
	     foreach ($terms as $term) {
	        $i++;
	    	$term_list_gen.="<li data-filter='portfolio-".$term->slug."'>";	 
		$term_list_gen.="<a href='#'  data-filter='portfolio-".$term->slug."'>".$term->name."</a>";
		$term_list_gen.="</li>";
	    }    
	} 	
	$term_list_gen.="</ol>";
	$return.= $term_list_gen; 	
	$return.="<div id='masonry' data-offset='".$offset."'>	
		<ul class='post-sortable portfolio-itemlist-col".$cols." group-itemlist-".$cols." template_ul' id='tiles'>
		";
	$ix=0; 
	query_posts(array( 'post_type' => 'post', 'paged' => get_query_var('paged'), 'posts_per_page'=>$items ));  
	if (have_posts()) : while (have_posts()) : the_post();
	$ix++;  
	$title= str_ireplace('"', '', trim(get_the_title()));
	$desc= str_ireplace('"', '', trim(get_the_content()));
	$terms = wp_get_object_terms($post->ID, 'category');
	$term_list="";
	$count = count($terms); $i=0;
	if ($count > 0) 
		{
		foreach ($terms as $term) 
			{
        			$i++;
    			$term_list .= "portfolio-$term->slug ";    	 
			}    
		}
	ob_start();
	?>
	<li class="post-list-item portfolio-lists-item <?php echo $term_list ?> <?php echo $clear; ?>"> 
		<?php echo sl_load_template(); ?>
	</li> 
	<?php
	$return.= ob_get_contents();  
    	ob_end_clean();  
	$clear="";
	if($ix>=$cols)
		{
		$ix=0;
		$clear=" clear";
		}
	endwhile; 
	endif; 
	wp_reset_query();
	$return.='	</ul> 
		</div> ';
	$return.= "<div class='clear'></div>";
	return $return;
	}
add_shortcode('post_sortable','sl_post_sortable');

sl_add_sccode( "Post Sortable" , "[post_sortable items=9 cols=3 offset=25]", "Blog" );







///////////////////////
/////////// BLOG MASONRY
//////////////////////



function sc_blog_masonry($atts, $content = null)
	{
	extract(shortcode_atts(array(
	'items'=>'8', 
	'type'=>'',
	'cols'=>'4'
	     ), $atts));
	global $post; 
	$return=""; 
	$clear="";
	wp_enqueue_script( 'wookmark' ); 
	$return.="<div id='masonry'>	
		<ul class='portfolio-itemlist-col".$cols." group-itemlist-".$cols." template_ul' id='tiles'>
		";
	$ix=0; 
	query_posts(array( 'post_type' => 'post', 'paged' => get_query_var('paged'), 'posts_per_page'=>$items ));  
	if (have_posts()) : while (have_posts()) : the_post();
	$ix++;   
	ob_start();
	?>
	<li class="portfolio-lists-item blog-masonry-entry blog-masonry-shortcode <?php echo $clear; ?>"> 
		<?php echo sl_load_template() ?>
	</li> 
	<?php
	$return.= ob_get_contents();  
    	ob_end_clean();  
	$clear="";
	if($ix>=$cols)
		{
		$ix=0;
		$clear=" clear";
		}
	endwhile; 
	endif; 
	wp_reset_query();
	$return.='	</ul> 
		</div> ';
	$return.= "<div class='clear'></div>";
	return $return;
	}
add_shortcode('blog_masonry','sc_blog_masonry');


	sl_add_sccode( "Blog Masonry" , "[blog_masonry items=8 cols=4]" , "Blog" );







/*
**
** RECENT TRACKBACKS
**
*/
function recent_trackbacks( $atts, $content = null ) 
	{ 
	extract(shortcode_atts(array(
		'before'=>'',
		'limit' => $limit,
		'after'=>''
		), $atts));
	$comments = get_comments( array('number'    => $limit,'status'    => 'approve','type' => 'trackback'));
	$return="<p>".$before."</p>";
	$return.="<ul>";	
	foreach($comments as $comment) :
		$return.="<li class='comment_shortcode'>";
		$return.="<div class='meta'>".get_avatar( $comment->comment_author_email ,12 ). " ".($comment->comment_author)."</div>";
		$return.='<p><a href=" '. get_permalink($comment->comment_post_ID).'#comment-' . $comment->comment_ID . '" rel="follow me">' . get_the_title($comment->comment_post_ID) 	. '</a>';
		$return.=": ";
		$return.=	($comment->comment_content)."</p></li>";
	endforeach;
	$return.="</ul>";
	$return.="<p>".$after."</p>";
	return $return;
	}
	add_shortcode( 'recent_trackbacks', 'recent_trackbacks' ); 

/*
**
** RANDOM TRACKBACKS
**
*/
function random_trackbacks( $atts, $content = null ) 
	{ 
	extract(shortcode_atts(array(
		'before'=>'',
		'limit' => $limit,
		'after'=>''
		), $atts));
	$comments = get_comments( array('number'    => $limit,'status'    => 'approve','type' => 'trackback'));
	$return="<p>".$before."</p>";
	shuffle($comments);
	$i=0;
	$return.="<ul>";	
	foreach($comments as $comment) :
		if($i<$limit)
			{
			$i++;
			$return.="<li class='comment_shortcode'>";
			$return.="<div class='meta'>".get_avatar( $comment->comment_author_email ,12 ). " ".($comment->comment_author)."</div>";
			$return.='<p><a href=" '. get_permalink($comment->comment_post_ID).'#comment-' . $comment->comment_ID . '" rel="follow me">' . get_the_title($comment->comment_post_ID) 	. '</a>';
			$return.=": ";
			$return.=	($comment->comment_content)."</p></li>";
			}
	endforeach;
	$return.="</ul>";
	$return.="<p>".$after."</p>";
	return $return;
	}
	add_shortcode( 'random_trackbacks', 'random_trackbacks' ); 




/*
**
** RECENT COMMENTS
**
*/
function recent_comments( $atts, $content = null ) 
	{ 
	extract(shortcode_atts(array(
		'before'=>'',
		'number' => 3,
		'after'=>''
		), $atts));
	$comments = get_comments( array('number'    => $number,'status'    => 'approve'));
	$return="<p>".$before."</p>";
	$return.="<ul>";	
	foreach($comments as $comment) :
		$return.="<li class='comment_shortcode'>";
		$return.="<div class='meta'>".get_avatar( $comment->comment_author_email ,12 ). " ".($comment->comment_author)."</div>";
		$return.='<p><a href=" '. get_permalink($comment->comment_post_ID).'#comment-' . $comment->comment_ID . '" rel="follow me">' . get_the_title($comment->comment_post_ID) 	. '</a>';
		$return.=": ";
		$return.=	($comment->comment_content)."</p></li>";
	endforeach;
	$return.="</ul>";
	$return.="<p>".$after."</p>";
	return $return;
	}
	add_shortcode( 'recent_comments', 'recent_comments' ); 


/*
**
** RANDOM COMMENTS
**
*/

function random_comments( $atts, $content = null ) 
	{ 
	extract(shortcode_atts(array(
		'before'=>'',
		'number' => 3,
		'after'=>''
		), $atts));
	$comments = get_comments( array('status'    => 'approve', ));
	$return="<p>".$before."</p>";	
	shuffle($comments);
	$i=0;
	$return.="<ul>";	
	foreach($comments as $comment) :
		if($i<$number)
			{
			$i++;
			$return.="<li class='comment_shortcode'>";
			$return.="<div class='meta'>".get_avatar( $comment->comment_author_email ,12 ). " ".($comment->comment_author)."</div>";
			$return.='<p><a href=" '. get_permalink($comment->comment_post_ID).'#comment-' . $comment->comment_ID . '" rel="follow me">' . get_the_title($comment->comment_post_ID) 	. '</a>';
			$return.=": ";
			$return.=	($comment->comment_content)."</p></li>";
			}
	endforeach;
	$return.="</ul>";
	$return.="<p>".$after."</p>";
	return $return;
	}
	add_shortcode( 'random_comments', 'random_comments' ); 




/*
**
** COMMENT SLIDER
**
*/
function commentslider( $atts, $content = null ) 
	{ 
	extract(shortcode_atts(array(
		'before'=>'',
		'number' => 3,
		'after'=>'',
		'pause'=>'3000',
		'slider'=>'true'
		), $atts));
		$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,5);	
		


		$echo="<ul class='recent_comments_widget' id='commentslider-$rand'>";
		global $wpdb, $comments, $comment;
		$comments = $wpdb->get_results("SELECT comment_author, comment_author_email, comment_author_url, comment_ID, comment_post_ID, comment_content FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $number");
		if ( $comments ) 
			{
			foreach ($comments as $comment) 
				{
				$echo.= '<li class="widget_last_comments"><div class="meta">'. get_avatar( $comment, 12 );
				$echo.= get_comment_author_link();
				$echo.=  ' | <a href="';
				$echo.= get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID . '" >';
				$echo.= get_the_title($comment->comment_post_ID) . '</a></div>' .	'<p>'. get_comment_excerpt() .'</p></li>';

				}
			}
		$echo.="</ul>";
		$echo.="<!-- SLIDER $slider -->";
		if($slider!="false")
			{
			$echo.="	<script type='text/javascript'>
				jQuery(document).ready(function(\$) {
				\$('#commentslider-$rand').cycle({ 
				    fx: 'fade',
				    timeout: '$pause',
				    speed: '1000',
				    pause: 1,
				    fit: 1
					});
				});		
				</script>";
			}
		return $echo;
	}
	add_shortcode( 'commentslider', 'commentslider' ); 







/*
**
** BLOG SHORTCODE
**
*/
function recent_blogposts($atts, $content = null)
	{
	$ccolumn="";
	extract(shortcode_atts(array(
	'title'=>'From our Blog',
	'number'=>'3',
	'column'=>'3', 
	'before'=>'',
	'after'=>'',
	'show_date'=>'true',
	'text'=>'150',
	'readmore'=>'true', 
	'image'=>'true',
	'headline'=>'true',
	 "imgsize"=>"gallery"
	    ), $atts));
	$echo="";
	$i="1";
	$z="";
	switch ($column)
		{
		case "2":
			$ccolumn="one_half";
			break;
		case "3":
			$ccolumn="one_third";
			break;
		case "4":
			$ccolumn="one_fourth";
			break;
		case "5":
			$ccolumn="one_fifth";
			break;
		}
	$echo.="<p>".html_entity_decode($before)."</p>";
	global $post;
	$args = array( 'numberposts' => $number  );
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post); 
			$z++;
				if($i==$column)		
					{
					$stoper="_last";
					$i=1;
					$stopdiv="<div class='clear'></div>";
					}
					else
						{
						$i++;
						$stoper="";	
						$stopdiv="";
						}
				$echo.= "<div class='$ccolumn$stoper shortcode_posts'>";
				if($image!="false")
					{
					if ( has_post_thumbnail() ) 
						{ 
						$echo.="<div class='widget_posts_left'>";
						$echo.="<a href='".get_permalink()."'>".get_the_post_thumbnail($post->ID,$imgsize);
						$echo.="</a></div>";
						} 
					}
				$echo.= "<div class='sc_posts_content'>";
				if($headline!="false")
					{
					?> 	
					<?php
					$echo.= "<h5><a href='".get_permalink()."'>".get_the_title()."</a></h5>";
					}
				if($show_date=="true")
					{
					$echo.= "<p class='sc_posts_date'>".get_the_date()."</p>";
					}
				$echo.= "<div>";
				$content=do_shortcode(get_the_content());
				if(($text!="0") AND ($text!=""))
					{
					if(strlen("$content")>$text)  
						{
						$content=(substr( $content, 0, strpos( $content, " ", $text )+1 ) );
						}
						$echo.="<p>".strip_tags($content)."</p>";
					}
				$echo.="<div>";
				if($readmore=="true")
					{
					$echo.="<a href='".get_permalink()."'>read more...</a>";
					}
				$echo.= "</div></div><div class='clear'></div></div>";
				$echo.= "</div>";
				$echo.= $stopdiv;
		 endforeach; 
		wp_reset_query();
	$echo.="<p>".html_entity_decode($after)."</p>";
	return $echo;		
	}
add_shortcode('recent_posts', 'recent_blogposts');










/*
**
** RANDOM POSTS
**
*/





function random_posts( $atts, $content = null ) 
	{
	extract(shortcode_atts( array("before"=>"","number" => '6'  ,'column'=>'2',"after"=>'', "text"=>"150","readmore"=>"true", "headline"=>"true", "image"=>"true",  "imgsize"=>"gallery"), $atts));
	$myargs = array('posts_per_page'      => '100', 'orderby' =>'rand'); 		
	$z=0;
	$ccolumn="";
	$i="1";
	$echo="<p>".html_entity_decode($before)."</p>"; 
	switch ($column)
		{
		case "2":
			$ccolumn="one_half";
			break;
		case "3":
			$ccolumn="one_third";
			break;
		case "4":
			$ccolumn="one_fourth";
			break;
		case "5":
			$ccolumn="one_fifth";
			break;
		}
		shuffle(query_posts($myargs));
		$echo.= "<div class='count-$number'>";
		if (have_posts()) : 
			while (have_posts()) : the_post(); 
			if($z<$number)	
				{
				$z++;
				if($i==$column)		
					{
					$stoper="_last";
					$i=1;
					$stopdiv="<div class='clear'></div>";
					}
					else
						{
						$i++;
						$stoper="";	
						$stopdiv="";
						}
				$echo.= "<div class='$ccolumn$stoper shortcode_posts'>";
				$echo.= "<div class='widget_posts_li'>";
				if($image!="false")
					{
					if ( has_post_thumbnail() ) 
						{  
						$echo.="<div class='widget_posts_left'>";
							$echo.=get_the_post_thumbnail(get_the_id(),$imgsize); 
						$echo.= "</div>";
						} 
					}
				$echo .= "<div class='sc_posts_content'>";
				if($headline!="false")
					{
					$echo.= "<a href='".get_permalink()."'><h5>".get_the_title()."</h5></a>";
					}
				$content=do_shortcode(get_the_content());
				if($text!="0")
					if((isset($content)) AND (isset($text)) AND ($text>0))
					{
					if(strlen("$content")>$text)
						{
						$content=(substr( $content, 0, strpos( $content, " ", $text )+1 ) );
						}
					$echo.= "<p>".strip_tags($content)."</p>";
					}
				if($readmore!="false")
					{
					$echo.="<a href='". get_permalink() ."'>read more...</a>";
					}
				$echo.= "</div><div class='clear'></div><div class='clear'></div></div>";
				$echo.= "</div>".$stopdiv;
				}
	 		endwhile;
			$echo.= "</div>";
		endif; 
		wp_reset_query();
		$echo.= "<p>".html_entity_decode($after)."</p>";
		return $echo;
		}
	add_shortcode('random_posts', 'random_posts');






///////////////////////
/////////// BLOG SLIDER
//////////////////////

function blogslider($atts, $content=null)
	{
	$type="";
	
	extract(shortcode_atts(array(
	'buttons'=>true,
	'speed'=>'1000',
	'width'=>'',
	'height'=>'',
	'easing'=>'',
	'items'=>'10',
	'itemsforward'=>'4',
	'pauseonhover'=>'true', 
	'direction'=>'left',
	'columns'=>'3',
	'showtext'=>'false',
	'readmore'=>'false',
	'headline'=>'false',
	'right'=>'20',
	'image'=>'false',
	'number'=>'10',
	'direction'=>'left',
	'auto'=>'false',
	'title'=>''
	    ), $atts));
	$return="";

	if($speed=="")	
		{
		$speed="1000";
		}

	$rand=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',5)),0,5);
	$return="<div id='carousel-".$rand."' class='carousel-container'>";
	$half_height=$height/2;	
	$return.="<style type='text/css' scoped><!--#".$rand." .blog-lists-item-shortcode {display:inline-block; width:".$width."px; margin-right:".$right."px;}";
	$return.=" #carousel-".$rand."  .carousel-nav {top:0px;}";
	if($height!="")
		{
		$return.=" #".$rand." {height:".$height."px;} #".$rand." li, #".$rand." > div {  height:".$height."px;}";
		}
	if($width!="")
		{
		$return.=" #".$rand." ul li, #".$rand." > div {width:".$width."px; }";
		}
	$return.="--></style>";	
	if(isset($title))
		{
		$return.="<h2>".$title."</h2>";
		}
	if($buttons=="true")
		{	
		$return.="<a id='".$rand."-prev' class='carousel-nav carousel-nav-prev' onclick='return false' href='#'>&lt;</a>
			<a id='".$rand."-next' class='carousel-nav carousel-nav-next' onclick='return false' href='#'>&gt;</a>";
		}
	$return.="<ul class='carousel template_ul' id='".$rand."'>";



	switch ($columns)
		{
		case 1: $cols=""; break;
		case 2: $cols="one_half"; break;
		case 3: $cols="one_third"; break;
		case 4: $cols="one_fourth"; break; 
		}
	if($type!="")
		{
		$args = array( 'numberposts' => $number, 'post_type'=>'post','post_status' => 'publish', 'project-type'=>$type);
		}
		else
			{
			$args = array( 'numberposts' => $number, 'post_type'=>'post','post_status' => 'publish');
			}
	$ix="";
	global $post;
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) :	setup_postdata($post);  
	$ix++; 	
	$title= str_ireplace('"', '', trim(get_the_title()));
	$desc= str_ireplace('"', '', trim(get_the_content()));			 
	$return.='	<li class="ex-'.$cols.  ' blog-lists-item-shortcode">';
	if($image=="true")
		{
		$return.='<img src="'.img_mini_url($post->ID) .'" alt="" />';
		}
	if($headline=="true")
		{
		$return.="<h5>". get_the_title()."</h5>";
		}
	if($showtext=="true")
		{	
		$return.="<p>". get_the_excerpt()."</p>";
		}
	if($readmore=="true")
		{
		$return.='<a class="team_readmore button" href="'.get_permalink().'">Read more</a>';
		}
	$return.="</li>";
	endforeach;
	wp_reset_query();
	$return.="</ul>";
	$return.="<script type='text/javascript'>
		<!--//--><![CDATA[//><!--
		jQuery(window).load(function()
			{
			jQuery('#carousel-".$rand." .carousel ').carouFredSel({
				items               	: ".$items.",
				direction           	: '".$direction."',
				";
			if($height!="")
				{
				$return.="height		: '".$height."', "; 
				}
	$return.="				
				prev		: '#".$rand."-prev',
				next		: '#".$rand."-next',";
	if($auto!="true")
		{
		$return.="
				auto :
					{
					play:	false 
					},
			";
		}
	$return.="		scroll : 
					{	";
	if($easing!="")
		{
		$return.="	easing		: '".$easing."', ";
		}
	$return.="
		            			items           : ".$itemsforward.",
		            			duration        : ".$speed.",                  
	            				pauseOnHover    : true
	        				} 
				 });
			";
	if($height!="")
		{
		$return.="			jQuery('#".$rand."').parent().height('".$height."');";
		}
	$return.="
			});
		//--><!]]>
		</script>";
	$return.="</div>";
	$return.="<div class='clear'></div>";
	return $return;		
	}
	add_shortcode('blogslider', 'blogslider');







///////////////////////
/////////// POPULAR POSTS
//////////////////////

function popular_post($atts, $content = null)
	{
	$ccolumn="";
	$echo="";
	extract(shortcode_atts( array("before"=>"","number" => '6'  ,'column'=>'2',"after"=>'', "text"=>"150","readmore"=>"true", "headline"=>"true", "image"=>"true", "imgsize"=>"gallery"), $atts));
	$z=0;
	$i=1;
	switch ($column)
		{
		case "2":
			$ccolumn="one_half";
			break;
		case "3":
			$ccolumn="one_third";
			break;
		case "4":
			$ccolumn="one_fourth";
			break;
		case "5":
			$ccolumn="one_fifth";
			break;
		}
	$myargs = array(
			'posts_per_page'      => $number,
			'orderby'     => 'comment_count',
			);
		query_posts($myargs);
		if (have_posts()) :  
			while (have_posts()) : the_post(); 
			if($z<$number)	
				{
				$z++;
				if($i==$column)		
					{
					$stoper="_last";
					$i=1;
					$stopdiv="<div class='clear'></div>";
					}
					else
						{
						$i++;
						$stoper="";	
						$stopdiv="";
						}
				
				$echo.= "<div class='$ccolumn$stoper shortcode_posts'>";
				$echo.= "<div class='widget_posts_li'>";
				if($image=="true")
					{
					if ( has_post_thumbnail() ) 
						{  
						$echo.= "<div class='widget_posts_left'>";							
							$echo.= get_the_post_thumbnail(get_the_id(),$imgsize);
						$echo.= "</div><!-- widget_posts_left-->";
						} 
					}
				$echo .= "<div class='sc_posts_content'>";
				if($headline=="true")
					{
					$echo.= "<a href='".get_permalink()."'><h5>".get_the_title()."</h5></a>";
					}
				if($text!="0")
					{
					$content=do_shortcode(get_the_content());
					if((isset($content)) AND ($text>"0"))
						{
						if(strlen("$content")>$text)
							{
							$content=(substr( $content, 0, strpos( $content, " ", $text )+1 ) );
							}
						}
					$echo.= strip_tags($content);
					}
				if($readmore=="true")
					{
					$echo.= "<a href='".get_permalink()."'>read more...</a>";
					} 
				$echo.="</div></div><div class='clear'></div>";
				}
			//$echo.= "</div>";
			$echo.= "</div>".$stopdiv;
	 		endwhile;
		endif; 
		wp_reset_query();
		return $echo;
	}
	add_shortcode('popular_post', 'popular_post');











?>