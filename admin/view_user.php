<?php
session_start();
include('../config.php');
include('../admin/partials/topbar.php');
include('../admin/partials/sidebar.php');

// Pastikan hanya admin yang bisa mengakses halaman ini
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Akses ditolak!'); window.location='../login.php';</script>";
    exit;
}

// Ambil ID user dari parameter URL
$user_id = $_GET['id'] ?? 0;
if (!$user_id) {
    echo "<script>alert('ID user tidak valid!'); window.location='user.php';</script>";
    exit;
}

// Ambil data user dari database
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    echo "<script>alert('User tidak ditemukan!'); window.location='user.php';</script>";
    exit;
}

// Jika path di database misalnya: uploads/profile/namagambar.jpg, kita tambahkan ../ agar file bisa diakses dari folder admin
$profileImage = !empty($user['profile_image']) ? '../' . $user['profile_image'] : '../assets/images/default-profile.png';
?>

<div class="db-info-wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-box">
                <h4>User Details</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Profile Image</th>
                            <td><img src="<?php echo htmlspecialchars($profileImage); ?>" alt="Profile Image" width="100"></td>
                        </tr>
                        <tr>
                            <th>Full Name</th>
                            <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                        </tr>
                        <tr>
                            <th>Birth Date</th>
                            <td><?php echo htmlspecialchars($user['birth_date']); ?></td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td><?php echo htmlspecialchars($user['phone_number']); ?></td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td><?php echo htmlspecialchars($user['country']); ?></td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td><?php echo htmlspecialchars($user['city']); ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo htmlspecialchars($user['address']); ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td><?php echo htmlspecialchars($user['description']); ?></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td><?php echo htmlspecialchars($user['role']); ?></td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="text-center" style="margin-top: 20px;">
                    <a href="user_edit.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">Edit User</a>
                    <a href="user.php" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>  
    </div>
</div>

<?php include('../admin/partials/footers.php'); ?>
