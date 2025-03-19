<?php
session_start();
include 'config.php'; // Pastikan file config.php sudah terhubung ke database "travel"

// Proses login ketika tombol ditekan
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Gunakan prepared statement untuk mencegah SQL Injection
    $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
    if (!$query) {
        die("Query error: " . $conn->error);
    }
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

    // Jika user ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password menggunakan password_verify()
        if (password_verify($password, $user['password'])) {
            // Set session dengan data lengkap user, termasuk user_id!
            $_SESSION['user_id']       = $user['id'];
            $_SESSION['username']      = $user['username'];
            $_SESSION['role']          = $user['role'];
            $_SESSION['fullname']      = $user['fullname'];
            $_SESSION['email']         = $user['email'];
            $_SESSION['profile_image'] = $user['profile_image'];

            // Redirect berdasarkan peran
            if ($user['role'] == 'admin') {
                echo "<script>alert('Login sebagai Admin'); window.location.href='admin/dashboard.php';</script>";
                exit();
            } else {
                echo "<script>alert('Login Berhasil'); window.location.href='index.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login | Travele</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="../assets/images/favicon.png">
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
      .login-form-container {
          width: 100%;
          max-width: 450px;
          padding: 40px;
          background: white;
          border-radius: 12px;
          box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      }
      .login-form-container h1 img {
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
      .btn-group-custom {
          display: flex;
          gap: 10px;
      }
      .btn-group-custom .btn {
          flex: 1;
          height: 40px;
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
  <div class="login-form-container">
      <form method="POST">
          <h1 class="text-center">
              <img src="admin/assets/images/logo.png" alt="Logo">
          </h1>
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
          <div class="btn-group-custom">
              <button type="submit" name="login" class="btn btn-primary">Login</button>
              <a href="register.php" class="btn btn-success">Register</a>
          </div>
          <a href="forgot.php" class="text-muted">Forgot Password?</a>
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
