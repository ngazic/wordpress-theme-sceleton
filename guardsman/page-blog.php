<?php
	/**
	 * Template Name: Blog Page Template
	 */
 ?>
<main role="main">
    <div class="stage">
    <?php get_header();
      $guardsman_stored_meta = get_post_meta( $post->ID );
    ?>
    <div class="mask-bg"></div>
      <div class="mask-bottom"></div>
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="headline push pull">
            <h1 class="h1 h1--underline"><?php echo get_the_title(); ?></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php

$cat_args=array(
  'orderby' => 'name',
  'order' => 'ASC',
  'hide_empty'=>0,
  'exclude' => 1
);
?>
  <div class="tag-with-select">
  <div class="row">
    <div class="col-md-9 col-xs-7">
      <ul class="tag-with-border">
        <li class="tag-list-item active"><a href="">ALL</a></li>
        <?php
          $categories=get_categories($cat_args);
          foreach($categories as $category) {?>
            <li class="tag-list-item"><a href="?<?php echo $category->term_id; ?>"><?php echo $category->name; ?></a></li>
        <?php }?>
      </ul>
    </div>
    <div class="col-md-3 col-xs-5 justify-content-end">
      <div class="btn-wrapper">
        <select id="select-sort-posts">
          <option value="desc">newest</option>
          <option value="asc">oldest</option>
        </select>
      </div>
    </div>
  </div>
</div>

<?php
$args = array (
  'post_type'=> 'post',
  'posts_per_page' => '8',
  'order'=> 'DESC',
  'offset' => 1,
  'category__not_in' => array(1),
  'orderby'=> 'ID',
);

$blogPosts = new WP_Query($args);

$args = array (
  'post_type'=> 'post',
  'posts_per_page' => 1,
  'category__not_in' => array(1),
);

$featuredPost = new WP_Query($args);
$counter = 0;
?>

<div class="teaser-img-text" id="main-content-post-categories-featured">
  <div class="row">
  <?php if ($featuredPost->have_posts()): while ($featuredPost->have_posts()) : $featuredPost->the_post();
    $post_date = get_the_date( 'd.m.Y' );
    $categories = get_the_category();
    $category_name = $categories[0]->name; ?>
    <div class="col-md-8 col-xs-12">
      <?php if ( has_post_thumbnail()) { // Check if Thumbnail exists ?>
        <div class="img-wrapper aspect-3-2">
          <?php if ( ( function_exists('has_post_thumbnail') ) && ( has_post_thumbnail() ) ) {
            $post_thumbnail_id = get_post_thumbnail_id();
            $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
            ?>
            <div class="post-image">
              <img title="image title" alt="thumb image" class="" src="<?php echo $post_thumbnail_url; ?>" style="width:100%; height:100%;">
            </div>
        </div>
        <?php } ?>
      </div>

      <div class="col-md-4 col-xs-12">
        <div class="teaser-text">
          <ul class="tag-list">
            <li class="tag-list-item "><?php echo $post_date;?></li>
            <li class="tag-list-item "><?php the_author();?></li>
            <li class="tag-list-item "><?php echo $category_name; ?></li>
          </ul>
          <h3 class="h3"><?php the_title(); ?></h3>
          <div class="text"><?php the_content();?></div>
          <a class="button" href="#">READ</a>
        </div>
      </div>
    <?php break; } endwhile; endif; ?>
  </div>
</div>
<table class="spacer"><tr><td height="70"></td></tr></table>
<div class="posts-list">
  <div class="row" id="main-content-post-categories">
    <?php if ( $blogPosts->have_posts() ): while ( $blogPosts->have_posts() ) : $blogPosts->the_post();
      $post_date = get_the_date( 'd.m.Y' );
      $categories = get_the_category();
      $category_name = $categories[ 0 ]->name;
      $counter = $counter + 1;
      if($counter <= 6 ){
    ?>
    <div class="col-md-4 col-xs-12">
      <article id="<?php the_ID(); ?>" <?php post_class( array( 'article-post' ) ); ?>>
        <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
        <div class="img-wrapper aspect-3-2">
          <?php if ( ( function_exists('has_post_thumbnail') ) && ( has_post_thumbnail() ) ) {
            $post_thumbnail_id = get_post_thumbnail_id();
            $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
            ?>
            <div class="post-image">
              <img title="image title" alt="thumb image" class="" src="<?php echo $post_thumbnail_url; ?>" style="width:100%; height:100%;">
            </div>
          <?php } ?>
        </div>
        <?php endif; ?>
      <ul class="tag-list">
        <li class="tag-list-item "><?php echo $post_date; ?></li>
        <li class="tag-list-item "><?php the_author(); ?></li>
        <li class="tag-list-item "><?php echo $category_name; ?></li>
      </ul>
        <h4 class="h4"><?php the_title(); ?></h4>
        <div class="text"><?php the_content(); ?></div>
        <a href="?p=<?php the_ID(); ?>" class="link" >READ MORE</a>
      </article>
    </div>
    <?php } endwhile; ?>
    </div>
    <?php else: ?>
      <article>
        <h1><?php _e( 'Sorry, nothing to display.', 'guardsman' ); ?></h1>
      </article>
    <?php endif; ?>
    <?php if( $counter >= 7 ){?>
      <table class="spacer"><tr><td height="40"></td></tr></table>
      <div class="row justify-content-center">
        <a class="button" href="#" id="load-more-posts">LOAD MORE</a>
      </div>
    <?php } ?>
    <table class="spacer"><tr><td height="164"></td></tr></table>
</main>
<?php get_footer(); ?>