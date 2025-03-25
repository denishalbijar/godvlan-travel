<?php
session_start();
include 'config.php'; // Pastikan koneksi ke database "travel"


// Ambil data pengaturan dari database
$sql = "SELECT * FROM settings LIMIT 1";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $settings = $result->fetch_assoc();
} else {
    // Nilai default jika tidak ada data pengaturan
    $settings = [
        "site_icon"        => "assets/images/travele-logo1.png",
        "site_name"        => "Travele",
    ];
}

// Jika perlu sesuaikan relative path (sesuai struktur folder login.php)
// Contoh: jika di login.php kamu perlu menghilangkan "../admin/":
$settings['site_icon'] = str_replace('../admin/', 'admin/', $settings['site_icon']);

// Set variabel untuk memudahkan penggunaan
$site_icon = !empty($settings['site_icon']) ? $settings['site_icon'] : "assets/images/travele-logo1.png";
$site_name = !empty($settings['site_name']) ? $settings['site_name'] : "Travele";

// Jika parameter 'back' ada, hapus reset_email agar kembali ke form email
if (isset($_GET['back'])) {
    unset($_SESSION['reset_email']);
}

// Inisialisasi variabel
$error = '';
$showNewPasswordForm = false;

// Cek apakah reset_email sudah disimpan di session (menandakan email sudah valid)
if (isset($_SESSION['reset_email'])) {
    $showNewPasswordForm = true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Jika form password baru disubmit (cek apakah field new_password ada)
    if (isset($_POST['new_password'])) {
        $email = trim($_POST['email']);
        $new_password = trim($_POST['new_password']);
        $confirm_password = trim($_POST['confirm_password']);

        if ($new_password !== $confirm_password) {
            $error = "Password dan konfirmasi password tidak cocok!";
        } else {
            // Enkripsi password baru
            $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $hashedPassword, $email);
            if ($stmt->execute()) {
                echo "<script>alert('Password berhasil diubah! Silakan login kembali.'); window.location.href='login.php';</script>";
                exit();
            } else {
                $error = "Terjadi kesalahan, silakan coba lagi.";
            }
            $stmt->close();
        }
    } else {
        // Tahap pertama: pengguna memasukkan email untuk reset password
        $email = trim($_POST['email']);
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Jika email ditemukan, simpan ke session dan tampilkan form password baru
            $_SESSION['reset_email'] = $email;
            $showNewPasswordForm = true;
        } else {
            $error = "Email tidak ditemukan!";
        }
        $stmt->close();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password | <?php echo htmlspecialchars($site_name); ?></title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?php echo htmlspecialchars($site_icon); ?>">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/assets/css/all.min.css">
  <style>
    body {
      background: url('admin/assets/images/bg.jpg') no-repeat center center/cover;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .forgot-form-container {
      width: 100%;
      max-width: 400px;
      padding: 30px;
      background: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .forgot-form-container h3 {
      text-align: center;
      margin-bottom: 20px;
    }
    .password-container {
      position: relative;
    }
    .password-container input {
      width: 100%;
      padding-right: 50px;
    }
    .password-container .toggle-password {
      position: absolute;
      top: 70%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }
    .btn-group-d-flex {
      display: flex;
      gap: 10px;
    }
    .btn-group-d-flex .btn {
      flex: 1;
    }
  </style>
</head>
<body>
  <div class="forgot-form-container">
    <?php if (!empty($error)): ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if ($showNewPasswordForm): ?>
      <h3>Reset Password</h3>
      <form method="POST" action="">
        <!-- Sertakan email secara hidden -->
        <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION['reset_email']); ?>">
        
        <div class="form-group password-container">
          <label for="new_password">New Password</label>
          <input type="password" name="new_password" id="new_password" class="form-control" required>
          <i class="fas fa-eye toggle-password" onclick="togglePassword('new_password')"></i>
        </div>
        
        <div class="form-group password-container">
          <label for="confirm_password">Confirm New Password</label>
          <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
          <i class="fas fa-eye toggle-password" onclick="togglePassword('confirm_password')"></i>
        </div>
        
        <div class="btn-group-d-flex">
          <button type="submit" class="btn btn-primary">Ubah Password</button>
          <!-- Tombol kembali untuk kembali ke form email -->
          <a href="forgot.php?back=1" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    <?php else: ?>
      <h3>Lupa Password</h3>
      <form method="POST" action="">
        <div class="form-group">
          <label for="email">Masukkan Email Anda</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="btn-group-d-flex">
          <button type="submit" class="btn btn-primary">Submit</button>
          <a href="login.php" class="btn btn-secondary">Kembali</a>
        </div>
      </form>
    <?php endif; ?>
  </div>
  
  <script src="admin/assets/js/jquery-3.2.1.min.js"></script>
  <script src="admin/assets/js/bootstrap.min.js"></script>
  <script>
    function togglePassword(fieldId) {
      let field = document.getElementById(fieldId);
      let icon = field.nextElementSibling;
      if (field.type === "password") {
        field.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        field.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
</body>
</html>
