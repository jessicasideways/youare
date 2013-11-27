<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8" />
		
		<title><?php
			wp_title( '|', true, 'right' );
		?></title>

		<!-- Basic Meta Data -->
		<?php csv_tags(); ?>
	
		<!-- Feeds -->
		<?php $rss_url = get_option('Y_feedburner_username');
			if ($rss_url != "") { ?>
				<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>RSS 2.0 Feed" href="http://feeds.feedburner.com/<?php echo $rss_url; ?>" />
		<?php } else { ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<?php } ?>	
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e('Comments RSS 2.0 Feed'); ?>" href="<?php bloginfo('comments_rss2_url'); ?>" />	
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<!--WP Hook-->
        <?php
			wp_head();
		?>
	</head>
	<body<?php if (is_single() || is_archive()) echo(' id="archives_page"');?>>
		<header id="header">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12 vcard">
						<a class="photo" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php echo get_avatar( get_settings('admin_email'), '55' ); ?></a>
						<?php if (is_home()) echo('<h1 id="logo">'); else echo('<div id="logo">');?><a class="url" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><span class="fn"><?php bloginfo('name'); ?></span></a><?php if (is_home()) echo('</h1>'); else echo('</div>');?>
						<ul class="nav">
        <!-- Header navigation recommended: Home | Archives | About | Contact 
               Excludes pages selected in YouAre Theme options. -->
							<?php 
								$exclude_pages = get_option('Y_pages_to_exclude');
								$hide_pages = get_option('Y_hide_pages');
								if ($hide_pages != 'true') {
							?>
							<li class="home page_item <?php if (is_home()) echo('current_page_item');?>"><a href="<?php bloginfo('url'); ?>" accesskey="1" title="<?php _e('Home'); ?> (Alt+1)"><?php _e('Home'); ?></a></li>
							<li<?php if ( is_page('arxius') || is_page('archives') || is_page('archivos') || is_archive() || is_search() || is_single()) { echo ' class="current"'; } ?>><a href="<?php bloginfo('url'); ?>/<?php _e('archives', 'youare'); ?>" accesskey="2" title="<?php _e('Archives', 'youare'); ?> (Alt+2)"><?php _e('Archives', 'youare'); ?></a></li>
							<?php
								$my_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".__('Archives', 'youare')."'");
								wp_list_pages('depth=-1&title_li=&exclude='. $exclude_pages.','.$my_id);
							}
							?>
						</ul>
					</div><!--end vcard-->
				</div>
			</div><!--end header-->
		</header>