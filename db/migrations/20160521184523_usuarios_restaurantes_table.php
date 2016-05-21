<?php

use Phinx\Migration\AbstractMigration;

class UsuariosRestaurantesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
      $usuarios_restaurantes_table = $this->table('usuarios_restaurantes');
      $usuarios_restaurantes_table->addColumn('username', 'string')
        ->addColumn('restaurante_id', 'integer')
        ->addForeignKey('username', 'usuarios', 'username')
        ->addForeignKey('restaurante_id', 'restaurantes', 'id')
        ->create();
    }
}
