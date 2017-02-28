<?php
class talk{
		private $rawdata;
		private $postdata;
		private $me;
		private $he;
		private $histype;
		private $mytype;
		private $hesaid;
		private $mydata;
		private $isay;
		private $event;
		private $mediaid;

	function __construct(){
		$this->rawdata = file_get_contents("php://input");
		$this->postdata = simplexml_load_string($this->rawdata,"SimpleXMLElement", LIBXML_NOCDATA);
		$this->me = $this->postdata->ToUserName;
		$this->he = $this->postdata->FromUserName;
		$this->histype = $this->postdata->MsgType;
		$this->hesaid = $this->postdata->Content;
		$this->event= $this->postdata->Event;
		switch($this->histype){
		case "text":
			break;
		case "image":
			break;
		case "voice":
			break;
		case "video":
			break;
		case "shortvideo":
			break;
		case "location":
			break;
		case "link":
			break;
		case "event":
			$this->event();
			break;
		}
	}

	function __destruct(){
		$this->keyword();
		$this->mytype = "text";

		$this->toxml();

		switch($this->mytype){
		case "text":
			#$this->isay = "$this->hesaid";
			if(!isset($this->isay)) $this->isay = "fuck you";
			echo sprintf($this->mydata, $this->he, $this->me, time(), $this->mytype, $this->isay);
			break;
		case "image":
			echo sprintf($this->mydata, $this->he, $this->me, time(), $this->mytype, $this->mediaid);
			break;
		case "voice":
			echo sprintf($this->mydata, $this->he, $this->me, time(), $this->mytype, $this->mediaid);
			break;
		case "video":
			echo sprintf($this->mydata, $this->he, $this->me, time(), $this->mytype, $this->mediaid, $this->title, $this->desc);
			break;
		case "music":
			echo sprintf($this->mydata, $this->he, $this->me, time(), $this->mytype, $this->title, $this->desc, $this->url, $this->hqurl, $this->mediaid);
			break;
		case "news":
			echo sprintf($this->mydata, $this->he, $this->me, time(), $this->mytype, $this->count, $this->title, $this->desc, $this->picurl, $this->url);
			break;
		}

		
	}

	function event(){
		switch($this->event){
		case "subscribe":
		;
		case "unsubscribe":
		;
		case "SCAN":
		;
		case "LOCATION":
		;
		case "CLICK":
		;
		case "VIEW":
		;
		}
	}

	function toxml(){
		$a = array(
			"xmlstart" => "<xml>",
			"tousername" => "<ToUserName><![CDATA[%s]]></ToUserName>",
			"fromusername" =>"<FromUserName><![CDATA[%s]]></FromUserName>",
			"createtime" =>"<CreateTime>%s</CreateTime>",
			"type" =>"<MsgType><![CDATA[%s]]></MsgType>",
			# text
			"content" => "<Content><![CDATA[%s]]></Content>",
			# image
			"image" => "<Image><MediaId><![CDATA[%s]]></MediaId></Image>",
			# voice
			"voice" => "<Voice><MediaId><![CDATA[%s]]></MediaId></Voice>",
			# video
			"video" => "<Video>
<MediaId><![CDATA[%s]]></MediaId>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
</Video> ",
			# music
			"music" => "<Music>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<MusicUrl><![CDATA[%s]]></MusicUrl>
<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
<ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
</Music>",
			# news
			"articlecount" => "<ArticleCount>%s</ArticleCount>",
			"newsstart" => "<Articles>",
			"newsitem" => "<item>
<Title><![CDATA[%s]]></Title> 
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>",
			"newsend" => "</Articles>",

			"xmlend" => "</xml>"
		);

		$this->mydata = $a["xmlstart"].$a["tousername"].$a["fromusername"].$a["createtime"].$a["type"];
		switch($this->mytype){
		case "text":
			$this->mydata.=$a["content"];break;
		case "image":
			$this->mydata.=$a["image"];break;
		case "voice":
			$this->mydata.=$a["voice"];break;
		case "video":
			$this->mydata.=$a["video"];break;
		case "music":
			$this->mydata.=$a["music"];break;
		case "news":
			$this->mydata.=$a["articlecount"].$a["newsstart"];
			for($i=0;$i<$tt;$i++) $this->mydata.=$a["newsitem"];
			$this->mydata.=$a["newsend"];
			break;
		}
		$this->mydata.=$a["xmlend"];
			}

	function keyword(){
		$kw = array(
			"我靠" => "我靠",
			"叫什么" => "我叫dodo",
			"几岁" => "我才一个多月呢",
			"妈是谁" => "妈妈是琼琼",
			"谁是妈" => "琼琼",
			"谁是你妈" => "琼琼",
			"爸是谁" => "爸爸是菲菲",
			"谁是爸" => "菲菲",
			"谁是你爸" => "菲菲",
			"婆是谁" => "爸爸是菲菲",
			"谁是婆" => "婆婆是婆婆",
			"谁是你婆" => "婆婆是婆婆",
			"奶是谁" => "奶奶是奶奶",
			"谁是奶" => "奶奶是奶奶",
			"谁是你奶" => "奶奶是奶奶",
			"爷是谁" => "爷爷是老侯",
			"谁是爷" => "爷爷是老侯",
			"谁是你爷" => "老侯",
		);
		foreach($kw as $k){
			if(strpos($this->hesaid, $kw["$k"])){
				$this->isay = $kw["$k"];
				break;
			}
		}
	}

}
