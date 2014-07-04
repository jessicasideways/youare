<p class="subscribe"><?php _e('Follow me', 'youare'); ?>:

  <?php $twitter = get_option('Y_twitter'); ?>
  <?php $twitter_toggle = get_option('Y_twitter_toggle_link'); ?>
  
  <?php if ($twitter_toggle) { ?>
    <a class="twitter" href="<?php if ($twitter !== '') echo htmlspecialchars($twitter, UTF-8); else echo "#"; ?>"><?php _e('Twitter','youare'); ?></a>
  <?php } ?>
</p>