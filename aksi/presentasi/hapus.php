<?php
include '../ctrl/presentasi.php';

$id = $_COOKIE['idpresentasi'];
$present->hapus($id);

?>