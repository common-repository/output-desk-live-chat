<?php
class ODC_OutputDesk_Admin{
	private static $instance = "";
	private function __construct(){
		add_action("admin_init", array(&$this,"add_outputdesk_caps"));
		add_action("admin_init",array(&$this,"settings"));
		add_action("admin_menu",array(&$this,"menuLoad"));
	}

	public static function get_instance(){
		if (self::$instance === "")self::$instance = new self();
		return (self::$instance);
	}

	public function menuLoad(){
		add_menu_page(__( "Account Configuration","outputdesk-chat" ),__("Output Desk Chat","outputdesk-chat"),"access_outputdesk","outputdesk_configure",array(&$this,"outputdesk_configure"),ODC_SMALL_LOGO);
	}

	public function add_outputdesk_caps(){
		$role = get_role("administrator");
		$role->add_cap("access_outputdesk");
	}

	public function settings(){
		register_setting("registerGroup","ODC_SALT");
	}

	public function makeRequest($url,$data){
		$args = array("body"=>$data);
		$response = wp_remote_post($url,$args);
		if (is_wp_error($response)){
			$error = array("wp_error" => $response->get_error_message());
			return json_encode($error);
		}
		return $response["body"];
	}

	public function validate($value,$type="textField"){
		if($type=='textField'){
			return sanitize_text_field($value);
		}else if($type=='Email'){
			return sanitize_email($value);
		}
	}

	public function outputdesk_configure(){
		$messages = ODC_OutputDesk_Messages::get_instance();
		$login = new ODC_OutputDesk_ChatLogin();
		$source = new ODC_OutputDesk_ChatSource();
		$action = $this->validate($_GET["action"]);
		?>
		<div class="wrap">
		<?php
		$action = $this->validate($_POST["action"]);

		if($action == "login")$login->do_login();

		$options = (array)json_decode(get_option("ODC_SALT"));

		if(isset($options["plan"])){
			$source->displaySource($options);
		} else {
			$login->display_login_form();
		}
	}


}
