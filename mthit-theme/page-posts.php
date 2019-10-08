<?php get_header(); ?>

	<h1 class="content">This is page with all posts</h1>

	<?php 
	$allPosts = new WP_Query('type=post&posts_per_page=-1');
	if( $allPosts->have_posts() ):
		
		while( $allPosts->have_posts() ): $allPosts->the_post(); ?>
		
			<h3><?php the_title(); ?></h3>
			<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?></small>
			
			<p><?php the_content(); ?></p>
			
			<hr>
			<?php get_template_part('content',get_post_format()); ?>
		
		<?php endwhile;
		
	endif;
	// This needs to be added for reseting wp query for use on another page
	wp_reset_postdata();
			
	?>

<?php get_footer(); ?>