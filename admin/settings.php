<?php 
include('../admin/partials/topbar.php'); 
include('../admin/partials/sidebar.php'); 
include('../config.php'); // Koneksi database

// Tentukan direktori upload (pastikan memiliki izin tulis)
$upload_dir = "../admin/assets/images/";

// Ambil data pengaturan dari database
$sql = "SELECT * FROM settings LIMIT 1";
$result = $conn->query($sql);

// Jika tidak ada row, buat baris default terlebih dahulu
if ($result->num_rows == 0) {
    $default_sql = "INSERT INTO settings (site_name, site_description, site_logo, site_icon, phone_number, email, store_address, operating_hours, social_facebook, social_twitter, social_instagram, social_linkedin) 
                    VALUES ('', '', '', '', '', '', '', '', '#', '#', '#', '#')";
    if ($conn->query($default_sql)) {
        // Ambil kembali data pengaturan
        $sql = "SELECT * FROM settings LIMIT 1";
        $result = $conn->query($sql);
    } else {
        die("Gagal membuat baris default: " . $conn->error);
    }
}

$settings = $result->fetch_assoc();

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $site_name        = $_POST['site_name'] ?? '';
    $site_description = $_POST['site_description'] ?? '';
    $phone_number     = $_POST['phone_number'] ?? '';
    $email            = $_POST['email'] ?? '';
    $store_address    = $_POST['store_address'] ?? '';
    $operating_hours  = $_POST['operating_hours'] ?? '';

    // Data media sosial
    $social_facebook  = $_POST['social_facebook'] ?? '#';
    $social_twitter   = $_POST['social_twitter'] ?? '#';
    $social_instagram = $_POST['social_instagram'] ?? '#';
    $social_linkedin  = $_POST['social_linkedin'] ?? '#';

    // Handling file upload untuk Logo
    if (isset($_FILES['site_logo_file']) && $_FILES['site_logo_file']['error'] == UPLOAD_ERR_OK) {
        $logo_filename = basename($_FILES['site_logo_file']['name']);
        $target_logo = $upload_dir . $logo_filename;
        if (move_uploaded_file($_FILES['site_logo_file']['tmp_name'], $target_logo)) {
            $site_logo = "../admin/assets/images/" . $logo_filename;
        } else {
            $site_logo = $_POST['old_site_logo'] ?? '';
        }
    } else {
        $site_logo = $_POST['old_site_logo'] ?? '';
    }

    // Handling file upload untuk Icon
    if (isset($_FILES['site_icon_file']) && $_FILES['site_icon_file']['error'] == UPLOAD_ERR_OK) {
        $icon_filename = basename($_FILES['site_icon_file']['name']);
        $target_icon = $upload_dir . $icon_filename;
        if (move_uploaded_file($_FILES['site_icon_file']['tmp_name'], $target_icon)) {
            $site_icon = "../admin/assets/images/" . $icon_filename;
        } else {
            $site_icon = $_POST['old_site_icon'] ?? '';
        }
    } else {
        $site_icon = $_POST['old_site_icon'] ?? '';
    }

    // Update data di database dengan tambahan media sosial
    $sql_update = "UPDATE settings SET 
        site_name = ?, 
        site_description = ?, 
        site_logo = ?, 
        site_icon = ?, 
        phone_number = ?, 
        email = ?, 
        store_address = ?, 
        operating_hours = ?,
        social_facebook = ?,
        social_twitter = ?,
        social_instagram = ?,
        social_linkedin = ?
        WHERE id = 1";
    
    $stmt = $conn->prepare($sql_update);
    if(!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("ssssssssssss", 
        $site_name, $site_description, $site_logo, $site_icon, 
        $phone_number, $email, $store_address, $operating_hours,
        $social_facebook, $social_twitter, $social_instagram, $social_linkedin
    );
    
    if ($stmt->execute()) {
        $message = "Pengaturan berhasil diperbarui!";
        // Refresh data setelah update
        $settings = [
            "site_name"        => $site_name,
            "site_description" => $site_description,
            "site_logo"        => $site_logo,
            "site_icon"        => $site_icon,
            "phone_number"     => $phone_number,
            "email"            => $email,
            "store_address"    => $store_address,
            "operating_hours"  => $operating_hours,
            "social_facebook"  => $social_facebook,
            "social_twitter"   => $social_twitter,
            "social_instagram" => $social_instagram,
            "social_linkedin"  => $social_linkedin
        ];
    } else {
        $message = "Gagal menyimpan pengaturan. Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>


<!-- Mulai konten halaman -->
<div class="db-info-wrap db-settings-wrap">
    <div class="dashboard-box table-opp-color-box">
        <h4>Pengaturan Website</h4>
        <?php if(isset($message)) echo '<p style="color: green;">'.$message.'</p>'; ?>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Website</label>
                <input type="text" name="site_name" class="form-control" value="<?php echo htmlspecialchars($settings['site_name']); ?>">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="site_description" class="form-control"><?php echo htmlspecialchars($settings['site_description']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Logo</label>
                <input type="file" name="site_logo_file" class="form-control">
                <input type="hidden" name="old_site_logo" value="<?php echo htmlspecialchars($settings['site_logo']); ?>">
                <div style="margin-top: 10px;">
                    <img id="logoPreview" src="<?php echo htmlspecialchars($settings['site_logo']); ?>" alt="Preview Logo" style="max-width:150px;">
                </div>
            </div>
            <div class="form-group">
                <label>Icon</label>
                <input type="file" name="site_icon_file" class="form-control">
                <input type="hidden" name="old_site_icon" value="<?php echo htmlspecialchars($settings['site_icon']); ?>">
                <div style="margin-top: 10px;">
                    <img id="iconPreview" src="<?php echo htmlspecialchars($settings['site_icon']); ?>" alt="Preview Icon" style="max-width:50px;">
                </div>
            </div>
            <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="phone_number" class="form-control" value="<?php echo htmlspecialchars($settings['phone_number']); ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($settings['email']); ?>">
            </div>
            <div class="form-group">
                <label>Alamat Toko</label>
                <textarea name="store_address" class="form-control"><?php echo htmlspecialchars($settings['store_address']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Waktu Operasional</label>
                <input type="text" name="operating_hours" class="form-control" value="<?php echo htmlspecialchars($settings['operating_hours']); ?>">
            </div>
            <!-- Input untuk Social Facebook -->
<div class="form-group">
    <label>Facebook</label>
    <input type="text" name="social_facebook" class="form-control" value="<?php echo htmlspecialchars($settings['social_facebook']); ?>">
</div>
<!-- Input untuk Social Twitter -->
<div class="form-group">
    <label>Twitter</label>
    <input type="text" name="social_twitter" class="form-control" value="<?php echo htmlspecialchars($settings['social_twitter']); ?>">
</div>
<!-- Input untuk Social Instagram -->
<div class="form-group">
    <label>Instagram</label>
    <input type="text" name="social_instagram" class="form-control" value="<?php echo htmlspecialchars($settings['social_instagram']); ?>">
</div>
<!-- Input untuk Social LinkedIn -->
<div class="form-group">
    <label>LinkedIn</label>
    <input type="text" name="social_linkedin" class="form-control" value="<?php echo htmlspecialchars($settings['social_linkedin']); ?>">
</div>

            <button type="submit" class="btn btn-primary">Simpan Pengaturan</button>
        </form>
    </div>
</div>

<!-- Footer / Copyrights -->
<?php include('../admin/partials/footers.php'); ?>
