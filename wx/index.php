<?php
$sig = $_GET["signature"];
$timestamp = $_GET["timestamp"];
$nonce = $_GET["nonce"];
$ranstr = $_GET["echostr"];

$token = "sag78315j8kqb1z";

$a = array($token,$timestamp,$nonce);
if(sha1(implode(sort($a))) == $sig)
	echo $ranstr;
else
	echo "fuckyou";
