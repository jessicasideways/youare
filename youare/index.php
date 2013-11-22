<?php get_header(); ?>
<?php 
  if (have_posts()) {
?>
<div class="container splash">
	<div class="row">
		<div class="col-md-12">
<?php
			if (!get_option('Y_twitter_toggle_updates')) {
?>
				<h2><?php _e('In real-time...', 'youare'); ?></h2>
				<p><?php _e('Your latest update on <a href="http://twitter.com">Twitter</a>. Go to You Are Options in your WordPress Dashboard', 'youare'); ?></p>
<?php
			} else {
				if (function_exists('get_twitter_latest_updates') && get_option('Y_twitter_toggle_updates')) {
					if (!get_option('twitter_html_header')) echo '<h2>'.__('Latest Twitter Updates', 'youare').'</h2>';
					get_twitter_latest_updates();
				}
			}
?>
		</div>
	</div>
</div> <!--end splash-->  
<div class="container content-background">
	<div class="row">
		<div id="content" class="col-md-8 col-xs-12 suffix_1">
			<?php
				while (have_posts()) {
					the_post();
			?>
			<div class="post">
				<div class="date"> <strong><?php the_time('d') ?></strong> <span><?php the_time('M') ?></span> <em><?php the_time('Y') ?></em></div>
				<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="meta"> <?php edit_post_link(__('Edit This', 'youare'),'<strong>','</strong>'); ?> <?php the_time('G:i') ?>H</div>
				<div class="entry">
 					<?php the_content(__('read more...', 'youare')); ?>
  					<p class="tag"><?php the_tags(__('Tags', 'youare').': <em>', ', ', '</em>'); ?></p>
					<div class="post-footer bold"><span class="comments"><?php comments_popup_link(__('Leave a comment', 'youare'), __('1 Comment', 'youare'), __('% Comments', 'youare')); ?></span> &middot; <?php include (TEMPLATEPATH . '/share.php'); ?></div>
				</div><!--end entry-->
			</div><!--end post-->
<?php 
				} /* rewind or continue if all posts have been fetched */
?>
			<div class="pright">
				<?php wp_pagenavi(); ?>
			</div>
<?php 
	}
?>
		</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>