<?php
class robot{
	private $a;
	private $b;
	private $c;
	function __construct(){
	}

	function __destruct(){
	}

	function resp($hesaid){
		$url = "http://www.tuling123.com/openapi/api";
		$key = "816d8ddc83c34069855fa7aec3160573";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "key=$key&info=$hesaid");
		$json = curl_exec($ch);
		curl_close($ch);

		$a = json_decode($json, true);
		return $a["text"];

	}
}

#$a = robot::resp($_GET['s']);
#echo $a;
