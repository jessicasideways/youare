<?php get_header(); ?>
<div class="splash">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><?php
	if (have_posts()) :
		if( is_category() ) {
			// if this category has children
			$categ_object = get_category( get_query_var( 'cat' ), false );
			$list_subcats = wp_list_categories( 'title_li=&depth=1&echo=0&child_of=' . (int)$categ_object->cat_ID );

			// wordpress never returns null or empty string. If children, <a> tag will be found, otherwise string is returned.
			preg_match_all( '|<a.*?href=[\'"](.*?)[\'"].*?>|i', $list_subcats, $m );

			if( !$m[ 1 ] ) {
				// there are no subcategories. Why?
				// this is either the last child or this category really doesn't have subcategories
				// last child must have a parent, right?
				if( (int)$categ_object->category_parent > 0 ) {
					// we'll need parent category name for the title, extract name via category ID
					$parent_cat_name = $wpdb->get_var( "SELECT name FROM $wpdb->terms WHERE term_id=" . (int)$categ_object->category_parent );
?>
<p class="pright previous"><a class="rss" title="<?php _e('Subscribe to this category', 'youare'); ?>" href="<?php echo get_category_feed_link('cat_id','feed'); ?>feed/"><?php echo sprintf(__('Subscribe to %s', 'youare'), '<strong>'.single_cat_title(null, false).'</strong>'); ?></a></p>
<h1 class="title"><a href="<?php echo get_category_link($categ_object->category_parent) ?>" title="<?php _e('Go to this category', 'youare'); ?>"><?php echo $parent_cat_name; ?></a></h1>
<ul class="subnav">
	<?php wp_list_categories( 'title_li=&show_count=1&depth=1&child_of=' . (int)$categ_object->category_parent ); ?>
</ul>
<?php
				} else {
					$parent_cat_name = $wpdb->get_var( "SELECT name FROM $wpdb->terms WHERE term_id=" . (int)$categ_object->cat_ID );
?>
<p class="pright previous"><a class="rss" title="<?php _e('Subscribe to this category', 'youare'); ?>" href="<?php echo get_category_feed_link('cat_id','feed'); ?>feed/"><?php echo sprintf(__('Subscribe to %s', 'youare'), '<strong>'.single_cat_title(null, false).'</strong>'); ?></a></p>
<h1 class="title"><a href="<?php echo get_category_link($categ_object->cat_ID) ?>" title="<?php _e('Go to this category', 'youare'); ?>"><?php echo single_cat_title("", false) ?></a></h1>
<?php
					youare_archive_x_posts();
				}
			} else {
				// ohoho! ...but here are some. List them all...
?>
<p class="pright previous"><a class="rss" title="<?php _e('Subscribe to this category', 'youare'); ?>" href="<?php echo get_category_feed_link('cat_id','feed'); ?>feed/"><?php echo sprintf(__('Subscribe to %s', 'youare'), '<strong>'.single_cat_title(null, false).'</strong>'); ?></a></p>
<h1 class="title"><a href="<?php echo get_category_link($categ_object->cat_ID."") ?>" title="<?php _e('Go to this category', 'youare'); ?>"><?php echo $categ_object->cat_name; ?></a></h1>
<ul class="subnav">
<?php wp_list_categories( 'title_li=&show_count=1&depth=1&child_of=' . (int)$categ_object->cat_ID ); ?>
</ul>
<?php
			}
		} elseif( is_tag() ) {
?>
<p class="pright previous"><a class="rss" title="<?php _e('Subscribe to this tag', 'youare'); ?>" href="<?php echo get_category_feed_link('cat_id','feed'); ?>feed/"><?php echo sprintf(__('Subscribe to %s', 'youare'), '<strong>'.single_tag_title(null, false).'</strong>'); ?></a></p>
<h1 class="title"><?php echo sprintf(__('Tags: %s','youare'), single_tag_title('', false)); ?></h1>
<?php youare_archive_x_posts(); ?>
<p><em class="twitter">#<a href="http://twitter.com/#search?q=<?php single_tag_title(); ?>"><?php single_tag_title(); ?></a></em></p>
<?php
		} elseif (is_day()) { // If this is a daily archive
?>
<h1 class="title"><?php the_time('F jS, Y'); ?> </h1> 
<?php
			youare_archive_x_posts();
		} elseif (is_month()) { /* If this is a monthly archive */
?>
<h1 class="title"><?php the_time('F Y'); ?> </h1> 
<?php
			youare_archive_x_posts();
		} elseif (is_year()) { /* If this is a yearly archive */
?>
<h1 class="title"><?php the_time('Y'); ?> </h1>
<?php
			youare_archive_x_posts();
		} elseif (is_author()) {
			if (isset($_GET['author_name'])) $current_author = get_userdatabylogin($author_name);
			else $current_author = get_userdata(intval($author));
?>
<h1 class="title"><?php echo sprintf(__('Posts by %s', 'youare'), $current_author->nickname); ?></h1>
<?php
			youare_archive_x_posts();
		} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { /* If this is a paged archive */
?>
<h1 class="title"><?php _e('Blog Archives', 'youare'); ?></h1>
<?php 
	}
?>
			</div>
		</div>
	</div>
</div> <!--end splash-->  
<div class="container content-background">
	<div class="row">
		<div id="content" class="col-md-8 col-xs-12 suffix_1">
			<div class="block_bottom"><?php wp_pagenavi(); ?></div>
<?php 
    while (have_posts()) : the_post();
?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="date"> <strong><?php the_time('d') ?></strong> <span><?php the_time('M') ?></span> <em><?php the_time('Y') ?></em> </div>
				<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo sprintf(__('Permanent Link to %s', 'youare'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
				<div class="entry excerpt">
					<p class="pleft bold"><?php comments_number(__('No comments', 'youare'), __('1 comment', 'youare'), __('% comments', 'youare') );?>.-</p>
					<?php the_excerpt(__('read more...', 'youare')); ?>
					<?php edit_post_link(__('Edit This', 'youare'),'<strong>','</strong>'); ?>
				</div><!--end entry-->
			</div><!--end post-->
<?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
			<div class="pright"><?php wp_pagenavi(); ?></div>
<?php else :
	endif; ?>
		</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>