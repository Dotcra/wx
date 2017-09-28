<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */
//require_once 'autoload.php';

class media{
	function __construct(){
	}

	function __destruct(){
	}

	static function addtemp($file = 'isay.mp3'){
		switch(strrchr($file, '.')){
		case '.mp3':
		case '.amr':
		case '.wav':
		case '.wma':
			$type = 'voice';
			break;
		case '.png':
		case '.jpeg':
		case '.jpg':
		case '.gif':
		case '.bmp':
			$type = 'image';
			break;
		case '.mp4':
			$type = 'video';
			break;
		case '.jpg':
			$type = 'thumb';
			break;
		}


		$ass = key::ass('wxbeta');
		$url = "https://api.weixin.qq.com/cgi-bin/media/upload?access_token=$ass&type=$type";
		$a = array(
			'url' => $url,
			'post' => 1,
			'postfields' => array(new CURLFile($file)),
		);

		$arr = json_decode(curl::go($a), 1);
		return $arr['media_id'];

	}
}

//echo media::addtemp();
