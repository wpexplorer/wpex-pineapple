<?php
/**
 * The post entry readmore link
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

<div class="wpex-entry-readmore wpex-clr">
	<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Continue reading', 'wpex-pineapple' ); ?> &rarr;</a>
</div>