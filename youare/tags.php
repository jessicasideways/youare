<?php
/*
Template Name: Tags
*/
get_header();
?>
<div class="splash">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="title"><?php _e('Tags Archive', 'youare'); ?></h1>
				<p><?php _e('Tag Cloud', 'youare'); ?></p>
			</div>
		</div> 
	</div> 
</div> <!--end splash-->  
<div class="container">
	<div class="row content-background">
		<div id="content" class="col-md-8 col-xs-12 suffix_1"> 
<?php
  include (TEMPLATEPATH . '/searchform.php');
  if ( function_exists('wp_tag_cloud') ) {
?>
			<div id="tagcloud"><?php wp_tag_cloud('smallest=8&largest=22&number=30&orderby=name'); ?></div>
<?php 
  }
?>
		</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>