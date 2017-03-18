<?php
class match{
	static function kw($hesaid){
		$kw = array(
			"我靠" => array(
				"我靠",
				"靠靠靠",
			),
			"叫什么" => array(
				"我叫介一",
				"叫我dodo吧",
			),
			"哪里人" => array(
				"我是地球人",
				"不告诉你",
			),
			#"几岁" => "我才一个多月呢",
			#"多大" => "我才一个多月呢",
			#"妈是谁" => "妈妈是琼琼",
			#"谁是妈" => "琼琼",
			#"谁是你妈" => "琼琼",
			#"爸是谁" => "爸爸是菲菲",
			#"谁是爸" => "菲菲",
			#"谁是你爸" => "菲菲",
			"婆是谁" => "爸爸是菲菲",
			"谁是婆" => "婆婆是婆婆",
			"谁是你婆" => "婆婆是婆婆",
			"奶是谁" => "奶奶是奶奶",
			"谁是奶" => "奶奶是奶奶",
			"谁是你奶" => "奶奶是奶奶",
			"爷是谁" => "爷爷是老侯",
			"谁是爷" => "爷爷是老侯",
			"谁是你爷" => "老侯",
			"照片" => "",
			"相片" => "",
			"视频" => "",
			"声音" => "",
			"歌" => "",
			"动态" => ""
		);

		foreach($kw as $k => $v){
			if(strpos("x".$hesaid, $k)){
				switch($k){
				case "照片":
					# send some pics
					# set mytype to image and set image type params 
					return  array("type" => "image", "mediaid" => "");
				case "相片":
					# send some pics
					# set mytype to image and set image type params 
					return array("type" => "image", "mediaid" => "");
				case "视频":
					# send some videos
					# set mytype to video and set video type params 
					return array("type" => "video", "mediaid" => "", "title" => "", "desc" => "");
				case "声音":
					# send some voices
					# set mytype to voice and set voice type params 
					return array("type" => "voice", "mediaid" => "");
				case "歌":
					# send some musics
					# set mytype to music and set music type params 
					return array("type" => "music", "mediaid" => "", "title" => "", "desc" => "", "url" => "","hqurl" => "");
				case "动态":
					# send some news
					# set mytype to news and set news type params 
					return array("type" => "music", "count" => "", "title" => "", "desc" => "", "url" => "","picurl" => "");
				default:
					# otherwise send text
					# set mytype to text and set text type params 
					//$a = array("type" => "text", "isay" => "");
					if(is_array($v)){ // same question, random answer
						shuffle($v);
						$a["isay"] = $v[0];
					}
					else $a["isay"] = $v;
				}
				break; // if strpos matches, foreach no need to run anymore
			}

		}
		$t = array('vocie', 'text');
		shuffle($t);
		$a['type'] = $t[0];
		return $a;
	}

	static function event($type){
		switch($type){
		case 'subscribe':
			return array("type" => "text", "isay" => "你来了啊，嘿嘿！");
		case 'unsubscribe':
			;
		case 'SCAN':
			;
		case 'LOCATION':
			;
		case 'CLICK':
			;
		case 'VIEW':
			;
		}
	}
}

//var_dump(match::kw('你是傻逼'));
