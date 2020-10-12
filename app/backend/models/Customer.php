<?php
  class Customer {
    public $id;
    public $email;
    public $firstname;
    public $lastname;

    public function __construct($id, $email, $firstname, $lastname) {
      $this->id = $id;
      $this->email = $email;
      $this->firstname = $firstname;
      $this->lastname = $lastname;
    }
  }
?>