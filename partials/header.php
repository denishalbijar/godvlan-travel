<?php
// Pastikan session sudah dimulai di halaman utama (misalnya di index.php)
// Jadi di sini tidak perlu session_start() lagi jika sudah dipanggil.
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Godvlan Travel</title>
  
  <!-- favicon -->
  <link rel="icon" type="image/png" href="assets/images/godvlan.ico">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" media="all">
  <!-- FontAwesome CSS -->
  <link rel="stylesheet" type="text/css" href="assets/vendors/fontawesome/css/all.min.css">
  <!-- jquery-ui css -->
  <link rel="stylesheet" type="text/css" href="assets/vendors/jquery-ui/jquery-ui.min.css">
  <!-- modal video css -->
  <link rel="stylesheet" type="text/css" href="assets/vendors/modal-video/modal-video.min.css">
  <!-- light box css -->
  <link rel="stylesheet" type="text/css" href="assets/vendors/lightbox/dist/css/lightbox.min.css">
  <!-- slick slider css -->
  <link rel="stylesheet" type="text/css" href="assets/vendors/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="assets/vendors/slick/slick-theme.css">
  <!-- google fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  <style>
    /* Aturan tema dark */
    .dark-theme {
      background-color: #121212;
      color: #ffffff;
    }
    /* Style untuk switch dark/light */
    .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
    }
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      transition: .4s;
    }
    .slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: .4s;
    }
    input:checked + .slider {
      background-color: #2196F3;
    }
    input:checked + .slider:before {
      transform: translateX(26px);
    }
    .slider.round {
      border-radius: 24px;
    }
    .slider.round:before {
      border-radius: 50%;
    }
    /* Atur warna ikon gear agar putih */
    .settings-icon i {
      color: #ffffff;
    }
    /* CSS untuk Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: -250px; /* tersembunyi secara default */
      width: 250px;
      height: 100%;
      background-color: #333;
      color: #fff;
      overflow-y: auto;
      transition: left 0.3s ease;
      padding: 20px;
      z-index: 999;
    }
    .sidebar.active {
      left: 0;
    }
    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }
    .sidebar ul li {
      margin: 10px 0;
    }
    .sidebar ul li a {
      color: #fff;
      display: block;
      padding: 10px 0;
      text-decoration: none;
    }
    .sidebar ul li a:hover {
      background-color: #444;
    }
    /* Styling untuk tombol sidebar di header */
    .sidebar-toggle {
      margin-right: 15px;
    }
    /* Custom style untuk tombol sidebar agar warnanya lebih jelas */
    .sidebar-toggle button {
      background-color: #2196F3;
      border: 1px solid #2196F3;
      color: #fff;
      padding: 8px 12px;
      font-size: 16px;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    .sidebar-toggle button:hover {
      background-color: #1976d2;
      border-color: #1976d2;
    }
  </style>
</head>
<body class="home">
  <!-- Header -->
  <header id="masthead" class="site-header header-primary">
    <!-- Top Header -->
    <div class="top-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 d-none d-lg-block">
            <div class="header-contact-info">
              <ul>
                <li>
                  <a href="#"><i class="fas fa-phone-alt"></i> +62 812-3456-7890</a>
                </li>
                <li>
                  <a href="mailto:info@Travel.com"><i class="fas fa-envelope"></i> godvlan@gmail.com</a>
                </li>
                <li>
                  <i class="fas fa-map-marker-alt"></i> 20112 Medan Petisah, Sumatera Utara
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 d-flex justify-content-lg-end justify-content-between align-items-center">
            <div class="header-social social-links">
              <ul>
                <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
              </ul>
            </div>
            <!-- Tombol Pencarian -->
            <div class="header-search-icon">
              <button class="search-icon">
                <i class="fas fa-search"></i>
              </button>
            </div>
            <!-- Tombol Pengaturan dan Switch Tema -->
            <div class="theme-settings d-flex align-items-center ml-3">
              <!-- Tombol Pengaturan (Gear Icon) -->
              <a href="pengaturan.php" class="settings-icon mr-3">
                <i class="fas fa-cog"></i>
              </a>
              <!-- Switch Dark/Light -->
              <div class="dark-light-switch">
                <label class="switch">
                  <input type="checkbox" id="theme-switch">
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bottom Header -->
    <div class="bottom-header">
      <div class="container d-flex justify-content-between align-items-center">
        <div class="site-identity">
          <h1 class="site-title">
            <a href="index.php">
              <img class="white-logo" src="assets/images/travele-logo.png" alt="logo">
              <img class="black-logo" src="assets/images/travele-logo1.png" alt="logo">
            </a>
          </h1>
        </div>
        <div class="main-navigation d-none d-lg-block">
          <nav id="navigation" class="navigation">
            <ul>
              <li class="menu-item-has-children">
                <a href="index.php">Home</a>
                <ul>
                  <li>
                    <a href="index.php">Home</a>
                  </li>
                </ul>
              </li>
              <li class="menu-item-has-children">
                <a href="#">Tour</a>
                <ul>
                  <li>
                    <a href="destination.php">Destination</a>
                  </li>
                  <li>
                    <a href="tour-packages.php">Tour Packages</a>
                  </li>
                  <li>
                    <a href="package-offer.php">Package Offer</a>
                  </li>
                  <li>
                    <a href="package-detail.php">Package Detail</a>
                  </li>
                  <li>
                    <a href="tour-cart.php">Tour Cart</a>
                  </li>
                  <li>
                    <a href="booking.php">Package Booking</a>
                  </li>
                  <li>
                    <a href="confirmation.php">Confirmation</a>
                  </li>
                </ul>
              </li>
              <li class="menu-item-has-children">
                <a href="#">Pages</a>
                <ul>
                  <li>
                    <a href="about.php">About</a>
                  </li>
                  <li>
                    <a href="service.php">Service</a>
                  </li>
                  <li>
                    <a href="career.php">Career</a>
                  </li>
                  <li>
                    <a href="career-detail.php">Career Detail</a>
                  </li>
                  <li>
                    <a href="tour-guide.php">Tour Guide</a>
                  </li>
                  <li>
                    <a href="gallery.php">Gallery</a>
                  </li>
                  <li>
                    <a href="single-page.php">Single Page</a>
                  </li>
                  <li>
                    <a href="faq.php">FAQ Page</a>
                  </li>
                  <li>
                    <a href="testimonial-page.php">Testimonial Page</a>
                  </li>
                  <li>
                    <a href="popup.php">Popup</a>
                  </li>
                  <li>
                    <a href="search-page.php">Search Page</a>
                  </li>
                  <li>
                    <a href="404.php">404 Page</a>
                  </li>
                  <li>
                    <a href="comming-soon.php">Comming Soon</a>
                  </li>
                  <li>
                    <a href="contact.php">Contact</a>
                  </li>
                  <li>
                    <a href="wishlist-page.php">Wishlist</a>
                  </li>
                </ul>
              </li>
              <li class="menu-item-has-children">
                <a href="#">Blog</a>
                <ul>
                  <li><a href="blog-archive.php">Blog List</a></li>
                </ul>
              </li>
              <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
              <li class="menu-item-has-children">
                <a href="#">Dashboard</a>
                <ul>
                  <li>
                    <a href="admin/dashboard.php">Dashboard</a>
                  </li>
                  <li class="menu-item-has-children">
                    <a href="#">User</a>
                    <ul>
                      <li>
                        <a href="admin/user.php">User List</a>
                      </li>
                      <li>
                        <a href="admin/user-edit.php">User Edit</a>
                      </li>
                      <li>
                        <a href="admin/new-user.php">New User</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="admin/db-booking.php">Booking</a>
                  </li>
                  <li class="menu-item-has-children">
                    <a href="admin/db-package.php">Package</a>
                    <ul>
                      <li>
                        <a href="admin/db-package-active.php">Package Active</a>
                      </li>
                      <li>
                        <a href="admin/db-package-pending.php">Package Pending</a>
                      </li>
                      <li>
                        <a href="admin/db-package-expired.php">Package Expired</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="admin/db-comment.php">Comments</a>
                  </li>
                  <li>
                    <a href="admin/db-wishlist.php">Wishlist</a>
                  </li>
                  <li>
                    <a href="admin/login.php">Login</a>
                  </li>
                  <li>
                    <a href="admin/forgot.php">Forget Password</a>
                  </li>
                </ul>
              </li>
              <?php endif; ?>
            </ul>
          </nav>
        </div>
        <div class="header-btn d-flex align-items-center">
          <!-- Tombol Sidebar -->
          <div class="sidebar-toggle mr-2">
            <button id="sidebar-toggle-button">
              <i class="fas fa-bars"></i>
            </button>
          </div>
          <a href="#" class="button-primary">BOOK NOW</a>
        </div>
      </div>
    </div>
    <!-- Container Mobile Menu (jika diperlukan) -->
    <div class="mobile-menu-container"></div>
  </header>

  <?php include('partials/sidbar.php'); ?>
  
  <!-- Script untuk switch dark/light -->
  <script>
    document.getElementById('theme-switch').addEventListener('change', function() {
      if (this.checked) {
        document.body.classList.add('dark-theme');
      } else {
        document.body.classList.remove('dark-theme');
      }
    });
  </script>

  <!-- Script untuk toggle Sidebar -->
  <script>
    document.getElementById('sidebar-toggle-button').addEventListener('click', function() {
      document.getElementById('sidebar').classList.toggle('active');
    });
  </script>
  
  <!-- Bootstrap dan dependencies JavaScript -->
  <script src="assets/vendors/jquery/jquery.min.js"></script>
  <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
