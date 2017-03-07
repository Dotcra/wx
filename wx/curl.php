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
			if($k == "POSTFIELDS" && is_array($v)){
				foreach($v as $kk => $vv){
					$cfile = new CURLFile($vv);
				}
			}
			curl_setopt($ch, constant("CURLOPT_$k"), $v);
		}
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
}
