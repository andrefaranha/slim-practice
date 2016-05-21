<?php
class Restaurant {
  private $id;
  private $name;
  private $description;

  public function __construct(array $data) {
    if(isset($data['id'])) {
      $this->id = $data['id'];
    }
    $this->name = $data['nome'];
    $this->description = $data['descricao'];
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
} ?>
