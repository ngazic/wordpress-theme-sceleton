<?php
require 'function-admin.php';
require get_template_directory() . '/inc/widget-footer.php';
require get_template_directory() . '/inc/widget-are-you.php';
require get_template_directory() . '/inc/widget-cta.php';
require get_template_directory() . '/inc/widget-features.php';
require get_template_directory() . '/inc/widget-latest-posts.php';
require get_template_directory() . '/inc/widget-testimonials.php';
require get_template_directory() . '/inc/widget-workflow.php';
require get_template_directory() . '/inc/widget-image-with-caption.php';
require get_template_directory() . '/inc/create-meta-box-for-custom-post-type.php';
require get_template_directory() . '/inc/create-meta-box-to-post.php';
require get_template_directory() . '/inc/register-custom-post-type.php';
require get_template_directory() . '/inc/register-widget-area.php';
require get_template_directory() . '/inc/create-meta-boxes.php';
require get_template_directory() . '/inc/customize-appereance-options.php';

if (function_exists('add_theme_support'))
{
  add_theme_support( 'menus' );
  add_theme_support( 'post-thumbnails') ;
  add_image_size( 'large', 700, '', true ); // Large Thumbnail
  add_image_size( 'medium', 250, '', true ); // Medium Thumbnail
  add_image_size( 'small', 120, '', true ); // Small Thumbnail
  add_image_size( 'custom-size', 700, 200, true ); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
  load_theme_textdomain( 'guardsman', get_template_directory() . '/languages' );
}
function guardsman_enqueue_style() {
	wp_enqueue_style( 'guardsman-global-style', get_theme_file_uri('style.css') );
    wp_enqueue_script( 'vendor',get_theme_file_uri( 'js/vendorBundle.js' ) );
    wp_enqueue_script( 'main',get_theme_file_uri('js/bundle.js'), NULL, '1.0.0', true );
    wp_localize_script('main_js', 'gardsmanData', array(
      'nonce' => wp_create_nonce( 'wp_rest' ),
      'siteURL' => get_site_url(),
	));
  wp_enqueue_media();
}

function admin_enqueue_scripts() {
  wp_enqueue_media();
  wp_enqueue_script( 'vendor', get_theme_file_uri( 'js/upload-Admin.js' ) );
}

function guardsman_init(){
  add_theme_support( 'post-thumbnail' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'html5',
      array( 'comment-list', 'comment-form', 'search-form' )
  );
}

add_action( 'init', 'guardsman_custom_post_type_faq' );
add_action( 'init', 'guardsman_custom_post_type_testimonials' );
add_action( 'init', 'guardsman_custom_post_type_features' );
add_action( 'wp_enqueue_scripts', 'guardsman_enqueue_style' );
add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts' );
add_action( 'after_setup_theme', 'guardsman_init' );
add_action( 'after_setup_theme', 'register_custom_nav_menus' );
add_action( 'rest_api_init', 'register_rest_images' ); // registering featured images in wp aoi

function register_rest_images(){
  register_rest_field( array( 'post' ),
    'fimg_url',
    array(
        'get_callback'    => 'get_rest_featured_image',
        'update_callback' => null,
        'schema'          => null,
    )
  );
}

function get_rest_featured_image( $object, $field_name, $request ) {
  if( $object[ 'featured_media' ] ){
    $img = wp_get_attachment_image_src( $object[ 'featured_media' ], 'app-thumb' );
    return $img[ 0 ];
  }
  return false;
}

function register_custom_nav_menus() {
	register_nav_menus( array(
		'Header' => 'OnBoard Header Navigation Menu',
	) );
}

function IsNullOrEmptyString( $str ){
  return (! isset( $str ) || trim( $str ) === '');
}

/**
 * =========================================
 * =========================================
 */
add_action('wp_loaded', 'guardsmanTheme_create_extra_table' );
//  * CREATE DATABASE TABLE FOR EMAILS

function guardsmanTheme_create_extra_table(){
  global $wpdb;
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  $table_name = $wpdb->prefix . "guardsmanEmails";  //get the database table prefix to create my new table
  $sql = "CREATE TABLE $table_name (
    id int(10) unsigned NOT NULL AUTO_INCREMENT,
    email varchar(255) NOT NULL,
    time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    PRIMARY KEY  (id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
  dbDelta( $sql );
}

function guardsman_add_email( $email ) {
	global $wpdb;
	$table_name = $wpdb->prefix . 'guardsmanEmails';
	$wpdb->insert(
		$table_name,
		array(
			'time' => current_time( 'mysql' ),
			'email' => $email
		)
	);
}


/**
 * ===========================================
 * ===========================================
 *              TIMBER
 * ===========================================
 * ===========================================
 */


/**
 * Timber starter-theme
 * https://github.com/timber/starter-theme
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */
if (!class_exists('Timber')) {
  add_action('admin_notices', function () {
    echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
  });
  add_filter('template_include', function ($template) {
    return get_stylesheet_directory() . '/static/no-timber.html';
  });
  return;
}
else{
  /**
   * Sets the directories (inside your theme) to find .twig files
   */
  Timber::$dirname = array('components/templates/');
  /**
   * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
   * No prob! Just set this value to true
   */
  Timber::$autoescape = false;






  /**
   * CUSTOM ALIAS LOADER FOR TIMBER === MTH IT TEAM ===
   * ===========================================
   * Loads template from the filesystem.
   * ===========================================
   *
   *
   */
  class Guardian_Alias_Loader implements Twig_LoaderInterface, Twig_ExistsLoaderInterface
  {
    protected $aliases = array();
    public function __construct($aliases = array())
    {
      $this->setAliases($aliases);
    }
    public function setAliases($aliases)
    {
      if (!is_array($aliases)) return;
      foreach ($aliases as $handle => $path) {
        if (ctype_digit($handle)) continue;
        $this->aliases[$handle] = $path;
      }
    }
    public function getSource($name)
    {
      return file_get_contents($this->findTemplate($name));
    }
    public function getCacheKey($name)
    {
      return $this->findTemplate($name);
    }
    public function exists($name)
    {
      return !empty($this->aliases[$name]);
    }
    public function isFresh($name, $time)
    {
      return filemtime($this->findTemplate($name)) <= $time;
    }
    protected function findTemplate($name)
    {
      $throw = func_num_args() > 1 ? func_get_arg(1) : true;
      if (!empty($this->aliases[$name])) {
        return $this->aliases[$name];
      }
      if ($throw) {
        $msg = sprintf('Unable to find template "%s".', $name);
        throw new Twig_Error_Loader($msg);
      }
      return false;
    }
  }

  function fractal_twig_loader($loader)
  {
    $alias_handles = get_fractal_handles();
    $alias_loader = new Guardian_Alias_Loader($alias_handles);
    $chain_loader = new \Twig_Loader_Chain([$loader, $alias_loader]);
    return $chain_loader;
  }
  add_filter('timber/loader/loader', 'fractal_twig_loader');

  function get_fractal_handles()
  {
    global $guardian_twig_aliases;
    if (!isset($guardian_twig_aliases)) {
      $guardian_twig_aliases = get_all_twig_file_alias_array("components");
    }
    return $guardian_twig_aliases;
  }

  function get_all_twig_file_alias_array($rootFolderName)
  {
    $path = __DIR__ . '/'.$rootFolderName;
    $allTWIGS = array();
    $temp = glob($path . '/*', GLOB_ONLYDIR);
    if ($temp) {
      $allTWIGS = read_twig_directories($temp);
      if (get_twig_file($path)) {
        foreach (get_twig_file($path) as $value) {  
          $tempTwigKey = get_string_between($value, "/", ".twig");
          $allTWIGS[$tempTwigKey] = $value;
        }
        // Uncoment this section to print values 
        // echo "<pre>";
        // print_r($allTWIGS);
        // echo "</pre>";
      }
    }
    return $allTWIGS;
  }

  // helper function => returns false if no match
  function get_subfolder($folder_path)
  {
    $path = $folder_path . '/*';
    return glob($path, GLOB_ONLYDIR);
  }

  // helper function => returns false if no match
  function get_twig_file($file_path)
  {
    $path = $file_path . '/*.twig';
    return glob($path);
  }

  // function to search all subfolders and get twig files from them
  function read_twig_directories($array)
  {
    if (count($array) == 0) {
      return array();
    }
    $returnTwigPaths = array();
    $twigdfolders = array();
    foreach ($array as $fol) {
      $tmpSubFolders = get_subfolder($fol);
      if ($tmpSubFolders) {
        $twigdfolders = array_merge($twigdfolders, $tmpSubFolders);
      }
      $twigFile = get_twig_file($fol);
      if ($twigFile) {
        foreach ($twigFile as $f) {
          $twigKey = get_string_between($f, "/", ".twig");
          $returnTwigPaths[$twigKey] = $f;
        }
      }
    }
    return array_merge($returnTwigPaths, read_twig_directories($twigdfolders));
  }

  // helper function
  function get_string_between($string, $start, $end)
  {
    $string = ' ' . $string;
    $ini = strripos($string, "/", -1);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return '@' . substr($string, $ini, $len);
  }
}