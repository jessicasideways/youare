<?php 
$footer_corp = get_option('Y_promo_footer');
$footer_tagline = get_option('Y_footer_tagline');
$footer_content = get_option('Y_footer_content');
?> 
	<div class="splash">
		<div id="promo_down">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<?php
          					if (($footer_corp == 'true')) {
						?>
						<h2 class="title"><?php echo $footer_tagline; ?></h2>
						<?php
								echo stripslashes($footer_content);
							} else {
						?>
						<a href=""><img src="<?php bloginfo('template_url'); ?>/images/logo_promo_footer.png" alt="<?php _e('Logo', 'youare'); ?>" /></a>
						<h2 class="title"><?php _e('Your Company tag line or Featured work', 'youare'); ?></h2>
						<p><?php _e('Company services. Go to You Are Options menu (the Footer Promo section) in WP Dashboard. <a href="http://wptheme.youare.com/demo/2009/08/19/how-to-customize-footer/">View examples</a>.', 'youare'); ?></p>
						<?php 
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<p class="pright"><a class="wordpress" href="http://wordpress.org" title="WordPress">WordPress</a> &middot; <?php $rss_url = get_option('y_feedburner_username'); 
						if ($rss_url != "") {
							echo '<a class="rss" href="http://feeds.feedburner.com/' . $rss_url . '">RSS</a>';
						} else { ?>
							<a class="rss" href="<?php bloginfo('rss2_url'); ?> ">RSS</a></li>
						<?php } ?> &middot; <a href="#header" id="toplink" title="<?php _e('Top', 'youare'); ?>"><?php _e('Top', 'youare'); ?></a></p>
						<?php include (COPY); ?>
				</div>
			</div><!--end footer-->
		</div>
	</footer>
<?php
	$tmp_stats_code = get_option('Y_stats_code');
	if($tmp_stats_code != ''){
		echo stripslashes($tmp_stats_code);
	}
	wp_footer();
?>
</body>
</html>