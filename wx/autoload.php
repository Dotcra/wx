<?php
function myautoload($class){
	require_once $class . '.php';
}
spl_autoload_register('myautoload');

// spl_autoload_register(function ($class){
// 	require_once $class . '.php';
// });

$inc = __dir__ . "/inc";
$page = $inc."/".$_GET['t'].".inc";
if(!file_exists($page)) $page = $inc . "/index.inc";
require $page;

class load{
	function __construct(){
		$inc = __dir__ . "/inc";
		$page = $inc."/".$_GET['t'].".inc";
		if(!file_exists($page)) $page = $inc . "/index.inc";
		require $page;
	}
}

class member{
	private $a;
	private $b;
	private $c;
	function __construct(){
	}

	function __destruct(){
	}

	function signup(){
	}

	static function signin(){
		if(isset($_POST["signin"])){
			echo "<script>location.href='inc/mem.inc'</script>";
		}
	}
}

#new pus();
#pus::f();

