<?php

//add_action( 'add_meta_boxes','guardsman_add_custom_meta_box');
//add_action( 'save_post', 'guardsman_save_cstMetaData');

//add custom meta box to specific template
//add_action('add_meta_boxes', 'add_product_meta');
function add_product_meta()
{
    global $post;
    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'page-faq.php' )
        {
            add_meta_box(
                'product_meta', // $id
                'Product Information', // $title
                'display_product_information', // $callback
                'page', // $page
                'normal', // $context
                'high'); // $priority
        }
    }
}

function display_product_information()
{
	?>
	<h4>Workflow item inside</h4>
	<label for="title">Title</label><br />
	<input type="text" id="title" name="title" value="<?php if ( ! empty ( $guardsman_stored_meta['title'] ) ) {
					echo esc_attr( $guardsman_stored_meta['title'][0] );
				} ?>" size="30" />  <br />  <br />
	<label for="contentTextArea">Content</label> <br /><textarea id="contentTextArea" name="contentTextArea" rows="4" cols="30"><?php if ( ! empty ( $guardsman_stored_meta['contentTextArea'] ) ) {
					echo esc_attr( $guardsman_stored_meta['contentTextArea'][0] );
				} ?></textarea>
	<?php
}
?>