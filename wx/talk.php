<?php
class talk{
		private $rawdata;
		private $postdata;
		private $me;
		private $he;
		private $histype;
		private $mytype;
		private $hesaid;
		private $match = array();
		private $mydata;
		private $isay;
		private $eventtype;
		private $mediaid;

	function __construct(){
		$this->rawdata = file_get_contents("php://input");
		$this->postdata = simplexml_load_string($this->rawdata,"SimpleXMLElement", LIBXML_NOCDATA);
		$this->me = $this->postdata->ToUserName;
		$this->he = $this->postdata->FromUserName;
		$this->histype = $this->postdata->MsgType;

		switch($this->histype){
		case "text":
			$this->hesaid = $this->postdata->Content;
			$this->match = keyword::match($this->hesaid);
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
			$this->eventtype= $this->postdata->Event;
			$this->event();
			break;
		}
	}

	function __destruct(){
		$this->mytype = $this->match["type"];
		$this->mydata = xml::toxml($this->mytype);
		switch($this->mytype){
		case "text":
			#$this->isay = keyword::match($this->hesaid);
			if( $this->match["isay"] == null ) 
				$this->isay = api::talk($this->hesaid);
			else
				$this->isay = $this->match["isay"];
			echo sprintf($this->mydata, $this->he, $this->me, time(), "text", $this->isay);
			break;
		case "image":
			echo sprintf($this->mydata, $this->he, $this->me, time(), "image", $this->mediaid);
			break;
		case "voice":
			echo sprintf($this->mydata, $this->he, $this->me, time(), "voice", $this->mediaid);
			break;
		case "video":
			echo sprintf($this->mydata, $this->he, $this->me, time(), "video", $this->mediaid, $this->title, $this->desc);
			break;
		case "music":
			echo sprintf($this->mydata, $this->he, $this->me, time(), "music", $this->title, $this->desc, $this->url, $this->hqurl, $this->mediaid);
			break;
		case "news":
			echo sprintf($this->mydata, $this->he, $this->me, time(), "news", $this->count, $this->title, $this->desc, $this->picurl, $this->url);
			break;
		}

		
	}

	function event(){
		switch($this->eventtype){
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
}
