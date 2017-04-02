<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */

require_once 'autoload.php';

class menu{
	private $ass;
	private $url;
	private $curl = array();
	private $c;
	function __construct(){
		$this->ass = key::ass('wxbeta');
	}

	function get(){
		$this->url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=$this->ass";
	}

	function set(){
		$abtn3a = array(
			//"type" => "click",
			//"type" => "view",
			"type" => "scancode_push",
			//"type" => "scancode_waitmsg",
			//"type" => "pic_sysphoto",
			//"type" => "pic_photo_or_album",
			//"type" => "pic_weixin",
			//"type" => "location_select",
			//"type" => "media_id",
			//"type" => "view_limited",
			"name" => "scanpush",
			"key" => "fuck", # do NOT need in type view
			//"url" => "http://a.com", # do NOT need in type click
			"sub_button" => [ ],
		);
		$abtn3b = array(
			"type" => "location_select",
			"name" => "location",
			"key" => "fuck", # do NOT need in type view
			"sub_button" => [ ],
		);
		$abtn3c = array(
			"type" => "media_id",
			"name" => "mediaid",
			"key" => "fuck", # do NOT need in type view
			"media_id" => "JlljdHwGYLJ3NFM3SIDNffueazEcjnsmPmEva36JBo8bLChCykv1NAULAhgnyrkq",
			"sub_button" => [ ],
		);
		$abtn3d = array(
			"type" => "view_limited",
			"name" => "limit",
			"media_id" => "JlljdHwGYLJ3NFM3SIDNffueazEcjnsmPmEva36JBo8bLChCykv1NAULAhgnyrkq",
			"key" => "fuck", # do NOT need in type view
			"sub_button" => [ ],
		);
		$abtn3e = array(
			"type" => "pic_weixin",
			"name" => "wx",
			"key" => "fuck", # do NOT need in type view
			"sub_button" => [ ],
		);
		$abtn1 = array(
			"type" => "view", # clik, view...
			"name" => "DOTCRA",
			"url" => "http://dotcra.com", # do NOT need in type view
			"sub_button" => [ ],
		);
		$abtn2 = array(
			"type" => "view", # clik, view...
			"name" => "ITOVE",
			"url" => "http://itove.com", # do NOT need in type view
			"key" => "fuck", # do NOT need in type view
			"sub_button" => [ ],
		);
		$abtn3 = array(
			//"type" => "click", # clik, view...
			"name" => "subs",
			"key" => "fuck", # do NOT need in type view
			"sub_button" => [$abtn3a, $abtn3b],
		);

		$allbtn = array($abtn1, $abtn2, $abtn3);
		$data = json_encode(array("button" => $allbtn));
		$this->url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$this->ass";
		$this->curl["post"] = "1";
		$this->curl["postfields"] = $data;
		//var_dump($allbtn);
		//echo $data;
	}

	function del(){
		$this->url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=$this->ass";
	}

	function __destruct(){
		$this->curl["url"] = $this->url;
		echo curl::go($this->curl);
	}

}

$a = new menu;
$a->set();
//$a->get();
//$a->del();
