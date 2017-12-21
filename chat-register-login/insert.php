<?php
session_start();
$email = $_SESSION['email'];
$rcv = $_REQUEST['rcv'];
$msg = $_REQUEST['msg'];

$con = mysql_connect('localhost','root','');
mysql_select_db('nitc', $con);

mysql_query("INSERT INTO logs (`username`, `rcv` ,`msg`) VALUES ('$email',  '$rcv', '$msg')");

$result1 = mysql_query("SELECT * FROM logs ORDER BY id DESC");

while($extract = mysql_fetch_array($result1)) {
	echo "<span>" . $extract['username'] . "</span>: <span>" . $extract['msg'] . "</span><br />";
}