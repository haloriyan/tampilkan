<?php
// die($_COOKIE['kukiLogin'])
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1">
	<title>Tampilkan | Buat Slide Presentasi</title>
	<link href="aset/gbr/icon.png" rel="icon">
	<link href="aset/fw/build/fw.css" rel="stylesheet">
	<link href="aset/fw/build/font-awesome.min.css" rel="stylesheet">
	<link href="aset/css/style.index.css" rel="stylesheet">
	<script src="aset/js/embo.js"></script>
</head>
<body class="merah">

<div class="atas merah">
	<h1 class="judul">TAMPILKAN</h1>
	<nav class="menu"></nav>
</div>

<div class="container">
	<div class="wrap">
		<div class="kiri">
			<h2>Buat Slide Presentasi</h2>
			<h3>dan jadilah profesional di depan klien</h3>
			<button id="action">BUAT SLIDE SAYA!</button>
		</div>
		<div class="kanan">
			<img src="aset/gbr/presentasi2.png">
		</div>
	</div>
</div>

<div class="bg"></div>
<div class="popupWrapper" id="formRegist">
	<div class="popup">
		<div class="wrap">
			<h3 class="rata-tengah">MENDAFTAR</h3>
			<hr size="1" color="#ccc">
			<div class="isi">Nama :</div>
			<input type="text" class="box" id="namaReg">
			<div class="isi">E-Mail :</div>
			<input type="email" class="box" id="mailReg">
			<div class="isi">Kata sandi :</div>
			<input type="password" class="box" id="pwdReg">
			<div class="bag-tombol">
				<button class="merah" id="register">BUAT AKUN</button>
			</div>
			<div class="opt">
				sudah punya akun? <a href="#" id="linkLogin">masuk</a> ke akun
			</div>
		</div>
	</div>
</div>

<div class="popupWrapper" id="formLogin">
	<div class="popup">
		<div class="wrap">
			<h3 class="rata-tengah">LOGIN</h3>
			<hr size="1" color="#ccc">
			<div class="isi">E-Mail :</div>
			<input type="email" class="box" id="mailLog">
			<div class="isi">Kata sandi :</div>
			<input type="password" class="box" id="pwdLog">
			<div class="bag-tombol">
				<button class="merah" id="login">LOGIN</button>
			</div>
			<div class="opt">
				belum punya akun? <a href="#" id="linkRegist">mendaftar</a> sekarang!
			</div>
		</div>
	</div>
</div>

<div class="popupWrapper" id="suksesReg">
	<div class="popup">
		<div class="wrap">
			<h3 class="rata-tengah">NOTICE</h3>
			<hr size="1" color="#ccc">
			<p>
				Berhasil mendaftar. Sekarang ikuti langkah selanjutnya yang telah dikirim melalui email Anda. Jika tidak menemukannya, periksa direktori spam
			</p>
			<div class="bag-tombol">
				<button class="merah" id="xSukses">TUTUP</button>
			</div>
		</div>
	</div>
</div>

<div class="popupWrapper" id="notice">
	<div class="popup">
		<div class="wrap">
			<h3 class="rata-tengah">ALERT!</h3>
			<hr size="1" color="#ccc">
			<p>
				<?php echo $_COOKIE['kukiLogin']; ?>
			</p>
		</div>
	</div>
</div>

<script>
	tekan("Escape", function() {
		hilangPopup("#formLogin")
		hilangPopup("#formRegist")
		hilangPopup("#suksesReg")
	})

	klik("#action", function() {
		munculPopup("#formRegist")
	})

	klik("#linkLogin", function() {
		hilangPopup("#formRegist")
		munculPopup("#formLogin")
	})

	klik("#linkRegist", function() {
		hilangPopup("#formLogin")
		munculPopup("#formRegist")
	})

	klik("#login", function() {
		var email = pilih("#mailLog").value
		var pwd = pilih("#pwdLog").value
		var log = "email="+email+"&pwd="+pwd
		if(email == "" || pwd == "") {
			return false
		}
		pos("aksi/user/login.php", log, function() {
			mengarahkan("./saya")
		})
	})

	klik("#register", function() {
		var nama = pilih("#namaReg").value
		var email = pilih("#mailReg").value
		var pwd = pilih("#pwdReg").value
		var reg = "nama="+nama+"&email="+email+"&pwd="+pwd
		if(nama == "" || email == "" || pwd == "") {
			return false
		}
		pos("aksi/user/register.php", reg, function() {
			hilangPopup("#formRegist")
			munculPopup("#suksesReg")
		})
	})

	klik("#xSukses", function() {
		hilangPopup("#suksesReg")
	})
</script>

<?php
if(isset($_GET['auth'])) {
	echo '<script>'.
		 'munculPopup("#formLogin")'.
		 '</script>';
}else if($_COOKIE['kukiLogin'] != "") {
	echo '<script>'.
		 'hilangPopup("#formLogin")'.
		 'hilangPopup("#suksesReg")'.
		 'hilangPopup("#formRegist")'.
		 'munculPopup("#notice")'.
		 '</script>';
}
?>

</body>
</html>