<?php
/**
 * The form's questions and answer choices, in one place.
 *
 * Change a label here and it changes in the form, the admin inbox and the CSV export.
 *
 * @package Norrböle Sten & Kross ABLeads
 */

defined( 'ABSPATH' ) || exit;

/**
 * Answer choices for the two multiple-choice questions.
 *
 * @return array
 */
function npl_choices() {
	return apply_filters(
		'npl_choices',
		array(
			'service'  => array(
				'replacement' => __( 'Lägga om hela taket', 'norrbolestenochkross-leads' ),
				'storm'       => __( 'Storm or hail damage', 'norrbolestenochkross-leads' ),
				'repair'      => __( 'Läcka eller reparation', 'norrbolestenochkross-leads' ),
				'inspection'  => __( 'Bara en besiktning', 'norrbolestenochkross-leads' ),
				'not-sure'    => __( 'Vet inte än', 'norrbolestenochkross-leads' ),
			),
			'timeline' => array(
				'asap'     => __( 'Så snart som möjligt', 'norrbolestenochkross-leads' ),
				'1-3'      => __( 'Inom 1–3 månader', 'norrbolestenochkross-leads' ),
				'research' => __( 'Jag kollar bara priser', 'norrbolestenochkross-leads' ),
			),
		)
	);
}

/**
 * Hidden fields that record where the visitor came from (for ad and SEO reporting).
 *
 * @return string[]
 */
function npl_tracking_fields() {
	return array( 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'gclid', 'fbclid', 'landing_page', 'referrer' );
}

/**
 * Human-readable label for a stored answer.
 *
 * @param string $field Field key.
 * @param string $value Stored value.
 * @return string
 */
function npl_label( $field, $value ) {
	$choices = npl_choices();
	return isset( $choices[ $field ][ $value ] ) ? $choices[ $field ][ $value ] : (string) $value;
}

/**
 * The consent sentence shown under the submit button. Saved with each lead as a record of what the person agreed to.
 *
 * @return string
 */
function npl_consent_text() {
	return apply_filters(
		'npl_consent_text',
		__( 'Genom att skicka förfrågan godkänner du att vi kontaktar dig om ditt tak. Vi sparar uppgifterna bara för det, lämnar dem aldrig vidare, och du kan när som helst be oss radera dem.', 'norrbolestenochkross-leads' )
	);
}

/**
 * Lead statuses for simple follow-up tracking in the admin.
 *
 * @return array
 */
function npl_statuses() {
	return array(
		'new'       => __( 'New', 'norrbolestenochkross-leads' ),
		'contacted' => __( 'Kontaktad', 'norrbolestenochkross-leads' ),
		'quoted'    => __( 'Quote sent', 'norrbolestenochkross-leads' ),
		'won'       => __( 'Won', 'norrbolestenochkross-leads' ),
		'lost'      => __( 'Lost', 'norrbolestenochkross-leads' ),
		'spam'      => __( 'Misstänkt spam', 'norrbolestenochkross-leads' ),
	);
}

/**
 * Page people land on after a successful submit.
 *
 * @return string
 */
function npl_thank_you_url() {
	$page_id = (int) get_option( 'npl_thank_you_page' );
	$url     = $page_id ? get_permalink( $page_id ) : home_url( '/thank-you/' );
	return apply_filters( 'npl_thank_you_url', $url );
}
