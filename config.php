<?php

$db_host = "localhost";
$db_user = "monoli01_chixhu";
$db_pass = "tomiiszod";
$db_name = "monoli01_chixhu";

$conn = mysql_connect($db_host,$db_user,$db_pass);
mysql_select_db($db_name);
//mysql_query("SET NAMES 'UTF-8'");
//mysql_query("SET CLIENT_ENCODING TO 'UTF-8'");
mysql_query("set names 'utf8'");
mysql_query("set character set 'utf8'");
?>