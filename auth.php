<?php
if(isset($_SESSION['status_login']) != true) {
    die("Anda tidak bisa mengakses halaman ini. Silahkan <a href='login.php'>Login</a> terlebih dahulu disini."); 
}
?>