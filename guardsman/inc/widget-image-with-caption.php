<?php
class imageWithCaption_Widget extends WP_Widget {
  /**
  * To create the example widget all four methods will be 
  * nested inside this single instance of the WP_Widget class.
  **/

  public function __construct() {
    $widget_options = array( 
      'classname' => 'image_with_caption_Widget',
      'description' => 'This is an Image With Caption Widget',
    );
    parent::__construct( 'image_with_caption_Widget', 'Image With Caption Widget', $widget_options );
  }
 
  //front-end function
  public function widget( $args, $instance ) {
    $bgImg = apply_filters( 'widget_title', $instance[ 'bgImg' ] ); 
    $imgText = apply_filters( 'widget_title', $instance[ 'imgText' ] );
    echo $args['before_widget']?>

  <div class="blog-picture-wrap">
    <figure class="blog-picture row-narrow">
      <picture>
        <img src="<?php echo $bgImg ?>" alt="" title="">
      </picture>
      <figcaption class="caption"><?php echo $imgText ?></figcaption>
    </figure>
  </div>
  <?php 
  }

  //back-end function
  public function form( $instance ) {
    $bgImg = ! empty( $instance['bgImg'] ) ? $instance['bgImg'] : ''; 
    $imgText = ! empty( $instance['imgText'] ) ? $instance['imgText'] : ''; 
?>

  <!-- Upload picture -->
  <div class="upload-picture-preview"
    style="min-height:200px;max-width:300px;background-size:contain;background-repeat:no-repeat;background-image:url('<?php echo esc_url( $bgImg ) ?> ');">
  </div>
  <input type="button" class="button button-secondary upload-button" value="Upload picture"
    id="upload-button"><input type="hidden" class="upload-picture"
    name="<?php echo $this->get_field_name( 'bgImg' ); ?>" value="<?php echo esc_url( $bgImg );?> " />
    
  <!-- Input text -->
  <p>
    <label for="<?php echo $this->get_field_id( 'imgText' ); ?>">Image caption</label>
  </p>
  <textarea name="<?php echo $this->get_field_name( 'imgText' ); ?> id=" <?php echo $this->get_field_id( 'imgText' );?>
    cols="40" rows="5"><?php echo esc_attr( $imgText ); ?></textarea>
  <?php 
}

  //update function
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'bgImg' ] = strip_tags( $new_instance[ 'bgImg' ] );
    $instance[ 'imgText' ] = strip_tags( $new_instance[ 'imgText' ] );
    return $instance;
  }
}

	register_widget( 'imageWithCaption_Widget' );
?>