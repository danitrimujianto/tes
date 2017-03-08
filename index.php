<?php
session_start();
include "global/config.php";
require "global/global-fungsi.php";

$key = $_REQUEST["key"];
$pg = $_REQUEST["pg"];
$act = $_REQUEST["act"];
$id = $_REQUEST["id"];
$where = "1=1";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Informasi Manajemen Kursus</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link href="fonts/css/font-awesome.min.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("#refresh").click(function(){
		document.location.reload();	
	});
	$("#btnCancel").click(function(){
		document.location.href='index.php?pg=<?php echo $pg; ?>';	
	});
});
</script>
</head>

<body>
<div class="wrapper">
    <div class="main-header">
        <?php include "header.php"; ?>
    </div>
    <?php if(isset($_SESSION["ses-kursus"])){ ?>
    <div class="container">
    	<?php 
		
			if($pg == "usermanager"){
				include "usermanager.php";
			}elseif($pg == "kursus"){
				include "kursus.php";
			}elseif($pg == "instruktur"){
				include "instruktur.php";
			}elseif($pg == "murid"){
				include "murid.php";
			}elseif($pg == "daftar_kursus"){
				include "daftar_kursus.php";
			}else{
				include "home.php";	
			}
		?>
    </div>
    <?php 
		}else{ 
			include "login.php";
		} 
	?>
</div>
<!-- js -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>