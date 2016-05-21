<?php
class UserMapper extends Mapper {

  public function getUsers() {
    $sql = "SELECT username, password, nome, email, descricao FROM usuarios";
    $stmt = $this->db->query($sql);
    $results = [];
    while ($row = $stmt->fetch()) {
      $results[] = new User($row);
    }
    return $results;
  }

  public function getUserByUsername($username) {
    $sql = "SELECT username, password, nome, email, descricao
      FROM usuarios
      WHERE username = :username";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute(["username" => $username]);
    if ($result) {
      return new User($stmt->fetch());
    }
  }

  public function getUserRestaurants($username) {
    $sql = "
      SELECT restaurantes.id as id,
        restaurantes.nome as nome,
        restaurantes.descricao as descricao
      FROM usuarios_restaurantes
      INNER JOIN usuarios ON usuarios_restaurantes.username = usuarios.username
      INNER JOIN restaurantes on usuarios_restaurantes.restaurante_id = restaurantes.id
      WHERE usuarios.username = :username;
    ";
    $stmt = $this->db->prepare($sql);
    $result = $stmt->execute(["username" => $username]);
    $results = [];
    while ($row = $stmt->fetch()) {
      $results[] = new Restaurant($row);
    }
    return $results;
  }

} ?>
