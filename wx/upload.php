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
	function __construct(array $file, $target){
		date_default_timezone_set('Asia/Shanghai');
		$most=5;
		$max=10000;
		$type = array(
			"image/jpeg",
			"image/png",
			"image/gif",
		);

		foreach($_FILES as $k => $v){
			echo $k;
			echo PHP_EOL;
			print_r($_FILES[$k]);
			echo PHP_EOL;
			//print_r($_FILES);
			echo $v["type"];
			echo PHP_EOL;
			echo date("ymdHis");
			echo PHP_EOL;


			if(in_array($v["size"]) > 2000) exit("too big!");

			echo is_uploaded_file($v["name"]);
			if(is_uploaded_file($v["tmp_name"])){
				if(!move_uploaded_file($v["tmp_name"], $target.date("ymdHis").$v["name"])) echo "move failed";
			}
			else echo "upload failed\n";
		}


	}

	function __destruct(){
	}

	function f(){
	}
}

new upload($_FILES, "123");
