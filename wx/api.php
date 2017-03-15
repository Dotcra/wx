<?php
/**
 * @api
 */

require_once 'autoload.php';

class api{
	function __construct(){
	}

	function __destruct(){
	}

	// talk robot
	static function talk($hesaid){
		$url = "http://www.tuling123.com/openapi/api";
		$key = "816d8ddc83c34069855fa7aec3160573";
		$opts = array(
			"url" => $url,
			"header" => 0,
			"post" => 1,
			"postfields" => "key=$key&info=$hesaid",
		);
		$data = curl::go($opts);

		$a = json_decode($data, true);
		return $a["text"];

	}

	// microsoft cognitive speech synthesis
	static function ss($isay, $lang = 'zh-TW'){
		// get access token
		$url = "https://api.cognitive.microsoft.com/sts/v1.0/issueToken";
		$opts = array(
			"url" => $url,
			"post" => 1,
			"httpheader" => array(
				'Ocp-Apim-Subscription-Key: 34c42cb28351484a84d11c018d47a4b9',
				'Content-length: 0',
			),
		);
		// if older than 600 sec, renew it
		if (time() - @filectime('cog_token') > 590) file_put_contents('cog_token', curl::go($opts));
		$token = file_get_contents('cog_token');

		// now request
		$url = "https://speech.platform.bing.com/synthesize";
		$v = array(
			"zh-TW" => "Yating, Apollo",
			"zh-CN" => "HuihuiRUS",
			//"zh-CN" => "Yaoyao, Apollo",
			"en-US" => "ZiraRUS",
			"en-CA" => "Linda",
			"en-GB" => "Susan, Apollo",
			"en-AU" => "Catherine",
		);

		// assemble xml
		$doc = new DOMDocument();
		$root = $doc->createElement( "speak" );
		$root->setAttribute( "version" , "1.0" );
		$root->setAttribute( "xml:lang" , $lang );
		$voice = $doc->createElement( "voice" );
		$voice->setAttribute( "xml:lang" , $lang );
		//$voice->setAttribute( "xml:gender" , "Female" );
		$voice->setAttribute( "name" , "Microsoft Server Speech Text to Speech Voice ($lang, ${v[$lang]})" );
		$text = $doc->createTextNode( $isay );
		$voice->appendChild( $text );
		$root->appendChild( $voice );
		$doc->appendChild( $root );
		$data = $doc->saveXML();

		$opts = array(
			"url" => $url,
			"post" => 1,
			"header" => 1, // fuck
			"httpheader" => array(
				'Content-Type: application/ssml+xml',
				"X-Microsoft-OutputFormat: riff-16khz-16bit-mono-pcm",
				"X-Search-AppId: 07D3234E49CE426DAA29772419F436CA",
				"X-Search-ClientID: 1ECFAE91408841A480F00935DC390960",
				"User-Agent: TTSPHP",
				'Authorization: ' . 'Bearer ' . $token,
				"content-length: ".strlen($data),
			),
			"postfields" => $data,
		);
		file_put_contents("isay.mp3", curl::go($opts));
		
	}

	static function vv($num=""){
		if (empty($num)) exit("give me a number\n");

		// $num = ltrim($num, 86);
		if(! preg_match('/^[0-9]{11,12}$/', $num)) die("Wrong number.\n");

		date_default_timezone_set("Asia/Shanghai");
		$code = rand(999, 9999);
		$url = "https://api.miaodiyun.com/20150822/call/voiceCode";
		$sid = "f9572cc6ae5347f1a84c0041256af0c2";
		$key = "f69e2bd3eab446518e98b92ecdd6fc64";
		$time = date("YmdHis");
		$sig = md5($sid.$key.$time);
		$opts = array(
			"url" => $url,
			"post" => 1,
			"postfields" => "accountSid=$sid&verifyCode=$code&called=$num&playTimes=3&timestamp=$time&sig=$sig",
		);
		var_dump($opts);
		return $data = curl::go($opts);
	}
}

api::ss('又是一年3.15，一些欺诈消费者的手段将会被曝光。在前几天提速降费的政策出台后，很多资深网友表示并不看好。最典型的一个事件就是，宽带网速明明提高了，上网速度为何慢了呢?', 'zh-TW');
