<?php
use Phalcon\Mvc\Controller;

// Index控制器类 必须继承Controller
class IndexController extends Controller {

    // 默认Action
    public function indexAction() {
    	// $postId=1;
    	// $a=2;
     //     $this->view->postId=$postId;
     //     $this->view->setVar("a",$a);
         //echo "<h1>Hello Word!</h1>";
    }

public function testAction() {

        echo "<h1>test!</h1>";
    }
}