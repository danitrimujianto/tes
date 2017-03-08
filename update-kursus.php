<?php 
session_start();
include "global/config.php";

$pg = $_REQUEST["pg"];
$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$description = $_REQUEST["description"];

$sql = "UPDATE course SET name = '$name', description = '$description' WHERE id_course = '$id'";	


if(empty(trim($name))){
	echo "<script>alert('Anda Belum Memasukkan NAMA KURSUS'); document.location.href='index.php?pg=$pg&act=edit&id=$id';</script>"; 
}else{
	$has = mysql_query($sql);
	if($has){
		header("location: index.php?pg=$pg");
	}else{
		echo "<script>alert('Gagal Disimpan!!!'); document.location.href='index.php?pg=$pg&act=edit&id=$id';</script>"; 
		$_SESSION["error_code"] = mysql_error();
	}
}
?>