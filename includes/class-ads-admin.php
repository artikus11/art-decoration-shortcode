<?php // @codingStandardsIgnoreLine

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class ADS_Shortcodes_Admin
 *
 * @class       ADS_Shortcodes_Admin
 * @version     1.5.0
 * @author      Artem Abramovich
 */
class ADS_Shortcodes_Admin {

	/**
	 * Constructor.
	 *
	 * @since 1.5.0
	 */
	public function __construct() {

		add_filter( 'mce_external_plugins', array( $this, 'add_shortcode_tinymce_plugin' ) );
		add_filter( 'mce_buttons', array( $this, 'register_shortcode_button' ) );
		add_filter( 'mce_external_languages', array( $this, 'add_tinymce_locales' ) );

		add_filter( 'tiny_mce_version', array( $this, 'refresh_mce' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
	}


	/**
	 * TinyMCE locales function.
	 *
	 * @param  array $locales TinyMCE locales.
	 *
	 * @since 1.5.0
	 *
	 * @return array
	 */
	public function add_tinymce_locales( $locales ) {

		$locales['button_ads'] = ADS_PLUGIN_DIR . 'includes/translations.php';

		return $locales;
	}


	/**
	 * Register the shortcode button.
	 *
	 * @param array $buttons
	 *
	 * @since 1.5.0
	 *
	 * @return array
	 */
	public function register_shortcode_button( $buttons ) {

		array_push( $buttons, 'button_ads' );

		return $buttons;
	}


	/**
	 * Add the shortcode button to TinyMCE.
	 *
	 * @param  array $plugins TinyMCE plugins.
	 *
	 * @since 1.5.0
	 *
	 * @return array
	 */
	public function add_shortcode_tinymce_plugin( $plugins ) {

		$plugins['button_ads'] = ADS_PLUGIN_URI . 'assets/admin/js/editor-button.js';

		return $plugins;
	}


	/**
	 * Force TinyMCE to refresh.
	 *
	 * @param  int $version
	 *
	 * @since 1.5.0
	 *
	 * @return int
	 */
	public function refresh_mce( $version ) {

		$version += 3;

		return $version;
	}


	/**
	 * Admin scripts.
	 *
	 * @param  string $hook Page slug.
	 *
	 * @since 1.5.0
	 *
	 * @return void
	 */
	public function admin_scripts( $hook ) {

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		wp_enqueue_style( 'ads-admin-style', ADS_PLUGIN_URI . 'assets/admin/css/tds-admin-style' . $suffix . '.css', array(), ADS_PLUGIN_VER, 'all' );
	}
}

