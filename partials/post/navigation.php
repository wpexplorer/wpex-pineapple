<?php
/**
 * Displays the next/previous post links
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

// Get post navigation
$args = array(
	'prev_text'	=> '<span>&larr; </span>%title',
	'next_text'	=> '%title<span> &rarr;</span>',
);
if ( 'post' == get_post_type() && wpex_get_theme_mod( 'post_next_prev_in_same_term', false ) ) {
	$args['in_same_term'] = true;
	$args['taxonomy'] = 'category';
}
$post_nav = get_the_post_navigation( $args );
$post_nav = str_replace( 'role="navigation"', '', $post_nav );

// Display post navigation
if ( ! is_attachment() && $post_nav ) : ?>

	<div class="wpex-post-navigation wpex-clr"><?php echo wpex_sanitize( $post_nav, 'html' ); ?></div>

<?php endif; ?>