		<!-- format standart / single --> 
			<article <?php post_class(); ?> id="<?php the_id(); ?>">
			
				<?php if( !is_singular() && load_option( "blog_show_title_first" ) == "on") { ?>				
					<h3 class="h3">
						<a class="post-link" href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
					</h3> 
				<?php } ?>


				<?php if( get_post_type() ==  'post'  ) { ?>
					<?php sevenleague_post_format(get_the_id(),get_post_format());  ?> 
				<?php } elseif( !is_search() ) { ?>
					<?php sl_single_header_output(); ?>
				<?php } ?>


				<?php if( get_post_type() ==  'post' && !is_search() && load_option( "show_blog_meta" ) =="on" ) { ?>
				<div class='blogentry_aside'>
					<?php if( load_option( "show_blog_date" ) == "on" )	{ ?>
						<span class='fa fa-clock-o'></span><span class='date-j date-m '><?php the_time( get_option( 'date_format' ) ); ?></span>
					<?php } ?>
					<?php if( load_option( "show_blog_comments" ) == "on" )	{ ?>
						<span class='fa fa-comments'></span><span class='meta-comments'><?php comments_number(); ?></span>
					<?php } ?>
					<?php if( load_option( "show_blog_author" ) == "on" )	{ ?>
						<span class='fa fa-user'></span><span class='meta-author'><?php echo get_the_author(); ?></span>
					<?php } ?>
					<?php if( load_option( "show_blog_category" ) == "on" )	{ ?>
						<span class='fa fa-folder-open'></span><span class='meta-category'><?php echo str_replace('rel="category"', "",get_the_category_list(", ")); ?></span>
					<?php } ?> 
					<?php if( get_the_tags() != "" && load_option( "show_blog_tags") == "on" ) { ?>
						<span class='fa fa-tag'></span><span class='meta-tags'><?php the_tags('',', ',''); ?></span>
					<?php } ?>
					<?php if( load_option( "show_blog_share") == "on" ) { ?>
						<span class='meta-share'><span class='icon-share'></span>
							<em>
								<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><i class='icon-facebook'></i></a>
								<a target="_blank" href="https://twitter.com/home?status=https://twitter.com/home?status=<?php echo get_the_title(); ?>%20-%20<?php echo get_permalink(); ?>"/><i class='icon-twitter'></i></a>
								<a target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"><i class='icon-google-plus'></i></a>
							</em>
						</span>
					<?php } ?>
				</div>
				<?php } ?>


				<div class="post-content"> 


					<?php if( !is_singular() && load_option( "blog_show_title_first" ) != "on") { ?>				
						<h3 class="h3">
							<a class="post-link" href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
						</h3> 
					<?php } ?>


					<div class='blogentry_right'>	
						<?php
						if(is_single())
							{
							the_content();
							}
							else
								{
								if( load_option("show_blog_excerpt") == "on" )
									{
				 					the_excerpt();  
									}
									else
										{
										the_content();
										}
								} 
						?> 

					</div> 
				<?php 
				if(is_single())
					{
					wp_link_pages( array( 'before' => '<nav class="page-pagination">', 'after' => '</nav>','pagelink'         => '<span>%</span>', 'nextpagelink'     => 'Next page',	'previouspagelink' => 'Previous page') ); 
					}
				?> 
				<div class="clear"></div>
				</div>
			</article>		