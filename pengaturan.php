<?php
session_start();
// Jika belum login, redirect ke login.php
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'partials/header.php';
?>

<!-- Hero Section dengan background dan overlay -->
<section class="settings-hero" style="background: url('assets/images/masurian.avif') no-repeat center center; background-size: cover; padding: 150px 0; position: relative;">
  <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5);"></div>
  <div class="container" style="position: relative; z-index: 2;">
    <h1 class="text-center text-white display-4">Pengaturan Akun</h1>
  </div>
</section>

<!-- Main Content: Container putih untuk form pengaturan -->
<main id="content" class="site-main py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card shadow-sm">
          <div class="card-body">
            <h3 class="card-title text-center mb-4">Ubah Informasi Akun</h3>
            <p class="text-center text-muted mb-4">Perbarui foto profil, username, nama lengkap, dan email Anda di bawah ini.</p>
            <form action="update_settings.php" method="POST" enctype="multipart/form-data">
              <!-- Foto Profil -->
              <div class="form-group text-center">
                <?php 
                  // Tampilkan foto profil dari session, atau gunakan gambar default jika belum ada
                  $profileImage = isset($_SESSION['profile_image']) && !empty($_SESSION['profile_image'])
                                  ? $_SESSION['profile_image']
                                  : 'assets/images/default-profile.png';
                ?>
                <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="Foto Profil" class="rounded-circle img-thumbnail mb-2" style="width:150px; height:150px; object-fit: cover;">
                <br>
                <label for="profile_image" class="font-weight-bold">Ubah Foto Profil</label>
                <input type="file" name="profile_image" id="profile_image" class="form-control-file">
              </div>
              
              <!-- Data Akun -->
              <div class="form-group">
                <label for="username" class="font-weight-bold">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>" placeholder="Masukkan username baru">
              </div>
              <div class="form-group">
                <label for="fullname" class="font-weight-bold">Nama Lengkap</label>
                <input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo htmlspecialchars($_SESSION['fullname'] ?? ''); ?>" placeholder="Masukkan nama lengkap Anda">
              </div>
              <div class="form-group">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?>" placeholder="Masukkan email Anda">
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

<!-- JavaScript dan Dependencies -->
<script src="assets/js/jquery.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/vendors/countdown-date-loop-counter/loopcounter.js"></script>
<script src="assets/js/jquery.counterup.js"></script>
<script src="assets/vendors/modal-video/jquery-modal-video.min.js"></script>
<script src="assets/vendors/masonry/masonry.pkgd.min.js"></script>
<script src="assets/vendors/lightbox/dist/js/lightbox.min.js"></script>
<script src="assets/vendors/slick/slick.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/custom.min.js"></script>

<?php include 'partials/footer.php'; ?>
