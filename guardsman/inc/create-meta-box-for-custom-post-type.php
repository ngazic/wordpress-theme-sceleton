<?php
function guardsman_add_custom_meta_box() {
  add_meta_box( 'cstMeta1', 'Workflow items', 'guardsman_faqs_callback', 'FAQs','side');
}

function guardsman_faqs_callback($post) {
wp_nonce_field( basename( __FILE__), 'guardsman_workflow-items-meta-box_nonce' );
$guardsman_stored_meta = get_post_meta( $post->ID );
?>

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
<?php
}
function guardsman_save_cstMetaData($post_id){
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'guardsman_workflow-items-meta-box_nonce' ] ) && wp_verify_nonce( $_POST[ 'guardsman_workflow-items-meta-box_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
  // Exits script depending on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
      return;
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
}
?>