<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>

	<?php do_action( 'et_head_meta' ); ?>

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

	<?php $template_directory_uri = get_template_directory_uri(); ?>
	<!--[if lt IE 9]-->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page-container">
	<?php
	if ( is_page_template( 'page-template-blank.php' ) ) {
		return;
	}

	$et_secondary_nav_items = et_divi_get_top_nav_items();

	$et_phone_number = $et_secondary_nav_items->phone_number;

	$et_email = $et_secondary_nav_items->email;

	$et_contact_info_defined = $et_secondary_nav_items->contact_info_defined;

	$show_header_social_icons = $et_secondary_nav_items->show_header_social_icons;

	$et_secondary_nav = $et_secondary_nav_items->secondary_nav;

	$et_top_info_defined = $et_secondary_nav_items->top_info_defined;
	?>

	<header id="mainHeader" class="banner">
		<div id="headContainer">
			<div id="headerPrimary">
				<?php
				if ( function_exists( 'the_logo' ) ) {
					the_logo();
				}
				?>
			</div>
			<div id="headerSecondary">

				<div id="headerSecondaryTop">
					<?php
					if ( class_exists( 'SocialMedia' ) ) {
						SocialMedia::show();
					}
					if ( class_exists( 'PhoneNumber' ) ) {
						PhoneNumber::show();
					}
					?>
				</div>

				<div id="headerSecondaryMiddle">
					<?php
					$args = [
						'theme_location'  => 'secondary-menu',
						'container'       => '',
						'container_class' => '',
						'menu_class'      => 'top-menu site-menu',
						'menu_id'         => 'topMenu'
					];
					if ( has_nav_menu( 'secondary-menu' ) ) {
						wp_nav_menu( $args );
					}
					?>
				</div>
				<div id="headerSecondaryBottom">
					<nav id="topMenuNav" aria-expanded="false" class="main-navigation" role="navigation">
						<button id="menuButton"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
						<?php
						$args = [
							'theme_location'  => 'primary-menu',
							'container'       => '',
							'container_class' => '',
							'menu_class'      => 'primary-menu site-menu',
							'menu_id'         => 'primaryMenu'
						];
						wp_nav_menu( $args );
						?>
					</nav>

					<?php //echo get_search_form(); ?>

				</div>
			</div>
		</div>

	</header> <!-- #main-header -->

	<?php do_action('after_the_header')?>

	<div id="et-main-area">
