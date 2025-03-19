<?php
include('../config.php');

if(!isset($_GET['id'])){
    die("Package ID not specified.");
}
$id = intval($_GET['id']);

$sql = "DELETE FROM packages WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
if($stmt->execute()){
    header("Location: ../admin/db-package-active.php");
    exit;
} else {
    echo "Error deleting record: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
