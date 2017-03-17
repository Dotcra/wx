<?php
class talk{
		private $me;
		private $him;
		private $histype;
		private $mytype;
		private $hesaid;
		private $match = array();
		private $mydata;
		private $isay;
		private $eventtype;
		private $mediaid;

	function __construct(){
		$rawdata = file_get_contents("php://input");
		new logtofile($rawdata);
		$postdata = simplexml_load_string($rawdata,"SimpleXMLElement", LIBXML_NOCDATA);
		$this->me = $postdata->ToUserName;
		$this->him = $postdata->FromUserName;
		$this->histype = $postdata->MsgType;

		switch($this->histype){
		case "text":
			$this->hesaid = $postdata->Content;
			break;
		case "voice":
			//$this->hesaid = api::sr();
			$this->hesaid = $postdata->Recognition;
			break;
		case "image":
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
			$this->eventtype= $postdata->Event;
			$this->event();
			break;
		}

		$this->match = keyword::match($this->hesaid); // match keyword to decide response content and type
		$this->mytype = $this->match["type"];
		$this->mydata = xml::toxml($this->mytype); // assemble xml according to response type

		if( $this->match["isay"] == null )
			$this->isay = api::talk($this->hesaid); // if no keyword match, AI answers
		else
			$this->isay = $this->match["isay"];

		$this->mytype = 'voice'; // for test
	}

	function __destruct(){
		switch($this->mytype){
		case "text":
			echo ''; // avoid wx server 3 times retry
			echo sprintf($this->mydata, $this->him, $this->me, time(), "text", $this->isay);
			break;
		case "voice":
			echo 'success'; // avoid wx server 3 times retry
			api::ss($this->isay, 'zh-TW'); // speech synthesis and save to isay.mp3
			$this->mediaid = media::addtemp(); // add isay.mp3 to wx server and get mediaid
			echo sprintf($this->mydata, $this->him, $this->me, time(), "voice", $this->mediaid);
			break;
		case "image":
			echo sprintf($this->mydata, $this->him, $this->me, time(), "image", $this->mediaid);
			break;
		case "video":
			echo sprintf($this->mydata, $this->him, $this->me, time(), "video", $this->mediaid, $this->title, $this->desc);
			break;
		case "music":
			echo sprintf($this->mydata, $this->him, $this->me, time(), "music", $this->title, $this->desc, $this->url, $this->hqurl, $this->mediaid);
			break;
		case "news":
			echo sprintf($this->mydata, $this->him, $this->me, time(), "news", $this->count, $this->title, $this->desc, $this->picurl, $this->url);
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
