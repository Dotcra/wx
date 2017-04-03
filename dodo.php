<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */
class dodo{
	private $db;
	private $arr = array('type' => 'text', 'isay' => '');
	function __construct(){
		$arr = key::ass('alidb');
		$this->db = new mysqli($arr['host'], $arr['user'], $arr['passwd'], $arr['db']);
		//if ($this->db->connect_error) exit($mysql->connect_error);
		$this->db->set_charset('utf8');
		date_default_timezone_set('Asia/Shanghai');
	}
	function __destruct(){
		$this->db->close();
	}
	function act($act, $comment='', $min=0){
		$time = time()-$min*60;
		$date = date('m', $time).'月'.date('d', $time).'日'.date('H', $time).'点'.date('i', $time).'分';
		//if($min == 0) $timestamp = 'CURRENT_TIMESTAMP'; else $timestamp = date('Y-m-d H:i:s', $time);
		$timestamp = date('Y-m-d H:i:s', $time);
		//echo $timestamp."\n";
		$sql = "INSERT INTO `dodo` (`id`, `act`, `comment`, `time`) VALUES (NULL, '$act', '$comment', '$timestamp');";
		if($this->db->query($sql)) echo 1;
		$this->arr['isay'] = $date."\n".$act.' '.$comment;
		return $this->arr;
	}

	function mem($limit){
		if (empty($limit)) $limit = 5;
		$sql = "select * from dodo order by `time`desc limit $limit";
		$res = $this->db->query($sql);
		$rows = $res->num_rows;
		if($limit > $rows ) $limit = $rows;
		for ($i=0;$i<$limit;$i++){
			$row = $res->fetch_assoc();
			$time = strtotime($row['time']);
			$date = date('d', $time).'日'.date('H', $time).':'.date('i', $time);
			$this->arr['isay'] .= $date.' '.$row['act'].' '.$row['comment'];
			if($i < $limit-1) $this->arr['isay'] .= "\n";
		}
		$res->free();
		return $this->arr;
	}

	function cost(){
	}

	function bill(){
	}
}
