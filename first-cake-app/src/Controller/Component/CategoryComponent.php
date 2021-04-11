<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use WyriHaximus\TwigView\Lib\Twig\Extension\Strings;

class CategoryComponent extends Component
{
    public $uses = ['User','Categories'];  //ここに使うモデルを列記
    /**
     *  データ取得ファンクション
     *
     * @param 
     * @return Query Queyオブジェクト
     */
    public function getAllList()
    {
        $categories = TableRegistry::get('categories');
        return $categories->find('allUser')
            ->enableHydration(false)
            ->toArray();
        // return '引数は'.'なし';
        // echo'<pre>';
        // var_dump(TableRegistry::get('t_keisans'));
        // exit;
        // return $this->_getTkeisanList();
    }

    
}
