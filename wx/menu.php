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
		$abtn = array(
			"type" => "click", # clik, view...
			"name" => "fuck",
			"key" => "fuck", # do NOT need in type view
			"sub_button" => [ ],
		);
		$abtn1 = array(
			"type" => "click", # clik, view...
			"name" => "fuck",
			"key" => "fuck", # do NOT need in type view
			"sub_button" => [ ],
		);
		$abtn2 = array(
			"type" => "click", # clik, view...
			"name" => "fuck",
			"key" => "fuck", # do NOT need in type view
			"sub_button" => [ ],
		);
		$abtn3 = array(
			"type" => "click", # clik, view...
			"name" => "fuck",
			"key" => "fuck", # do NOT need in type view
			"sub_button" => [ ],
		);

		$allbtn = array($abtn1, $abtn2, $abtn3);
		$data = json_encode(array("button" => $allbtn));
		$this->url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$this->ass";
		$this->curl["post"] = "1";
		$this->curl["postfields"] = $data;
	}

	function del(){
		$this->url = "https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=$this->ass";
	}

	function __destruct(){
		$this->curl["url"] = $this->url;
		echo curl::go($this->curl);
	}

}

(new menu)->set();
