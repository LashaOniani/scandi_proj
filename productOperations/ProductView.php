<?php
    class ProductView{
        public $array;
        public function __construct($result){
            $this->array = $result;
        }
        public function render(){
            foreach ($this->array as $key=>$value) {;
                
               $sku = $value["sku"];
               $name = $value["name"];
               $price = $value["price"];
               $dimensions = $value["specs"];
               $type = $value["type"];
               $specs = ($type === "DVD" ? "Size" : ($type === "Book" ? "Weight" : ($type === "Furniture" ? "Dimension"  : null))) ;

               echo "<div class='eachproduct'>
                        <span>
                            <input class='delete-checkbox' name='producttodelsku[]' value='$sku' type='checkbox'>
                        </span>
                        <div>
                            <h3>$sku</h3>
                            <p>$name</p>
                            <p>$price $</p>
                            <p>$specs: $dimensions</p>
                        </div>
                   </div>";
            }
        }
    }

    // $fakeData = [
    //     ["sku" => 1,
    //     "name" => "wigni",
    //     "price"=> 200,
    //     "type" => "DVD",
    //     "specs"=>2000,
    // ],
    //     ["sku" => 2,
    //     "name" => "lasha",
    //     "price"=> 777,
    //     "type"=> "Book",
    //     "specs"=>2000,
    //     ]
    // ];

    // $product = new ProductView($fakeData);
    // $product->render();
?>