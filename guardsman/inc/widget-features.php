<?php
class features_Widget extends WP_Widget {
  /**
  * To create the example widget all four methods will be 
  * nested inside this single instance of the WP_Widget class.
  **/

  public function __construct() {
    $widget_options = array(
      'classname' => 'features_Widget',
      'description' => 'This is an widget for features. This widget using post type features',
    );
    parent::__construct( 'features_Widget', 'Widget Features', $widget_options );
  }
  //front-end function
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $text = apply_filters( 'widget_title', $instance[ 'text' ] );
    $bgImg = apply_filters( 'widget_title', $instance[ 'bgImg' ] ); 
    echo $args['before_widget']?>

<div class="under-hood" style="background-image:url('<?php echo $bgImg ?>')">
  <div class="row">
    <div class="mask-top"></div>
    <div class="mask-bg"></div>
    <div class="col-md-offset-3 col-md-6 col-xs-12 col-xs-offset-0">
      <div class="content">
        <h2 class="h2 h2--with-underline"><?php echo $title ?></h2>
        <p class="text"><?php echo $text ?></p>
      </div>
    </div>
  </div>
</div>
<div class="list-stories">
  <div class="row rounded-wrap">
    <?php
    global $post;
    $args = array('post_type' => 'features','post_per_page' => 8);
    $featuresList = new WP_Query($args);
    if($featuresList->have_posts()){
      while($featuresList->have_posts()){ $featuresList->the_post();
  ?>
    <div class="col-md-3">
      <div class="story">
        <div class="underHood-img"><?php the_post_thumbnail(); ?></div>
        <h4 class="h4 h4--with-underline">
          <?php the_title();?>
        </h4>
        <div class="list-text"><?php the_content()?></div>
      </div>
    </div>
    <?php
        }
      }
    ?>
  </div>
  <table class="spacer">
    <tr>
      <td height="80"></td>
    </tr>
  </table>
  <?php
  }

  //back-end function
  public function form( $instance ) {
    $title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
    $text = ! empty( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';
    $bgImg = ! empty( $instance[ 'bgImg' ] ) ? $instance[ 'bgImg' ] : '';
?>

    <h3>This is section for features</h3>
  <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title for features section</label>
  </p>
  <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"
    name="<?php echo $this->get_field_name( 'title' ); ?>" size="40" value="<?php echo esc_attr( $title ); ?>" />
  <p>
    <label for="<?php echo $this->get_field_id( 'text' ); ?>">Subtitle for section features</label>
  </p>
  <textarea name="<?php echo $this->get_field_name( 'text' ); ?> id=" <?php echo $this->get_field_id( 'text' );?>
    cols="40" rows="5"><?php echo esc_attr( $text ); ?></textarea>
  <div class="upload-picture-preview"
    style="min-height:200px;max-width:300px;background-size:contain;background-repeat:no-repeat;background-image:url('<?php echo esc_url( $bgImg ) ?> ');">
  </div>
  <input type="button" class="button button-secondary upload-button" value="Upload background image"
    id="upload-button"><input type="hidden" class="upload-picture"
    name="<?php echo $this->get_field_name( 'bgImg' ); ?>" value="<?php echo esc_url( $bgImg );?> " />
    <br />
    <br />
    <hr />
  <?php
}

  //update function
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'text' ] = strip_tags( $new_instance[ 'text' ] );
    $instance[ 'bgImg' ] = strip_tags( $new_instance[ 'bgImg' ] );
    return $instance;
  }
}
	register_widget( 'features_Widget' );
?>