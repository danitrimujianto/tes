<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "db_kursus";

mysql_connect($host,$user,$pass);
mysql_select_db($db_name);

date_default_timezone_set("Asia/Jakarta");
?>