<?php
/**
 * Config to customize the Genesis Read More link
 *
 * @package     ChristophHerr\CustomizeGenesisReadMoreLink
 * @since       1.0.0
 * @author      Christoph Herr
 * @link        https://www.christophherr.com
 * @license     GPL-2.0+
 */

namespace ChristophHerr\CustomizeGenesisReadMoreLink;

/**
 * Add the new read more text and the child theme text domain.
 *
 * @since 1.0.0
 *
 * @return array
 */
function text_to_replace() {
	return array(
		// Add the child theme text domain.
		'genesis-sample',
		// Add the new read more text.
		'Continue Reading',
	);
}
