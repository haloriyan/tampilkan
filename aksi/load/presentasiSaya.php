<?php
include '../ctrl/presentasi.php';

$sesi = $user->auth();

foreach ($present->load($sesi) as $row) {
	$idpresentasi = $row['idpresentasi'];
	echo '<div class="list">
			<div class="wrap">
				<h3>'.$row['nama'].'</h3>
				<div id="tools">
					<button onclick="buka(this.value);" value="'.$idpresentasi.'"><i class="fa fa-eye"></i></button>
					<button onclick="edit(this.value);" value="'.$idpresentasi.'""><i class="fa fa-edit"></i></button>
					<button onclick="hapus(this.value);" value="'.$idpresentasi.'"><i class="fa fa-trash"></i></button>
				</div>
			</div>
		 </div>';
}

?>

<script>
	function hapus(val) {
		alert(val)
	}
</script>