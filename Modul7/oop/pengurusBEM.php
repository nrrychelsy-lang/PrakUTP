<?php
class pengurusBEM {
    public $nama;
    public $nim;
    public $angkatan;
    private $jabatan;
    private $foto;

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setNim($nim) {
        $this->nim = $nim;
    }

    public function getNim() {
        return $this->nim;
    }

    public function setAngkatan($angkatan) {
        $this->angkatan = $angkatan;
    }

    public function getAngkatan() {
        return $this->angkatan;
    }

    // Mengubah visibility ke protected/public agar dapat dimanipulasi
    public function setJabatan($jabatan) {
        $this->jabatan = $jabatan;
    }

    public function getJabatan() {
        return $this->jabatan;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getFoto() {
        return $this->foto;
    }
}
?>