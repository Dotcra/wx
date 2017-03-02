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
		$this->ass = (new ass)->cache();
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
		$theveryvalue = array($abtn);
		$abtn["sub_button"] = $theveryvalue;
		$theveryvalue = array($abtn);
		$justonearr= array("button" => $theveryvalue);
		echo json_encode($justonearr);
		echo "\n";

		$data = '
 {
     "button":[
     {
          "type":"click",
          "name":"今日歌曲",
          "key":"V1001_TODAY_MUSIC"
      },
      {
           "name":"菜单",
           "sub_button":[
           {
               "type":"view",
               "name":"dot",
               "url":"https://dotcra.com"
            },
            {
               "type":"view",
               "name":"视频",
               "url":"http://v.qq.com/"
            },
            {
               "type":"click",
               "name":"赞一下我们",
               "key":"V1001_GOOD"
            }]
       }]
 }';
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

#(new menu)->set();

$abtn = array(
	"type" => "click", # clik, view...
	"name" => "fuck",
	"key" => "fuck", # do NOT need in type view
	"sub_button" => [ ],
);
$theveryvalue = array($abtn);
$abtn["sub_button"] = $theveryvalue;
$theveryvalue = array($abtn);
$justonearr= array("button" => $theveryvalue);
echo json_encode($justonearr);
echo "\n";
