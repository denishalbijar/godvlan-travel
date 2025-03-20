<?php
session_start();
include '../config.php';

// Pastikan admin sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}

$currentUsername = $_SESSION['username'];
$newUsername = trim($_POST['username'] ?? '');
$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$newProfileImage = '';

// PROSES UPLOAD FOTO PROFIL (jika ada file yang diunggah)
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../uploads/profile/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $fileExt = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($fileExt, $allowedExt)) {
        echo "<script>alert('Jenis file tidak diizinkan!'); window.location.href='profile.php';</script>";
        exit();
    }
    $baseUsername = !empty($newUsername) ? $newUsername : $currentUsername;
    $newFileName = $baseUsername . '_' . time() . '.' . $fileExt;
    $targetFile = $uploadDir . $newFileName;
    
    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile)) {
        $newProfileImage = 'uploads/profile/' . $newFileName;
    } else {
        echo "<script>alert('Gagal mengupload foto profil.'); window.location.href='profile.php';</script>";
        exit();
    }
}

if ($newUsername !== $currentUsername) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? AND username <> ?");
    $stmt->bind_param("ss", $newUsername, $currentUsername);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah digunakan!'); window.location.href='profile.php';</script>";
        exit();
    }
    $stmt->close();
}

if (!empty($newProfileImage)) {
    $query = $conn->prepare("UPDATE users SET username = ?, fullname = ?, email = ?, profile_image = ? WHERE username = ?");
    $query->bind_param("sssss", $newUsername, $fullname, $email, $newProfileImage, $currentUsername);
} else {
    $query = $conn->prepare("UPDATE users SET username = ?, fullname = ?, email = ? WHERE username = ?");
    $query->bind_param("ssss", $newUsername, $fullname, $email, $currentUsername);
}

if ($query->execute()) {
    $_SESSION['username'] = $newUsername;
    $_SESSION['fullname'] = $fullname;
    $_SESSION['email'] = $email;
    if (!empty($newProfileImage)) {
        $_SESSION['profile_image'] = $newProfileImage;
    }
    echo "<script>alert('Profil berhasil diperbarui!'); window.location.href='profile.php';</script>";
    exit();
} else {
    echo "<script>alert('Terjadi kesalahan saat memperbarui profil. Error: " . $query->error . "'); window.location.href='profile.php';</script>";
    exit();
}

$query->close();
$conn->close();
?>
