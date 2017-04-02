<?php
function myautoload($class){
	require_once $class . '.php';
}
spl_autoload_register('myautoload');

// spl_autoload_register(function ($class){
// 	require_once $class . '.php';
// });
