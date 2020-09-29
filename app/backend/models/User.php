<?php
  class User {
    public $email;
    public $firstname;
    public $lastname;
    public $password;

    public function __construct($email, $firstname, $lastname, $password) {
      $this->email = $email;
      $this->firstname = $firstname;
      $this->lastname = $lastname;
      $this->password = $password;
    }
  }
?>