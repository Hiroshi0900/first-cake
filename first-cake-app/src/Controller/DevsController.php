<?php
namespace App\Controller;

use App\Controller;

class DevsController extends AppController
{
    public $components = ['Post'];
    public function initialize()
    {
        parent::initialize();
    }
    public function index()
    {
        $data = ['ken','mike','Rei'];

        $this->set('test', $data);
        // echo'<pre>';
        // var_dump($this->request->params);
        die('index :: '.$this->Post->sayMsg('test'));
    }

    public function view($id)
    {
        die('PostID :: '.$id);
    }

    public function create()
    {
    }
}
