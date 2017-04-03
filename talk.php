<?php
class talk{
		private $me;
		private $him;
		private $histype;
		private $mytype;
		private $hesaid;
		private $isay;
		private $mydata;
		//private $event;
		//private $mediaid;

	function __construct(){
		$rawdata = file_get_contents("php://input"); // get raw post data
		new logtofile($rawdata); // log xml msg from wx server to log.html, only for testing
		$postdata = simplexml_load_string($rawdata,"SimpleXMLElement", LIBXML_NOCDATA);
		$this->me = $postdata->ToUserName;
		$this->him = $postdata->FromUserName;
		$this->histype = $postdata->MsgType;

		switch($this->me){
		case 'gh_ba323b1bbbd4': // for beta
			break;
		case 'gh_d0d389ba3f5c': // for dodo
			break;
		}

		switch($this->histype){
		case 'text':
			$this->hesaid = $postdata->Content;
			$match = match::kw($this->hesaid, $this->him); // match keyword to decide response type and content
			break;
		case 'voice':
			//$this->hesaid = api::sr();
			$this->hesaid = $postdata->Recognition;
			$match = match::kw($this->hesaid, $this->him); // match keyword to decide response type and content
			break;
		case 'image':
			break;
		case 'video':
			break;
		case 'shortvideo':
			break;
		case 'location':
			break;
		case 'link':
			break;
		case 'event':
			$event = $postdata->Event;
			$match = match::event($event);
			break;
		}

		$this->mytype = $match["type"];
		//$this->mytype = 'text'; // for testing
		if ($this->me == 'gh_d0d389ba3f5c') $this->mytype = 'text'; // fucking 300
		$this->mydata = xml::toxml($this->mytype); // assemble xml according to response type

		if( ! isset($match['isay']) )
			$this->isay = api::talk($this->hesaid); // if no keyword match, AI answers
		else
			$this->isay = $match["isay"];
	}

	function __destruct(){
		switch($this->mytype){
		case "text":
			echo ''; // avoid wx server 3 times retry
			echo sprintf($this->mydata, $this->him, $this->me, time(), "text", $this->isay);
			break;
		case "voice":
			//echo 'success'; // avoid wx server 3 times retry
			api::ss($this->isay, 'zh-TW'); // speech synthesis and save to isay.mp3
			$mediaid = media::addtemp(); // add isay.mp3 to wx server and get mediaid
			echo sprintf($this->mydata, $this->him, $this->me, time(), "voice", $mediaid);
			break;
		case "image":
			echo sprintf($this->mydata, $this->him, $this->me, time(), "image", $mediaid);
			break;
		case "video":
			echo sprintf($this->mydata, $this->him, $this->me, time(), "video", $mediaid, $this->title, $this->desc);
			break;
		case "music":
			echo sprintf($this->mydata, $this->him, $this->me, time(), "music", $this->title, $this->desc, $this->url, $this->hqurl, $mediaid);
			break;
		case "news":
			echo sprintf($this->mydata, $this->him, $this->me, time(), "news", $this->count, $this->title, $this->desc, $this->picurl, $this->url);
			break;
		}

		
	}
}
