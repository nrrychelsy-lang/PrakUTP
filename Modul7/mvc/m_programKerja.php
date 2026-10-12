<?php
// require_once "koneksiMVC.php";

// class m_programKerja {
//     private $nomorProgram;
//     private $namaProgram;
//     private $suratKeterangan;

//     public function setProgramKerja($nomorProgram, $namaProgram, $suratKeterangan) {
//         global $mysqli;
//         $stmt = $mysqli->prepare("INSERT INTO proker VALUES (?, ?, ?)");
//         $stmt->bind_param("iss", $nomorProgram, $namaProgram, $suratKeterangan);
//         return $stmt->execute();
//     }

//     public function getSemuaProgramKerja() {
//         global $mysqli;
//         $rs = $mysqli->query("SELECT * FROM proker");
//         $rows = array();
//         while ($row = $rs->fetch_assoc()) {
//             $rows[] = $row;
//         }
//         return $rows;
//     }
// }
require_once "koneksiMVC.php";

class m_programKerja {
    public function getSemuaProgramKerja() {
        global $mysqli;
        $rs = $mysqli->query("SELECT * FROM proker");
        $rows = [];
        while ($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getProgramKerjaByNo($nomorProgram) {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM proker WHERE nomorProgram = ?");
        $stmt->bind_param("i", $nomorProgram);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function tambahProgramKerja($nomor, $nama, $surat) {
        global $mysqli;
        $stmt = $mysqli->prepare("INSERT INTO proker VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $nomor, $nama, $surat);
        return $stmt->execute();
    }

    public function ubahProgramKerja($nomor, $nama, $surat) {
        global $mysqli;
        $stmt = $mysqli->prepare("UPDATE proker SET namaProgram = ?, suratKeterangan = ? WHERE nomorProgram = ?");
        $stmt->bind_param("ssi", $nama, $surat, $nomor);
        return $stmt->execute();
    }

    public function hapusProgramKerja($nomor) {
        global $mysqli;
        $stmt = $mysqli->prepare("DELETE FROM proker WHERE nomorProgram = ?");
        $stmt->bind_param("i", $nomor);
        return $stmt->execute();
    }
}
?>