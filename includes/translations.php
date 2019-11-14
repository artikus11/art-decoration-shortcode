<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( '_WP_Editors' ) ) {
	require ABSPATH . WPINC . '/class-wp-editor.php';
}

function artabr_ads_button_translation() {

	$strings = array(
		'decorations_shortcodes_title'   => esc_js( __( 'Decorations Shortcodes', 'art-decoration-shortcode' ) ),
		'infobox_btn'                    => esc_js( __( 'Infoboxes', 'art-decoration-shortcode' ) ),
		'warning_title'                  => esc_js( __( 'Warning', 'art-decoration-shortcode' ) ),
		'warning_title_open_windows'     => esc_js( __( 'Warning Window', 'art-decoration-shortcode' ) ),
		'advice_title'                   => esc_js( __( 'Advice', 'art-decoration-shortcode' ) ),
		'advice_title_open_windows'      => esc_js( __( 'Advice Window', 'art-decoration-shortcode' ) ),
		'note_title'                     => esc_js( __( 'Note', 'art-decoration-shortcode' ) ),
		'note_title_open_windows'        => esc_js( __( 'Note Window', 'art-decoration-shortcode' ) ),
		'info_title'                     => esc_js( __( 'Info', 'art-decoration-shortcode' ) ),
		'info_title_open_windows'        => esc_js( __( 'Info Window', 'art-decoration-shortcode' ) ),
		'custom_title'                   => esc_js( __( 'Custom box', 'art-decoration-shortcode' ) ),
		'custom_title_open_windows'      => esc_js( __( 'Custom box Window', 'art-decoration-shortcode' ) ),
		'label_windows_add_text'         => esc_js( __( 'Add Text', 'art-decoration-shortcode' ) ),
		'addon_class'                    => esc_js( __( 'Add class', 'art-decoration-shortcode' ) ),
		'title_windows_add_text'         => esc_js( __( 'Title', 'art-decoration-shortcode' ) ),
		'buttons_title'                  => esc_js( __( 'Buttons', 'art-decoration-shortcode' ) ),
		'buttons_title_open_windows'     => esc_js( __( 'Buttons Window', 'art-decoration-shortcode' ) ),
		'buttons_inscription'            => esc_js( __( 'The inscription on the button', 'art-decoration-shortcode' ) ),
		'buttons_link'                   => esc_js( __( 'Add a link', 'art-decoration-shortcode' ) ),
		'buttons_effect'                 => esc_js( __( 'Add hover effect', 'art-decoration-shortcode' ) ),
		'buttons_icon'                   => esc_js( __( 'Add a icon', 'art-decoration-shortcode' ) ),
		'buttons_target_blank'           => esc_js( __( 'Open in a new window?', 'art-decoration-shortcode' ) ),
		'columns_title'                  => esc_js( __( 'Columns', 'art-decoration-shortcode' ) ),
		'columns_hedline'                => esc_js( __( 'Column ', 'art-decoration-shortcode' ) ),
		'columns_add_text'               => esc_js( __( 'Here some text', 'art-decoration-shortcode' ) ),
		'row_hedline'                    => esc_js( __( 'Row', 'art-decoration-shortcode' ) ),
		'part_hedline'                   => esc_js( __( 'Part', 'art-decoration-shortcode' ) ),
		'part_free'                      => esc_js( __( 'Part free', 'art-decoration-shortcode' ) ),
		'divider_title'                  => esc_js( __( 'Dividers', 'art-decoration-shortcode' ) ),
		'divider_sample'                 => esc_js( __( 'Simple Divider', 'art-decoration-shortcode' ) ),
		'divider_gradient'               => esc_js( __( 'Gradient Divider', 'art-decoration-shortcode' ) ),
		'divider_points'                 => esc_js( __( 'Divider points', 'art-decoration-shortcode' ) ),
		'divider_dash'                   => esc_js( __( 'Divider dash', 'art-decoration-shortcode' ) ),
		'divider_zigzag'                 => esc_js( __( 'Divider zigzag', 'art-decoration-shortcode' ) ),
		'space_title'                    => esc_js( __( 'Spacer', 'art-decoration-shortcode' ) ),
		'space_title_open_window'        => esc_js( __( 'Spacer window', 'art-decoration-shortcode' ) ),
		'space_grap'                     => esc_js( __( 'The size of the gap', 'art-decoration-shortcode' ) ),
		'quote_title'                    => esc_js( __( 'Quotes', 'art-decoration-shortcode' ) ),
		'quote_left_title'               => esc_js( __( 'Left Quote', 'art-decoration-shortcode' ) ),
		'quote_left_title_open_window'   => esc_js( __( 'Left Quote Window', 'art-decoration-shortcode' ) ),
		'quote_right_title'              => esc_js( __( 'Right Quote', 'art-decoration-shortcode' ) ),
		'quote_right_title_open_window'  => esc_js( __( 'Right Quote Window', 'art-decoration-shortcode' ) ),
		'quote_center_title'             => esc_js( __( 'Center Quote', 'art-decoration-shortcode' ) ),
		'quote_center_title_open_window' => esc_js( __( 'Center Quote Window', 'art-decoration-shortcode' ) ),
		'quote_center_cite'              => esc_js( __( 'Center Quote Cite', 'art-decoration-shortcode' ) ),
		'dropcaps_title'                 => esc_js( __( 'Dropcaps', 'art-decoration-shortcode' ) ),
		'colorbox_title'                 => esc_js( __( 'Color Box', 'art-decoration-shortcode' ) ),
		'colorbox_title_open_window'     => esc_js( __( 'Color Box Window', 'art-decoration-shortcode' ) ),
		'colorbox_background'            => esc_js( __( 'Background color', 'art-decoration-shortcode' ) ),
		'colorbox_text'                  => esc_js( __( 'Text color', 'art-decoration-shortcode' ) ),
		'colorborder_text'               => esc_js( __( 'Border color', 'art-decoration-shortcode' ) ),
		'blur_spoiler_title'             => esc_js( __( 'Blur Spoiler', 'art-decoration-shortcode' ) ),
		'blur_spoiler_title_open_window' => esc_js( __( 'Blur Spoiler Window', 'art-decoration-shortcode' ) ),
		'blur_spoiler_color_change'      => esc_js( __( 'If required, select the color of the text', 'art-decoration-shortcode' ) ),
	);

	$locale     = _WP_Editors::$mce_locale;
	$translated = 'tinyMCE.addI18n("' . $locale . '.button_ads", ' . wp_json_encode( $strings ) . ");\n";

	return $translated;
}

$strings = artabr_ads_button_translation();
