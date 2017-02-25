<?php
$sig = $_GET["signature"];
$timestamp = $_GET["timestamp"];
$nonce = $_GET["nonce"];
$ranstr = $_GET["echostr"];
$token = "dot";

$a = array($token,$timestamp,$nonce);
sort($a, SORT_STRING);
$signature = sha1(implode($a));
if($signature == $sig){
	echo $ranstr;
}
else{
	echo $ranstr."\n";
	echo "fuckyou\n";
}

$fp = fopen("log.html", "a+");
fwrite($fp, $sig ." ". $timestamp ." ". $nonce ." ". $ranstr ." ". $token. "\n");
fwrite($fp, $signature ."\n");
fclose($fp);
