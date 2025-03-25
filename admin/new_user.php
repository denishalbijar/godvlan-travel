<?php 
include('../admin/partials/topbar.php'); 
include('../admin/partials/sidebar.php'); 
include('../config.php'); // Pastikan ada koneksi database

if (isset($_POST['Submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password

    // Query insert data ke database
    $sql = "INSERT INTO users (fullname, username, phone_number, city, country, email, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $fullname, $username, $phone, $city, $country, $email, $password);

    if ($stmt->execute()) {
        echo "<script>alert('User berhasil ditambahkan!'); window.location='user.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan user!');</script>";
    }

    $stmt->close();
}
?>
            <div class="db-info-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dashboard-box">
                            <h4>Add New User</h4>
                            <p>Veniam. Aenean beatae nonummy tenetur beatae? Molestias similique! Semper? Laudantium.</p>
                            <form class="form-horizontal" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Fullname</label>
                                            <input name="fullname" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input name="username" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input name="phone" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>City</label>
                                            <input name="city" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <input name="country" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input name="confirm_password" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" class="form-control" type="email">
                                        </div>  
                                    </div>
                                </div>
                                <br>
                                <input type="submit" name="Submit">
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