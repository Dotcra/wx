<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */
class dodoact{
	private $db;
	private $arr = array('type' => 'text', 'isay' => '');
	function __construct(){
		$this->db = new mysqli('qdm189698650.my3w.com', 'qdm189698650', '19860625', 'qdm189698650_db');
		//if ($this->db->connect_error) exit($mysql->connect_error);
	}
	function __destruct(){
		$this->db->close();
	}
	function add($act, $comment=''){
		$time = date('m').'月'.date('d').'日'.date('H').'点'.date('i').'分';
		$sql = "INSERT INTO `dodo` (`id`, `act`, `comment`, `time`) VALUES (NULL, '$act', '$comment', CURRENT_TIMESTAMP);";
		$this->db->query($sql);
		$this->arr['isay'] = $time."\n".$act.' '.$comment;
		return $this->arr;
	}

	function check($limit = 5){
		$sql = "select * from dodo order by `time`desc limit $limit";
		$res = $this->db->query($sql);
		for ($i=0;$i<$limit;$i++){
			$row = $res->fetch_assoc();
			$this->arr['isay'] .= $row['time'].' '.$row['act'].' '.$row['comment']."\n";
		}
		$res->free();
		return $this->arr;
	}
}
