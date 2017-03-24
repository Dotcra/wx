<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */

//require_once 'autoload.php';

class junecmd{
	static function go($hesaid){
		$arr = explode(' ', $hesaid, 2);
		if (isset($arr[1]))
			$arr[1] = trim($arr[1]);
		else
			$arr[1] = '';
		$o = new dodoact;

		switch($arr[0]){
		case '看看':
			return $o->check();
		case '臭臭':
		case '觉觉':
		case '醒醒':
		case '喂喂':
		case '粉粉':
		case '尿尿':
			return $o->add($arr[0], $arr[1]);
		}
	}
}

//var_dump(junecmd::go('看看'));
