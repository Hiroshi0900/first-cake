<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TKeisansController;
use Cake\I18n\Time;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\TKeisansController Test Case
 *
 * @uses \App\Controller\TKeisansController
 */
class TKeisansControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.TKeisans',
    ];

    /**
     * setup method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $_SERVER['HTTP_HOST'] = 'localhost'; // これはお作法かな
        $this->configRequest([ // ヘッダー項目をセット
            'headers' => [
                'Accept'       => 'application/json',
                'Content-Type' => 'application/json',
            ]
        ]);
        Time::setTestNow(new Time('2021-03-31 00:00'));
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

    /**
     * Test add method
     *
     * @return void
     */
    public function testAddView()
    {
        // $this->markTestIncomplete('Not implemented yet.');
        // 画面が正常に描画されているかテスト
        // $this->get('/t-keisans/index');
        // $this->assertResponseOk(); 
        // $this->assertContentType('text/html'); 
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
