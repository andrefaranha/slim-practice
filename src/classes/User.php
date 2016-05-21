<?php
class User {
  private $username;
  private $name;
  private $password;
  private $email;
  private $description;
  private $restaurants;

  public function __construct(array $data) {
    $this->username = $data['username'];
    $this->password = $data['password'];
    $this->name = $data['nome'];
    $this->email = $data['email'];
    $this->description = $data['descricao'];
  }

  public function getName() {
    return $this->name;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getDesc() {
    return $this->description;
  }
}
