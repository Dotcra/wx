<?php
$sig = $_GET["signature"];
$timestamp = $_GET["timestamp"];
$nonce = $_GET["nonce"];
$ranstr = $_GET["echostr"];
$token = "sb165g78315j8kqb1z5t";

$a = array($token,$timestamp,$nonce);
sort($a, SORT_STRING);
$signature = sha1(implode($a));
if($signature == $sig){
	echo $ranstr;
}
else{
	echo "fuckyou\n";
}
