<?php
/**
 * Displays the menus and widgets at the end of the main element.
 * Visually, this output is presented as part of the footer element.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

$has_footer_menu = has_nav_menu( 'footer' );

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
$has_sidebar_3 = is_active_sidebar( 'sidebar-3' );

// Only output the container if there are elements to display.
if ( $has_footer_menu || $has_social_menu || $has_sidebar_1 || $has_sidebar_2 || $has_sidebar_3) {
	?>
<div class="footer-nav-widgets-wrapper header-footer-group">

    <div class="header-underline"></div>

    <div class="footer-inner section-inner">


        <?php

			$footer_top_classes = '';

			$footer_top_classes .= $has_footer_menu ? ' has-footer-menu' : '';
			$footer_top_classes .= $has_social_menu ? ' has-social-menu' : '';

			if ( $has_footer_menu || $has_social_menu ) {
				?>
        <div class="footer-top<?php echo $footer_top_classes; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>">
            <?php if ( $has_footer_menu ) { ?>

            <nav aria-label="<?php esc_attr_e( 'Footer', 'twentytwenty' ); ?>" role="navigation" class="footer-menu-wrapper">

                <ul class="footer-menu reset-list-style">
                    <?php
								wp_nav_menu(
									array(
										'container'      => '',
										'depth'          => 1,
										'items_wrap'     => '%3$s',
										'theme_location' => 'footer',
									)
								);
								?>
                </ul>

            </nav><!-- .site-nav -->

            <?php } ?>
            <?php if ( $has_social_menu ) { ?>

            <nav aria-label="<?php esc_attr_e( 'Social links', 'twentytwenty' ); ?>" class="footer-social-wrapper">

                <ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">

                </ul><!-- .footer-social -->

            </nav><!-- .footer-social-wrapper -->

            <?php } ?>
        </div><!-- .footer-top -->

        <?php } ?>

        <?php if ( $has_sidebar_1 || $has_sidebar_2 || $has_sidebar_3) { ?>

        <aside class="footer-widgets-outer-wrapper" role="complementary">

            <div class="footer-title">
                <p class="footer-logo">Kaysen Keramik</p>
                <a class="footer-ig" href="https://www.instagram.com/kaysen_keramik/">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>

            <div class="footer-widgets-wrapper">

                <?php if ( $has_sidebar_1 ) { ?>

                <div class="footer-widgets column-one grid-item">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div>

                <?php } ?>

                <?php if ( $has_sidebar_2 ) { ?>

                <div class="footer-widgets column-two grid-item">
                    <?php dynamic_sidebar( 'sidebar-2' ); ?>
                </div>

                <?php } ?>

                <?php if ( $has_sidebar_3 ) { ?>

                <div class="footer-widgets column-three grid-item">
                    <?php dynamic_sidebar( 'sidebar-3' ); ?>
                </div>

                <?php } ?>

            </div><!-- .footer-widgets-wrapper -->

        </aside><!-- .footer-widgets-outer-wrapper -->

        <?php } ?>

    </div><!-- .footer-inner -->

</div><!-- .footer-nav-widgets-wrapper -->

<?php } ?>
