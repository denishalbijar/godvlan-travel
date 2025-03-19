<?php
include('../config.php');

if(isset($_POST['id']) && isset($_POST['status'])){
    $id = intval($_POST['id']);
    $statusInput = $_POST['status'];
    // Mapping berdasarkan pilihan dropdown
    if($statusInput === 'Active'){
        $newStatus = 'published';
    } elseif($statusInput === 'Pending'){
        $newStatus = 'pending';
    } elseif($statusInput === 'Expired'){
        $newStatus = 'expired';
    } else {
        $newStatus = $statusInput;
    }
    
    $sql = "UPDATE packages SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    if(!$stmt){
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("si", $newStatus, $id);
    if($stmt->execute()){
        header("Location: ../admin/db-package-active.php");
        exit;
    } else {
        echo "Error updating status: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "Invalid request.";
}
$conn->close();
?>
