<?php
class msg{
	function text(){
		$content = $HTTP_RAW_POST_DATA;
		$this->logit($content);
		$content = $GLOBALS['HTTP_RAW_POST_DATA'];
		$this->logit($content);
		$txt = simplexml_load_string($content);
		$me = $txt->toUser;
		$he = $txt->fromUser;
		if($txt->MsgType == 'text') $this->resp();

		}
	function resp(){
		$respmsg = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>12345678</CreateTime>
			<MsgType>text</MsgType>
			<Content>你好</Content>
			</xml>";
		echo sprintf($respmsg, $he, $me);
		}
	function logit($arg){
		$fp = fopen("a+",'log.html');
		fwrite($fp, $arg);
		fwrite($fp, "\n");
		fclose($fp);
	}
}

