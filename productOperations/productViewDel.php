<?php
    require_once "../productOOP/DeleteProduct.php";

    if(isset($_POST['producttodelsku'])){
        foreach($_POST['producttodelsku'] as $key => $value ) {
            $productToDel = new DeleteProduct($value);
            $productToDel->deleteProduct();
        }
    }else{
        header('location: ../index.php');
    }
?>