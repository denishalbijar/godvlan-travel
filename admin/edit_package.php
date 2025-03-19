<?php
include('../config.php');

if(!isset($_GET['id'])){
    die("Package ID not specified.");
}
$id = intval($_GET['id']);

// Ambil data paket
$sql = "SELECT * FROM packages WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows == 0){
    die("Package not found.");
}
$package = $result->fetch_assoc();
$stmt->close();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Ambil data dari form
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $keywords = $_POST['keywords'] ?? '';
    $group_size = isset($_POST['group_size']) ? intval($_POST['group_size']) : null;
    $days = isset($_POST['days']) ? intval($_POST['days']) : null;
    $nights = isset($_POST['nights']) ? intval($_POST['nights']) : null;
    $sale_price = isset($_POST['sale_price']) ? floatval($_POST['sale_price']) : 0;
    $regular_price = isset($_POST['regular_price']) ? floatval($_POST['regular_price']) : 0;
    $discount = isset($_POST['discount']) ? floatval($_POST['discount']) : 0;
    $address = $_POST['address'] ?? '';
    $status = $_POST['status'] ?? 'draft';
    $visibility = $_POST['visibility'] ?? 'public';
    $popular = isset($_POST['popular']) ? 1 : 0;
    $itinerary = $_POST['itinerary'] ?? '';
    
    // Update query
    $sql_update = "UPDATE packages SET title=?, description=?, keywords=?, group_size=?, days=?, nights=?, sale_price=?, regular_price=?, discount=?, address=?, status=?, visibility=?, popular=?, additional_notes=? WHERE id=?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("sssiiisdddssisi", $title, $description, $keywords, $group_size, $days, $nights, $sale_price, $regular_price, $discount, $address, $status, $visibility, $popular, $itinerary, $id);
    if($stmt->execute()){
        header("Location: db-package-active.php");
        exit;
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Package</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
  <?php include('../admin/partials/topbar.php'); ?>
  <?php include('../admin/partials/sidebar.php'); ?>

  <div class="container" style="max-width:600px; margin:20px auto;">
    <h2>Edit Package</h2>
    <form action="" method="post">
      <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($package['title']); ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" class="form-control" rows="4" required><?php echo htmlspecialchars($package['description']); ?></textarea>
      </div>
      <div class="form-group">
        <label for="keywords">Keywords:</label>
        <input type="text" id="keywords" name="keywords" value="<?php echo htmlspecialchars($package['keywords']); ?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="group_size">Group Size:</label>
        <input type="number" id="group_size" name="group_size" value="<?php echo htmlspecialchars($package['group_size']); ?>" class="form-control">
      </div>
      <div class="form-group">
        <label>Trip Duration:</label>
        <div class="row">
          <div class="col">
            <input type="number" name="days" value="<?php echo htmlspecialchars($package['days']); ?>" class="form-control" placeholder="Days">
          </div>
          <div class="col">
            <input type="number" name="nights" value="<?php echo htmlspecialchars($package['nights']); ?>" class="form-control" placeholder="Nights">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="sale_price">Sale Price:</label>
        <input type="text" id="sale_price" name="sale_price" value="<?php echo htmlspecialchars($package['sale_price']); ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="regular_price">Regular Price:</label>
        <input type="text" id="regular_price" name="regular_price" value="<?php echo htmlspecialchars($package['regular_price']); ?>" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="discount">Discount (%):</label>
        <input type="number" id="discount" name="discount" value="<?php echo htmlspecialchars($package['discount']); ?>" class="form-control">
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <textarea id="address" name="address" class="form-control" rows="3"><?php echo htmlspecialchars($package['address']); ?></textarea>
      </div>
      <div class="form-group">
        <label for="status">Status:</label>
        <select id="status" name="status" class="form-control">
          <option value="draft" <?php if($package['status'] == 'draft') echo 'selected'; ?>>Draft</option>
          <option value="published" <?php if($package['status'] == 'published') echo 'selected'; ?>>Published</option>
          <option value="expired" <?php if($package['status'] == 'expired') echo 'selected'; ?>>Expired</option>
        </select>
      </div>
      <div class="form-group">
        <label for="visibility">Visibility:</label>
        <select id="visibility" name="visibility" class="form-control">
          <option value="public" <?php if($package['visibility'] == 'public') echo 'selected'; ?>>Public</option>
          <option value="private" <?php if($package['visibility'] == 'private') echo 'selected'; ?>>Private</option>
        </select>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" id="popularCheck" name="popular" class="form-check-input" <?php if($package['popular'] == 1) echo 'checked'; ?>>
        <label for="popularCheck" class="form-check-label">Mark as Popular</label>
      </div>
      <div class="form-group">
        <label for="itinerary">Itinerary (optional):</label>
        <textarea id="itinerary" name="itinerary" class="form-control" rows="3"><?php echo htmlspecialchars($package['additional_notes']); ?></textarea>
      </div>
      <input type="submit" value="Update Package" class="btn btn-primary btn-block">
    </form>
  </div>

  <?php include('../admin/partials/footers.php'); ?>
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
