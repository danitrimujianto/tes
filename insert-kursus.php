<?php 
session_start();
include "global/config.php";

$pg = $_REQUEST["pg"];
$name = $_REQUEST["name"];
$description = $_REQUEST["description"];

$sql = "INSERT INTO course (name, description) VALUES ('$name', '$description')";

if(empty(trim($name))){
	echo "<script>alert('Anda Belum Memasukkan NAMA KURSUS'); document.location.href='index.php?pg=$pg&act=add&name=$name&description=$description';</script>"; 
}else{
	$has = mysql_query($sql);
	if($has){
		header("location: index.php?pg=$pg");
	}else{
		//echo mysql_error();
		echo "<script>alert('Gagal Disimpan!!!'); document.location.href='index.php?pg=$pg&act=add&name=$name&description=$description';</script>"; 
		$_SESSION["error_code"] = mysql_error();
	}
}
?>