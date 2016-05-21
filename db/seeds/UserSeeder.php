<?php

use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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
          'password' => 'a_senha',
          'nome' => 'Andre',
          'email' => 'afaranha@email.com',
          'descricao' => 'primeiro usuario',
        ),
        array(
          'username' => 'abc',
          'password' => 'def',
          'nome' => 'Alfabeto',
          'email' => 'abc@def.com',
          'descricao' => '...',
        ),
        array(
          'username' => 'third',
          'password' => '3',
          'nome' => 'O Terceiro',
          'email' => 'a@a.com',
          'descricao' => 'Comeca com 1 restaurante',
        )
      );

      $posts = $this->table('usuarios');
      $posts->insert($data)->save();
    }
}
