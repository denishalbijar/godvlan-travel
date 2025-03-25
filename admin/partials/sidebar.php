<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sidebar Toggle with Content Expand</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <!-- Custom CSS (pastikan style.css Anda sudah ada aturan collapse) -->
  <link rel="stylesheet" href="../admin/assets/css/style.css">
  <style>
    /* Contoh CSS minimal untuk ilustrasi */
    .dashboard-navigation {
      width: 250px;
      transition: width 0.3s ease;
      float: left;
      background: #243145;
      height: 100vh;
      overflow: hidden;
    }
    .dashboard-navigation.collapsed {
      width: 125px;
    }
    .dashboard-navigation .navigation-container ul li a span {
      display: inline;
      transition: opacity 0.3s ease;
    }
    .dashboard-navigation.collapsed .navigation-container ul li a span {
      display: inline-block;
      width: 60px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    #main-content {
      margin-left: 250px;
      transition: margin-left 0.3s ease;
      padding: 20px;
    }
  </style>
  <!-- Include jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  <!-- Sidebar -->
  <div class="dashboard-navigation" id="sidebar">
    <!-- Responsive Navigation Trigger (jika ada) -->
    <div id="dashboard-Navigation" class="slick-nav"></div>
    <div id="navigation" class="navigation-container">
      <ul>
        <li class="active-menu">
          <a href="dashboard.php">
            <i class="far fa-chart-bar"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a>
            <i class="fas fa-user"></i>
            <span>Users</span>
          </a>
          <ul>
            <li><a href="user.php"><span>User</span></a></li>
            <li><a href="user_edit.php"><span>User edit</span></a></li>
            <li><a href="new_user.php"><span>New user</span></a></li>
          </ul>
        </li>
        <li>
          <a href="db-add-package.php">
            <i class="fas fa-umbrella-beach"></i>
            <span>Add Package</span>
          </a>
        </li>
        <li>
          <a href="db-package-active.php">
            <i class="fas fa-hotel"></i>
            <span>Packages</span>
          </a>
        </li>
        <li>
          <a href="db-booking.php">
            <i class="fas fa-ticket-alt"></i>
            <span>Booking & Enquiry</span>
          </a>
        </li>
        <li>
          <a href="db-wishlist.php">
            <i class="far fa-heart"></i>
            <span>Wishlist</span>
          </a>
        </li>
        <li>
          <a href="db-comment.php">
            <i class="fas fa-comments"></i>
            <span>Comments</span>
          </a>
        </li>
        <li>
          <a href="../logout.php">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
          </a>
        </li>
        <li>
          <a href="settings.php">
            <i class="fa-solid fa-gear"></i>
            <span>Settings</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <!-- End Sidebar -->

  <!-- Main Content -->
  <div id="main-content">
    <button id="sidebarToggle" class="btn btn-primary mb-3"></button>
    <h1>SELAMAT DATANG ADMIN</h1>
    <p>Silahkan rombak apa yang kamu inginkan admin.</p>
  </div>

  <!-- Script untuk toggle sidebar dan expand main content -->
  <script>
    $(document).ready(function(){
      $("#sidebarToggle").on("click", function(){
        $("#sidebar").toggleClass("collapsed");
        if($("#sidebar").hasClass("collapsed")){
          $("#main-content").animate({ marginLeft: "125px" }, 300);
        } else {
          $("#main-content").animate({ marginLeft: "250px" }, 300);
        }
        console.log("Sidebar collapsed: " + $("#sidebar").hasClass("collapsed"));
      });
    });
  </script>
</body>
</html>
