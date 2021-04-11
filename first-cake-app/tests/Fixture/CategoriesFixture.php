<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CategoriesFixture
 */
class CategoriesFixture extends TestFixture
{
    /**
     * Import
     *
     * @var array
     */
    public $import = ['table' => 'categories'];
    
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'categoryCd' => '01',
                'categoryName' => '雑費',
                'subCategoryName' => '食費',
                'koumoku' => '',
                'created' => '2021-04-01 23:07:37',
                'modified' => '2021-04-01 23:07:37',
            ],
            [
                'id' => 2,
                'categoryCd' => '01',
                'categoryName' => 'aaa',
                'subCategoryName' => 'sss',
                'koumoku' => null,
                'created' => '2021-04-03 01:26:12',
                'modified' => '2021-04-03 01:26:12',
            ],
        ];
        parent::init();
    }
}
