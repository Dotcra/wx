<?php
require_once 'autoload.php';

$a = new greet($_GET["timestamp"], $_GET["nonce"], $_GET["signature"], $_GET["echostr"]);

$b = new talk;
