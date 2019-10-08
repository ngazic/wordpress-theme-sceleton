<h1>This is sidebar in it's own file. Sidebar like the template part can be made and called in it's own template file</h1>
<?php if (is_active_sidebar('mthit_sidebar1_widget_area')) : ?>
    <?php dynamic_sidebar('mthit_sidebar1_widget_area');
    endif; ?>
  <p class="footer"> this is the main footer</p>
  <?php wp_nav_menu(array('theme_location'=>'secondary',
                          'menu_class'=> 'mthit-menu-footer')); ?>


