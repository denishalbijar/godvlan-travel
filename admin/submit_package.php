<?php
// Sertakan file konfigurasi yang sudah Anda buat (config.php)
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form dengan validasi sederhana
    $title             = $_POST['title'] ?? '';
    $description       = $_POST['description'] ?? '';
    $keywords          = $_POST['keywords'] ?? '';
    $group_size        = isset($_POST['group_size']) ? intval($_POST['group_size']) : null;
    $days              = isset($_POST['days']) ? intval($_POST['days']) : null;
    $nights            = isset($_POST['nights']) ? intval($_POST['nights']) : null;
    $category          = $_POST['category'] ?? '';
    $sale_price        = isset($_POST['sale_price']) ? floatval($_POST['sale_price']) : 0;
    $regular_price     = isset($_POST['regular_price']) ? floatval($_POST['regular_price']) : 0;
    $discount          = isset($_POST['discount']) ? floatval($_POST['discount']) : 0;
    $api_key           = $_POST['api_key'] ?? '';
    $map_type          = $_POST['map_type'] ?? '';
    $coordinates       = $_POST['coordinates'] ?? '';
    $address           = $_POST['address'] ?? '';
    $status            = $_POST['status'] ?? 'draft';
    $visibility        = $_POST['visibility'] ?? 'public';
    $popular           = isset($_POST['popular']) ? 1 : 0;
    $additional_notes  = $_POST['additional_notes'] ?? '';
    
    // Proses upload file untuk gallery_images (contoh hanya ambil file pertama)
    $gallery_image = '';
    if(isset($_FILES['gallery_images']) && $_FILES['gallery_images']['error'][0] == 0){
        $target_dir = "uploads/";
        if(!is_dir($target_dir)){
            mkdir($target_dir, 0777, true);
        }
        $gallery_image = $target_dir . basename($_FILES['gallery_images']['name'][0]);
        move_uploaded_file($_FILES['gallery_images']['tmp_name'][0], $gallery_image);
    }
    
    // Contoh query INSERT untuk tabel packages
    $sql = "INSERT INTO packages 
            (title, description, keywords, group_size, days, nights, category, sale_price, regular_price, discount, api_key, map_type, coordinates, address, status, visibility, popular, additional_notes, gallery_image)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Siapkan prepared statement
    $stmt = $conn->prepare($sql);
    if(!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    /* 
      Binding Parameter:
      Urutan kolom: 
      1. title             (s)
      2. description       (s)
      3. keywords          (s)
      4. group_size        (i)
      5. days              (i)
      6. nights            (i)
      7. category          (s)
      8. sale_price        (d)
      9. regular_price     (d)
      10. discount         (d)
      11. api_key          (s)
      12. map_type         (s)
      13. coordinates      (s)
      14. address          (s)
      15. status           (s)
      16. visibility       (s)
      17. popular          (i)
      18. additional_notes (s)
      19. gallery_image    (s)
      
      Jadi, string tipe: "sssiiisdddssssssiss"
    */
    
    $stmt->bind_param(
        "sssiiisdddssssssiss", 
        $title,
        $description,
        $keywords,
        $group_size,
        $days,
        $nights,
        $category,
        $sale_price,
        $regular_price,
        $discount,
        $api_key,
        $map_type,
        $coordinates,
        $address,
        $status,
        $visibility,
        $popular,
        $additional_notes,
        $gallery_image
    );
    
    // Eksekusi statement
    if ($stmt->execute()) {
        // Jika berhasil, arahkan ke halaman dashboard aktif (misal: db-package-active.php)
        header("Location: db-package-active.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>
