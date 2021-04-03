<?php
use Migrations\AbstractMigration;

class CreateCategories extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('categories')
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => null,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('categoryCd', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => false,
                // 'unique' => true, // 一意の名称
            ])
            ->addIndex(['categoryCd'], ['unique' => true])
            ->addColumn('categoryName', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addPrimaryKey(['categoryName'])
            ->addColumn('subCategoryName', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            // ->addPrimaryKey(['subCategoryName'])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
    }
}
