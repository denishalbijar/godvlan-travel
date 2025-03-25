<?php 
include('../admin/partials/topbar.php'); 
include('../admin/partials/sidebar.php'); 
include('../config.php'); // Koneksi database

// Ambil ID user dari parameter URL
$user_id = $_GET['id'] ?? 0;

// Ambil data user dari database
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "<script>alert('User tidak ditemukan!'); window.location='user.php';</script>";
    exit;
}

// Proses update data user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $birth_date = !empty($_POST['birth_date']) ? $_POST['birth_date'] : null;
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $description = substr($_POST['description'], 0, 250); // Batasi 250 karakter

    // Proses upload gambar
    if (!empty($_FILES['profile_image']['name'])) {
        $target_dir = "../uploads/profile/"; // Perbaiki path folder
        $image_name = basename($_FILES["profile_image"]["name"]);
        $new_image_name = time() . "_" . $image_name; // Hindari nama file duplikat
        $image_path = $target_dir . $new_image_name;
    
        if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $image_path)) {
            $profile_image = "uploads/profile/" . $new_image_name; // Simpan path tanpa '../'
        } else {
            echo "<script>alert('Gagal mengupload gambar!');</script>";
            $profile_image = $user['profile_image']; // Gunakan gambar lama jika gagal upload
        }
    } else {
        $profile_image = $user['profile_image'];
    }    

    // Persiapan update query
    $update_password = "";
    $params = [$fullname, $username, $email, $birth_date, $phone, 
               $country, $city, $address, $profile_image, $description];

    // Proses ganti password
    if (!empty($_POST['old_password']) && !empty($_POST['new_password'])) {
        $old_password = $_POST['old_password'];
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        
        // Verifikasi password lama
        if (password_verify($old_password, $user['password'])) {
            $update_password = ", password = ?";
            $params[] = $new_password;
        } else {
            echo "<script>alert('Password lama salah!');</script>";
        }
    }

    $params[] = $user_id; // Tambahkan ID di akhir untuk klausa WHERE

    // Buat query update
    $sql = "UPDATE users SET fullname = ?, username = ?, email = ?, birth_date = ?, phone_number = ?, 
            country = ?, city = ?, address = ?, profile_image = ?, description = ? $update_password 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat("s", count($params) - 1) . "i", ...$params);

    if ($stmt->execute()) {
        echo "<script>alert('User berhasil diperbarui!'); window.location='user.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui user!');</script>";
    }

    $stmt->close();
}
?>

            <div class="db-info-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dashboard-box user-form-wrap">
                            <h4>User Edit Details</h4>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label>Fullname</label>
                <input name="fullname" class="form-control" type="text" value="<?= $user['fullname'] ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Username</label>
                <input name="username" class="form-control" type="text" value="<?= $user['username'] ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Email</label>
                <input name="email" class="form-control" type="email" value="<?= $user['email'] ?>">
            </div>  
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Date of Birth</label>
                <input name="birth_date" class="form-control" type="date" value="<?= $user['birth_date'] ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Phone</label>
                <input name="phone" class="form-control" type="text" value="<?= $user['phone_number'] ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Country</label>
                <input name="country" class="form-control" type="text" value="<?= $user['country'] ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>City</label>
                <input name="city" class="form-control" type="text" value="<?= $user['city'] ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Address</label>
                <input name="address" class="form-control" type="text" value="<?= $user['address'] ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>Old Password</label>
                <input name="old_password" class="form-control" type="password">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label>New Password</label>
                <input name="new_password" class="form-control" type="password">
            </div>
        </div>
        <div class="col-12">
            <h4>Upload Profile Photo</h4>
            <div class="form-group">
                <input type="file" name="profile_image">
            </div>
        </div>
        <div class="col-12">
            <h4>Describe Yourself</h4>
            <div class="form-group">
                <textarea class="form-control" name="description" maxlength="250"><?= $user['description'] ?></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="button-primary">Save Changes</button>
</form>

                        </div>
                    </div>  
                </div>
            </div>
            <!-- Content / End -->
            <!-- Copyrights -->
            <?php include('../admin/partials/footers.php'); ?>
        </div>
        <!-- Dashboard / End -->
    </div>
    <!-- end Container Wrapper -->
    <!-- *Scripts* -->
    
</body>
</html>