<?php
use \Phalcon\Forms\Form;
use \Phalcon\Forms\Element\Text;
use \Phalcon\Forms\Element\Select;
use \Phalcon\Mvc\Controller,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength;
class FormController extends Controller
{
    public function indexAction()
    {
        $form = new Form();
 
              //例子一：
        $form->add(new Text("name", array(
            "maxlength" => 20,
            "placeholder"=>'you name'
        )));
 
               //例子二：
        $form->add(new Text("telphone"));
 
                //例子三：
               //例子三我有不明白的地方，该怎么调用他的验证。
        $passwd = new Text("passwd");
        $passwd->addValidator(new PresenceOf(array(
            'message' => 'The passwd is required'
        )));
        $passwd->addValidator(new StringLength(array(
            'min' => 10,
            'messageMinimum' => 'The passwd is too short'
        )));
        $form->add($passwd);
 
         
         
        $this->view->pick("form/form");
        $this->view->form=$form;
    }
 
     
}
?> 