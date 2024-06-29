<?php


abstract class Product {
    protected $pdo;
    public $sku;
    public $name;
    public $price;
    public $type;

    public function __construct($pdo, $sku, $name, $price, $type) {
        $this->pdo = $pdo;
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->type = $type;
    }

    abstract public function save();
}

class DVD extends Product {
    public $size_mb;

    public function __construct($pdo, $sku, $name, $price, $type, $size_mb) {
        parent::__construct($pdo, $sku, $name, $price, $type);
        $this->size_mb = $size_mb;
    }

    public function save() {
        $stmt = $this->pdo->prepare("INSERT INTO products (sku, name, price, type, size_mb) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->sku, $this->name, $this->price, $this->type, $this->size_mb]);
    }
}

class Book extends Product {
    public $weight_kg;

    public function __construct($pdo, $sku, $name, $price, $type, $weight_kg) {
        parent::__construct($pdo, $sku, $name, $price, $type);
        $this->weight_kg = $weight_kg;
    }

    public function save() {
        $stmt = $this->pdo->prepare("INSERT INTO products (sku, name, price, type, weight_kg) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->sku, $this->name, $this->price, $this->type, $this->weight_kg]);
    }
}

class Furniture extends Product {
    public $height;
    public $width;
    public $length;

    public function __construct($pdo, $sku, $name, $price, $type, $height, $width, $length) {
        parent::__construct($pdo, $sku, $name, $price, $type);
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function save() {
        $stmt = $this->pdo->prepare("INSERT INTO products (sku, name, price, type, height, width, length) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$this->sku, $this->name, $this->price, $this->type, $this->height, $this->width, $this->length]);
    }
}
?>
