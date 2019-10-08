<?php

global $post;
?>
<main role="main">
  <div class="blog-header">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
          <?php if ( ( function_exists('has_post_thumbnail') ) && ( has_post_thumbnail() ) ) :
            $post_thumbnail_id = get_post_thumbnail_id();
            $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
            ?>
    <div class="blog-bg" style="background-image: url(<?php echo $post_thumbnail_url ?>" );">
    
          <?php endif; ?>
      <?php get_header(); ?>
    </div>
  </div>

  <?php  $post_date = get_the_date( 'd.m.Y' );
    $categories = get_the_category();?>
  <div class="blog-title row-narrow">
    <ul class="tag-list">
      <?php foreach ($categories as $c) {
      echo   '<li class="tag-list-item ">'.$c->name.'</li>';
    }?>
    </ul>
    <table class="spacer">
      <tr>
        <td height="15"></td>
      </tr>
    </table>
    <h1 class="h1 h1--post-title"><?php the_title(); ?></h1>
    <table class="spacer">
      <tr>
        <td height="28"></td>
      </tr>
    </table>
  </div>
  <div class="row-narrow">
    <div class="pull push">
      <?php the_content() ?>
    </div>


    <?php endwhile; endif; ?>

    <table class="spacer">
      <tr>
        <td height="150"></td>
      </tr>
    </table>
  </div>
  </div>
  </div>
  <?php if (is_active_sidebar('blog_detail_widget_area')) : ?>
    <?php dynamic_sidebar('blog_detail_widget_area');
    endif; ?>
  </div>
</main>
<?php get_footer(); ?>