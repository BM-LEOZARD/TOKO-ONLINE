<?php 

session_start();

session_destroy();

echo "<script>alert('Anda Telah Keluar');</script>";
echo "<script>location='login.php';</script>";

?>
