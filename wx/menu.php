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
	private $data;
	private $c;
	function __construct(){
		$this->ass = (new ass)->cache();
	}

	function get(){
		$this->url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=$this->ass";
	}

	function create(){
		$this->data = '
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
               "name":"搜索",
               "url":"http://www.soso.com/"
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
	}

	function set(){
		$this->url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=$this->ass";
		$this->curl["post"] = "1";
		$this->create();
		$this->curl["postfields"] = $this->data;
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

