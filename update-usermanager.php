<?php 
session_start();
include "global/config.php";

$pg = $_REQUEST["pg"];
$id = $_REQUEST["id"];
$nama = $_REQUEST["nama"];
$username = $_REQUEST["username"];
$pwd = $_REQUEST["pwd"];
$status = $_REQUEST["status"];

if(!empty($pwd)){
$sql = "UPDATE usermanager SET nama = '$nama', username = '$username', pwd = MD5('$pwd'), status = '$status' WHERE id_usermanager = '$id'";
}else{
$sql = "UPDATE usermanager SET nama = '$nama', username = '$username', status = '$status' WHERE id_usermanager = '$id'";	
}

if(empty(trim($nama))){
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