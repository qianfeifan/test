<?php
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

//初始化拦截器    
$validation = new Validation();
//定制你的拦截器规则,你需要验证的参数名比如:name,如果验证失败返回的message
$validation->add(
    'name', new PresenceOf(array(
    'message' => 'The name is required'
)))->add(
    'email', new PresenceOf(array(
    'message' => 'The e-mail is required'
)))->add(
    'email', new Email(array(
    'message' => 'The e-mail is not valid'
)));
//可以先过滤和清理请求参数
$validation->setFilters('name', 'trim');
$validation->setFilters('email', 'trim');
//注入参数可以放get可以放post可以限制数据源
$messages = $validation->validate($_REQUEST);
//判断有没有验证通过
if (count($messages)) {
    //如果通过打印报错信息
    foreach ($messages as $message) {
       echo $message, '<br>';
    }
    //结束执行后面的内容不再执行
    return;
}