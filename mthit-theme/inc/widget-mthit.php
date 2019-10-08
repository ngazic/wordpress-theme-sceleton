<?php
//this is copy/paste procedure

class cta_Widget extends WP_Widget {
  /**
  * To create the example widget all four methods will be 
  * nested inside this single instance of the WP_Widget class.
  **/

  public function __construct() {
    $widget_options = array(
      'classname' => 'cta_Widget',
      'description' => 'This is an widget for CTA (call to action ).',
    );
    parent::__construct( 'cta_Widget', 'Widget CTA', $widget_options );
  }
 
  //front-end function
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $text = apply_filters( 'widget_title', $instance[ 'text' ] );
    $btnText1 = apply_filters( 'widget_title', $instance[ 'btnText1' ] );
    $btnText2 = apply_filters( 'widget_title', $instance[ 'btnText2' ] ); 
    $bgImg = apply_filters( 'widget_title', $instance[ 'bgImg' ] ); 
    echo $args['before_widget']?>

<div class="cta" style="background-image:url('<?php echo $bgImg ?>')">
  <div class="mask-grey"></div>
  <div class="mask-top"></div>
  <div class="mask-bottom"></div>
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-offset-2 col-md-8 col-xs-12 col-xs-offset-0">
      <div class="content">
        <h2 class="h2 h2--with-underline">
          <?php echo $title ?></h2>
        </h2>
        <p class="text"><?php echo $text ?></h2>
        </p>
        <div class="buttons-combo">
          <a class="button" href="#"><?php echo $btnText1 ?></a>
          <a class="button button--transparent" href="#"><?php echo $btnText2 ?></a>
        </div>
      </div>
    </div>
  </div>
</div>
<table class="spacer">
  <tr>
    <td height="150"></td>
  </tr>
</table>
<?php 
    echo $args['after_widget'];
  }

  //back-end function
  public function form( $instance ) {
    $title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
    $text = ! empty( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';
    $btnText1 = ! empty( $instance[ 'btnText1' ] ) ? $instance[ 'btnText1' ] : '';
    $btnText2 = ! empty( $instance[ 'btnText2' ] ) ? $instance[ 'btnText2' ] : '';
    $bgImg = ! empty( $instance[ 'bgImg' ] ) ? $instance[ 'bgImg' ] : '';
?>

<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title for CTA section</label>
</p>
<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"
  name="<?php echo $this->get_field_name( 'title' ); ?>" size="40" value="<?php echo esc_attr( $title ); ?>" />

<p>
  <label for="<?php echo $this->get_field_id( 'text' ); ?>">Subtitle for CTA section</label>
</p>
<textarea name="<?php echo $this->get_field_name( 'text' ); ?> id=" <?php echo $this->get_field_id( 'text' );?>
  cols="40" rows="5"><?php echo esc_attr( $text ); ?></textarea>

<br />
<br />
<hr>
<h3>Section for editing buttons</h3>
<p><label for="<?php echo $this->get_field_id( 'btnText1' ); ?>">Text for left button (colored button)</label></p>
<input type="text" id="<?php echo $this->get_field_id( 'btnText1' ); ?>"
  name="<?php echo $this->get_field_name( 'btnText1' ); ?>" size="40" value="<?php echo esc_attr( $btnText1 ); ?>" />

<p><label for="<?php echo $this->get_field_id( 'btnText2' ); ?>">Text for right button (transparent button)</label></p>
<input type="text" id="<?php echo $this->get_field_id( 'btnText2' ); ?>"
  name="<?php echo $this->get_field_name( 'btnText2' ); ?>" size="40" value="<?php echo esc_attr( $btnText2 ); ?>" />
<br />
<br />
<div class="upload-picture-preview"
  style="min-height:200px;max-width:300px;background-size:contain;background-repeat:no-repeat;background-image:url('<?php echo esc_url( $bgImg ) ?> ');">
</div>
<input type="button" class="button button-secondary upload-button" value="Upload background image"
  id="upload-button"><input type="hidden" class="upload-picture" name="<?php echo $this->get_field_name( 'bgImg' ); ?>"
  value="<?php echo esc_url( $bgImg );?> " />
<?php 
    }


  //update function
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'text' ] = strip_tags( $new_instance[ 'text' ] );
    $instance[ 'btnText1' ] = strip_tags( $new_instance[ 'btnText1' ] );
    $instance[ 'btnText2' ] = strip_tags( $new_instance[ 'btnText2' ] );
    $instance[ 'bgImg' ] = strip_tags( $new_instance[ 'bgImg' ] );
    return $instance;
  }
}
	register_widget( 'cta_Widget' );
?>