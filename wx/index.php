<?php
$sig = $_GET["signature"];
$timestamp = $_GET["timestamp"];
$nonce = $_GET["nonce"];
$ranstr = $_GET["echostr"];

$token = "sag78315j8kqb1z";

$a = array($token,$timestamp,$nonce);
$signature = sha1(implode(sort($a)));
if($signature == $sig){
	echo $ranstr;
	echo "\n";
}
else{
	echo $ranstr."\n";
	echo "fuckyou\n";
	echo $signature;
	echo "\n";
}
