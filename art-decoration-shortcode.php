<?php // @codingStandardsIgnoreLine

/**
 * Plugin Name: Art Decoration Shortcode
 * Text Domain: art-decoration-shortcode
 * Domain Path: /languages
 * Plugin URI: https://wordpress.org/plugins/art-decoration-shortcode/
 * Description: Plugin shortcodes for text in articles. Contains: selection of text blocks with icons, buttons with hover effects and icons, columns, separator, text blocks with flow, letter, color text blocks.
 * Contributors: artabr
 * Version: 1.5.5
 * Author: Artem Abramovich
 * Author URI: http://wpruse.ru/?p=570
 * Tags: shortcodes, shortcode, shortcodes list, buttons, alert shortcode, notification shortcode, column shortcodes, bloginfo, box, button, buttons, hover, column, fancy, hover buttons, flex's columns, multilingual, plugin, pullquote, responsive, responsive video, right-to-left, rss, service, services, short code, shortcode, shortcodes, siblings pages, slider, spoiler, drop cap
 *
 * License: GPLv2 or later
 *
 * Copyright Artem Abramovich
 *
 *     This file is part of Art Decoration Shortcode,
 *     a plugin for WordPress.
 *
 *     Art Decoration Shortcode is free software:
 *     You can redistribute it and/or modify it under the terms of the
 *     GNU General Public License as published by the Free Software
 *     Foundation, either version 3 of the License, or (at your option)
 *     any later version.
 *
 *     Art Decoration Shortcode is distributed in the hope that
 *     it will be useful, but WITHOUT ANY WARRANTY; without even the
 *     implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR
 *     PURPOSE. See the GNU General Public License for more details.
 *
 *     You should have received a copy of the GNU General Public License
 *     along with WordPress. If not, see <http://www.gnu.org/licenses/>.
 *
 *
 *    Внешний вид и ховер-эффекты для кнопок разработаны Kyle Brumm https://codepen.io/kjbrum/pen/wBBLXx
 *    Внешний вид разделителей разработан Joey Hoer https://codepen.io/joeyhoer/pen/BmqIx
 *    Флекс-сетка для колонок разработана Dave Hauser https://codepen.io/davehauser/pen/qIpoz
 *    Размытый спойлер разработан Filipe Kiss https://codepen.io/filipekiss/pen/wDlBz
 *    Все, что не указано отдельно - разработано автором плагина
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'ADS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ADS_PLUGIN_URI', plugin_dir_url( __FILE__ ) );

$plugin_data = get_file_data(
	__FILE__,
	array(
		'ver'  => 'Version',
		'name' => 'Plugin Name',
	)
);

define( 'ADS_PLUGIN_VER', $plugin_data['ver'] );
define( 'ADS_PLUGIN_NAME', $plugin_data['name'] );

/**
 * Class ADS_Shortcodes
 *
 * Main class, initialized the plugin
 *
 * @class       ADS_Shortcodes
 * @version     1.5.0
 * @author      Artem Abramovich
 */
class ADS_Shortcodes {

	/**
	 * Instance of ADS_Shortcodes.
	 *
	 * @since  1.5.0
	 * @access private
	 * @var object $instance The instance of ADS_Shortcodes.
	 */
	private static $instance;

	public $admin_settings;


	/**
	 * Construct.
	 *
	 * @since 1.5.0
	 */
	public function __construct() {

		$this->init();

		$this->load_textdomain();

	}


	/**
	 * Init.
	 *
	 * Initialize plugin parts.
	 *
	 * @since 1.5.0
	 */
	public function init() {

		if ( version_compare( PHP_VERSION, '5.6', 'lt' ) ) {
			return add_action( 'admin_notices', array( $this, 'php_version_notice' ) );
		}

		if ( is_admin() ) {

			require ADS_PLUGIN_DIR . 'includes/class-ads-admin.php';
			$this->admin_settings = new ADS_Shortcodes_Admin();
		}

		if ( ! is_admin() ) :
			require ADS_PLUGIN_DIR . 'includes/class-ads-frontend.php';
			$this->admin_settings = new ADS_Shortcodes_Frontend();

		endif;

	}


	/**
	 * Textdomain.
	 *
	 * Load the textdomain based on WP language.
	 *
	 * @since 1.5.0
	 */
	public function load_textdomain() {

		$locale = apply_filters( 'plugin_locale', get_locale(), 'art-decoration-shortcode' );

		load_textdomain(
			'art-decoration-shortcode',
			WP_LANG_DIR . '/art-decoration-shortcode/art-decoration-shortcode-' . $locale . '.mo'
		);

		load_plugin_textdomain(
			'art-decoration-shortcode',
			false,
			basename( dirname( __FILE__ ) ) . '/languages'
		);

	}


	/**
	 * Instance.
	 *
	 * An global instance of the class. Used to retrieve the instance
	 * to use on other files/plugins/themes.
	 *
	 * @return object Instance of the class.
	 * @since 1.5.0
	 */
	public static function instance() {

		if ( is_null( self::$instance ) ) :
			self::$instance = new self();
		endif;

		return self::$instance;

	}


	/**
	 * Display PHP 5.6 required notice.
	 *
	 * Display a notice when the required PHP version is not met.
	 *
	 * @since 1.5.0
	 */
	public function php_version_notice() {

		?>
		<div class="notice notice-error">
			<p>
				<?php

				printf(
					/* translators: 1: name plugin, 2: php version */
					esc_html__(
						'%1$s requires PHP 5.6 or higher and your current PHP version is %2$s. Please (contact your host to) update your PHP version.',
						'art-decoration-shortcode'
					),
					esc_html( ADS_PLUGIN_NAME ),
					PHP_VERSION
				);
				?>
			</p>
		</div>
		<?php

	}
}

/**
 * The main function responsible for returning the ADS_Shortcodes object.
 *
 * Use this function like you would a global variable, except without needing to declare the global.
 *
 * Example: <?php ADS_Shortcodes()->method_name(); ?>
 *
 * @return object ADS_Shortcodes class object.
 * @since 1.5.0
 *
 */
if ( ! function_exists( 'ads_shortcodes' ) ) :

	function ads_shortcodes() {

		return ADS_Shortcodes::instance();
	}

endif;

ads_shortcodes();

// Backwards compatibility
$GLOBALS['ads'] = ads_shortcodes();
