<?php
    class Product {
        public $id;
        public $code;
        public $name;
        public $category;
        public $description;
        public $qty;
        public $active;
        public $price;
        public $subsidiaries;

        public function __construct($id, $code, $name, $category, $description, $qty, $active, $price, $subsidiaries) {
            $this->id = $id;
            $this->code = $code;
            $this->name = $name;
            $this->category = $category;
            $this->description = $description;
            $this->qty = $qty;
            $this->active = $active;
            $this->price = $price;
            $this->subsidiaries = $subsidiaries;
        }
    }
?>