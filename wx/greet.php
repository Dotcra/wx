<?php
/*
* greet the fucking wechat server
*
 */

class greet{
	private $timestamp;
	private $nonce;
	private $sig0;
	private $str;
	private $token = "kj5oJn8afut17";

	function __construct($i,$j,$k,$l){
		$this->timestamp = $i;
		$this->nonce = $j;
		$this->sig0 = $k;
		$this->str = $l;
		$a = array($this->timestamp,$this->nonce,$this->token);
		sort($a, SORT_STRING);
		$sig = sha1(implode($a));
		if($sig == $this->sig0)
			echo $this->str;
		else
			echo "get out\n";
	}
}
