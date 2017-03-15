<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */
require_once "autoload.php";

class ass{
	private $appid;
	private $appsecret;
	private $url;

	function __construct(){
	$this->appid = "wx16f10e7e59616e93";
	$this->appsecret = "9444c915c3e4ef5a1e82c1693f4e851d";
	$this->url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appid&secret=$this->appsecret";
	}

	function __destruct(){
	}

	function gen(){
		// now store $ass
		if (time() - @filectime('wx_token') > 7180){
			$a = array(
				"url" => "$this->url",
			);
			$ass = curl::go($a);
			$ass = json_decode($ass, true);
			$ass = $ass["access_token"];
			file_put_contents('wx_token', $ass);
			return $ass;
		}

		return file_get_contents('wx_token');
	}

}

(new ass)->gen();
