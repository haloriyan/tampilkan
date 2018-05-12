<?php
include 'user.php';

class present extends user {
	public function buat($a, $b, $c, $d, $e, $f) {
		$q = $this->insert("presentasi", "'$a','$b','$c','$d','$e','$f'");
		return $q;
	}
	public function edit($id, $struktur, $val) {
		$q = $this->update("user", $id, $struktur, $val);
		return $q;
	}
	public function hapus($id) {
		$q = $this->delete("presentasi", $id);
		return $q;
	}
	public function load($e) {
		$q = $this->select("presentasi");
		if($this->numRows($q) == 0) {
			echo "Tidak ada presentasi";
		}else {
			while($r = $this->fetch($q)) {
				$hasil[] = $r;
			}
			return $hasil;
		}
	}
	public function info($id, $struktur) {
		$q = $this->select("presentasi");
		$r = $this->fetch($q);
		return $r[$struktur];
	}
}

$present = new present();