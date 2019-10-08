<?php

//CREATE meta box with update save and update
// add_action('add_meta_boxes', 'add_stage_meta');
//add_action( 'save_post', 'guardsman_save_stage_metaData');
//add_action( 'save_post', 'guardsman_workflows_save_cstMetaData');
// add_action( 'save_post', 'blog_detail_background_image_save_meta_data_callback');

function add_stage_meta()
{
    global $post;
    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

        if($pageTemplate == 'page-workflow.php' && false)
        {
					add_meta_box(
					'stage_meta', // $id
					'Stage information', // $title
					'display_stage_information', // $callback
					'page', // $page
					'normal', // $context
					'high'); // $priority

					add_meta_box(
					'custom_workflow_items', // $id
					'Stage information', // $title
					'guardsman_workflows_callback', // $callback
					'page', // $page
					'normal', // $context
					'high'); // $priority
        }

        if( $pageTemplate == 'page-blog-detail.php' )
        {
					
					add_meta_box(
					'blog_detail_background_image', // $id
					'Stage information', // $title
					'blog_detail_background_image_callback', // $callback
					'page', // $page
					'normal', // $context
					'high'); // $priority
        }
    }
}

function display_stage_information($post)
{
	wp_nonce_field( basename( __FILE__), 'guardsman_stage-meta-box_nonce' );
	$guardsman_stored_meta = get_post_meta( $post->ID );
	?>
	<h4>Workflow item inside</h4>
	<label for="title">Page</label><br />
	<input type="text" id="titleStage" name="titleStage" value="<?php if ( ! empty ( $guardsman_stored_meta['titleStage'] ) ) {
		echo esc_attr( $guardsman_stored_meta['titleStage'][0] );
	} ?>" size="30" />  <br /> 
	<?php

}

function guardsman_save_stage_metaData($post_id){
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'guardsman_workflow-items-meta-box_nonce' ] ) && wp_verify_nonce( $_POST[ 'guardsman_workflow-items-meta-box_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
			return;
	}

	/* Title */
    if ( isset( $_POST[ 'titleStage' ] ) ) {
    	update_post_meta( $post_id, 'titleStage', sanitize_text_field( $_POST[ 'titleStage' ] ) );
	}
}

function guardsman_workflows_callback($post) {
  wp_nonce_field( basename( __FILE__), 'guardsman_workflow-items-meta-box_nonce' );
  $guardsman_stored_meta = get_post_meta( $post->ID );
  ?>
  
  <h4>Workflow Title</h4>
  <label for="workflow_title">Worfklow title</label><br />
  <input type="text" id="workflow_title" name="workflow_title" value="<?php if ( ! empty ( $guardsman_stored_meta['workflow_title'] ) ) {
		echo esc_attr( $guardsman_stored_meta['workflow_title'][0] );
	} ?>" size="30" />  <br />  <br />
  <label for="titleTextArea">Main Content</label> <br /><textarea id="titleTextArea" name="titleTextArea" rows="4" cols="30"><?php if ( ! empty ( $guardsman_stored_meta['titleTextArea'] ) ) {
		echo esc_attr( $guardsman_stored_meta['titleTextArea'][0] );
	} ?></textarea>
   <h4>Workflow item 1</h4>
  <label for="title">Title</label><br />
  <input type="text" id="title" name="title" value="<?php if ( ! empty ( $guardsman_stored_meta['title'] ) ) {
          echo esc_attr( $guardsman_stored_meta['title'][0] );
        } ?>" size="30" />  <br />  <br />
  <label for="contentTextArea">Content</label> <br /><textarea id="contentTextArea" name="contentTextArea" rows="4" cols="30"><?php if ( ! empty ( $guardsman_stored_meta['contentTextArea'] ) ) {
          echo esc_attr( $guardsman_stored_meta['contentTextArea'][0] );
        } ?></textarea>
  
  <h4>Workflow item 2</h4>
  <label for="title2">Title</label><br />
  <input type="text" id="title2" name="title2" value="<?php if ( ! empty ( $guardsman_stored_meta['title2'] ) ) {
		echo esc_attr( $guardsman_stored_meta['title2'][0] );
	} ?>" size="30" />  <br />  <br />
  <label for="contentTextArea2">Content</label> <br /><textarea id="contentTextArea2" name="contentTextArea2" rows="4" cols="30"><?php if ( ! empty ( $guardsman_stored_meta['contentTextArea2'] ) ) {
			echo esc_attr( $guardsman_stored_meta['contentTextArea2'][0] );
		} ?></textarea>
  
  <h4>Workflow item 3</h4>
  <label for="title3">Title</label><br />
  <input type="text" id="title3" name="title3" value="<?php if ( ! empty ( $guardsman_stored_meta['title3'] ) ) {
		echo esc_attr( $guardsman_stored_meta['title3'][0] );
	} ?>" size="30" />  <br />  <br />
  <label for="contentTextArea3">Content</label> <br /><textarea id="contentTextArea3" name="contentTextArea3" rows="4" cols="30"><?php if ( ! empty ( $guardsman_stored_meta['contentTextArea3'] ) ) {
		echo esc_attr( $guardsman_stored_meta['contentTextArea3'][0] );
	} ?></textarea>
  
  <h4>Workflow item 4</h4>
  <label for="title4">Title</label><br />
  <input type="text" id="title4" name="title4" value="<?php if ( ! empty ( $guardsman_stored_meta['title4'] ) ) {
		echo esc_attr( $guardsman_stored_meta['title4'][0] );
	} ?>" size="30" />  <br />  <br />
  <label for="contentTextArea3">Content</label> <br /><textarea id="contentTextArea4" name="contentTextArea4" rows="4" cols="30"><?php if ( ! empty ( $guardsman_stored_meta['contentTextArea4'] ) ) {
		echo esc_attr( $guardsman_stored_meta['contentTextArea4'][0] );
	} ?></textarea>

  <h4>Workflow button text</h4>
  <label for="wrokflowBtn">Button text</label><br />
  <input type="text" id="wrokflowBtn" name="wrokflowBtn" value="<?php if ( ! empty ( $guardsman_stored_meta['wrokflowBtn'] ) ) {
		echo esc_attr( $guardsman_stored_meta['wrokflowBtn'][0] );
	} ?>" size="30" />  <br />  <br />
  <?php
  }

function guardsman_workflows_save_cstMetaData($post_id){
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'guardsman_workflow-items-meta-box_nonce' ] ) && wp_verify_nonce( $_POST[ 'guardsman_workflow-items-meta-box_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
			return;
  }
    /* workflow title and main content */
	if ( isset( $_POST[ 'workflow_title' ] ) ) {
		update_post_meta( $post_id, 'workflow_title', sanitize_text_field( $_POST[ 'workflow_title' ] ) );
  }
  if ( isset( $_POST[ 'titleTextArea' ] ) ) {
		update_post_meta( $post_id, 'titleTextArea', sanitize_text_field( $_POST[ 'titleTextArea' ] ) );
  }
  
  /* item number 1 */
	if ( isset( $_POST[ 'title' ] ) ) {
		update_post_meta( $post_id, 'title', sanitize_text_field( $_POST[ 'title' ] ) );
  }
  if ( isset( $_POST[ 'contentTextArea' ] ) ) {
		update_post_meta( $post_id, 'contentTextArea', sanitize_text_field( $_POST[ 'contentTextArea' ] ) );
  }
  
  /* item number 2 */
	if ( isset( $_POST[ 'title2' ] ) ) {
		update_post_meta( $post_id, 'title2', sanitize_text_field( $_POST[ 'title2' ] ) );
  }
  if ( isset( $_POST[ 'contentTextArea2' ] ) ) {
		update_post_meta( $post_id, 'contentTextArea2', sanitize_text_field( $_POST[ 'contentTextArea2' ] ) );
  }
  
  /* item number 3 */
	if ( isset( $_POST[ 'title3' ] ) ) {
		update_post_meta( $post_id, 'title3', sanitize_text_field( $_POST[ 'title3' ] ) );
  }
  if ( isset( $_POST[ 'contentTextArea3' ] ) ) {
		update_post_meta( $post_id, 'contentTextArea3', sanitize_text_field( $_POST[ 'contentTextArea3' ] ) );
  }
  
  /* item number 4 */
	if ( isset( $_POST[ 'title4' ] ) ) {
		update_post_meta( $post_id, 'title4', sanitize_text_field( $_POST[ 'title4' ] ) );
  }
  if ( isset( $_POST[ 'contentTextArea4' ] ) ) {
		update_post_meta( $post_id, 'contentTextArea4', sanitize_text_field( $_POST[ 'contentTextArea4' ] ) );
  }

  /* workflow button */
  if ( isset( $_POST[ 'wrokflowBtn' ] ) ) {
    update_post_meta( $post_id, 'wrokflowBtn', sanitize_text_field( $_POST[ 'wrokflowBtn' ] ) );
  }
}

/**
   * ====================================================
   * blog details template callback functions
   * ====================================================
   */
  function blog_detail_background_image_callback($post){
    wp_nonce_field( basename( __FILE__), 'blog_detail_background_image_meta_box_nonce' );
    $bgImage = get_post_meta( $post->ID,'blog_detail_background',true);
    ?>
    <h4>upload background image</h4>
    <?php if($bgImage !== "") {
      ?>
      <div class="upload-picture-preview" style="min-height:200px;max-width:300px;background-size:contain;background-repeat:no-repeat;background-image:url('<?php echo $bgImage;  ?> ');">
      </div>
      <?php 
    }
   ?>

    <input type="button" class="button button-secondary upload-button" value="Upload Background Image" id="upload-button">
    <input type="hidden" class="upload-picture" name="blog_detail_background"value="<?php echo $bgImage; ?> " />

   <?php
  }
  function blog_detail_background_image_save_meta_data_callback($post_id){
    $is_autosave = wp_is_post_autosave( $post_id );
      $is_revision = wp_is_post_revision( $post_id );
      $is_valid_nonce = ( isset( $_POST[ 'blog_detail_background_image_meta_box_nonce' ] ) && wp_verify_nonce( $_POST[ 'blog_detail_background_image_meta_box_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
      // Exits script depending on save status
      if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
  
    /* Title */
      if ( isset( $_POST[ 'blog_detail_background' ] ) ) {
        update_post_meta( $post_id, 'blog_detail_background', esc_url( $_POST[ 'blog_detail_background' ] ) );
    }
  }
?>