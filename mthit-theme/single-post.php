<div class="row">
	
	<div class="col-xs-12 col-sm-8">
		
		<?php 
		
		if( have_posts() ):
			
			while( have_posts() ): the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php the_title('<h1 class="entry-title">','</h1>' ); ?>
					
					<?php if( has_post_thumbnail() ): ?>
						
						<div class="pull-right"><?php the_post_thumbnail('thumbnail'); ?></div>
				
					<?php endif; ?>
					
                    <small><?php the_category(' '); ?> || <?php the_tags(); ?> || <?php 
                    //edit post link is shown if the user is loged as admin and redirects to edit post page in wordpress
                    edit_post_link(); ?></small>
					
					<?php the_content(); ?>
					
					<hr>
					
                    <?php 
                    
                    //comments_open() function is if comments are allowed
						if( comments_open() ){ 

                            //we don't  need to make template comments.php that will  be called using this function (it has default )
							comments_template(); 
						} else {
							echo '<h5 class="text-center">Sorry, Comments are closed!</h5>';
						}
						
					 ?>
				
				</article>

			<?php endwhile;
			
		endif;
				
		?>
	<?php the_posts_navigation(); ?>
	</div>
	
	<div class="col-xs-12 col-sm-4">
		<?php get_sidebar(); ?>
	</div>
	
</div>