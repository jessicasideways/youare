<?php get_header(); ?>
<div class="container splash">
	<div class="row">
		<div class="col-md-12">
			<h1 class="title"><?php _e('404: Page Not Found', 'youare'); ?></h1>
			<p><?php _e('It might have been moved or deleted, or perhaps you mistyped it. We suggest searching the site:', 'youare'); ?></p>
		</div>
	</div>
</div> <!--end splash-->  
<div class="container content-background">
	<div class="row">
		<div id="content" class="grid_16 suffix_1"> 
			<div class="single">
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</div>
		</div>
  <?php get_sidebar(); ?>
<?php get_footer(); ?>