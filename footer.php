<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

	<footer id="main-footer">
		<?php get_sidebar( 'footer' ); ?>




		<div id="footer-bottom">
				<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
					<div id="footer-nav">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'footer-menu',
							'depth'          => '1',
							'menu_class'     => 'bottom-nav',
							'container'      => 'nav',
							'fallback_cb'    => '',
						) );
						?>
					</div> <!-- #footer-nav -->
				<?php endif; ?>
				<?php
				if ( class_exists( 'SocialMedia' ) ) {
					SocialMedia::show();
				}
				if ( class_exists( 'PhoneNumber' ) ) {
					PhoneNumber::show();
				}
				?>
				<p class="copyright"><?php echo get_bloginfo(); ?> | All Rights Reserved © <?php echo date( "Y" ); ?></p>

		</div>
	</footer> <!-- #main-footer -->
	</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

</div> <!-- #page-container -->

<?php wp_footer(); ?>
</body>
</html>