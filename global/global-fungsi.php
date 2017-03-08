<?php
function gender($obj){
	if($obj=="L"){ $obj = "Laki - Laki"; }
	if($obj=="P"){ $obj = "Perempuan"; }
	return $obj;
}
function status($obj){
	if($obj=="1"){ $obj = "Aktif"; }
	if($obj=="0"){ $obj = "Non Aktif"; }
	return $obj;
}
?>