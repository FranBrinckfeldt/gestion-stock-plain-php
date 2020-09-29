<?php
    class Product {
        public $id;
        public $code;
        public $name;
        public $category;
        public $subsidiary1;
        public $subsidiary2;
        public $subsidiary3;
        public $description;
        public $qty;
        public $price;

        public function __construct($id, $code, $name, $category, $subsidiary1, $subsidiary2, $subsidiary3, $description, $qty, $price) {
            $this->id = $id;
            $this->code = $code;
            $this->name = $name;
            $this->category = $category;
            $this->subsidiary1 = $subsidiary1;
            $this->subsidiary2 = $subsidiary2;
            $this->subsidiary3 = $subsidiary3;
            $this->description = $description;
            $this->qty = $qty;
            $this->price = $price;
        }

        public function print () {
            echo "Se ha creado el producto <br>";
            echo "------------------------<br>";
            echo "Código: ".$this->code."<br>";
            echo "Nombre: ".$this->name."<br>";
            echo "Categoría: ".$this->category."<br>";
            echo "Sucursal 1: ".$this->subsidiary1."<br>";
            echo "Sucursal 2: ".$this->subsidiary2."<br>";
            echo "Sucursal 3: ".$this->subsidiary3."<br>";
            echo "Descripción: ".$this->description."<br>";
            echo "Cantidad: ".$this->qty."<br>";
            echo "Precio: ".$this->price."<br>";
            echo "------------------------";
        }
    }
?>