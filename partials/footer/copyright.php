<?php
/**
 * Footer copyright
 *
 * @package   Pineapple WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get copyright data
$copy = apply_filters( 'wpex_footer_copyright', get_theme_mod( 'footer_copyright', '<a href="https://www.wpexplorer.com/pineapple-free-wordpress-theme/" target="_blank" title="Pineapple WordPress Theme">Pineapple</a> Theme by <a href="https://www.wpexplorer.com/" target="_blank">WPExplorer</a> Powered by <a href="https://wordpress.org/" title="WordPress" target="_blank">WordPress</a>' ) );

// Display copyright
if ( $copy ) : ?>
	<div class="footer-copyright wpex-clr">
		<?php echo do_shortcode( wpex_sanitize( $copy, 'html' ) ); ?>
	</div><!-- .footer-copyright -->
<?php endif; ?>