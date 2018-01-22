<?php
/**
 * Customize the Genesis Read More link
 *
 * @package     ChristophHerr\CustomizeGenesisReadMoreLink
 * @since       1.0.0
 * @author      Christoph Herr
 * @link        https://www.christophherr.com
 * @license     GPL-2.0+
 */

namespace ChristophHerr\CustomizeGenesisReadMoreLink;

add_filter( 'the_content_more_link', __NAMESPACE__ . '\change_the_read_more_link' );
add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\change_the_read_more_link' );
/**
 * Change the read more link HTML markup and content.
 *
 * @since 1.0.0
 *
 * @param string $html HTML of the original read more link.
 * @return string
 */
function change_the_read_more_link( $html ) {
	$html = change_the_read_more_text( $html );

	if ( doing_filter( 'get_the_content_more_link' ) ) {
		$html = strip_off_the_leading_read_more_dots( $html );
		return '</p><p>' . $html;
	}

	return "<p>{$html}</p>";
}

/**
 * Strip off the leading dot pattern from the Read More Link
 *
 * @since 1.0.0
 *
 * @param string $html Read more link HTML.
 * @param string $dots Unicode of the dots.
 * @return string
 */
function strip_off_the_leading_read_more_dots( $html, $dots = '&#x02026; ' ) {
	return substr( $html, strlen( $dots ) );
}

/**
 * Change the read more text.
 * Takes input from the config file.
 *
 * @since 1.0.0
 *
 * @param string $html Read more link HTML.
 * @return string
 */
function change_the_read_more_text( $html ) {
	$replace_values          = text_to_replace();
	$child_theme_text_domain = $replace_values[0];
	$new_read_more_text      = $replace_values[1];

	$string_to_replace = sprintf(
		__( '[Read more...]', '%1$s' ),
		$child_theme_text_domain
	);

	$replace_with = sprintf(
		__( '%1$s', '%2$s'),
		$new_read_more_text,
		$child_theme_text_domain
	);

	return str_replace( $string_to_replace, $replace_with, $html );
}
