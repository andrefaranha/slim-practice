<?php

use Phinx\Migration\AbstractMigration;

class ProdutosTable extends AbstractMigration
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
      $produtos_table = $this->table('produtos');
      $produtos_table->addColumn('nome', 'string')
        ->addColumn('descricao', 'string')
        ->addColumn('preco', 'float')
        ->addColumn('restaurante_id', 'integer')
        ->addForeignKey('restaurante_id', 'restaurantes', 'id')
        ->create();
    }
}
