<?php

$the_theme = new ThemeEnqueues();

add_action( 'wp_enqueue_scripts', [ $the_theme, 'queue_up' ] );

class ThemeEnqueues {

	public static function queue_up() {

		wp_enqueue_style( 'divi', PARENT_BASE_URI . '/style.css' );

		wp_enqueue_script( 'theme-js', THEME_BUILD_URI . PROJECT . '.min.js', array( 'jquery' ), THEME_VERSION, true );

		wp_enqueue_style( 'theme-css', THEME_BUILD_URI . PROJECT . '.min.css', array(), THEME_VERSION, 'all' );

		if (defined('GOOGLE_FONTS')) {
			wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=' . GOOGLE_FONTS );
		}

		wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );

		wp_enqueue_style( 'theme-info', get_stylesheet_uri() );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}