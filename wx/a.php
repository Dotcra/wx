<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */

//$a = new mysqli('qdm189698650.my3w.com', 'qdm189698650', '19860625', 'qdm189698650_db');
$a = new mysqli('localhost', 'root', 'dot', 'grind');
if ($a->connect_error) exit($a->connect_error);
//else echo 'ok';

$limit = 5;
$sql = "select * from dodo order by `time` limit $limit";

$res = $a->query($sql);
$b = $res->fetch_all(MYSQLI_ASSOC);
//$isay = '';
foreach ( $b as $k => $v) {
	$isay .= $v['time'].' '.$v['act'].' '.$v['comment']."\n";
}

$res->free();
$a->close();

echo $isay;
