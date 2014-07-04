<?php
/*
Template Name: About
*/
?>
<?php get_header(); ?>
<div class="splash">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="bigpage title"><?php _e('About', 'youare'); ?></h1>
				<p></p>
			</div>
		</div>
	</div>
</div> <!--end splash-->  
<div class="container content-background">
	<div class="row">
		<div id="content" class="col-md-8 col-xs-12 suffix_1">   
			<div class="single">
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				<?php smart_archives(); ?>
			</div>
		</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>