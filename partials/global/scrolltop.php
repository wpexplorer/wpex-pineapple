<?php
/**
 * Scroll to top button
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
} ?>

<a href="#" class="wpex-site-scroll-top"><span class="fa fa-angle-up" aria-hidden="true"></span><span class="screen-reader-text"><?php esc_html_e( 'Back to top', 'wpex-pineapple' ); ?></span></a>