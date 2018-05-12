<?php
include '../ctrl/presentasi.php';

$id = $_POST['id'];
$userr = $user->auth();
if($userr == "") {
	die();
}
$nama = $_POST['nama'];
$totSlide = 1;
$slideTampil = 1;
$created = time();

$present->buat($id, $userr, $nama, $totSlide, $slideTampil, $created);

?>