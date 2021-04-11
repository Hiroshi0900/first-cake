<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CategoriesController;
use Cake\I18n\FrozenDate;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Cake\ORM\TableRegistry;

use function Symfony\Component\String\s;

/**
 * App\Controller\CategoriesController Test Case
 *
 * @uses \App\Controller\CategoriesController
 */
class CategoriesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    // public $fixtures = [
    //     'app.Categories',
    // ];
    public $controller = null;
    public $fixtures = ['app.Categories'];
    public $autoFixtures = true; // fixtureファイルの最新化制御
    /**
     * setup method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        // $_SERVER['HTTP_HOST'] = 'localhost:8765'; // これはお作法かな // こいつ悪かった
        $this->configRequest([ // ヘッダー項目をセット // こいつ悪かった
            'headers' => [
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json',
            ]
        ]);
        // Time::setTestNow(new Time('2021-03-31 00:00'));
        $this->session(
          [
            'Auth' => [
              'User' => [
                'id' => 1,
                'user_id' => 'test',
                'email' => 'test@test.com',
                'password' => 'test'
              ]
            ]
          ]
        );
        $this->controller = $this->getMockBuilder(CategoriesController::class)
            ->setMethods(null)
            ->getMock();
    }
    public function tearDown()
    {
        unset($this->Categories);
        parent::tearDown();
    }
    public function testFailIndexView()
    {
        // $this->markTestIncomplete('Not implemented yet.');
        // 画面が正常に描画されているかテスト
        // ログイン処理の実行
        // ログイン処理の実行
        // $this->post('/users/login', [
        //     'username' => 'dev',
        //     'password' => 'aaaa0000'
        // ]);
        $this->get('/categories/index-ddd');
        $this->assertResponseError(); //エラーが出て正解
        // $this->assertContentType('text/html'); 
    }
    public function testTrueIndexView()
    {
        $this->get('/categories/index');
        $this->assertResponseOk();
        $this->assertResponseContains('カテゴリーコード');
        $this->assertResponseContains('カテゴリー名');
        $this->assertResponseContains('サブカテゴリー名');
    }


    public function testFailAddView01()
    {
        $this->get('/categories/add-ddd');
        $this->assertResponseError(); //エラーが出て正解
    }
    public function testFailAddView02()
    {
        $this->get('/categories/add');
        $this->assertResponseOk();
    }
    public function testFailAddPost01()
    {
        // ----- このテストは実際あり得ないので価値なし ------ //
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        // 入力内容が全くない(POSTデータが全くない)
        $data = [];
        $this->post('/categories/add',$data);
        $today    = new FrozenTime('2021-03-31 00:00');
        $tomorrow = new FrozenTime('2021-03-31 00:00');
        $data = [
            'categoryCd'      => '',
            'categoryName'    => 'テスト用データ（メイン）',
            'subCategoryName' => 'テスト用データ（サブ）',
            'created'         => $today,
            'modified'        => $tomorrow
        ];
        $this->post('/categories/add',$data);
        $this->assertResponseSuccess(); //エラーが出て正解
        $customers = TableRegistry::get('Categories');
        $query = $customers->find()->where(['categoryName' => $data['categoryName']]);
        $result = $query->toArray();
        // データが登録できないため取得はゼロ
        $this->assertEquals(0, count($result));
    }
    public function testFailAddPost02()
    {
        // 入力内容が全くない(全項目空でくる)
        $data = [
            'categoryCd'      => '',
            'categoryName'    => '',
            'subCategoryName' => '',
        ];
        $this->post('/categories/add',$data);
        $this->assertResponseError(); //エラーが出て正解
    }
    public function testFailAddPost03()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        // カテゴリーコードが複数データある
        $today    = new FrozenTime('2021-03-31 00:00');
        $tomorrow = new FrozenTime('2021-03-31 00:00');
        $data = [
            'categoryCd'      => '',
            'categoryName'    => 'テスト用データ（メイン）',
            'subCategoryName' => 'テスト用データ（サブ）',
            'created'         => $today,
            'modified'        => $tomorrow
        ];
        $this->post('/categories/add',$data);
        $this->assertResponseSuccess(); //エラーが出て正解
        $customers = TableRegistry::get('Categories');
        $query = $customers->find()->where(['categoryName' => $data['categoryName']]);
        $result = $query->toArray();
        // データが登録できないため取得はゼロ
        $this->assertEquals(0, count($result));
    }
    public function testTrueAddPost01()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        // 必須項目がある
        $data = [
            'categoryCd'      => '01',
            'categoryName'    => 'テスト用データ（メイン）',
            'subCategoryName' => 'テスト用データ（サブ）',
        ];
        $this->post('/categories/add',$data);
        $this->assertResponseSuccess(); //エラーが出て正解
    }
    public function testTrueAddPost02()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        // 必須項目がある
        $today    = new FrozenTime('2021-03-31 00:00');
        $tomorrow = new FrozenTime('2021-03-31 00:00');
        $data = [
            'categoryCd'      => '99999',
            'categoryName'    => 'テスト用データ（メイン）',
            'subCategoryName' => 'テスト用データ（サブ）',
            'created'         => $today,
            'modified'        => $tomorrow
        ];
        $this->post('/categories/add',$data);
        $this->assertResponseSuccess(); //エラーが出て正解
        $customers = TableRegistry::get('Categories');
        $query = $customers->find()->where(['categoryCd' => $data['categoryCd']]);
        $result = $query->first()->toArray();
        $this->assertEquals($result['categoryCd'], $data['categoryCd']);
        $this->assertEquals($result['categoryName'], $data['categoryName']);
        $this->assertEquals($result['subCategoryName'], $data['subCategoryName']);
        $this->assertEquals($result['created'], $data['created']);
        $this->assertEquals($result['modified'], $data['modified']);
    }

    
    /**
     * Test edit method
     *
     * @return void
     */
    public function testTrueEditView01()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->get('/categories/edit/1');
        $this->assertResponseOk();
    }
    public function testTrueEditView02()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->get('/categories/edit/1');
        $this->assertResponseOk();
        // 項目のヘッダー
        $this->assertResponseContains('カテゴリーコード');
        $this->assertResponseContains('カテゴリー名');
        $this->assertResponseContains('サブカテゴリー名');
        // 項目データ
        $customers = TableRegistry::get('Categories');
        $query = $customers->find()->where(['id' => 1]);
        $result = $query->first()->toArray();
        $this->assertResponseContains($result['categoryCd']);
        $this->assertResponseContains($result['categoryName']);
        $this->assertResponseContains($result['subCategoryName']);
        
    }
    // 失敗テストを作成
    public function testFailEditView01()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->get('/category/edit/fail');
        $this->assertResponseError(); //エラーが出て正解
    }
    public function testFailEditView02()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->get('/categories/edit'); // idがない
        $this->assertResponseError(); //エラーが出て正解
    }

    /**
     * Test delete method
     *
     * @return void
     */
    // public function testDelete()
    // {
    //     $this->markTestIncomplete('Not implemented yet.');
    // }
    // テスト用ファンクションの呼び出し
    protected function _getReflectionMethod($method = null)
    {
        $reflection = new \ReflectionClass('App\Controller\CategoriesController');
        $reflectionMethod = $reflection->getProperty($method);
        $reflectionMethod->setAccessible(true);
        return $reflectionMethod;
    }
    // テスト用ファンクションの呼び出し
    protected function _getReflectionProperty($property = null)
    {
        $reflection = new \ReflectionClass('App\Controller\CategoriesController');
        $reflectionProperty = $reflection->getProperty($property);
        $reflectionProperty->setAccessible(true);
        return $reflectionProperty;
    }
}
