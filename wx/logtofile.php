<?php
class logtofile{
	function __construct($content, $this=""){
		$fp = fopen("log.html","a+");
		fwrite($fp,$this);
		fwrite($fp,"\n");
		fwrite($fp,$content);
		fwrite($fp,"<br />");
		fclose($fp);
	}

	function __destruct(){
	}

	function f(){

	}
}

