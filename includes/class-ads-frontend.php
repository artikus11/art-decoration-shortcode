<?php // @codingStandardsIgnoreLine

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class ADS_Shortcodes_Frontend
 *
 * @class       ADS_Shortcodes_Frontend
 * @version     1.5.0
 * @author      Artem Abramovich
 */
class ADS_Shortcodes_Frontend {

	/**
	 * ADS_Shortcodes_Frontend constructor.
	 *
	 * @since 1.5.0
	 */
	public function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts_style' ), 10 );

		add_shortcode( 'tds_warning', array( $this, 'warning' ) );
		add_shortcode( 'tds_council', array( $this, 'council' ) );
		add_shortcode( 'tds_note', array( $this, 'note' ) );
		add_shortcode( 'tds_info', array( $this, 'info' ) );
		add_shortcode( 'ads_custom_box', array( $this, 'custom_box' ) );
		add_shortcode( 'ads_btn', array( $this, 'buttons_hover' ) );
		add_shortcode( 'ads_row', array( $this, 'row' ) );
		add_shortcode( 'ads_col', array( $this, 'col' ) );
		add_shortcode( 'ads_hr', array( $this, 'hr' ) );
		add_shortcode( 'ads_dropcap', array( $this, 'dropcap' ) );
		add_shortcode( 'ads-pullquote-left', array( $this, 'pullquote_left' ) );
		add_shortcode( 'ads-pullquote-right', array( $this, 'pullquote_right' ) );
		add_shortcode( 'ads-quote-center', array( $this, 'quote_center' ) );
		add_shortcode( 'ads_color_box', array( $this, 'color_box' ) );
		add_shortcode( 'ads_blur_spoiler', array( $this, 'blur_spoiler' ) );
		add_shortcode( 'ads_space', array( $this, 'hr_space' ) );
		add_shortcode( 'ads_spl', array( $this, 'special_letters' ) );
	}


	/**
	 * Enqueue scripts and style
	 *
	 * @since 1.5.0
	 */
	public function enqueue_scripts_style() {

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		wp_register_style( 'tds-style-frontend', ADS_PLUGIN_URI . 'assets/css/style-front' . $suffix . '.css', array(), ADS_PLUGIN_VER, 'all' );
		wp_register_script( 'tds-script', ADS_PLUGIN_URI . 'assets/js/scripts-front' . $suffix . '.js', array( 'jquery' ), ADS_PLUGIN_VER, false );

		wp_enqueue_style( 'tds-style-frontend' );

	}


	/**
	 * Warning box
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return mixed
	 */
	public function warning( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'class' => '',
			),
			$atts
		);

		$class = $atts['class'] ? $atts['class'] : '';

		$output = '<div class="tds-message-box box-warning ' . $class . '">';

		$output .= do_shortcode( $content );

		$output .= '</div>';

		wp_enqueue_style( 'dashicons' );

		return apply_filters( 'tds_warning_filter_html', $output );
	}


	/**
	 * Council box
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return mixed
	 */
	public function council( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'class' => '',
			),
			$atts
		);

		$class = $atts['class'] ? $atts['class'] : '';

		$output = '<div class="tds-message-box box-council ' . $class . '">';

		$output .= do_shortcode( $content );

		$output .= '</div>';

		wp_enqueue_style( 'dashicons' );

		return apply_filters( 'tds_council_filter_html', $output );
	}


	/**
	 * Note box
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return mixed|
	 */
	public function note( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'class' => '',
			),
			$atts
		);

		$class = $atts['class'] ? $atts['class'] : '';

		$output = '<div class="tds-message-box box-note ' . $class . '">';

		$output .= do_shortcode( $content );

		$output .= '</div>';

		wp_enqueue_style( 'dashicons' );

		return apply_filters( 'tds_note_filter_html', $output );
	}


	/**
	 * Info box
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return mixed
	 */
	public function info( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'class' => '',
			),
			$atts
		);

		$class = $atts['class'] ? $atts['class'] : '';

		$output = '<div class="tds-message-box box-info ' . $class . '">';

		$output .= do_shortcode( $content );

		$output .= '</div>';

		wp_enqueue_style( 'dashicons' );

		return apply_filters( 'tds_info_filter_html', $output );
	}


	/**
	 * Custom box
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return mixed
	 */
	public function custom_box( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'title'        => '',
				'color_border' => '',
				'class'        => '',
			),
			$atts
		);

		$class         = $atts['class'] ? $atts['class'] : '';
		$color_border  = '#e87e04' !== $atts['color_border'] ? 'border-color:' . $atts['color_border'] . ';' : '';
		$color_title   = '#e87e04' !== $atts['color_border'] ? 'style="color:' . $atts['color_border'] . ';"' : '';
		$title         = $atts['title'] ? '<div class="ads-custom-box-title" ' . $color_title . '>' . $atts['title'] . '</div>' : '';
		$title_padding = ! $title ? 'padding: 2.2rem 2.2rem;' : '';

		$output = '<div class="ads-custom-box custom-box ' . $class . '" style="' . $color_border . $title_padding . '">';

		$output .= apply_filters( 'ads_custom_box_title_filter_html', $title, $atts['title'], $color_title );

		$output .= '<div class="ads-custom-box-content">' . do_shortcode( $content ) . '</div>';

		$output .= '</div>';

		return apply_filters( 'ads_custom_box_filter_html', $output );
	}


	/**
	 * Hover buttons
	 *
	 * @param $atts
	 *
	 * @since 1.5.0
	 *
	 * @return string
	 */
	public function buttons_hover( $atts ) {

		$atts = shortcode_atts(
			array(
				'label_btn' => 'Кнопка',
				'url'       => '#',
				'target'    => 'true',
				'icon'      => '',
				'view_btn'  => '',
				'class'     => '',
			),
			$atts
		);

		$class = $atts['class'] ? $atts['class'] : '';

		if ( 'true' !== $atts['target'] ) {
			$atts['target'] = '_self';
		} else {
			$atts['target'] = '_blank';
		}

		if ( isset( $atts['icon'] ) && ! empty( $atts['icon'] ) ) {
			$icon_btn = '<i class="' . $atts['icon'] . '"></i>';
		} else {
			$icon_btn = '';
		}

		switch ( $atts['view_btn'] ) {
			case 'adsbtn-swipe':
			case 'adsbtn-diagonal':
			case 'adsbtn-diagonal-close':
			case 'adsbtn-double':
			case 'adsbtn-slice':
			case 'adsbtn-smoosh':
			case 'adsbtn-collision':
				$out_btn = '<div class="ads-button">
		<a href="' . $atts['url'] . '" target="' . $atts['target'] . '" class="' . $atts['view_btn'] . ' ' . $class . '">' . $icon_btn . ' ' . $atts['label_btn'] . '</a>
		</div>';
				break;
			case 'adsbtn-alternate':
			case 'adsbtn-vertical-overlap':
			case 'adsbtn-horizontal-overlap':
			case 'adsbtn-zoning':
			case 'adsbtn-4corners':
				$out_btn = '<div class="ads-button">
		<a href="' . $atts['url'] . '" target="' . $atts['target'] . '" class="' . $atts['view_btn'] . ' ' . $class . '"><span>' . $icon_btn . ' ' . $atts['label_btn'] . '</span></a>
		</div>';
				break;
			case 'adsbtn-position-aware':
				$out_btn = '<div class="ads-button"><a href="' . $atts['url'] . '" target="' . $atts['target'] . '" class="' . $atts['view_btn'] . ' ' . $class . '">' . $icon_btn . ' ' . $atts['label_btn'] . '<span></span></a></div>';
				break;
			default:
				$out_btn = '<div class="ads-button"><a href="' . $atts['url'] . '" target="' . $atts['target'] . '" class="' . $atts['view_btn'] . ' ' . $class . '">' . $icon_btn . ' ' . $atts['label_btn'] . '</a></div>';
				break;
		}

		wp_enqueue_style( 'dashicons' );
		wp_enqueue_script( 'tds-script' );

		return $out_btn;
	}


	/**
	 * Row to columns
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return string
	 */
	public function row( $atts, $content = null ) {

		$output = '<div class="ads-row">' . do_shortcode( $content ) . '</div>';

		return $output;
	}


	/**
	 * Columns
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return string
	 */
	public function col( $atts, $content = null ) {

		$atts   = shortcode_atts(
			array(
				'col' => 'cell',
			),
			$atts
		);
		$output = '<div class="' . $atts['col'] . '">' . do_shortcode( $content ) . '</div>';

		return $output;
	}


	/**
	 * Separators
	 *
	 * @param $atts
	 *
	 * @since 1.5.0
	 *
	 * @return mixed
	 */
	public function hr( $atts ) {

		$atts   = shortcode_atts(
			array(
				'hr_style' => '',
				'class'    => '',
			),
			$atts
		);
		$class  = $atts['class'] ? $atts['class'] : '';
		$output = '<div class="' . $atts['hr_style'] . ' ' . $class . '"></div>';

		return apply_filters( 'ads_hr_filter_html', $output );

	}


	/**
	 * Dropcap
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return mixed
	 */
	public function dropcap( $atts, $content = null ) {

		$atts   = shortcode_atts(
			array(
				'class' => '',
			),
			$atts
		);
		$class  = $atts['class'] ? $atts['class'] : '';
		$output = '<span class="ads-dropcap ' . $class . '">' . do_shortcode( $content ) . '</span>';

		return apply_filters( 'ads_dropcap_filter_html', $output );
	}


	/**
	 * Left pull quote
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return mixed
	 */
	public function pullquote_left( $atts, $content = null ) {

		$atts   = shortcode_atts(
			array(
				'class' => '',
			),
			$atts
		);
		$class  = $atts['class'] ? $atts['class'] : '';
		$output = '<span class="ads-pullquote-left ' . $class . '">' . do_shortcode( $content ) . '</span>';

		return apply_filters( 'ads_pullquote_left_filter_html', $output );
	}


	/**
	 * Right pull quote
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return mixed
	 */
	public function pullquote_right( $atts, $content = null ) {

		$atts   = shortcode_atts(
			array(
				'class' => '',
			),
			$atts
		);
		$class  = $atts['class'] ? $atts['class'] : '';
		$output = '<span class="ads-pullquote-right ' . $class . '">' . do_shortcode( $content ) . '</span>';

		return apply_filters( 'ads_pullquote_right_filter_html', $output );
	}


	/**
	 * Center quote
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return mixed
	 */
	public function quote_center( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'quote' => '',
				'cite'  => '',
				'class' => '',
			),
			$atts
		);
		if ( isset( $atts['cite'] ) && ! empty( $atts['cite'] ) ) {
			$cite_quote = '<div class="ads-quote-center-cite"><span>' . $atts['cite'] . '</span></div>';
		} else {
			$cite_quote = '';
		}
		$class  = $atts['class'] ? $atts['class'] : '';
		$output = '<div class="ads-quote-center ' . $class . '"><span>' . do_shortcode( $content ) . '</span>' . $cite_quote . '</div>';

		return apply_filters( 'ads_quote_center_filter_html', $output );
	}


	/**
	 * Color box
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return string
	 */
	public function color_box( $atts, $content = null ) {

		$atts   = shortcode_atts(
			array(
				'color_background' => '#eee',
				'color_text'       => '#444',
			),
			$atts
		);
		$output = '<div class="ads-color-box" style="color:' . $atts['color_text'] . ';background:' . $atts['color_background'] . ';">' . do_shortcode( $content ) . '</div>';

		return $output;
	}


	/**
	 * Blur spoiler
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return string
	 */
	public function blur_spoiler( $atts, $content = null ) {

		$atts = shortcode_atts(
			array(
				'color_blur' => '',
			),
			$atts
		);
		if ( $atts['color_blur'] ) {
			$output = '<style type="text/css">
		.ads-blur-spoiler-reverse{text-shadow: 0 0 20px ' . $atts['color_blur'] . ';}.ads-blur-spoiler-reverse:hover {color: ' . $atts['color_blur'] . ';}
		</style>
		<span class="ads-blur-spoiler-reverse">' . do_shortcode( $content ) . '</span>';
		} else {
			$output = '<span class="ads-blur-spoiler">' . do_shortcode( $content ) . '</span>';
		}

		return $output;
	}


	/**
	 * Space
	 *
	 * @param $atts
	 *
	 * @since 1.5.0
	 *
	 * @return string
	 */
	public function hr_space( $atts ) {

		$atts = shortcode_atts(
			array(
				'space' => '5',
			),
			$atts
		);

		return '<div style="margin:' . $atts['space'] . 'px 0"></div>';
	}


	/**
	 * Special shortcode for shortcodes
	 *
	 * @param      $atts
	 * @param null $content
	 *
	 * @since 1.5.0
	 *
	 * @return string
	 */
	public function special_letters( $atts, $content = null ) {

		$atts    = shortcode_atts(
			array(
				'class' => '',
			),
			$atts
		);
		$class   = $atts['class'] ? $atts['class'] : '';
		$content = str_replace( [ '[', ']' ], [ '&#91;', '&#93;' ], $content );

		return '<div class="shortcode-html ' . $class . '">' . do_shortcode( $content ) . '</div>';
	}

}

