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

} ?>
