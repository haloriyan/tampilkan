<?php

class connection {
	public function __construct() {
		$this->koneksi();
	}
	public function koneksi() {
		$this->konek = new mysqli("localhost", "root", "", "tampilkan");
		return $this->konek;
	}
	public function select($tabel, $opt = NULL) {
		if($opt == "") {
			$query = "SELECT * FROM $tabel";
		}else {
			$key = $opt['key'];
			$val = $opt['val'];
			$query = "SELECT $struktur FROM $tabel WHERE $key = '$val'";
		}
		$select = mysqli_query($this->konek, $query);
		return $select;
	}
	public function insert($tabel, $val) {
		$insert = mysqli_query($this->konek, "INSERT INTO $tabel VALUES($val)");
		return $insert;
	}
	public function update($tabel, $id, $struktur, $val) {
		$idtabel = "id".$tabel;
		$update = mysqli_query($this->konek, "UPDATE $tabel SET $struktur = '$val' WHERE $idtabel = '$id'");
		return $update;
	}
	public function delete($tabel, $id) {
		$idtabel = "id".$tabel;
		$delete = mysqli_query($this->konek, "DELETE FROM $tabel WHERE $idtabel = '$id'");
		return $delete;
	}
	public function fetch($query) {
		return mysqli_fetch_array($query);
	}
	public function numRows($query) {
		return mysqli_num_rows($query);
	}
}

$conn = new connection();