<?php
include '../ctrl/user.php';

$id = rand(1,99999999);
$nama = $_POST['nama'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$slot = 10;
$tipe = 0;
$status = 0;
$time = time();

$user->register($id, $nama, $email, $pwd, $slot, $tipe, $status, $time);

?>