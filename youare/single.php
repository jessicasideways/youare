<?php get_header(); ?>
<div class="splash">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="date"> <strong><?php the_time('d') ?></strong> <span><?php the_time('M') ?></span> <em><?php the_time('Y') ?></em> </div>
				<h1 class="title"><?php the_title(); ?></h1>
				<p><span><?php
					$prev_post = get_previous_post();
					if($prev_post) {
						$prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
						echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class="previous">'.__('&laquo; Prev', 'youare').'</a>' . "\n";
					}

					$next_post = get_next_post();
					if($next_post) {
						$next_title = strip_tags(str_replace('"', '', $next_post->post_title));
						echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class="next">'.__('Next &raquo;', 'youare').'</a>' . "\n";
					}
				?></span> <?php edit_post_link(__('Edit This', 'youare'),'<strong>','</strong>'); ?> <?php echo _e('Posted on', 'youare'); echo " "; youare_posted_date(); ?> at <a href="<?php echo get_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link','youare'); ?>"><?php the_time('G:i'); ?>H</a> &middot; <?php _e('Topics', 'youare'); ?>: <?php the_category(', '); ?> &middot; <a href="#" onclick="javascript:print();" rel="nofollow" class="print" title="<?php _e('Print', 'youare'); ?>"><?php _e('Print', 'youare'); ?></a> </p>
			</div>
		</div>
	</div>
</div>
<div class="container content-background">
	<div class="row">
		<div id="content" class="col-md-12 col-xs-12 suffix_1">   
			<div class="single">
				<?php 
					if (have_posts()) {
						while (have_posts()) {
							the_post();
							the_content(__('read more...', 'youare'));
							wp_link_pages();
?>
				<p class="tag"><?php the_tags(__('Tags', 'youare').': <em>', ', ', '</em>'); ?></p>
				<div class="post-footer bold">
					<?php include (TEMPLATEPATH . '/share.php'); ?>
				</div>
				<?php 
					} /* rewind or continue if all posts have been fetched */
						comments_template('', true);
					} else {
					}
				?>
			</div> <!--end single-->
		</div>
	</div>
</div>
<?php get_footer(); ?>