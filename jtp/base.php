<?php

$dbhost = 'seniorsalemhccom.ipagemysql.com';
$dbname = 'seniorsaledata';
$dbuser = 'bei';
$dbpass = 'beiyihanyu';

mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
?>
