<?php
/**
 * Single related posts
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

// Make sure we should display related items
if ( 'post' != get_post_type()
	|| 'on' == get_post_meta( get_the_ID(), 'wpex_disable_related', true )
) {
	return;
}

// Get count
$count = get_theme_mod( 'post_related_count', '3' );
if ( ! $count || 0 == $count ) {
	return;
}

// Prevent stupid shit
if ( $count > 99 ) {
	$count = 10;
}

// Get Current post
$post_id = get_the_ID();

// What should be displayed?
$display = get_theme_mod( 'post_related_displays', 'related_category' );

// Related query arguments
$args = array(
	'posts_per_page' => $count,
	'post__not_in'   => array( $post_id ),
	'no_found_rows'  => true,
	'tax_query' => array(
		array(
			'taxonomy' => 'post_format',
			'field'    => 'slug',
			'terms'    => array( 'post-format-quote' ),
			'operator' => 'NOT IN',
		)
	 )
);
if ( 'related_category' == $display ) {
	$cats = wp_get_post_terms( $post_id, 'category' ); 
	$cats_ids = array();
	foreach( $cats as $wpex_related_cat ) {
		$cats_ids[] = $wpex_related_cat->term_id; 
	}
	if ( ! empty( $cats_ids ) ) {
		$args['category__in'] = $cats_ids;
	}
} elseif ( 'random' == $display ) {
	$args['orderby'] = 'rand';
}

// Apply filters to the related query for child theming
$args = apply_filters( 'wpex_related_posts_args', $args );

// Run Query
$wpex_query = new wp_query( $args );

// Display related items
if ( $wpex_query->have_posts() ) {

	// Get columns
	$columns = wpex_get_theme_mod( 'post_related_columns', '3' ); ?>

	<section class="wpex-related-posts-wrap wpex-clr">

		<?php
		// Display heading
		$heading = wpex_get_theme_mod( 'post_related_heading' );
		$heading = $heading ? $heading : esc_html__( 'Related Articles', 'wpex-pineapple' );
		if ( $heading ) : ?>
			<h4 class="wpex-heading"><?php echo wpex_sanitize( $heading, 'html' ); ?></h4>
		<?php endif; ?>

		<div class="wpex-related-posts wpex-row wpex-clr">
			<?php
			// Loop through related posts
			$count = 0;
			foreach( $wpex_query->posts as $post ) : setup_postdata( $post );
				$count ++; ?>

				<div class="wpex-related-post wpex-clr wpex-col wpex-col-<?php echo absint( $columns ); ?> wpex-count-<?php echo absint( $count ); ?>">
					<?php if ( has_post_thumbnail() ) : ?>
						<div class="wpex-related-post-thumbnail wpex-clr">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'wpex_related_entry' ); ?></a>
						</div><!-- .related-wpex-post-thumbnail -->
					<?php endif; ?>
					<div class="wpex-related-post-content wpex-clr">
						<h3 class="wpex-related-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="wpex-related-post-meta"><span class="fa fa-clock-o" aria-hidden="true"></span><?php echo get_the_date(); ?></div>
					</div><!-- .related-post-content -->
				</div><!-- .related-post -->

				<?php if ( $count == $columns ) $count = 0; ?>

			<?php endforeach; ?>

		</div><!-- .wpex-related-posts -->

	</section><!-- .wpex-related-posts-wrap -->

<?php } // End related items

// Reset post data
wp_reset_postdata();