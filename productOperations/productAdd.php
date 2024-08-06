<?php
require_once "../productOOP/Productfamily.php";

try {
    if (!isset($_POST["name"], $_POST["price"], $_POST["sku"], $_POST["producttype"])) {
        throw new Exception("Missing required data");
    }

    $name = $_POST["name"];
    $price = $_POST["price"];
    $sku = $_POST["sku"];
    $type = $_POST["producttype"];
    $value1 = $_POST["size"] ?? $_POST["weight"] ?? null;
    $value2 = $_POST["height"] ?? null;
    $value3 = $_POST["width"] ?? null;
    $value4 = $_POST["length"] ?? null;

    $pdo = new PDO('mysql:host=localhost;port=3307;dbname=scandiproductdb', 'scandiadmin', '123');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('SELECT sku FROM product WHERE sku = :sku');
    $stmt->execute(['sku' => $sku]);

    if ($stmt->fetch()) {
        header("location: ../productAddPage.php?skuUsed=1");
        return;
    }

    $product = Productfamily::create($type, $sku, $name, $price, $value1, $value2, $value3, $value4);
    $product->save();

    header("location: ../index.php");

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
} 
?>
