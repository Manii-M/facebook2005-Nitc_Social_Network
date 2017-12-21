<?php

$con = mysql_connect('localhost','root','');
mysql_select_db('nitc', $con);

$result1 = mysql_query("SELECT * FROM logs ORDER BY id DESC");

while($extract = mysql_fetch_array($result1)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span>: <span>" . $extract['rcv'] . "</span><br />";
}