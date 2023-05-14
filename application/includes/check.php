<?php
require 'config.i.php';
include 'utilities.i.php';

$username = get('username');
$password = md5(get('password'));
if($username != null && $password != null)
{
	$string = "SELECT user_name, password FROM member WHERE user_name = 'admin'";
	$sql_query = mysql_query($string);
	$member = mysql_fetch_array($sql_query);
	var_dump($member);
}
