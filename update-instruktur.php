<?php 
session_start();
include "global/config.php";

$pg = $_REQUEST["pg"];
$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$gender = $_REQUEST["gender"];

$sql = "UPDATE instructors SET name = '$name', gender = '$gender' WHERE id_instructor = '$id'";	


if(empty(trim($name))){
	echo "<script>alert('Anda Belum Memasukkan NAMA'); document.location.href='index.php?pg=$pg&act=edit&id=$id';</script>"; 
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