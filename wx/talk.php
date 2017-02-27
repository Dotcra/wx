<?php
class talk{
		private $rawdata;
		private $postdata;
		private $me;
		private $he;
		private $type;
		private $hesaid;
		private $isay;
	function __construct(){
		$this->rawdata = file_get_contents("php://input");
		$this->postdata = simplexml_load_string($this->rawdata,"SimpleXMLElement", LIBXML_NOCDATA);
		$this->me = $this->postdata->ToUserName;
		$this->he = $this->postdata->FromUserName;
		$this->type = $this->postdata->MsgType;
		$this->hesaid = $this->postdata->Content;
	}
	function __destruct(){
		$this->isay = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[text]]></MsgType>
			<Content><![CDATA[%s]]></Content>
			</xml>";
		if($this->postdata->MsgType == 'text') echo sprintf($this->isay, $this->he, $this->me, time(), $this->hesaid);
	}

}

