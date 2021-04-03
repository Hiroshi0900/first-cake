<?php

namespace App\Test\TestCase\Controller\Component\TKeisan;

use App\Controller\Component\TkeisanComponent; // テスト対象のファイル

use Cake\Controller\Controller;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;
use Cake\Event\Event;
use Cake\Http\ServerRequest;
use Cake\Http\Response;
use Cake\TestSuite\TestCase;


// テストの対象となる偽物のコントローラ
class TestTkeisanController extends Controller {
    public $paginate = null;
}

class TkeisanComponentTest extends TestCase
{
    // ------------- お作法 ------------- //
    public $component = null;
    public $controller = null;

    // テストデータフィクスチャー
    public $fixtures = [
        'app.TKeisans', 
    ];
    public $autoFixtures = false;
    
    // 実行時に必ず呼び出される
    public function setUp()
    {
        parent::setUp();

        // Cakeのお作法
        // コンポーネントと偽のテストコントローラーのセットアップ
        $request = new ServerRequest();
        $response = new Response();
        $this->controller = $this->getMockBuilder(Controller::class)
            ->setConstructorArgs([$request, $response])
            ->setMethods(null)
            ->getMock();
        $registry = new ComponentRegistry($this->controller);
        $this->component = new TkeisanComponent($registry);
        $event = new Event('Controller.startup', $this->controller);
    }
    public function tearDown()
    {
        unset($this->component);
        unset($this->controller);
        parent::tearDown();
    }

    // -------------- test -------------- //
    /**
    * _getProgramList-01
    *
    * [テストケース]
    * ・なし
    * [期待結果]
    * ・パラメータの項目名が一致すること // TODO 確認中
    * ・パラメータの型が一致すること
    */
    public function testIndex()
    {
        // ---- テスト用パラメータ設定  ---- //

        // ---- テスト用メソッド呼び出し  ---- //
        $targetMethod = $this->_getReflectionMethod('_getTkeisanList');
        $dataMain = $targetMethod->invokeArgs($this->component,[]);
        $data = $dataMain->first();
        // ---- テスト処理実行  ---- //
var_dump('------- テスト実行... -------');
// var_dump(gettype($data));
// var_dump(gettype($data->targetDate));
// var_dump(count($dataMain));
// var_dump($data->toArray());
        if(count($dataMain) == 0) return ; // データ件数なし
        // キーの存在テスト
        $this->assertArrayHasKey("id"         , $data); // 第一引数に存在したいか調べたいキー,第二引数に対象データ（配列）
        $this->assertArrayHasKey("category"   , $data); 
        $this->assertArrayHasKey("sum"        , $data); 
        $this->assertArrayHasKey("koumoku"    , $data); 
        $this->assertArrayHasKey("targetDate" , $data); 
        $this->assertArrayHasKey("username"   , $data->b);

        // 型テスト
        $this->assertInternalType('object'  , $dataMain); // クエリインスタンスはオブジェクトを生成する（会社のやつは配列に置換してる）
        $this->assertInternalType('object'  , $data); 
        $this->assertInternalType('int'     , $data->id); 
        $this->assertInternalType("string"  , $data->category); 
        $this->assertInternalType("string"  , $data->sum); 
        $this->assertInternalType("string"  , $data->koumoku); 
        $this->assertInternalType("object"  , $data->targetDate); 
        $this->assertInternalType("string"  , $data->b['username']);

        // データが正しいかテスト(数が一致してるかを検証するのが多いのかな？)
        $this->assertEquals((int)6 , count($data->toArray()));
var_dump('------- テスト完了！！ -------');
    }

    // テスト用ファンクションの呼び出し
    protected function _getReflectionMethod($method = null)
    {
        $reflection = new \ReflectionClass('App\Controller\Component\TkeisanComponent');
        $reflectionMethod = $reflection->getMethod($method);
        $reflectionMethod->setAccessible(true);
        return $reflectionMethod;
    }
    public function testAdd01()
    {
var_dump('------- Addテスト実行... -------');
        // ---- テスト用メソッド呼び出し  ---- //
        // $targetMethod = $this->_getReflectionMethod('_getTkeisanList'); // TODO コンポーネントで登録なかった
        // $dataMain = $targetMethod->invokeArgs($this->component,[]);
        // $data = $dataMain->first();
var_dump('------- Addテスト完了!!! -------');
$this->markTestIncomplete('Not implemented yet.');
    }
}