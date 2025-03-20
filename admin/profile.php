<?php
session_start();
// Pastikan admin sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
include '../config.php';
include '../admin/partials/topbar.php';
include '../admin/partials/sidebar.php'; 

// Ambil data admin dari database
$currentUsername = $_SESSION['username'];
$query = "SELECT profile_image, username, fullname, email FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $currentUsername);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Gunakan gambar default jika tidak ada foto profil
$profileImage = !empty($user['profile_image']) ? '../' . $user['profile_image'] : '../assets/images/default-profile.png';
?>


<!-- Form Profile Admin -->
<main id="content" class="site-main py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Ubah Profil Admin</h3>
            <form action="../admin/update_profile.php" method="POST" enctype="multipart/form-data">
              <!-- Foto Profil -->
              <div class="form-group text-center">
                <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="Foto Profil" class="rounded-circle img-thumbnail mb-2" style="width:150px; height:150px; object-fit: cover;">
                <br>
                <label for="profile_image" class="font-weight-bold">Ubah Foto Profil</label>
                <input type="file" name="profile_image" id="profile_image" class="form-control-file">
              </div>
              
              <!-- Data Akun -->
              <div class="form-group">
                <label for="username" class="font-weight-bold">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($user['username'] ?? ''); ?>" required>
              </div>
              <div class="form-group">
                <label for="fullname" class="font-weight-bold">Nama Lengkap</label>
                <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo htmlspecialchars($user['fullname'] ?? ''); ?>">
              </div>
              <div class="form-group">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>">
              </div>
              
              <!-- Tombol Simpan -->
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="../assets/js/jquery.js"></script>
<script src="../assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/custom.min.js"></script>

<?php include '../admin/partials/footers.php'; ?>
