<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<aside id="secondary" class="widget-area  lower" role="complementary">
		<ul>
		<?php dynamic_sidebar( 'sidebar' ); ?>
		</ul>
	</aside><!-- #secondary -->
<?php endif;