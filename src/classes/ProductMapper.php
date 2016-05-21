<?php
class ProductMapper extends Mapper {

  public function getProducts() {
    $sql = "SELECT id, nome, descricao, preco, restaurante_id FROM produtos";
    $stmt = $this->db->query($sql);
    $results = [];
    while ($row = $stmt->fetch()) {
      $results[] = new Product($row);
    }
    return $results;
  }

  public function getProductById($id) {
    $sql = "SELECT id, nome, descricao, preco, restaurante_id
      FROM produtos
      WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute(["id" => $id]);
    if ($result) {
      return new Product($stmt->fetch());
    }
  }

  public function getProductRestaurant($product_id) {
    $sql = "SELECT r.id, r.nome, r.descricao
      FROM produtos p
      JOIN restaurantes r
      ON (p.restaurante_id = r.id)
      WHERE p.id = :product_id";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute(["product_id" => $product_id]);
    if ($result) {
      return new Restaurant($stmt->fetch());
    }
  }

} ?>
