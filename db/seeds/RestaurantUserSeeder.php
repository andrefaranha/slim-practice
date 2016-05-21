<?php

use Phinx\Seed\AbstractSeed;

class RestaurantUserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
      $data = array(
        array(
          'username' => 'afaranha',
          'restaurante_id' => 1,
        ),
        array(
          'username' => 'afaranha',
          'restaurante_id' => 3,
        ),
        array(
          'username' => 'third',
          'restaurante_id' => 4,
        ),
        array(
          'username' => 'abc',
          'restaurante_id' => 3,
        )
      );

      $posts = $this->table('usuarios_restaurantes');
      $posts->insert($data)->save();
    }
}
