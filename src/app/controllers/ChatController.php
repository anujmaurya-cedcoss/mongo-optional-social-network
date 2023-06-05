<?php

use Phalcon\Mvc\Controller;

class ChatController extends Controller
{
    public function indexAction()
    {
        $output = $this->mongo->messages->findOne();
        $this->view->data = json_encode($output['messages']);
    }

    public function addAction()
    {
        $id = 1;
        $arr[$id]['message'] = $_POST['message'];
        $arr = json_encode($arr);
        $this->mongo->messages->updateOne(['_id' => new \MongoDB\BSON\ObjectID('647dd066cdd1253ee009c33e')], ['$push' => ['messages' => json_decode($arr)]]);
        $this->response->redirect('/chat/');
    }
}
