<?php
include 'koneksi.php';

class user extends connection {
	public function login($e, $p) {
		$em = $this->get($e, "email");
		$pw = $this->get($e, "password");
		$status = $this->get($e, "status");
		if($e != $em and $p != $pw) {
			setcookie('kukiLogin', 'E-Mail / Password salah!', time() + 40, "/");
		}else if($status == "0") {
			setcookie('kukiLogin', 'Akun Anda belum aktif. Silakan mengikuti langkah aktivasi yang telah dikirim melalui email', time() + 44, "/");
		}else {
			session_start();
			$_SESSION['utampilkan']=$e;
		}
	}
	public function register($a, $b, $c, $d, $e, $f, $g, $h) {
		$q = mysqli_query($this->konek, "INSERT INTO user VALUES('$a','$b','$c','$d','$e','$f','$g','$h')");
		// $q = $this->insert("user", "'$a','$b','$c','$d','$e','$f','$g','$h'");
		return $q;
	}
	public function hapus($e) {
		$q = mysqli_query($this->konek, "DELETE FROM user WHERE email = '$e'");
		if(!$q) {
			$this->delete("user", $e);
		}
		return $q;
	}
	public function get($u, $struktur) {
		$q = mysqli_query($this->konek, "SELECT $struktur FROM user WHERE email = '$u'");
		$r = mysqli_fetch_array($q);
		return $r[$struktur];
	}
	public function ubah($e, $struktur, $val) {
		$q = mysqli_query($this->konek, "UPDATE user SET $struktur = '$val' WHERE email = '$e'");
		return $q;
	}
	public function auth($mundur = NULL) {
		if($mundur == "") {
			$keMundur = "location: ./?auth";
		}else {
			$keMundur = "location: ../?auth";
		}
		session_start();
		$this->sesi = $_SESSION['utampilkan'];
		if(empty($this->sesi)) {
			echo "gak ada sesi";
			// $keMundur;
			header("$keMundur");
		}
		$cek = $this->get($this->sesi, "nama");
		if($cek == "") {
			echo "gak jelas";
			header("$keMundur");
		}
		return $this->sesi;
	}
}

$user = new user();