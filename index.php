<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./productView.css">
    <link rel="stylesheet" href="./stylesheet.css">
    <title>Product List - Home Page</title>
</head>
<body>
    <form action="./productOperations/productViewDel.php" name="product[]" method="post">
        <div class="pageview">
            <h2>Product List</h2>
            <div>
                <a href="./productAddPage.php" class="btn_style_1">ADD</a>    
                <button class="btn_style_1">MASS DELETE</button>
            </div>
        </div>
<?php
require_once "./productOperations/ProductView.php";

$pdo = new PDO('mysql:host=localhost;port=3307;dbname=scandiproductdb', 'scandiadmin', '123');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("SELECT * FROM product");
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// print_r($result);
if($result){
    $product = new ProductView($result);
    $product->render();
}else{
    echo "<h1>there are no product</h1>";
}
?>
</form>
</body>
</html>