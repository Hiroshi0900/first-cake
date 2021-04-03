<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\I18n\FrozenTime;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\UsersController Test Case
 *
 * @uses \App\Controller\UsersController
 */
class UsersControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Users',
    ];
    
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
    public function testAdd()
    {
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

    public function testLoginView(){
        $this->get('/users/login');
        $this->assertResponseOk(); 
        $this->assertResponseContains('ユーザーIDとパスワードを入力してください');
    }
    public function testLoginExe(){
        // ログイン処理の実行
        $this->post('/users/login', [
            'username' => 'dev',
            'password' => 'aaaa0000'
        ]);

        // ログイン後のユーザー情報(パスワード以外)
        $user = [
          'id' => 1,
          'username' => 'dev',
          'role' => 'admin',
          'created' => new FrozenTime('2017-05-21 05:39:51'),
          'modified' => new FrozenTime('2017-05-21 05:39:51')
        ];
        $this->get('/');
        $this->assertResponseOk();
       // セッションのユーザー情報と比較
// var_dump($this->_requestSession->read('Auth.User'));exit;
//        $this->assertSession($user, 'Auth.User');
    }
    
}
