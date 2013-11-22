<?php
/*
Template Name: Archives
*/
?>
<?php get_header(); ?>	        
<div class="container splash">
	<div class="row">
		<div class="col-md-12">
			<h1 class="bigpage title"><?php _e('Archives', 'youare'); ?></h1>
			<?php
				$numposts = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish'"); 
				$numcomms = (int) $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'"); 
				$numcats = wp_count_terms('category'); 
				$numtags = wp_count_terms('post_tag'); 
			?> 
			<p><?php echo sprintf(__('There are currently %s posts, contained within %s categories, using <a href="/tags">%s tags.</a>', 'youare'), $numposts, $numcats, $numtags); ?></p>
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