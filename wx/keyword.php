<?php
class keyword{
	static function match($hesaid){
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
					$a = array("type" => "image", "mediaid" => "");
					break;
				case "相片":
					# send some pics
					# set mytype to image and set image type params 
					$a = array("type" => "image", "mediaid" => "");
					break;
				case "视频":
					# send some videos
					# set mytype to video and set video type params 
					$a = array("type" => "video", "mediaid" => "", "title" => "", "desc" => "");
					break;
				case "声音":
					# send some voices
					# set mytype to voice and set voice type params 
					$a = array("type" => "voice", "mediaid" => "");
					break;
				case "歌":
					# send some musics
					# set mytype to music and set music type params 
					$a = array("type" => "music", "mediaid" => "", "title" => "", "desc" => "", "url" => "","hqurl" => "");
					break;
				case "动态":
					# send some news
					# set mytype to news and set news type params 
					$a = array("type" => "music", "count" => "", "title" => "", "desc" => "", "url" => "","picurl" => "");
					break;
				default:
					# otherwise send text
					# set mytype to text and set text type params 
					$a = array("type" => "text", "isay" => "");
					if(is_array($v)){
						shuffle($v);
						$a["isay"] = $v[0];
					}
					else $a["isay"] = $v;
				}
				return $a;
				break;
			}

		}
		return $a = array("type" => "text", "isay" => "");
	}
}

#$a = keyword::match($_GET["s"]);
#print_r($a);
#echo $a["type"];
