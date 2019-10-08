<?php
/*
  /**
* Template Name: FAQs Page Template
*
  Main for creating templates is  "Template Name: xxxx"
*/
?>
<div class="stage">
  <?php get_header();
  $guardsman_stored_meta = get_post_meta( $post->ID );
?>
  <div class="mask-bg"></div>
    <div class="mask-bottom"></div>
    <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="headline push pull">
          <h1 class="h1 h1--underline"><?php echo get_the_title()?></h1>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$args = array('post_type' => 'faqs',
              'posts_per_page' => 6);
$faqList = new WP_Query($args);
$counter = 0;
if($faqList->have_posts()){?>
  <div class="row narrow">
    <ul class="accordion pull push">
      <?php
      while($faqList->have_posts()): $faqList->the_post();$counter++;?>
      <li>
          <div class="accordion-item">
            <input type="checkbox" id="accordion-item-id-<?php echo $counter;?>">
            <label for="accordion-item-id-<?php echo $counter;?>" class="text-center-mobile">
              <h4 class="h4 h4--with-underline"><?php the_title();?></h4>
            </label>
            <div class="text"><?php the_content()?></div>
          </div>
      </li>
      <?php endwhile;?>
    </ul>
  </div>
  <?php get_footer()?>
<?php } ?>