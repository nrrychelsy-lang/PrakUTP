<?php
require_once "koneksiMVC.php";

class m_pengurusBEM {
    public function cekLogin($nim, $password) {
        global $mysqli;
        $pass_md5 = md5($password);
        $stmt = $mysqli->prepare("SELECT * FROM pengurus_bem WHERE nim = ? AND password = ?");
        $stmt->bind_param("ss", $nim, $pass_md5);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>