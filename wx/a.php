<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */
// microsoft cognitive speech recognize

require_once 'autoload.php';
function sr(){
	$token = key::ass('ms');

	$url = "https://speech.platform.bing.com/recognize";
	$appid = "D4D52672-91D7-4C74-8AD8-42B1D98141A5";
	$instanceid = $requestid = "b2c95ede-97eb-4c88-81e4-80f32d6aee54";
	$urll = "$url?scenarios=smd&appid=$appid&locale=zh-TW&device.os=Windows7&version=3.0&format=json&requestid=$requestid&instanceid=$instanceid";
		//'infile' => '@isay.mp3',
		//'infilesize' => 180514,
	$httpheader = array(
		'Content-Type: audio/wav; samplerate=16000',
		//'Content-Type: audio/mp3; codec="audio/pcm"; samplerate=16000',
		'Authorization: ' . 'Bearer ' . $token,
		//'content-length: 180514',
	);
	//$postfields = array(new CURLFile('isay.wav'));
	$postfields = file_get_contents('isay.wav');

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $urll);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);

	$data = curl_exec($ch);

	curl_close($ch);

	return $data;
}

echo sr();
