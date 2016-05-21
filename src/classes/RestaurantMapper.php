<?php
class RestaurantMapper extends Mapper {

  public function getRestaurants() {
    $sql = "SELECT id, nome, descricao FROM restaurantes";
    $stmt = $this->db->query($sql);
    $results = [];
    while ($row = $stmt->fetch()) {
      $results[] = new Restaurant($row);
    }
    return $results;
  }

  public function getRestaurantById($id) {
    $sql = "SELECT id, nome, descricao
      FROM restaurantes
      WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute(["id" => $id]);
    if ($result) {
      return new Restaurant($stmt->fetch());
    }
  }

  public function getRestaurantUsers($id) {
    $sql = "
      SELECT usuarios.username as username,
        usuarios.password as password,
        usuarios.nome as nome,
        usuarios.email as email,
        usuarios.descricao as descricao
      FROM usuarios_restaurantes
      INNER JOIN usuarios ON usuarios_restaurantes.username = usuarios.username
      INNER JOIN restaurantes on usuarios_restaurantes.restaurante_id = restaurantes.id
      WHERE restaurantes.id = :id;
    ";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute(["id" => $id]);
    $results = [];
    while ($row = $stmt->fetch()) {
      $results[] = new User($row);
    }
    return $results;
  }

  public function getRestaurantProducts($id) {
    $sql = "SELECT p.id, p.nome, p.descricao, p.preco, p.restaurante_id
      FROM produtos p
      JOIN restaurantes r
      ON (p.restaurante_id = r.id)
      WHERE p.restaurante_id = :id;";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute(["id" => $id]);
    $results = [];
    while ($row = $stmt->fetch()) {
      $results[] = new Product($row);
    }
    return $results;
  }

} ?>
