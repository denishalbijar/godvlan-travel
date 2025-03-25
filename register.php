<?php
session_start();
include 'config.php'; // Koneksi ke database "travel"


// Ambil data pengaturan dari database
$sql = "SELECT * FROM settings LIMIT 1";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $settings = $result->fetch_assoc();
} else {
    // Nilai default jika tidak ada data pengaturan
    $settings = [
        "site_logo"        => "assets/images/travele-logo.png",
        "site_icon"        => "assets/images/travele-logo1.png",
        "site_name"        => "Travele",
    ];
}

// Jika perlu sesuaikan relative path (sesuai struktur folder login.php)
// Contoh: jika di login.php kamu perlu menghilangkan "../admin/":
$settings['site_logo'] = str_replace('../admin/', 'admin/', $settings['site_logo']);
$settings['site_icon'] = str_replace('../admin/', 'admin/', $settings['site_icon']);

// Set variabel untuk memudahkan penggunaan
$site_logo = !empty($settings['site_logo']) ? $settings['site_logo'] : "assets/images/travele-logo.png";
$site_icon = !empty($settings['site_icon']) ? $settings['site_icon'] : "assets/images/travele-logo1.png";
$site_name = !empty($settings['site_name']) ? $settings['site_name'] : "Travele";

// Jika tombol register ditekan
if (isset($_POST['register'])) {
    $fullname = trim($_POST['fullname']);
    $email    = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Cek apakah username sudah digunakan
    $checkUser = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $checkUser->bind_param("s", $username);
    $checkUser->execute();
    $result = $checkUser->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah terdaftar! Gunakan username lain.');</script>";
    } else {
        // Enkripsi password sebelum disimpan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Gunakan prepared statement untuk simpan data
        $stmt = $conn->prepare("INSERT INTO users (fullname, email, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $email, $username, $hashedPassword);
        
        if ($stmt->execute()) {
            echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='login.php';</script>";
            exit();
        } else {
            echo "<script>alert('Terjadi kesalahan, coba lagi.');</script>";
        }
        $stmt->close();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register | <?php echo htmlspecialchars($site_name); ?></title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?php echo htmlspecialchars($site_icon); ?>">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="admin/assets/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
  
  <!-- Custom CSS -->
  <style>
      body {
          background: url('admin/assets/images/bg.jpg') no-repeat center center/cover;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
      }
      .register-form-container {
          width: 100%;
          max-width: 500px;
          padding: 40px;
          background: white;
          border-radius: 12px;
          box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      }
      .register-form-container h1 img {
          width: 180px;
          display: block;
          margin: auto;
      }
      .form-group {
          margin-bottom: 20px;
          position: relative;
      }
      .form-group label {
          font-weight: bold;
          display: block;
          margin-bottom: 5px;
      }
      .password-container {
          position: relative;
      }
      .password-container input {
          width: 100%;
          height: 50px;
          font-size: 16px;
          padding-right: 45px;
      }
      .toggle-password {
          position: absolute;
          right: 15px;
          top: 50%;
          transform: translateY(-50%);
          cursor: pointer;
          font-size: 20px;
          color: #888;
      }
      .btn-custom {
          width: 100%;
          height: 50px;
          font-size: 16px;
      }
      .text-muted {
          display: block;
          text-align: center;
          margin-top: 15px;
      }
  </style>
</head>
<body>
  <div class="register-form-container">
      <form method="POST" action="">
          <h1 class="text-center">
            <img src="<?php echo htmlspecialchars($site_logo); ?>" alt="<?php echo htmlspecialchars($site_name); ?>" style="width:180px; display:block; margin:auto;">
          </h1>
          <div class="form-group">
              <label for="fullname">Full Name</label>
              <input type="text" name="fullname" id="fullname" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="username">User Name</label>
              <input type="text" name="username" id="username" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <div class="password-container">
                  <input type="password" name="password" id="password" class="form-control" required>
                  <span class="toggle-password">
                      <i class="fas fa-eye" id="toggleEye"></i>
                  </span>
              </div>
          </div>
          <button type="submit" name="register" class="btn btn-success btn-custom">Register</button>
          <a href="login.php" class="text-muted">Already have an account? Login</a>
      </form>
  </div>

  <script>
      document.getElementById('toggleEye').addEventListener('click', function () {
          let passwordInput = document.getElementById('password');
          if (passwordInput.type === 'password') {
              passwordInput.type = 'text';
              this.classList.remove('fa-eye');
              this.classList.add('fa-eye-slash');
          } else {
              passwordInput.type = 'password';
              this.classList.remove('fa-eye-slash');
              this.classList.add('fa-eye');
          }
      });
  </script>

  <!-- Bootstrap JS & jQuery -->
  <script src="admin/assets/js/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="admin/assets/js/bootstrap.min.js"></script>
</body>
</html>
