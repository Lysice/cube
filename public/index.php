<<<<<<< HEAD
<?php

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../app.php';

App::getContainer()->bind('str', function () {
    return 'hello world';
});
// 容器绑定
//echo App::getContainer()->get('str');

// 帮助文件helpers.php
//echo hello();

// Request对象
App::getContainer()->bind(\Core\Request\RequestInterface::class, function () {
    return \Core\Request\Request::create($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $_SERVER);
});

// Request对象绑定测试
//echo App::getContainer()->get(\Core\Request\RequestInterface::class)->getMethod();

// Response对象绑定测试
//App::getContainer()->get('response')->setContent(
//    App::getContainer()->get(\Core\Request\RequestInterface::class)->getMethod()
//)->send();

App::getContainer()->get('response')->setContent(
    App::getContainer()->get('router')->dispatch(
        App::getContainer()->get(\Core\Request\RequestInterface::class)
    )
)->send();
=======
<?php

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../app.php';

App::getContainer()->bind('str', function () {
    return 'hello world';
});
// 容器绑定
//echo App::getContainer()->get('str');

// 帮助文件helpers.php
//echo hello();

// Request对象
App::getContainer()->bind(\Core\Request\RequestInterface::class, function () {
    return \Core\Request\Request::create($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD'], $_SERVER);
});

// Request对象绑定测试
//echo App::getContainer()->get(\Core\Request\RequestInterface::class)->getMethod();

// Response对象绑定测试
App::getContainer()->get('response')->setContent(
    App::getContainer()->get(\Core\Request\RequestInterface::class)->getMethod()
)->send();

App::getContainer()->get('response')->setContent(
    App::getContainer()->get('router')->dispatch(
        App::getContainer()->get(\Core\Request\RequestInterface::class)
    )
)->send();

>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
