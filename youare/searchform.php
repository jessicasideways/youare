<form method="get" role="form" id="search_form" action="<?php bloginfo('home'); ?>/">
	<div class="row">
		<div class="col-lg-12">
			<div class="input-group">
				<input type="text" name="s" id="s" placeholder="<?php _e('What are you looking for?','youare'); ?>" class="form-control">
				<span class="input-group-btn">
					<input type="submit" class="btn btn-default" value="<?php _e('Search', 'youare'); ?>" />
				</span>
			</div><!-- /input-group -->
		</div><!-- /.col-lg-12 -->
	</div><!-- /.row -->
</form>
