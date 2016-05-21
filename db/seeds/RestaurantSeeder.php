<?php

use Phinx\Seed\AbstractSeed;

class RestaurantSeeder extends AbstractSeed
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
          'nome' => 'Restaurante do Andre',
          'descricao' => 'primeiro restaurante',
        ),
        array(
          'nome' => 'Restaurante Fantasma',
          'descricao' => 'Sem Dono ou Funcionarios',
        ),
        array(
          'nome' => 'Segundo Restaurante do Andre',
          'descricao' => 'o segundo',
        ),
        array(
          'nome' => 'Third Restaurant',
          'descricao' => '...',
        )
      );

      $posts = $this->table('restaurantes');
      $posts->insert($data)->save();
    }
}
