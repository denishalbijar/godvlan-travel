<?php
session_start();
include('../config.php');

// Ambil logo dari tabel settings
$sql = "SELECT site_logo FROM settings LIMIT 1";
$result = $conn->query($sql);
$site_logo = '../assets/images/logo.png'; // Default logo
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (!empty($row['site_logo'])) {
        $site_logo = $row['site_logo'];
    }
}

// Ambil data profil user dari tabel users berdasarkan session user_id
$user_id = $_SESSION['user_id'] ?? 0;

// Default profil jika user_id tidak valid atau data tidak ditemukan
$user_profile = [
    'profile_pic' => '../assets/images/default_profile.png',
    'username'    => 'My Account'
];

if ($user_id) {
    $stmt = $conn->prepare("SELECT profile_image AS profile_pic, username FROM users WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $user_id);
        if (!$stmt->execute()) {
            die("Query error: " . $stmt->error);
        }
        $result_user = $stmt->get_result();
        if ($result_user->num_rows > 0) {
            $user_profile = $result_user->fetch_assoc();
        }
        $stmt->close();
    }
}


// Ambil site_icon dari tabel settings
$sql = "SELECT site_icon FROM settings LIMIT 1";
$result = $conn->query($sql);
$site_icon = '../assets/images/favicon.png'; // Default favicon
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (!empty($row['site_icon'])) {
        $site_icon = $row['site_icon'];
    }
}


// Ambil site_name dari tabel settings
$sql = "SELECT site_name FROM settings LIMIT 1";
$result = $conn->query($sql);
$site_name = "Travele"; // Default nama website
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (!empty($row['site_name'])) {
        $site_name = $row['site_name'];
    }
}
?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- favicon -->
      <!-- favicon -->
      <link rel="icon" type="image/png" href="<?php echo htmlspecialchars($site_icon); ?>">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css" media="all">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
      <!-- Fonts Awesome CSS -->
      <link rel="stylesheet" type="text/css" href="assets/css/all.min.css">
      <!-- google fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="../admin/assets/css/style.css">
      <title><?php echo htmlspecialchars($site_name); ?> | Travel & Tour</title>
      <!-- Include jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   </head>
   <body>
      <!-- start Container Wrapper -->
      <div id="container-wrapper">
         <!-- Dashboard -->
         <div id="dashboard" class="dashboard-container">
            <!-- Topbar tanpa height fixed agar menyesuaikan dengan konten (logo) -->
            <div class="dashboard-header sticky-header">
               <!-- Flex container agar logo dan tombol sidebar sejajar -->
               <div style="display:flex; align-items:center; padding:0 20px;">
                  <!-- LOGO SECTION DENGAN TOGGLE SIDEBAR DI SEBELAH KANAN LOGO -->
                  <div class="content-left logo-section pull-left" style="display:flex; align-items:center;">
                     <h1 style="margin:0;">
                        <a href="../index.php" style="text-decoration:none; display:flex; align-items:center;">
                           <!-- Logo diambil dari database settings -->
                           <img id="siteLogo" src="<?php echo $site_logo; ?>" alt="Logo" style="max-width:150px; height:auto; display:block;">
                        </a>
                     </h1>
                     <!-- Tombol sidebar (hamburger) di sebelah kanan logo -->
                     <button id="sidebarToggle" type="button" class="btn btn-link" style="font-size:20px; margin-left:10px;">
                        <i class="fas fa-bars"></i>
                     </button>
                  </div>
                  
                  <!-- BAGIAN KANAN (Search, Notifikasi, Akun) -->
                  <div class="heaer-content-right pull-right" style="margin-left:auto;">
                     <div class="search-field">
                        <form>
                           <div class="form-group">
                              <input type="text" class="form-control" id="search" placeholder="Search Now">
                              <a href="#"><span class="search_btn"><i class="fa fa-search" aria-hidden="true"></i></span></a>
                           </div>
                        </form>
                     </div>
                     <!-- Dropdown notifikasi -->
                     <div class="dropdown">
                        <a class="dropdown-toggle" id="notifyDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <div class="dropdown-item">
                              <i class="far fa-envelope"></i>
                              <span class="notify">3</span>
                           </div>
                        </a>
                        <div class="dropdown-menu notification-menu" aria-labelledby="notifyDropdown">
                           <h4> 3 Notifications</h4>
                           <ul>
                              <li>
                                 <a href="#">
                                    <div class="list-img">
                                       <img src="assets/images/comment.jpg" alt="">
                                    </div>
                                    <div class="notification-content">
                                       <p>You have a notification.</p>
                                       <small>2 hours ago</small>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <div class="list-img">
                                       <img src="assets/images/comment2.jpg" alt="">
                                    </div>
                                    <div class="notification-content">
                                       <p>You have a notification.</p>
                                       <small>2 hours ago</small>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <div class="list-img">
                                       <img src="assets/images/comment3.jpg" alt="">
                                    </div>
                                    <div class="notification-content">
                                       <p>You have a notification.</p>
                                       <small>2 hours ago</small>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                           <a href="#" class="all-button">See all messages</a>
                        </div>
                     </div>
                     <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                           <div class="dropdown-item">
                              <i class="far fa-bell"></i>
                              <span class="notify">3</span>
                           </div>
                        </a>
                        <div class="dropdown-menu notification-menu">
                           <h4> 3 Messages</h4>
                           <ul>
                              <li>
                                 <a href="#">
                                    <div class="list-img">
                                       <img src="assets/images/comment4.jpg" alt="">
                                    </div>
                                    <div class="notification-content">
                                       <p>You have a notification.</p>
                                       <small>2 hours ago</small>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <div class="list-img">
                                       <img src="assets/images/comment5.jpg" alt="">
                                    </div>
                                    <div class="notification-content">
                                       <p>You have a notification.</p>
                                       <small>2 hours ago</small>
                                    </div>
                                 </a>
                              </li>
                              <li>
                                 <a href="#">
                                    <div class="list-img">
                                       <img src="assets/images/comment6.jpg" alt="">
                                    </div>
                                    <div class="notification-content">
                                       <p>You have a notification.</p>
                                       <small>2 hours ago</small>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                           <a href="#" class="all-button">See all messages</a>
                        </div>
                     </div>
                     <!-- Profile Dropdown: Terhubung dengan tabel users -->
                     <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                           <div class="dropdown-item profile-sec">
                           <img src="../<?php echo $user_profile['profile_pic']; ?>" alt="Profile Picture" style="max-width:40px; border-radius:50%;">
                              <span><?php echo $user_profile['username'] ?? 'My Account'; ?></span>
                              <i class="fas fa-caret-down"></i>
                           </div>
                        </a>
                        <div class="dropdown-menu account-menu">
                           <ul>                 
                              <li><a href="../admin/settings.php"><i class="fas fa-cog"></i>Settings</a></li>
                              <li><a href="../admin/profile.php"><i class="fas fa-user-tie"></i>Profile</a></li>
                              <li><a href="../forgot.php"><i class="fas fa-key"></i>Password</a></li>
                              <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
                           </ul>
                        </div>
                     </div>
                     <!-- End Profile Dropdown -->
                  </div>
                  <!-- /heaer-content-right -->
               </div>
               <!-- /flex container -->
            </div>
         </div>
         <!-- /Dashboard -->
      </div>
      <!-- /Container Wrapper -->

      <!-- JavaScript dependencies (jQuery, Popper.js, Bootstrap JS) -->
      <script src="assets/js/jquery-3.2.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      
      <!-- Script untuk toggle sidebar -->
      <script>
         $(document).ready(function(){
            $("#sidebarToggle").on("click", function(){
               $("#sidebar").toggleClass("active");
            });
         });
      </script>
   </body>
</html>
