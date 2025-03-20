<?php
// File: ../admin/partials/footers.php
include('../config.php'); // Koneksi ke database

// Ambil data dari tabel settings
$sql = "SELECT site_description, email, phone_number, store_address, operating_hours FROM settings LIMIT 1";
$result = $conn->query($sql);

// Default jika data tidak ditemukan
$footerSettings = [
    'site_description' => 'Default website description.',
    'email'            => 'info@example.com',
    'phone_number'     => '+62 812-3456-7890',
    'store_address'    => 'Jl. Contoh No. 123, Kota Contoh, Indonesia',
    'operating_hours'  => 'Senin - Jumat: 08.00 - 17.00 WIB'
];

if ($result && $result->num_rows > 0) {
    $footerSettings = $result->fetch_assoc();
}
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
    .footer {
        background-color: #f8f9fa;
        padding: 20px 0;
        border-top: 1px solid #e7e7e7;
    }
    .footer .container {
        max-width: 720px;
        margin: 0 auto;
    }
    .footer h5 {
        font-size: 18px;
        margin-bottom: 15px;
    }
    .footer p, .footer ul, .footer li {
        font-size: 14px;
        color: #6c757d;
    }
    .footer ul {
        list-style: none;
        padding: 0;
    }
    .footer ul li {
        margin-bottom: 10px;
    }
    .footer ul li a {
        color: #007bff;
        text-decoration: none;
    }
    .footer ul li a:hover {
        text-decoration: underline;
    }
    .footer .text-center {
        margin-top: 20px;
    }
    </style>
</head>
<body>
<footer class="footer" id="footer">
    <div class="container">
        <div class="row">
            <!-- Kolom 1 -->
            <div class="col-md-4">
                <h5>About Us</h5>
                <p><?php echo htmlspecialchars($footerSettings['site_description']); ?></p>
            </div>
            <!-- Kolom 2 -->
            <div class="col-md-4">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="/about">About Us</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/privacy">Privacy Policy</a></li>
                </ul>
            </div>
            <!-- Kolom 3 -->
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <p>Email: <?php echo htmlspecialchars($footerSettings['email']); ?></p>
                <p>Phone: <?php echo htmlspecialchars($footerSettings['phone_number']); ?></p>
                <p>Address: <?php echo htmlspecialchars($footerSettings['store_address']); ?></p>
                <p><strong>Operating Hours:</strong> <?php echo htmlspecialchars($footerSettings['operating_hours']); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy; <?php echo date('Y'); ?> Godvlan Travel. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/canvasjs.min.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/counterup.min.js"></script>
<script src="assets/js/jquery.slicknav.js"></script>
<script src="assets/js/dashboard-custom.js"></script>
</body>
</html>
