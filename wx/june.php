<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */

//require_once 'autoload.php';

class june{
	static function cmd($hesaid){
		$arr = explode(' ', $hesaid, 3);
		$act = $arr[0];

		if (isset($arr[1])){
			$arr[1] = trim($arr[1]);
			if (is_numeric($arr[1])) $num = $arr[1]; else $comment = $arr[1];
		}
		if (isset($arr[2])){
			$arr[2] = trim($arr[2]);
			if (isset($num)) $comment = $arr[2]; else $num = $arr[2];
		}
		if (! isset($num)) $num = '';
		if (! isset($comment)) $comment = '';

		$dodo = new dodo;

		switch($act){
		case '看看':
			return $dodo->mem($num);
		case '臭臭':
		case '觉觉':
		case '醒醒':
		case '喂喂':
		case '粉粉':
		case 'test':
		case '尿尿':
		case '哭哭':
		case '笑笑':
			return $dodo->act($act, $comment, $num);
		case '问问':
			return $a = array('type' => 'text', 'isay' => '看看 臭臭 觉觉 醒醒 喂喂 粉粉 尿尿 哭哭 笑笑 问问');
		case '钱钱':
			if(! isset($arr[1])) $dodo->bill(); else $dodo->cost();
		}
	}
}

//var_dump(june::cmd('臭臭'));
//var_dump(june::cmd('看看'));
//if(june::cmd('sth')) echo 1; else echo 0;
