<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use WyriHaximus\TwigView\Lib\Twig\Extension\Strings;

class UserComponent extends Component
{
    // データ取得ファンクション
    public function getAllUser()
    {
        return $this->_getAllUserList();
    }
    // データ取得用のクエリインスタンス整形ファンクション
    protected function _getAllUserList()
    {
        $user = TableRegistry::get('users');
        $user = $user->find()->all();
        return $user;
    }
}
