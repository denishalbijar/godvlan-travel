<?php
session_start();
include 'config.php';

// Pastikan user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$currentUsername = $_SESSION['username'];
// Ambil data yang dikirim melalui form (gunakan operator null coalescing untuk menghindari error)
$newUsername = trim($_POST['username'] ?? '');
$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$newProfileImage = '';

// PROSES UPLOAD FOTO PROFIL (jika ada file yang diunggah)
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/profile/';
    // Jika folder tidak ada, buat folder baru
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    // Validasi ekstensi file: hanya izinkan jpg, jpeg, png, gif
    $fileExt = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($fileExt, $allowedExt)) {
        echo "<script>alert('Jenis file tidak diizinkan!'); window.location.href='pengaturan.php';</script>";
        exit();
    }
    // Buat nama file unik, gunakan username baru jika tersedia, jika tidak, gunakan currentUsername
    $baseUsername = !empty($newUsername) ? $newUsername : $currentUsername;
    $newFileName = $baseUsername . '_' . time() . '.' . $fileExt;
    $targetFile = $uploadDir . $newFileName;
    
    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile)) {
        $newProfileImage = $targetFile;
    } else {
        echo "<script>alert('Gagal mengupload foto profil.'); window.location.href='pengaturan.php';</script>";
        exit();
    }
}

// Jika username baru berbeda dari currentUsername, periksa keunikannya
if ($newUsername !== $currentUsername) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND username <> ?");
    $stmt->bind_param("ss", $newUsername, $currentUsername);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location.href='pengaturan.php';</script>";
        exit();
    }
    $stmt->close();
}

// Siapkan query UPDATE berdasarkan apakah ada foto profil baru atau tidak
if (!empty($newProfileImage)) {
    $query = $conn->prepare("UPDATE users SET username = ?, fullname = ?, email = ?, profile_image = ? WHERE username = ?");
    $query->bind_param("sssss", $newUsername, $fullname, $email, $newProfileImage, $currentUsername);
} else {
    $query = $conn->prepare("UPDATE users SET username = ?, fullname = ?, email = ? WHERE username = ?");
    $query->bind_param("ssss", $newUsername, $fullname, $email, $currentUsername);
}

// Eksekusi query dan perbarui session jika berhasil
if ($query->execute()) {
    // Perbarui data session agar tampilan langsung berubah
    $_SESSION['username'] = $newUsername;
    $_SESSION['fullname'] = $fullname;
    $_SESSION['email'] = $email;
    if (!empty($newProfileImage)) {
        $_SESSION['profile_image'] = $newProfileImage;
    }
    echo "<script>alert('Pengaturan berhasil diperbarui!'); window.location.href='pengaturan.php';</script>";
    exit();
} else {
    // Tampilkan error query untuk debugging
    echo "<script>alert('Terjadi kesalahan saat memperbarui pengaturan. Error: " . $query->error . "'); window.location.href='pengaturan.php';</script>";
    exit();
}

$query->close();
$conn->close();
?>
