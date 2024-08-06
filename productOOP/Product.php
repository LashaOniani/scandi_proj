<?php
    abstract class Product{

        public $name;
        public $price;
        public $sku;
        
        public function __construct($name, $price, $sku){
            $this->name = $name;
            $this->price = $price;
            $this->sku = $sku;
        }

        abstract public function save();
    }
?>