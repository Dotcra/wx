<?php
/*
* greet the fucking wechat server
*
 */

class greet{
	function __construct(){
		if(isset($_GET["echostr"])){
			$arr = json_decode(file_get_contents('sec/key.json'), 1);

			$token = $arr['wx']['token'];
			$token_beta = $arr['wxbeta']['token'];

			$timestamp = $_GET["timestamp"];
			$nonce = $_GET["nonce"];
			$sig0 = $_GET["signature"];
			$str = $_GET["echostr"];

			$a = array($timestamp,$nonce,$token);
			sort($a, SORT_STRING);
			$sig = sha1(implode($a));

			$a_beta = array($timestamp,$nonce,$token_beta);
			sort($a_beta, SORT_STRING);
			$sig_beta = sha1(implode($a_beta));

			if($sig == $sig0 || $sig_beta == $sig0)
				echo $str;
			else
				echo "fuck off\n";
			exit;
		}
	}
}
