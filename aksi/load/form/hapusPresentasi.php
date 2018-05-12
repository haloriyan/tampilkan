<?php
include '../../ctrl/presentasi.php';

$id = $_COOKIE['idpresentasi'];

echo "<p>".
	 	"Yakin ingin menghapus presentasi <b>".$present->info($id, "nama")."</b>".
	 "</p>";