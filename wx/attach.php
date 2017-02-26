<?php
class attach{
	function checksig(){
		define("TOKEN","85kqom98Yas65AZ7f");
		$sig = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];
		$ranstr = $_GET["echostr"];

		$a = array(TOKEN,$timestamp,$nonce);

		sort($a, SORT_STRING);
		$signature = sha1(implode($a));
		if($signature == $sig){
			echo $ranstr;
		}
		else{
			echo "get out\n";
		}
	}
}
