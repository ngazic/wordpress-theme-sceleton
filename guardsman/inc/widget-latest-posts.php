<?php
class latest_posts_Widget extends WP_Widget {
  /**
  * To create the example widget all four methods will be 
  * nested inside this single instance of the WP_Widget class.
  **/

  public function __construct() {
    $widget_options = array(
      'classname' => 'latest_posts_Widget',
      'description' => 'This is an widget for 3 latests posts.',
    );
    parent::__construct( 'latest_posts_Widget', 'Widget for 3 latest posts', $widget_options );
  }
  //front-end function
  public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );?>
    <div class="row">
    <div class="col-xs-12 headline-wrap">
      <h2 class="h2 h2--with-underline"><?php echo $title; ?></h2>
      <table class="spacer"><tr><td height="40"></td></tr></table>
    </div>

    <?php
    $args = array('post_type' => 'post',
    'posts_per_page' => 3);
    $blogPosts = new WP_Query($args);

    if ( $blogPosts->have_posts() ): while ( $blogPosts->have_posts() ) : $blogPosts->the_post();
      $post_date = get_the_date( 'd.m.Y' );
      $categories = get_the_category();
      $category_name = $categories[ 0 ]->name;
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
              <img title="image title" alt="thumb image" class="" src="<?php echo $post_thumbnail_url; ?>" style="width:100%; height:100%; max-width: 100%;">
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
        <div class="text"><?php the_excerpt(); ?></div>
        <a href="?p=<?php the_ID(); ?>" class="link" >READ MORE</a>
      </article>
    </div>
    <?php  endwhile;  endif;?>
<?php
  }
  //back-end function
  public function form( $instance ) {
    $title = ! empty( $instance[ 'title' ] ) ? $instance['title' ] : '';
?>
  <p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title for section with tabs</label></p>
  <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>"
  size="40" value="<?php echo esc_attr( $title ); ?>" />
<?php 
}
  //update function
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		return $instance;
  }
}
	register_widget( 'latest_posts_Widget' );
?>