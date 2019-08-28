<?php
add_action('wp_enqueue_scripts', 'theme_critical_scripts');
add_action('get_footer', 'theme_scripts');

/* Vagrant */
define('WPT_ENQUEUE_STRIP_PATH', '/data/wordpress/htdocs');

/* Docker */
//define('WPT_ENQUEUE_STRIP_PATH', '/var/www/html');

// Critical scripts and styles goes to header
function theme_critical_scripts() {
  $styledir = get_stylesheet_directory();
  \rnb\core\enqueue($styledir . '/build/critical.css');
}

// on default load scripts and styles on footer
function theme_scripts() {
  $styledir = get_stylesheet_directory();

  wp_enqueue_script('jquery');
  
  // \rnb\core\enqueue("https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700", [], true);
  \rnb\core\enqueue($styledir . '/build/client.css');

  // \rnb\core\enqueue("https://use.fontawesome.com/[INSERT_HERE].js", [], true);
  \rnb\core\enqueue("https://cdn.polyfill.io/v2/polyfill.min.js?features=default,es6,fetch", [], true);
  \rnb\core\enqueue($styledir . '/build/client.js');

  // wp_localize_script('client-js', 'pll', pl_get_all_translations());
}

add_action('admin_enqueue_scripts', 'admin_scripts');

function admin_scripts() {
  $styledir = get_stylesheet_directory();

  \rnb\core\enqueue($styledir . '/build/admin.css');
  \rnb\core\enqueue($styledir . '/build/admin.js');
}

add_editor_style('build/editor.css');
