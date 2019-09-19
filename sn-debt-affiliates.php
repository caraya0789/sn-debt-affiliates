<?php
/*
	Plugin Name: SeitzNetwork Debt Affiliates
	Plugin URI:  http://seitznetwork.com
	Description: Affiliates Instructions Page
	Version:     1.0.0
	Author:      Cristian Araya
	Author URI:  http://seitznetwork.com
	Text Domain: sn_debt_affiliates
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

define( 'SNDA_FILE', __FILE__ );
define( 'SNDA_PATH', plugin_dir_path(SNDA_FILE) );
define( 'SNDA_URL', plugin_dir_url(SNDA_FILE) );

class SN_Debt_Affiliates {

	protected static $_instance;

	public function hooks() {
		add_action('admin_menu', array($this, 'adminPage'));
		add_shortcode('sn-debt-affiliates-widget', array($this, 'affiliatesWidget'));

		wp_register_script( 'sn_debt_affiliates_js_widget', SNDA_URL . 'assets/js/widget.js', array(), '1.0.0', true );
	}

	public function adminPage() {
		add_submenu_page( 
	        'options-general.php',
	        'SeitzNetwork Debt Affiliates',
	        'SN Debt Affiliates',
	        'manage_options',
	        'sn-debt-affiliates',
	        array($this, 'adminPageContent')
	    );
	}

	public function adminPageContent() {
		include SNDA_PATH.'admin/shortcodes.php';
	}

	public function affiliatesWidget() {
		wp_enqueue_script('sn_debt_affiliates_js_widget');
		ob_start();
		include SNDA_PATH.'widget.php';
		$content = ob_get_clean();
		return $content;
	}

	public static function instance() {
		if(null === self::$_instance)
			self::$_instance = new self();

		return self::$_instance;
	}

}

function sn_debt_affiliates() {
	return SN_Debt_Affiliates::instance();
}

add_action('plugins_loaded', array(sn_debt_affiliates(), 'hooks'));