<?php
/**
 * Defines all settings for the customizer class
 *
 * @package   Pineapple WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

if ( ! function_exists( 'wpex_customizer_config' ) ) {

	function wpex_customizer_config( $panels ) {

		/*-----------------------------------------------------------------------------------*/
		/* - Useful vars
		/*-----------------------------------------------------------------------------------*/

		// Crop locations
		$crop_locations = wpex_image_crop_locations();

		/*-----------------------------------------------------------------------------------*/
		/* - General Panel
		/*-----------------------------------------------------------------------------------*/
		$panels['general'] = array(
			'title' => esc_html__( 'General Theme Settings', 'wpex-pineapple' ),
			'sections' => array()
		);

		// Responsive
		$panels['general']['sections']['responsive'] = array(
			'id' => 'wpex_responsive',
			'title' => esc_html__( 'Responsive', 'wpex-pineapple' ),
			'settings' => array(
				array(
					'id' => 'responsive',
					'default' => true,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Enable', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
			),
		);

		// Header Section
		$panels['general']['sections']['general'] = array(
			'id' => 'wpex_general',
			'title' => esc_html__( 'Header', 'wpex-pineapple' ),
			'settings' => array(
				array(
					'id' => 'site_description',
					'sanitize_callback' => 'esc_html',
					'default' => true,
					'control' => array(
						'label' => esc_html__( 'Display description?', 'wpex-pineapple' ),
						'type' => 'checkbox'
					),
				),
				array(
					'id' => 'logo',
					'sanitize_callback' => 'esc_url',
					'control' => array(
						'label' => esc_html__( 'Custom Logo', 'wpex-pineapple' ),
						'type' => 'upload',
					),
				),
				array(
					'id' => 'logo_retina',
					'sanitize_callback' => 'esc_url',
					'control' => array(
						'label' => esc_html__( 'Custom Retina Logo', 'wpex-pineapple' ),
						'type' => 'upload',
					),
				),
				array(
					'id' => 'logo_retina_height',
					'sanitize_callback' => 'intval',
					'control' => array(
						'label' => esc_html__( 'Standard Logo Height', 'wpex-pineapple' ),
						'desc' => esc_html__( 'Enter the standard height for your logo. Used to set your retina logo to the correct dimensions', 'wpex-pineapple' ),
					),
				),
			),
		);

		// Topbar Social
		$social_options = wpex_header_social_options_array();

		if ( $social_options ) {

			$panels['general']['sections']['socialbar'] = array(
				'id' => 'wpex_social_header',
				'title' => esc_html__( 'Social', 'wpex-pineapple' ),
				'desc' => esc_html__( 'Enter the full URL to your social media profile.', 'wpex-pineapple' ),
				'settings' => array(
					array(
						'id' => 'header_social',
						'default' => true,
						'sanitize_callback' => 'esc_html',
						'control' => array(
							'label' => esc_html__( 'Enable Social', 'wpex-pineapple' ),
							'type' => 'checkbox',
						),
					),
				),
			);

			$panels['general']['sections']['socialbar']['settings']['socialbar_target_blank'] = array(
				'id' => 'socialbar_target_blank',
				'transport' => 'postMessage',
				'control' => array(
					'label' => esc_html__( 'Open Social Links In New Tab?', 'wpex-pineapple' ),
					'type' => 'checkbox',
				),
			);

			foreach ( $social_options as $key => $val ) {

				$panels['general']['sections']['socialbar']['settings']['socialbar_'. $key] = array(
					'id' => 'socialbar_'. $key,
					'sanitize_callback' => 'esc_url',
					'control' => array(
						'label' => $val['label'] .' - '. esc_html__( 'URL', 'wpex-pineapple' ),
					),
				);


			}

		}

		// Entries
		$panels['general']['sections']['entries'] = array(
			'id' => 'wpex_entries',
			'title' => esc_html__( 'Entries', 'wpex-pineapple' ),
			'settings' => array(
				array(
					'id' => 'entry_content_display',
					'default' => 'excerpt',
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Entry Displays?', 'wpex-pineapple' ),
						'type' => 'select',
						'choices' => array(
							'excerpt' => esc_html__( 'Custom Excerpt', 'wpex-pineapple' ),
							'content' => esc_html__( 'Full Content', 'wpex-pineapple' ),
						),
					),
				),
				array(
					'id' => 'entry_excerpt_length',
					'default' => 30,
					'sanitize_callback' => 'absint',
					'control' => array(
						'label' => esc_html__( 'Entry Excerpt Length', 'wpex-pineapple' ),
						'type' => 'number',
						'desc' => esc_html__( 'How many words to display per excerpt', 'wpex-pineapple' ),
					),
				),
				array(
					'id' => 'entry_thumbnail',
					'sanitize_callback' => 'esc_html',
					'default' => true,
					'control' => array(
						'label' => esc_html__( 'Entry Thumbnail', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'entry_category',
					'sanitize_callback' => 'esc_html',
					'default' => true,
					'control' => array(
						'label' => esc_html__( 'Entry Category Tag', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'entry_category_first_only',
					'sanitize_callback' => 'esc_html',
					'default' => true,
					'control' => array(
						'label' => esc_html__( 'Display First Category Only', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'entry_meta',
					'sanitize_callback' => 'esc_html',
					'default' => true,
					'control' => array(
						'label' => esc_html__( 'Entry Meta', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'entry_meta_date',
					'sanitize_callback' => 'esc_html',
					'default' => true,
					'control' => array(
						'label' => esc_html__( 'Entry Meta Date', 'wpex-pineapple' ),
						'type' => 'checkbox',
						'active_callback' => 'wpex_customizer_entry_has_meta'
					),
				),
				array(
					'id' => 'entry_meta_author',
					'sanitize_callback' => 'esc_html',
					'default' => true,
					'control' => array(
						'label' => esc_html__( 'Entry Meta Author', 'wpex-pineapple' ),
						'type' => 'checkbox',
							'active_callback' => 'wpex_customizer_entry_has_meta'
					),
				),
				array(
					'id' => 'entry_meta_comments',
					'sanitize_callback' => 'esc_html',
					'default' => true,
					'control' => array(
						'label' => esc_html__( 'Entry Meta Comments', 'wpex-pineapple' ),
						'type' => 'checkbox',
							'active_callback' => 'wpex_customizer_entry_has_meta'
					),
				),
				array(
					'id' => 'entry_readmore',
					'sanitize_callback' => 'esc_html',
					'default' => true,
					'control' => array(
						'label' => esc_html__( 'Entry Readmore', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
			),
		);

		// Posts
		$panels['general']['sections']['posts'] = array(
			'id' => 'wpex_posts',
			'title' => esc_html__( 'Posts', 'wpex-pineapple' ),
			'settings' => array(
				array(
					'id' => 'post_thumbnail',
					'default' => true,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Thumbnail', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'post_category',
					'default' => true,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Category Tag', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'post_category_first_only',
					'default' => true,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Display First Category Only', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'post_meta',
					'default' => true,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Meta', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'post_meta_date',
					'default' => true,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Meta Date', 'wpex-pineapple' ),
						'type' => 'checkbox',
						'active_callback' => 'wpex_customizer_post_has_meta'
					),
				),
				array(
					'id' => 'post_meta_author',
					'default' => true,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Meta Author', 'wpex-pineapple' ),
						'type' => 'checkbox',
						'active_callback' => 'wpex_customizer_post_has_meta'
					),
				),
				array(
					'id' => 'post_meta_comments',
					'default' => true,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Meta Comments', 'wpex-pineapple' ),
						'type' => 'checkbox',
							'active_callback' => 'wpex_customizer_entry_has_meta'
					),
				),
				array(
					'id' => 'post_tags',
					'default' => true,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Tags', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'post_next_prev',
					'default' => true,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Next/Previous', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'post_next_prev_in_same_term',
					'default' => false,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Next/Previous From Same Category', 'wpex-pineapple' ),
						'type' => 'checkbox',
						'active_callback' => 'wpex_customizer_post_navigation_in_same_term',
					),
				),
				array(
					'id' => 'post_related',
					'default' => true,
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Related', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'post_related_displays',
					'default' => 'related_category',
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Related: Displays?', 'wpex-pineapple' ),
						'type' => 'select',
						'choices' => array(
							'related_category' => esc_html__( 'Recent From Same Category', 'wpex-pineapple' ),
							'random' => esc_html__( 'Random Posts', 'wpex-pineapple' ),
						),
						'active_callback' => 'wpex_customizer_has_related_posts',
					),
				),
				array(
					'id' => 'post_related_heading',
					'sanitize_callback' => 'esc_html',
					'control' => array(
						'label' => esc_html__( 'Post Related: Heading', 'wpex-pineapple' ),
						'type' => 'text',
						'active_callback' => 'wpex_customizer_has_related_posts',
					),
				),
				array(
					'id' => 'post_related_columns',
					'sanitize_callback' => 'absint',
					'default' => '3',
					'control' => array(
						'label' => esc_html__( 'Post Related: Columns', 'wpex-pineapple' ),
						'type' => 'select',
						'choices' => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
							'4' => '4',
						),
						'active_callback' => 'wpex_customizer_has_related_posts',
					),
				),
				array(
					'id' => 'post_related_count',
					'default' => 3,
					'sanitize_callback' => 'absint',
					'control' => array(
						'label' => esc_html__( 'Post Related: Count', 'wpex-pineapple' ),
						'type' => 'number',
						'active_callback' => 'wpex_customizer_has_related_posts',
					),
				),
			),
		);

		// Discussion
		$panels['general']['sections']['discussion'] = array(
			'id' => 'wpex_site_discussion',
			'title' => esc_html__( 'Discussion', 'wpex-pineapple' ),
			'settings' => array(
				array(
					'id' => 'comments_on_pages',
					'sanitize_callback' => 'esc_html',
					'default' => true,
					'control' => array(
						'label' => esc_html__( 'Comments For Pages', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
				array(
					'id' => 'comments_on_posts',
					'sanitize_callback' => 'esc_html',
					'default' => true,
					'control' => array(
						'label' => esc_html__( 'Comments For Posts', 'wpex-pineapple' ),
						'type' => 'checkbox',
					),
				),
			)
		);

		// Footer
		$panels['general']['sections']['footer'] = array(
			'id' => 'wpex_site_footer',
			'title' => esc_html__( 'Footer', 'wpex-pineapple' ),
			'settings' => array(
				array(
					'id' => 'footer_copyright',
					'sanitize_callback' => 'wp_kses_post',
					'default' => '<a href="https://www.wpexplorer.com/pineapple-free-wordpress-theme/" target="_blank" title="Pineapple WordPress Theme">Pineapple</a> Theme by <a href="https://www.wpexplorer.com/" target="_blank">WPExplorer</a> Powered by <a href="https://wordpress.org/" title="WordPress" target="_blank">WordPress</a>',
					'control' => array(
						'label' => esc_html__( 'Copyright', 'wpex-pineapple' ),
						'type' => 'textarea',
					),
				),
			)
		);

		/*-----------------------------------------------------------------------------------*/
		/* - Image Sizes
		/*-----------------------------------------------------------------------------------*/
		$panels['image_sizes'] = array(
			'title' => esc_html__( 'Image Sizes', 'wpex-pineapple' ),
			'sections' => array(

				// Grid Entries
				array(
					'id' => 'wpex_entry_thumbnail_sizes',
					'title' => esc_html__( 'Entries', 'wpex-pineapple' ),
					'desc' => esc_html__( 'If you alter any image sizes you will have to regenerate your thumbnails.', 'wpex-pineapple' ),
					'settings' => array(
						array(
							'id' => 'entry_thumbnail_width',
							'default' => 9999,
							'sanitize_callback' => 'absint',
							'transport' => 'postMessage',
							'control' => array(
								'label' => esc_html__( 'Image Width', 'wpex-pineapple' ),
								'type' => 'text',
							),
						),
						array(
							'id' => 'entry_thumbnail_height',
							'default' => 9999,
							'sanitize_callback' => 'absint',
							'transport' => 'postMessage',
							'control' => array(
								'label' => esc_html__( 'Image Height', 'wpex-pineapple' ),
								'type' => 'text',
							),
						),
						array(
							'id' => 'entry_thumbnail_crop',
							'default' => 'false',
							'sanitize_callback' => 'esc_html',
							'transport' => 'postMessage',
							'control' => array(
								'label' => esc_html__( 'Crop', 'wpex-pineapple' ),
								'type' => 'select',
								'choices' => $crop_locations,
							),
						),
					),
				),

				// Posts
				array(
					'id' => 'wpex_post_thumbnail_sizes',
					'title' => esc_html__( 'Posts', 'wpex-pineapple' ),
					'desc' => esc_html__( 'If you alter any image sizes you will have to regenerate your thumbnails.', 'wpex-pineapple' ),
					'settings' => array(
						array(
							'id' => 'post_thumbnail_width',
							'default' => 9999,
							'sanitize_callback' => 'absint',
							'transport' => 'postMessage',
							'control' => array(
								'label' => esc_html__( 'Image Width', 'wpex-pineapple' ),
								'type' => 'text',
							),
						),
						array(
							'id' => 'post_thumbnail_height',
							'default' => 9999,
							'sanitize_callback' => 'absint',
							'transport' => 'postMessage',
							'control' => array(
								'label' => esc_html__( 'Image Height', 'wpex-pineapple' ),
								'type' => 'text',
							),
						),
						array(
							'id' => 'post_thumbnail_crop',
							'default' => 'false',
							'sanitize_callback' => 'esc_html',
							'transport' => 'postMessage',
							'control' => array(
								'label' => esc_html__( 'Crop', 'wpex-pineapple' ),
								'type' => 'select',
								'choices' => $crop_locations,
							),
						),
					),
				),

				// Related Posts
				array(
					'id' => 'wpex_posts_related_thumbnail_sizes',
					'title' => esc_html__( 'Related Posts', 'wpex-pineapple' ),
					'desc' => esc_html__( 'If you alter any image sizes you will have to regenerate your thumbnails.', 'wpex-pineapple' ),
					'settings' => array(
						array(
							'id' => 'post_related_thumbnail_width',
							'default' => 9999,
							'sanitize_callback' => 'absint',
							'transport' => 'postMessage',
							'control' => array(
								'label' => esc_html__( 'Image Width', 'wpex-pineapple' ),
								'type' => 'text',
							),
						),
						array(
							'id' => 'post_related_thumbnail_height',
							'default' => 9999,
							'sanitize_callback' => 'absint',
							'transport' => 'postMessage',
							'control' => array(
								'label' => esc_html__( 'Image Height', 'wpex-pineapple' ),
								'type' => 'text',
							),
						),
						array(
							'id' => 'post_related_thumbnail_crop',
							'default' => 'false',
							'sanitize_callback' => 'esc_html',
							'transport' => 'postMessage',
							'control' => array(
								'label' => esc_html__( 'Crop', 'wpex-pineapple' ),
								'type' => 'select',
								'choices' => $crop_locations,
							),
						),
					),
				),
			),
		);

		// Return panels array
		return $panels;

	}
}
add_filter( 'wpex_customizer_panels', 'wpex_customizer_config' );

function wpex_active_callback_responsive() {
	if ( get_theme_mod( 'responsive' ) ) {
		return true;
	} else {
		return false;
	}
}
function wpex_customizer_has_related_posts() {
	if ( get_theme_mod( 'post_related', true ) ) {
		return true;
	} else {
		return false;
	}
}
function wpex_customizer_post_navigation_in_same_term() {
	if ( get_theme_mod( 'post_next_prev', true ) ) {
		return true;
	} else {
		return false;
	}
}
function wpex_customizer_entry_has_meta() {
	if ( get_theme_mod( 'entry_meta', true ) ) {
		return true;
	} else {
		return false;
	}
}
function wpex_customizer_post_has_meta() {
	if ( get_theme_mod( 'post_meta', true ) ) {
		return true;
	} else {
		return false;
	}
}