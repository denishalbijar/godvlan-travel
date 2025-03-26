<?php
include 'config.php'; // Pastikan file config.php sudah terhubung ke database "travel"

// Ambil data pengaturan dari database
$sql = "SELECT * FROM settings LIMIT 1";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $settings = $result->fetch_assoc();
} else {
    // Nilai default jika tidak ada data pengaturan
    $settings = [
        "site_logo"        => "assets/images/travele-logo.png",
        "site_name"        => "Travele",
        "phone_number"     => "+62 812-3456-7890",
        "email"            => "godvlan@gmail.com",
        "store_address"    => "20112 Medan Petisah, Sumatera Utara",
        "site_description" => "Godvlan Travel menghadirkan perjalanan yang tak terlupakan dengan kombinasi layanan berkualitas tinggi, harga bersahabat, dan destinasi menarik yang dirancang khusus untuk memenuhi kebutuhan Anda."
    ];
}

// Jika perlu sesuaikan relative path (sesuai struktur folder login.php)
// Contoh: jika di login.php kamu perlu menghilangkan "../admin/":
$settings['site_logo'] = str_replace('../admin/', 'admin/', $settings['site_logo']);

// Set variabel untuk memudahkan penggunaan
$site_logo = !empty($settings['site_logo']) ? $settings['site_logo'] : "assets/images/travele-logo.png";
$site_name = !empty($settings['site_name']) ? $settings['site_name'] : "Travele";

?>


<footer id="colophon" class="site-footer footer-primary">
            <div class="top-footer">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-3 col-md-6">
                        <aside class="widget widget_text">
                           <h3 class="widget-title">
                              About Travel
                           </h3>
                           <div class="textwidget widget-text">
                              <p><?php echo htmlspecialchars($settings['site_description']); ?></p>
                           </div>
                           <div class="award-img">
                              <a href="#"><img src="assets/images/logo6.png" alt=""></a>
                              <a href="#"><img src="assets/images/logo2.png" alt=""></a>
                           </div>
                        </aside>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <aside class="widget widget_text">
                           <h3 class="widget-title">CONTACT INFORMATION</h3>
                           <div class="textwidget widget-text">
                           Info lebih lanjut hubungi nomor dan email dibawah ini.
                              <ul>
                                 <li>
                                    <a href="#"><i class="fas fa-phone-alt"></i> <?php echo htmlspecialchars($settings['phone_number']); ?></a>
                                 </li>
                                 <li>
                                    <a href="mailto:<?php echo htmlspecialchars($settings['email']); ?>"><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($settings['email']); ?></a>
                                 </li>
                                 <li>
                                    <i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($settings['store_address']); ?>
                                 </li>
                              </ul>
                           </div>
                        </aside>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <aside class="widget widget_recent_post">
                           <h3 class="widget-title">Latest Post</h3>
                           <ul>
                              <li>
                                 <h5>
                                    <a href="#">Life is a beautiful journey not a destination</a>
                                 </h5>
                                 <div class="entry-meta">
                                    <span class="post-on">
                                       <a href="#">August 17, 2021</a>
                                    </span>
                                    <span class="comments-link">
                                       <a href="#">No Comments</a>
                                    </span>
                                 </div>
                              </li>
                              <li>
                                 <h5>
                                    <a href="#">Take only memories, leave only footprints</a>
                                 </h5>
                                 <div class="entry-meta">
                                    <span class="post-on">
                                       <a href="#">August 17, 2021</a>
                                    </span>
                                    <span class="comments-link">
                                       <a href="#">No Comments</a>
                                    </span>
                                 </div>
                              </li>
                           </ul>
                        </aside>
                     </div>
                     <div class="col-lg-3 col-md-6">
                        <aside class="widget widget_newslatter">
                           <h3 class="widget-title">SUBSCRIBE US</h3>
                           <div class="widget-text">
                              Berlangganan untuk mendapat info terbaru.
                           </div>
                           <form class="newslatter-form">
                              <input type="email" name="s" placeholder="Your Email..">
                              <input type="submit" name="s" value="SUBSCRIBE NOW">
                           </form>
                        </aside>
                     </div>
                  </div>
               </div>
            </div>
            <div class="buttom-footer">
               <div class="container">
                  <div class="row align-items-center">
                     <div class="col-md-5">
                        <div class="footer-menu">
                           <ul>
                              <li>
                                 <a href="#">Privacy Policy</a>
                              </li>
                              <li>
                                 <a href="#">Term & Condition</a>
                              </li>
                              <li>
                                 <a href="#">FAQ</a>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="col-md-2 text-center">
                        <div class="footer-logo">
                           <a href="#"><img src="<?php echo htmlspecialchars($site_logo); ?>" alt="<?php echo htmlspecialchars($site_name); ?>" style="width:180px; display:block; margin:auto;"></a>
                        </div>
                     </div>
                     <div class="col-md-5">
                        <div class="copy-right text-right">Copyright © 2021 <?php echo htmlspecialchars($site_name); ?>. All rights reserveds</div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>