<?php 
  $args = array(
    'type' => 'post',
    'posts_per_page' => 4,
    );
    global $post;
    $pageID = $post->ID;
    $keysOfMetaboxes = array('workflow_title','titleTextArea','title','contentTextArea','title2','contentTextArea2','title3','contentTextArea3','title4','contentTextArea4','wrokflowBtn');
    ?>
<div class="row workflow-heading">
  <div class="col-md-offset-3 col-md-6 col-xs-12 col-xs-offset-0">
    <div class="content">
      <h2 class="h2 h2--with-underline">
        <?php  echo get_post_meta($pageID,'workflow_title',true) ?>
      </h2>
      <table class="spacer">
        <tr>
          <td height="41"></td>
        </tr>
      </table>
      <p class="text"> <?php  echo get_post_meta($pageID,'titleTextArea',true) ?></p>
    </div>
  </div>
</div>
<table class="spacer">
  <tr>
    <td height="79"></td>
  </tr>
</table>
</div>
<div class="row workflow">
  <div class="col-md-8 col-md-offset-2 col-xs-12 col-xs-offset-0">
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <div class="workflow-item item-1">
          <img class="list-item-icon" src="<?php echo get_template_directory_uri().'/img/workflow-icon.png'?>" alt="">
          <h5 class="workflow-item-title">
            <?php  echo get_post_meta($pageID,'title',true) ?>
          </h5>
          <p class="workflow-text">
            <?php echo get_post_meta($pageID,'contentTextArea',true); ?></p>
        </div>


        <div class="workflow-item item-2">
          <img class="list-item-icon" src="<?php echo get_template_directory_uri().'/img/workflow-icon.png'?>" alt="">
          <h5 class="workflow-item-title">
            <?php  echo get_post_meta($pageID,'title2',true) ?>
          </h5>
          <p class="workflow-text">
            <?php echo get_post_meta($pageID,'contentTextArea2',true); ?></p>
        </div>


      </div>

      <div class="col-md-6 col-xs-12">
        <div class="workflow-item item-3">
          <img class="list-item-icon" src="<?php echo get_template_directory_uri().'/img/workflow-icon.png'?>" alt="">
          <h5 class="workflow-item-title">
            <?php  echo get_post_meta($pageID,'title3',true) ?>
          </h5>
          <p class="workflow-text">
            <?php echo get_post_meta($pageID,'contentTextArea3',true); ?></p>
        </div>


        <div class="workflow-item item-4">
          <img class="list-item-icon" src="<?php echo get_template_directory_uri().'/img/workflow-icon.png'?>" alt="">
          <h5 class="workflow-item-title">
            <?php  echo get_post_meta($pageID,'title4',true) ?>
          </h5>
          <p class="workflow-text">
            <?php echo get_post_meta($pageID,'contentTextArea4',true); ?></p>
        </div>


      </div>



    </div>
  </div>

</div>
<div class="row workflow-button justify-content-center">
  <a class="button" id="portfolio-posts-btn" href="#"><?php echo get_post_meta($pageID,'wrokflowBtn',true); ?></a>