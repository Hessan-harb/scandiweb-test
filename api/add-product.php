<?php
require_once '../db.php';
require_once '../Product.php';
require_once 'headers.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"), true);

$sku = $data['sku'];
$name = $data['name'];
$price = $data['price'];
$type = $data['type'];

switch ($type) {
    case 'DVD':
        $size_mb = $data['size'];
        $product = new DVD($db, $sku, $name, $price, $type, $size_mb);
        break;
    case 'Book':
        $weight_kg = $data['weight'];
        $product = new Book($db, $sku, $name, $price, $type, $weight_kg);
        break;
    case 'Furniture':
        $height = $data['height'];
        $width = $data['width'];
        $length = $data['length'];
        $product = new Furniture($db, $sku, $name, $price, $type, $height, $width, $length);
        break;
    default:
        echo json_encode(["message" => "Invalid product type"]);
        exit();
}

$product->save();

echo json_encode($product);
?>
