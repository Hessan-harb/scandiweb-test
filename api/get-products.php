<?php
require_once '../db.php';
require_once 'headers.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM products ORDER BY id ASC";
$stmt = $db->prepare($query);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($products);
?>
