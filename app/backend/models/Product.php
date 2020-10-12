<?php
    class Product {
        public $id;
        public $code;
        public $name;
        public $category;
        public $description;
        public $qty;
        public $price;
        public $subsidiaries;

        public function __construct($id, $code, $name, $category, $description, $qty, $price, $subsidiaries) {
            $this->id = $id;
            $this->code = $code;
            $this->name = $name;
            $this->category = $category;
            $this->description = $description;
            $this->qty = $qty;
            $this->price = $price;
            $this->subsidiaries = $subsidiaries;
        }

        public function print () {
            echo "Se ha creado el producto <br>";
            echo "------------------------<br>";
            echo "Código: ".$this->code."<br>";
            echo "Nombre: ".$this->name."<br>";
            echo "Categoría: ".$this->category."<br>";
            echo "Descripción: ".$this->description."<br>";
            echo "Cantidad: ".$this->qty."<br>";
            echo "Precio: ".$this->price."<br>";
            echo "------------------------";
        }
    }
?>