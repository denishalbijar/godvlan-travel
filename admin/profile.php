<?php
session_start();
// Jika belum login, redirect ke login.php
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
include '../config.php';
include '../admin/partials/topbar.php';
include '../admin/partials/sidebar.php';

// Ambil data pengguna dari database
$user_id = $_SESSION['user_id'];
$query = "SELECT profile_image, username, fullname, email FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Gunakan gambar default jika tidak ada foto profil
$profileImage = !empty($user['profile_image']) ? $user['profile_image'] : '../assets/images/default-profile.png';
?>

<section class="settings-hero" style="background: url('../assets/images/profile-bg.jpg') no-repeat center center; background-size: cover; padding: 150px 0; position: relative;">
  <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5);"></div>
  <div class="container" style="position: relative; z-index: 2;">
    <h1 class="text-center text-white display-4">Profil Admin</h1>
  </div>
</section>

<main id="content" class="site-main py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Ubah Profil</h3>
            <form action="update_profile.php" method="POST" enctype="multipart/form-data">
              <div class="form-group text-center">
                <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="Foto Profil" class="rounded-circle img-thumbnail mb-2" style="width:150px; height:150px; object-fit: cover;">
                <br>
                <label for="profile_image" class="font-weight-bold">Ubah Foto Profil</label>
                <input type="file" name="profile_image" id="profile_image" class="form-control-file">
              </div>
              
              <div class="form-group">
                <label for="username" class="font-weight-bold">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($user['username'] ?? ''); ?>" required>
              </div>
              <div class="form-group">
                <label for="fullname" class="font-weight-bold">Nama Lengkap</label>
                <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo htmlspecialchars($user['fullname'] ?? ''); ?>" required>
              </div>
              <div class="form-group">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($user['email'] ?? ''); ?>" required>
              </div>
              
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
