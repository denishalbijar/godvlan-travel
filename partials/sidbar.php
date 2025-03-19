<?php
// Pastikan session sudah dimulai di halaman utama (misalnya di index.php) sehingga tidak perlu session_start() di sini
?>
<div id="sidebar" class="sidebar">
  <h4 class="sidebar-title">Menu</h4>
  <ul class="sidebar-menu">
    <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
    <li><a href="about.php"><i class="fas fa-info-circle"></i> About</a></li>
    <li><a href="service.php"><i class="fas fa-concierge-bell"></i> Services</a></li>
    <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
  </ul>
  
  <?php if (!isset($_SESSION['username'])): ?>
    <!-- Jika belum login, tampilkan tombol Login dan Register -->
    <div class="sidebar-auth">
      <a href="login.php" class="btn btn-login"><i class="fas fa-sign-in-alt"></i> Login</a>
      <a href="register.php" class="btn btn-register"><i class="fas fa-user-plus"></i> Register</a>
    </div>
  <?php else: ?>
    <!-- Jika sudah login, tampilkan informasi user -->
    <div class="sidebar-user">
      <div class="profile-img">
        <?php
          // Jika ada data foto profil di session, gunakan; jika tidak, pakai default
          $profileImage = isset($_SESSION['profile_image']) && !empty($_SESSION['profile_image'])
                          ? $_SESSION['profile_image']
                          : 'assets/images/default-profile.png';
        ?>
        <img src="<?php echo htmlspecialchars($profileImage); ?>" alt="Profile Image">
      </div>
      <h5>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h5>
      <?php if (isset($_SESSION['fullname'])): ?>
         <p><?php echo htmlspecialchars($_SESSION['fullname']); ?></p>
      <?php endif; ?>
      
      <!-- Tampilkan tombol Dashboard hanya untuk admin -->
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
        <a href="admin/dashboard.php" class="btn btn-dashboard"><i class="fas fa-user"></i> Dashboard</a>
      <?php endif; ?>
      
      <a href="logout.php" class="btn btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  <?php endif; ?>
</div>

<style>
  /* Sidebar Styling */
  .sidebar {
    width: 250px;
    background:rgb(42, 119, 196);
    color: white;
    padding: 20px;
    border-radius: 10px;
  }
  .sidebar-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 15px;
  }
  .sidebar-menu {
    list-style: none;
    padding: 0;
  }
  .sidebar-menu li {
    margin: 10px 0;
  }
  .sidebar-menu a {
    text-decoration: none;
    color: white;
    display: flex;
    align-items: center;
  }
  .sidebar-menu i {
    margin-right: 10px;
  }
  /* Auth Buttons & User Info */
  .sidebar-auth, .sidebar-user {
    text-align: center;
    margin: 15px 0;
  }
  .btn {
    display: block;
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    font-weight: bold;
  }
  .btn-login {
    background: #3498db;
    color: white;
  }
  .btn-register {
    background: #2ecc71;
    color: white;
  }
  .btn-dashboard {
    background: #f39c12;
    color: white;
  }
  .btn-logout {
    background: #e74c3c;
    color: white;
  }
  .btn:hover {
    opacity: 0.8;
  }
  /* Profile Image Styling */
  .profile-img {
    margin: 0 auto 10px;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    overflow: hidden;
  }
  .profile-img img {
    width: 100%;
    height: auto;
  }
  /* Disclaimer (jika diperlukan) */
  .sidebar-disclaimer {
    font-size: 12px;
    text-align: center;
    margin-top: 15px;
    opacity: 0.7;
  }
</style>
