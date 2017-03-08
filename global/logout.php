<?php
session_start();
session_destroy();

echo "<script>alert('Berhasil LogOut'); document.location.href='../index.php'; </script>";
?>