<?php
/**
 * Displays the post tags
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

the_tags( '<div class="wpex-post-tags wpex-clr">', null, '</div><!-- .wpex-post-tags -->' ); ?>