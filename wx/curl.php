<?php
class curl{
	function go($opts=array()){
		$opts = array_change_key_case($opts, CASE_UPPER);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		foreach($opts as $k => $v){
			#echo $k." => ".$v;
			curl_setopt($ch, constant("CURLOPT_$k"), $v);
		}
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
}

/*
$a = array(
	"url" => "https://xxx",
	"returntransfer" => 0,
	"header" => 0,
	"post" => 1,
	"postfields" => "key=816d8ddc83c3406960573&info=hi",
);

$b = curl::go($a);
var_dump($b);
*/
