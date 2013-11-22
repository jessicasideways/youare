<?php get_header(); ?>
		<?php if (have_posts()) : ?>
			<div class="container splash">
				<div class="row">
					<div class="col-md-12">
						<h1 class="title"><?php _e('Search Results for ', 'youare'); ?> "<?php the_search_query(); ?>"</h1>
						<p><?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e('');  _e(''); echo $count . ' '; _e('posts'); wp_reset_query(); ?></p>
					</div>
				</div>
			</div> <!--end splash-->  
			<div class="container content-background">
				<div id="content" class="row">
					<div class="col-md-8 col-xs-12">
						<form class="search" method="get" id="search_form" action="<?php bloginfo('url'); ?>/">
							<input type="text" name="s" id="s" class="search" onclick="this.value=''" type="text" value="<?php the_search_query(); ?>" />  <input type="submit" id="searchsubmit" value="<?php _e('Search', 'youare'); ?>" />
						</form>
						<?php while (have_posts()) : the_post(); ?>
							<div class="post" id="post-<?php the_ID(); ?>">
								<div class="date"> <strong><?php the_time('d') ?></strong> <span><?php the_time('M') ?></span> <em><?php the_time('Y') ?></em> </div>
								<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php echo sprintf(__('Permanent Link to %s', 'youare'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
								<div class="entry excerpt">
									<p class="pleft bold"><?php comments_number(__('No comments', 'youare'), __('1 comment', 'youare'), __('% comments', 'youare') );?>.-</p> <?php the_excerpt(__('read more...', 'youare')); ?>
									<?php edit_post_link(__('Edit This', 'youare'),'<strong>','</strong>'); ?>
								</div><!--end entry-->
							</div><!--end post-->
						<?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
			
						<div class="pright">
							<?php wp_pagenavi(); ?>
						</div>
		<?php else : ?>
			<div class="container splash">
				<div class="row">
					<div class="col-md-12">
						<h1 class="title">Search Results for "<?php the_search_query(); ?>"</h1>
					</div>
				</div>
			</div> <!--end splash-->  
			<div class="container content-background">
				<div class="row">
					<div class="col-md-8 col-xs-12 suffix_1" id="content">
						<form class="search" method="get" id="search_form" action="<?php bloginfo('url'); ?>/">
							<input type="text" name="s" id="s" class="search" onclick="this.value=''" type="text" value="<?php the_search_query(); ?>" />  <input type="submit" id="searchsubmit" value="<?php _e('Search', 'youare'); ?>" />
						</form>
						<p class="alert"><?php _e('No results found! You sure you wrote it correctly? Please try again.', 'youare'); ?></p>
		<?php endif; ?>
					</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>