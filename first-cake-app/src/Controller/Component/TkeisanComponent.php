<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use WyriHaximus\TwigView\Lib\Twig\Extension\Strings;

class TkeisanComponent extends Component
{
    public $uses = ['User'];  //ここに使うモデルを列記
    // データ取得ファンクション
    public function getTkeisan()
    {
        // return '引数は'.'なし';
        // echo'<pre>';
        // var_dump(TableRegistry::get('t_keisans'));
        // exit;
        return $this->_getTkeisanList();
    }

    // データ取得用のクエリインスタンス整形ファンクション
    protected function _getTkeisanList()
    {
        $t = TableRegistry::get('t_keisans');
        $tKeisans = $t->find();
        $tKeisans->join([
            'table' => 'users',
            'alias' => 'b',
            'type'  => 'INNER',
            'conditions' => 't_keisans.userId = b.id'
        ])
        ->select([
            't_keisans.id','t_keisans.category' ,
            't_keisans.sum','t_keisans.koumoku',
            't_keisans.targetDate','b.username'
        ])->sql();
        return $tKeisans;
    }
    // 詳細画面用データ集計ファンクション
    public function getTkeisanDetail(int $id)
    {
        return $this->_getTkeisanDetail($id);
    }
    protected function _getTkeisanDetail(int $id)
    {
        $t = TableRegistry::get('t_keisans');
        // $tKeisan = $t->get($id, [
        //     'contain' => [],
        // ]);
        $tKeisan = $t->find();
        $tKeisan->join([
            'table' => 'users',
            'alias' => 'b',
            'type'  => 'INNER',
            'conditions' => 't_keisans.userId = b.id'
        ])
        ->where(['t_keisans.id' => $id])
        ->select([
            't_keisans.id','t_keisans.category' ,
            't_keisans.sum','t_keisans.koumoku',
            't_keisans.targetDate','b.username',
            't_keisans.created','t_keisans.modified',
        ])
        ->sql();
        return $tKeisan->first();
    }
}
