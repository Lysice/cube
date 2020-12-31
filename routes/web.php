<<<<<<< HEAD
<?php

$router->get('/', function () {
    return 'index';
});
$router->get('/hello', function () {
    return 'hello cube!';
});

$router->get('/config', function () {
   echo config('cube.default');
   echo config('cube.connections.mysql.username');
});
//$router->get('/db', function () {
//    $id = 1;
//    $res = App::getContainer()->get('db')->select('select * from cjs_activity where id = ?', [$id]);
//    var_dump($res);
//});
$router->get('/query', function () {
    $id = 1;
    $res = App::getContainer()->get('db')->table('cjs_activity')->where('id', 1)->get();
    var_dump($res);
});
=======
<?php

$router->get('/', function () {
    return 'index';
});
$router->get('/hello', function () {
    return 'hello cube!';
});

$router->get('/config', function () {
   echo config('cube.default');
   echo config('cube.connections.mysql.username');
});
//$router->get('/db', function () {
//    $id = 1;
//    $res = App::getContainer()->get('db')->select('select * from cjs_activity where id = ?', [$id]);
//    var_dump($res);
//});
$router->get('/query', function () {
    $id = 1;
    $res = App::getContainer()->get('db')->table('cjs_activity')->where('id', 1)->get();
    var_dump($res);
});
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
