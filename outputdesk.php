<?php
/*
Plugin Name: Output Desk Chat
Description: Output Desk is a free powerful Live Chat to engage your website visitors / customers in real-time and improve your sales.
Author: Srimax
Version: 1.0.1
Author URI: https://www.outputdesk.com/
*/
include('definitions.php');
class ODC_OutputDesk {
	private static $instance = "";
		private function __construct(){
		spl_autoload_register(array(&$this,"autoloadClass"));
		if (is_admin()) {
			ODC_OutputDesk_Admin::get_instance();
		}
		add_action("wp_footer", array("ODC_OutputDesk_Chat", "doChat"));
	}

	public static function get_instance(){
		if (self::$instance === "")self::$instance = new self();
		return (self::$instance);
	}

	public function autoloadClass($name){
		// setup the class name
		$class = strtolower(str_replace('ODC_OutputDesk_', '', $name));
		if (file_exists(ODC_PLUGIN_DIR . "classes/" . $class . ".php"))
			require_once(ODC_PLUGIN_DIR . "classes/" . $class . ".php");
	}
}
ODC_OutputDesk::get_instance();

register_activation_hook(__FILE__,array('ODC_OptionClass', 'on_activation'));
register_deactivation_hook(__FILE__,array('ODC_OptionClass', 'on_deactivation'));
register_uninstall_hook(__FILE__,array('ODC_OptionClass', 'on_uninstall'));

add_action('plugins_loaded',array('ODC_OptionClass', 'init'));
class ODC_OptionClass {
    protected static $instance;
    public static function init(){
        is_null(self::$instance) AND self::$instance = new self;
        return self::$instance;
    }

    public static function on_activation(){
        if ( ! current_user_can( 'activate_plugins' ) )
            return;
    }

    public static function on_deactivation(){
        if ( ! current_user_can( 'activate_plugins' ) )
            return;
	delete_option("ODC_SALT");
    }

    public static function on_uninstall(){
        if ( ! current_user_can( 'activate_plugins' ) )
            return;
	delete_option("ODC_SALT");
        if ( __FILE__ != WP_UNINSTALL_PLUGIN )
            return;
    }

    public function __construct(){
    }
}

