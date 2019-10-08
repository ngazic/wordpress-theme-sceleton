<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<article id="post-<?php the_ID(); ?>" <?php post_class(array('article-post')); ?>>

					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					<div class="img-wrapper aspect-3-2">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php if ( ( function_exists('has_post_thumbnail') ) && ( has_post_thumbnail() ) ) { 
							$post_thumbnail_id = get_post_thumbnail_id();
							$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
							?>
							<div class="post-image">
									<img title="image title" alt="thumb image" class="" src="<?php echo $post_thumbnail_url; ?>" style="width:100%; height:auto;">
							</div>
						<?php } ?>
						</a>
					</div>
					<?php endif; ?>
					<!-- /post thumbnail -->

				<?php the_tags( '<ul class="tag-list"><li class="tag-list-item">', '</li><li class="tag-list-item">', '</li></ul>' ); ?>

					<!-- post title -->
					<h4 class="h4">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
					</h4>

					<div class="text">
						<?php the_content();?>
					</div>
					<a href="post-<?php the_ID(); ?>" class="link" >READ MORE</a>
					<br />
					<br />
					<?php edit_post_link()?>
				</article>
			<!-- /article -->
			</div>
		</div>
	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'guardsman' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>