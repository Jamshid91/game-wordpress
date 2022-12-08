<?php
/**
 * Jeg Elementor Kit Banner Class
 *
 * @package jeg-elementor-kit
 * @author Jegtheme
 * @since 2.5.5
 */

namespace Jeg\Elementor_Kit\Banner;

/**
 * Class Banner
 *
 * @package jeg-elementor-kit
 */
class Banner {
	/**
	 * Option Name.
	 *
	 * @var string
	 */
	private $option_name = 'jkit_banner_active_time';

	/**
	 * How Long timeout until first banner shown.
	 *
	 * @var int
	 */
	private $first_time_show = 3;

	/**
	 * How Long timeout after first banner shown.
	 *
	 * @var int
	 */
	private $another_time_show = 30;

	/**
	 * Template slug
	 *
	 * @var string
	 */
	private $template_slug = 'templates/banner/';

	/**
	 * Class instance
	 *
	 * @var Element
	 */
	private static $instance;

	/**
	 * Init constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_active_time' ) );
		add_action( 'admin_notices', array( $this, 'notice' ) );
		add_action( 'wp_ajax_jkit_notice_banner_close', array( $this, 'close' ) );
		add_action( 'wp_ajax_jkit_notice_banner_review', array( $this, 'review' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Get class instance
	 *
	 * @return Banner
	 */
	public static function instance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * Enqueue Script.
	 */
	public function enqueue_scripts() {
		if ( $this->can_render_notice() ) {
			wp_enqueue_script( 'jkit-notice-banner', JEG_ELEMENTOR_KIT_URL . '/assets/js/admin/notice-banner.js', array( 'jquery' ), JEG_ELEMENTOR_KIT_VERSION, true );
			wp_enqueue_style( 'jkit-notice-banner', JEG_ELEMENTOR_KIT_URL . '/assets/css/admin/notice-banner.css', array(), JEG_ELEMENTOR_KIT_VERSION );
		}
	}

	/**
	 * Register Active Time.
	 */
	public function register_active_time() {
		$time = get_option( $this->option_name );

		if ( ! $time ) {
			$next_time = time() + $this->get_second( $this->first_time_show );
			add_option( $this->option_name, $next_time );
		}
	}

	/**
	 * Get Second by days.
	 *
	 * @param int $days Days Number.
	 *
	 * @return int
	 */
	public function get_second( $days ) {
		return $days * 24 * 60 * 60;
	}

	/**
	 * Check if we can render notice.
	 */
	public function can_render_notice() {
		$option = get_option( $this->option_name );
		$time   = time();

		if ( 'review' === $option ) {
			return false;
		}

		return $time > $option;
	}

	/**
	 * Close Button Clicked.
	 */
	public function close() {
		$next_time = time() + $this->get_second( $this->another_time_show );

		update_option( $this->option_name, $next_time );
		wp_send_json_success();
	}

	/**
	 * Review Button Clicked.
	 */
	public function review() {
		update_option( $this->option_name, 'review' );
		wp_send_json_success();
	}

	/**
	 * Show Notice.
	 */
	public function notice() {
		if ( $this->can_render_notice() ) {
			jkit_get_template_part( $this->template_slug . 'notice-banner' );
		}
	}

}
