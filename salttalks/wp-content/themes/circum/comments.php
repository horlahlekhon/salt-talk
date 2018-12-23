<?php
 if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
 ?>
	<div id="comments">
		<a name="comments"></a>
		<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.','sevenleague'); ?></p>

	<?php 		 
			return;
		endif;
	?>	
	</div> 
	<?php if ( have_comments() ) : ?>
		<h4 id="comments-title"><?php comments_number(); ?></h4>
			<nav class="pagination"><?php paginate_comments_links(); ?></nav><br />
				<ul class="commentlist">
					<?php wp_list_comments('callback=mytheme_comment'); ?>
				</ul> 
			<nav class="pagination"><?php paginate_comments_links(); ?></nav>
	<?php		 
	elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="nocomments"><?php _e('Comments are closed.','sevenleague'); ?></p>
<?php endif; ?>
<?php comment_form(); ?>