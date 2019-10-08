<?php
class teastimonials_Widget extends WP_Widget {
  /**
  * To create the example widget all four methods will be 
  * nested inside this single instance of the WP_Widget class.
  **/

  public function __construct() {
    $widget_options = array( 
      'classname' => 'testimonials_Widget',
      'description' => 'This is an widget for testimonials. This widget is using post type testimonials.',
    );
    parent::__construct( 'testimonials_Widget', 'Widget Testimonials', $widget_options );
  }
 
  //front-end function
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $text = apply_filters( 'widget_title', $instance[ 'text' ] );
    echo $args['before_widget']?>

<div class="row users-about-us-heading a">
  <div class="col-md-offset-3 col-md-6 col-xs-12 col-xs-offset-0">
    <div class="content">
      <h2 class="h2 h2--with-underline"><?php echo $title ?></h2>
      <p class="text"><?php echo $text ?></p>
    </div>
  </div>
</div>
<div class="row users-about-us">
  <?php
      global $post;
      $args = array('post_type' => 'testimonials','post_per_page' => 4);
      $testmonialsList = new WP_Query($args);
      if($testmonialsList->have_posts()){
        while($testmonialsList->have_posts()){ $testmonialsList->the_post();
    ?>
  <div class="users-about-us-item col-lg-3 col-md-6 col-xs-12">
    <h5 class="workflow-item-title"><?php the_title();?></h5>
    <li class="tag-list-item "> <?php  echo get_post_meta($post->ID,'jobTitle',true) ?></li>
    <div class="list-text"><?php the_content()?></div>
    <div class="logo-img"><?php the_post_thumbnail(); ?></div>
  </div>
  <?php
        }
      }
    ?>

</div>
<table class="spacer">
  <tr>
    <td height="150"></td>
  </tr>
</table>
<?php 
  
  }

  //back-end function
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
    $text = ! empty( $instance['text'] ) ? $instance['text'] : ''; 
?>

<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
</p>
<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"
  name="<?php echo $this->get_field_name( 'title' ); ?>" size="40" value="<?php echo esc_attr( $title ); ?>" />

<p>
  <label for="<?php echo $this->get_field_id( 'text' ); ?>">Content text:</label>
</p>
<textarea name="<?php echo $this->get_field_name( 'text' ); ?> id=" <?php echo $this->get_field_id( 'text' );?>
  cols="40" rows="5"><?php echo esc_attr( $text ); ?></textarea>
<?php 
}

  //update function
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'text' ] = strip_tags( $new_instance[ 'text' ] );
    return $instance;
  }
}

	register_widget( 'teastimonials_Widget' );
?>