<?php 
    require_once "Product.php";

    class Book extends Product {
        
        public $weight;
        public $type = "Book";
        public $price;
        public function __construct($name, $price, $sku, $weight){
            parent::__construct($name, $price, $sku);
            $this->weight = $weight." Kg";
            $this->price = $price." $";
        }

        public function intro(){
            echo "the product name is: ".$this->name." and it's price is: ".$this->price." and it's code is: ".$this->sku." and weight is: ".$this->weight;
        }

        public function save(){
            $pdo = new PDO('mysql:host=localhost;port=3307;dbname=scandiproductdb', 'scandiadmin', '123');
            $stmt = $pdo->prepare("INSERT INTO product (sku, name, type, specs, price) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$this->sku, $this->name, $this->type, $this->weight, $this->price]);
            header("location: ../index.php");
        }
    }
?>