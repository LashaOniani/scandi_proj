<?php

class DeleteProduct {
    public $productSku;

    public function __construct($value) {
        $this->productSku = $value;
    }

    public function deleteProduct() {
        try {
            $pdo = new PDO("mysql:host=localhost;port=3307;dbname=scandiproductdb", "scandiadmin", "123");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare("DELETE FROM product WHERE sku = :sku");
            $stmt->bindParam(':sku', $this->productSku);
            $stmt->execute();
            header('location: ../index.php');
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
