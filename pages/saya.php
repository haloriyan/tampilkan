<?php
include 'aksi/ctrl/presentasi.php';
$rand = rand(1, 999999);
$sesi = $user->auth();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Presentasi Saya</title>
	<link href="aset/fw/build/fw.css" rel="stylesheet">
	<link href="aset/fw/build/font-awesome.min.css" rel="stylesheet">
	<link href="aset/css/style.saya.css" rel="stylesheet">
	<script src="aset/js/embo.js"></script>
</head>
<body>

<div class="atas">
	<h1 class="judul">Presentasi Saya</h1>
	<div id="tblOpt"><i class="fa fa-cog"></i></div>
</div>

<div class="container">
	<div class="wrap">
		<div id="loadPresentasi"></div>
		<!--
		<div class="list">
			<div class="wrap">
				<h3>Judul presentasi</h3>
				<div id="tools">
					<button><i class="fa fa-eye"></i></button>
					<button><i class="fa fa-edit"></i></button>
					<button><i class="fa fa-trash"></i></button>
				</div>
			</div>
		</div>
		-->
	</div>
</div>

<div id="new" class="merah"><i class="fa fa-plus"></i></div>

<div class="bg"></div>
<div class="popupWrapper" id="formBuat">
	<div class="popup">
		<div class="wrap">
			<h3 class="rata-tengah">BUAT PRESENTASI BARU</h3>
			<hr size="1" color="#ccc">
			<input type="hidden" id="idNew" value="<?php echo $rand; ?>">
			<div class="isi">Nama Presentasi :</div>
			<input type="text" class="box" id="namaNew">
			<div class="bag-tombol">
				<button class="merah" id="buat">BUAT</button>
				<div id="refresh" class="opt">
					<a href="./saya">muat ulang</a> laman untuk membuat presentasi
				</div>
			</div>
		</div>
	</div>
</div>

<div class="popupWrapper" id="formHapus">
	<div class="popup">
		<div class="wrap">
			<h3 class="rata-tengah">HAPUS PRESENTASI</h3>
			<hr size="1" color="#ccc">
			<div id="isiFormHapus"></div>
			<div class="bag-tombol">
				<button class="merah" id="yaHapus">HAPUS</button>
				<br /><br />
				<button id="xHapus">JANGAN</button>
			</div>
		</div>
	</div>
</div>

<script>
	function load() {
		ambil("aksi/load/presentasiSaya.php", function(res) {
			tulis("#loadPresentasi", res)
		})
	}

	klik("#new", function() {
		munculPopup("#formBuat")
	})

	tekan("Escape", function() {
		hilangPopup("#formBuat")
		hilangPopup("#formHapus")
	})

	klik("#buat", function() {
		var id = pilih("#idNew").value
		var nama = pilih("#namaNew").value
		var crt = "nama="+nama+"&id="+id
		if(nama == "") {
			return false
		}
		pos("aksi/presentasi/buat.php", crt, function() {
			mengarahkan("./edit/"+id)
			hilang("#buat")
			muncul("#refresh")
		})
	})

	klik("#xHapus", function() {
		hilangPopup("#formHapus")
	})

	function hapus(val) {
		var set = "namakuki=idpresentasi&value="+val+"&durasi=2666"
		pos("../aksi/setCookie.php", set, function() {
			munculPopup("#formHapus")
			ambil("aksi/load/form/hapusPresentasi.php", function(res) {
				tulis("#isiFormHapus", res)
			})
		})
	}


	klik("#yaHapus", function() {
		pos("aksi/presentasi/hapus.php", "", function() {
			hilangPopup("#formHapus")
			load()
		})
	})

	load()
	
</script>

</body>
</html>