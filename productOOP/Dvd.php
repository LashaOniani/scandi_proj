<?php
    require_once "Product.php";

    class Dvd extends Product{
        public $size;
        public $type = "DVD";
        public $price;
        public function __construct($name, $price, $sku, $size){
            parent::__construct($name, $price, $sku);
            $this->size = $size." MB";
            $this->price = $price." $";
        }

        // public function intro(){
        //     echo "size: ".$this->size." Mb";
        // }

        public function save(){
            $pdo = new PDO('mysql:host=localhost;port=3307;dbname=scandiproductdb', 'scandiadmin', '123');
            $stmt = $pdo->prepare("INSERT INTO product (sku, name, type, specs, price) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$this->sku, $this->name, $this->type, $this->size, $this->price]);
            header("location: ../index.php");
        }
    }
?>