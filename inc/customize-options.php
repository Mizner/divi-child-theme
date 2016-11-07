<?php
add_action( 'customize_register', 'unset_divi_options', 999 );
function unset_divi_options( $wp_customize ) {
	$wp_customize->remove_panel( 'et_divi_header_panel' );
	$wp_customize->remove_panel( 'et_divi_footer_panel' );
	$wp_customize->remove_panel( 'et_divi_buttons_settings' );
	$wp_customize->remove_panel( 'et_divi_mobile' );
	$wp_customize->remove_section( 'et_color_schemes' );
	$wp_customize->remove_section( 'themes' );
	$wp_customize->remove_section( 'title_tagline' );
	$wp_customize->add_section( 'title_tagline', array(
		'title'    => esc_html__( 'Site Identity', 'Divi' ),
		'priority' => - 2,
	) );
}

add_action( 'admin_bar_menu', 'change_divi_customizer_admin_menu', 9999 );
function change_divi_customizer_admin_menu( $wp_admin_bar ) {
	$wp_admin_bar->remove_menu( 'customize-divi-module' );
	$wp_admin_bar->remove_menu( 'customize-divi-theme' );
	$wp_admin_bar->remove_menu( 'et-use-visual-builder' );
}

add_action( 'admin_menu', 'remove_divi_submenus', 9999 );
function remove_divi_submenus() {
	remove_submenu_page( 'et_divi_options', 'customize.php?et_customizer_option_set=module' );
}

add_action( 'admin_bar_menu', 'move_divi_customizer', 9999 );
function move_divi_customizer( $wp_admin_bar ) {
	if ( et_pb_is_allowed( 'theme_customizer' ) ) {
		$current_url   = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$customize_url = add_query_arg( 'url', urlencode( $current_url ), wp_customize_url() );
		$wp_admin_bar->add_menu( array(
			'id'    => 'customize-divi-theme-again',
			'title' => esc_html__( 'Customizer', 'Divi' ),
			'href'  => $customize_url . '&et_customizer_option_set=theme',
			'meta'  => array(
				'class' => 'hide-if-no-customize',
			),
		) );
	}
}
