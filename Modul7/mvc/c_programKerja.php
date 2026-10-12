<?php
// include_once("m_programKerja.php");

// class c_programKerja {
//     public $model;

//     public function __construct() {
//         $this->model = new m_programKerja();
//     }

//     public function invoke() {
//         $act = $_GET['act'] ?? 'list';

//         if ($act == 'tambah') {
//             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                 $this->model->tambahProgramKerja($_POST['nomor'], $_POST['nama'], $_POST['surat']);
//                 header("Location: index.php");
//             } else {
//                 include 'v_tambahProker.php';
//             }
//         } elseif ($act == 'edit') {
//             $nomor = $_GET['id'];
//             if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//                 $this->model->ubahProgramKerja($nomor, $_POST['nama'], $_POST['surat']);
//                 header("Location: index.php");
//             } else {
//                 $data = $this->model->getProgramKerjaByNo($nomor);
//                 include 'v_editProker.php';
//             }
//         } elseif ($act == 'hapus') {
//             $nomor = $_GET['id'];
//             $this->model->hapusProgramKerja($nomor);
//             header("Location: index.php");
//         } else {
//             $proker = $this->model->getSemuaProgramKerja();
//             include 'v_programKerja.php';
//         }
//     }
// }
session_start();
include_once("m_programKerja.php");
include_once("m_pengurusBEM.php");

class c_programKerja {
    public $modelProker;
    public $modelUser;

    public function __construct() {
        $this->modelProker = new m_programKerja();
        $this->modelUser = new m_pengurusBEM();
    }

    public function invoke() {
        $act = $_GET['act'] ?? 'list';

        if ($act == 'login') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user = $this->modelUser->cekLogin($_POST['nim'], $_POST['password']);
                if ($user) {
                    $_SESSION['user'] = $user;
                    header("Location: index.php");
                } else {
                    $error = "NIM atau Password Salah!";
                    include 'v_login.php';
                }
            } else {
                include 'v_login.php';
            }
        } elseif ($act == 'logout') {
            session_destroy();
            header("Location: index.php?act=login");
        } else {
            // Proteksi Halaman
            if (!isset($_SESSION['user'])) {
                header("Location: index.php?act=login");
                exit();
            }

            $user = $_SESSION['user'];
            $role = $user['role'];

            // Hak Akses CRUD khusus Kepala Departemen
            if (in_array($act, ['tambah', 'edit', 'hapus']) && $role != 'Kepala Departemen') {
                echo "<script>alert('Akses Ditolak! Menteri hanya dapat melihat daftar proker.'); window.location='index.php';</script>";
                exit();
            }

            if ($act == 'tambah') {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $this->modelProker->tambahProgramKerja($_POST['nomor'], $_POST['nama'], $_POST['surat']);
                    header("Location: index.php");
                } else {
                    include 'v_tambahProker.php';
                }
            } elseif ($act == 'edit') {
                $nomor = $_GET['id'];
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $this->modelProker->ubahProgramKerja($nomor, $_POST['nama'], $_POST['surat']);
                    header("Location: index.php");
                } else {
                    $data = $this->modelProker->getProgramKerjaByNo($nomor);
                    include 'v_editProker.php';
                }
            } elseif ($act == 'hapus') {
                $this->modelProker->hapusProgramKerja($_GET['id']);
                header("Location: index.php");
            } else {
                $proker = $this->modelProker->getSemuaProgramKerja();
                include 'v_programKerja.php';
            }
        }
    }
}
?>