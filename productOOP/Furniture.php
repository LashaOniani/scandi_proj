<?php
    require_once "Product.php";

    class Furniture extends Product {
        public $height;
        public $width;
        public $length;
        public $specs;
        public $type = "Furniture";
        public $price;
        public function __construct($name, $price, $sku, $height, $width, $length) {
            parent::__construct($name, $price, $sku);
            $this->height = $height;
            $this->width = $width;
            $this->length = $length;
            $this->specs = $height." x ".$width." x ".$length;
            $this->price = $price." $";
        }

        public function intro(){
            echo "the furniture size is: ".$this->height." x ".$this->width." x ".$this->length;
        }

        public function save(){
            $pdo = new PDO('mysql:host=localhost;port=3307;dbname=scandiproductdb', 'scandiadmin', '123');
            $stmt = $pdo->prepare("INSERT INTO product (sku, name, type, specs, price) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$this->sku, $this->name, $this->type, $this->specs, $this->price]);
            header("location: ../index.php");
        }
    }
?>