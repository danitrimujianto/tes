<?php 
session_start();
include "global/config.php";

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

$sql = "SELECT * FROM usermanager WHERE username = '".$username."' AND pwd = MD5('".$password."')";
$has = mysql_query($sql);
$res = mysql_fetch_array($has);
$num = mysql_num_rows($has);

if($num > 0){
	if($res["status"] == "0"){
		$_SESSION["error_code"] = "Akun Anda Non Aktif.";
		header("location: index.php");
	}else{
		$_SESSION["ses-kursus"] = "aktif";
		
		//update last login admin
		mysql_query("UPDATE usermanager SET last_login = NOW() WHERE id_usermanager = '".$res["id_usermanager"]."'");
		
		header("location: index.php");
	}
}else{
	$_SESSION["error_code"] = "Silahkan Masukkan Username dan Password dengan Benar.";
	header("location: index.php");
}
?>