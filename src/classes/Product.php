<?php
class Product {
  private $id;
  private $name;
  private $description;
  private $price;
  private $restaurant_id;

  public function __construct(array $data) {
    if(isset($data['id'])) {
      $this->id = $data['id'];
    }
    $this->name = $data['nome'];
    $this->description = $data['descricao'];
    $this->price = $data['preco'];
    $this->restaurant_id = $data['restaurante_id'];
  }

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getDesc() {
    return $this->description;
  }

  public function getPrice() {
    return $this->price;
  }

  public function getRestaurantId() {
    return $this->restaurant_id;
  }
} ?>
