<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */

class upload{
	private $a;
	private $b;
	private $c;
	function __construct($target="."){
		date_default_timezone_set('Asia/Shanghai');
		$most=5;
		$max=1000000;
		$type = array(
			"image/jpeg",
			"image/png",
			"image/gif",
		);

		if(count($_FILES) > $most) exit("too many files");

		foreach($_FILES as $k => $v){
			// check name validation

			if(!in_array($v["type"], $type)) exit("wtf");

			if($v["size"] > $max) exit("too big!");

			if(is_uploaded_file($v["tmp_name"])){
				// rename, trim space, specials
				$v["name"] = ;
				if(!move_uploaded_file($v["tmp_name"], $target."/".date("ymdHis")."-".$v["name"])) echo "move failed";
			}
			else echo "upload failed\n";
			
		}


	}

	function __destruct(){
	}

	function f(){
	}
}

new upload();
