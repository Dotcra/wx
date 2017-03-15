<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */

class pus{
	private $a;
	private $b;
	private $c;
	function __construct(){
	}

	function __destruct(){
	}

	function ff(){
		echo "fuck";
	}

	static function f(){
		$this->ff();
	}
}

#new pus();
#pus::f();

$a = $b = 5;
echo $a.$b;
