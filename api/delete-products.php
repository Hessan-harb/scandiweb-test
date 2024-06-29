<?php
require_once '../db.php';
require_once 'headers.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['delete_ids'])) {
    $ids = $data['delete_ids'];
    
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    $stmt = $db->prepare("DELETE FROM products WHERE id IN ($placeholders)");
    $stmt->execute($ids);
    
    // Check the number of affected rows
    if ($stmt->rowCount() > 0) {
        echo json_encode(["message" => "Products deleted successfully"]);
    } else {
        echo json_encode(["message" => "No products found with the provided IDs"]);
    }
} else {
    echo json_encode(["message" => "No IDs provided"]);
}
?>
