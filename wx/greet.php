<?php
/*
* greet the fucking wechat server
*
 */

class greet{
	private $timestamp;
	private $nonce;
	private $sig0;
	private $str;
	private $token;

	function __construct(){
		if(isset($_GET["echostr"])){
			$arr = json_decode(file_get_contents('key.json'), 1);
			$this->token = $arr['wx'][2];
			//$this->token = $arr['wxbeta'][2];
			$this->timestamp = $_GET["timestamp"];
			$this->nonce = $_GET["nonce"];
			$this->sig0 = $_GET["signature"];
			$this->str = $_GET["echostr"];
			$a = array($this->timestamp,$this->nonce,$this->token);
			sort($a, SORT_STRING);
			$sig = sha1(implode($a));
			if($sig == $this->sig0)
				echo $this->str;
			else
				echo "get out\n";
			exit;
		}
	}
}
