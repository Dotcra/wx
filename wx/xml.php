<?php
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

$mydata = $a["xmlstart"].$a["tousername"].$a["fromusername"].$a["createtime"].$a["type"];
switch($mytype){
case "text":
	$mydata.=$a["content"];break;
case "image":
	$mydata.=$a["image"];break;
case "voice":
	$mydata.=$a["voice"];break;
case "video":
	$mydata.=$a["video"];break;
case "music":
	$mydata.=$a["music"];break;
case "news":
	$mydata.=$a["articlecount"].$a["newsstart"];
	for($i=0;$i<$tt;$i++) $mydata.=$a["newsitem"];
	$mydata.=$a["newsend"];
	break;
}
$mydata.=$a["xmlend"];
