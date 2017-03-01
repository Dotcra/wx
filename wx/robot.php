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
		$a = array(
			"url" => $url,
			"header" => 0,
			"post" => 1,
			"postfields" => "key=$key&info=$hesaid",
		);
		$data = curl::go($a);

		$a = json_decode($data, true);
		return $a["text"];

	}
}

#$a = robot::resp($_GET['s']);
#echo $a;
