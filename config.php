<?php
$servername = "localhost";
$username = "root"; // Sesuaikan dengan konfigurasi MySQL Anda
$password = "";     // Sesuaikan jika ada password MySQL
$database = "travel";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
