<?php
class logtofile{
	function __construct($content){
		$fp = fopen("log.html","a+");
		fwrite($fp,$content);
		fwrite($fp,"<br />");
		fclose($fp);
	}

	function __destruct(){
	}

	function f(){

	}
}

