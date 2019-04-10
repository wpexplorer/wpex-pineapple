<?php
/**
 * The template for displaying search forms.
 *
 * @package   Pineapple WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */ ?>

<form method="get" class="wpex-site-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="field" name="s" placeholder="<?php esc_html_e( 'Search', 'wpex-pineapple' ); ?>&hellip;" />
	<button type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>
</form>