<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version 1.0
 */
class curl{
	/**
	 * @param array $opts contain curl options and values, do NOT prefix "CURLOPT_". case insensitive.
	 *
	 * $opts = array(
	 * "url" => "https://api.url",
	 * "returntransfer" => 0,
	 * "header" => 0,
	 * "post" => 1,
	 * "postfields" => "key=816ddc83c3406960573&info=hi",
	 * );
	 *
	 * @return request result on success or FALSE on failure. However, if $opts["RETURNRANSFER"] set to 0, return TRUE on success or FALSE on failure.
	 */
	function go(array $opts){
		$opts = array_change_key_case($opts, CASE_UPPER);
		$ch = curl_init();
		# return the transfer as a string by default
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		foreach($opts as $k => $v){
			#echo $k." => ".$v;
			curl_setopt($ch, constant("CURLOPT_$k"), $v);
		}
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
}


$appid = "wx16f10e7e59616e93";
$appsecret = "9444c915c3e4ef5a1e82c1693f4e851d";
$appid0 = "wx4a2ba5fc7b52285d";
$appsecret0 = "d2688c48964f3d398a1e63ba9e4a8868";

$a = array(
	"url" => "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret",
);
$data = curl::go($a);
$data = json_decode($data, true);
$ass = $data["access_token"];

# $ass = "paCQhAxLYJyTLhbeazXy7NUfq9d87331vXNR9ZURdD_0K80zstkK-hndNsZt0zC5jQKLqV1OMEEi2acZ4BcUnrtVfgQT0BosMTPOYfmG3TJvFKwO8hxcWWA9j20fHGWKQCNdACAZLW";

$b = array(
	"url" => "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=$ass"
);

echo curl::go($b);
