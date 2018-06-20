<?php
namespace Vincit;

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
require_once __DIR__ . '/vendor/autoload.php';
use Timber\Site;

class StarterSite extends Site {

  protected function __construct() {
      add_theme_support('post-formats');
      add_theme_support('post-thumbnails');
      add_theme_support('menus');
      add_filter('timber_context', array($this, 'add_to_context'));
      add_filter('get_twig', array($this, 'add_to_twig'));
      add_action('init', array($this, 'register_post_types'));
      add_action('init', array($this, 'register_taxonomies'));
      parent::__construct();
  }

  public function register_post_types() {
      //this is where you can register custom post types
  }

  public function register_taxonomies() {
      //this is where you can register custom taxonomies
  }

  public function add_to_context($context) {
      $context['menu'] = new Timber\Menu();
      $context['site'] = $this;
      return $context;
  }

  public function add_to_twig($twig) {
      /* this is where you can add your own fuctions to twig */
      $twig->addExtension(new Twig_Extension_StringLoader());
      /** Example how to add a filter
      $twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', function(){
                  # some filter code
      }));
      */
       /** Example how to add a function
       $twig->addFunction(new Twig_SimpleFunction($MyTwigFunction',function ($MyArgument1) {
        // some code
     }));
       */
      return $twig;
  }
}

new StarterSite();
