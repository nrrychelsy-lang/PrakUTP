<?php
$mysqli = new mysqli('localhost', 'root', '', 'praktikumWeb');

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>