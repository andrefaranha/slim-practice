<?php

use Phinx\Seed\AbstractSeed;

class ProductSeeder extends AbstractSeed
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
          'nome' => 'Prod 1',
          'descricao' => 'First Product',
          'preco' => 19,
          'restaurante_id' => 1,
        ),
        array(
          'nome' => 'Prod 2',
          'descricao' => '2',
          'preco' => 21,
          'restaurante_id' => 1,
        ),
        array(
          'nome' => 'name',
          'descricao' => 'desc',
          'preco' => 0.99,
          'restaurante_id' => 1,
        ),
        array(
          'nome' => 'Another',
          'descricao' => '-',
          'preco' => 1.49,
          'restaurante_id' => 2,
        ),
      );

      $posts = $this->table('produtos');
      $posts->insert($data)->save();
    }
}
