<?php
function mthit_custom_post_type_faq(){
  register_post_type( 'FAQs',
      array(
          'rewrite' => array('slug' => 'faqs'),
          'labels' => array(
          'name' => 'FAQs',
          'all_items' => 'All FAQs',
          'singular_name' => 'FAQ',
          'add_new_item' => 'Add New FAQ',
          'edit_item' => 'Edit FAQ'
          ),
          'menu_icon' => 'dashicons-portfolio',
          'public' => true,
          'has-archive' => true,
          'supports' => array(
              'title', 'editor'
          )
      )
  );
}

function mthit_custom_post_type_testimonials(){
    register_post_type( 'Testimonials', 
        array(
            'rewrite' => array('slug' => 'testimonials'),
            'labels' => array(
            'name' => 'Testimonials',
            'all_items' => 'All Testimonials',
            'singular_name' => 'Testimonials',
            'add_new_item' => 'Add New Testimonials',
            'edit_item' => 'Edit Testimonials'
            ),
            'menu_icon'   => 'dashicons-update',
            'public' => true,
            'has-archive' => true,
            'supports' => array(
                'title', 'editor','thumbnail','excerpt'
            )
        )
    );
  }

// Adding hooks to register custom post types:   
add_action('init','mthit_custom_post_type_faq');
add_action('init','mthit_custom_post_type_testimonials');
?>
