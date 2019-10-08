<?php
class workflow_Widget extends WP_Widget {
  /**
  * To create the example widget all four methods will be 
  * nested inside this single instance of the WP_Widget class.
  **/

  public function __construct() {
    $widget_options = array(
      'classname' => 'workflow_Widget',
      'description' => 'This is an widget for workflows. This widget has 4 boxes with title and content.',
    );
    parent::__construct( 'workflow_Widget', 'Widget Worklow', $widget_options );
  }
 
  //front-end function
  public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $text = apply_filters( 'widget_title', $instance[ 'text' ] );
    $workflowIcon = apply_filters( 'widget_title', $instance[ 'workflowIcon' ] );
    
    $boxTitle1 = apply_filters( 'widget_title', $instance[ 'boxTitle1' ] );
    $boxContent1 = apply_filters( 'widget_title', $instance[ 'boxContent1' ] );
    
    $boxTitle2 = apply_filters( 'widget_title', $instance[ 'boxTitle2' ] );
    $boxContent2 = apply_filters( 'widget_title', $instance[ 'boxContent2' ] );
    
    $boxTitle3 = apply_filters( 'widget_title', $instance[ 'boxTitle3' ] );
    $boxContent3 = apply_filters( 'widget_title', $instance[ 'boxContent3' ] );
    
    $boxTitle4 = apply_filters( 'widget_title', $instance[ 'boxTitle4' ] );
    $boxContent4 = apply_filters( 'widget_title', $instance[ 'boxContent4' ] );

    $btnText = apply_filters( 'widget_title', $instance[ 'btnText' ] );
    $btnLink = apply_filters( 'widget_title', $instance[ 'btnLink' ] );

    echo $args['before_widget']?>

<div class="row workflow-heading">
  <div class="col-md-offset-3 col-md-6 col-xs-12 col-xs-offset-0">
    <div class="content">
      <h2 class="h2 h2--with-underline">
        <?php  echo $title ?>
      </h2>
      <table class="spacer">
        <tr>
          <td height="41"></td>
        </tr>
      </table>
      <p class="text"> <?php  echo $text ?></p>
    </div>
  </div>
</div>
<table class="spacer">
  <tr>
    <td height="79"></td>
  </tr>
</table>
<div class="row workflow">
  <div class="col-md-8 col-md-offset-2 col-xs-12 col-xs-offset-0">
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="workflow-item item-1">
          <img class="list-item-icon" src="<?php echo $workflowIcon ?>" alt="">
          <h5 class="workflow-item-title">
            <?php echo $boxTitle1 ?>
          </h5>
          <p class="workflow-text">
            <?php echo $boxContent1 ?></p>
        </div>

        <div class="workflow-item item-2">
          <img class="list-item-icon" src="<?php echo $workflowIcon ?>" alt="">
          <h5 class="workflow-item-title">
            <?php echo $boxTitle2 ?>
          </h5>
          <p class="workflow-text">
            <?php echo $boxContent2 ?></p>
        </div>
      </div>

      <div class="col-md-6 col-xs-12">
        <div class="workflow-item item-3">
          <img class="list-item-icon" src="<?php echo $workflowIcon ?>" alt="">
          <h5 class="workflow-item-title">
            <?php echo $boxTitle3 ?>
          </h5>
          <p class="workflow-text">
            <?php echo $boxContent3 ?></p>
        </div>

        <div class="workflow-item item-4">
          <img class="list-item-icon" src="<?php echo $workflowIcon ?>" alt="">
          <h5 class="workflow-item-title">
            <?php echo $boxTitle4 ?>
          </h5>
          <p class="workflow-text">
            <?php echo $boxContent4 ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row workflow-button justify-content-center">
  <a class="button" id="portfolio-posts-btn" href="<?php //echo $btnLink ?>"><?php echo $btnText ?></a>
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
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
    $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
    $workflowIcon = ! empty( $instance['workflowIcon'] ) ? $instance['workflowIcon'] : ''; 

    $boxTitle1 = ! empty( $instance['boxTitle1'] ) ? $instance['boxTitle1'] : ''; 
    $boxContent1 = ! empty( $instance['boxContent1'] ) ? $instance['boxContent1'] : ''; 

    $boxTitle2 = ! empty( $instance['boxTitle2'] ) ? $instance['boxTitle2'] : ''; 
    $boxContent2 = ! empty( $instance['boxContent2'] ) ? $instance['boxContent2'] : ''; 

    $boxTitle3 = ! empty( $instance['boxTitle3'] ) ? $instance['boxTitle3'] : ''; 
    $boxContent3 = ! empty( $instance['boxContent3'] ) ? $instance['boxContent3'] : ''; 

    $boxTitle4 = ! empty( $instance['boxTitle4'] ) ? $instance['boxTitle4'] : ''; 
    $boxContent4 = ! empty( $instance['boxContent4'] ) ? $instance['boxContent4'] : '';

    $btnText = ! empty( $instance['btnText'] ) ? $instance['btnText'] : '';
    $btnLink = ! empty( $instance['btnLink'] ) ? $instance['btnLink'] : '';
?>
<h2>WORKFLOW</h2>
<!-- Title Section -->
<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>">Workflow title:</label>
</p>
<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>"
  name="<?php echo $this->get_field_name( 'title' ); ?>" size="40" value="<?php echo esc_attr( $title ); ?>" />
<p>
  <label for="<?php echo $this->get_field_id( 'text' ); ?>">Content text:</label>
</p>
<textarea name="<?php echo $this->get_field_name( 'text' ); ?> id=" <?php echo $this->get_field_id( 'text' );?>
  cols="40" rows="5"><?php echo esc_attr( $text ); ?></textarea>
  
  <!-- Box 1 -->
<hr>
<h4>ITEM 1 AREA:</h4>
<p>
  <label for="<?php echo $this->get_field_id( 'boxTitle1' ); ?>">Item 1 title:</label>
</p>
<input type="text" id="<?php echo $this->get_field_id( 'boxTitle1' ); ?>"
  name="<?php echo $this->get_field_name( 'boxTitle1' ); ?>" size="40" value="<?php echo esc_attr( $boxTitle1 ); ?>" />
<p>
  <label for="<?php echo $this->get_field_id( 'boxContent1' ); ?>">Item 1 text:</label>
</p>
<textarea name="<?php echo $this->get_field_name( 'boxContent1' ); ?> id="
  <?php echo $this->get_field_id( 'boxContent1' );?> cols="40"
  rows="5"><?php echo esc_attr( $boxContent1 ); ?></textarea>
  
  <!-- Box 2 -->
<hr> 
<h4>ITEM 2 AREA:</h4>
<p>
  <label for="<?php echo $this->get_field_id( 'boxTitle2' ); ?>">TItem 2 title:</label>
</p>
<input type="text" id="<?php echo $this->get_field_id( 'boxTitle2' ); ?>"
  name="<?php echo $this->get_field_name( 'boxTitle2' ); ?>" size="40" value="<?php echo esc_attr( $boxTitle2 ); ?>" />
<p>
  <label for="<?php echo $this->get_field_id( 'boxContent2' ); ?>">Item 2 text:</label>
</p>
<textarea name="<?php echo $this->get_field_name( 'boxContent2' ); ?> id="
  <?php echo $this->get_field_id( 'boxContent2' );?> cols="40"
  rows="5"><?php echo esc_attr( $boxContent2 ); ?></textarea>
  
  <!-- Box 3 -->
 
<hr> 
<h4>ITEM 3 AREA:</h4> 
<p>
  <label for="<?php echo $this->get_field_id( 'boxTitle3' ); ?>">Item 3 title:</label>
</p>
<input type="text" id="<?php echo $this->get_field_id( 'boxTitle3' ); ?>"
  name="<?php echo $this->get_field_name( 'boxTitle3' ); ?>" size="40" value="<?php echo esc_attr( $boxTitle3 ); ?>" />
<p>
  <label for="<?php echo $this->get_field_id( 'boxContent3' ); ?>">Item 3 text:</label>
</p>
<textarea name="<?php echo $this->get_field_name( 'boxContent3' ); ?> id="
  <?php echo $this->get_field_id( 'boxContent3' );?> cols="40"
  rows="5"><?php echo esc_attr( $boxContent3 ); ?></textarea>

  <!-- Box 4 -->

<hr>
<h4>ITEM 4 AREA:</h4>
<p>
  <label for="<?php echo $this->get_field_id( 'boxTitle4' ); ?>">Item 4 title:</label>
</p>
<input type="text" id="<?php echo $this->get_field_id( 'boxTitle4' ); ?>"
  name="<?php echo $this->get_field_name( 'boxTitle4' ); ?>" size="40" value="<?php echo esc_attr( $boxTitle4 ); ?>" />
<p>
  <label for="<?php echo $this->get_field_id( 'boxContent4' ); ?>">Item 4 text:</label>
</p>
<textarea name="<?php echo $this->get_field_name( 'boxContent4' ); ?> id="
  <?php echo $this->get_field_id( 'boxContent4' );?> cols="40"
  rows="5"><?php echo esc_attr( $boxContent4 ); ?></textarea>
  
  <!-- Button Text -->
<hr>  
<h4>BUTTON AREA:</h4>
<p>
  <label for="<?php echo $this->get_field_id( 'btnText' ); ?>">Button text:</label>
</p>
<input type="text" id="<?php echo $this->get_field_id( 'btnText' ); ?>"
  name="<?php echo $this->get_field_name( 'btnText' ); ?>" size="40" value="<?php echo esc_attr( $btnText ); ?>" />
  
  <!-- Button Link -->
  <p>
  <label for="<?php echo $this->get_field_id( 'btnLink' ); ?>">Button link:</label>
</p>
<input type="text" id="<?php echo $this->get_field_id( 'btnLink' ); ?>"
  name="<?php echo $this->get_field_name( 'btnLink' ); ?>" size="40" value="<?php echo esc_attr( $btnLink ); ?>" />
  <hr>  
  
  <!-- Image Upload -->
<div class="upload-picture-preview"
  style="min-height:200px;max-width:300px;background-size:contain;background-repeat:no-repeat;background-image:url('<?php echo esc_url( $workflowIcon ) ?> ');">
</div>
<input type="button" class="button button-secondary upload-button" value="Upload Profile Picture"
  id="upload-button"><input type="hidden" class="upload-picture"
  name="<?php echo $this->get_field_name( 'workflowIcon' ); ?>" value="<?php echo esc_url( $workflowIcon );?> " />
<?php 
}

  //update function
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'text' ] = strip_tags( $new_instance[ 'text' ] );
    $instance[ 'workflowIcon' ] = strip_tags( $new_instance[ 'workflowIcon' ] );

    $instance[ 'boxTitle1' ] = strip_tags( $new_instance[ 'boxTitle1' ] );
    $instance[ 'boxContent1' ] = strip_tags( $new_instance[ 'boxContent1' ] );

    $instance[ 'boxTitle2' ] = strip_tags( $new_instance[ 'boxTitle2' ] );
    $instance[ 'boxContent2' ] = strip_tags( $new_instance[ 'boxContent2' ] );

    $instance[ 'boxTitle3' ] = strip_tags( $new_instance[ 'boxTitle3' ] );
    $instance[ 'boxContent3' ] = strip_tags( $new_instance[ 'boxContent3' ] );

    $instance[ 'boxTitle4' ] = strip_tags( $new_instance[ 'boxTitle4' ] );
    $instance[ 'boxContent4' ] = strip_tags( $new_instance[ 'boxContent4' ] );

    $instance[ 'btnText' ] = strip_tags( $new_instance[ 'btnText' ] );
    $instance[ 'btnLink' ] = strip_tags( $new_instance[ 'btnLink' ] );

    return $instance;
  }
}

	register_widget( 'workflow_Widget' );
?>