<?php
  class User {
    public $id;
    public $email;
    public $firstname;
    public $lastname;
    public $password;

    public function __construct($id, $email, $firstname, $lastname, $password) {
      $this->id = $id;
      $this->email = $email;
      $this->firstname = $firstname;
      $this->lastname = $lastname;
      $this->password = $password;
    }
  }
?>