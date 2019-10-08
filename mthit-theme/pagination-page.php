<?php
    /*
    Template Name: Pagination Page

    */
?>

<h2>this is template for pagination </h2>

<?php 
		$currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array('posts_per_page' => 1, 'paged' => $currentPage);
        //query post is using new WP_Query object, but reasignes value to global wp_query
		query_posts($args);
		if( have_posts() ): $i = 0;
			
			while( have_posts() ): the_post(); ?>

    <?php if( has_post_thumbnail() ):
        $urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ); ?>
<div class="blog-item" style="background-image: url(<?php echo $urlImg; ?>);">
    <?php else : ?>
<div class="blog-item">
 <?php endif; ?>
<?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
							
<small><?php the_category(' '); ?></small>
</div>
<?php $i++; endwhile; ?>
				
			<div class="arrow">
				<?php next_posts_link('« Older Posts'); ?>
			</div>
			<div class="arrow">
				<?php previous_posts_link('Newer Posts »'); ?>
			</div>
			
        <?php endif;
        // IMPORTANT: this is clearfix to reset query for proper use on other pages
				wp_reset_query();
		?>