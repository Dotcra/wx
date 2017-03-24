<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */

$a['type'] = 'text';
$a['isay'] = '';
//$mysql = new mysqli('localhost', 'root', 'dot', 'grind');
$mysql = new mysqli('qdm189698650.my3w.com', 'qdm189698650', '19860625', 'qdm189698650_db');
if ($mysql->connect_error) exit($mysql->connect_error);

$limit = 5;
$sql = "select * from dodo order by `time` limit $limit";
$res = $mysql->query($sql);
for ($i=0;$i<$limit;$i++){
	$b = $res->fetch_assoc();
	$a['isay'] .= $b['time'].' '.$b['act'].' '.$b['comment']."\n";
}

$res->free();
$mysql->close();
var_dump($a);
