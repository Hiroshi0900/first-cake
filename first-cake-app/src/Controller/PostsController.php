<?php
namespace App\Controller;

use App\Controller;

class PostsController extends AppController {
    public $helpers = ['Html'];
    // public $components = [
    //     'Post'
    // ];
    public function initialize()
    {
        echo'来てるよ';
    }
    public function index(){
        $data = ['ken','mike','Rei'];

        $this->set('test',$data);
        // echo'<pre>';
        // var_dump($this->request->params);
        // die('index :: ');
    }

    public function view($id){
        die('PostID :: '.$id);
    }
}