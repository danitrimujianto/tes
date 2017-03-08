<?php 
session_start();
include "global/config.php";

$pg = $_REQUEST["pg"];
$id = $_REQUEST["id"];
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$gender = $_REQUEST["gender"];
$active = $_REQUEST["active"];

if(!empty($password)){
$sql = "UPDATE students SET name = '$name', email = '$email', password = MD5('$password'), gender = '$gender', active = '$active' WHERE id_students = '$id'";
}else{
$sql = "UPDATE students SET name = '$name', email = '$email', gender = '$gender', active = '$active' WHERE id_students = '$id'";	
}

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