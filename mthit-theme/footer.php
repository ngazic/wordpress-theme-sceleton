<footer>
<?php if (is_active_sidebar('mthit_sidebar1_widget_area')) : ?>
    <?php dynamic_sidebar('mthit_sidebar1_widget_area');
    endif; ?>
  <p class="footer"> this is the main footer</p>
  <?php wp_nav_menu(array('theme_location'=>'secondary',
                          'menu_class'=> 'mthit-menu-footer')); ?>
<div class="search">
  <?php 
  //for calling search in our pages
  get_search_form(); ?>
</div>
</footer>

<?php 

// this line is necessary for including scripts 
wp_footer();
 ?>

</body>

</html>