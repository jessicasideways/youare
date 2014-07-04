<?php get_header(); ?>
<div class="splash">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="title"><?php _e('404: Page Not Found', 'youare'); ?></h1>
				<p><?php _e('It might have been moved or deleted, or perhaps you mistyped it. We suggest searching the site:', 'youare'); ?></p>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</div>
		</div>
  <?php get_sidebar(); ?>
<?php get_footer(); ?>