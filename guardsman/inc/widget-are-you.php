<?php
class Are_you extends WP_Widget {
  /**
  * To create the example widget all four methods will be
  * nested inside this single instance of the WP_Widget class.
  **/

  public function __construct() {
    $widget_options = array(
      'classname' => 'Are_you',
      'description' => 'This is an widget with tabs',
    );
    parent::__construct( 'Are_you', 'Widget with tabs', $widget_options );
  }

  public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$imageUrl = apply_filters( 'widget_title', $instance[ 'imageUrl' ] );
		$firstTab = apply_filters( 'widget_title', $instance[ 'firstTab' ] );
		$secondTab = apply_filters( 'widget_title', $instance[ 'secondTab' ] );
		$thirdTab = apply_filters( 'widget_title', $instance[ 'thirdTab' ] );
		$btnUrl = apply_filters( 'widget_title', $instance[ 'btnUrl' ] );
		$btnText = apply_filters( 'widget_title', $instance[ 'btnText' ] );
		$listItem1 = apply_filters( 'widget_title', $instance[ 'listItem1' ] );
		$listItem2 = apply_filters( 'widget_title', $instance[ 'listItem2' ] );
		$listItem3 = apply_filters( 'widget_title', $instance[ 'listItem3' ] );
		$listItem4 = apply_filters( 'widget_title', $instance[ 'listItem4' ] );
		$styleBackground = "position: absolute;top: 0;bottom: 0;left: 0;right: 0;background-position: top left;background-size: 60%;background-repeat: no-repeat;";
		if( $title !== '' || $imageUrl !== '' || $btnText !== '' ) {
		?>

<div class="are-you">
  <div class="headline">
    <h2 class="h2 h2--with-underline">
      <?php echo $title ?>
    </h2>
  </div>
  <?php if($firstTab !== '' && $secondTab !== '' && $thirdTab !== '' ) { ?>
  <ul class="buttons-tags">
    <li class="tag-list-item "><?php echo $firstTab?></li>
    <li class="tag-list-item tag-list-item--primary"><?php echo $secondTab?></li>
    <li class="tag-list-item "><?php echo $thirdTab?></li>
  </ul>
  <?php }

 if($listItem1 !== '' || $listItem2 !== '' || $listItem3 !== '' || $listItem4 !== '') { ?>
  <div class="row">
    <div class="content-wrap">
      <div style="<?php echo $styleBackground;?> background-image: url('<?php echo $imageUrl; ?>')"></div>
      <div class="flex-container">
        <div class="col-md-6 col-xs-12 col-xs-12--col-extra">
        </div>
        <div class="col-md-6 col-xs-12 text-center-mobile">
          <div class="list-icon-text">

            <?php if($listItem1 !== '') { ?>
            <div class="list-icon-with-text">
              <img class="list-item-icon" src="<?php echo get_template_directory_uri(); ?>/img/workflow-icon.png"
                alt="">
              <p class="list-text"><?php echo $listItem1;?></p>
            </div>
            <?php } ?>

            <?php if($listItem2 !== '') { ?>
            <div class="list-icon-with-text">
              <img class="list-item-icon" src="<?php echo get_template_directory_uri(); ?>/img/workflow-icon.png"
                alt="">
              <p class="list-text"><?php echo $listItem2;?></p>
            </div>
            <?php } ?>

            <?php if($listItem3 !== '') { ?>
            <div class="list-icon-with-text">
              <img class="list-item-icon" src="<?php echo get_template_directory_uri(); ?>/img/workflow-icon.png"
                alt="">
              <p class="list-text"><?php echo $listItem3;?></p>
            </div>
            <?php } ?>

            <?php if($listItem4 !== '') { ?>
            <div class="list-icon-with-text">
              <img class="list-item-icon" src="<?php echo get_template_directory_uri(); ?>/img/workflow-icon.png"
                alt="">
              <p class="list-text"><?php echo $listItem4;?></p>
            </div>
            <?php } ?>

          </div>
          <a class="button" href="#">
            <?php echo $btnText ?></a>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

</div>

<?php echo $args['after_widget'];
	}
}

  public function form( $instance ) {
		$title = ! empty( $instance[ 'title' ] ) ? $instance['title' ] : '';
		$firstTab = ! empty( $instance['firstTab'] ) ? $instance[ 'firstTab' ] : '';
		$secondTab = ! empty( $instance[ 'secondTab' ] ) ? $instance[ 'secondTab' ] : '';
		$thirdTab = ! empty( $instance[ 'thirdTab' ] ) ? $instance[ 'thirdTab' ] : '';
		$btnText = ! empty( $instance['btnText' ] ) ? $instance[ 'btnText' ] : '';
		$btnUrl = ! empty( $instance[ 'btnUrl' ] ) ? $instance['btnUrl' ] : '';
		$imageUrl = ! empty( $instance[ 'imageUrl' ] ) ? $instance[ 'imageUrl' ] : '';
		$listItem1 = ! empty( $instance[ 'listItem1' ] ) ? $instance[ 'listItem1' ] : '';
		$listItem2 = ! empty( $instance[ 'listItem2' ] ) ? $instance[ 'listItem2' ] : '';
		$listItem3 = ! empty( $instance[ 'listItem3' ] ) ? $instance[ 'listItem3' ] : '';
		$listItem4 = ! empty( $instance[ 'listItem4' ] ) ? $instance[ 'listItem4' ] : '';
?>

<p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title for section with tabs</label></p>
<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"
  name="<?php echo $this->get_field_name( 'title' ); ?>" size="40" value="<?php echo esc_attr( $title ); ?>" />

<p><label for="<?php echo $this->get_field_id( 'firstTab' ); ?>">Title for first tab</label></p>
<input type="text" id="<?php echo $this->get_field_id( 'firstTab' ); ?>"
  name="<?php echo $this->get_field_name( 'firstTab' ); ?>" size="40" value="<?php echo esc_attr( $firstTab ); ?>" />

<p><label for="<?php echo $this->get_field_id( 'secondTab' ); ?>">Title for second tab</label></p>
<input type="text" name="<?php echo $this->get_field_name( 'secondTab' ); ?>" size="40" value="<?php echo esc_attr( $secondTab );
 ?>" id="<?php echo $this->get_field_id( 'secondTab' );?>" />

<p><label for="<?php echo $this->get_field_id( 'thirdTab' ); ?>">Title for third tab</label></p>
<input type="text" name="<?php echo $this->get_field_name( 'thirdTab' ); ?>" size="40" value="<?php echo esc_attr( $thirdTab );
 ?>" id="<?php echo $this->get_field_id( 'thirdTab' );?>" />

<br />
<br />
<hr>
<br />
<h3 class='text-center'>List Items ( max - four items )</h3>

<p><label for="<?php echo $this->get_field_id( 'listItem1' ); ?>">Content for first list item</label></p>
<input type="text" name="<?php echo $this->get_field_name( 'listItem1' ); ?>" size="40" value="<?php echo esc_attr( $thirdTab );
 ?>" id="<?php echo $this->get_field_id( 'listItem1' );?>" />

<p><label for="<?php echo $this->get_field_id( 'listItem2' ); ?>">Content for second list item</label></p>
<input type="text" name="<?php echo $this->get_field_name( 'listItem2' ); ?>" size="40" value="<?php echo esc_attr( $listItem2 );
 ?>" id="<?php echo $this->get_field_id( 'listItem2' );?>" />

<p><label for="<?php echo $this->get_field_id( 'listItem3' ); ?>">Content for third list item</label></p>
<input type="text" name="<?php echo $this->get_field_name( 'listItem3' ); ?>" size="40" value="<?php echo esc_attr( $listItem3 );
 ?>" id="<?php echo $this->get_field_id( 'listItem3' );?>" />

<p><label for="<?php echo $this->get_field_id( 'listItem4' ); ?>">Content for fourth list item</label></p>
<input type="text" name="<?php echo $this->get_field_name( 'listItem4' ); ?>" size="40" value="<?php echo esc_attr( $listItem4 );
 ?>" id="<?php echo $this->get_field_id( 'listItem4' );?>" />

<p><label>Image:</label></p>
<input type="button" class="button button-secondary upload-button" value="Upload icon for list items">
<input type="hidden" class="upload-picture" value="<?php echo esc_attr( $imageUrl );?>"
  name="<?php echo $this->get_field_name( 'imageUrl' ); ?>" />
<br />
<br />

<img class="upload-picture-preview" src="<?php echo $imageUrl;?>" style="max-width: 400px; max-height: 400px;" />

<br />
<hr>
<br />
<h3>Section for editing button</h3>
<p><label for="<?php echo $this->get_field_id( 'btnText' ); ?>">Text for button</label></p>

<input type="text" id="<?php echo $this->get_field_id( 'btnText' ); ?>"
  name="<?php echo $this->get_field_name( 'btnText' ); ?>" size="40" value="<?php echo esc_attr($btnText) ; ?>" />

<p><label for="<?php echo $this->get_field_id( 'btnUrl' ); ?>">Url for button</label></p>

<input type="text" id="<?php echo $this->get_field_id( 'btnUrl' ); ?>"
  name="<?php echo $this->get_field_name( 'btnUrl' ); ?>" size="40" value="<?php echo esc_attr( $btnUrl ); ?>" />

<?php
  }

  public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'firstTab' ] = strip_tags( $new_instance[ 'firstTab' ] );
		$instance[ 'secondTab' ] = strip_tags( $new_instance[ 'secondTab' ] );
		$instance[ 'thirdTab' ] = strip_tags( $new_instance[ 'thirdTab' ] );
		$instance[ 'btnText' ] = strip_tags( $new_instance[ 'btnText' ] );
		$instance[ 'btnUrl' ] = strip_tags( $new_instance[ 'btnUrl' ] );
		$instance[ 'imageUrl' ] = strip_tags( $new_instance[ 'imageUrl' ] );
		$instance[ 'listItem1' ] = strip_tags( $new_instance[ 'listItem1' ] );
		$instance[ 'listItem2' ] = strip_tags( $new_instance[ 'listItem2' ] );
		$instance[ 'listItem3' ] = strip_tags( $new_instance[ 'listItem3' ] );
		$instance[ 'listItem4' ] = strip_tags( $new_instance[ 'listItem4' ] );
		return $instance;
  }
}
register_widget( 'Are_you' );
?>