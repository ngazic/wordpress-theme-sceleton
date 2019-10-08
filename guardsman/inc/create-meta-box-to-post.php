<?php
add_action( 'add_meta_boxes','testimonials_add_isFeatured_meta_box');
add_action( 'save_post', 'testimonials_save_isFeatured');

//testimonials meta box
function testimonials_add_isFeatured_meta_box() {
  add_meta_box( 'jobTitle', 'Job Title : ', 'testimonials_post_featured_callback', 'testimonials','side');
}

function testimonials_post_featured_callback($post) {
  wp_nonce_field( basename( __FILE__), 'testimonials_post_featured_meta_box_nonce' );
  $text = get_post_meta( $post->ID,'jobTitle',true);
  ?>

  <div class="job-title">
    <p>
      <label for="jobTitle">Enter job title : </label><br/>
    </p>
    <input type="text" id="jobTitle" name="jobTitle" value="<?php echo esc_attr( $text ); ?>">
  </div>

<?php } 
function testimonials_save_isFeatured($post_id){
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'testimonials_post_featured_meta_box_nonce' ] ) && wp_verify_nonce( $_POST[ 'testimonials_post_featured_meta_box_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
  // Exits script depending on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
    return;
  }
  /* item number 1 */
  if( isset($_POST['jobTitle']) ){
    update_post_meta($post_id, "jobTitle", $_POST["jobTitle"] );
  } else {
    delete_post_meta($post_id, "jobTitle");
  }
}
?>