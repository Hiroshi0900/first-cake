<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Utility\Text;

/**
 * App\Model\Table\CategoriesTable Test Case
 */
class CategoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriesTable
     */
    public $Categories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Categories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Categories') ? [] : ['className' => CategoriesTable::class];
        $this->Categories = TableRegistry::getTableLocator()->get('Categories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Categories);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    // public function testValidationDefault()
    public function testValidationFail01()
    {
        // カテゴリーコードがないとエラー
        $category = $this->Categories->newEntity([
            'categoryCd' => '',
            'categoryName' => 'testカテゴリー',
            'subCategoryName' => 'testサブカテゴリー',
        ]);
        $expected = [
            'categoryCd' => ['_empty' => 'This field cannot be left empty'],
        ];
        $this->assertSame($expected, $category->getErrors()); // 第一引数と第二引数が一致（エラーがない）
    }
    // 取得テスト(fixtureの確認)
    public function testValidateFailGet01(){
        $category = $this->Categories->get(1, [
            'contain' => [],
        ]);
        // $this->assertEmpty($notTaggedArticle->tags);
    }
    // 公式チュートリアルより
    public function beforeSave($event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->categoryCd);
            // スラグをスキーマで定義されている最大長に調整
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }
}
