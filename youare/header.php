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
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><a class="photo img-circle" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php echo get_avatar( get_settings('admin_email'), '55' ); ?></a> <?php bloginfo('name'); ?></a>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<?php 
						$exclude_pages = get_option('Y_pages_to_exclude');
						$hide_pages = get_option('Y_hide_pages');
						if ($hide_pages != 'true') {
					?>
						<li<?php if ( is_page('archivos') || is_archive()) { echo ' class="active"'; } ?>><a href="<?php bloginfo('url'); ?>/<?php _e('archives', 'youare'); ?>" accesskey="2" title="<?php _e('Archives', 'youare'); ?> (Alt+2)"><?php _e('Archives', 'youare'); ?></a></li>
					<?php
						$my_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".__('Archives', 'youare')."'");
						wp_list_pages('depth=-1&title_li=&exclude='. $exclude_pages.','.$my_id);
					}
					?>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div><!-- /.navbar-collapse -->
		</nav>
		<header id="header">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12 vcard">
						
					</div><!--end vcard-->
				</div>
			</div><!--end header-->
		</header>