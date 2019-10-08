<?php
class widget_footer extends WP_Widget {
  /**
  * To create the example widget all four methods will be 
  * nested inside this single instance of the WP_Widget class.
  **/

  public function __construct() {
    $widget_options = array( 
      'classname' => 'widget_footer',
      'description' => 'This is an Footer Widget. This widget is using data from GUARDSMAN THEME OPTIONS.',
    );
    parent::__construct( 'widget_footer', 'Widget Footer', $widget_options );
  }

  public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance[ 'title' ] );
	$subtitle = apply_filters( 'widget_title', $instance[ 'subtitle' ] );
	$checkboxText = apply_filters( 'widget_title', $instance[ 'checkboxText' ] );
	$btnText = apply_filters( 'widget_title', $instance[ 'btnText' ] ); ?>

			<div class="row">
			<div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
					<h2 class="h2 h2--with-underline"><?php echo $title ?></h2>
					<p class="text"><?php echo $subtitle ?></p>
				<div class="input-wrap">
					<div class="flex-container align-items-center">
						<div class="col-xs-6">
							<input type="email" name="emailInput" class="emailInput" placeholder="exp: john.doe@mail.com">
						</div>
						<div class="col-xs-6 justify-content-end">
							<a class="button" href="#"><?php echo $btnText ?></a>
					</div>
				</div>
		</div>
		<div class="checkbox">
			<input type="checkbox" id="checkbox" />
			<label for="checkbox"><?php echo $checkboxText ?></label>
		</div>
	</div>
		</div>
	<?php echo $args['after_widget'];
  }

  public function form( $instance ) {
	$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
	$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : ''; 
	$btnText = ! empty( $instance['btnText'] ) ? $instance['btnText'] : ''; 
	$checkboxText = ! empty( $instance['checkboxText'] ) ? $instance['checkboxText'] : ''; ?>
	<p>
	  <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
	</p>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" size="40" value="<?php echo esc_attr( $title ); ?>" />

	<p>
	  <label for="<?php echo $this->get_field_id( 'subtitle' ); ?>">Subtitle:</label>
	</p>
	  <textarea name="<?php echo $this->get_field_name( 'subtitle' ); ?> id="<?php echo $this->get_field_id( 'subtitle' );?> cols="40" rows="5"><?php echo esc_attr( $subtitle ); ?></textarea>

	<p>
	  <label for="<?php echo $this->get_field_id( 'btnText' ); ?>">Text for button:</label>
	</p>
		<input type="text" id="<?php echo $this->get_field_id( 'btnText' ); ?>" name="<?php echo $this->get_field_name( 'btnText' ); ?>" size="40" value="<?php echo esc_attr( $btnText ); ?>" />

	<p>
	  <label for="<?php echo $this->get_field_id( 'checkboxText' ); ?>">Text for checkbox:</label>
	</p>
	  <textarea name="<?php echo $this->get_field_name( 'checkboxText' ); ?> id="<?php echo $this->get_field_id( 'checkboxText' );?> cols="40" rows="5"><?php echo esc_attr( $checkboxText ); ?></textarea>
	<?php
  }

  public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
	$instance[ 'subtitle' ] = strip_tags( $new_instance[ 'subtitle' ] );
	$instance[ 'checkboxText' ] = strip_tags( $new_instance[ 'checkboxText' ] );
	$instance[ 'btnText' ] = strip_tags( $new_instance[ 'btnText' ] );
	return $instance;
  }
}
	register_widget( 'widget_footer' );
?>