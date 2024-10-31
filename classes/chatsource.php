<?php
class ODC_OutputDesk_ChatSource{
	public function update_widget_options(){
		$admin   = ODC_OutputDesk_Admin::get_instance();
		$messages = ODC_OutputDesk_Messages::get_instance();
	}

	public function displaySource($accountDetails){
		if($accountDetails["plan"] == "trial")$accountDetails["plan"] = "Trail Plan";
		else $accountDetails["plan"] .= "Paid Plan";
		include(ODC_PLUGIN_DIR . "source.php");
	}
}
