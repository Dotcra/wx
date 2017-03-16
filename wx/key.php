<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */

class key{
	static function ass($vendor){
		$arr = json_decode(file_get_contents('key.json'), 1);
		// if (is_array($arr[$vendor]))
		// 	$key = $arr[$vendor][0];
		// else $key = $arr[$vendor];
		$vend = substr($vendor, 0, 2); // so that 'wx' and 'wxbeta' can share case 'wx':

		switch($vend){
		case "ms":
			$url = "https://api.cognitive.microsoft.com/sts/v1.0/issueToken";
			$opts = array(
				"url" => $url,
				"post" => 1,
				"httpheader" => array(
					"Ocp-Apim-Subscription-Key: ${arr[$vendor]}",
					'Content-length: 0',
				),
			);
			// if older than 600 sec, renew it
			if (time() - @filectime('cog_ass') > 590) file_put_contents('cog_ass', curl::go($opts));
			return file_get_contents('cog_ass');
		case 'wx':
			$appid = $arr[$vendor][1];
			$appsecret = $arr[$vendor][0];
			$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appid&secret=$this->appsecret";
			// if older than 7200 sec, renew it
			if (time() - @filectime('wx_ass') > 7180){
				$a = array(
					"url" => $url,
				);
				$ass = curl::go($a);
				$ass = json_decode($ass, 1);
				$ass = $ass["access_token"];
				file_put_contents('wx_ass', $ass);
				return $ass;
			}
			return file_get_contents('wx_ass');
		default:
			return $arr[$vendor];
		}
	}
}
