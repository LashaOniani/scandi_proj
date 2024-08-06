<?php
    require_once "Book.php";
    require_once "Dvd.php";
    require_once "Furniture.php";

    class ProductFamily {
        public static function create($type, $sku, $name, $price, $value1 = null, $value2 = null, $value3 = null, $value4 = null){
            switch ($type) {
                case "DVD":
                    return new Dvd($name, $price, $sku, $value1);
                case "Book":
                    return new Book($name, $price, $sku, $value1);
                case "Furniture":
                    return new Furniture($name, $price, $sku, $value2, $value3, $value4);
                default:
                    throw new Exception("there is no such a product type :/");
            }
        }
    }

?>