<?php 
namespace App\Controller\Component;

use Cake\Controller\Component;
use WyriHaximus\TwigView\Lib\Twig\Extension\Strings;

class PostComponent extends Component {
    public function sayMsg(String $msg){
return 'msgは'.$msg;
    }
}