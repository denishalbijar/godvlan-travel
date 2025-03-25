<?php
session_start();
include('../config.php'); // Koneksi ke database

// Pastikan hanya admin yang bisa mengakses halaman ini
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses ditolak!'); window.location='../login.php';</script>";
    exit;
}

// Ambil ID user dari parameter URL
$user_id = $_GET['id'] ?? 0;

if ($user_id) {
    // Ambil data user untuk mendapatkan path gambar
    $query = "SELECT profile_image FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Hapus file gambar jika bukan default
        // Pastikan path yang disimpan di database tidak mengandung '../' karena kita tambahkan di sini\n
        if (!empty($user['profile_image']) 
            && $user['profile_image'] !== 'assets/images/default-profile.png'
            && file_exists("../" . $user['profile_image'])) {
            unlink("../" . $user['profile_image']);
        }

        // Hapus user dari database
        $deleteQuery = "DELETE FROM users WHERE id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        if (!$deleteStmt) {
            die("Prepare failed: " . $conn->error);
        }
        $deleteStmt->bind_param("i", $user_id);
        
        if ($deleteStmt->execute()) {
            echo "<script>alert('User berhasil dihapus!'); window.location='user.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus user!'); window.location='user.php';</script>";
        }
        $deleteStmt->close();
    } else {
        echo "<script>alert('User tidak ditemukan!'); window.location='user.php';</script>";
    }
    $stmt->close();
} else {
    echo "<script>alert('ID user tidak valid!'); window.location='user.php';</script>";
}
?>
