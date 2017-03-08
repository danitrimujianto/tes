<?php 
session_start();
include "global/config.php";

$pg = $_REQUEST["pg"];
$nama = $_REQUEST["nama"];
$username = $_REQUEST["username"];
$pwd = $_REQUEST["pwd"];
$status = $_REQUEST["status"];

$sql = "INSERT INTO usermanager (nama, username, pwd, status) VALUES ('$nama', '$username', MD5('$pwd'), '$status')";

if(empty(trim($nama))){
	echo "<script>alert('Anda Belum Memasukkan NAMA'); document.location.href='index.php?pg=$pg&act=add&nama=$nama&username=$username&status=$status';</script>"; 
}elseif(empty(trim($username))){
	echo "<script>alert('Anda Belum Memasukkan USERNAME'); document.location.href='index.php?pg=$pg&act=add&nama=$nama&username=$username&status=$status';</script>"; 
}else{
	$has = mysql_query($sql);
	if($has){
		header("location: index.php?pg=$pg");
	}else{
		//echo mysql_error();
		echo "<script>alert('Gagal Disimpan!!!'); document.location.href='index.php?pg=$pg&act=add&nama=$nama&username=$username&status=$status';</script>"; 
		$_SESSION["error_code"] = mysql_error();
	}
}
?>