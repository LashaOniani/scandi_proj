<?php
    if($_GET){
        if(isset($_GET["skuUsed"]) && $_GET["skuUsed"]){
            echo '<script>alert("SKU is already used try new one")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheet.css">
    <link rel="stylesheet" href="./productAdd.css">
    <title>Add Products</title>
</head>
<body>
    <form id="product_form" action="./productOperations/productAdd.php" method="post">
        <div class="pageview">
            <h2>Product List</h2>
            <div>
                <button class="btn_style_1">Save</button>
                <a class="btn_style_1" href="./index.php">Cancel</a>
            </div>
        </div>
        <div class="formview">
            <div class="formlabels" id="formlabels">
                <label for="sku">sku</label>
                <label for="name">product</label>
                <label for="price">price</label>
                <label for="productType">Type Switcher</label>
                <div class="formlabels" id="formlabels_add"></div>
            </div>
            <div class="forminputs" id="forminputs">
                <input id="sku" name="sku" type="text" required>
                <input id="name" name="name" type="text" required>
                <input id="price" name="price" type="number" required>
                <select id="productType" name="producttype" title="producttype" required>
                    <option>product type</option>
                    <option value="DVD" name="DVD">DVD</option>
                    <option value="Book" name="Book">Book</option>
                    <option value="Furniture" name="Furniture">Furniture</option>
                </select>
                <div class="forminputs" id="forminputs_add"></div>
                <div id="messageform"></div>
            </div>
        </div>
    </form>
    <script src="productAdd.js" type="module"></script>
</body>
</html>