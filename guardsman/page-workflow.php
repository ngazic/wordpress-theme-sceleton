<?php 
	/**
	 * Template Name: Workflow 
	 */
  ?>

<!-- slider -->
<section>
  <?php
$args = array('post_type' => 'post',
              'posts_per_page' => 3);
$sliderList = new WP_Query($args); ?>

  <div class="glide intro glide--ltr glide--slider glide--swipeable">
    <?php get_header(); ?>
    <div class="mask-bottom"></div>
    <div class="mask-bg"></div>
    <div data-glide-el="track" class="glide__track">
      <ul class="glide__slides">
        <?php while($sliderList->have_posts()): $sliderList->the_post();
       $post_date = get_the_date( 'd.m.Y' );
       $categories = get_the_category();
       $category_name = $categories[0]->name;
      ?>
        <li class="glide__slide">
          <article class="intro-content-tags">
            <ul class="tag-list">
              <li class="tag-list-item "><?php echo $post_date ?></li>
              <li class="tag-list-item "><?php the_author();?></li>
              <li class="tag-list-item "><?php echo $category_name ?></li>
            </ul>
            <h1 class="intro-title"><?php the_title();?></h1>
            <div class="btn-wrapper">
              <a class="button" href="##">READ MORE</a>
              <span class="estimate-reading">5 min read</span>
            </div>
          </article>
        </li>
        <?php endwhile;?>
      </ul>
    </div>
    <div data-glide-el="controls[nav]" class="bullet-wrapper">
      <div class="glide__bullet"></div>
      <div class="glide__bullet"></div>
      <div class="glide__bullet"></div>
    </div>
    <div data-glide-el="controls[nav]">
      <button class="arrow-left-slider glide--rtl" data-glide-dir="<"></button>
      <button class="arrow-right-slider glide--ltr" data-glide-dir=">"></button>
    </div>
    <div class="share-icons">
      <a href="" class="twitter"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="13" viewBox="0 0 16 13">
          <g>
            <g>
              <path
                d="M5.067 12.978C11.11 12.978 14.4 8 14.4 3.644V3.2c.622-.444 1.156-1.067 1.6-1.689a7.379 7.379 0 0 1-1.867.533C14.844 1.6 15.29.978 15.556.267a8.153 8.153 0 0 1-2.045.8A3.175 3.175 0 0 0 11.111 0C9.333 0 7.822 1.511 7.822 3.289c0 .267 0 .533.09.711C5.155 3.822 2.755 2.578 1.155.533.889.978.71 1.6.71 2.223c0 1.155.622 2.133 1.422 2.755-.533 0-1.066-.178-1.51-.445 0 1.6 1.155 2.934 2.666 3.2-.267.09-.533.09-.889.09-.178 0-.444 0-.622-.09.444 1.334 1.6 2.223 3.11 2.311-1.155.89-2.577 1.423-4.088 1.423-.267 0-.533 0-.8-.09 1.422 1.067 3.2 1.6 5.067 1.6" />
            </g>
          </g>
        </svg>
      </a>
      <a href="" class="facebook"><svg xmlns="http://www.w3.org/2000/svg" width="9" height="16" viewBox="0 0 9 16">
          <g>
            <g>
              <path
                d="M5.422 16V8.711h2.49l.355-2.844H5.422V4.089c0-.8.267-1.422 1.422-1.422h1.512V.089C8 .089 7.11 0 6.133 0 4 0 2.49 1.333 2.49 3.733v2.134H0V8.71h2.489V16z" />
            </g>
          </g>
        </svg>
      </a>
      <a href="" class="internet"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
          <g>
            <g>

              <path
                d="M9.067 14.4c-.134 0-.134 0-.267-.133-.133-.134-.133-.134-.133-.267v-2.4c-.534-.133-.934-.4-1.2-.8-.4-.4-.534-.8-.534-1.333v-.534c-.933 0-1.866-.4-2.533-1.066C3.733 7.2 3.333 6.4 3.333 5.333c0-1.066.4-2 1.2-2.666C5.467 2 6.533 1.733 8 1.6c.267 0 .667.133 1.067.267.133 0 .266.133.266.266 0 .934-.266 1.734-.666 2.534.4.4.666.933.666 1.333 0 .133 0 .4-.133.533-.133.134-.4.134-.533.134-.134 0-.267-.134-.534-.267C8 6.133 7.6 6 7.467 6c-.134 0-.4.133-.534.267-.133.133-.266.266-.266.533 0 .4.133.667.4.933.4.134.8.267 1.2.267H9.6c.667 0 1.2.267 1.733.8.4.4.667.933.667 1.6 0 .933-.4 1.867-.933 2.8-.8.8-1.467 1.2-2 1.2zM0 8c0 2.267.933 4 2.4 5.6C3.867 15.2 5.733 16 8 16c2.267 0 4.133-.8 5.6-2.4C15.2 12.133 16 10.267 16 8c0-2.267-.8-4.133-2.4-5.6C12.133.8 10.267 0 8 0 5.733 0 3.867.8 2.4 2.4.8 3.867 0 5.733 0 8z" />
            </g>
          </g>
        </svg>
      </a>
    </div>
  </div>
</section>

<table class="spacer">
  <tr>
    <td height="130"></td>
  </tr>
</table>

<table class="spacer"><tr><td height="130"></td></tr></table>
<section>
  <?php if (is_active_sidebar('workflow_widget_area')) : ?>
  <div class="workflow_widget_area">
    <?php dynamic_sidebar('workflow_widget_area');
  endif; ?>
</section>
<?php get_footer(); ?>