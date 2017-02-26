<?php
class p{
	function f(){
		echo "fuck\n";
		$this->f();
	}

}

$jess = new p;
$jess->f();
