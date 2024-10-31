<?php
//{"message":"","name":"","plan":"","code":""}
class ODC_OutputDesk_ChatLogin{
	public function do_login() {
		$admin   = ODC_OutputDesk_Admin::get_instance();
		$messages = ODC_OutputDesk_Messages::get_instance();
		$secret = $admin->validate($_POST["secret"]);
		$password = $admin->validate($_POST["password"]);
		$ODC_USER = $admin->validate($_POST["ODC_USER"]);
		if (!(isset($secret)) || (!wp_verify_nonce($secret, 'outputdesk_login'))) {
			update_option("ODC_SALT", 'wronglogin');
			$messages->add_message("error","Invalid Form", "error");
		} else {
			if ($ODC_USER != "" && $password != "") {
				$logindata   = array('username' => $ODC_USER,"password" => $password);
				$response = $admin->makeRequest(ODC_LOGIN_URL,$logindata);
				$loginresult = json_decode($response);
				if (strtolower($loginresult->message)=="fail"){
					$messages->add_message("error", "Username or Password did not match", 'error');
					update_option("ODC_SALT", 'wronglogin');
				} else if ($loginresult){
					update_option("ODC_SALT", $response);
				} else {
					update_option("ODC_SALT","");
					$messages->add_message( 'error', "We can't reach Output Desk server", 'error' );
				}
			} else {
				update_option("ODC_SALT", "wronglogin");
				$messages->add_message( 'error', "Counld not logged in, check username and Password", 'error' );
			}
		}
	}

	public function display_login_form() {
		$messages = ODC_OutputDesk_Messages::get_instance();
		include(ODC_PLUGIN_DIR . "login.php");
	}
}
