<?php 
define('HOST', 'localhost');
define('USER', 'admin');
define('PASSWORD', '');
define('DATABASE', 'second_sem');

$conn=mysqli_connect(HOST,USER,PASSWORD,DATABASE) or die("can't connect this database");