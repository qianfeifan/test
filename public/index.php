<?php
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
 use Phalcon\Mvc\Url as UrlProvider;
// use Phalcon\Config\Adapter\Ini as ConfigIni;
// use Phalcon\Config\Adapter\Json as ConfigJson;
// use Phalcon\Config\Adapter\Php as ConfigPhp;

try {

	// $ConfigIni  = new ConfigIni('../Config/ini.ini');
	// $ConfigJson = new ConfigJson('../Config/json.json');
	// $ConfigPhp  = new ConfigPhp('../Config/php.php');

    // 创建自动加载(AutoLoaders)实例
    $loader = new Loader();

    // 通过自动加载加载控制器(Controllers)
    $loader->registerDirs(array(
        // 控制器所在目录
        '../app/controllers/',
         '../app/models/'
    ))->register();

    // 创建一个DI实例
    $di = new FactoryDefault();

    // 初始化数据库连接 从配置项读取配置信息
    $di->set('db', function(){
        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host" => "localhost",
            "username" => "root",
            "password" => "",
            "dbname" => "test"
        ));
    });





    // 实例化View 赋值给DI的view
    $di->set('view', function () {

        $view = new View();
        $view->setViewsDir('../app/views/');
        return $view;
    });
    

     $di->set('url', function () {
        $url = new UrlProvider();
        $url->setBaseUri('/phalcon/');
        return $url;
    });

    // 处理请求
    $application = new Application($di);
    // 输出请求类容
    echo $application->handle()->getContent();
} catch (\Exception $e){
    // 异常处理
    echo "PhalconException: ", $e->getMessage();
}