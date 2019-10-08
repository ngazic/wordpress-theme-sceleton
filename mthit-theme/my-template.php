<?php
/*
	Template Name: My Template
*/

get_header(); ?>

	<h1 class="content">This is custom template created using comments above and Template Name !!!</h1>

	<?php 
	
	if( have_posts() ):
		
		while( have_posts() ): the_post(); ?>
		
			<h3><?php the_title(); ?></h3>
			<small>Posted on: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?></small>
			
			<p><?php the_content(); ?></p>
			
			<hr>
			<?php get_template_part('content',get_post_format()); ?>
		<?php endwhile;
		
	endif;
			
	?>

<?php get_footer(); ?>