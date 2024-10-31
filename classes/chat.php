<?php
class ODC_OutputDesk_Chat{
	public static function doChat(){
		global $current_user;
		get_currentuserinfo();
		$code = (array)json_decode(get_option("ODC_SALT"));
		echo "<script language='javascript' type='text/javascript'>";
		echo $code["code"];
		echo "</script>";
	}
}
