<?php
/**
 * @author Dotcra <dotcra@gmail.com>
 * @version
 * @todo
 */

$a = new mysqli('qdm189698650.my3w.com', 'qdm189698650', '19860625', 'qdm189698650_db');
if ($a->connect_error) echo $a->connect_error;
else echo 'ok';
$a->close();
