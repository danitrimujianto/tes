<?php 
session_start();
include "global/config.php";

$pg = $_REQUEST["pg"];
$name = $_REQUEST["name"];
$email = $_REQUEST["email"];
$password = $_REQUEST["password"];
$gender = $_REQUEST["gender"];
$active = $_REQUEST["active"];

$sql = "INSERT INTO students (name, email, password, gender, active) VALUES ('$name', '$email', MD5('$password'), '$gender', '$active')";

if(empty(trim($name))){
	echo "<script>alert('Anda Belum Memasukkan NAMA'); document.location.href='index.php?pg=$pg&act=add&name=$name&email=$email&gender=$gender&active=$active';</script>"; 
}elseif(empty(trim($email))){
	echo "<script>alert('Anda Belum Memasukkan EMAIL'); document.location.href='index.php?pg=$pg&act=add&name=$name&email=$email&gender=$gender&active=$active';</script>"; 
}else{
	$has = mysql_query($sql);
	if($has){
		header("location: index.php?pg=$pg");
	}else{
		//echo mysql_error();
		echo "<script>alert('Gagal Disimpan!!!'); document.location.href='index.php?pg=$pg&act=add&name=$name&email=$email&gender=$gender&active=$active';</script>"; 
		$_SESSION["error_code"] = mysql_error();
	}
}
?>