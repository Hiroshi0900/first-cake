<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CategoriesController;
use Cake\I18n\FrozenTime;
use Cake\I18n\Time;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

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
        Time::setTestNow(new Time('2021-03-31 00:00'));
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

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
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
        $this->assertResponseContains('カテゴリーコード');
        $this->assertResponseContains('カテゴリー名');
        $this->assertResponseContains('サブ カテゴリー名');
        // $this->assertContentType('text/html'); 
    }
    public function testTrueIndexView()
    {
        // $this->markTestIncomplete('Not implemented yet.');
        // 画面が正常に描画されているかテスト
        // ログイン処理の実行
        // ログイン処理の実行
        // $this->post('/users/login', [
        //     'username' => 'dev',
        //     'password' => 'aaaa0000'
        // ]);
        $this->get('/categories/index');
        $this->assertResponseOk();
        $this->assertResponseContains('カテゴリーコード');
        $this->assertResponseContains('カテゴリー名');
        $this->assertResponseContains('サブカテゴリー名');
        // $this->assertContentType('text/html'); 
    }


    public function testFailAddView()
    {
        // $this->markTestIncomplete('Not implemented yet.');
        // 画面が正常に描画されているかテスト
        // ログイン処理の実行
        // ログイン処理の実行
        // $this->post('/users/login', [
        //     'username' => 'dev',
        //     'password' => 'aaaa0000'
        // ]);
        $this->get('/categories/add-ddd');
        $this->assertResponseError(); //エラーが出て正解
        // $this->assertResponseContains('カテゴリーコード');
        // $this->assertResponseContains('カテゴリー名');
        // $this->assertResponseContains('サブ カテゴリー名');
        // $this->assertContentType('text/html'); 
    }

    public function testTrueAddView()
    {
        // $this->markTestIncomplete('Not implemented yet.');
        // 画面が正常に描画されているかテスト
        // ログイン処理の実行
        // ログイン処理の実行
        // $this->post('/users/login', [
        //     'username' => 'dev',
        //     'password' => 'aaaa0000'
        // ]);
        $this->get('/categories/add');
        $this->assertResponseOk();
        // $this->assertResponseContains('カテゴリーコード');
        // $this->assertResponseContains('カテゴリー名');
        // $this->assertResponseContains('サブ カテゴリー名');
        // $this->assertContentType('text/html'); 
    }
    /**
     * Test edit method
     *
     * @return void
     */
    public function testTrueEditView()
    {
        // $this->markTestIncomplete('Not implemented yet.');
        // 画面が正常に描画されているかテスト
        // $this->get('/category/edit');
        // $this->assertResponseOk();
        // $this->markTestIncomplete('Not implemented yet.');
        // $this->assertContentType('text/html'); 

        $this->get('/categories/edit/1');
        $this->assertResponseOk();
        // // プロパティ
        // $propertyTemplate = $this->_getReflectionProperty('_template');
        // $propertyTemplate->getValue($this->controller);
        // $tKeisan = $this->Categories->get(1, [
        //     'contain' => [],
        // ]);
        
// var_dump($this->viewVariable('users'));
// exit;
        // $this->assertResponseContains('カテゴリーコード');
        // $this->assertResponseContains('カテゴリー名');
        // $this->assertResponseContains('サブ カテゴリー名');
    }
    // 失敗テストを作成
    public function testFailEditView01()
    {

        $this->get('/category/edit/fail');
        $this->assertResponseError(); //エラーが出て正解
    }
    // 失敗テストを作成
    // public function testFailEditView02()
    // {

    //     $this->get('/category/edit/fail');
    //     $this->assertResponseError(); //エラーが出て正解
    // }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
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
