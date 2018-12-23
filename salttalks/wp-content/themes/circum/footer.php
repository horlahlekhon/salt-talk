
				</div>
				<?php sl_after_main(); ?>
			</section>
<?php if( load_option("show_footer") == "on" ) { ?>
				<footer id="footer" class="clear">
					<div class="<?php sl_inner('footer'); ?>">
					<div class="element-Footer" id="footer_container"> 
			<?php sl_before_footer(); ?>
			<?php sevenleague_footer_columns(); ?>
		<?php sl_after_footer(); ?>
	</div></div>			
				</footer>
			<?php }?>
<?php if( load_option("show_secondfooter	") == "on" ) { ?>
				<footer id="copyright" class="clear">
					<div class="<?php sl_inner('copyright'); ?>">
					<div class="element-SimpleFooter" id="copy_container"> 
			<?php sl_copy(); ?>
	</div><div class="element-Scrolltop block-on-mobile" id="scrolltop"> 
			<?php sl_scroll_top(); ?>
	</div></div>
				</footer>
			<?php }?>
		</div>
	</div>
<?php wp_footer(); ?>
</body>
</html>
