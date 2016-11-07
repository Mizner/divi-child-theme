<?php

define( 'PROJECT', 'ceveal' );
define( 'THEME_BASE_PATH', get_stylesheet_directory() );
define( 'PARENT_BASE_URI', get_template_directory_uri() );
define( 'THEME_BASE_URI', get_stylesheet_directory_uri() );
define( 'THEME_ASSETS_URI', THEME_BASE_URI . '/assets/' );
define( 'THEME_BUILD_URI', THEME_BASE_URI . '/dist/' );
//define( 'GOOGLE_FONTS', 'Source+Sans+Pro' );
define( 'THEME_VERSION', '1.0' );

require_once THEME_BASE_PATH . '/inc/enqueues.php';
require_once THEME_BASE_PATH . '/inc/phone-number.php';
require_once THEME_BASE_PATH . '/inc/social-media.php';
require_once THEME_BASE_PATH . '/inc/logo.php';
require_once THEME_BASE_PATH . '/inc/customize-options.php';
require_once THEME_BASE_PATH . '/inc/inline-code.php';