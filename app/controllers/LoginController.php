<?php

class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }

    public function loginAction()
    {
    $name = $this->request->getPost('name');
    $password = $this->request->getPost('password');
    $conditons = 'name = :name: and password = :password:';
    $parameters = [
    'name' => $name,
    'password' => $password,
    ];
    $ret = Users::findFirst(
    [
    $conditons,
    'bind' => $parameters,
    ]);
    if($ret){
    print_r('login success');
    //header('Refresh:3;url=index');
    return $this->response->redirect('index/index/');
    } else {
    print_r('login failed');
    }
    }

}