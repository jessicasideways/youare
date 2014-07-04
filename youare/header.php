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
					<span class="sr-only"><?php _e('Toggle navigation','youare'); ?></span>
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

					$args = array(
						'menu' => 'main-menu',
						'echo' => false,
						'before' => '<li class="menu-item">',
						'after' => '</li>',
					);
					echo strip_tags(wp_nav_menu( $args ), '<li><a>');
					?>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="<?php _e('Search','youare'); ?>">
					</div>
					<button type="submit" class="btn btn-default"><?php _e('Submit','youare'); ?></button>
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