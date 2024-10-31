<?php
class ODC_OutputDesk_Messages{
	protected static $instance = "";
	public $messages = array();
	public static function get_instance(){
		if (self::$instance === "")self::$instance = new self();
		return (self::$instance);
	}

	public function add_message($context, $text, $type = 'note' ){
		if(isset($this->messages[$context . "_" . $type]))$this->messages[$context . '_' . $type][] = $text;
		else $this->messages[$context . "_" . $type] = array($text);
	}

	public function display($context){
		echo "<div class='messages'>";
		foreach(array("error","message") as $type){
			if(isset($this->messages[$context . "_" . $type])){
				$messages = $this->messages[$context . "_" . $type];
				foreach($messages as $message)$this->message($message,$type);
			}
		}
		echo '</div>';
	}

	private function message($text, $type = "note"){
?>
	<div class="<?php echo $type; ?>"><?php echo $text;?></div>
<?php
	}
}
