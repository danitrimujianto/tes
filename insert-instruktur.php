<?php 
session_start();
include "global/config.php";

$pg = $_REQUEST["pg"];
$name = $_REQUEST["name"];
$gender = $_REQUEST["gender"];

$sql = "INSERT INTO instructors (name, gender) VALUES ('$name', '$gender')";

if(empty(trim($name))){
	echo "<script>alert('Anda Belum Memasukkan NAMA'); document.location.href='index.php?pg=$pg&act=add&name=$name&gender=$gender';</script>"; 
}else{
	$has = mysql_query($sql);
	if($has){
		header("location: index.php?pg=$pg");
	}else{
		//echo mysql_error();
		echo "<script>alert('Gagal Disimpan!!!'); document.location.href='index.php?pg=$pg&act=add&name=$name&gender=$gender';</script>"; 
		$_SESSION["error_code"] = mysql_error();
	}
}
?>